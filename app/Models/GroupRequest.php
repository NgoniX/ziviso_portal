<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupRequest extends Model
{
    protected $fillable = ['group_id', 'subscriber_id'];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function subscriber()
    {
        return $this->belongsTo('App\Models\Subscriber');
    }
}
