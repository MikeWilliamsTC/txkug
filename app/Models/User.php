<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Notifiable, Sluggable, SluggableScopeHelpers;

    protected $table = 'users';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name']
            ]
        ];
    }

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token'];

    // Each User is a participant  (participates in)
    public function participations() {
        return $this->hasMany(
            Participant::class, 'user_id'
        );
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

    public function hasRole($name)
    {
        foreach($this->roles as $role)
        {
            if($role->name == $name) return true;
        }

        return false;
    }

    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

    public function social()
    {
        return $this->hasOne('App\Models\Social');
    }

    public function routeNotificationForSlack()
    {
        return env('SLACK_WEBHOOK_URL');
    }

    public function getNameAttribute($value)
    {
        $name = $value.$this->first_name. ' ' . $value.$this->last_name;
        return $name;
    }
}
