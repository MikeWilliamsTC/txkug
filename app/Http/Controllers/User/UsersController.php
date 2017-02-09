<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function home() {

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
