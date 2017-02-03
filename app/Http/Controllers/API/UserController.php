<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Request;
use Input;
use Session;
use DB;
use App\Models\User;
use App\Models\Participant;


class UserController extends Controller
{
    public function setRole(Request $request) {

        if(Request::ajax()) {
            $data = Request::all();

//            dd($data['user_id']);

            DB::table('role_user')
                ->where('user_id', '=', $data['user_id'])
                ->update(array('role_id' => $data['role_id']));
        }
    }
}
