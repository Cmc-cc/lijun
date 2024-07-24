<html style="height: 100%" language="tw">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="yes" name="apple-touch-fullscreen">
	<meta content="telephone=no" name="format-detection">
	<meta content="black" name="apple-mobile-web-app-status-bar-style">
	<meta name="viewport"
		  content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
	<meta name="env" content="stage">
	<meta name="csrf-token" content="ZeQipUdvBNrJPGLcfKIEuKmvLgjaEInNkWLn1ya0">
	<meta name="notify-msg" content="">
	<meta name="notify-type" content="">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon.ico">
	<link rel="stylesheet prefetch" href="/new0404/css/bootstrap.min.css">
	<link rel="stylesheet" href="/new0404/css/Language_tw.css?202204071330" id="languageCss" cachetime="202204071330">
	<link rel="stylesheet" href="/new0404/css/swiper.min.css">
	<link rel="stylesheet" href="/new0404/css/game_hall_new.css">
	<link rel="stylesheet" href="/new0404/css/game_hell_new_extend.css">
	<link rel="stylesheet" href="/new0404/css/new_ui.css">
	<link href="/new0404/css/login_lx.css?202204042350" rel="stylesheet">
	<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>
	<title><?php echo e($_system_config->site_title); ?></title>
	<script src="/new0404/js/jquery.min.js"></script>
	<script src="/new0404/js/swiper.min.js"></script>
	<script src="/new0404/js/app.js"></script>
	<script src="/new0404/js/qrcode.min.js"></script>
	<script src="/new0404/js/Language.js"></script>
	<script src="/new0404/js/Config.js"></script>
	<script src="/new0404/js/Public.js"></script>

	<!-- <script>
		window.langName = 'cn';
	</script> -->

	<style>
		@-webkit-keyframes marqueeAnimation-4449094 {
			100% {
				transform: translateX(-2470.84px)
			}
		}

		@-webkit-keyframes marqueeAnimation-8102871 {
			100% {
				transform: translateX(-2470.84px)
			}
		}
	</style>
</head>

<!-- 隱藏loadin倒數 body class移除no-scroll、 pages-loading-box class增加ani display:none; -->
<body ontouchstart="" style="height: 100%;">
<div class="body-pages" style="height: 100%; overflow: auto; display: block;">
	<div class="whileBac" style="height:30px;width: 100%;display: none;"></div>
	
	
	<!-- 美女公告圖 -->
	<!-- <div class="pages-loading-box3 BulletinImg" style="display: none;">
        <div class="swiper-slide guide-photo">
            <img class="welcomeImg">
        </div>
    </div> -->
	
	<!-- main content -->
	<!-- 自訂 id='main-container' -->
	<div id="main-container" class="main-container" style="">
		<div id="changeBgm-dialog" class="modal after-close nekstayle_sound changeBgm-dialog fade"
			 style="display:none; height: 295px; margin-top: 130px;">
			<div class="modal-content neka_sound" style="height: 389px;">
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
			<a data-pop="changeBgm-dialog" class="modal-close btn-close"></a>
		</div>
		<div class="context home-context">
			<!-- <a data-menu="speed" data-pop="speed-dialog" class="speed-measuring fix-bottom-btn btn-pop" style="position: absolute; right: 0px; top: 20px; font-size: 10px; z-index: 102">- s</a> -->
			<!-- 頂部固定區 -->
			<div class="home-fix-top-box">
				<div class="logo-title" style="background: url(<?php echo e(getset('site_logo')); ?>) no-repeat;background-size: 100% 100%;"></div>
				<div style="height: 100%;width: 78%;display: flex;align-items: center;justify-content: flex-end;">
				    
					
					
					<?php if(!Auth::guard('member')->guest()): ?>
    					<div class="home-account-display" style="display: block;">
    						<div class="home-account-box">
    							<div class="home-account-img"></div>
    							<div class="home-account"><?php echo e(@$_member -> name); ?></div>
    						</div>
    					</div>
					    <div class="home-logout" style="display: block;" onclick="location.href='/m/logout'"></div>
					<?php else: ?>
					    <div class="home-login" onclick="location.href='/m/login'"></div>
					    <div class="home-register" onclick="location.href='/m/register'"></div>
					<?php endif; ?>
					<style>
					    .img1{ height:70%; margin:0 4%;}
					</style>
					<img src="/images/i_soundoff.png" class="img1 img_bofang" />
					<img src="/images/i_sound.png"  class="img1 img_guanbi" style="display:none;"/>
					
					<audio id="audio" src="/images/bg_sound.mp3" style="width:0; height: 0;"></audio>
					
					<script>
					    var audio = document.getElementById("audio");
                        // audio.play();
					    $(".img_bofang").click(function () {
					        $('.img_bofang').hide();
					        $('.img_guanbi').show();
                           audio.play();
                        })
                        $(".img_guanbi").click(function () {
                             $('.img_guanbi').hide();
					        $('.img_bofang').show();
                           audio.pause();
                        })
					</script>
					<!--<div class="box_background"></div>-->
					
					<div class="box_welcome" style="display: none;"></div>
					<div class="language-box">
						<div class="language-setting">
							<a class="btn-language" style="height: 40px;width:40px;display: block;background:url(<?php echo e(trans('lang.png')); ?>);    background-size: 100% 100%;">
							</a>
							<div class="language-select">
								<!-- <span class="lang-cn"></span> -->
								<span class="lang-tw lang" data-lang="ft"></span>
								<!--<span class="lang-en lang" data-lang="en"></span>-->
								<!--<span class="lang-th"></span>-->
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
				<div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
    				<div class="swiper-wrapper" >
    				    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        					<div class="swiper-slide"  >
        						<a><img src="<?php echo e($item->path); ?>" style="border-radius: 0.5rem;"></a>
        					</div>
    					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    				</div>
    				<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    			</div>
			</div>
			<!-- 中間按鈕條 -->
			<div class="home-link-bar">
				<!-- 跑馬燈區 -->
				<div class="marquee-box">
					<div class="marquee-img"></div>
					<div class="home-marquee">
						<div class="marquee" style="width: 100%;">
							<div style="width: 100000px; transform: translateX(348.359px); animation: 40.4885s linear 1s infinite normal none running marqueeAnimation-8102871;"
								 class="js-marquee-wrapper">
								<div class="js-marquee" style="margin-right: 0px; float: left;"><p>
										<?php echo e($system_notices->content); ?></p>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="hotevents-img"></div> -->
				</div>
				<!-- 個人資料與存提款 -->
				<div class="tab">
					<div class="tab-left">
						<div class="onlineusers">
							<div class="onlineusersimg">
							    <?php echo e(trans("lang.zxrs")); ?>:
								<span class="onlinepeople"><?php echo rand(13000,18000)?></span>
							</div>
						</div>
						<!-- <p><span id='account' class="person-name" style="font-size: 3vmin; color: #b1987f; font-weight: 400;"></span><i></i></p> -->
						<div class="moneystyle">
							<span class="mark-txt">點數：<text id="gamemoney"><?php echo e(@$_member -> money?$_member -> money:'0.00'); ?></text></span>
						</div>
					</div>
					<div class="tab-right">
						<div class="tab-right-btn trans-btn">
						    <?php if(!Auth::guard('member')->guest()): ?>
							<div class="transfer-icon"  id="transfer"></div>
							<?php else: ?>
							<div class="transfer-icon"  onclick="location.href='/m/login'"></div>
							<?php endif; ?>
							<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;width: 50px;padding: 0 10px;"><?php echo e(trans("lang.edzh")); ?></h4>
						</div>
						<!-- <div class="tab-right-btn btn-pop" data-pop="memberReport-dialog">
                            <div class="mr-home-Ico" style="margin: -10px auto auto auto;"></div>
                            <h4 class="mr-center-Btn" style="color:#b1987f; font-size: 3vmin; font-weight: 400;"></h4>
                        </div> -->
						<div class="tab-right-btn btn-pop" data-pop="recharge-dialog" onclick="location.href='/m/recharge'">
							<div class="deposit-icon"></div>
							<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;"><?php echo e(trans("lang.chongzhi")); ?></h4>
							<h4 style="height: 3vmin;"></h4>
						</div>
						<div class="tab-right-btn btn-pop" data-pop="withdraw-dialog" onclick="location.href='/m/drawing'">
							<div class="withdraw-icon"></div>
							<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;"><?php echo e(trans("lang.tixian")); ?></h4>
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
				<div id="gamelist-wrapper" class="gamelist-wrapper">
					<div class="gamelist-item">
						<div class="gameitem live active" gamelistbtn="live">
							<div class="gameitem-live-img"></div>
							<span class="gameitem-text"><?php echo e(trans("lang.shixun")); ?></span>
						</div>
						<div class="gameitem chess" gamelistbtn="chess">
							<div class="gameitem-chess-img"></div>
							<span class="gameitem-text"><?php echo e(trans("lang.qipai")); ?></span>
						</div>
						<div class="gameitem" gamelistbtn="sport">
							<div class="gameitem-sport-img"></div>
							<span class="gameitem-text"><?php echo e(trans('lang.tiyu')); ?></span>
						</div>
						<div class="gameitem" gamelistbtn="esports">
							<div class="gameitem-eSports-img"></div>
							<span class="gameitem-text"><?php echo e(trans('lang.dianjing')); ?></span>
						</div>
						<div class="gameitem slotgame" gamelistbtn="slotgame">
							<div class="gameitem-slotgame-img"></div>
							<span class="gameitem-text"><?php echo e(trans("lang.dianzi")); ?></span>
						</div>
						<div class="gameitem fish" gamelistbtn="fish">
							<div class="gameitem-fish-img"></div>
							<span class="gameitem-text"><?php echo e(trans("lang.buyu")); ?></span>
						</div>
						<!--<div class="gameitem lottery" gamelistbtn="lottery">-->
						<!--	<div class="gameitem-lottery-img"></div>-->
						<!--	<span class="gameitem-text"><?php echo e(trans("lang.caipiao")); ?></span>-->
						<!--</div>-->
						<!--<div class="gameitem liveBroadcast" gamelistBtn="liveBroadcast">-->
                           <!-- <span class="gameitem-text" style="width:auto;    margin-right: 10px;"><?php echo e(trans('lang.xxq')); ?></span>-->
                       <!-- </div>-->
					</div>
					<div class="gamelist-content">
						<div class="gamelist-type active" gamelisttype="live">
						    
						  <!--    <div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=OB&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="OB">
								<div class="gameImage-OBLiveCasino"></div>
							</div>  -->
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=DG&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="DG">
								<div class="gameImage-DGLiveCasino"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=SEXY&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="SEXY">
								<div class="gameImage-SEXYLiveCasino"></div>
							</div>							
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=WM&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="WM">
								<div class="gameImage-WM"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=BBIN&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="BBIN">
								<div class="gameImage-bbinLiveCasino"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=EVO&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="EVO">
								<div class="gameImage-EVOLiveCasino"></div>
							</div>
						</div>

						<div class="gamelist-type" gamelisttype="chess">
							<!--<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=GDQ&game_type=6&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="GDQ">
								<div class="gameImage-GDQChess"></div> 
							</div>-->
							
							
							
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=LEG&game_type=6&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="LEG">
								<div class="gameImage-LEGChess"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=KY&game_type=6&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="KY">
								<div class="gameImage-KAIYUANChess"></div>
							</div>
						<!--	<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/api/gamelist?api_code=BL&game_type=6&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="BL">
								<div class="gameImage-BOLEChess"></div> 
							</div> -->
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=DTQP&game_type=6&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="DTQP">
								<div class="gameImage-DTQPChess"></div>
							</div>
						</div>

						<div class="gamelist-type" gamelisttype="slotgame">

						<!--	<div class="game-btn gamelist-col electronicgames btn-pages toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=JOKER&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JOKER">
								<div class="gameImage-JOKERSlotgame"></div>
							</div> -->
							
							<div class="game-btn gamelist-col electronicgames btn-pages toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=CQ9&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="CQ9">
								<div class="gameImage-CQ9Slotgame"></div>
							</div>
							
							<div class="game-btn gamelist-col toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=JDB&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JDB">
								<div class="gameImage-JDBSlotgame"></div>
							</div>
							<!-- <div class="game-btn gamelist-col electronicgames btn-pages" groupid="84" data-page-name="KA">
                                <div class="gameImage-KASlotgame"></div>
                            </div> -->
							<!--<div class="game-btn gamelist-col electronicgames btn-pages" groupid="44"-->
							<!--	 data-page-name="EC">-->
							<!--	<div class="gameImage-MWSlotgame"></div>-->
							<!--</div>-->
							<!--<div class="game-btn gamelist-col electronicgames btn-pages" groupid="95"-->
							<!--	 data-page-name="DRAGOONSOFT">-->
							<!--	<div class="gameImage-DSSlotgame"></div>-->
							<!--</div>-->
							<!-- <div class="game-btn gamelist-col electronicgames btn-pages" groupid="130" data-page-name="FUNKY">
                                <div class="gameImage-FUNKYSlotgame"></div>
                            </div> -->
							<!-- <div class="game-btn gamelist-col electronicgames btn-pages" groupid="147" data-page-name="ICG">
                                <div class="gameImage-ICGSlotgame"></div>
                            </div> -->
                            
                         <!--   <div class="game-btn gamelist-col electronicgames btn-pages toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=BBIN&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="BBIN">
								<div class="gameImage-CQ9Slotgame"></div>   
							</div>-->
							<div class="game-btn gamelist-col electronicgames btn-pages toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=PNG&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PNG">
								<div class="gameImage-PNGSlotgame"></div>
							</div>
							<div class="game-btn gamelist-col electronicgames btn-pages toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=PG&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PG">
								<div class="gameImage-PGSlotgame"></div>
							</div>
							<div class="game-btn gamelist-col electronicgames btn-pages toplay"  <?php if($_member): ?> data-url="/game/playGame?plat_type=PP&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PP">
								<div class="gameImage-PPSlotgame"></div>
							</div>
						</div>

						<div class="gamelist-type" gamelisttype="fish">
						    
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=FISH&game_type=redirect&devices=1" <?php else: ?> data-url="" <?php endif; ?> >
								<div class="gameImage-Fish"></div>
							</div>
							
						</div>

						<div class="gamelist-type" gamelisttype="sport">
						<!--    <div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=HG&game_type=5&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="HG">
								<div class="gameImage-HG"></div>
							</div>		-->				    
						    <div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=CMD&game_type=5&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="CMD">
								<div class="gameImage-CMD"></div>
							</div>
						    
						    <div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=SBO&game_type=5&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="SBO">
								<div class="gameImage-SBO"></div>
							</div>
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=OB&game_type=5&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="OB">
								<div class="gameImage-OBSPORTSport"></div>
							</div>
							
					<!--	<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=BBIN&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="BBIN">
								<div class="gameImage-BBINSport"></div>  
							</div>    --> 
						<!--	 <div class="game-btn gamelist-row" groupid="4" hall="BBIN" gametype="FT">
                                <div class="gameImage-BBINSport"></div>
                            </div>  -->
							<!-- <div class="game-btn gamelist-row" groupid="50" hall="SB" gametype="0">
                                <div class="gameImage-SBSport"></div>
                            </div> -->
						</div>

						<!--<div class="gamelist-type" gamelisttype="lottery">-->
						<!--	<div class="game-btn gamelist-row" groupid="29" hall="HAOCAI" gametype="0">-->
						<!--		<div class="gameImage-WMLottery"></div>-->
						<!--	</div>-->
						<!--	<div class="game-btn gamelist-row" groupid="89" hall="VRSINGLE" gametype="1">-->
						<!--		<div class="gameImage-VRLottery"></div>-->
						<!--	</div>-->
						<!--	<div class="game-btn gamelist-row" groupid="15" hall="DIOS" gametype="LO">-->
						<!--		<div class="gameImage-APLLottery"></div>-->
						<!--	</div>-->
						<!--	<div class="game-btn gamelist-row" groupid="88" hall="GONE" gametype="1">-->
						<!--		<div class="gameImage-GONELottery"></div>-->
						<!--	</div>-->
						<div class="gamelist-type" gamelisttype="esports">
							<div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=IA&game_type=7&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="IA">
								<div class="gameImage-IA"></div>
							</div>
						    <div class="game-btn gamelist-row toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=TFG&game_type=7&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="TFG">
								<div class="gameImage-TFG"></div>
							</div>


						</div>					
						<div class="gamelist-type" gamelistType="liveBroadcast">
                            <div class="game-btn gamelist-row" onclick="window.open('https://xvideos.com/')">
								<div class="gameImage-SEXYLiveCasino"></div>
							</div>
                            <!-- <div class="gamelist-col game-btn" groupid="112" hall="LIVE">
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
                            </div> -->
                        </div>
					</div>
				</div>
			</div>
			<!-- 底部按鈕 -->
			<div class="home-fix-bottom-box">
				<a  class="fix-bottom-btn active" href="/m">
					<span class="fix-bottom-btn-icon btn-1"></span>
					<strong class="home-fix-bottom-text"><?php echo e(trans("lang.shouye")); ?></strong>
				</a>
				<a  class="fix-bottom-btn btn-pop" href="/m/activity_list">
					<span class="fix-bottom-btn-icon btn-2"></span>
					<strong class="home-fix-bottom-text"><?php echo e(trans("lang.hdzx")); ?></strong>
				</a>
				<a  class="fix-bottom-btn mobile-download btn-pop" style="display: flex;" href="/m/transfer">
					<span class="fix-bottom-btn-icon btn-3" style="display: block;"></span>
					<strong class="home-fix-bottom-text"><?php echo e(trans("lang.edzh")); ?></strong>
				</a>
				<a class="fix-bottom-btn btn-service kefu_box" >
					<span class="fix-bottom-btn-icon btn-4"></span>
					<strong class="home-fix-bottom-text"><?php echo e(trans("lang.zxkf")); ?></strong>
					
				</a>
				<a  class="fix-bottom-btn btn-pages" href="/m/userinfo">
					<span class="fix-bottom-btn-icon btn-5"></span>
					<strong class="home-fix-bottom-text "><?php echo e(trans("lang.wode")); ?></strong>
				</a>
			</div>
			
			
			
		</div>
	</div>
	<!-- 公告 -->
	<?php if($gonggao==0): ?>
    	<div id="bulletin-dialog" class="modal after-close bulletin-dialog" style="display:block">
    		<div class="modal-dialog">
    			<div class="modal-content neka_sound" style="height: 420px;">
    				<div class="modal-title modal-header">
    					<h1 style="font-size: 17px; color: #fff"><?php echo e(trans('lang.xtgg')); ?></h1>
    				</div>
    				<div class="modal-body" style="overflow: auto;padding: 0 15px;">
    					<table class="bulletin_table"
    						   style=" border-spacing: 0px 15px; color: #000000; table-layout: fixed; width: 100%;">
    						<tr>
    							<td style="word-break: break-all;">
    							    <pre style="white-space: pre-wrap; word-wrap: break-word;">
    							        <?php echo e($system_notices->content); ?>

    							    </pre>
    							</td>
    						</tr>
    					</table>
    					<!-- 欢迎光临WM娱乐城 -->
    				</div>
    			</div>
    		</div>
    		<a data-pop="bulletin-dialog" class="modal-close btn-close" onclick="$(this).parent().next().hide();$(this).parent().hide();"></a>
    	</div>
    	<!-- 背景遮罩 -->
	    <div id="modal-backdrop" class="modal-backdrop" style="display:block"></div>
    <?php endif; ?>
    
        <?php if(!Auth::guard('member')->guest()): ?>
                <ul class="moenyList" style="display:none;">
				    <?php $__currentLoopData = $api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $mod = $_member->apis()->where('api_id', $item->id)->first();
                        ?>
    					<li >
    						<h2><?php echo e($item->api_title); ?></h2>
    						<?php if($mod): ?>
    						    <p style="color: #d2b79c;" class="gamecode" data-code="<?php echo e($item->api_name); ?>">  <?php echo e($mod->money); ?>  </p>
    						<?php else: ?>
    						    <p>  <?php echo e(trans("lang.wkt")); ?>  </p>
    						<?php endif; ?>
    						
    						<img src="/new/css/loading.png">
    					</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
        <?php endif; ?>
    

	

	
	<!--<script src="/new0404/js/jweixin-1.0.0.js"></script>-->
	<script src="/new0404/js/marquee.js"></script>
	<!--<script src="/new0404/js/demo.js?202204071330"></script>-->
	<script src="/new0404/js/game-hall.js"></script>
	<!--<script src="/new0404/js/address.js"></script>-->
	<script type="text/javascript" src="/new/css/layer.js"></script>
