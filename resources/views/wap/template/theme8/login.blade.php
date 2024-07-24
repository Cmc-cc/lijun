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
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/mui.picker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/mui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/mui.previewimage.css') }}">
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/imageview.css') }}">
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/mui.imageviewer.css') }}">
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/otherpage.css') }}" />
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/public-mod.css') }}" />
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/style2.css') }}" />
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/hongbao.css') }}" />
    <link rel="stylesheet" href="{{ asset('wap/theme8/css/loading.css') }}" />
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
    <script src="{{ asset('/wap/theme8/js/wapConfig.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/bicommon.js') }}"></script>
    <script src="{{ asset('/wap/theme3/js/mobileJS.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/wapMain.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
    <title>登录</title>
</head>
<body class="login mui-ios mui-ios-11 mui-ios-11-0">
<!-- 主页面标题 -->
<header class="mui-bar mui-bar-nav mui-bar-blue">
    <a class="mui-icon mui-icon-left-nav mui-pull-left" data-rel="{&quot;target&quot;:&quot;goToLastPage&quot;,&quot;opType&quot;:&quot;function&quot;}" style="font-size:17px; padding-top:15px;">返回</a>
    <h1 class="mui-title">登录</h1>
    <a class="mui-icon mui-icon-home mui-pull-right " data-rel='{"target":"{{ route('wap.index') }}","opType":"href"}'></a>
</header>
<div class="mui-content mui-scroll" data-scroll="1">
    <div class="mui-scroll" style="transform: translate3d(0px, 0px, 0px) translateZ(0px);">
{{--        <div class="user-img"></div>--}}
        <!-- 主界面具体展示内容 -->
        <div class="login-form">
            <form id="mui-input-group" action="{{ route('wap.login.post') }}" method="post">
                <div class="username" id="longUserName" style="margin-top: 10px;">
                    <label for="">请输入账号</label>
                    <input name="name" type="text" id="loginUsername" class="mui-input-clear" placeholder="请输入账号">
                </div>
                {{--<div class="username sendcodes">
                    <label>请输入手机号码</label>
                    <input for="" type="number" id="loginUserPhone" class="mui-input-password" placeholder="请输入手机号码">
                </div>
                <div class="username sendcodes">
                    <label>请输入手机验证码</label>
                    <input for="" type="number" id="loginUserPhoneCode" class="mui-input-password" placeholder="请输入手机验证码">
                    <span class="reg-code" onclick="sendBtn($('#loginUserPhone'),this,1)" id="sendCode" state="1">发送验证码</span>
                </div>--}}
                <div class="password" id="longUserPwd">
                    <label>请输入密码</label>
                    <input name="password" for="" type="password" id="loginUserpwd" class="mui-input-password" placeholder="请输入密码">
                </div>
                {{--<div class="code _captcha " id="captcha_div">
                    <label>请输入验证码</label>
                    <div class="div_flex">
                        <input type="text" class="mui-input-clear" id="loginUsercode" onfocus="$('#loginpin').click()" maxlength="4" placeholder="请输入验证码">
                        <img class="captcha_img" id="loginpin" onclick="changeCode(this)">
                    </div>
                </div>--}}
                <a href="javascript;" class="btn btn-login btn-ok ajax-submit-btn">立即登录</a>

                {{--<p class="forget-pas">
                    <a href="javascript;" class="reg-mobile btn btn-mobile" onclick="loginCode(this);" state="1">手机号登录</a>
                </p>--}}
                <a data-rel='{"target":"{{ route('wap.register') }}","opType":"href"}' class="btn btn-regist">免费开户</a>
            </form>
        </div>
    </div> <!--mui-scroll 闭合标签-->
</div>  <!--mui-content 闭合标签-->
</body>
</html>
<script>
    var options = {
        containerScroll: ".mui-content.mui-scroll"
    };
    loginFun();
    muiInit(options);
    whetherOpenSMS();
</script>