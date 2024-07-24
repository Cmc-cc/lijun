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
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">
    <link href="{{ asset('wap/theme11/css/swiper.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme11/css/messenger.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme11/css/messenger-theme-flat.css') }}">
    <link href="{{ asset('/wap/theme11/css/index.d1fbaa.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="{{ asset('/wap/theme11/js/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme11/js/messenger.min.js') }}"></script>
    <script src="{{ asset('/wap/theme11/js/CUnits.js') }}"></script>
    <script src="{{ asset('/wap/theme11/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme11/js/wapConfig.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme11/js/bicommon.js') }}"></script>
    <script src="{{ asset('/wap/theme3/js/mobileJS.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme11/js/wapMain.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
    <style>

        #tablistId .bgicon {
            color: rgb(238, 209, 133);
        }

        #tablistId .bgwhite {
            color: white;
        }
    </style>
</head>

<body>
@if($_system_config -> is_app_link_on == 0)
    @include('wap.app')
@endif
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
     style="position:absolute;width:0;height:0">
    <defs>
        <symbol viewBox="0 0 72 72" id="success"><title>成功</title>
            <g fill="none" fill-rule="evenodd">
                <path d="M36 72c19.882 0 36-16.118 36-36S55.882 0 36 0 0 16.118 0 36s16.118 36 36 36zm0-2c18.778 0 34-15.222 34-34S54.778 2 36 2 2 17.222 2 36s15.222 34 34 34z"
                      fill="#FFF"></path>
                <path stroke="#FFF" stroke-width="2" d="M19 34.54l11.545 11.923L52.815 24"></path>
            </g>
        </symbol>
        <symbol viewBox="0 0 72 72" id="fail"><title>失败</title>
            <g fill="none" fill-rule="evenodd">
                <path d="M36 72c19.882 0 36-16.118 36-36S55.882 0 36 0 0 16.118 0 36s16.118 36 36 36zm0-2c18.778 0 34-15.222 34-34S54.778 2 36 2 2 17.222 2 36s15.222 34 34 34z"
                      fill="#FFF"></path>
                <path d="M22 22l28.304 28.304M22 50.304L50.304 22" stroke="#FFF" stroke-width="2"></path>
            </g>
        </symbol>
        <symbol viewBox="0 0 72 72" id="dislike"><title>哭脸</title>
            <g fill="none" fill-rule="evenodd">
                <path d="M36 72c19.882 0 36-16.118 36-36S55.882 0 36 0 0 16.118 0 36s16.118 36 36 36zm0-2c18.778 0 34-15.222 34-34S54.778 2 36 2 2 17.222 2 36s15.222 34 34 34z"
                      fill="#FFF"></path>
                <path fill="#FFF" d="M47 22h2v6h-2zM23 22h2v6h-2z"></path>
                <path d="M21 51s4.6-7 15-7 15 7 15 7" stroke="#FFF" stroke-width="2"></path>
            </g>
        </symbol>
        <symbol viewBox="0 -2 59.75 60.25" id="loading">
            <path fill="#ccc"
                  d="M29.691-.527c-15.648 0-28.333 12.685-28.333 28.333s12.685 28.333 28.333 28.333c15.648 0 28.333-12.685 28.333-28.333S45.339-.527 29.691-.527zm.184 53.75c-14.037 0-25.417-11.379-25.417-25.417S15.838 2.39 29.875 2.39s25.417 11.379 25.417 25.417-11.38 25.416-25.417 25.416z"></path>
            <path fill="none" stroke="#108ee9" stroke-width="3" stroke-linecap="round" stroke-miterlimit="10"
                  d="M56.587 29.766c.369-7.438-1.658-14.699-6.393-19.552"></path>
        </symbol>
    </defs>
</svg>
<div id="app">
    @yield('content')
    <div>
        <div class="app_bottom">
            <div class="am-tab-bar am-tab-bar-bottom">
                <div class="am-tab-bar-content am-tab-bar-content-no-animated">
                    <div role="tabpanel" aria-hidden="false" class="am-tab-bar-tabpane am-tab-bar-tabpane-active"></div>
                    <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive">正在加载</div>
                    <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive">正在加载</div>
                    <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive">正在加载</div>
                    <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive">正在加载</div>
                </div>
                <div role="tablist" class="am-tab-bar-bar" tabindex="0" style="background-color: rgb(1, 54, 37);" id="tablistId">
                    <div role="tab" aria-disabled="false" aria-selected="false" class="am-tab-bar-tab">
                        <div>
                            <a class="am-tab-bar-tab-title bgwhite" href="{{ route('wap.index') }}">
                            <div class="am-tab-bar-tab-icon bgwhite"><i class="icon iconfont icon-home Navset"></i></div>
                            首页
                            </a>
                        </div>
                    </div>
                    <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                        <div>
                            <a class="am-tab-bar-tab-title bgwhite" onclick="return landingslocation();" href="{{ route('wap.recharge') }}">
                            <div class="am-tab-bar-tab-icon bgwhite"><i class="icon iconfont icon-wallet Navset"></i></div>
                            充值
                            </a>
                        </div>
                    </div>
                    <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                        <div>
                            <a class="am-tab-bar-tab-title bgwhite" href="{{ $_system_config -> service_link }}">
                            <div class="am-tab-bar-tab-icon bgwhite"><i class="icon iconfont icon-CS Navset"></i></div>
                            客服
                            </a>
                        </div>
                    </div>
                    <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                        <div>
                            <a class="am-tab-bar-tab-title bgwhite" href="{{ route('wap.activity_list') }}">
                            <div class="am-tab-bar-tab-icon bgwhite" style=""><i class="icon iconfont icon-Promotion Navset"></i></div>

                            优惠
                            </a>
                        </div>
                    </div>
                    @if (Auth::guard('member')->guest())

                        <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                            <div>
                                <a class="am-tab-bar-tab-title bgwhite" href="{{ route('wap.login') }}">
                                <div class="am-tab-bar-tab-icon bgwhite"><i class="icon iconfont icon-personal Navset"></i></div>

                                登录
                                </a>
                            </div>
                        </div>
                        @else
                        <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                            <div>
                                <a class="am-tab-bar-tab-title bgwhite" href="{{ route('wap.nav') }}">
                                <div class="am-tab-bar-tab-icon bgwhite"><i class="icon iconfont icon-personal Navset"></i></div>
                                账号管理
                                </a>
                            </div>
                        </div>
                        @endif
                </div>
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
<div class="modal" id="modalWaring" style="display:none;">
            <span>
                <div class="am-toast-notice">
                    <div class="am-toast-notice-content">
                        <div class="am-toast-text am-toast-text-icon" role="alert" aria-live="assertive">
                            <svg class="am-icon am-icon-fail am-icon-lg"><use xlink:href="#fail"></use></svg>
                            <div class="am-toast-text-info" id="messageWaring"></div>
                        </div>
                    </div>
                </div>
            </span>
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
</body>
</html>

<script>
    //getMaintain();
    //getGamePlate(1);
    TabbottomSide();
    //biCommon.getUserMoneys();
    //getUserMoney();//获取用户余额，每隔六秒请求一次
</script>
