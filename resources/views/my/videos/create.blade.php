@extends('layouts.app')

@section('content')
    <div id="page-content" class="single-page">
        <div class="container">
            <div class="row">
                <div id="main-content" class="col-md-8">

                    <form class="form-horizontal" id="form">
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">请输入视频名称</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">谁可以看</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="visibility" id="optionsRadios1" value="1" checked>
                                        任何人都可以看
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="visibility" id="optionsRadios2" value="2">
                                        关注我的人可以看
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="visibility" id="optionsRadios3" value="3">
                                        只有我自己可以看
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">上传进度</label>
                            <div class="col-sm-10">
                                <p class="form-control-static" id="process"></p>
                            </div>
                        </div>

                        <div class="form-group hidden">
                            <label class="col-sm-2 control-label">video</label>
                            <div class="col-sm-10">
                                <input type="file" name="video" id="video" class="form-control">
                            </div>
                        </div>

                        <div class="form-group hidden">
                            <label class="col-sm-2 control-label">URL</label>
                            <div class="col-sm-10">
                                <input type="text" name="url" id="url" class="form-control">
                            </div>
                        </div>

                        <div class="form-group hidden">
                            <label class="col-sm-2 control-label">file_id</label>
                            <div class="col-sm-10">
                                <input type="text" name="file_id" id="file_id" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button id="selectFile" type="button" class="btn" style="background-color:#fd0005">
                                    选择视频文件
                                </button>
                                <button id="uploadFile" type="button" class="btn btn-primary">开始上传</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script src="//imgcache.qq.com/open/qcloud/js/vod/sdk/ugcUploader.js"></script>
    <script type="text/javascript">
        $(function () {
            var file;
            /**
             * 计算签名
             **/
            var getSignature = function (callback) {
                $.ajax({
                    url: '{{route("api.qcloud.signature.vod")}}',
                    type: 'GET',
                    dataType: 'json',
                    success: function (res) {
                        if (res.data && res.data.signature) {
                            callback(res.data.signature);
                        } else {
                            alert('获取签名失败');
                            return null;
                        }
                    },
                    error: function (res, err) {
                        alert('获取签名失败:' + err);
                    }
                });
            };


            var startUploader = function (file) {
                var resultMsg = qcVideo.ugcUploader.start({
                    videoFile: file,
                    getSignature: getSignature,
                    allowAudio: 0,
                    success: function (result) {
                    },
                    error: function (result) {
                        alert("上传失败" + result.msg);
                    },
                    progress: function (result) {
                        console.log(result);
                        $("#process").html(Math.floor(result.shacurr * 100) + '%');
                    },
                    finish: function (result) {
                        $("#url").val(result.videoUrl);
                        $("#file_id").val(result.fileId);
                        $.ajax({
                            url: '{{route("api.my.videos.store")}}',
                            type: 'POST',
                            data: $("#form").serialize(),
                            dataType: 'json',
                            success: function (res) {
                                if (res && res.code && res.code == 0){
                                    alert("上传成功");
                                    window.location.href = "{{route('my.videos.index')}}";
                                }
                                else{
                                    if (res.msg){
                                        alert("保存视频失败,"+res.msg);
                                    }
                                    else{
                                        alert("保存视频失败");
                                    }
                                }
                            },
                            error: function (res, err) {
                                alert('发布视频失败:' + err);
                            }
                        });
                    }
                });
            };

            $('#uploadFile').on('click', function () {
                var secretId = $('#secretId').val();
                var secretKey = $('#secretKey').val();
                startUploader(file);
            });

            $('#video').on('change', function (e, a, b) {
                file = this.files[0];
                $("#title").val(file.name);
                $("#process").html("请点击上传按钮");
            });
            $('#selectFile').on('click', function () {
                $('#video').click();
            });
        })
    </script>

    @endsection
    </body>
    </html>