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
        'middleware' => 'auth',
        'namespace' => 'Api',
        'prefix' => '',
        'as' => 'api.'
    ],
    function () {

        Route::get("qcloud/signature/vod", "Api\QCloud\SignatureController@Vod");
        Route::get("wechat/signature/share", "Api\WeChat\SignatureController@share");

        Route::resource('videos', 'VideoController');
        Route::POST('videos/{video_id}/like', 'VideoController@like');
        Route::DELETE('videos/{video_id}/like', 'VideoController@unlike');
        Route::POST('users/{user_id}/follow', 'UserController@like');
        Route::DELETE('users/{user_id}/follow', 'UserController@unlike');

        Route::resource('followed', 'My/FollowController');
        Route::resource('liked', 'My/LikeController');
        Route::resource('profile', 'My/ProfileController');

        //Route::Get('statistics', 'StatisticsController');

    }
);
