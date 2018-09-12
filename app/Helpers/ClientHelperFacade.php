<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 9/10/2017
 * Time: 1:25 PM
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Facade;

class ClientHelperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'client';
    }
}