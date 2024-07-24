<!DOCTYPE html>
<html lang="cn" class="IsMobile portrait-orientation" data-mobile-os="androidos">

<head>
    <meta charset="UTF-8">
    <title>{{ $_system_config->site_title or '标题' }}]</title>
    <meta name="googlebot" content="NOODP">
    <meta name="description" content="">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="robots" content="NOINDEX, NOFOLLOW">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">

    <link href="{{ asset('wap/theme12/css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme12/css/sbtech-widget-cashier.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme12/css/Chat.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme12/css/reset.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme12/css/swiper.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme12/css/BIstyle.css') }}" rel="stylesheet" />

    <script src="{{ asset('/wap/theme12/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('/wap/theme12/js/swiper.min.js') }}"></script>
    <script src="{{ asset('/wap/theme12/js/wapMain.js') }}"></script>
    <script src="{{ asset('/wap/theme3/js/mobileJS.js') }}"></script>
    <script src="{{ asset('/wap/theme12/js/bicommon.js') }}"></script>
    <script src="{{ asset('/wap/theme12/js/wapConfig.js') }}"></script>
    <script src="{{ asset('/wap/theme12/js/CUnits.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
</head>

<body id="documentBody" class="hiddenHeader loggedin right-panel-hidden-tablet root-page cn panel-left-nav-enabled unstickyHeader has-resp-header">
@if($_system_config -> is_app_link_on == 0)
    @include('wap.app')
@endif
<div id="panels-top-holder" class="panel-top content-min-width">
    <div class="panel-top-inner">
        <sb-block id="top-panel-block-2" class="">
            <div class="panel-block panel-block-top" id="Top_ResponsiveHeader_45143">
                <div id="html-container-Top_ResponsiveHeader_45143" class="responsive-block page-header">
                    <div class="page-header-wrapper page-header-wrapper-top">
                        <div class="page-header-row page-header-top content-width has-header-my-account-link" id="hr-top-Top_ResponsiveHeader_45143">
                            @if (!Auth::guard('member')->guest())
                                <div class="page-header-cell page-header-right" data-uat="page-header-cell-right">
                                    <div id="hr-top-Top_ResponsiveHeader_45143-page-header-right1" class="page-header-element page-header-element--is-disableable" data-uat="page-header-element">
                                        <a class="mobile-header-link mobile-header-open-bets-link " title="投注" href="{{ route('wap.game_record') }}">
                                        <button type="button" class="mobile-header-custom-link-text">
                                            <span class="mobile-header-custom-link-emphasis">游戏记录</span>
                                        </button>
                                        </a>
                                    </div>
                                    <div id="hr-top-Top_ResponsiveHeader_45143-page-header-right2" class="page-header-element page-header-element--is-disableable" data-uat="page-header-element" onclick="window.location.href='{{ route('wap.recharge') }}'">
                                    <div class="mobile-header-dropdown-wrap mobile-header-dropdown-balance  ">

                                        <div class="mobile-header-dropdown-item" title="TotalBalanceMain" data-url="#">
                                                    <span class="mobile-header-dropdown-placeholder ">
                                                        <span class="mobile-header-dropdown-balance-sum-base UserAmountController money">{{ $_member -> money }}</span>
                                                        <span class="mobile-header-dropdown-balance-currency">RMB</span>
                                                    </span>
                                            <span class="mobile-header-dropdown-icon mobile-header-dropdown-icon-plus"></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="hr-top-Top_ResponsiveHeader_45143-page-header-right3" class="page-header-element" data-uat="page-header-element" onclick="openUserAccount()">
                                    <a class="mobile-header-link mobile-header-my-account-link" title="我的帐户" href="javascript:void(0);">
                                        <div class="mobile-header-my-account-link-inner">
                                            <span id="hr-top-Top_ResponsiveHeader_45143-page-header-right3-icon-element" class="mobile-header-custom-link-icon icon i-16"></span>
                                        </div>
                                    </a>
                                </div>
                        </div>
                        @else
                        <div class="page-header-cell page-header-right" data-uat="page-header-cell-right">
                            <div id="hr-top-Top_ResponsiveHeader_45143-page-header-right1" class="page-header-element page-header-element--is-disableable" data-uat="page-header-element"></div>
                            <div id="hr-top-Top_ResponsiveHeader_45143-page-header-right2" class="page-header-element page-header-element--is-disableable" data-uat="page-header-element"></div>
                            <div id="hr-top-Top_ResponsiveHeader_45143-page-header-right3" class="page-header-element" data-uat="page-header-element"></div>
                            <div id="hr-top-Top_ResponsiveHeader_45143-page-header-right4" class="page-header-element page-header-element--is-disableable" data-uat="page-header-element">
                                <a class="mobile-login-container" href="{{ route('wap.login') }}" ids="login">
                                <button class="mobile-login-element">登录</button>
                                </a>
                            </div>
                            <div id="hr-top-Top_ResponsiveHeader_45143-page-header-right5" class="page-header-element page-header-element--is-disableable" data-uat="page-header-element">
                                <a class="mobile-registration-container" href="{{ route('wap.register') }}" ids="reg">
                                <button class="mobile-registration-element">立即注册</button>
                                </a>
                            </div>
                        </div>
                        @endif
                        <div class="page-header-cell page-header-left">
                            <div id="hr-top-Top_ResponsiveHeader_45143-page-header-left1" class="page-header-element" data-uat="page-header-element" onclick="showleftMenu()">
                                <div class="mobile-menu-hamburger" data-uat="navigation-hamburger-menu">
                                    <div class="icon i-o-menu-hamburger" style=""></div>
                                </div>
                            </div>
                            <div id="hr-top-Top_ResponsiveHeader_45143-page-header-left2" class="page-header-element" data-uat="page-header-element">
                                <a class="mobile-header-logo-container" href="{{ route('wap.index') }}" title="跳转首页" ids="shouye">
                                    <img style="width: 100px;" class="icon mobile-header-main-logo mobile-header-main-logo-default" src="{{ $_system_config -> m_site_logo }}">
                                </a>
                            </div>
                        </div>
                        <div class="page-header-cell page-header-center"></div>
                    </div>
                </div>
            </div>
    </div>
    </sb-block>
