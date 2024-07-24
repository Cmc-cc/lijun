<!DOCTYPE html>
<!-- saved from url=(0044)https://www.gwc688.net/m/listgames?category= -->
<html ng-app="app" class="ng-scope" ng-class="routerClass" lang="zh"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Joker Gaming</title>
    <!-- IOS -->
    <meta name="apple-mobile-web-app-title" content="Joker">
    <link href="https://www.gwc688.net/Themes/Joker/Images/logo-homescreen.png" rel="apple-touch-icon">
    <link href="https://www.gwc688.net/Themes/Joker/Images/logo-homescreen.png" rel="apple-touch-icon" sizes="76x76">
    <link href="https://www.gwc688.net/Themes/Joker/Images/logo-homescreen.png" rel="apple-touch-icon" sizes="120x120">
    <link href="https://www.gwc688.net/Themes/Joker/Images/logo-homescreen.png" rel="apple-touch-icon" sizes="152x152">
    <!-- Android -->
    <meta name="application-name" content="Joker">
    <link href="https://www.gwc688.net/Themes/Joker/Images/logo-homescreen.png" rel="icon" sizes="192x192">
    <link href="https://www.gwc688.net/Themes/Joker/Images/logo-homescreen.png" rel="icon" sizes="128x128">
    <link href="/new/joker/css2" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" sizes="32x32" href="https://www.gwc688.net/Themes/Joker/mobile/assets/images/favicon.ico?v=2">
    <link href="/new/joker/bundle-joker-ui-style" rel="stylesheet">

