<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link href="{{ asset('/wap/theme4/css/style2.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme4/css/messenger.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme4/css/messenger-theme-flat.css') }}">
    <title>{{ $_system_config->site_title or '标题' }}</title>
</head>
<body>
<div class="header">
    <div class="fr hd-icon" style="margin-top: 13px;">
        <a href="{{ $_system_config->service_link }}" width="20" height="19" >客服</a>
    </div>
    <h1>
        <a href="{{ route('wap.index') }}">
            <i><img src="{{ asset('/wap/theme4/images/arrow-l.png') }}" width="9" height="16" /></i>
            <img src="{{ $_system_config->m_site_logo }}" height="34" />
        </a>
    </h1>
</div>
<div style="text-align: center; padding-top: 5px; width:100%;">请用谷歌浏览器访问手机端，获得更好体验</div>
<form id="reg_form" action="{{ route('wap.register.post') }}" method="post" name="form1">
{{--    <input type="hidden" name="gender" value="0" />--}}
    <input type="hidden" name="i_code" value="{{ $i_code }}">
    <div class="reg-wrap layout mtb10">
        <ul class="mod-forms">
            @if($_system_config->is_regtj_1 == 1)
            <li id="Introducer">
                <label>@if($_system_config->is_regtj_2 == 1)<em class="cRed">*</em>@endif介绍人</label>
                <div class="form-ipt">
                    <input type="text" maxlength="16" name="t_name" id="regIntroducer" class="txt-ipt" placeholder=" 4-8位个数字组成" warning="请输入介绍人" />
                    <span class="fr tip hide"><img src="/Areas/Wap1/Content/images/main/icon_valid_tip.png" width="22" height="22" /></span>
                </div>
            </li>
            @endif
            <li>
                <label><em class="cRed">*</em> 用户名</label>
                <div class="form-ipt">
                    <input type="text" maxlength="16" id="regUsername" class="txt-ipt" placeholder="6-16个字符长字母或数字组成" warning="请输入用户名" name="name" />
                    <!-- 打钩图片:icon_valid_tip.png   错误图片:icon_error_tip -->
                    <span class="fr tip hide"><img src="/Areas/Wap1/Content/images/main/icon_valid_tip.png" width="22" height="22" /></span>
                </div>
            </li>
            <li>
                <label><em class="cRed">*</em> 密码</label>
                <div class="form-ipt">
                    <input type="password" id="regUserpwd" maxlength="16" class="txt-ipt" placeholder="6-16个字符长度字母或数字组成" warning="请输入密码" name="password" />
                </div>
            </li>
            <li>
                <label><em class="cRed">*</em> 确认密码</label>
                <div class="form-ipt">
                    <input type="password" id="regUserSurepwd" maxlength="16" class="txt-ipt" placeholder="重新输入密码" warning="请输入确认密码" name="password_confirmation" />
                </div>
            </li>
                @if($_system_config->is_real_name_1 == 1)
            <li>
                <label>@if($_system_config->is_real_name_2 == 1)<em class="cRed">*</em>@endif 真实姓名</label>
                <div class="form-ipt">
                    <input type="text" id="regUserTrueName" maxlength="24" class="txt-ipt" placeholder="必须与提款卡姓名一致" warning="请输入真实姓名" name="real_name" />
                </div>
            </li>
                @endif
                @if($_system_config->is_phone_1 == 1)
            <li>
                <label>@if($_system_config->is_phone_2 == 1)<em class="cRed">*</em>@endif 手机号码</label>
                <div class="form-ipt">
                    <input type="number" maxlength="11" class="txt-ipt" placeholder="请输入手机号码" warning="请输入手机号码" name="phone" />
                </div>
            </li>
                @endif
                @if($_system_config->is_qq_1 == 1)
            <li>
                <label>@if($_system_config->is_qq_2 == 1)<em class="cRed">*</em>@endif QQ</label>
                <div class="form-ipt">
                    <input type="number" maxlength="11" class="txt-ipt" placeholder="请输入QQ" warning="请输入QQ" name="qq" />
                </div>
            </li>
                @endif
                @if($_system_config->is_email_1 == 1)
            <li>
                <label>@if($_system_config->is_email_2 == 1)<em class="cRed">*</em>@endif 邮箱</label>
                <div class="form-ipt">
                    <input type="number" maxlength="11" class="txt-ipt" placeholder="请输入邮箱" warning="请输入邮箱" name="email" />
                </div>
            </li>
                @endif
                @if($_system_config->is_weixin_1 == 1)
            <li>
                <label>@if($_system_config->is_weixin_2 == 1)<em class="cRed">*</em>@endif 微信</label>
                <div class="form-ipt">
                    <input type="number" maxlength="11" class="txt-ipt" placeholder="请输入微信" warning="请输入微信" name="weixin" />
                </div>
            </li>
                @endif
            <li>
                <label><em class="cRed">*</em> 取款密码</label>
                <div class="form-ipt">
                    <input type="password" name="qk_pwd" id="regUserWithdrawalsPwd" maxlength="6" class="txt-ipt" placeholder="请输入提款密码(6位纯数字)" warning="提款密码(6位纯数字)" />
                </div>
            </li>
            <li>
                <label><em class="cRed">*</em> 验证码:</label>
                <div class="form-ipt">
                    <input type="text" id="regUserCaptcha" maxlength="5" class="txt-ipt vcode-ipt" placeholder="请输入验证码" onfocus="$('#regpin').click();" name="captcha" warning="请输入验证码" />
                    <img id="regpin" onclick="re_captcha()" src="{{ URL('kit/captcha/1') }}" width="80">
                    <!--<a style="text-decoration: underline;" href="javascript:void(0);" onclick="get_captcha();">刷新</a>-->
                </div>
            </li>
        </ul>
        <a href="javascript:void(0);" class="confirm-sub mt10 ajax-submit-btn">注 册</a>
        <a href="{{ route('wap.login') }}" class="confirm-sub mt10">已有账号，我要登录</a>
    </div>
    <input type="hidden" name="iagree" value="1">
</form>

<div class="reveal-modal-bg" style="cursor: pointer; display:none;"></div>
<input type="hidden" isopensms="False" id="OpenSMS" />
</body>
<script type="text/javascript" src="{{ asset('/wap/theme4/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/theme4/js/messenger.min.js') }}"></script>
<script src="{{ asset('/wap/theme4/js/bicommon.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/theme4/js/wapMain.js') }}"></script>
<script src="{{ asset('/wap/theme4/js/mobileJS.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
<script>
    function re_captcha() {
        $url = "{{ URL('kit/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('regpin').src=$url;
    }
    $(function () {

        /*whetherOpenSMS();
        if ("False"== "True") { $("#Introducer").show(); }
        if ("False" == "True") { $("#Mailbox").show(); }
        if ("False" == "True") { $("#UserPhone").show(); }*/
        $("#regpin").click();
    })
</script>
</html>


