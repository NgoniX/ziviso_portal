<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriberToken extends Model
{

    protected $fillable = ['token','user_id', 'client_id'];

    public function subscriber()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
