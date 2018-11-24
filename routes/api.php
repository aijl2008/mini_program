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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    [
        //'middleware' => 'auth',
        'prefix' => '',
        'namespace' => 'Api',
        'as' => 'api.'
    ],
    function () {

        Route::get("qcloud/signature/vod", "QCloud\SignatureController@Vod")->name('qcloud.signature.vod');
        Route::get("wechat/signature/share", "WeChat\SignatureController@share")->name('wechat.signature.share');

        Route::resource('videos', 'VideoController');
        Route::resource('users', 'UserController');

        Route::group(
            [
                //'middleware' => 'auth',
                'prefix' => 'my',
                'namespace' => 'My',
                'as' => 'my.'
            ],
            function (){

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
