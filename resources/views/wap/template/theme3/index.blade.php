@extends('wap.template.theme3.layouts.main')
@section('content')
    <link href="{{ asset('wap/theme3/css/sweet-alert.css') }}" rel="stylesheet">
    <link href="{{ asset('wap/theme3/css/loadAnimation.css') }}" rel="stylesheet">
    <main class="panel slideout-panel slideout-panel-left removeL" style="">
        <!---->
        <div data-v-76fa910e="" class="navbar-container">
            <div data-v-76fa910e="" middle="" class="logo-container">
                <img data-v-76fa910e="" fl="" src="{{ $_system_config->m_site_logo }}" alt="logo" class="logo">
            </div>
            <div data-v-76fa910e="" middle="" class="menu-container">
                <div data-v-76fa910e="">
                    <i data-v-76fa910e="" middle="" class="iconfont menu-icon icon-htmal5icon35" style=""></i>
                </div>
            </div>
            <div data-v-76fa910e="" class="title"></div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container">
                @if (!Auth::guard('member')->guest())
                    <div data-v-76fa910e="" class="info dns" style="">
                        <label class="yue">余额：</label>
                        <span data-v-76fa910e="" class="UserAmountController money">{{ $_member->money }}</span>
                    </div>
                @endif
            </div>
        </div>
        <div data-v-5a8252ec="" class="home view">
            <div data-v-5a8252ec="" class="content">
                <div data-v-5a8252ec="">
                    <div data-v-5a8252ec="" class="banner">
                        <div data-v-5a8252ec="" class="md-swiper">
                            <div class="md-swiper-box">
                                {{--<div class="swiper-container">
                                    <div data-v-5a8252ec="" class="md-swiper-item">
                                        <div data-v-5a8252ec="" class="banner-item" style="">
                                            <img data-v-5a8252ec="" src="{{ asset('/wap/theme3/images/oxx_a_1548527884.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>--}}
                                <div class="md-swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($banners as $item)
                                        <div class="swiper-slide banner-item">
                                            <a target="_blank" href="{{$item->jumpurl}}">
                                                <img width="100%" src="{{ $item->path }}" alt="">
                                            </a>
                                        </div>
                                        @endforeach

                                </div>
                            </div>

                            <!---->
                        </div>
                    </div>
                    <div data-v-5a8252ec="" class="my-notice van-notice-bar" style="">
                        <div class="van-notice-bar__left-icon">
                            <img src="{{ asset('/wap/theme3/images/noice.png') }}">
                        </div>
                        <div class="">
                            <div class="swiper-container notice-swiper" style="">
                                <ul class="swiper-wrapper" id="noticeSiper" style=""></ul>
                            </div>
                        </div>
                        <!---->
                    </div>
                    @if($_system_config->is_hongbao ==1)
                        <div style="padding: 10px;">
                            <a target="_blank" href="{{route('wap.red')}}">
                                <img style="border-radius: 8px;width: 100%" src="{{asset('wap/images/hongbao/qiang.jpg')}}">
                            </a>
                        </div>
                    @endif
                </div>
                <div data-v-5a8252ec="" class="scroll">
                    <div data-v-5a8252ec="" clearfix="">
                        <div data-v-2d10ac7a="" data-v-5a8252ec="" class="grid">
                            <div data-v-2d10ac7a="" rows="4" clearfix="" class="nav-top">
                                <div data-v-2d10ac7a="" class="nav-top-box">
                                    <div data-v-2d10ac7a="" class="nav-top-box-w" style="">
                                        <div data-v-2d10ac7a="" class="scroll-item active" onclick="GamesListShow('slot');">
                                            <img data-v-2d10ac7a="" src="{{ asset('/wap/theme3/images/dz.png') }}" alt="">
                                            <p data-v-2d10ac7a="">電子游戏</p>
                                        </div>
                                        <div data-v-2d10ac7a="" class="scroll-item" onclick="GamesListShow('live');">
                                            <img data-v-2d10ac7a="" src="{{ asset('/wap/theme3/images/vd.png') }}" alt="">
                                            <p data-v-2d10ac7a="">真人視訊</p>
                                        </div>
                                        <div data-v-2d10ac7a="" class="scroll-item" onclick="GamesListShow('sport');">
                                            <img data-v-2d10ac7a="" src="{{ asset('/wap/theme3/images/sp.png') }}" alt="">
                                            <p data-v-2d10ac7a="">體育游戏</p>
                                        </div>
                                        {{--<div data-v-2d10ac7a="" class="scroll-item" onclick="GamesListShow('lottery');">
                                            <img data-v-2d10ac7a="" src="{{ asset('/wap/theme3/images/fc.png') }}" alt="">
                                            <p data-v-2d10ac7a="">彩票游戏</p>
                                        </div>--}}
                                        <div data-v-2d10ac7a="" class="scroll-item" onclick="GamesListShow('chess');">
                                            <img data-v-2d10ac7a="" src="{{ asset('/wap/theme3/images/qp.png') }}" alt="">
                                            <p data-v-2d10ac7a="">棋牌游戏</p>
                                        </div>
                                        <div data-v-2d10ac7a="" class="scroll-item" onclick="GamesListShow('competition');">
                                            <img data-v-2d10ac7a="" src="{{ asset('/wap/theme3/images/fc.png') }}" alt="">
                                            <p data-v-2d10ac7a="">彩票游戏</p>
                                        </div>
                                        <div data-v-2d10ac7a="" class="scroll-item" onclick="GamesListShow('fish');">
                                            <img data-v-2d10ac7a="" src="{{ asset('/wap/theme3/images/fish.png') }}" alt="">
                                            <p data-v-2d10ac7a="">捕魚达人</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div data-v-2d10ac7a="" clearfix="" class="nav-body" style="">
                                <div data-v-2d10ac7a="" class="nav-body-title" id="Gametype">電子游戏</div>

                                <div data-v-2d10ac7a="" style="display:none;" class="GamesList" id="Indexsport">
                                    <?php
                                    $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                                    ?>
                                        @foreach($sports as $k => $v)
                                    <div data-v-2d10ac7a="" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！',1); @endif" platformcode="AG" gametype="" relative="" class="game-box">
                                        <div data-v-2d10ac7a="" class="border-top sub-hot sub-new"></div>
                                        <div data-v-2d10ac7a="" class="game-box-content">
                                            <div data-v-2d10ac7a="">
                                                <?php
                                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                    $v['img'] = $img;
                                                ?>
                                                <img data-v-2d10ac7a="" src="{{ asset($v['img']) }}" alt="" class=""></div>
                                            <p data-v-2d10ac7a="">{{$v['name']}}</p>
                                        </div>
                                    </div>
                                        @endforeach
                                </div>

                                <div data-v-2d10ac7a="" style="display:none;" class="GamesList" id="Indexlive">
                                    <?php
                                    $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                                    ?>
                                        @foreach($live as $k => $v)
                                    <div data-v-2d10ac7a="" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！',1); @endif" platformcode="AG" gametype="" relative="" class="game-box">
                                        <div data-v-2d10ac7a="" class="border-top sub-hot sub-new"></div>
                                        <div data-v-2d10ac7a="" class="game-box-content">
                                            <div data-v-2d10ac7a="">
                                                <?php
                                                $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                $v['img'] = $img;
                                                ?>
                                                <img data-v-2d10ac7a="" src="{{ asset($img) }}" alt="" class=""></div>
                                            <p data-v-2d10ac7a="">{{ $v['name'] }}</p>
                                        </div>
                                    </div>
                                        @endforeach
                                </div>
                                <div data-v-2d10ac7a="" style="display:none;" class="GamesList" id="Indexchess">
                                    <?php
                                    $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                                    ?>
                                        @foreach($poker as $k => $v)
                                    <div data-v-2d10ac7a="" onclick=" window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); " platformcode="MW" gametype="" relative="" class="game-box">
                                        <div data-v-2d10ac7a="" class="border-top  "></div>
                                        <div data-v-2d10ac7a="" class="game-box-content">
                                            <div data-v-2d10ac7a="">
                                                <?php
                                                $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                $v['img'] = $img;
                                                ?>
                                                <img data-v-2d10ac7a="" src="{{ asset($img) }}" alt="" class=""></div>
                                            <p data-v-2d10ac7a="">{{ $v['name'] }}</p>
                                        </div>
                                    </div>
                                        @endforeach
                                </div>
                                <div data-v-2d10ac7a="" class="GamesList" id="Indexslot">
                                    <?php
                                    $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                                    ?>
                                        @foreach($slot as $k => $v)
                                    <div data-v-2d10ac7a="" onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1','_blank')" platformcode="AG" gametype="" relative="" class="game-box">
                                        <div data-v-2d10ac7a="" class="border-top sub-hot sub-new"></div>
                                        <div data-v-2d10ac7a="" class="game-box-content">
                                            <div data-v-2d10ac7a="">
                                                <?php
                                                $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                $v['img'] = $img;
                                                ?>
                                                <img data-v-2d10ac7a="" src="{{ asset($img) }}" alt="" class=""></div>
                                            <p data-v-2d10ac7a="">{{$v['name']}}</p>
                                        </div>
                                    </div>
                                            @endforeach
                                </div>
                                <div data-v-2d10ac7a="" style="display:none;" class="GamesList" id="Indexcompetition">
                                    <?php
                                    $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                                    ?>
                                        @foreach($lottery as $k => $v)
                                    <div data-v-2d10ac7a="" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&game_code={{$v['game_code']}}&devices=1'); @else notify('请先登录游戏！',1); @endif" platformcode="AVIA" gametype="" relative="" class="game-box"> <div data-v-2d10ac7a="" class="border-top  "></div>
                                        <div data-v-2d10ac7a="" class="game-box-content">
                                            <div data-v-2d10ac7a="">
                                                <?php
                                                $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                $v['img'] = $img;
                                                ?>
                                                <img data-v-2d10ac7a="" src="{{ $img }}" alt=""></div>
                                            <p data-v-2d10ac7a="">{{ $v['name'] }}</p></div>
                                    </div>
                                        @endforeach
                                    {{--<div data="" -="" v="" 2d10ac7a="" onclick="window.location.href=&#39;1&#39;" relative="" class="game-box"> <div data-v-2d10ac7a="" class="border-top"></div>
                                        <div data-v-2d10ac7a="" class="game-box-content">
                                            <div data-v-2d10ac7a="">
                                                <img data-v-2d10ac7a="" src="{{ asset('/wap/theme3/images/index/anzhuo.png') }}" alt="" class=""></div><p data-v-2d10ac7a="">安卓客户端</p></div>
                                    </div>
                                    <div data="" -="" v="" 2d10ac7a="" onclick="window.location.href=&#39;1&#39;" relative="" class="game-box">
                                        <div data-v-2d10ac7a="" class="border-top"></div> <div data-v-2d10ac7a="" class="game-box-content"><div data-v-2d10ac7a="">
                                                <img data-v-2d10ac7a="" src="{{ asset('/wap/theme3/images/index/ios.png') }}" alt="" class=""></div><p data-v-2d10ac7a="">IOS客户端</p></div>
                                    </div>--}}
                                </div>
                                <div data-v-2d10ac7a="" style="display:none;" class="GamesList" id="Indexfish">
                                    <?php
                                    $fish = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish');
                                    ?>
                                        @foreach($fish as $k => $v)
                                    <div data-v-2d10ac7a="" platformcode="AG" gametype="6" gameid="" gamename="" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&game_code={{$v['game_code']}}&devices=1'); @else notify('请先登录游戏！',1); @endif" relative="" class="game-box">
                                        <div data-v-2d10ac7a="" class="border-top"></div>
                                        <div data-v-2d10ac7a="" class="game-box-content">
                                            <div data-v-2d10ac7a="">

                                                <img data-v-2d10ac7a="" src="{{ $v['img'] }}" alt=""></div><p data-v-2d10ac7a="">{{ $v['name'] }}</p>
                                        </div>
                                    </div>
                                        @endforeach
                                </div>
                            </div>


                            {{--<div data-v-4df4ea0a="" data-v-2d10ac7a="" class="gameView" id="lotteryContent" style="display: none;">
                                <div data-v-4df4ea0a="" class="scroll clearboth swiper-container lottery-swiper swiper1 swiper-container-horizontal swiper-container-ios">
                                    <div data-v-4df4ea0a="" class="gameView-top swiper-wrapper clearboth" id="lotteryType"><div data-v-4df4ea0a="" plateform="BB" class="gameView-top-item swiper-slide active swiper-slide-active" gametype="Ltlottery" onclick="showQuickData(&#39;BB&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class="activeBorder"></span>BB彩票</div><div data-v-4df4ea0a="" plateform="YC" class="gameView-top-item swiper-slide swiper-slide-next" gametype="" onclick="showQuickData(&#39;YC&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>YC彩票</div><div data-v-4df4ea0a="" plateform="EG" class="gameView-top-item swiper-slide" gametype="" onclick="showQuickData(&#39;EG&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>EG彩票</div><div data-v-4df4ea0a="" plateform="IG" class="gameView-top-item swiper-slide" gametype="S&amp;line=1&amp;lotteryTray=C" onclick="showQuickData(&#39;IG&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>IG彩票</div><div data-v-4df4ea0a="" plateform="IGA" class="gameView-top-item swiper-slide" gametype="s&amp;gameId=10000&amp;line=10&amp;lotteryTray=C" onclick="showQuickData(&#39;IGA&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>IGA彩票</div><div data-v-4df4ea0a="" plateform="BG" class="gameView-top-item swiper-slide" gametype="CP" onclick="showQuickData(&#39;BG&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>BG彩票</div><div data-v-4df4ea0a="" plateform="VR" class="gameView-top-item swiper-slide" gametype="&amp;Odds=1980" onclick="showQuickData(&#39;VR&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>VR彩票</div><div data-v-4df4ea0a="" plateform="LB" class="gameView-top-item swiper-slide" gametype="" onclick="showQuickData(&#39;LB&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>LB彩票</div><div data-v-4df4ea0a="" plateform="ELOTTO" class="gameView-top-item swiper-slide" gametype="&amp;Odds=1980_1700" onclick="showQuickData(&#39;ELOTTO&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>ELOTTO彩票</div><div data-v-4df4ea0a="" plateform="GLI" class="gameView-top-item swiper-slide" gametype="" onclick="showQuickData(&#39;GLI&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>世彩彩票</div><div data-v-4df4ea0a="" plateform="CB" class="gameView-top-item swiper-slide" gametype="" onclick="showQuickData(&#39;CB&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>彩播彩票</div><div data-v-4df4ea0a="" plateform="CFXY" class="gameView-top-item swiper-slide" gametype="" onclick="showQuickData(&#39;CFXY&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>预言家彩票</div><div data-v-4df4ea0a="" plateform="CFXC" class="gameView-top-item swiper-slide" gametype="" onclick="showQuickData(&#39;CFXC&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>猜涨跌彩票</div><div data-v-4df4ea0a="" plateform="FH" class="gameView-top-item swiper-slide" gametype="" onclick="showQuickData(&#39;FH&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>凤凰彩票</div><div data-v-4df4ea0a="" plateform="YGCP" class="gameView-top-item swiper-slide" gametype="" onclick="showQuickData(&#39;YGCP&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>YG彩票</div><div data-v-4df4ea0a="" plateform="GGCP" class="gameView-top-item swiper-slide" gametype="amp;odds=1920" onclick="showQuickData(&#39;GGCP&#39;)" style="width: 88.5px; margin-right: 20px;"><span data-v-4df4ea0a="" center="" class=""></span>GGCP彩票</div></div>

                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                                <div data-v-4df4ea0a="" class="gameView-content" style="">
                                    <div data-v-4df4ea0a="" class="grid" id="lotterList"><div data-v-4df4ea0a="" class="game-box" platformcode="BB" gametype="Ltlottery" gameid="undefined" onclick="return landing(this);"><div data-v-4df4ea0a="" class="border-top"></div><div data-v-4df4ea0a="" class="game-box-content"><img data-v-4df4ea0a="" src="./1_files/BB(1).png" alt="" class=""> <p data-v-4df4ea0a="">BB彩票大厅</p></div> </div><div data-v-4df4ea0a="" class="game-box" onclick="window.location.href=&#39;1&#39;"><div data-v-4df4ea0a="" class="border-top"></div><div data-v-4df4ea0a="" class="game-box-content"><img data-v-4df4ea0a="" src="./1_files/anzhuo.png" alt="" class=""> <p data-v-4df4ea0a="">安卓客户端</p></div> </div><div data-v-4df4ea0a="" class="game-box" onclick="window.location.href=&#39;1&#39;"><div data-v-4df4ea0a="" class="border-top"></div><div data-v-4df4ea0a="" class="game-box-content"><img data-v-4df4ea0a="" src="./1_files/ios.png" alt="" class=""> <p data-v-4df4ea0a="">IOS客户端</p></div> </div></div>
                                </div>
                            </div>
--}}
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
                <h3>获得红包<b id="luckHongBao"></b>元</h3>
            </div>
        </div>
        <!--广告弹框-->
        <div class="advert-opcity" id="indexDialog" onclick="$(&#39;#indexDialog&#39;).hide()" style="display: none;">
            <div class="advert-content">
                <h3 id="dialogTitle">活动107</h3>
                <img src="./1_files/hoti20190902022648382.png" id="dialogImg">
                <h3 onclick="$(&#39;#indexDialog&#39;).hide()">关闭</h3>
            </div>
        </div>
        <input type="hidden" value="0" id="hbCount">
    </main>
    <script>
        //getGamePlate(1, 'slot');
        $(function () {
            swiperLoad();

            biCommon.getNotices(1);
            // biCommon.getUserHongBaoCount();
            //biCommon.getDialogContent();
            //弹窗
            @if($_system_config->is_alert_on == 0)
                $('#indexDialog').hide();
                $('#indexDialog').css({ "display": "flex" });
                $("#dialogImg").attr("src", "{{ $_system_config->alert_img }}");
                $("#dialogTitle").html('消息');
            @endif
            $("div.nav-top-box-w div[data-v-2d10ac7a]").click(function () {
                $(this).parent().children().removeClass("active");
                $(this).addClass("active");
            })

            $("#app .view").click(function () {
                if ($(".slideout-panel-left").hasClass("removeR")) {
                    $(".slideout-panel-left").addClass("removeL");
                    $(".slideout-panel-left").removeClass("removeR");
                }
            })
            @if (!Auth::guard('member')->guest())
                @if($_member->is_trans_on == 1)
                $(function () {
                    $.ajax({
                        type:'post',
                        url : "{{route('member.api.wallet_balance')}}",
                        dataType : 'json',
                        success : function (data) {
                            //console.log(data);
                            if(data.statusCode == '01'){
                                var all = Number($('.money').text()) + Number(data.data);
                                $('.money').text('');
                                $('.money').text(parseInt(all.toFixed(2)));
                            }
                        }
                    })
                })
                @endif
            @endif
        });
    </script>
@endsection



