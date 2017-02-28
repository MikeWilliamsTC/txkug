<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class SendEventReminderToSlack extends Notification
{

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Event $event)
    {
        $this->event = $event;
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
        $url = url('/events/' . $this->event->slug);

        return (new SlackMessage)
            ->success()
            ->from('TXKUG Event Notification', ':spiral_calendar_pad:')
            ->to('#txkug-website-dev')
            ->content($this->event->event_type->event_type)
            ->attachment(function ($attachment) use ($url) {
                $attachment->title($this->event->event_type->event_type, $url)
                    ->fields([
                        'Title' => $this->event->event_title,
                        'Date' => $this->event->event_date->format('l F d, Y') . ' @ ' .  $this->event->starts_at->format('h:i A'),
                        'Location' => $this->event->venue->venue_name,
                ]);
        });
    }

}
