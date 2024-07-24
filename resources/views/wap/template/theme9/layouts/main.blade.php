<!DOCTYPE html>
<html>
<head>
    <title>{{ $_system_config->site_title or '标题' }}</title>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-status-bar-style" content="black" />
    <meta name="fromat-detecition" content="telephone=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('wap/theme9/css/jquery-ui.theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/font-awesome5.min.css') }}" />
    <link href="{{ asset('/wap/theme9/css/swiper.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/body.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/custom-modal.css') }}" />
    <link rel="stylesheet" href="{{ asset('/wap/theme9/css/site.css') }}" />
    <script src="{{ asset('/wap/theme9/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('/wap/theme9/js/swiper.min.js') }}"></script>
    <script src="{{ asset('/wap/theme9/js/wapConfig.js') }}"></script>
    <script src="{{ asset('/wap/theme9/js/bicommon.js') }}"></script>
    <script src="{{ asset('/wap/theme3/js/mobileJS.js') }}"></script>
    <script src="{{ asset('/wap/theme9/js/wapMain.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
    <script>
        $(function () {
            //getMaintain();
            //biCommon.getUserMoneys();
            //getUserMoney();
        })
    </script>
</head>

<body class="ng-scope">
@if($_system_config -> is_app_link_on == 0)
    @include('wap.app')
@endif
<nav id="nav" class="" style="">

    <div class="member">
        <img class="profile" src="{{ asset('/wap/theme9/images/profile.png') }}">
        @if (Auth::guard('member')->guest())
            <a href="{{ route('wap.login') }}">
            <button class="btn01" type="button">登入</button>
            </a>
            <a href="{{ route('wap.register') }}">
            <button class="btn02" type="button">免费开户</button>
            </a>
        @else
            <ul class="account ng-scope">
                <li>
                    <span class="account" title="{{ $_member -> name }}">{{ $_member -> name }}</span>
                </li>
                {{--<li>
                    <img src="" class="fr vip-layout" id="vipLayout" />
                    <span id="vipLayoutText" style="font-size:12px"></span>
                </li>--}}
                <li>
                    <span class="ng-binding UserAmountController money">{{ $_member -> money }}</span>
                    {{--<a class="update" title="更新">
                        <i class="fa fa-refresh ng-scope" onclick="yijianzhuanchu(this);"></i>
                    </a>
                    <div id="callBackAllWallet"></div>--}}
                </li>
            </ul>
        @endif


    </div>
    <ul class="sidebar" side-menu="">
        <a href="{{ $_system_config->service_link }}">
            <li class="ng-scope">
                <i class="fab fa-whatsapp"></i>
                在线客服
            </li>
        </a>
        <a href="{{ route('wap.recharge') }}" onclick="return isLogins();">
            <li class="ng-scope">
                <i class="fas fa-dollar-sign" style="color:#8CF616;"></i>
                一键充值
            </li>
        </a>
        <a href="{{ route('wap.drawing') }}" onclick="return isLogins();">
            <li class="ng-scope">
                <i class="fas fa-share-alt-square" style="color:#F9E91B;"></i>
                在线取款
            </li>
        </a>
        <a href="{{ route('wap.agent') }}" onclick="return isLogins();">
            <li class="ng-scope">
                <i class="fas fa-share-alt" style="color:#ECDC07;"></i>
                代理中心
            </li>
        </a>
        <a href="{{ route('wap.game_record') }}" onclick="return isLogins();">
            <li class="ng-scope">
                <i class="fab fa-empire" style="color:#F61B03;"></i>
                下注记录
            </li>
        </a>
        @if (!Auth::guard('member')->guest())
            <a href="{{ route('wap.reset_password') }}">
                <li class="ng-scope">
                    <i class="fa fa fa-lock"></i>
                    修改密码
                </li>
            </a>
            {{--<li class="ng-scope">
                <i class="fa fa fa-key"></i>
                <a href="@Url.Action("changetipwd", "Index")">修改取款密码</a>
            </li>--}}
            <a href="{{ route('wap.msg') }}">
                <li class="ng-scope" id="mailbox">
                    <i class="fa fa fa-key"></i>
                    消息中心
                    <b></b>
                </li>
            </a>
        @endif
            <a href="{{ route('wap.activity_list') }}">
                <li class="ng-scope">
                    <i class="fas fa-gem" style="color:#B907A1;"></i>
                    优惠活动大厅
                </li>
            </a>
            {{--<li class="ng-scope">
                <i class="fas fa-download"></i>
                <a href=''>安卓APP下载</a>
            </li>
            <li class="ng-scope">
                <i class="fas fa-download"></i>
                <a href=''>苹果APP下载</a>
            </li>--}}
            <a href='{{ $_system_config->service_link }}'>
                <li class="ng-scope">
                    <i class="fa fa fa-qq"></i>
                    {{ $_system_config -> qq }}
                </li>
            </a>
            {{--<li class="ng-scope">
                <i class="fa fa fa-language"></i>
                <select id="select-language">
                    <option data-language="zh-CN" value="zh-CN" selected="" class="ng-binding ng-scope" style="">简体中文</option>
                </select>
            </li>--}}
            @if (!Auth::guard('member')->guest())

            <a href="javascript:;" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="mui-btn mui-btn-success btn-logout">
                <li class="ng-scope">
                    <i class="fa fa fa-power-off"></i>
                    登出
                </li>
            </a>
                <form id="logout-form" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
    </ul>
    <button class="closed" type="button" onclick="showRightNav(2)">X</button>
</nav>

