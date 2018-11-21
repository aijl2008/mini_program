@extends('layouts.app')

@section('content')
    <video id="player-container-id" width="414" height="270" preload="auto" playsinline webkit-playsinline>

    </video>
    <div class="social-share" data-initialized="true">
        <a href="#" class="social-share-icon icon-weibo"></a>
        <a href="#" class="social-share-icon icon-qq"></a>
        <a href="#" class="social-share-icon icon-qzone"></a>
    </div>
    <div class="social-share" data-mode="prepend">
        <a href="javascript:;" class="social-share-icon icon-heart"></a>
    </div>
    <script type="text/javascript">
        var player = TCPlayer('player-container-id', { // player-container-id 为播放器容器ID，必须与html中一致
            fileID: '5285890783081494641', // {{ $row->url }}请传入需要播放的视频filID 必须
            appID: '{!! config("vod.app_id") !!}' // 请传入点播账号的appID 必须
        });
    </script>
@endsection