<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get("user/upload","User\UploadController@create");

Route::get("api/qcloud/vod/signature","Api\QCloud\VodController@signature");

Route::resource("user/video","User\VideoController");