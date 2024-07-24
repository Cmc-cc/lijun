
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $_system_config->site_title or '标题' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <link href="{{ asset('/wap/theme11/css/swiper.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme11/css/style2.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme11/css/index.d1fbaa.css') }}" rel="stylesheet" />
    <style>
        .modal {
            left:30%;
        }
    </style>

</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="position:absolute;width:0;height:0"><defs><symbol viewBox="0 0 72 72" id="success"><title>成功</title><g fill="none" fill-rule="evenodd"><path d="M36 72c19.882 0 36-16.118 36-36S55.882 0 36 0 0 16.118 0 36s16.118 36 36 36zm0-2c18.778 0 34-15.222 34-34S54.778 2 36 2 2 17.222 2 36s15.222 34 34 34z" fill="#FFF"></path><path stroke="#FFF" stroke-width="2" d="M19 34.54l11.545 11.923L52.815 24"></path></g></symbol><symbol viewBox="0 0 72 72" id="fail"><title>失败</title><g fill="none" fill-rule="evenodd"><path d="M36 72c19.882 0 36-16.118 36-36S55.882 0 36 0 0 16.118 0 36s16.118 36 36 36zm0-2c18.778 0 34-15.222 34-34S54.778 2 36 2 2 17.222 2 36s15.222 34 34 34z" fill="#FFF"></path><path d="M22 22l28.304 28.304M22 50.304L50.304 22" stroke="#FFF" stroke-width="2"></path></g></symbol><symbol viewBox="0 0 72 72" id="dislike"><title>哭脸</title><g fill="none" fill-rule="evenodd"><path d="M36 72c19.882 0 36-16.118 36-36S55.882 0 36 0 0 16.118 0 36s16.118 36 36 36zm0-2c18.778 0 34-15.222 34-34S54.778 2 36 2 2 17.222 2 36s15.222 34 34 34z" fill="#FFF"></path><path fill="#FFF" d="M47 22h2v6h-2zM23 22h2v6h-2z"></path><path d="M21 51s4.6-7 15-7 15 7 15 7" stroke="#FFF" stroke-width="2"></path></g></symbol><symbol viewBox="0 -2 59.75 60.25" id="loading"><path fill="#ccc" d="M29.691-.527c-15.648 0-28.333 12.685-28.333 28.333s12.685 28.333 28.333 28.333c15.648 0 28.333-12.685 28.333-28.333S45.339-.527 29.691-.527zm.184 53.75c-14.037 0-25.417-11.379-25.417-25.417S15.838 2.39 29.875 2.39s25.417 11.379 25.417 25.417-11.38 25.416-25.417 25.416z"></path><path fill="none" stroke="#108ee9" stroke-width="3" stroke-linecap="round" stroke-miterlimit="10" d="M56.587 29.766c.369-7.438-1.658-14.699-6.393-19.552"></path></symbol></defs></svg>

<!-- 主页面标题 -->
<div id="app">
    <div data-reactroot="" class="app_container  appddlogin">
        <div></div>
        <div class="container">
            <div class="LoginSet">
                <form action="{{ route('wap.login.post') }}" method="post">
                    <div class="videoText">
                    <div class="Loginlogo">
                        <img src="{{ $_system_config -> site_logo }}" />
                    </div>
                    <div class="am-list-item am-input-item" id="longUserName">
                        <div class="am-input-label am-input-label-5" style="display:list-item;">账号</div>
                        <div class="am-input-control">
                            <input type="text" id="loginUsername" placeholder="请输入账号" value="" maxlength="16"
                                   name="name"
                                   oninput="if(value.length>16)value=value.slice(0,16)" style="float:left;">
                        </div>
                    </div>
                    {{--<div class="am-list-item am-input-item sendcodes" style="display:none;position: relative">
                        <div class="am-input-label am-input-label-5">手机号</div>
                        <div class="am-input-control">
                            <input type="number" id="loginUsername" placeholder="请输入手机号码" maxlength="11" value="">
                        </div>
                    </div>
                    <div class="am-list-item am-input-item sendcodes" style="display:none;position: relative">
                        <div class="am-input-label am-input-label-5">验证码</div>
                        <div class="am-input-control">
                            <input for="" type="number" id="loginUserPhoneCode" placeholder="请输入手机验证码">
                        </div>
                        <span class="reg-code" onclick="sendBtn($('#loginUserPhone'),this,1)" id="sendCode" state="1" style="color:#c5c2c2;font-size:16px;">发送验证码</span>
                    </div>--}}
                    <div class="am-list-item am-input-item" id="longUserPwd">
                        <div class="am-input-label am-input-label-5">密码</div>
                        <div class="am-input-control"><input type="password" id="loginUserpwd" maxlength="16"
                                                             oninput="if(value.length>16)value=value.slice(0,16)"
                                                             name="password"
                                                             value="" placeholder="请输入密码"></div>
                    </div>
                    {{--<div class="code_wrap">
                        <div class="am-list-item am-input-item">
                            <div class="am-input-label am-input-label-5">验证码</div>
                            <div class="am-input-control"><input type="text" id="loginUsercode" onfocus="$('#loginpin').click()" maxlength="4"></div>
                        </div>
                        <div class="text_wrap">
                            <img id="loginpin" onclick="changeCode(loginpin)" src="/api/Vaildatacode" />
                        </div>
                    </div>
                    <div class="am-whitespace am-whitespace-md"></div>
                    <div class="reg-mobile am-flexbox am-flexbox-align-middle">
                        <div class="am-flexbox-item" style="flex: 0.6 1 0%;"></div>

                        <div class="am-flexbox-item" style="flex: 0.03 1 0%;">|</div>
                        <div class="am-flexbox-item" style="flex: 0.25 1 0%;" onclick="loginCode(this);" state="1">
                            手机号登录
                        </div>
                        <div class="am-flexbox-item" style="flex: 0.25 1 0%;"></div>

                    </div>--}}

                        <div class="loginButtonA">
                            <a role="button" href="javascript:void(0);" class="am-button am-button-primary ajax-submit-btn"
                               ><span>立即登录</span></a>
                        </div>
                    <div class="loginButtonB">
                        <a role="button" class="am-button am-button-primary" href="{{ route('wap.register') }}"><span>免费开户</span></a>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>
<div class="modal" id="modalWaring" >
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
    loginFun();
    whetherOpenSMS();
</script>
</html>
