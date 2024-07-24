<html style="height: 100%" language="tw">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="yes" name="apple-touch-fullscreen">
	<meta content="telephone=no" name="format-detection">
	<meta content="black" name="apple-mobile-web-app-status-bar-style">
	<meta name="viewport"
		  content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
	<meta name="env" content="stage">
	<meta name="notify-msg" content="">
	<meta name="notify-type" content="">
	<link rel="stylesheet prefetch" href="/new0404/css/bootstrap.min.css">
	<link rel="stylesheet" href="/new0404/css/Language_tw.css?202204042350" id="languageCss" cachetime="202204042350">
	<title><?php echo e($_system_config->site_title); ?></title>
	<script src="/new0404/js/jquery.min.js"></script>
	<link href="/new0404/css/game_hall_new.css?202204042350" rel="stylesheet">
	<link href="/new0404/css/new_ui.css?202204042350" rel="stylesheet">
	<link href="/new0404/css/login_lx.css?202204042350" rel="stylesheet">
	<script type="text/javascript" src="/new/css/layer.js"></script>
	<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js?t=100"></script>
</head>
<body ontouchstart="" style="height: 100%;">
<div class="body-pages" style="height: 100%; overflow: auto; display: block;">
	<div id="registion-dialog" class="registion-dialog" style="display: block;">
		<div class="registion-box">
			<div class="registion-title">
				<div class="text_181" style="font-size: 5vmin; font-weight: 600; color: #000;"></div>
			</div>
			<div class="login-wrapper" style="">
				<div class="login-box">
					<div class="login-title">
						<div class="text_3" style="font-size: 5vmin; font-weight: 600; color: #000;"></div>
						<!-- <span class="login-close"></span> -->
					</div>
					<div class="login-logo"></div>
					<div class="login-content">
						<div class="input-box account">
							<input type="text" id="account" style="font-size: 14px;" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.zanghao')); ?>">
						</div>
						<div class="input-box pwd">
							<input type="password" id="password" style="font-size: 14px;" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.mima')); ?>">
						</div>
						<div class="remember_forget">
							<div class="remember_box">
								<!--<div id="btn_remember" class="btn_remember_noactive"></div>-->
								<!--<div class="remember_pwd remember_box_text text_1"></div>-->
							</div>
							<div onclick="location.href='<?php echo e($setting->service_link); ?>'" class="forget_pwd remember_box_text text_288">？</div>
						</div>
						<div class="login-btn-login text_3" id="btn-login" onclick="check_login();"></div>
						<div class="login-btn-registion text_951" id="btn-login-registion" onclick="goRegister();"></div>
						<div class="login-gohome text_289" id="btn-gohome" onclick="location.href='/m'"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
console.log(localStorage.username)
    if(localStorage.username && localStorage.password){
        $('#account').val(localStorage.username);
        $('#password').val(localStorage.password);
    }

	function check_login() {
		var account = $('#account').val();
		var password = $('#password').val();
		if(account.length<6){
			alert("<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.zanghao')); ?>");
			return false;
		}
		if(password.length<6){
			alert("<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.mima')); ?>");
			return false;
		}
		$.ajax({
			url : "<?php echo e(route('wap.login.post')); ?>",
			type : 'POST',
			data : {'name':account,'password':password,'act':'login'},
			success : function (data) {

			    console.log(data)
				if(data.status.errorCode == 0){
					localStorage.username = account;
					localStorage.password = password;
					location.href=data.url;
				}else{
					alert(data.status.msg);
				}
			}
		})
		return false;
	}


	function goRegister() {
		window.location.href = "<?php echo e(route('wap.register')); ?>";
	}
</script>

</body>
</html>