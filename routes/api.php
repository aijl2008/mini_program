<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(
    [
        'prefix' => '',
        'namespace' => 'Api',
        'as' => 'api.'
    ], function () {
    Route::post('login', 'UserController@login')->name('login');
    Route::post('register', 'UserController@store')->name('register');
});


Route::any('mini_program/token', 'Api\MiniProgramController@token')->name('api.mini_program.token');

Route::group(
    [
        'middleware' => 'auth:api',
        'prefix' => '',
        'namespace' => 'Api',
        'as' => 'api.'
    ],
    function () {

        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::get("qcloud/signature/vod", "QCloud\SignatureController@Vod")->name('qcloud.signature.vod');
        Route::get("wechat/signature/share", "WeChat\SignatureController@share")->name('wechat.signature.share');

        Route::resource('videos', 'VideoController');
        Route::resource('users', 'UserController');

        Route::group(
            [
                'prefix' => 'my',
                'namespace' => 'My',
                'as' => 'my.'
            ],
            function () {

                Route::resource("videos", "VideoController");
                Route::resource('followed', 'FollowController');
                Route::resource('liked', 'LikeController');
                Route::get('profile', 'ProfileController@index')->name('profile.show');
                Route::patch('profile', 'ProfileController@update')->name('profile.update');
            }
        );


        Route::Get('statistics', 'My\StatisticsController')->name('users.statistics.show');

    }
);
