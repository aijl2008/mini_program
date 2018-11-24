@extends('layouts.app')
@section('content')
    <div id="page-content" class="index-page">
        <div class="container">
            @foreach($rows->get() as $row)
            <article>
                <a href="#"><h2 class="vid-name">{{$row->avatar}}</h2></a>
                <div class="info">
                    <h5>By <a href="#">{{$row->avatar}}</a></h5>
                    <span><i class="fa fa-calendar"></i> June 12, 2015</span>
                    <span><i class="fa fa-comment"></i> 0 Comments</span>
                    <span><i class="fa fa-heart"></i>1,200</span>
                    <ul class="list-inline">
                        <li><a href="#" style="text-decoration: underline;color:#333;">Rate</a></li>
                        <li> - </li>
                        <li>
									<span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</span>
                        </li>
                    </ul>
                </div>
                <div class="wrap-vid">
                    <div class="zoom-container">
                        <div class="zoom-caption">
                            <span>Video's Tag</span>
                            <a href="single.html">
                                <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                            </a>
                            <p>Video's Name</p>
                        </div>
                        <img src="/images/8.jpg">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor inviduntut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.justo duo dolores et ea rebum. Consetetur sadipscing elitr,  consetetur sadipscing elitr elitr. <a href="#">MORE...</a></p>
                </div>
            </article>
            @endforeach

            <div class="row">
                <div class="featured">
                    <div class="main-vid">
                        @foreach([] as $row)
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



@section('js')

    <script type="text/javascript">
        function ls(page = 1) {
            $.ajax(
                {
                    url: '/api/my/followed?page=' + page,
                    type: "get",
                    dataType: "json",
                    success: function (res) {
                        var videos = new Array();
                        $.each(res.data.data, function (idx, item) {
                            var template = '<div class="col-md-6">';
                            template += '<div class="zoom-container">';
                            template += '<div class="zoom-caption">';
                            template += '<span>' + item.id + '</span>';
                            template += '<a href="/my/videos/' + item.id + '">';
                            template += '<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>';
                            template += '</a>';
                            template += '<p>' + item.title + '</p>';
                            template += '</div>';
                            template += '<img style="width:854px; height:487px" src="' + item.cover_url + '"/>';
                            template += '</div>';
                            template += '</div>';
                            videos.push(template);
                        });
                        console.log(videos.join());
                        $('.main-vid').append(videos.join());
                    },
                    error: function (res, err) {
                        alert('加载失败:' + err);
                    }
                }
            );
        }

        var page = 1;
        ls(page);
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() + 1 >= $(document).height()) {
                page++;
                ls(page);
            }
        });
    </script>
@endsection