<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class UserHasCheckedInToMeeting extends Notification
{
    protected $user;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(\App\Models\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->success()
            ->from('TXKUG Admin', ':white_check_mark:')
            ->to('#meeting-checkins')
            ->content('TXKUG Meeting Check-in')
            ->attachment(function ($attachment) {
                $attachment->title($this->user->first_name . ' ' . $this->user->last_name . ' has checked in');
            });
    }
}
