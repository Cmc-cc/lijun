<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/mb3/css/flexslider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/fonts/iconfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/mb3/css/rendezvous.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/mb3/css/index1.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/fonts/iconfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/mb3/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/vendor.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/member.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/yk_modal.css')); ?>">
    <script src="<?php echo e(asset('/web/js/jquery-2.1.3.min.js')); ?>"></script>
    <style>
        .header .container{
            width: 1200px;
        }
        .header_ft li>a{
            width: 157px;
        }
    </style>
</head>
<body>

<?php echo $__env->make('web.template.mb3.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div id="banner"></div>
<div class="member-container" style="background-color: #241d17">
    <div class="member-body">
        <div id="layout-top-area">
            <div class="sider-area"><span>会员中心</span></div>
            <ul class="nav-area">
                <li <?php if(in_array($web_route, ['member.userCenter', 'member.login_psw'])): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(route('member.userCenter')); ?>" data-menu="member"><span>会员资料</span></a>
                </li>
                <li <?php if(in_array($web_route, ['member.finance_center', 'member.ali_pay', 'member.qq_pay', 'member.bank_pay'])): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(route('member.finance_center')); ?>" data-menu="recharge"><span>在线存款</span></a></li>
                <li <?php if(in_array($web_route, ['member.member_drawing'])): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(route('member.member_drawing')); ?>" data-menu="draw"><span>在线取款</span></a></li>
                <li <?php if(in_array($web_route, ['member.indoor_transfer'])): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(route('member.indoor_transfer')); ?>" data-menu="exchange"><span>接口余额</span></a></li>
                <li <?php if(in_array($web_route, ['member.customer_report']) && request()->get('type') == 3): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(route('member.customer_report',['type'=>3])); ?>" data-menu="bet"><span>注单查询</span></a></li>
                <li <?php if(in_array($web_route, ['member.customer_report']) && request()->get('type') != 3): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(route('member.customer_report')); ?>" data-menu="money"><span>资金流水</span></a></li>
                <li <?php if(in_array($web_route, ['member.service_center', 'member.complaint_proposal', 'member.message_list'])): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(route('member.service_center')); ?>" data-menu="message"><span>服务中心</span></a></li>
            </ul>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>
<?php echo $__env->make('web.template.mb3.layouts.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.template.mb3.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('/web/mb3/js/jquery.flexslider.js')); ?>"></script>
<script src="<?php echo e(asset('/web/mb3/js/index1.js')); ?>"></script>
<script src="<?php echo e(asset('/web/mb3/js/common.js')); ?>"></script>
<script src="<?php echo e(asset('/web/mb3/js/yk_modal.js')); ?>"></script>
<script src="<?php echo e(asset('/web/mb3/js/jquery.SuperSlide.2.1.1.js')); ?>"></script>
<script src="<?php echo e(asset('/web/layer/layer.js')); ?>"></script>
<script src="<?php echo e(asset('/web/mb3/js/ajax-submit-form.js')); ?>"></script>
<script src="<?php echo e(asset('/web/mb3/js/rendezvous.js')); ?>"></script><!--日历-->
<script src="<?php echo e(asset('/web/mb3/js/jquery.page.js')); ?>"></script><!--翻页-->
<script src="<?php echo e(asset('/web/My97DatePicker/WdatePicker.js')); ?>"></script><!--起止时间日历 My97DatePicker-->
<?php echo $__env->yieldContent('after.js'); ?>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
</body>
</html>