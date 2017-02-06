<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        DB::table('events')->delete();

        DB::table('events')->insert([
            [
                'id' => 1,
                'slug' => 'txkug-monthly-meeting-2016-10-21',
                'venue_id' => 2,
                'event_name' => 'TxkUG Monthly Meeting',
                'event_title' => 'First Official Meeting - Keep a Good Thing Going',
                'event_description' => 'The last meeting went wonderfully. Approximately 30 people attended, and the energy was high. Let\'s keep this momentum going foward. ',
                'event_image' => NULL,
                'event_date' => '2016-10-21 00:00:00',
                'starts_at' => '2016-10-21 11:30:00',
                'stops_at' => '2016-10-21 12:30:00',
                'created_at' => '2016-11-29 14:09:41',
                'updated_at' => '2016-12-16 07:49:04',
                'deleted_at' => NULL
            ], [
                'id' => 2,
                'slug' => 'txkug-monthly-meeting-2016-11-18',
                'venue_id' => 4,
                'event_name' => 'TxkUG Monthly Meeting',
                'event_title' => 'PowerShell: A Brief Primer',
                'event_description' => 'Phillip Watson, the systems administrator for Texarkana ISD, will be talking about learning beginning PowerShell and why it has become such an important part of systems administrators and developers’ toolkits. He will be sharing resources that you may find useful in your day-to-day tasks, as well as approaches that can make your entry into this scripting language a tad more painless. He will also be discussing the use of PowerShell in automation, something that many of us use in account and resource provisioning.',
                'event_image' => NULL,
                'event_date' => '2016-11-18 00:00:00',
                'starts_at' => '2016-11-18 11:30:00',
                'stops_at' => '2016-11-18 12:30:00',
                'created_at' => '2016-11-30 14:09:41',
                'updated_at' => '2016-12-16 07:48:44',
                'deleted_at' => NULL
            ], [
                'id' => 3,
                'slug' => 'txkug-monthly-meeting-2016-01-20',
                'venue_id' => 3,
                'event_name' => 'TxkUG Monthly Meeting',
                'event_title' => 'Less Pain, More Gain: Building a Web Application Using the Laravel Framework',
                'event_description' => 'Randy Rankin of Smith-Blair will present on <a href=\"https://www.laravel.com\" target=\"_blank\">Laravel</a> and how it can help you quickly and consistently deploy web apps that integrate with a wide array of third-party libraries.',
                'event_image' => NULL,
                'event_date' => '2017-01-20 00:00:00',
                'starts_at' => '2017-01-20 11:30:00',
                'stops_at' => '2017-01-20 12:30:00',
                'created_at' => '2016-12-02 10:18:53',
                'updated_at' => '2017-01-19 21:09:41',
                'deleted_at' => NULL
            ], [
                'id' => 4,
                'slug' => 'txkug-monthly-meeting-2016-12-16',
                'venue_id' => 8,
                'event_name' => 'TxkUG Monthly Meeting',
                'event_title' => 'PowerShell: A Deeper Look',
                'event_description' => 'Scott Smith of TAMU-Texarkana will be presenting on advanced use cases of PowerShell along with some more coding examples that members can take away to their organizations. He had been the systems administrator for Texarkana Water Utilities for many years and is now the systems administrator for Texas A&M University - Texarkana.',
                'event_image' => NULL,
                'event_date' => '2016-12-16 00:00:00',
                'starts_at' => '2016-12-16 11:30:00',
                'stops_at' => '2016-12-16 12:30:00',
                'created_at' => '2016-12-02 14:03:17',
                'updated_at' => '2016-12-07 15:39:09',
                'deleted_at' => NULL
            ], [
                'id' => 5,
                'slug' => 'leadership-meeting-2016-12-27',
                'venue_id' => 7,
                'event_name' => 'Leadership Meeting',
                'event_title' => 'Monthly TXKUG Leadership Meeting',
                'event_description' => 'Meeting topics to include December 2016 monthly meeting agenda check-in app and future speakers and topics.',
                'event_image' => NULL,
                'event_date' => '2016-12-07 00:00:00',
                'starts_at' => '2016-12-07 15:30:00',
                'stops_at' => '2016-12-07 15:45:00',
                'created_at' => '2016-12-02 14:45:40',
                'updated_at' => '2016-12-07 15:14:12',
                'deleted_at' => NULL
            ], [
                'id' => 6,
                'slug' => 'leadership-meeting-12-08-2016',
                'venue_id' => 7,
                'event_name' => 'Leadership Meeting',
                'event_title' => 'Monthly Leadership Meeting',
                'event_description' => 'Meeting topics to include: <br /><br />\r\n\r\nProposed changes to the TxkUG Charter<br />\r\nVoting for Steering Committee Change<br />\r\nNominations for Steering Committee<br />\r\nJanuary Meeting<br />\r\nJanuary Bi-City Community Meeting (Jan 19, 2017)<br />\r\nWebsite Platform Migration<br />\r\nMeet TxkUG Application Check in\r\n',
                'event_image' => NULL,
                'event_date' => '2016-12-08 00:00:00',
                'starts_at' => '2016-12-08 11:30:00',
                'stops_at' => '2016-12-08 12:30:00',
                'created_at' => '2016-12-07 15:15:05',
                'updated_at' => '2016-12-07 16:28:58',
                'deleted_at' => NULL
            ]
        ]);
    }
}
