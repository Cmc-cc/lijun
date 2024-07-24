<html style="height: 100%;;" language="tw">
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
	<link rel="stylesheet" href="/new0404/css/Language_tw.css?202204042350" cachetime="202204042350">
	<link href="/new0404/css/login_lx.css?202204042350" rel="stylesheet">
	<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>
	<title><?php echo e($_system_config->site_title); ?></title>
	<script src="/new0404/js/jquery.min.js"></script>
	<script src="/new0404/js/swiper.min.js"></script>
	
	<script src="/new0404/js/qrcode.min.js"></script>
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
		    background: #fff;
		}
		.page_show2{
		    display: flex;
		    position: fixed;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    z-index: 9999;
		    background: #fff;
		}
.gameImage-WELiveCasino {
    content: url(/new0404/images/WELiveCasino.png);
    width: 100%;
}
	</style>
	<script>
	    let arr = [],font_52 = ['#chongzhi','#chongzhi_zhuanhuankuai','#chongzhi_yinhangka','#chongzhi_USDT','#tixian','#chongzhi_bainlidian','#huodong','#shenqinjindu','#huodongxiangqing','#zijinhuishou','#gerenxinxi','#xiugaimima','#qukuanmima','#xiaoxi','#dailizhongxin','#chongzhijilv','#tixianjilv','#touzhujilv','#honglijilv'],z_index= 9999 ; //需要每次记录打开的页面，决定html的size
	    
	    //只打开首页
	    function open_div(id){
	        arr = [];
	        $('.page').removeClass('page_show');
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
	       
	        $(id).addClass('page_show');
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
<body ontouchstart="" >
    
<!--登录-->
<div class="page" id="denglu">
    	<div id="registion-dialog" class="registion-dialog" style="display: block;">
		<div class="registion-box">

			<div class="login-wrapper2" style="">
				<div class="login-box">
					<!--<div class="login-title">-->
					<!--	<div class="text_3" style="font-size: 5vmin; font-weight: 600; color: #000;"></div>-->
					
					<!--</div>-->
					<div class="login-logo" style="background:url(<?php echo e($_system_config->site_logo); ?>);background-size:100% 100%;opacity: 0;"></div>
					<div class="login-img"><img src="/images/cd39baqrugej1oed2th0_131586.png" /></div>
					
					<div class="login-content2">
					    
					    <div class="login-content2-b">
					        <div class="login-content2-l">
					            <h5 class="login-content2-h5">登入</h5>
					            <div class="login-content2-l-b">
					                 <div class="login-content2-l-div">
    					                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAQAAAAm93DmAAAACXBIWXMAAAsTAAALEwEAmpwYAAACNUlEQVR42tWWLYvkQBCGDyIHGgKxY/MDxmVU3Mg1y5q4k/kD53a4XzA2dtyIhYVRMUPEyLFjAmPORcTFxTwXikCTrnzs3cEtWzGppvvt+uq36tvXFnwSjhSUNDSUFBxJ8P8O7IkLLWPScuHpz8Airv3RnJSYEIMhJCYl76+5En0MzOMAQEWKGd1hSKkAOOAtwRlysWzPanbfir1YmmPm4e5A9TFn2Iqdd8y0s7lsWGt7CAm1zazFgHzCcYld5cIRI2noUxQryAo4jGZWjmwdmzMAGgoKGgAyPMfxFtBB4grsh2sCV5Pg9fAJNZA5u/bAVZcxVMMosRO49dBFgdw5Ea7AKXUuQKpt5ll58qztIQUuwzfbdp9x3jHUY8kTe/xhucl5u0YC5M6xDbKmhRzY6DUSqx7FYQ14HgU8C6B2+mjVAlSFBUA16XKgqhUKq5ZAqA7ebD6d3N/UagiUVm0A/bBegF9O+P1uBV40CwDNHKAIbwIZW8cE7k2UEUDtsiaFdwAenLrvAcC7ulq5rJKi+MRKaV+OTooqG2VfRgu0lJy779FrBySuumzmC9uXLNf8wNgrOq0G7gSzha2fHkFPnTr3RuJ6w9dPb4YcyIAT3jizC+RZkcM0fbGRchFtHFIyvlP0NUWwnCQiM8J3IJ8hWKFyaIl6zvu52L1L7vIXSe63C01qWfAJbJNabKPLotvovzf6yDb65VHkdXEUebWjyH8YllTG1Ti3YqXGue2nDZzLI/GXlt8z5Efk//aSCgAAAABJRU5ErkJggg==" />
    					                <input type="text" id="denglu_account" oninput="login_input()" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.zhanghao')); ?>" />
    					            </div>
    					             <div class="login-content2-l-div">
    					                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAQAAAAm93DmAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB2ElEQVR42tXWP2vbYBAG8ELopsEfIFm9ZhWeDNmyZA5oLBQ0Z/bcyZ8gk75CF02avJYsmfwJNBa8afn1xRTUtxdbqRIouUMgPbr3QfdHd/fpY4uFSqOzd0i612lUFvPI7nQGoiS0c/dvZKXd76Ot2tpSkXRprdYmFHbK15Fd2IJerTgRiFoPti6mo9ZisFGctStsDGgtztM9o3+dM1Z6PFucdrY9GlwFfOVr0tXfDrryjPaIR7FFH+jK46GjpLsyUPbYvuwAQzhwn7C9yjJpZW9wH84NWEXCHTY55tJPnWJMhS4hl7mVDXaxjOkVOerRwVXuYkIeQ8Z73OVghzp8da8NWKsPWI0uL5chaai8hH0L2IOngBXH84sRqNDGRI1RnRItqvGxQf0mwhpNHsF1ZvBZ6RaN2xe19DmzX2dRtMcyi8mTKXn6M+aW2I+PB7LXX0hXeUaPFtkncDhNuMHFRJNjEwiDyzMIg8tjUmYQhqSEsplBGMomFPYswhZV+PVmEIZfLzSHGYRjc4jtawZhbF+xwXrAYmI68hAa7KkR4Nqg9+OM9gbX4whQTgwpNxrfz2jjJgypiTE6IXGMvn3Ql2HQv+8qMn9ZKsKy9E7r3Oq/LZzTK/GHll8m3loGX3l4/QAAAABJRU5ErkJggg==" />
    					                <input type="password"  id="denglu_password" oninput="login_input()" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.mima')); ?>" />
    					            </div>
    					            <div class="login-content2-l-btn">
    					                <input type="button" class="login-content2-l-btn-input login-content2-l-btn-input1 login-content2-l-btn-input-no"  onclick="check_login();" value="<?php echo e(trans('lang.denglu')); ?>" id="btn-login"/>
    					            </div>
    					            <div class="login-content2-l-div2">
    					                <p onclick="open_div('#index');"><?php echo e(trans('lang.xqgg')); ?></p>
    					                <p onclick="location.href='<?php echo e($setting->service_link); ?>'"><?php echo e(trans('lang.wjmm')); ?></p>
    				                </div>
					            </div>
    					    </div>
    					    <div class="login-content2-r">
    					       <div onclick="$('#form1')[0].reset();click_show('#zhuce');">
    					            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAQAAAD9CzEMAAAACXBIWXMAAAsTAAALEwEAmpwYAAACkElEQVR42uXXIWgrSxTG8S3E1V1dEVVRqKm7pipwRUxVVdR1haoLUVFxtVfFBEJMfMWaQE2gEFEZEVNTVbMisBCx4vegd3mPJjPzNo158P4x2dnDfjvfmXN2Jvs/4MSVgYm5lY3S2pOJoe9OsmPxw9i7GO/Gul+WcW0JQP3mUxNzayUAXnSyQ3EuB7A0cBmI6HtWAXLnWXN0bUBlqp2MPDNSgY1u1gx9FchdNpztI6j8ahI+ApV+4F5L25lW4M6dCoz+9e3D03WiZ6ECrP3e9VxHAfpp7ytsXO45/WyHfUNcKFDpxr3chAJcKYTp7S3sLd60wgJ5aIraCjHene5ZXLiKlRXke+MzoOEcTqL1YIkqUFAbKUbNew5M98a/SZM3FRiDdqCTVlI8Zjs4NdLff8w7lkHpVynGe/E9cLa7EGEQFJiKEC4r9+Di8+AAwp3HnRQ3zQQmKCNfs1yKYTOBOdYRgUqKxd+p/aH78RuB+z9XtStWeIrWR4qHOupZhH+KaRoR6ElR580iLVBiEhFoeUsbVFvU+WTR3Z+rOhfWmGcRPKQ6UbMkP2EVFfguTOW0qcAERVSgZRszqKnAsB6M4FGI+8SiOAuZ0E9swSq7vNUGhZrdr3Cze86i+OkzW+fZIZig0k7koQQAL9lh6IJpIqIAAKvDt+gvqGKJ9s0WAGycRjeT1+EbHZBH5Md2eYiuuDImMQf93V2Cn5ZCzPV2s+aWaON0oUSl8/G/L7dWIk1pLdd3/vFlLJMrzA0ozH2F3FtdgHEMHMvvBhVxBLPUie34WQwbHgjdKB3K1m3WHJeeHMLC1VfOyC+asNL9+hn/xlQhRmHmNu57c5lrQzMLr7a2Xi3MPOiETzJHy2X/Lf4CyRcQ3Z3pfQ4AAAAASUVORK5CYII=" />
        					        
        					        <p>
        					            <?php echo e(trans('lang.login_zhuce')); ?>

        					            
        					        </p>
    					       </div>
    					    </div>
					    </div>
					</div>
					
					<!--<div class="login-content">-->
					<!--	<div class="input-box account">-->
					<!--		<input type="text" id="denglu_account" style="font-size: 14px;" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.zanghao')); ?>">-->
					<!--	</div>-->
					<!--	<div class="input-box pwd">-->
					<!--		<input type="password" id="denglu_password" style="font-size: 14px;" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.mima')); ?>">-->
					<!--	</div>-->
					<!--	<div class="remember_forget">-->
					<!--		<div class="remember_box">-->
					<!--		</div>-->
					<!--		<div onclick="location.href='<?php echo e($setting->service_link); ?>'" class="forget_pwd remember_box_text text_288"></div>-->
					<!--	</div>-->
					<!--	<div class="login-btn-login text_3" id="btn-login" onclick="check_login();"></div>-->
					<!--	<div class="login-btn-registion text_951" id="btn-login-registion" onclick="$('#form1')[0].reset();click_show('#zhuce');"></div>-->
					<!--	<div class="login-gohome text_289" id="btn-gohome" onclick="open_div('#index');"></div>-->
					<!--</div>-->
				</div>
			</div>
		</div>
	</div>
</div>
<script>
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
		var account = $('#denglu_account').val();
		var password = $('#denglu_password').val();
// 		if(account.length<6){
// 			alert("<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.zanghao')); ?>");
// 			return false;
// 		}
// 		if(password.length<6){
// 			alert("<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.mima')); ?>");
// 			return false;
// 		}
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

</script>
<!--登录emd-->
<!--注册-->
<div class="body-pages page" id="zhuce" >
	<div id="registion-dialog" class="registion-dialog">
		<div class="registion-box">
			<!--<div class="registion-title">-->
			<!--	<div class="text_181" style="font-size: 5vmin; font-weight: 600; color: #000;"></div>-->
			<!--</div>-->
			<div class="registion-logo" style="background:url(<?php echo e($_system_config->site_logo); ?>);background-size:100% 100%;    opacity: 0;"></div>
			
			<div class="login-content2" style="padding-top: 50px;">
					    <form method="post" action="<?php echo e(route('wap.register.post')); ?>" onSubmit="return check_form(this)" id="form1">
					    <div class="login-content2-b">
					        <div class="login-content2-r">
    					       <!--<div onclick="div_close('#zhuce')">-->
    					       <div onclick="click_show('#denglu')">
    					            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAQAAAD9CzEMAAAACXBIWXMAAAsTAAALEwEAmpwYAAACiklEQVR42uWXLYziQBiGV1SuW3cCgSFZsWoVDnMGgziFQa/CkKxCYteSbFJRVYuoaEgwFSjMBVGDwKAQTRpSUfNccpBM2m++Abrr9nFt35nO9/NOpw8/A16Z4rNkS05OyoqAKd3vmPo3nxzQOOLTbz55jzWG02XlPktScgwbevdP3iHCTDDlRSieeccsIKZzz/R9cs4EtJ3KX8wpAchvThYTzsS83BjtgjOTW+RzXYxHixaefMLbJY751dVr4TIioeRMygdt0W/Z1SjoA5DXU0OLhDolY1H2DIC+nsvcJuCVI3aGIooSyJWOIrKFSJvMYbTHmnoMQGy1lf0RIS6GQr8AQFrvYhppqBwXc5loSmAj9xyAQMifcBM9CPi8VFLetLkWNwuru0uxWA7nsCTscOFbxyTAsdqIAFOrOMDFu8OuXXNjiimw3ARcDBRHAczMDR84KfaLcTFTRh2B0FwugdQq9HCTKC/4W3lGCqwU6bpRBBGwq5opUKQjFEzdFC8U1Rf4itRjj0bi/KqU1RTFqvgDjZE6ZgHszeUK2KriLnZKHtUxGyCpmilTxR6FkiAVDkBYN9qzKo+wMVb1rbrRusb2NuhRUudgEqS4v1d33loo9WYt6DjUMZBVTh/4ALQddcgBw8Yx/RMFEIrzhGI2E6NB9pxs6z+isVyF5qlWhYxHtcCFWYD8aEbKMP/mXShQz0YsrceWDm+ssREzpC2aQXcIz5yAkt7lcB6RcuIaOSkREzr/v4wFUKiHZgYAHFnShIiDOSspMKUhem1kORsjul+L4vtXL2tx4l4KLfdaR624h4SXJv/IG25h+5V/5QEBRzQyQrPnNAaPLjNCEnYUlOxJCJnRw3v4AfwDD2rwa9aIv18AAAAASUVORK5CYII=" />
        					        
        					        <p>
        					            <?php echo e(trans('lang.fanhuidenglu')); ?>

        					            
        					        </p>
    					       </div>
    					    </div>
    					    
					        <div class="login-content2-l">
					            <h5 class="login-content2-h5">註冊</h5>
					            <div class="login-content2-l-b">
					                 <div class="login-content2-l-div">
    					                <img src="/new0404/images/registion_icon_account.png" />
    					                <input name="name" type="text" id="name" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshuruzanghao')); ?> *" />
    					            </div>
    					             <div class="login-content2-l-div">
    					                <img src="/new0404/images/registion_icon_password.png" />
    					                <input name="password" type="password" id="registpassword" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshurumima')); ?> *" />
    					            </div>
    					            
    					            <div class="login-content2-l-div">
    					                <img src="/new0404/images/registion_icon_password.png" />
    					                <input name="password_confirmation" type="password" id="registpassword2" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingzaicishuru')); ?><?php echo e(trans('lang.mima')); ?> *" />
    					            </div>
    					            <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_truename.png" />
    					                <input name="qk_pwd" type="password" id="registtruename" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshuqukuanmima')); ?> *" />
    					            </div>
    					            <div class="login-content2-l-div">
    					                <img src="/new0404/images/registion_icon_account.png" />
    					                <input  name="username" type="text" id="username" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.zsxm')); ?> *" />
    					            </div>
    					            <!----->
    					            <?php if($setting->sms_message): ?>
    					            <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_phone.png" />
    					                <input name="phone" type="text" id="phone" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.sjh')); ?>" />
    					                <span class="sty2 phoneCodeBtn"><?php echo e(trans('lang.hqyzm')); ?> </span>
    					            </div>
    					            <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_phoneCode.png" />
    					                <input name="code" type="text" id="registPhoneCode" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.yzm')); ?>*" />
    					            </div>
    					            <?php else: ?>
    					            <div class="login-content2-l-div">
    					                <img src="/new0404/images/icon_phone.png" />
    					                <input name="phone" type="text" id="phone" oninput="login_input2()" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.sjh')); ?>" />
    
    					            </div>
    					            <?php endif; ?>
    					            <!----->
    					            
    					            <div class="login-content2-l-btn">
    					                <input type="button" class="login-content2-l-btn-input login-content2-l-btn-input2 login-content2-l-btn-input-no"  onclick="check_form();" value="注册" id="btn-login" check_form();/>
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
        if (!phone) {alert("<?php echo e(trans('lang.zhuce_shouji')); ?>"  );return false}
        if(phone.length != 8){
            alert("<?php echo e(trans('lang.zhuce_shouji')); ?>");
            return false;
        }
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

    function login_input2(){
         var password = $("#registpassword").val();
            var cfmpwd = $("#registpassword2").val();
            var registtruename = $("#registtruename").val();
           var loginName = $("#name").val();
         var phone = $('#phone').val();
         var username = $('#username').val();
         if(username != '' &&  cfmpwd != ''&&  registtruename != ''&&  loginName != ''&&  phone != ''&&  username != ''){
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
         if (!loginName) {
            alert("<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.zhanghao')); ?>!");
            return false;
        }
        
         if (!password) {
            alert("<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.denglumima')); ?>!");
            return false;
        }
        if (!cfmpwd) {
            alert("<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.querenmima')); ?>!");
            return false;
        }
        if (password　!= cfmpwd) {
            alert("<?php echo e(trans('lang.liangcimimabuyizhi')); ?> !");
            return false;
        }
      
         if (!phone) {
            alert("<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.sjh')); ?>!");
            return false;
        }
        if (!username) {
            alert("<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.zsxm')); ?>!");
            return false;
        }
        var pattern = /^[0-9]{8,11}$/;
        if (!phone) {alert("<?php echo e(trans('lang.zhuce_shouji')); ?>");return false}
        if(phone.length >11 || phone.length <8){
            alert("<?php echo e(trans('lang.zhuce_shouji')); ?>");
            return false;
        }
        
        $.ajax({
            url : "<?php echo e(route('wap.register.post')); ?>",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                if(data.status.errorCode == 0){
                    // div_close('#zhuce')
                    location.reload()
                }else{
                    alert(data.status.msg);
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
			<?php if(!Auth::guard('member')->guest()): ?>
			<h2><a href="javascript:click_show('#shenqinjindu')">申請進度查詢</a></h2>
			<?php else: ?>
			<h2><a href="javascript:open_div('#denglu')">申請進度查詢</a></h2>
			<?php endif; ?>
		</div>
        <?php $__currentLoopData = $data_huodong; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		
    			<div class="activitylist" onclick="open_huodong('<?php echo e($item->id); ?>');">
    				<div class="" style="background: rgb(42, 46, 50); min-height: 1rem;">
    					<img class="activeLogo" src="<?php echo e($item->title_img); ?>">
    				</div>
    				<div class="activeTit">
    					<p>
    						<?php echo e($item->title); ?>

    					</p>
    					<p>
    						<span>長期有效</span>
    						<span>
    							查看詳情 <img src="/new/css/xiangqingjiantou.png" class="rightImg">
    						</span>
    					</p>
    				</div>
    			</div>
    		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
</div>
</div>
<!--活动end-->
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
                        
                       console.log(data)
                        <?php if(!Auth::guard('member')->guest()): ?>
                        $('#huodongxiangqing .qbhdbox2').html(`<input type="hidden" name="activity_id" value="`+id+`" class="apply" id="activity_id">
                                                <button type="button" class="btn4 ajax-submit-btn apply" id="" onclick="shenqinghuodong_fun()" >
                                                    申請活動
                                                </button>`);
                                                
                        <?php else: ?>
                       
                          $('#huodongxiangqing .qbhdbox2').html(`<button type="button" class="btn4 ajax-submit-btn apply" onclick="open_div('#denglu')">
                                                申請活動
                                            </button>`);
                        <?php endif; ?>
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
                alert(data.status.msg);
                //if(data.status.errorCode==0){
                    //$(".apply").hide();
               // }
            }
        })
    }
</script>
<div class="m_container page" id="huodongxiangqing">

		<div class="nytop">
			<a href="javascript:div_close('#huodongxiangqing');" class="fhbtn"></a>
			<h1><?php echo e(trans("lang.hdxq")); ?></h1>
			<h2><a class="kefu_box"><?php echo e(trans("lang.zxkf")); ?></a></h2>
		</div>
    		<div class="zzc">
        		<div class="zzc_tit">
        			<h2></h2>
        		</div>
        		<div class="qbhd_nr">
        			<ul>
        					<li>
        						<div class="qbhdbox" style="height:auto;background: #fff">
        							<h3></h3>
                                    <div class="qbhdbox2"></div>
                                  

                                    
        						</div>
        					</li>
        			</ul>
        		</div>
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
                                 <h2>虛擬幣支付</h2>
                             </div>
                             <span></span>
                         </a>
                    </div>

                  

    </div>   
</div>
<!--充值end-->
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
    				<span>收款銀行：</span>
    				<div class="bankBox">
    													<b class="on">
    						<img src="/new/css/fps.png">轉數快
    						<input type="radio" name="xuankuang" id="rad" value="47">
    					</b>
    												</div>
                </li>
    		</ul>
    	        <input type="hidden" name="payment_type" value="3">
    		<button type="button" class="subBtn ajax-submit-btn-pay-type" id="SubTran1" style="margin: 0.5rem auto;" onclick="chongzhi_zhuanhuankuai_step()">获取收款银行信息</button>
    	    </div>
    		
    		
    		<div class="bq2-wrapper" style="display:none;">
    		    <div class="top-block">
            		<div>
            			<span>
            				匯款金額：
            			</span>
            			<span class="yellow">
            				$ <span id="paymoney"></span>
            			</span>
            		</div>
            	</div>
            	<h3>
            		請記錄以下收款信息，並匯款
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
            			<span class="asain">收款人名：</span>
            			<span class="chatNumber3" style="color:#fb2464 ;"></span>
            			<span class="copy" id="btn3">
            				<?php echo e(trans("lang.fuzhi")); ?>

            			</span>
            		</p>
            		<div class="btns" >
            			<a class="contact" onclick="$('#chongzhi_zhuanhuankuai .bq2-wrapper').hide();$('#chongzhi_zhuanhuankuai #step1').show();$('.chongzhi_zhuanhuankuai_fhbtn2').hide();$('.chongzhi_zhuanhuankuai_fhbtn').show(); $('#chongzhi_zhuanhuankuai #money').val('');$('#chongzhi_zhuanhuankuai #account').val('')">返回 重新輸入</a>
            			<button type="button" class="submit ajax-submit-without-confirm-btn switchroute" onclick="chongzhi_zhuanhuankuai_addrecharge()"><?php echo e(trans("lang.qrcz")); ?></button>
            		</div>
            	</div>
            	<p style="color: red;line-height: 3;margin-top: 20px;">
            	    注：爲了可以快速上分，請按照系統提示金額進行轉賬，<br/>
                    轉賬金額精確到小數點后兩位，如不是按照提示金額轉賬系統會自動拒絕該轉賬請求<br/>
                    并且不做進行補分操作！謝謝
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
        alert("<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.czje')); ?>");
        return false;
    }
    if($('#chongzhi_zhuanhuankuai #money').val() < Number(<?php echo e($setting->recharge_min); ?>)){
        alert("<?php echo e(trans('lang.jebxdy')); ?><?php echo e($setting->recharge_min); ?>");
        return false;
    }
    if($('#chongzhi_zhuanhuankuai #money').val() > Number(<?php echo e($setting->recharge_max); ?>)){
        alert("<?php echo e(trans('lang.jebxxy')); ?><?php echo e($setting->recharge_max); ?>");
        return false;
    }
    if(!$('#chongzhi_zhuanhuankuai #account').val()){
        alert("<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.xingming')); ?>");
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
                        alert('成功');
                    }else{
                        
                        alert(data.status.msg);
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
				<span>收款銀行：</span>
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
		<button type="button" class="subBtn ajax-submit-btn-pay-type" id="SubTran1" style="margin: 0.5rem auto;" onclick="chongzhi_yinhangka_step()">获取收款银行信息</button>
	    </div>
		
		
		<div class="bq2-wrapper" style="display:none;">
		    <div class="top-block">
        		<div>
        			<span>
        				匯款金額：
        			</span>
        			<span class="yellow">
        				$ <span id="paymoney"></span>
        			</span>
        		</div>
        	</div>
        	<h3>
        		請記錄以下收款信息，並匯款
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
        			<span class="asain">銀行號碼：</span>
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
        			<a class="contact" onclick="$('#chongzhi_yinhangka .bq2-wrapper').hide();$('#chongzhi_yinhangka #step1').show();$('.chongzhi_yinhangka_fhbtn2').hide();$('.chongzhi_yinhangka_fhbtn').show();$('#chongzhi_yinhangka #account').val('');$('#chongzhi_yinhangka #money').val('')">返回 重新輸入</a>
        			<button type="button" class="submit ajax-submit-without-confirm-btn switchroute" onclick="chongzhi_yinhangka_addrecharge()"><?php echo e(trans("lang.qrcz")); ?></button>
        		</div>
        	</div>
        	<p style="color: red;line-height: 3;margin-top: 20px;">
        	    注：爲了可以快速上分，請按照系統提示金額進行轉賬，<br/>
                轉賬金額精確到小數點后兩位，如不是按照提示金額轉賬系統會自動拒絕該轉賬請求<br/>
                并且不做進行補分操作！謝謝
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
        alert("<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.czje')); ?>");
        return false;
    }
    if($('#chongzhi_yinhangka #money').val() < Number(<?php echo e($setting->recharge_min); ?>)){
        alert("<?php echo e(trans('lang.jebxdy')); ?><?php echo e($setting->recharge_min); ?>");
        return false;
    }
    if($('#chongzhi_yinhangka #money').val() > Number(<?php echo e($setting->recharge_max); ?>)){
        alert("<?php echo e(trans('lang.jebxxy')); ?><?php echo e($setting->recharge_max); ?>");
        return false;
    }
    if(!bank_id){
        alert("請選擇銀行");
        return false;
    }
    if(!$('#chongzhi_yinhangka #account').val()){
        alert("<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.xingming')); ?>");
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
								alert('成功');
							}else{
							    alert(data.status.msg);
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
			    <span>充值金额：</span>
			    <input type="text" name="money" id="money" oninput="this.value=this.value.replace(/\D/g,'');" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.czje')); ?>" autocomplete="off">
			    <input type="hidden" value="<?php echo e($xiaoshu); ?>" id="xiaoshu">
			    <!--<p style="float:right;margin-right:1rem;">.<?php echo e($xiaoshu); ?> <?php echo e(trans("lang.yuan")); ?></p>-->
			</li>
            <li class="bankChose">
				<span>收款銀行：</span>
				<div class="bankBox">
					<b class="on">
						<img src="/new/css/xnb.png">USDT
						<input type="radio" name="chongzhi_USDT_xuankuang" id="rad" value="47">
					</b>
												</div>
            </li>
		</ul>
	        	<input type="hidden" name="payment_type" value="3">
		<button type="button" class="subBtn ajax-submit-btn-pay-type" id="SubTran1" style="margin: 0.5rem auto;" onclick="chongzhi_USDT_step()">获取收款银行信息</button>
	    </div>
		
		
		<div class="bq2-wrapper" style="display:none;">
		    <div class="top-block" style="display:flex;margin:10px;width:100%;">
        		<div style="flex:1">
        			<span>
        				匯款金額：
        			</span>
        			<br>
        			<br>
        			<span class="yellow" id="old">
        				 
        			</span>
        		</div>
        		<div style="flex:1">
        			<span>
        				匯款數量：
        			</span>
        			<br>
        			<br>
        			<span class="yellow">
        				 <span id="paymoney"></span>   USDT
        			</span>
        		</div>
        	</div>
        	<h3>
        		系統會自動換算，請匯款USDT金額
        	</h3>
        	<div class="bot-container">
        		<p class="row account">
                    <span class="asain"> 充值地址(TRC20)：</span>
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
        			<a class="contact" onclick="$('#chongzhi_USDT .bq2-wrapper').hide();$('#chongzhi_USDT #step1').show();$('.chongzhi_USDT_fhbtn').show();$('.chongzhi_USDT_fhbtn2').hide();$('#chongzhi_USDT #account').val('');$('#chongzhi_USDT #money').val('');$('#chongzhi_USDT #paymoney').val('')">返回 重新輸入</a>
        			<button type="button" class="submit ajax-submit-without-confirm-btn switchroute" onclick="chongzhi_USDT_addrecharge()"><?php echo e(trans("lang.qrcz")); ?></button>
        		</div>
        	</div>
        	<p style="color: red;line-height: 2;margin-top: 20px;">
        	    注：爲了可以快速上分，請按照系統提示金額進行轉賬，<br/>
                轉賬金額精確到小數點后兩位，如不是按照提示金額轉賬系統會自動拒絕該轉賬請求<br/>
                1USDT=<?php echo e($setting->usdt_lv); ?>HKD 存入對應USDT系統會自動幫你兌換成港幣分數
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
        alert("<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.czje')); ?>");
        return false;
    }
    if($('#chongzhi_USDT #money').val() < Number(<?php echo e($setting->recharge_min); ?>)){
        alert("<?php echo e(trans('lang.jebxdy')); ?><?php echo e($setting->recharge_min); ?>");
        return false;
    }
    if($('#chongzhi_USDT #money').val() > Number(<?php echo e($setting->recharge_max); ?>)){
        alert("<?php echo e(trans('lang.jebxxy')); ?><?php echo e($setting->recharge_max); ?>");
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
							alert('成功');
                    }else{
                        alert(data.status.msg);
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
				<span>收款銀行：</span>
				<div class="bankBox">
													<b class="on">
						<img src="/new/css/bld.png"><?php echo e(trans("lang.bldzz")); ?>

						<input type="radio" name="xuankuang" id="rad" value="47">
					</b>
												</div>
            </li>
		</ul>
		<input type="hidden" name="payment_type" value="3">
		<button type="button" class="subBtn ajax-submit-btn-pay-type" id="SubTran1" style="margin: 0.5rem auto;" onclick="chongzhi_bainlidian_step()">获取收款银行信息</button>
		</div>
		
		<div class="bq2-wrapper" style="display:none;">
		    <div class="top-block">
        		<div>
        			<span class="white">
        				匯款金額：
        			</span>
        			<span class="yellow">
        				$ <span id="paymoney"></span>
        			</span>
        		</div>
        	</div>
        	<h3>
        		請記錄以下收款信息，並匯款
        	</h3>
        	<div class="bot-container">
        		<p class="row account">
                    <span class="asain"> <?php echo e(trans("lang.skewm")); ?>：</span><br/>
        			<img id="bld_pic" src=""  style="width:200px;height:200px;margin:0 auto;"/>
        			
        		</p>
        		
        		<div class="btns" >
        			<a class="contact" onclick="$('#chongzhi_bainlidian .bq2-wrapper').hide();$('#chongzhi_bainlidian #step1').show();$('.chongzhi_bainlidian_fhbtn2').hide();$('.chongzhi_bainlidian_fhbtn').show();">返回 重新輸入</a>
        			<button type="button" class="submit ajax-submit-without-confirm-btn switchroute" onclick="chongzhi_bainlidian_addrecharge()"><?php echo e(trans("lang.qrcz")); ?></button>
        		</div>
        	</div>
        	<p style="color: red;line-height: 2;margin-top: 20px;">
        	    注：爲了可以快速上分，請按照系統提示金額進行轉賬，<br/>
                轉賬金額精確到小數點后兩位，如不是按照提示金額轉賬系統會自動拒絕該轉賬請求<br/>
                并且不做進行補分操作！謝謝
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
        alert(ts);
        return false;
    }
    if($('#chongzhi_bainlidian #money').val() < Number(<?php echo e($setting->recharge_min); ?>)){
        alert("<?php echo e(trans('lang.jebxdy')); ?><?php echo e($setting->recharge_min); ?>");
        return false;
    }
    if($('#chongzhi_bainlidian #money').val() > Number(<?php echo e($setting->recharge_max); ?>)){
        alert("<?php echo e(trans('lang.jebxxy')); ?><?php echo e($setting->recharge_max); ?>");
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
				data : {amount:$('#chongzhi_bainlidian #money').val(),xiaoshu:0},
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
						 alert('成功');
                    }else{
                        alert(data.status.msg);
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
							<input type="text"  class="username2" required="required" style="font-size: 12px;margin:0;"
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
						<a class="recharge-submit text_155" onclick="yinhangkaguanli_saveBank();" style="color: #fff;"></a>
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
							<input  class="username2" type="text" required="required" style="font-size: 12px;margin:0;"
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
							<input  class="username2" type="text" required="required" style="font-size: 12px;margin:0;"
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
							<input  class="username2" type="text" required="required" style="font-size: 12px;margin:0;"
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
// yinhangkaguanli
	function yinhangkaguanli_saveBank() {
		var bank = $("#yinhangkaguanli #Bankname").val();
		var username = $("#yinhangkaguanli .username2").eq(0).val();
		var card = $("#yinhangkaguanli #bankcode").val();
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
					$('#addbank,.addbank').hide();
					$('#yinhangkaguanli .list').append(`<div class="bank-list-item"  style="width: 91%; margin: 15px; background: rgb(255, 255, 255); border: 1px solid rgb(220, 180, 84); padding: 10px;">
							<div style="text-align: center; border-bottom: 1px solid #787878;">绑定銀行卡</div>
							<div style="height: 30px; line-height: 30px;">真實姓名:` + username +`</div>
							<div style="height: 30px; line-height: 30px;">銀行名稱: `+ bank+`</div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">銀行卡號: ***`+ card.substring(card.length - 3) +`
							</div>
						</div>`)
					location.reload();
				}
				
			}
		})
		return false;
	}
	function saveFps() {
		var fps = $("#yinhangkaguanli #FPSAccount").val();
		var username = $("#yinhangkaguanli .username2").eq(1).val();
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
					 $('#addFPS,.addFPS').hide();
					$('#yinhangkaguanli .list').append(`
					<div class="bank-list-item"  style="width: 91%; margin: 15px; background: rgb(255, 255, 255); border: 1px solid rgb(220, 180, 84); padding: 10px;">
							<div style="text-align: center; border-bottom: 1px solid #787878;">USDT-ERC20</div>
							<div  style="height: 30px; line-height: 30px;">真實姓名: ` + username + `</div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">USDT帳號: ***`+ fps.substring(fps.length - 3) +`
							</div>
						</div>`)
					location.reload();
				}
				
			}
		})
		return false;
	}

	function saveErc20() {
		var erc20 = $("#yinhangkaguanli #USDTAccount").val();
		var username = $("#yinhangkaguanli .username2").eq(2).val();
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
				    $('#addERC20,.addERC20').hide();
					$('#yinhangkaguanli .list').append(`
					<div class="bank-list-item"  style="width: 91%; margin: 15px; background: rgb(255, 255, 255); border: 1px solid rgb(220, 180, 84); padding: 10px;">
							<div style="text-align: center; border-bottom: 1px solid #787878;">USDT-ERC20</div>
							<div  style="height: 30px; line-height: 30px;">真實姓名: ` + username + `</div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">USDT帳號: ***`+ erc20.substring(erc20.length - 3) +`
							</div>
						</div>`)
					location.reload();
				}
				
			}
		})
		return false;
	}

	function saveTrc20() {
		var trc20  = $("#yinhangkaguanli #USDTAccountTRC20").val();
		var username = $("#yinhangkaguanli .username2").eq(3).val();
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
				    $('#addTRC20,.addTRC20').hide();
					$('#yinhangkaguanli .list').append(`
					<div class="bank-list-item"  style="width: 91%; margin: 15px; background: rgb(255, 255, 255); border: 1px solid rgb(220, 180, 84); padding: 10px;">
							<div style="text-align: center; border-bottom: 1px solid #787878;">USDT-TRC20</div>
							<div  style="height: 30px; line-height: 30px;">真實姓名: ` + username + `</div>
							<div class="FPSAccount"
								 style="line-height: 30px; word-wrap: break-word; word-break: break-all;">USDT帳號: ***`+ trc20.substring(trc20.length - 3) +`
							</div>
						</div>`)
					location.reload();
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
    <h1>提現</h1>
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
                        <option value="2">銀行卡</option>
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
			    <?php echo e(trans("lang.yue")); ?>:<span id="gamemoney" class="old_money"><?php echo e($member->money); ?></span>
			    
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
			alert('<?php echo e(trans("lang.qxz")); ?><?php echo e(trans("lang.txfs")); ?>');
			return false;
		}
		var money = $("#tixian #money").val();
		if(money==''){
			alert('請輸入<?php echo e(trans("lang.tkje")); ?>');
			return false;
		}

	    var qk_pwd = $("#tixian #qk_pwd").val();
		if(qk_pwd==''){
			alert('請輸入<?php echo e(trans("lang.tkmm")); ?>');
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
                        
						alert('成功')
						div_close('#tixian');
                    }else{
                        alert(data.status.msg);
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
        <h1>申請進度</h1>
    </div>
    <div id="main-container" style="height:100%">
        <div class="Hyzx-body">                
            
            <div id="MMainData">
                
                <ul class="list-group" style="padding: 15px;">
                            <?php $__currentLoopData = $data_shenqingjindu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(@$item->activity): ?>
                                    <li class="list-group-item message-item" style="background: #fff;background: #fff;padding: 10px;font-size: 16px;line-height: 1.5;border-radius:5px;">
                                        <div class="message-title" style="color:#000;">活动标题：<?php echo e($item->activity->title); ?></div>
                                        <div class="message-content" style="color:#000;">
                                            <?php if($item->status == 3): ?>
                                                你的活动申请未通过，原因：<?php echo e($item->fail_reason); ?>

                                            <?php endif; ?>
                                            <?php if($item->status == 2): ?>
                                                恭喜你，你的活动申请已审核通过，赠送金额已发放到你的账户，请查收！
                                            <?php endif; ?>
                                            <?php if($item->status == 1): ?>
                                                你的活动申请正在审核，请耐心等耐！
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
<div class="page" id="zijinhuishou">
    <div class="m_container">
	<div class="nytop">
		<a href="javascript:javascript:div_close('#zijinhuishou');" class="fhbtn"></a>
		<h1><?php echo e(trans("lang.yehz")); ?></h1>
		<h2><a class="kefu_box"><?php echo e(trans("lang.zxkf")); ?></a></h2>
	</div>

	<div class="moneyBag">
			<div class="bagTitle">
				<div class="bagChange">
					刷新金額
					<a href="javascript:void(0)" class="refuseBtn"></a>
				</div>
				<div class="getMoney"><a href="javascript:void(0);" class="refresh11 transfer_text" id="transfer3" style="color:#d2b79c">資金回收</a></div>
			</div>
			<ul class="moneyInfor">
				<li id="center_money" data-uri="https://www.cash669.net/api/member_balance/4751">
					<div class="moneyName">
						<div></div>
						<span>中心錢包</span>
					</div>
					<p id="gamemoneyy" class="gamemoneyy gamemoney_text"><?php echo e($member->money); ?></p>
					<img src="/new/css/loading.png">
				</li>

				<li id="center_money" data-uri="https://www.cash669.net/api/all_balance/4751">
					<div class="moneyName">
						<div></div>
						<span>遊戲錢包</span>
					</div>
					<p id="api_money">0</p>
					<img src="/new/css/loading.png">
				</li>
			</ul>
			<div class="moneyListbox">
				<div class="checkMoremoney">
					<div class="saveBox">詳細展開</div>
					<div class="openmoneyBtn"></div>
				</div>
				<ul class="moenyList">
				    
				</ul>
			</div>
		</div>
		<div class="changeBox" >
			<div class="changeInfor" style="color: #bda287;box-shadow: 0 2px 4px rgb(0 0 0 / 20%);width: 95%;margin: 0 auto;border-radius: 10px;">
				<div class="changeTitle">
					<div class="changeChose">
						<span id="chose1" data-from="center">中心錢包</span>
						<i></i>
					</div>
					<div class="changeChose">
						<span id="chose2" data-to="274">DG</span>
						<i></i>
					</div>
				</div>
				<div class="enterMoney">
					<span>$</span>
					<input id="trans_money" type="tel" class="moneyNum" placeholder="請輸入轉賬金額">
					 <a href="javascript:void();" class="maxNum">最大金额</a> 
				</div>
			</div>
			<button class="changeNow">立即轉賬</button>
		</div>
		<div class="needHelp">如需幫助，請<a class="kefu_box"><?php echo e(trans("lang.zxkf")); ?></a></div>
		<div id="screen"></div>
		<div class="choseList" id="chonseOne">
			<div class="chostTitle">
				<a href="javascript:void(0)" class="escChose">取消</a>
				選擇遊戲
			</div>
			<ul>
				<li class="cur" data-from="center">中心錢包</li>
				<?php $__currentLoopData = $api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li data-from="<?php echo e($item->id); ?>"><?php echo e($item->api_title); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<div class="choseList" id="chonseTwo">
			<div class="chostTitle">
				<a href="javascript:void(0)" class="escChose">取消</a>
				選擇遊戲
			</div>
			<ul>
				<li data-to="center">中心錢包</li>
				<?php $__currentLoopData = $api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li data-to="<?php echo e($item->id); ?>"><?php echo e($item->api_title); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					
			</ul>
		</div>
       
</div>
</div>
<script>
    // $('body').on('click','.kefu_box',function(){
    //     layer.open({
    //         content: '<div class="layui-m-layerbtn"><span yes="" type="1" onclick="tapCopy('+"'url_whats'"+')" data-clipboard-target="#url">WHATSAPP<?php echo e($setting->whatsapp); ?> </span></div>   <div class="layui-m-layerbtn"><a href="<?php echo e($setting->service_link); ?>" target="_blank"><span yes="" type="1"><?php echo e(trans("lang.zxkf")); ?></span></a></div>'
    //         ,skin: 'footer'
    //     });
    // })
    function tapCopy(){
        location.href="<?php echo e(getset('whatsapp_url')); ?>"
    }
    function wechat(){
        layer.open({
            content: '<img src="<?php echo e($setting->wx_pic); ?>" style="width:200px;height:200px;">'
            ,btn: 'OK'
        });
    }
    
    
 	//监听是否输入金额
 	$(document).on("input propertychange",".moneyNum",function(){
        var num = $(this).val().length;
		console.log(num);
		if(num>0){
			$('.changeNow').addClass('cur')
		}else{
			$('.changeNow').removeClass('cur')
		}
    });
    
    
    
 	$('.changeNow').click(function () {
 		var from = $('#chose1').attr('data-from');
 		var to = $('#chose2').attr('data-to');
 		var trans_money = $('#trans_money').val();
        if(from=='center'){
            var transfer_type = 0;
            var account2 = to;
        }else{
            var transfer_type = 1;
            var account2 = from;
        }
 		if (trans_money == ''){
			layer.open({
				content: '請輸入轉賬金額'
				,skin: 'msg'
				,time: 2 //2秒后自动关闭
			});
			return false;
		}
 		$(this).attr('disabled',true);
 		var that = $(this);
 		var loding =  layer.open({
			type: 2
			,content: '加载中',
			shade: 'background-color: rgba(0,0,0,.5)' //自定义遮罩的透明度
		});
		
		$.ajax({
            url : "<?php echo e(route('member.post_transfer')); ?>",
            type : 'POST',
            data : {money:trans_money,transfer_type:transfer_type,account2:account2,account1:1},
            success : function (data) {
                 alert(data.status.msg);
                if(data.status.errorCode == 0){
                    //成功
                    // div_close('#zijinhuishou')
                    $('.refuseBtn').click();
                    
                    $(this).removeAttr('disabled');
                }
                layer.close(loding);
            }
        })
	})
	
		$('#chonseOne li').click(function(){
		var choseTxt = $(this).html();
		$('#chose1').html(choseTxt);
		var from = $(this).attr('data-from');
		$('#chose1').attr('data-from',from);
		$('#screen').fadeOut();
		$(this).addClass('cur').siblings().removeClass('cur');
		$('#chonseOne').animate({'bottom':'-200%'},500);
		$('body').css('position','static');
		if(choseTxt=='中心錢包'){

		}else{
			$('#chonseTwo li').eq(0).addClass('cur').siblings().removeClass('cur');
			$('#chose2').html('中心錢包')
			$('#chose2').attr('data-to','center');
		}
	})
	$('#chose1').click(function(){
		$('#screen').fadeIn();
		$('#chonseOne').animate({'bottom':'0'},500);
		$('body').css('position','fixed');
	})
	//转账方式2
	$('#chonseTwo li').click(function(){
		var choseTxt = $(this).html();
		$('#chose2').html(choseTxt);
		var to = $(this).attr('data-to');
		$('#chose2').attr('data-to',to);
		$('#screen').fadeOut();
		$(this).addClass('cur').siblings().removeClass('cur');
		$('#chonseTwo').animate({'bottom':'-200%'},500);
		$('body').css('position','static');
		if(choseTxt=='中心錢包'){

		}else{
			$('#chonseOne li').eq(0).addClass('cur').siblings().removeClass('cur');
			$('#chose1').html('中心錢包');
			$('#chose1').attr('data-from','center');
		}
	})
	$('#chose2').click(function(){
		$('#screen').fadeIn();
		$('#chonseTwo').animate({'bottom':'0'},500);
		$('body').css('position','fixed');
	})
	$('.escChose').click(function(){
		$('#screen').fadeOut();
		$('#chonseTwo,#chonseOne').animate({'bottom':'-200%'},500);
		$('body').css('position','static');
	})
	
	$('.refuseBtn').click(function(){
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
						}else if(res.status.errorCode==1){
						    _this.text(money);
						}
						if (k === len - 1)
            		    {
                    		        $.ajax({
                                        url:'/member/getNowMoney',
                                        success:function(res){
                                            $('.transfer_text').text('<?php echo e(trans("lang.zijinhuishou")); ?>');
                        		            $('.transfer_text').val('<?php echo e(trans("lang.zijinhuishou")); ?>');
                                            $('.gamemoney_text').text(res.data)
                                            $('#api_money').text(api_money.toFixed(2))
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
<!--我的-->
<div class="page" style="background-color:#f8f8f8;" id="wode">
    <div class="body-pages">
    	<div class="pages-container show">
                <a data-link="" class="close-btn" href="javascript:div_close('#wode');"></a>
                <!-- 個人中心 -->
                <div data-page-name="user-center" class="pages-main page-user-center-main active ani">
                    <div class="header">
                        <div class="title" style="height: 10.7vmin;">
                            <div class="title-text"><?php echo e(trans("lang.wode")); ?></div>
                            <div class="title-config">
                                <div class="config btn-pages user-center-item" data-page-name="security-settings" onclick="click_show('#gerenxinxi')"></div>
                                <a class="news btn-pages user-center-item" href="javascript:click_show('#xiaoxi')"></a>
                            </div>
                        </div>
                        <div class="info">
                            <div class="info-img logined"></div>
                            <div class="info-data"><?php echo e($_member -> name); ?></div>
                        </div>
                        <div class="center">
                            
                            <div class="center-right task btn-pages user-center-item" onclick="javascript:click_show('#huodong')" style="width: 50%;">
                                <div class="center-img task"></div>
                                <div class="center-text1 task"><?php echo e(trans("lang.hdzx")); ?></div>
                                <div class="center-text2 task">TASK CENTER</div>
                            </div>
                            <div class="center-left vip" style="width: 50%;" onclick="javascript:click_show('#dailizhongxin');">
                                <div class="center-img vip"></div>
                                <div class="center-text1 vip"><?php echo e(trans("lang.dlzx")); ?></div>
                                <div class="center-text2 vip">VIP PRIVILEGE</div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="tab-item mymoney btn-pages user-center-item" onclick="javascript:click_show('#yinhangkaguanli')">
                                <div class="tab-img mymoney"></div>
                                <div class="tab-text mymoney">銀行卡管理</div>
                            </div>
                            <div class="tab-item betrecord btn-pages user-center-item xmjf" >
                                <div class="tab-img betrecord"></div>
                                <div class="tab-text betrecord"><?php echo e(trans("lang.ssfs")); ?></div>
                            </div>
                            <div class="tab-item transactionrecord btn-pages user-center-item" onclick="javascript:click_show('#chongzhijilv')">
                                <div class="tab-img transactionrecord"></div>
                                <div class="tab-text transactionrecord"><?php echo e(trans("lang.baobiao")); ?></div>
                            </div>
                        </div>
                        <!-- <div class="tab">
                            <div class="tab-item cardmanagement btn-pop" data-pop="add-card-dialog">
                                <div class="tab-img cardmanagement"></div>
                                <div class="tab-text cardmanagement text_341"></div>
                            </div>
                        </div> -->
                    </div>
                    <div class="content">
                        <!-- <div class="content-row">
                            <div class="content-row-box btn-pages user-center-item" data-page-name="content-help">
                                <div class="icon help"></div>
                                <div class="title text_342"></div>
                                <div class="remark text_343"></div>
                                <img class="more" />
                            </div>
                        </div> -->
                        <div class="content-row">
                            <div class="content-row-box btn-pages user-center-item" data-page-name="BankManagement" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <div class="icon redeem-record"></div>
                                <div class="title" style="    text-align: center;"><?php echo e(trans("lang.tcdl")); ?></div>
                                <!-- <div class="remark"></div> -->
                        
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
    	
        
        <form id="logout-form" action="<?php echo e(route('wap.logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form> 
                                
                                
    <div class="bj"></div>
    	<div class="cmtc" style="bottom:-25rem;">
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
	</div>
    
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
                alert(data.status.msg);
                if(data.status.errorCode == 0){
                    btn.attr("disabled",false);
                   	$('.cmtc').css('bottom','-25rem');
		            $('.bj').fadeOut();
		            $('#zongfangshui').html(0)
                    //location.href=data.url;
                }
            }
        })
        return false;
	})
</script>
<!--我的end-->
<!--个人信息-->
<div class="page" id="gerenxinxi">
    <div class="nytop">
	<a href="javascript:div_close('#gerenxinxi');" class="fhbtn"></a>
    <h1>個人信息</h1>
</div>
<div class="inforTxt" style="border:none;">
	<ul>
	    <li>
		   
        	<div class="inforLeft">
            	<h2><?php echo e(trans("lang.xgmm")); ?></h2>
            </div>
            <a href="javascript:click_show('#xiugaimima')" class="changebtn">更換</a>
	    </li>
	    <li>
		   
        	<div class="inforLeft">
            	<h2><?php echo e(trans("lang.xgzfmm")); ?></h2>
            </div>
            <a href="javascript:click_show('#qukuanmima')" class="changebtn">更換</a>
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
			 alert('两次密码输入不一致');
			 return false;
		}
	    $.ajax({
				type:"post",
				url:"<?php echo e(route('wap.reset_login_password')); ?>",
				data : {old_password:$('#xiugaimima #old_password').val(),password:$('#xiugaimima #password').val(),password_confirmation:$('#xiugaimima #password_confirmation').val(),code:$('#xiugaimima #code').val()},
				success : function (data) {
				    alert(data.status.msg);
					if(data.status.errorCode == 0){
                        ///成功
                        $('#xiugaimima #old_password').val('');
                        $('#xiugaimima #password').val('');
                        $('#xiugaimima #password_confirmation').val('');
                        $('#xiugaimima #code').val('');
                        div_close('#xiugaimima')
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
            alert(msg.url+msg.status.msg);
            if (msg.status.errorCode==0) {
                xiugaimima_settime()
            }else{
                // location.href='/m/bindphone';
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
			 alert('两次密码输入不一致');
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
                        $('#qukuanmima #old_password').val('');
                        $('#qukuanmima #password').val('');
                        $('#qukuanmima #password_confirmation').val('');
                        $('#qukuanmima #code').val('');
                        div_close('#qukuanmima')
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
$('.sty2').click(function(){
    if (qukuanmima_countdown != 60) {
      return false;
    }
    var pattern = /^1[0-9]{10}$/;

    $.ajax({
        url:"/m/msgcode",
        success:function(msg){
            alert(msg.url+msg.status.msg);
            if (msg.status.errorCode==0) {
                qukuanmima_settime()
            }else{
                
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
    
        <div class="Hyzx-body">                
            
            <div id="MMainData">
                
                <table class="Hyzx-table mt10 MMain" style="line-height: 1.5;">
                    <thead>
                    <tr>
                        
                        <th style="width:30%">主題</th>
                        <th style="width:50%">内容</th>
                        <th style="width:20%">發送時間</th>
                    </tr>
                    </thead>
                    <tbody id="general-msg">
                       
                            <?php $__currentLoopData = $data_xiaoxi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="MColor1" style="display: table-row;">
                                    <td style="text-align:center;"><?php echo e($item->title); ?></td>
                                    <td style="text-align:center;"><?php echo e($item->content); ?></td>
                                    <td style="text-align:center;"><?php echo e($item->created_at); ?></td>
                                </tr>                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    				
                    </tbody>
                    <tfoot id="msgfoot" style="display:none;">
                    
                    </tfoot>
                </table>
              
            </div>
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

						        <!--<h3 style="color:#fff;line-height: 2;"><?php echo e(config('app.qrcode_url').'/r?i='.$_member->invite_code); ?></h3>-->

							    <h3 style="color:#fff; text-align: center;"><?php echo e(trans('lang.xiangxilianxikefu')); ?></h3>
						</div>
					</li>
			</ul>
		</div>
	</div>
    
</div>
<!--代理中心end-->

<!--充值记录-->
<div class="page" id="chongzhijilv">
    <div class="m_container">

	<div class="nytop" style="position: fixed;top:0;width: 100%; z-index:99;">

		<h2><a href="javascript:open_div('#index')" style="left: .3rem;"><?php echo e(trans("lang.shouye")); ?></a></h2>
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
		<h2><a href="javascript:open_div('#index')" style="left: .3rem;"><?php echo e(trans("lang.shouye")); ?></a></h2>
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
		<h2><a href="javascript:open_div('#index')" style="left: .3rem;"><?php echo e(trans("lang.shouye")); ?></a></h2>
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
		<h2><a href="javascript:open_div('#index')" style="left: .3rem;"><?php echo e(trans("lang.shouye")); ?></a></h2>
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
	<div id="main-container" class="main-container" style="background:#fff;">
	    <?php if($member): ?>
	    <img src="/images/wheel-enter.png" style="position:fixed;left:10px;bottom:80px;width:40px;z-index:99"; id="zhuanpan">
	    <?php else: ?>
	    <img src="/images/wheel-enter.png" style="position:fixed;left:10px;bottom:80px;width:40px;z-index:99"; onclick="click_show('#denglu')">
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
				<div class="logo-title" style="background: url(<?php echo e(getset('site_logo')); ?>) no-repeat;background-size: 100% 100%;"></div>
				<div style="height: 100%;width: 78%;display: flex;align-items: center;justify-content: flex-end;">
				    
					
					
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
					    .img1{ height:70%; margin:0 4%;}
					</style>
					<img src="/images/i_soundoff.png" class="img1 img_bofang" />
					<img src="/images/i_sound.png?v=23"  class="img1 img_guanbi" style="display:none;"/>
					
					<audio id="audio" src="<?php echo e($setting->mp3); ?>" style="width:0; height: 0;"></audio>
					
					<script>
					    var audio = document.getElementById("audio");
                        // audio.play();
					    $(".img_bofang").click(function () {
					        $('.img_bofang').hide();
					        $('.img_guanbi').show();
                           audio.play();
                        })
                        $(".img_guanbi").click(function () {
                             $('.img_guanbi').hide();
					        $('.img_bofang').show();
                           audio.pause();
                        })
					</script>
					<!--<div class="box_background"></div>-->
					
					<div class="box_welcome" style="display: none;"></div>
					<div class="language-box">
						<div class="language-setting">
							<a class="btn-language" style="height: 40px;width:40px;display: block;background:url(<?php echo e(trans('lang.png')); ?>);    background-size: 100% 100%;">
							</a>
							<div class="language-select">
								<!-- <span class="lang-cn"></span> -->
								<span class="lang-tw lang" data-lang="ft"></span>
								<!--<span class="lang-en lang" data-lang="en"></span>-->
								<!--<span class="lang-th"></span>-->
								<!-- <span class="lang-vn"></span> -->
							</div>
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
			            <article><span>主錢包餘額</span><span id="user_money"><?php echo e(@$member->old_money); ?></span></article>
			            <?php $__currentLoopData = $api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                if(@$member){
                                    $mod = $_member->apis()->where('api_id', $item->id)->first();
                                }else{
                                    $mod = [];
                                }
                                
                            ?>
                            <?php if($mod): ?>
        			        <article><span><?php echo e($item->api_title); ?></span><span class="gamecode" data-code="<?php echo e($item->api_name); ?>"><?php echo e($mod->money); ?></span></article>
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
			</style>
			<!--新弹框-->
			<!-- 廣告輪播區 -->
			<div class="home-swiper-wrapper">
				<div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
    				<div class="swiper-wrapper" >
    				    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        					<div class="swiper-slide"  >
        						<a><img src="<?php echo e($item->path); ?>" style="border-radius: 0.5rem;"></a>
        					</div>
    					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    				</div>
    				<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    			</div>
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
								<div class="js-marquee" style="margin-right: 0px; float: left;"><p>
										<?php echo e($system_notices->content); ?></p>
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
					    <div class="moneystyle">
					        <span onclick="click_show('#denglu')"><?php echo e(trans("lang.denglu")); ?></span>/
					        <span onclick="$('#form1')[0].reset();click_show('#zhuce');">註冊</span>
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
						<div class="onlineusers" style="font-size:14px;">
							<div class="onlineusersimg">
							    
								<span class="onlinepeople" style="margin-left:3px;"><?php echo e(@$_member->name); ?></span>
							</div>
						</div>
						<div class="moneystyle">
							<span class="mark-txt" style="margin-left:2px;">$<text id="gamemoney" class="gamemoney_text"><?php echo e(@$_member -> money?$_member -> money:'0.00'); ?></text></span>
							<img src="/images/wenhao.png" onclick="open_div('#alert');aaaa()" style="vertical-align:middle;width:17px;margin-left:2px;margin-top:-3px;">
							<!--<span style="font-size:14px; margin-left:10px;" onclick="open_div('#alert');aaaa()">弹框</span>-->
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
							<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;width: 50px;padding: 0 10px;" class="transfer_text">轉回</h4>
							<h4 style="height: 3vmin;"></h4>
						</div>
						<!-- <div class="tab-right-btn btn-pop" data-pop="memberReport-dialog">
                            <div class="mr-home-Ico" style="margin: -10px auto auto auto;"></div>
                            <h4 class="mr-center-Btn" style="color:#b1987f; font-size: 3vmin; font-weight: 400;"></h4>
                        </div> -->
                        <?php if(!Auth::guard('member')->guest()): ?>
						<div class="tab-right-btn btn-pop" data-pop="recharge-dialog" onclick="click_show('#chongzhi')">
							<div class="deposit-icon"></div>
							<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;"><?php echo e(trans("lang.chongzhi")); ?></h4>
							<h4 style="height: 3vmin;"></h4>
						</div>
						<!--onclick="location.href='/m/drawing'"-->
						 
    						<?php if(!$member['card'] && !$member['trc20'] && !$member['fps'] && !$member['erc20']): ?>
    						<div class="tab-right-btn btn-pop" data-pop="withdraw-dialog"  onclick="click_show('#yinhangkaguanli')">
    							<div class="withdraw-icon"></div>
    							<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;"><?php echo e(trans("lang.tixian")); ?></h4>
    							<h4 style="height: 3vmin;"></h4>
    						</div>
    						<?php else: ?>
    						<div class="tab-right-btn btn-pop" data-pop="withdraw-dialog"  onclick="click_show('#tixian'); $('#tixian #code').val('')
                         $('#tixian #qk_pwd').val('')
                         $('#tixian #money').val('')
                         $('#tixian #bank_card').val('')
                         $('#tixian #name').val('')
						$('#tixian #bank_name').val('');refresh_ml2()">
    							<div class="withdraw-icon"></div>
    							<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;"><?php echo e(trans("lang.tixian")); ?></h4>
    							<h4 style="height: 3vmin;"></h4>
    						</div>
    						<?php endif; ?>
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
			<style>
			    .new_nav{    display: flex;
    flex-wrap: wrap;
    background: #f9f9f9;
    border-radius: 6px;
    box-shadow: 0 0 9px 0px rgba(0,0,0,.3);
    margin: 0px auto 20px auto;
    padding: 0.5rem 0 0.1rem;
    width: 96%;
			        
			    }
			    .new_nav .gameitem{
			        width: 22.5%;
			        margin-left: 2%;
			    }
			    .home-content{ padding:0;}
			    .gamelist-content .gamelist-type{ padding-left:0;}
			    .gamelist-content .gamelist-type.active{ display:flex; flex-wrap: wrap;justify-content: space-between;}
			    .gamelist-content .gamelist-type .game-btn{ width:46%; margin-left:2.5%; margin-bottom:.9rem;}
			    .gamelist-content .gamelist-type .game-btn:nth-child(2n){margin-right:2.5%; margin-left:0;}
			    .gamelist-content .gamelist-type .game-btn > div{ border-radius:10px;}
			    .new_nav .gameitem { display:block !important;} 
			    .gamelist-item .gameitem.active .gameitem-live-img,.gamelist-item .gameitem > div{position: unset!important;
    display: block!important;
    margin: 0 auto .24rem!important;
			         
			    }
                .gamelist-item .gameitem{ height:3.6rem;  border-radius: 1.2rem!important; margin-bottom:0rem;}
                .gamelist-item .gameitem .gameitem-text{    display: block;
    position: unset;
    margin: 0 auto; font-size:.8rem;}
    .gamelist-item .gameitem{ height:4rem; padding-top:.1rem;background: transparent;box-shadow: none; transform: scale(.9);}
    .gamelist-item .gameitem.active, html[language='en'] .gamelist-item .gameitem.active, html[language='vn'] .gamelist-item .gameitem.active, html[language='tw'] .gamelist-item .gameitem.active, html[language='th'] .gamelist-item .gameitem.active{}

    /*.gamelist-content .gamelist-type .gamelist-col{ margin-left:2%;}*/
    /*.gamelist-content .gamelist-type .gamelist-col:nth-child(2n){margin-left:0%;margin-right:2%;}*/
			</style>
			<div class="gamelist-item new_nav" >
					<div class="gameitem live active" gamelistbtn="live">
						<div class="gameitem-live-img"></div>
						<span class="gameitem-text"><?php echo e(trans("lang.shixun")); ?></span>
					</div>
					<div class="gameitem chess" gamelistbtn="chess">
						<div class="gameitem-chess-img"></div>
						<span class="gameitem-text"><?php echo e(trans("lang.qipai")); ?></span>
					</div>
					<div class="gameitem" gamelistbtn="sport">
						<div class="gameitem-sport-img"></div>
						<span class="gameitem-text"><?php echo e(trans('lang.tiyu')); ?></span>
					</div>
					<div class="gameitem" gamelistbtn="esports">
						<div class="gameitem-eSports-img"></div>
						<span class="gameitem-text"><?php echo e(trans('lang.dianjing')); ?></span>
					</div>
					<div class="gameitem slotgame" gamelistbtn="slotgame">
						<div class="gameitem-slotgame-img"></div>
						<span class="gameitem-text"><?php echo e(trans("lang.dianzi")); ?></span>
					</div>
					<div class="gameitem fish" gamelistbtn="fish">
						<div class="gameitem-fish-img"></div>
						<span class="gameitem-text"><?php echo e(trans("lang.buyu")); ?></span>
					</div>
					<div class="gameitem lottery" gamelistbtn="lottery">
							<div class="gameitem-lottery-img"></div>
							<span class="gameitem-text">彩票</span>
						</div>
				</div>
					
			<!-- 主項目 -->
			<div class="home-content">
				<!-- 遊戲清單 -->
				<!-- 自訂 id='gamelist-wrapper'-->
				<div id="gamelist-wrapper" class="gamelist-wrapper">
					
					<div class="gamelist-content">
						<div class="gamelist-type active" gamelisttype="live">
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=WELIVE&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="WELIVE">
								<div class="gameImage-WELiveCasino"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=DG_HK&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="DG_HK">
								<div class="gameImage-DGLiveCasino"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=S2_HK&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="S2_HK">
								<div class="gameImage-SEXYLiveCasino"></div>
							</div>							
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=WC_HK&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="WC_HK">
								<div class="gameImage-WM"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=GB_HK&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="GB_HK">
								<div class="gameImage-bbinLiveCasino"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=P3_HK&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="P3_HK">
								<div class="gameImage-EVOLiveCasino"></div>
							</div>
							
						</div>

						<div class="gamelist-type" gamelisttype="chess">
							
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=LEG&game_type=6&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="LEG">
								<div class="gameImage-LEGChess"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=KY_HK&game_type=6&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="KY_HK">
								<div class="gameImage-KAIYUANChess"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=DTQP&game_type=6&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="DTQP">
								<div class="gameImage-DTQPChess"></div>
							</div>
						</div>

						<div class="gamelist-type" gamelisttype="slotgame">

						    <div class="game-btn gamelist-col electronicgames btn-pages toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JK_HK&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JK_HK">
								<div class="gameImage-JOKERSlotgame"></div>
							</div>
							
							<div class="game-btn gamelist-col electronicgames btn-pages toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=CQ_HK&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="CQ_HK">
								<div class="gameImage-CQ9Slotgame"></div>
							</div>
							
							<div class="game-btn gamelist-col toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=JD_HK&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JD_HK">
								<div class="gameImage-JDBSlotgame"></div>
							</div>
							
							<div class="game-btn gamelist-col electronicgames btn-pages toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=PN_HK&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PN_HK">
								<div class="gameImage-PNGSlotgame"></div>
							</div>
							<div class="game-btn gamelist-col electronicgames btn-pages toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=PG&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PG">
								<div class="gameImage-PGSlotgame"></div>
							</div>
							<div class="game-btn gamelist-col electronicgames btn-pages toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=PR_HK&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PR_HK">
								<div class="gameImage-PPSlotgame"></div>
							</div>
							<!--<div class="game-btn gamelist-col electronicgames btn-pages toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=PR_HK&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PR_HK">-->
							<!--	<div class="gameImage-PPSlotgame"></div>-->
							<!--</div>-->
						</div>

						<div class="gamelist-type" gamelisttype="fish">
						    
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=CQ_HK&game_type=FH&devices=1" <?php else: ?> data-url="" <?php endif; ?> >
								<div class="gameImage-cq9Fish"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=JD_HK&game_type=FH&devices=1" <?php else: ?> data-url="" <?php endif; ?> >
								<div class="gameImage-jdbFish"></div>
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
							</style>
						</div>

						<div class="gamelist-type" gamelisttype="sport">
						
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=ST_HK&game_type=5&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="ST_HK">
								<div class="gameImage-HG"></div>
							</div>	
						    <div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=CM_HK&game_type=5&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="CM_HK">
								<div class="gameImage-CMD"></div>
							</div>
						    
						    <div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=SO_HK&game_type=5&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="SO_HK">
								<div class="gameImage-SBO"></div>
							</div>
							
						</div>

						
						<div class="gamelist-type" gamelisttype="esports">
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=IA_HK&game_type=7&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="IA_HK">
								<div class="gameImage-IA"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=TF_HK&game_type=7&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="TF_HK">
								<div class="gameImage-TFG"></div>
							</div>
							
						</div>	
						
						
						
						<div class="gamelist-type" gamelistType="liveBroadcast">
                            <div class="game-btn gamelist-row" onclick="window.open('https://xvideos.com/')">
								<div class="gameImage-SEXYLiveCasino"></div>
							</div>
                            
                        </div>
					</div>
				</div>
			</div>
			<!-- 底部按鈕 -->
			<div class="home-fix-bottom-box">
				<a  class="fix-bottom-btn active" href="javascript:open_div('#index');">
					<span class="fix-bottom-btn-icon btn-1"></span>
					<strong class="home-fix-bottom-text"><?php echo e(trans("lang.shouye")); ?></strong>
				</a>
				<a  class="fix-bottom-btn btn-pop" href="javascript:click_show('#huodong');">
					<span class="fix-bottom-btn-icon btn-2"></span>
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
				
				<a href="<?php echo e($setting->service_link); ?>" class="fix-bottom-btn btn-service kefu_box" >
					<span class="fix-bottom-btn-icon btn-4"></span>
					<strong class="home-fix-bottom-text"><?php echo e(trans("lang.zxkf")); ?></strong>
					
				</a>
				<?php if(!Auth::guard('member')->guest()): ?>
				<a  class="fix-bottom-btn btn-pages" href="javascript:click_show('#wode');">
					<span class="fix-bottom-btn-icon btn-5"></span>
					<strong class="home-fix-bottom-text "><?php echo e(trans("lang.wode")); ?></strong>
				</a>
				<?php else: ?>
				<a  class="fix-bottom-btn btn-pages" href="javascript:open_div('#denglu');">
					<span class="fix-bottom-btn-icon btn-5"></span>
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
	<!-- 公告 -->
	<?php if($gonggao==0): ?>
    	<div id="bulletin-dialog" class="modal after-close bulletin-dialog" style="display:none;">
    		<div class="modal-dialog" style="border-radius: 10px;overflow: hidden;">
    			<div class="modal-content neka_sound" style="height: 300px;border-radius: 10px;">
    				<div class="modal-title modal-header" style="border-radius: 6px 6px 0 0;">
    					<h1 style="font-size: 17px; color: #fff"><?php echo e(trans('lang.xtgg')); ?></h1>
    				</div>
    				<div class="modal-body" style="overflow: auto;padding: 0 15px;border-radius: 6px 6px 0 0;height: 250px;">
    					<table class="bulletin_table"
    						   style=" border-spacing: 0px 15px; color: #000000; table-layout: fixed; width: 100%;">
    						<tr>
    							<td style="word-break: break-all;">
    							    <pre style="white-space: pre-wrap; word-wrap: break-word;">
    							        <?php echo e($system_notices->content); ?>

    							    </pre>
    							</td>
    						</tr>
    					</table>
    					<!-- 欢迎光临WM娱乐城 -->
    				</div>
    			</div>
    		</div>
    		<a data-pop="bulletin-dialog" class="modal-close btn-close" onclick="$(this).parent().next().hide();$(this).parent().hide();$('.img_bofang').hide();$('.img_guanbi').show();audio.play();"></a>
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
	<script type="text/javascript" src="/new/css/layer.js"></script>
</div>
<script>
    var swiperBanner = new Swiper('.home-swiper-wrapper .swiper-container', {
			autoplay:{
				disableOnInteraction: false,
			},
			loop:true,
		});
    $('body').on('click','.lang',function(){
    	layer.open({type: 2});
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
						  if(_this.data('code')=='KY_HK'){
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
        $('.gamemoney_text').text('加载中...');
        $('#user_money').text('加载中...');
        var len = $('.gamecode').length;
        $.ajax({
		    url:'/m/membermoney?type=1',
		    success:function(res){
		        $('#user_money').text(res.old_money);
		        if(len==0){
		            $('.gamemoney_text').text(res.old_money);
		        }
		        
		    }
		})
		$('.gamecode').click();
		setTimeout(function(){
		    $.ajax({
                                url:'/m/membermoney',
                                success:function(res){
                                    $('.gamemoney_text').text(res.money)
                                    $('.old_money').text(res.old_money)
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
// 						  if(_this.data('code')=='KY_HK'){
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
    
    $('#transfer3,#transfer,#transfer2').click(function(){
	    var that = $(this);
	    $('.transfer_text').text('<?php echo e(trans("lang.hsz")); ?>...');
	    $('.transfer_text').val('<?php echo e(trans("lang.hsz")); ?>...');
	    var len = $('.gamecode').length;
	    var api_money = $('#api_money').text();
	    var gamemoney_text = $('.gamemoney_text').text();
	    $('.gamecode').each(function(k,v){
	        var _this=$(this);
            var money=_this.text();
            _this.html('回收中');
            $.ajax({
                    url:'/member/one_transfer',
                    type:'post',
                    data:{api_name:_this.data('code'),transfer_type:1},
                    success:function(res){
                        
						if(res.status.errorCode==0){
						    _this.html('0.00');
						  //  gamemoney_text -= Number(money);
        //                     $('#api_money').text(api_money.toFixed(2));
						    $.ajax({
                                url:'/m/membermoney',
                                success:function(res){
                                    $('.gamemoney_text').text(res.money)
                                    $('.old_money').text(res.old_money)
                                }
                            })
						}else if(res.status.errorCode==1){
						    _this.text(money);
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
		    $('.transfer_text').text('資金回收');
	        $('.transfer_text').val('資金回收');
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
	
	
    $('.toplay').click(function(){
            var url = $(this).data('url');
            var code = $(this).data('code');
            
            $('#login_url').attr('data-url',url);
            $('#rightEnter').attr('data-code',code);
            $('#plat_type').text(code);
            if(!url){
                alert('<?php echo e(trans("lang.qxdryx")); ?>！',1);
            }else{
                if(code=='OB'){
                    layer.open({
                        content: '<font color="#000">遊戲維護中 請儘快等遊戲結算後將資金回收</font>'
                        ,btn: '我知道了'
                    });
                    return;
                }
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
                audio.pause();
                window.open(url);

                // $.ajax({
                //     url:'/m/membermoney',
                //     success:function(res){
                //         $('#lesNum').text(res.money)
                //         $('.member_money').text(res.money)
                        
                //     }
                // })
                // $('#moneyInp').val('');
                // $('#cover,.noticeAltbox').fadeIn();
            }
    })
    
    document.addEventListener('visibilitychange', function () { 
        // 用户息屏、或者切到后台运行 （离开页面） 
        if (document.visibilityState === 'hidden') {
            $('.img_guanbi').hide();
			$('.img_bofang').show();
            audio.pause();
        } 
        // 用户打开或回到页面 
        if (document.visibilityState === 'visible') {
            $('.img_bofang').hide();
			$('.img_guanbi').show();
            audio.play();
        } 
    })
    function refresh_ml2(){
        $('#ml_money').text('加载中...');
        $.ajax({
            url:'/m/refresh_ml2',
            success:function(res){
                if(res.status.errorCode==0){
                    $('#ml_money').text(res.data.ml_money);
                }else{
                    alert(res.status.msg)
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
    
</script>
<!-- Start of LiveChat (www.livechat.com) code -->
<?php echo $_system_config->kefu_html; ?>

<!-- End of LiveChat code -->
</body>
</html>
<script>
    aaaa();
</script>
<?php echo $__env->make('wap.template.theme10.layouts.fotter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>