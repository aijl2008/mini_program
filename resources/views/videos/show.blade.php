@extends('layouts.app')

@section('content')


    <div id="page-content" class="single-page">
        <div class="container">
            <div class="row">
                <div id="main-content" class="col-md-8">
                    <video id="player-container-id" preload="auto" width="640" height="360" playsinline webkit-playsinline> playsinline webkit-playsinline>
                    </video>
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
        var player = TCPlayer('player-container-id', {
            //fileID: '{{ $row->url }}',
            fileID: '7447398157015849771',
            appID: '1256993030',
            //appID: '{!! config("vod.app_id") !!}'
        });
    </script>
@endsection