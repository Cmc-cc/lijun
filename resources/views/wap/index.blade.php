@extends('wap.layouts.main')
@section('after.css')

    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/css/main.css') }}">
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
@endsection
@section('content')

    @include('wap.layouts.header')
    <style>
        .m_header{
            z-index:100;
        }
        .m_wrapper .m_box.m_box-half{
            float: left;
            width: 25%;
            margin-bottom: 18px;
        }
        .m_wrapper .m_box .m_box-link{
            position: relative;
            display: block;
            color: #FFF;
            font-size: 13px;
            text-align: center;
            text-decoration: none;
        }
        .m_wrapper .m_box img{
            display: block;
            margin: 0 auto;
            width:49px;
        }
        .m_wrapper .m_box .m_box-name_new{
            margin-top: 5px;
            display:block;

        }
        .m_wrapper .m_box .m_box-link{
            background-color:#1b1d1b;
            border:0
        }
        .m_notice{
            margin-top:0
        }
        .category-wrap-placeholder_3S0wB {
            height: 38px;
        }
        .category-wrap_d3wny {
            position: relative;
            height: 38px;
            background-color: #111;
            box-sizing: border-box;
            border-top: solid 1px #2B2825;
            border-bottom: solid 1px #2B2825;
            /*padding-right: 36px;*/
        }
        .category-wrap-placeholder_3S0wB.fixed_24GUJ .category-wrap_d3wny {
            position: fixed;
            top: 46px;
            left: 0;
            z-index: 1000;
            width: 100%;
        }
        .category-wrap_d3wny .category-outer-inner_17KJ5 {
            width: 100%;
            height: 36px;
            overflow-x: scroll;
            -webkit-overflow-scrolling: touch;
        }
        .category-wrap_d3wny .category-name_2VWaa {
            position: relative;
            color: #FFF;
            float: left;
            width: 20%;
            /*height: 36px;*/
            line-height: 36px;
            font-size: 13px;
            text-align: center;
            user-select: none;
            -webkit-user-select: none;
            box-sizing: border-box;
            padding: 0 10px;
        }
        .category-wrap_d3wny .category-name_2VWaa.current_2-Ch8 {
            color: #C72620;
        }
        .category-wrap_d3wny .category-toggle-icon_2RR3B {
            position: absolute;
            top: 0;
            right: 0;
            width: 16px;
            height: 16px;
            background-color: #1B1D1B;
            padding: 10px;
        }
        .fixed_24GUJ .category-wrap_d3wny .category-name_2VWaa{
            line-height:36px;
        }
        .category-wrap_d3wny .category-name_2VWaa a{
            color:#fff;
        }
        .category-wrap_d3wny .category-name_2VWaa a.active{
            color:#C72620;
        }
        .m_wrapper .m_box{
            padding:0;
        }
        .m_category{
            margin-bottom:18px;
        }
    </style>
    <script>
        function choose_game(sign,plat_type,game_type,game_code='',demo_code='') {
            if(sign){
                layer.open({
                    content: '游戏类型选择'
                    ,btn: ['进入游戏', '试玩']
                    ,skin: 'footer'
                    ,yes: function(index){
                                @if($_member)
                        var url = '{{route('game.playGame')}}?plat_type='+plat_type+'&game_type='+game_type+'&devices=1'+'&game_code='+game_code
                        window.open(url);
                        @else
                            location.href = '{{ route('wap.login') }}';
                        @endif
                        layer.closeAll();
                    }
                    ,no : function(index) {
                        var demo_url = '{{route('game.demo_login')}}?plat_type='+plat_type+'&game_type='+game_type+'&devices=1'+'&game_code='+demo_code
                        window.open(demo_url)
                    }
                });
            }else{
                layer.open({
                    content: '游戏类型选择'
                    ,btn: ['进入游戏']
                    ,skin: 'footer'
                    ,yes: function(index){
                                @if($_member)
                        var demo_url = '{{route('game.playGame')}}?plat_type='+plat_type+'&game_type='+game_type+'&devices=1'+'&game_code='+game_code
                        window.open(demo_url);
                        @else
                            location.href = '{{ route('wap.login') }}';
                        @endif
                        layer.closeAll();
                    }
                });
            }

        }
    </script>
    <div class="m_container">
        <div class="m_body">
            <div class="m_banner">
                <div id="slide" class="container-fluid slide">
                    <ul class="bd">
                        @foreach($banners as $item)
                        <li>
                            <a target="_blank" href="{{$item->jumpurl}}">
                                <img class="carousel-inner" src="{{ $item->path }}">
                            </a>
                        </li>
                        @endforeach
                        {{--<li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner2.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner3.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner4.jpg') }}"></a>
                        </li>--}}
                    </ul>
                    <ul class="hd"></ul>
                </div>
            </div>

            <div class="m_notice">
                <span class="notice_logo"></span>
                <div class="pull-left notice_title">
                    系统公告:
                </div>
                <div class="pull-left notice_content">
                    <marquee id="mar0" behavior="scroll" direction="left" scrollamount="4">
                        @foreach($_system_notices as $v)
                            <div class="module" style="display: inline;word-break: keep-all;white-space: nowrap;">
                                <span>~{{ $v->title }}~</span>
                                <span>{{ $v->content }}</span>
                            </div>
                        @endforeach
                    </marquee>
                </div>
            </div>
            @if($_system_config->is_hongbao ==1)
                <div style="padding: 10px;">
                    <a target="_blank" href="{{route('wap.red')}}">
                        <img style="border-radius: 8px" src="{{asset('wap/images/hongbao/qiang.jpg')}}">
                    </a>
                </div>
            @endif
            <div class="category-wrap-placeholder_3S0wB">
                <div class="category-wrap_d3wny"><div class="category-outer-inner_17KJ5">
                        <div class="category-inner_ZydHv " style="width: 100%; height: 36px;">
                            <div class="category-name_2VWaa category-name-casino_3hsqT current_2-Ch8"><a href="javascript:void(0)">視訊</a></div>
                            <div class="category-name_2VWaa category-name-live_cYRVv "><a href="javascript:void(0)">電子</a></div>
                            <div class="category-name_2VWaa category-name-card_3g1gp "><a href="javascript:void(0)">彩票</a></div>
                            <div class="category-name_2VWaa category-name-ball_1w8UO "><a href="javascript:void(0)">體育</a></div>
                            <div class="category-name_2VWaa category-name-lottery_J-CBk "><a href="javascript:void(0)">棋牌</a></div>
                        </div></div><!--<span class="category-toggle-icon_2RR3B">
			<img class="ga-switch-card" src="/wap/images/100percent/btn_switch_cards_aio3.png" alt=""></span>--></div></div>
            {{--視訊--}}
            <div class="m_wrapper clear">
                <div class="m_category" id="live">
                    視訊直播
                </div>
                @if(in_array('AG', $_api_list) || in_array('AGS',$_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                                onclick="choose_game(true,'AG',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_aglive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                            AG視訊
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(false,'BBIN',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_live_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        BB視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(true,'BG',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_bglive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        BG視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('SUNBET', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(false,'SUNBET',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_sblive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        申博視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('ALLBET', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(true,'ALLBET',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_ablive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        欧博視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('LEBO', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=LEBO&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(false,'LEBO',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_evolive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        LEBO視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('SA', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(true,'SA',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_salive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        SA視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('GD', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(false,'GD',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_gdlive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        GD視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('OG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(true,'OG',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_oglive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        OG視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('DG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DG&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(true,'DG',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_dglive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        DG視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('MG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(false,'MG',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_mglive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        MG視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('PT', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(false,'PT',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_ptlive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        PT視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('GPI', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=gpi&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(false,'GPI',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_gpilive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        GPI視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('EBET', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EBET&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(false,'EBET',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/ebet.png') }}" alt="">
                            <span class="m_box-name_new">
                        EBET視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('SEXY', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EBET&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(false,'SEXY',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/sexy.png') }}" alt="">
                            <span class="m_box-name_new">
                        SEXY視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('CQ9', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                           {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EBET&game_type=1&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                           onclick="choose_game(false,'CQ9',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/cq9.png') }}" alt="">
                            <span class="m_box-name_new">
                        CQ9視訊
                      </span>
                        </a>
                    </div>
                @endif
                {{--電子--}}
                <div class="m_wrapper clear">
                    <div class="m_category" id="casino">
                        電子游艺
                    </div>
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{route('wap.index_py')}}">
                            <img src="{{ asset('/wap/images/100percent/btn_icon_fisharea_n.png') }}" alt="">
                            <span class="m_box-name_new">
                            捕魚机
                          </span>
                        </a>
                    </div>
                    @if(in_array('PGS', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=pgs&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/pgs.png') }}" alt="">
                                <span class="m_box-name_new">
                            PGS電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('PNG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/png.png') }}" alt="">
                                <span class="m_box-name_new">
                            PNG電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('GNS', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/gnscasino.png') }}" alt="">
                                <span class="m_box-name_new">
                            GNS電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('PP', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_ppcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            PP電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('SG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_sgcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            SG電子
                          </span>
                            </a>
                        </div>
                    @endif

                    @if(in_array('MW', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_mwcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            MW電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('CQ9', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_cq9casino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            CQ9電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('SA', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_sacasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        SA電子
                        </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('JDB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_jdbcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        JDB電子
                        </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_fgcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        FG電子
                        </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('SW', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_swcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        SW電子
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('BNG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=BNG&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_bngcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        BNG電子
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('MG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_mgcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            MG電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('PT', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_ptcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        PT電子
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('AG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_agslotcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            AG電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('GPI', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_gpicasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            GPI電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2&devices=1','','width=1024,height=768')">
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_game_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        BB電子
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('QT', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=QT&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_qtcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            QT電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('DT', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=DT&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/dt.png') }}" alt="">
                                <span class="m_box-name_new">
                            DT電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('PG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/pg.png') }}" alt="">
                                <span class="m_box-name_new">
                            PG電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('GTI', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=GTI&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/gti.png') }}" alt="">
                                <span class="m_box-name_new">
                            GTI電子
                          </span>
                            </a>
                        </div>
                    @endif

                    @if(in_array('GA', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/ga.png') }}" alt="">
                                <span class="m_box-name_new">
                            GA電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('HB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/hbcasino.png') }}" alt="">
                                <span class="m_box-name_new">
                            HB電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('RT', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/rtcasino.png') }}" alt="">
                                <span class="m_box-name_new">
                            RT電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('ISB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/isbcasino.png') }}" alt="">
                                <span class="m_box-name_new">
                            ISB電子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('GG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="window.open('{{ route('game.playGame') }}?plat_type=GG&game_type=2&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/gg.png') }}" alt="">
                                <span class="m_box-name_new">
                            GG電子
                          </span>
                            </a>
                        </div>
                    @endif
                </div>
                {{--彩票--}}
                <div class="m_wrapper clear">
                    <div class="m_category" id="lotter">
                        彩票游戏
                    </div>
                    @if(in_array('CSK', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EG&game_type=3&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'CSK',3)"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_iglottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            CSK彩票
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('CS', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EG&game_type=3&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'CS',3)"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_iglottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            CS彩票
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('EG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EG&game_type=3&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                                    onclick="choose_game(false,'EG',3)"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_eglottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            EG彩票
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('IG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'IG',3)"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_iglottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            IG彩票
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('IG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&devices=1&game_code=imlotto10059','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'IG',3,'imlotto10059')"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_iglottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            IG六合彩
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('IG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&devices=1&game_code=imlotto10059','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'IG',3,'gfcai')"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_iglottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            IG官方彩
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('SGL', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SGL&game_type=3&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'SGL',3)"
                            >
                                <img src="{{ asset('/wap/images/100percent/sg.png') }}" alt="">
                                <span class="m_box-name_new">
                            SG双赢彩票
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('VR', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=VR&game_type=3&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'VR',3)"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_vrlottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            VR彩票
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=3&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'BBIN',3)"
                            >
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_lottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        BB彩票
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('BG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=3&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(true,'BG',3)"
                            >
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_bglottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        BG彩票
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('FH', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=3&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'FH',3)"
                            >
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn-fh.png') }}" alt="">
                                <span class="m_box-name_new">
                        FH乐利彩票
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('TCG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=3&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'TCG',3)"
                            >
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn-tcg.png') }}" alt="">
                                <span class="m_box-name_new">
                        TCG彩票
                      </span>
                            </a>
                        </div>
                    @endif
                </div>

                {{--體育--}}
                <div class="m_wrapper clear">
                    <div class="m_category" id="ball">
                        體育赛事
                    </div>
                    @if(in_array('GJ', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GJ&game_type=4&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'GJ',4)"
                            >
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_gjball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        皇冠體育
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('SS', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SS&game_type=4&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'SS',4)"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_ssball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            三昇體育
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'BBIN',4)"
                            >
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_ball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        BB體育
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('IBC', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IBC&game_type=4&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'IBC',4)"
                            >
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_ibcball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        沙巴體育
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('AG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'AG',4)"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_agball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            AG體育
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('NEWBB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=NEWBB&game_type=4&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'NEWBB',4)"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_bcsport_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            NEWBB體育
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('ESB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ESB&game_type=5&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'ESB',5)"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_esbball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            ESB电竞
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('HC', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HC&game_type=5&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'HC',5)"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_hcball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            皇朝电竞
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('AVIA', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AVIA&game_type=5&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'AVIA',5)"
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_aviaball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            泛亚电竞
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('BL', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               {{--@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BL&game_type=4&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif--}}
                               onclick="choose_game(false,'BL',4)"
                            >
                                <img src="{{ asset('/wap/images/100percent/bl.png') }}" alt="">
                                <span class="m_box-name_new">
                            新皇冠體育
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('IM', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IM&game_type=4&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                            >
                                <img src="{{ asset('/wap/images/100percent/im.png') }}" alt="">
                                <span class="m_box-name_new">
                            IM體育
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('S128', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=S128&game_type=4&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                            >
                                <img src="{{ asset('/wap/images/100percent/s128.png') }}" alt="">
                                <span class="m_box-name_new">
                            S128體育
                          </span>
                            </a>
                        </div>
                    @endif
                    {{--@if(in_array('NEWBB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=NEWBB&game_type=5&devices=1">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_bcsport_n.png') }}" alt="">
                                <span class="m_box-name_new">
                                NEWBB电竞
                              </span>
                            </a>
                        </div>
                    @endif--}}
                </div>


                {{--棋牌--}}
                <div class="m_wrapper clear">
                    <div class="m_category" id="kycard">
                        棋牌游戏
                    </div>
                    @if(in_array('AP', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ap&game_type=7&devices=1','','width=1024,height=768')">
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/ap.png') }}" alt="">
                                <span class="m_box-name_new">
                                AP棋牌
                            </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('VG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=VG&game_type=7&devices=1','','width=1024,height=768')">
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_vgcard_n.png') }}" alt="">
                                <span class="m_box-name_new">
                                VG棋牌
                            </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('SGP', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SGP&game_type=7&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/sg.png') }}" alt="">
                                <span class="m_box-name_new">
                              SG双赢棋牌
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('LEG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=LEG&game_type=7&devices=1','','width=1024,height=768')">
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_legcard_n.png') }}" alt="">
                                <span class="m_box-name_new">
                                乐游棋牌
                            </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('MT', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=7&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_mtcard_n.png') }}" alt="">
                                <span class="m_box-name_new">
                              美天棋牌
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('KY', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7&devices=1','','width=1024,height=768')">
                                <img src="{{ asset('/wap/images/100percent/btn_icon_kycard_n.png') }}" alt="">
                                <span class="m_box-name_new">
                              开元棋牌
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=7&devices=1','','width=1024,height=768')">
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_fgcard_n.png') }}" alt="">
                                <span class="m_box-name_new">
                                FG棋牌
                            </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('NW', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=NW&game_type=7&devices=1','','width=1024,height=768')">
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn-nw.png') }}" alt="">
                                <span class="m_box-name_new">
                                NW棋牌
                            </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('RMG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RMG&game_type=7&devices=1','','width=1024,height=768')">
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn-rmg.png') }}" alt="">
                                <span class="m_box-name_new">
                                RMG棋牌
                            </span>
                            </a>
                        </div>
                    @endif
                </div>

                {{--优惠--}}
                <div class="m_wrapper clear">
                    <div class="m_category">
                        优惠活动
                    </div>
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('wap.activity_list') }}">
                            <img src="{{ asset('/wap/images/m_box-act2.png') }}" alt="" style="width:100%">
                            <span class="m_box-name_new">
                            优惠活动
                          </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @if($_system_config->is_alert_on == 0)
            <style>
                .layui-m-layercont{
                    padding: 0px;
                }
            </style>
            <script>
                (function($){
                    $(function(){
                        //信息框
                        layer.open({
                            content: '<img src="{{ $_system_config->alert_img }}" alt="">',
                            style: 'padding:0px; border:none;'
                        });
                    })
                })(jQuery);
            </script>
        @endif
        <script>
            (function ($) {
                $(function () {
                    $('.disabled').on('click', function () {
                        alert('暂未开放，敬请期待！');
                    });
                })
                $(window).scroll(
                    function() {
                        var scrollTop = $(this).scrollTop();
                        var scrollHeight = $(document).height();
                        var windowHeight = $(this).height();
                        if(scrollTop>=170){
                            $(".category-wrap-placeholder_3S0wB").addClass("fixed_24GUJ")
                        }else{
                            $(".category-wrap-placeholder_3S0wB").removeClass("fixed_24GUJ")
                        }
                        var liveTop=$("#live").offset().top;
                        var casinoTop=$("#casino").offset().top;
                        var lotterTop=$("#lotter").offset().top;
                        var ballTop=$("#ball").offset().top;
                        var kycardTop=$("#kycard").offset().top;
                        scrollTop=scrollTop+180;
                        console.log(kycardTop);
                        console.log(scrollTop);
                        if(scrollTop>=liveTop&&scrollTop<casinoTop){
                            $('.category-name_2VWaa').eq(0).find('a').addClass("active").parent().siblings().find('a').removeClass('active')
                        }else if(scrollTop>=casinoTop&&scrollTop<lotterTop){
                            $('.category-name_2VWaa').eq(1).find('a').addClass("active").parent().siblings().find('a').removeClass('active')
                        }else if(scrollTop>=lotterTop&&scrollTop<ballTop){
                            $('.category-name_2VWaa').eq(2).find('a').addClass("active").parent().siblings().find('a').removeClass('active')
                        }else if(scrollTop>=ballTop&&scrollTop<kycardTop){
                            $('.category-name_2VWaa').eq(3).find('a').addClass("active").parent().siblings().find('a').removeClass('active')
                        }else if(scrollTop>=kycardTop){
                            $('.category-name_2VWaa').eq(4).find('a').addClass("active").parent().siblings().find('a').removeClass('active')
                        }
                    }
                );
                $(".category-name_2VWaa a").click(function(){
                    var scrollTop=$(window).scrollTop()
                    var index=$(this).parent().index();
                    console.log(index);
                    switch(index){
                        case 0:
                            scrollTop=$("#live").offset().top;
                            break;
                        case 1:
                            scrollTop=$("#casino").offset().top;
                            break;
                        case 2:
                            scrollTop=$("#lotter").offset().top;
                            break;
                        case 3:
                            scrollTop=$("#ball").offset().top;
                            break;
                        case 4:
                            scrollTop=$("#kycard").offset().top;
                            break;
                    }
                    console.log(scrollTop)
                    document.body.scrollTop =scrollTop-80;
                    $(this).addClass("active").parent().siblings().find('a').removeClass('active')
                })
            })(jQuery)

        </script>

@endsection
