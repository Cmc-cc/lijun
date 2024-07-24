<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $_system_config->site_title or '标题' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Keywords" content="">

    <link href="{{ asset('/wap/theme11/css/messger.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme11/css/style2.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme11/css/index.d1fbaa.css') }}" rel="stylesheet" />
    <style>
        .modal {
            left: 25%;
            top: 20%;
        }
        .rootContainer .input .cRed {
            color: red;
        }
    </style>

</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="position:absolute;width:0;height:0"><defs><symbol viewBox="0 0 72 72" id="success"><title>成功</title><g fill="none" fill-rule="evenodd"><path d="M36 72c19.882 0 36-16.118 36-36S55.882 0 36 0 0 16.118 0 36s16.118 36 36 36zm0-2c18.778 0 34-15.222 34-34S54.778 2 36 2 2 17.222 2 36s15.222 34 34 34z" fill="#FFF"></path><path stroke="#FFF" stroke-width="2" d="M19 34.54l11.545 11.923L52.815 24"></path></g></symbol><symbol viewBox="0 0 72 72" id="fail"><title>失败</title><g fill="none" fill-rule="evenodd"><path d="M36 72c19.882 0 36-16.118 36-36S55.882 0 36 0 0 16.118 0 36s16.118 36 36 36zm0-2c18.778 0 34-15.222 34-34S54.778 2 36 2 2 17.222 2 36s15.222 34 34 34z" fill="#FFF"></path><path d="M22 22l28.304 28.304M22 50.304L50.304 22" stroke="#FFF" stroke-width="2"></path></g></symbol><symbol viewBox="0 0 72 72" id="dislike"><title>哭脸</title><g fill="none" fill-rule="evenodd"><path d="M36 72c19.882 0 36-16.118 36-36S55.882 0 36 0 0 16.118 0 36s16.118 36 36 36zm0-2c18.778 0 34-15.222 34-34S54.778 2 36 2 2 17.222 2 36s15.222 34 34 34z" fill="#FFF"></path><path fill="#FFF" d="M47 22h2v6h-2zM23 22h2v6h-2z"></path><path d="M21 51s4.6-7 15-7 15 7 15 7" stroke="#FFF" stroke-width="2"></path></g></symbol><symbol viewBox="0 -2 59.75 60.25" id="loading"><path fill="#ccc" d="M29.691-.527c-15.648 0-28.333 12.685-28.333 28.333s12.685 28.333 28.333 28.333c15.648 0 28.333-12.685 28.333-28.333S45.339-.527 29.691-.527zm.184 53.75c-14.037 0-25.417-11.379-25.417-25.417S15.838 2.39 29.875 2.39s25.417 11.379 25.417 25.417-11.38 25.416-25.417 25.416z"></path><path fill="none" stroke="#108ee9" stroke-width="3" stroke-linecap="round" stroke-miterlimit="10" d="M56.587 29.766c.369-7.438-1.658-14.699-6.393-19.552"></path></symbol></defs></svg>

