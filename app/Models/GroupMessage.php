<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMessage extends Model
{
    protected $fillable = ['group_id', 'message_id'];

    public function message(){
        return $this->belongsTo('App\Models\Message');
    }

    public function group(){
        return $this->belongsTo('App\Models\Group');
    }
}
