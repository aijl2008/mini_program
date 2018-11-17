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
    <style type="text/css">
        .text-danger{
            color: red;
        }
        .control-label{
            text-align: left !important;
        }
        #resultBox {
            width: 100%;
            height: 300px;
            border: 1px solid #888;
            padding: 5px;
            overflow: auto;
            margin-bottom: 20px;
        }
        .uploaderMsgBox {
            width: 100%;
            border-bottom: 1px solid #888;
        }
        [act=cancel-upload]{
            text-decoration: none;
            cursor:pointer;
        }
    </style>
</head>
<body>
<div class="bs-docs-header" id="content">
    <div class="container">
        <h1>UGC-Uploader</h1>
    </div>
</div>
<div class="container bs-docs-container">
    <form id="form1">
        <input id="uploadVideoNow-file" type="file" style="display:none;"/>
    </form>
    <div class="row" style="padding:10px;">
        <h4>示例1：直接上传视频</h4>
        <a id="uploadVideoNow" href="javascript:void(0);" class="btn btn-outline">直接上传视频</a>
    </div>
    <div class="row" id="resultBox"></div>
</div>
<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- <script src="//imgcache.qq.com/open/qcloud/js/vod/crypto.js"></script> -->
<script src="//imgcache.qq.com/open/qcloud/js/vod/sdk/ugcUploader.js"></script>
<!-- <script src="//video.qcloud.com/signature/lib/ugcUploader.js"></script> -->
<script type="text/javascript">


    var index = 0;
    var cosBox = [];
    /**
     * 计算签名
     **/
    var getSignature = function(callback){
        $.ajax({
            url: 'http://127.0.0.1:8000/api/qcloud/vod/signature',
            type: 'GET',
            dataType: 'json',
            success: function(res){
                if(res.data && res.data.signature) {
                    callback(res.data.signature);
                } else {
                    return '获取签名失败';
                }

            }
        });
    };

    /**
     * 添加上传信息模块
     */

    var addUploaderMsgBox = function(type){
        var html = '<div class="uploaderMsgBox" name="box'+index+'">';
        if(!type || type == 'hasVideo') {
            html += '视频名称：<span name="videoname'+index+'"></span>；' +
                '计算sha进度：<span name="videosha'+index+'">0%</span>；' +
                '上传进度：<span name="videocurr'+index+'">0%</span>；' +
                'fileId：<span name="videofileId'+index+'">   </span>；' +
                '上传结果：<span name="videoresult'+index+'">   </span>；<br>' +
                '地址：<span name="videourl'+index+'">   </span>；'+
                '<a href="javascript:void(0);" name="cancel'+index+'" cosnum='+index+' act="cancel-upload">取消上传</a><br>';
        }

        if(!type || type == 'hasCover') {
            html += '封面名称：<span name="covername'+index+'"></span>；' +
                '计算sha进度：<span name="coversha'+index+'">0%</span>；' +
                '上传进度：<span name="covercurr'+index+'">0%</span>；' +
                '上传结果：<span name="coverresult'+index+'">   </span>；<br>' +
                '地址：<span name="coverurl'+index+'">   </span>；<br>' +
                '</div>'
        }
        html += '</div>';

        $('#resultBox').append(html);
        return index++;
    };

    /**
     * 示例1：直接上传视频
     **/
    $('#uploadVideoNow-file').on('change', function (e) {
        var num = addUploaderMsgBox('hasVideo');
        var videoFile = this.files[0];
        $('#result').append(videoFile.name +　'\n');
        var resultMsg = qcVideo.ugcUploader.start({
            videoFile: videoFile,
            getSignature: getSignature,
            allowAudio: 1,
            success: function(result){
                if(result.type == 'video') {
                    $('[name=videoresult'+num+']').text('上传成功');
                    $('[name=cancel'+num+']').remove();
                    cosBox[num] = null;
                } else if (result.type == 'cover') {
                    $('[name=coverresult'+num+']').text('上传成功');
                }
            },
            error: function(result){
                if(result.type == 'video') {
                    $('[name=videoresult'+num+']').text('上传失败>>'+result.msg);
                } else if (result.type == 'cover') {
                    $('[name=coverresult'+num+']').text('上传失败>>'+result.msg);
                }
            },
            progress: function(result){
                if(result.type == 'video') {
                    $('[name=videoname'+num+']').text(result.name);
                    $('[name=videosha'+num+']').text(Math.floor(result.shacurr*100)+'%');
                    $('[name=videocurr'+num+']').text(Math.floor(result.curr*100)+'%');
                    $('[name=cancel'+num+']').attr('taskId', result.taskId);
                    cosBox[num] = result.cos;
                } else if (result.type == 'cover') {
                    $('[name=covername'+num+']').text(result.name);
                    $('[name=coversha'+num+']').text(Math.floor(result.shacurr*100)+'%');
                    $('[name=covercurr'+num+']').text(Math.floor(result.curr*100)+'%');
                }

            },
            finish: function(result){
                $('[name=videofileId'+num+']').text(result.fileId);
                $('[name=videourl'+num+']').text(result.videoUrl);
                if(result.message) {
                    $('[name=videofileId'+num+']').text(result.message);
                }
            }
        });
        if(resultMsg){
            $('[name=box'+num+']').text(resultMsg);
        }
        $('#form1')[0].reset();
    });
    $('#uploadVideoNow').on('click', function () {
        $('#uploadVideoNow-file').click();
    });
    /*
     * 取消上传绑定事件，示例一与示例二通用
     */
    $('#resultBox').on('click', '[act=cancel-upload]', function() {
        var cancelresult = qcVideo.ugcUploader.cancel({
            cos: cosBox[$(this).attr('cosnum')],
            taskId: $(this).attr('taskId')
        });
        console.log(cancelresult);
    });

</script>
</body>
</html>