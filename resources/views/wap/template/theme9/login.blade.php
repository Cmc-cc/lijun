<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{ $_system_config->site_title or '标题' }}</title>
    <meta name="keywords" content="" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/jquery-ui.theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/font-awesome5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/body.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/custom-modal.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/site.css') }}" />
    <link href="{{ asset('/wap/theme9/css/login.css') }}" rel="stylesheet" />
</head>

<body class="ng-scope">
<div id="account-box" class="login-page">
    <img class="profile" src="{{ asset('wap/theme9/images/profile.png') }}">
    <form class="mod-forms-2 ng-pristine ng-scope ng-invalid ng-invalid-required" action="{{ route('wap.login.post') }}" method="post">
        <div id="longUserName">
            <input name="name" id="loginUsername" maxlength="16" type="text" placeholder="帐号" required="" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required">
        </div>
        <div id="longUserPwd">
            <input name="password" id="loginUserpwd" maxlength="16" type="password" placeholder="密码" required="" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required">
        </div>
        {{--<div class="sendcodes">
            <input type="number" id="loginUserPhone" oninput="if(value.length>11)value=value.slice(0,11)" placeholder="手机号" required="" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" />
        </div>
        <div class="sendcodes">
            <div class="reg-codediv">
                <input type="number" id="loginUserPhoneCode" oninput="if(value.length>4)value=value.slice(0,4)" placeholder="验证码" required="" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" />
                <span class="reg-code" onclick="sendBtn($('#loginUserPhone'),this,1)" id="sendCode" state="1">发送验证码</span>
            </div>
        </div>
        <div id="check-code-wrapper">
            <input checkcode-type="Login" id="loginUsercode" type="number" oninput="if(value.length>4)value=value.slice(0,4)" checkcode-display="checkCode" placeholder="验证码" required="" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required">
            <img src="/api/Vaildatacode" id="loginpin" onclick="changeCode(this)">
            <div id="get-captcha" checkcode-retriever="checkCode">
                <i class="fa fa-refresh" aria-hidden="true" onclick="$('#loginpin').click()"></i>
            </div>
        </div>--}}

        <button type="button" class="ng-binding ajax-submit-btn" >登入</button>
    </form>
    <ul class="link">
{{--        <li class="reg-mobile" onclick="loginCode(this);" state="1">手机号登录</li>--}}
        <li><a href="{{ route('wap.register') }}" style="color:#30f3ff">免费开户</a></li>
    </ul>
    <p class="copyright">Copyright © {{ $_system_config->site_title or '标题' }} Reserved</p>
    <a href="{{ route('wap.index') }}"><button class="closed" type="button">X</button></a>
</div>
<!--提示框-->
<div id="modalWaring" onclick="sureWaring()" class="modal custom-modal fade ng-scope ng-isolate-scope" role="dialog" index="0" animate="animate" tabindex="-1" uib-modal-animation-class="fade" modal-in-class="in" modal-animation="true" style="z-index: 1050; display: none;">
    <div class="modal-dialog">
        <div class="modal-content" uib-modal-transclude="">
            <div class="cms-modal-header ng-scope">
                <h4 class="cms-modal-title">提示</h4>
            </div>
            <div class="cms-modal-body ng-binding ng-scope" id="messageWaring"></div>
            <div class="cms-modal-footer ng-scope">
                <button class="btn btn-confirm btn-block" onclick="sureWaring()">确定</button>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="{{ asset('wap/theme9/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
<script>
    //loginFun();
    //whetherOpenSMS();
</script>
</html>
