<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    protected $table = 'authorizations';
    protected $fillable = ['user_id', 'module_id', 'compose', 'edit', 'del', 'view', 'authorize_send'];
}
