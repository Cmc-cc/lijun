<html style="height: 100%;" language="tw">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="yes" name="apple-touch-fullscreen">
	<meta content="telephone=no" name="format-detection">
	<meta content="black" name="apple-mobile-web-app-status-bar-style">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="env" content="stage">
	<meta name="csrf-token" content="ZeQipUdvBNrJPGLcfKIEuKmvLgjaEInNkWLn1ya0">
	<meta name="notify-msg" content="">
	<meta name="notify-type" content="">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo e($setting->ico); ?>">
	<!--<link rel="stylesheet prefetch" href="/new0404/css/bootstrap.min.css">-->
    
	<link rel="stylesheet" href="/new0404/css/swiper.min.css">
	<link rel="stylesheet" href="/new0404/css/game_hall_new.css?v=202302121107">
	<link rel="stylesheet" href="/new0404/css/game_hell_new_extend.css">
	<link rel="stylesheet" href="/new0404/css/new_ui.css">
	<link rel="stylesheet" href="/new0404/css/Lanuage_tw.css?202204042350" cachetime="202204042350">
	<link href="/new0404/css/login_lx.css?202204042350" rel="stylesheet">
	<link href="/new/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>
	<title><?php echo e($_system_config->site_name); ?></title>
	<script src="/new0404/js/jquery.min.js"></script>
	<script src="/new0404/js/swiper.min.js"></script>
	<!--<link rel="stylesheet" href="/web/layui/css/layui.css">-->
	<script src="/new0404/js/qrcode.min.js"></script>
	<script src="/web/layui/layui.js"></script>
	<script src="/new0404/js/Language.js"></script>
	<script src="/new0404/js/Config.js"></script>
	<script src="/new0404/js/Public.js"></script>
		<link type="text/css" rel="stylesheet" href="/new/css/style.css?v=202302121107">
	<script>
	    
	</script>
<script type="text/javascript" src="/new/js/clipboard.min.js"></script>

	<!-- <script>
		window.langName = 'cn';
	</script> -->

	<style>
	.text_508::before{
	    content: "<?php echo e(trans('lang.bangding_title')); ?>";
}
		@-webkit-keyframes marqueeAnimation-4449094 {
			100% {
				transform: translateX(-2470.84px)
			}
		}

		@-webkit-keyframes marqueeAnimation-8102871 {
			100% {
				transform: translateX(-2470.84px)
			}
		}
		.page{
		    display: none;
		    overflow-y: auto;
		}
		.page_show{
		    display: block;
		    position: fixed;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    z-index: 9999;
		    background: url(/new/img/main-bg-m-dark.6ea06ca.jpg) no-repeat 0 0;
		    background-size: cover;
		}
		.page_show2{
		    display: flex;
		    position: fixed;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    z-index: 9999;
		    background: url(/new/img/main-bg-m-dark.6ea06ca.jpg) no-repeat 0 0;
		     background-size: cover;
		}
.gameImage-WELiveCasino {
    content: url(https://wgc.s3.ap-southeast-1.amazonaws.com/DG.png);
    width: 100%;
}
.gamelist-content .gamelist-type{
   
}
	</style>
	<script>
	    let arr = [],font_52 = ['#chongzhi','#chongzhi_zhuanhuankuai','#chongzhi_yinhangka','#chongzhi_USDT','#tixian','#chongzhi_bainlidian','#huodong','#shenqinjindu','#huodongxiangqing','#zijinhuishou','#gerenxinxi','#xiugaimima','#qukuanmima','#xiaoxi','#dailizhongxin','#chongzhijilv','#tixianjilv','#touzhujilv','#honglijilv','#wode','#bangdingshouji','#xitonggonggao','#shenqingdaili','#eduzhuanhuan','#chongzhi2','#tixian2'],z_index= 9999 ; //需要每次记录打开的页面，决定html的size
	    
	    //只打开首页
	    function open_div(id){
	        arr = [];
	        $('.page').removeClass('page_show').removeClass('page_show2');
	         if(id == '#alert'){
	           $(id).addClass('page_show2');
	        }
	        else{
	             $(id).addClass('page_show');
	        }
	       
	        if(font_52.indexOf(id) > -1){
	            $('html').css({'font-size': '52px'})
	        }
	        else{
	            $('html').css({'font-size': '16px'}) 
	        }
	    }
	    
	    function sysconfig(){
	        $.ajax({
        			url : "/m/sysconfig",
        			type : 'POST',
        			data : {},
        			async:false,
        			success : function (data) {
        
        				if(data.status.errorCode == 0){
        				     data = data.data;
        				      if(data.is_qq_on == 0){ 
        				          $('#is_qq_on').show();
        				          $('#chongzhi_zhuanhuankuai .chatNumber2').text(data.qq_account)
                                    $('#chongzhi_zhuanhuankuai .chatNumber3').text(data.qq_nickname)
        				      }
        				      if(data.is_bankpay_on == 0){ 
        				          $('#is_bankpay_on').show();
        				          
        				      }
        				      if(data.is_alipay_on == 0){
        				          $('#is_alipay_on').show();
        				          
        				          $('#bld_pic').prop('src',data.bld_pic)
        				      }
        				      if(data.is_wechat_on == 0){ 
        				          $('#is_wechat_on').show();
        				          $('#trc_address').text(data.trc_address)
        				          $('#trc_pic').prop('src',data.trc_pic)
        				      }
        				    }
            			}
        		    })
	    }
	    
	    function click_show(id){
	        
	        //判断是否是充值
	        if(id == '#chongzhi'){
    		   sysconfig();
	        }
	        if(id == "#honglijilv"){
	             $('#honglijilv .select-time div p').eq(0).trigger('click');
	        }
	        else if(id == "#touzhujilv"){
	             $('#touzhujilv .select-time div p').eq(0).trigger('click');
	        }
	        else if(id == "#tixianjilv"){
	             $('#tixianjilv .select-time div p').eq(0).trigger('click');
	        }
	        else if(id == "#chongzhijilv"){
	             $('#chongzhijilv .select-time div p').eq(0).trigger('click');
	        }

	        
	        if(arr[arr.length - 1] == '#honglijilv'){
	            $('#honglijilv .select-time div p').eq(0).trigger('click');
	        }
	        else if(arr[arr.length - 1] == '#touzhujilv'){
	            $('#game_code').val('')
	            $('#touzhujilv .select-time div p').eq(0).trigger('click');
	        }
	        else if(arr[arr.length - 1] == '#tixianjilv'){
	            $('#tixianjilv .select-time div p').eq(0).trigger('click');
	        }
	        else if(arr[arr.length - 1] == '#chongzhijilv'){
	            $('#chongzhijilv .select-time div p').eq(0).trigger('click');
	        }
	       
	        
	        
	        if(id == '#huodongxiangqing'){
	           $(id).addClass('page_show2');
	        }
	        else{
	            $(id).addClass('page_show');
	        }
	        z_index ++ ;
	        $(id).css({'z-index': z_index})
	        if(font_52.indexOf(id) > -1){
	            $('html').css({'font-size': '52px'})
	        }
	        else{
	            $('html').css({'font-size': '16px'}) 
	        }
	        arr.push(id);
	    }
	    function div_close2(id){
	        arr = arr.filter(function (item) {
                return (item != '#chongzhijilv' && item != '#tixianjilv' && item != '#honglijilv' && item != '#touzhujilv') ;
            });
            $('#chongzhijilv').removeClass('page_show').removeClass('page_show2');
            $('#tixianjilv').removeClass('page_show').removeClass('page_show2');
            $('#honglijilv').removeClass('page_show').removeClass('page_show2');
            $('#touzhujilv').removeClass('page_show').removeClass('page_show2');
	    }
	    function div_close(id){
	        $(id).removeClass('page_show').removeClass('page_show2');
            arr.pop();
	        if(font_52.indexOf(arr[arr.length - 1]) > -1){
	            $('html').css({'font-size': '52px'})
	        }
	        else{
	            $('html').css({'font-size': '16px'}) 
	        }
	    }
	</script>
</head>

<!-- 隱藏loadin倒數 body class移除no-scroll、 pages-loading-box class增加ani display:none; -->
<body ontouchstart="" style="background: #121212;">
<!--游戏登入loading-->
<style>
@keyframes  am-ringload {

from { transform: rotate(0deg)}

to{ transform: rotate(360deg)}

}
@-webkit-keyframes am-ringload {
from { -webkit-transform: rotate(0deg)}
to{ -webkit-transform: rotate(360deg)}
}
#loading2{
    display: none;
    align-items: center;
    justify-content: center;
        position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 99999;
}
#loading2 .loading2{
        padding: 30px;
    background: rgba(0,0,0,.5);
    border-radius: 8px;
    text-align: center;
}
#loading2 .ringload {
width: 40px;
    margin: 0 auto;
height: 40px;
border: 4px solid #666666;
border-left-color:#ffffff ;
 border-radius: 50%;
 animation: am-ringload 1s infinite ease;
 -webkit-animation: am-ringload 1s infinite ease;
 margin-bottom: 20px;
}
#loading2  p{ color:#fff; text-align:center;}
</style>
<div id="loading2">
    <div class="loading2">
        <div class="ringload">
        </div>
        <p>Loading....</p>
    </div>
    
</div>
<!--游戏登入loading end-->
<!--登录-->
<img id="layertitle" src="/new/img/goback.png" style="position:fixed;top:10px;right:10px;z-index:99999999;display:none;width:40px;">
<div class="page" id="denglu">
    	<div id="registion-dialog" class="registion-dialog" style="display: block;">
		<div class="registion-box">
			<div class="registion-title">
				
			</div>
			<div class="login-wrapper2" style="">
				<div class="login-box">
					
					<div class="login-logo" style="background:url(<?php echo e($_system_config->site_logo); ?>);background-size:100% 100%;width: 115px;height: 115px;margin-top:30px;"></div>
					
					<div class="login-title">
						<div style="font-size: 5vmin; font-weight: 600; color: #fff;"><?php echo e(trans("lang.denglu")); ?></div>
						<!-- <span class="login-close"></span> ../images/icon_6.png-->
						<img src="<?php echo e(trans('lang.png')); ?>" onclick="$('#yuyan').show();" />
					</div>

					<div class="login-content">
						<div class="input-box account">
							<input type="text" id="denglu_account" style="font-size: 14px;" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.zanghao')); ?>">
						</div>
						<div class="input-box pwd">
							<input type="password" id="denglu_password" style="font-size: 14px;" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.mima')); ?>">
						</div>
						
						<div  id="btn-login" onclick="check_login();"><?php echo e(trans("lang.denglu")); ?></div>
						

						<div class="remember_forget">
							<div class="remember_box">
								<!--<div id="btn_remember" class="btn_remember_noactive"></div>-->
								<!--<div class="remember_pwd remember_box_text text_1"></div>-->
							</div>
							
						</div>
						
						<div class="login_bottom">
							<div onclick="location.href='<?php echo e($setting->service_link); ?>'" class="forget_pwd remember_box_text"><?php echo e(trans("lang.wjmm")); ?>？</div>
							<span>|</span>
							<div class="" id="btn-login-registion" onclick="click_show('#zhuce');"><?php echo e(trans("lang.user")); ?><?php echo e(trans("lang.zhuce")); ?></div>
						</div>
						
						<div class="login-gohome " id="btn-gohome" onclick="open_div('#index');"><?php echo e(trans("lang.xqgg")); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<script>
	$(function(){
			if(localStorage.lang){
				$(".lang").each(function(){
				if($(this).attr('data-lang')==localStorage.lang){
					$(".lang").removeClass('on');
					$(this).addClass('on');
				}
			});
		}
	})
$(document).on('click', '#yuyan', function(event) {
	$(this).hide();
  	event.preventDefault();
  	/* Act on the event */
  });


$(document).on('click', '#yuyan ul li', function(event) {
	console.log($(this).attr('data-lang'));
  	event.preventDefault();
  	/* Act on the event */
  
        var lang = $(this).data('lang');
        $.ajax({
            url:'/m/changelang',
            data:{lang:lang},
            success:function(res){
            	localStorage.lang = lang;
                location.reload();
            }
        })
        return false;
  });
    if(localStorage.username && localStorage.password){
        $('#denglu_account').val(localStorage.username);
        $('#denglu_password').val(localStorage.password);
        $('.login-content2-l-btn-input1').removeClass('login-content2-l-btn-input-no')
    }
    function login_input(){
        if($('#denglu_account').val() != '' && $('#denglu_password').val() != ''){
             $('.login-content2-l-btn-input1').removeClass('login-content2-l-btn-input-no')
        }
        else{
            $('.login-content2-l-btn-input1').addClass('login-content2-l-btn-input-no')
        }
    }

	function check_login() {
	    $('#loading_div').css({'display':'flex'});
		var account = $('#denglu_account').val();
		var password = $('#denglu_password').val();
		if(account == ''){
			chenggong_alert(2,"<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.zanghao')); ?>")
			$('#loading_div').css({'display':'none'});
			return false;
		}
		if(password == ''){
			chenggong_alert(2,"<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.mima')); ?>")
			$('#loading_div').css({'display':'none'});
			return false;
		}
		$.ajax({
			url : "<?php echo e(route('wap.login.post')); ?>",
			type : 'POST',
			data : {'name':account,'password':password,'act':'login'},
			success : function (data) {

			  
				if(data.status.errorCode == 0){
					localStorage.username = account;
					localStorage.password = password;
					location.href=data.url;
				}else{
					chenggong_alert(2,data.status.msg);
					$('#loading_div').css({'display':'none'});
				}
			}
		})
		return false;
	}

</script>
<!--登录emd-->

<div id="yuyan" >
    	<ul>
    		<li class="lang on" data-lang="ft">中文(繁體)</li>
    		<li class="lang" data-lang="zh_cn">中文(简体)</li>
    		<li class="lang" data-lang="en">English</li>
    	</ul>
    </div>
    
<!--注册-->
<div class="body-pages page" id="zhuce" >
	<div id="registion-dialog" class="registion-dialog">
		<div class="registion-box">

			<div class="registion-logo" style="background:url(<?php echo e($_system_config->site_logo); ?>);background-size:100% 100%;    margin-top: 10vmin !important;width: 115px;height: 115px;"></div>
			
			
			<div class="registion-title">
				<div style="font-size: 5vmin; font-weight: 600; color: #fff;"><?php echo e(trans('lang.zhuce')); ?></div>
			</div>
			
			<div class="login-content2">
					    <form method="post" action="<?php echo e(route('wap.register.post')); ?>" onSubmit="return check_form(this)" id="form1">
					    <div class="login-content2-b">
    					    
					        <div class="login-content2-l">
					            <div class="login-content2-l-b">
					                 <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_1.png" />
    					                <input name="name" type="text" id="name" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshuruzanghao')); ?> *" maxlength="9"/>
    					            </div>
    					             <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_2.png" />
    					                <input name="password" type="password" id="registpassword" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshurumima')); ?> *" />
    					            </div>
    					            
    					            <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_2.png" />
    					                <input name="password_confirmation" type="password" id="registpassword2" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingzaicishuru')); ?><?php echo e(trans('lang.mima')); ?> *" />
    					            </div>
    					            <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_3.png" />
    					                <input name="qk_pwd" type="password" id="registtruename" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshuqukuanmima')); ?> *" />
    					            </div>
    					            <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_1.png" />
    					                <input  name="username" type="text" id="username" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.zsxm')); ?> *" />
    					            </div>
    					            <!----->
    					            <?php if($setting->sms_message): ?>
    					            <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_4.png" />
    					                <input name="phone" type="text" id="phone" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.sjh')); ?>" />
    					                <span class="sty2 phoneCodeBtn"><?php echo e(trans('lang.hqyzm')); ?> </span>
    					            </div>
    					            <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_5.png" />
    					                <input name="code" type="text" id="registPhoneCode" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.yzm')); ?>*" />
    					            </div>
    					            <?php else: ?>
    					            <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_4.png" />
    					                <input name="phone" type="text" id="phone" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.sjh')); ?>" />
    
    					            </div>
    					            <?php endif; ?>
    					            
    					             <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_phoneCode.png" />
    					
          
                                        <input name="captcha" type="text" id="paypasswd" oninput="login_input2()"  placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.yzm')); ?>*" />
                                        <a onclick="javascript:re_captcha();" ><img src="<?php echo e(URL('kit/captcha/1')); ?>" style="width:100px; height:40px;" id="c2c98f0de5a04167a9e427d883690ff6"></a>
                                        <script>
                                            function re_captcha() {
                                                $url = "<?php echo e(URL('kit/captcha')); ?>";
                                                $url = $url + "/" + Math.random();
                                                document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
                                            }
                                        </script>
    					            </div>
    					            <!----->
    					            
    					            
					                <div class="login-content2-l-btn-input login-content2-l-btn-input2"  onclick="check_form();" id="btn-login";><?php echo e(trans('lang.zhuce')); ?></div>
    					            
    					            <div onclick="click_show('#denglu');" style="text-align:center; padding-bottom:6vmin;">
    					                <?php echo e(trans('lang.denglu')); ?>

    					            </div>
    					            <!--<div class="login-content2-l-div2">-->
    					            <!--    <p  onclick="div_close('#zhuce')"><?php echo e(trans('lang.fanhui')); ?> </p>-->
    					            
    				             <!--   </div>-->
					            </div>
    					    </div>
    					    </form>
    					    
					    </div>

					</div>
					
			
		</div>
	</div>
</div>


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
        var pattern = /^[0-9]{8,11}$/;
        if (!phone) {

            chenggong_alert(2,"<?php echo e(trans('lang.zhuce_shouji')); ?>")
            return false}
        if(phone.length != 8){

            chenggong_alert(2,"<?php echo e(trans('lang.zhuce_shouji')); ?>")
            return false;
        }
        $.ajax({
            url:"/m/rmsgcode",
            data:{phone:phone},
            success:function(msg){
                chenggong_alert(1,msg.url+msg.status.msg)
                settime()
            }
        });

        return false;
    })

    function login_input2(){
         var password = $("#registpassword").val();
            var cfmpwd = $("#registpassword2").val();
            var registtruename = $("#registtruename").val();
           var loginName = $("#name").val();
         var phone = $('#phone').val();
         var username = $('#username').val();
         var paypasswd = $('#paypasswd').val();
         if(username != '' &&  cfmpwd != ''&&  registtruename != ''&&  loginName != ''&&  phone != ''&&  username != '' && paypasswd != ''){
         $('.login-content2-l-btn-input2').removeClass('login-content2-l-btn-input-no')
            }
            else{
                $('.login-content2-l-btn-input2').addClass('login-content2-l-btn-input-no')
            }
        }
    function check_form() {

   var password = $("#registpassword").val();
        var cfmpwd = $("#registpassword2").val();
        var registtruename = $("#registtruename").val();
       var loginName = $("#name").val();
     var phone = $('#phone').val();
     var username = $('#username').val();
      var paypasswd = $('#paypasswd').val();
         if (!loginName) {

            chenggong_alert(2,"<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.zhanghao')); ?>!")
            return false;
        }
        
         if (!password) {
            chenggong_alert(2,"<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.denglumima')); ?>!")
            return false;
        }
        if (!cfmpwd) {
            henggong_alert(2,"<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.querenmima')); ?>!")
            return false;
        }
        if (password　!= cfmpwd) {
            henggong_alert(2,"<?php echo e(trans('lang.liangcimimabuyizhi')); ?> !")
            return false;
        }
      
         if (!phone) {
            henggong_alert(2,"<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.sjh')); ?>!")
            return false;
        }
        if (!username) {
            henggong_alert(2,"<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.zsxm')); ?>!")
            return false;
        }
         if (!paypasswd) {
            alert("<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.yzm')); ?>");
            return false;
        }
        var pattern = /^[0-9]{8,11}$/;
        if (!phone) {

             henggong_alert(2,"<?php echo e(trans('lang.zhuce_shouji')); ?>")
            return false}
        if(phone.length >11 || phone.length <8){

            henggong_alert(2,"<?php echo e(trans('lang.zhuce_shouji')); ?>")
            return false;
        }
        $('#loading_div').css({'display':'flex'});
        $.ajax({
            url : "<?php echo e(route('wap.register.post')); ?>",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                $('#loading_div').css({'display':'none'});
                if(data.status.errorCode == 0){
                    // div_close('#zhuce')
                    location.reload()
                }else{
                    chenggong_alert(2,data.status.msg);
                }
            }
        })
        return false;
    }

</script>
<!--注册end-->
<!--活动-->
<div class="page" id="huodong">
    <div class="m_container">

		<div class="nytop">
			<a href="javascript:div_close('#huodong');" class="fhbtn"></a>
			<h1><?php echo e(trans("lang.hdzx")); ?></h1>
			
		     
		       <h2 onclick="click_show('#shenqinjindu')" style="    font-size: .32rem;
    color: #fff;
    position: absolute;
    right: 0.4rem;
    top: 0.36rem;"><?php echo e(trans("lang.sqjd")); ?></h2>
		</div>
		<div id="activitylist">
        <?php $__currentLoopData = $data_huodong; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		    <div style="position: relative;">
    			<div class="activitylist" onclick="open_huodong('<?php echo e($item->id); ?>');">
    				<div class="activitylist-img" style="background: rgb(42, 46, 50); min-height: 1rem;">
    					<img class="activeLogo" src="<?php echo e($item->title_img); ?>">
    				</div>
    				<div class="activeTit">
    					<p style="padding:.3rem 0;">
    						<?php echo e($item->title); ?>

    					</p>
    					<p style="padding-bottom: .2rem;">
    						<span>
    						    <?php echo e(trans("lang.hdqj")); ?>：<?php echo e($item->start_at); ?> ~ <?php echo e($item->end_at); ?>

    						</span>
    					</p>
    				</div>
    			    
    			</div>
    			<div class="activespan">
    			        <?php echo e($item->subtitle); ?>

    			    </div>
    			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
		</div>
</div>
</div>
<!--活动end-->
<!--系统公告-->
<div class="page" id="xitonggonggao">
    <div class="m_container">

		<div class="nytop">
			<a href="javascript:div_close('#xitonggonggao');" class="fhbtn"></a>
			<h1><?php echo e(trans('lang.xtgg')); ?></h1>
	        <!--<img class="huodong_img" src="/new0404/images/icon_6.png" />-->
		</div>
		
		<div id="xitonggonggao2">
		    <?php $__currentLoopData = $data_msg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <div class="xitonggonggao" onclick="xitonggonggao_showDetails('<?php echo e($v->content); ?>','<?php echo e($v->title); ?>');">
		        <h6>
		            <?php echo e($v->content); ?>

		        </h6>
		        <p>
		            <?php echo e($v->created_at); ?>

		        </p>
		    </div>
		     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		
	</div>
	
	<div id="xitonggonggao_alert" style="display:none;">
	    <div class="xitonggonggao_alert">
	        <h6><span></span> <img src= "/new/css/close.png" onclick="xitonggonggao_close()"/></h6>
	        <div class="xitonggonggao_content">
	            
	        </div>
	        <div class="xitonggonggao_bottom" onclick="xitonggonggao_close()"><?php echo e(trans('lang.guanbi')); ?></div>
	    </div>
	</div>
</div>
<script>
    function xitonggonggao_showDetails(content,title){
        $('#xitonggonggao_alert').css({'display':'flex'});
        $('#xitonggonggao_alert h6 span').text(title);
        $('#xitonggonggao_alert .xitonggonggao_content').text(content);
    }
    function xitonggonggao_close(){
        $('#xitonggonggao_alert').css({'display':'none'});
        $('#xitonggonggao_alert h6 span').text('');
        $('#xitonggonggao_alert .xitonggonggao_content').text('');
    }
</script>
<!--系统公告-->
<!--申请活动-->
<script>
    function open_huodong(id){
         $('#huodongxiangqing .qbhdbox2').html('');
        $.ajax({
            url:"/m/activity_detail_api/" + id,
            type:'get',
            data:{},
            success:function(data){
                if(data.status.errorCode==0){
                    var data = data.data.data
                    click_show('#huodongxiangqing');
                    $('#huodongxiangqing .zzc_tit h2').text(data.title);
                    $('#huodongxiangqing .qbhdbox h3').html(data.content);

                    if(data.is_apply == 0){
                        <?php if(!Auth::guard('member')->guest()): ?>
                        $('#huodongxiangqing .qbhdbox2').html(`<input type="hidden" name="activity_id" value="`+id+`" class="apply" id="activity_id">
                                                <div style="display: flex;justify-content: space-between;"><button type="button" class="btn4 ajax-submit-btn apply" id="" onclick="shenqinghuodong_fun()" >
                                                    <?php echo e(trans('lang.sqhd')); ?>

                                                </button><button type="button" class="btn4 ajax-submit-btn apply" id="" onclick="div_close('#huodongxiangqing')" >
                                                    <?php echo e(trans('lang.guanbi')); ?>

                                                </button></div>`);
                                                
                        <?php else: ?>
                       
                          $('#huodongxiangqing .qbhdbox2').html(`<div style="display: flex;justify-content: space-between;"><button type="button" class="btn4 ajax-submit-btn apply" onclick="open_div('#denglu')">
                                                <?php echo e(trans('lang.sqhd')); ?>

                                            </button><button type="button" class="btn4 ajax-submit-btn apply" id="" onclick="div_close('#huodongxiangqing')" >
                                                    <?php echo e(trans('lang.guanbi')); ?>

                                                </button></div`);
                        <?php endif; ?>
                    }
                    else{
                         $('#huodongxiangqing .qbhdbox2').html(`<div style="display: flex;justify-content: space-between;"><button type="button" style="width:100%;" class="btn4 ajax-submit-btn apply" id="" onclick="div_close('#huodongxiangqing')" >
                                                    <?php echo e(trans('lang.guanbi')); ?>

                                                </button></div`);
                    }
                }
            }
        })
    }
    var sheqinhuodong_ok = 1;
    function shenqinghuodong_fun(){
        if(sheqinhuodong_ok != 1){
            return;
        }
        sheqinhuodong_ok = 0;
        $.ajax({
            url:"<?php echo e(route('member.apply_activity')); ?>",
            type:'post',
            data:{activity_id:$('#activity_id').val()},
            success:function(data){
                sheqinhuodong_ok = 1;
                if(data.status.errorCode==1){
                    chenggong_alert(2,data.status.msg)
                }else{
                    chenggong_alert(1,data.status.msg)
                }
                
                //if(data.status.errorCode==0){
                    //$(".apply").hide();
               // }
            }
        })
    }
</script>
<div class="m_container page huodongxiangqing" id="huodongxiangqing">


    		<div class="zzc">
        		<div class="zzc_tit">
        			<h2></h2>
        		</div>
        		<div class="qbhd_nr">
        			<ul>
        					<li>
        						<div class="qbhdbox" style="background:transparent;">
        							<h3></h3>

                                    
        						</div>
        					</li>
        			</ul>
        		</div>
        		<div class="qbhdbox2"></div>
        	</div>
</div>
<!--申请活动end-->

<?php if(!Auth::guard('member')->guest()): ?>
<!--充值-->
<div class="page m_bac font_000" id="chongzhi">
    <div class="nytop">
    	<a href="javascript:div_close('#chongzhi');" class="fhbtn"></a>
        <h1><?php echo e(trans("lang.chongzhi")); ?></h1>
    	<h2><a class="kefu_box"><?php echo e(trans("lang.zxkf")); ?></a></h2>
    </div>
    
    <div class="savebox">
                    
                    <div class="saveBar" id="is_qq_on" style="display:none;">
                    	<a href="javascript:click_show('#chongzhi_zhuanhuankuai');">
                            <div class="saveimg"><img src="/new/css/fps.png"></div>
                            <div class="saveTxT">
                                <h2><?php echo e(trans("lang.zsk")); ?></h2>
                            </div>
                            <span></span>
                        </a>
                    </div>
                    
    	            <div class="saveBar" id='is_bankpay_on' style="display:none;">
                    	<a href="javascript:click_show('#chongzhi_yinhangka');$('.bankBox>.banks').eq(0).click()">
                            <div class="saveimg"><img src="/new/css/add2_i911.png"></div>
                            <div class="saveTxT">
                                <h2><?php echo e(trans("lang.yinhangka")); ?></h2>
                            </div>
                            <span></span>
                        </a>
                    </div>
                   
    	            <div class="saveBar" id='is_alipay_on' style="display:none;">
                          <a href="javascript:click_show('#chongzhi_bainlidian');">
                             <div class="saveimg"><img src="/new/css/bld.png"></div>
                             <div class="saveTxT">
                                 <h2><?php echo e(trans("lang.bldzz")); ?></h2>
                             </div>
                             <span></span>
                         </a>
                     </div>
              
        	        <div class="saveBar" id="is_wechat_on" style="display:none;">
                         <a href="javascript:click_show('#chongzhi_USDT');">
                             <div class="saveimg"><img src="/new/css/xnb.png"></div>
                             <div class="saveTxT">
                                 <h2><?php echo e(trans('lang.xnbzf')); ?></h2>
                             </div>
                             <span></span>
                         </a>
                    </div>

                  

    </div>   
