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
    ],
    function () {
        /**
         * 首页，仅测试
         */
        Route::get('/', function () {
            return redirect("videos");
        });
        /**
         * 视频列表
         */
        Route::resource("videos", "VideoController");
    });

/**
 * 公众号消息接口
 */
Route::any('/wechat', 'WeChatController@serve');