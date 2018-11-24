<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Welcome to KOOLTUBE!</title>

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//v3.bootcss.com/assets/css/docs.min.css">
    <link href="//imgcache.qq.com/open/qcloud/video/tcplayer/tcplayer.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//imgcache.qq.com/open/qcloud/video/tcplayer/lib/hls.min.0.8.8.js"></script>
    <script src="//imgcache.qq.com/open/qcloud/video/tcplayer/tcplayer.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/css/share.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/js/social-share.min.js"></script>

    <?php echo $__env->yieldContent('js'); ?>
</head>
<body>

<header>

    <nav id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <strong>乡土味视频</strong>
                </div>
                <div class="col-md-6 col-sm-6">
                    <ul class="list-inline top-link link">
                        <li><a href="/my"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="/my/profile"><i class="fa fa-comments"></i> 个人中心</a></li>
                        <img alt="<?php echo e($user->name); ?>" style="width: 32px" src="<?php echo e($user->avatar); ?>">
                    </ul>

                </div>
            </div>
        </div>
    </nav>

    <nav id="menu" class="navbar">
        <div class="container">
            <div class="navbar-header"><span id="heading" class="visible-xs">Categories</span>
                <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/my"><i class="fa fa-home"></i> 首页</a></li>
                    <li><a href="/my/followed"><i class="fa fa-user"></i> 关注</a></li>
                    <li><a href="/my/liked"><i class="fa fa-play-circle-o"></i> 收藏</a></li>
                    <li><a href="<?php echo e(route('my.videos.create')); ?>"><i class="fa fa-cubes"></i> 上传视频</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="header-slide">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</header>


</body>
</html>