<style></style></head>
<body ng-controller="root" data-id="xkbhiii3n14ne" data-publisher="Joker" data-currency-code="HKD" data-display-currency="" data-point-rate="0.01" data-hash="PNLnTcrfyWHqSD+4H8LA+A==" class="ng-scope">
    

    <div class="mainWrapper">
        <div class="asideBar side black left" id="side-account">
            <!-- ngIf: authorize == false -->
            <div class="logined ng-scope" ng-if="authorize">
                <div class="account-wrapper">
                    <div class="information">
                        <i class="img-icon user active"></i>
                        <p class="txt-username ng-binding">HYZ599168</p>
                        <a class="refresh-amount" ng-click="loadBalance()"><i class="icon icon-refresh" ng-class="{&#39;spin&#39;:loadingBalance}"></i></a>
                        <div class="wraper-center">
                            <div class="balance-multi">
                                <div class="current-balance line">
                                    <span class="text ng-binding">结余:</span>
                                    <span class="currency ng-binding">H GP</span>
                                    <span class="amount ng-binding" ng-bind="balance | twoDecimal">0.00</span>
                                </div>
                                <div class="free-balance line ng-hide" ng-show="hasFreePoint == true">
                                    <span class="text ng-binding">免费:</span>
                                    <span class="currency ng-binding">H GP</span>
                                    <span class="amount ng-binding" ng-bind="freeBalance | twoDecimal">0.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="navigation">
                    <li ng-hide="r_external == true" class="ng-hide">
                        <a ui-sref="/m-change-password" class="ng-binding" href="https://www.gwc688.net/m/change-password"><i class="icon icon-password"></i>更改密码</a>
                    </li>
                    <li>
                        <a ng-click="openHistory()" class="ng-binding"><i class="icon icon-history"></i>游戏历史</a>
                    </li>
                    <li ng-class="{&#39;hide&#39;: r_external == true}" class="hide"><a ng-click="logout()" class="ng-binding"><i class="icon icon-signout"></i>登出</a></li>
                </ul>
            </div><!-- end ngIf: authorize -->
        </div>
        <div class="header-top page" id="header-top">
            <div class="container">

                <div class="h-bottom  text-center clearfix flex align-center">
                    <div class="n-left flex align-center">
                        <div class="user-container">
                            <a ui-sref="/m-login" ng-show="authorize == false" href="https://www.gwc688.net/m/login" class="ng-hide"><i class="img-icon user"></i></a>
                            <a href="https://www.gwc688.net/m/listgames?category=#" class="t-aside" asidebar="" header="#header-top" data-placement="left" data-aside="#side-account" ng-show="authorize == true" ng-click="loadBalance()">
                                <i class="img-icon user active"></i>
                            </a>
                        </div>
                        <div class="logo-container">
                            <a ng-show="r_external == false" ui-sref="/m" href="https://www.gwc688.net/m" class="ng-hide"><img ng-src="/Themes/Joker/mobile/assets/images/logo.png?v=17" class="img-responsive" src="/new/joker/logo.png"></a>
                            <a ng-show="r_external == true" ui-sref="/m-list-games" href="https://www.gwc688.net/m/listgames"><img ng-src="/new/img/game/{{$api_code}}.png" class="img-responsive" src="/new/img/game/{{$api_code}}.png"></a>
                        </div>
                    </div>
                    <!--<div class="n-right flex align-center">-->
                    <!--    <div class="download-app ng-hide" ng-hide="isiOS == true || r_external == true">-->
                    <!--        <a class="link-down" ng-click="download()"></a>-->
                    <!--    </div>-->
                    <!--    <div class="language-container">-->
                    <!--        <a class="link-language" ui-sref="/m-language" href="https://www.gwc688.net/m/language"><img ng-src="/Themes/Joker/mobile/assets/images/flag/ico_flag_zh.png" src="/new/joker/ico_flag_zh.png"></a>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <!-- uiView: --><div ui-view="" class="ng-scope"><div animated="" data-effect="fadeIn" ng-init="loadListGames()" class="ng-scope animated fadeIn">
    <div class="main-content game-container">
        <div class="container-fluid">
            <div class="filterBox">
                <div class="w-list" ng-show="gameData.categories.length &gt; 1">
                    <ul class="category">
                        <li>
                            <a class="all active gamecategory" data-code="1">
                                <i class="img-icon all"></i>
                                <span class="ng-binding">全部游戏</span>
                            </a>
                        </li>
                        @if($api_code != 'cq9' && $api_code != 'mabu' && $api_code != 'ps' && $api_code != 'joker1' && $api_code != 'yl')
                        <li ng-repeat="item in gameData.categories" class="ng-scope">
                            <a class="slot gamecategory" data-code="1">
                                <i class="img-icon slot"></i>
                                <span class="ng-binding">{{trans("lang.dianzi")}}</span>
                            </a>
                        </li>
                        <li ng-repeat="item in gameData.categories" class="ng-scope">
                            <a class="bingo gamecategory" data-code="2">
                                <i class="img-icon bingo"></i>
                                <span class="ng-binding">Bingo</span>
                            </a>
                        </li>
                        @endif
                        <!--<li ng-repeat="item in gameData.categories" class="ng-scope">-->
                        <!--    <a class="fishing" ng-class="{&#39;active&#39;: gameData.filter.categoryCode == item.Code}" ng-click="filterCategory(item)">-->
                        <!--        <i class="img-icon fishing"></i>-->
                        <!--        <span class="ng-binding">{{trans("lang.buyu")}}</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                    </ul>
                </div>

            </div>
            <div class="listGame" data-code="1">
                @foreach($gameList as $k => $v)
                    <div class="item-game animated ng-scope zoomIn" ng-repeat="item in gameData.games" ng-class="{&#39; zoomIn&#39;: item.show , &#39; zoomOut hide&#39;: !item.show }"  onclick="location.href='/game/playGame?plat_type={{$api_code}}&game_type={{$v['GameCode']}}&devices=1&game_code=<?php echo @$v['asd'];?>'">
                        <span class="hot ng-hide" ng-show="item.IsHot &amp;&amp; item.Enabled == true"></span>
                        <span class="new ng-hide" ng-show="item.IsNew &amp;&amp; item.Enabled == true"></span>
                        <span class="coming-soon flex-center ng-hide" ng-show="item.Enabled == false"><span class="btn-comingsoon ng-binding">即将推出</span></span>
                        <a class="l-game" ng-click="item.GameCategoryCode == &#39;FishWorld&#39; ? filterFishWorld() : playGameExtend(item.Code)" ng-class="{&#39;comingsoon&#39;: item.Enabled == false}">
                            <img  class="img-game img-responsive" src="{{$v['Image2']}}" style="padding: 5px;">
                            <span class="bet-limit ng-binding ng-hide" ng-show="item.MinBetSetting != null"> - </span>
                        </a>
                        <div class="jackpot-Game" ng-show="item.HasJackpot == true &amp;&amp; item.JackpotAmount"><span class="amount ng-binding" ng-bind="item.JackpotAmount | twoDecimal">{{$v['GameName']}}</span></div>
                    </div><!-- end ngRepeat: item in gameData.games -->
                @endforeach
            </div>
            <div class="listGame" data-code="2" style="display:none;">
                <div class="item-game animated ng-scope zoomIn" onclick="location.href='/game/playGame?plat_type=joker2&game_type=ezjsgctugyauc&devices=1&game_code=ezjsgctugyauc'">
                        <a class="l-game" >
                            <img class="img-game img-responsive" src="/new/joker/img/dcsbg.png" style="padding: 5px;">
                        </a>
                    <div class="jackpot-Game" ><span class="amount ng-binding" >大財神宾果</span></div>
                </div>
                <div class="item-game animated ng-scope zoomIn" onclick="location.href='/game/playGame?plat_type=joker2&game_type=fn6yhwksk7kfk&devices=1&game_code=fn6yhwksk7kfk'">
                        <a class="l-game" >
                            <img class="img-game img-responsive" src="/new/joker/img/ljlrbg.png" style="padding: 5px;">
                        </a>
                    <div class="jackpot-Game" ><span class="amount ng-binding" >辣椒獵人宾果</span></div>
                </div>
                <div class="item-game animated ng-scope zoomIn" onclick="location.href='/game/playGame?plat_type=joker2&game_type=tocki7xk7xwq1&devices=1&game_code=tocki7xk7xwq1'">
                        <a class="l-game" >
                            <img class="img-game img-responsive" src="/new/joker/img/hyzzbg.png" style="padding: 5px;">
                        </a>
                    <div class="jackpot-Game" ><span class="amount ng-binding" >火焰珍珠宾果</span></div>
                </div>
                <div class="item-game animated ng-scope zoomIn" onclick="location.href='/game/playGame?plat_type=joker2&game_type=cz3wgrounyetc&devices=1&game_code=cz3wgrounyetc'">
                        <a class="l-game" >
                            <img class="img-game img-responsive" src="/new/joker/img/hwbg.png" style="padding: 5px;">
                        </a>
                    <div class="jackpot-Game" ><span class="amount ng-binding" >海王宾果</span></div>
                </div>
                <div class="item-game animated ng-scope zoomIn" onclick="location.href='/game/playGame?plat_type=joker2&game_type=z7k6mqf3z495a&devices=1&game_code=z7k6mqf3z495a'">
                        <a class="l-game" >
                            <img class="img-game img-responsive" src="/new/joker/img/jmkzbg.png" style="padding: 5px;">
                        </a>
                    <div class="jackpot-Game" ><span class="amount ng-binding" >加密躁狂者宾果</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div loader="" loading="gameData.loading" class="ng-scope ng-isolate-scope"><div class="loader ng-hide" ng-show="loading == true">
    <i class="icon icon-spinner6 spin" style="color: #d8d7d7"></i>
