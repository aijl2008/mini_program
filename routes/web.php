<?php
/**
 * 登录与注册
 */
Route::group(
    [
        //'middleware' => 'mock.user'
    ],
    function () {
        Route::middleware('wechat.oauth:snsapi_userinfo')
            ->group(function () {
                Route::get('/login', 'SelfAuthController@autoLogin')->name('login');
            }
            );
        Route::middleware('wechat.oauth:snsapi_userinfo')
            ->group(function () {
                Route::get('/register', 'SelfAuthController@autoRegister')->name('register');
            }
            );
    });

Route::group(
    [
        //'middleware' => 'auth'
        'prefix' => 'my',
        "namespace" => "My",
        'as' => 'my.'
    ],
    function () {
        /**
         * 首页，仅测试
         */
        Route::get('/', function () {
            return redirect("my/videos");
        });
        /**
         * 视频列表
         */
        Route::resource("videos", "VideoController");
        Route::resource('followed', 'FollowController');
        Route::resource('liked', 'LikeController');

        Route::post('profile/upload', 'ProfileController@upload');
        Route::resource('profile', 'ProfileController');



        Route::Get('statistics', 'StatisticsController')->name('statistics.show');
    });

/**
 * 公众号消息接口
 */
Route::any('/wechat', 'WeChatController@serve')->name('wechat.serve');