<?php

use Illuminate\Database\Seeder;

class SocialLoginsSeeder extends Seeder
{
    public function run()
    {
        DB::table('social_logins')->delete();

        DB::table('social_logins')->insert([
            ['id' => 1, 'user_id' => 1, 'provider' => 'slack', 'social_id' => 'U2S60A9UN', 'title' => NULL, 'avatar_32' => NULL, 'avatar_192' => NULL],
            ['id' => 2, 'user_id' => 2, 'provider' => 'slack', 'social_id' => 'U2S6BG205', 'title' => NULL, 'avatar_32' => NULL, 'avatar_192' => NULL],
            ['id' => 3, 'user_id' => 3, 'provider' => 'slack', 'social_id' => 'U2S4N5519', 'title' => NULL, 'avatar_32' => NULL, 'avatar_192' => NULL],
            ['id' => 4, 'user_id' => 4, 'provider' => 'slack', 'social_id' => 'U2SEZ0M29', 'title' => NULL, 'avatar_32' => NULL, 'avatar_192' => NULL],
            ['id' => 5, 'user_id' => 5, 'provider' => 'slack', 'social_id' => 'U2T7VKJG1', 'title' => NULL, 'avatar_32' => NULL, 'avatar_192' => NULL],
            ['id' => 6, 'user_id' => 6, 'provider' => 'slack', 'social_id' => 'U2SFHN8ET', 'title' => NULL, 'avatar_32' => NULL, 'avatar_192' => NULL],
            ['id' => 7, 'user_id' => 7, 'provider' => 'slack', 'social_id' => 'U2S6XH932', 'title' => NULL, 'avatar_32' => NULL, 'avatar_192' => NULL],
            ['id' => 8, 'user_id' => 8, 'provider' => 'slack', 'social_id' => 'U2SQXDEBF', 'title' => NULL, 'avatar_32' => NULL, 'avatar_192' => NULL],
            ['id' => 9, 'user_id' => 9, 'provider' => 'slack', 'social_id' => 'U2S77J8LX', 'title' => NULL, 'avatar_32' => NULL, 'avatar_192' => NULL],
            ['id' => 10, 'user_id' => 10, 'provider' => 'slack', 'social_id' => 'U3BNXDE1H', 'title' => NULL, 'avatar_32' => NULL, 'avatar_192' => NULL],
            ['id' => 11, 'user_id' => 11, 'provider' => 'slack', 'social_id' => 'U2S6RE4UC', 'title' => NULL, 'avatar_32' => NULL, 'avatar_192' => NULL],
        ]);
    }
}
