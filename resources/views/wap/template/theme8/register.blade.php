<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- 宽度设置为设备实际宽度，初始化倍数为1，最小倍数为1，最大倍数为1，用户缩放为否 -->
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">
    <!-- 删除默认的苹果工具栏和菜单栏 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- 苹果手机顶部为黑色 -->
    <meta name="apple-mobile-web-status-bar-style" content="black">
    <!-- 屏蔽浏览器自动识别数字为电话号码 -->
    <meta name="fromat-detecition" content="telephone=no">
    <!--禁止百度转码-->
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <!-- 优先使用 IE 最新版本和 Chrome -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/mui.picker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/mui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/mui.previewimage.css') }}">
    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/imageview.css') }}">
    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/mui.imageviewer.css') }}">

    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/otherpage.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/public-mod.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/style2.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/hongbao.css') }}" />

    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/loading.css') }}" />

    <link rel="stylesheet" href="{{ asset('/wap/theme8/css/common.css') }}" />
    <script type="text/javascript" src="{{ asset('/wap/theme8/js/message_zh_cn.js') }}"></script>

    <script src="{{ asset('/wap/theme8/js/mui.min.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/jquery-eventlock-1.0.0.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/jquery.validate.extend.mobile.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/appnative.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/Common.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/comet.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/popup.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/CUnits.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/common2.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/swiper.min.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/mui.dtpicker.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/mui.picker.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/mui.poppicker.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/SignUp.js') }}"></script>


    <script src="{{ asset('/wap/theme8/js/wapConfig.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/bicommon.js') }}"></script>
    <script src="{{ asset('/wap/theme3/js/mobileJS.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/wapMain.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
    <title></title>
</head>
<body class="mui-ios mui-ios-11 mui-ios-11-0">
<!-- 主页面标题 -->
<header class="mui-bar mui-bar-nav mui-bar-blue">
    <a style="color: #fff; font-size:17px;padding-top:15px;" class="mui-icon mui-icon-arrowleft mui-pull-left" data-rel="{'target':'{{ route('wap.index') }}','opType':'href'}">返回</a>
    <h1 class="mui-title">注册</h1>
</header>