<header id="header">
    <div class="logo">
        <a href="{{ route('wap.index') }}">
        <img src="{{ $_system_config -> m_site_logo }}" />
        </a>
    </div>
    <div class="header-right">
        <div class="domain ng-scope">
            易记域名
            <span class="ng-binding" id="host"></span>
        </div>

        @if (Auth::guard('member')->guest())
            <div class="btn-group">
                <a href="{{ route('wap.login') }}"><button class="btn01" type="button">登入</button></a>
                <a href="{{ route('wap.register') }}"><button class="btn02" type="button">免费开户</button></a>
            </div>
            @else
            <div class="btn-group">
                <a href="{{ route('wap.drawing') }}"><button class="btn01" type="button">线上取款</button></a>
                <a href="{{ route('wap.recharge') }}"><button class="btn02" type="button">线上存款</button></a>
            </div>
        @endif
    </div>
    <button class="nav-toggle" type="button" onclick="showRightNav(1);">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</header>

<div id="news">
    <i class="fa fa-volume-up"></i>
    <div class="marquee ng-isolate-scope" annoucement-marquee="" style="display: block;height:30px">
        <div class="marquee-wrap swiper-container notice-swiper" style="height:30px">
            <ul class="swiper-wrapper" id="noticeSiper"></ul>
        </div>
    </div>
</div>
@yield('content')
<footer id="footer">
    <ul class="menu-bottom">
        <li class="financial">
            <i class="fa fa-money"></i>
            <a href="{{ route('wap.nav') }}" onclick="return isLogins();">个人中心</a>
        </li>
        {{--<li class="anytimediscount ng-hide">
            <i class="fa fa-usd"></i>
            <a href="@Url.Action("BackWater", "Index")" onclick="return isLogins();">时时返水</a>
        </li>--}}
        <li class="promotion">
            <i class="fa fa-gift"></i>
            <a href="{{ route('wap.activity_list') }}">优惠专区</a>
        </li>
        <li class="chat">
            <i class="fa fa-whatsapp"></i>
            <a href="{{ $_system_config->service_link }}">在线客服</a>
        </li>
        <li class="home">
            <i class="fa fa-home"></i>
            <a href="{{ route('wap.index') }}">回首页</a>
        </li>
    </ul>
</footer>
<!--提示框-->
<div id="modalWaring" onclick="sureWaring()" class="modal custom-modal fade ng-scope ng-isolate-scope" role="dialog" index="0" animate="animate" tabindex="-1" uib-modal-animation-class="fade" modal-in-class="in" modal-animation="true" style="z-index: 1050; display: none;">
    <div class="modal-dialog">
        <div class="modal-content" uib-modal-transclude="">
            <div class="cms-modal-header ng-scope">
                <h4 class="cms-modal-title">提示</h4>
            </div>
            <div class="cms-modal-body ng-binding ng-scope" id="messageWaring"></div>
            <div class="cms-modal-footer ng-scope">
                <button class="btn btn-confirm btn-block" onclick="sureWaring()">确定</button>
            </div>
        </div>
    </div>
</div>
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
<div id="announcement-content" announcement-dialog-content=""  obj="content" more="true" class="ng-scope ng-isolate-scope hide" style="">
    <div class="modal-announcement-content announcement-content-bg">
        <div class="mac-title">
            <i class="fa fa-2x fa-reply ng-hide" onclick="closeNoticeContent()" ng-show="!more"></i>
            <i class="fa fa-2x fa-times" onclick="closeNotices()" ng-show="more"></i>
            <span class="ng-binding" id="notice-tittle"></span></div>
        <div class="mac-body announcement-content-color">
            <section  class="ng-binding">
                <p id="notice-content">尊敬的会员您好：通知您〜北京时间：</p>
            </section>
        </div>
{{--        <div class="mac-footer" ng-show="more"><button type="button" class="btn btn-lg btn-primary" onclick="moreNotice()">更多公告</button></div>--}}
    </div>
</div>

<div id="modalWarings" class="modal-backdrop fade ng-scope" onclick="sureWaring()" style="display:none"></div>
<div id="nav-dismiss" class="" style="" onclick="showRightNav(2);"></div>
{{--<input type="hidden" id="userNameController" value="@ViewBag.UserName" minmoney="@systemseting["minmoney"]"  mintkmoney ="@systemseting["mintkmoney"]" maxmoney="@systemseting["maxmoney"]" downAndroid="@systemseting["down_android"]" downIos="@systemseting["down_ios"]" isOpenRed="@systemseting["isOpenRed"]" systemRepair="@systemseting["system_repair"]" systemRepairtent="@systemseting["system_repairtent"]"  isPhone="@systemseting["isPhone"]" />--}}
</body>

</html>
<script>
    getHost($("#host"));
    biCommon.getNotices(1);
    //whetherOpenSMS();
    function isLogins() {
        @if($_member)
            return  true;
        @else
            notify("请先登录！");
            return false;
        @endif
    }
    $(function () {
        @if (!Auth::guard('member')->guest())
        @if($_member->is_trans_on == 1)
        $.ajax({
            type: 'post',
            url: "{{route('member.api.wallet_balance')}}",
            dataType: 'json',
            success: function (data) {
                //console.log(data);
                if (data.statusCode == '01') {
                    var all = Number($('.money').text()) + Number(data.data);
                    $('.money').text('');
                    $('.money').text(parseInt(all.toFixed(2)));

                    $('.drawing-money').text(parseInt(all.toFixed(2)));
                    $('.trans-money').text(parseInt(all.toFixed(2)));
                }
            }
        })
        @endif
        @endif
    })
</script>