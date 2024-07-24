<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link href="{{ asset('/wap/theme5/css/style2.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme5/css/messenger.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme5/css/messenger-theme-flat.css') }}">
    <title>{{ $_system_config->site_title or '标题' }}</title>
</head>
<body>
<div class="header">
    <div class="fr hd-icon" style="margin-top: 13px;">
        <a href="{{ $_system_config->service_link }}">
            <i><img src="{{ asset('/wap/theme5/images/icon_contact.png') }}" width="20" height="19" /></i> 客服
        </a>
    </div>
    <h1>
        <a href="{{ route('wap.index') }}">
            <img src="{{ $_system_config->m_site_logo }}" onClick="javascript:;" height="34" />
        </a>
    </h1>
</div>
<form id="loginForm"  action="{{ route('wap.login.post') }}" method="post">
<div class="login-wrap clearboth">
    <ul class="mod-forms-2 clearboth">
        <li id="longUserName">
            <label>用户名</label>
            <div class="form-ipt">
                <input type="text" name="name" id="loginUsername" placeholder="您的会员账号" maxlength="16"/>
            </div>
        </li>
        <li id="longUserPwd">
            <label>密码</label>
            <div class="form-ipt">
                <input type="password" name="password" id="loginUserpwd" placeholder="您的密码" maxlength="16"/>
            </div>
        </li>
        {{--<li>
            <label>验证码</label>
            <div class="form-ipt">
                <input type="number" id="loginUsercode" placeholder="您的验证码" class="login-yzm" onfocus="$('#loginpin').click()"/>
                <img src="/api/Vaildatacode" id="loginpin" onclick="changeCode(this)"/>
            </div>
        </li>--}}
    </ul>
    <a href="javascript:void(0);" class="log-btn log-sub mt10 ajax-submit-btn">登 录</a>
    <div class="mt10 clearboth"><a style="width: 100%" class="log-btn reg-btn fr" href="{{ route('wap.register') }}">注册</a><!--<a class="log-btn forget-psw-btn" href="forget.html">忘记密码</a>--></div>
{{--    <p class="reg-mobile" onclick="loginCode(this);" state="1">手机号登录</p>--}}
    <div style="text-align: center; padding-top: 15px; width:100%;margin-top: 65px;">请用谷歌浏览器访问手机端，获得更好体验</div>
</div>
</form>
</body>
<script type="text/javascript" src="{{ asset('/wap/theme4/js/jquery-1.11.3.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/wap/theme4/js/messenger.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/wap/theme4/js/wapMain.js') }}" ></script>
<script src="{{ asset('/wap/theme4/js/mobileJS.js') }}"></script>
<script src="{{ asset('/wap/theme4/js/bicommon.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
<script>
    loginFun();
    whetherOpenSMS();
</script>
</html>
