<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class EventType extends Model
{
    protected $table = 'event_types';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'event_type',
    ];

    // Each event type can have many events
    public function events() {
        return $this->hasMany(Event::class,'event_type_id');
    }
}
