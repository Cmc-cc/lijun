@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/register.css') }}" rel="stylesheet" />
    <div id="Center_StepwiseRegistrationBlock_45094-stepwise-registration" class="stepwise-registration" data-current-step="3" data-uat="registration-block">


        <div id="Center_StepwiseRegistrationBlock_45094-stepwise-registration-steps" class="stepwise-registration__steps" >
            <div class="stepwise-registration__step" data-step="1">
            </div>
            <div class="stepwise-registration__step" data-step="2">
            </div>
            <div class="stepwise-registration__step register" data-step="3">
                <form action="{{ route('wap.register.post') }}" method="post">
                    <div class="stepwise-registration__form">
                    <div class="stepwise-registration__title" data-uat="registration-step-name">账户资料</div>
                        @if($_system_config->is_regtj_1 == 1)
                    <div class="stepwise-registration__item" id="Introducer">
                        <input class="stepwise-registration__field swr-user_name" id="regIntroducer" maxlength="8" type="text" placeholder="@if($_system_config->is_regtj_2 == 1)*@endif介绍人" data-uat="registration-username" autocomplete="off" name="t_name">
                        <div class="stepwise-registration__validation-box isHidden">
                            <span class="stepwise-registration__validation stepwise-registration__validation--label">介绍人需</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">不能空白</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">长度6-16个字符</span>
                            {{--<span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">只能包含数字 (0-9)</span>--}}
                        </div>
                    </div>
                        @endif

                    <div class="stepwise-registration__item">
                        <input class="stepwise-registration__field swr-user_name" maxlength="16" id="regUsername" type="text" placeholder="*用户名" data-uat="registration-username" autocomplete="off" name="name">
                        <div class="stepwise-registration__validation-box isHidden">
                            <span class="stepwise-registration__validation stepwise-registration__validation--label">您的用户名需</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">不能空白</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">长度6-16个字</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">只能包含数字 (0-9) 和英文字母 (a-z, A-Z)</span>
                        </div>
                    </div>
                    <div class="stepwise-registration__item">
                        <input class="stepwise-registration__field swr-password" id="regUserpwd" maxlength="12" type="password" placeholder="*密码" data-uat="registration-password" autocomplete="new-password" name="password">
                        <div class="stepwise-registration__validation-box isHidden">
                            <span class="stepwise-registration__validation stepwise-registration__validation--label">您的密码需：</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">不能空白</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">密码需要输入6-12个字母</span>
                        </div>
                    </div>
                    <div class="stepwise-registration__item">
                        <input class="stepwise-registration__field" id="regUserSurepwd" maxlength="12" type="password" placeholder="*确认密码" name="password_confirmation">
                        <div class="stepwise-registration__validation-box isHidden">
                            <span class="stepwise-registration__validation stepwise-registration__validation--static " data-uat="registration-tooltip-message">请确认您的密码</span>

                        </div>
                    </div>
                        @if($_system_config->is_real_name_1 == 1)
                    <div class="stepwise-registration__item">
                        <input class="stepwise-registration__field" id="regUserTrueName" maxlength="20" type="text" placeholder="@if($_system_config->is_real_name_2 == 1)*@endif真实姓名" name="real_name">
                        <div class="stepwise-registration__validation-box isHidden">
                            <span class="stepwise-registration__validation stepwise-registration__validation--static " data-uat="registration-tooltip-message">不能空白</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static " data-uat="registration-tooltip-message">与提款卡姓名保持一致</span>
                        </div>
                    </div>
                        @endif
                        @if($_system_config->is_phone_1 == 1)
                    <div class="stepwise-registration__item" id="UserPhone">
                        <input class="stepwise-registration__field swr-user_name" maxlength="11" id="regUserPhone" type="number" placeholder="@if($_system_config->is_phone_2 == 1)*@endif手机号码" data-uat="registration-username" autocomplete="off" name="phone">
                        <div class="stepwise-registration__validation-box isHidden">
                            <span class="stepwise-registration__validation stepwise-registration__validation--label">您的手机号码需</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">不能空白</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">提交后不可更改，务必正确填写</span>
                        </div>
                    </div>
                        @endif
                        @if($_system_config->is_qq_1 == 1)
                    <div class="stepwise-registration__item" id="Mailbox">
                        <input class="stepwise-registration__field swr-user_name" id="regMailbox" maxlength="20" type="text" placeholder="@if($_system_config->is_qq_2 == 1)*@endif QQ" data-uat="registration-username" autocomplete="off" name="qq">
                        <div class="stepwise-registration__validation-box isHidden">
                            <span class="stepwise-registration__validation stepwise-registration__validation--label">您的QQ需</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">不能空白</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">qq格式正确</span>
                        </div>
                    </div>
                        @endif
                        @if($_system_config->is_email_1 == 1)
                            <div class="stepwise-registration__item">
                                <input class="stepwise-registration__field swr-user_name" id="regMailbox" maxlength="20" type="text" placeholder="@if($_system_config->is_email_2 == 1)*@endif邮箱" data-uat="registration-username" autocomplete="off">
                                <div class="stepwise-registration__validation-box isHidden">
                                    <span class="stepwise-registration__validation stepwise-registration__validation--label">您的邮箱需</span>
                                    <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">不能空白</span>
                                    <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">邮箱格式正确</span>
                                </div>
                            </div>
                        @endif
                        @if($_system_config->is_weixin_1 == 1)
                            <div class="stepwise-registration__item">
                                <input class="stepwise-registration__field swr-user_name" id="regMailbox" maxlength="20" type="text" placeholder="@if($_system_config->is_weixin_2 == 1)*@endif微信" data-uat="registration-username" autocomplete="off" name="weixin">
                                <div class="stepwise-registration__validation-box isHidden">
                                    <span class="stepwise-registration__validation stepwise-registration__validation--label">您的微信需</span>
                                    <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">不能空白</span>
                                    <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">微信格式正确</span>
                                </div>
                            </div>
                        @endif
                    {{--<div class="stepwise-registration__item " id="sendCodeLi">
                        <div class="user-info__input stepwise-registration__captcha-input" onclick="sendBtn($('#regUserPhone'),this,0)" id="sendCode" state="1">
                            <span>发送验证码</span>
                        </div>
                        <div class="stepwise-registration__col">
                            <div class="user-info__input stepwise-registration__captcha-input">
                                <input id="regUserPhoneCode" maxlength="4" class="stepwise-registration__input-validation" type="text" placeholder="请输入手机验证码">
                                <div class="stepwise-registration__validation-box isHidden">
                                    <span id="please_enter_captcha" class="stepwise-registration__validation " data-uat="registration-tooltip-message">请输入手机验证码</span>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                    <div class="stepwise-registration__item">
                        <input class="stepwise-registration__field swr-user_name" maxlength="6" id="regUserWithdrawalsPwd" type="text" placeholder="*取款密码" data-uat="registration-username" autocomplete="off" name="qk_pwd">
                        <div class="stepwise-registration__validation-box isHidden">
                            <span class="stepwise-registration__validation stepwise-registration__validation--label">您的取款密码需</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">不能空白</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">长度6个</span>
                            <span class="stepwise-registration__validation stepwise-registration__validation--static" data-uat="registration-tooltip-message">只能包含数字 (0-9)</span>
                        </div>
                    </div>


                    <div class="stepwise-registration__item ">
                        <div class="stepwise-registration__col">
                            <div class="stepwise-registration__captcha">
                                <a href="javascript:;" class="stepwise-registration__captcha_refresh" onclick="$('#regpin').click();" id="Center_StepwiseRegistrationBlock_45094-stepwise-registration-captcha-refresh">
                                    <span class="icon i-16 i-o-captcha-refresh"><!-- --></span>
                                </a>
                                <div class="stepwise-registration-c__image">
                                    <img class="captcha stepwise1-registration__captcha_image lazy-image" src="{{ URL('kit/captcha/1') }}" alt="antibot" id="regpin" onclick="re_captcha()">
                                </div>
                            </div>
                        </div>
                        <div class="stepwise-registration__col">
                            <div class="user-info__input stepwise-registration__captcha-input">
                                <input name="captcha" id="regUserCaptcha" maxlength="5" onfocus="$('#regpin').click();" class="stepwise-registration__input-validation" type="text" placeholder="请输入验证码">
                                <div class="stepwise-registration__validation-box isHidden">
                                    <span id="please_enter_captcha" class="stepwise-registration__validation " data-uat="registration-tooltip-message">请输入验证码</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="stepwise-registration__item">
                        <input class="stepwise-registration__button green_btn ajax-submit-btn" type="button" value="创建账户" data-uat="registration-next-button">

                    </div>
                    <div class="stepwise-registration__item login">
                        <input class="stepwise-registration__button green_btn" type="button" onclick="window.location.href='{{ route('wap.login') }}'" value="已有账号，我要登录" data-uat="registration-next-button">
                        <div class="stepwise-registration__ssl"><span class="stepwise-registration__ssl-val">SSL安全注册</span></div>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        function re_captcha() {
            $url = "{{ URL('kit/captcha') }}";
            $url = $url + "/" + Math.random();
            document.getElementById('regpin').src=$url;
        }
        $(function () {

            $("input").focus(function () {
                $(this).parent().find("div").removeClass("isHidden");
            })
            $("input").blur(function () {
                $(this).parent().find("div").addClass("isHidden");
            })
        })
    </script>


@endsection