</div></div></div>

    </div>
    <div class="navigationMain hide" ng-class="{&#39;hide&#39;: r_external == true}">
        <ul class="list-menu">
            <li>
                <a class="link-nav home" ui-sref="/m" ui-sref-active="active" href="https://www.gwc688.net/m">
                    <i class="img-icon home"></i>
                </a>
            </li>

            <li ng-show="account.enableCompetition == true" class="ng-hide">
                <a class="link-nav tournaments" ui-sref="/m-tournament" ui-sref-active="active" href="https://www.gwc688.net/m/tournament">
                    <i class="img-icon tournaments"></i>
                </a>
            </li>

            <li>
                <a class="link-nav game active" ui-sref="/m-list-games" ui-sref-active="active" href="https://www.gwc688.net/m/listgames">
                    <i class="img-icon game"></i>
                </a>
            </li>
            <li>
                <a class="link-nav live-casino" ui-sref="/m-live-casino" ui-sref-active="active" href="https://www.gwc688.net/m/live-casino">
                    <i class="img-icon casino"></i>
                </a>
            </li>
            <li>
                <a class="link-nav contact-us" ui-sref="/m-contact-us" ui-sref-active="active" href="https://www.gwc688.net/m/contact-us">
                    <i class="img-icon contact-us"></i>
                </a>
            </li>
            <li>
                <a class="link-nav about-us" ui-sref="/m-about-us" ui-sref-active="active" href="https://www.gwc688.net/m/about-us">
                    <i class="img-icon about-us"></i>
                </a>
            </li>
        </ul>

    </div>
    <div class="notify-download-app container-max ng-hide open" ng-hide="isiOS == true || r_external == true">
        <div class="content flex align-center">
            <span ng-click="disableNotifyDownload()" class="close-app n-left"><i class="icon icon-close"></i></span>
            <div class="info flex align-center n-left">
                <img ng-src="/Themes/Joker/mobile/assets/images/logo-app.png" src="/new/joker/logo-app.png">
                <div class="text">
                    <h4 ng-bind-html="&#39;%publisher Mobile App&#39;|translate:{publisher:&#39;Joker&#39;}" class="ng-binding">Joker 手机版本</h4>
                    <p class="ng-binding">点击下載</p>
                </div>
            </div>

            <a ng-click="download()" class="btn btn-primary n-right down-app"><i class="icon icon-down-2"></i></a>
        </div>
    </div>
    <div loader="" loading="loadingPage" class="ng-isolate-scope"><div class="loader ng-hide" ng-show="loading == true">
    <i class="icon icon-spinner6 spin" style="color: #d8d7d7"></i>
