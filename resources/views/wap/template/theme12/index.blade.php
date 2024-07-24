@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/home.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme12/css/sweet-alert.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme12/css/loadAnimation.css') }}" rel="stylesheet" />
    <div id="master-container-Center_HTMLBlock_54314" class="">
        <div id="html-container-Center_HTMLBlock_54314">
            <div class="banner-wrap swiper-container banner-swiper">
                <ul class="slide-banner swiper-wrapper">
                    @foreach($banners as $item)
                    <li class="swiper-slide">
                        <a href="{{ $item -> jumpurl}}">
                            <img style="width: 100%;" src="{{ $item -> path }}" alt="">
                        </a>
                    </li>
                        @endforeach
                </ul>
                <div class="slide-menu swiper-pagination banner-pagination">

                </div>
            </div>
            <div class="notice container">
                <i class="icon-mic"></i>
                <div class=" marquee-wrap news-list swiper-container notice-swiper">
                    <ul class="swiper-wrapper" id="noticeSiper">
{{--                        @* <li>10Bet十博还提供20 000多场滚球赛事，会员必定能找到喜爱的项目哦！</li>*@--}}
                    </ul>
                </div>
            </div>
            <div id="content">
                <div class="mobile-home-nav">
                    <div class="container">
                        <ul>
                            <li>
                                <a href="{{ route('wap.recharge') }}" onclick="return landingslocation();">
                                    <i class="icon-app icon-sport"></i>
                                    <h6>充值</h6>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wap.recharge_record') }}" onclick="return landingslocation();">
                                <i class="icon-app icon-macau"></i>
                                <h6>充值记录</h6>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wap.drawing') }}" onclick="return landingslocation();">
                                <i class="icon-app icon-agCasino"></i>
                                <h6>取款</h6>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wap.drawing_record') }}" onclick="return landingslocation();">
                                <i class="icon-app icon-vip"></i>
                                <h6>取款记录</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="item-section-wrap mobile-top-wrap">
                    <div class="container">

                        <div class="item-section mobile-game-list-wrap swiper-container live-swiper">
                            <div class="title">
                                <h3>真人娱乐场</h3>
                            </div>
                            <div class="swiper-wrapper" id="indexLive">
                                <?php
                                $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                                ?>
                                @foreach($live as $v)
                                        <?php
                                        $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                        $v['img'] = $img;
                                        ?>
                                <div class="col-3 col-sm-6 swiper-slide sub-hot swiper-slide-active" game-box="bb"
                                     onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif"
                                     style="width: 147.5px; margin-right: 20px;"><a href="javascript:void(0)"><img
                                                src="{{ $v['img'] }}" alt="">
                                        <div class="text"><h6 style="text-align: center">{{$v['name']}}</h6></div>
                                    </a></div>
                                    @endforeach
                            </div>

                            <div class="slide-menu swiper-pagination live-pagination">

                            </div>
                        </div>
                        <div class="item-section mobile-game-list-wrap swiper-container solt-swiper">
                            <div class="title">
                                <h3>電子游戏场</h3>
                            </div>

                            <div class="swiper-wrapper" id="indexSolt">
                                <?php
                                $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                                ?>
                                    @foreach($slot as $v)
                                        <?php
                                        $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                        $v['img'] = $img;
                                        ?>
                                        <div class="col-3 col-sm-6 swiper-slide sub-hot swiper-slide-active" game-box="bb"
                                             onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1');"
                                             style="width: 147.5px; margin-right: 20px;"><a href="javascript:void(0)"><img
                                                        src="{{ $v['img'] }}" alt="">
                                                <div class="text"><h6 style="text-align: center">{{$v['name']}}</h6></div>
                                            </a></div>
                                    @endforeach
                            </div>

                            <div class="slide-menu swiper-pagination solt-pagination">

                            </div>
                        </div>
                        <div class="col-12 mobile-promotion-wrap">
                            <div class="item-section">
                                <div class="title">
                                    <h3>體育竞赛场</h3>
                                </div>
                                <div class="block" id="indexSport">
                                    <?php
                                    $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                                    ?>
                                    @foreach($sports as $v)
                                        <?php
                                        $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                        $v['img'] = $img;
                                        ?>
                                        <div class="col-3 col-sm-6 swiper-slide sub-hot swiper-slide-active" game-box="bb"
                                             onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif"
                                             style="width: 147.5px; margin-right: 20px;"><a href="javascript:void(0)"><img
                                                        src="{{ $v['img'] }}" alt="">
                                                <div class="text"><h6 style="text-align: center">{{$v['name']}}</h6></div>
                                            </a></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mobile-promotion-wrap">
                            <div class="item-section">
                                <div class="title">
                                    <h3>彩票娱乐场</h3>
                                </div>
                                <div class="block" id="indexLottery">
                                    <?php
                                    $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                                    ?>
                                        @foreach($lottery as $v)
                                            <?php
                                            $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                            $v['img'] = $img;
                                            ?>
                                            <div class="col-3 col-sm-6 swiper-slide sub-hot swiper-slide-active" game-box="bb"
                                                 onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif"
                                                 style="width: 147.5px; margin-right: 20px;"><a href="javascript:void(0)"><img
                                                            src="{{ $v['img'] }}" alt="">
                                                    <div class="text"><h6 style="text-align: center">{{$v['name']}}</h6></div>
                                                </a></div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mobile-promotion-wrap">
                            <div class="item-section">
                                <div class="title">
                                    <h3>棋牌休闲场</h3>
                                </div>
                                <div class="block" id="indexChess">
                                    <?php
                                    $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                                    ?>
                                        @foreach($poker as $v)
                                            <?php
                                            $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                            $v['img'] = $img;
                                            ?>
                                            <div class="col-3 col-sm-6 swiper-slide sub-hot swiper-slide-active" game-box="bb"
                                                 onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1');"
                                                 style="width: 147.5px; margin-right: 20px;"><a href="javascript:void(0)"><img
                                                            src="{{ $v['img'] }}" alt="">
                                                    <div class="text"><h6 style="text-align: center">{{$v['name']}}</h6></div>
                                                </a></div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mobile-promotion-wrap">
                            <div class="item-section">
                                <div class="title">
                                    <h3>捕魚游乐场</h3>
                                </div>
                                <div class="block" id="indexFish">
                                    <?php
                                    $fish = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish');
                                    ?>
                                        @foreach($fish as $v)
                                            <div class="col-3 col-sm-6 swiper-slide sub-hot swiper-slide-active" game-box="bb"
                                                 onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif"
                                                 style="width: 147.5px; margin-right: 20px;"><a href="javascript:void(0)"><img
                                                            src="{{ $v['img'] }}" alt="">
                                                    <div class="text"><h6 style="text-align: center">{{$v['name']}}</h6></div>
                                                </a></div>
                                        @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="item-section-wrap">
                            <div class="container">
                                <div class="block">
                                    <div class="col-4 col-sm-12">
                                        <div class="item-section">
                                            <div class="title fixed">
                                                <h3></h3>
                                            </div>
                                            <div class="block" id="indexCompetition">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--红包效果-->
    <div class="hongbao-content clearboth">
        <ul class="couten"></ul>
    </div>
    <div class="mo" onclick="clickMo()">
        <div class="sen">
            <h3>
                获得红包
                <b id="luckHongBao"></b>元
            </h3>
        </div>
    </div>
    <!--广告弹框-->
    <div class="advert-opcity" id="indexDialog" onclick="$('#indexDialog').hide()">
        <div class="advert-content">
            <h3 id="dialogTitle"></h3>
            <img src="" id="dialogImg" />
            <h3 onclick="$('#indexDialog').hide()">关闭</h3>
        </div>
    </div>
    <input type="hidden" value="0" id="hbCount" />
    <script>
        bannerSwiper();
        indexSwipers();

        $(function () {
            @if($_system_config->is_alert_on == 0)
            $('#indexDialog').hide();
            $('#indexDialog').css({ "display": "flex" });
            $("#dialogImg").attr("src", "{{ $_system_config->alert_img }}");
            $("#dialogTitle").html('消息');
            @endif
            //biCommon.getUserHongBaoCount();
        });
        //getGamePlate(1, 'index');
        biCommon.getNotices(1);
        //biCommon.getDialogContent();
    </script>


@endsection
