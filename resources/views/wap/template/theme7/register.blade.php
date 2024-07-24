@extends('wap.template.theme7.layouts.main')
@section('content')
    <style>
        .cRed{
            color: red;
        }
    </style>
    <div class="layout-main">
        <div class="member-module member-module-register">
            <div class="module-top">

                <div class="top-container navbar-nav">
                    <div class="left-menu">
                        <a href="javascript:;" onclick="window.history.back();">
                            <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                    </div>
                    <div class="page-title">用户注册</div>
                </div>

            </div>
            <div class="module-main diy-scrollbar">
                <div>
                    <div>
                        <form class="mui-input-group" style="padding-bottom: 30px;" action="{{ route('wap.register.post') }}" method="post">
                        <div class="main-container">
                            <div class="placeholder-fit">
                                @if($_system_config->is_regtj_1 == 1)
                                <div class="form-group" id="Introducer">
                                    <label for="mdl-0_username">@if($_system_config->is_regtj_2 == 1)<em class="cRed">*</em>@endif介绍人</label>
                                    <input maxlength="8" id="regIntroducer" class="form-control" placeholder="请输入介绍人" warning="请输入介绍人" name="t_name">
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="mdl-0_username"><em class="cRed">*</em>用户名</label>
                                    <input maxlength="9" id="regUsername" class="form-control" placeholder="6-14个字符长字母或数字组成" warning="请输入用户名" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="mdl-0_password"><em class="cRed">*</em>密码</label>
                                    <input id="regUserpwd" maxlength="12" type="password" class="form-control" placeholder="6-12个字符长度字母或数字组成" warning="请输入密码" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="mdl-0_repassword"><em class="cRed">*</em>确认密码</label>
                                    <input id="regUserSurepwd" maxlength="12" type="password" class="form-control" placeholder="重新输入密码" warning="请输入确认密码" name="password_confirmation">
                                </div>
                                    @if($_system_config->is_real_name_1 == 1)
                                <div class="form-group">
                                    <label for="mdl-0_realname">@if($_system_config->is_real_name_2 == 1)<em class="cRed">*</em>@endif 真实姓名</label>
                                    <input id="regUserTrueName" maxlength="24" class="form-control" placeholder="请输入真实姓名" warning="请输入真实姓名" name="real_name">
                                </div>
                                    @endif
                                    @if($_system_config->is_phone_1 == 1)
                                <div class="form-group" id="UserPhone">
                                    <label for="mdl-0_qkmm">@if($_system_config->is_phone_2 == 1)<em class="cRed">*</em>@endif手机号码</label>
                                    <input id="regUserPhone" maxlength="11" type="number" class="form-control" placeholder="请输入手机号码" warning="请输入手机号码" name="phone">
                                </div>
                                    @endif
                                    @if($_system_config->is_qq_1 == 1)
                                <div class="form-group" id="QQbox">
                                    <label for="mdl-0_qkmm">@if($_system_config->is_qq_2 == 1)<em class="cRed">*</em>@endif QQ</label>
                                    <input id="regMailbox" maxlength="20" type="text" class="form-control" placeholder="请输入QQ" name="qq">
                                </div>
                                    @endif
                                    @if($_system_config->is_email_1 == 1)
                                <div class="form-group" id="Mailbox" >
                                    <label for="mdl-0_qkmm">@if($_system_config->is_email_2 == 1)<em class="cRed">*</em>@endif邮箱</label>
                                    <input id="regMailbox" maxlength="20" type="text" class="form-control" placeholder="请输入邮箱" warning="请输入邮箱" name="email">
                                </div>
                                    @endif
                                    @if($_system_config->is_weixin_1 == 1)
                                <div class="form-group" id="Mailbox" >
                                    <label for="mdl-0_qkmm">@if($_system_config->is_weixin_2 == 1)<em class="cRed">*</em>@endif 微信</label>
                                    <input id="regMailbox" maxlength="20" type="text" class="form-control" placeholder="请输入微信" warning="请输入微信" name="weixin">
                                </div>
                                    @endif
                                <div class="form-group">
                                    <label for="mdl-0_answer"><em class="cRed">*</em>取款密码</label>
                                    <input id="regUserWithdrawalsPwd" maxlength="6" type="password" class="form-control" placeholder="请输入6位数字纯数字" warning="请输入提款密码" name="qk_pwd">
                                </div>
                                <div class="form-group">
                                    <label for="mdl-0_answer">验证码</label>
                                    <input id="regUserCaptcha" maxlength="5" type="number" class="form-control yzm" placeholder="请输入验证码" onfocus="$('#regpin').click();" warning="请输入验证码" name="captcha">
                                    <img id="regpin" onclick="re_captcha()" src="{{ URL('kit/captcha/1') }}" width="80">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary form-control submit-btn ajax-submit-btn">注册</button>
                                </div>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //whetherOpenSMS();
        function re_captcha() {
            $url = "{{ URL('kit/captcha') }}";
            $url = $url + "/" + Math.random();
            document.getElementById('regpin').src=$url;
        }
        $("#regpin").click();
    </script>
@endsection