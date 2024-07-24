@extends('wap.template.theme4.layouts.main')
@section('content')
<link href="{{ asset('/wap/theme4/css/swiper.min.css') }}" rel="stylesheet">
<link href="{{ asset('/wap/theme4/css/sweet-alert.css') }}" rel="stylesheet">
<link href="{{ asset('/wap/theme4/css/loadAnimation.css') }}" rel="stylesheet">
<link href="{{ asset('/wap/theme4/css/style2.css') }}" rel="stylesheet">
<script src="{{ asset('/wap/theme4/js/swiper.min.js') }}"></script>
<script>
    var liveQuick = "", slotQuick = "", lotteryQuick = "", sportQuick = "", fishQuick = "", chessQuick = "", competitionQuick = "";
</script>
<div class="notice bb1 clearfix">
    <span><img src="{{ asset('/wap/theme4/images/lk_text_home_notice.png') }}" width="40" height="36"></span>
    <div class="marquee-wrap swiper-container notice-swiper swiper-container-vertical swiper-container-ios" style="height:30px">
        <ul class="swiper-wrapper" id="noticeSiper"></ul>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
</div>
@if($_system_config->is_hongbao ==1)
    <div style="padding: 10px;">
        <a target="_blank" href="{{route('wap.red')}}">
            <img style="border-radius: 8px;width: 100%" src="{{asset('wap/images/hongbao/qiang.jpg')}}">
        </a>
    </div>
@endif
<ul class="home-platform mt5 bb1 clearfix" id="gamelist" style="">
    <?php
    $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
    ?>
        @foreach($slot as $k => $v)
    <li>
        <a href="javascript:void (0);" onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1','_blank')">
            <?php
            $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
            $v['img'] = $img;
            ?>
            <img src="{{$img}}">
            <span>{{$v['name']}}</span>
        </a>
    </li>
        @endforeach
        <?php
        $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
        ?>
        @foreach($sports as $k => $v)
            <li>
                <a href="javascript:void (0);" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif">
                    <?php
                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                    $v['img'] = $img;
                    ?>
                    <img src="{{$img}}">
                    <span>{{$v['name']}}</span>
                </a>
            </li>
        @endforeach
        <?php
        $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
        ?>
        @foreach($lottery as $k => $v)
            <li>
                <a href="javascript:void (0);" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif">
                    <?php
                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                    $v['img'] = $img;
                    ?>
                    <img src="{{$img}}">
                    <span>{{$v['name']}}</span>
                </a>
            </li>
        @endforeach
        <?php
        $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
        ?>
        @foreach($live as $k => $v)
            <li>
                <a href="javascript:void (0);" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif">
                    <?php
                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                    $v['img'] = $img;
                    ?>
                    <img src="{{$img}}">
                    <span>{{$v['name']}}</span>
                </a>
            </li>
        @endforeach
        <?php
        $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
        ?>
        @foreach($poker as $k => $v)
            <li>
                <a href="javascript:void (0);" onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1','_blank')">
                    <?php
                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                    $v['img'] = $img;
                    ?>
                    <img src="{{$img}}">
                    <span>{{$v['name']}}</span>
                </a>
            </li>
        @endforeach
        <li>
            <a href="{{ route('wap.index_py') }}">
                <img src="{{ asset('/wap/theme4/images/fish.png') }}">
                <span>欢乐捕魚</span>
            </a>
        </li>
    <li class="platform-more hei">
        <span>敬请期待</span>
    </li>
    {{--<li class="platform-more hei">
        <span>敬请期待</span>
    </li>
    <li class="platform-more hei">
        <span>敬请期待</span>
    </li>--}}
