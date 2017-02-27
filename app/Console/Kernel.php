<?php

namespace App\Console;

use App\Notifications\SendEventReminderToSlack;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Social;
use App\Models\Event;
use Carbon\Carbon;
use Mail;


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

        // Schedule for Updating User tables with Slack Data
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
        })->daily();
<<<<<<< HEAD

        // Schedule for Sending Event Notifications to Slack Channel
        $schedule->call(function() {

            $event = Event::with('venue')
                ->where('stops_at', '>=', Carbon::now()->toDateTimeString())
                ->orderBy('stops_at')
                ->first();

            if ( $event->count() > 0 ) {
                $user = \App\Models\User::find(1);
                $user->notify(new SendEventReminderToSlack($event));
            }

        })->weekly()->mondays()->at('13:30');

=======
>>>>>>> d622301d72111a966cbc041a74bee801cb75f312
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
