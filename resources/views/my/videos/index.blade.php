@extends('layouts.app')

@section('content')
    <div id="page-content" class="index-page">
        <div class="container">
            <div class="row">
                <div class="featured">
                    <div class="main-vid">
                        @foreach($rows as $row)
                        <div class="col-md-6">
                            <div class="zoom-container">
                                <div class="zoom-caption">
                                    <span>click_number{{$row->click_number}}</span>
                                    <a href="{{ route("my.videos.show", $row->id) }}">
                                        <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                                    </a>
                                    <p>{{$row->title}}</p>
                                </div>
                                <img src="/images/1.jpg"/>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection