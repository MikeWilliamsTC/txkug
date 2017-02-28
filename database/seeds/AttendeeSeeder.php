<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class AttendeeSeeder extends Seeder
{
    public function run(){
        DB::table('attendees')->delete();

        DB::table('attendees')->insert([
            ['event_id' => 1,'user_id' => 2,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 1,'user_id' => 4,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 1,'user_id' => 6,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 1,'user_id' => 8,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],

            ['event_id' => 2,'user_id' => 3,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 2,'user_id' => 5,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 2,'user_id' => 7,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],

            ['event_id' => 3,'user_id' => 2,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 3,'user_id' => 3,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 3,'user_id' => 4,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 3,'user_id' => 7,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 3,'user_id' => 8,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],

            ['event_id' => 4,'user_id' => 2,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 3,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 4,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 5,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 6,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 7,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 8,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],

            ['event_id' => 5,'user_id' => 4,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 5,'user_id' => 5,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 5,'user_id' => 6,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 5,'user_id' => 7,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],

            ['event_id' => 6,'user_id' => 2,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 3,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 4,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 5,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 6,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 7,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 8, 'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
        ]);
    }
}
