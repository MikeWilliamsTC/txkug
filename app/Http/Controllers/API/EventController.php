<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Request;
use Input;
use Session;
use App\Models\Event;
use App\Models\User;
use App\Models\Participant;
use Carbon\Carbon;
use App\Notifications\UserHasCheckedInToMeeting;

class EventController extends Controller
{
//    public function fetchEvent() {
//
//        $event = Event::with('venue', 'schedules', 'participants.user')
//            ->whereHas('schedules', function($query){
//                $query->where('stops_at', '>=', Carbon::now()->toDateTimeString());
//            })->first();
//
//        return $event;
//
//    }

    public function eventCheckIn(Request $request) {

        if(Request::ajax()) {
            $data = Request::all();
            Participant::create( $data );

            $user = User::find($data['user_id']);
//            $admin = User::find(1);
//            $admin->notify(new UserHasCheckedInToMeeting($user));
            $user->notify(new UserHasCheckedInToMeeting($user));
        }
    }

    public function getParticipants($id) {

        $participants = Participant::with('user')->where('event_id', '=', $id)->get();
        return $participants;

    }
}
