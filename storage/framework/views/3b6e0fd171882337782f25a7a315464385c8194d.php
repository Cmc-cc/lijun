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
    <style>
        .btn4 {
  display: block;
    text-align: center;
    color: #fff;
    font-size: 16px;
    line-height: 40px;
    background: #d2b79c;
    border-radius: 10px;
    width: 200px;
    height: 40px;
    border: none;
    margin: 10px 300px;
    margin-bottom: 50px;
}
    </style>
</head>
<body>

<div class="body clear">
        <div class="pro-nr-bg">
            <div class="container">
                <div class="pro-xq">
                    <div>
                        <div class="pro-xq-bt">
                            <h2><?php echo e($data->title); ?></h2>
                            <span>时间：<?php echo e($data->date_desc); ?></span>
                        </div>
                        <div class="pro-cont">
                            
                                    
                                    
                            <h3 class="title t_1"><?php echo e($data->title); ?></h3>
                            <?php echo $data->title_content; ?>

                            <h3 class="title t_2">活动说明</h3>
                            <?php echo $data->content; ?>

                            <h3 class="title t_3">活动规则</h3>
                            <?php echo $data->rule_content; ?>

                        </div>
                        
                        <?php if($data->is_apply == 0): ?>
                                        <?php if($_member): ?>
                                                <input type="hidden" name="activity_id" value="<?php echo e($data->id); ?>" id="activity_id">
                                                <button type="button" class="btn4 ajax-submit-btn" id="fanshuic" >
                                                    申请活动
                                                </button>
                                        <?php else: ?>
                                            <button type="button" class="btn4 ajax-submit-btn"onclick="alert('请先登录')">
                                                申请活动
                                            </button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $('#fanshuic').click(function(){
        $.ajax({
            url:"<?php echo e(route('member.apply_activity')); ?>",
            type:'post',
            data:{activity_id:$('#activity_id').val()},
            success:function(data){
                alert(data.status.msg);
            }
        })
    })
</script>
<script type="text/javascript" src="/new/css/layer.js"></script>
