<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="/new0404/js/jquery.min.js"></script>
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <link rel="stylesheet" href="/new0404/pc/css/normalize.css">
    <link rel="stylesheet" href="/new0404/pc/css/main.css">
    <link rel="stylesheet" type="text/css" href="/new0404/pc/css/acc.css">
    <link rel="stylesheet" href="/new0404/pc/css/register.css">
    <link rel="stylesheet" href="/new0404/pc/css/activity.css">
    <link rel="stylesheet" href="/new0404/pc/css/loadingTrack.css">
    <link rel="stylesheet" href="/new0404/pc/css/loading.css">
    <link rel="stylesheet" href="/new0404/pc/css/main-1440.css" media="screen and (max-width:1600px)">
    <link rel="stylesheet" href="/new0404/pc/css/language_tw.css" id="languageCss">
    <script src="/new0404/js/jquery-ui.js"></script>
    <script src="/new0404/js/jquery.marquee.min.js"></script>
    <script src="/new0404/js/jquery.knob.js"></script>
    <script src="/new0404/js/modernizr.custom.js"></script>
    <script src="/new0404/js/ImgPreload.js"></script>
    <script src="/new0404/js/banner.js"></script>
    <script src="/new0404/js/script.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('body').on('click', '.activity-box-header', function () {
                $(this).parents(".activity-content").siblings().find(".activity-box-body").hide();
                var body = $(this).next(".activity-box-body");
                body.toggle();
                var height = body.find('iframe').contents().height();
                body.find('iframe').css('height', height);
            });
        });

        function resize(obj) {
            var ifrm = obj.contentWindow.document.body;
            ifrm.style.cssText = "margin:0px;padding:0px;overflow:hidden";
            var div = document.createElement("img");
            div.src = obj.src;
            obj.height = div.height;
            obj.width = div.width;
        }
    </script>
</head>
<body>
<div class="container">
    <div class="top-box">
    <?php echo $__env->make('member.layouts.pc_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- main -->
        <div class="main_wrap">
            <div class="loadingTracker">
                <div class="loadingSymbol">
                    <div class="logo2"></div>
                </div>
            </div>
            <div class="content" style="">
                <div class="activity-container">
                    <div class="activity-banner" style="height:auto;background: url(/new0404/pc/images/activity_bg.jpg);">
                        <div class="activity-site">
                            <span class="activity-ico text_654"></span>
                            <div class="activitybar">
                                <ul class="commonlist activity-nav clear fleft" id="nav">
                                       <li <?php if(!request() -> get('type')): ?>class="active" <?php endif; ?>><a href="<?php echo e(route('web.activityList')); ?>" id="0">全部</a></li>
                                    <!--<?php $__currentLoopData = config('platform.activity_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li  <?php if(request() -> get('type') == $k): ?>class="active" <?php endif; ?>><a href="<?php echo e(route('web.activityList',['type'=>$k])); ?>" id="<?php echo e($k); ?>"><?php echo e($v); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    -->
                                </ul>
                            </div>
                            <div id="list">
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="activity-content">
                                    <div class="activity-box clear">
                                        <div class="infobox">
                                            <div class="info">
                                                <div class="activity-box-header clear">
                                                    <div class="activityimg"
                                                         style="background: url(<?php echo e($item->title_img); ?>) no-repeat; background-size: contain; background-position: center;"></div>
                                                </div>
                                                <div class="activity-box-body" style="display: none;">
                                                    <iframe id="8888box11" width="100%" frameborder="0" resize(this)
                                                            style="height: 1677px;" scrolling="no"
                                                            src="/activity/<?php echo e($item->id); ?>"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('member.layouts.pc_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php echo $__env->make('member.layouts.pc_right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
    var countdown=60;
    function settime() {
        if (countdown == 0) {
            $('.sty2').attr("disabled", false);
            $('.sty2').text("<?php echo e(trans('lang.hqyzm')); ?>");
            countdown = 60;
            return;
        } else {
            $('.sty2').attr("disabled", 'disabled');
            $('.sty2').text("<?php echo e(trans('lang.cxfs')); ?>(" + countdown + ")");
            countdown--;
        }
        setTimeout(function() { settime() },1000)
    }

    $('.sty2').click(function(){
        if (countdown != 60) {
            return false;
        }
        var phone = $('#phone').val();
        var pattern = /^1[0-9]{10}$/;
        if (!phone) {alert("请输入手机号");return false}
        if(phone.length != 8){
            alert("手机号格式不正确");
            return false;
        }
        settime();
        $.ajax({
            url:"/m/rmsgcode",
            data:{phone:phone},
            success:function(msg){
                alert(msg.url+msg.status.msg);
                settime()
            }
        });
        return false;
    })

    function check_form() {
        if (!$("#agreeTerms")[0].checked) {
            alert("未同意用户协议及条款");
            return false;
        }
        $.ajax({
            url : "<?php echo e(route('wap.register.post')); ?>",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                if(data.status.errorCode == 0){
                    location.href=data.url;
                }else{
                    alert(data.status.msg);
                }
            }
        })
        return false;
    }

</script>
</body>
</html>