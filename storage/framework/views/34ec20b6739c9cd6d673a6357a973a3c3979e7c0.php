<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="/new0404/js/jquery.min.js"></script>
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <link rel="stylesheet" href="/new0404/pc/css/normalize.css">
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
<div class="container2">
    <div class="top-box">
          <div data-app="true" id="app" class="v-application v-application--is-ltr theme--dark">
             <div class="v-application--wrap">
                <?php echo $__env->make('web.layouts.header_q8', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
               <div style="width:100%;background: #f7f9fb;">
			<div class="container">
				
			 <?php echo $__env->make('member.layouts.pc_left_user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			 <div class="right-container">
        
        
		
<div class="page-wrapper">
<div class="member-container">
	<div class="member-body">
		<div id="layout-main-area"><div style="height: 100%; background-color: rgb(255, 255, 255); display: block;" id="layout-main-area-div">
				
<div id="main-container1">
	<div class="module-top">
		<div class="top-menu-area">
			<a href="javascript:void(0)" class="active"><?php echo e(trans("lang.xgdenglumima")); ?></a>
			<a class="switchroute" href="safe_psw_xin"><?php echo e(trans("lang.xgqkmm")); ?></a>
		</div>
	</div>		
	<div class="module-main" style="margin-top:25px">
		<form action="member/update_login_password" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-xs-3 control-label"></label>
				<div class="col-xs-6">
					<input name="old_password" type="password" class="form-control" id="oddPwd" placeholder="<?php echo e(trans("lang.srjmm")); ?>" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-3 control-label"></label>
				<div class="col-xs-6">
					<input name="password" type="password" class="form-control" id="newPwd" placeholder="<?php echo e(trans("lang.qrxmm620")); ?>" autocomplete="off">
				</div>
				<!-- <div class="col-xs-3 info">
					* 6-20个常规字符
				</div> -->
			</div>
			<div class="form-group">
				<label class="col-xs-3 control-label"></label>
				<div class="col-xs-6">
					<input name="password_confirmation" id="newPwd2" type="password" class="form-control" placeholder="<?php echo e(trans("lang.srxmm620")); ?>" autocomplete="off">
				</div>
				<!-- <div class="col-xs-3 info">
					* 6-20个常规字符
				</div> -->
			</div>
			<div class="form-group" style="margin-top:35px">
				<label class="col-xs-3 control-label"></label>
				<div class="col-xs-6">
					<button type="button" class="ajax-submit-btn" style="width: 100%;height: 46px;font-size: 16px;color:#fff;font-weight: 800;border: 0px solid #EB5D4D;background:linear-gradient(90deg,#d2b496,#e6ceb6);border-radius: 4px;" onclick="upPw();"><?php echo e(trans("lang.quedihng")); ?></button>
				</div>
			</div>
		</form>
	</div>
</div>
			</div></div><span></span>
    </div>
</div>
</div> 

   </div>
</div>
</div>
            </div>
        </div>
    </div>
</div>
<script>
    function upPw() {
        var old_password = $('#oddPwd').val();
        var password = $('#newPwd').val();
        var password_confirmation = $('#newPwd2').val();
        if(!password || !password_confirmation || !old_password){
             chenggong_alert(2,'<?php echo e(trans("lang.qrztxxx")); ?>');return false;
        }
        if(password!=password_confirmation){
           chenggong_alert(2,'<?php echo e(trans("lang.liangcimimabuyizhi")); ?>');
           return false;
        }
        $.ajax({
            url : "<?php echo e(route('member.update_login_password')); ?>",
            type : 'POST',
            data : {'old_password':old_password,'password':password,'password_confirmation':password_confirmation},
            success : function (data) {
                console.log(data)
                if(data.status.errorCode == 0){
                      chenggong_alert(1,'<?php echo e(trans("lang.xgcg")); ?>');
                }else{
                   chenggong_alert(2,data.status.msg);
                }
            }
        })
        return false;
    }
</script>
<style>
.top-menu-area{padding: 10px 10px;}
</style>
 <?php echo $__env->make('web.layouts.footer_q8', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- main end -->
</body>
</html>