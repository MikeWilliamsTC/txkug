<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendee;
use App\Models\Event;
use Carbon\Carbon;
use DB;
use Laravel\Socialite\Facades\Socialite;


class DashboardController extends Controller {

    public function index()
    {
        $attendance_chart = DB::table('events')
            ->leftJoin('attendees', 'events.id', '=', 'attendees.event_id')
            ->select(DB::raw('date_format(events.event_date, \'%m-%d-%Y\') as event_date, count(attendees.id) as attendee_count'))
            ->where('events.starts_at', '<=', Carbon::now()->toDateTimeString())
            ->where('events.deleted_at', '=', null)
            ->orderBy('events.event_date', 'desc')
            ->groupBy('events.event_date')
            ->get();

        $venue_chart = DB::table('venues')
            ->join('events', 'venues.id', '=', 'events.venue_id')
            ->select(DB::raw('venues.venue_name as venue_name, count(*) as venue_count'))
            ->where('events.starts_at', '<=', Carbon::now()->toDateTimeString())
            ->where('venues.deleted_at', '=', null)
            ->where('events.deleted_at', '=', null)
            ->groupBy('venues.venue_name')
            ->get();

        $attendance_detail_chart = DB::table('users')
            ->join('attendees', 'users.id', '=', 'attendees.user_id')
            ->select(DB::raw('users.first_name, users.last_name, count(attendees.id) as attendee_count'))
            ->where('attendees.created_at', '<=', Carbon::now()->toDateTimeString())
            ->groupBy('users.last_name', 'users.first_name')
            ->orderBy('users.last_name')
            ->get();

        $total_events = Event::where('starts_at', '<=', Carbon::now()->toDateTimeString())->count();
        $total_attendees = Attendee::count();
        $avg_attendance = ($total_attendees / $total_events);
//
        return view('admin.home', compact('attendance_chart', 'attendance_detail_chart', 'venue_chart', 'total_events', 'avg_attendance'));

    }
}