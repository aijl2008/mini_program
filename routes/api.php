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


        Route::resource('my/videos', 'My\VideoController');
        Route::POST('my/videos/{video_id}/like', 'VideoController@like')->name('videos.like.store');
        Route::DELETE('my/videos/{video_id}/like', 'VideoController@unlike')->name('videos.like.destroy');
        Route::POST('my/users/{user_id}/follow', 'UserController@like')->name('users.follow.store');
        Route::DELETE('my/users/{user_id}/follow', 'UserController@unlike')->name('users.follow.destroy');

        Route::resource('my/followed', 'My\FollowController');
        Route::resource('my/liked', 'My\LikeController');
        Route::resource('my/profile', 'My\ProfileController');

        Route::Get('statistics', 'My\StatisticsController')->name('users.statistics.show');

    }
);
