<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index() {
        $users = User::with('roles', 'participations')->orderBy('last_name')->paginate(10);
        return view ('panels.admin.users.index', compact('users'));
    }

    public function show($slug) {
        $user = User::findBySlug($slug);
        return view ('panels.admin.users.show', compact('user'));
    }
}
