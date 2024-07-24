@extends('wap.template.theme7.layouts.main')
@section('content')
    <link href="{{ asset('wap/theme7/css/swiper.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('wap/theme7/js/swiper.min.js') }}"></script>
    <link href="{{ asset('wap/theme7/css/sweet-alert.css') }}" rel="stylesheet" />
    <link href="{{ asset('wap/theme7/css/loadAnimation.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
    <style>
        html,
        body {
            padding-top: 39px;
        }
    </style>
    <div class="layout-main">
        <div class="common-module common-module-home">
            <div class="module-top">

                <div class="page-top-area" style="padding-bottom: 18px;">
                    <div class="top-container">
                        <div class="left-area">
                            <img src="{{ $_system_config->m_site_logo }}" alt="站标">
                        </div>
                        @if (!Auth::guard('member')->guest())

                            <div class="right-area user-info">
                                <a href="{{ route('wap.userinfo') }}">
                                <div>
                                    <span aria-hidden="true" class="fa fa-user icon"></span>{{ $_member -> name }}
                                </div>
                                <div>
                                    <span aria-hidden="true" class="fa fa-cny icon" style="margin-left:2px;"></span>&nbsp;&nbsp;<b class="UserAmountController money">{{ $_member -> money }}</b>
                                </div>
                                </a>
                            </div>
                            @else
                            <div class="right-area">
                                <a href="{{ route('wap.register') }}" class="btn btn-primary">注册</a>
                                <a href="{{ route('wap.login') }}" class="btn btn-primary">登录</a>
                            </div>
                            @endif

                    </div>
                </div>

            </div>
            <div class="module-main diy-scrollbar indexoverx">
                <div>
                    <div>
                        <div class="carousel-container">
                            <div id="mdl-4-carousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($banners as $k => $item)
                                        <li data-target="#mdl-4-carousel" data-slide-to="{{$k}}" class="@if($loop->first)active @endif"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    @foreach($banners as $item)
                                    <div class="item @if($loop->first)active @endif">
                                        <a href="{{ $item->jump_url }}"><img src="{{ $item->path }}" alt="图片"></a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @if($_system_config->is_hongbao ==1)
                            <div style="padding: 10px;">
                                <a target="_blank" href="{{route('wap.red')}}">
                                    <img style="border-radius: 8px;width: 100%" src="{{asset('wap/images/hongbao/qiang.jpg')}}">
                                </a>
                            </div>
                        @endif
                        <div class="notice-area">
                            <span aria-hidden="true" class="glyphicon glyphicon-volume-up notice-icon"></span>
                            <div class="marquee">
                                <div class="marquee-wrap swiper-container notice-swiper">
                                    <ul class="swiper-wrapper" id="noticeSiper"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="menu-area-wrap">
                            <div class="menu-btn-area">
                                <div class="menu-btns" id="gamelist">
                                    <?php
                                    $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                                    ?>
                                    @foreach($slot as $k => $v)
                                    <div class="col-xs-3">
                                        <a href="{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1">
                                            <div class="menu-btn"><?php
                                                $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                $v['img'] = $img;
                                                ?>
                                                <img src="{{ $img }}">
                                                <span>{{$v['name']}}</span>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                    <?php
                                    $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                                    ?>
                                    @foreach($live as $k => $v)
                                        <div class="col-xs-3">
                                            <a href="javascript:void(0)" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif">
                                                <div class="menu-btn"><?php
                                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                    $v['img'] = $img;
                                                    ?>
                                                    <img src="{{ $img }}">
                                                    <span>{{$v['name']}}</span>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                        <?php
                                        $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                                        ?>
                                        @foreach($lottery as $k => $v)
                                            <div class="col-xs-3">
                                                <a href="javascript:void(0)" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif">
                                                    <div class="menu-btn">
                                                        <?php
                                                        $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                        $v['img'] = $img;
                                                        ?>
                                                        <img src="{{ $img }}">
                                                        <span>{{$v['name']}}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                        <?php
                                        $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                                        ?>
                                        @foreach($sports as $k => $v)
                                            <div class="col-xs-3">
                                                <a href="javascript:void(0)" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif">
                                                    <div class="menu-btn"><?php
                                                        $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                        $v['img'] = $img;
                                                        ?>
                                                        <img src="{{ $img }}">
                                                        <span>{{$v['name']}}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                        <?php
                                        $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                                        ?>
                                        @foreach($poker as $k => $v)
                                            <div class="col-xs-3">
                                                <a href="{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1">
                                                    <div class="menu-btn"><?php
                                                        $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                        $v['img'] = $img;
                                                        ?>
                                                        <img src="{{ $img }}">
                                                        <span>{{$v['name']}}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                        <div class="col-xs-3">
                                            <a href="{{ route('wap.index_py') }}">
                                                <div class="menu-btn">
                                                    <img src="{{ asset('/wap/theme7/images/fish.png') }}">
                                                    <span>欢乐捕魚</span>
                                                </div>
                                            </a>
                                        </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="module-bottom"></div>
        </div>
    </div>
    <!--红包效果-->
    <div class="hongbao-content clearboth">
        <ul class="couten"></ul>
    </div>
    <div class="mo" onclick="clickMo()">
        <div class="sen">
            <h3>获得红包<b id="luckHongBao"></b>元</h3>
        </div>
    </div>
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
    <div class="advert-opcity" id="indexDialog" onclick="$('#indexDialog').hide()">
        <div class="advert-content">
            <h3 id="dialogTitle"></h3>
            <img src="" id="dialogImg" />
            <h3 onclick="$('#indexDialog').hide()">关闭</h3>
        </div>
    </div>
    <input type="hidden" value="0" id="hbCount" />
    <script>
        $(function() {
            @if (!Auth::guard('member')->guest())
                @if($_member->is_trans_on == 1)
                    $.ajax({
                        type: 'post',
                        url: "{{route('member.api.wallet_balance')}}",
                        dataType: 'json',
                        success: function (data) {
                            //console.log(data);
                            if (data.statusCode == '01') {
                                var all = Number($('.money').text()) + Number(data.data);
                                $('.money').text('');
                                $('.money').text(parseInt(all.toFixed(2)));
                            }
                        }
                    })
                @endif
            @endif
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
