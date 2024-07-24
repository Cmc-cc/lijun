@extends('wap.layouts.main')
@section('after.css')

    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/css/main.css') }}">
@endsection
@section('content')

    @include('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="m_banner">
                <div id="slide" class="container-fluid slide">
                    <ul class="bd">
                        {{--@foreach($banners as $item)--}}
                        {{--<li><a href="#"><img class="carousel-inner" src="{{ $item->path }}"></a>--}}
                        {{--</li>--}}
                        {{--@endforeach--}}
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner2.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner3.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner4.jpg') }}"></a>
                        </li>
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

            {{--視訊--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    視訊直播
                </div>
                @if(in_array('AG', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=AG&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live1.png') }}" alt="">
                          <span class="m_box-name">
                            AG視訊
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=BBIN&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live4.jpg') }}" alt="">
                            <span class="m_box-name">
                        BB視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=BG&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live5.jpg') }}" alt="">
                            <span class="m_box-name">
                        BG視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('SUNBET', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live7.jpg') }}" alt="">
                            <span class="m_box-name">
                        申博視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('ALLBET', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live7.jpg') }}" alt="">
                            <span class="m_box-name">
                        欧博視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('LEBO', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=LEBO&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live7.jpg') }}" alt="">
                            <span class="m_box-name">
                        LEBO視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('SA', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=SA&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live5.jpg') }}" alt="">
                            <span class="m_box-name">
                        SA視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('GD', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=GD&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live5.jpg') }}" alt="">
                            <span class="m_box-name">
                        GD視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('OG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=OG&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live8.png') }}" alt="">
                            <span class="m_box-name">
                        OG視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('DG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=DG&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live2.png') }}" alt="">
                            <span class="m_box-name">
                        DG視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('MG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=MG&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live3.png') }}" alt="">
                      <span class="m_box-name">
                        MG視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('PT', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=PT&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live6.jpg') }}" alt="">
                      <span class="m_box-name">
                        PT視訊
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('GPI', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=GPI&game_type=1&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live6.jpg') }}" alt="">
                            <span class="m_box-name">
                        GPI視訊
                      </span>
                        </a>
                    </div>
                @endif
            {{--電子--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    電子游艺
                </div>
                @if(in_array('MG', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=MG&game_type=2&devices=1">
                            <img src="{{ asset('/wap/images/m_box-game5.png') }}" alt="">
                          <span class="m_box-name">
                            MG電子
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('PT', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=PT&game_type=2&devices=1">
                            <img src="{{ asset('/wap/images/m_box-game3.png') }}" alt="">
                            <span class="m_box-name">
                        PT電子
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('AG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=AG&game_type=2&devices=1">
                            <img src="{{ asset('/wap/images/m_box-game2.png') }}" alt="">
                          <span class="m_box-name">
                            AG電子
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('GPI', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=GPI&game_type=2&devices=1">
                            <img src="{{ asset('/wap/images/m_box-game2.png') }}" alt="">
                            <span class="m_box-name">
                            GPI電子
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=BBIN&game_type=2&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-game4.png') }}" alt="">
                      <span class="m_box-name">
                        BB電子
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('SG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=SG&game_type=2&devices=1">
                            <img src="{{ asset('/wap/images/m_box-game2.png') }}" alt="">
                            <span class="m_box-name">
                            SG電子
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('PP', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=PP&game_type=2&devices=1">
                            <img src="{{ asset('/wap/images/m_box-game2.png') }}" alt="">
                            <span class="m_box-name">
                            PP電子
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('QT', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=QT&game_type=2&devices=1">
                            <img src="{{ asset('/wap/images/m_box-game2.png') }}" alt="">
                            <span class="m_box-name">
                            QT電子
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('MW', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=MW&game_type=2&devices=1">
                            <img src="{{ asset('/wap/images/m_box-game2.png') }}" alt="">
                            <span class="m_box-name">
                            MW電子
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('CQ9', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=CQ9&game_type=2&devices=1">
                            <img src="{{ asset('/wap/images/m_box-game8.png') }}" alt="">
                            <span class="m_box-name">
                            CQ9電子
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('SA', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=SA&game_type=2&devices=1">
                        <img src="{{ asset('/wap/images/m_box-game8.png') }}" alt="">
                        <span class="m_box-name">
                        SA電子
                        </span>
                        </a>
                    </div>
                @endif
                @if(in_array('JDB', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=JDB&game_type=2&devices=1">
                            <img src="{{ asset('/wap/images/m_box-game1.png') }}" alt="">
                            <span class="m_box-name">
                        JDB電子
                        </span>
                        </a>
                    </div>
                @endif
                @if(in_array('FG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=FG&game_type=2&devices=1">
                            <img src="{{ asset('/wap/images/m_box-game1.png') }}" alt="">
                            <span class="m_box-name">
                        FG電子
                        </span>
                        </a>
                    </div>
                @endif
            </div>

            {{--捕魚--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    捕魚游戏
                </div>
                @if(in_array('AG', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=AG&game_type=6&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu1.png') }}" alt="">
                          <span class="m_box-name">
                            AG捕魚王
                          </span>
                        </a>
                    </div>

                @endif
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=BBIN&game_type=6&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu2.png') }}" alt="">
                            <span class="m_box-name">
                            BB捕魚达人
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=BBIN&game_type=6&devices=1&game_code=38001">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu2.png') }}" alt="">
                            <span class="m_box-name">
                            BB捕魚大师
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('MW', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=MW&game_type=6&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu2.png') }}" alt="">
                            <span class="m_box-name">
                            MW千炮捕魚
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('SA', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=SA&game_type=6&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu2.png') }}" alt="">
                            <span class="m_box-name">
                            SA捕魚达人
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('CQ9', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=CQ9&game_type=6&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            CQ9皇金渔场
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('JDB', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=JDB&game_type=6&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            JDB财神捕魚
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('FG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=FG&game_type=6&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            FG欢乐捕魚
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('JDB', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=JDB&game_type=6&devices=1&game_code=7_7001">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            JDB龙王捕魚
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('JDB', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=JDB&game_type=6&devices=1&game_code=7_7002">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            JDB龙王捕魚2
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('FG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=FG&game_type=6&devices=1&game_code=fish_mm">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            FG美人捕魚
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('FG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=FG&game_type=6&devices=1&game_code=fish_3D">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            FG捕魚嘉年华
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('FG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=FG&game_type=6&devices=1&game_code=fish_tt">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            FG天天捕魚
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('FG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=FG&game_type=6&devices=1&game_code=fish_bn">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            FG捕鸟达人
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('FG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=FG&game_type=6&devices=1&game_code=fish_zj">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            FG雷霆战警
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('CQ9', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=CQ9&game_type=6&devices=1&game_code=AD01">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            CQ9捕魚去喽
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('MT', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=MT&game_type=6&devices=1&game_code=PTG0011">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            MT李逵捕魚
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('MT', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=MT&game_type=6&devices=1&game_code=PTG0064">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu3.png') }}" alt="">
                            <span class="m_box-name">
                            MT金鲨银鲨
                          </span>
                        </a>
                    </div>
                @endif
            </div>

            {{--彩票--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    彩票游戏
                </div>
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=BBIN&game_type=3&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-lottory2.png') }}" alt="">
                        <span class="m_box-name">
                        BB彩票
                      </span>
                        </a>
                    </div>
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=BG&game_type=3&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-lottory3.png') }}" alt="">
                        <span class="m_box-name">
                        BG彩票
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('VR', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=VR&game_type=3&devices=1">
                            <img src="{{ asset('/wap/images/m_box-lottory1.png') }}" alt="">
                            <span class="m_box-name">
                            VR彩票
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('EG', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=EG&game_type=3&devices=1">
                            <img src="{{ asset('/wap/images/m_box-lottory4.jpg') }}" alt="">
                            <span class="m_box-name">
                            EG彩票
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('IG', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=IG&game_type=3&devices=1">
                            <img src="{{ asset('/wap/images/m_box-lottory4.jpg') }}" alt="">
                            <span class="m_box-name">
                            IG彩票
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('IG', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=IG&game_type=3&devices=1&game_code=imlotto10059">
                            <img src="{{ asset('/wap/images/m_box-lottory4.jpg') }}" alt="">
                            <span class="m_box-name">
                            IG六合彩票
                          </span>
                        </a>
                    </div>
                @endif
            </div>

            {{--體育--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    體育赛事
                </div>
                @if(in_array('SS', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=SS&game_type=4&devices=1">
                            <img src="{{ asset('/wap/images/m_box-esports1.png') }}" alt="">
                          <span class="m_box-name">
                            三昇體育
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=BBIN&game_type=4&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-esports3.png') }}" alt="">
                        <span class="m_box-name">
                        BB體育
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('IBC', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=IBC&game_type=4&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-esports-opus.png') }}" alt="">
                        <span class="m_box-name">
                        IBC體育
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('GJ', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=GJ&game_type=4&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-esports-im.png') }}" alt="">
                        <span class="m_box-name">
                        冠捷體育
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('AG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=AG&game_type=4&devices=1">
                            <img src="{{ asset('/wap/images/m_box-esports-im.png') }}" alt="">
                            <span class="m_box-name">
                            AG體育
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('NEWBB', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=NEWBB&game_type=4&devices=1">
                            <img src="{{ asset('/wap/images/m_box-esports-im.png') }}" alt="">
                            <span class="m_box-name">
                            NEWBB體育
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('ESB', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=ESB&game_type=5&devices=1">
                            <img src="{{ asset('/wap/images/m_box-esports-im.png') }}" alt="">
                            <span class="m_box-name">
                            ESB电竞
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('HC', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=HC&game_type=5&devices=1">
                            <img src="{{ asset('/wap/images/m_box-esports-im.png') }}" alt="">
                            <span class="m_box-name">
                            HC电竞
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('NEWBB', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=NEWBB&game_type=5&devices=1">
                            <img src="{{ asset('/wap/images/m_box-esports-im.png') }}" alt="">
                            <span class="m_box-name">
                            NEWBB电竞
                          </span>
                        </a>
                    </div>
                @endif
            </div>


            {{--棋牌--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    棋牌游戏
                </div>
                @if(in_array('KY', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=KY&game_type=7&devices=1">
                            <img src="{{ asset('/wap/images/m_box-poker1.png') }}" alt="">
                            <span class="m_box-name">
                              开元棋牌
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('MT', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=MT&game_type=7&devices=1">
                            <img src="{{ asset('/wap/images/m_box-poker2.png') }}" alt="">
                            <span class="m_box-name">
                              美天棋牌
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('VG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=VG&game_type=7&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-poker2.png') }}" alt="">
                            <span class="m_box-name">
                                KG棋牌
                            </span>
                        </a>
                    </div>
                @endif
                @if(in_array('FG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('game.playGame') }}?plat_type=FG&game_type=7&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-poker2.png') }}" alt="">
                            <span class="m_box-name">
                                FG棋牌
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
                        <img src="{{ asset('/wap/images/m_box-act2.png') }}" alt="">
                          <span class="m_box-name">
                            优惠活动
                          </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function ($) {
            $(function () {
                $('.disabled').on('click', function () {
                    alert('暂未开放，敬请期待！');
                });
            })
        })(jQuery)
    </script>

@endsection