</div></div>

    
    

    

    

    <div class="popup-announcement-wrapper ng-hide" ng-init="initPopupAnnouncement()" ng-show="announcement.isShow == true &amp;&amp; announcement.data.length &gt; 0">
        <div class="content-announcement">
            <div class="close-popup" ng-click="closePopupAnnouncement()"><i class="icon icon-close"></i></div>
            <div class="list-items owl-carousel animated owl-theme owl-loaded owl-drag">
                <!-- ngRepeat: item in announcement.data -->
            <div class="owl-stage-outer"><div class="owl-stage"></div></div><div class="owl-nav disabled"><div class="owl-prev">prev</div><div class="owl-next">next</div></div><div class="owl-dots disabled"></div></div>
        </div>
    </div>
    

    

    
<div popup-modal="" on-show="showSignOff" data-template="message" data-title="信息" data-content="帐户已登出" class="ng-isolate-scope"><div class="modal message fadeIn" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="icon icon-close" ng-click="onCancel()"></i>
            </div>
            <div class="modal-body">
                <h4 class="title ng-binding" ng-bind="title | translate">信息</h4>
                <div class="contentCash">
                    <div class="block ng-binding" ng-bind="content | translate">帐户已登出</div>
                    <button ng-click="onSuccess()" class="btn f700 ng-binding" ng-bind="&#39;Ok&#39; | translate">好</button>
                </div>
            </div>
        </div>
    </div>
</div></div><div popup-modal="" on-show="showMessageRequireLoginForLiveCasino" data-template="message" data-title="For Information" data-content="Please you must login account!" class="ng-isolate-scope"><div class="modal message fadeIn" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="icon icon-close" ng-click="onCancel()"></i>
            </div>
            <div class="modal-body">
                <h4 class="title ng-binding" ng-bind="title | translate">信息</h4>
                <div class="contentCash">
                    <div class="block ng-binding" ng-bind="content | translate">你必须登录帐户先!</div>
                    <button ng-click="onSuccess()" class="btn f700 ng-binding" ng-bind="&#39;Ok&#39; | translate">好</button>
                </div>
            </div>
        </div>
    </div>
</div></div><div popup-modal="" on-show="showMessageRequireLogin" data-template="message" data-title="For Information" data-content="Please you must login account!" class="ng-isolate-scope"><div class="modal message fadeIn" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="icon icon-close" ng-click="onCancel()"></i>
            </div>
            <div class="modal-body">
                <h4 class="title ng-binding" ng-bind="title | translate">信息</h4>
                <div class="contentCash">
                    <div class="block ng-binding" ng-bind="content | translate">你必须登录帐户先!</div>
                    <button ng-click="onSuccess()" class="btn f700 ng-binding" ng-bind="&#39;Ok&#39; | translate">好</button>
                </div>
            </div>
        </div>
    </div>
</div></div><div popup-modal="" on-show="showStatement" model="statementInfo" data-template="update-cash" data-title="信息" class="ng-isolate-scope"><div class="modal update-cash fadeIn" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="icon icon-close" ng-click="onCancel()"></i>
            </div>
            <div class="modal-body">
                <h4 class="title ng-binding">信息</h4>
                <div class="contentCash">
                    <p class="ng-binding">:  0.00</p>
                    <button class="btn ng-binding" ng-click="onSuccess()">好</button>
                </div>
            </div>
        </div>
    </div>
</div></div><div popup-modal="" on-show="tournament.popup.showConfirmJoin" data-template="tournament-confirm-join" model="tournament.popup.modelConfirmJoin" class="ng-isolate-scope"><div class="modal fadeIn" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="icon icon-close" ng-click="onCancel()"></i>
            </div>
            <!-- ngIf: model -->
        </div>
    </div>