</ul>
<!--快捷导航-->
{{--
<div class="home-quick clearboth" id="quickContent" style="display: none;">
    <div class="swiper-container swiper-quickcontainer swiper-container-horizontal swiper-container-ios">
        <div class="swiper-wrapper" id="quickNav" style="transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate" type="competitionQuick" onclick="showQuickData(this,'')" data-swiper-slide-index="6">
                <img src="./1_files/competition.png">
                <span>电竞</span>
            </div>
            <div class="swiper-slide active" type="liveQuick" onclick="showQuickData(this,'')" data-swiper-slide-index="0">
                <img src="./1_files/live.png">
                <span>真人</span>
            </div>
            <div class="swiper-slide" type="slotQuick" onclick="showQuickData(this,'')" data-swiper-slide-index="1">
                <img src="./1_files/slots.png">
                <span>電子</span>
            </div>
            <div class="swiper-slide" type="chessQuick" onclick="showQuickData(this,'')" data-swiper-slide-index="2">
                <img src="./1_files/chess.png" style="margin-top:-8px;">
                <span>棋牌</span>
            </div>
            <div class="swiper-slide" type="fishQuick" onclick="showQuickData(this,'')" data-swiper-slide-index="3">
                <img src="./1_files/fish(1).png">
                <span>捕魚</span>
            </div>
            <div class="swiper-slide" type="lotteryQuick" onclick="showQuickData(this,'')" data-swiper-slide-index="4">
                <img src="./1_files/lottery.png">
                <span>彩票</span>
            </div>
            <div class="swiper-slide" type="sportQuick" onclick="showQuickData(this,'')" data-swiper-slide-index="5">
                <img src="./1_files/sport.png">
                <span>體育</span>
            </div>
            <div class="swiper-slide" type="competitionQuick" onclick="showQuickData(this,'')" data-swiper-slide-index="6">
                <img src="./1_files/competition.png">
                <span>电竞</span>
            </div>
            <div class="swiper-slide active swiper-slide-duplicate swiper-slide-duplicate-active" type="liveQuick" onclick="showQuickData(this,'')" data-swiper-slide-index="0">
                <img src="./1_files/live.png">
                <span>真人</span>
            </div></div>

        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
</div>
--}}
<ul class="home-quicklist clearboth" id="quickList" style="display: none;"></ul>
<div class="home-quickdown">
    <a id="androidUrL" href="http://tnet.ng-demo.vip/">安卓下载</a>
    <a id="iosUrL" href="http://tnet.ng-demo.vip/">IOS下载</a>
</div>
<!--红包效果-->
{{--<div class="hongbao-content clearboth">
    <ul class="couten"></ul>
</div>
<div class="mo" onclick="clickMo()">
    <div class="sen">
        <h3>
            获得红包
            <b id="luckHongBao"></b>元
        </h3>
    </div>
</div>--}}
<!--加载动画-->
<div class="loading-content loading-content-index" style="display:none">
    <svg viewBox="0 0 120 120" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="circle" class="g-circles g-circles--v1">
            <circle id="12" transform="translate(35, 16.698730) rotate(-30) translate(-35, -16.698730) " cx="35" cy="16.6987298" r="10"></circle>
            <circle id="11" transform="translate(16.698730, 35) rotate(-60) translate(-16.698730, -35) " cx="16.6987298" cy="35" r="10"></circle>
            <circle id="10" transform="translate(10, 60) rotate(-90) translate(-10, -60) " cx="10" cy="60" r="10"></circle>
            <circle id="9" transform="translate(16.698730, 85) rotate(-120) translate(-16.698730, -85) " cx="16.6987298" cy="85" r="10"></circle>
            <circle id="8" transform="translate(35, 103.301270) rotate(-150) translate(-35, -103.301270) " cx="35" cy="103.30127" r="10"></circle>
            <circle id="7" cx="60" cy="110" r="10"></circle>
            <text x="50%" y="55%">请稍后...</text>
            <circle id="6" transform="translate(85, 103.301270) rotate(-30) translate(-85, -103.301270) " cx="85" cy="103.30127" r="10"></circle>
            <circle id="5" transform="translate(103.301270, 85) rotate(-60) translate(-103.301270, -85) " cx="103.30127" cy="85" r="10"></circle>
            <circle id="4" transform="translate(110, 60) rotate(-90) translate(-110, -60) " cx="110" cy="60" r="10"></circle>
            <circle id="3" transform="translate(103.301270, 35) rotate(-120) translate(-103.301270, -35) " cx="103.30127" cy="35" r="10"></circle>
            <circle id="2" transform="translate(85, 16.698730) rotate(-150) translate(-85, -16.698730) " cx="85" cy="16.6987298" r="10"></circle>
            <circle id="1" cx="60" cy="10" r="10"></circle>
        </g>
    </svg>
</div>
<!--广告弹框-->
<div class="advert-opcity" id="indexDialog" onclick="$('#indexDialog').hide()" style="display: none;">
    <div class="advert-content">
        <h3 id="dialogTitle">活动107</h3>
        <img src="" id="dialogImg">
        <h3 onclick="$('#indexDialog').hide()">关闭</h3>
    </div>
</div>
<input type="hidden" value="0" id="hbCount">
<script>
    var mySwiper = "";
    $(function () {
        swiperLoad();
        //弹窗
        @if($_system_config->is_alert_on == 0)
        $('#indexDialog').hide();
        $('#indexDialog').css({ "display": "flex" });
        $("#dialogImg").attr("src", "{{ $_system_config->alert_img }}");
        $("#dialogTitle").html('消息');
        @endif
        //getGamePlate(1);
        biCommon.getNotices(1);
        //biCommon.getUserHongBaoCount();
        //biCommon.getDialogContent();
    })
</script>


@endsection
