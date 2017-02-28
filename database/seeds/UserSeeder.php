<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use Carbon\Carbon;

class UserSeeder extends Seeder{

    public function run(){

        DB::table('users')->delete();

//      Create One Admin User (There needs to be an admin user at id = 1)
        $role = Role::whereName('administrator')->first();

        DB::table('users')->insert(array(
            'id'                => 1,
            'slug'              => 'txkug-admin',
            'first_name'        => 'TXKuG',
            'last_name'         => 'Admin',
            'email'             => 'contact@txkug.com',
            'password'          => bcrypt(str_random(16)),
            'role_id'           => $role->id,
            'provider'          => 'slack',
            'slack_id'          => 'U2S60A9UN',
            'slack_handle'      => null,
            'slack_title'       => null,
            'slack_avatar_32'   => null,
            'slack_avatar_192'  => null,
            'remember_token'    => str_random(64),
            'token'             => str_random(64),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ));
//        $adminUser->assignRole($adminRole);

        //  Create 7 Regular Users
        $role = Role::whereName('user')->first();
        DB::table('users')->insert(array(
            array(
                'id'                => 2,
                'slug'              => 'amelia-mclaughlin',
                'first_name'        => 'Amelia',
                'last_name'         => 'McLaughlin',
                'email'             => 'amelia.mclaughlin@example.org',
                'password'          => bcrypt(str_random(16)),
                'role_id'           => $role->id,
                'provider'          => 'slack',
                'slack_id'          => 'U2S6XH932',
                'slack_title'       => NULL,
                'slack_avatar_32'   => NULL,
                'slack_avatar_192'  => NULL,
                'remember_token'    => str_random(64),
                'token'             => str_random(64),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ),
            array(
                'id'                => 3,
                'slug'              => 'monty-dooley',
                'first_name'        => 'Monty',
                'last_name'         => 'Dooley',
                'email'             => 'monty.dooley@example.org',
                'password'          => bcrypt(str_random(16)),
                'role_id'           => $role->id,
                'provider'          => 'slack',
                'slack_id'          => 'U2SQXDEBF',
                'slack_title'       => NULL,
                'slack_avatar_32'   => NULL,
                'slack_avatar_192'  => NULL,
                'remember_token'    => str_random(64),
                'token'             => str_random(64),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ),
            array(
                'id'                => 4,
                'slug'              => 'assunta-kohler',
                'first_name'        => 'Assunta',
                'last_name'         => 'Kohler',
                'email'             => 'assunta.kohler@example.org',
                'password'          => bcrypt(str_random(16)),
                'role_id'           => $role->id,
                'provider'          => 'slack',
                'slack_id'          => 'U2S77J8LX',
                'slack_title'       => NULL,
                'slack_avatar_32'   => NULL,
                'slack_avatar_192'  => NULL,
                'remember_token'    => str_random(64),
                'token'             => str_random(64),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ),
            array(
                'id'                => 5,
                'slug'              => 'imelda-rau',
                'first_name'        => 'Imelda',
                'last_name'         => 'Rau',
                'email'             => 'imelda.rau@example.org',
                'password'          => bcrypt(str_random(16)),
                'role_id'           => $role->id,
                'provider'          => 'slack',
                'slack_id'          => 'U3BNXDE1H',
                'slack_title'       => NULL,
                'slack_avatar_32'   => NULL,
                'slack_avatar_192'  => NULL,
                'remember_token'    => str_random(64),
                'token'             => str_random(64),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ),
            array(
                'id'                => 6,
                'slug'              => 'abby-bashirian',
                'first_name'        => 'Abby',
                'last_name'         => 'Bashirian',
                'email'             => 'abby.bashirian@example.org',
                'password'          => bcrypt(str_random(16)),
                'role_id'           => $role->id,
                'provider'          => 'slack',
                'slack_id'          => 'U2S6RE4UC',
                'slack_title'       => NULL,
                'slack_avatar_32'   => NULL,
                'slack_avatar_192'  => NULL,
                'remember_token'    => str_random(64),
                'token'             => str_random(64),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ),
            array(
                'id'                => 7,
                'slug'              => 'maxime-armstrong',
                'first_name'        => 'Maxime',
                'last_name'         => 'Armstrong',
                'email'             => 'maxime.armstrong@example.org',
                'password'          => bcrypt(str_random(16)),
                'role_id'           => $role->id,
                'provider'          => 'slack',
                'slack_id'          => 'U3GJB3KML',
                'slack_title'       => NULL,
                'slack_avatar_32'   => NULL,
                'slack_avatar_192'  => NULL,
                'remember_token'    => str_random(64),
                'token'             => str_random(64),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ),
            array(
                'id'                => 8,
                'slug'              => 'janessa-wilkinson',
                'first_name'        => 'Janessa',
                'last_name'         => 'Wilkinson',
                'email'             => 'janessa.wilkinson@example.org',
                'password'          => bcrypt(str_random(16)),
                'role_id'           => $role->id,
                'provider'          => 'slack',
                'slack_id'          => 'U3MSFBY75',
                'slack_title'       => NULL,
                'slack_avatar_32'   => NULL,
                'slack_avatar_192'  => NULL,
                'remember_token'    => str_random(64),
                'token'             => str_random(64),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ),
        ));

    }
}