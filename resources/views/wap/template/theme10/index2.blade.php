
<!DOCTYPE html>
<html style='height: 100%'>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no" name="format-detection">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
    <meta name="env" content="stage">
    <meta name="csrf-token" content="ZeQipUdvBNrJPGLcfKIEuKmvLgjaEInNkWLn1ya0">
    <meta name="notify-msg" content="">
    <meta name="notify-type" content="">

    
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.ico">
	<link rel="stylesheet prefetch" href="/new0404/css/bootstrap.min.css">
	<link rel="stylesheet" href="/new0404/css/Language_tw.css?202204071330">
	<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>

    <title></title>
    <script src="/new0404/js/app.js"></script>
	<script src="/new0404/js/qrcode.min.js"></script>
	<script src="/new0404/js/Language.js"></script>
	<script src="/new0404/js/Config.js"></script>
	<script src="/new0404/js/Public.js"></script>
	<script src="/new0404/js/Public.js"></script>
	<script src="/new0404/js/imagesloaded.pkgd.min.js"></script>
	 
	<!-- <script type="text/javascript" src="https://static.runoob.com/assets/qrcode/qrcode.min.js"></script> -->

    <script>
        window.langName = 'cn';

        var data = [
            {element: 'link', attribute: {href: '/new0404/css/pay_icon_new.css', rel: 'stylesheet'}},
            {element: 'link', attribute: {href: '/new0404/css/swiper.min.css', rel: 'stylesheet'}},
            {element: 'link', attribute: {href: '/new0404/css/game_hall_new.css', rel: 'stylesheet', onload: function(){$(function(){$('.body-pages').show();})}}},
            {element: 'link', attribute: {href: '/new0404/css/game_hell_new_extend.css', rel: 'stylesheet'}},
            {element: 'link', attribute: {href: '/new0404/css/new_ui.css"', rel: 'stylesheet'}},
            {element: 'link', attribute: {href: '/new0404/css/login_lx.css?202204042350', rel: 'stylesheet'}},
        ];
        Public.loadExternal(data);
    </script>
    <script>
        if(Public.GetConfig('ISAPP') == true)
        {
            var head = document.getElementsByTagName('head')[0];
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'cordova.js';
            head.appendChild(script); 
        }
    </script>
</head>

