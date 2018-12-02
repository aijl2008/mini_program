<?php

/**
 * 小程序快捷登录
 */
Route::any('mini_program/token', 'Api\MiniProgramController@token')->name('api.mini_program.token');

Route::group(
    [
        'middleware' => 'auth:api',
        'prefix' => '',
        'namespace' => 'Api',
        'as' => 'api.'
    ],
    function () {
        /**
         * 显示小程序当前用户，方便token测试
         */
        Route::any('mini_program/user', 'MiniProgramController@user')->name('mini_program.user');
        /**
         * VOD上传签名
         */
        Route::get("qcloud/signature/vod", "QCloud\SignatureController@Vod")->name('qcloud.signature.vod');

        /**
         * 分享签名
         */
        Route::get("wechat/signature/share", "Wechat\SignatureController@share")->name('wechat.signature.share');

        /**
         * 视频分类
         */
        Route::resource('classifications', 'ClassificationController', [
            'only' => ['index']
        ]);

        /**
         * 全部视频
         */
        Route::resource('videos', 'VideoController');

        /**
         * 全部用户
         */
        Route::resource('users', 'WeChatController');

        Route::group(
            [
                'prefix' => 'my',
                'namespace' => 'My',
                'as' => 'my.'
            ],
            function () {
                /**
                 * 我的视频
                 */
                Route::resource("videos", "VideoController");
                /**
                 *  我关注的
                 */
                Route::resource('followed', 'FollowController');
                /**
                 * 我喜欢的
                 */
                Route::resource('liked', 'LikeController');

                /**
                 * 个人资料显示与修改
                 */
                Route::get('profile', 'ProfileController@index')->name('profile.show');
                Route::patch('profile', 'ProfileController@update')->name('profile.update');
            }
        );

        /**
         * 统计
         */
        Route::Get('statistics', 'My\StatisticsController')->name('users.statistics.show');

    }
);
