<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $table = 'attendees';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'event_id',
        'user_id',
    ];

    // Each Participant belongs to [is] one user
    public function user() {
        return $this->belongsTo(
            User::class, 'user_id'
        )->orderBy('last_name');
    }

    // Each Participant attended events
    public function events() {
        return $this->belongsTo(
            Event::class, 'event_id'
        );
    }
}