</div>


<script>
    var swiperBanner = new Swiper('.home-swiper-wrapper .swiper-container', {
			autoplay:{
				disableOnInteraction: false,
			},
			loop:true,
		});
    $('body').on('click','.lang',function(){
    	layer.open({type: 2});
        var lang = $(this).data('lang');
        $.ajax({
            url:'/m/changelang',
            data:{lang:lang},
            success:function(res){
                location.reload();
            }
        })
        return false;
    })
    
    $('#transfer').click(function(){
	    var that = $(this);
	    that.next().text('<?php echo e(trans("lang.hsz")); ?>...');
	    $('.gamecode').each(function(){
            var _this=$(this);
            $.ajax({
                    url:'/member/one_transfer',
                    type:'post',
                    data:{api_name:_this.data('code'),transfer_type:1},
                    success:function(res){
                        
						if(res.status.errorCode==0){
						    $.ajax({
                                url:'/m/membermoney',
                                success:function(res){
                                    $('#gamemoneyy').text(res.money)
                                }
                            })
						}
                    }
                })
		});
		setTimeout(function(){
		    that.next().text('<?php echo e(trans("lang.zijinhuishou")); ?>');
		},2000)
	   // $.ajax({
	   //     url:'/member/transfer_all',
	   //     type:'post',
	   //     success:function(res){
	   //         that.next().text('<?php echo e(trans("lang.zijinhuishou")); ?>');
	   //        // location.reload()
	   //        $.ajax({
	   //            url:'/member/getNowMoney',
	   //            success:function(res){
	   //                $('#gamemoney').text(res.data)
	   //            }
	   //        })
	   //     }
	   // })
	})
	
	
    $('.toplay').click(function(){
            var url = $(this).data('url');
            var code = $(this).data('code');
            
            $('#login_url').attr('data-url',url);
            $('#rightEnter').attr('data-code',code);
            $('#plat_type').text(code);
            if(!url){
                alert('<?php echo e(trans("lang.qxdryx")); ?>！',1);
            }else{
                if(code=='OB'){
                    layer.open({
                        content: '<font color="#000">遊戲維護中 請儘快等遊戲結算後將資金回收</font>'
                        ,btn: '我知道了'
                    });
                    return;
                }
          //   	$.ajax({
		        //     url: "<?php echo e(route('member.post_transfer_all')); ?>",
		        //     type: 'POST',
		        //     success: function (data) {
		        //     	setTimeout(function(){
		        //     		$.ajax({
					     //        url: "<?php echo e(route('member.one_transfer')); ?>",
					     //        type: 'POST',
					     //        data:{api_name:code,transfer_type:0},
					     //        success: function (data) {
					                
					     //        }
					     //    })
		        //     	},1000)
		                
		        //     }
		        // })
		        
                window.open(url);

                // $.ajax({
                //     url:'/m/membermoney',
                //     success:function(res){
                //         $('#lesNum').text(res.money)
                //         $('.member_money').text(res.money)
                        
                //     }
                // })
                // $('#moneyInp').val('');
                // $('#cover,.noticeAltbox').fadeIn();
            }
    })
</script>
<!-- Start of LiveChat (www.livechat.com) code -->
<?php echo $_system_config->kefu_html; ?>

<!-- End of LiveChat code -->
</body>
</html>
<?php echo $__env->make('wap.template.theme10.layouts.fotter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>