</div>
<!--充值end-->
<style>
    .xin_type_1{ padding: .7rem .2rem .4rem; color: #BBA28A;}
		.xin_type_1 > h3{ text-align: center; font-size: 0.34rem; margin-bottom: 0.2rem;}
		.xin_type_1 > h4{ text-align: center; font-size: .3rem; margin-bottom: 0.2rem;}
		.xin_type_1 > h4 span{color:#F9AB10; font-weight: bold; font-size: .4rem;}
		.xin_type_1 > h5{font-size: .24rem; text-align: center;}
		.type_1_list{ padding: .3rem 0;}
		.type_1_list article{display: flex; font-size: .26rem; align-items: center; min-height: 0.6rem; margin-bottom: .2rem;}
		.type_1_list article span{ width: 29%;}
		.type_1_list article p{ width: 62%; color: red; word-break: break-all;}
		.type_1_list article img{width: 15vh; height: 15vh;}
		.type_1_list article i{ width: 13%; background: #BBA28A; height: 0.4rem; color: #fff; line-height: .4rem; text-align: center; font-size: 13px;}
		.type_1_shuoming{ color: #BBA28A; font-size: 12px; line-height: 1.7;}
		.type_1_btn{ width: 100%; width: 100%; background-color: #BBA28A; text-align: center; color: #fff; border: none; font-size: 16px; height: 0.9rem; border-radius: 5px;}
		/*#xin_zhifu_alert,#xin_tixian_alert{ background-color: rgba(0,0,0,.6); position: fixed; display: flex; width: 100%; height: 100%; top: 0; left: 0;  align-items: center; justify-content: center; z-index: 999;}*/
		#xin_zhifu_alert,#xin_tixian_alert{ width: 100%; height: 100%; top: 0; left: 0;}
		.xin_zhifu_alert{ }
		.xin_zhifu_alert > h4{ background-color: #D3C0AC; text-align: center; font-size: .34rem; color: #fff; padding: 0.25rem 0; border-top-left-radius: 10px;border-top-right-radius: 10px;}
		.xin_zhifu_alert_content{ padding:0 .2rem;}
		.xin_zhifu_nav{  padding: 0.3rem .3rem; border-bottom: 1px solid #ccc; margin-bottom: 0.4rem;}
		.xin_jine input:disabled,input[disabled],{color:#BBA28A !important;}
	

		.xin_zhifu_nav:after{ content: ''; display: block; width: 100%; clear: both;}
		.xin_zhifu_nav article{float: left; width: 25%; text-align: center; display: flex; align-items: center; justify-content: center; height: 1rem;}
		.xin_zhifu_nav article.on{ background: url(/images/icon_7.png) right bottom no-repeat; background-size: 25px;}
		.xin_zhifu_nav article img{ width: 56%;}
		.xin_zhifu_bottom{display: flex; justify-content: center; padding-top: 0.7rem; position: relative;}
		.xin_zhifu_bottom:after{ content: ''; width: 2px; display: block; background-color: #D3C0AC; height: 0.8rem; position: absolute; top: 0; left: 50%;}
		.xin_zhifu_bottom img{ width: 1rem;}
		.xin_jine{ display: flex; justify-content: center; align-items: center;}
		.jine{
			-webkit-appearance: none; 
			-moz-box-shadow: 3px 3px 3px #bfbfbf;
			-webkit-box-shadow: 3px 3px 3px #bfbfbf;
			box-shadow: 3px 3px 3px #bfbfbf;
		font-size: .32rem;
		background: #fff;
		color: #000;
		height: 0.9rem; display: block;border: none; padding: 0 15px; border-radius: 5px; width: calc(90% - 35px) ;}
		.xin_jine img{ width: 25px; margin-left: 10px;}
.bankBox1{
    padding: 20px;
        /*float: left;*/
    /*width: calc(100% - 1.6rem);*/
}
.bankBox1 div {
    /*border: 1px solid rgb(84,84,84);*/
    /*width: 43%;*/
    /*margin-right: 0.08rem;*/
    /*color: #292d30;*/
    /*display: inline-block;*/
    /*padding: 0 0.1rem;*/
    /*height: 0.7rem;*/
    /*vertical-align: middle;*/
    /*line-height: .7rem;*/
    /*width: 20%;*/
	height: .8rem;
	box-sizing: border-box;
	margin-bottom: .2rem;
	border-radius: .2rem;
	box-shadow: 0 0.08rem 0.12rem 0 rgba(65,70,92,.3);
	/*background-image: url(../images/tabNormal.png);*/
	background-color: #BBA28A;
	background-repeat: no-repeat;
	background-position: 50%;
	background-size: 120% 100%;
	-webkit-box-align: center;
	align-items: center;
	position: relative;
	overflow: hidden;
	font-size: .2rem;
    color: #fff;
    padding: 0.2rem;
    display: flex;
}
.bankBox1 .on {
    /*border: 1px solid red;*/
    border-bottom-left-radius: 0.24rem;
    border-bottom-right-radius: 0.24rem;
    box-shadow: 0 0.08rem 0.12rem 0 rgb(168 135 102 / 50%);
    background-repeat: no-repeat;
    background-size: cover;
    border-bottom: 1px solid #bd9f7f;
    background-image: url(../images/tabSelected.png);
    color: #fff;
}
.bankBox1 div input {
    display: none;
}
</style>


<div class="page" id="chongzhi2">
        <section id="xin_zhifu_alert">
            <div class="nytop">
            	<a href="javascript:reset();" class="fhbtn"></a>
                <h1><?php echo e(trans("lang.chongzhi")); ?></h1>
            
        </div>
            <section class="xin_zhifu_alert">
            
                <section class="xin_zhifu_alert_content">
                    <article class="xin_zhifu_nav">
                        <?php if(!$setting->is_qq_on): ?>
                        <article class="dopay on" onclick="new_qiehuan(1,this,'<?php echo e(trans('lang.zhuanhuankuai')); ?>')">
                            <img src="/new/css/fps.png" alt="">
                            </article>
                        <?php endif; ?>
    
                        <?php if(!$setting->is_bankpay_on): ?>
                        <article class="dopay" onclick="new_qiehuan(4,this,'<?php echo e(trans('lang.yinhangka')); ?>')">
                            <img src="/new/css/add2_i911.png" alt="" style="width: 81%;">
                            </article>
                        <?php endif; ?>
    
                        <?php if(!$setting->is_alipay_on): ?>
                        <article class="dopay" onclick="new_qiehuan(2,this,'<?php echo e(trans('lang.bldzz')); ?>')">
                            <img src="/new/css/bld.png" alt="">
                        
                        </article>
                        <?php endif; ?>
    
                        <?php if(!$setting->is_wechat_on): ?>
                        <article class="dopay" onclick="new_qiehuan(3,this,'<?php echo e(trans('lang.xnbzf')); ?>')"><img src="/new/css/xnb.png" alt=""></article>
                        <?php endif; ?>
    
                        
    
                    </article>
                    <!--銀行銀行銀行銀行銀行-->
                    <article class="xin_jine" style="margin-bottom:.3rem; display:none;" id="yinghang-select">
                        <select class="jine" id="banksss" style="width:90%;height: 0.9rem;font-size: .32rem;padding: 0 15px;" onchange="setBank();">
                            <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value='<?php echo e($item->id); ?>' data-cardno="<?php echo e($item->card_no); ?>" data-username="<?php echo e($item->username); ?>"><?php echo e($item->bank_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </article>
                    <!--銀行銀行銀行銀行銀行-->
                    <article class="xin_jine">
                        <input type="number" placeholder="<?php echo e(trans("lang.srje")); ?>" id="new_amount" class="jine" oninput ="jine_input()">
                        <img src="/images/icon_10.png" alt="" onclick="$('#new_amount').val('');$('#xin_type1_jine').text('$0.00')">
                    </article>
                    <input type="hidden" name="fanlis" id="new_amounts" value="0">
                     <div class="bankBox1">
        			    	<div class="on">
        					    不送分，本金<?php echo e($setting->ml_percent); ?>倍碼量
        						<input type="radio" name="fanli" id="new_amount_1" value="0">
        					</div>
        						<div class="">
        					 日常充值贈送<?php echo e($setting->cz_ration); ?>%，（本金+送分<?php echo e($setting->rc_ml_percent); ?>倍碼量）
        						<input type="radio" name="fanli" id="new_amount_1" value="1">
        					</div>
        						  <?php if($_member->is_new): ?>
        						<div class="">
        					每日首充赠送<?php echo e($setting->sc_percent); ?>%（本金倍+送分<?php echo e($setting->hongli_ml_percent); ?>倍碼量）
        						<input type="radio" name="fanli" id="new_amount_1" value="2">
        					</div>
        					<?php endif; ?>
        					<?php if($_member->is_new2): ?>
        						<div class="">
        					新会员首充赠送100%（本金倍+送分<?php echo e($setting->hongli_ml_percent); ?>倍碼量）
        						<input type="radio" name="fanli" id="new_amount_1" value="3">
        					</div>
        					 <?php endif; ?>
        				
		            		</div>	
                    <!--<input type="hidden" value="1" id="new_amount_1">-->
                    <article class="xin_jine">
                        <div></div>
                        <!--<select id="new_amount_1" style=" width: 90%; height: 0.9rem; border-radius: 5px; margin-top:.5rem; padding: 0 .2rem;">-->
                        <!--    <option value="0">不送分，本金<?php echo e($setting->ml_percent); ?>倍碼量</option>-->
                        <!--    <option value="1">日常充值贈送<?php echo e($setting->cz_ration); ?>%，（本金+送分<?php echo e($setting->rc_ml_percent); ?>倍碼量）</option>-->
                        <!--    <?php if($member->is_new): ?>-->
                        <!--    <option value="2">每日首充赠送<?php echo e($setting->sc_percent); ?>%（本金倍+送分<?php echo e($setting->hongli_ml_percent); ?>倍碼量）</option>-->
                        <!--    <?php endif; ?>-->
                        <!--</select>-->
                        
                        
                    </article>
                    
    
    
                    <section class="xin_type_1">
                        <h3 id="mingcheng"><?php echo e(trans("lang.zhuanhuankuai")); ?></h3>
                        <h4><?php echo e(trans("lang.huikuanjine")); ?>：<span id="xin_type1_jine">$0.00</span> 
                        <!--<span style="display:none;" id="usdt_lv">* <?php echo e($_system_config->usdt_lv); ?></span>-->
                        </h4>
                        <h5><?php echo e(trans("lang.chongzhi_wenan1")); ?></h5>
                        <section class="type_1_list">
                            <?php if(!$setting->is_qq_on): ?>
                            <section id="zhihu1">
                                <article>
                                    <span><?php echo e(trans("lang.skzh")); ?>：</span>
                                    <p id="qq_account"><?php echo e($_system_config->qq_account); ?></p>
                                    <i class="btn-copy qq_account" data-clipboard-text="<?php echo e($_system_config->qq_account); ?>"><?php echo e(trans("lang.fuzhi")); ?></i>
                                </article>
                                <article>
                                    <span><?php echo e(trans("lang.skzhm")); ?>：</span>
                                    <p id="qq_nickname"><?php echo e($_system_config->qq_nickname); ?></p>
                                    <i class="btn-copy qq_nickname" data-clipboard-text="<?php echo e($_system_config->qq_nickname); ?>"><?php echo e(trans("lang.fuzhi")); ?></i>
                                </article>
                            </section>
                            <?php endif; ?>
    
                            <?php if(!$setting->is_alipay_on): ?>
                            <section id="zhihu2" style="display: none;">
                                <article>
                                    <span><?php echo e(trans("lang.skewm")); ?>：</span>
                                    <img id="bld_pic" src="<?php echo e($setting->bld_pic); ?>" alt="">
                                </article>
                            </section>
                            <?php endif; ?>
    
                            <?php if(!$setting->is_wechat_on): ?>
                            <section id="zhihu3" style="display: none;">
                                <article>
                                    <span><?php echo e(trans("lang.czleixing")); ?>：</span>
                                    <select class="jine" name="usdt_type" onchange="changeType(this.value);" id="usdt_type">
                                        <option value="trc"> USDT TRC20 </option>
                                        <option value="erc"> USDT ERC20 </option>
                                    </select>
                                </article>
                                <article>
                                    <span><?php echo e(trans("lang.czdz")); ?>：</span>
                                    <p id="usdt_1"><?php echo e($_system_config->usdt_trc); ?></p>
                                    <i class="btn-copy" id="usdt_2" data-clipboard-text="<?php echo e($_system_config->usdt_trc); ?>"><?php echo e(trans("lang.fuzhi")); ?></i>
                                </article>
                                <article>
                                    <span><?php echo e(trans("lang.skewm")); ?>：</span>
                                    <img src="<?php echo e($_system_config->usdt_trc_pic); ?>" id="usdt_pic" alt="">
                                </article>
                            </section>
                            <?php endif; ?>
                            
                            <?php if(!$setting->is_bankpay_on): ?>
                            <section id="zhihu4" style="display: none;">
                                <article>
                                    <span><?php echo e(trans("lang.skzh")); ?>：</span>
                                    <p id="bank_card"><?php echo e(count($banks)>0 ? $banks[0]->card_no : ''); ?></p>
                                    <i id="bank_card_2" class="btn-copy" data-clipboard-text="<?php echo e(count($banks)>0  ? $banks[0]->card_no : ''); ?>"><?php echo e(trans("lang.fuzhi")); ?></i>
                                </article>
                                <article>
                                    <span><?php echo e(trans("lang.skzhm")); ?>：</span>
                                    <p id="bank_name"><?php echo e(count($banks)>0 ? $banks[0]->username : ''); ?></p>
                                    <i id="bank_name_2" class="btn-copy" data-clipboard-text="<?php echo e(count($banks)>0  ? $banks[0]->username : ''); ?>"><?php echo e(trans("lang.fuzhi")); ?></i>
                                </article>
                            </section>
                            <?php endif; ?>
                        </section>
                        <section class="type_1_shuoming"><?php echo e(trans("lang.chongzhi_wenan2")); ?>

                            
                        </section>
                        <article style="height:0.3rem;" id="article_margin"></article>
                        <button class="type_1_btn" onclick="chongzhi()"><?php echo e(trans("lang.qrcz")); ?></button>
                    </section>
    
                </section>

                
            </section>
        </section>

</div>
<div class="page" id="tixian2">
    <section id="xin_tixian_alert">
        <section class="xin_zhifu_alert">
         
            <div class="nytop">
            	<a href="javascript: reset2();" class="fhbtn"></a>
                <h1><?php echo e(trans("lang.tixian")); ?></h1>
            
        </div>
            <section class="xin_zhifu_alert_content">
                <section class="xin_type_1" style="padding-top: .7rem;">
                    <article class="xin_jine">
                        <select class="jine" name="bank_name" id="bank_name" style="width: 96%;">
                            <option value="" >-- <?php echo e(trans("lang.qxz")); ?> --</option>
                            <?php if($member->fps): ?>
                                <option value="1"><?php echo e(trans("lang.zsk")); ?></option>
                            <?php endif; ?>
                            <?php if($member->card): ?>
                                <option value="2"><?php echo e(trans("lang.yinhangka")); ?></option>
                            <?php endif; ?>
                            <?php if($member->erc20): ?>
                                <option value="3">erc20</option>
                            <?php endif; ?>
                            <?php if($member->trc20): ?>
                                <option value="4">trc20</option>
                            <?php endif; ?>
                        </select>
                    </article>
                    <article class="xin_jine" style="margin-top: 0.5rem;position: relative; ">
                        <input type="number" name="money" id="money" autocomplete="off" placeholder="<?php echo e(trans("lang.tkje")); ?>" class="jine" style="width: 96%;text-align: center;">
                        <img src="/images/icon_10.png" alt="" onclick="$('#tixian2 #money').val('');" style=" position: absolute; right: 10%;">
                    </article>
                    <article class="xin_jine" style="margin-top: 0.5rem;">
                        <input type="password" style="width: 96%;" name="qk_pwd" id="qk_pwd" autocomplete="off" placeholder="<?php echo e(trans("lang.tkmm")); ?>" class="jine">
                    </article>
                    <article class="xin_jine" style="margin-top: 0.5rem;">
                        <input type="text" readonly style="width: 96%;"  autocomplete="off" class="jine new_ml_money" value="<?php echo e(trans("lang.shengyumaliang")); ?>: <?php echo e($member->ml_money); ?>">
                    </article>
                    <article class="xin_jine" style="margin-top: 0.5rem;">
                        <input type="text" readonly style="width: 96%;"  autocomplete="off" class="jine new_money" value="<?php echo e(trans("lang.yue")); ?>: <?php echo e($member->money); ?>">
                    </article>

                    <article style="height:1.7rem;"></article>
                    <button class="type_1_btn" onclick="tixian()"><?php echo e(trans("lang.querentixian")); ?></button>
                </section>
            </section>

        </section>
        
    </section>
</div>

<script>
var trc_addr = '<?php echo e($_system_config->usdt_trc); ?>';
           var erc_addr = '<?php echo e($_system_config->usdt_erc); ?>';
           var trc_qr = '<?php echo e($_system_config->usdt_trc_pic); ?>';
           var erc_qr = '<?php echo e($_system_config->usdt_erc_pic); ?>';
           
    let type = 1,xiaoshu = "<?php echo e($xiaoshu); ?>";
        var clipboard = new ClipboardJS('.btn-copy');
        clipboard.on('success', function(e) {
            chenggong_alert(1,"<?php echo e(trans('lang.fuzhichenggong')); ?>");
        });
        clipboard.on('error', function(e) {
            chenggong_alert(2,"<?php echo e(trans('lang.fuzhishibai')); ?>");
        });
        
        function changeType(v){
           
           if(v=='trc'){
               $("#usdt_1").text(trc_addr);
               $("#usdt_2").attr('data-clipboard-text',trc_addr);
               $("#usdt_pic").attr('src',trc_qr);
           }else{
               $("#usdt_1").text(erc_addr);
               $("#usdt_2").attr('data-clipboard-text',erc_addr);
               $("#usdt_pic").attr('src',erc_qr);
           }
        }
        
        function setBank(){
            var cardno = $("#chongzhi2 #banksss").find("option:selected").attr('data-cardno');
            var username = $("#chongzhi2 #banksss").find("option:selected").attr('data-username');
            $("#chongzhi2 #bank_name").text(username);
            $("#chongzhi2 #bank_name_2").attr('data-clipboard-text',username);
                       
            $("#chongzhi2 #bank_card").text(cardno);
            $("#chongzhi2 #bank_card_2").attr('data-clipboard-text',cardno);
            
        }
        function jine_input(){
            let val = $("#new_amount").val();
            if(val != '' && val > 0){
                if(type == 4){
                    
                    $('#xin_type1_jine').text('$' + val)
                }
                else{
                    if(type==3){
                        val = Number(val) / Number(<?php echo e($_system_config->usdt_lv); ?>);
                        $('#xin_type1_jine').text('$' + val.toFixed(3))
                    }else{
                        $('#xin_type1_jine').text('$' + val + "." + xiaoshu)
                    }
                    
                }
                
            }
            else{
                $('#xin_type1_jine').text('$0.00');
            }
        }

        function new_qiehuan(int,_this,name){
            type = int;
            $('#mingcheng').text(name)
            if(type == 1){
                $('#article_margin').css({
                    "height": "0.3rem"
                })
            }
            else{
                $('#article_margin').css({
                    "height": ".3rem"
                })
            }
            if(type == 4 ){
                $('#yinghang-select').show();
            }
            else{
                $('#yinghang-select').hide();
            }
            if(type==3){
                $('#usdt_lv').show();
            }else{
                $('#usdt_lv').hide();
            }
            $('#new_amount').val('');
            $('#xin_type1_jine').text('$0.00')
            $(_this).addClass('on').siblings('article').removeClass('on');
            $('#zhihu'+int).show().siblings().hide();
        }
        $('.dopay').eq(0).click()
        function reset2(){
            div_close('#tixian2');
            $("#tixian2 #bank_name").val('');
            $("#tixian2 #money").val('');
            $("#tixian2 #qk_pwd").val('');
            $('#tixian2 #xin_tixian_alert').fadeout();
            
        }
        function reset(){
            div_close('#chongzhi2');
            new_qiehuan(1,$('.xin_zhifu_nav article:eq(0)'),'<?php echo e(trans('lang.zhuanhuankuai')); ?>');
            $('#chongzhi2 #new_amount').val('');
            $('#chongzhi2 #xin_type1_jine').text('$0.00')
            $('#chongzhi2 #xin_zhifu_alert').fadeout();

        }
        function tixian(){
            var bank_name = $("#tixian2 #bank_name").val();
            if(bank_name==''){
                chenggong_alert(2,"<?php echo e(trans("lang.qxz")); ?><?php echo e(trans("lang.txfs")); ?>");
                return false;
            }
            var money = $("#tixian2 #money").val();
            if(money==''){
                chenggong_alert(2,'<?php echo e(trans("lang.qingshuru")); ?><?php echo e(trans("lang.tkje")); ?>')
                return false;
            }

            var qk_pwd = $("#tixian2 #qk_pwd").val();
            if(qk_pwd==''){
                chenggong_alert(2,'<?php echo e(trans("lang.qingshuru")); ?><?php echo e(trans("lang.tkmm")); ?>')
                return false;
            }

            $.ajax({
                type:"post",
                url:"<?php echo e(route('wap.post_drawing')); ?>",
                data : {code:$('#tixian2 #code').val(),qk_pwd:$('#tixian2 #qk_pwd').val(),money:$('#tixian2 #money').val(),bank_card:$('#tixian2 #bank_card').val(),name:$('#tixian2 #name').val(),bank_name:$('#tixian2 #bank_name').val()},
                beforeSend: function(){
                    open_load();
                },
                complete: function(){
                    close_load();
                },
                success : function (data) {
                    if(data.status.errorCode == 0){
                        ///差关闭弹框
                        chenggong_alert(1,data.status.msg);
                        $.ajax({
                                url:'/m/membermoney',
                                success:function(res){
                                    $('.gamemoney_text').text(res.money)
                                }
                            })
                        setTimeout(() => {
                            reset2();
                        },1500)
                    }else{
                        chenggong_alert(2,data.status.msg);
                    }
                    close_load()
                }
            })
        }
        function chongzhi() {
            let val = $("#chongzhi2 #new_amount").val();
            if(val != '' && val > 0){
                if(type == 1){
                    $.ajax({
                        type:"post",
                        url:"<?php echo e(route('wap.post_qq_pay')); ?>",
                        data : {money:$('#chongzhi2 #new_amount').val(),xiaoshu:xiaoshu,fanli:$('#new_amounts').val()},
                        beforeSend: function(){
                            open_load();
                        },
                        complete: function(){
                            close_load();
                        },
                        success : function (data) {
                            if(data.status.errorCode == 0){
                                ///差关闭弹框
                                chenggong_alert(1,data.status.msg);
                                setTimeout(() => {
                                    reset();
                                    window.parent._close_fu();
                                },1500)
                            }else{
                                chenggong_alert(2,data.status.msg);
                            }
                            close_load()
                        }
                    })
                }
                else if(type == 2){
                    $.ajax({
                        type:"post",
                        url:"<?php echo e(route('ajax_pay')); ?>",
                        data : {amount:$('#chongzhi2 #new_amount').val(),xiaoshu:xiaoshu,fanli:$('#new_amount_1').val()},
                        beforeSend: function(){
                            open_load();
                        },
                        complete: function(){
                            close_load();
                        },
                        success : function (data) {
                            if(data.status.errorCode == 0){
                                ///差关闭弹框
                                chenggong_alert(1,data.status.msg);
                                setTimeout(() => {
                                    reset();
                                    window.parent._close_fu();
                                },1500)
                            }else{
                                chenggong_alert(2,data.status.msg);
                            }
                            close_load()
                        }
                    })
                }else if(type == 4){
                    $.ajax({
                        type:"post",
                        url : "<?php echo e(route('ajax_pay')); ?>",
                        data : {amount:$('#chongzhi2 #new_amount').val(),xiaoshu:xiaoshu,'paytype':'bank',usdt_type:$('#chongzhi2 #usdt_type').val(),banksss:$('#chongzhi2 #banksss').fanli(),type:$('#new_amount_1').val()},
                        beforeSend: function(){
                            open_load();
                        },
                        complete: function(){
                            close_load();
                        },
                        success : function (data) {
                            if(data.status.errorCode == 0){
                                ///差关闭弹框
                                chenggong_alert(1,data.status.msg);
                                setTimeout(() => {
                                    reset();
                                    window.parent._close_fu();
                                },1500)
                            }else{
                                chenggong_alert(2,data.status.msg);
                            }
                            close_load()
                        }
                    })
                }else{
                    $.ajax({
                        type:"post",
                        url : "<?php echo e(route('ajax_pay')); ?>",
                        data : {amount:$('#chongzhi2 #new_amount').val(),xiaoshu:xiaoshu,'paytype':'usdt',usdt_type:$('#chongzhi2 #usdt_type').val(),fanli:$('#new_amount_1').val()},
                        beforeSend: function(){
                            open_load();
                        },
                        complete: function(){
                            close_load();
                        },
                        success : function (data) {
                            if(data.status.errorCode == 0){
                                ///差关闭弹框
                                chenggong_alert(1,data.status.msg);
                                setTimeout(() => {
                                    reset();
                                    window.parent._close_fu();
                                },1500)
                            }else{
                                chenggong_alert(2,data.status.msg);
                            }
                            close_load()
                        }
                    })
                }

            }
            else{
                chenggong_alert(2,'<?php echo e(trans("lang.qsrzqdsz")); ?>');
            }

        }
</script>
<!--充值转换快-->
<div class="page chongzhi_cont" id="chongzhi_zhuanhuankuai">
    <div class="nytop">
    	<a href="javascript:div_close('#chongzhi_zhuanhuankuai');$('#chongzhi_zhuanhuankuai #money').val('');
				    $('#chongzhi_zhuanhuankuai #account').val('');" class="fhbtn chongzhi_zhuanhuankuai_fhbtn"></a>
    	<a href="javascript:$('#chongzhi_zhuanhuankuai .bq2-wrapper').hide();$('#chongzhi_zhuanhuankuai #step1').show();$('.chongzhi_zhuanhuankuai_fhbtn2').hide();$('.chongzhi_zhuanhuankuai_fhbtn').show();$('#chongzhi_zhuanhuankuai #money').val('');
				    $('#chongzhi_zhuanhuankuai #account').val('');" style="display:none;" class="fhbtn chongzhi_zhuanhuankuai_fhbtn2" style="display:none;"></a>
        <h1><?php echo e(trans("lang.zsk")); ?></h1>
    	<h2><a class="kefu_box"><?php echo e(trans("lang.zxkf")); ?></a></h2>
    </div>
    
    	<div class="drawInfor">
    	    <div id="step1">
    	        <ul id="step1">
    			<li style="border-bottom: 1px solid rgb(41, 45, 48);">
    			    <span><?php echo e(trans("lang.czje")); ?>：</span>
    			    <input type="text" name="money" id="money" oninput="this.value=this.value.replace(/\D/g,'');" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.czje')); ?>" autocomplete="off">
  
    			</li>
    			<li style="border-bottom: 1px solid rgb(41, 45, 48);">
    			    <span><?php echo e(trans("lang.xingming")); ?>：</span>
    			    <input type="text" name="account" id="account" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.xingming')); ?>" autocomplete="off">
    			</li>
                <li class="bankChose">
    				<span><?php echo e(trans('lang.skyh')); ?>：</span>
    				<div class="bankBox">
    													<b class="on">
    						<img src="/new/css/fps.png"><?php echo e(trans('lang.zhuanhuankuai')); ?>

    						<input type="radio" name="xuankuang" id="rad" value="47">
    					</b>
    												</div>
                </li>
    		</ul>
    	        <input type="hidden" name="payment_type" value="3">
    		<button type="button" class="subBtn ajax-submit-btn-pay-type" id="SubTran1" style="margin: 0.5rem auto;" onclick="chongzhi_zhuanhuankuai_step()"><?php echo e(trans('lang.huoquyinhangxinxi')); ?></button>
    	    </div>
    		
    		
    		<div class="bq2-wrapper" style="display:none;">
    		    <div class="top-block">
            		<div>
            			<span>
            				<?php echo e(trans('lang.hkje')); ?>：
            			</span>
            			<span class="yellow">
            				$ <span id="paymoney"></span>
            			</span>
            		</div>
            	</div>
            	<h3>
            		<?php echo e(trans('lang.chongzhi_wenan1')); ?>

            	</h3>
            	<div class="bot-container">
            		<p class="row account">
                        <span class="asain"> <?php echo e(trans("lang.skzh")); ?>：</span>
            			<span class="chatNumber2" style="color:#fb2464 ;"></span>
            			<span id="btn2" class="copy">
            				<?php echo e(trans("lang.fuzhi")); ?>

            			</span>
            		</p>
            		<p class="row banker">
            			<span class="asain"><?php echo e(trans('lang.xnbzf')); ?>：</span>
            			<span class="chatNumber3" style="color:#fb2464 ;"></span>
            			<span class="copy" id="btn3">
            				<?php echo e(trans("lang.fuzhi")); ?>

            			</span>
            		</p>
            		<div class="btns" >
            			<a class="contact" onclick="$('#chongzhi_zhuanhuankuai .bq2-wrapper').hide();$('#chongzhi_zhuanhuankuai #step1').show();$('.chongzhi_zhuanhuankuai_fhbtn2').hide();$('.chongzhi_zhuanhuankuai_fhbtn').show(); $('#chongzhi_zhuanhuankuai #money').val('');$('#chongzhi_zhuanhuankuai #account').val('')"><?php echo e(trans('lang.xnbzf')); ?></a>
            			<button type="button" class="submit ajax-submit-without-confirm-btn switchroute" onclick="chongzhi_zhuanhuankuai_addrecharge()"><?php echo e(trans("lang.qrcz")); ?></button>
            		</div>
            	</div>
            	<p style="color: red;line-height: 3;margin-top: 20px;">
            	    <?php echo e(trans("lang.chongzhi_wenan2")); ?>

            	</p>
            </div>
        	
    	</div>
    
    <div class="successAlt">
        <img src="/new/css/checkIcon_n.jpg"><?php echo e(trans("lang.fzcg")); ?>！
    </div>
</div>
<script type="text/javascript">
function chongzhi_zhuanhuankuai_step(){
 
    if(!$('#chongzhi_zhuanhuankuai #money').val()){
        chenggong_alert(2,"<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.czje')); ?>")
        return false;
    }
    if($('#chongzhi_zhuanhuankuai #money').val() < Number(<?php echo e($setting->recharge_min); ?>)){
        chenggong_alert(2,"<?php echo e(trans('lang.jebxdy')); ?><?php echo e($setting->recharge_min); ?>")
        return false;
    }
    if($('#chongzhi_zhuanhuankuai #money').val() > Number(<?php echo e($setting->recharge_max); ?>)){
        chenggong_alert(2,"<?php echo e(trans('lang.jebxxy')); ?><?php echo e($setting->recharge_max); ?>")
        return false;
    }
    if(!$('#chongzhi_zhuanhuankuai #account').val()){
        chenggong_alert(2,"<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.xingming')); ?>")
        return false;
    }
       sysconfig();
    // $('#chongzhi_zhuanhuankuai #SubTran1').hide();
    $('#chongzhi_zhuanhuankuai .bq2-wrapper').show();
    $('#chongzhi_zhuanhuankuai #paymoney').text($('#money').val());
    $('#chongzhi_zhuanhuankuai #step1').hide();
    $('.chongzhi_zhuanhuankuai_fhbtn').hide();
    $('.chongzhi_zhuanhuankuai_fhbtn2').show();
}
var ok = 1;
function chongzhi_zhuanhuankuai_addrecharge() {
    if(ok != 1){
        return;
    }
    ok = 0;
			$.ajax({
				type:"post",
				url:"<?php echo e(route('wap.post_qq_pay')); ?>",
				data : {money:$('#chongzhi_zhuanhuankuai #money').val(),account:$('#chongzhi_zhuanhuankuai #account').val()},
				success : function (data) {
				    ok = 1;
					if(data.status.errorCode == 0){
					    ///返回上一页
					    
                        $('#chongzhi_zhuanhuankuai .bq2-wrapper').hide();
                        $('#chongzhi_zhuanhuankuai #step1').show();
                        $('.chongzhi_zhuanhuankuai_fhbtn2').hide();
                        $('.chongzhi_zhuanhuankuai_fhbtn').show();
                        
                        
                        div_close('#chongzhi_zhuanhuankuai');
                        chenggong_alert(1,'<?php echo e(trans("lang.chenggong")); ?>')
                    }else{
                        chenggong_alert(2,data.status.msg)
                    }
                    $('#chongzhi_zhuanhuankuai #money').val('')
				    $('#chongzhi_zhuanhuankuai #account').val('')

				}
			})
		}

	document.getElementsByName("xuankuang")[0].checked = true;
    $('#chongzhi_zhuanhuankuai .bankBox b').eq(0).addClass('on');
		$('#chongzhi_zhuanhuankuai .bankBox b').click(function(){
			$(this).addClass('on').siblings().removeClass('on');
			var num = $(this).index();
			document.getElementsByName("xuankuang")[num].checked = true;
	})


    
    var clipboard2 = new ClipboardJS('#chongzhi_zhuanhuankuai #btn2', {
        target: function() {
            return document.querySelector('#chongzhi_zhuanhuankuai .chatNumber2');
        }
    });
    clipboard2.on('success', function(e) {
        $('#chongzhi_zhuanhuankuai .successAlt').fadeIn();
        setTimeout(function() {
            $('#chongzhi_zhuanhuankuai .successAlt').fadeOut();
        }, 1000);
    });
    
    var clipboard3 = new ClipboardJS('#chongzhi_zhuanhuankuai #btn3', {
        target: function() {
            return document.querySelector('#chongzhi_zhuanhuankuai .chatNumber3');
        }
    });
    clipboard3.on('success', function(e) {
        $('#chongzhi_zhuanhuankuai .successAlt').fadeIn();
        setTimeout(function() {
            $('#chongzhi_zhuanhuankuai .successAlt').fadeOut();
        }, 1000);
    });




	</script>
<!--充值转换快end-->
<!--额度转换-->
<div class="page" id="eduzhuanhuan">
    <div class="nytop">
		<a href="javascript:div_close('#eduzhuanhuan');" class="fhbtn"></a>
		<h1><?php echo e(trans("lang.yehz")); ?></h1>
		<h2><a class="kefu_box" href="<?php echo e($setting->service_link); ?>"><?php echo e(trans("lang.zxkf")); ?></a></h2>
	</div>
	<div class="moneyBag">
			<div class="bagTitle">
				<div class="bagChange">
					<?php echo e(trans("lang.shuaxinjine")); ?>

					<a href="javascript:void(0)" class="refuseBtn"></a>
				</div>
				<div class="getMoney"><a href="javascript:void(0);" id="transfer4" class="refresh11" style="color:#d2b79c"><?php echo e(trans("lang.zijinhuishou")); ?></a></div>
			</div>
			<ul class="moneyInfor">
				<li id="center_money" data-uri="/api/member_balance/4751">
					<div class="moneyName">
						<div></div>
						<span style="color:#fff;"><?php echo e(trans("lang.zxqb")); ?></span>
					</div>
					<p id="gamemoneyy" class="gamemoney_text"><?php echo e($member->money); ?></p>
					<img src="/new/css/loading.png">
				</li>

				<li id="center_money" data-uri="/api/all_balance/4751">
					<div class="moneyName">
						<div></div>
						<span style="color:#fff;"><?php echo e(trans("lang.yxqb")); ?></span>
					</div>
					<p id="api_money"><?php echo e($member->api_money); ?></p>
					<img src="/new/css/loading.png">
				</li>
			</ul>
			<div class="moneyListbox">
				<div class="checkMoremoney">
					<div class="saveBox"><?php echo e(trans("lang.xiangxizhangkai")); ?></div>
					<div class="openmoneyBtn"></div>
				</div>
				<ul class="moenyList">
				    <?php $__currentLoopData = $api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $mod = $_member->apis()->where('api_id', $item->id)->first();
                        ?>
    					<li >
    						<h2><?php echo e($item->api_title); ?></h2>
    						<?php if($mod): ?>
    						    <?php if($item->api_name=='KY'): ?>
    						        <p style="color: #d2b79c;" class="gamecode" data-code="<?php echo e($item->api_name); ?>">  <?php echo e($mod->money / 2); ?>  </p>
    						    <?php else: ?>
    						        <p style="color: #d2b79c;" class="gamecode" data-code="<?php echo e($item->api_name); ?>">  <?php echo e($mod->money); ?>  </p>
    						    <?php endif; ?>
    						    
    						<?php else: ?>
    						    <p>  0  </p>
    						<?php endif; ?>
    					</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</div>
	
</div>
<!--额度转换end-->
<!--充值银行卡-->
<div class="page chongzhi_cont" id="chongzhi_yinhangka">
    <div class="nytop">
	<a href="javascript:div_close('#chongzhi_yinhangka');$('#chongzhi_yinhangka #account').val('');$('#chongzhi_yinhangka #money').val('');" class="fhbtn chongzhi_yinhangka_fhbtn"></a>
	<a href="javascript:$('#chongzhi_yinhangka .bq2-wrapper').hide();$('#chongzhi_yinhangka #step1').show();$('.chongzhi_yinhangka_fhbtn2').hide();$('.chongzhi_yinhangka_fhbtn').show();$('#chongzhi_yinhangka #account').val('');$('#chongzhi_yinhangka #money').val('');" class="fhbtn chongzhi_yinhangka_fhbtn2" style="display:none;"></a>
    <h1><?php echo e(trans("lang.yinhangka")); ?></h1>
	<h2><a class="kefu_box"><?php echo e(trans("lang.zxkf")); ?></a></h2>
</div>

	<div class="drawInfor">
	    <div id="step1">
	        <ul>
			<li style="border-bottom: 1px solid rgb(41, 45, 48);">
			    <span><?php echo e(trans("lang.czje")); ?>：</span>
			    <input type="text" name="money" id="money" oninput="this.value=this.value.replace(/\D/g,'');" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.czje')); ?>" autocomplete="off">
			    <input type="hidden" value="<?php echo e($xiaoshu); ?>" id="xiaoshu">
			    <!--<p style="float:right;margin-right:1rem;">.<?php echo e($xiaoshu); ?> <?php echo e(trans("lang.yuan")); ?></p>-->
			</li>
			<li style="border-bottom: 1px solid rgb(41, 45, 48);">
			    <span><?php echo e(trans("lang.xingming")); ?>：</span>
			    <input type="text" name="account" id="account" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.xingming')); ?>" autocomplete="off">
			</li>
            <li class="bankChose" style="padding-bottom:20px;">
				<span><?php echo e(trans("lang.skyh")); ?>：</span>
				<div class="bankBox" style="display: flex;   flex-wrap: wrap;">
				    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    					<b class="banks" style="margin-bottom:6px;" data-cardno="<?php echo e($item->card_no); ?>" data-username="<?php echo e($item->username); ?>" data-id="<?php echo e($item->id); ?>" data-bank_name="<?php echo e($item->bank_name); ?>">
    						<?php echo e($item->bank_name); ?>

    					</b>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
            </li>
		</ul>
	        <input type="hidden" name="payment_type" value="3">
		<button type="button" class="subBtn ajax-submit-btn-pay-type" id="SubTran1" style="margin: 0.5rem auto;" onclick="chongzhi_yinhangka_step()"><?php echo e(trans("lang.hqskyhxx")); ?></button>
	    </div>
		
		
		<div class="bq2-wrapper" style="display:none;">
		    <div class="top-block">
        		<div>
        			<span>
        				<?php echo e(trans("lang.hkje")); ?>：
        			</span>
        			<span class="yellow">
        				$ <span id="paymoney"></span>
        			</span>
        		</div>
        	</div>
        	<h3>
        		<?php echo e(trans("lang.chongzhi_wenan1")); ?>

        	</h3>
        	<div class="bot-container">
        		<p class="row account">
                    <span class="asain"> <?php echo e(trans("lang.skyh")); ?>：</span>
        			<span class="chatNumber2" style="color:#fb2464 ;"></span>
        			<span id="btn2" class="copy">
        				<?php echo e(trans("lang.fuzhi")); ?>

        			</span>
        		</p>
        		<p class="row banker">
        			<span class="asain"><?php echo e(trans("lang.yhkh")); ?>：</span>
        			<span class="chatNumber3" style="color:#fb2464 ;"></span>
        			<span class="copy" id="btn3">
        				<?php echo e(trans("lang.fuzhi")); ?>

        			</span>
        		</p>
        		<p class="row banker">
        			<span class="asain"><?php echo e(trans("lang.xingming")); ?>：</span>
        			<span class="chatNumbere" style="color:#fb2464 ;"></span>
        			<span class="copy" id="btn4">
        				<?php echo e(trans("lang.fuzhi")); ?>

        			</span>  
        		</p>
        		<div class="btns" >
        			<a class="contact" onclick="$('#chongzhi_yinhangka .bq2-wrapper').hide();$('#chongzhi_yinhangka #step1').show();$('.chongzhi_yinhangka_fhbtn2').hide();$('.chongzhi_yinhangka_fhbtn').show();$('#chongzhi_yinhangka #account').val('');$('#chongzhi_yinhangka #money').val('')"><?php echo e(trans("lang.fanhuichongxinshuru")); ?></a>
        			<button type="button" class="submit ajax-submit-without-confirm-btn switchroute" onclick="chongzhi_yinhangka_addrecharge()"><?php echo e(trans("lang.qrcz")); ?></button>
        		</div>
        	</div>
        	<p style="color: red;line-height: 3;margin-top: 20px;"><?php echo e(trans("lang.chongzhi_wenan2")); ?>

        	</p>
        </div>
    	
    	
		
		
		
		
	</div>

    <div class="successAlt">
        <img src="/new/css/checkIcon_n.jpg"><?php echo e(trans("lang.fzcg")); ?>！
    </div>
</div>
<script type="text/javascript">
var bank_id = 0;

function chongzhi_yinhangka_step(){
    if(!$('#chongzhi_yinhangka #money').val()){
        chenggong_alert(2,"<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.czje')); ?>")
        return false;
    }
    if($('#chongzhi_yinhangka #money').val() < Number(<?php echo e($setting->recharge_min); ?>)){
        chenggong_alert(2,"<?php echo e(trans('lang.jebxdy')); ?><?php echo e($setting->recharge_min); ?>")
        return false;
    }
    if($('#chongzhi_yinhangka #money').val() > Number(<?php echo e($setting->recharge_max); ?>)){
        chenggong_alert(2,"<?php echo e(trans('lang.jebxxy')); ?><?php echo e($setting->recharge_max); ?>")
        return false;
    }
    if(!bank_id){
        chenggong_alert(2,"<?php echo e(trans('lang.qxz')); ?><?php echo e(trans('lang.yinghang')); ?>")
        return false;
    }
    if(!$('#chongzhi_yinhangka #account').val()){
        chenggong_alert(2,"<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.xingming')); ?>")
        return false;
    }
       sysconfig();
    // $('#chongzhi_yinhangka #SubTran1').hide();
    $('#chongzhi_yinhangka .bq2-wrapper').show();
    $('#chongzhi_yinhangka #paymoney').text($('#chongzhi_yinhangka #money').val());
    $('#chongzhi_yinhangka #step1').hide();
    $('.chongzhi_yinhangka_fhbtn').hide();
    $('.chongzhi_yinhangka_fhbtn2').show();
}
var chongzhi_yinhangka_ok = 1;
function chongzhi_yinhangka_addrecharge() {
    if(chongzhi_yinhangka_ok != 1){
        return;
    }
    chongzhi_yinhangka_ok = 0;
    $.ajax({
						type:"post",
						url : "<?php echo e(route('ajax_pay')); ?>",
						data : {amount:$('#chongzhi_yinhangka #money').val(),paytype:'bank',usdt_type:'trc',banksss:bank_id,account:$('#chongzhi_yinhangka #account').val()},
						
						success : function (data) {
						    chongzhi_yinhangka_ok = 1;
							if(data.status.errorCode == 0){
							    $('.chongzhi_yinhangka_fhbtn').show();
                                $('.chongzhi_yinhangka_fhbtn2').hide();
                                
                                $('#chongzhi_yinhangka .bq2-wrapper').hide();
                                $('#chongzhi_yinhangka #step1').show();
                                
							    
								div_close('#chongzhi_yinhangka');
								chenggong_alert(1,"<?php echo e(trans('lang.chenggong')); ?>")
							}else{
							    chenggong_alert(2,data.status.msg)
							}
							
							$('#chongzhi_yinhangka #account').val('')
							$('#chongzhi_yinhangka #money').val('')
						}
					})
		}

    // $('.banks').eq(0).addClass('on');
		$('#chongzhi_yinhangka .banks').click(function(){
			$(this).addClass('on').siblings().removeClass('on');
			var num = $(this).index();
			bank_id = $(this).data('id');
			$('#chongzhi_yinhangka .chatNumber2').text($(this).data('bank_name'));
			$('#chongzhi_yinhangka .chatNumber3').text($(this).data('cardno'));
			$('#chongzhi_yinhangka .chatNumbere').text($(this).data('username'));
            
	    })
	    
var clipboard22 = new ClipboardJS('#chongzhi_yinhangka #btn2', {
    target: function() {
        return document.querySelector('#chongzhi_yinhangka .chatNumber2');
    }
});
clipboard22.on('success', function(e) {
    $('#chongzhi_yinhangka .successAlt').fadeIn();
    setTimeout(function() {
        $('#chongzhi_yinhangka .successAlt').fadeOut();
    }, 1000);
});

var clipboard33 = new ClipboardJS('#chongzhi_yinhangka #btn3', {
    target: function() {
        return document.querySelector('#chongzhi_yinhangka .chatNumber3');
    }
});
clipboard33.on('success', function(e) {
    $('#chongzhi_yinhangka .successAlt').fadeIn();
    setTimeout(function() {
        $('#chongzhi_yinhangka .successAlt').fadeOut();
    }, 1000);
});

var clipboard4 = new ClipboardJS('#chongzhi_yinhangka #btn4', {
    target: function() {
        return document.querySelector('#chongzhi_yinhangka .chatNumbere');
    }
});
clipboard4.on('success', function(e) {
    $('#chongzhi_yinhangka .successAlt').fadeIn();
    setTimeout(function() {
        $('#chongzhi_yinhangka .successAlt').fadeOut();
    }, 1000);
});
	</script>
<!--充值银行卡end-->
<!--充值USDT-->
<div class="page chongzhi_cont" id="chongzhi_USDT">
    <div class="nytop">
	<a href="javascript:div_close('#chongzhi_USDT');$('#chongzhi_USDT #account').val('');$('#chongzhi_USDT #money').val('');$('#chongzhi_USDT #paymoney').val('');" class="fhbtn chongzhi_USDT_fhbtn"></a>
	<a href="javascript:$('#chongzhi_USDT .bq2-wrapper').hide();$('#chongzhi_USDT #step1').show();$('.chongzhi_USDT_fhbtn').show();$('.chongzhi_USDT_fhbtn2').hide();$('#chongzhi_USDT #account').val('');$('#chongzhi_USDT #money').val('');$('#chongzhi_USDT #paymoney').val('');" class="fhbtn chongzhi_USDT_fhbtn2" style="display:none;"></a>
    <h1>USDT</h1>
	<h2><a class="kefu_box"><?php echo e(trans("lang.zxkf")); ?></a></h2>
</div>

	<div class="drawInfor">
	    <div id="step1">
	        <ul>
			<li style="border-bottom: 1px solid rgb(41, 45, 48);">
			    <span><?php echo e(trans("lang.czje")); ?>：</span>
			    <input type="text" name="money" id="money" oninput="this.value=this.value.replace(/\D/g,'');" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.czje')); ?>" autocomplete="off">
			    <input type="hidden" value="<?php echo e($xiaoshu); ?>" id="xiaoshu">
			    <!--<p style="float:right;margin-right:1rem;">.<?php echo e($xiaoshu); ?> <?php echo e(trans("lang.yuan")); ?></p>-->
			</li>
            <li class="bankChose">
				<span><?php echo e(trans("lang.skyh")); ?>：</span>
				<div class="bankBox">
					<b class="on">
						<img src="/new/css/xnb.png">USDT
						<input type="radio" name="chongzhi_USDT_xuankuang" id="rad" value="47">
					</b>
												</div>
            </li>
		</ul>
	        	<input type="hidden" name="payment_type" value="3">
		<button type="button" class="subBtn ajax-submit-btn-pay-type" id="SubTran1" style="margin: 0.5rem auto;" onclick="chongzhi_USDT_step()"><?php echo e(trans("lang.huoquyinhangxinxi")); ?></button>
	    </div>
		
		
		<div class="bq2-wrapper" style="display:none;">
		    <div class="top-block" style="display:flex;margin:10px;width:100%;">
        		<div style="flex:1">
        			<span>
        				<?php echo e(trans("lang.hkje")); ?>：
        			</span>
        			<br>
        			<br>
        			<span class="yellow" id="old">
        				 
        			</span>
        		</div>
        		<div style="flex:1">
        			<span>
        				<?php echo e(trans("lang.huikuangshuliang")); ?>：
        			</span>
        			<br>
        			<br>
        			<span class="yellow">
        				 <span id="paymoney"></span>   USDT
        			</span>
        		</div>
        	</div>
        	<h3>
        		<?php echo e(trans("lang.xitongzidonghuansuan")); ?>

        	</h3>
        	<div class="bot-container">
        		<p class="row account">
                    <span class="asain"> <?php echo e(trans("lang.czdz")); ?>(TRC20)：</span>
        			<span class="chatNumber2" id="trc_address" style="color:#fb2464 ;"></span>
        			<span id="btn2" class="copy">
        				<?php echo e(trans("lang.fuzhi")); ?>

        			</span>
        		</p>
        		<p class="row banker">
        			<span class="asain"><?php echo e(trans("lang.skewm")); ?>：</span>
        			<img id="trc_pic" src="" width="200" height="200" style="margin-left: 0px;margin-top: 0px"/>
        		</p>
        		<div class="btns" >
        			<a class="contact" onclick="$('#chongzhi_USDT .bq2-wrapper').hide();$('#chongzhi_USDT #step1').show();$('.chongzhi_USDT_fhbtn').show();$('.chongzhi_USDT_fhbtn2').hide();$('#chongzhi_USDT #account').val('');$('#chongzhi_USDT #money').val('');$('#chongzhi_USDT #paymoney').val('')"><?php echo e(trans("lang.fanhuichongxinshuru")); ?></a>
        			<button type="button" class="submit ajax-submit-without-confirm-btn switchroute" onclick="chongzhi_USDT_addrecharge()"><?php echo e(trans("lang.qrcz")); ?></button>
        		</div>
        	</div>
        	<p style="color: red;line-height: 2;margin-top: 20px;"><?php echo e(trans("lang.chongzhi_wenan2")); ?>

        	</p>
        </div>
    	
    	
	</div>

<div class="successAlt">
    <img src="/new/css/checkIcon_n.jpg"><?php echo e(trans("lang.fzcg")); ?>！
</div>
</div>
<script type="text/javascript">

var clipboard42 = new ClipboardJS('#chongzhi_USDT #btn2', {
    target: function() {
        return document.querySelector('#chongzhi_USDT .chatNumber2');
    }
});
clipboard42.on('success', function(e) {
    $('#chongzhi_USDT .successAlt').fadeIn();
    setTimeout(function() {
        $('#chongzhi_USDT .successAlt').fadeOut();
    }, 1000);
});


function chongzhi_USDT_step(){
    if(!$('#chongzhi_USDT #money').val()){

        chenggong_alert(2,"<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.czje')); ?>")
        return false;
    }
    if($('#chongzhi_USDT #money').val() < Number(<?php echo e($setting->recharge_min); ?>)){
        chenggong_alert(2,"<?php echo e(trans('lang.jebxdy')); ?><?php echo e($setting->recharge_min); ?>")
        return false;
    }
    if($('#chongzhi_USDT #money').val() > Number(<?php echo e($setting->recharge_max); ?>)){
        chenggong_alert(2,"<?php echo e(trans('lang.jebxxy')); ?><?php echo e($setting->recharge_max); ?>")
        return false;
    }
    
       sysconfig();
    // $('#chongzhi_USDT #SubTran1').hide();
    $('#chongzhi_USDT .bq2-wrapper').show();
    $('#chongzhi_USDT #old').text('$'+$('#chongzhi_USDT #money').val());
    $.ajax({
        url:'/m/usdt_pointer',
        success:function(res){
            $('#chongzhi_USDT #paymoney').text(  (Number(Number($('#chongzhi_USDT #money').val() / <?php echo e($_system_config->usdt_lv); ?>).toFixed(2))+Number(res / 1000)).toFixed(3));
   
            $('#chongzhi_USDT #step1').hide();
            $('.chongzhi_USDT_fhbtn2').show();
            $('.chongzhi_USDT_fhbtn').hide();
        }
    })
    
}
var chongzhi_USDT_ok = 1;
function chongzhi_USDT_addrecharge() {
    if(chongzhi_USDT_ok != 1){
        return;
    }
    chongzhi_USDT_ok = 0;
			$.ajax({
				type:"post",
				url : "<?php echo e(route('ajax_pay')); ?>",
				data : {amount:$('#chongzhi_USDT #money').val(),xiaoshu:$('#chongzhi_USDT #xiaoshu').val(),'paytype':'usdt','account':$('#chongzhi_USDT #paymoney').text()},
				success : function (data) {
				    chongzhi_USDT_ok = 1;
					if(data.status.errorCode == 0){
                            
							 $('.chongzhi_USDT_fhbtn').show();
                            $('.chongzhi_USDT_fhbtn2').hide();
                            $('#chongzhi_USDT .bq2-wrapper').hide();
                            $('#chongzhi_USDT #step1').show();
							div_close('#chongzhi_USDT');
							chenggong_alert(1,"成功")

                    }else{
                        chenggong_alert(2,data.status.msg)
                    }
                    $('#chongzhi_USDT #account').val('')
							$('#chongzhi_USDT #money').val('')
							$('#chongzhi_USDT #paymoney').val('')

				}
			})
		}
	document.getElementsByName("chongzhi_USDT_xuankuang")[0].checked = true;
    $('#chongzhi_USDT .bankBox b').eq(0).addClass('on');
		$('#chongzhi_USDT .bankBox b').click(function(){
			$(this).addClass('on').siblings().removeClass('on');
			var num = $(this).index();
			document.getElementsByName("chongzhi_USDT_xuankuang")[num].checked = true;
	})
	</script>
<!--充值USDTend-->
<!--充值便利店-->
<div class="page chongzhi_cont" id="chongzhi_bainlidian">
    <div class="nytop">
	<a href="javascript:div_close('#chongzhi_bainlidian');" class="fhbtn chongzhi_bainlidian_fhbtn"></a>
	<a href="javascript:$('#chongzhi_bainlidian .bq2-wrapper').hide();$('#chongzhi_bainlidian #step1').show();$('.chongzhi_bainlidian_fhbtn2').hide();$('.chongzhi_bainlidian_fhbtn').show();" class="fhbtn chongzhi_bainlidian_fhbtn2" style="display: none;"></a>
    <h1><?php echo e(trans("lang.bldzz")); ?></h1>
	<h2><a class="kefu_box"><?php echo e(trans("lang.zxkf")); ?></a></h2>
</div>

	<div class="drawInfor">
	    <div id="step1">
		<ul>
			<li style="border-bottom: 1px solid rgb(41, 45, 48);">
			    <span><?php echo e(trans("lang.czje")); ?>：</span>
			    <input type="text" name="money" id="money" oninput="this.value=this.value.replace(/\D/g,'');" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.czje')); ?>" autocomplete="off">
			    <input type="hidden" value="<?php echo e($xiaoshu); ?>" id="xiaoshu">
			    <!--<p style="float:right;margin-right:1rem;">.<?php echo e($xiaoshu); ?> <?php echo e(trans("lang.yuan")); ?></p>-->
			</li>
            <li class="bankChose">
				<span><?php echo e(trans("lang.skyh")); ?>：</span>
				<div class="bankBox">
													<b class="on">
						<img src="/new/css/bld.png"><?php echo e(trans("lang.bldzz")); ?>

						<input type="radio" name="xuankuang" id="rad" value="47">
					</b>
												</div>
            </li>
		</ul>
		<input type="hidden" name="payment_type" value="3">
		<button type="button" class="subBtn ajax-submit-btn-pay-type" id="SubTran1" style="margin: 0.5rem auto;" onclick="chongzhi_bainlidian_step()"><?php echo e(trans("lang.huoquyinhangxinxi")); ?></button>
		</div>
		
		<div class="bq2-wrapper" style="display:none;">
		    <div class="top-block">
        		<div>
        			<span class="white">
        				<?php echo e(trans("lang.hkje")); ?>：
        			</span>
        			<span class="yellow">
        				$ <span id="paymoney"></span>
        			</span>
        		</div>
        	</div>
        	<h3>
        		<?php echo e(trans("lang.chongzhi_wenan1")); ?>

        	</h3>
        	<div class="bot-container">
        		<p class="row account">
                    <span class="asain"> <?php echo e(trans("lang.skewm")); ?>：</span><br/>
        			<img id="bld_pic" src=""  style="width:200px;height:200px;margin:0 auto;"/>
        			
        		</p>
        		
        		<div class="btns" >
        			<a class="contact" onclick="$('#chongzhi_bainlidian .bq2-wrapper').hide();$('#chongzhi_bainlidian #step1').show();$('.chongzhi_bainlidian_fhbtn2').hide();$('.chongzhi_bainlidian_fhbtn').show();"><?php echo e(trans("lang.fanhuichongxinshuru")); ?></a>
        			<button type="button" class="submit ajax-submit-without-confirm-btn switchroute" onclick="chongzhi_bainlidian_addrecharge()"><?php echo e(trans("lang.qrcz")); ?></button>
        		</div>
        	</div>
        	<p style="color: red;line-height: 2;margin-top: 20px;"><?php echo e(trans("lang.chongzhi_wenan2")); ?>

        	</p>
        </div>
    
		
	</div>

<div class="successAlt">
    <img src="/new/css/checkIcon_n.jpg"><?php echo e(trans("lang.fzcg")); ?>！
</div>
</div>
<script type="text/javascript">
function chongzhi_bainlidian_step(){
    var n = Math.ceil(Math.random()*100); 
    var ts = "<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.czje')); ?>";
   // $('#xiaoshu').val(n);
    if(!$('#chongzhi_bainlidian #money').val()){

        chenggong_alert(2,ts)
        return false;
    }
    if($('#chongzhi_bainlidian #money').val() < Number(<?php echo e($setting->recharge_min); ?>)){

        chenggong_alert(2,"<?php echo e(trans('lang.jebxdy')); ?><?php echo e($setting->recharge_min); ?>")
        return false;
    }
    if($('#chongzhi_bainlidian #money').val() > Number(<?php echo e($setting->recharge_max); ?>)){

        chenggong_alert(2,"<?php echo e(trans('lang.jebxxy')); ?><?php echo e($setting->recharge_max); ?>")
        return false;
    }
       sysconfig();
    $('#chongzhi_bainlidian .bq2-wrapper').show();
    $('#chongzhi_bainlidian #paymoney').text($('#money').val());
    $('#chongzhi_bainlidian #step1').hide();
    $('.chongzhi_bainlidian_fhbtn2').show();
    $('.chongzhi_bainlidian_fhbtn').hide();
}
var chongzhi_bainlidian_ok = 1;
function chongzhi_bainlidian_addrecharge() {
    if(chongzhi_bainlidian_ok != 1){
        return;
    }
    chongzhi_bainlidian_ok = 0;
			$.ajax({
				type:"post",
				url:"<?php echo e(route('ajax_pay')); ?>",
				data : {amount:$('#chongzhi_bainlidian #money').val(),xiaoshu:xiaoshu},
				success : function (data) {
				    chongzhi_bainlidian_ok = 1;
					if(data.status.errorCode == 0){
                        //成功
                        $('.chongzhi_bainlidian_fhbtn2').hide();
                        $('.chongzhi_bainlidian_fhbtn').show();
                         $('#chongzhi_bainlidian #money').val('')
                         $('#chongzhi_bainlidian .bq2-wrapper').hide();
                         $('#chongzhi_bainlidian #step1').show();
						 div_close('#chongzhi_bainlidian');

						 chenggong_alert(1,'<?php echo e(trans("lang.chenggong")); ?>')
                    }else{
                        chenggong_alert(2,"data.status.msg")
                    }

				}
			})
		}
    
    $('#chongzhi_bainlidian input[name="xuankuang"]').eq(0).prop('checked',true)

    $('#chongzhi_bainlidian .bankBox b').eq(0).addClass('on');
		$('#chongzhi_bainlidian .bankBox b').click(function(){
			$(this).addClass('on').siblings().removeClass('on');
			var num = $(this).index();

			 $('#chongzhi_bainlidian input[name="xuankuang"]').eq(num).prop('checked',true)
	})
	</script>
<!--充值便利店end-->
<!--银行卡管理-->
<div class="page body-pages" id="yinhangkaguanli">
	<div class="pages-container show">
		<a data-link="" href="javascript:div_close('#yinhangkaguanli')" class="close-btn"></a>
		<div data-page-name="BankManagement" data-link="user-center" class="pages-main security-main active ani">
			<div class="pages-header">
				<h1 class="text_1040"><?php echo e(trans("lang.yinhangkabangding")); ?></h1>
			</div>
			<div class="pages-content">
				<div class="BankList-wrapper">
					<div class="btnline" style="width: 100%; height: 80px;">
						<div class="addbank text_1039"
							 style="<?php if($member['bank']): ?> display: none; <?php else: ?> display: inline-block; <?php endif; ?> background: #BBA28A; width: 40%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 5%; float: left;    color: #fff;
    font-size: 14px;"><?php echo e(trans('lang.xzyhk')); ?></div>
						<div class="addFPS text_1161"
							 style="<?php if($member['fps']): ?> display: none; <?php else: ?> display: inline-block; <?php endif; ?> background: #BBA28A; width: 40%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 5%; float: left;    color: #fff;
    font-size: 14px;"><?php echo e(trans('lang.xzzsk')); ?></div>
						<div class="addERC20"
							 style="<?php if($member['erc20']): ?> display: none; <?php else: ?> display: inline-block; <?php endif; ?> background: #BBA28A; width: 44%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 3%; float: left;    color: #fff;
    font-size: 14px;">
							USDT-ERC20
						</div>
						<div class="addTRC20"
							 style="<?php if($member['trc20']): ?> display: none; <?php else: ?> display: inline-block; <?php endif; ?> background: #BBA28A; width: 44%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 3%; float: left;    color: #fff;
    font-size: 14px;">
							USDT-TRC20
						</div>
						<!-- <div class="addBEP20" style="display: none; background: #f1ea91; width: 44%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 3%; float: left;">BEP20</div>
                        <div class="addBEP2" style="display: none; background: #f1ea91; width: 44%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 3%; float: left;">BEP2</div> -->
						<div class="listtext text_1164"
							 style="display: inline-block; background: #D3C0AC; width: 90%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px; float: left;color: #fff;
    font-size: 16px;"><?php echo e(trans('lang.yhklb')); ?></div>
					</div>
					<div class="list" style="display: inline-block; width: 100%;">
						<?php if($member['bank']): ?>
						<div class="bank-list-item"  style="width: 91%; border-radius:5px; margin: 15px; background: #b1987f; border: 1px solid #d1b497; padding: 0 10px 10px; color: #fff; font-size: 12px;">
							<div style="text-align: center;  border-bottom: 1px solid #fff; line-height: 40px;  margin-bottom: 10px;  font-size: 16px;"><?php echo e(trans("lang.bdyhk")); ?></div>
							<div style="height: 30px; line-height: 30px;"><?php echo e(trans("lang.zsxm")); ?>: <?php echo e($member['username']); ?></div>
							<div style="height: 30px; line-height: 30px;"><?php echo e(trans("lang.yhmc")); ?>: <?php echo e($member['bank']); ?></div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;"><?php echo e(trans("lang.yhkh")); ?>: ***<?php echo e(substr($member['card'],3)); ?>

							</div>
						</div>
						<?php endif; ?>
						<?php if($member['fps']): ?>
						<div class="bank-list-item"  style="width: 91%; border-radius:5px; margin: 15px; background: #b1987f; border: 1px solid #d1b497; padding: 0 10px 10px; color: #fff; font-size: 12px;">
							<div style="text-align: center;  border-bottom: 1px solid #fff; line-height: 40px;  margin-bottom: 10px;  font-size: 16px;"><?php echo e(trans("lang.bdzsk")); ?></div>
							<div style="height: 30px; line-height: 30px;"><?php echo e(trans("lang.zsxm")); ?>: <?php echo e($member['username']); ?></div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;"><?php echo e(trans("lang.zsk")); ?><?php echo e(trans("lang.zhanghao")); ?>: ***<?php echo e(substr($member['fps'],3)); ?>

							</div>
						</div>
						<?php endif; ?>
						<?php if($member['erc20']): ?>
						<div class="bank-list-item"  style="width: 91%; border-radius:5px; margin: 15px;  background: #b1987f; border: 1px solid #d1b497; padding:0 10px 10px; color: #fff; font-size: 12px;">
							<div style="text-align: center;  border-bottom: 1px solid #fff; line-height: 40px;  margin-bottom: 10px;  font-size: 16px;">USDT-ERC20</div>
							<div style="height: 30px; line-height: 30px;"><?php echo e(trans("lang.zsxm")); ?>: <?php echo e($member['username']); ?></div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">USDT<?php echo e(trans("lang.zhanghao")); ?>: ***<?php echo e(substr($member['erc20'],3)); ?>

							</div>
						</div>
						<?php endif; ?>
						<?php if($member['trc20']): ?>
						<div class="bank-list-item"  style="width: 91%; border-radius:5px; margin: 15px;  background: #b1987f; border: 1px solid #d1b497; padding: 0 10px 10px; color: #fff; font-size: 12px;">
							<div style="text-align: center;  border-bottom: 1px solid #fff; line-height: 40px;  margin-bottom: 10px;  font-size: 16px;">USDT-TRC20</div>
							<div  style="height: 30px; line-height: 30px;"><?php echo e(trans("lang.zsxm")); ?>: <?php echo e($member['username']); ?></div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">USDT<?php echo e(trans("lang.zhanghao")); ?>: ***<?php echo e(substr($member['trc20'],3)); ?>

							</div>
						</div>
						<?php endif; ?>
					</div>
					<div class="text_1162"
						 style="color: #ff2b2b;
    margin: 5px 20px;
    display: inline-block;
    font-size: 14px;
    text-align: left;
    line-height: 1.6;"></div>
				</div>
			</div>
		</div>
	</div>
	<div id="addbank" class="modal after-close add-card-dialog fade in" style="display: none;height:80%;top:55%;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="wm-bind-wrap">
					<div class="person-acc-box">
						<div class="text_508" style="color: #ff0000;"></div>
						<div class="acc-data" style="height: 70px;">
							<span class="text_208" style="line-height:39px;"><?php echo e(trans('lang.zsxm')); ?></span>
							<input type="text"  class="username2" required="required" style="font-size: 12px;margin:0;"
								   placeholder="<?php echo e(trans("lang.qsr")); ?><?php echo e(trans("lang.qsrckrxm")); ?>" value="<?php echo e($member['username']); ?>" >
						</div>
						<div class="acc-data datahide" type="bank" style="height: 70px; display: block;">
							<span class="text_231" style="line-height:39px;"><?php echo e(trans('lang.yhmc')); ?></span>
						    <select id="Bankname" style="font-size: 12px; margin:0; background: #ffffff; border: 1px solid #dcb454; width: 100%;">
								<?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($vo); ?>"><?php echo e($vo); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="acc-data datahide" type="bank" style="height: 70px; display: block;">
							<span class="text_370" style="line-height:39px;"><?php echo e(trans('lang.yhkh')); ?></span>
							<input id="bankcode" type="text" required="required" minlength="15" maxlength="19"
								   style="font-size: 12px;margin:0;" placeholder="<?php echo e(trans("lang.qsryhkh")); ?>">
						</div>
						<div style="position: absolute; width: 92%; bottom: 0;">
    						<a class="recharge-submit text_155" onclick="yinhangkaguanli_saveBank();" style="color: #fff;"><?php echo e(trans('lang.quedihng')); ?></a>
    						<a class="recharge-cancel text_135" style="color: #fff;"><?php echo e(trans('lang.quxiao')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="addFPS" class="modal after-close add-card-dialog fade in" style="display: none;height:80%;top:55%;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="wm-bind-wrap">
					<div class="person-acc-box">
						<div class="text_508" style="color: #ff0000;"></div>
						<div class="acc-data" style="height: 70px;">
							<span class="text_208" style="line-height:39px;"><?php echo e(trans('lang.zsxm')); ?></span>
							<input  class="username2" type="text" required="required" style="font-size: 12px;margin:0;"
								   placeholder="<?php echo e(trans("lang.qsr")); ?><?php echo e(trans("lang.qsrckrxm")); ?>" value="<?php echo e($member['username']); ?>" >
						</div>
						<div class="acc-data datahide" type="FPS" style="height: 70px;">
							<span class="text_368" style="line-height:39px;"><?php echo e(trans('lang.zskzh')); ?></span>
							<input id="FPSAccount" type="text" required="required" style="font-size: 12px;margin:0;"
								   placeholder="<?php echo e(trans("lang.qsrzskhm")); ?>">
						</div>
						<div style="position: absolute; width: 92%; bottom: 0;">
    						<a class="recharge-submit text_155" onclick="saveFps();" style="color: #fff;"><?php echo e(trans('lang.quedihng')); ?></a>
    						<a class="recharge-cancel text_135" style="color: #fff;"><?php echo e(trans('lang.quxiao')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="addERC20" class="modal after-close add-card-dialog fade in" style="display: none;height:80%;top:55%;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="wm-bind-wrap">
					<div class="person-acc-box">
						<div class="text_508" style="color: #ff0000;"></div>
						<div class="acc-data" style="height: 70px;">
							<span class="text_208" style="line-height:39px;"><?php echo e(trans('lang.zsxm')); ?></span>
							<input  class="username2" type="text" required="required" style="font-size: 12px;margin:0;"
								   placeholder="<?php echo e(trans("lang.qsr")); ?><?php echo e(trans("lang.qsrckrxm")); ?>" value="<?php echo e($member['username']); ?>" >
						</div>
						<div class="acc-data datahide" type="ERC20" style="height: 70px;">
							<span class="text_442" style="line-height:39px;"><?php echo e(trans('lang.qsrusdtzh')); ?></span>
							<input id="USDTAccount" type="text" required="required" style="font-size: 12px;margin:0;"
								   placeholder="<?php echo e(trans("lang.qsr")); ?>USDT<?php echo e(trans('lang.zhanghao')); ?>">
						</div>
						<div class="text_519 datahide" type="ERC20" style="color: rgb(255, 0, 0);"></div>
						<div style="position: absolute; width: 92%; bottom: 0;">
						<a class="recharge-submit text_155" onclick="saveErc20();" style="color: #fff;"><?php echo e(trans('lang.quedihng')); ?></a>
						<a class="recharge-cancel text_135" style="color: #fff;"><?php echo e(trans('lang.quxiao')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="addTRC20" class="modal after-close add-card-dialog fade in" style="display: none;height:80%;top:55%;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="wm-bind-wrap">
					<div class="person-acc-box">
						<div class="text_508" style="color: #ff0000;"></div>
						<div class="acc-data" style="height: 70px;">
							<span class="text_208" style="line-height:39px;"><?php echo e(trans('lang.zsxm')); ?></span>
							<input  class="username2" type="text" required="required" style="font-size: 12px;margin:0;"
								   placeholder="<?php echo e(trans("lang.qsr")); ?><?php echo e(trans("lang.qsrckrxm")); ?>" value="<?php echo e($member['username']); ?>" >
						</div>
						<div class="acc-data datahide" type="TRC20" style="height: 70px;">
							<span class="text_442" style="line-height:39px;"><?php echo e(trans('lang.qsrusdtzh')); ?></span>
							<input id="USDTAccountTRC20" type="text" required="required"
								   style="font-size: 12px;margin:0;" placeholder="<?php echo e(trans("lang.qsr")); ?>USDT<?php echo e(trans('lang.zhanghao')); ?>">
						</div>
						<div class="text_524 datahide" type="TRC20" style="color: rgb(255, 0, 0); display: none;"></div>
						<div style="position: absolute; width: 92%; bottom: 0;">
						<a class="recharge-submit text_155" onclick="saveTrc20();" style="color: #fff;"><?php echo e(trans('lang.quedihng')); ?></a>
						<a class="recharge-cancel text_135" style="color: #fff;"><?php echo e(trans('lang.quxiao')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	document.getElementsByName("fanli")[0].checked = true;
    $('.bankBox1 div').eq(0).addClass('on');
		$('.bankBox1 div').click(function(){
			$(this).addClass('on').siblings().removeClass('on');
			var num = $(this).index();
			console.log(num,'num---')
				$('#new_amounts').val(num);
			console.log($('#new_amounts').val(),'读取')
			document.getElementsByName("fanli")[num].checked = true;
	})
// yinhangkaguanli
	function yinhangkaguanli_saveBank() {
		var bank = $("#yinhangkaguanli #Bankname").val();
		var username = $("#yinhangkaguanli .username2").eq(0).val();
		var card = $("#yinhangkaguanli #bankcode").val();
		if(username.length<2){
			chenggong_alert(2,"<?php echo e(trans("lang.qsr")); ?><?php echo e(trans("lang.qsrckrxm")); ?>")
			return ;
		}
		if(card.length<8){
		    chenggong_alert(2,"<?php echo e(trans("lang.qsryhkh")); ?>")

			return ;
		}
		$.ajax({
			url : "<?php echo e(route('wap.set_bank')); ?>",
			type: 'POST',
			data: {'bank':bank,'card':card,'username':username,'type':1},
			success: function (data) {

				
				if (data.status.errorCode == 0) {
					$('#addbank,.addbank').hide();
					$('#yinhangkaguanli .list').append(`<div class="bank-list-item"  style="width: 91%; border-radius:5px; margin: 15px; background: #b1987f; border: 1px solid #d1b497; padding: 0 10px 10px; color: #fff; font-size: 12px;">
							<div style="text-align: center;  border-bottom: 1px solid #fff; line-height: 40px;  margin-bottom: 10px;  font-size: 16px;"><?php echo e(trans('lang.bdyhk')); ?></div>
							<div style="height: 30px; line-height: 30px;"><?php echo e(trans('lang.zsxm')); ?>:` + username +`</div>
							<div style="height: 30px; line-height: 30px;"><?php echo e(trans('lang.yhmc')); ?>: `+ bank+`</div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;"><?php echo e(trans('lang.yhkh')); ?>: ***`+ card.substring(card.length - 3) +`
							</div>
						</div>`)
						 $("#yinhangkaguanli .username2").eq(0).val('');
						 $('.tixian_btn').attr('onclick','new_tixian()');
						 chenggong_alert(1,data.status.msg)
				// 	location.reload();
				}
				else{
				    chenggong_alert(2,data.status.msg)
				}
				
			}
		})
		return false;
	}
	function saveFps() {
		var fps = $("#yinhangkaguanli #FPSAccount").val();
		var username = $("#yinhangkaguanli .username2").eq(1).val();
		if(username.length<2){
			chenggong_alert(2,"<?php echo e(trans("lang.qsr")); ?><?php echo e(trans("lang.qsrckrxm")); ?>")
			return ;
		}
		if(fps.length<8){
			chenggong_alert(2,"<?php echo e(trans("lang.qsrzskhm")); ?>")
			return ;
		}
		$.ajax({
			url : "<?php echo e(route('wap.set_bank')); ?>",
			type: 'POST',
			data: {'fps':fps,'username':username,'type':2},
			success: function (data) {
				if (data.status.errorCode == 0) {
					 $('#addFPS,.addFPS').hide();
					$('#yinhangkaguanli .list').append(`
					<div class="bank-list-item"  style="width: 91%; border-radius:5px; margin: 15px; background: #b1987f; border: 1px solid #d1b497; padding: 0 10px 10px; color: #fff; font-size: 12px;">
							<div style="text-align: center;  border-bottom: 1px solid #fff; line-height: 40px;  margin-bottom: 10px;  font-size: 16px;">USDT-ERC20</div>
							<div  style="height: 30px; line-height: 30px;"><?php echo e(trans('lang.zsxm')); ?>: ` + username + `</div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">USDT<?php echo e(trans('lang.zhanghao')); ?>: ***`+ fps.substring(fps.length - 3) +`
							</div>
						</div>`)
						$("#yinhangkaguanli .username2").eq(1).val('');
						$('.tixian_btn').attr('onclick','new_tixian()');
						chenggong_alert(1,data.status.msg)
				// 	location.reload();
				}
				else{
				    chenggong_alert(2,data.status.msg)
				}
				
			}
		})
		return false;
	}

	function saveErc20() {
		var erc20 = $("#yinhangkaguanli #USDTAccount").val();
		var username = $("#yinhangkaguanli .username2").eq(2).val();
		if(username.length<2){
			chenggong_alert(2,"<?php echo e(trans("lang.qsr")); ?><?php echo e(trans("lang.qsrckrxm")); ?>")
			return ;
		}
		if(erc20.length<8){

			chenggong_alert(2,"<?php echo e(trans("lang.qsr")); ?>USDT<?php echo e(trans("lang.zhanghao")); ?>")
			return ;
		}
		$.ajax({
			url : "<?php echo e(route('wap.set_bank')); ?>",
			type: 'POST',
			data: {'erc20':erc20,'username':username,'type':3},
			success: function (data) {
				
				if (data.status.errorCode == 0) {
				    $('#addERC20,.addERC20').hide();
					$('#yinhangkaguanli .list').append(`
					<div class="bank-list-item"  style="width: 91%; border-radius:5px; margin: 15px; background: #b1987f; border: 1px solid #d1b497; padding: 0 10px 10px; color: #fff; font-size: 12px;">
							<div style="text-align: center;  border-bottom: 1px solid #fff; line-height: 40px;  margin-bottom: 10px;  font-size: 16px;">USDT-ERC20</div>
							<div  style="height: 30px; line-height: 30px;"><?php echo e(trans('lang.zsxm')); ?>: ` + username + `</div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">USDT<?php echo e(trans('lang.zhanghao')); ?>: ***`+ erc20.substring(erc20.length - 3) +`
							</div>
						</div>`)
					    $("#yinhangkaguanli .username2").eq(2).val('');
					    $('.tixian_btn').attr('onclick','new_tixian()')
					    chenggong_alert(1,data.status.msg)
				// 	location.reload();
				}
				else{
				    chenggong_alert(2,data.status.msg)
				}
				
			}
		})
		return false;
	}

	function saveTrc20() {
		var trc20  = $("#yinhangkaguanli #USDTAccountTRC20").val();
		var username = $("#yinhangkaguanli .username2").eq(3).val();
		if(username.length<2){
			chenggong_alert(2,"<?php echo e(trans("lang.qsr")); ?><?php echo e(trans("lang.qsrckrxm")); ?>")
			return ;
		}
		if(trc20.length<8){
			chenggong_alert(2,"<?php echo e(trans("lang.qsr")); ?>USDT<?php echo e(trans("lang.zhanghao")); ?>")
			return ;
		}
		$.ajax({
			url : "<?php echo e(route('wap.set_bank')); ?>",
			type: 'POST',
			data: {'trc20':trc20,'username':username,'type':4},
			success: function (data) {
				if (data.status.errorCode == 0) {
				    $('#addTRC20,.addTRC20').hide();
					$('#yinhangkaguanli .list').append(`
					<div class="bank-list-item"  style="width: 91%; border-radius:5px; margin: 15px; background: #b1987f; border: 1px solid #d1b497; padding: 0 10px 10px; color: #fff; font-size: 12px;">
							<div style="text-align: center;  border-bottom: 1px solid #fff; line-height: 40px;  margin-bottom: 10px;  font-size: 16px;">USDT-TRC20</div>
							<div  style="height: 30px; line-height: 30px;"><?php echo e(trans('lang.zsxm')); ?>: ` + username + `</div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">USDT<?php echo e(trans('lang.zhanghao')); ?>: ***`+ trc20.substring(trc20.length - 3) +`
							</div>
						</div>`)
						$("#yinhangkaguanli .username2").eq(3).val('');
						$('.tixian_btn').attr('onclick','new_tixian()')
						chenggong_alert(1,data.status.msg)
				// 	location.reload();
				}
				else{
				    chenggong_alert(2,data.status.msg)
				}
				
			}
		})
		return false;
	}

	$('#yinhangkaguanli .addbank').click(function(){
		$("#yinhangkaguanli #addbank").show();
	});
	$('#yinhangkaguanli .addFPS').click(function(){
		$("#yinhangkaguanli #addFPS").show();
	});
	$('#yinhangkaguanli .addERC20').click(function(){
		$("#yinhangkaguanli #addERC20").show();
	});
	$('#yinhangkaguanli .addTRC20').click(function(){
		$("#yinhangkaguanli #addTRC20").show();
	});
	$('#yinhangkaguanli .text_135').click(function(){
		$(this).parents('#yinhangkaguanli .modal').hide();
	})
</script>
<!--银行卡管理end-->
<!--提现-->
<div class="page body-pages" id="tixian">
    <div class="nytop">
	<a href="javascript:div_close('#tixian')" class="fhbtn"></a>
    <h1><?php echo e(trans('lang.tixian')); ?></h1>
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
                        <option value="2"><?php echo e(trans('lang.yinhangka')); ?></option>
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
			<li class="black"><span><?php echo e(trans("lang.tkje")); ?></span><input type="text" name="money" id="money" oninput="this.value=this.value.replace(/\D/g,'');" autocomplete="off" style="width:75%;"></li>
			<li class="black"><span><?php echo e(trans("lang.tkmm")); ?></span><input type="password" name="qk_pwd" id="qk_pwd" placeholder="" autocomplete="off" style="width:75%;"></li>
			<?php if($setting->sms_message): ?>
			    <!--<li style="position:relative;">-->
			    <!--    <span><?php echo e(trans("lang.yzm")); ?></span>-->
			    <!--    <input type="number" name="code" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.yzm')); ?>" autocomplete="off" id="code">-->
			    <!--    <input type="button" id="btn" value="<?php echo e(trans('lang.hqyzm')); ?>" class="sty2 yanzhen" style="height: 27px;outline: none;cursor: pointer;position: absolute;top: 13px;right: 20px;">-->
			    <!--</li>-->
			<?php endif; ?>
			<div style="padding-top:15px;font-size:20px;"><?php echo e(trans("lang.shengyujihe")); ?>:<span id="ml_money"><?php echo e($member->ml_money); ?></span></div>
			<div style="padding-top:15px;font-size:20px;">
			    <?php echo e(trans("lang.yue")); ?>:<span id="gamemoney" class="old_money gamemoney_text"><?php echo e($member->money); ?></span>
			    
			    <input type="button" value="<?php echo e(trans('lang.zijinhuishou')); ?>" class="subBtn transfer_text" style="margin:0;width:70px;float: right;line-height: 30px;font-size:12px;" id="transfer2">
			</div>
		</ul>
		<input type="button" value="<?php echo e(trans('lang.qr')); ?>" class="subBtn ajax-submit-btn" id="tixian_subBtn">
		<div style="color:#fff;line-height:2"><?php echo e(trans("lang.tkts")); ?></div>

	</div>
</div>
<script>
    var tixian_ok = 1;
	$('#tixian_subBtn').click(function(){
		var bank_name = $("#tixian #bank_name").val();
		if(bank_name==''){

			chenggong_alert(2,'<?php echo e(trans("lang.qxz")); ?><?php echo e(trans("lang.txfs")); ?>')
			return false;
		}
		var money = $("#tixian #money").val();
		if(money==''){

			chenggong_alert(2,'<?php echo e(trans("lang.qsr")); ?><?php echo e(trans("lang.tkje")); ?>')
			return false;
		}

	    var qk_pwd = $("#tixian #qk_pwd").val();
		if(qk_pwd==''){
			chenggong_alert(2,'<?php echo e(trans("lang.qsr")); ?><?php echo e(trans("lang.tkmm")); ?>')
			return false;
		}

        if(tixian_ok != 1){
                return;
            }
            tixian_ok = 0;
	    $.ajax({
				type:"post",
				url:"<?php echo e(route('wap.post_drawing')); ?>",
				data : {code:$('#tixian #code').val(),qk_pwd:$('#tixian #qk_pwd').val(),money:$('#tixian #money').val(),bank_card:$('#tixian #bank_card').val(),name:$('#tixian #name').val(),bank_name:$('#tixian #bank_name').val()},
				success : function (data) {
				    tixian_ok = 1;
					if(data.status.errorCode == 0){
                        //成功
                        chenggong_alert(1,"<?php echo e(trans('lang.chenggong')); ?>")

						div_close('#tixian');
						$.ajax({
                                url:'/m/membermoney',
                                success:function(res){
                                    $('.gamemoney_text').text(res.money)
                                }
                            })
                    }else{
                        chenggong_alert(2,data.status.msg)
                    }
                     $('#tixian #code').val('')
                         $('#tixian #qk_pwd').val('')
                         $('#tixian #money').val('')
                         $('#tixian #bank_card').val('')
                         $('#tixian #name').val('')
						$('#tixian #bank_name').val('')
				}
			})
	})
	
</script>
<!--提现end-->
<!--申请进度-->
<div class="m_container1 page" id="shenqinjindu">

    <div class="nytop" style="position: fixed;top:0;width: 100%;">
        <a href="javascript:div_close('#shenqinjindu');" class="fhbtn"></a>
        <h1><?php echo e(trans('lang.sqjd')); ?></h1>
    </div>
    <div id="main-container" style="height:100%;background:url(../img/main-bg-m-dark.6ea06ca.jpg) no-repeat 0 0 !important;">
        
        
    
        <div class="Hyzx-body">                
            
            <div id="MMainData" style="width:96%;    margin: 5vmin auto 0;
    background: linear-gradient(180deg, #4d4c4a, #262626) !important;
    border: 1px solid #444 !important;
    box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12) !important;
    border-radius: 4px;
    padding: 12px 0;">
                
                <ul class="list-group" style="padding: 15px;">
                            <?php $__currentLoopData = $data_shenqingjindu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(@$item->activity): ?>
                                    <li class="list-group-item message-item" style="background: linear-gradient(180deg, #4d4c4a, #262626) !important;padding: .4rem .4rem;font-size: 16px;line-height: 1.5;border-radius:5px; margin-bottom:.3rem;">
                                        <div class="message-title" style="color:#fff;"><?php echo e(trans('lang.hgbt')); ?>：<?php echo e($item->activity->title); ?></div>
                                        <div class="message-content" style="color:#fff;">
                                            <?php if($item->status == 3): ?>
                                                <?php echo e(trans('lang.ndhdsqwtg')); ?>：<?php echo e($item->fail_reason); ?>

                                            <?php endif; ?>
                                            <?php if($item->status == 2): ?>
                                                <?php echo e(trans('lang.shenqing_title1')); ?>

                                            <?php endif; ?>
                                            <?php if($item->status == 1): ?>
                                                <?php echo e(trans('lang.shenqing_title2')); ?>

                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
            </div>
        </div>
    </div>

</div>
<!--申请进度end-->
<!--资金回收-->
<!--<div class="page" id="zijinhuishou">-->
<!--    <div class="m_container">-->
<!--	<div class="nytop">-->
<!--		<a href="javascript:div_close('#zijinhuishou');" class="fhbtn"></a>-->
<!--		<h1><?php echo e(trans("lang.yehz")); ?></h1>-->
<!--		<h2><a class="kefu_box"><?php echo e(trans("lang.zxkf")); ?></a></h2>-->
<!--	</div>-->

<!--	<div class="moneyBag">-->
<!--			<div class="bagTitle">-->
<!--				<div class="bagChange">-->
<!--					刷新金額<?php echo e(trans('lang.quxiao')); ?>-->
<!--					<a href="javascript:void(0)" class="refuseBtn"></a>-->
<!--				</div>-->
<!--				<div class="getMoney"><a href="javascript:void(0);" class="refresh11 transfer_text" id="transfer3" style="color:#d2b79c">資金回收<?php echo e(trans('lang.quxiao')); ?></a></div>-->
<!--			</div>-->
<!--			<ul class="moneyInfor">-->
<!--				<li id="center_money" data-uri="/api/member_balance/4751">-->
<!--					<div class="moneyName">-->
<!--						<div></div>-->
<!--						<span>中心錢包<?php echo e(trans('lang.quxiao')); ?></span>-->
<!--					</div>-->
<!--					<p id="gamemoneyy" class="gamemoneyy gamemoney_text"><?php echo e($member->money); ?></p>-->
<!--					<img src="/new/css/loading.png">-->
<!--				</li>-->

<!--				<li id="center_money" data-uri="/api/all_balance/4751">-->
<!--					<div class="moneyName">-->
<!--						<div></div>-->
<!--						<span>遊戲錢包<?php echo e(trans('lang.quxiao')); ?></span>-->
<!--					</div>-->
<!--					<p id="api_money">0</p>-->
<!--					<img src="/new/css/loading.png">-->
<!--				</li>-->
<!--			</ul>-->
<!--			<div class="moneyListbox">-->
<!--				<div class="checkMoremoney">-->
<!--					<div class="saveBox">詳細展開<?php echo e(trans('lang.quxiao')); ?></div>-->
<!--					<div class="openmoneyBtn"></div>-->
<!--				</div>-->
<!--				<ul class="moenyList">-->
				    
<!--				</ul>-->
<!--			</div>-->
<!--		</div>-->
<!--		<div class="changeBox" >-->
<!--			<div class="changeInfor" style="color: #bda287;box-shadow: 0 2px 4px rgb(0 0 0 / 20%);width: 95%;margin: 0 auto;border-radius: 10px;">-->
<!--				<div class="changeTitle">-->
<!--					<div class="changeChose">-->
<!--						<span id="chose1" data-from="center">中心錢包</span>-->
<!--						<i></i>-->
<!--					</div>-->
<!--					<div class="changeChose">-->
<!--						<span id="chose2" data-to="274">DG</span>-->
<!--						<i></i>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="enterMoney">-->
<!--					<span>$</span>-->
<!--					<input id="trans_money" type="tel" class="moneyNum" placeholder="請輸入轉賬金額">-->
<!--					 <a href="javascript:void();" class="maxNum">最大金额</a> -->
<!--				</div>-->
<!--			</div>-->
<!--			<button class="changeNow">立即轉賬</button>-->
<!--		</div>-->
<!--		<div class="needHelp">如需幫助，請<a class="kefu_box"><?php echo e(trans("lang.zxkf")); ?></a></div>-->
<!--		<div id="screen"></div>-->
<!--		<div class="choseList" id="chonseOne">-->
<!--			<div class="chostTitle">-->
<!--				<a href="javascript:void(0)" class="escChose">取消</a>-->
<!--				選擇遊戲-->
<!--			</div>-->
<!--			<ul>-->
<!--				<li class="cur" data-from="center">中心錢包</li>-->
<!--				<?php $__currentLoopData = $api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--					<li data-from="<?php echo e($item->id); ?>"><?php echo e($item->api_title); ?></li>-->
<!--				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--			</ul>-->
<!--		</div>-->
<!--		<div class="choseList" id="chonseTwo">-->
<!--			<div class="chostTitle">-->
<!--				<a href="javascript:void(0)" class="escChose">取消</a>-->
<!--				選擇遊戲-->
<!--			</div>-->
<!--			<ul>-->
<!--				<li data-to="center">中心錢包</li>-->
<!--				<?php $__currentLoopData = $api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--					<li data-to="<?php echo e($item->id); ?>"><?php echo e($item->api_title); ?></li>-->
<!--				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					-->
<!--			</ul>-->
<!--		</div>-->
       
<!--</div>-->
<!--</div>-->
<script>
    // $('body').on('click','.kefu_box',function(){
    //     layer.open({
    //         content: '<div class="layui-m-layerbtn"><span yes="" type="1" onclick="tapCopy('+"'url_whats'"+')" data-clipboard-target="#url">WHATSAPP<?php echo e($setting->whatsapp); ?> </span></div>   <div class="layui-m-layerbtn"><a href="<?php echo e($setting->service_link); ?>" target="_blank"><span yes="" type="1"><?php echo e(trans("lang.zxkf")); ?></span></a></div>'
    //         ,skin: 'footer'
    //     });
    // })
//     function tapCopy(){
//         location.href="<?php echo e(getset('whatsapp_url')); ?>"
//     }
//     function wechat(){
//         layer.open({
//             content: '<img src="<?php echo e($setting->wx_pic); ?>" style="width:200px;height:200px;">'
//             ,btn: 'OK'
//         });
//     }
    
    
//  	//监听是否输入金额
//  	$(document).on("input propertychange",".moneyNum",function(){
//         var num = $(this).val().length;
// 		console.log(num);
// 		if(num>0){
// 			$('.changeNow').addClass('cur')
// 		}else{
// 			$('.changeNow').removeClass('cur')
// 		}
//     });
    
    
    
//  	$('.changeNow').click(function () {
//  		var from = $('#chose1').attr('data-from');
//  		var to = $('#chose2').attr('data-to');
//  		var trans_money = $('#trans_money').val();
//         if(from=='center'){
//             var transfer_type = 0;
//             var account2 = to;
//         }else{
//             var transfer_type = 1;
//             var account2 = from;
//         }
//  		if (trans_money == ''){
// 			layer.open({
// 				content: '請輸入轉賬金額'
// 				,skin: 'msg'
// 				,time: 2 //2秒后自动关闭
// 			});
// 			return false;
// 		}
//  		$(this).attr('disabled',true);
//  		var that = $(this);
//  		var loding =  layer.open({
// 			type: 2
// 			,content: '加载中',
// 			shade: 'background-color: rgba(0,0,0,.5)' //自定义遮罩的透明度
// 		});
		
// 		$.ajax({
//             url : "<?php echo e(route('member.post_transfer')); ?>",
//             type : 'POST',
//             data : {money:trans_money,transfer_type:transfer_type,account2:account2,account1:1},
//             success : function (data) {
//                  alert(data.status.msg);
//                 if(data.status.errorCode == 0){
//                     //成功
//                     // div_close('#zijinhuishou')
//                     $('.refuseBtn').click();
                    
//                     $(this).removeAttr('disabled');
//                 }
//                 layer.close(loding);
//             }
//         })
// 	})
	
// 		$('#chonseOne li').click(function(){
// 		var choseTxt = $(this).html();
// 		$('#chose1').html(choseTxt);
// 		var from = $(this).attr('data-from');
// 		$('#chose1').attr('data-from',from);
// 		$('#screen').fadeOut();
// 		$(this).addClass('cur').siblings().removeClass('cur');
// 		$('#chonseOne').animate({'bottom':'-200%'},500);
// 		$('body').css('position','static');
// 		if(choseTxt=='中心錢包'){

// 		}else{
// 			$('#chonseTwo li').eq(0).addClass('cur').siblings().removeClass('cur');
// 			$('#chose2').html('中心錢包')
// 			$('#chose2').attr('data-to','center');
// 		}
// 	})
// 	$('#chose1').click(function(){
// 		$('#screen').fadeIn();
// 		$('#chonseOne').animate({'bottom':'0'},500);
// 		$('body').css('position','fixed');
// 	})
// 	//转账方式2
// 	$('#chonseTwo li').click(function(){
// 		var choseTxt = $(this).html();
// 		$('#chose2').html(choseTxt);
// 		var to = $(this).attr('data-to');
// 		$('#chose2').attr('data-to',to);
// 		$('#screen').fadeOut();
// 		$(this).addClass('cur').siblings().removeClass('cur');
// 		$('#chonseTwo').animate({'bottom':'-200%'},500);
// 		$('body').css('position','static');
// 		if(choseTxt=='中心錢包'){

// 		}else{
// 			$('#chonseOne li').eq(0).addClass('cur').siblings().removeClass('cur');
// 			$('#chose1').html('中心錢包');
// 			$('#chose1').attr('data-from','center');
// 		}
// 	})
// 	$('#chose2').click(function(){
// 		$('#screen').fadeIn();
// 		$('#chonseTwo').animate({'bottom':'0'},500);
// 		$('body').css('position','fixed');
// 	})
// 	$('.escChose').click(function(){
// 		$('#screen').fadeOut();
// 		$('#chonseTwo,#chonseOne').animate({'bottom':'-200%'},500);
// 		$('body').css('position','static');
// 	})
	var refalse = true;
	$('.refuseBtn').click(function(){
	    if(!refalse){
	        return false;
	    }
	    refalse = false;
	    var len = $('.gamecode').length;
	    var api_money = 0;
	    $('.gamecode').each(function(k,v){
            var _this=$(this);
            var money=_this.text();
            _this.html('加载中...');
            $.ajax({
                    url:'/api/check?api_name='+_this.data('code'),
                    success:function(res){
						if(res.Code==0){
						    _this.text(res.Data);
						    api_money += Number(res.Data)
						}else{
						    _this.text('0');
						}
						if (k === len - 1)
            		    {
                    		        $.ajax({
                                        url:'/member/getNowMoney',
                                        success:function(res){
                                            $('.transfer_text').text('<?php echo e(trans("lang.zijinhuishou")); ?>');
                        		            $('.transfer_text').val('<?php echo e(trans("lang.zijinhuishou")); ?>');
                                            $('.gamemoney_text').text(res.data)
                                            $('#api_money').text(api_money.toFixed(2));
                                            refalse = true;
                                        }
                                    })
                            
            		    }
                    },error:function(res){
                        _this.text(money);
                    }
                })
            
		});	
	})
</script>
<!--资金回收-->
<!--申请代理-->
<div class="page" id="shenqingdaili">
    <div class="nytop">
    	<a href="javascript:div_close('#shenqingdaili');" class="fhbtn"></a>
        <h1><?php echo e(trans("lang.sqdl")); ?></h1>
    </div>
    <div class="drawInfor">
		<ul>

			<li><span>Whatsapp</span><input type="text" name="qq" id="qq" placeholder="<?php echo e(trans('lang.qsr')); ?>Whatsapp"  autocomplete="off"></li>
			<li><span><?php echo e(trans("lang.sjh")); ?></span><input type="text" name="phone" id="phone" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.sjh')); ?>" autocomplete="off" minlength="8" ></li>
			<li><span><?php echo e(trans("lang.sqly")); ?></span><textarea  name="about" id="about" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.sqly')); ?>" autocomplete="off" style="    background: none;
    line-height: 2;
    border: none;
    height: 100px;
    color: #fff;
    margin-top: 20px;width:70%;font-size:14px;"></textarea></li>
			
			
		</ul>
		<input type="button" value="<?php echo e(trans('lang.qr')); ?>" class="subBtn ajax-submit-btn" id="subBtn">
	</div>
</div>
<script>

	$('#shenqingdaili #subBtn').click(function(){

	    $.ajax({
				type:"post",
				url:"<?php echo e(route('wap.post_agent_apply')); ?>",
				data : {qq:$('#shenqingdaili #qq').val(),phone:$('#shenqingdaili #phone').val(),about:$('#shenqingdaili #about').val()},
				success : function (data) {
					if(data.status.errorCode == 0){
						chenggong_alert(1,data.status.msg)
                        location.href='/m/userinfo';
                    }
					else{
						chenggong_alert(2,data.status.msg)
					}
				}
			})
			return false;
	})
</script>
<!--申请代理-->

<div id="loading_div" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0,0,0,.5);display: none;align-items: center;justify-content: center;z-index: 99999;">

	<div class="loader" style="
		width: 34px;
		height: 34px;
		border-radius: 50%;
		border: 7px solid #d3aa74;
		border-top: 7px solid transparent;
		animation: load 1s linear infinite;
	"></div>
</div>
<!--我的-->
<div class="page" id="wode">
    <div class="body-pages">
    	<div class="pages-container show" style="height:100vh;">
    	    
  
                <!-- 個人中心 -->
                <div data-page-name="user-center" class="pages-main page-user-center-main active ani">
                
                <div class="nytop">
            		<a href="javascript:javascript:div_close('#wode');" class="fhbtn"></a>
            		<h1><?php echo e(trans('lang.grzx')); ?></h1>
    
            	</div>

                    
                    <div class="grzx">
                		<div class="grzxbox">
                			<h2>
                			    <?php echo e($_member -> name); ?>


                			</h2>
                				<p onclick="click_show('#gerenxinxi')"style="float:left;"><i class="xtb1"></i><?php echo e(trans("lang.xgmm")); ?></p>
                
                				<div style="clear:both"></div>
                			<ul>
                                
                				<li onclick="click_show('#bangdingshouji')"><span><i class=" xtb3 "></i><?php echo e(trans("lang.bdsj")); ?></span></li>
                		        <li style="float: left;"  onclick="click_show('#dailizhongxin');">
                				    <span style="line-height:1.5">
                				        <img src="/new/img/agent2.png" style="float: left;margin-right:5px;width:20px;    margin-top: 2px;" ><?php echo e(trans("lang.dlzx")); ?>

                				    </span>
                				</li>
                				
                		        <?php if($_member->is_daili && 1==2): ?>
                				<li style="float: left;"  onclick="click_show('#dailizhongxin');">
                				    <span style="line-height:1.5">
                				        <img src="/new/img/agent2.png" style="float: left;margin-right:5px;width:20px;    margin-top: 2px;" ><?php echo e(trans("lang.dlzx")); ?>

                				    </span>
                				</li>
                                <?php endif; ?>
                                <?php if(!$_member->is_daili && 1==2): ?>
                				<!--<li style="float: left;" onclick="click_show('#shenqingdaili');">-->
                				<!--    <span style="line-height:1.5">-->
                				<!--        <img src="/new/img/agent.png" style="float: left;margin-right:5px;width:20px;" ><?php echo e(trans("lang.sqdl")); ?>-->
                				<!--    </span>-->
                				<!--</li>-->
                                <?php endif; ?>
                                <?php if($_member->fps && $_member->card): ?>
                                <li  onclick="click_show('#yinhangkaguanli')">
                				    <span style="line-height:1.5">
                				        <img src="/new/img/a45.png" style="float: left;margin-right:5px;width:20px;    margin-top: 5px;" ><?php echo e(trans("lang.yinhangkabangding")); ?>

                				    </span>
                				</li>
                                <?php else: ?>
                				<li onclick="click_show('#yinhangkaguanli')">
                				    <span style="line-height:1.5">
                				        <img src="/new/img/a47.png" style="float: left;margin-right:5px;width:20px;    margin-top: 5px;" ><?php echo e(trans("lang.yinhangkabangding")); ?>

                				    </span>
                				</li>
                				<?php endif; ?>
                			</ul>
                			
                		</div>
                	</div>
                	
                	<div class="zzc">
                		<div class="zzc_tit">
                			<h2 style="float:left;"><?php echo e(trans("lang.zzhye")); ?></h2>
                			<!-- <h2 style="float:right;"><?php echo e(trans("lang.byxzze")); ?></h2> -->
                			<h2 style="clear:both;"></h2>
                		</div>
                		<div class="zzc_nr">
                			<div style="overflow: hidden;float:left; width:45%;">
                				<span style="display:block;float:left;width:.45rem;margin-right: .16rem;"><i class="xtb5">$</i></span>
                				<span id="gamemoney" class="gamemoney_text" style="color: #eb8f74;font-size: .48rem;display:block;float:left;width:52%;line-height: .48rem;"><?php echo e($_member -> money); ?></span>
                			</div>
                            <div style="overflow: hidden;float:right;text-align:right;">
                            	<button style=" background: linear-gradient(to right, #ec5c4d , #fa2563);
                    border: none;
                    color: #fff;
                    line-height: .5rem;
                    padding: 0 0.2rem;
                    border-radius: 1rem;" class="transfer_text" id="transfer"><?php echo e(trans("lang.zijinhuishou")); ?></button>
                				<!-- <span style="display:block;float:left;width:.45rem;margin-right: .16rem;"><i class="xtb5">$</i></span>
                				<span id="gamemoney" style="color: #eb8f74;font-size: .48rem;display:block;float:left;width:52%;line-height: .48rem;"><?php echo e($_member -> liushui_total); ?></span> -->
                			</div>
                			<h2 style="clear:both;"></h2>
                			<ul>
                				
                				<li><a href="javascript:;" onclick="new_chongzhi()" class="on1"><i class="xtb6"></i><?php echo e(trans("lang.chongzhi")); ?></a></li>
                				<!--<li><a onclick="alert('维护中')" class="on1"><i class="xtb6"></i><?php echo e(trans("lang.chongzhi")); ?></a></li>-->
                				<li><a href="javascript:void(0);" class="xmjf"><i class="xtb10"></i><?php echo e(trans("lang.fanshui")); ?></a></li>
                
                				<li><a href="javascript:new_tixian()"><i class="xtb8"></i><?php echo e(trans("lang.tixian")); ?></a></li>
                			</ul>
                		</div>
                	</div>
                	<div class="zzc">
                		<div class="zzc_tit">
                			<h2><span class="fr"><a href="javascript:click_show('#xitonggonggao')"><?php echo e(trans("lang.qbxx")); ?></a></span><?php echo e(trans("lang.xiaoxi")); ?></h2>
                		</div>
                		<div class="qbhd_nr">
                			<ul>
                					<li>
                						<div class="qbhdbox">
                						    <?php if($data_xiaoxi2): ?>
                						        <h3 style="color:#fff;line-height: 1.2;"><?php echo e($data_xiaoxi2->content); ?></h3>
                							<?php else: ?>
                						        <h3><?php echo e(trans("lang.zwjl")); ?></h3>
                						    <?php endif; ?>
                							
                						</div>
                					</li>
                			</ul>
                		</div>
                	</div>
                	<div class="zzc">
                		<div class="zzc_tit">
                			<h2><span class="fr"><a href="javascript:click_show('#huodong');"><?php echo e(trans("lang.gengduo")); ?></a></span><?php echo e(trans("lang.flhd")); ?></h2>
                		</div>
                		<div class="qbhd_nr">
                			<ul>
                			    <?php $__currentLoopData = $data_huodong; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                				    <li>
                							<a href="javascript:open_huodong('<?php echo e($item->id); ?>');">
                								<div class="qbhdbox">
                									<span class="xtb9"></span>
                									<h2><?php echo e($item->title); ?></h2>
                									<p><?php echo e($item->hdsj); ?></p>
                									<span class="xtb7"></span>
                								</div>
                							</a>
                				    </li>
                				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
                			</ul>
                		</div>
                		<!--<div style="background: linear-gradient(to right, #d3b99e , #caa167);border-radius: .12rem;text-align: center;">-->
                		<!--	<a href="/m/my_activity" style="color:#fff;display: block;padding: .32rem 0;">活動列表</a>-->
                		<!--</div>-->
                	</div>
                	<div class="zzc" style="padding-bottom:3%;">
                		<div class="zzc_tit">
                			<h2><span class="fr"><a href="javascript:click_show('#chongzhijilv')"><?php echo e(trans("lang.xiangxi")); ?></a></span><?php echo e(trans("lang.baobiao")); ?></h2>
                		</div>
                		<div class="qbhd_nr">
                			<ul>
                				<li>
                					<div class="zxjl">
                						<div class="zxjl_left">
                							<img src="/new/css/a47.png">
                							<p><?php echo e(trans("lang.cunkuan")); ?></p>
                						</div>
                
                						<div class="zxjl_right">
                						    <?php if($recharge): ?>
                						    <b class="fr">
                								<h2>
                								    <?php if($recharge->status==1): ?><?php echo e(trans("lang.dqr")); ?><?php endif; ?>
                								    <?php if($recharge->status==2): ?><font color="#20a53a"><?php echo e(trans("lang.chenggong")); ?></font><?php endif; ?>
                								    <?php if($recharge->status==3): ?><font color="#ff3300"><?php echo e(trans("lang.shibai")); ?></font><?php endif; ?>
                								</h2>
                							</b>
                							<p><span><?php echo e(date('m-d',strtotime($recharge->created_at))); ?></span><?php echo e($recharge->money); ?><?php echo e(trans("lang.yuan")); ?></p>
                							<p>
                								<span><?php echo e(date('i:s',strtotime($recharge->created_at))); ?></span><em>
                									<?php echo e(config('platform.recharge_type')[$recharge->payment_type]); ?>

                								</em>
                							</p>
                						    <?php else: ?>
                						        <h2 style="margin-right:.4rem"><?php echo e(trans("lang.zwjl")); ?></h2>
                						    <?php endif; ?>
                							
                						</div>
                					</div>
                				</li>
                				<li>
                					<div class="zxjl">
                						<div class="zxjl_left">
                							<img src="/new/css/a49.png">
                							<p><?php echo e(trans("lang.tixian")); ?></p>
                						</div>
                						<div class="zxjl_right">
                							<?php if($drawing): ?>
                						    <b class="fr">
                								<h2>
                								    <?php if($drawing->status==1): ?><?php echo e(trans("lang.dqr")); ?><?php endif; ?>
                								    <?php if($drawing->status==2): ?><font color="#20a53a"><?php echo e(trans("lang.chenggong")); ?></font><?php endif; ?>
                								    <?php if($drawing->status==3): ?><font color="#ff3300"><?php echo e(trans("lang.shibai")); ?></font><?php endif; ?>
                								</h2>
                							</b>
                							<p><span><?php echo e(date('m-d',strtotime($drawing->created_at))); ?></span><?php echo e($drawing->money); ?><?php echo e(trans("lang.yuan")); ?></p>
                							<p>
                								<span> <?php echo e(date('i:s',strtotime($drawing->created_at))); ?></span><em>
                									<?php echo e($drawing->bank_name); ?>

                								</em>
                							</p>
                						    <?php else: ?>
                						        <h2 style="margin-right:.4rem"><?php echo e(trans("lang.zwjl")); ?></h2>
                						    <?php endif; ?>
                						</div>
                					</div>
                				</li>
                			</ul>
                		</div>
                		<a href="javascript:;" class="btn2" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><?php echo e(trans("lang.tcdl")); ?></a>
                	</div>
                	
                </div>
                
            </div>
    	
        
        <form id="logout-form" action="<?php echo e(route('wap.logout')); ?>" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

        </form> 
    	
	</div>
    
</div>
<div class="cmtc" style="bottom:-25rem;z-index:999999">
	<form action="/m/send_fsss" method="post" onsubmit="$('.submit-form-sync').attr('disabled',true);">
		<div class="cmtc_tit"><h2><?php echo e(trans("lang.ssfs")); ?></h2></div>
		<div class="cmnr">
							<h2><span>$&nbsp;</span><strong id="zongfangshui"><?php echo e($total['fs_money']); ?></strong></h2>
			<p class="xmsm"><?php echo e(trans("lang.zzxm")); ?></p>
		</div>
		<div class="cmbtn">
			<ul>
				<li><a href="javascript:void(0);" class="btn3"><?php echo e(trans("lang.quxiao")); ?></a></li>
				<li>
					<button type="button" class="btn4 ajax-submit-btn" id="fanshuic">
						<?php echo e(trans("lang.qr")); ?>

					</button>
				</li>
			</ul>
		</div>
	</form>
</div>
<script>
        

$('.xmjf').click(function(){
	$('.cmtc').css('bottom','20px');
	$('.bj').fadeIn();
	$.ajax({
            url : "/m/fs_money",
            success : function (res) {
                $('#zongfangshui').text(res.fs_money)
            }
        })
})
$('.btn3').click(function(){
			$('.cmtc').css('bottom','-25rem');
			$('.bj').fadeOut();
			$('#fanshuic').attr("disabled",false);
		})
$('#fanshuic').click(function(){
	    var btn = $('#fanshuic');
        btn.attr("disabled",true);
        $.ajax({
            url : "<?php echo e(route('wap.send_fs')); ?>",
            type : 'POST',
            success : function (data) {
                btn.attr("disabled",false);
                chenggong_alert(1,data.status.msg);
                if(data.status.errorCode == 0){
                    
                   	$('.cmtc').css('bottom','-25rem');
		            $('.bj').fadeOut();
		            $('#zongfangshui').html(0)
                    //location.href=data.url;
                    $.ajax({
                                                            url:'/member/getNowMoney',
                                                            success:function(res){
                                                                $('.transfer_text').text('<?php echo e(trans("lang.zijinhuishou")); ?>');
                                            		            $('.transfer_text').val('<?php echo e(trans("lang.zijinhuishou")); ?>');
                                                                $('.gamemoney_text').text(res.data)
                                                                $('#api_money').text(api_money.toFixed(2));
                                                                refalse = true;
                                                            }
                                                        })
                }
                
            }
        })
        return false;
	})
</script>
<!--我的end-->
<!--绑定手机-->
<div class="page" id="bangdingshouji">
    <div class="nytop">
    	<a href="javascript:div_close('#bangdingshouji');" class="fhbtn"></a>
        <h1><?php echo e(trans('lang.bdsj')); ?></h1>
    </div>
    <div class="drawInfor">
		<ul>
			<!--<?php if($member->phone): ?>-->
			    <!--<li class="usdt"><span> <?php echo e(trans("lang.ybdsjh")); ?>&nbsp;&nbsp;&nbsp;<?php echo e($member->phone); ?></span></li>-->
			<!--<?php endif; ?>-->
			<?php if($member->phone): ?>
				<li><span><?php echo e(trans("lang.ybdsjh")); ?></span><input style="margin-left:10px;" type="text" name="ybdsjh" id="" value="<?php echo e($member->phone); ?>"  readonly autocomplete="off"></li>
				<?php endif; ?>
			<li><span><?php echo e(trans("lang.sjh")); ?></span><input type="text" name="phone" id="phone" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.sjh')); ?>" autocomplete="off"></li>
			
			<li style="position:relative;">
			    <span><?php echo e(trans("lang.yzm")); ?></span>
			    <input type="number" name="code" id="code" autocomplete="off" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.yzm')); ?>">
			    <input type="button" id="btn" value="<?php echo e(trans('lang.hqyzm')); ?>" class="yanzhen" style="height: 27px;outline: none;cursor: pointer;position: absolute;top: 13px;right: 20px;">
			</li>
			
			
			
		</ul>
		<input type="button" value="<?php echo e(trans('lang.qr')); ?>" class="subBtn ajax-submit-btn" id="subBtn">
	</div>
</div>
<!--绑定手机end-->

 <div class="bj" style="z-index:100;"></div>
<script>
    $('#bangdingshouji #subBtn').click(function(){
	    $.ajax({
				type:"post",
				url:"<?php echo e(route('wap.bindphone')); ?>",
				data : {phone:$('#bangdingshouji #phone').val(),code:$('#bangdingshouji #code').val()},
				success : function (data) {
					if(data.status.errorCode == 0){
                        location.reload();
                    }else{
                        chenggong_alert(2,data.status.msg)
                    }

				}
			})
     // $('#subBtn').attr("disabled", false);      
			return false;
	})
	
	var bangdingshouji_countdown=60;   
	function bangdingshouji_settime() {  
    if (bangdingshouji_countdown == 0) {   
        $('#bangdingshouji .sty2').attr("disabled", false);      
        $('#bangdingshouji .sty2').val("<?php echo e(trans('lang.hqyzm')); ?>");   
        bangdingshouji_countdown = 60;   
        return;  
    } else {   
        $('#bangdingshouji .sty2').attr("disabled", 'disabled');   
        $('#bangdingshouji .sty2').val("<?php echo e(trans('lang.cxfs')); ?>(" + bangdingshouji_countdown + ")");   
        bangdingshouji_countdown--;   
    }   
setTimeout(function() {   
    bangdingshouji_settime() }  
    ,1000)   
}

$('#bangdingshouji .yanzhen').click(function(){
    if (countdown != 60) {
      return false;
    }
    var phone = $('#bangdingshouji #phone').val();
    var pattern = /^1[0-9]{10}$/;
    if (!phone) {
        chenggong_alert(2,"<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.sjh')); ?>");
        return false}
    $.ajax({
        url:"/m/msgcode",
        data:{phone:phone},
        success:function(msg){
            chenggong_alert(1,msg.url+msg.status.msg)
            if (msg.status.errorCode==0) {
                bangdingshouji_settime()
            }
        }
    });
    return false;
  }) 
</script>
<!--个人信息-->
<div class="page" id="gerenxinxi">
    <div class="nytop">
    	<a href="javascript:div_close('#gerenxinxi');" class="fhbtn"></a>
        <h1><?php echo e(trans("lang.xgmm")); ?></h1>
    </div>
    <div class="inforTxt" style="border:none;">
    	<ul>
    	    <li>
    		   
            	<div class="inforLeft">
                	<h2><?php echo e(trans("lang.grxx")); ?></h2>
                </div>
                <a href="javascript:click_show('#xiugaimima')" class="changebtn"><?php echo e(trans('lang.genghuan')); ?></a>
    	    </li>
    	    <li>
    		   
            	<div class="inforLeft">
                	<h2><?php echo e(trans("lang.xgzfmm")); ?></h2>
                </div>
                <a href="javascript:click_show('#qukuanmima')" class="changebtn"><?php echo e(trans('lang.genghuan')); ?></a>
    	    </li>
        </ul>
    </div>
</div>
<!--个人信息end-->
<!-- 修改密码-->
<div class="page" id="xiugaimima">
     <div class="nytop">
    	<a href="javascript:div_close('#xiugaimima');" class="fhbtn"></a>
        <h1><?php echo e(trans("lang.xgdlmm")); ?></h1>
    	<!-- <h2><a href="">在線客服</a></h2> -->
    </div>

	<div class="drawInfor">
		<ul>

			<li><span><?php echo e(trans("lang.jmm")); ?></span><input type="password" name="old_password" id="old_password" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.jmm')); ?>" autocomplete="off"></li>
			<li><span><?php echo e(trans("lang.xmm")); ?></span><input type="password" name="password" id="password" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.xmm')); ?>" autocomplete="off"></li>
			<li><span><?php echo e(trans("lang.qrmm")); ?></span><input type="password" name="password_confirmation" id="password_confirmation" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.qrmm')); ?>" autocomplete="off"></li>
			<?php if($setting->sms_message): ?>
    			<li style="position:relative;display:none;">
    			    <span><?php echo e(trans("lang.yzm")); ?></span>
    			    <input type="number" name="code" id="code" autocomplete="off" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.yzm')); ?>">
    			    <input type="button" id="btn" value="<?php echo e(trans('lang.hqyzm')); ?>" class="sty2 yanzhen" style="height: 27px;outline: none;cursor: pointer;position: absolute;top: 13px;right: 20px;">
    			</li>
			<?php endif; ?>
			
			
		</ul>
		<input type="button" value="<?php echo e(trans('lang.qr')); ?>" class="subBtn ajax-submit-btn" id="subBtn">
	</div>
</div>
	<script>
	$('#xiugaimima #subBtn').click(function(){
			var password = $('#xiugaimima #password').val();
		var password_confirmation = $('#xiugaimima #password_confirmation').val();
		if(password!=password_confirmation){

			 chenggong_alert(2,"<?php echo e(trans('lang.liangcimimabuyizhi')); ?>")
			 return false;
		}
	    $.ajax({
				type:"post",
				url:"<?php echo e(route('wap.reset_login_password')); ?>",
				data : {old_password:$('#xiugaimima #old_password').val(),password:$('#xiugaimima #password').val(),password_confirmation:$('#xiugaimima #password_confirmation').val(),code:$('#xiugaimima #code').val()},
				success : function (data) {

				   
					if(data.status.errorCode == 0){
                        ///成功
                         chenggong_alert(1,data.status.msg)
                        $('#xiugaimima #old_password').val('');
                        $('#xiugaimima #password').val('');
                        $('#xiugaimima #password_confirmation').val('');
                        $('#xiugaimima #code').val('');
                        div_close('#xiugaimima')
                    }
                    else{
                         chenggong_alert(2,data.status.msg)
                    }

				}
			})
			return false;
	})
	
	
	
	$('.drawInfor input').focus(function(){
// 		$(this).parent('li').css('border-bottom','1px solid #fff');
// 		$(this).parent('li').css('border-bottom','1px solid #292d30')
	})
	$('.drawInfor input').blur(function(){
// 		$(this).parent('li').css('border-bottom','1px solid #292d30');
// 		$(this).parent('li').css('border-bottom','1px solid #292d30')
	})
	
	 var xiugaimima_countdown=60;   
function xiugaimima_settime() {  
    if (xiugaimima_countdown == 0) {   
        $('#xiugaimima .sty2').attr("disabled", false);      
        $('#xiugaimima .sty2').val("<?php echo e(trans('lang.hqyzm')); ?>");   
        xiugaimima_countdown = 60;   
        return;  
    } else {   
        $('#xiugaimima .sty2').attr("disabled", 'disabled');   
        $('#xiugaimima .sty2').val("<?php echo e(trans('lang.cxfs')); ?>(" + xiugaimima_countdown + ")");   
        xiugaimima_countdown--;   
    }   
setTimeout(function() {   
    xiugaimima_settime() }  
    ,1000)   
}
$('#xiugaimima .sty2').click(function(){
    if (xiugaimima_countdown != 60) {
      return false;
    }
    var pattern = /^1[0-9]{10}$/;

    $.ajax({
        url:"/m/msgcode",
        success:function(msg){
            if (msg.status.errorCode==0) {
                xiugaimima_settime()
                 chenggong_alert(1,msg.url+msg.status.msg)
            }else{
                // location.href='/m/bindphone';
                 chenggong_alert(2,msg.url+msg.status.msg)
            }
        }
    });
    return false;
  }) 
</script>
<!-- 修改密码end-->
<!-- 修改取款密码-->
<div class="page" id="qukuanmima">
     <div class="nytop">
    	<a href="javascript:div_close('#qukuanmima');" class="fhbtn"></a>
        <h1><?php echo e(trans("lang.xgzfmm")); ?></h1>
    	<!-- <h2><a href="">在線客服</a></h2> -->
    </div>
    
    	<div class="drawInfor">
    		<ul>
    
    			<li><span><?php echo e(trans("lang.jmm")); ?></span><input type="password" name="old_password" id="old_password" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.jmm')); ?>" autocomplete="off"></li>
    			<li><span><?php echo e(trans("lang.xmm")); ?></span><input type="password" name="password" id="password" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.xmm')); ?>" autocomplete="off"></li>
    			<li><span><?php echo e(trans("lang.qrmm")); ?></span><input type="password" name="password_confirmation" id="password_confirmation" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.qrmm')); ?>" autocomplete="off"></li>
    			<?php if($setting->sms_message): ?>
        			<li style="position:relative;display:none;">
        			    <span><?php echo e(trans("lang.yzm")); ?></span>
        			    <input type="number" name="code" id="code" autocomplete="off" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.yzm')); ?>">
        			    <input type="button" id="btn" value="<?php echo e(trans('lang.hqyzm')); ?>" class="sty2 yanzhen" style="height: 27px;outline: none;cursor: pointer;position: absolute;top: 13px;right: 20px;">
        			</li>
    			<?php endif; ?>
    			
    			
    		</ul>
    		<input type="button" value="<?php echo e(trans('lang.qr')); ?>" class="subBtn ajax-submit-btn" id="subBtn">
    	</div>
</div>
	<script>
	$('#qukuanmima #subBtn').click(function(){
		var password = $('#qukuanmima #password').val();
		var password_confirmation = $('#qukuanmima #password_confirmation').val();
		if(password!=password_confirmation){

			chenggong_alert(2,"<?php echo e(trans('lang.liangcimimabuyizhi')); ?>");
			 return false;
		}
	    $.ajax({
				type:"post",
				url:"<?php echo e(route('wap.reset_qk_password')); ?>",
				data : {old_password:$('#qukuanmima #old_password').val(),password:$('#qukuanmima #password').val(),password_confirmation:$('#qukuanmima #password_confirmation').val(),code:$('#qukuanmima #code').val()},
				success : function (data) {
				    alert(data.status.msg);
					if(data.status.errorCode == 0){
                        ///成功
                        chenggong_alert(1,data.status.errorCode);
                        $('#qukuanmima #old_password').val('');
                        $('#qukuanmima #password').val('');
                        $('#qukuanmima #password_confirmation').val('');
                        $('#qukuanmima #code').val('');
                        div_close('#qukuanmima')
                    }
                    else{
                        chenggong_alert(2,data.status.errorCode);
                    }

				}
			})
			return false;
	})
	

	
	 var qukuanmima_countdown=60;   
function qukuanmima_settime() {  
    if (qukuanmima_countdown == 0) {   
        $('#qukuanmima .sty2').attr("disabled", false);      
        $('#qukuanmima .sty2').val("<?php echo e(trans('lang.hqyzm')); ?>");   
        qukuanmima_countdown = 60;   
        return;  
    } else {   
        $('#qukuanmima .sty2').attr("disabled", 'disabled');   
        $('#qukuanmima .sty2').val("<?php echo e(trans('lang.cxfs')); ?>(" + qukuanmima_countdown + ")");   
        qukuanmima_countdown--;   
    }   
setTimeout(function() {   
    qukuanmima_settime() }  
    ,1000)   
}
$('#qukuanmima .sty2').click(function(){
    if (qukuanmima_countdown != 60) {
      return false;
    }
    var pattern = /^1[0-9]{10}$/;

    $.ajax({
        url:"/m/msgcode",
        success:function(msg){
   
            
            if (msg.status.errorCode==0) {
                qukuanmima_settime()
                chenggong_alert(1,msg.url+msg.status.msg);
            }else{
                chenggong_alert(2,msg.url+msg.status.msg);
            }
        }
    });
    return false;
  }) 
</script>
<!-- 修改取款密码end-->

<!--消息中心-->
<div class="page" id="xiaoxi">
    <div class="m_container1">
    	<div class="nytop" style="position: fixed;top:0;width: 100%;">
    		<a href="javascript:div_close('#xiaoxi');" class="fhbtn"></a>
    		<h1><?php echo e(trans("lang.xxzx")); ?></h1>
    	</div>
    
        <div class="Hyzx-body" style="padding: 12px;">                
             <?php $__currentLoopData = $data_xiaoxi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="xitonggonggao">
		        <h6>
		            <?php echo e($item->title); ?>

		        </h6>
		        <h6>
		            <?php echo e($item->content); ?>

		        </h6>
		        <p>
		            <?php echo e($item->created_at); ?>

		        </p>
		    </div>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    
    </div>
</div>
<!--消息中心end-->

<!--代理中心-->
<div class="page" id="dailizhongxin">
    <div class="nytop">
		<a href="javascript:div_close('#dailizhongxin');" class="fhbtn"></a>
		<h1><?php echo e(trans('lang.dlzx')); ?></h1>
	</div>
	<div class="zzc">
		<div class="zzc_tit">
			<h2><span class="fr"></span><?php echo e(trans('lang.tglj')); ?></h2>
		</div>
		<div class="qbhd_nr">
			<ul>
					<li>
						<div class="qbhdbox">
					
                                    
                                        <h3 style="color:#fff;line-height: 2; text-align:center;"><?php echo e(trans('lang.xiangxilianxikefu')); ?></h3>
                                    
                                

							
						</div>
					</li>
			</ul>
		</div>
	</div>

</div>
<!--代理中心end-->
<script>
     var clipboard = new ClipboardJS('#dailizhongxin .btn-copy');
        clipboard.on('success', function(e) {
			chenggong_alert(1,"<?php echo e(trans('lang.fuzhichenggong')); ?>");
		});
		clipboard.on('error', function(e) {
			chenggong_alert(2,"<?php echo e(trans('lang.fuzhishibai')); ?>");
		});
</script>

<!--充值记录-->
<div class="page" id="chongzhijilv">
    <div class="m_container">

	<div class="nytop" style="position: fixed;top:0;width: 100%; z-index:99;">
		<a href="javascript:div_close2('#wode');" class="fhbtn"></a>
		<h1><?php echo e(trans("lang.czjl")); ?></h1>
	</div>

	<div style="position: fixed;top:.9rem;width: 100%;height:.78rem;background: #3a3a3a; z-index:99;">
		<a href="javascript:;"><div class="acse as"><?php echo e(trans("lang.cunkuan")); ?></div></a>
		<a href="javascript:click_show('#tixianjilv')"><div class="acse"><?php echo e(trans("lang.tixian")); ?></div></a>
		<a href="javascript:click_show('#touzhujilv')"><div class="acse"><?php echo e(trans("lang.touzhu")); ?></div></a>
		<a href="javascript:click_show('#honglijilv')"><div class="acse"><?php echo e(trans("lang.fanshui")); ?></div></a>
	</div>

	<div class="select-info">
        <div class="select-dw" style="width:23%">
            <span style="line-height:.6rem;font-size:.32rem;color:#fff"><?php echo e(trans("lang.xzrq")); ?>：</span>
        </div>
        <div class="select-time" style="width:72%;margin-left: 0px;">
			<div style="width:100%;overflow: hidden;">
                <p style="width: 16%" tid="1" class="on" onclick="chongzhijilv_qiehua(1,this)"><?php echo e(trans("lang.jinri")); ?></p>
                <p style="width: 15.5%" tid="2" onclick="chongzhijilv_qiehua(2,this)">2<?php echo e(trans("lang.day")); ?></p>
				<p style="width: 15.5%" tid="3" onclick="chongzhijilv_qiehua(3,this)">3<?php echo e(trans("lang.day")); ?></p>
				<p style="width: 15.5%" tid="5" onclick="chongzhijilv_qiehua(4,this)">5<?php echo e(trans("lang.day")); ?></p>
                <p style="width: 18%" tid="7" onclick="chongzhijilv_qiehua(7,this)">7<?php echo e(trans("lang.day")); ?></p>
                <p style="width: 19.5%" tid="30" onclick="chongzhijilv_qiehua(30,this)">30<?php echo e(trans("lang.day")); ?></p>
            </div>
        </div>
    </div>

    <div class="m_body" style="margin-top:2.42rem">
		<div class="container-fluid gm_main">			
			<div class="content">
				<div class="all-info">
					<div class="make-money">
						<p><?php echo e(trans("lang.zcgcz")); ?>: </p>  
						<h3 id="total" style="font-size: 20px;">$&nbsp;</h3>
                    </div>
				</div>
				
				<div id="chongzhijilv_list" style="margin-bottom:20px;">
					
				</div>
				
				<div class="loading" id="load" style="text-align: center;"><?php echo e(trans("lang.shanglajiazaigengduo")); ?></div>
				<div class="jiazaizhon" style="display:none;"><div  style=" display: flex;justify-content: center;"><img style="width:20px;" src = "/new/img/20210326203301943.gif" />&nbsp;&nbsp;&nbsp;<?php echo e(trans("lang.jiazaizhong")); ?>...</div></div>

				<script>
				let click_on = true;
				function qiehuan(_this){
					if($(_this).attr('data-type') == 1){
						$(_this).attr('data-type',2).closest('.list-top').addClass('list-top12').siblings('.list-bottom').show(300)
					}
					else{
						$(_this).attr('data-type',1).closest('.list-top').removeClass('list-top12').siblings('.list-bottom').hide(300)
					}
				}
				
				let chongzhijilv_type = 0;
				function chongzhijilv_qiehua(int,_this){
				    if(click_on){
					    click_on = false;
					   // setTimeout( () => {
					   //     click_on = true;
					   // },300)
					}
					else{
					    return false;
					}
					$('#chongzhijilv_list').html('');
					chongzhijilv_getUserList.page = 1;
					chongzhijilv_type = int
					$(_this).addClass('on').siblings('p').removeClass('on');
					
					chongzhijilv_getUserList.isGet = true;
					chongzhijilv_getUserList.get();
					$('#chongzhijilv').scrollTop(0)
				}
				
						/* jQuery类级别插件扩展 */
						$.extend({
							onReachBottom:function (params,callFn) {
								if(!params.container || !params.content){
									console.error('<?php echo e(trans("lang.queshaocanshu")); ?>');
									return;
								}
					 
								var $container=params.container,
									$content=params.content,
									distance=params.distance || 30;
					 
								$container.scroll(function() {
									var awayBtm =$content.height() - $container.scrollTop() - $container.height();
									if(awayBtm<=distance){
										callFn && callFn();
									}
								});
							}
						});
					 
						/* 调用插件 */
						$.onReachBottom({
							"container":$('#chongzhijilv'),  /* 容器对象 */
							"content":$(document),  /* 内容对象 */
							"distance":40           /* 触发事件距离，默认30px */
						},function () {
							/* 插件回调函数 */
							chongzhijilv_getUserList.get();
						});
					 
						/* 项目方法 */
						var chongzhijilv_getUserList={
							/* 允许请求 */
							isGet:true,
							/* 条数 */
							rows:10,
							last_page: 0,
							/* 页码 */
							page:1,
							/*获取*/
							get:function () {
								if(!this.isGet){
									return;
								}
								/* 关闭请求条件，避免多次调用 */
								this.isGet=false;
					 
								/* 缓存 this 对象 */
								var _self=this;
					 
								$("#chongzhijilv #load").hide();
								$('#chongzhijilv .jiazaizhon').show();
					 
								/* 模拟请求 */
								
								$.ajax({
									url : "/m/recharge_record_api?page="+chongzhijilv_getUserList.page+'&day='+chongzhijilv_type,
									type : 'GET',
				
									success : function (data) {
										if(data.status.errorCode == 0){
											
											$('#chongzhijilv #total').text(data.data.total)
											chongzhijilv_getUserList.last_page = data.data.data.last_page
											let data2 = data.data.data.data

											if(!data2.length){
												_self.isGet = false;
												$("#chongzhijilv #load").show().text('<?php echo e(trans("lang.meiyougengduole")); ?>');
												$('#chongzhijilv .jiazaizhon').hide();
												click_on = true;
												return false;

											}
											if(data2.length > 15){
										    	$("#chongzhijilv #load").show().text('<?php echo e(trans("lang.shanglajiazaigengduo")); ?>');
											}
											for(let item of data2){
												let zhuangtai = ``,zhuangtai2 = ``;
												if(item.status == 1){
													zhuangtai = '<strong style="color:orange;"><?php echo e(trans("lang.dqr")); ?></strong>';
													zhuangtai2 = '<span style="color:orange;"><?php echo e(trans("lang.dqr")); ?></span>';
												}
												else if(item.status == 2){
													zhuangtai = '<strong style="color:green;"><?php echo e(trans("lang.hkcg")); ?></strong>';
													zhuangtai2 = '<span style="color:green;"><?php echo e(trans("lang.hkcg")); ?></span>';
												}
												else{
													zhuangtai = '<strong style="color:red;"><?php echo e(trans("lang.hksb")); ?></strong>';
													zhuangtai2 = '<span style="color:red;"><?php echo e(trans("lang.hksb")); ?></span>';
												}
												$('#chongzhijilv_list').append(`<div class="list">
												<div class="list-top" onclick="qiehuan(this)" data-type = "1">
													<div class="list-top1">
														<h5>`+item.account+`</h5>
														<p>`+item.created_at+`</p>
													</div>
													<div class="list-top2">
														<div><?php echo e(trans("lang.jiaoyijine")); ?>: <strong style="color:red;">$ `+item.money+`</strong></div>
														<div><?php echo e(trans("lang.zhuangtai")); ?>：
														`
														+
														zhuangtai
														+
														`
														</div>
													</div>
													<a href = "javascript:;" ></a>
												</div>
												<div class="list-bottom">
													<div><span><?php echo e(trans("lang.dingdanhao")); ?></span><span>`+ item.bill_no+`</span></div>
													<div><span><?php echo e(trans("lang.jiaoyishijian")); ?></span><span>` + item.created_at +`</span></div>
													<div><span><?php echo e(trans("lang.jiaoyifangshi")); ?></span><span>`+item.account+`</span></div>
													<div><span><?php echo e(trans("lang.jiaoyijine")); ?></span><span>`+item.money+`</span></div>
													<div><span><?php echo e(trans("lang.jiaoyizhuangtai")); ?></span> ` + zhuangtai2 + `</div>
													<div><span><?php echo e(trans("lang.beizhu")); ?></span><span>` + (item.fail_reason == null?'' : item.fail_reason) +`</span></div>
												</div>
											</div>`)
											}
											
											/* 允许重新加载 */
											$("#chongzhijilv #load").show();
											$('#chongzhijilv .jiazaizhon').hide();
					 
											_self.isGet=true;
											_self.page++;
									
										}else{
											chenggong_alert(2,"<?php echo e(trans('lang.zanghao')); ?><?php echo e(trans('lang.huo')); ?><?php echo e(trans('lang.mima')); ?><?php echo e(trans('lang.cuowu')); ?>")
										}
										click_on = true;
									}
								})
								
						
							}
						};
					 
						/* 初始化模拟数据 */
						chongzhijilv_getUserList.get();


				</script>
				
				
    			<div class="dropload-down">
    			    
    			</div>
    	    </div>     
		</div>
    </div>

 </div>
</div>
<!--充值记录end-->

<!--提现记录-->
<div class="page" id="tixianjilv">
    <div class="m_container">

	<div class="nytop" style="position: fixed;top:0;width: 100%; z-index:99;">
		<a href="javascript:div_close2('#wode');" class="fhbtn"></a>
		<h1><?php echo e(trans("lang.txjl")); ?></h1>
	</div>

	<div style="position: fixed;top:.9rem;width: 100%;height:.78rem;background: #3a3a3a;z-index: 99;">
		<a href="javascript:click_show('#chongzhijilv');"><div class="acse"><?php echo e(trans("lang.cunkuan")); ?></div></a>
		<a href="javascript:"><div class="acse as"><?php echo e(trans("lang.tixian")); ?></div></a>
		<a href="javascript:click_show('#touzhujilv')"><div class="acse"><?php echo e(trans("lang.touzhu")); ?></div></a>
		<a href="javascript:click_show('#honglijilv')"><div class="acse"><?php echo e(trans("lang.fanshui")); ?></div></a>
		<!--<a href="/m/transfer_record"><div class="acse"><?php echo e(trans("lang.edzh")); ?></div></a>-->
	</div>

	<div class="select-info">
        <div class="select-dw" style="width:23%">
            <span style="line-height:.6rem;font-size:.32rem;color:#fff"><?php echo e(trans("lang.xzrq")); ?>：</span>
        </div>
        <div class="select-time" style="width:72%;margin-left: 0px;">
			<div style="width:100%;overflow: hidden;">
                <p style="width: 16%" tid="1" class="on" onclick="tixianjilv_qiehua(1,this)"><?php echo e(trans("lang.jinri")); ?></p>
                <p style="width: 15.5%" tid="2" onclick="tixianjilv_qiehua(2,this)">2<?php echo e(trans("lang.day")); ?></p>
				<p style="width: 15.5%" tid="3" onclick="tixianjilv_qiehua(3,this)">3<?php echo e(trans("lang.day")); ?></p>
				<p style="width: 15.5%" tid="5" onclick="tixianjilv_qiehua(4,this)">5<?php echo e(trans("lang.day")); ?></p>
                <p style="width: 18%" tid="7" onclick="tixianjilv_qiehua(7,this)">7<?php echo e(trans("lang.day")); ?></p>
                <p style="width: 19.5%" tid="30" onclick="tixianjilv_qiehua(30,this)">30<?php echo e(trans("lang.day")); ?></p>
            </div>
        </div>
    </div>

    <div class="m_body" style="margin-top:2.42rem">
		<div class=" gm_main">			
			<div class="content">
				<div class="all-info">
					<div class="make-money">
						<p><?php echo e(trans("lang.zongchenggongtixian")); ?>: </p>  
						<h3 id="total" style="font-size:20px;">$&nbsp;</h3>
					</div>

				</div>
				<div class="info-list" style="background: transparent;">

					
					<div id="tixianjilv_list" style="margin-bottom:20px;">
					
					</div>
				
					<div class="loading" id="load" style="text-align: center;"><?php echo e(trans("lang.shanglajiazaigengduo")); ?></div>
					<div class="jiazaizhon" style="display:none;"><div  style=" display: flex;justify-content: center;"><img style="width:20px;" src = "/new/img/20210326203301943.gif" />&nbsp;&nbsp;&nbsp;<?php echo e(trans("lang.jiazaizhong")); ?>...</div></div>
      
				</div>
    			<div class="dropload-down">
    			    
    			</div>

    	    </div>     
		</div>
    </div>

 </div>
</div>
<script>	
let tixianjilv_type = 1;
function tixianjilv_qiehua(int,_this){
    if(click_on){
	    click_on = false;
	   // setTimeout( () => {
	   //     click_on = true;
	   // },300)
	}
	else{
	    return false;
	}
	$('#tixianjilv_list').html('');
	tixianjilv_getUserList.page = 1;
	tixianjilv_type = int
	$(_this).addClass('on').siblings('p').removeClass('on');
	tixianjilv_getUserList.isGet = true;
	tixianjilv_getUserList.get();
	$('#tixianjilv').scrollTop(0)
}

// 		/* jQuery类级别插件扩展 */
// 		$.extend({
// 			onReachBottom:function (params,callFn) {
// 				if(!params.container || !params.content){
// 					console.error('<?php echo e(trans("lang.queshaocanshu")); ?>');
// 					return;
// 				}
	 
// 				var $container=params.container,
// 					$content=params.content,
// 					distance=params.distance || 30;
	 
// 				$container.scroll(function() {
// 					var awayBtm =$content.height() - $container.scrollTop() - $container.height();
// 					if(awayBtm<=distance){
// 						callFn && callFn();
// 					}
// 				});
// 			}
// 		});
	 
		/* 调用插件 */
		$.onReachBottom({
			"container":$('#tixianjilv'),  /* 容器对象 */
			"content":$(document),  /* 内容对象 */
			"distance":40           /* 触发事件距离，默认30px */
		},function () {
			/* 插件回调函数 */
			tixianjilv_getUserList.get();
		});
	 
		/* 项目方法 */
		var tixianjilv_getUserList={
			/* 允许请求 */
			isGet:true,
			/* 条数 */
			rows:10,
			last_page: 0,
			/* 页码 */
			page:1,
			/*获取*/
			get:function () {
				if(!this.isGet){
					return;
				}
				/* 关闭请求条件，避免多次调用 */
				this.isGet=false;
	 
				/* 缓存 this 对象 */
				var _self=this;
	 
				$("#tixianjilv #load").hide();
				$('#tixianjilv .jiazaizhon').show();
	 
				/* 模拟请求 */
				
				$.ajax({
					url : "/m/drawing_record_api?page="+tixianjilv_getUserList.page+'&day='+tixianjilv_type,
					type : 'GET',

					success : function (data) {
						if(data.status.errorCode == 0){
							
							$('#tixianjilv #total').text(data.data.total)
							tixianjilv_getUserList.last_page = data.data.data.last_page
							let data2 = data.data.data.data
		
	
							if(!data2.length){
								_self.isGet = false;
								$("#tixianjilv #load").show().text('<?php echo e(trans("lang.meiyougengduole")); ?>');
								$('#tixianjilv .jiazaizhon').hide();
								click_on = true;
								return false;
							}
							
							if(data2.length > 15){
							    $("#tixianjilv #load").show().text('<?php echo e(trans("lang.shanglajiazaigengduo")); ?>');
							}
							
							for(let item of data2){
								let zhuangtai = ``,zhuangtai2 = ``;
								if(item.status == 1){
									zhuangtai = '<strong style="color:orange;"><?php echo e(trans("lang.dqr")); ?></strong>';
									zhuangtai2 = '<span style="color:orange;"><?php echo e(trans("lang.dqr")); ?></span>';
								}
								else if(item.status == 2){
									zhuangtai = '<strong style="color:green;"><?php echo e(trans("lang.hkcg")); ?></strong>';
									zhuangtai2 = '<span style="color:green;"><?php echo e(trans("lang.hkcg")); ?></span>';
								}
								else{
									zhuangtai = '<strong style="color:red;"><?php echo e(trans("lang.hksb")); ?></strong>';
									zhuangtai2 = '<span style="color:red;"><?php echo e(trans("lang.hksb")); ?></span>';
								}

									$('#tixianjilv_list').append(`<div class="list">
										<div class="list-top" onclick="qiehuan(this)" data-type = "1">
											<div class="list-top1">
												<h5>`+item.bank_name+`</h5>
												<p>`+item.created_at+`</p>
											</div>
											<div class="list-top2">
												<div><?php echo e(trans("lang.jiaoyijine")); ?>: <strong style="color:red;">$ `+item.money+`</strong></div>
												<div><?php echo e(trans("lang.zhuangtai")); ?>：
												`
												+
												zhuangtai
												+
												`
												</div>
											</div>
											<a href = "javascript:;" ></a>
										</div>
										<div class="list-bottom">
											<div><span><?php echo e(trans("lang.dingdanhao")); ?></span><span>`+ item.bill_no+`</span></div>
											<div><span><?php echo e(trans("lang.jiaoyishijian")); ?></span><span>` + item.created_at +`</span></div>
						
											<div><span><?php echo e(trans("lang.jiaoyijine")); ?></span><span>`+item.money+`</span></div>
											<div><span><?php echo e(trans("lang.jiaoyizhuangtai")); ?></span> ` + zhuangtai2 + `</div>
											<div><span><?php echo e(trans("lang.beizhu")); ?></span><span>` + (item.fail_reason == null?'' : item.fail_reason) +`</span></div>
										</div>
									</div>`)
							}
							
							/* 允许重新加载 */
							$("#tixianjilv #load").show();
							$('#tixianjilv .jiazaizhon').hide();
	 
							_self.isGet=true;
							_self.page++;
					
						}else{
							chenggong_alert(2,"<?php echo e(trans('lang.zanghao')); ?><?php echo e(trans('lang.huo')); ?><?php echo e(trans('lang.mima')); ?><?php echo e(trans('lang.cuowu')); ?>")
						}
						click_on = true;
					}
				})
				
		
			}
		};
	 
		/* 初始化模拟数据 */
		tixianjilv_getUserList.get();
		</script>
<!--提现记录end-->

<!--投注记录-->
<div class="page" id="touzhujilv">
    
	<div class="m_container">

		<div class="nytop" style="position: fixed;top:0;width: 100%; z-index:99;">
			<!-- <a href="javascript:history.go(-1);" class="fhbtn"></a> -->
		<a href="javascript:div_close2('#wode');" class="fhbtn"></a>
			<h1><?php echo e(trans("lang.touzhujilu")); ?></h1>
		</div>

		<div style="position: fixed;top:.9rem;width: 100%;height:.78rem;background: #3a3a3a;z-index: 99;">
			<a href="javascript:click_show('#chongzhijilv');"><div class="acse"><?php echo e(trans("lang.cunkuan")); ?></div></a>
			<a href="javascript:click_show('#tixianjilv')"><div class="acse"><?php echo e(trans("lang.tixian")); ?></div></a>
			<a href="javascript:"><div class="acse as"><?php echo e(trans("lang.touzhu")); ?></div></a>
			<a href="javascript:click_show('#honglijilv')"><div class="acse"><?php echo e(trans("lang.fanshui")); ?></div></a>
			<!--<a href="/m/transfer_record"><div class="acse"><?php echo e(trans("lang.edzh")); ?></div></a>-->
		</div>

		<div class="select-info">
	        <div class="select-dw" style="width:24%">
	            <select id="game_code" onchange="qiehua2(this.value)">
					<option value="">--<?php echo e(trans("lang.qxz")); ?>-- </option>
	                   <?php $__currentLoopData = $api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($item->id); ?>"> <?php echo e($item->api_name); ?> </option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
	        </div>
	        <div class="select-time" style="width:72%;margin-left: 5px;">
				<div style="width:100%;overflow: hidden;">
	                <p style="width: 16%" tid="1" class="on" onclick="touzhujilv_qiehua(1,this)"><?php echo e(trans("lang.jinri")); ?></p>
	                <p style="width: 15.5%" tid="2" onclick="touzhujilv_qiehua(2,this)">2<?php echo e(trans("lang.day")); ?></p>
					<p style="width: 15.5%" tid="3" onclick="touzhujilv_qiehua(3,this)">3<?php echo e(trans("lang.day")); ?></p>
					<p style="width: 15.5%" tid="5" onclick="touzhujilv_qiehua(4,this)">5<?php echo e(trans("lang.day")); ?></p>
	                <p style="width: 18%" tid="7" onclick="touzhujilv_qiehua(7,this)">7<?php echo e(trans("lang.day")); ?></p>
	                <p style="width: 19.5%" tid="30" onclick="touzhujilv_qiehua(30,this)">30<?php echo e(trans("lang.day")); ?></p>
	            </div>
	        </div>
	    </div>

	    <div class="m_body" style="margin-top:2.42rem">
			<div class="gm_main">			
				<div class="content">
				
					<div class="all-info">
						<div class="make-money">
							<p><?php echo e(trans("lang.zongtouzhu")); ?>: </p>  
							<h3 id="total" style="font-size: 20px;">$</h3>
						</div>
						<div class="failure">
							<h3 id="sunyi">$</h3>
							<p><?php echo e(trans("lang.sunyi")); ?>:</p>  
						</div>
					</div>

					<div class="info-list" style="background: transparent;">
					
					<div id="touzhujilv_list" style="margin-bottom:20px;">
						
						</div>
						
						
					<div class="loading" id="load" style="text-align: center;"><?php echo e(trans("lang.shanglajiazaigengduo")); ?></div>
					<div class="jiazaizhon" style="display:none;"><div  style=" display: flex;justify-content: center;"><img style="width:20px;" src = "/new/img/20210326203301943.gif" />&nbsp;&nbsp;&nbsp;<?php echo e(trans("lang.jiazaizhong")); ?>...</div></div>

					</div>

	    	    </div>     
			</div>
	    </div>

</div>
 <script>	

let touzhujilv_type = 1;
let gameCode=0;

	        function qiehua2(v){
	            if(click_on){
					    click_on = false;
					   // setTimeout( () => {
					   //     click_on = true;
					   // },300)
					}
					else{
					    return false;
					}
					$('#touzhujilv_list').html('');
					touzhujilv_getUserList.page = 1;
					gameCode = v;
					touzhujilv_getUserList.isGet = true;
					touzhujilv_getUserList.get();
					$('#touzhujilv').scrollTop(0)
				}
				
				function touzhujilv_qiehua(int,_this){
				    if(click_on){
					    click_on = false;
					   // setTimeout( () => {
					   //     click_on = true;
					   // },300)
					}
					else{
					    return false;
					}
					$('#touzhujilv_list').html('');
					touzhujilv_getUserList.page = 1;
					touzhujilv_type = int
					gameCode = 	$('#game_code option:selected').val();
					$(_this).addClass('on').siblings('p').removeClass('on');
					touzhujilv_getUserList.isGet = true;
					touzhujilv_getUserList.get();
					$('#touzhujilv').scrollTop(0)
				}
				
				/* jQuery类级别插件扩展 */
				$.extend({
					onReachBottom:function (params,callFn) {
						if(!params.container || !params.content){
							console.error('<?php echo e(trans("lang.queshaocanshu")); ?>');
							return;
						}
			 
						var $container=params.container,
							$content=params.content,
							distance=params.distance || 30;
			 
						$container.scroll(function() {
							var awayBtm =$content.height() - $container.scrollTop() - $container.height();
							if(awayBtm<=distance){
								callFn && callFn();
							}
						});
					}
				});
			 
				/* 调用插件 */
				$.onReachBottom({
					"container":$('#touzhujilv'),  /* 容器对象 */
					"content":$(document),  /* 内容对象 */
					"distance":40           /* 触发事件距离，默认30px */
				},function () {
					/* 插件回调函数 */
					touzhujilv_getUserList.get();
				});
			 
				/* 项目方法 */
				var touzhujilv_getUserList={
					/* 允许请求 */
					isGet:true,
					/* 条数 */
					rows:10,
					last_page: 0,
					/* 页码 */
					page:1,
					/*获取*/
					get:function () {
					    
					   
						if(!this.isGet){
							return;
						}
						
						/* 关闭请求条件，避免多次调用 */
						this.isGet=false;
				
			 
						/* 缓存 this 对象 */
						var _self=this;
			 
						$("#touzhujilv #load").hide();
						$('#touzhujilv .jiazaizhon').show();
			 
						/* 模拟请求 */
						
						$.ajax({
							url : "/m/game_record_api?page="+touzhujilv_getUserList.page+'&day='+touzhujilv_type+'&gameCode='+gameCode,
							type : 'GET',
		
							success : function (data) {
								if(data.status.errorCode == 0){
                                    
									$('#touzhujilv #total').text(data.data.total)
									$('#touzhujilv #sunyi').text(data.data.income)
									$('#touzhujilv #total2').text(data.data.total2)
				
									touzhujilv_getUserList.last_page = data.data.data.last_page
									let data2 = data.data.data.data

									if(!data2.length){
										_self.isGet = false;
										$("#touzhujilv #load").show().text('<?php echo e(trans("lang.meiyougengduole")); ?>');
										$('#touzhujilv .jiazaizhon').hide();
									    click_on = true;
										return false;
									}
								    if(data2.length > 15){
							        	$("#touzhujilv #load").show().text('<?php echo e(trans("lang.shanglajiazaigengduo")); ?>');
								    }
									for(let item of data2){
			
										$('#touzhujilv_list').append(`<div class="list">
												<div class="list-top" onclick="qiehuan(this)" data-type = "1">
													<div class="list-top1">
														<h5>`+item.api_type+`</h5>
														<p>`+item.betTime+`</p>
													</div>
													<div class="list-top2">
														<div><?php echo e(trans("lang.touzhu")); ?>: <strong style="color:red;">$ `+item.validBetAmount+`</strong></div>
														<div><?php echo e(trans("lang.zjj")); ?>：
														 <strong style="color:red;">
														`+item.netAmount+`
														</strong></div>
													</div>
													<a href = "javascript:;" ></a>
												</div>
												<div class="list-bottom">
													<div><span><?php echo e(trans("lang.dingdanhao")); ?></span><span>`+ item.billNo+`</span></div>
													<div><span><?php echo e(trans("lang.jiaoyishijian")); ?></span><span>` + item.betTime +`</span></div>
								
													<div><span><?php echo e(trans("lang.touzhu")); ?></span><span>`+item.validBetAmount+`</span></div>
													<div><span><?php echo e(trans("lang.zjj")); ?></span><span>` + item.netAmount +`</span></div>
												</div>
											</div>`)
									}
									
									/* 允许重新加载111111 */
									$("#touzhujilv #load").show();
									$('#touzhujilv .jiazaizhon').hide();
			 
									_self.isGet=true;
									_self.page++;
							
								}else{
									chenggong_alert(2,"<?php echo e(trans('lang.zanghao')); ?><?php echo e(trans('lang.huo')); ?><?php echo e(trans('lang.mima')); ?><?php echo e(trans('lang.cuowu')); ?>")
								}
								click_on = true;
							}
						})
						
				
					}
				};
			 
				/* 初始化模拟数据 */
				touzhujilv_getUserList.get();

</script>
</div>
<!--投注记录end-->

<!--红利-->
<div class="page" id="honglijilv">
    <div class="m_container">

	<div class="nytop" style="position: fixed;top:0;width: 100%; z-index:99;">
		<!-- <a href="javascript:history.go(-1);" class="fhbtn"></a> -->
		<a href="javascript:div_close2('#wode');" class="fhbtn"></a>
		<h1><?php echo e(trans("lang.hljl")); ?></h1>
	</div>

	<div style="position: fixed;top:.9rem;width: 100%;height:.78rem;background: #3a3a3a;z-index: 99;">
			<a href="javascript:click_show('#chongzhijilv');"><div class="acse"><?php echo e(trans("lang.cunkuan")); ?></div></a>
			<a href="javascript:click_show('#tixianjilv')"><div class="acse"><?php echo e(trans("lang.tixian")); ?></div></a>
			<a href="javascript:click_show('#touzhujilv')"><div class="acse"><?php echo e(trans("lang.touzhu")); ?></div></a>
			<a href="javascript:"><div class="acse as"><?php echo e(trans("lang.fanshui")); ?></div></a>
	</div>

	<div class="select-info">
        <div class="select-dw" style="width:23%">
            <span style="line-height:.6rem;font-size:.32rem;color:#fff"><?php echo e(trans("lang.xzrq")); ?>：</span>
        </div>
        <div class="select-time" style="width:72%;margin-left: 0px;">
			<div style="width:100%;overflow: hidden;">

                 <p style="width: 16%" tid="1" class="on" onclick="honglijilv_qiehua(1,this)"><?php echo e(trans("lang.jinri")); ?></p>
	                <p style="width: 15.5%" tid="2" onclick="honglijilv_qiehua(2,this)">2<?php echo e(trans("lang.day")); ?></p>
										<p style="width: 15.5%" tid="3" onclick="honglijilv_qiehua(3,this)">3<?php echo e(trans("lang.day")); ?></p>
									<p style="width: 15.5%" tid="5" onclick="honglijilv_qiehua(4,this)">5<?php echo e(trans("lang.day")); ?></p>
	                <p style="width: 18%" tid="7" onclick="honglijilv_qiehua(7,this)">7<?php echo e(trans("lang.day")); ?></p>
	                <p style="width: 19.5%" tid="30" onclick="honglijilv_qiehua(30,this)">30<?php echo e(trans("lang.day")); ?></p>

            </div>
        </div>
    </div>

    <div class="m_body" style="margin-top:2.42rem">
		<div class="gm_main">			
			<div class="content">
				<div class="all-info">
					<div class="make-money">
						<p><?php echo e(trans("lang.zonghongli")); ?>: </p>  
						<h3 id="total" style="font-size:20px;">$</h3>
					</div>
			
				</div>
				
				
				<div class="info-list" style="background: transparent;">
				  
    			    <div id="honglijilv_list" style="margin-bottom:20px;">
					
					</div>
					
					<div class="loading" id="load" style="text-align: center;"><?php echo e(trans("lang.shanglajiazaigengduo")); ?></div>
				<div class="jiazaizhon" style="display:none;"><div  style=" display: flex;justify-content: center;"><img style="width:20px;" src = "/new/img/20210326203301943.gif" />&nbsp;&nbsp;&nbsp;<?php echo e(trans("lang.jiazaizhong")); ?>...</div></div>

				</div>
    	    </div>     
		</div>
    </div>

 </div>

 <script>	

let honglijilv_type = 1;
				function honglijilv_qiehua(int,_this){
				    if(click_on){
					    click_on = false;
					   // setTimeout( () => {
					   //     click_on = true;
					   // },300)
					}
					else{
					    return false;
					}
					$('#honglijilv_list').html('');
					honglijilv_getUserList.page = 1;
					honglijilv_type = int
					$(_this).addClass('on').siblings('p').removeClass('on');
					honglijilv_getUserList.isGet = true;
					honglijilv_getUserList.get();
					$('#honglijilv').scrollTop(0)
				}
				
						/* jQuery类级别插件扩展 */
						$.extend({
							onReachBottom:function (params,callFn) {
								if(!params.container || !params.content){
									console.error('<?php echo e(trans("lang.queshaocanshu")); ?>');
									return;
								}
					 
								var $container=params.container,
									$content=params.content,
									distance=params.distance || 30;
					 
								$container.scroll(function() {
									var awayBtm =$content.height() - $container.scrollTop() - $container.height();
									if(awayBtm<=distance){
										callFn && callFn();
									}
								});
							}
						});
					 
						/* 调用插件 */
						$.onReachBottom({
							"container":$('#honglijilv'),  /* 容器对象 */
							"content":$(document),  /* 内容对象 */
							"distance":40           /* 触发事件距离，默认30px */
						},function () {
							/* 插件回调函数 */
							honglijilv_getUserList.get();
						});
					 
						/* 项目方法 */
						var honglijilv_getUserList={
							/* 允许请求 */
							isGet:true,
							/* 条数 */
							rows:10,
							last_page: 0,
							/* 页码 */
							page:1,
							/*获取*/
							get:function () {
								if(!this.isGet){
									return;
								}
								/* 关闭请求条件，避免多次调用 */
								this.isGet=false;
					 
								/* 缓存 this 对象 */
								var _self=this;
					 
								$("#honglijilv #load").hide();
								$('#honglijilv .jiazaizhon').show();
					 
								/* 模拟请求 */
								
								$.ajax({
									url : "/m/user_fsjl_api?page="+honglijilv_getUserList.page+'&day='+honglijilv_type,
									type : 'GET',
				
									success : function (data) {
										if(data.status.errorCode == 0){
																					
											$('#honglijilv #total').text(data.data.total)
											$('#honglijilv #total2').text(data.data.total2)
											honglijilv_getUserList.last_page = data.data.data.last_page
											let data2 = data.data.data.data

											if(!data2.length){
												_self.isGet = false;
												$("#honglijilv #load").show().text('<?php echo e(trans("lang.meiyougengduole")); ?>');
												$('#honglijilv .jiazaizhon').hide();
												click_on = true;
												return false;
											}
											if(data2.length > 15){
											    $("#honglijilv #load").show().text('<?php echo e(trans("lang.shanglajiazaigengduo")); ?>');
											}
											for(let item of data2){
					                            
					                            $('#honglijilv_list').append(`<div class="list">
														<div class="list-top" onclick="qiehuan(this)" data-type = "1">
															<div class="list-top1">
																<h5>`+item.type+`</h5>
																<p>`+item.created_at+`</p>
															</div>
															<div class="list-top2">
																<div><?php echo e(trans("lang.leixing")); ?>: <strong style="color:red;">$ `+item.money+`</strong></div>
															</div>
															<a href = "javascript:;" ></a>
														</div>
														<div class="list-bottom">
															<div><span><?php echo e(trans("lang.jine")); ?></span><span>`+ item.money+`</span></div>
															<div><span><?php echo e(trans("lang.shijian")); ?></span><span>` + item.created_at +`</span></div>
										
															<div><span><?php echo e(trans("lang.leixing")); ?></span><span>`+item.type+`</span></div>
														</div>
													</div>`)
					                            
											}
											
											/* 允许重新加载 */
											$("#honglijilv #load").show();
											$('#honglijilv .jiazaizhon').hide();
					 
											_self.isGet=true;
											_self.page++;
									
										}else{
											chenggong_alert(2,"<?php echo e(trans('lang.zanghao')); ?><?php echo e(trans('lang.huo')); ?><?php echo e(trans('lang.mima')); ?><?php echo e(trans('lang.cuowu')); ?>")
										}
										click_on = true;
									}
								})
								
						
							}
						};
					 
						/* 初始化模拟数据 */
						honglijilv_getUserList.get();

					</script>
</div>
<!--红利end-->
<?php endif; ?>
<div class="body-pages page" id="index" style="height: 100%; overflow: auto; display: block;">
	<div class="whileBac" style="height:30px;width: 100%;display: none;"></div>
	
	
	<!-- 美女公告圖 -->
	<!-- <div class="pages-loading-box3 BulletinImg" style="display: none;">
        <div class="swiper-slide guide-photo">
            <img class="welcomeImg">
        </div>
    </div> -->
	
	<!-- main content -->
	<!-- 自訂 id='main-container' -->
	<div id="main-container" class="main-container" style="height:100%;background:#222;">
	    
	    <div class="noticeAltbox noticeAltbox2">
    		<div class="noticeTitlebox">
    			<span id="plat_type" class="plat_type"></span>
    		</div>
    		
    		<div class="noticeAltbox-bottom">
    		    <span class="toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JK&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JK">X1</span>
    			<span class="toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JK2&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JK2">X2</span>
    			
    			<span class="toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JK5&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JK5">X5</span>
    			<span class="toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JK10&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JK10">X10</span>
    		</div>
        </div>
        <style>
        /*弹出转账*/
.noticeAltbox-bottom{ display:flex; justify-content:center; flex-wrap:wrap; padding:.5rem 0;}
    .noticeAltbox-bottom span{    background: linear-gradient(to bottom, #a70707 0%, #4a040f 100%);
    color: #ffffff;
    width: 40%;
    text-align: center;
    line-height: 2.5rem;
    margin: 0.5rem;
    border-radius: 0.3rem;}
    </style>
    
    
	    <script>
	    setTimeout(function(){
	        $('#main-container').attr('style','height:100%;background:url(/new/img/main-bg-m-dark.6ea06ca.jpg) no-repeat 0 0 !important;')
	    },2000)
	        
	    </script>
	    <?php if($member): ?>
	    <!--<img src="/images/wheel-enter.png" style="position:fixed;left:10px;bottom:80px;width:40px;z-index:99"; id="zhuanpan">-->
	    <?php else: ?>
	    <!--<img src="/images/wheel-enter.png" style="position:fixed;left:10px;bottom:80px;width:40px;z-index:99"; onclick="click_show('#denglu')">-->
	    <?php endif; ?>
	    
		<div id="changeBgm-dialog" class="modal after-close nekstayle_sound changeBgm-dialog fade"
			 style="display:none; height: 295px; margin-top: 130px;">
			<div class="modal-content neka_sound" style="height: 389px;">
				<div class="game-window-title">
					<h1 style="font-size: 17px; color: #fff" class="text_185"></h1>
					<!-- <a class="btn-close-video_sound"></a> -->
				</div>
				<!--  <div class="switch-container_sound">
                     <div class="dbox">
                         <p class="text_186"></p>
                         <p class="pbox"><span class="box_background"></span></p>
                     </div>
                     <div class="dbox" style="display: none;">
                         <p class="text_187"></p>
                         <p class="pbox"><span class="box_welcome"></span></p>
                     </div>
                 </div> -->
			</div>
			<a data-pop="changeBgm-dialog" class="modal-close btn-close"></a>
		</div>
		<div class="context home-context">
			<!-- <a data-menu="speed" data-pop="speed-dialog" class="speed-measuring fix-bottom-btn btn-pop" style="position: absolute; right: 0px; top: 20px; font-size: 10px; z-index: 102">- s</a> -->
			<!-- 頂部固定區 -->
			<div class="home-fix-top-box">
				<div class="logo-title" style="background: url(<?php echo e(getset('site_logo')); ?>) no-repeat;background-size: 100% 100%;width:50px;"></div>
				<div style="height: 100%;width: 78%;display: flex;align-items: center;justify-content: flex-end;">
			    <!--<img class="huodong_img" style="width: 34px; height: 34px;  top: 8px; right: 14px;" onclick="click_show('#xitonggonggao');" src="/new0404/images/icon_6.png">-->
					
					
					<!--<?php if(!Auth::guard('member')->guest()): ?>-->
    	<!--				<div class="home-account-display" style="display: block;">-->
    	<!--					<div class="home-account-box">-->
    	<!--						<div class="home-account-img"></div>-->
    	<!--						<div class="home-account"><?php echo e(@$_member -> name); ?></div>-->
    	<!--					</div>-->
    	<!--				</div>-->
					<!--    <div class="home-logout" style="display: block;" onclick="location.href='/m/logout'"></div>-->
					<!--<?php else: ?>-->
					<!--    <div class="home-login" onclick="click_show('#denglu')"></div>-->
					<!--    <div class="home-register"  onclick="$('#form1')[0].reset();click_show('#zhuce');"></div>-->
					<!--<?php endif; ?>-->
					<style>
					    .img1{ height:70%; margin:0 8% 0 4%;}
					</style>
					<!--<img src="/images/i_soundoff.png" class="img1 img_bofang" />-->
					<!--<img src="/images/i_sound.png?v=23"  class="img1 img_guanbi" style="display:none;"/>-->
					
					<!--<audio id="audio" src="<?php echo e($setting->mp3); ?>" style="width:0; height: 0;"></audio>-->
					
					<script>
					    var audio = document.getElementById("audio");
                        // audio.play();
					   // $(".img_bofang").click(function () {
					   //     $('.img_bofang').hide();
					   //     $('.img_guanbi').show();
        //                   audio.play();
        //                 })
        //                 $(".img_guanbi").click(function () {
        //                      $('.img_guanbi').hide();
					   //     $('.img_bofang').show();
        //                   audio.pause();
        //                 })
					</script>
					<!--<div class="box_background"></div>-->
					
					<div class="box_welcome" style="display: none;"></div>
					<div class="language-box">
						<div class="language-setting">
							<a class="btn-language" style="height: 22px;width:22px;display: block;background:url(<?php echo e(trans('lang.png')); ?>);    background-size: 100% 100%;position: relative;   top: 2px;" href="javascript:$('#yuyan').show();">
							</a>
							<!--<div class="language-select">-->
								<!-- <span class="lang-cn"></span> -->
							<!--	<span class="lang-tw lang" data-lang="ft"></span>-->
								<!--<span class="lang-en lang" data-lang="en"></span>-->
								<!--<span class="lang-th"></span>-->
								<!-- <span class="lang-vn"></span> -->
							<!--</div>-->
						</div>
					</div>
					<!-- <a data-page-name="news" class="btn-news btn-pages btn-news-icon">
                        <i></i>
                    </a> -->
				</div>
			</div>
			<!--新弹框-->
			<style>
				    
                ::-webkit-scrollbar {
                  /*滚动条整体样式*/
                  width: 0px; /*高宽分别对应横竖滚动条的尺寸*/
                  height: 0px;
                }
				</style>
			<div id="alert" class="alert_div page">
			    <div class="alert">
			        <img src="/images/w_close01.svg" onclick="div_close('#alert')" />
			        <div class="alert_content">
			            <article><span><?php echo e(trans('lang.zhuqianbaoyue')); ?></span><span id="user_money"><?php echo e(@$member->old_money); ?></span></article>
			            <?php $__currentLoopData = $api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                if(@$member){
                                    $mod = $_member->apis()->where('api_id', $item->id)->first();
                                }else{
                                    $mod = [];
                                }
                                
                            ?>
                            <?php if($mod): ?>
        			        <article><span><?php echo e($item->api_title); ?></span><span  data-code="<?php echo e($item->api_name); ?>"><?php echo e($mod->money); ?></span></article>
        			        <?php else: ?>
        			        <article><span><?php echo e($item->api_title); ?></span><span >0.00</span></article>
        			        <?php endif; ?>
    			        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </div>
			    </div>
			</div>
			<style>
			    .alert_div{background-color:rgba(0,0,0,.6);  align-items: center;  justify-content: center;}
			    .alert_div .alert{width: 90%; position: relative;
    height: 80vh;
    
    background: #fff;
    border: rgb(218, 200, 181) 1px solid;
    border-radius: 3px; padding:20px 30px;}
                .alert_div .alert .alert_content{ overflow-y:auto; height:100%;} 
                .alert_div .alert .alert_content article{ display: flex; justify-content:center;color: #000; align-items:center; height:40px;}
                .alert_div .alert .alert_content article span{ width:50%; text-align:center;}
                .alert_div .alert .alert_content article span:last-child{ text-align:center;}
                .alert_div .alert img{ width:40px; height:40px; position:absolute; right:-20px; top:-20px;}
                #test1{ width:100% !important; height:42.92vmin !important;}
                #test1 img{ width:100%; height:42.92vmin;}
			</style>
			<!--新弹框-->
			<!-- 廣告輪播區 -->
			<!--<div class="layui-carousel" id="test1" lay-filter="test1">-->
   <!--           <div carousel-item="">-->
   <!--               <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
   <!--             <a><img src="<?php echo e($item->path); ?>"></a>-->
   <!--             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
   <!--           </div>-->
   <!--         </div> -->
			<div class="home-swiper-wrapper" style="height:160px; padding:5px 0;">
				<div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
    				<div class="swiper-wrapper" >
    				    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        					<div class="swiper-slide"  >
        						<a><img src="<?php echo e($item->path); ?>"></a>
        					</div>
    					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    				</div>
    				<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    			</div>
    			<!-- Add Navigation -->
                <div class="swiper-button-prev swiper-button-white"></div>
                <div class="swiper-button-next swiper-button-white"></div>
			</div>
			<!-- 中間按鈕條 -->
			<div class="home-link-bar">
				<!-- 跑馬燈區 -->
				<div class="marquee-box">
					<div class="marquee-img"></div>
					<div class="home-marquee">
						<div class="marquee" style="width: 100%;">
							<div style="width: 100000px; transform: translateX(348.359px); animation: 40.4885s linear 1s infinite normal none running marqueeAnimation-8102871;"
								 class="js-marquee-wrapper">
								<div class="js-marquee" style="margin-right: 0px; float: left;">
										<span><?php echo e(@$system_notices->title); ?></span><?php echo e(@$system_notices->content); ?>

								</div>
							</div>
						</div>
					</div>
					<!-- <div class="hotevents-img"></div> -->
				</div>
				<!-- 個人資料與存提款 -->
				<div class="tab">
					<div class="tab-left">
					    <?php if(Auth::guard('member')->guest()): ?>
					    <div class="moneystyle" style="color:#fff">
					        <span onclick="click_show('#denglu')"><?php echo e(trans("lang.denglu")); ?></span>/
					        <span onclick="$('#form1')[0].reset();click_show('#zhuce');"><?php echo e(trans("lang.zhuce")); ?></span>
					    </div>
					    <div class="onlineusers" style="font-size:14px;">
							<div class="onlineusersimg">
							    <?php echo e(trans("lang.zxrs")); ?>:
								<span class="onlinepeople"><?php echo rand(13000,18000)?></span>
							</div>
						</div>
					    <?php endif; ?>
						
						<!-- <p><span id='account' class="person-name" style="font-size: 3vmin; color: #b1987f; font-weight: 400;"></span><i></i></p> -->
						<?php if(!Auth::guard('member')->guest()): ?>
						<!--<div class="onlineusers" style="font-size:14px;">-->
						<!--	<div class="onlineusersimg">-->
						<!--		<span class="onlinepeople" style="margin-left:3px;"><?php echo e(@$_member->name); ?></span>-->
						<!--	</div>-->
						<!--</div>-->
						<div class="moneystyle">
						
							<h6 style=" display: flex; margin-bottom: 10px;"><i style="    display: block;
    width: 20px;
    height: 20px;
    background: #a88766;
    color: #fff;
    border-radius: 20px;
    text-align: center;
    line-height: 20px;
    font-size: 12px;">$</i><text id="gamemoney" class="gamemoney_text" style="font-size: 18px;
    font-weight: bold;
        position: relative;
    top: 2px;
    margin-left: 10px;"><?php echo e(@$_member -> money?$_member -> money:'0.00'); ?></text></h6>

    						
    						<div class="onlineusers" style="font-size:14px;">
    							<div class="onlineusersimg">
    							    <?php echo e(trans("lang.zxrs")); ?>:
    								<span class="onlinepeople"><?php echo rand(13000,18000)?></span>
    							</div>
    						</div>
						</div>
						
						<?php endif; ?>
					</div>
					<div class="tab-right">
						<div class="tab-right-btn trans-btn">
						    <?php if(!Auth::guard('member')->guest()): ?>
							<div class="transfer-icon"  id="transfer"></div>
							<?php else: ?>
							<div class="transfer-icon"  onclick="javascript:open_div('#denglu')"></div>
							<?php endif; ?>
							<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;width: 50px;" class="transfer_text2"><?php echo e(trans("lang.zhuanhui")); ?></h4>
							<h4 style="height: 3vmin;"></h4>
						</div>
						<!-- <div class="tab-right-btn btn-pop" data-pop="memberReport-dialog">
                            <div class="mr-home-Ico" style="margin: -10px auto auto auto;"></div>
                            <h4 class="mr-center-Btn" style="color:#b1987f; font-size: 3vmin; font-weight: 400;"></h4>
                        </div> -->
                        <?php if(!Auth::guard('member')->guest()): ?>
						<div class="tab-right-btn btn-pop" data-pop="recharge-dialog" onclick="new_chongzhi()">
							<div class="deposit-icon"></div>
							<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;"><?php echo e(trans("lang.chongzhi")); ?></h4>
							<h4 style="height: 3vmin;"></h4>
						</div>
						<!--onclick="location.href='/m/drawing'"-->
						 
    						
    						<div class="tab-right-btn btn-pop tixian_btn" data-pop="withdraw-dialog"  onclick="<?php if(!$member['card'] && !$member['trc20'] && !$member['fps'] && !$member['erc20']): ?>;click_show('#yinhangkaguanli') <?php else: ?> new_tixian() <?php endif; ?>">
    							<div class="withdraw-icon"></div>
    							<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;"><?php echo e(trans("lang.tixian")); ?></h4>
    							<h4 style="height: 3vmin;"></h4>
    						</div>
    						
    						<!--<div class="tab-right-btn btn-pop" data-pop="withdraw-dialog"  onclick="">-->
    						<!--	<div class="withdraw-icon"></div>-->
    						<!--	<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;"><?php echo e(trans("lang.tixian")); ?></h4>-->
    						<!--	<h4 style="height: 3vmin;"></h4>-->
    						<!--</div>-->
    						
    					<?php else: ?>
    						<div class="tab-right-btn btn-pop" data-pop="recharge-dialog" onclick="open_div('#denglu')">
    							<div class="deposit-icon"></div>
    							<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;"><?php echo e(trans("lang.chongzhi")); ?></h4>
    							<h4 style="height: 3vmin;"></h4>
    						</div>
    						<div class="tab-right-btn btn-pop" data-pop="withdraw-dialog"  onclick="open_div('#denglu')">
    							<div class="withdraw-icon"></div>
    							<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;"><?php echo e(trans("lang.tixian")); ?></h4>
    							<h4 style="height: 3vmin;"></h4>
    						</div>
						<?php endif; ?>
						
					</div>
				</div>

				<!-- <a data-page-name="wallet-center" class="home-link-btn btn-pages header-nav nav-recharge">
                    <span>充提中心</span>
                </a>
                <a data-pop="about-dialog" class="header-nav btn-pop nav-agent is-close">
                    <span>加盟代理</span>
                </a>
                <a id="accountSet" data-pop="wt-dialog" class="header-nav btn-pop nav-accountSet" style="display: none;">
                    <span class="text_9"></span>
                </a>
                <a id="accountNote" data-pop="accountNote-dialog" class="header-nav btn-pop nav-accountNote" style="display: none;">
                    <span class="text_10"></span>
                </a> -->
				<!-- 自訂id='free-play' -->
				<!-- <a id='free-play' class="home-link-btn free-play header-nav nav-trial start-free-play">
                    <span style="color:#e60d0d; font-weight: bold;" class="text_5"></span>
                </a>
                <a class="header-nav home-link-btn nav-trial logout" style="display: none;">
                    <span style="color:#e60d0d; font-weight: bold;" class="text_12"></span>
                </a> -->
			</div>
			<script>
			function new_chongzhi(){
			     $.ajax({
                            url:'/member/chongzhi_shuaxin',
                            type:'post',
                            success:function(res){
                                
        						if(res.status.errorCode==0){
        						    let data = res.data;
        						    
        						    if(data.banks.length > 0){
        						        $('#bank_card').text(data.banks[0]['card_no'])
        						        $('#bank_card_2').attr('data-clipboard-text',data.banks[0]['card_no'])
        						        $('#bank_name').text(data.banks[0]['username'])
        						        $('#bank_name_2').attr('data-clipboard-text',data.banks[0]['username'])
        						        
        						    }
        						    $('#bld_pic').prop('src',data.setting.bld_pic)
        						        
        						        $('#qq_account').text(data.setting.qq_account)
        						        $('.qq_account').attr('data-clipboard-text',data.setting.qq_account)
        						         $('#qq_nickname').text(data.setting.qq_nickname)
        						        $('.qq_nickname').attr('data-clipboard-text',data.setting.qq_nickname)
        						        
        						        $('#usdt_1').text(data.setting.usdt_trc)
        						        $('#usdt_2').attr('data-clipboard-text',data.setting.usdt_trc_pic)
        						        $('#usdt_pic').prop('src',data.setting.usdt_trc_pic)
        						        
        						        trc_addr = data.setting.usdt_trc;
                                        erc_addr = data.setting.usdt_erc;
                                        trc_qr = data.setting.usdt_trc_pic;
                                        erc_qr = data.setting.usdt_erc_pic;
                                        $('#usdt_type').val('trc')
                                        changeType('trc')
                                        
        					        click_show('#chongzhi2');
        						}
        					
                            },error:function(res){
                               click_show('#denglu');
                            }
                        })
			}
			    function new_tixian(){
			        
			     //   new_ml_money
			     //   new_money
			        
			         $.ajax({
                            url:'/member/tixian_shuaxin',
                            type:'post',
                            success:function(res){
                                
        						if(res.status.errorCode==0){
        						   $('.new_ml_money').val('<?php echo e(trans("lang.shengyumaliang")); ?>: '+ res.data.ml_money)
        						    $('.new_money').val('<?php echo e(trans("lang.yue")); ?>: '+res.data.money)
        						    $('.gamemoney_text').text(res.data.money)
        						     click_show('#tixian2'); 
            		            $('#tixian #code').val('')
                                 $('#tixian #qk_pwd').val('')
                                 $('#tixian #money').val('')
                                 $('#tixian #bank_card').val('')
                                 $('#tixian #name').val('')
            					$('#tixian #bank_name').val('');
            					refresh_ml2();
        						}
        					
                            },error:function(res){
                               click_show('#denglu');
                            }
                        })
			        
		           
			    }
			    function new_tixian2(){
			        
			     //   new_ml_money
			     //   new_money
			        
			         $.ajax({
                            url:'/member/tixian_shuaxin',
                            type:'post',
                            success:function(res){
                                
        						if(res.status.errorCode==0){
        						   $('.new_ml_money').val('<?php echo e(trans("lang.shengyumaliang")); ?>: '+ res.data.ml_money)
        						    $('.gamemoney_text').text(res.data.money)
        						     
        						}
        					
                            },error:function(res){
                               click_show('#denglu');
                            }
                        })
			        
		           
			    }
			</script>
			<style>
			 /*   .new_nav{    display: flex;*/
    /*flex-wrap: wrap;*/
    
    /*border-radius: 6px;*/
    /*box-shadow: 0 0 9px 0px rgba(255,255,255,.3);*/
    /*margin: 0px auto 20px auto;*/
    /*padding: 0.5rem 0 0.1rem;*/
    /*width: 96%;*/
			        
			 /*   }*/
			 /*   .new_nav .gameitem{*/
			 /*       width: 22.5%;*/
			 /*       margin-left: 2%;*/
			 /*   }*/
			    /*.home-content{ padding:0;}*/
			    /*.gamelist-content .gamelist-type{ padding-left:0;}*/
			    /*.gamelist-content .gamelist-type.active{ display:flex; flex-wrap: wrap;justify-content: space-between;}*/
			    /*.gamelist-content .gamelist-type .game-btn{ width:46%; margin-left:2.5%; margin-bottom:.9rem;}*/
			    /*.gamelist-content .gamelist-type .game-btn:nth-child(2n){margin-right:2.5%; margin-left:0;}*/
			    /*.gamelist-content .gamelist-type .game-btn > div{ border-radius:10px;}*/
			 /*   .new_nav .gameitem { display:block !important;} */
			 /*   .gamelist-item .gameitem.active .gameitem-live-img,.gamelist-item .gameitem > div{position: unset!important;*/
    /*display: block!important;*/
    /*margin: 0 auto .24rem!important;*/
			         
			 /*   }*/
    /*            .gamelist-item .gameitem{ height:3.6rem;  border-radius: 1.2rem!important; margin-bottom:0rem;}*/
    /*            .gamelist-item .gameitem .gameitem-text{    display: block;*/
    /*position: unset;*/
    /*margin: 0 auto; font-size:.8rem;}*/
    /*.gamelist-item .gameitem{ height:4rem; padding-top:.1rem;background: transparent;box-shadow: none; transform: scale(.9);}*/
    .gamelist-item .gameitem.active, html[language='en'] .gamelist-item .gameitem.active, html[language='vn'] .gamelist-item .gameitem.active, html[language='tw'] .gamelist-item .gameitem.active, html[language='th'] .gamelist-item .gameitem.active{}

    /*.gamelist-content .gamelist-type .gamelist-col{ margin-left:2%;}*/
    /*.gamelist-content .gamelist-type .gamelist-col:nth-child(2n){margin-left:0%;margin-right:2%;}*/
			</style>
			
					
			<!-- 主項目 -->
			<div class="home-content">
				<!-- 遊戲清單 -->
				<!-- 自訂 id='gamelist-wrapper'-->
				<div id="gamelist-wrapper" class="gamelist-wrapper">
					<div class="gamelist-item" >
					<div class="gameitem slotgame active" gamelistbtn="slotgame" onclick="yougxi(0,this)">
						<svg width="24px" height="24px" xmlns="http://www.w3.org/2000/svg" class="text-gradient gameicon-svg sprite-app2" data-v-43a11c04="">
                                                                                <use href="/_nuxt/5178ea949699c439f7d9adef4e5aead8.svg#i-game-fishing" xlink:href="/_nuxt/5178ea949699c439f7d9adef4e5aead8.svg#i-game-live" data-v-43a11c04=""></use>
                                                                            </svg>
                        <img src="/images/game-fishing.2480bb8.png" />
						<span class="gameitem-text"><?php echo e(trans("lang.dianzi")); ?></span>
					</div>
					<div class="gameitem live " gamelistbtn="live" onclick="yougxi(1,this)">
						<svg width="24px" height="24px" xmlns="http://www.w3.org/2000/svg" class="text-gradient gameicon-svg sprite-app2" data-v-43a11c04="">
                                                                                <use href="/_nuxt/5178ea949699c439f7d9adef4e5aead8.svg#i-game-live" xlink:href="/_nuxt/5178ea949699c439f7d9adef4e5aead8.svg#i-game-live" data-v-43a11c04=""></use>
                                                                            </svg>
                        <img src="/images/game-live.d72ce7c.png" />
						<span class="gameitem-text"><?php echo e(trans("lang.shixun")); ?></span>
					</div>
					<div class="gameitem chess" gamelistbtn="chess" onclick="yougxi(2,this)">
						<svg width="24px" height="24px" xmlns="http://www.w3.org/2000/svg" class="text-gradient gameicon-svg sprite-app2" data-v-43a11c04="">
                                                                                <use href="/_nuxt/5178ea949699c439f7d9adef4e5aead8.svg#i-game-e-battle" xlink:href="/_nuxt/5178ea949699c439f7d9adef4e5aead8.svg#i-game-live" data-v-43a11c04=""></use>
                                                                            </svg>
                        <img src="/images/game-e-battle.ccf24f9.png" />
						<span class="gameitem-text"><?php echo e(trans("lang.qipai")); ?></span>
					</div>
					<div class="gameitem" gamelistbtn="sport" onclick="yougxi(3,this)">
						<svg width="24px" height="24px" xmlns="http://www.w3.org/2000/svg" class="text-gradient gameicon-svg sprite-app2" data-v-43a11c04="">
                                                                                <use href="/_nuxt/5178ea949699c439f7d9adef4e5aead8.svg#i-game-sport" xlink:href="/_nuxt/5178ea949699c439f7d9adef4e5aead8.svg#i-game-live" data-v-43a11c04=""></use>
                                                                            </svg>
                        <img src="/images/game-sport.1cef4e5.png" />
						<span class="gameitem-text"><?php echo e(trans('lang.tiyu')); ?></span>
					</div>
                    
					
					<div class="gameitem fish" gamelistbtn="fish" onclick="yougxi(4,this)">
						<svg width="24px" height="24px" xmlns="http://www.w3.org/2000/svg" class="text-gradient gameicon-svg sprite-app2" data-v-43a11c04="">
                                                                                <use href="/_nuxt/5178ea949699c439f7d9adef4e5aead8.svg#i-game-keno" xlink:href="/_nuxt/5178ea949699c439f7d9adef4e5aead8.svg#i-game-live" data-v-43a11c04=""></use>
                                                                            </svg>
                        <img src="/images/game-keno.8f78ec4.png" />
						<span class="gameitem-text"><?php echo e(trans("lang.buyu")); ?></span>
					</div>
				</div>
				    
					<div class="gamelist-content" >
					    <div class="gamelist-content2" style="padding-bottom:50px;">
					        <div class="gamelist-type active" gamelisttype="slotgame">
    						 <!--   <div class="game-btn gamelist-row toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JK&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JK">-->
    						 <!--       <span>JOERK</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/JOKER.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>-->
    							
    							<div class="game-btn gamelist-row toplay2"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JK&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JK">
    						        <span>JOERK</span>
    						        <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "/images/JOKER.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							
    							
    							<!--<div class="game-btn gamelist-row toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JK2&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JK2">-->
    						 <!--       <span>JOERK x2</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "/images/JOKER2.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>-->
    							<!--<div class="game-btn gamelist-row toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JK3&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JK3">-->
    						 <!--       <span>JOERK x3</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "/images/JOKER3.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>-->
    							<!--<div class="game-btn gamelist-row toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JK5&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JK5">-->
    						 <!--       <span>JOERK x5</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "/images/JOKER5.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>-->
    							<!--<div class="game-btn gamelist-row toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JK10&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JK10">-->
    						 <!--       <span>JOERK x10</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "/images/JOKER10.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>-->
    							<div class="game-btn gamelist-row toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JD&game_type=SL&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JD">
    						        <span>JDB電子</span>
    						        <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/JDB.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							
    							<div class="game-btn gamelist-row toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=PG&game_type=SL&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PG">
    						        <span>PG電子</span>
    						        <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/PG.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							<div class="game-btn gamelist-row toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=CQ&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="CQ">
    						        <span>CQ9電子</span>
    						        <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/EP.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							<!--<div class="game-btn gamelist-row toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=GB&game_type=SL&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="GB">-->
    						 <!--       <span>BBIN電子</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/BBINS.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>-->
    							<!--<div class="game-btn gamelist-row toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=PS&game_type=&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PS">-->
    						 <!--       <span>PS電子</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/LIVE22.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>-->
    							<div class="game-btn gamelist-row toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=PN&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PN">
    						        <span>PNG電子</span>
    						        <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/PP.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							
    							
    							
    							
    						</div>
    						<div class="gamelist-type " gamelisttype="live">
    							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=DG&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="DG">
    								<span>DG真人</span>
    							    <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/DG.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=S2&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="S2">
    							    <span>SEXY真人</span>
    							     <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/SEXY.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>							
    							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=WC&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="WC">
    							    <span>WM真人</span>
    							     <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/WM.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=GB&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="GB">
    							    <span>BBIN真人</span>
    							     <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/BBIN.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=E0&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="E0">
    							    <span>EVO真人</span>
    						        <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/EVO.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							
    						</div>
    
    						<div class="gamelist-type" gamelisttype="chess">
    							
    							<!--<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=TH&game_type=&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="TH">-->
    							<!--    <span>天豪棋牌</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/TH.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>-->
    							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=LG&game_type=CB&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="KY">
    							    <span>樂游棋牌</span>
    						        <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/LEO.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							<!--<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=BL&game_type=&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="DTQP">-->
    							<!--    <span>博樂棋牌</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/BL.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>-->
    							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=KY&game_type=&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="DTQP">
    							    <span>開元棋牌</span>
    						        <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/KY.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    						</div>
    
    						
    
    						<div class="gamelist-type" gamelisttype="sport">
    						
    							
    						 <!--   <div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=CM&game_type=5&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="CM">-->
    						 <!--        <span>CMD體育</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/CMD.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>-->
    						    
    						    <div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=S3&game_type=5&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="S3">
    						         <span>SBO體育</span>
    						        <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/SBO.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=ST&game_type=5&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="ST">
    							     <span>三昇體育</span>
    						        <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/SS.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>	
    							<!--<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=UG&game_type=5&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="ST">-->
    							<!--     <span>UG體育</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/UG.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>	-->
    							<!--<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=CY&game_type=&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="ST">-->
    							<!--     <span>RCB賽馬</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/RCB.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>	-->
    							<!--<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=S2&game_type=OT&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="ST">-->
    							<!--     <span>SV斗雞</span>-->
    						 <!--       <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    							<!--	<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/SV.png" />-->
    							<!--	<div class="toplay-alert">-->
           <!--                             請先登入-->
           <!--                         </div>-->
    							<!--</div>	-->
    						</div>
    						<!--<div class="gamelist-type" gamelisttype="esports">-->
    						<!--	<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=TF&game_type=7&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="IA_HK">-->
    						<!--	    <span>雷火電競</span>-->
    						<!--        <i><?php echo e(trans("lang.kqyx")); ?></i>-->
    						<!--		<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/LH.png" />-->
    						<!--		<div class="toplay-alert">-->
          <!--                              請先登入-->
          <!--                          </div>-->
    						<!--	</div>-->
    						<!--</div>-->
    						
    						
    						
    
    						<div class="gamelist-type" gamelisttype="fish" style="padding-bottom:0;">
    						    
    							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=JK&game_type=FH&devices=1" <?php else: ?> data-url="" <?php endif; ?> >
    							    <span>JOKER捕魚</span>
    						        <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/JOKERS.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=GB&game_type=FH&devices=1" <?php else: ?> data-url="" <?php endif; ?> >
    							    <span>BBIN捕魚</span>
    						        <i><?php echo e(trans("lang.kqyx")); ?></i>
    								<img class="img" src = "https://wgc.s3.ap-southeast-1.amazonaws.com/BBINSS.png" />
    								<div class="toplay-alert">
                                        請先登入
                                    </div>
    							</div>
    							
    							
    						</div>
    <style>
    							    .gameImage-jdbFish {
                                        content: url(/new0404/images/jdbFish.png);
                                        width: 100%;
                                    }
                                    .gameImage-cq9Fish {
                                        content: url(/new0404/images/cq9Fish.png);
                                        width: 100%;
                                    }
                                    .toplay-alert{
                                        position: absolute;
                                        width: 100%;
                                        height: 108px;
                                        line-height: 108px;
                                        top: 0;
                                        left: 0;
                                        background-color: rgba(0,0,0,.5);
                                        color: #fff;
                                        display: none;
                                        text-align: center;
                                        font-size: 16px;
                                    }
    							</style>
    						
    						
    						
    						
    						
    						<div class="gamelist-type" gamelistType="liveBroadcast">
           <!--                     <div class="game-btn gamelist-row" onclick="window.open('https://xvideos.com/')">-->
    							<!--	<div class="gameImage-SEXYLiveCasino"></div>-->
    							<!--</div>-->
                                
                            </div>
                        </div>
					</div>
				</div>
			</div>
			<!-- 底部按鈕 -->
			<div class="home-fix-bottom-box">
				<a  class="fix-bottom-btn active" href="javascript:open_div('#index');new_tixian2()">
					<span><img src = "/new0404/images/nav-1s.png" /></span>
					<strong class="home-fix-bottom-text"><?php echo e(trans("lang.shouye")); ?></strong>
				</a>
				<a  class="fix-bottom-btn btn-pop" href="javascript:click_show('#huodong');">
					<span><img src = "/new0404/images/nav-2.png" /></span>
					<strong class="home-fix-bottom-text"><?php echo e(trans("lang.hdzx")); ?></strong>
				</a>
				<!-- <?php if(!Auth::guard('member')->guest()): ?>-->
				<!--<a  class="fix-bottom-btn mobile-download btn-pop" style="display: flex;" href="javascript:click_show('#zijinhuishou');">-->
				<!--	<span class="fix-bottom-btn-icon btn-3" style="display: block;"></span>-->
				<!--	<strong class="home-fix-bottom-text"><?php echo e(trans("lang.edzh")); ?></strong>-->
				<!--</a>-->
				<!--<?php else: ?>-->
				<!--<a  class="fix-bottom-btn mobile-download btn-pop" style="display: flex;" href="javascript:open_div('#denglu');">-->
				<!--	<span class="fix-bottom-btn-icon btn-3" style="display: block;"></span>-->
				<!--	<strong class="home-fix-bottom-text"><?php echo e(trans("lang.edzh")); ?></strong>-->
				<!--</a>-->
				<!--<?php endif; ?>-->
				<?php if(!Auth::guard('member')->guest()): ?>
				<a href="javascript:click_show('#eduzhuanhuan');api_check();" class="fix-bottom-btn btn-service" >

					<div class="div_on">
					    <img style="transform: rotate(45deg) !important;" src = "/new0404/images/nav-5.png" />
					</div>
				</a>
				<?php else: ?>
					<a href="javascript:click_show('#denglu')" class="fix-bottom-btn btn-service" >

					<div class="div_on">
					    <img style="transform: rotate(45deg) !important;" src = "/new0404/images/nav-5.png" />
					</div>
				</a>
				<?php endif; ?>
				
				<a href="<?php echo e($setting->service_link); ?>" class="fix-bottom-btn btn-service kefu_box" >
					<span><img src = "/new0404/images/nav-3.png" /></span>
					<strong class="home-fix-bottom-text"><?php echo e(trans("lang.zxkf")); ?></strong>
					
				</a>
				<?php if(!Auth::guard('member')->guest()): ?>
				<a  class="fix-bottom-btn btn-pages" href="javascript:click_show('#wode');new_tixian2()">
					<span><img src = "/new0404/images/nav-4.png" /></span>
					<strong class="home-fix-bottom-text "><?php echo e(trans("lang.wode")); ?></strong>
				</a>
				<?php else: ?>
				<a  class="fix-bottom-btn btn-pages" href="javascript:open_div('#denglu');">
					<span><img src = "/new0404/images/nav-4.png" /></span>
					<strong class="home-fix-bottom-text "><?php echo e(trans("lang.wode")); ?></strong>
				</a>
				<?php endif; ?>
			</div>
			
			<script>
			    	// $(document).on('click', '.fix-bottom-btn', function(event) {
        //         		$('.fix-bottom-btn').removeClass('active')
        //         		$(this).addClass('active');
                	
        //         		/* Act on the event */
        //         	});
			</script>
			
		</div>
	</div>
	<!-- 公告  //修改-->
	<?php if($gonggao==0 && count($gongao) >= 1): ?>
    	<div id="bulletin-dialog" class="modal after-close bulletin-dialog">
    	    
    	    <div class="new_dialog">
    	        <?php $__currentLoopData = $gongao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            <div class="new_dialog1" style="<?php if($k != 0){ echo 'display:none;';} ?>">
        	        <h6><?php echo e($item['title']); ?><img src  = "/new/css/close.png" onclick="$('#modal-backdrop,#bulletin-dialog').hide();$('.img_bofang').click()" /></h6>
        	        <div class="new_dialog_content">
        	           <?php echo e($item['content']); ?>

        	        </div>
    	        </div>
    	          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	        <div class="new_dialog_btn">
    	            <span class="new_dialog_pre" onclick="fun_dialog_pre();" style="display:none;"><?php echo e(trans("lang.shangyige")); ?></span>
    	            <span class="new_dialog_next" onclick="fun_dialog_next();"><?php echo e(trans("lang.xiayige")); ?></span>
    	        </div>
    	    </div>
    	  
    	    
    	    <script>
    	        let currenctIndex = 0,dialog_count = $('.new_dialog1').length-1 ;
    	        function fun_dialog_next(){
    	            
    	             
    	            if (dialog_count > currenctIndex) {
                        currenctIndex++;
                        $(".new_dialog_pre").show();
                    }
        
    	           
    	            if( currenctIndex >= dialog_count){
    	               $('.new_dialog_next').addClass('new_dialog_btn_no');
    	            }
   
    	            $('.new_dialog1').eq(currenctIndex).show().siblings('.new_dialog1').hide();
    	        }
    	        function fun_dialog_pre(){
    	            if (currenctIndex > 0) {
                        currenctIndex--;
                    }
                    if (currenctIndex == 0) {
                        $(".new_dialog_pre").hide();
                    }


                    $('.new_dialog_next').removeClass('new_dialog_btn_no');
    	            $('.new_dialog1').eq(currenctIndex).show().siblings('.new_dialog1').hide();
    	        }
    	        
    	    </script>
    		
    	</div>
    	<!-- 背景遮罩 -->
	    <div id="modal-backdrop" class="modal-backdrop" style="display:none"></div>
	    
        
    <?php endif; ?>
    
    <?php if($setting->alert_img): ?>
        <div id="alert_img">
            <?php 
                $alert_img = explode(',',$setting->alert_img);
             ?>
            <?php $__currentLoopData = $alert_img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert_img alert_img<?php echo e($k); ?>" style="<?php if($k>0): ?>display:none;<?php endif; ?>">
                    <img src='<?php echo e($item); ?>' class="imgss<?php echo e($k); ?>" style="width:60%;"/><br><br>
                    <img src='new0404/images/w_close01.svg'  class="img2" onclick="$('.alert_img<?php echo e($k); ?>').hide();$('.alert_img<?php echo e($k+1); ?>').show();<?php if($k==count($alert_img)-1): ?>$('#alert_img').hide();$('#bulletin-dialog,#modal-backdrop').fadeToggle('slow');<?php endif; ?>" />
                </div>
                <!--<div class="alert_img alert_img2" style="display:none;">-->
                <!--    <img src='new0404/images/2.png' class="img1" />-->
                <!--    <img src='new0404/images/w_close01.svg'  class="img2"  onclick="$('.alert_img2').hide();$('.alert_img3').show();"/>-->
                <!--</div>-->
                <!--<div class="alert_img alert_img3" style="display:none;">-->
                <!--    <img src='new0404/images/3.png' class="img1" />-->
                <!--    <img src='new0404/images/w_close01.svg'  class="img2"  onclick="$('.alert_img3,#alert_img').hide();$('#bulletin-dialog,#modal-backdrop').fadeToggle('slow');"/>-->
                <!--</div>-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <script>
            $('#bulletin-dialog,#modal-backdrop').fadeToggle('slow')
        </script>
    <?php endif; ?>
    
    <div id="iframe_alert" style="justify-content: center;align-items: center;position: fixed;width: 100%;height: 100%;z-index: 99999;top: 0px;left: 0px; display: none;">
		<iframe src="" id="iframe_a" style=" width: 100%; height:100%;border:none;"></iframe>
	</div>
	
    <style>
        #alert_img{ position:fixed; top:0;left:0; width:100%; height:100%; background:rgba(0,0,0,.5); align-items: center;
    justify-content: center;display: flex; z-index:9999;}
        #alert_img .alert_img{
              text-align: center;
        }
        /*#alert_img .img1{height:70%;  }*/
        #alert_img .img2{ width:40px;    margin-top: 10px;}
    </style>
    

    

	

	
	<!--<script src="/new0404/js/jweixin-1.0.0.js"></script>-->
	<script src="/new0404/js/marquee.js"></script>
	<!--<script src="/new0404/js/demo.js?202204071330"></script>-->
	<script src="/new0404/js/game-hall.js"></script>
	<!--<script src="/new0404/js/address.js"></script>-->
	<script type="text/javascript" src="/new/layer.js"></script>
</div>
<div id="cover" style="display: none;"></div>
<div class="noticeAltbox" style="display: none;">
		<div class="noticeTitlebox">
			您需要為【<span id="plat_type"></span>】轉入金額嗎?
		</div>
		<div class="formAlt">
			<div class="lastMoney">
				<p>當前余額：<span id="lesNum" class="gamemoney_text"><?php echo e(@$member->money); ?></span></p>
				<a id="trans_all" href="javascript:void(0)">資金回收</a>
			</div>
			<div class="formSlides">
				<input type="tel" id="moneyInp" placeholder="输入金额" oninput="value=value.replace(/[^\d]/g,'')">
				<button type="button" class="allButton">全部</button>
			</div>
		</div>
		<div class="altButtonbox">
			<a  id="login_url" >直接進入遊戲</a>
			<button class="login_btn" style="" href="javascript:void(0)" id="rightEnter" >立即轉入遊戲</button>
		</div>
</div>

<script>

let hei_arr = [0], hei_int = 0;
    
        $('.gamelist-content2 > div').each(function (index, el) {
            hei_arr.push($(this).height() + hei_int + 13);
            hei_int += ($(this).height() + 13);
        });
        console.log(hei_arr);

    function yougxi(int, _this) {
        console.log(int);
        if(int == 6){
            return false;
        }
        $(_this).addClass('active').siblings('.gameitem').removeClass('active')
        $('.gamelist-content').scrollTop(hei_arr[int] + 1)
        //$('#container').css("transform","translateY(-"+arr[int]+"px)")
    }

    $(function(){
        $('.gamelist-content').scroll(function(event) {
            let i = 0,scrill_top = $(this).scrollTop(),_index;
            if(scrill_top > 10){
                // $('#d-flex-id').addClass('d-flex-on')
            }
            else{
                // $('#d-flex-id').removeClass('d-flex-on')
            }

            if(scrill_top  >= parseInt(hei_arr[hei_arr.length-1]- $('.gamelist-content').height())){
                _index = hei_arr.length - 2
            }
            else if(scrill_top <= 0 ){
                _index = 1;
            }
            else{
                _index = hei_arr.length - hei_arr.filter(item => {return item > scrill_top}).length;
            }
            $('.gamelist-item .gameitem').eq(_index - 1).addClass('active').siblings('.gameitem').removeClass('active')

        });
    })
    

                                                                
    var swiperBanner = new Swiper('.home-swiper-wrapper .swiper-container', {
		    pagination: '.swiper-pagination',
		    autoplay:true,
            paginationClickable: true,

            loop: true,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
		});
    $('body').on('click','.lang',function(){
    // 	layer.open({type: 2});
        var lang = $(this).data('lang');
        $.ajax({
            url:'/m/changelang',
            data:{lang:lang},
            success:function(res){
                location.reload();
            }
        })
        return false;
    })
    var api_money = 0;
    $('.gamecode').click(function(){
        var _this=$(this);
            var money=_this.text();
            _this.html('...');
            $.ajax({
                    url:'/api/check?api_name='+_this.data('code'),
                    success:function(res){
						if(res.Code==0){
						  //  _this.text(res.Data);
						  if(_this.data('code')=='KY'){
						        _this.text((res.Data / 2).toFixed(2));
						    }else{
						        _this.text(res.Data);
						    }
						}else{
						    _this.text(money);
						}
						    
                    },error:function(res){
                        _this.text(money);
                    }
                })
    })
    function aaaa(){
        $('.refuseBtn').click();
        return;
        $('.gamemoney_text').text("<?php echo e(trans("lang.jiazaizhong")); ?>...");
        $('#user_money').text("<?php echo e(trans("lang.jiazaizhong")); ?>...");
        var len = $('.gamecode').length;
        $.ajax({
		    url:'/m/membermoney?type=1',
		    success:function(res){
		        $('#user_money').text(res.money);
		        if(len==0){
		            $('.gamemoney_text').text(res.money);
		        }
		        
		    }
		})
		$('.gamecode').click();
		setTimeout(function(){
		    $.ajax({
                                url:'/m/membermoney',
                                success:function(res){
                                    $('.gamemoney_text').text(res.money)
                                    // $('.old_money').text(res.money)
                                }
                            })
		},2000)
//         $('.gamecode').each(function(k,v){
//             var _this=$(this);
//             var money=_this.text();
//             _this.html('...');
//             $.ajax({
//                     url:'/api/check?api_name='+_this.data('code'),
//                     success:function(res){
// 						if(res.Code==0){
// 						  //  _this.text(res.Data);
// 						  if(_this.data('code')=='KY'){
// 						        _this.text((res.Data / 2).toFixed(2));
// 						    }else{
// 						        _this.text(res.Data);
// 						    }
// 						}else{
// 						    _this.text(money);
// 						}
// 						if(k == len -1){
// 						    $.ajax({
//                                 url:'/m/membermoney',
//                                 success:function(res){
//                                     $('.gamemoney_text').text(res.money)
//                                     $('.old_money').text(res.old_money)
//                                 }
//                             })
// 						}
//                     },error:function(res){
//                         _this.text(money);
//                     }
//                 })
// 		});
		
	}
    $('.allButton').click(function(){
			var lesNum = $('#lesNum').html();
			$('#moneyInp').val(lesNum);
		})
    $('#transfer3,#transfer,#transfer2,#transfer4,#trans_all').click(function(){
        $('#loading_div').css({'display':'flex'});
	    var that = $(this);
	    $('.transfer_text').text('<?php echo e(trans("lang.hsz")); ?>...');
	    $('.transfer_text2').text('<?php echo e(trans("lang.hsz")); ?>...');
	    $('.transfer_text').val('<?php echo e(trans("lang.hsz")); ?>...');
	    var len = $('.gamecode').length;
	    var api_money = $('#api_money').text();
	    var gamemoney_text = $('.gamemoney_text').text();
	    $('.gamecode').each(function(k,v){
	        var _this=$(this);
            var money=_this.text();
            _this.html("<?php echo e(trans("lang.hsz")); ?>");
            $.ajax({
                    url:'/member/one_transfer',
                    type:'post',
                    data:{api_name:_this.data('code'),transfer_type:1},
                    success:function(res){
                        
						if(res.status.errorCode==0){
						    _this.html('0.00');
						  //  gamemoney_text -= Number(money);
        //                     $('#api_money').text(api_money.toFixed(2));
        
                            
						  //  $.ajax({
        //                         url:'/m/membermoney',
        //                         success:function(res){
        //                             // $('.gamemoney_text').text(res.money)
        //                             $('.gamemoney_text').text(res.money)
        //                             // $('.old_money').text(res.money)
        //                         }
        //                     })
						}
				// 		else if(res.status.errorCode==1){
				// 		    _this.text(money);
				// 		}
					    if(k== len-1){
					        if(!refalse){
                    	        return false;
                    	    }
                    	    refalse = false;
                    	    var len2 = $('.gamecode').length;
                    	    var api_money = 0;
                    	    $('.gamecode').each(function(k,v){
                                var _this=$(this);
                                var money=_this.text();
                                // _this.html('加载中...');
                                $.ajax({
                                        url:'/api/check?api_name='+_this.data('code'),
                                        success:function(res){
                    						if(res.Code==0){
                    						    _this.text(res.Data);
                    						    api_money += Number(res.Data)
                    						}else{
                    						    _this.text('0');
                    						}
                    						if (k === len2 - 1)
                                		    {
                                        		        $.ajax({
                                                            url:'/member/getNowMoney',
                                                            success:function(res){
                                                                $('.transfer_text').text('<?php echo e(trans("lang.zijinhuishou")); ?>');
                                            		            $('.transfer_text').val('<?php echo e(trans("lang.zijinhuishou")); ?>');
                                                                $('.gamemoney_text').text(res.data)
                                                                $('#api_money').text(api_money.toFixed(2));
                                                                refalse = true;
                                                            }
                                                        })
                                                
                                		    }
                                        },error:function(res){
                                            _this.text(money);
                                        }
                                    })
                                
                    		});
					       // $.ajax({
            //                             url:'/member/getNowMoney',
            //                             success:function(res){
            //                                 $('.gamemoney_text').text(res.data)
            //                             }
            //                         })
            //                     $('.refuseBtn').click();
                                
                        }
                    },error:function(res){
                        _this.text(money);
                    }
                })
            // var _this=$(this);
            // $.ajax({
            //         url:'/member/one_transfer',
            //         type:'post',
            //         data:{api_name:_this.data('code'),transfer_type:1},
            //         success:function(res){
            //             if (k === len - 1)
            // 		    {
            //                 $('.refuseBtn').click()
            // 		    }
            //         }
            //     })
		});
		setTimeout(function(){
		    $('.transfer_text').text("<?php echo e(trans("lang.zijinhuishou")); ?>");
	        $('.transfer_text').val("<?php echo e(trans("lang.zijinhuishou")); ?>");
	        $('.transfer_text2').text("<?php echo e(trans("lang.zhuanhui")); ?>");

        	$('#loading_div').hide();
		},2000)
	   // $.ajax({
	   //     url:'/member/transfer_all',
	   //     type:'post',
	   //     success:function(res){
	   //         that.next().text('<?php echo e(trans("lang.zijinhuishou")); ?>');
	   //        // location.reload()
	   //        $.ajax({
	   //            url:'/member/getNowMoney',
	   //            success:function(res){
	   //                $('#gamemoney').text(res.data)
	   //            }
	   //        })
	   //     }
	   // })
	})
	
	$('#cover').on('click', function(event) {
	        $('.noticeAltbox,#cover').hide();
	    	event.preventDefault();
	    	/* Act on the event */
	    });
	$('#rightEnter').click(function(){
			var money = $('#moneyInp').val();
			var code = $(this).attr('data-code');
			var url = $('#login_url').attr('data-url');
			var title = $('#plat_type').text();
			// console.log(url);
			if (!money){
				alert('請輸入轉賬金額')
				return false;
			}
			var that = $(this);
            $('#loading_div').css({'display':'flex'});
			$.ajax({
				type: 'POST',
				url: '/m/transfer',
				data: {
					out_account: '1',
					in_account : code,
					money : money
				},
				dataType: "json",
				success: function(data){
					$('#loading_div').hide();
					var html = '';
					if(data.status.errorCode != 0){
					    alert(data.status.msg)
				        return false;
					}
					if(code.indexOf("JK") != -1){
                        location.href=url;
                        return;
                    }
                    
                    layer.open({
                      type: 2,
                      title: title,
                      shadeClose: true,
                      shade: 0.8,
                      area: ['100%', '100%'],
                      content: url //iframe的url
                    });
				}
			});
		})
		
		
		
	$('#login_url').click(function(){
            var url = $(this).attr('data-url');
                $('#cover,.noticeAltbox').fadeOut();
                var title = $('#plat_type').text();
                var code = $('#rightEnter').attr('data-code');
                
                if(code.indexOf("JK") != -1){
                    location.href=url;
                    return;
                }
            
                layer.open({
                  type: 2,
                  title: title,
                  shadeClose: true,
                  shade: 0.8,
                  area: ['100%', '100%'],
                  content: url //iframe的url
                });
    })
    
    $('.toplay2').click(function(){
            
            $('#cover,.noticeAltbox2').fadeIn();
            return false;

    })
    
    
    $('.toplay').click(function(){
            var url = $(this).data('url');
            var title = $(this).find('span').text();
            var code = $(this).data('code');
            
            $('#login_url').attr('data-url',url);
            $('#rightEnter').attr('data-code',code);
            // $('#plat_type').text(code);
            
            
            $('#plat_type').text(title);
            $('#cover,.noticeAltbox').fadeIn();
            return false;
                
            if(!url){
                $('.toplay').find('.toplay-alert').fadeOut();
                $(this).find('.toplay-alert').fadeIn();
               
                // chenggong_alert(2,'請登入游戲');

            }else{
            // if(code=='JK'){
            //     location.href=url;
            //     return;
            // }
          //   	$.ajax({
		        //     url: "<?php echo e(route('member.post_transfer_all')); ?>",
		        //     type: 'POST',
		        //     success: function (data) {
		        //     	setTimeout(function(){
		        //     		$.ajax({
					     //        url: "<?php echo e(route('member.one_transfer')); ?>",
					     //        type: 'POST',
					     //        data:{api_name:code,transfer_type:0},
					     //        success: function (data) {
					                
					     //        }
					     //    })
		        //     	},1000)
		                
		        //     }
		        // })
		        $('.img_guanbi').hide();
			    $('.img_bofang').show();
                // audio.pause();
                // window.open(url);
                // layer.closeAll();
                // $('#layertitle').show();
                layer.open({
                  type: 2,
                  title: title,
                  shadeClose: true,
                  shade: 0.8,
                  area: ['100%', '100%'],
                  content: url //iframe的url
                });
                    // layer.open({
                    //   type: 1
                    //   ,shadeClose: true
                    //     ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;" ></iframe>'
                    //   ,anim: 'down'
                    //   ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
                    // });

                // $.ajax({
                //     url:'/m/membermoney',
                //     success:function(res){
                //         $('#lesNum').text(res.money)
                //         $('.member_money').text(res.money)
                        
                //     }
                // })
                // $('#moneyInp').val('');
                
            }
    })
    $('#layertitle').click(function(){
        $(this).hide();
        layer.close(layer.index);
    })
//     document.addEventListener('visibilitychange', function () { 
//         // 用户息屏、或者切到后台运行 （离开页面） 
//         if (document.visibilityState === 'hidden') {
//             $('.img_guanbi').hide();
// 			$('.img_bofang').show();
//             audio.pause();
//         } 
//         // 用户打开或回到页面 
//         if (document.visibilityState === 'visible') {
//             $('.img_bofang').hide();
// 			$('.img_guanbi').show();
//             audio.play();
//         } 
//     })
    function refresh_ml2(){
        $('#ml_money').text('<?php echo e(trans("lang.jiazaizhong")); ?>...');
        $.ajax({
            url:'/m/refresh_ml2',
            success:function(res){
                if(res.status.errorCode==0){
                    $('#ml_money').text(res.data.ml_money);
                }else{
                    chenggong_alert(1,res.status.msg)
                }
            }
        })
    }
    $('#zhuanpan').click(function(){
        layer.open({
                  type: 1
                  ,shadeClose: false
                    ,content:'<iframe src="/m/zhuanpan" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height:100%;" ></iframe>'
                  ,anim: 'down'
                  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;z-index:99999;overflow:auto'
                });
    })
    
    
		function _close_fu(){
		    
			$('#iframe_alert').hide();
			$('#iframe_a').prop('src','');
// 			$('.bj').fadeout();
            $('.bj').fadeOut()
		}
		
		function load_iframe(type){
		  //  $('#loading_div').fadeIn()
// 			open_load(0);
            $('.bj').fadeIn();
            $('#iframe_alert').show();
			$('#iframe_a').prop({'src':'/m/chongzi_tixian?type=' + type});
// 			setTimeout(function(){
// 			    close_load();
// 			},1500)
		}
		function _close_load(){
			close_load();
		}
	    function api_check(){
	        $.ajax({
	            url:'/m/api_check',
	            success:function(res){
	                var html = '';
	                $.each(res,function(k,v){
	                    html += `<li ><h2>`+v.api_title+`</h2>`;
    					if(v.is_on){
    					    if(v.api_name == 'KY'){
    					        html += `<p style="color: #d2b79c;" class="gamecode" data-code="`+v.api_name+`">`+ (v.money / 2).toFixed(2) +`</p>`;
    					    }else{
    					        html += `<p style="color: #d2b79c;" class="gamecode" data-code="`+v.api_name+`">`+v.money+`</p>`;
    					    }
    						
    					}else{
    					    html += `<p style="color: #d2b79c;" class="gamecode" data-code="`+v.api_name+`">  0  </p>`;
    					}
    						    
    					html += `</li>`;
	                })
	                $('.moenyList').html(html);
	                $('.refuseBtn').click()
	            }
	        })
	    }
	    
	    
	    layui.use(['carousel', 'form'], function(){
	         var carousel = layui.carousel
              ,form = layui.form;
              
              //常规轮播
              carousel.render({
                elem: '#test1'
                ,arrow: 'always'
                ,interval: 5000
              });
	    })
	
</script>
<!-- Start of LiveChat (www.livechat.com) code -->
<?php echo $_system_config->kefu_html; ?>

<!-- End of LiveChat code -->
</body>
</html>
<script>
    // aaaa();
</script>
<?php echo $__env->make('wap.template.theme10.layouts.fotter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>