</div>
</div>

<div id="content-main" class="content-main">
    <div class="content-main-inner content-width">
        <div id="pagesWrapper" role="main" class="panel-center content" data-uat="center-panel">
            <div id="panel-center-inner" class="panel-center-inner" data-uat="panel-center-inner">
                <section id="responsive-home-page" data-uat="responsive-home-page" class="page current page  HTMLBlock HTMLBlock HTMLBlock HTMLBlock HTMLBlock HTMLBlock">

                    <!--/**************start****************/-->
                    @yield('content')
                    <!--/************** end ****************/-->

                    <div id="master-container-Center_HTMLBlock_54335" class="">
                        <div id="html-container-Center_HTMLBlock_54335">

                            <div class="container">
                                <div class="sticky-bottom-menu">
                                    <a class="home-tab col-3" href="{{ route('wap.index') }}" ids="shouye">首页</a>
                                    <a class="deposit-tab col-3" href="{{ route('wap.recharge') }}" ids="deposit" onclick="return landingslocation();">存款</a>
                                    <a class="promo-tab col-3" href="{{ route('wap.activity_list') }}" ids="youhui">优惠</a>
                                    <a class="user-tab col-3" href="{{ $_system_config -> service_link }}" ids="kefu">客服</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="my-account-mobile" data-uat="my-account-mobile" class="page page isHidden MyAccountHeaderMenuResponsive">
                    <div id="Center_MyAccountHeaderMenuResponsive_45194" data-uat="my-account-menu-header">
                        <sb-comp>
                            <div class="rj-account-block">
                                <div class="rj-account-block__content">
                                    <div class="rj-account-block__user-info">
                                        <div class="rj-account-block__user-info-wrap">
                                            <a href="{{ route('wap.recharge') }}" class="rj-account-block__deposit-link">存款</a>
                                            <div class="rj-account-block__user-details">
                                                <div class="rj-account-block__user-name"><span>@if (!Auth::guard('member')->guest()){{ $_member -> name }}@endif</span></div>
                                                <div class="rj-account-block__user-id">
                                                    <img src="" class="fr vip-layout" id="vipLayout" />
                                                    <span id="vipLayoutText"></span></div>
                                            </div>
                                        </div>
                                        <div class="rj-account-block__user-stats">
                                            <a href="{{ route('wap.transfer') }}" class="rj-account-block__user-stat">
                                            <div class="rj-account-block__user-stat-icon-wrap">
                                                <span class="icon i-32 i-o-acc-mob-balance"></span>
                                            </div>
                                            <div class="rj-account-block__user-stat-wrap">
                                                <span class="rj-account-block__title rj-account-block__user-stat-title">额度转换</span>
                                            </div>
                                            </a>
                                            <a href="{{ route('wap.msg') }}" class="rj-account-block__user-stat" id="mailbox">
                                            <div class="rj-account-block__user-stat-icon-wrap">
{{--                                                <b class="rj-account-block-unread-messages">0</b>--}}
                                                <span class="icon i-32 i-o-acc-mob-inbox"></span>
                                            </div>
                                            <div class="rj-account-block__user-stat-wrap">
                                                <span class="rj-account-block__title rj-account-block__user-stat-title">消息中心</span>
                                            </div>
                                            </a>
                                            <a href="{{ route('wap.game_record') }}" class="rj-account-block__user-stat">
                                            <div class="rj-account-block__user-stat-icon-wrap">
                                                <span class="icon i-32 i-o-acc-mob-open-bets"></span>
                                            </div>
                                            <div class="rj-account-block__user-stat-wrap">
                                                <span class="rj-account-block__title rj-account-block__user-stat-title">投注记录</span>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="rj-account-block__user-menu">
                                        <a href="{{ route('wap.activity_list') }}" class="rj-account-block__menu-item">
                                        <span class="rj-account-block__title rj-account-block__menu-item-title">优惠礼券</span>
                                        <span class="rj-account-block__freebet-count"></span>
                                        </a>
                                        <div class="rj-account-block__menu-section">
                                            <span class="rj-account-block__title rj-account-block__menu-section-title">账户信息</span>
                                            <a href="{{ route('wap.recharge') }}" class="rj-account-block__menu-item">
                                            <span class="rj-account-block__title rj-account-block__menu-item-title">存款</span>
                                            </a>
                                            <a href="{{ route('wap.drawing') }}" class="rj-account-block__menu-item">
                                            <span class="rj-account-block__title rj-account-block__menu-item-title">提款</span>
                                            </a>
                                            <a href="{{ route('wap.recharge_record') }}" class="rj-account-block__menu-item">
                                            <span class="rj-account-block__title rj-account-block__menu-item-title">充值记录</span>
                                            </a>
                                            <a href="{{ route('wap.drawing_record') }}" class="rj-account-block__menu-item">
                                                <span class="rj-account-block__title rj-account-block__menu-item-title">提款记录</span>
                                            </a>
                                            <a href="{{ route('wap.transfer_record') }}" class="rj-account-block__menu-item">
                                                <span class="rj-account-block__title rj-account-block__menu-item-title">额度转换记录</span>
                                            </a>
                                            @if($_system_config -> is_fs == 1)
                                                <a href="{{ route('wap.user_fs') }}" class="rj-account-block__menu-item">
                                                <span class="rj-account-block__title rj-account-block__menu-item-title">反水详情</span>
                                                </a>
                                            @endif
                                                <a href="{{ route('wap.userinfo') }}" class="rj-account-block__menu-item">
                                                <span class="rj-account-block__title rj-account-block__menu-item-title">个人资料</span>
                                                </a>
                                                <a href="{{ route('wap.reset_password') }}" class="rj-account-block__menu-item">
                                                <span class="rj-account-block__title rj-account-block__menu-item-title">修改密码</span>
                                                </a>
                                        </div>
                                        <div class="rj-account-block__menu-section">
                                            <span class="rj-account-block__title rj-account-block__menu-section-title">资讯</span>
                                            <a href="{{ $_system_config -> service_link }}" class="rj-account-block__menu-item">
                                            <span class="rj-account-block__title rj-account-block__menu-item-title">客服</span>
                                            </a>
                                            <a href="{{ route('wap.agent') }}" class="rj-account-block__menu-item">
                                            <span class="rj-account-block__title rj-account-block__menu-item-title">代理中心</span>
                                            </a>
                                            {{--<a href="" class="rj-account-block__menu-item" id="OldwithNew" style="display:none">
                                            <span class="rj-account-block__title rj-account-block__menu-item-title">老带新详情</span>
                                            </a>--}}
                                            <a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="rj-account-block__menu-item">
                                                <span class="rj-account-block__title rj-account-block__menu-item-title">登出</span>
                                            </a>
                                            <form id="logout-form" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </sb-comp>
                    </div>
                </section>


            </div>
            <div id="panels-bottom-holder" class="panel-bottom content-min-width">
                <div class="panel-bottom-inner">

                    <sb-block id="bottom-panel-block-2" class="">
                        <div class="panel-block panel-block-bottom" id="Bottom_HTMLBlock_45146" data-uat="panel-block-bottom">
                            <div id="master-container-Bottom_HTMLBlock_45146" class="">
                                <div id="html-container-Bottom_HTMLBlock_45146">
                                    <!-- Responsive - Footer Block CN -->

                                    <div class="footer-holder-bg">
                                        <div class="footer-container">
                                            <div class="footer-section clear">

                                                <div class="footer-side-holder">
                                                    <div class="footer-sponsorship-logos">
                                                        <div class="footer-sponsorship-logos-holder clearfix">
                                                            <div class="footer-sponsorship-logo blackburn">

                                                                <a href="javascript:void(0);" class="footer-sponsorship-logo-image blackburn"></a>
                                                                <div class="footer-sponsorship-logo-text">官方主赞助商</div>
                                                            </div>
                                                            <div class="footer-sponsorship-logo bromwich">

                                                                <a href="javascript:void(0);" class="footer-sponsorship-logo-image bromwich"></a>
                                                                <div class="footer-sponsorship-logo-text">官方博彩合作伙伴</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="footer-social-icons-holder">
                                                        <div class="back-to-top" onclick="pageScroll();">
                                                            <a class="btn">回到顶部</a>
                                                        </div>
                                                        <div class="footer-social-icons">
                                                            <a href="https://www.facebook.com/10bet/" class="social-icon social-icon-fb" target="_blank"></a>
                                                            <a href="https://twitter.com/10BetSports" class="social-icon social-icon-twitter" target="_blank"></a>
                                                            <!--<a href="https://plus.google.com/+10betsportsbet" class="social-icon social-icon-google" target="_blank"></a>-->
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="footer-section footer-section-border">
                                                <div id="paymentSlider">

                                                    <div id="scarousel-1" class="scarousel footer-payments-carousel scarousel-no-arrows scarousel-mobile scarousel-draggable" data-uat="scarousel">
                                                        <div class="scarousel-list-wrapper">
                                                            <ul class="scarousel-list scarousel-animate" style="transform: translate3d(0px, 0px, 0px);">
                                                                <li class="scarousel-item" data-uat="scarousel-item">
                                                                    <div class="payment-item">
                                                                        <div class="p-icon unionpay"></div>
                                                                    </div>
                                                                </li>
                                                                <li class="scarousel-item" data-uat="scarousel-item">
                                                                    <div class="payment-item">
                                                                        <div class="p-icon bank-transfer"></div>
                                                                    </div>
                                                                </li>
                                                                <li class="scarousel-item" data-uat="scarousel-item">
                                                                    <div class="payment-item">
                                                                        <div class="p-icon alipay"></div>
                                                                    </div>
                                                                </li>
                                                                <li class="scarousel-item" data-uat="scarousel-item">
                                                                    <div class="payment-item">
                                                                        <div class="p-icon qq"></div>
                                                                    </div>
                                                                </li>
                                                                <li class="scarousel-item" data-uat="scarousel-item">
                                                                    <div class="payment-item">
                                                                        <div class="p-icon wc"></div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="scarousel-btn scarousel-btn-prev scarousel-btn-inactive" data-uat="scarousel-btn-prev">
                                                            <div class="scarousel-btn-el">
                                                                <div class="scarousel-btn-prev-icon"></div>
                                                            </div>
                                                        </div>
                                                        <div class="scarousel-btn scarousel-btn-next" data-uat="scarousel-btn-next">
                                                            <div class="scarousel-btn-el">
                                                                <div class="scarousel-btn-next-icon"></div>
                                                            </div>
                                                        </div>
                                                        <div class="scarousel-pagination"><button class="scarousel-pagination-btn active" id="paymentSlider-pager-0" data-page-index="0"></button><button class="scarousel-pagination-btn" id="paymentSlider-pager-1" data-page-index="1"></button></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </sb-block>

                </div>
            </div>

        </div>

        <a id="gotoTop" href="javascript: void(0);" class="goToTopBtn fixedButton" onclick="pageScroll();">
            <i></i><span>回到顶部</span>
        </a>
        <div id="main-nav-overlay" class="content-overlay" onclick="showleftMenu()"></div>
    </div>
