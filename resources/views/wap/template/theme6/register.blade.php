<!DOCTYPE html>
<html class="ui-page-login">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>{{ $_system_config->site_title or '标题' }}</title>
    <link href="{{ asset('wap/theme6/fonts/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('wap/theme6/css/mui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('wap/theme6/css/muistyle.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme6/css/style.css') }}" rel="stylesheet" />
    <style>
        .cRed{
            color: red;
        }
    </style>
</head>
<body>
<header id="header" class="mui-bar mui-bar-nav">
    <h1 class="mui-title">注册  </h1>
    <button class="mui-btn mui-btn-blue mui-btn-link mui-pull-right" id="kefu" url="{{ $_system_config->service_link }}">客服</button>
    <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
        <span class="mui-icon mui-icon-left-nav"></span>返回
    </button>
</header>
<div class="mui-content" style="display: block;">
    <form class="mui-input-group" style="padding-bottom: 30px;" action="{{ route('wap.register.post') }}" method="post">
        @if($_system_config->is_regtj_1 == 1)
        <div class="mui-input-row" id="Introducer">
            <label>@if($_system_config->is_regtj_2 == 1)<em class="cRed">*</em>@endif介绍人</label>
            <input maxlength="14" id="regIntroducer" type="text" class="mui-input-clear mui-input" placeholder="请输入介绍人" warning="请输入介绍人" name="t_name">
        </div>
        @endif
        <div class="mui-input-row">
            <label><em class="cRed">*</em>账号</label>
            <input maxlength="14" id="regUsername" type="text" class="mui-input-clear mui-input" placeholder="6-14个字符长字母或数字组成" warning="请输入用户名" name="name">
        </div>
        <div class="mui-input-row">
            <label><em class="cRed">*</em>密码</label>
            <input id="regUserpwd" maxlength="12" type="password" class="mui-input-clear mui-input" placeholder="6-12个字符长度字母或数字组成" warning="请输入密码" name="password">
        </div>
        <div class="mui-input-row">
            <label><em class="cRed">*</em>确认密码</label>
            <input id="regUserSurepwd" maxlength="12" type="password" class="mui-input-clear mui-input" placeholder="重新输入密码" warning="请输入确认密码" name="password_confirmation">
        </div>
            @if($_system_config->is_real_name_1 == 1)
        <div class="mui-input-row">
            <label>@if($_system_config->is_real_name_2 == 1)<em class="cRed">*</em>@endif 真实姓名</label>
            <input id="regUserTrueName" maxlength="24" type="text" class="mui-input-clear mui-input" placeholder="请输入真实姓名" warning="请输入真实姓名" name="real_name">
        </div>
            @endif
            @if($_system_config->is_phone_1 == 1)
        <div class="mui-input-row" id="UserPhone">
            <label>@if($_system_config->is_phone_2 == 1)<em class="cRed">*</em>@endif 手机号码</label>
            <input type="number" name="phone" maxlength="11" class="mui-input-clear mui-input" placeholder="请输入手机号码" warning="请输入手机号码" />
        </div>
            @endif
            @if($_system_config->is_qq_1 == 1)
                <div class="mui-input-row">
                    <label>@if($_system_config->is_qq_2 == 1)<em class="cRed">*</em>@endif QQ</label>
                    <input type="number" name="qq"  maxlength="11" class="mui-input-clear mui-input" placeholder="请输入QQ" warning="请输入QQ" />
                </div>
            @endif
            @if($_system_config->is_email_1 == 1)
        <div class="mui-input-row" id="Mailbox">
            <label>@if($_system_config->is_email_2 == 1)<em class="cRed">*</em>@endif 邮箱</label>
            <input type="text"  maxlength="20" class="mui-input-clear mui-input" placeholder="请输入邮箱" warning="请输入邮箱" name="email" />
        </div>
            @endif
            @if($_system_config->is_weixin_1 == 1)
                <div class="mui-input-row" id="Mailbox">
                    <label>@if($_system_config->is_weixin_2 == 1)<em class="cRed">*</em>@endif 微信</label>
                    <input type="text" name="weixin" id="" maxlength="20" class="mui-input-clear mui-input" placeholder="请输入微信" warning="请输入微信" />
                </div>
            @endif
        <div class="mui-input-row">
            <label><em class="cRed">*</em> 取款密码</label>
            <input type="password" name="qk_pwd" id="regUserWithdrawalsPwd" maxlength="6" class="mui-input-clear mui-inputt" placeholder="请输入提款密码(6位纯数字)" warning="请输入提款密码" />
        </div>

        <div class="mui-input-row login-yzm">
            <label>验证码</label>
            <input type="text" id="regUserCaptcha" maxlength="5" class="txt-ipt vcode-ipt" placeholder="请输入验证码" onfocus="$('#regpin').click();" name="captcha" warning="请输入验证码" />
            <img id="regpin" onclick="re_captcha()" src="{{ URL('kit/captcha/1') }}" width="80">
        </div>

    <div class="mui-content-padded">
        <button id='reg' class="mui-btn mui-btn-block mui-btn-primary ajax-submit-btn">注册</button>
    </div>
    </form>
</div>

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
    //whetherOpenSMS();
    function re_captcha() {
        $url = "{{ URL('kit/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('regpin').src=$url;
    }
    $("#regpin").click();
    reg();
</script>
</html>
