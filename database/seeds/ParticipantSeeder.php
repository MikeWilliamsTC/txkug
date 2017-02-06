<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ParticipantSeeder extends Seeder
{
    public function run(){
        DB::table('participants')->delete();

//        foreach(range(1, 50) as $index) {
//            DB::table('participants')->insert([
//                'user_id' => rand(1,12),
//                'event_id' => rand(1,6),
//            ]);
//        }


        DB::table('participants')->insert([
            ['event_id' => 1,'user_id' => 2,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 1,'user_id' => 4,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 1,'user_id' => 6,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 1,'user_id' => 8,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 1,'user_id' => 10,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],

            ['event_id' => 2,'user_id' => 3,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 2,'user_id' => 5,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 2,'user_id' => 7,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 2,'user_id' => 9,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 2,'user_id' => 11,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],

            ['event_id' => 3,'user_id' => 2,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 3,'user_id' => 3,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 3,'user_id' => 4,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 3,'user_id' => 7,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 3,'user_id' => 8,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 3,'user_id' => 11,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],

            ['event_id' => 4,'user_id' => 3,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 4,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 5,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 6,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 7,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 8,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 9,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 4,'user_id' => 10,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],

            ['event_id' => 5,'user_id' => 2,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 5,'user_id' => 3,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 5,'user_id' => 5,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 5,'user_id' => 6,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 5,'user_id' => 8,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 5,'user_id' => 9,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 5,'user_id' => 10,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 5,'user_id' => 11, 'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],

            ['event_id' => 6,'user_id' => 1,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 2,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 3,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 4,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 5,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 6,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 7,'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 8, 'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 9, 'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 10, 'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],
            ['event_id' => 6,'user_id' => 11, 'created_at' => Carbon\Carbon::now(),'updated_at' => Carbon\Carbon::now()],

        ]);

    }
}