<div id="app">
    <div data-reactroot="" class="app_container remove appddregistered">
        <div class="am-navbar am-navbar-dark">

            <div class="am-navbar-left" role="button" onclick="window.history.back();">
                    <span class="am-navbar-left-icon" aria-hidden="true">
                        <svg class="am-icon am-icon-left am-icon-md">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left"></use>
                        </svg>
                    </span>
                <span class="am-navbar-left-content">返回</span>
            </div>
            <div class="am-navbar-title">免费开户</div>
            <div class="am-navbar-right"></div>
        </div>
        <div class="container">
            <div style="flex: 1 1 0%;">
                <form action="{{ route('wap.register.post') }}" method="post">
                 <div class="rootContainer">
                     @if($_system_config->is_regtj_1 == 1)
                    <div class="am-list-item am-input-item input" id="Introducer">
                        <div class="am-input-label am-input-label-5">@if($_system_config->is_regtj_2 == 1)<em class="cRed">*</em>@endif介绍人：</div>
                        <div class="am-input-control"><input name="t_name" type="text" maxlength="8" id="regIntroducer" placeholder="请输入介绍人账号"></div>
                    </div>
                     @endif
                    <div class="am-list-item am-input-item input">
                        <div class="am-input-label am-input-label-5"><em class="cRed">*</em>用户名称：</div>
                        <div class="am-input-control"><input name="name" type="text" maxlength="9" id="regUsername" placeholder="请输入用户名"></div>
                    </div>
                    <div class="am-list-item am-input-item input">
                        <div class="am-input-label am-input-label-5"><em class="cRed">*</em>用户密码：</div>
                        <div class="am-input-control"><input name="password" type="password" maxlength="12" id="regUserpwd" placeholder="6-12个字符长度字母或数字组成"></div>
                    </div>
                    <div class="am-list-item am-input-item input">
                        <div class="am-input-label am-input-label-5"><em class="cRed">*</em>确认密码：</div>
                        <div class="am-input-control"><input name="password_confirmation" type="password" id="regUserSurepwd" maxlength="12" placeholder="6-12个字符长度字母或数字组成   "></div>
                    </div>
                         @if($_system_config->is_real_name_1 == 1)
                    <div class="am-list-item am-input-item input">
                        <div class="am-input-label am-input-label-5">@if($_system_config->is_real_name_2 == 1)<em class="cRed">*</em>@endif真实姓名：</div>
                        <div class="am-input-control"><input name="real_name" type="text" id="regUserTrueName" maxlength="24" placeholder="输入您的真实姓名"></div>
                    </div>
                         @endif
                         @if($_system_config->is_phone_1 == 1)
                    <div class="am-list-item am-input-item input" id="UserPhone">
                        <div class="am-input-label am-input-label-5">@if($_system_config->is_phone_2 == 1)<em class="cRed">*</em>@endif手机号码：</div>
                        <div class="am-input-control"><input name="phone" type="number" id="regUserPhone" maxlength="11" placeholder="输入您的真实有效的手机号码"></div>
                    </div>
                         @endif
                         @if($_system_config->is_qq_1 == 1)
                     <div class="am-list-item am-input-item input">
                         <div class="am-input-label am-input-label-5">@if($_system_config->is_qq_2 == 1)<em class="cRed">*</em>@endif QQ：</div>
                         <div class="am-input-control"><input name="qq" type="password" maxlength="6" placeholder="请输入您的QQ"></div>
                     </div>
                         @endif
                         @if($_system_config->is_email_1 == 1)
                     <div class="am-list-item am-input-item input">
                         <div class="am-input-label am-input-label-5">@if($_system_config->is_email_2 == 1)<em class="cRed">*</em>@endif邮箱：</div>
                         <div class="am-input-control"><input name="email" type="text" maxlength="20" placeholder="请输入您的邮箱"></div>
                     </div>
                         @endif
                         @if($_system_config->is_weixin_1 == 1)
                     <div class="am-list-item am-input-item input">
                         <div class="am-input-label am-input-label-5">@if($_system_config->is_weixin_2 == 1)<em class="cRed">*</em>@endif微信：</div>
                         <div class="am-input-control"><input name="weixin" type="text" maxlength="20" placeholder="请输入您的微信"></div>
                     </div>
                         @endif
                    <div class="am-list-item am-input-item input">
                        <div class="am-input-label am-input-label-5"><em class="cRed">*</em>取款密码：</div>
                        <div class="am-input-control"><input name="qk_pwd" type="password" id="regUserWithdrawalsPwd" maxlength="6" placeholder="请输入取款密码"></div>
                    </div>

                    <div class="code_wrap">
                        <div class="am-list-item am-input-item">
                            <div class="am-input-label am-input-label-5">验证码：</div>
                            <div class="am-input-control"><input name="captcha" type="text" id="regUserCaptcha" onfocus="$('#regpin').click()" maxlength="4"></div>
                        </div>
                        <div class="text_wrap">
                            <img id="regpin" onclick="re_captcha()" src="{{ URL('kit/captcha/1') }}" />
                        </div>
                    </div>
                    <div class="touchableStyles">
                        <p class="submitButton ajax-submit-btn">注册</p>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div>
            <div class="app_bottom">
                <div class="am-tab-bar am-tab-bar-bottom">
                    <div class="am-tab-bar-content am-tab-bar-content-no-animated">
                        <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive"></div>
                        <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive">正在加载</div>
                        <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive">正在加载</div>
                        <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive">正在加载</div>
                        <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive"></div>
                    </div>
                    <div role="tablist" class="am-tab-bar-bar am-tab-bar-bar-hidden" tabindex="0" style="background-color: rgb(1, 54, 37);">
                        <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                            <div>
                                <div class="am-tab-bar-tab-icon" style="color: white;"><i class="icon iconfont icon-home Navset"></i></div>
                                <p class="am-tab-bar-tab-title" style="color: white;">首页</p>
                            </div>
                        </div>
                        <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                            <div>
                                <div class="am-tab-bar-tab-icon" style="color: white;"><i class="icon iconfont icon-wallet Navset"></i></div>
                                <p class="am-tab-bar-tab-title" style="color: white;">充值</p>
                            </div>
                        </div>
                        <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                            <div>
                                <div class="am-tab-bar-tab-icon" style="color: white;"><i class="icon iconfont icon-CS Navset"></i></div>
                                <p class="am-tab-bar-tab-title" style="color: white;">客服</p>
                            </div>
                        </div>
                        <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                            <div>
                                <div class="am-tab-bar-tab-icon" style="color: white;"><i class="icon iconfont icon-Promotion Navset"></i></div>
                                <p class="am-tab-bar-tab-title" style="color: white;">优惠</p>
                            </div>
                        </div>
                        <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                            <div>
                                <div class="am-tab-bar-tab-icon" style="color: white;"><i class="icon iconfont icon-personal Navset"></i></div>
                                <p class="am-tab-bar-tab-title" style="color: white;">登录</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modalWaring">
        <span>
            <div class="am-toast-notice">
                <div class="am-toast-notice-content">
                    <div class="am-toast-text am-toast-text-icon" role="alert" aria-live="assertive">

                        <div class="am-toast-text-info" id="messageWaring"></div>
                    </div>
                </div>
            </div>
        </span>
</div>
</body>
<script type="text/javascript" src="{{ asset('/wap/theme11/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/theme11/js/messenger.min.js') }}"></script>
<script src="{{ asset('/wap/theme11/js/CUnits.js') }}"></script>
<script src="{{ asset('/wap/theme11/js/swiper.min.js') }}"></script>
<script src="{{ asset('/wap/theme3/js/mobileJS.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/theme11/js/wapConfig.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/theme11/js/bicommon.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/theme11/js/wapMain.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
<script>
    function re_captcha() {
        $url = "{{ URL('kit/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('regpin').src=$url;
    }
    //whetherOpenSMS();
    $(function () {
        //whetherOpenSMS();
        //if ("@systemseting["isAgentid"]"== "True") { $("#Introducer").show(); }
        //if ("@systemseting["isMailbox"]" == "True") { $("#Mailbox").show(); }
        //if ("@systemseting["isPhone"]" == "True") { $("#UserPhone").show(); }
        //$("#regpin").click();

    })
</script>
</html>