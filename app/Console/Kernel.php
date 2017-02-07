<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use SlackAPI;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {
            $socials = Social::get();
            $socials->map(function ($social) {
                $response = SlackApi::execute('users.info', ['user' => $social->social_id]);

                if( ! empty($response['user']['profile']['title'])){
                    $title = $response['user']['profile']['title'];
                } else {
                    $title = NULL;
                }

                $social->update([
                    'title' => $title,
                    'avatar_32' => $response['user']['profile']['image_32'],
                    'avatar_192' => $response['user']['profile']['image_192'],
                ]);
            });
        })->everyFiveMinutes();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
