<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['client_id', 'name', 'description', 'created_by', 'join_criteria'];

    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function subscribers()
    {
        return $this->belongsToMany('App\Models\Subscriber', 'group_subscribers')->withTimestamps();
    }

    public function messages()
    {
        return $this->belongsToMany('App\Models\Message', 'group_messages')->withTimestamps();
    }

    public function events()
    {
        return $this->belongsToMany('App\Models\Event', 'event_groups');
    }

    public function join_requests()
    {
        return $this->hasMany('App\Models\GroupRequest');
    }
}
