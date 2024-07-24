<!DOCTYPE html>
<!-- saved from url=(0025)/m -->
<html style="font-size:52px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title>{{ $_system_config->site_title}}</title>
    <meta name="csrf-token" content="tOOOsj01s4j0MxU9zbEhfByWzjN7TUahAmo2mAzM">
	<link type="text/css" rel="stylesheet" href="/new/css/swiper.css">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<link type="text/css" rel="stylesheet" href="/new/css/style.css">
	<link rel="apple-touch-icon" href="/wap/images/iconq.png">

	<script type="text/javascript" src="/new/css/jquery.js"></script>
	<script type="text/javascript" src="/new/css/font.js"></script>
	<script type="text/javascript" src="/new/css/swiper.min.js"></script>
	<script type="text/javascript" src="/new/css/jquery.SuperSlide.2.1.js"></script>

	<style>
    .jump{
                padding:20px;
                /* 设置图片跳动动画 */
                animation: jump 1.5s ease infinite;
            }
    @keyframes jump{
                0%{ transform:translateY(0) scale(1,1);}
                /* 中间状态图片位移并且拉伸 */
                50%{transform:translateY(-50px) scale(0.97,1.03);}
                100%{transform:translateY(0) scale(1,1);}
            }
</style>
    	<meta name="apple-mobile-web-app-capable" content="yes"><!-- 删除苹果默认的工具栏和菜单栏 -->
    <meta name="x5-fullscreen" content="true"><!-- QQ强制全屏 -->
    <meta name="full-screen" content="yes"><!-- UC强制全屏 -->
<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>
<body class="m_bac">
	<!--<img id="layertitle" src="/new/img/goback.png" style="position:fixed;top:10px;right:10px;z-index:99999999;display:none;width:40px;">-->

	<!-- <img  src="/zhuanpan/z2.png" style="position:fixed;right:10px;top:150px;width:70px;z-index:9" class="jump tojump"> -->
	<!-- <div class="header">
    <img src="/uploads/logo/e37c1ed3c4fa52f7f906ea1b09a1a3cc2e4a25be.png">
    <div class="noticeBtn"><a href="https://direct.lc.chat/13354977/;"></a></div>
</div> -->
<div class="header">
    	<div class="headerTop">
             <div class="userName">
                @if (!Auth::guard('member')->guest())
                    <p>{{ $_member -> name }}</p>
                @else
                    <p>請登錄</p>
                @endif
              </div>
              <div class="glodBox">
                <img src="/new/css/glod.png" class="glodImg">
                <p>{{@$_member -> money?$_member -> money:'0.00'}}</p>
              </div>
            @if (!Auth::guard('member')->guest())
                <a href="/m/drawing" class="signBtn">{{trans("lang.tixian")}}</a>
                <a href="/m/recharge" class="signBtn">{{trans("lang.chongzhi")}}</a>
            @else
                <a href="/m/login" class="signBtn">{{trans("lang.denglu")}}</a>
                <a href="/m/register" class="signBtn">{{trans("lang.zhuce")}}</a>
            @endif
        </div>
     <div class="headerNotice">
            <div class="txtMarquee-left">
                <div class="bd">
                     <div class="tempWrap" style="overflow:hidden; position:relative; width:759px">
                        <marquee style="color:#fff;font-size:20px;margin-top: 5px;">{{$system_notices->content}}&nbsp;&nbsp;&nbsp;&nbsp;{{trans("lang.zxrs")}}<?php echo rand(11000,13000)?></marquee>
    					</ul>
    				</div>
                 </div>
             </div>
         </div>
     <div class="userChose">
        <img src="/css/img/e37c1ed3c4fa52f7f906ea1b09a1a3cc2e4a25be.png">
     </div>
