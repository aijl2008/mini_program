<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {

    $Client = new \GuzzleHttp\Client();

    $secret_id = 'AKIDQkCVchFLyUt9HDFXyJVaYegWAdx6FoNz';
    $secret_key = 'Op7MVbXIrFTt13wdAWgehTBJI5iGk3A5';


    $api = [
        'scheme' => 'https://',
        'host' => 'vod.api.qcloud.com',
        'path' => '/v2/index.php'
    ];

    $common_params = [
        "SecretId" => $secret_id,
        "Timestamp" => time(),
        "Nonce" => rand(),
        "Region" => "bj",
        "SignatureMethod" => "HmacSHA256"
    ];

    $query = [
        "Action" => "ApplyUpload",
        "videoType" => "mp4"
    ];

    $params = array_merge($common_params, $query);

    ksort($params);
    $signature_original_string = "GET{$api['host']}{$api['path']}?" . http_build_query($params);
    $signature = base64_encode(hash_hmac('sha256', $signature_original_string, $secret_key, true));

    $url = implode("", $api) . "?" . http_build_query(array_merge($params, ['Signature' => $signature]));

    $applyUpload = json_decode($Client->get($url)->getBody()->getContents());

    dump($applyUpload);

    $res = $Client->request('POST', "https://{$applyUpload->storageRegion}.file.myqcloud.com/files/v2/{$applyUpload->storageAppId}/{$applyUpload->storageBucket}{$applyUpload->video->storagePath}", [
        'headers' => [
            'sign' => $applyUpload->video->storageSignature
        ]
    ]);
    dump(json_decode($res->getBody()->getContents()));

    exit();


    $query = [
        "Action" => "GetVideoInfo",
        "fileId" => "5285890783189636589"
    ];




})->describe('Display an inspiring quote');