</div>
</div><div popup-modal="" on-show="tournament.popup.showTournamentInfo" data-template="tournament-info" model="tournament.popup.modelTournamentInfo" class="ng-isolate-scope"><div class="modal fadeIn" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="icon icon-close" ng-click="onCancel()"></i>
            </div>
            <div class="modal-body modal-information">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item active">
                        <a ignore-href-hash="" class="nav-link ng-binding" id="infor-tab" data-toggle="tab" href="https://www.gwc688.net/m/listgames?category=#infor" role="tab" aria-controls="infor" aria-selected="true" ng-bind="&#39;Information&#39; | translate">信息</a>
                    </li>
                    <li class="nav-item">
                        <a ignore-href-hash="" class="nav-link ng-binding" id="prize-tab" data-toggle="tab" href="https://www.gwc688.net/m/listgames?category=#prize" role="tab" aria-controls="prize" aria-selected="false" ng-bind="&#39;Prize pool&#39; | translate">奖池</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="infor" role="tabpanel" aria-labelledby="infor-tab">
                        <div class="infor-tournament">
                            <div class="d-table">
                                <div class="d-row">
                                    <div class="left ng-binding" ng-bind="&#39;Type&#39; | translate">类型</div>
                                    <div class="right"><span ng-bind="model.TypeLocale.Name" class="ng-binding"></span></div>
                                </div>
                                <div class="d-row">
                                    <div class="left ng-binding" ng-bind="&#39;Description&#39; | translate ">描述</div>
                                    <div class="right"><span ng-bind="model.TypeLocale.Description" class="ng-binding"></span></div>
                                </div>
                                <div class="d-row">
                                    <div class="left ng-binding" ng-bind="&#39;Entrance Fee&#39; | translate">入场费</div>
                                    <div class="right">
                                         <!-- ngIf: model.Cost > 0 --><!-- ngIf: model.Cost > 0 -->
                                         <!-- ngIf: model.Cost == 0 --> 
                                    </div>
                                </div>
                                <div class="d-row">
                                    <div class="left ng-binding" ng-bind="&#39;Exclusive Pass&#39; | translate">专属通行证</div>
                                    <div class="right">
                                        <!-- ngIf: model.RequiredTicket > 0 -->
                                        <!-- ngIf: model.RequiredTicket == 0 -->
                                    </div>
                               </div>
                                <div class="d-row">
                                    <div class="left ng-binding" ng-bind="&#39;No Of Spin&#39; | translate ">旋转次数</div>
                                    <div class="right"><span ng-bind="model.NoOfSpins" class="ng-binding"></span></div>
                                </div>
                                <div class="d-row">
                                    <div class="left ng-binding" ng-bind="&#39;Start&#39; | translate ">开始</div>
                                    <div class="right"><span ng-bind="model.StartDateUTC | dateTimeUTCLocal" class="ng-binding">21/02/2022 16:53</span></div>
                                </div>
                                <div class="d-row">
                                    <div class="left ng-binding" ng-bind="&#39;End&#39; | translate ">结束</div>
                                    <div class="right"><span ng-bind="model.EndDateUTC | dateTimeUTCLocal" class="ng-binding">21/02/2022 16:53</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-prizepool" id="prize" role="tabpanel" aria-labelledby="prize-tab">
                        <div class="prize-pool">
                            <div class="top-rank-list" ng-class="{&#39;has-ticket&#39;: model.prizePoolDisplay[0].Tickets &gt; 0 || model.prizePoolDisplay[1].Tickets &gt; 0 || model.prizePoolDisplay[2].Tickets &gt; 0 }">
                                <!-- ngIf: model.prizePoolDisplay[1] -->
                                <!-- ngIf: model.prizePoolDisplay[0] -->
                                <!-- ngIf: model.prizePoolDisplay[2] -->
                            </div>
                            <!-- ngIf: model.prizePoolDisplay.length > 3 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div><div popup-modal="" on-show="tournament.popup.showResultJoin" data-template="tournament-result-join" model="tournament.popup.modelResultJoin" class="ng-isolate-scope"><div class="modal fadeIn" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="icon icon-close" ng-click="onCancel()"></i>
            </div>
            <!-- ngIf: model -->
        </div>
    </div>
