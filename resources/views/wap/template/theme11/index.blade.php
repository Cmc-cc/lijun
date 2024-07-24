@extends('wap.template.theme11.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme11/css/sweet-alert.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme11/css/loadAnimation.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme11/css/style2.css') }}" rel="stylesheet" />
    <style>
        .RightTabs .list{
            float: left;
            width: 49%;
            text-align: center;
        }
    </style>


    <!--红包效果-->
    <div data-reactroot="" class="app_container appdd">
        {{--<div id="Topappdowload">
            <div id="_appclose" onclick="closeDownLoad();">close</div>
            <a class="androidUrL" id="Dowloadapp" href="" target="_blank">下载APP</a>
        </div>--}}
        <div class="app_header">
            <div class="am-navbar am-navbar-dark">
                <div class="am-navbar-left" role="button">
                <span class="am-navbar-left-content" onclick="Opentoolbar();">
                    <img src="{{ asset('/wap/theme11/images/menu_burger.png') }}" class="headIcon" />
                </span>
                </div>
                <div class="am-navbar-title">
                    <img src="{{ $_system_config -> m_site_logo }}" style="width: 3.5rem;">
                </div>
                @include('wap.template.theme11.layouts.head_left')
                <div class="am-navbar-right"></div>
            </div>
        </div>
        <div class="container">
            <div class="main HomeMain" >
{{--                @*------------轮播-----------*@--}}
                <div class="slider banner am-carousel" >
                    <div class="slider-frame swiper-container">
                        <ul class="slider-list swiper-wrapper" >
                            @foreach($banners as $k => $item)
                            <li class="slider-slide swiper-slide">
                                <a class="bannerItem" href="javascript:void(0);">
                                    <img src="{{ $item -> path }}" class="bannerImg">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>


