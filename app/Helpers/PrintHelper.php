<?php
/**
 * Created by PhpStorm.
 * User: Fradrick.Charakupa
 * Date: 10/22/2016
 * Time: 3:48 PM
 */

namespace App\Helpers;


class PrintHelper
{
    public static function normal_static_info($name, $value, $col_md=3)
    {
        $value = is_null($value)?'N/A':$value;
        echo $string =
            '<tr class="static-info" style="border: none !important;">
                <td class="col-md-4 col-sm-'.$col_md.' name" style="border: none !important;">
                    '.$name.':
                </td>
                <td class="value" style="border: none !important;">
                    '.$value.'
                </td>
            </tr>';
    }

    public static function reverse_static_info($name, $value, $col_md=2)
    {
        $value = is_null($value)?'N/A':$value;
        echo $string =
            '<tr class="static-info">
                <td class="col-md-'.$col_md.' value" style="border: none !important;">
                    '.$name.':
                </td>
                <td class="name" style="border: none !important;">
                    '.$value.'
                </td>
            </tr>';
    }

}