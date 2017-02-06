<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VenueSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(ParticipantSeeder::class);
    }
}
