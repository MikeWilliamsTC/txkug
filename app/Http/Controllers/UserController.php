<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index() {

        $event = Event::with('venue')
            ->where('stops_at', '>=', Carbon::now()->toDateTimeString())
            ->orderBy('stops_at')
            ->first();

        return view('panels.user.home', compact('event'));
    }

    public function events() {
        $user = User::with('roles', 'participations')->orderBy('last_name')->find(Auth::id());
        return view ('panels.user.events', compact('user'));
    }
}