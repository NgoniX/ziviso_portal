<?php
/**
 * Created by PhpStorm.
 * User: Fradrick.Charakupa
 * Date: 1/16/2017
 * Time: 9:57 AM
 */

namespace App\Helpers;


use App\Models\Client;
use Illuminate\Http\Request;

class Upload
{
    private static $instance;

    public static function getInstance()
    {
        return is_null(self::$instance)?new self():self::$instance;
    }

    public function saveClientLogo(Request $request, Client $client, $file='logo')
    {
        if ($request->hasFile($file)) {
            if ($request->file($file)->isValid()) {
                $file_name = $client->id.'.'.$request->file($file)->getClientOriginalExtension();
                $path = $request->file($file)->move(public_path('storage/logos/'), $file_name);
                $client->update([$file => 'storage/logos/'.$file_name]);
            }
        }
    }
}