<?php
/**
 * 首页
 */
Route::get("/", "IndexController@index");
Route::get("/vue", "VueController@index");

new Illuminate\Routing\Router();
/**
 * 框架自带的用户模块
 */print_r(get_class(\Illuminate\Support\Facades\Auth::routes()));exit();
Route::group(
    ['prefix' => 'adm'],
    Auth::routes()
);


/**
 * 覆盖框架自带的用户模块
 */
Route::group(
    [
        //'middleware' => 'mock.user'
        //'middleware' => 'proxy.user'
    ],
    function () {
        Route::get('/login', 'WeChatAuthController@login')
            //->middleware('wechat.oauth:snsapi_userinfo')
            ->name('login');
        Route::get('/wechat/callback', 'WeChatAuthController@callback')
            //->middleware('wechat.oauth:snsapi_userinfo')
            ->name('wechat.callback');
        Route::get('/register', 'WeChatController@register')
            //->middleware('wechat.oauth:snsapi_userinfo')
            ->name('register');
    }
);

/**
 * "我的"页面组
 */
Route::group(
    [
        'middleware' => 'auth',
        'prefix' => 'my',
        "namespace" => "My",
        'as' => 'my.'
    ],
    function () {
        /**
         * 首页
         */
        Route::get("/", "VideoController@index");
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