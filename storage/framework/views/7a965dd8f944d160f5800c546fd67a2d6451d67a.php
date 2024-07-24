<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="/new0404/js/jquery.min.js"></script>
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <link rel="stylesheet" href="./new0404/pc/css/normalize.css">
    <link rel="stylesheet" href="/new0404/pc/css/main.css">
    <link rel="stylesheet" type="text/css" href="/new0404/pc/css/acc.css">
    <link rel="stylesheet" href="/new0404/pc/css/register.css">
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
</head>
<body>
<div class="container">
    <div class="top-box">
    <?php echo $__env->make('member.layouts.pc_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- main -->
        <div class="pages-con p-c1">
            <div class="main-bg">
                <h2 class="title-s1 text_27"><span>MEMBER CENTER</span></h2>
                <div class="line1"></div>
                <div class="memcenter clear">
                    <div class="memMenu">
                        <ul class="commonlist">
                            <li><a href="<?php echo e(route('member.message_list')); ?>" class="text_28" oncontextmenu="return false;">
                                    <span class="mail-num" style="display: none;"></span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('member.userCenter')); ?>" class="text_29" oncontextmenu="return false;"></a>
                            </li>
                            <li class="select"><a href="javascript:;" class="text_30" oncontextmenu="return false;"></a>
                            </li>
                            <li><a href="<?php echo e(route('member.service_center')); ?>" class="text_31" oncontextmenu="return false;"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="memRight">
                        <div class="nav">
                            <ul class="commonlist">
                                <li class="select" style="width: 200px;"><a href="<?php echo e(route('member.login_psw')); ?>" class="text_42" oncontextmenu="return false;"></a></li>
                                <li style="width: 215px;"><a href="<?php echo e(route('member.safe_psw')); ?>" class="text_43" oncontextmenu="return false;"></a></li>
                            </ul>
                        </div>
                        <div class="memCon memCon1">
                            <div class="memHead">
                                <span class="mc-page-top-title text_42"></span>
                                <div class="mc-page-top-tool">
                                    <a href="" oncontextmenu="return false;"></a>
                                </div>
                            </div>
                            <div class="memMain table-mc form-horizontal">
                                <form class="form-horizontal" id="modifyPassword">
                                    <div class="control-group">
                                        <label class="control-label" style="width: 215px;"><font class="txt-red">*</font><span class="text_44">：</span></label>
                                        <div class="controls">
                                            <input type="password" id="oddPwd" name="old_password" class="input-medium" style="background-color: #58575761;width: 300px;" placeholder="請輸入您當前的登入密碼">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" style="width: 215px;"><font class="txt-red">*</font><span class="text_45">：</span></label>
                                        <div class="controls">
                                            <input type="password" name="password"  class="input-medium" id="newPwd" style="background-color: #58575761;width: 300px;" placeholder="請輸入您新的登入密碼">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" style="width: 215px;"><font class="txt-red">*</font><span class="text_46">：</span></label>
                                        <div class="controls">
                                            <input type="password" class="input-medium" name="password_confirmation"  id="newPwd2" style="background-color: #58575761;width: 300px;" placeholder="請再次輸入新的登入密碼">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" style="width: 215px;"></label>
                                        <div class="controls">
                                            <a onclick="upPw();" class="btn red-btn text_47"></a>
                                        </div>
                                    </div>
                                </form>
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
    function upPw() {
        var old_password = $('#oddPwd').val();
        var password = $('#newPwd').val();
        var password_confirmation = $('#newPwd2').val();
        if(!password || !password_confirmation || !old_password){
            alert('請認真填寫信息');return false;
        }
        if(password!=password_confirmation){
            alert('兩次密碼輸入不一致');return false;
        }
        $.ajax({
            url : "<?php echo e(route('member.update_login_password')); ?>",
            type : 'POST',
            data : {'old_password':old_password,'password':password,'password_confirmation':password_confirmation},
            success : function (data) {
                console.log(data)
                if(data.status.errorCode == 0){
                    alert('修改成功!');
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