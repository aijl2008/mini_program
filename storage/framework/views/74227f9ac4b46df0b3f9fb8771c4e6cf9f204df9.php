<?php $__env->startSection('content'); ?>
<style>

    
</style>

    <div id="page-content" class="single-page">
        <div class="container">
            <div class="row">
                <div id="main-content" class="col-md-8">
                    <div class="upload"><span style="opacity: 0; height: 1px;">[], []</span>
                        <div id="drop_zone" class="upload-content upload-empty">
                            <div class="upload-empty-icon"><i class="icon-upload-large"></i><h4>点击上传长视频</h4>
                                <p>或者拖拽文件到此处上传</p></div>
                        </div>
                        <input multiple="multiple" id="upload_input" type="file"
                               style="opacity: 0; visibility: hidden;"></div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>


<script src="//imgcache.qq.com/open/qcloud/js/vod/sdk/ugcUploader.js"></script>
<script type="text/javascript">


    var index = 0;
    var cosBox = [];
    /**
     * 计算签名
     **/
    var getSignature = function (callback) {
        $.ajax({
            url: '<?php echo e(route("api.qcloud.signature.vod")); ?>',
            type: 'GET',
            dataType: 'json',
            success: function (res) {
                if (res.data && res.data.signature) {
                    callback(res.data.signature);
                } else {
                    return '获取签名失败';
                }

            }
        });
    };


    $('#uploadVideoNow').on('click', function () {
        $('#uploadVideoNow-file').click();
    });


</script>
</body>
</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>