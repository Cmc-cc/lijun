<!DOCTYPE html>
<html>
<head>
    <title>{{$_system_config->site_title or '标题' }}</title>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <!-- 宽度设置为设备实际宽度，初始化倍数为1，最小倍数为1，最大倍数为1，用户缩放为否 -->
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">
    <!-- 删除默认的苹果工具栏和菜单栏 -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- 苹果手机顶部为黑色 -->
    <meta name="apple-mobile-web-status-bar-style" content="black" />
    <!-- 屏蔽浏览器自动识别数字为电话号码 -->
    <meta name="fromat-detecition" content="telephone=no" />
    <!--禁止百度转码-->
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!-- 优先使用 IE 最新版本和 Chrome -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">

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
    <script src="{{ asset('/wap/theme8/js/wapConfig.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/bicommon.js') }}"></script>
    <script src="{{ asset('/wap/theme3/js/mobileJS.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/wapMain.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/clipboard.min.js') }}"></script>
    <script>
        var rcVersion = '1552348236331';
        var utcOffSet = 480;
        var dateFormat = { daySecond: 'yyyy-MM-dd HH:mm:ss', day: 'yyyy-MM-dd', dayminute: 'yyyy-MM-dd HH:mm' };
        var siteCurrency = 'CNY';
        var siteCurrencySign = '￥';
        $(function () {
            bindButtonEvent();
            //getUserMoney();
            //getMaintain();
        });
    </script>
</head>

<body>
@if($_system_config -> is_app_link_on == 0)
    @include('wap.app')
@endif
<input type="hidden" id="userNameController" @if($_member) value="true" @endif/>
@yield('content')
<footer class="mui-bar mui-bar-tab" id="footer">
    <a data-rel='{"target":"{{ route('wap.index') }}","opType":"href"}' class="mui-tab-item ">
        <span class="mui-icon icon-home"></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a data-rel='{"target":"landingslocation","opType":"function"}' href="{{ route('wap.recharge') }}" class="mui-tab-item ">
    <span class="mui-icon icon-deposit"></span>
    <span class="mui-tab-label">存款</span>
    </a>
    <a data-rel='{"target":"{{ route('wap.activity_list') }}","opType":"href"}' class="mui-tab-item ">
        <span class="mui-icon icon-promo"></span>
        <span class="mui-tab-label">优惠</span>
    </a>
    <a data-rel='{"target":"{{ $_system_config->service_link }}","opType":"href"}' class="mui-tab-item">
        <span class="mui-icon icon-service"></span>
        <span class="mui-tab-label">客服</span>
    </a>
    <a data-rel='{"target":"landingslocation","opType":"function"}' href="{{ route('wap.nav') }}" class="mui-tab-item ">
    <span class="mui-icon icon-mine"></span>
    <span class="mui-tab-label">我的</span>
    </a>
</footer><!-- 侧滑导航根容器 -->
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
            <img class="fa-reply" src="{{ asset('/wap/theme3/images/return.png') }}" onclick="closeNoticeContent()"/>
            <img class="fa-times" src="{{ asset('/wap/theme3/images/closeNotice.png') }}" onclick="closeNotices()"/>
            <span class="ng-binding" id="notice-tittle"></span>
        </div>
        <div class="mac-body announcement-content-color">
            <section class="ng-binding">
                <p id="notice-content">尊敬的会员您好：通知您〜北京时间：</p>
            </section>
        </div>
        {{--<div class="mac-footer" ng-show="more">
            <button type="button" class="btn btn-lg btn-primary" onclick="moreNotice()">更多公告</button>
        </div>--}}
    </div>
</div>

</body>
</html>