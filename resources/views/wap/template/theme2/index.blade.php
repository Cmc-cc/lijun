<!DOCTYPE html>
<html>
<head>
    <title>{{ $_system_config->site_title or '标题' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="generator" content="{{ $_system_config->site_title or '标题' }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme2/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme2/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme2/css/game.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme2/css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme2/css/red.css') }}">
    <script src="{{ asset('/wap/theme2/js/iconfont.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
</head>
<body>
@if($_system_config -> is_app_link_on == 0)
    @include('wap.app')
@endif
<!-- <div id="loadingbg">
        <div class="loading">
            <img src="Public/Home/picture/three-dots.svg" width="60" alt="">
        </div>
    </div>-->
<div class="App">
    <header>
        <div class="AppHeader is-fixed">

            <div class="AppHeader-inner">

                <a class="AppHeader-logo" href="javascript:void(0)">
                    <img src="{{ $_system_config->m_site_logo }}" width="145" height="40">
                </a>
                <div class="AppHeader-actions">
                    <div style="margin-top:-12px;">
                        @if (Auth::guard('member')->guest())
                        @else
                            <div><span>{{ $_member->name }}</span></div>
                            <div><strong class="money">{{ $_member->money }}</strong>&nbsp;RMB</div>
                        @endif
                    </div>
                    @if (Auth::guard('member')->guest())
                        <a class="AppHeader-white" href="{{ route('wap.login') }}">登录</a>
                        <a class="AppHeader-yellow" href="{{ route('wap.register') }}">注册</a>
                    @else
                        {{--<span class="my-icon">
                                <svg class="icon" aria-hidden="true">
                                   <!-- <use xlink:href="#icon-weidenglutouxiang"></use>-->
                                </svg>
                            </span>--}}

                    @endif
                </div>
            </div>


        </div>
    </header>
    <main>
        <div class="AppMain">
            <div class="AppMain-banner">
                <style type="text/css">
                    .swiper-container {
                        width: 100%;
                        height: 100%;
                    }

                    .swiper-slide {
                        text-align: center;
                        font-size: 18px;
                        background: #fff;
                        display: -webkit-box;
                        display: -ms-flexbox;
                        display: -webkit-flex;
                        display: flex;
                        -webkit-box-pack: center;
                        -ms-flex-pack: center;
                        -webkit-justify-content: center;
                        justify-content: center;
                        -webkit-box-align: center;
                        -ms-flex-align: center;
                        -webkit-align-items: center;
                        align-items: center;
                    }
                </style>
                <div class="swiper-container" id="banner">
                    <div class="swiper-wrapper">
                        @foreach($banners as $item)
                            <div class="swiper-slide">
                                <a target="_blank" href="{{$item->jumpurl}}">
                                    <img width="100%" src="{{ $item->path }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="AppMain-notice">
                    <span class="AppMain-notice-icon">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-notice"></use>
                        </svg>
                    </span>
                <div class="AppMain-notice-list">
                    <?php
                    $n_str = '';
                    foreach ($system_notices as $item)
                        $n_str .= $item->content . '&nbsp;&nbsp;&nbsp;';
                    ?>
                    <marquee id="msgNews" scrollamount="4" scrolldelay="100" direction="left"  style="font-size:8px;">{{ $n_str }}     </marquee>

                </div>

            </div>
            @if($_system_config->is_hongbao ==1)
                <div style="padding: 10px;">
                    <a target="_blank" href="{{route('wap.red')}}">
                        <img style="border-radius: 8px;width: 100%" src="{{asset('wap/images/hongbao/qiang.jpg')}}">
                    </a>
                </div>
            @endif
            @if(in_array('AG', $_api_list) || in_array('AGS',$_api_list))
                <div class="AppMain-webmaster gamelist-h">
                    <div class="gameitem">
                        <div class="gameicon"><i class="icon-games icon-games-AG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle"><i class="icon-webmaster"></i>AG視訊</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-6"></i>
                                    <div class="gameonline"><span class="cred">1000</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=ag&devices=1&game_type=1" target="_blank">试玩</a>


                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=ag&game_type=1&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity"><i class="iconact"></i>女优厅</div>
                        </div>
                    </div>
                </div>

            @endif
            @if(in_array('DG', $_api_list))
                <div class="AppMain-webmaster gamelist-h">
                    <div class="gameitem">
                        <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">
                                    <i class="icon-webmaster"></i>BB視訊</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-6"></i>
                                    <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=bbin&devices=1&game_type=1" target="_blank">试玩</a>--}}


                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=bbin&game_type=1&devices=1')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity"><i class="iconact"></i>全网热推主播品牌</div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
        <div class="AppMain-game">
            <div class="gametab">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide active"><span>全部</span></div>
                        <div class="swiper-slide"><span>電子</span></div>
                        <div class="swiper-slide"><span>視訊</span></div>
                        <div class="swiper-slide"><span>彩票</span></div>
                        <div class="swiper-slide"><span>捕魚</span></div>
                        <div class="swiper-slide"><span>棋牌</span></div>
                        <div class="swiper-slide"><span>體育</span></div>
                    </div>
                </div>
            </div>
            <div class="gamelist-container">
                <div class="swiper-container gameslist" id="gameslist">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="gamelist gamelist-v">

                                @if(in_array('AG', $_api_list) || in_array('AGS',$_api_list))
                                    <div class="gameitem new"  @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=ag&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-AG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">AG視訊</div>
                                        <i class="gamestar star-4"></i>
                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>

                                    </div>
                                @endif
                                {{--@if(in_array('AGS', $_api_list))
                                                      <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.location.href='https://fir.im/kqb3?utm_source=fir'" @endif data-game="">
                                                        <div class="gameicon">
                                                            <i class="icon-games icon-games-AG icon-zoom80"></i>
                                                        </div>
                                                        <div class="gametitle">AG亚游厅</div>
                                                        <i class="gamestar star-2"></i>
                                                        <div class="gameonline"><span class="cred">51231</span>人在玩</div>
														 </div>
													@endif--}}
                                @if(in_array('BBIN', $_api_list))

                                    <div class="gameitem burst" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=bbin&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-BBIN icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">BB視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">23612</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('BG', $_api_list))

                                    <div class="gameitem burst" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=bg&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-BG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">BG視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">23612</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('SUNBET', $_api_list))

                                    <div class="gameitem burst" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=SUNBET&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-WM icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">申博 視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">36712</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('ALLBET', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=ALLBET&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-ALLBET icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">欧博 視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">36712</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('LEBO', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=LEBO&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-LEBO icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">LEBO 視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">36712</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('SA', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=SA&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-SA icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">SA 視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">36712</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('GD', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=GD&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-GD icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">GD 視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">36712</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('OG', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=OG&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-OG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">OG 視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">36712</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('DG', $_api_list))
                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=DG&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-DG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">DG 視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('MG', $_api_list))
                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=MG&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-MGE icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">MG 視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('PT', $_api_list))
                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=PT&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-AMB icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">PT 視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('GPI', $_api_list))
                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=GPI&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-GPI icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">GPI 視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('EBET', $_api_list))
                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=EBET&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-EBET icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">EBET 視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('SEXY', $_api_list))
                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=SEXY&game_type=1')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-SEXY icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">SEXY 視訊</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                    @if(in_array('CQ9', $_api_list))
                                        <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=CQ9&game_type=1')" @endif data-game="">
                                            <div class="gameicon">
                                                <i class="icon-games icon-games-CQ9 icon-zoom80"></i>
                                            </div>
                                            <div class="gametitle">CQ9 視訊</div>
                                            <i class="gamestar star-5"></i>
                                            <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                        </div>
                                    @endif
                                @if(in_array('PGS', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=PGS&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-PGS icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">PGS 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('PNG', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=PNG&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-PNG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">PNG 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('GNS', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=GNS&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-GNS icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">GNS 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('PP', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=PP&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-GPE icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">PP 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('SG', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=SG&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-SGE icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">SG 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('MW', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=MW&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-MW icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">MW 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('CQ9', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=CQ9&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-GB icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">CQ9 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('SA', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=SA&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-SA icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">SA 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('JDB', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=JDB&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-JDB icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">JDB 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=FG&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-FG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">FG 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('SW', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=SW&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-SW icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">SW 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('BNG', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=BNG&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-BNG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">BNG 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('MG', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=MG&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-MGE icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">MG 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('PT', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=PT&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-AMB icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">PT 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('AG', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=AG&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-AG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">AG 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('GPI', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=GPI&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-GPI icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">GPI 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=BBIN&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-BBIN icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">BB 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('QT', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=QT&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-QT icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">QT 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('DT', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=DT&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-DT icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">DT 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('PG', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=PG&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-PG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">PG 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('GTI', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=GTI&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-GTI icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">GTI 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('GA', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=GA&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-GA icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">GA 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('HB', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=HB&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-HBE icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">HB 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('RT', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=RT&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-WG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">RT 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('ISB', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=ISB&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-ISB icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">ISB 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('GG', $_api_list))
                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=GG&game_type=2')"  data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-GG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle">GG 電子</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">84523</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('CSK', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=CSK&game_type=3','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-IG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> CSK 彩票</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('CS', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=CS&game_type=3','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-IG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> CS 彩票</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('EG', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=EG&game_type=3','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-CG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> EG 彩票</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('IG', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=IG&game_type=3','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-IG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> IG 彩票</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('IG', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=IG&game_type=3&game_code=imlotto10059','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-IG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> IG 六合彩</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                    @if(in_array('IG', $_api_list))

                                        <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=IG&game_type=3&game_code=gfcai','_blamk')" @endif data-game="">
                                            <div class="gameicon">
                                                <i class="icon-games icon-games-IG icon-zoom80"></i>
                                            </div>
                                            <div class="gametitle"> IG 官方彩</div>
                                            <i class="gamestar star-5"></i>
                                            <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                        </div>
                                    @endif
                                @if(in_array('SGL', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=SGL&game_type=3','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-SG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> SG 双赢彩票</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('VR', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=VR&game_type=3','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-VR icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> VR 彩票</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('BBIN', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=BBIN&game_type=3','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-BBIN icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> BB 彩票</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('BG', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=BG&game_type=3','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-BG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> BG 彩票</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('FH', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=FH&game_type=3','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-LL icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> FH 乐利彩票</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif

                                    @if(in_array('TCG', $_api_list))

                                        <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=TCG&game_type=3','_blamk')" @endif data-game="">
                                            <div class="gameicon">
                                                <i class="icon-games icon-games-TCG icon-zoom80"></i>
                                            </div>
                                            <div class="gametitle"> TCG 彩票</div>
                                            <i class="gamestar star-5"></i>
                                            <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                        </div>
                                    @endif
                                @if(in_array('GJ', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=GJ&game_type=4','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-GJ icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> 皇冠 體育</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('SS', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=SS&game_type=4','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-SS icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> 三昇 體育</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('BBIN', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=BBIN&game_type=4','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-BBIN icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> BB 體育</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('IBC', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=IBC&game_type=4','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-SPTT icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> 沙巴 體育</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('AG', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=AG&game_type=4','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-AG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> AG 體育</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('NEWBB', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=NEWBB&game_type=4','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-BBIN icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> NEWBB 體育</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('ESB', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=ESB&game_type=5','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-ESB icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> ESB 电竞</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('HC', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=HC&game_type=5','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-HC icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> 皇朝 电竞</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('AVIA', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=AVIA&game_type=5','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-AVIA icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> 泛亚 电竞</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('BL', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=BL&game_type=4','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-BL icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> 新皇冠 體育</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('IM', $_api_list))

                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=IM&game_type=4','_blamk')" @endif data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-IM icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> IM 體育</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                    @if(in_array('S128', $_api_list))

                                        <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=S128&game_type=4','_blamk')" @endif data-game="">
                                            <div class="gameicon">
                                                <i class="icon-games icon-games-S128 icon-zoom80"></i>
                                            </div>
                                            <div class="gametitle"> S128 體育</div>
                                            <i class="gamestar star-5"></i>
                                            <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                        </div>
                                    @endif
                                @if(in_array('AP', $_api_list))

                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=AP&game_type=7','_blamk')" data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-AP icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> AP 棋牌</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('VG', $_api_list))

                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=VG&game_type=7','_blamk')" data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-VG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> VG 棋牌</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('SGP', $_api_list))

                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=SGP&game_type=7','_blamk')" data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-SG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> SG双赢 棋牌</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('LEG', $_api_list))

                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=LEG&game_type=7','_blamk')" data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-LEG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> 乐游 棋牌</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('MT', $_api_list))

                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=MT&game_type=7','_blamk')" data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-MT icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> 美天 棋牌</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('KY', $_api_list))

                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=KY&game_type=7','_blamk')" data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-KY icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> 开元 棋牌</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                @if(in_array('FG', $_api_list))

                                    <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=FG&game_type=7','_blamk')" data-game="">
                                        <div class="gameicon">
                                            <i class="icon-games icon-games-FG icon-zoom80"></i>
                                        </div>
                                        <div class="gametitle"> FG 棋牌</div>
                                        <i class="gamestar star-5"></i>
                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                    </div>
                                @endif
                                    @if(in_array('NW', $_api_list))

                                        <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=NW&game_type=7','_blamk')" data-game="">
                                            <div class="gameicon">
                                                <i class="icon-games icon-games-NW icon-zoom80"></i>
                                            </div>
                                            <div class="gametitle">NW 棋牌</div>
                                            <i class="gamestar star-5"></i>
                                            <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                        </div>
                                    @endif
                                    @if(in_array('RMG', $_api_list))

                                        <div class="gameitem" onclick="window.open('{{ route('game.playGame') }}?devices=1&plat_type=RMG&game_type=7','_blamk')" data-game="">
                                            <div class="gameicon">
                                                <i class="icon-games icon-games-RMG icon-zoom80"></i>
                                            </div>
                                            <div class="gametitle">RMG 棋牌</div>
                                            <i class="gamestar star-5"></i>
                                            <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                        </div>
                                    @endif
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gamelist gamelist-h">

                                @if(in_array('PGS', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-PGS icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">PGS電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=PGS&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('PNG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-PNG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">PNG電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=PNG&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('GNS', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-GNS icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">GNS電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=GNS&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('PP', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-GPE icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">PP電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=PP&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('SG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-SGE icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">SG電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=SG&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('MW', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-MW icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">MW電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=MW&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('CQ9', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-GB icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">CQ9電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=CQ9&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('SA', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-SA icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">SA電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=SA&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('JDB', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-JDB icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">JDB電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=JDB&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">FG電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=FG&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('SW', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-SW icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">SW電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=SW&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('BNG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-BNG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">BNG電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=BNG&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('MG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-MGE icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">MG電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=MG&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('PT', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-AMB icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">PT電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=PT&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('AG', $_api_list) || in_array('AGS',$_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-AG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">AG電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=AG&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('GPI', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-GPIicon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">GPI電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=GPI&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">BB電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=BBIN&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('QT', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-QT icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">QT電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=QT&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('DT', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-DT icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">DT電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=DT&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('PG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-PSE icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">PG電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=PG&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('GTI', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-GTI icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">GTI電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=GTI&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('GA', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-GA icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">GA電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=GA&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('HB', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-HB icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">HB電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=HB&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('RT', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-WG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">RT電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=RT&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('ISB', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-ISB icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">ISB電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=ISB&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('GG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-GG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">GG電子</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">


                                                        <a target="_blank" class="gamebtn-go" href="{{ route('game.playGame') }}?devices=1&plat_type=GG&game_type=2">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">全球经典電子游戏</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gamelist gamelist-h">

                                @if(in_array('AG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-AG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">AG視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=AG&game_type=1&devices=1" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=ag&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">G44E推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">BB視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('BG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-BG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">BG視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=BG&game_type=1&devices=1" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('SUNBET', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-SUNBET icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">申博視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('ALLBET', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-ALLBET icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">欧博視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('LEBO', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-LEBO icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">LEBO視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=LEBO&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('SA', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-SA icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">SA視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=SA&game_type=1&devices=1" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('GD', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-GD icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">GD視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('OG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-OG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">OG視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=OG&game_type=1&devices=1" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('DG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-DG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">DG視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=DG&game_type=1&devices=1" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=DG&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('MG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-MG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">MG視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=MG&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('PT', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-PT icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">PT視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=PT&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('GPI', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-GPI icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">GPI視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=GPI&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('EBET', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-EBET icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">EBET視訊</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=EBET&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('SEXY', $_api_list))
                                        <div class="gameitem">
                                            <div class="gametop">
                                                <div class="gameicon"><i class="icon-games icon-games-SEXY icon-zoom80"></i></div>
                                                <div class="gametxtbox">
                                                    <div class="gametxtbox-info">
                                                        <div class="gametitle">SEXY視訊</div>
                                                        <div class="gameinfo">
                                                            <i class="gamestar star-4"></i>
                                                            <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                        </div>
                                                        <div class="gamebtns">
                                                            {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                            <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=SEXY&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                        </div>
                                                    </div>
                                                    <div class="gametxtbox-activity">集团推荐</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(in_array('CQ9', $_api_list))
                                        <div class="gameitem">
                                            <div class="gametop">
                                                <div class="gameicon"><i class="icon-games icon-games-CQ9 icon-zoom80"></i></div>
                                                <div class="gametxtbox">
                                                    <div class="gametxtbox-info">
                                                        <div class="gametitle">CQ9視訊</div>
                                                        <div class="gameinfo">
                                                            <i class="gamestar star-4"></i>
                                                            <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                        </div>
                                                        <div class="gamebtns">
                                                            {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                            <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=1&devices=1','_blank')"@endif>进入</a>
                                                        </div>
                                                    </div>
                                                    <div class="gametxtbox-activity">集团推荐</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gamelist gamelist-h">
                                @if(in_array('CSK', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-IG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">CSK彩票</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=CSK&game_type=3&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('CS', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-IG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">CS彩票</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=CS&game_type=3&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('EG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-EG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">EG彩票</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=EG&game_type=3&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('IG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-IG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">IG彩票</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('IG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-IG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">IG六合彩</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&devices=1&game_code=imlotto10059','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                    @if(in_array('IG', $_api_list))
                                        <div class="gameitem">
                                            <div class="gametop">
                                                <div class="gameicon"><i class="icon-games icon-games-IG icon-zoom80"></i></div>
                                                <div class="gametxtbox">
                                                    <div class="gametxtbox-info">
                                                        <div class="gametitle">IG官方彩</div>
                                                        <div class="gameinfo">
                                                            <i class="gamestar star-4"></i>
                                                            <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                        </div>
                                                        <div class="gamebtns">
                                                            {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                            <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&devices=1&game_code=gfcai','_blank')"@endif>进入</a>
                                                        </div>
                                                    </div>
                                                    <div class="gametxtbox-activity">集团推荐</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @if(in_array('SGL', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-SG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">SG双赢彩票</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=SGL&game_type=3&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('VR', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-VR icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">VR彩票</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=VR&game_type=3&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">BB彩票</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=3&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('BG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-BG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">BG彩票</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=BG&game_type=3&devices=1" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=3&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('FH', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-LL icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">FH乐利彩票</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=FH&game_type=3&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">集团推荐</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                    @if(in_array('TCG', $_api_list))
                                        <div class="gameitem">
                                            <div class="gametop">
                                                <div class="gameicon"><i class="icon-games icon-games-TCG icon-zoom80"></i></div>
                                                <div class="gametxtbox">
                                                    <div class="gametxtbox-info">
                                                        <div class="gametitle">TCG彩票</div>
                                                        <div class="gameinfo">
                                                            <i class="gamestar star-4"></i>
                                                            <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                        </div>
                                                        <div class="gamebtns">
                                                            <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=TCG&game_type=3&devices=1','_blank')"@endif>进入</a>
                                                        </div>
                                                    </div>
                                                    <div class="gametxtbox-activity">集团推荐</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gamelist gamelist-h">

                                @if(in_array('AG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-AG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">AG捕魚王</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=AG&game_type=6&devices=1" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=6&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">AG捕魚王</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">BB捕魚达人</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=BBIN&game_type=6&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">BB捕魚达人</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">BB捕魚大师</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=BBIN&game_type=6&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6&devices=1&game_code=38001','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">BB捕魚大师</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('GG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-GG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">GG捕魚2</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=GG&game_type=6&devices=1" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=GG&game_type=6&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">GG捕魚2</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('MW', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-MW icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">MW千炮捕魚</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=MW&game_type=6&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=6&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">MW千炮捕魚</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('SA', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-SA icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">SA鱼乐无穷</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=SA&game_type=6&devices=1" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=6&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">SA鱼乐无穷</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('JDB', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-JDB icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">JDB财神捕魚</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=JDB&game_type=2&devices=1&game_code=ng_jdb_10032" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&devices=1&game_code=7_7003','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">JDB财神捕魚</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">FG欢乐捕魚</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=FG&game_type=2&devices=1&game_code=ng_fg_10115" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&devices=1&game_code=ng_fg_10115','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">FG欢乐捕魚</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('JDB', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-JDB icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">JDB龙王捕魚</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=JDB&game_type=2&devices=1&game_code=ng_jdb_10026" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&devices=1&game_code=ng_jdb_10026','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">JDB龙王捕魚</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('JDB', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-JDB icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">JDB龙王捕魚2</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=JDB&game_type=2&devices=1&game_code=ng_jdb_10034" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&devices=1&game_code=ng_jdb_10034','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">JDB龙王捕魚2</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">FG美人捕魚</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=FG&game_type=2&devices=1&game_code=ng_fg_10112" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&devices=1&game_code=ng_fg_10112','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">FG美人捕魚</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">FG捕魚嘉年华</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=FG&game_type=2&devices=1&game_code=ng_fg_10117" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&devices=1&game_code=ng_fg_10117','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">FG捕魚嘉年华</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">FG天天捕魚</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=FG&game_type=2&devices=1&game_code=ng_fg_10116" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&devices=1&game_code=ng_fg_10116','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">FG天天捕魚</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">FG捕鸟达人</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=FG&game_type=2&devices=1&game_code=ng_fg_10114" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&devices=1&game_code=ng_fg_10114','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">FG捕鸟达人</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">FG雷霆战警</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=FG&game_type=2&devices=1&game_code=ng_fg_10113" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&devices=1&game_code=ng_fg_10113','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">FG雷霆战警</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('MT', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-MT icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">MT李逵捕魚</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=MT&game_type=2&devices=1&game_code=PTG011" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&devices=1&game_code=PTG0011','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">MT李逵捕魚</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('MT', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-MT icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">MT金蟾捕魚</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=MT&game_type=2&devices=1&game_code=PTG011" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&devices=1&game_code=PTG0045','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">MT金蟾捕魚</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('PT', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-PT icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">PT深海大赢家</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        <a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=PT&game_type=2&devices=1&game_code=ng_pt_10090" target="_blank">试玩</a>
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=6&devices=1&game_code=ng_pt_10090','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">PT深海大赢家</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('SW', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-SW icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">SW捕魚多福</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=SW&game_type=2&devices=1&game_code=ng_pt_10090" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">SW捕魚多福</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('SW', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-SW icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">SW福气水果</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=SW&game_type=2&devices=1&game_code=ng_pt_10090" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6&devices=1&game_code=sw_fuqsg','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">SW福气水果</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gamelist gamelist-h">

                                @if(in_array('AP', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-AP icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">AP棋牌</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" onclick="window.open('{{ route('game.playGame') }}?plat_type=AP&game_type=7&devices=1','_blank')">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">AP棋牌</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('VG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-VG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">VG棋牌</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" onclick="window.open('{{ route('game.playGame') }}?plat_type=VG&game_type=7&devices=1','_blank')">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">VG棋牌</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('SGP', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-SG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">SG双赢棋牌</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" onclick="window.open('{{ route('game.playGame') }}?plat_type=SGP&game_type=7&devices=1','_blank')">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">SG双赢棋牌</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('LEG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-LEG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">乐游棋牌</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" onclick="window.open('{{ route('game.playGame') }}?plat_type=LEG&game_type=7&devices=1','_blank')">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">乐游棋牌</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('MT', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-MT icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">美天棋牌</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" onclick="window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=7&devices=1','_blank')">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">美天棋牌</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('KY', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-KY icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">开元棋牌</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" onclick="window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7&devices=1','_blank')">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">开元棋牌</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">FG棋牌</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" onclick="window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=7&devices=1','_blank')">进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">FG棋牌</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                    @if(in_array('NW', $_api_list))
                                        <div class="gameitem">
                                            <div class="gametop">
                                                <div class="gameicon"><i class="icon-games icon-games-NW icon-zoom80"></i></div>
                                                <div class="gametxtbox">
                                                    <div class="gametxtbox-info">
                                                        <div class="gametitle">NW棋牌</div>
                                                        <div class="gameinfo">
                                                            <i class="gamestar star-4"></i>
                                                            <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                        </div>
                                                        <div class="gamebtns">
                                                            {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                            <a class="gamebtn-go" href="javascript:void('')" onclick="window.open('{{ route('game.playGame') }}?plat_type=NW&game_type=7&devices=1','_blank')">进入</a>
                                                        </div>
                                                    </div>
                                                    <div class="gametxtbox-activity">NW棋牌</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(in_array('RMG', $_api_list))
                                        <div class="gameitem">
                                            <div class="gametop">
                                                <div class="gameicon"><i class="icon-games icon-games-RMG icon-zoom80"></i></div>
                                                <div class="gametxtbox">
                                                    <div class="gametxtbox-info">
                                                        <div class="gametitle">RMG棋牌</div>
                                                        <div class="gameinfo">
                                                            <i class="gamestar star-4"></i>
                                                            <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                        </div>
                                                        <div class="gamebtns">
                                                            {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                            <a class="gamebtn-go" href="javascript:void('')" onclick="window.open('{{ route('game.playGame') }}?plat_type=RMG&game_type=7&devices=1','_blank')">进入</a>
                                                        </div>
                                                    </div>
                                                    <div class="gametxtbox-activity">RMG棋牌</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gamelist gamelist-h">
                                @if(in_array('GJ', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-GJ icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">皇冠體育</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=GJ&game_type=4&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">皇冠體育</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('SS', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-SS icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">三昇體育</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=SS&game_type=4&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">三昇體育</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">BB體育</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">BB體育</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('IBC', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-IBC icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">沙巴體育</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=IBC&game_type=4&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">沙巴體育</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('AG', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-AG icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">AG體育</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">AG體育</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('NEWBB', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">NEWBB體育</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=NEWBB&game_type=4&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">NEWBB體育</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('ESB', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-ESB icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">ESB电竞</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=ESB&game_type=5&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">ESB电竞</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('HC', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-HC icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">皇朝电竞</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=HC&game_type=5&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">皇朝电竞</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('AVIA', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-AVIA icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">泛亚电竞</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=AVIA&game_type=5&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">泛亚电竞</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('BL', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-BL icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">新皇冠體育</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=BL&game_type=4&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">新皇冠體育</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array('IM', $_api_list))
                                    <div class="gameitem">
                                        <div class="gametop">
                                            <div class="gameicon"><i class="icon-games icon-games-IM icon-zoom80"></i></div>
                                            <div class="gametxtbox">
                                                <div class="gametxtbox-info">
                                                    <div class="gametitle">IM體育</div>
                                                    <div class="gameinfo">
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                    </div>
                                                    <div class="gamebtns">
                                                        {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=IM&game_type=4&devices=1','_blank')"@endif>进入</a>
                                                    </div>
                                                </div>
                                                <div class="gametxtbox-activity">IM體育</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                    @if(in_array('S128', $_api_list))
                                        <div class="gameitem">
                                            <div class="gametop">
                                                <div class="gameicon"><i class="icon-games icon-games-S128 icon-zoom80"></i></div>
                                                <div class="gametxtbox">
                                                    <div class="gametxtbox-info">
                                                        <div class="gametitle">S128體育</div>
                                                        <div class="gameinfo">
                                                            <i class="gamestar star-4"></i>
                                                            <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                        </div>
                                                        <div class="gamebtns">
                                                            {{--<a class="gamebtn-try" href="{{route('game.demo_login')}}?plat_type=EBET&game_type=1&devices=1" target="_blank">试玩</a>--}}
                                                            <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('game.playGame') }}?plat_type=S128&game_type=4&devices=1','_blank')"@endif>进入</a>
                                                        </div>
                                                    </div>
                                                    <div class="gametxtbox-activity">S128體育</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="AppFooter is-fixed">
            @if (Auth::guard('member')->guest())
                <a class="nav-item" href="{{route('wap.activity_list')}}">
                    <svg class="icon" aria-hidden="true">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-liwu"></use>
                    </svg>
                    <span>优惠活动</span>
                </a>
                <a class="nav-item" href="{{ route('wap.register') }}">
                    <svg class="icon" aria-hidden="true">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-zhuce"></use>
                    </svg>
                    <span>立即注册</span>
                </a>
                <a class="nav-item" href="{{ route('wap.login') }}" id="memberstatus">
                    <svg class="icon" aria-hidden="true">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-denglu"></use>
                    </svg>
                    <span>立即登录</span>
                </a>
                <a class="nav-item" href="{{ $_system_config->service_link }}" target="_blank">
                    <svg class="icon" aria-hidden="true">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-zaixiankefu"></use>
                    </svg>
                    <span>在线客服</span>
                </a>
            @else
                <a class="nav-item" href="{{ route('wap.recharge') }}">
                    <svg class="icon" aria-hidden="true">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-qian"></use>
                    </svg>
                    <span style="color:#e2ff00;"><b>快速充值</b></span>
                </a>
                <a class="nav-item" href="{{ route('wap.drawing') }}">
                    <svg class="icon" aria-hidden="true">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-tixian1"></use>
                    </svg>
                    <span>线上取款</span>
                </a>
                {{--<a class="nav-item" href="{{ route('wap.transfer') }}">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-huhuan"></use>
                        </svg>
                        <span>额度转换</span>
                    </a>--}}
                <a class="nav-item " href="{{ route('wap.userinfo') }}">
                    <svg class="icon" aria-hidden="true">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-yonghuguanlixiugaibeizhu"></use>
                    </svg>
                    <span>会员中心</span>
                </a>
                <a class="nav-item " href="{{ route('wap.activity_list') }}">
                    <svg class="icon" aria-hidden="true">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-yonghuguanlixiugaibeizhu"></use>
                    </svg>
                    <span>优惠活动</span>
                </a>

                <a class="nav-item" href="{{ $_system_config->service_link }}" target="_blank">
                    <svg class="icon" aria-hidden="true">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-zaixiankefu"></use>
                    </svg>
                    <span>在线客服</span>
                </a>

            @endif

        </div>
    </footer>
</div>
@if (Auth::guard('member')->guest())@else
    <div class="AppSidebar" style="right: -240px;">
        <div class="AppSidebar-top">
            <div class="usericon">

                <img src="https://gpimage.dns88888.com/cl/tpl/newwap/common/images/t2.png">
            </div>
            <div class="userinfo">
                <div class="username">
                    <span class="name">{{ $_member->name }}</span>
                    <span class="close-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-guanbi"></use>
                            </svg>
                        </span>
                </div>
                <div class="money">
                    <span class="balance">余额：{{ $_member->money }}</span>
                    <span class="refresh-icon" onclick="javascript: RefreshBalance();">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-shuaxin"></use>
                            </svg>
                        </span>
                </div>
            </div>
        </div>
        <div class="AppSidebar-quickbtn">
            <a class="AppHeader-green" href="{{ route('wap.recharge') }}">充值</a>
            <a class="AppHeader-yellow" href="{{ route('wap.bind_bank') }}">取款</a>
            <a class="AppHeader-white" href="{{ route('wap.transfer') }}">额度转换</a>
        </div>
        <div class="AppSidebar-userlink">








            <a href="">APP下载</a>

            <a href="{{ route('wap.recharge_record') }}">充值记录</a>
            <a href="{{ route('wap.drawing_record') }}">提款记录</a>
            <a href="{{ route('wap.reset_password') }}">修改密码</a>
            <a href="{{ $_system_config->service_link }}">在线客服</a>
            <a href="{{ route('wap.agent') }}">代理中心</a>
            <a href="{{ route('wap.index') }}">返回首页</a>
            <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">安全退出</a>
            <form id="logout-form" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

        </div>
        {{--<div class="AppSidebar-nav">
                <div class="navgroup">
                    <a href="mqqwpa://im/chat?chat_type=wpa&amp;uin=123456&amp;version=1&amp;src_type=web&amp;web_src=baidu.com" target="_blank">
                        <span class="icons qqservice-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-web-icon-"></use>
                            </svg>
                        </span>
                        <span class="txt">客服QQ;{{ $_system_config->qq }}</span>
                        <span class="go-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right-copy-copy-copy"></use>
                            </svg>
                        </span>
                    </a>
                    <a href="{{ $_system_config->service_link }}" target="_blank">
                        <span class="icons service-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-zaixiankefu"></use>
                            </svg>
                        </span>
                        <span class="txt">在线客服</span>
                        <span class="go-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right-copy-copy-copy"></use>
                            </svg>
                        </span>
                    </a>
                </div>
              <div class="navgroup">
                    <a href="#" target="_blank">
                        <span class="icons linetest-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-xianlujiance"></use>
                            </svg>
                        </span>--
                        <span class="txt">线路检测</span>
                        <span class="go-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right-copy-copy-copy"></use>
                            </svg>
                        </span>

					 </div>
                    <a href="https://fir.im/9wn4" target="_blank">
                        <span class="icons appdownload-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-shouji"></use>
                            </svg>
                        </span>
                        <span class="txt">app下载</span>
                        <span class="go-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right-copy-copy-copy"></use>
                            </svg>
                        </span>
                    </a>
			</div>--}}



        <div class="navgroup">
            <a href="{{ route('wap.logout') }}">
                        <span class="icons loginout-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-tuichu"></use>
                            </svg>
                        </span>
                <span class="txt">退出登录</span>
                <span class="go-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right-copy-copy-copy"></use>
                            </svg>
                        </span>
            </a>
        </div>
    </div>
    </div>
@endif
<script src="{{ asset('/wap/theme2/js/swiper.min.js') }}"></script>
<script src="{{ asset('/wap/theme2/js/common.js') }}"></script>

<script>
    /* $(document).dialog({
                type: 'image',
                closeBtnShow: true,
                titleShow: true,
                content: '<img src="Public/Home/picture/phone5402323236305518242.jpg" width="100%" height="380"/>',
            }); */
</script>
<script type="text/javascript">

    $(function () {
        $('.gametab .swiper-slide:first-child').click();
        var content_height = $(".gamelist").eq(0).height();
        var slide_height = $("#gameslist>.swiper-slide").eq(0).height(content_height);
        $("#gameslist>.swiper-wrapper").css("height", content_height);
        $("#gameslist>.swiper-container").css("height", content_height)

    })

    function ReSetBalance(str) {
        if (str != -2) {
            $(".balance").html("余额：" + str.toFixed(2));
        } else {
            $(".balance").html("刷新失败");
        }
    }


    function alertSet(obj, t, type) {
        var tt = t,
            n = $("#" + obj);
        var circletime = setInterval(function () {
            if (0 == t) {
                //判断是否继续长龙，不是就remove掉此
                clearTimeout(circletime);
                if (type == "真人") {
                    n.parent().parent().append('<span class="status">开牌中</span>');
                    setTimeout(function () {
                        // n.parent().parent().children(":last-child").remove();
                        // n.parent().parent().append('<span class="status xian">闲</span>');
                        // setTimeout(function(){
                        n.parent().parent().parent().remove();
                        // },3000);
                    }, 3000);
                } else if (type == "彩票") {
                    n.parent().parent().append('<span class="status">开奖中</span>');
                    setTimeout(function () {
                        n.parent().parent().parent().remove();
                    }, 3000);
                } else if (type == "電子") {
                    n.parent().parent().append('<span class="status">已结束</span>');
                    setTimeout(function () {
                        n.parent().parent().parent().remove();
                    }, 3000);
                }
            } else {
                t -= 1;
                var e = Math.round(t / tt * 200);
                n.css("strokeDashoffset", e - 200);
            }
        }, 1000);
    }

    var datas = [
        { id: "1", gametype: "真人", gameplat: "DG", gamename: "DG", gameiconname: "DG", timeleft: "15", detail: [{ goodroad: "长庄", goodroadstyle: "cz", tablenum: "DG01", roundnum: "B030951" }] },
        { id: "2", gametype: "真人", gameplat: "DG", gamename: "DG", gameiconname: "DG", timeleft: "15", detail: [{ goodroad: "大路单挑", goodroadstyle: "dldt", tablenum: "DG05", roundnum: "B030964" }] },
        { id: "3", gametype: "真人", gameplat: "DG", gamename: "DG", gameiconname: "DG", timeleft: "15", detail: [{ goodroad: "一庄两闲", goodroadstyle: "yzlx", tablenum: "DG04", roundnum: "B030961" }] },
        { id: "4", gametype: "真人", gameplat: "DG", gamename: "DG", gameiconname: "DG", timeleft: "15", detail: [{ goodroad: "一闲两庄", goodroadstyle: "yxlz", tablenum: "DG03", roundnum: "B030959" }] },
        { id: "5", gametype: "真人", gameplat: "DG", gamename: "DG", gameiconname: "DG", timeleft: "15", detail: [{ goodroad: "大路双挑", goodroadstyle: "dlst", tablenum: "DG02", roundnum: "B030957" }] }
    ]
    //setInterval(function () {//里面轮询提示
    //    var items = datas;
    //    var item = items[Math.floor(Math.random() * items.length)];
    //    createHtml(item);
    //}, 3000);

    function createHtml(data) {
        var gettype = $(".poppage-menu .swiper-slide.active").data("type");
        var timestamp = new Date().getTime();
        if (data.gametype == "真人") {
            var zrhtml = '';
            if (gettype == data.gametype || gettype == "推荐") {
                zrhtml += '<div class="poppage-item" data-type="' + data.gametype + '" data-game="' + data.gamename + '">';
            } else {
                zrhtml += '<div class="poppage-item" data-type="' + data.gametype + '" data-game="' + data.gamename + '" style="display:none;">';
            }
            zrhtml += '<div class="popitem-logo">';
            zrhtml += '<i class="hlicon icon-games icon-games-' + data.gameiconname + '"></i>';
            zrhtml += '<svg class="icon-circle" width="64" height="64">';
            zrhtml += '<circle cx="32" cy="32" r="29" fill="#FFF" stroke="#fb5050" stroke-width="3"></circle>';
            zrhtml += '<circle id="zr' + timestamp + '" class="icon-sec-circle" cx="32" cy="32" r="29" fill="transparent" stroke="#fedcdc" stroke-width="4" transform="rotate(-90 32 32)"></circle>';
            zrhtml += '</svg>';
            zrhtml += '</div>';
            zrhtml += '<div class="popitem-hl">';
            zrhtml += '<span class="hlname">' + data.detail[0].goodroad + '</span>';
            zrhtml += '<div class="hlimgbox">';
            zrhtml += '<span class="hlimg ' + data.detail[0].goodroadstyle + '"></span>';
            zrhtml += '</div>';
            zrhtml += '</div>';
            zrhtml += '<div class="popitem-gameinfo">';
            zrhtml += '<span class="tablenum">桌号：' + data.detail[0].tablenum + '</span>';
            zrhtml += '<span class="roundnum">局号：' + data.detail[0].roundnum + '</span>';
            zrhtml += '</div>';
            zrhtml += '<div class="popitem-btnbox">';
            zrhtml += '<a class="trybtn" onclick="trygame(\'' + data.gameplat + '\')">试玩</a>';
            zrhtml += '<a class="enterbtn" onclick="javascript:window.open(\'GotoGame?GameType=' + data.gameplat + '&uid=&gameid=' + data.detail[0].gameid + "_" + data.detail[0].tableid + '#\');">进入</a>';
            zrhtml += '</div>';
            zrhtml += '</div>';

            $(".poppage-list").prepend(zrhtml);
            alertSet("zr" + timestamp, data.timeleft, "真人");
        } else if (data.gametype == "彩票") {
            var cphtml = '';
            if (gettype == data.gametype || gettype == "推荐") {
                cphtml += '<div class="poppage-item" data-type="' + data.gametype + '" data-game="' + data.gamename + '">';
            } else {
                cphtml += '<div class="poppage-item" data-type="' + data.gametype + '" data-game="' + data.gamename + '" style="display:none;">';
            }
            cphtml += '<div class="popitem-logo">';
            cphtml += '<i class="hlicon icon-games icon-games-' + data.gameiconname + '"></i>';
            cphtml += '<svg class="icon-circle" width="64" height="64">';
            cphtml += '<circle cx="32" cy="32" r="29" fill="#FFF" stroke="#fb5050" stroke-width="3"></circle>';
            cphtml += '<circle id="cp' + timestamp + '" class="icon-sec-circle" cx="32" cy="32" r="29" fill="transparent" stroke="#fedcdc" stroke-width="4" transform="rotate(-90 32 32)"></circle>';
            cphtml += '</svg>';
            cphtml += '</div>';
            cphtml += '<div class="popitem-hl">';
            cphtml += '<span class="hlname">' + data.gamename + '</span>';
            cphtml += '<div class="hlimgbox">';
            cphtml += '<span class="hltxt">' + data.detail[0].playmethod + '</span>';
            cphtml += '</div>';
            cphtml += '</div>';
            cphtml += '<div class="popitem-gameinfo">';
            cphtml += '<span class="roundnum">第' + data.detail[0].period + '期</span>';
            cphtml += '<span class="roundnum importblue">连' + data.detail[0].batter + '期</span>';
            cphtml += '</div>';
            cphtml += '<div class="popitem-btnbox">';
            cphtml += '<a class="trybtn" onclick="trygame(\'' + data.gameplat + '\',\'' + data.detail[0].gameid + '\')">试玩</a>';
            cphtml += '<a class="enterbtn" onclick="gotogame(\'' + data.gameplat + '\',\'' + data.detail[0].gameid + '\')">进入</a>';
            cphtml += '</div>';
            cphtml += '</div>';

            $(".poppage-list").prepend(cphtml);
            alertSet("cp" + timestamp, data.timeleft, "彩票");
        } else if (data.gametype == "電子") {
            var dzhtml = '';
            if (gettype == data.gametype || gettype == "推荐") {
                dzhtml += '<div class="poppage-item" data-type="' + data.gametype + '" data-game="' + data.gamename + '">';
            } else {
                dzhtml += '<div class="poppage-item" data-type="' + data.gametype + '" data-game="' + data.gamename + '" style="display:none;">';
            }
            dzhtml += '<div class="popitem-logo">';
            dzhtml += '<i class="hlicon icon-games icon-games-' + data.gameiconname + '"></i>';
            dzhtml += '<svg class="icon-circle" width="64" height="64">';
            dzhtml += '<circle cx="32" cy="32" r="29" fill="#FFF" stroke="#fb5050" stroke-width="3"></circle>';
            dzhtml += '<circle id="dz' + timestamp + '" class="icon-sec-circle" cx="32" cy="32" r="29" fill="transparent" stroke="#fedcdc" stroke-width="4" transform="rotate(-90 32 32)"></circle>';
            dzhtml += '</svg>';
            dzhtml += '</div>';
            dzhtml += '<div class="popitem-hl">';
            dzhtml += '<span class="hlname">' + data.gamename + '電子</span>';
            dzhtml += '<div class="hlimgbox">';
            dzhtml += '<span class="hltxt">' + data.detail[0].name + '</span>';
            dzhtml += '</div>';
            dzhtml += '</div>';
            dzhtml += '<div class="popitem-gameinfo">';
            dzhtml += '<span class="roundnum"><font style="color:red">' + data.detail[0].gameact + '</font></span>';
            dzhtml += '</div>';
            dzhtml += '<div class="popitem-btnbox">';
            dzhtml += '<a class="trybtn" onclick="trygame(\'' + data.gameplat + '\',\'' + data.detail[0].gameid + '\')">试玩</a>';
            dzhtml += '<a class="enterbtn" onclick="gotogame(\'' + data.gameplat + '\',\'' + data.detail[0].gameid + '\')">去抢</a>';
            dzhtml += '</div>';
            dzhtml += '</div>';

            $(".poppage-list").prepend(dzhtml);
            alertSet("dz" + timestamp, data.timeleft, "電子");
        }
    }

    $(".poppage-menu .swiper-slide").each(function () {
        $(this).click(function () {
            $(".poppage-menu .swiper-slide").removeClass('active');
            $(this).addClass('active');
            if ($(this).data("type") == "推荐") {
                $(".poppage-list .poppage-item").show();
            } else {
                $(".poppage-list .poppage-item").hide();
                $(".poppage-list .poppage-item[data-type='" + $(this).data("type") + "']").show();
            }
        });
    });
    var windata = [
        { game: "MGE", player: "s8**1", win: "288888" },
        { game: "GB", player: "aa**4", win: "32888" },
        { game: "QT", player: "b1**d", win: "12580" },
        { game: "DT", player: "ca**y", win: "68888" },
        { game: "MGE", player: "gt**8", win: "64666" },
        { game: "HB", player: "c9**1", win: "12388" },
        { game: "GP", player: "d2**5", win: "37488" },
        { game: "QT", player: "s8**3", win: "218888" },
        { game: "DT", player: "a1**4", win: "32488" },
        { game: "MGE", player: "e1**3", win: "13580" },
        { game: "HB", player: "cc**y", win: "62888" },
        { game: "MGE", player: "g1**8", win: "61666" },
        { game: "HB", player: "n9**1", win: "12288" },
        { game: "AMB", player: "g2**2", win: "37388" },
        { game: "MGE", player: "y8**1", win: "278888" },
        { game: "AMB", player: "al**4", win: "32488" },
        { game: "MW", player: "al**4", win: "32488" },
        { game: "MW", player: "as**t", win: "54860" },
        { game: "GB", player: "as**t", win: "8486" },
    ]
    var setwin = setInterval(function () {
        for (i = 0; i < $("span.cred").length; i++) {
            var rand = Math.floor(Math.random() * 10 + 1);
            var onliners = $("span.cred:eq(" + i + ")").html();
            $("span.cred:eq(" + i + ")").html(Number(onliners) + Number(rand));
        }
        var items = windata;
        var item = items[Math.floor(Math.random() * items.length)];
        winning(item);
    }, 3000);
    var datahtml = [];
    var datagames = [];

    function winning(data) {
        var winhtml = '';
        winhtml += '<div class="bigwin">';
        winhtml += '<div class="wincon winA">';
        winhtml += '<span class="wintit">恭 喜</span>';
        winhtml += '<span class="wintxt">玩家' + data.player + '</span>';
        winhtml += '</div>';
        winhtml += '<div class="wincon winB">';
        winhtml += '<span class="wintit">BIG WIN</span>';
        winhtml += '<span class="wintxt">' + data.win + '</span>';
        winhtml += '</div>';
        winhtml += '<div class="winbg"></div>';
        winhtml += '</div>';
        datahtml.push(winhtml);
        datagames.push(data.game);
        setInterval(function () {
            removegame();
        }, 1)
    }
    var j = 0;
    var m = 0;
    var c = [];
    var d = [];
    function removegame() {
        if (datagames.length > 0) {
            if ($(".gamelist-v .gameitem[data-game='" + datagames[0] + "'] .bigwin").length > 0) {
                $.each(datagames, function (i) {
                    if (!$(".gamelist-v .gameitem[data-game='" + datagames[i] + "'] .bigwin").length > 0) {
                        $(".gamelist-v .gameitem[data-game='" + datagames[i] + "']").append(datahtml[i]);
                        j++;
                        var p = { id: j, game: datagames[i] };
                        c.push(p);
                        datagames.splice(i, 1);
                        datahtml.splice(i, 1);

                        setTimeout(function () {
                            if (c.length > 0) {
                                $(".gamelist-v .gameitem[data-game='" + c[0].game + "'] .bigwin").remove();
                                c.splice(0, 1);
                            }
                        }, 5000);
                    }
                });
            } else {
                $(".gamelist-v .gameitem[data-game='" + datagames[0] + "']").append(datahtml[0]);
                m++;
                var q = { id: m, game: datagames[0] };
                d.push(q);
                datagames.splice(0, 1);
                datahtml.splice(0, 1);
                setTimeout(function () {
                    if (d.length > 0) {
                        $(".gamelist-v .gameitem[data-game='" + d[0].game + "'] .bigwin").remove();
                        d.splice(0, 1);
                    }

                }, 5000);
            }
        }
    }
</script>
<script>
    function alert(message) {
        $(document).dialog({
            titleText: '温馨提示',
            content: message,
        });
    }
    function alerthd() {
        $(document).dialog({
            type: 'confirm',
            closeBtnShow: true,
            titleText: '温馨提示',
            content: '请登录后, 再进行游戏!',
            buttonTextConfirm: '登录',
            buttonTextCancel: '注册',
            onClickConfirmBtn: function () {
                window.location.href = '{{ route('wap.login') }}';
            },
            onClickCancelBtn: function () {
                window.location.href = '{{ route('wap.register') }}';
            },
            onClickCloseBtn: function () {
            }
        });
    }
    var swiper = new Swiper('#banner', {

        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {

            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });
    var noticeswiper = new Swiper('#notice', {
        centeredSlides: true,
        direction:"vertical",
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        }
    });
    var noticeswiper = new Swiper('.bigwinlist .swiper-container', {
        centeredSlides: true,
        direction:"vertical",
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        }
    });
    var mySwiper = new Swiper('.gametab .swiper-container', {

        freeMode: true,
        freeModeMomentumRatio: 0.5,
        slidesPerView: 'auto',

    });
    var mySwiper = new Swiper('.poppage-menu .swiper-container', {
        freeMode: true,
        freeModeMomentumRatio: 0.5,
        slidesPerView: 'auto',

    });
    $(window).load(function () {
        $("#loadingbg").fadeOut(200);
    });

    $(function () {
        var winh = $(window).height();
        var plisth = winh - 94;
        $(".poppage-list").css("height", plisth + "px");
        $(".btn-more").click(function () {
            $(".poppage").fadeIn(300);
        });
        $(".poppage-head .icon-close").click(function () {
            $(".poppage").fadeOut(300);
        });
        $(".botpop-top .icon-close").click(function () {
            $(".botpop").css("bottom", "-204px");
        });
        //setInterval(function () {  //弹提示框
        //    $(".botpop").css("bottom", "56px");
        //}, 5000);
        var status ='';
        if (status == "1") {
            $(document).dialog({
                titleText: '1231',
                content: '123123',
            });
        } else if (status == "2") {
            $(document).dialog({
                type: 'image',
                closeBtnShow: true,
                titleShow: true,
                titleText: '123',
                content: '<img src="Public/Home/picture/banner.png" />',
            });
        } else {
        }
        $(".my-icon").click(function(){
            $(".AppSidebar").css("right","0");
            $(".AppMask").fadeIn(300);
        });
        $(".huiyuan").click(function () {
            $(".AppSidebar").css("right", "0");
            $(".AppMask").fadeIn(300);
        });
        $(".AppMask,.close-icon").click(function(){
            $(".AppSidebar").css("right","-240px");
            $(".AppMask").fadeOut(300);
        });
        var gamesSwiper = new Swiper('#gameslist');
        gamesSwiper.on('slideChange', function () {
            var j = gamesSwiper.activeIndex;
            $('.gametab .swiper-slide').removeClass('active').eq(j).addClass('active');

            var content_height = $(".gamelist").eq(j).height();
            var slide_height = $("#gameslist>.swiper-slide").eq(j).height(content_height);
            $("#gameslist>.swiper-wrapper").css("height", content_height);
            $("#gameslist>.swiper-container").css("height", content_height);
        });
        /*列表切换*/
        $('.gametab .swiper-slide').on('click', function (e) {
            e.preventDefault();
            //得到当前索引
            var i = $(this).index();
            $('.gametab .swiper-slide').removeClass('active').eq(i).addClass('active');

            var content_height = $(".gamelist").eq(i).height()+20;
            var slide_height = $("#gameslist>.swiper-slide").eq(i).height(content_height);
            $("#gameslist>.swiper-wrapper").css("height", content_height);
            $("#gameslist>.swiper-container").css("height", content_height);
            gamesSwiper.slideTo(i, 1000, false);

        });
        $(".gamelist-v .gameitem[data-game='LOTTERY']").click(function () {
            gamesSwiper.slideTo(3, 1000, false);
        });
    })
</script>
{{--<script src="Public/Home/page_js/jquery.signalr-2.2.3.min.js"></script>
    <script src="Public/Home/page_js/6a3170c110734d979040a0f71b67ee4d.js"></script>
    <script>

        var uid = '';
        var isSignal = 'True';
        if (uid == "" || uid == null ||isSignal== 'False') { } else {
                $(function () {
                    jQuery.support.cors = true;
                    $.connection.hub.url = "https://signalr.cgamings.com/signalr";
                    var chat = $.connection.messageHub;
                    $.connection.hub.start().done(function () {
                        chat.server.sendLogin('','ws');
        })
                    chat.client.sendMessage = function (name, message) {
            var json = JSON.parse(message);
            if (json.cmd == 1015) {
                var data = dgpar(json.seat, json.tableId);
                            $(".bt-content").html("<p>DG梦幻厅第" + data[0].tablename + "桌，游戏：" + data[0].game + "，<span class=\"hl\">" + data[0].hltype + "</span></p>")
                            $(".btn-bet").attr("href", "/Mobile/GotoGame?GameType=DG&uid=&gameid=" + data[0].gameid + "_" + json.tableId+ "#")
                            $(".botpop").css("bottom", "56px");
                var dgdata = { id: "1", gametype: "真人", gameplat: "DG", gamename: "DG", gameiconname: "DG", timeleft: "15", detail: [{ goodroad: data[0].hltype, goodroadstyle: data[0].hlstyle, tablenum: data[0].tablename, roundnum: json.gameNo, gameid: data[0].gameid, tableid: json.tableId}] };
            createHtml(dgdata);
        }
                    }
                });
            }
    </script>--}}
@if($_system_config->is_alert_on == 0)
    <style>
        .layui-m-layercont{
            padding: 0px;
            line-height: 11px;
        }
    </style>
    <script>
        (function($){
            $(function(){
                //信息框
                layer.open({
                    content: '<img style="width:100%" src="{{ $_system_config->alert_img }}" alt="">',
                    style: ''
                });

            })
        })(jQuery);
    </script>
@endif
<script>
    $(function () {
        @if (!Auth::guard('member')->guest())
        @if($_member->is_trans_on ==1)
        $.ajax({
            type:'post',
            url : "{{route('member.api.wallet_balance')}}",
            dataType : 'json',
            success : function (data) {
                //console.log(data);
                if(data.statusCode == '01'){
                    var all = Number({{ $_member->money }}) + Number(data.data);
                    $('.money').text('');
                    $('.money').text(parseInt(all.toFixed(2)));
                }
            }
        })
        @endif
        @endif
    })

</script>
</body>
</html>
