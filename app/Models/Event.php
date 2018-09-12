<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'details', 'client_id', 'user_id', 'start_time', 'end_time'];
    protected $dates = ['created_at', 'updated_at', 'start_time', 'end_time'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group', 'event_groups')->withTimestamps();
    }

    public function eventGroups(){
        return $this->hasMany("App\Models\EventGroup");
    }

    public function getGroupzAttribute()
    {
        return $this->groups()->pluck('groups.id')->toArray();
    }

    public function user()
    {
       return $this->belongsTo('App\User');
    }
}