</div>	<div class="banner">
			<div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
				<div class="swiper-wrapper" >
					<div class="swiper-slide" data-swiper-slide-index="0" >
						<a><img src="/css/img/4f9d541593d82b5431e7a0d188b5807d248dc7af.jpg"></a>
					</div>
					<div class="swiper-slide" data-swiper-slide-index="1" >
						<a><img src="/css/img/4f9d541593d82b5431e7a0d188b5807d248dc7a.jpg"></a>
					</div>
					<div class="swiper-slide" data-swiper-slide-index="2" >
						<a><img src="/css/img/4f9d541593d82b5431e7a0d188b5807d248dc7.jpg"></a>
					</div>
					<div class="swiper-slide" data-swiper-slide-index="3" >
						<a><img src="/css/img/4f9d541593d82b5431e7a0d188b5807d248dc.jpg"></a>
					</div>
					<div class="swiper-slide" data-swiper-slide-index="4" >
						<a><img src="/css/img/4f9d541593d82b5431e7a0d188b580748dc.jpg"></a>
					</div>
					<div class="swiper-slide" data-swiper-slide-index="5" >
						<a><img src="/css/img/4f9d541593d82b5431e7a8b580748dc.jpg"></a>
					</div>
				</div>
				<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
			</div>
	</div>
	<div class="slideChose">
		<span class="cur">電子</span>
		<span>真人</span>
		<span>棋牌</span>
		<span>體育</span>
		<span>捕鱼</span>
	</div>
	<div class="gameSlide">
		<div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-autoheight swiper-container-ios">
			<div class="swiper-wrapper" style="height: 937px; transform: translate3d(0px, 0px, 0px);">
				<div class="swiper-slide swiper-slide-active" style="width: 376px;">
					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=CQ9&game_type=3&devices=1" @else data-url="" @endif data-code="CQ9">
    					<img src="/new/img/img/cq9.png">
    				</a>
    				<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=3&devices=1" @else data-url="" @endif data-code="JDB">
    					    <img src="/new/img/img/jdb.png">
    					</a>
					</div>
					<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=BBIN&game_type=3&devices=1" @else data-url="" @endif data-code="BBIN">
    					    <img src="/new/img/img/bbinyx.png">
    					</a>
					</div>
					<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=PNG&game_type=3&devices=1" @else data-url="" @endif data-code="PNG">
    					    <img src="/new/img/img/pngyx.png">
    					</a>
					</div>
					<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=PG&game_type=3&devices=1" @else data-url="" @endif data-code="PG">
    					    <img src="/new/img/img/pg.png">
    					</a>
					</div>
					<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=PP&game_type=3&devices=1" @else data-url="" @endif data-code="PP">
    					    <img src="/new/img/img/ppyx.png">
    					</a>
					</div>
					<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=GSS&game_type=3&devices=1" @else data-url="" @endif data-code="GSS">
    					    <img src="/new/img/img/gs.png">
    					</a>
					</div>
				</div>
				<div class="swiper-slide swiper-slide-next" style="width: 376px;">
					<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=OB&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="OB">
    					    <img src="/new/img/img/obzr.png">
    					</a>
					</div>
				<!--	<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=YB&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="YB">
    					    <img src="/new/img/img/ybb.png">
    					</a>
					</div>    -->
					<div class="swiper-slide 2" >
    					<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=DG&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="DG"><img src="/new/img/img/dg.png"></a>
					</div>
					<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=WM&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="WM">
    					    <img src="/new/img/img/wmss.png">
    					</a>
					</div>
				<!--	<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=XGLIVE&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="XGLIVE">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>    -->
					<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=BBIN&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="BBIN">
    					    <img src="/new/img/img/bbss.png">
    					</a>
					</div>
				</div>
				<div class="swiper-slide" style="width: 376px;">
					<div class="swiper-slide 3" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=GDQ&game_type=6&devices=1" @else data-url="" @endif data-code="GDQ">
    					    <img src="/new/img/img/gd.png">
    					</a>
					</div>
				<!--	<div class="swiper-slide 3" >

    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=TH&game_type=6&devices=1" @else data-url="" @endif data-code="TH">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>   -->
				<!--	<div class="swiper-slide 3" >

    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=AP&game_type=6&devices=1" @else data-url="" @endif data-code="AP">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>  -->
					<div class="swiper-slide 3" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=LEG&game_type=6&devices=1" @else data-url="" @endif data-code="LEG">
    					    <img src="/new/img/img/leg.png">
    					</a>
					</div>
					<div class="swiper-slide 3" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=OB&game_type=6&devices=1" @else data-url="" @endif data-code="OB">
    					    <img src="/new/img/img/obqp.png">
    					</a>
					</div>
					<div class="swiper-slide 3" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=KY&game_type=6&devices=1" @else data-url="" @endif data-code="KY">
    					    <img src="/new/img/img/kyqp.png">
    					</a>
					</div>
				</div>
				<div class="swiper-slide" style="width: 376px;">
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=OB&game_type=5&devices=1" @else data-url="" @endif data-code="OB">
    					    <img src="/new/img/img/obty.png">
    					</a>
					</div>
				<!--	<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=OB&game_type=7&devices=1" @else data-url="" @endif data-code="OB">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>  -->
				<!--	<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=AVIA&game_type=7&devices=1" @else data-url="" @endif data-code="AVIA">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>   -->
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=SBO&game_type=5&devices=1" @else data-url="" @endif data-code="SBO">
    					    <img src="/new/img/img/sbo.png">
    					</a>
					</div>
				<!--	<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=IBC&game_type=5&devices=1" @else data-url="" @endif data-code="IBC">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>     -->
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=BBIN&game_type=5&devices=1" @else data-url="" @endif data-code="BBIN">
    					    <img src="/new/img/img/bbinty.png">
    					</a>
					</div>
				<!--	<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=SS&game_type=5&devices=1" @else data-url="" @endif data-code="SS">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>  -->
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=IA&game_type=7&devices=1" @else data-url="" @endif data-code="IA">
    					    <img src="/new/img/img/ai.png">
    					</a>
					</div>
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=TFG&game_type=7&devices=1" @else data-url="" @endif data-code="TFG">
    					    <img src="/new/img/img/tf.png">
    					</a>
					</div>
				</div>   
				<div class="swiper-slide" style="width: 376px;">
						<div class="swiper-slide 6" id="e">

							<a class="toplay2" @if($_member) data-url="/game/playGame?plat_type=FISH&game_type=redirect&devices=1" @else data-url="" @endif >
					           <img src="/new/img/img/FISH.png">
            				</a>
						</div>
						<!-- <div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=OB&game_type=6&game_code=200&devices=1" @else data-url="" @endif data-code="OB">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=KY&game_type=2&game_code=510&devices=1" @else data-url="" @endif data-code="KY">
					           <img src="/new/img/img/KY.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=KY&game_type=2&game_code=520&devices=1" @else data-url="" @endif data-code="KY">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AT&game_type=2&game_code=cmf0001&devices=1" @else data-url="" @endif data-code="AT">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AT&game_type=2&game_code=cmf0002&devices=1" @else data-url="" @endif data-code="AT">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=CQ9&game_type=2&game_code=cq9-AB3&devices=1" @else data-url="" @endif data-code="CQ9">
					           <img src="/new/img/img/CQ9.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=CQ9&game_type=2&game_code=cq9-AT05&devices=1" @else data-url="" @endif data-code="CQ9">
					           <img src="/new/img/img/CQ9.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=CQ9&game_type=2&game_code=cq9-AT01&devices=1" @else data-url="" @endif data-code="CQ9">
					           <img src="/new/img/img/CQ9.png">
            				</a>
						</div>

						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7001&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7002&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7003&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7004&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7005&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7006&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7007&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>


						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AP&game_type=2&game_code=lkpy&devices=1" @else data-url="" @endif data-code="AP">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AP&game_type=2&game_code=hwby&devices=1" @else data-url="" @endif data-code="AP">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AP&game_type=2&game_code=dsnh&devices=1" @else data-url="" @endif data-code="AP">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AP&game_type=2&game_code=jcby&devices=1" @else data-url="" @endif data-code="AP">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AP&game_type=2&game_code=jlongfishing&devices=1" @else data-url="" @endif data-code="AP">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=BBIN&game_type=2&game_code=0&devices=1" @else data-url="" @endif data-code="BBIN">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=LEG&game_type=2&game_code=510&devices=1" @else data-url="" @endif data-code="LEG">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div> -->
				</div>
			</div>
		<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
	</div>

	<div style="display:none">
    @foreach($api_list as $item)

        <span class="gamecode" data-code="{{$item->api_name}}"></span>
    @endforeach