</div></div><div popup-modal="" on-show="tournament.popup.showMessage" data-template="tournament-message" model="tournament.popup.modelMessage" class="ng-isolate-scope"><div class="modal fadeIn" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="icon icon-close" ng-click="onCancel()"></i>
            </div>
            <div class="modal-body modal-error">
                <h4 class="title ng-binding" ng-bind="title | translate">信息</h4>
                <div class="contentCash">
                    <div class="block ng-binding" ng-bind="model.Message | translate"></div>
                    <button ng-click="onSuccess()" class="btn f700 ng-binding" ng-bind="&#39;Ok&#39; | translate">好</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div><div popup-modal="" on-show="tournament.popup.showParticipants" data-template="tournament-participants" model="tournament.popup.modelParticipants" class="ng-isolate-scope"><div class="modal fadeIn" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="icon icon-close" ng-click="onCancel()"></i>
            </div>
            <div class="modal-body modal-ranking">
                <div class="participant-container" ng-class="{&#39;ranking-result&#39;: model.isCompleted }">
                    <div class="ranking-body">
                        <div class="ranking-header">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="text-center col-order ng-binding" ng-bind="&#39;Rank&#39; | translate ">等级</th>
                                        <th class="text-left name ng-binding" ng-bind="&#39;Player&#39; | translate ">玩家</th>
                                        <th class="text-right ng-binding" ng-bind="&#39;Score&#39; | translate ">分数</th>
                                        <!-- ngIf: model.isCompleted -->
                                        <!-- ngIf: model.isCompleted -->
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="ranking-content">
                            <!-- ngIf: !model.loading --><table class="table-ranking table-striped ng-scope" ng-if="!model.loading">
                                <!-- ngIf: model.data.length !== 0 --><tbody ng-if="model.data.length !== 0" class="ng-scope">
                                    <!-- ngRepeat: item in model.data -->
                                </tbody><!-- end ngIf: model.data.length !== 0 -->

                                <!-- ngIf: model.data.length === 0 -->
                            </table><!-- end ngIf: !model.loading -->
                            <!-- ngIf: !model.loading --><div class="current-player ng-scope ng-isolate-scope" ng-if="!model.loading" scroll-row-active-table="{ parent: &#39;.ranking-content&#39;, itemsAttrCompare: &#39;data-username&#39; }" is-updated="!model.loading" is-load="model.currentPlayer.Username" value="model.currentPlayer.Username">
                                <table class="table-ranking">
                                    <tbody><tr>
                                        <td class="text-center col-order">
                                            <!-- ngIf: model.currentPlayer.Order < 4 -->
                                            <!-- ngIf: model.currentPlayer.Order > 3 -->
                                            <!-- ngIf: model.currentPlayer.Order == '--' -->
                                        </td>
                                        <td class="text-left name"><span ng-bind="model.currentPlayer.DisplayName" ui-tooltip="{container: &#39;body&#39;}" text="model.currentPlayer.DisplayName" class="ng-binding ng-isolate-scope" data-original-title="" title=""></span></td>
                                        <td class="text-right ng-binding" ng-bind="model.currentPlayer.Chance"></td>
                                        <!-- ngIf: model.isCompleted -->
                                        <!-- ngIf: model.isCompleted -->
                                    </tr>
                                </tbody></table>
                            </div><!-- end ngIf: !model.loading -->
                        </div>
                    </div>
                    <div class="ranking-footer">
                        <paging-unlimited class="paging-container ng-isolate-scope" page-index="model.paging.pageIndex" allow-next="model.paging.enableNext" is-loading="model.loading" on-change="model.onPaging"><div class="paging"><div class="cricle prev" ng-mousedown="onPreviousFired()" ng-class="{disable: pageIndex == 1}"><i class="icon-arrow-left"></i></div><span class="page-index active ng-binding" ng-bind="pageIndex"></span><div class="cricle next" ng-mousedown="onNextFired()" ng-class="{disable: allowNext == false}"><i class="icon-arrow-right"></i></div></div></paging-unlimited>
                    </div>
                    <!-- ngIf: model.loading -->
                </div>

            </div>
        </div>
    </div>
</div>

</div></body></html>
<script type="text/javascript" src="/new/css/jquery.js"></script>
<script>
    $('.gamecategory').click(function(){
        $('.gamecategory').removeClass('active');
        $(this).addClass('active');
        var code = $(this).data('code');
        $('.listGame').hide();
        $('.listGame').each(function(k,v){
            if($(this).data('code')==code){
                $(this).show();
            }
        })
    })
</script>

