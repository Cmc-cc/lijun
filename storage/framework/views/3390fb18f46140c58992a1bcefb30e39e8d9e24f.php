<!DOCTYPE html>
<!-- saved from url=(0035)https://www.cash669.net/m/bind_bank -->
<html style="font-size:52.400000000000006px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title><?php echo e($_system_config->site_title); ?></title>
    <meta name="csrf-token" content="Xq26q21cIIcUe7g0ljuZBMlJCEO4iqIp5lWwUVKn">
	<link type="text/css" rel="stylesheet" href="/new/css/swiper.css">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<link type="text/css" rel="stylesheet" href="/new/css/style.css">
	<link rel="apple-touch-icon" href="https://www.cash669.net/wap/images/iconq.png">

	<script type="text/javascript" src="/new/css/jquery.js"></script>
	<script type="text/javascript" src="/new/css/font.js"></script>
	<script type="text/javascript" src="/new/css/swiper.min.js"></script>
	<script type="text/javascript" src="/new/css/jquery.SuperSlide.2.1.js"></script>

	
    	<meta name="apple-mobile-web-app-capable" content="yes"><!-- 删除苹果默认的工具栏和菜单栏 -->
    <meta name="x5-fullscreen" content="true"><!-- QQ强制全屏 -->
    <meta name="full-screen" content="yes"><!-- UC强制全屏 -->
<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>

<body class="m_bac">

    <div class="nytop">
	<a href="javascript:history.go(-1);" class="fhbtn"></a>
    <h1>提现</h1>
	<!-- <h2><a href="">在線客服</a></h2> -->
</div>

	<div class="drawInfor">
		<ul>
			<li>
			    <span><?php echo e(trans("lang.txfs")); ?></span>
				<select class="select" name="bank_name" style="color: rgb(0, 0, 0);" id="bank_name">
					<option value="" >-- <?php echo e(trans("lang.qxz")); ?> --</option>
					<?php if($member->fps): ?>
						<option value="1"><?php echo e(trans("lang.zsk")); ?></option>
					<?php endif; ?>
					<?php if($member->card): ?>
                        <option value="2">银行卡</option>
                    <?php endif; ?>
                    <?php if($member->erc20): ?>
                        <option value="3">erc20</option>
                    <?php endif; ?>
                    <?php if($member->trc20): ?>
                        <option value="4">trc20</option>
                    <?php endif; ?>
									</select>
			</li>
			<!--<li class="usdt"><span> <?php echo e(trans("lang.xingming")); ?></span><input type="text" name="name"  id="name" placeholder="" autocomplete="off"></li>-->
			
			<!--<li><span class="usdttxt"><?php echo e(trans("lang.skzh")); ?></span><input type="text" name="bank_card" id="bank_card" placeholder="" autocomplete="off"></li>-->
			<li class="black"><span><?php echo e(trans("lang.tkje")); ?></span><input type="number" name="money" id="money" autocomplete="off" style="width:75%;"></li>
			<li class="black"><span><?php echo e(trans("lang.tkmm")); ?></span><input type="password" name="qk_pwd" id="qk_pwd" placeholder="" autocomplete="off" style="width:75%;"></li>
			<?php if($setting->sms_message): ?>
			    <!--<li style="position:relative;">-->
			    <!--    <span><?php echo e(trans("lang.yzm")); ?></span>-->
			    <!--    <input type="number" name="code" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.yzm')); ?>" autocomplete="off" id="code">-->
			    <!--    <input type="button" id="btn" value="<?php echo e(trans('lang.hqyzm')); ?>" class="sty2 yanzhen" style="height: 27px;outline: none;cursor: pointer;position: absolute;top: 13px;right: 20px;">-->
			    <!--</li>-->
			<?php endif; ?>
			<div style="padding-top:15px;font-size:20px;">剩余码量:<?php echo e($member->ml_money); ?></div>
			<div style="padding-top:15px;font-size:20px;">余额:<?php echo e($member->money); ?></div>
		</ul>
		<input type="button" value="<?php echo e(trans('lang.qr')); ?>" class="subBtn ajax-submit-btn" id="subBtn">
		<div style="color:#fff;line-height:2"><?php echo e(trans("lang.tkts")); ?></div>
	</div>


<!-- 获取焦点加亮 -->
	<script>
	$('#subBtn').click(function(){
		var bank_name = $("#bank_name").val();
		if(bank_name==''){
			alert('<?php echo e(trans("lang.qxz")); ?><?php echo e(trans("lang.txfs")); ?>');
			return false;
		}
		var money = $("#money").val();
		if(money==''){
			alert('請輸入<?php echo e(trans("lang.tkje")); ?>');
			return false;
		}

	    var qk_pwd = $("#qk_pwd").val();
		if(qk_pwd==''){
			alert('請輸入<?php echo e(trans("lang.tkmm")); ?>');
			return false;
		}


	    $.ajax({
				type:"post",
				url:"<?php echo e(route('wap.post_drawing')); ?>",
				data : {code:$('#code').val(),qk_pwd:$('#qk_pwd').val(),money:$('#money').val(),bank_card:$('#bank_card').val(),name:$('#name').val(),bank_name:$('#bank_name').val()},
				success : function (data) {
					if(data.status.errorCode == 0){
                        location.href=data.url;
                    }else{
                        alert(data.status.msg);
                    }

				}
			})
	})
	
	
	
	$('.drawInfor input').focus(function(){
		console.log($(this).parent())
		//$(this).parent('li').css('border-bottom','1px solid #fff');
		//$(this).parent('li').siblings().css('border-bottom','1px solid #292d30')
	})
	$('.drawInfor input').blur(function(){
		//$(this).parent('li').css('border-bottom','1px solid #292d30');
		//$(this).parent('li').siblings().css('border-bottom','1px solid #292d30')
	})
	
	var countdown=60;   
    function settime() {  
        if (countdown == 0) {   
            $('.sty2').attr("disabled", false);      
            $('.sty2').val("<?php echo e(trans('lang.hqyzm')); ?>");   
            countdown = 60;   
            return;  
        } else {   
            $('.sty2').attr("disabled", 'disabled');   
            $('.sty2').val("<?php echo e(trans('lang.cxfs')); ?>(" + countdown + ")");   
            countdown--;   
        }   
        setTimeout(function() {   
            settime() }  
            ,1000)   
    }
    $('.sty2').click(function(){
        if (countdown != 60) {
          return false;
        }
        var pattern = /^1[0-9]{10}$/;
    
        $.ajax({
            url:"/m/msgcode",
            success:function(msg){
                alert(msg.url+msg.status.msg);
                if (msg.status.errorCode==0) {
                    settime()
                }else{
                    location.href='/m/bindphone';
                }
            }
        });
        return false;
    }) 