</div>

<div id="cover" style="display: none;"></div>
<div class="noticeAltbox" style="display: none;">
		<div class="noticeTitlebox">
			您需要為【<span id="plat_type"></span>】轉入金額嗎?
		</div>
		<div class="formAlt">
			<div class="lastMoney">
				<p>當前余額：<span id="lesNum">{{@$_member->money}}</span></p>
				<a id="trans_all" href="javascript:void(0)">資金回收</a>
			</div>
			<div class="formSlides">
				<input type="tel" id="moneyInp" placeholder="输入金额" oninput="value=value.replace(/[^\d]/g,'')">
				<button type="button" class="allButton">全部</button>
			</div>
		</div>
		<div class="altButtonbox">
			<a  id="login_url" >直接進入遊戲</a>
			<button style="background: linear-gradient(to bottom, #a70707 0%, #50030f 100%);
    color: #ffffff;display: inline-block;
    width: 2.62rem;
    line-height: .82rem;font-size: .32rem;
    border-radius: 3px;
    margin: 0 0.32rem" href="javascript:void(0)" id="rightEnter" >立即轉入遊戲</button>
		</div>
</div>


	<script type="text/javascript">
		setTimeout(function(){
        $('#footer3').addClass('cur')
    },500)

    $('body').on('click','.kefu_box',function(){
        layer.open({
            content: '<div class="layui-m-layerbtn"><span yes="" type="1" onclick="tapCopy('+"'url_whats'"+')" data-clipboard-target="#url">WHATSAPP</span></div>  {{--<div class="layui-m-layerbtn"><span yes="" type="1" onclick="wechat()">{{trans("lang.weixin")}}</span></div>--}} <div class="layui-m-layerbtn"><a href="{{$setting->service_link}}" target="_blank"><span yes="" type="1">{{trans("lang.zxkf")}}</span></a></div>'
            ,skin: 'footer'
        });
    })
    function wechat(){
        layer.open({
            content: '<img src="{{$setting->wx_pic}}" style="width:200px;height:200px;">'
            ,btn: 'OK'
        });
    }
        
        $('.toplay').click(function(){
            var url = $(this).data('url');
            var code = $(this).data('code');
            $('#login_url').attr('data-url',url);
            $('#rightEnter').attr('data-code',code);
            $('#plat_type').text(code);
            if(!url){
                alert('请先登录游戏！',1);
            }else{
                $.ajax({
                    url:'/m/membermoney',
                    success:function(res){
                        $('#lesNum').text(res.money)
                        $('.member_money').text(res.money)
                        
                    }
                })
                $('#moneyInp').val('');
                $('#cover,.noticeAltbox').fadeIn();
            }
        })

        $('.toplay2').click(function(){
            var url = $(this).data('url');
            if(!url){
                alert('请先登录游戏！',1);
            }else{
				window.open(url);
            	//$('#layertitle').show();
                //layer.open({
                //  type: 1
                //  ,shadeClose: true
                //    ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;" ></iframe>'
                //  ,anim: 'down'
                //  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
                //});
            }
        })



        $('#login_url').click(function(){
            var url = $(this).attr('data-url');
			window.open(url);
			
                $('#cover,.noticeAltbox').fadeOut();
				return false;
                $('#layertitle').show();
                layer.open({
                  type: 1
                  ,shadeClose: true
                    ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;" ></iframe>'
                  ,anim: 'down'
                  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
                });
        })
        
        
        $('#layertitle').click(function(){
            layer.closeAll();
            $(this).hide();
        })
        $('#rightEnter').click(function(){
            var code = $(this).attr('data-code');
            var money = $('#moneyInp').val();
            if(!money){
                layer.open({
                    content: '金额需大于0'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
                return;
            }
var url = $('#login_url').attr('data-url');
				
            $.ajax({
                url : "{{ route('member.post_transfer') }}",
                type : 'POST',
                data : {money:money,transfer_type:0,code:code,account1:1},
                success : function (data) {
                    //alert(data.status.msg);
                    	$.ajax({
                           url:'/m/membermoney',
                            success:function(res){
                                $('#lesNum').text(res.money)
                                $('.member_money').text(res.money)
                                        
                        }
                    })
                }
            })
			window.open(url);
                //$('#cover,.noticeAltbox').fadeOut();
                //$('#layertitle').show();
                return false;
                layer.open({
                  type: 1
                  ,shadeClose: true
                    ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;" ></iframe>'
                  ,anim: 'down'
                  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
                });
        })
        
        
        
        $('.joker').click(function(){
            var url = $(this).data('url');
            var code = $(this).data('code');
            $('#moneyInp').val('');
            if(!url){
                alert('请先登录游戏！',1);
            }else{
                var u = navigator.userAgent;
                var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
                var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
                if(isiOS){
                    $('#login_url').attr('data-url',url);
                        $('#rightEnter').attr('data-code',code);
                        $('#plat_type').text(code);
                        if(!url){
                            alert('请先登录游戏！',1);
                        }else{
                            $.ajax({
                                url:'/m/membermoney',
                                success:function(res){
                                    $('#lesNum').text(res.money)
                                    $('.member_money').text(res.money)
                                    
                                }
                            })
                            
                            $('#cover,.noticeAltbox').fadeIn();
                    }
                    // $('#layertitle').show();
                    // layer.open({
                    //   type: 1
                    //   ,shadeClose: true
                    //     ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 95vh;" ></iframe>'
                    //   ,anim: 'down'
                    //   ,style: 'position:fixed; left:0; bottom:0; width:100%; height:95%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
                    // });
                }else if(isAndroid){
                    $('#login_url').attr('data-url','/m/app_login?url='+encodeURIComponent(url)+'&code='+code);
                        $('#rightEnter').attr('data-code',code);
                        $('#plat_type').text(code);
                        if(!url){
                            alert('请先登录游戏！',1);
                        }else{
                            $.ajax({
                                url:'/m/membermoney',
                                success:function(res){
                                    $('#lesNum').text(res.money)
                                    $('.member_money').text(res.money)
                                    
                                }
                            })

                            $('#cover,.noticeAltbox').fadeIn();
                    }
                }
            }
        })
        $('body').on('click','#appp',function(){
            var code =$(this).data('code');
            $.ajax({
                url:'/api/jokergame',
                data:{code:code},
                success:function(res){
                    location.href=res;
                }
            })
        })
        $('body').on('click','#dojoker',function(){
            layer.closeAll();
            var url = $(this).data('url');
            $('#layertitle').show();
                    layer.open({
                      type: 1
                      ,shadeClose: true
                        ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;" ></iframe>'
                      ,anim: 'down'
                      ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
                    });
        })
        
        $('#lang').click(function(){
        layer.open({
            content: `<div class="layui-m-layerbtn">
                        <span yes="" type="1"  class="lang" data-lang="zh_cn">
                            <img src="/data/zh_cn.png" style="width: 32px;height: 20px;vertical-align: middle;">
                            简体中文
                        </span>
                    </div>
                    <div class="layui-m-layerbtn">
                        <span yes="" type="1" class="lang" data-lang="ft">
                            <img src="/data/ft.png" style="width: 32px;height: 20px;vertical-align: middle;">
                            繁体中文
                        </span>
                    </div>
                    <div class="layui-m-layerbtn">
                        <span yes="" type="1" class="lang" data-lang="en">
                            <img src="/data/en_us.png" style="width: 32px;height: 20px;vertical-align: middle;">
                            English
                        </span>
                    </div>`
            ,skin: 'footer'
        });
    })
    $('body').on('click','.lang',function(){
        var lang = $(this).data('lang');
        $.ajax({
            url:'/m/changelang',
            data:{lang:lang},
            type:'post',
            success:function(res){
                location.reload()
            }
        })
    })
    $('#layertitle').click(function(){
        $(this).hide();
        layer.close(layer.index);
    })
    
    @if($gonggao==1)
        $(function(){
            layer.open({
                title: [
                  "{{trans('lang.xtgg')}}",
                  "background-color: #0b93ae; color:#fff;"
                ]
                ,content: '{{$system_notices->content}}'
            });
            $('.layui-m-layercont').css('color','#000');
            $('h3').css('margin','0');
        })
    @endif



		jQuery(".txtMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:1,interTime:50});
		var swiperBanner = new Swiper('.banner .swiper-container', {
			autoplay:{
				disableOnInteraction: false,
			},
			loop:true,
		});
		var swiperGame = new Swiper('.gameSlide .swiper-container', {
			autoHeight: true,
			on: {
				slideChangeTransitionStart: function(){
					var num = this.activeIndex;
					$('.slideChose span').eq(num).addClass('cur').siblings().removeClass('cur')
				},
			},
		});
		$('.slideChose span').click(function(){
			var num = $(this).index();
			$(this).addClass('cur').siblings().removeClass('cur');
			swiperGame.slideTo(num);
		})
	</script>
	<script type="text/javascript">
		$('.clickbtn').click(function(){
			var url = $(this).attr('data-url');
			var plat_type = $(this).attr('plat_type');
			if (plat_type == 'EVO' ){
				if (!confirm('Evolution(EVO)真人視訊平台 每注 / 每局 賠付上限為 10萬HKD 封頂，請知悉！超過10萬HKD以上的彩金將會按10萬HKD計算，亦會在出金時扣除! 凡進入(EVO)平台遊戲即代表接受本條款！')){
					return false;
				}
			}
			$('#login_url').attr('href','').attr('href',url);
			$('#plat_type').html(plat_type);
			$('#rightEnter').attr('plat_type',plat_type)
			$('#moneyInp').val('');
			// console.log(url);
			$('#cover,.noticeAltbox').fadeIn();
		})
		$('#cover').click(function(){
			$('#cover,.noticeAltbox').fadeOut();
		})
		$('.allButton').click(function(){
			var lesNum = $('#lesNum').html();
			$('#moneyInp').val(lesNum);
		})

		$('#trans_all').click(function (){

				_this = $(this);
				_this.html('回收中...');
				// $('.allButton').attr('disabled',true);
				$('.gamecode').each(function(){
                    var that=$(this);
                    $.ajax({
                            url:'/member/one_transfer',
                            type:'post',
                            data:{api_name:that.data('code'),transfer_type:1},
                            success:function(res){
                                $.ajax({
                                    url:'/m/membermoney',
                                    success:function(res){
                                        $('#lesNum').text(res.money)
                                        $('.member_money').text(res.money)
                                        
                                    }
                                })
                            }
                        })
        		});	
        		setTimeout(function(){
        		    _this.html('資金回收');
        		},1000)
				
				
				// $.ajax({
    //                 url:'/member/one_transfer',
    //                 type:'post',
    //                 data:{api_name:$('#rightEnter').attr('data-code'),transfer_type:1},
    //                 success:function(res){
    //                     _this.html('資金回收');
				// 		$('.allButton').attr('disabled',false);
				// 		sign = true;
				// 		if(res.status.errorCode==1){
				// 		    layer.open({
    //         					content: res.status.msg
    //         					,skin: 'msg'
    //         					,time: 2 //2秒后自动关闭
    //         				});
    //         				return false;
				// 		}else if(res.status.errorCode==0){
				// 		    $('#lesNum').text(0)
				// 		}
    //                 }
    //             })
				
				
				// $.post('/api/trans_all', function (data) {
				// 	if ( data['code'] == 0 ) {
				// 		_this.html('資金回收');
				// 		$('.allButton').attr('disabled',false);
				// 		sign = true;
				// 		// $('.refuseBtn').trigger('click')
				// 	}else{
				// 		alert(data['msg']);
				// 	}
				// });

		})
		
		
	$('#lang').click(function(){
        layer.open({
            content: `<div class="layui-m-layerbtn">
                        <span yes="" type="1"  class="lang" data-lang="zh_cn">
                            简体中文
                        </span>
                    </div>
                    <div class="layui-m-layerbtn">
                        <span yes="" type="1" class="lang" data-lang="ft">
                            繁体中文
                        </span>
                    </div>
                    <div class="layui-m-layerbtn">
                        <span yes="" type="1" class="lang" data-lang="en">
                            English
                        </span>
                    </div>`
            ,skin: 'footer'
        });
    })
    $('body').on('click','.lang',function(){
        var lang = $(this).data('lang');
        $.ajax({
            url:'/m/changelang',
            data:{lang:lang},
            type:'post',
            success:function(res){
                location.reload()
            }
        })
    })

 //    setInterval(function(){
	//     $.ajax({
	//         url:'/m/tongzhi',
	//         success:function(res){
	//             if(res==1){
	//                 layer.open({
 //                      content: '<img  src="zhuanpan/z.png" style="width:200px;margin:0 auto;" onclick="zhuanpan()">'
 //                      ,style: 'background:none; color:#fff; border:none;text-align:center;' //自定风格
 //                      ,time: 0
 //                    });
	//             }
	//         }
	//     })
	// },2000)
	// function zhuanpan(){
	//     $('#layertitle').show();
	//     var url="/m/zhuanpan";
	//     layer.open({
 //                  type: 1
 //                  ,shadeClose: true
 //                    ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;"  id="zhuanpan"></iframe>'
 //                  ,anim: 'down'
 //                  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
 //        });
	// }

	// $('.tojump').click(function(){
	//     var url="/m/zhuanpan";
	//     layer.open({
 //                  type: 1
 //                  ,shadeClose: true
 //                    ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;"  id="zhuanpan"></iframe>'
 //                  ,anim: 'down'
 //                  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
 //        });
	// })
	</script>
@extends('wap.template.theme10.layouts.fotter')



<div class="bj"></div>

<script type="text/javascript">
	$('.gdbtn').click(function(){
		$('.dhtc').css('bottom','.12rem');
		$('.bj').fadeIn();
	})
	$('.contact').click(function(){
		$('.contact_content').css('bottom','.12rem');
		$('.bj').fadeIn();
	})
	$('.qxbtn').click(function(){
		$('.dhtc').css('bottom','-4rem');
		$('.bj').fadeOut();
	})
	$('.qxbtn_2').click(function(){
		$('.contact_content').css('bottom','-10rem');
		$('.bj').fadeOut();
	})
	$('#lang').change(function () {
		var lang =  $("#lang option:selected").attr('href');
		window.location.href = lang;

	})
	$('.fixBottom a').click(function () {
		$(this).addClass('cur').siblings().removeClass('cur');
	})
</script>

<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js?t=100"></script>


</body></html>