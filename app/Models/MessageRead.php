<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageRead extends Model
{
    protected $fillable = ['message_id', 'subscriber_id', 'status'];

    public function getReadStatusAttribute()
    {
        return $this->status=='1'? 'Read':'Unread';
    }

    public function getIsReadAttribute()
    {
        return $this->status=='0'?false:true;
    }

    public function message()
    {
        return $this->belongsTo('App\Models\Message');
    }

    public function subscriber()
    {
        return $this->belongsTo('App\Models\Subscriber');
    }
}
