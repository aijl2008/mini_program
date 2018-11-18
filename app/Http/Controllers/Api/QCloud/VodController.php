<?php

namespace App\Http\Controllers\Api\QCloud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VodController extends Controller
{
    function signature()
    {
        return [
            "code" => 200,
            "msg" => "Ok",
            "data" => [
                "signature" => $this->getSignature()
            ]
        ];
    }

    function getSignature()
    {
        $secret_id = "AKIDQkCVchFLyUt9HDFXyJVaYegWAdx6FoNz";
        $secret_key = "Op7MVbXIrFTt13wdAWgehTBJI5iGk3A5";

        /**
         * 确定签名的当前时间和失效时间
         * 签名有效期：1天
         */
        $current = time();
        $expired = $current + 86400;

        /**
         * 向参数列表填入参数
         */
        $arg_list = array(
            "secretId" => $secret_id,
            "currentTimeStamp" => $current,
            "expireTime" => $expired,
            "random" => rand());

        /**
         * 计算签名
         */
        $original = http_build_query($arg_list);
        $signature = base64_encode(hash_hmac('SHA1', $original, $secret_key, true) . $original);

        return $signature.PHP_EOL;
        //return "BygpEoZ9zZWNyZXRJZD1BS0lEbVc1VVFSYUF6bVJ2Slpzcm5vMTRCUnBBUVZlMUlvOVYmY3VycmVudFRpbWVTdGFtcD0xNTQyNDY0MjU2JmV4cGlyZVRpbWU9MTU0MjU1MDY1NiZwcm9jZWR1cmU9WElBT1pISUJPLURFRkFVTFQmcmFuZG9tPTE3MjkzODA4MzQ=";
    }
}
