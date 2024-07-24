<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="keywords" content="<?php echo e($_system_config->keyword); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/flexslider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/index1.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/qqq5595.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/yk_modal.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/fonts/iconfont.css')); ?>">
    <script src="<?php echo e(asset('/web/js/jquery-2.1.3.min.js')); ?>"></script>
</head>
<body>

<?php echo $__env->make('web.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('web.layouts.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="notice_layer">
    <h3>公告详情 <span class="close"></span></h3>
    <div class="notice_con">
        <?php $__currentLoopData = $_system_notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="module">
                <h4><?php echo e($v->title); ?></h4>
                <p>✿<?php echo e($v->content); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<script src="<?php echo e(asset('/web/js/jquery.flexslider.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/index1.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/yk_modal.js')); ?>"></script>
<script src="<?php echo e(asset('/web/layer/layer.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/ajax-submit-form.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/jquery.lazyload.min.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/jquery.fly.min.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/common.js')); ?>"></script>
<?php echo $__env->yieldContent('after.js'); ?>
<script>


    (function ($) {
        $(function () {

            //公告
            $('#mar0').on('click', function () {
                var notice_index = layer.open({
                    type: 1,
                    title: false,
                    closeBtn: 0,
                    area: ['680px'],
                    skin: 'layui-layer-nobg', //没有背景色
                    shadeClose: true,
                    content: $('.notice_layer')
                });

                $('.notice_layer').on('click', '.close', function () {
                    layer.close(notice_index)
                })
            })

        })
    })(jQuery)
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>