<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QCloud VIDEO UGC UPLOAD SDK</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//v3.bootcss.com/assets/css/docs.min.css">
    <link href="//imgcache.qq.com/open/qcloud/video/tcplayer/tcplayer.css" rel="stylesheet">
    <script src="//imgcache.qq.com/open/qcloud/video/tcplayer/lib/hls.min.0.8.8.js"></script>
    <script src="//imgcache.qq.com/open/qcloud/video/tcplayer/tcplayer.min.js"></script>
</head>
<body>
<div class="bs-docs-header" id="content">
    <div class="container">
        <h1>UGC-Uploader</h1>
    </div>
</div>
<video id="player-container-id" width="414" height="270" preload="auto" playsinline webkit-playsinline>
</video>
<script type="text/javascript">
var player = TCPlayer('player-container-id', { // player-container-id 为播放器容器ID，必须与html中一致
fileID: '5285890783081494641', // 请传入需要播放的视频filID 必须
appID: '1258021496' // 请传入点播账号的appID 必须
});
</script>
</body>
</html>