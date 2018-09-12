<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_id','client_id', 'title', 'details', 'status', 'target', 'authorized', 'type'];

    //message is sent to individuals, or groups
    //let a list of users or groups with check boxes appear when selecting recipients
    //if message is send to individuals track who is who from MessageReads table
    //if message is sent to groups, track who is who from group_messages

    public function getStatAttribute()
    {
        return $this->status=='0'?'Not sent':'Sent';
    }

    public function getShortContentAttribute(){
        return substr($this->details, 0, 20);
    }

    public function getGroupzAttribute()
    {
        return $this->groups()->pluck('groups.id')->toArray();
    }

    public function user()
    {
        return $this->belongsTo('App\user');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function messageReads()
    {
        return $this->hasMany('App\Models\MessageRead');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group', 'group_messages')->withTimestamps();
    }

    public function groupMessages(){
        return $this->hasMany('App\Models\GroupMessage');
    }

    public function subscribers(){
        $groups = $this->groups()->pluck('groups.id')->toArray();
        return Subscriber::whereHas('groups', function ($query) use ($groups){
            $query->whereIn('groups.id', $groups);
        })->get();
    }

    public function subscriberTokens(){
        $subscriber_ids = $this->subscribers()->pluck('id')->toArray();
        return SubscriberToken::whereHas('subscriber', function ($query) use($subscriber_ids){
            $query->whereIn('subscribers.id', $subscriber_ids);
        })->get();
    }

    public function tokensArray(){
        return $this->subscriberTokens()->pluck('token')->toArray();
    }
}