<div class="mui-content mui-scroll-wrapper mui-content-without-footer-address login-content" data-scroll="11">
    <div class="mui-scroll" style="transform: translate3d(0px, 0px, 0px) translateZ(0px);">
        <!-- 主界面具体展示内容 -->
        <section class="type-content">
            <div id="register_content" class="mui-control-content mui-active register-part">
                <!--注册部分的内容-->
                <form class="mui-input-group" id="regForm" novalidate="novalidate" action="{{ route('wap.register.post') }}" method="post">
                    @if($_system_config->is_regtj_1 == 1)
                    <div class="mui-input-row input_item" id="Introducer">
                        <label>@if($_system_config->is_regtj_2 == 1)<i class="strong_icon"></i>@endif介绍人</label>
                        <input name="t_name" type="text" maxlength="8" id="regIntroducer" class="mui-input-clear" placeholder="请输入介绍人" data-input-clear="1">
                        <span class="mui-icon mui-icon-clear mui-hidden"></span>
                    </div>
                    @endif
                    <div class="mui-input-row input_item">
                        <label><i class="strong_icon"></i>用户名</label>
                        <input name="name" type="text"  maxlength="9" id="regUsername" class="mui-input-clear" placeholder="请输入用户名" data-input-clear="1">
                        <span class="mui-icon mui-icon-clear mui-hidden"></span>
                    </div>
                    <div class="mui-input-row input_item">
                        <label><i class="strong_icon"></i>密码</label>
                        <input name="password" type="password" class="show_pwd_way" id="regUserpwd" maxlength="12"  placeholder="请输入6-12个字母、数字或字符">
                        <span class="pwd_icon not_view_icon"></span>
                    </div>
                    <div class="mui-input-row input_item">
                        <label><i class="strong_icon"></i>确认密码</label>
                        <input name="password_confirmation" type="password" id="regUserSurepwd" maxlength="12" class="confirm_pwd_way" placehold
                               er="再次输入您的登录密码">
                        <span class="confirm_pwd_icon not_view_icon"></span>
                    </div>
                        @if($_system_config->is_real_name_1 == 1)
                    <div class="mui-input-row input_item">
                        <label>@if($_system_config->is_real_name_2 == 1)<i class="strong_icon"></i>@endif真实姓名</label>
                        <input name="real_name" type="text" id="regUserTrueName" maxlength="24"  class="mui-input-clear" placeholder="输入您的真实姓名" data-input-clear="4">
                        <span class="mui-icon mui-icon-clear mui-hidden"></span>
                    </div>
                        @endif
                        @if($_system_config->is_phone_1 == 1)
                    <div class="mui-input-row input_item" id="UserPhone">
                        <label>@if($_system_config->is_phone_2 == 1)<i class="strong_icon"></i>@endif手机号</label>
                        <input name="phone" type="text" id="regUserPhone" class="mui-input-clear mui-input" placeholder="请输入手机号" maxlength="11" data-input-clear="5">
                        <span class="mui-icon mui-icon-clear mui-hidden"></span>
                    </div>
                        @endif
                        @if($_system_config->is_qq_1 == 1)
                            <div class="mui-input-row input_item">
                                <label>@if($_system_config->qq_2 == 1)<i class="strong_icon"></i>@endif QQ</label>
                                <input name="qq" type="text" class="mui-input-clear mui-input" placeholder="请输入QQ" maxlength="11" data-input-clear="5">
                                <span class="mui-icon mui-icon-clear mui-hidden"></span>
                            </div>
                        @endif
                        @if($_system_config->is_email_1 == 1)
                            <div class="mui-input-row input_item">
                                <label>@if($_system_config->is_email_2 == 1)<i class="strong_icon"></i>@endif 邮箱</label>
                                <input name="email" type="text" class="mui-input-clear mui-input" placeholder="请输入邮箱" maxlength="11" data-input-clear="5">
                                <span class="mui-icon mui-icon-clear mui-hidden"></span>
                            </div>
                        @endif
                        @if($_system_config->is_weixin_1 == 1)
                            <div class="mui-input-row input_item">
                                <label>@if($_system_config->is_email_2 == 1)<i class="strong_icon"></i>@endif 微信</label>
                                <input name="weixin" type="text" class="mui-input-clear mui-input" placeholder="请输入微信" maxlength="11" data-input-clear="5">
                                <span class="mui-icon mui-icon-clear mui-hidden"></span>
                            </div>
                        @endif
                    <div class="mui-input-row input_item">
                        <label><i class="strong_icon"></i>取款密码</label>
                        <input name="qk_pwd" type="password" class=" withdrawalsPwd_way"id="regUserWithdrawalsPwd" maxlength="6"  placeholder="请输入取款密码" data-input-clear="6">
                        <span class="withdrawalsPwd_icon not_view_icon"></span>
                    </div>
                    <div class="mui-input-row input_item">
                        <label><i class="strong_icon"></i>验证码</label>
                        <div class="mui-flex">
                            <input name="captcha" type="text" id="regUserCaptcha"  class="mui-input-clear" placeholder="请输入验证码" maxlength="4" onfocus="$('#regpin').click();" data-input-clear="10">
                            <span class="mui-icon mui-icon-clear mui-hidden"></span>
                            <img id="regpin" onclick="re_captcha()" src="{{ URL('kit/captcha/1') }}"/>
                        </div>
                    </div>
                    <div class="mui-button-row">
                        <button type="button" class="mui-btn mui-btn-block common_btn btn-ok ajax-submit-btn" >
                            立即注册
                        </button>
                        <p class="to_login">
                            <span>已有账号</span>
                            <a data-rel='{"target":"{{ route('wap.login') }}","opType":"href"}' >前往登录</a>
                        </p>
                    </div>
                </form>
            </div>
        </section>
    </div> <!--mui-scroll 闭合标签-->
</div>  <!--mui-content 闭合标签-->
</body>
<script>
    //whetherOpenSMS();
    function re_captcha() {
        $url = "{{ URL('kit/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('regpin').src=$url;
    }
    //$("#regpin").click();
</script>
</html>

