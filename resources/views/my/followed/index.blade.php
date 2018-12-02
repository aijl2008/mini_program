@extends('layouts.app')
@section('content')
    <div id="page-content" class="index-page">
        <div class="container">
            
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