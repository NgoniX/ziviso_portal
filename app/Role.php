<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 11/9/2017
 * Time: 9:32 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Klaravel\Ntrust\Traits\NtrustRoleTrait;

class Role extends Model
{
    use NtrustRoleTrait;
    /*
     * Role profile to get value from ntrust config file
     */
    protected static $roleProfile = 'user';
}