@extends('layouts.app')

@section('content')


    <div id="page-content" class="single-page">
        <div class="container">
            <div class="row">
                <div id="main-content" class="col-md-8">
                    <div class="wrap-vid">
                        <video id="player-container-id" style="width: 100%" preload="auto" playsinline webkit-playsinline>
                        </video>
                    </div>
                    <div class="share">
                        <div class="social-share" data-mode="prepend">
                            <a href="javascript:;" class="social-share-icon icon-heart"></a>
                        </div>
                    </div>
                    <div class="line"></div>
                    <h1 class="vid-name"><a href="#">{{$row->title}}</a></h1>
                    <div class="info">
                        <h5>By <a href="#">Kelvin</a></h5>
                        <span><i class="fa fa-calendar"></i>{{$row->uploaded_at}}</span>
                        <span><i class="fa fa-heart"></i>{{$row->liked_number}}</span>
                    </div>
                    <div class="vid-tags">
                        <a href="#">Animal</a>
                        <a href="#">Aenean</a>
                        <a href="#">Feugiat</a>
                        <a href="#">Risus</a>
                        <a href="#">Magna</a>
                    </div>
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        var player = TCPlayer('player-container-id', { // player-container-id 为播放器容器ID，必须与html中一致
            fileID: '{{ $row->url }}', // 请传入需要播放的视频filID 必须
            appID: '{!! config("vod.app_id") !!}' // 请传入点播账号的appID 必须
        });
    </script>
@endsection