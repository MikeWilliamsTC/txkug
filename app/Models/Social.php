<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model {

    protected $table = 'social_logins';

    protected $fillable = [
       'title',
       'avatar_32',
       'avatar_192'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}