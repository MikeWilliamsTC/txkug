<?php

use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    public function run()
    {
        DB::table('venues')->delete();

        DB::table('venues')->insert(array(
            array('id' => 1, 'slug' => 'smith-blair', 'venue_name' => 'Smith-Blair', 'venue_note' => '', 'street_address' => '30 Globe Avenue', 'city' => 'Texarkana', 'state' => 'AR', 'zip_code' => '75503', 'lat' => 33.449836, 'lng' => -94.003791, 'active' => 0, 'created_at' => '2016-11-29 14:08:58', 'updated_at' => '2016-12-02 14:38:23', 'deleted_at' => '2016-12-02 14:38:23'),
            array('id' => 2, 'slug' => 'texarkana-college', 'venue_name' => 'Texarkana College', 'venue_note' => '', 'street_address' => '2500 N Robison Rd', 'city' => 'Texarkana', 'state' => 'TX', 'zip_code' => '75599', 'lat' => 33.442681, 'lng' =>-94.079466, 'active' => 0, 'created_at' => '2016-12-01 14:00:55', 'updated_at' => '2016-12-01 14:00:55', 'deleted_at' => NULL),
            array('id' => 3, 'slug' => 'johnny-bs-of-texarkana', 'venue_name' => 'Johnny B\'s of Texarkana',  'venue_note' => '<a href=\"https://www.facebook.com/JohnnyBtexarkana/\">Facebook Page</a>', 'street_address' => '224 E 5th Street', 'city' => 'Texarkana', 'state' => 'AR', 'zip_code' => '71854', 'lat' => 33.425266, 'lng' =>-94.041636, 'active' => 0, 'created_at' => '2016-12-02 10:10:07', 'updated_at' => '2016-12-02 15:17:05', 'deleted_at' => NULL),
            array('id' => 4, 'slug' => 'johnny-tamale', 'venue_name' => 'Johnny Tamale', 'venue_note' => 'We will meet in the large meeting/party room. ', 'street_address' => '607 E 51st Street', 'city' => 'Texarkana', 'state' => 'AR', 'zip_code' => '71854', 'lat' => 33.471056, 'lng' =>-94.036203, 'active' => 0, 'created_at' => '2016-12-02 12:46:35', 'updated_at' => '2016-12-02 12:46:35', 'deleted_at' => NULL),
            array('id' => 5, 'slug' => 'julies-deli', 'venue_name' => 'Julie\'s Deli', 'venue_note' => 'Visit Julie\'s Deli <a href=\"https://www.facebook.com/Julies-Deli-Market-438216025440\" target=\"_blank\">Facebook</a> page for more information about the venue. ', 'street_address' => '4055 Summerhill Rd', 'city' => 'Texarkana', 'state' => 'TX', 'zip_code' => '75503', 'lat' => 33.455607, 'lng' =>-94.064008, 'active' => 0, 'created_at' => '2016-12-02 14:00:05', 'updated_at' => '2016-12-02 15:23:54', 'deleted_at' => NULL),
            array('id' => 6, 'slug' => 'julies-deli-and-market', 'venue_name' => 'Julie\'s Deli & Market', 'venue_note' => '<a href=\"https://www.facebook.com/Julies-Deli-Market-438216025440\">Facebook</a>', 'street_address' => 'Summerhill Square, 4055 Summerhill Rd', 'city' => 'Texarkana', 'state' => 'TX', 'zip_code' => '75503', 'lat' => -33.455792, 'lng' =>-94.063347, 'active' => 0, 'created_at' => '2016-12-02 14:00:51', 'updated_at' => '2016-12-02 14:01:06', 'deleted_at' => '2016-12-02 14:01:06'),
            array('id' => 7, 'slug' => 'smith-blair', 'venue_name' => 'Smith-Blair', 'venue_note' => '', 'street_address' => '30 Globe Avenue', 'city' => 'Texarkana', 'state' => 'AR', 'zip_code' => '71854', 'lat' => 33.449836, 'lng' =>-94.003791, 'active' => 0, 'created_at' => '2016-12-07 15:08:05', 'updated_at' => '2016-12-07 15:08:05', 'deleted_at' => NULL),
            array('id' => 8, 'slug' => 'texas-chuckwagon', 'venue_name' => 'Texas Chuckwagon', 'venue_note' => '', 'street_address' => '1200 North Kings Hwy', 'city' => 'Nash', 'state' => 'TX', 'zip_code' => '75569', 'lat' => 33.435028, 'lng' =>-94.130485, 'active' => 0, 'created_at' => '2016-12-07 15:38:58', 'updated_at' => '2016-12-07 15:38:58', 'deleted_at' => NULL)
        ));
    }
}
