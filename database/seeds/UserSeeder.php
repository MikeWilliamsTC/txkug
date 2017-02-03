<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder{

    public function run(){
        DB::table('users')->delete();

        $adminRole = Role::whereName('administrator')->first();
//        $userRole = Role::whereName('user')->first();

        $user = User::create(array(
            'first_name'    => 'TXKuG',
            'last_name'     => 'Admin',
            'email'         => 'contact@txkug.com',
            'password'      => Hash::make('TXKuGNeedsYou!'),
            'token'         => str_random(64),
            'activated'     => true
        ));

        $user->assignRole($adminRole);

//        $user = User::create(array(
//            'first_name'    => 'Jane',
//            'last_name'     => 'Doe',
//            'email'         => 'jane.doe@codingo.me',
//            'password'      => Hash::make('janesPassword'),
//            'token'         => str_random(64),
//            'activated'     => true
//        ));
//        $user->assignRole($userRole);
    }
}