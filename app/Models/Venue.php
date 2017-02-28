<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Sluggable;

class Venue extends Model
{
    use SoftDeletes, Sluggable, SluggableScopeHelpers;

    protected $table = 'venues';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'venue_name'
            ]
        ];
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'lat' => 'float',
        'lng' => 'float'
    ];
    
    protected $fillable = [
        'venue_name',
        'venue_note',
        'street_address',
        'city',
        'state',
        'zip_code',
        'lat',
        'lng',
    ];

    // Each Venue can have many events, past, present and future
    public function events() {
        return $this->hasMany(
            Event::class, 'venue_id'
        );
    }

    // Each Venue can have many events
    public function eventsCurrent() {
        return $this->hasMany(
            Event::class, 'venue_id'
        );
    }

    // Each venue's events can have many participants
    public function attendees() {
        return $this->hasManyThrough(
            Attendee::class, Event::class,
            'venue_id', 'event_id'
        );
    }

    public static function boot()
    {
        parent::boot();

        /*
         *  Cause the deletion of a venue to cascade to events
         */
        static::deleted(function($venue)
        {
            $venue->attendees()->delete();
            $venue->events()->delete();
        });
    }

}