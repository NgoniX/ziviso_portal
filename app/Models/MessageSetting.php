<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageSetting extends Model
{
    protected $fillable = ['name', 'description', 'status', 'client_id'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
