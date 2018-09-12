<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 1/12/2017
 * Time: 8:19 AM
 */

namespace App\Http\Controllers\Auth;


class Json
{
    public static function response($data = null, $message = null)
    {
        return [
            'data'    => $data,
            'message' => $message,
        ];
    }
}