<!-- 隱藏loadin倒數 body class移除no-scroll、 pages-loading-box class增加ani display:none; -->
<body ontouchstart="" style='height: 100%;'>
    <div class='body-pages' style='height: 100%; overflow: auto; display: block;'>
        <div class="whileBac" style="height:30px;width: 100%;display: none;"></div>
        <!-- loading box -->
        <div class="pages-loading-box home ani" style="display: none;">
            <div class="loading-icon" style="width: 100%;">
                <div class="half-circle-spinner">
                    <div class="circle circle-1"></div>
                    <div class="circle circle-2"></div>
                </div>
                <p>Loading...</p>
            </div>
            <div id="pages-loading-banner" class="pages-loading-banner">
                <!-- <div class="swiper-container guide-swiper-container">
                    <div class="swiper-wrapper guide-photo-wrapper">
                        <div class="swiper-slide guide-photo">
                            <img id='logo' alt="">
                            <img id='backGround' alt="">
                        </div>
                        <div class="swiper-slide guide-photo">
                            <img src="images/loading/guide-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div> -->
                <!-- <a class="btn pages-loading-enter">
                    <span class="cercle">0</span><span class="text_184"></span>
                </a> -->
            </div>
        </div>
        <!-- 體育公告圖 -->
        <div class="pages-loading-box2 SportImg" style="background-color: rgba(0,0,0,0.6);">
          
            <div class="Img3" style="display: none;">
                <div class="swiper-slide guide-photo">
                    <div class="swiper-slide guide-photo">
                    <div class="SportMImg" style="background: url(/images/SportMImg4.png) center center / 73% 100% no-repeat;"></div>
                </div>
                </div>
                <div class="SportMask3">
                    <div class="XImg"></div>
                </div>
            </div>
            <div class="Img4" style="display: initial;">
                <div class="swiper-slide guide-photo">
                    <div class="SportMImg" style="background: url(/images/SportMImg4.png) center center / 73% 100% no-repeat;"></div>
                </div>
                <div class="SportMask4">
                    <div class="XImg"></div>
                </div>
            </div>
            <div class="Img2" style='display: none;'>
                <div class="swiper-slide guide-photo">
                    <div class="swiper-slide guide-photo">
                    <div class="SportMImg" style="background: url(/images/SportMImg4.png) center center / 73% 100% no-repeat;"></div>
                </div>
                </div>
                <div class="SportMask2">
                    <div class="XImg"></div>
                </div>
            </div>
            <div class="Img1" style="display: none;">
                <div class="swiper-slide guide-photo">
                    <div class="SportMImg" style="background: url(/images/SportMImg4.png) center center / 73% 100% no-repeat;"></div>
                </div>
                <div class="SportMask1">
                    <div class="XImg"></div>
                </div>
            </div>
            <!-- <div class="Img" style='display: none;'>
                <div class="swiper-slide guide-photo">
                    <div class="SportMImg">
                        <div class="gamelist-content" style="height: 100%; width: 100%;">
                            <div class="game-btn" groupid="171" hall='GAMEONE' gameType='' style="height: 100%!important; width: 100%;"></div>
                        </div>
                    </div>
                    <div class="SportMImg2">
                        <div class="SportMImg3btn" style="position: relative;width: 59%;height: 14%;top: 83%;left: 21%;cursor: pointer;"></div>
                    </div>
                </div>
                <div class="SportMask">
                    <div class="XImg"></div>
                </div>
            </div> -->
        </div>
        <!-- 美女公告圖 -->
        <!-- <div class="pages-loading-box3 BulletinImg" style="display: none;">
            <div class="swiper-slide guide-photo">
                <img class="welcomeImg">
            </div>
        </div> -->
        <!-- show system error -->
        <div class="system-bar-box">
            <div class="system-bar error ani">
                <span class="icon"></span>
                <p class="message"></p>
            </div>
        </div>
        <!-- 懸浮按鈕 -->
        <!-- <div class="liveTV game-btn" groupid="138" hall="OBSPORT" gametype="0">
            <img class="liveTV-img">
        </div> -->
        <!-- main content -->
        <!-- 自訂 id='main-container' -->
        <div id='main-container' class="main-container" id="root-app" style="display: none;">
            <div id="changeBgm-dialog" class="modal after-close nekstayle_sound changeBgm-dialog fade" style="display:none; height: 295px; margin-top: 130px;">
                <div class="modal-content neka_sound" style="height: 289px;">
                    <div class="game-window-title">
                        <h1 style="font-size: 17px; color: #fff" class="text_185"></h1>
                        <!-- <a class="btn-close-video_sound"></a> -->
                    </div>
                   <!--  <div class="switch-container_sound">
                        <div class="dbox">
                            <p class="text_186"></p>
                            <p class="pbox"><span class="box_background"></span></p>
                        </div>
                        <div class="dbox" style="display: none;">
                            <p class="text_187"></p>
                            <p class="pbox"><span class="box_welcome"></span></p>
                        </div>
                    </div> -->
                </div>
                <a data-pop='changeBgm-dialog' class="modal-close btn-close"></a>
            </div>
            <div class="context home-context">
                <!-- <a data-menu="speed" data-pop="speed-dialog" class="speed-measuring fix-bottom-btn btn-pop" style="position: absolute; right: 0px; top: 20px; font-size: 10px; z-index: 102">- s</a> -->
                <!-- 頂部固定區 -->
                <div class="home-fix-top-box">
                    <div class='logo-title'></div>
                    <div style="height: 100%;width: 78%;display: flex;align-items: center;justify-content: flex-end;">
                        <div class="home-login"></div>
                        <div class="home-register"></div>
                        <div class="home-account-display">
                            <div class="home-account-box">
                                <!-- <div class="home-account-img"></div> -->
                                <div class="home-account-vipLogo0"></div>
                                <div class="home-account-vipLogo1"></div>
                                <div class="home-account"></div>
                            </div>
                        </div>
                        <div class="home-logout"></div>
                        <div class="box_background"></div>
                        <div class="box_welcome" style="display: none;"></div>
                        <div class="language-box">
                            <div class="language-setting">
                                <a class="btn-language">
                                    <!-- <span class="language-flag-icon flag-icon"></span> -->
                                    <span class="language-flag-icon-tw flag-icon"></span>
                                    <span class="language-flag-icon-en flag-icon"></span>
                                    <span class="language-flag-icon-th flag-icon"></span>
                                    <!-- <span class="language-flag-icon-vn flag-icon"></span> -->
                                </a>
                                <div class="language-select">
                                    <!-- <span class="lang-cn"></span> -->
                                    <span class="lang-tw"></span>
                                    <span class="lang-en"></span>
                                    <span class="lang-th"></span>
                                    <!-- <span class="lang-vn"></span> -->
                                </div>
                            </div>
                        </div>
                        <!-- <a data-page-name="news" class="btn-news btn-pages btn-news-icon">
                            <i></i>
                        </a> -->
                    </div>
                </div>
                <!-- 廣告輪播區 -->
                <div class="home-swiper-wrapper">
                    <!-- <div class="min-setting">
                        <a id="btn-setting" class="btn-setting">
                            <span class="close-icon" style="display: none;"></span>
                            <span class="setting-icon" style="display: block;"></span>
                        </a> 
                        <div id="box-setting" style="display: none;">
                            <a id="btn-sound" class="btn-sound close on">
                                <span data-menu="changeBgm" data-pop="changeBgm-dialog" class="sound-icon fix-bottom-btn btn-pop"></span>
                            </a>
                            <a class="btn-language">
                                <span class="language-flag-icon flag-icon"></span>
                                <span class="language-flag-icon-en flag-icon"></span>
                                <span class="language-flag-icon-tw flag-icon"></span>
                                <span class="language-flag-icon-vn flag-icon"></span>
                            </a>
                            <div class="language-select">
                                <span class="lang-cn"></span>
                                <span class="lang-en"></span>
                                <span class="lang-tw"></span>
                                <span class="lang-vn"></span>
                            </div>
                            <a class="apiSpeed fix-bottom-btn btn-pop" data-pop="speed-dialog"></a>
                            <a class="version">
                                <span class="number"></span>
                            </a>
                        </div>
                    </div> -->

                    <div class="swiper-container home-swiper-container">
                        <div class="swiper-wrapper banner">
                            <!-- <div class="swiper-slide">
                                <img class='banner03'>
                            </div> -->
                            <div class="swiper-slide">
                                <img class='banner05'>
                            </div>
                            <div class="swiper-slide">
                                <img class='banner01'>
                            </div>
                            <div class="swiper-slide">
                                <img class='banner02'>
                            </div>                            
                            <div class="swiper-slide">
                                <img class='banner04'>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <!-- 中間按鈕條 -->
                <div class="home-link-bar">
                    <!-- 跑馬燈區 -->
                    <div class="marquee-box">
                        <div class="marquee-img"></div>
                        <div class="home-marquee">
                            <div class="marquee">
                                <p></p>
                            </div>
                        </div>
                        <!-- <div class="hotevents-img"></div> -->
                    </div>
                    <!-- 個人資料與存提款 -->
                    <div class="tab">
                        <div class="tab-left">
                            <div class="onlineusers">
                                <div class="onlineusersimg text_385">:
                                    <span class="onlinepeople">63000</span>
                                </div>
                            </div>
                            <!-- <p><span id='account' class="person-name" style="font-size: 3vmin; color: #b1987f; font-weight: 400;"></span><i></i></p> -->
                            <div class="moneystyle">
                                <span id='money' class="mark-txt"></span>
                                <span id='lockmoney' class="mark-txt"></span>
                            </div>
                        </div>
                        <div class="tab-right">
                            <!-- <div class="tab-right-btn trans-btn">
                                <div class="transfer-icon"></div>
                                <h4 class="text_446" style="color:#b1987f; font-size: 3vmin; font-weight: 400;"></h4>
                                <h4 class="text_447" style="color:#b1987f; font-size: 3vmin; font-weight: 400;"></h4>
                            </div> -->
                            <div class="tab-right-btn btn-pop" data-pop="memberReport-dialog">
                                <div class="mr-home-Ico" style="margin: -10px auto auto auto;"></div>
                                <h4 class="mr-center-Btn" style="color:#b1987f; font-size: 3vmin; font-weight: 400;"></h4>
                            </div>
                            <div class="tab-right-btn btn-pop" data-pop="recharge-dialog">
                                <div class="deposit-icon"></div>
                                <h4 class="text_290" style="color:#b1987f; font-size: 3vmin; font-weight: 400;"></h4>
                                <h4 style="height: 3vmin;"></h4>
                            </div>
                            <div class="tab-right-btn btn-pop" data-pop="withdraw-dialog">
                                <div class="withdraw-icon"></div>
                                <h4 class="text_292" style="color:#b1987f; font-size: 3vmin; font-weight: 400;"></h4>
                                <h4 style="height: 3vmin;"></h4>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <a data-page-name="wallet-center" class="home-link-btn btn-pages header-nav nav-recharge">
                        <span>充提中心</span>
                    </a>
                    <a data-pop="about-dialog" class="header-nav btn-pop nav-agent is-close">
                        <span>加盟代理</span>
                    </a>
                    <a id="accountSet" data-pop="wt-dialog" class="header-nav btn-pop nav-accountSet" style="display: none;">
                        <span class="text_9"></span>
                    </a>
                    <a id="accountNote" data-pop="accountNote-dialog" class="header-nav btn-pop nav-accountNote" style="display: none;">
                        <span class="text_10"></span>
                    </a> -->
                    <!-- 自訂id='free-play' -->
                    <!-- <a id='free-play' class="home-link-btn free-play header-nav nav-trial start-free-play">
                        <span style="color:#e60d0d; font-weight: bold;" class="text_5"></span>
                    </a>
                    <a class="header-nav home-link-btn nav-trial logout" style="display: none;">
                        <span style="color:#e60d0d; font-weight: bold;" class="text_12"></span>
                    </a> -->
                </div>
                <!-- 主項目 -->
                <div class="home-content">
                    <!-- 遊戲清單 -->
                    <!-- 自訂 id='gamelist-wrapper'-->
                    <div id='gamelist-wrapper' class="gamelist-wrapper">
                        <div class="gamelist-item">
                            <div class="gameitem gameone active" gamelistBtn="gameone">
                                <div class="gameitem-gameone-img"></div>
                                <span class="gameitem-text text_23"></span>
                            </div>
                            <div class="gameitem live" gamelistBtn="live">
                                <div class="gameitem-live-img"></div>
                                <span class="gameitem-text text_295"></span>
                            </div>
                            <div class="gameitem chess" gamelistBtn="chess">
                                <div class="gameitem-chess-img"></div>
                                <span class="gameitem-text text_299"></span>
                            </div>
                            <div class="gameitem slotgame" gamelistBtn="slotgame">
                                <div class="gameitem-slotgame-img"></div>
                                <span class="gameitem-text text_298"></span>
                            </div>
                            <div class="gameitem fish" gamelistBtn="fish">
                                <div class="gameitem-fish-img"></div>
                                <span class="gameitem-text text_931"></span>
                            </div>
                            <div class="gameitem" gamelistBtn="sport">
                                <div class="gameitem-sport-img"></div>
                                <span class="gameitem-text text_294"></span>
                            </div>
                            <div class="gameitem lottery" gamelistBtn="lottery">
                                <div class="gameitem-lottery-img"></div>
                                <span class="gameitem-text text_296"></span>
                            </div>
                            <div class="gameitem livegame" gamelistBtn="livegame">
                                <div class="gameitem-livegame-img"></div>
                                <span class="gameitem-text text_377"></span>
                            </div>
                            <div class="gameitem eSports" gamelistBtn="eSports">
                                <div class="gameitem-eSports-img"></div>
                                <span class="gameitem-text text_297"></span>
                            </div>
                            <!-- <div class="gameitem liveBroadcast" gamelistBtn="liveBroadcast">
                                <div class="gameitem-liveBroadcast-img"></div>
                                <span class="gameitem-text text_398"></span>
                            </div> -->
                        </div>
                        <div class="gamelist-content">
                            <div class="gamelist-type active" gamelistType="gameone">
                                <div class="game-btn gamelist-row" groupid="171" hall="GAMEONE" gametype="">
                                    <div class="gameImage-GAMEONEChess"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="138" hall="OBSPORT" gametype="0">
                                    <div class="gameImage-OBSPORTSport"></div>
                                </div>
                                <div class="game-btn gamelist-row comingsoon" groupid="" hall="GAMEONESLOT" gametype="0">
                                    <div class="gameImage-GAMEONESlotgame"></div>
                                </div>
                            </div>
                            <div class="gamelist-type" gamelistType="live">
                                <div class="game-btn gamelist-row" groupid="249" hall="WELIVE">
                                    <div class="gameImage-WELIVE"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="70" hall="DG">
                                    <div class="gameImage-DGLiveCasino"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="21" hall="Lixinlive">
                                    <div class="gameImage-WM"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="113" hall="SEXYLIVE" gametype="LIVE" gameid="SEXYBCRT">
                                    <div class="gameImage-SEXYLiveCasino"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="114" hall="EVO">
                                    <div class="gameImage-EVOLiveCasino"></div>
                                </div>
                            </div>

                            <div class="gamelist-type" gamelistType="chess">
                                <div class="game-btn gamelist-row" groupid="171" hall="GAMEONE" gametype="">
                                    <div class="gameImage-GAMEONEChess"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="184" hall="BAISONCHESS" gametype="">
                                    <div class="gameImage-BAISONCHESS"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="132" hall="BOLE" gametype="">
                                    <div class="gameImage-BOLEChess"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="60" hall="KAIYUAN">
                                    <div class="gameImage-KAIYUANChess"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="72" hall="LEG" gametype="0">
                                    <div class="gameImage-LEGChess"></div>
                                </div>
                                <!-- <div class="game-btn gamelist-row" groupid="194" hall="DASHENGCHESS" gametype="0">
                                    <div class="gameImage-DASHENGCHESS"></div>
                                </div> -->
                                <div class="game-btn gamelist-row" groupid="66" hall="VG" gametype="1000">
                                    <div class="gameImage-VGChess"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="21" hall="LIXINLIVE" viewsite="5" ui="2">
                                    <div class="gameImage-WMChess"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="129" hall="YABOCHESS" gametype="0">
                                    <div class="gameImage-OBChess"></div>
                                </div>
                            </div>

                            <div class="gamelist-type" gamelistType="slotgame">
                                <div class="game-btn gamelist-col electronicgames btn-pages" groupid="116" data-page-name="JOKER">
                                    <div class="gameImage-JOKERSlotgame"></div>
                                </div>
                                <div class="game-btn gamelist-col electronicgames btn-pages" groupid="54" data-page-name="CQ9">
                                    <div class="gameImage-CQ9Slotgame"></div>
                                </div>
                                <div class="game-btn gamelist-col" groupid="43" hall="JDB" gametype="">
                                    <div class="gameImage-JDBSlotgame"></div>
                                </div>
                                <!-- <div class="game-btn gamelist-col electronicgames btn-pages" groupid="84" data-page-name="KA">
                                    <div class="gameImage-KASlotgame"></div>
                                </div> -->
                                <div class="game-btn gamelist-col electronicgames btn-pages" groupid="44" data-page-name="EC">
                                    <div class="gameImage-MWSlotgame"></div>
                                </div>
                                <div class="game-btn gamelist-col electronicgames btn-pages" groupid="95" data-page-name="DRAGOONSOFT">
                                    <div class="gameImage-DSSlotgame"></div>
                                </div>
                                <!-- <div class="game-btn gamelist-col electronicgames btn-pages" groupid="236" data-page-name="YGHASHSLOT">
                                    <div class="gameImage-YGHASHSlotgame"></div>
                                </div> -->
                                <div class="game-btn gamelist-col electronicgames btn-pages" groupid="243" data-page-name="SWGSLOT">
                                    <div class="gameImage-SWGSlotgame"></div>
                                </div>
                                <!-- <div class="game-btn gamelist-col electronicgames btn-pages" groupid="130" data-page-name="FUNKY">
                                    <div class="gameImage-FUNKYSlotgame"></div>
                                </div> -->
                                <!-- <div class="game-btn gamelist-col electronicgames btn-pages" groupid="147" data-page-name="ICG">
                                    <div class="gameImage-ICGSlotgame"></div>
                                </div> -->
                            </div>

                            <div class="gamelist-type" gamelistType="fish">
                                <div class="game-btn gamelist-row" groupid="56" hall="JDB" gametype="7001">
                                    <div class="gameImage-JDBFish"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="65" hall="CQ9" gametype="AB3">
                                    <div class="gameImage-CQ9Fish"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="48" hall="EC" gametype="千炮捕鱼(H5)" gameid="1051">
                                    <div class="gameImage-MWFish"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="184" hall="BAISONCHESS" gametype="">
                                    <div class="gameImage-BAISONFish"></div>
                                </div>
                            </div>

                            <div class="gamelist-type" gamelistType="sport">
                                <div class="game-btn gamelist-row" groupid="251" hall="BAOLISPORT" gametype="0">
                                    <div class="gameImage-BAOLISPORT"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="214" hall="CRSPORT" gametype="0">
                                    <div class="gameImage-CRSPORT"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="138" hall="OBSPORT" gametype="0">
                                    <div class="gameImage-OBSPORTSport"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="25" hall="SBO" gametype="0">
                                    <div class="gameImage-SBO"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="187" hall="YLSPORT" gametype="0">
                                    <div class="gameImage-YLSPORT"></div>
                                </div>
                                <!-- <div class="game-btn gamelist-row" groupid="4" hall="BBIN" gametype="FT">
                                    <div class="gameImage-BBINSport"></div>
                                </div> -->
                                <!-- <div class="game-btn gamelist-row" groupid="50" hall="SB" gametype="0">
                                    <div class="gameImage-SBSport"></div>
                                </div> -->
                            </div>

                            <div class="gamelist-type" gamelistType="lottery">
                                <div class="game-btn gamelist-row" groupid="29" hall="HAOCAI" gametype="0">
                                    <div class="gameImage-WMLottery"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="89" hall="VRSINGLE" gametype="1">
                                    <div class="gameImage-VRLottery"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="15" hall="DIOS" gametype="LO">
                                    <div class="gameImage-APLLottery"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="88" hall="GONE" gametype="1">
                                    <div class="gameImage-GONELottery"></div>
                                </div>
                            </div>

                            <div class="gamelist-type" gamelistType="livegame">
                                <div class="game-btn gamelist-row" groupid="159" hall="SEXYLIVE" gametype="LIVE" gameid="SV-LIVE-001">
                                    <div class="gameImage-CF"></div>
                                </div>
                            </div>

                            <div class="gamelist-type" gamelistType="eSports">
                                <div class="game-btn gamelist-row" groupid="145" hall="AVIA" gametype="0">
                                    <div class="gameImage-AVIA"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="215" hall="XIAOAIESPORT" gametype="0">
                                    <div class="gameImage-XIAOAIESPORT"></div>
                                </div>
                                <div class="game-btn gamelist-row" groupid="216" hall="LEIHUOESPORT" gametype="0">
                                    <div class="gameImage-LEIHUOESPORT"></div>
                                </div>
                            </div>
                            
                            <!-- <div class="gamelist-type" gamelistType="liveBroadcast">
                                <div class="gamelist-col game-btn" groupid="112" hall="LIVE">
                                    <div class="gameImage-liveBroadcast" livelisturl=''></div>
                                </div>
                                <div class="gamelist-col game-btn" groupid="112" hall="LIVE">
                                    <div class="gameImage-liveBroadcast2" livelisturl=''></div>
                                </div>
                                <div class="gamelist-col game-btn" groupid="112" hall="LIVE">
                                    <div class="gameImage-liveBroadcast3" livelisturl=''></div>
                                </div>
                                <div class="gamelist-col game-btn" groupid="112" hall="LIVE">
                                    <div class="gameImage-liveBroadcast4" livelisturl=''></div>
                                </div>
                                <div class="gamelist-col game-btn" groupid="112" hall="LIVE">
                                    <div class="gameImage-liveBroadcast5" livelisturl=''></div>
                                </div>
                                <div class="gamelist-col game-btn" groupid="112" hall="LIVE">
                                    <div class="gameImage-liveBroadcast6" livelisturl=''></div>
                                </div>
                                <div class="gamelist-col game-btn" groupid="112" hall="LIVE">
                                    <div class="gameImage-liveBroadcast7" livelisturl=''></div>
                                </div>
                                <div class="gamelist-col game-btn" groupid="112" hall="LIVE">
                                    <div class="gameImage-liveBroadcast8" livelisturl=''></div>
                                </div>
                            </div> -->      
                        </div>
                    </div>
                </div>
                <!-- 底部按鈕 -->
                <div class="home-fix-bottom-box">
                    <a data-menu="home" class="fix-bottom-btn active">
                        <span class="fix-bottom-btn-icon btn-1"></span>
                        <strong class="home-fix-bottom-text text_39"></strong>
                    </a>
                    <a data-menu="event" data-pop="event-dialog" class="fix-bottom-btn btn-pop">
                        <span class="fix-bottom-btn-icon btn-2"></span>
                        <strong class="home-fix-bottom-text text_42"></strong>
                    </a>
                    <a data-menu="mobile" data-pop="mobile-dialog" class="fix-bottom-btn mobile-download btn-pop">
                        <span class="fix-bottom-btn-icon btn-3"></span>
                        <strong class="home-fix-bottom-text text_11"></strong>
                    </a>
                    <a data-menu="service" data-pop="service-dialog" class="fix-bottom-btn btn-service">
                        <span class="fix-bottom-btn-icon btn-4"></span>
                        <strong class="home-fix-bottom-text text_44"></strong>
                    </a>
                    <!-- 客服QRcode -->
                    <!-- <a data-menu="serviceqr" data-pop="serviceqr-dialog" class="fix-bottom-btn btn-pop">
                        <span class="fix-bottom-btn-icon btn-3"></span>
                        <strong class="home-fix-bottom-text text_44"></strong>
                    </a> -->
                    <a data-page-name="user-center" data-menu="user" class="fix-bottom-btn btn-pages">
                        <span class="fix-bottom-btn-icon btn-5"></span>
                        <strong class="home-fix-bottom-text text_40"></strong>
                    </a>
                </div>
            </div>
        </div>
        <!-- 登入介面 -->
        <div class="login-wrapper" style="display: none;">
            <div class="login-box">
                <div class="login-title">
                    <div class="text_3" style="font-size: 5vmin; font-weight: 600; color: #000;"></div>
                    <!-- <span class="login-close"></span> -->
                </div>
                <div class="login-logo"></div>
                <div class="login-content">
                    <div class="input-box account">
                        <input type="text" id="account" style="font-size: 14px;">
                    </div>
                    <div class="input-box pwd">
                        <input type="password" id="password" style="font-size: 14px;">
                    </div>
                    <div class="remember_forget">
                        <div class="remember_box">
                            <div id="btn_remember"></div>
                            <div class="remember_pwd remember_box_text text_1"></div>
                        </div>
                        <div class="forget_pwd remember_box_text text_288">？</div>
                    </div>
                    <div class="login-btn-login text_3" id="btn-login"></div>
                    <div class="login-btn-registion text_951" id="btn-login-registion"></div>
                    <div class="login-gohome text_289" id="btn-gohome"></div>
                </div>
            </div>
        </div>
        
        <!-- pages content -->
        <div class="pages-container">
            <a data-link="" class="close-btn"></a>
            <!-- 個人中心 -->
            <div data-page-name="user-center" class="pages-main page-user-center-main">
                <div class="header">
                    <div class="title" style="height: 10.7vmin;">
                        <div class="title-text text_335"></div>
                        <div class="title-config">
                            <div class="config btn-pages user-center-item" data-page-name="security-settings"></div>
                            <a class="news btn-pages user-center-item" data-page-name="news"><span class="unread" style="display: none;">0</span></a>
                        </div>
                    </div>
                    <div class="info">
                        <div class="info-img"></div>
                        <div class="info-data">点击登录/注册</div>
                    </div>
                    <div class="center">
                        <!-- <div class="center-left vip">
                            <div class="center-img vip"></div>
                            <div class="center-text1 vip text_8"></div>
                            <div class="center-text2 vip">VIP PRIVILEGE</div>
                        </div> -->
                        <div class="center-right task btn-pages user-center-item" data-page-name="offer">
                            <div class="center-img task"></div>
                            <div class="center-text1 task text_932"></div>
                            <div class="center-text2 task">TASK CENTER</div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="tab-item mymoney btn-pages user-center-item" data-page-name="wallet-center">
                            <div class="tab-img mymoney"></div>
                            <div class="tab-text mymoney text_338"></div>
                        </div>
                        <div class="tab-item betrecord btn-pages user-center-item" data-page-name="person-report">
                            <div class="tab-img betrecord"></div>
                            <div class="tab-text betrecord text_339"></div>
                        </div>
                        <div class="tab-item transactionrecord btn-pages user-center-item" data-page-name="accounting-records">
                            <div class="tab-img transactionrecord"></div>
                            <div class="tab-text transactionrecord text_340"></div>
                        </div>
                    </div>
                    <!-- <div class="tab">
                        <div class="tab-item cardmanagement btn-pop" data-pop="add-card-dialog">
                            <div class="tab-img cardmanagement"></div>
                            <div class="tab-text cardmanagement text_341"></div>
                        </div>
                    </div> -->
                </div>
                <div class="content">
                    <!-- <div class="content-row">
                        <div class="content-row-box btn-pages user-center-item" data-page-name="content-help">
                            <div class="icon help"></div>
                            <div class="title text_342"></div>
                            <div class="remark text_343"></div>
                            <img class="more" />
                        </div>
                    </div> -->
                    <div class="content-row">
                        <div class="content-row-box btn-pages user-center-item" data-page-name="BankManagement">
                            <div class="icon redeem-record"></div>
                            <div class="title text_1040"></div>
                            <!-- <div class="remark"></div> -->
                            <img class="more" />
                        </div>
                        <!-- <div class="content-row-box btn-pop user-center-item" data-pop="invite-dialog">
                            <div class="icon redeem-record"></div>
                            <div class="title">推廣</div>
                            <img class="more" />
                        </div> -->
                        <div class="content-row-box btn-pop user-center-item" data-pop="memberReport-dialog">
                            <div class="icon redeem-record"></div>
                            <div class="title mr-center-Btn"></div>
                            <img class="more" />
                        </div>
                    </div>
                    <!-- <div class="content-row no-bottom btn-pages user-center-item" data-page-name="about">
                        <div class="content-row-box">
                            <div class="icon about"></div>
                            <div class="title text_344"></div>
                            <div class="remark"></div>
                            <img class="more" />
                        </div>
                    </div> -->
                    <!-- <div class="content-row no-bottom btn-pages user-center-item" data-page-name="join">
                        <div class="content-row-box">
                            <div class="icon join"></div>
                            <div class="title text_345"></div>
                            <div class="remark text_346"></div>
                            <img class="more" />
                        </div>
                    </div> -->
                    <!-- <div class="content-row btn-pop" data-pop="invite-dialog">
                        <div class="content-row-box">
                            <div class="icon share-app"></div>
                            <div class="title text_347"></div>
                            <div class="remark"></div>
                            <img class="more" />
                        </div>
                    </div> -->
                    <!-- <div class="content-row mobile-download btn-pop" data-menu='mobile'>
                        <div class="content-row-box">
                            <div class="icon app"></div>
                            <div class="title text_348"></div>
                            <div class="remark"></div>
                            <img class="more" />
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- 公告 -->
            <div data-page-name="news" data-link="user-center" class="pages-main news-main">
                <div class="pages-header">
                    <h1 class="text_66"></h1>
                </div>
                <div class="pages-content">
                    <!-- 自訂 id='table' -->
                    <div id='table' class="news-wrapper">
                        <div class="tab-box">
                            <!-- 自訂 id='system' -->
                            <a id='system' class="tab-btn active">
                                <span class="text_67"></span>
                            </a>
                            <!-- 自訂 id='user' -->
                            <a id='user' class="tab-btn">
                                <span class="text_68" style="font-size: 15px;"></span>
                            </a>
                        </div>
                        <div class="news-con-main">
                            <!-- 自訂 id='tbody' -->
                            <div id='tbody' class="news-con news-system">
                                <!-- 內容 -->
                                <!-- <div class="news-article-box">
                                    <p class="news-date">2017-03-20</p>
                                    <div class="news-article hidden">
                                        <h1 class="title">公告标题公告标题公告标题</h1>
                                        <p class="content">公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文</p>
                                        <a class="switch-btn">
                                            <span>阅读全文</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="news-article-box">
                                    <p class="news-date">2017-03-20</p>
                                    <div class="news-article hidden">
                                        <h1 class="title">公告标题公告标题公告标题</h1>
                                        <p class="content">公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文公告内文</p>
                                        <a class="switch-btn">
                                            <span>阅读全文</span>
                                        </a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 優惠申請 -->
            <div data-page-name="offer" data-link="user-center" class="pages-main news-main">
                <div class="pages-header">
                    <h1 class="text_337"></h1>
                </div>
                <div class="pages-content">
                    <!-- 自訂 id='table' -->
                    <div id='table' class="news-wrapper">
                        <div class="tab-box">
                            <!-- 自訂 id='system' -->
                            <a id='offerApply' class="tab-btn active">
                                <span class="text_70" style="font-size: 14px;"></span>
                            </a>
                            <!-- 自訂 id='user' -->
                            <a id='offerFree' class="tab-btn">
                                <span class="text_71" style="font-size: 14px;"></span>
                            </a>
                        </div>
                        <div class="news-con-main">
                            <!-- 自訂 id='tbody' -->
                            <div id='tbody' style="padding: 0px 5px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 安全設置 -->
            <div data-page-name="security-settings" data-link="user-center" class="pages-main security-main">
                <div class="pages-header">
                    <h1 class="text_72"></h1>
                </div>
                <div class="pages-content">
                    <div class="security-settings-wrapper">
                        <div class="content-row no-bottom btn-pop" data-pop="change-pwd-dialog">
                            <div class="content-row-box">
                                <div class="title text_63"></div>
                                <img class="more" />
                            </div>
                        </div>
                        <div class="content-row btn-pop" data-pop="change-pwd-safe-dialog">
                            <div class="content-row-box">
                                <div class="title text_62"></div>
                                <img class="more" />
                            </div>
                        </div>
                        <div class="content-row logout">
                            <div class="content-row-box">
                                <div class="title text_53"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 充值中心 -->
            <div data-page-name="wallet-center" data-link="user-center" class="pages-main wallet-center-main">
                <div class="pages-header">
                    <h1 class="text_76"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                            <div class="money-box">
                                <div class="title text_220"></div>
                                <strong class="money">¥0.00</strong>
                            </div>
                            <a data-pop="recharge-dialog" class="list-item btn-pop user-center-btn">
                                <div class="icon icon1">
                                    <span class="text_54"></span>
                                </div>
                            </a>
                            <a data-pop="withdraw-dialog" class="list-item btn-pop user-center-btn">
                                <div class="icon icon2">
                                    <span class="text_55"></span>
                                </div>
                            </a>
                        </div>
                        <div class="wallet-records-con">
                            <h1 class="text_79"></h1>
                            <table class="acc-table acc-table-1">
                                <thead>
                                    <tr>
                                        <th class="acenter th text_80"></th>
                                        <th class="acenter th text_81"></th>
                                        <th class="acenter th text_82"></th>
                                        <th class="acenter th text_83"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td class="acenter" style="width: 26%;">2018-03-11 13:43:23</td>
                                        <td class="acenter" style="width: 23%;">充值</td>
                                        <td class="acenter" style="width: 26%;">500</td>
                                        <td class="acenter">
                                            <p class="txt-green">已儲值</p>
                                        </td>
                                    </tr>
                                    <tr class="denial_reason" style="display:none;">
                                        <td colspan="4" style=" background-color: rgb(218, 217, 218); font-size: 14px; padding: 8px; color: rgb(0, 0, 0);">拒绝原因：</td>
                                    </tr>
                                    <tr>
                                        <td class="acenter" style="width: 26%;">2018-03-11 13:43:23</td>
                                        <td class="acenter" style="width: 23%;">充值</td>
                                        <td class="acenter" style="width: 26%;">500</td>
                                        <td class="acenter">
                                            <p class="showSanjiao txt-red">已拒絕<i class="icon-xiajiantou"></i></p>
                                        </td>
                                    </tr>
                                    <tr class="denial_reason" style="display:none;">
                                        <td colspan="4" style=" background-color: rgb(218, 217, 218); font-size: 14px; padding: 8px; color: rgb(0, 0, 0);">拒绝原因：</td>
                                    </tr>
                                    <tr>
                                        <td class="acenter" style="width: 26%;">2018-03-11 13:43:23</td>
                                        <td class="acenter" style="width: 23%;">提現</td>
                                        <td class="acenter" style="width: 26%;">500</td>
                                        <td class="acenter">
                                            <p class="">待處理</p>
                                        </td>
                                    </tr>
                                    <tr class="denial_reason" style="display:none;">
                                        <td colspan="4" style=" background-color: rgb(218, 217, 218); font-size: 14px; padding: 8px; color: rgb(0, 0, 0);">拒绝原因：</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 下线管理 -->
            <div data-page-name="member-manager" data-link="user-center" class="pages-main member-manager">
                <div class="pages-header">
                    <h1 class="text_58"></h1>
                </div>
                <div class="pages-content">
                    <div class="member-manager-wrapper">
                        <!-- 下线管理內容未定 -->
                        <!-- <p style="width: 100vw; max-width: 620px; margin-left: -20px; background: #000; height: 40px; line-height:40px; text-align: center;">即将推出</p> -->
                        <div class="member-manager-list">
                            <a data-pop="invite-dialog" id="neek_add" class="member-manager-item btn-pop">
                                <div class="icon icon1">
                                    <span class="text_85"></span>
                                </div>
                            </a>
                            <!-- <a class="member-manager-item">
                                <div class="icon icon2">
                                    <span>新增代理</span>
                                </div>
                            </a> -->
                            <a data-page-name="layer-member" class="member-manager-item btn-pages">
                                <div class="icon icon3">
                                    <span class="text_87"></span>
                                </div>
                            </a>
                            <!-- <a class="member-manager-item">
                                <div class="icon icon4">
                                    <span>代理列表</span>
                                </div>
                            </a> -->
                            <a data-page-name="layer-member-report" class="member-manager-item btn-pages">
                                <div class="icon icon5">
                                    <span class="text_89"></span>
                                </div>
                            </a>
                            <a data-menu="set-bouns" data-pop="set-bouns-dialog-st" class="member-manager-item btn-pop">
                            <!-- <a data-page-name="set-bouns-report" class="member-manager-item btn-pop"> -->
                                <div class="icon icon6">
                                    <span class="text_90"></span>
                                </div>
                            </a>    
                            <!-- <a style="opacity: .3" class="member-manager-item">
                                <div class="icon">
                                    <span style="opacity: 0">----</span>
                                </div>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- 變帳紀錄 -->
            <div data-page-name="accounting-records" data-link="user-center" class="pages-main accounting-records">
                <div class="pages-header">
                    <h1 class="text_57"></h1>
                </div>
                <div class="pages-content scroll">
                    <div class="accounting-records-wrapper">
                        <div class="search-bar-con">
                            <form>
                                <div class="row">
                                    <!-- 自訂 id='startTime' -->
                                    <input class="startTime date" type="date">
                                    <!-- <input id='startTime' class="date" type="date"> -->
                                    <!-- 自訂 id='endTime' -->
                                    <input class="endTime date" type="date">
                                    <!-- <input id='endTime' class="date" type="date"> -->
                                    <!-- 自訂 id='submit' 修正 type="btn" to type="button" -->
                                    <input id='submit_record' class="acc-btn-1 submit" type="button">
                                </div>
                                <div class="row">
                                    <!-- 自訂 id='type' -->
                                    <select id='type' class="col-10">
                                        <!-- <option value="532">在线存款</option>
                                        <option value="531">手工存款</option>
                                        <option value="541">支付码存款</option>
                                        <option value="533">提款</option>
                                        <option value="534">红利</option>
                                        <option value="523">返水</option>
                                        <option value="535">人工异动</option>
                                        <option value="524">点数转移</option> -->
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="data-table-con">
                            <!-- 自訂 id='report' -->
                            <table id='report' class="acc-table acc-table-1" style="table-layout: fixed;">
                                <thead>
                                    <tr>
                                        <th class="text_77"></th>
                                        <th class="text_78" style="width:35%"></th>
                                        <th class="text_82" style="width:20%"></th>
                                        <th class="text_83"></th>
                                    </tr>
                                </thead>
                                <tbody><!-- 
                                    <tr>
                                        <td><p>2018-03-26<br> 13:10:12</p></td>
                                        <td class="acenter">百家乐</td>
                                        <td class="acenter">-100.00</td>
                                        <td class="acenter"></td>
                                    </tr>
                                    <tr>
                                        <td><p>2018-03-26<br> 13:10:12</p></td>
                                        <td class="acenter">百家乐</td>
                                        <td class="acenter">-100.00</td>
                                        <td class="acenter"></td>
                                    </tr>
                                    <tr>
                                        <td><p>2018-03-26<br> 13:10:12</p></td>
                                        <td class="acenter">百家乐</td>
                                        <td class="acenter">-100.00</td>
                                        <td class="acenter"></td>
                                    </tr>
                                    -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="fix-data-con">
                    <!-- 自訂 id='footer' -->
                    <table id='footer' class="acc-table acc-table-2">
                        <thead>
                            <!-- <th class="acenter">總計</th>
                            <th class="aright">0</th> -->
                        </thead>
                    </table>
                </div>
            </div>
            <!-- 個人報表 -->
            <div data-page-name="person-report" data-link="user-center" class="pages-main person-report">
                <div class="pages-header">
                    <h1 class="text_56"></h1>
                </div>
                <div class="pages-content scroll">
                    <div class="person-report-wrapper">
                        <div class="search-bar-con">
                            <form>
                                <div class="row">
                                    <!-- 自訂 id='startTime' -->
                                    <input class="startTime date" type="date">
                                    <!-- <input id='startTime' class="date" type="date"> -->
                                    <!-- 自訂 id='endTime' -->
                                    <input class="endTime date" type="date">
                                    <!-- <input id='endTime' class="date" type="date"> -->
                                    <!-- 自訂 id='submit' 修正 type="btn" to type="button" -->
                                    <input id='submit' class="acc-btn-1 submit" type="button">
                                </div>
                                <div class="row">
                                    <select class="col-10 gameHall">
                                        <!-- <option value="">全部类型</option> -->
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="data-table-con">
                            <!-- 自訂 id='report' -->
                            <table id='report' class="acc-table acc-table-1">
                                <thead>
                                    <tr>
                                        <th width="22%" class="text_77"></th>
                                        <th width="20%" class="text_98"></th>
                                        <th width="15%" class="aright text_82"></th>
                                        <th width="18%" class="aright text_241"></th>
                                        <th width="15%" class="aright text_84"></th>
                                        <th width="15%" class="text_83"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!--<tr>
                                        <td><p>2018-03-26 <br> 13:10:12</p></td>
                                        <td class="acenter">百家乐</td>
                                        <td class="aright">-100.00</td>
                                        <td class="aright">6589.00</td>
                                    </tr>
                                    <tr>
                                        <td><p>2018-03-26 <br> 13:10:12</p></td>
                                        <td class="acenter">百家乐</td>
                                        <td class="aright">-100.00</td>
                                        <td class="aright">6589.00</td>
                                    </tr>
                                    <tr>
                                        <td><p>2018-03-26 <br> 13:10:12</p></td>
                                        <td class="acenter">百家乐</td>
                                        <td class="aright">-100.00</td>
                                        <td class="aright">6589.00</td>
                                    </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="fix-data-con">
                    <!-- 自訂 id='footer' -->
                    <table id='footer' class="acc-table acc-table-2">
                        <thead>
                            <!-- <th width="25%"></th>
                            <th width="25%" class="acenter">總計</th>
                            <th width="25%" class="aright">0</th>
                            <th width="25%" class="aright">0</th> -->
                        </thead>
                    </table>
                </div>
            </div>
            <!-- 下級列表 -->
            <div data-page-name="layer-member" data-link="member-manager" class="pages-main scroll layer-member">
                <div class="pages-header">
                    <h1 class="text_87"></h1>
                </div>
                <div class="pages-content scroll">
                    <div class="layer-member-wrapper">
                        <div class="data-table-con">
                            <table class="acc-table acc-table-1">
                                <thead>
                                    <tr>
                                        <th class="text_99"></th>
                                        <!-- <th class="aright text_100"></th> -->
                                        <th class="acenter text_101"></th>
                                        <th class="acenter text_102"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td class="acenter">a234567891012</td>
                                        <td class="aright"><p class="txt-green">500,000,000</p></td>
                                        <td class="acenter"><p class="txt-red">500,000,000</p></td>
                                        <td data-menu="set-bouns1" data-pop="set-bounsch-dialog" class="btn-pop acenter">
                                            <a class="btn-more"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>a234567891012</td>
                                        <td class="aright"><p class="txt-green">500,000,000</p></td>
                                        <td class="aright"><p class="txt-red">500,000,000</p></td>
                                        <td class="aright"><a class="btn-more"></a></td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 下线报表 -->
            <div data-page-name="layer-member-report" data-link="member-manager" class="pages-main scroll person-report">
                <div class="pages-header">
                    <h1 class="text_89"></h1>
                </div>
                <div class="pages-content scroll">
                    <div class="person-report-wrapper">
                        <!-- <div class="tab-box">
                            <a class="tab-btn active"><span>下线</span></a>
                            <a class="tab-btn"><span>代理</span></a>
                        </div> -->
                        <!-- <div class="sub-con-main"> -->
                            <div class="search-bar-con">
                                <form>
                                    <div class="row">
                                        <!-- 修正 type="btn" to type="button" -->
                                        <input class="startTime date" type="date">
                                        <input class="endTime date" type="date">
                                        <!-- <input id="startTime" class="date" type="date">
                                        <input id="endTime" class="date" type="date"> -->
                                        <input class="acc-btn-1 submit" type="button" id="layer-member-report-submit">
                                    </div>
                                    <div class="row">
                                        <select class="col-10 gameHall">
                                            <!-- <option value="">全部类型</option> -->
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="data-table-con">
                                <!-- <h1>报表查询</h1>
                                <div class="member-box-con">
                                    <div class="list-title-con">
                                        <p class="username">用户名</p>
                                        <a class="btn-more">查看</a>
                                    </div> -->
                                    <table class="acc-table acc-table-1">
                                        <thead>
                                            <tr>
                                                <th class="acenter text_80" width="15%"></th>
                                                <th class="acenter text_103" width="10%"></th>
                                                <th class="acenter text_104" width="15%"></th>
                                                <th class="aright text_82" width="15%"></th>
                                                <th class="aright text_241" width="18%"></th>
                                                <th class="aright text_84" width="15%"></th>
                                                <th class="acenter text_83" width="15%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <!--<tr>
                                                <td>2018-03-01</td>
                                                <td class="acenter">百家乐</td>
                                                <td class="aright"><p class="txt-red">-100.00</p></td>
                                            </tr>
                                            <tr>
                                                <td>2018-03-01</td>
                                                <td class="acenter">百家乐</td>
                                                <td class="aright"><p class="txt-green">50.00</p></td>
                                            </tr>-->
                                        </tbody>
                                    </table>
                                <!-- </div>
                                <div class="member-box-con">
                                    <div class="list-title-con">
                                        <p>用户名 aaa888168</p>
                                        <a class="btn-more">查看</a>
                                    </div>
                                    <table class="acc-table acc-table-1">
                                        <thead>
                                            <tr>
                                                <th class="aleft">日期</th>
                                                <th class="acenter">類型</th>
                                                <th class="aright">盈虧</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2018-03-01</td>
                                                <td class="acenter">百家乐</td>
                                                <td class="aright"><p class="txt-red">-100.00</p></td>
                                            </tr>
                                            <tr>
                                                <td>2018-03-01</td>
                                                <td class="acenter">百家乐</td>
                                                <td class="aright"><p class="txt-green">50.00</p></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> -->
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
                <div class="fix-data-con">
                    <!-- 自訂 id='footer' -->
                    <table id='footer' class="acc-table acc-table-2">
                        <thead></thead>
                    </table>
                </div>
            </div>
            <!-- 推廣查詢-->
            <div data-page-name="invite-report" data-link="user-center" class="pages-main scroll invite-report">
                <div class="pages-header">
                    <h1 class="text_61"></h1>
                </div>
                <div class="pages-content">
                    <div class="invite-report-wrapper">
                        <div class="tab-box">
                            <a class="tab-btn active">
                                <span class="text_105"></span>
                            </a>
                            <a class="tab-btn">
                                <span class="text_106"></span>
                            </a>
                        </div>
                        <div class="sub-con-main">
                            <div class="invite-data-con">
                                <p class="text_105">
                                    <span>6</span> &nbsp;&nbsp;&nbsp; 历史收益:
                                    <span class="txt-green">60</span>
                                </p>
                                <table class="acc-table acc-table-1">
                                    <thead>
                                        <tr>
                                            <th class="aleft">日期</th>
                                            <th class="aleft">类型</th>
                                            <th class="aleft">帐号</th>
                                            <th class="aright">状态</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aleft">2018-03-15</td>
                                            <td class="aleft">QQ</td>
                                            <td class="aleft">12457896@qq.com</td>
                                            <td class="aright">
                                                <p class="txt-green">获得10币</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 微投助手 -->
            <div data-page-name="content-help" data-link="user-center" class="pages-main page-content-help-main">
                <div class="pages-header">
                    <h1 class="text_43"></h1>
                </div>
                <div class="pages-content">
                    <section class="section profile-setting">
                        <a data-page-name="icon-tixian" class="content-help-item item-1 btn-pages">
                            <span class="icon help_1"><i></i></span>
                            <span class="text_107"></span>
                        </a> 
                        <a data-page-name="icon-Forma" class="content-help-item item-2 btn-pages">
                            <span class="icon help_2"><i></i></span> 
                            <span class="text_108"></span>
                        </a>
                        <a data-page-name="icon-zhanghaobangding" class="content-help-item item-3 btn-pages">
                            <span class="icon help_3"><i></i></span>
                            <span class="text_109"></span>
                        </a>
                        <a data-page-name="icon-xiazai" class="content-help-item item-4 btn-pages">
                            <span class="icon help_4"><i></i></span>
                            <span class="text_110"></span>
                        </a>
                        <a data-page-name="icon-qinglihuancun" class="content-help-item item-5 btn-pages">
                            <span class="icon help_5"><i></i></span>
                            <span class="text_111"></span>
                        </a>
                        <a data-page-name="icon-shibinqiazhu" class="content-help-item item-6 btn-pages">
                            <span class="icon help_6"><i></i></span>
                            <span class="text_112"></span>
                        </a>
                        <a data-page-name="icon-dns" class="content-help-item item-7 btn-pages">
                            <span class="icon help_7"><i></i></span>
                            <span class="text_113"></span>
                        </a>
                        <a data-page-name="icon-Forma1" class="content-help-item item-8 btn-pages">
                            <span class="icon help_8"><i></i></span>
                            <span class="text_114"></span>
                        </a>
                    </section>
                </div>
            </div>
            <!-- 充值教程 -->
            <div data-page-name="icon-tixian" data-link="content-help" class="pages-main icon-tixian">
                <div class="pages-header">
                    <h1 class="text_107"></h1>
                </div>
                <div class="pages-content">
                    <div class="icon-tixian-wrapper">
                        <div class="icon-tixian-list">
                            <img class="help_recharge" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- 提现教程 -->
            <div data-page-name="icon-Forma" data-link="content-help" class="pages-main icon-Forma">
                <div class="pages-header">
                    <h1 class="text_108"></h1>
                </div>
                <div class="pages-content">
                    <div class="icon-Forma-wrapper">
                        <div class="icon-Forma-list">
                            <img class="help_withdraw" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- 帐号绑定教程 -->
            <div data-page-name="icon-zhanghaobangding" data-link="content-help" class="pages-main icon-zhanghaobangding">
                <div class="pages-header">
                    <h1 class="text_109"></h1>
                </div>
                <div class="pages-content">
                    <div class="icon-zhanghaobangding-wrapper">
                        <div class="icon-zhanghaobangding-list">
                            <img class="help_bind" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- APP下载安装教程 -->
            <div data-page-name="icon-xiazai" data-link="content-help" class="pages-main icon-xiazai">
                <div class="pages-header">
                    <h1 class="text_110"></h1>
                </div>
                <div class="pages-content">
                    <div class="icon-xiazai-wrapper">
                        <div class="icon-xiazai-list">
                            <img class="help_down" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>         
            <!-- 手机清理缓存教程 -->
            <div data-page-name="icon-qinglihuancun" data-link="content-help" class="pages-main icon-qinglihuancun">
                <div class="pages-header">
                    <h1 class="text_111"></h1>
                </div>
                <div class="pages-content">
                    <div class="icon-qinglihuancun-wrapper">
                        <div class="icon-qinglihuancun-list">
                            <img class="help_clear" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- 视频卡住、延迟切换线路方法 -->
            <div data-page-name="icon-shibinqiazhu" data-link="content-help" class="pages-main icon-shibinqiazhu">
                <div class="pages-header">
                    <h1 class="text_112"></h1>
                </div>
                <div class="pages-content">
                    <div class="icon-shibinqiazhu-wrapper">
                        <div class="icon-shibinqiazhu-list">
                            <img class="help_line" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- 本地IP及DNS查询方法 -->
            <div data-page-name="icon-dns" data-link="content-help" class="pages-main icon-dns">
                <div class="pages-header">
                    <h1 class="text_113"></h1>
                </div>
                <div class="pages-content">
                    <div class="icon-dns-wrapper">
                        <div class="icon-dns-list">
                            <a href="http://ceba.quansucloud.com/wstCeba/local/local-test.action" style="position: absolute; width: 64%; height: 23%; top: 49%; left: 20%; z-index: 99;"><span style="color: rgb(0, 33, 234); font-weight: 700; word-break: break-all;">http://ceba.quansucloud.com/wstCeba/local/local-test.action</span></a>
                            <img class="help_dns" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- 如何生成推广二维码 -->
            <div data-page-name="icon-Forma1" data-link="content-help" class="pages-main icon-Forma1">
                <div class="pages-header">
                    <h1 class="text_114"></h1>
                </div>
                <div class="pages-content">
                    <div class="icon-Forma1-wrapper">
                        <div class="icon-Forma1-list">
                            <img class="help_qrcode" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- 關於 -->
            <div data-page-name="about" data-link="user-center" class="pages-main security-main">
                <div class="pages-header">
                    <h1 class="text_344"></h1>
                </div>
                <div class="pages-content">
                    <div class="about-wrapper">
                        <img class="image1" />
                        <img class="image2" />
                        <div class="aboutContent" style="width: 90%;margin: 0 auto;text-align: left;">
                            
                        </div>
                        <!-- <img class="image3" /> -->
                    </div>
                </div>
            </div>
            <!-- 加入我們 -->
            <div data-page-name="join" data-link="user-center" class="pages-main security-main">
                <div class="pages-header">
                    <h1 class="text_346"></h1>
                </div>
                <div class="pages-content">
                    <div class="join-wrapper">
                        <div class='swiper-wrapper'>
                            <div class="swiper-slide">
                                <div class="content">
                                    <img class="image1" />
                                    <p class="text text_349">？</p>
                                    <img class="image2" />
                                    <div class="content-box">
                                        <div class="content-row">
                                            <div class="icon"><div class="qq"></div></div>
                                            <div class="title">
                                                <p class="text_379"></p>
                                                <!-- <p id='672011783'>672011783</p> -->
                                            </div>
                                            <!-- <div class="copy text_351" data-clipboard-text="672011783"></div> -->
                                        </div>
                                        <!-- <div class="content-row submit text_345">
                                            
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="content2">
                                    <h2 class="text_352"></h2>
                                    <p class="text1 text_353"></p>
                                    <div class="content-box">
                                        <ul>
                                            <li>
                                                <img class="image1">
                                                <p class="text_354"></p>
                                                <p class="text_355"></p>
                                            </li>
                                            <li>
                                                <img class="image2">
                                                <p class="text_356"></p>
                                                <p class="text_357"></p>
                                            </li>
                                            <li>
                                                <img class="image3">
                                                <p class="text_358"></p>
                                                <p class="text_359"></p>
                                            </li>
                                            <li>
                                                <img class="image4">
                                                <p class="text_360"></p>
                                                <p class="text_361"></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="content3">
                                    <h2 class="text_362"></h2>
                                    <p class="text1 text_363"></p>
                                    <p class="text1 text_364"></p>
                                    <div class="content-box"></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <!-- 銀行卡管理 -->
            <div data-page-name="BankManagement" data-link="user-center" class="pages-main security-main">
                <div class="pages-header">
                    <h1 class="text_1040"></h1>
                </div>
                <div class="pages-content">
                    <div class="BankList-wrapper">
                        <div class="btnline" style="width: 100%; height: 80px;">
                            <div class="addbank text_1039" style="display: none; background: #f1ea91; width: 40%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 5%; float: left;"></div>
                            <div class="addFPS text_1161" style="display: none; background: #f1ea91; width: 40%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 5%; float: left;"></div>
                            <div class="addERC20" style="display: none; background: #f1ea91; width: 44%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 3%; float: left;">USDT-ERC20</div>
                            <div class="addTRC20" style="display: none; background: #f1ea91; width: 44%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 3%; float: left;">USDT-TRC20</div>
                            <!-- <div class="addBEP20" style="display: none; background: #f1ea91; width: 44%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 3%; float: left;">BEP20</div>
                            <div class="addBEP2" style="display: none; background: #f1ea91; width: 44%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px 3%; float: left;">BEP2</div> -->
                            <div class="listtext text_1164" style="display: none; background: #ecd8a8; width: 90%; height: 50px; line-height: 50px; text-align: center; border-radius: 5px; margin: 15px; float: left;"></div>
                        </div>
                        <div class="list" style="display: none; width: 100%;"></div>
                        <div class="text_1162" style="text-align: center; color: #ff2b2b; margin: 5px 20px; display: inline-block;"></div>
                    </div>
                </div>
            </div>
            <!-- USDT教程 -->
            <div data-page-name="USDTTutorial" class="pages-main USDTTutorial">
                <div class="pages-header">
                    <h1 class="USDTTutorialTitle"></h1>
                </div>
                <div class="pages-content">
                    <div class="icon-xiazai-wrapper">
                        <div class="Tutorialdata">
                            <!-- <img class="Tutorial" style="width: 100%;"> -->
                            <!-- <ol style="margin: 15px 0;">
                                <li style="margin-bottom: 10px;"><a href="./images/USDTTutorial_imtoken.pdf" target="_blank">新增幣種及轉帳</a></li>
                                <li style="margin-bottom: 10px;"><a href="./images/USDTTutorial_Openimtoken.pdf" target="_blank">創建專屬電子錢包</a></li>
                                <li><a href="./images/USDTTutorial_Exchange.pdf" target="_blank">虛擬貨幣交易所推介</a></li>
                            </ol> -->
                            
                            <!-- <a style="width: 100%;"><source src="./media/USDTTutorial_imtoken.mp4" type="video/mp4"></video> -->
                            <!-- <div clas="">2.創建專屬電子錢包</div>
                            <video controls style="width: 100%;"><source src="./media/USDTTutorial_Openimtoken.mp4" type="video/mp4"></video>
                            <div clas="">3.虛擬貨幣交易所推介</div>
                            <video controls style="width: 100%; margin-bottom: 60px;"><source src="./media/USDTTutorial_Exchange.mp4" type="video/mp4"></video> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- MG電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="MG" class="pages-main scroll MG electroniclist">
                <div class="pages-header">
                    <h1 class="text_223"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                            <!-- <a hall='MG' gametype='' gameid='' class="gamelist-item">
                                <div class="gamelist">
                                    <div class="game-image" style="background-image: url(https://img-t.oltgzn888.com/img21/mobile/images/game/mg/jurassicWorld.png); background-repeat: no-repeat; background-position: center;"></div>
                                    <span>MG老虎机</span>
                                </div>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- PT電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="PLAYTECH" class="pages-main scroll PLAYTECH electroniclist">
                <div class="pages-header">
                    <h1 class="text_115"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                            <!-- <a hall='PLAYTECH' gametype='' gameid='' class="gamelist-item">
                                <div class="gamelist">
                                    <div class="game-image" style="background-image: url(https://img-t.oltgzn888.com/img21/mobile/images/game/playtech/fday.jpg); background-repeat: no-repeat; background-position: center;"></div>
                                    <span>PT电子</span>
                                </div>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- KA電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="KA" class="pages-main scroll KA electroniclist">
                <div class="pages-header">
                    <h1 class="text_116"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                            <!-- <a hall='PLAYTECH' gametype='' gameid='' class="gamelist-item">
                                <div class="gamelist">
                                    <div class="game-image" style="background-image: url(https://img-t.oltgzn888.com/img21/mobile/images/game/KA/fday.jpg); background-repeat: no-repeat; background-position: center;"></div>
                                    <span>PT电子</span>
                                </div>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- JDB電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="JDB" class="pages-main scroll JDB electroniclist">
                <div class="pages-header">
                    <h1 class="text_319"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                        </div>
                    </div>
                </div>
            </div>

            <!-- PLAYNGO電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="PLAYNGO" class="pages-main scroll PLAYNGO electroniclist">
                <div class="pages-header">
                    <h1 class="text_224"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                        </div>
                    </div>
                </div>
            </div>

            <!-- CQ9電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="CQ9" class="pages-main scroll CQ9 electroniclist">
                <div class="pages-header">
                    <h1 class="text_320"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                        </div>
                    </div>
                </div>
            </div>

            <!-- MW電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="EC" class="pages-main scroll EC electroniclist">
                <div class="pages-header">
                    <h1 class="text_321"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                        </div>
                    </div>
                </div>
            </div>

            <!-- SG電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="MERCHANT" class="pages-main scroll MERCHANT electroniclist">
                <div class="pages-header">
                    <h1 class="text_322"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                        </div>
                    </div>
                </div>
            </div>

            <!-- DS電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="DRAGOONSOFT" class="pages-main scroll DRAGOONSOFT electroniclist">
                <div class="pages-header">
                    <h1 class="text_327"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                        </div>
                    </div>
                </div>
            </div>

            <!-- JOKER電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="JOKER" class="pages-main scroll JOKER electroniclist">
                <div class="pages-header">
                    <h1 class="text_381"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                        </div>
                    </div>
                </div>
            </div>

            <!-- FUNKY電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="FUNKY" class="pages-main scroll FUNKY electroniclist">
                <div class="pages-header">
                    <h1 class="text_907"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                        </div>
                    </div>
                </div>
            </div>

            <!-- ICG電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="ICG" class="pages-main scroll ICG electroniclist">
                <div class="pages-header">
                    <h1 class="text_980"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                        </div>
                    </div>
                </div>
            </div>

            <!-- YGHASH電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="YGHASHSLOT" class="pages-main scroll YGHASHSLOT electroniclist">
                <div class="pages-header">
                    <h1 class="text_2006"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                        </div>
                    </div>
                </div>
            </div>

            <!-- SWG電子遊戲 -->
            <!-- data-page-name在js裡有用到gamehall及圖片的資料夾名稱 -->
            <div data-page-name="SWGSLOT" class="pages-main scroll SWGSLOT electroniclist">
                <div class="pages-header">
                    <h1 class="text_2027"></h1>
                </div>
                <div class="pages-content">
                    <div class="wallet-center-wrapper">
                        <div class="wallet-center-list">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 即將推出 -->
        <div class="coming-window">
            <a class="close-btn"></a>
            <div class="game-photo roulette">
                <div class="come-tip-box">
                    <div class="logo-icon wm"></div>
                    <div>
                        <h1 class="text_121"></h1>
                        <p class="text_117"></p>
                    </div>
                </div>
            </div>
            <div class="game-photo niuniu">
                <div class="come-tip-box">
                    <div class="logo-icon wm"></div>
                    <div>
                        <h1 class="text_120"></h1>
                        <p class="text_117"></p>
                    </div>
                </div>
            </div>
            <div class="game-photo sibo">
                <div class="come-tip-box">
                    <div class="logo-icon wm"></div>
                    <div>
                        <h1 class="text_119"></h1>
                        <p class="text_117"></p>
                    </div>
                </div>
            </div>
            <div class="game-photo ky">
                <div class="come-tip-box">
                    <div class="logo-icon ky"></div>
                    <div>
                        <h1 class="text_35"></h1>
                        <p class="text_117"></p>
                    </div>
                </div>
            </div>
            <div class="game-photo lixin-lottery">
                <div class="come-tip-box">
                    <div class="logo-icon wm"></div>
                    <div>
                        <h1 class="text_118"></h1>
                        <p class="text_117"></p>
                    </div>
                </div>
            </div>
            <div class="game-photo jdb">
                <div class="come-tip-box">
                    <div class="logo-icon jdb"></div>
                    <div>
                        <h1>JDB</h1>
                        <p class="text_117"></p>
                    </div>
                </div>
            </div>
            <div class="game-photo vr">
                <div class="come-tip-box">
                    <div class="logo-icon vr"></div>
                    <div>
                        <h1 class=""></h1>
                        <p class="text_117"></p>
                    </div>
                </div>
            </div>
            <div class="game-photo playngo">
                <div class="come-tip-box">
                    <div class="logo-icon playngo"></div>
                    <div>
                        <h1 class="text_122"></h1>
                        <p class="text_117"></p>
                    </div>
                </div>
            </div>
            <div class="game-photo sports-quiz">
                <div class="come-tip-box">
                    <div class="logo-icon wm"></div>
                    <div>
                        <h1 class="text_27"></h1>
                        <p class="text_117"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 活動內頁圖 -->
        <div id="event-scroll-banner" class="swiper-container event-swiper-container">
                <div class="event-banner-list swiper-wrapper event-swiper-wrapper">
                <!-- <div class="swiper-slide event-banner-box swiper-slide-active" style="margin-right: 30px;">
                    <a class="event-banner-close-btn"></a>
                    <div class="scroll-event-con">
                        <div class="event-intro">
                            <img src="http://aplt1.51rattan.cn/lx/upload/87ca93e20497b8cd20035e0d9f59a713.png" width="100%">
                        </div>
                        <div class="event-pagination swiper-pagination-clickable swiper-pagination-bullets">
                            <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button"></span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide event-banner-box">
                    <a class="event-banner-close-btn"></a>
                    <div class="event-photo">
                        <img src="images/event/pre_01.jpg" alt="">
                    </div>
                    <div class="event-pagination"></div>
                    <div class="event-intro">
                        <h3 class="event-title">下载APP领奖金!</h3>
                        <p>活动内容活动内容,活动内容活动内容活动内容活动内容活动内容活动内容,活动内容活动内容活动内容! 活动内容活动内容活动内容!活动内容活动内容活动内容!活动内容活动内容活动内容!活动内容活动内容活动内容!活动内容活动内容活动内容!
                        </p>
                    </div>
                </div>
                <div class="swiper-slide event-banner-box">
                    <a class="event-banner-close-btn"></a>
                    <div class="event-photo">
                        <img src="images/event/pre_02.jpg" alt="">
                    </div>
                    <div class="event-pagination"></div>
                    <div class="event-intro">
                        <h3 class="event-title">绑定网址领奖金</h3>
                        <p>活动内容活动内容,活动内容活动内容活动内容活动内容活动内容活动内容,活动内容活动内容活动内容! 活动内容活动内容活动内容!活动内容活动内容活动内容!活动内容活动内容活动内容!活动内容活动内容活动内容!活动内容活动内容活动内容!
                        </p>
                    </div>
                </div>
                <div class="swiper-slide event-banner-box">
                    <a class="event-banner-close-btn"></a>
                    <div class="event-photo">
                        <img src="images/event/pre_03.jpg" alt="">
                    </div>
                    <div class="event-pagination"></div>
                    <div class="event-intro">
                        <h3 class="event-title">加入主画面领奖金</h3>
                        <p>活动内容活动内容,活动内容活动内容活动内容活动内容活动内容活动内容,活动内容活动内容活动内容! 活动内容活动内容活动内容!活动内容活动内容活动内容!活动内容活动内容活动内容!活动内容活动内容活动内容!活动内容活动内容活动内容!
                        </p>
                    </div>
                </div>
                <div class="swiper-slide event-banner-box">
                    <a class="event-banner-close-btn"></a>
                    <div class="event-photo">
                        <img src="images/event/pre_04.png" alt="">
                    </div>
                    <div class="event-pagination"></div>
                    <div class="event-intro">
                        <div class="invite-wrap">
                            <div class="invite-code">
                                <p>您的邀请码</p>
                                <p class="invite-code-txt">A</p>
                                <p class="invite-code-txt">Q</p>
                                <p class="invite-code-txt">2</p>
                                <p class="invite-code-txt">4</p>
                            </div>
                            <div class="invite-content">
                                <p>邀请您的好友来分享
                                    <span class="mark-txt">WM微博投注</span>的精彩吧! 您和好友即可获得
                                    <span class="mark-txt">10币!</span>
                                </p>
                            </div>
                            <div class="invite-tip">
                                <p>一键邀请</p>
                            </div>
                            <div class="invite-link">
                                <a class="invite-link-btn link-btn-1"></a>
                                <a class="invite-link-btn link-btn-2"></a>
                                <a class="invite-link-btn link-btn-3"></a>
                                <a class="invite-link-btn link-btn-4"></a>
                                <a class="invite-link-btn link-btn-5"></a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>

        <!-- 活動視窗 -->
        <div id="event-dialog" class="modal after-close event-dialog fade">
            <div class="modal-dialog">
                <div class="modal-title text_42"></div>
                <div class="modal-content">
                    <div class="event-item-list">
                        <!-- <a class="event-item hot">
                            <span>会员首充 首充送100%</span>
                        </a>
                        <a class="event-item hot">
                            <span>下载APP领奖金</span>
                        </a>
                        <a class="event-item hot">
                            <span>绑定网址领奖金</span>
                        </a>
                        <a class="event-item hot">
                            <span>加入主画面领奖金</span>
                        </a>
                        <a class="event-item">
                            <span>推广朋友领奖金</span>
                        </a> -->
                    </div>
                </div>
            </div>
            <a data-pop='event-dialog' class="modal-close btn-close"></a>
        </div>

        <!-- 手機下載視窗 -->
        <div id="mobile-dialog" class="modal after-close mobile-dialog fade">
            <div class="modal-dialog">
                <div class="modal-title text_41"></div>
                <div class="modal-content h100">
                    <div class="mobile-download-wrap">
                        <div class="wm-mobile-logos1" style="background: url(./resource/images/logo.svg) center center / 100% no-repeat;"></div>
                            <p class="wm-mobile-logos-txt"></p> <div class="mobile-download-list-btns">
                                <a href="https://fir.im/wmwmm" class="download-btn ios-btn" style="text-decoration: none;">
                                    <div class="icon"></div>
                                    <div class="mobile-download-list-intro">
                                        <h6 class="text_123"></h6>
                                        <p class="text_124"></p>
                                    </div>
                                </a>
                                <a href="http://app.zgnftc.cn/app/lx/android.apk" class="download-btn android-btn " style="text-decoration: none;">
                                <div class="icon"></div>
                                <div class="mobile-download-list-intro">
                                    <h6 class="text_125"></h6>
                                    <p class="text_225"></p>
                                </div>
                            </a>
                        </div>
                        <p class="falseText text_127" style="text-align: center; color: red; display: none;"></p>
                    </div>
                </div>
            </div>
            <a data-pop='mobile-dialog' class="modal-close btn-close"></a>
        </div>

        <!-- 專屬下線視窗 -->
        <div id="invite-dialog" class="modal after-close invite-dialog fade" style="margin-top: -40px!important;">
            <div class="modal-dialog">
                <div class="modal-content h100">
                    <div class="invite-wrap">
                        <div class="invite-photo">
                            <img data-url='' id='qrcode' src=''>
                            <!-- <img src="images/event/pre_04.png" alt=""> -->
                        </div>
                        <div class="invite-content" style="text-align: center;">
                            <p class="message"></p>
                            <p class="memo text_126">！</p>
                            <p class="memo2"></p>
                        </div>

                        <!-- <div class="invite-code">
                            <p>您的邀请码</p>
                            <p class="invite-code-txt">A</p>
                            <p class="invite-code-txt">Q</p>
                            <p class="invite-code-txt">2</p>
                            <p class="invite-code-txt">4</p>
                        </div> -->  
                        <!-- <div class="invite-content">
                            <p>邀请您的好友来分享
                                <span class="mark-txt">WM微博投注</span>的精彩吧! 您和好友即可获得
                                <span class="mark-txt">10币!</span>
                            </p>
                        </div>
                        <div class="invite-tip">
                            <p>一键邀请</p>
                        </div>
                        <div class="invite-link">
                            <a class="invite-link-btn link-btn-1"></a>
                            <a class="invite-link-btn link-btn-2"></a>
                            <a class="invite-link-btn link-btn-3"></a>
                            <a class="invite-link-btn link-btn-4"></a>
                            <a class="invite-link-btn link-btn-5"></a>
                        </div>
                        <a class="invite-records-btn">查看邀请纪录</a> -->
                    </div>

                </div>
            </div>
            <a data-pop='invite-dialog' class="modal-close btn-close"></a>
        </div>

        <!-- 修改畫面 -->
        <!-- 充值金幣視窗 -->
        <div id="recharge-dialog" class="modal after-close recharge-dialog fade">
            <div class="modal-dialog">
                <div class="modal-title text_128"></div>
                <div class="modal-content">
                    <div class="recharge-wrap">
                        <form id="recharge-form">
                            <div class="recharge-tab-btns"></div>
                            <input type="hidden" name="type"/>
                            <div class="recharge-con-main">
                                <div class="recharge-con recharge-wechat active">
                                    <div class="recharge-forms">
                                        <div class="recharge-data">
                                            <div class="Tutorial" style="text-align: center; margin-bottom: 10px; display: none; justify-content: center;">
                                                <a data-page-name="USDTTutorial" type="USDTTutorial_mp4" class="USDTTutorial1 btn-pages Functionbtn text_1176" style="color: #000;"></a>
                                                <a data-page-name="USDTTutorial" type="USDTTutorial_pdf" class="USDTTutorial2 btn-pages Functionbtn text_1177" style="color: #000;"></a>
                                            </div>
                                            <div class="recharge-select-box" style="margin-bottom: 10px;">
                                                <select name="platform">
                                                    <!-- <option value="15">通道一支付</option> -->
                                                </select>
                                            </div>
                                            <div class="recharge-select-box recharge-selectbankcode" style="margin-bottom: 10px; display: none;">
                                                <select name="bankcode">
                                                    <!-- <option value="15">各家銀行</option> -->
                                                </select>
                                            </div>
                                            <div class="recharge-select-box recharge-selectmerchanttype merchanttype" style="margin-bottom: 10px; display: none;">
                                                <select name="merchanttype">
                                                    <!-- <option value="15">各家超商</option> -->
                                                </select>
                                            </div>
                                            <div class="recharge-select-box recharge-selectcointype" style="margin-bottom: 10px; display: none;">
                                                <select name="cointype">
                                                    <!-- <option value="15">貨幣種類</option> -->
                                                </select>
                                            </div>
                                            <div class="recharge-select-box modetype" style="margin-bottom: 10px; display: none;">
                                                <select name="modetype">
                                                    <!-- <option value="15">充值模式種類</option> -->
                                                </select>
                                            </div>
                                            <div class="acc-data recharge-spancointypetext" style="display: none;">
                                                <span class="text_285" style="padding: 0 5px;">:</span>
                                                <span name="cointypetext" style="padding: 0 5px; color: blue;"></span>
                                            </div>
                                            <div class="recharge-custom-input-box" style="color: #000;">
                                                <span>HKD</span>
                                                <input name="money" type="text" style="width: 70%; margin-left: 7px;" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                                                <input name='decimal' hidden>
                                                <a class="decimal" style="height: 20px;position: absolute;right: 36px;top: 50%;transform: translate(0, -50%);color: red;">.00</a>
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box Ratiotruemoney" style="color: #000; display: none;">
                                                <span class="RatioTitle">USDT</span>
                                                <input name='Ratiotruemoney' type="text" style="width: 70%;">
                                                <a id='Ratiotruemoney' class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box truename" style="display: none;">
                                                <input name="truename" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box truename_note" style="color: #868686; font-size: 14px; margin-left: 5px; display: none; "></div>
                                            <div class="recharge-custom-input-box bank_account_name" style="display: none;">
                                                <input name="bank_account_name" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box bank_account" style="display: none;">
                                                <input name="bank_account" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box bankname" style="display: none;">
                                                <input name="bankname" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box mobile" style="display: none;">
                                                <input name="mobile" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box email" style="display: none;">
                                                <input name="email" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box idcard" style="display: none;">
                                                <input name="idcard" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box CSC" style="display: none;">
                                                <input name="CSC" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box expDate" style="display: none;">
                                                <input name="expDate" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box IFSC" style="display: none;">
                                                <input name="IFSC" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box USDTAddress text_1197" style="display: none; color: #44a8d7;">
                                                <input name="USDTAddress" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-PhoneCard" style="display: none; box-shadow: 0 2px 4px rgba(0, 0, 0, .2); background-color: #ffffff; border-radius: 5px;">
                                                <div style="height: 25px; margin-left: 30px;">
                                                    <input class='form-check-input' type='radio' name='phonecardType' value='VTT' checked='checked' />
                                                    <label class='form-check-label text_129' for='inlineRadio1' style='margin-left: -20px;'></label>
                                                </div>
                                                <div style="height: 25px; margin-left: 30px;">
                                                    <input class='form-check-input' type='radio' name='phonecardType' value='VNP' />
                                                    <label class='form-check-label text_130' for='inlineRadio1' style='margin-left: -20px;'></label>
                                                </div>
                                                <div style="height: 25px; margin-left: 30px;">
                                                    <input class='form-check-input' type='radio' name='phonecardType' value='VMS' />
                                                    <label class='form-check-label text_131' for='inlineRadio1' style='margin-left: -20px;'></label>
                                                </div>
                                            </div>
                                            <div class="recharge-custom-input-box recharge-PhoneCard" style="display: none;">
                                                <input name="cardNumber" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="recharge-custom-input-box recharge-PhoneCard"style="display: none;">
                                                <input name="serialNumber" type="text">
                                                <a class="clear-btn"></a>
                                            </div>
                                            <div class="limitmoney" style="font-size: 10px; color: cornflowerblue; text-align: center; margin-top: 15px;"></div>
                                        </div>
                                        <div class="payData recharge-custom-input-box" style="display: none;"></div>
                                        <div class="QRData recharge-custom-input-box" style="display: none;">
                                            <div class="Payplatformtext text_369" style="min-height: 40px; line-height: 40px;"></div>
                                            <div class="PayMoneytext text_372" style="min-height: 40px; line-height: 40px; margin-top: 7px;"></div>
                                            <div class="recharge-onlineQRimg" style="text-align:center; margin-top: 7px;">
                                                <!-- <img class="onlineimg" style="width:150px;"> -->
                                            </div>
                                        </div>

                                        <div class="ratio" style="font-size: 14px;" style="display: none;"></div>

                                        <div class="note" style="font-size: 12px; color: #bda287;"></div>

                                        <div class="recharge-data">
                                            <p class="recharge-user-mony">
                                                <span class="text_45"></span>
                                                <strong>0.00</strong>
                                            </p>
                                            <input type="submit" id="recharge-submit" class="recharge-submit" style="width:100%" value="">
                                            <!-- 自訂 銀行卡存款 -->
                                            <!-- <a data-pop="recharge-service-dialog" class="recharge-submit user-center-btn btn-pop recharge-service recharge-serives text_132"></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <a data-pop='recharge-dialog' class="modal-close btn-close"></a>
        </div>

        <!-- 自訂 充值視窗 -->
        <div id="recharge-service-dialog" class="modal after-close recharge-service-dialog fade">
            <div class="modal-dialog">
                <div class="modal-title text_133"></div>
                <div class="modal-content">
                    <div id='table' class="recharge-wrap">
                        <!-- <div id='tbody' class="recharge-tab-btns">
                            <span class="scroll-tip"></span>
                            <div class='recharge-service-item-btns active'>
                                <div>建设银行</div>
                                <div>8541526354859874</div>
                                <div>郑少秋</div>
                            </div>
                            <div class='recharge-service-item-btns'>
                                <div>建设银行</div>
                                <div>8541526354859874</div>
                                <div>郑少秋</div>
                            </div>
                        </div> -->
                        <div class="recharge-forms">
                            <div class="recharge-custom-radio m0">
                                <div class="recharge-custom-radio-box" style="background:#e8c77a;">
                                    <input type="radio" id="refund" name="refund">
                                    <label for="refund" class="text_133"></label>
                                </div>
                                <ul class="bank-list">
                                </ul>
                            </div>
                            <div class="recharge-custom-input-box">
                                <input id='money' type="text">
                                <a class="point" style="height: 20px;position: absolute;right: 36px;top: 50%;transform: translate(0, -50%);color: red;"></a>
                                <a id='clearMoney' class="clear-btn"></a>
                            </div>
                            <!-- 自訂 div和 textarea id='hnote' -->
                            <div class="recharge-custom-textarea-box">
                                <textarea id='hnote' cols="50" rows="3"></textarea>
                            </div>
                            <!-- 自訂 id='submit' -->
                            <a id='submit' class="recharge-submit text_134"></a>
                            <!-- 自訂 id='cancel' -->
                            <a id='cancel' class="recharge-cancel text_135"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 自訂 a to div id='close' -->
            <div id='close' data-pop='recharge-service-dialog' class="modal-close btn-close"></div>
        </div>

        <!-- 提現視窗 -->
        <div id="withdraw-dialog" class="modal after-close withdraw-dialog fade">
            <div class="modal-dialog">
                <div class="modal-title text_136"></div>
                <div class="modal-content">
                    <div class="recharge-wrap">
                        <div class="recharge-forms">
                            <!-- <div class="text_395" style="font-size: 12px; color: #ff0000;"></div> -->
                            <div class="recharge-custom-input-box">
                                <select id='typename' style="width: 100%;color: #292626;box-shadow: 0 2px 4px rgba(0, 0, 0, .2);border: none;height: 50px;line-height: 50px;border-radius: 5px;padding: 0 5px;background-color: #fff;">
                                    <!-- <option id='alipayToalipay' value='alipayToalipay'></option> -->
                                    <!-- <option id='alipayCar' value='alipayCar'></option> -->
                                    <!-- <option id='fastTurn' value='fastTurn'></option>
                                    <option id='bank' value='bank'></option> -->
                                </select>
                            </div>
                            <div class="tip" style="font-size: 12px; color: currentColor;"></div>
                            <div class="recharge-custom-input-box">
                                <!-- 自訂 id='money' -->
                                <input id='withdraw_money' type="text">
                                <!-- 自訂 id='clearMoney' -->
                                <a id='clearMoney' class="clear-btn"></a>
                            </div>
                            <div class="RatioBtn ratio" style="font-size: 14px; color: #f90000; display: none;"></div>
                            <div class="recharge-custom-input-box notbindcss">
                                <input id='name' type="text" />
                            </div>
                            <div class="recharge-custom-input-box alipayBtn notbindcss" style="display: none;">
                                <input id='alipayAccount' type="text" />
                            </div>
                            <div class="recharge-custom-input-box alipayNumBtn notbindcss" style="display: none;">
                                <input id='alipayNum' type="text" />
                            </div>
                            <div class="recharge-custom-input-box fastTurnNumBtn notbindcss" style="display: none;">
                                <input id='fastTurnNum' type="text" />
                            </div>
                            <div class="recharge-custom-input-box USDTERC20NumBtn notbindcss" style="display: none;">
                                <input id='usdtAccount' type="text" />
                                <span class="USDTratio"></span>
                            </div>
                            <div class="recharge-custom-input-box USDTTRC20NumBtn notbindcss" style="display: none;">
                                <input id='usdtTRC20Account' type="text" />
                                <span class="USDTratio"></span>
                            </div>
                            <div class="recharge-custom-input-box BEP20NumBtn notbindcss" style="display: none;">
                                <input id='bep20Account' type="text" />
                                <span class="BEP20ratio"></span>
                            </div>
                            <div class="recharge-custom-input-box BEP2NumBtn notbindcss" style="display: none;">
                                <input id='bep2Account' type="text" />
                                <span class="BEP2ratio"></span>
                            </div>
                            <div class="recharge-custom-input-box newbankBtn notbindcss" style="display: none;">
                                <input id='newbankName' type="text" />
                            </div>
                            <div class="recharge-custom-input-box newbankBtn notbindcss" style="display: none;">
                                <input id='newbankAccount' type="text" />
                            </div>
                            <div class="recharge-custom-input-box">
                                <div class="text_138">：<span id="auditmoney">0</span></div>
                            </div>
                            <div class="recharge-custom-input-box">
                                <div class="text_139">：<span id="cost">0</span></div>
                            </div>
                            <div class="recharge-custom-input-box">
                                <div class="text_140">：<span id="withdrawalfee">0</span></div>
                            </div>
                            <div class="recharge-custom-input-box">
                                <div>
                                    <div class="text_1183">：<span id="truemoney">0</span></div>
                                    <div class="RatioBtn"><span class="WithdrawalRatio"></span>：<span id="Ratiotruemoney">0</span></div>
                                </div>
                            </div>
                            <!-- 自訂 id='submit' -->
                            <a id='submit' class="recharge-submit text_142"></a>
                            <!-- 自訂 id='cancel' -->
                            <a id='cancel' class="recharge-cancel text_135"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 自訂 a to div id='close' -->
            <div id='close' data-pop='withdraw-dialog' class="modal-close btn-close"></div>
        </div>

        <!-- 關於WM -->
        <div id="about-dialog" class="modal after-close about-dialog fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="about-wrap">
                        <div class="row">
                            <a href="http://wm-hotel.com/#home">
                            <!-- <a href="http://wm-casino.com" target="blank"> -->
                                <img class="about_wm" alt="WM完美娱乐">
                            </a>
                        </div>
                        <div class="row">
                            <a href="http://28m5a03.dayzs.cn/WM01/">
                            <!-- <a href="http://lixin588.com/" target="blank"> -->
                                <img class="cooperation_wm" alt="WM加盟介紹">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <a data-pop='about-dialog' class="modal-close btn-close"></a>
        </div>

        <!-- 帐户信息 -->
        <div id="accountNote-dialog" class="modal after-close accountNote-dialog fade">
            <div class="modal-dialog">
                <div class="modal-title text_10"></div>
                <div class="modal-content h100" style="justify-content: center;">
                    <p class="wm-mobile-logos-txt text_47">：<span id='usernumber' class="person-name"></span></p>
                    <p class="wm-mobile-logos-txt text_48">：<span id='account' class="person-name"></span></p>
                </div>
            </div>
            <a data-pop='accountNote-dialog' class="modal-close btn-close"></a>
        </div>

        <!-- 帳戶登入視窗 -->
        <div id="acc-other-dialog" class="modal after-close acc-other-dialog fade">
            <div class="modal-dialog">
                <div class="modal-content h100">
                    <div class="acc-other-wrap">
                        <h1 class="acc-other-title text_143"></h1>
                        <div class="acc-other-list">
                            <a class="acc-other-icon icon1"></a>
                            <a class="acc-other-icon icon2"></a>
                            <a class="acc-other-icon icon3"></a>
                            <a class="acc-other-icon icon4"></a>
                            <a class="acc-other-icon icon5"></a>
                        </div>
                        <h6>
                            <span class="text_144"></span>
                        </h6>
                        <div class="acc-other-forms">
                            <input type="text" placeholder="输入手机号或邮箱">
                            <input type="password" placeholder="密码">
                            <a class="login-btn text_3"></a>
                        </div>
                        <div class="registered-footer">
                            <a class="registered-forget-btn">
                                <span class="text_145"></span>
                            </a>
                            <a class="registered-txt-btn">
                                <span class="text_146"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <a data-pop='acc-other-dialog' class="modal-close btn-close"></a>
        </div>

        <!-- 語言視窗 -->
        <div id="lang-dialog" class="modal after-close lang-dialog fade">
            <div class="modal-dialog">
                <div class="modal-title text_147"></div>
                <div class="modal-content">
                    <div class="lang-item-list">
                        <a class="lang-item cn active">
                            <i class="flag-icon"></i>
                            <span>简体中文</span>
                        </a>
                        <a href="../en/game-hall.html" class="lang-item en">
                            <i class="flag-icon"></i>
                            <span>English</span>
                        </a>
                    </div>
                </div>
            </div>
            <a data-pop='lang-dialog' class="modal-close btn-close"></a>
        </div>

        <!-- 客服視窗 -->
        <div id="service-dialog" class="modal service-dialog fade">
            <div class="modal-dialog">
                <a data-pop='service-dialog' class="modal-close btn-close"></a>
                <div class="modal-title text_44"></div>
                <div class="modal-content">
                    <ul class="customer-chat">
                        <li class="user-box">
                            <div class="photo">
                                <img class="photo-demo1">
                            </div>
                            <div class="message">
                                <p class="username">Hank Chang
                                    <span>03-21 18:24</span>
                                </p>
                                <p class="chat_info">遊戲怎麼玩?</p>
                            </div>
                        </li>
                        <li class="customer-box">
                            <div class="photo">
                                <img class="photo-demo2">
                            </div>
                            <div class="message">
                                <p class="username">客服
                                    <span>03-21 18:24</span>
                                </p>
                                <p class="chat_info">您好，请问有什么地方能为您服务？</p>
                            </div>
                        </li>
                        <li class="user-box">
                            <div class="photo">
                                <img class="photo-demo1">
                            </div>
                            <div class="message">
                                <p class="username">Hank Chang
                                    <span>03-21 18:24</span>
                                </p>
                                <p class="chat_info">遊戲怎麼玩?遊戲怎麼玩?遊戲怎麼玩?遊戲怎麼玩?遊戲怎麼玩?遊戲怎麼玩?</p>
                            </div>
                        </li>
                        <li class="customer-box">
                            <div class="photo">
                                <img class="photo-demo2">
                            </div>
                            <div class="message">
                                <p class="username">客服
                                    <span>03-21 18:24</span>
                                </p>
                                <p class="chat_info">您好，请问有什么地方能为您服务？</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <form class="send-message-form" action="">
                    <div class="message-input-wrapper">
                        <input type="text" placeholder="请输入讯息..." class="message-input">
                        <input type="submit" name="chat" id="sendbtn" value="发送" class="send-btn">
                    </div>
                </form>
                <form id='game' target='_self' style='display: none;' action='http://fe.vrbetdemo.com/Account/LoginValidate?version=1.0&id=WMA&data=juvcTBOhaU3ZPGGCcmGGmTma%2BrAgXC8ZJRqZx01%2BDHZGP4eDRRfSoAwxjVXdzBq%2BfDeWP6wrOZOt%2BmKXEbCsvA%3D%3D'>
                    <input type='text' name="version" value="1.0" />
                    <input type='text' name="id" value="WMA" />
                    <input type='text' name="data" value="juvcTBOhaU3ZPGGCcmGGmTma%2BrAgXC8ZJRqZx01%2BDHZGP4eDRRfSoAwxjVXdzBq%2BfDeWP6wrOZOt%2BmKXEbCsvA%3D%3D" />
                </form>
            </div>
        </div>
        <!-- 綁定帳號 -->
        <div id="wt-dialog" class="modal after-close recharge-dialog fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="wm-bind-wrap">
                        <div class="person-box">
                            <div class="photo">
                                <div class="avatar"></div>
                            </div>
                            <div class="person-intro">
                                <p class="text_148">：<span class="username"></span></p>
                            </div>
                        </div>
                        <div class="person-acc-box">
                            <div class="acc-data">
                                <span class="text_149"></span><input class="account" type="text" placeholder="请输入绑定账号" required="required" minlength="6">
                            </div>
                            <div class="acc-data">
                                <span class="text_150"></span><input class="password" type="password" placeholder="密码长度6-16位" required="required" minlength="6" maxlength="16">
                            </div>
                            <div class="acc-data">
                                <span class="text_151"></span><input class="password2" type="password" placeholder="请再次输入密码" required="required" minlength="6" maxlength="16">
                            </div>
                            <div class="acc-data">
                                <span class="text_152"></span><input class="paypwd" type="password" placeholder="请输入支付密码" required="required" minlength="6" maxlength="16">
                            </div>
                            <div class="acc-data">
                                <span class="text_153"></span><input class="checkpaypwd" type="password" placeholder="请再次输入支付密码" required="required" minlength="6" maxlength="16">
                            </div>
                            <div class="acc-data">
                                <span class="text_154"></span><input class="phone" type="text" placeholder="请输入手机号码" required="required" minlength="6" maxlength="13">
                            </div>
                            <a disabled="disabled" class="btn-acc-bind submit text_155"></a>
                        </div>
                    </div>
                </div>
            </div>
            <a data-pop="wt-dialog" class="modal-close btn-close"></a>
        </div>
        <!-- 修改提現密碼 -->
        <div id="change-pwd-safe-dialog" class="modal after-close change-pwd-safe-dialog fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="wm-bind-wrap">
                        <div class="person-acc-box">
                            <div class="paypwdnote text_324" style="font-size: 14px;color: #dc3545;margin-bottom: 10px;"></div>
                            <div class="acc-data" style="padding: 0 7px!important;display: block;">
                                <span class="text_156" style="line-height: 35px;"></span>
                                <input name="oldpwd" type="password" id="changePayWd" required="required" minlength="6" maxlength="16" style="margin:0;font-size: 12px;">
                            </div> 
                            <div class="acc-data" style="padding: 0 7px!important;display: block;">
                                <span class="text_157" style="line-height: 35px;"></span>
                                <input name="newpwd" type="password" id="changeNewPaywd" required="required" minlength="6" maxlength="16" style="margin:0;font-size: 12px;">
                            </div>
                            <div class="acc-data" style="padding: 0 7px!important;display: block;">
                                <span class="text_151" style="line-height: 35px;"></span>
                                <input name="confirmpwd" type="password" id="changeNewPaywd1" required="required" style="margin:0;font-size: 12px;">
                            </div>
                            <a class="btn-acc-bind text_158"></a>
                        </div>
                    </div>
                </div>
            </div>
            <a data-pop="change-pwd-safe-dialog" class="modal-close btn-close"></a>
        </div>
        <!-- 更改登錄密碼 -->
        <div id="change-pwd-dialog" class="modal after-close change-pwd-dialog fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="wm-bind-wrap">
                        <div class="person-acc-box">
                            <div class="acc-data">
                                <span class="text_156" style="line-height: 35px;"></span>
                                <input name="oldpwd" type="password" id="changeloginwd" required="required" minlength="6" maxlength="16" style="margin:0;font-size: 13px;">
                            </div>
                            <div class="acc-data">
                                <span class="text_157" style="line-height: 35px;"></span>
                                <input name="newpwd" type="password" id="changeloginNewwd" required="required" minlength="6" maxlength="16" style="margin:0;font-size: 13px;">
                            </div>
                            <div class="acc-data">
                                <span class="text_151" style="line-height: 35px;"></span>
                                <input name="confirmpwd" type="password" id="changeloginNewwd1" required="required" style="margin:0;font-size: 13px;">
                            </div>
                            <a disabled="disabled" class="btn-acc-bind text_158"></a>
                        </div>
                    </div>
                </div>
            </div>
            <a data-pop="change-pwd-dialog" class="modal-close btn-close"></a>
        </div>
        <!-- 下线预设返水 -->
        <div id="set-bouns-dialog-st" class="modal after-close set-bouns-dialog-st fade" style="display: none;">
            <div class="modal-dialog waterdata-dialog">
                <div class="modal-title text_159"></div>
                <div class="modal-content">
                    <div class="bouns-con">
                        <table class="acc-table acc-table-1 bouns-table">
                            <thead>
                                <tr>
                                    <th class="aleft text_160"></th>
                                    <th class="acenter text_161"></th>
                                    <th class="acenter text_162">(%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>乐游棋牌</td>
                                    <td class="acenter"><input type="text" class="set-bouns-input"></td>
                                    <td class="acenter bouns-num">0 ~ 0</td>
                                </tr> -->
                            </tbody>
                        </table>
                        <span class="error-span hideError text_163">！</span>
                        <span class="error-span hideError text_164">！</span>
                        <span class="error-span hideError text_165">！</span>
                        <div class="btn-actions">
                            <a class="dialog-btn-submit"><span class="text_166"></span></a>
                            <a class="dialog-btn-cancel"><span class="text_135"></span></a>
                        </div>
                    </div>
                </div>
            </div> 
            <a data-pop="set-bouns-dialog-st" class="modal-close btn-close"></a>
        </div>
        <!-- 下线修改返水 -->
        <div id="set-bounsch-dialog" class="modal after-close set-bounsch-dialog fade" style="display: none;">
            <div class="modal-dialog waterdata-dialog">
                <div class="modal-title text_167"></div>
                <div class="modal-content">
                    <div class="bouns-con">
                        <table class="acc-table acc-table-1 bouns-table">
                            <thead>
                                <tr>
                                    <th class="aleft text_160"></th>
                                    <th class="acenter text_161"></th>
                                    <th class="acenter text_162">(%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        <span class="error-span hideError text_163">！</span>
                        <span class="error-span hideError text_164">！</span>
                        <span class="error-span hideError text_165">！</span>
                        <div class="btn-actions">
                            <a class="dialog-btn-submit"><span class="text_166"></span></a>
                            <a class="dialog-btn-cancel"><span class="text_135"></span></a>
                        </div>
                    </div>
                </div>
            </div> 
            <a data-pop="set-bounsch-dialog" class="modal-close btn-close"></a>
        </div>

        <!-- 試玩模式 -->
        <div id="trailModal" class="system-dialog" style="display:none;">
            <div class="header">
                <p class="text_168"></p>
            </div>
            <div class="content">
                <p class="text_169">？</p>
            </div>
            <div class="footer">
                <a id='freeplay_cancel' class="system-btn cancel text_135"></a>
                <a id='freeplay_submit' class="system-btn confirm text_170"></a>
            </div>
        </div>

        <!-- 手機端網址 -->
        <div id="addressDialog" class="modal after-close fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content h100" style="justify-content: center;">
                    <p class="wm-mobile-logos-txt text_171">：<span class="url"></span></p>
                </div>
            </div>
            <a data-pop="addressDialog" class="modal-close btn-close"></a>
        </div>

        <!-- 新增銀行卡 -->
        <div id="add-card-dialog" class="modal after-close add-card-dialog fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="wm-bind-wrap">
                        <div class="person-acc-box">
                            <div class="text_508" style="color: #ff0000;"></div>
                            <div class="acc-data" style="height: 70px;">
                                <span class="text_208" style="line-height:39px;"></span>
                                <input class="username" type="text" required="required" style="font-size: 12px;margin:0;">
                            </div>
                            <div class="acc-data datahide" type="bank" style="height: 70px;">
                                <span class="text_231" style="line-height:39px;"></span>
                                <!-- <input id="Bankname" style="font-size: 12px; margin:0;" /> -->
                                <select id="Bankname" style="font-size: 12px; margin:0; background: #ffffff; border: 1px solid #dcb454; width: 100%;" /></select>
                            </div>
                            <div class="acc-data datahide" type="bank" style="height: 70px;">
                                <span class="text_370" style="line-height:39px;"></span>
                                <input id="bankcode" type="text" required="required" minlength="15" maxlength="19" style="font-size: 12px;margin:0;">
                            </div>
                            <!-- <div class="acc-data ALIPAYAccount" style="height: 70px;">
                                <span class="text_367" style="line-height:39px;"></span>
                                <input id="ALIPAYAccount" type="text" required="required" style="font-size: 12px;margin:0;">
                            </div> -->
                            <div class="acc-data datahide" type="FPS" style="height: 70px;">
                                <span class="text_368" style="line-height:39px;"></span>
                                <input id="FPSAccount" type="text" required="required" style="font-size: 12px;margin:0;">
                            </div>
                            <div class="acc-data datahide" type="ERC20" style="height: 70px;">
                                <span class="text_442" style="line-height:39px;"></span>
                                <input id="USDTAccount" type="text" required="required" style="font-size: 12px;margin:0;">
                            </div>
                            <div class="acc-data datahide" type="TRC20" style="height: 70px;">
                                <span class="text_442" style="line-height:39px;"></span>
                                <input id="USDTAccountTRC20" type="text" required="required" style="font-size: 12px;margin:0;">
                            </div>
                            <div class="acc-data datahide" type="BEP20" style="height: 70px;">
                                <span class="text_442" style="line-height:39px;"></span>
                                <input id="BEP20Account" type="text" required="required" style="font-size: 12px;margin:0;">
                            </div>
                            <div class="acc-data datahide" type="BEP2" style="height: 70px;">
                                <span class="text_442" style="line-height:39px;"></span>
                                <input id="BEP2Account" type="text" required="required" style="font-size: 12px;margin:0;">
                            </div>
                            <div class="text_519 datahide" type="ERC20" style="color: #ff0000;"></div>
                            <div class="text_524 datahide" type="TRC20" style="color: #ff0000;"></div>
                            <!-- <div class="acc-data" style="height: 70px;">
                                <span class="text_175" style="line-height:39px;"></span>
                                <input id='Province' style="font-size: 12px;margin:0;"></input>
                            </div>
                            <div class="acc-data" style="height: 70px;">
                                <span class="text_176" style="line-height:39px;"></span>
                                <input id='City' style="font-size: 12px;margin:0;"></input>
                            </div>
                            <div class="acc-data" style="height: 70px;">
                                <span class="text_177" style="line-height:39px;"></span>
                                <input id="Branch" type="text" required="required" style="font-size: 12px;margin:0;">
                            </div> -->
                            <a class="recharge-submit text_155" style="color: #fff;"></a> 
                            <a class="recharge-cancel text_135" style="color: #fff;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 刪除銀行卡提醒視窗 -->
        <div class="jq-alert" id ="delbandcard" style="display: none;">
            <div class="alert">
                <div class="content text_178">？</div>
                <div class="fd-btn">
                    <a class="cancel text_135" id="cancel" data-role="cancel"></a>
                    <a class="confirm text_179" id="delcard"></a> 
                </div>
            </div>
        </div>

        <!-- 返水紀錄及申請 -->
        <div id="memberReport-dialog" class="modal after-close fade" style="display: none;height: 75%;width: 95%;">
            <div class="modal-dialog" style="height:100%;">
                <div class="modal-content">
                    <div style="height: 40%;">
                        <div class="rpdialogDiv mr-title" style="height: 18%;"></div>
                        <div class="rpdialogDiv returnBonus"  style="height: 37%;font-size: 40px;">
                            <span class="vipLogo0"></span>
                            <span class="vipLogo1"></span>
                            <span>$</span>
                            <span class="totalBonus">0</span>
                        </div>
                        <!-- <div class="vipStatus" style="height: 10%;margin-bottom: 1%;display: flex;align-items: center;justify-content: center;"></div> -->
                        <div class="rpdialogDiv applyReturnMoney" style="height: 13%;border: 1px solid #fff;border-radius: 20px;width: 45%;margin: 0 auto;"></div>
                        <div class="rpdialogDiv mr-note" style="height: 32%;color: red;font-size: 12px;text-align: center;padding: 15px 20px 15px 20px;line-height: 1.2;"></div>
                    </div>
                    <div style="height: 50%;background: #fff;color: #2b2e35;">
                        <div style="font-size: 14px;text-align: center;font-weight: bolder;height: 100%;">
                            <div style="height: 12%;display: flex;justify-content: space-around;align-items: center;">
                                <div class="mr-filed1" style="width: 33.3%;"></div>
                                <div class="mr-filed2" style="width: 33.3%;"></div>
                                <div class="mr-filed3" style="width: 33.3%;"></div>
                            </div>
                            <div class="mbrpdlbody" style="height: 88%;overflow: auto;">
                            </div>
                        </div>
                    </div>
                    <div style="height: 10%; display: flex;align-items: center;font-size: 13px;font-weight: bolder;justify-content: space-around;">
                        <div class=""><span class="mr-down1"></span><span class="totalValid">0</span></div>
                        <div class=""><span class="mr-down2"></span><span class="totalBonus">0</span></div>
                    </div>
                </div>
            </div>
            <a data-pop='memberReport-dialog' class="modal-close btn-close"></a>
        </div>

        <!-- 公告 -->
        <div id="bulletin-dialog" class="modal after-close bulletin-dialog fade">
            <div class="modal-dialog">
                <div class="modal-content neka_sound" style="height: 289px;">
                    <div class="modal-title modal-header">
                        <h1 style="font-size: 17px; color: #fff" class="text_180"></h1>
                    </div>
                    <div class="modal-body" style="overflow: auto;">
                        <table class="bulletin_table" style="border-collapse: separate; border-spacing: 0px 15px; color: #000000; table-layout: fixed; width: 100%;">
                            
                        </table>
                        <!-- 欢迎光临WM娱乐城 -->
                    </div>
                </div>
            </div>
            <a data-pop='bulletin-dialog' class="modal-close btn-close"></a>
        </div>

        <!-- 註冊 -->
        <div id="registion-dialog" class="registion-dialog" style="display: none;">
            <div class="registion-box">
                <div class="registion-title">
                    <div class="text_181" style="font-size: 5vmin; font-weight: 600; color: #000;"></div>
                    <!-- <span class="registion-close"></span> -->
                </div>
                <div class="registion-logo"></div>
                <div class="registion-content">
                    <input type="hidden" value="" name="recaptcha_response" id="recaptchaResponse">
                    <div class="input-box registion-input-box pid" style="display: none;">
                        <input name="pid" type="text" id="registpid" required="required" minlength="6" maxlength="16" style="font-size: 12px;">
                    </div>
                    <div class="input-box registion-input-box username" style="display: none;">
                        <input name="username" type="text" id="registusername" required="required" minlength="6" maxlength="16">
                    </div>
                    <div class="input-box registion-input-box password" style="display: none;">
                        <input name="password" type="password" id="registpassword" required="required" minlength="6" maxlength="16">
                    </div>
                    <div class="input-box registion-input-box password2" style="display: none;">
                        <input name="password2" type="password" id="registpassword2" required="required" minlength="6" maxlength="16">
                    </div>
                    <div class="input-box registion-input-box truename" style="display: none;">
                        <input name="truename" type="text" id="registtruename" required="required" minlength="2" maxlength="20">
                    </div>
                    <div class="input-box registion-input-box email" style="display: none;">
                        <input name="email" type="text" id="registemail" required="required">
                    </div>
                    <!-- <div class="input-box registion-input-box phone" style="display: none;">
                        <select name="countryCode" style="padding-left: 5px;line-height: 11.74vmin;color: #666;height: 11.74vmin;width: 12vmin;border-width: 1px;border-style: solid;border-color: rgb(214, 214, 214);border-image: initial;border-radius: 1vmin;padding: 0px 3px;font-size: 12px;"><option value="vn">84</option><option value="vn">03</option><option value="vn">04</option><option value="vn">05</option><option value="vn">07</option><option value="vn">08</option><option value="tw">09</option></select>
                        <input name="phone" type="text" id="registphone" required="required" minlength="6" maxlength="16" style="margin-left: 3.67vmin;">
                    </div> -->
                    <div class="input-box registion-input-box paypwd" style="display: none;">
                        <input name="paypwd" type="password" id="registpaypwd" required="required" minlength="6" maxlength="16">
                    </div>
                    <div class="input-box registion-input-box paypwd2" style="display: none;">
                        <input name="paypwd2" type="password" id="registpaypwd2" required="required" minlength="6" maxlength="16">
                    </div>
                    <div class="input-box registion-input-box phone" style="display:none;">
                        <input name="phone" type="text" id="registphone" required="required" minlength="6" maxlength="16" style="width: 60%;">
                        <div style="display: flex;justify-content: center;align-items: center;font-size: 14px;width: 32%;">
                            <span class="phoneCodeBtn text_908"></span>
                        </div>
                    </div>
                    <div class="input-box registion-input-box phoneCode" style="">
                        <input name="phoneCode" type="text" id="registPhoneCode">
                    </div>
                    <div class="input-box registion-input-box qq" style="display: none;">
                        <input name="qq" type="text" id="registqq">
                    </div>
                    <div class="input-box registion-input-box line" style="display: none;">
                        <input name="line" type="text" id="registline">
                    </div>
                    <div class="input-box registion-input-box wechat" style="display: none;">
                        <input name="wechat" type="text" id="registwechat">
                    </div>
                    <div class="input-box registion-input-box skype" style="display: none;">
                        <input name="skype" type="text" id="registskype">
                    </div>
                    <div class="input-box registion-input-box telegram" style="display: none;">
                        <input name="telegram" type="text" id="registtelegram">
                    </div>
                    <div class="input-box registion-input-box zalo" style="display: none;">
                        <input name="zalo" type="text" id="registzalo">
                    </div>
                    <div class="input-box registion-input-box captcha" style="display: none;">
                        <input type="text" id="captcha" style="width: 38.4vmin; float: left;">
                        <div class="registion-captcha-img">
                            <img src="" alt="" id="captcha_img">
                        </div>
                    </div>
                    <div class="registion-btn text_2 btn-acc-bind"></div>
                    <div class="registion-gologin text_301" id="btn-gologin"></div>
                </div>
            </div>
        </div>

        <!-- api測速 -->
        <div id="speed-dialog" class="modal after-close speed-dialog fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-title text_267"></div>
                <div class="modal-content">
                    <div class="wm-bind-wrap">
                        <div class="person-acc-box">
                            <ul class="speedapi-list">
                                <!-- <li class="speedapi-list-item" id="apispeed0">
                                    <a id="title0"></a>
                                    <a> - </a>
                                    <a id="time0" class="speedtime">loading</a>
                                    <span id="apistatus_0" class="btn-status">选择</span>
                                </li>-->
                            </ul>
                            <a class="btn-acc-bind text_268"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-pop="speed-dialog" class="modal-close btn-close"></div>
        </div>

        <div id="serviceqr-dialog" class="modal after-close serviceqr-dialog fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-title text_44"></div>
                <div class="modal-content">
                    <img class="serviceQRcode" style="width:200px; height:200px; margin: auto;">
                </div>
            </div>
            <div data-pop="serviceqr-dialog" class="modal-close btn-close serviceqrclose"></div>
        </div>

        <!-- 背景遮罩 -->
        <div id="modal-backdrop" class="modal-backdrop"></div>

        	<script src="/new0404/js/jweixin-1.0.0.js"></script>
	<script src="/new0404/js/marquee.js"></script>
	<script src="/new0404/js/demo.js?202204071330"></script>
	<script src="/new0404/js/game-hall.js"></script>
	<script src="/new0404/js/address.js"></script>

    </div>
</body>

    <script type="text/javascript">
        console.log(location.search);
    </script>
    <script id='googleSrc'></script>
    <script>
        var siteKeyStatus = Public.GetHostGoogleStatus(location.hostname);
        if(siteKeyStatus == 'true')
        {
            var siteArr = Public.GetHostGoogleKey(location.hostname);
            var url = 'https://www.google.com/recaptcha/api.js?render=' + siteArr['siteKey'];
            $('#googleSrc').attr('src', url);
        }
    </script>

    <!-- <script>
        var cut = function() {
            var video = document.getElementsByTagName('video');
            let canvas = document.createElement("canvas");//建立畫布
            canvas.width = video.videoWidth * scale;
            canvas.height = video.videoHeight * scale;//設定寬高比
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);//將影片此刻幀數畫入畫布
            let img = document.createElement("img");
            img.src = canvas.toDataURL("image/png");
            Dom.appendChild(img);//寫入到Dom
        };
        video.addEventListener('loadeddata',cut);//在影片幀數已載入時執行擷取
    </script> -->
    <script>
        var initX = 0;
        var iniiY = 0;
        var dragable = false;
        var imgwidth = parseInt(window.getComputedStyle(document.querySelector('.liveTV'))['width']);
        var imgheight = parseInt(window.getComputedStyle(document.querySelector('.liveTV'))['height']);
        document.querySelector('.liveTV').addEventListener('touchstart', function(e){
            dragable = true;
            initX = event.changedTouches[0].clientX;
            initY = event.changedTouches[0].clientY;
        }, false);

        document.querySelector('.liveTV').addEventListener('touchmove', function(e){
            if (dragable !== true)
            {
                return ;
            }
            var nowX = event.changedTouches[0].clientX;
            var nowY = event.changedTouches[0].clientY;
            var disX = nowX - initX;
            var disY = nowY - initY;
            var lastX = initX + disX - imgwidth;
            var lastY = initY + disY - imgheight;
            var lastY = lastY >= 5 ? lastY : 5;
            var lastX = lastX >= 0 ? lastX : 0;

            document.querySelector('.liveTV').style.left = lastX + "px";
            document.querySelector('.liveTV').style.top = lastY + "px";
        });
    </script>
</html>