{{--                @*------------公告-----------*@--}}
                <div class="slider my-carousel-pmd am-carousel am-carousel-vertical" style="position: relative; display: block; width: 100%; height: auto; box-sizing: border-box; visibility: visible;">
                    <div class="v-item">
                        <i class="icon iconfont icon-laba" style="padding-right: 0.2rem;"></i>
                        <div class="slider-frame marquee-wrap swiper-container notice-swiper" style="height:18px">
                            <ul class="slider-list swiper-wrapper" id="noticeSiper"></ul>
                        </div>
                    </div>
                </div>
{{--                @*-----------------------*@--}}
                <div class="HomeCenter" style="">
                    <div class="HomeCenterout">
                        <ul>
                            <li  onclick="Showlist('layoutLive',this);">
                                <div class="moreworlds" style="position: relative;"><i class="icon iconfont icon-icon_lib_casino"></i><span class="setifshow">娱乐场</span><span style="color: red; position: absolute; top: 0px; right: 0px;">新</span><span></span></div>
                            </li>
                            <li onclick="Showlist('layoutSlot',this);">
                                <div class="moreworlds"><i class="icon iconfont icon-icon_lib_Slots"></i><span class="setifshow">老虎机</span></div>
                            </li>
                            <li onclick="Showlist('layoutLottery',this);">
                                <div><i class="icon iconfont icon-icon_lib_GNS"></i><span class="setifshow">彩票</span></div>
                            </li>
                            <li onclick="Showlist('layoutSport',this);">
                                <div><i class="icon iconfont icon-icon_lib_soccer"></i><span class="setifshow">體育 </span></div>
                            </li>
                            <li onclick="Showlist('layoutChess',this);">
                                <div class="moreworlds"><img width="23" src="{{ asset('/wap/theme11/images/chess_icon.png') }}" alt=""><span class="setifshow">棋牌</span></div>
                            </li>

                            <li onclick="Showlist('layoutFish',this);">
                                <div><i class="icon iconfont icon-icon_lib_fishing"></i><span class="setifshow">捕魚</span></div>
                            </li>

                           {{-- <li onclick="Showlist('layoutCompetition',this);">
                                <div><i class="icon iconfont icon-gamepage"></i><span class="setifshow">电竞</span></div>
                            </li>--}}

                        </ul>
                        <div class="RightTabs" id="layoutSport" style="display:none;">
                            <?php
                            $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                            ?>
                            @foreach($sports as $k => $v)
                                <div class="list" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！',1); @endif">
                                    <?php
                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                    $v['img'] = $img;
                                    ?>
                                    <img src="{{ $v['img'] }}" class="GameImg">
                                    <span>{{ $v['name'] }}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="RightTabs" id="layoutLottery" style="display:none;">
                            <?php
                            $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                            ?>
                            @foreach($lottery as $k => $v)
                                <div class="list" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！',1); @endif">
                                    <?php
                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                    $v['img'] = $img;
                                    ?>
                                    <img src="{{ $v['img'] }}" class="GameImg">
                                    <span>{{ $v['name'] }}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="RightTabs" id="layoutLive" style="display:none;">
                            <?php
                            $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                            ?>
                                @foreach($live as $k => $v)
                            <div class="list" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！',1); @endif">
                                <?php
                                $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                $v['img'] = $img;
                                ?>
                                <img src="{{ $v['img'] }}" class="GameImg">
                                <span>{{ $v['name'] }}</span>
                            </div>
                                    @endforeach
                        </div>
                        <div class="RightTabs" id="layoutChess" style="display:none;">
                            <?php
                            $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                            ?>
                            @foreach($poker as $k => $v)
                                <div class="list" onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1');">
                                    <?php
                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                    $v['img'] = $img;
                                    ?>
                                    <img src="{{ $v['img'] }}" class="GameImg">
                                    <span>{{ $v['name'] }}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="RightTabs" id="layoutSlot" style="display:none;">
                            <?php
                            $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                            ?>
                                @foreach($slot as $k => $v)
                                    <div class="list" onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1');">
                                        <?php
                                        $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                        $v['img'] = $img;
                                        ?>
                                        <img src="{{ $v['img'] }}" class="GameImg">
                                        <span>{{ $v['name'] }}</span>
                                    </div>
                                @endforeach
                        </div>
                        <div class="RightTabs" id="layoutCompetition" style="display:none;">

                        </div>
                        <div class="RightTabs" id="layoutFish" style="display:none;">
                            <?php
                            $fish = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish');
                            ?>
                            @foreach($fish as $k => $v)
                                <div class="list" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！',1); @endif">
                                    <img src="{{ $v['img'] }}" class="GameImg">
                                    <span>{{ $v['name'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="hongbao-content clearboth">
        <ul class="couten"></ul>
    </div>
    <div class="mo" onclick="clickMo()">
        <div class="sen">
            <h3>获得红包<b id="luckHongBao"></b>元</h3>
        </div>
    </div>
    <!--广告弹框-->
    <div class="advert-opcity" id="indexDialog">
        <div class="advert-content">
            <h3 id="dialogTitle"></h3>
            <img src="" id="dialogImg" />
            <h3 onclick="$('#indexDialog').hide()">关闭</h3>
        </div>
    </div>
    <input type="hidden" value="0" id="hbCount" />
    <script>
        $(function () {
            //默认显示主页
            $(".HomeCenterout ul li").eq(0).addClass("Setative").click();
            @if($_system_config->is_alert_on == 0)
                $('#indexDialog').hide();
                $('#indexDialog').css({ "display": "flex" });
                $("#dialogImg").attr("src", "{{ $_system_config->alert_img }}");
                $("#dialogTitle").html('消息');
            @endif
            biCommon.getNotices(1);
           // biCommon.getUserHongBaoCount();
            //biCommon.getDialogContent();
            //downLoadApp();
        })
        var swipers = new Swiper('.swiper-container', {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        $("#indexDialog").click(function () {
            $("#indexDialog").hide();
        })
    </script>

@endsection
