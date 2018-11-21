<?php
/**
 * Created by PhpStorm.
 * User: artron
 * Date: 2018/11/21
 * Time: 19:46
 */

namespace App;


class Helper
{
    static function uid(){
        return "1";
    }

    static function success($data=""){
        return [
            'code' => 0,
            'data' => $data
        ];
    }
}