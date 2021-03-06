<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Request;
use Input;
use Session;
use DB;


class UserController extends Controller
{
    public function setRole(Request $request) {

        if(Request::ajax()) {
            $data = Request::all();

            DB::table('role_user')
                ->where('user_id', '=', $data['user_id'])
                ->update(array('role_id' => $data['role_id']));
        }
    }
}
