<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientUser extends Model
{
    protected $fillable = ['client_id', 'user_id'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
