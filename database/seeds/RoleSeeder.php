<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleSeeder extends Seeder {

    public function run(){
        DB::table('roles')->delete();

        DB::table('roles')->insert(array(
            array('name'   => 'user', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name'   => 'administrator', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        ));
    }
}