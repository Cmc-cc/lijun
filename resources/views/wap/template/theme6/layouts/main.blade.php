<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $_system_config->site_title or '标题' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="Cache-control" content="no-cache" />
    <meta http-equiv="Cache" content="no-cache" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link href="{{ asset('/wap/theme6/fonts/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme6/css/mui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme6/css/style.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="{{ asset('/wap/theme6/js/mui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme6/js/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme6/js/CUnits.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme6/js/wapConfig.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme6/js/wapMain.js') }}"></script>
    <script src="{{ asset('/wap/theme6/js/mobileJS.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme6/js/bicommon.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/clipboard.min.js') }}"></script>
</head>

<body>
@if($_system_config -> is_app_link_on == 0)
    @include('wap.app')
@endif
@yield('content')
<nav class="mui-bar mui-bar-tab" id="indexNav">
    <a id="defaultTab" class="mui-tab-item mui-active" href="{{ route('wap.index') }}" ids="index">
    <span class="mui-icon mui-icon-home"></span>
    <span class="mui-tab-label">首页</span>
    </a>
    <a class="mui-tab-item" href="{{ route('wap.recharge') }}" ids="deposit" titles="在线充值">
    <span class="mui-icon mui-icon-plus"></span>
    <span class="mui-tab-label">充值</span>
    </a>
    <a class="mui-tab-item" href="{{ route('wap.drawing') }}" ids="withdraw" titles="在线取款">
    <span class="mui-icon mui-icon-redo"></span>
    <span class="mui-tab-label">取款</span>
    </a>
    <a class="mui-tab-item" href="{{ route('wap.transfer') }}" ids="transfer" titles="在线转账">
    <span class="mui-icon mui-icon-loop"></span>
    <span class="mui-tab-label">转账</span>
    </a>
    <a class="mui-tab-item" href="{{ $_system_config->service_link }}" ids="kefu" titles="在线客服">
    <span class="mui-icon mui-icon-chatboxes"></span>
    <span class="mui-tab-label">客服</span>
    </a>
</nav>
<!--公告弹框-->
<div class="notice-dialog clearboth hide" id="marquee-wrapper">
    <div class="notice-content clearboth hide">
        <div class="notice-header clearboth">
            <button onclick="closeMessageDioag()">×</button>
            <p>最新消息</p>
        </div>
        <ul class="notice-list clearboth" id="newsBags"></ul>
        <div class="notice-footer">
            <button onclick="closeMessageDioag()">关闭</button>
        </div>
    </div>
</div>
<!--公告详情-->
<div id="announcement-content" announcement-dialog-content="" obj="content" more="true" class="ng-scope ng-isolate-scope hide" style="">
    <div class="modal-announcement-content announcement-content-bg">
        <div class="mac-title">
            <img class="fa-reply" src="{{ asset('/wap/theme3/images/return.png') }}" onclick="closeNoticeContent()" />
            <img class="fa-times" src="{{ asset('/wap/theme3/images/closeNotice.png') }}" onclick="closeNotices()" />
            <span class="ng-binding" id="notice-tittle"></span>
        </div>
        <div class="mac-body announcement-content-color">
            <section class="ng-binding">
                <p id="notice-content">尊敬的会员您好：通知您〜北京时间：</p>
            </section>
        </div>
        {{--<div class="mac-footer" ng-show="more"><button type="button" class="btn btn-lg btn-primary" onclick="moreNotice()">更多公告</button></div>--}}
    </div>
</div>
<input type="hidden" id="userNameController" value="@if($_member) {{ $_member -> name }} @endif" />
</body>
</html>
<script>
    function checkLogin ()
    {
        @if($_member)
            return true;
        @else
        notify("请先登录游戏！");
        return false;
        @endif
    }
    //getMaintain();
    mui.init();
    (function ($) {
        $(".mui-scroll-wrapper").scroll({
            bounce: true,//滚动条是否有弹力默认是true
            indicators: true, //是否显示滚动条,默认是true
            deceleration: 0.0005
        });
    })(mui);

    //getUserMoney();
    bottomLocation();
</script>