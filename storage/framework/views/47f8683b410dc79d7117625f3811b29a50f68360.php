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
    <script type="text/javascript" src="/new/css/layer.js"></script>
    <link rel="apple-touch-icon" href="https://www.cash669.net/wap/images/iconq.png">

</head> <body ontouchstart="" style="height: 100%;"> <div class="body-pages"
style="height: 100%; overflow: auto; display: block;"> <div
id="registion-dialog" class="registion-dialog" style="display: block;"> <div
class="registion-box"> <div class="registion-title"> <div class="text_181"
style="font-size: 5vmin; font-weight: 600; color: #000;"></div> </div> <div
class="registion-logo"></div> <div class="registion-content"> <form
method="post" action="<?php echo e(route('wap.register.post')); ?>"  onSubmit="return
check_form(this)" id="form1"> <div class="input-box registion-input-box
username" style="display: inline-flex;"> <input name="name" type="text"
id="name" style="outline:none;" required="required" minlength="6"
maxlength="9"
placeholder="<?php echo e(trans('lang.qingshuruzanghao')); ?> *"> </div>
<div class="input-box registion-input-box password" style="display:
inline-flex;"> 
<input name="password" type="password" style="outline:none;" 
id="registpassword" required="required" minlength="6" maxlength="12"
placeholder="<?php echo e(trans('lang.qingshurumima')); ?> *"> </div> <div
class="input-box registion-input-box password2" style="display: inline-flex;">
<input name="password_confirmation" style="outline:none;"  type="password"
id="registpassword2" required="required" minlength="6" maxlength="12"
placeholder="<?php echo e(trans('lang.qingzaicishuru')); ?><?php echo e(trans('lang.mima')); ?> *"> </div>
<div class="input-box registion-input-box truename" style="display:
inline-flex;"> 
<input name="qk_pwd" type="password" style="outline:none;" 
id="registtruename" minlength="6" maxlength="10" required="required" 
placeholder="<?php echo e(trans('lang.qingshuqukuanmima')); ?> *"> </div>
<?php if($setting->sms_message): ?>
 <div class="input-box registion-input-box phone"
style="display: inline-flex;"> 
<input name="phone" type="text" id="phone"
style="outline:none;"  required="required" minlength="8" maxlength="11"
style="width: 60%;"
placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.sjh')); ?>*"> 
<div style="display: flex;justify-content: center;align-items: center;font-size:
14px;width: 50%;">
 <span class="sty2 phoneCodeBtn">獲取驗證碼</span> 
</div>
 </div>
<div class="input-box registion-input-box phoneCode" style=""> 
    <input
name="code" type="text" id="registPhoneCode" style="outline:none;" 
placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.yzm')); ?>*" > </div> <?php else: ?>
<div class="input-box registion-input-box phone" style="display:
inline-flex;"> <input name="phone" type="text" id="phone"
style="outline:none;"  required="required" minlength="8" maxlength="11"
placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.sjh')); ?> *"> </div>
<?php endif; ?> <div class="registion-btn text_2 btn-acc-bind"
onclick="check_form();"></div> <div class="registion-gologin" id="btn-gologin"
onclick="goLogin();">已有帳號</div> </form> </div> </div> </div> </div> 
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
        if (!phone) {alert("手機號為8-11個數字");return false}
        if(phone.length != 8){
            alert("手機號為8-11個數字");
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


    function check_form() {

   var password = $("#registpassword").val();
        var cfmpwd = $("#registpassword2").val();
        var registtruename = $("#registtruename").val();
       var loginName = $("#name").val();
     var phone = $('#phone').val();
         if (!loginName) {
            alert("請輸入帳號!");
            return false;
        }
        
         if (!password) {
            alert("請輸入登錄密碼!");
            return false;
        }
        if (!cfmpwd) {
            alert("請輸入確認登錄密碼!");
            return false;
        }
        if (password　!= cfmpwd) {
            alert("兩次密碼輸入不一致!");
            return false;
        }
      
         if (!phone) {
            alert("請輸入<?php echo e(trans('lang.sjh')); ?>!");
            return false;
        }
        var pattern = /^[0-9]{8,11}$/;
        if (!phone) {alert("手機號為8-11個數字!");return false}
        if(phone.length >11 || phone.length <8){
            alert("手機號為8-11個數字!");
            return false;
        }

        $.ajax({
            url : "<?php echo e(route('wap.register.post')); ?>",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                if(data.status.errorCode == 0){
                    location.href='/';//data.url;
                }else{
                    alert(data.status.msg);
                }
            }
        })
        return false;
    }


    function goLogin() {
        window.location.href = "<?php echo e(route('wap.login')); ?>";
    }
</script>
</body>
</html>