<!DOCTYPE html>
<html class="ui-page-login">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>{{ $_system_config->site_title or '标题' }}</title>
    <link href="{{ asset('/wap/theme6/fonts/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme6/css/mui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme6/css/muistyle.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme6/css/style.css') }}" rel="stylesheet" />
</head>
<body>
<header id="header" class="mui-bar mui-bar-nav">
    <h1 class="mui-title"></h1>
    <button class="mui-btn mui-btn-blue mui-btn-link mui-pull-right" id="kefu" url="{{ $_system_config->service_link }}">客服</button>
    <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
        <span class="mui-icon mui-icon-left-nav"></span>返回
    </button>
</header>
<div class="mui-content">
    <form id='login-form' class="mui-input-group" action="{{ route('wap.login.post') }}" method="post">
        <div class="mui-input-row" id="longUserName">
            <label>账号</label>
            <input type="text" name="name" class="mui-input-clear mui-input" id="loginUsername" placeholder="您的会员账号" maxlength="16">
        </div>
        {{--<div class="mui-input-row sendcodes">
            <label>手机号码</label>
            <input type="number" class="mui-input-clear mui-input" id="loginUserPhone" placeholder="请输入手机号码" maxlength="11">
        </div>
        <div class="mui-input-row sendcodes">
            <label>手机验证码</label>
            <input type="number" class="mui-input-clear mui-input" id="loginUserPhoneCode" placeholder="请输入手机验证码" maxlength="9">
            <span class="reg-code" onclick="sendBtn($('#loginUserPhone'),this,1)" id="sendCode" state="1">发送验证码</span>
        </div>--}}
        <div class="mui-input-row" id="longUserPwd">
            <label>密码</label>
            <input id='loginUserpwd' name="password" type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
        </div>
        {{--<div class="mui-input-row login-yzm">
            <label>验证码</label>
            <input id="loginUsercode" placeholder="您的验证码" type="number" class="mui-input-clear mui-input" onfocus="$('#loginpin').click()">
            <img src="/api/Vaildatacode" id="loginpin" onclick="changeCode(this)" />
        </div>--}}
        <button id='login' style="margin-top: 30px;" class="mui-btn mui-btn-block mui-btn-primary ajax-submit-btn" >登录</button>
    </form>
    <div class="mui-content-padded">

        <div class="link-area">
            <a id='regs' url="{{ route('wap.register') }}">注册账号</a>
            {{--<a href="javascript:;" class="reg-mobile" onclick="loginCode(this);" state="1">手机号登录</a>--}}
        </div>
    </div>
    <div class="mui-content-padded oauth-area">

    </div>
</div>
{{--<input type="hidden" isopensms="@systemseting["isOpenSms"]" id="OpenSMS" />--}}
</body>
<script type="text/javascript" src="{{ asset('/wap/theme6/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/theme6/js/mui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/theme6/js/wapConfig.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/theme6/js/wapMain.js') }}"></script>
<script src="{{ asset('/wap/theme6/js/mobileJS.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/theme6/js/bicommon.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
<script>
    loginFun();
    whetherOpenSMS();
</script>
</html>
