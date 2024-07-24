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
	<title>銀行卡管理</title>
	<script src="/new0404/js/jquery.min.js"></script>
	<link href="/new0404/css/game_hall_new.css?202204042350" rel="stylesheet">
	<link href="/new0404/css/new_ui.css?202204042350" rel="stylesheet">
	<link href="/new0404/css/login_lx.css?202204042350" rel="stylesheet">
	<script type="text/javascript" src="/new/css/layer.js"></script>
	<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js?t=100"></script>
</head>
<body ontouchstart="" style="height: 100%;">
<div class="body-pages" style="height: 100%; overflow: auto; display: block;">
	<div class="pages-container show">
		<a data-link="" href="/m/userinfo" class="close-btn"></a>
		<div data-page-name="BankManagement" data-link="user-center" class="pages-main security-main active ani">
			<div class="pages-header">
				<h1 class="text_1040"></h1>
			</div>
			<div class="pages-content">
				<div class="BankList-wrapper">
					<div class="btnline" style="width: 100%; height: 80px;">
						<div class="addbank text_1039"
							 style="<?php if($member['bank']): ?> display: none; <?php else: ?> display: inline-block; <?php endif; ?> background: rgb(241, 234, 145); width: 40%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 5%; float: left;"></div>
						<div class="addFPS text_1161"
							 style="<?php if($member['fps']): ?> display: none; <?php else: ?> display: inline-block; <?php endif; ?> background: #f1ea91; width: 40%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 5%; float: left;"></div>
						<div class="addERC20"
							 style="<?php if($member['erc20']): ?> display: none; <?php else: ?> display: inline-block; <?php endif; ?> background: rgb(241, 234, 145); width: 44%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 3%; float: left;">
							USDT-ERC20
						</div>
						<div class="addTRC20"
							 style="<?php if($member['trc20']): ?> display: none; <?php else: ?> display: inline-block; <?php endif; ?> background: rgb(241, 234, 145); width: 44%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 3%; float: left;">
							USDT-TRC20
						</div>
						<!-- <div class="addBEP20" style="display: none; background: #f1ea91; width: 44%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 3%; float: left;">BEP20</div>
                        <div class="addBEP2" style="display: none; background: #f1ea91; width: 44%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 3%; float: left;">BEP2</div> -->
						<div class="listtext text_1164"
							 style="display: inline-block; background: rgb(236, 216, 168); width: 90%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px; float: left;"></div>
					</div>
					<div class="list" style="display: inline-block; width: 100%;">
						<?php if($member['bank']): ?>
						<div class="bank-list-item"  style="width: 91%; margin: 15px; background: rgb(255, 255, 255); border: 1px solid rgb(220, 180, 84); padding: 10px;">
							<div style="text-align: center; border-bottom: 1px solid #787878;">绑定銀行卡</div>
							<div style="height: 30px; line-height: 30px;">真實姓名: <?php echo e($member['username']); ?></div>
							<div style="height: 30px; line-height: 30px;">銀行名稱: <?php echo e($member['bank']); ?></div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">銀行卡號: ***<?php echo e(substr($member['card'],3)); ?>

							</div>
						</div>
						<?php endif; ?>
						<?php if($member['fps']): ?>
						<div class="bank-list-item"  style="width: 91%; margin: 15px; background: rgb(255, 255, 255); border: 1px solid rgb(220, 180, 84); padding: 10px;">
							<div style="text-align: center; border-bottom: 1px solid #787878;">绑定轉數快</div>
							<div style="height: 30px; line-height: 30px;">真實姓名: <?php echo e($member['username']); ?></div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">轉數快帳號: ***<?php echo e(substr($member['fps'],3)); ?>

							</div>
						</div>
						<?php endif; ?>
						<?php if($member['erc20']): ?>
						<div class="bank-list-item"  style="width: 91%; margin: 15px; background: rgb(255, 255, 255); border: 1px solid rgb(220, 180, 84); padding: 10px;">
							<div style="text-align: center; border-bottom: 1px solid #787878;">USDT-ERC20</div>
							<div style="height: 30px; line-height: 30px;">真實姓名: <?php echo e($member['username']); ?></div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">USDT帳號: ***<?php echo e(substr($member['erc20'],3)); ?>

							</div>
						</div>
						<?php endif; ?>
						<?php if($member['trc20']): ?>
						<div class="bank-list-item"  style="width: 91%; margin: 15px; background: rgb(255, 255, 255); border: 1px solid rgb(220, 180, 84); padding: 10px;">
							<div style="text-align: center; border-bottom: 1px solid #787878;">USDT-TRC20</div>
							<div  style="height: 30px; line-height: 30px;">真實姓名: <?php echo e($member['username']); ?></div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">USDT帳號: ***<?php echo e(substr($member['trc20'],3)); ?>

							</div>
						</div>
						<?php endif; ?>
					</div>
					<div class="text_1162"
						 style="text-align: center; color: #ff2b2b; margin: 5px 20px; display: inline-block;"></div>
				</div>
			</div>
		</div>
	</div>
	<div id="addbank" class="modal after-close add-card-dialog fade in" style="display: none;height:90%;top:55%;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="wm-bind-wrap">
					<div class="person-acc-box">
						<div class="text_508" style="color: #ff0000;"></div>
						<div class="acc-data" style="height: 70px;">
							<span class="text_208" style="line-height:39px;"></span>
							<input class="username" type="text" required="required" style="font-size: 12px;margin:0;"
								   placeholder="請輸入持卡人姓名" value="<?php echo e($member['username']); ?>" >
						</div>
						<div class="acc-data datahide" type="bank" style="height: 70px; display: block;">
							<span class="text_231" style="line-height:39px;"></span>
						    <select id="Bankname" style="font-size: 12px; margin:0; background: #ffffff; border: 1px solid #dcb454; width: 100%;">
								<?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($vo); ?>"><?php echo e($vo); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="acc-data datahide" type="bank" style="height: 70px; display: block;">
							<span class="text_370" style="line-height:39px;"></span>
							<input id="bankcode" type="text" required="required" minlength="15" maxlength="19"
								   style="font-size: 12px;margin:0;" placeholder="請輸入您的銀行卡號">
						</div>
						<a class="recharge-submit text_155" onclick="saveBank();" style="color: #fff;"></a>
						<a class="recharge-cancel text_135" style="color: #fff;"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="addFPS" class="modal after-close add-card-dialog fade in" style="display: none;height:90%;top:55%;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="wm-bind-wrap">
					<div class="person-acc-box">
						<div class="text_508" style="color: #ff0000;"></div>
						<div class="acc-data" style="height: 70px;">
							<span class="text_208" style="line-height:39px;"></span>
							<input class="username" type="text" required="required" style="font-size: 12px;margin:0;"
								   placeholder="請輸入持卡人姓名" value="<?php echo e($member['username']); ?>" >
						</div>
						<div class="acc-data datahide" type="FPS" style="height: 70px;">
							<span class="text_368" style="line-height:39px;"></span>
							<input id="FPSAccount" type="text" required="required" style="font-size: 12px;margin:0;"
								   placeholder="請輸入轉數快號碼">
						</div>
						<a class="recharge-submit text_155" onclick="saveFps();" style="color: #fff;"></a>
						<a class="recharge-cancel text_135" style="color: #fff;"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="addERC20" class="modal after-close add-card-dialog fade in" style="display: none;height:90%;top:55%;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="wm-bind-wrap">
					<div class="person-acc-box">
						<div class="text_508" style="color: #ff0000;"></div>
						<div class="acc-data" style="height: 70px;">
							<span class="text_208" style="line-height:39px;"></span>
							<input class="username" type="text" required="required" style="font-size: 12px;margin:0;"
								   placeholder="請輸入持卡人姓名" value="<?php echo e($member['username']); ?>" >
						</div>
						<div class="acc-data datahide" type="ERC20" style="height: 70px;">
							<span class="text_442" style="line-height:39px;"></span>
							<input id="USDTAccount" type="text" required="required" style="font-size: 12px;margin:0;"
								   placeholder="請輸入USDT帳號">
						</div>
						<div class="text_519 datahide" type="ERC20" style="color: rgb(255, 0, 0);"></div>
						<a class="recharge-submit text_155" onclick="saveErc20();" style="color: #fff;"></a>
						<a class="recharge-cancel text_135" style="color: #fff;"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="addTRC20" class="modal after-close add-card-dialog fade in" style="display: none;height:90%;top:55%;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="wm-bind-wrap">
					<div class="person-acc-box">
						<div class="text_508" style="color: #ff0000;"></div>
						<div class="acc-data" style="height: 70px;">
							<span class="text_208" style="line-height:39px;"></span>
							<input class="username" type="text" required="required" style="font-size: 12px;margin:0;"
								   placeholder="請輸入持卡人姓名" value="<?php echo e($member['username']); ?>" >
						</div>
						<div class="acc-data datahide" type="TRC20" style="height: 70px;">
							<span class="text_442" style="line-height:39px;"></span>
							<input id="USDTAccountTRC20" type="text" required="required"
								   style="font-size: 12px;margin:0;" placeholder="請輸入USDT帳號">
						</div>
						<div class="text_524 datahide" type="TRC20" style="color: rgb(255, 0, 0); display: none;"></div>
						<a class="recharge-submit text_155" onclick="saveTrc20();" style="color: #fff;"></a>
						<a class="recharge-cancel text_135" style="color: #fff;"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function saveBank() {
		var bank = $("#Bankname").val();
		var username = $(".username").eq(0).val();
		var card = $("#bankcode").val();
		if(username.length<2){
			alert('請輸入持卡人姓名');
			return ;
		}
		if(card.length<8){
			alert('請輸入您的銀行卡號');
			return ;
		}
		$.ajax({
			url : "<?php echo e(route('wap.set_bank')); ?>",
			type: 'POST',
			data: {'bank':bank,'card':card,'username':username,'type':1},
			success: function (data) {
				alert(data.status.msg);
				if (data.status.errorCode == 0) {
					setTimeout(function() {location.reload(); },200)
				}
			}
		})
		return false;
	}
	function saveFps() {
		var fps = $("#FPSAccount").val();
		var username = $(".username").eq(1).val();
		if(username.length<2){
			alert('請輸入持卡人姓名');
			return ;
		}
		if(fps.length<8){
			alert('請輸入轉數快號碼');
			return ;
		}
		$.ajax({
			url : "<?php echo e(route('wap.set_bank')); ?>",
			type: 'POST',
			data: {'fps':fps,'username':username,'type':2},
			success: function (data) {
				alert(data.status.msg);
				if (data.status.errorCode == 0) {
					setTimeout(function() {location.reload(); },200)
				}
			}
		})
		return false;
	}

	function saveErc20() {
		var erc20 = $("#USDTAccount").val();
		var username = $(".username").eq(2).val();
		if(username.length<2){
			alert('請輸入持卡人姓名');
			return ;
		}
		if(erc20.length<8){
			alert('請輸入USDT帳號');
			return ;
		}
		$.ajax({
			url : "<?php echo e(route('wap.set_bank')); ?>",
			type: 'POST',
			data: {'erc20':erc20,'username':username,'type':3},
			success: function (data) {
				alert(data.status.msg);
				if (data.status.errorCode == 0) {
					setTimeout(function() {location.reload(); },200)
				}
			}
		})
		return false;
	}

	function saveTrc20() {
		var trc20  = $("#USDTAccountTRC20").val();
		var username = $(".username").eq(3).val();
		if(username.length<2){
			alert('请输入持卡人姓名');
			return ;
		}
		if(trc20.length<8){
			alert('請輸入USDT帳號');
			return ;
		}
		$.ajax({
			url : "<?php echo e(route('wap.set_bank')); ?>",
			type: 'POST',
			data: {'trc20':trc20,'username':username,'type':4},
			success: function (data) {
				alert(data.status.msg);
				if (data.status.errorCode == 0) {
					setTimeout(function() {location.reload(); },200)
				}
			}
		})
		return false;
	}

	$('.addbank').click(function(){
		$("#addbank").show();
	});
	$('.addFPS').click(function(){
		$("#addFPS").show();
	});
	$('.addERC20').click(function(){
		$("#addERC20").show();
	});
	$('.addTRC20').click(function(){
		$("#addTRC20").show();
	});
	$('.text_135').click(function(){
		$(this).parents('.modal').hide();
	})
</script>
</body>
</html>