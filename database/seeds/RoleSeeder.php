<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder {

    public function run(){
        DB::table('roles')->delete();

        DB::table('roles')->insert(array(
            array('name'   => 'user'),
            array('name'   => 'administrator'),
        ));
    }
}