</div>
<div id="overlay">
    <!-- -->
</div>
<div id="mainNavigation" class="main-nav-animate " data-uat="main-navigation-menu">
    <div id="panel-left-nav-holder" class="panel-left-nav" data-uat="new-hamburger-menu">
        <div class="panel-left-nav-inner">
            <section id="hamburger-menu-sports" class=" panel-left-nav-scrollfix">
                <div id="LeftNav_TabSwitcherReactBlock_45192" data-uat="tab-switch" class="pane-tab-scroll">
                    <sb-comp>
                        <div class="rj-hamburger-tab-switcher-block">
                            <sb-tabs>
                                <div class="rj-hamburger-tabs-container">
                                    <div class="rj-hamburger-tabs-01-container">
                                        <sb-tabs-triggers data-tab-triggers="true" id="leftList">
                                            <div class="rj-hamburger-tabs-01-outer" onclick="openPlatform('Layoutlive',this);">
                                                <sb-tab-trigger data-tab-link="LeftNav_HamburgerNavigationCasinoBlock_54065" data-tab-default="false" data-tab-trigger="true">
                                                    <a class="rj-hamburger-tabs-01">
                                                        <span class="rj-hamburger-icon icon rj-hamburger-tabs-01-icon live-casino-tab"></span>
                                                        <span class="rj-hamburger-tabs-01-title">真人</span>
                                                    </a>
                                                </sb-tab-trigger>
                                            </div>
                                            <div class="rj-hamburger-tabs-01-outer" onclick="openPlatform('Layoutslot',this);">
                                                <sb-tab-trigger data-tab-link="LeftNav_HamburgerNavigationCasinoBlock_54065" data-tab-default="false" data-tab-trigger="true">
                                                    <a class="rj-hamburger-tabs-01">
                                                        <span class="rj-hamburger-icon icon rj-hamburger-tabs-01-icon live-casino-tab"></span>
                                                        <span class="rj-hamburger-tabs-01-title">電子</span>
                                                    </a>
                                                </sb-tab-trigger>
                                            </div>
                                            <div class="rj-hamburger-tabs-01-outer" onclick="openPlatform('Layoutsport',this);">
                                                <sb-tab-trigger data-tab-link="LeftNav_SportsHamburgerBlock_54102" data-tab-default="true" data-tab-trigger="true">
                                                    <a class="rj-hamburger-tabs-01">
                                                        <span class="rj-hamburger-icon icon rj-hamburger-tabs-01-icon i-o-hamburger-sports"></span>
                                                        <span class="rj-hamburger-tabs-01-title">體育</span>
                                                    </a>
                                                </sb-tab-trigger>
                                            </div>
                                            <div class="rj-hamburger-tabs-01-outer" onclick="openPlatform('Layoutchess',this);">
                                                <sb-tab-trigger data-tab-link="LeftNav_HamburgerNavigationCasinoBlock_45188" data-tab-default="false" data-tab-trigger="true">
                                                    <a class="rj-hamburger-tabs-01">
                                                        <span class="rj-hamburger-icon icon rj-hamburger-tabs-01-icon i-o-hamburger-gaming"></span>
                                                        <span class="rj-hamburger-tabs-01-title">棋牌</span>
                                                    </a>
                                                </sb-tab-trigger>
                                            </div>
                                            <div class="rj-hamburger-tabs-01-outer" onclick="openPlatform('lotteryType',this);">
                                                <sb-tab-trigger data-tab-link="LeftNav_HamburgerNavigationCasinoBlock_45188" data-tab-default="false" data-tab-trigger="true">
                                                    <a class="rj-hamburger-tabs-01">
                                                        <span class="rj-hamburger-icon icon rj-hamburger-tabs-01-icon i-o-hamburger-gaming"></span>
                                                        <span class="rj-hamburger-tabs-01-title">彩票</span>
                                                    </a>
                                                </sb-tab-trigger>
                                            </div>
                                            <div class="rj-hamburger-tabs-01-outer" onclick="openPlatform('Layoutcompetition',this);">
                                                <sb-tab-trigger data-tab-link="LeftNav_HamburgerNavigationCasinoBlock_54056" data-tab-default="false" data-tab-trigger="true">
                                                    <a class="rj-hamburger-tabs-01">
                                                        <span class="rj-hamburger-icon icon rj-hamburger-tabs-01-icon more-tab"></span>
                                                        <span class="rj-hamburger-tabs-01-title">捕魚</span>
                                                    </a>
                                                </sb-tab-trigger>
                                            </div>
                                        </sb-tabs-triggers>
                                    </div>
                                    <div class="rj-hamburger-tabs-01-blocks rj-hamburger-tabs-scrolling">
                                        <sb-tabs-blocks data-tabs-wrapper="true">
                                            <sb-tabs-block data-tab-block="active" data-tab-link="LeftNav_SportsHamburgerBlock_54102" class="" style="opacity: 1;">
                                                <sb-tabs-content data-tab-content="true">
                                                    <div id="LeftNav_SportsHamburgerBlock_54102">
                                                        <sb-comp>
                                                            <nav class="rj-hamburger-tabs-01-nav isHidden" id="Layoutsport">

                                                                <?php
                                                                $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                                                                ?>
                                                                @foreach($sports as $v)
                                                                    <a class="rj-hamburger-tabs-01-link "
                                                                       href="javascript:void(0)" game-box="avia"
                                                                       onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif"
                                                                    ><span
                                                                                class="rj-hamburger-tabs-01-link-title">{{ $v['name'] }}</span></a>
                                                                @endforeach
                                                            </nav>
                                                            <nav class="rj-hamburger-tabs-01-nav isHidden" id="lotteryType">
                                                                <?php
                                                                $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                                                                ?>
                                                                @foreach($lottery as $v)
                                                                    <a class="rj-hamburger-tabs-01-link "
                                                                       href="javascript:void(0)" game-box="avia"
                                                                       onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif"
                                                                    ><span
                                                                                class="rj-hamburger-tabs-01-link-title">{{ $v['name'] }}</span></a>
                                                                @endforeach
                                                            </nav>
                                                            <nav class="rj-hamburger-tabs-01-nav isHidden" id="Layoutlive">
                                                                <?php
                                                                $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                                                                ?>
                                                                @foreach($live as $v)
                                                                <a class="rj-hamburger-tabs-01-link "
                                                                   href="javascript:void(0)" game-box="avia"
                                                                   onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif"
                                                                ><span
                                                                            class="rj-hamburger-tabs-01-link-title">{{ $v['name'] }}</span></a>
                                                                    @endforeach
                                                            </nav>
                                                            <nav class="rj-hamburger-tabs-01-nav isHidden" id="Layoutchess">
                                                                <?php
                                                                $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                                                                ?>
                                                                @foreach($poker as $v)
                                                                    <a class="rj-hamburger-tabs-01-link "
                                                                       href="javascript:void(0)" game-box="avia"
                                                                       onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1');"
                                                                    ><span
                                                                                class="rj-hamburger-tabs-01-link-title">{{ $v['name'] }}</span></a>
                                                                @endforeach
                                                            </nav>
                                                            <nav class="rj-hamburger-tabs-01-nav isHidden" id="Layoutslot">
                                                                <?php
                                                                $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                                                                ?>
                                                                @foreach($slot as $v)
                                                                    <a class="rj-hamburger-tabs-01-link "
                                                                       href="javascript:void(0)" game-box="avia"
                                                                       onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1');"
                                                                    ><span
                                                                                class="rj-hamburger-tabs-01-link-title">{{ $v['name'] }}</span></a>
                                                                @endforeach
                                                            </nav>
                                                            <nav class="rj-hamburger-tabs-01-nav isHidden" id="Layoutcompetition">
                                                                <?php
                                                                $fish = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish');
                                                                ?>
                                                                @foreach($fish as $v)
                                                                    <a class="rj-hamburger-tabs-01-link "
                                                                       href="javascript:void(0)" game-box="avia"
                                                                       onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif"
                                                                    ><span
                                                                                class="rj-hamburger-tabs-01-link-title">{{ $v['name'] }}</span></a>
                                                                @endforeach
                                                            </nav>
                                                        </sb-comp>
                                                    </div>
                                                </sb-tabs-content>
                                            </sb-tabs-block>

                                        </sb-tabs-blocks>
                                    </div>
                                </div>
                            </sb-tabs>
                        </div>
                    </sb-comp>
                </div>
                {{--@if (systemseting["down_android"].ToString() != "")
                    {
                    <div id="master-container-LeftNav_HTMLBlock_46687" class="">
                        <div id="html-container-LeftNav_HTMLBlock_46687">
                            <div class="sbChat__container rj-hamburger-button-container" style="">
                                <a href="@systemseting["down_android"]" class="sbChat__available rj-hamburger-button rj-hamburger-button-chat" style="">
                                <!-- Live chat -->
                                <span class="rj-hamburger-button-icon i-o-hamburger-chat icon"></span>
                                @*<img src="~/Areas/Wap9/Content/images/main/anzhuo.png" />*@
                                </a>

                            </div>
                        </div>
                    </div>
                    }
                    @if (systemseting["down_ios"].ToString() != "")
                        {
                        <div id="LeftNav_HamburgerNavigationSettingsButtonBlock_46686" class="rj-hamburger-button-container" data-uat="navigation-settings">
                            <sb-comp>
                                <a href="@systemseting["down_ios"]" class="rj-hamburger-button rj-hamburger-button-settings">
                                <span class="rj-hamburger-button-icon i-o-hamburger-settings icon"></span>
                                @*<img src="~/Areas/Wap9/Content/images/main/IOS.png" />*@
                                </a>
                            </sb-comp>
                        </div>
                        }--}}
            </section>
        </div>
    </div>
