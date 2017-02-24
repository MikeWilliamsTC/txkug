<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use SlackApi;

class UsersController extends Controller
{
    public function index() {

        $users = User::with('roles', 'social', 'participations')->orderBy('last_name')->get();

        return view ('admin.users.index', compact('users'));

    }

    public function show($slug) {

        $user = User::with('roles', 'social', 'participations')->whereSlug($slug)->firstOrFail();

        return view ('admin.users.show', compact('user', 'avatar'));

    }
}
