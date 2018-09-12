<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 11/9/2017
 * Time: 9:34 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Klaravel\Ntrust\Traits\NtrustPermissionTrait;

class Permission extends Model
{
    use NtrustPermissionTrait;
    /*
     * Role profile to get value from ntrust config file
     */
    protected static $roleProfile = 'user';
}