</script>

<!-- select下拉框默认option为灰色，选中option颜色为白色 -->
<script>
        $(function() {
            var unSelected = "#000";
            var selected = "#000";
            $("select").css("color", unSelected);
            $("option").css("color", selected);
            $("select").change(function() {
                var selItem = $(this).val();
                if(selItem == $(this).find('option:first').val()) {
                    $(this).css("color", unSelected);
                } else {
                    $(this).css("color", selected);
                }
            });
        });
    </script>

<script type="text/javascript">
	$('.gdbtn').click(function(){
		$('.dhtc').css('bottom','.12rem');
		$('.bj').fadeIn();
	})
	$('.contact').click(function(){
		$('.contact_content').css('bottom','.12rem');
		$('.bj').fadeIn();
	})
	$('.qxbtn').click(function(){
		$('.dhtc').css('bottom','-4rem');
		$('.bj').fadeOut();
	})
	$('.qxbtn_2').click(function(){
		$('.contact_content').css('bottom','-10rem');
		$('.bj').fadeOut();
	})
	$('#lang').change(function () {
		var lang =  $("#lang option:selected").attr('href');
		window.location.href = lang;

	})
	$('.fixBottom a').click(function () {
		$(this).addClass('cur').siblings().removeClass('cur');
	})
	
	
// 	function checkform(obj){
// 			$.ajax({
// 				type:"post",
// 				url:"<?php echo e(route('wap.post_drawing')); ?>",
// 				data : $('#register_form').serialize(),
// 				success : function (data) {
// 					if(data.status.errorCode == 0){
//                         location.href=data.url;
//                     }else{
//                         alert(data.status.msg);
//                     }

// 				}
// 			})
// 			return false;
// 		};
		
		$('#bank_name').change(function(){
		  //  if($(this).val() == '转速快'){
		  //    //  $('.usdttxt').text('USDT收款地址');
		  //      $('.usdt').hide();
		  //  }else{
		        
    //             $('.usdttxt').text('收款帳號');        
		  //      $('.usdt').show();
		  //  }
		})
</script>

<!-- 进入游戏加载 -->
<!--   <link rel="stylesheet" href="/wap/css/loadAnimation.css" />
  <div class="login-wrap" style="display:none">
      <div class="loading-content">
          <svg viewBox="0 0 120 120" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="circle" class="g-circles g-circles--v3">
                  <circle id="12" transform="translate(35, 16.698730) rotate(-30) translate(-35, -16.698730) " cx="35" cy="16.6987298" r="10"></circle>
                  <circle id="11" transform="translate(16.698730, 35) rotate(-60) translate(-16.698730, -35) " cx="16.6987298" cy="35" r="10"></circle>
                  <circle id="10" transform="translate(10, 60) rotate(-90) translate(-10, -60) " cx="10" cy="60" r="10"></circle>
                  <circle id="9" transform="translate(16.698730, 85) rotate(-120) translate(-16.698730, -85) " cx="16.6987298" cy="85" r="10"></circle>
                  <circle id="8" transform="translate(35, 103.301270) rotate(-150) translate(-35, -103.301270) " cx="35" cy="103.30127" r="10"></circle>
                  <circle id="7" cx="60" cy="110" r="10"></circle>
                  <text x="50%" y="55%">进入游戏中</text>
                  <circle id="6" transform="translate(85, 103.301270) rotate(-30) translate(-85, -103.301270) " cx="85" cy="103.30127" r="10"></circle>
                  <circle id="5" transform="translate(103.301270, 85) rotate(-60) translate(-103.301270, -85) " cx="103.30127" cy="85" r="10"></circle>
                  <circle id="4" transform="translate(110, 60) rotate(-90) translate(-110, -60) " cx="110" cy="60" r="10"></circle>
                  <circle id="3" transform="translate(103.301270, 35) rotate(-120) translate(-103.301270, -35) " cx="103.30127" cy="35" r="10"></circle>
                  <circle id="2" transform="translate(85, 16.698730) rotate(-150) translate(-85, -16.698730) " cx="85" cy="16.6987298" r="10"></circle>
                  <circle id="1" cx="60" cy="10" r="10"></circle>
              </g>
          </svg>
      </div>
  </div>
<script>
function js_method() {
$(".login-wrap").css("display", "block");
return true;
}	
</script> -->

<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js?t=100"></script>


</body></html>