</div>
<!--提示框-->
<sb-resp-popup-portal class="rj-popup-portal user-info__popup user-info__popup--login isHidden">
    <sb-resp-popup-overlay onclick="closeNotify()"></sb-resp-popup-overlay>
    <sb-resp-popup-content class="">
        <div class="rj-popup-message rj-popup-message--notification user-info__popup user-info__popup--login">
            <div class="rj-popup-message__body">
                <div class="rj-popup-message__body-content">
                    <div class="rj-popup-message__body-html" data-uat="popup-message">
                        <div id="errorText"></div>
                        <div id="Center_LoginResponsiveBlock_45088-error-popup" onclick="closeNotify()" class="auth-form__error--popup">关闭</div>
                    </div>
                    <div class="rj-popup-message__body-buttons" data-uat="popup-message-body-buttons"></div>
                </div>
            </div>
        </div>
    </sb-resp-popup-content>
</sb-resp-popup-portal>
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
            <img class="fa-reply" src="{{ asset('wap/theme3/images/return.png') }}" onclick="closeNoticeContent()" />
            <img class="fa-times" src="{{ asset('wap/theme3/images/closeNotice.png') }}" onclick="closeNotices()" />
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

<input type="hidden"  id="userNameController" @if($_member) value="true" @endif />
</body>

</html>


<script>
    //judgeOldAndNew();//老带新判断
    //getGamePlate(1,"");//加载左侧子菜单
    //getMaintain();//网站维护
    //biCommon.getUserMoneys();//获取用户余额

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
                    }
                }
            })
            @endif
        @endif
        $("#leftList").children("div").first().click();
        $(window).on("scroll", function () {
            if ($(this).scrollTop() > 800) {
                $("a#gotoTop").addClass("isShown");
            } else {
                $("a#gotoTop").removeClass("isShown");
            }
        });

        //getUserMoney();//获取用户余额，每隔六秒请求一次
    })



</script>
