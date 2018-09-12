<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = ['client_id', 'user_id', 'created_by', 'profile', 'country_id'];//other details in user

    public function getGroupzAttribute()
    {
        return $this->groups()->pluck('groups.id')->toArray();
    }
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client', 'client_subscribers')->withTimestamps()->withPivot('id');
    }

    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group', 'group_subscribers',
            'subscriber_id', 'group_id')->withTimestamps()->withPivot('id');
    }

    public function messageIds(){
        return  $this->messageReads->pluck('message_id')->toArray();
    }

    public function messages(){
        $subscriber = $this;
        return Message::whereIn('id', $this->messageIds())
            ->with(['messageReads'=>function($query) use($subscriber){
            $query->where('subscriber_id', $subscriber->id);
        }])
            ->with(['groups'=>function($query) use($subscriber){
                $query->whereIn('groups.id', $subscriber->groupz);
            }])
            ->with('client')
            ->with('groupMessages')
            ->get();
    }

    public function readMessages()
    {
        $reads = $this->messageReads()->where('status', '1')->get()->pluck('message_id')->toArray();
        $subscriber = $this;
        $messages =  Message::whereIn('id', $reads)
            ->with(['messageReads'=>function($query) use($subscriber){
                $query->where('subscriber_id', $subscriber->id);
            }])
            ->with(['groups'=>function($query) use($subscriber){
                $query->whereIn('groups.id', $subscriber->groupz);
            }])
            ->with('client')
            ->with('groupMessages')
            ->get();
        return $messages;
    }
    public function unreadMessages()
    {
        $reads = $this->messageReads()->where('status', '0')->get()->pluck('message_id')->toArray();
        $subscriber = $this;
        $messages =  Message::whereIn('id', $reads)
            ->with(['messageReads'=>function($query) use($subscriber){
                $query->where('subscriber_id', $subscriber->id);
            }])
            ->with(['groups'=>function($query) use($subscriber){
                $query->whereIn('groups.id', $subscriber->groupz);
            }])
            ->with('client')
            ->with('groupMessages')
            ->get();
        return $messages;
    }

    public function hasMessage($message_id){
        return !empty($this->messageReadInfo($message_id));
    }


    public function messageReads()
    {
        return $this->hasMany('App\Models\MessageRead')->latest('created_at');
    }

    public function messageReadInfo($message_id)
    {
        return $this->messageReads()->where('message_id', $message_id)->first();
    }

    public function hasReadMessage($message_id)
    {
        return $this->messageReadInfo($message_id)->status=='1';
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function join_requests()
    {
        return $this->hasMany('App\Models\GroupRequest');
    }

    public function group($group_id){
        return $this->groups()->where('group_id', $group_id)->first();
    }
    public function hasGroup($group_id){
        return !empty($this->group($group_id));
    }

    public function groupRequest($group_id){
        return $this->join_requests()->where('group_id', $group_id)->first();
    }

    public function hasGroupRequest($group_id){
        return !empty($this->groupRequest($group_id));
    }
    #####################################
    public function tokens(){
        return $this->hasMany('App\Models\SubscriberToken');
    }

}
