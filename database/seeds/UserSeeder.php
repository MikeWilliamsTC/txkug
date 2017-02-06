<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder{

    public function run(){

        DB::table('users')->delete();

//        //  Create Admin User
        $adminRole = Role::whereName('administrator')->first();
        $adminUser = User::create(array(
            'first_name'    => 'TXKuG',
            'last_name'     => 'Admin',
            'email'         => 'contact@txkug.com',
            'password'      => bcrypt('secretPassw0rd'),
            'token'         => str_random(64),
            'activated'     => true
        ));
        $adminUser->assignRole($adminRole);

        //  Create Regular Users
        factory(App\Models\User::class, 10)->create()->each(function($role) {
            $userRole = Role::whereName('user')->first();
            $role->assignRole($userRole);
        });
    }
}