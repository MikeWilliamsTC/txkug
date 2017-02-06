<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Event;
use Carbon\Carbon;
use DB;
use Laravel\Socialite\Facades\Socialite;


class DashboardController extends Controller {

    public function index()
    {
        $attendance_chart = DB::table('events')
            ->leftJoin('participants', 'events.id', '=', 'participants.event_id')
            ->select(DB::raw('date_format(events.event_date, \'%m-%d-%Y\') as event_date, count(participants.id) as participant_count'))
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
            ->join('participants', 'users.id', '=', 'participants.user_id')
            ->select(DB::raw('users.first_name, users.last_name, count(participants.id) as attendee_count'))
            ->where('participants.created_at', '<=', Carbon::now()->toDateTimeString())
            ->groupBy('users.last_name', 'users.first_name')
            ->orderBy('users.last_name')
            ->get();

//        $total_events = Event::where('starts_at', '<=', Carbon::now()->toDateTimeString())->count();
//        $total_participants = Participant::count();
//        $avg_attendance = ($total_participants / $total_events);
//
        return view('panels.admin.home', compact('attendance_chart', 'attendance_detail_chart', 'venue_chart', 'total_events', 'avg_attendance'));
    }
}