<style>
    .leftLogo {
        padding-top: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgb(1, 44, 31);
    }
    .DraweBox .navHeader .leftbox {
        flex: 0.5 1 0%;
        padding-top: 10px;
        border-right: 1px solid rgb(1, 44, 31);
    }
    .DraweBox .navHeader .rightbox {
        flex: 0.5 1 0%;
        padding-top: 10px;
        border-left-width: 1px;
        border-color: rgb(1, 44, 31);
    }
    .DraweBox .rightusermoney {
        text-align: right;
        color: rgb(254, 234, 171);
        font-weight: bold;
    }
    .DraweBox .leftusername .userNameController {
        text-align: left;
        color: rgb(255, 255, 255);
    }
    .DraweBox .buttonB div p{
        text-align: center;
        color: rgb(255, 255, 255);
        font-weight: bold;
    }
    .DraweBox .am-flexbox .am-androidUrl {
        flex: 0.5 1 0%;
        border-right: 1px solid rgb(1, 44, 31);
    }
    .DraweBox .am-flexbox .am-keful {
        flex: 0.5 1 0%;
        border-left-width: 1px;
        border-color: rgb(1, 44, 31);
    }
</style>
<div class="my-drawer am-drawer am-drawer-left am-openbars" id="open">
    <div class="am-drawer-sidebar" id="open1">
        <div class="DraweBox">
            <!-- react-empty: 3711 -->
            <div class="am-flexbox am-flexbox-justify-center am-flexbox-align-middle leftLogo" style="">
                <img src="{{ $_system_config -> site_logo }}" style="width: 42%;">
            </div>

            @if (Auth::guard('member')->guest())
                <div class="am-flexbox am-flexbox-align-middle navHeader">
                    <div class="am-flexbox-item leftbox" style="">
                        <div class="button">
                            <p class="fontText"> <a class="fontText" href="{{ route('wap.login') }}">登录</a></p>

                        </div>
                    </div>
                    <div class="am-flexbox-item rightbox" style="">
                        <div class="button">
                            <p class="fontText"><a class="fontText" href="{{ route('wap.register') }}">免费开户</a></p>
                        </div>
                    </div>
                </div>
            @else
                <div>
                    <div class="am-flexbox am-flexbox-align-middle navHeader">
                        <div class="am-flexbox-item leftusername">
                            <p style="" class="userNameController">
                                {{ $_member -> name }}
                            </p>
                        </div>
                        <div class="am-flexbox-item">
                            <div class="button">
                                <p class="rightusermoney UserAmountController money" style="" >
                                    {{ $_member -> money }}
                                </p>
                            </div>
                        </div>
                        {{--<div class="am-flexbox-item userReload">
                            <div class="button">
                                <div style="padding-left: 10px; padding-top: 5px;"><img src="~/Areas/Wap8/Content/images/main/icon_lib_refresh1.png" style="width: 20px;" onclick="yijianzhuanchu(this,2)"></div>
                            </div>
                        </div>--}}
                    </div>
                    <div class="am-flexbox am-flexbox-align-middle">
                        <div class="am-flexbox-item buttonB" onclick="window.location.href='{{ route('wap.recharge') }}'">
                            <div>
                                <p style="">充值</p>
                            </div>
                        </div>
                        <div class="am-flexbox-item buttonB" onclick="window.location.href='{{ route('wap.drawing') }}'">
                            <div>
                                <p style="">取款</p>
                            </div>
                        </div>
                        <div class="am-flexbox-item buttonB" onclick="window.location.href='{{ route('wap.transfer') }}'">
                            <div>
                                <p style="">转账</p>
                            </div>
                        </div>
                        {{--<div class="am-flexbox-item buttonB" onclick="window.location.href='{{ route('wap.recharge_record') }}'" style="border: 0px;">
                            <div>
                                <p style="">交易记录</p>
                            </div>
                        </div>--}}
                    </div>
                </div>

            @endif
            <div class="am-accordion my-accordion">
                <div class="am-accordion-item" role="tablist" onclick="OpenOrClose('sport1',this)">
                    <div class="am-accordion-header" role="tab" aria-expanded="false">
                        <i class="arrow"></i>
                        體育
                    </div>
                    <div class="am-accordion-content am-accordion-content-active" id="sport1" role="tabpanel" style="display:none;">

                        <div class="am-accordion-content-box">
                            <div class="am-list drawerB">
                                <div class="am-list-body" id="indexSport">
                                    <?php
                                    $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                                    ?>
                                        @foreach($sports as $k => $v)
                                    <div class="drawer-Line am-list-item am-list-item-middle"
                                         onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！',1); @endif">
                                        <div class="am-list-line">
                                            <div class="am-list-content">{{ $v['name'] }}</div>
                                        </div>
                                    </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-accordion-item" role="tablist" onclick="OpenOrClose('competition1', this);">
                    <div class="am-accordion-header" role="tab" aria-expanded="false">
                        <i class="arrow"></i>
                        彩票
                    </div>
                    <div class="am-accordion-content am-accordion-content-active" id="competition1" role="tabpanel" style="display:none;">

                        <div class="am-accordion-content-box">
                            <div class="am-list drawerB">
                                <div class="am-list-body" id="indexCompetition">
                                    <?php
                                    $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                                    ?>
                                    @foreach($lottery as $k => $v)
                                        <div class="drawer-Line am-list-item am-list-item-middle"
                                             onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！',1); @endif">
                                            <div class="am-list-line">
                                                <div class="am-list-content">{{ $v['name'] }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--                <span class="fontNew">新</span>--}}
                <div class="am-accordion-item" role="tablist" onclick="OpenOrClose('live1', this);">
                    <div class="am-accordion-header" role="tab" aria-expanded="false">
                        <i class="arrow"></i>
                        真人娱乐
                    </div>
                    <div class="am-accordion-content am-accordion-content-active" id="live1" role="tabpanel" style="display:none;">
                        <div class="am-accordion-content-box">
                            <div class="am-list drawerB">
                                <div class="am-list-body" id="indexLive">
                                    <?php
                                    $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                                    ?>
                                    @foreach($live as $k => $v)
                                        <div class="drawer-Line am-list-item am-list-item-middle"
                                             onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！',1); @endif">
                                            <div class="am-list-line">
                                                <div class="am-list-content">{{ $v['name'] }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="am-accordion-item" role="tablist" onclick="OpenOrClose('slot1', this);">
                    <div class="am-accordion-header" role="tab" aria-expanded="false">
                        <i class="arrow"></i>
                        <!-- react-text: 3763 -->老虎机
                        <!-- /react-text -->
                    </div>
                    <div class="am-accordion-content am-accordion-content-active" id="slot1" role="tabpanel" style="display:none;">
                        <div class="am-accordion-content-box">
                            <div class="am-list drawerB">
                                <div class="am-list-body" id="indexSlot">
                                    <?php
                                    $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                                    ?>
                                    @foreach($slot as $k => $v)
                                        <div class="drawer-Line am-list-item am-list-item-middle"
                                             onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); ">
                                            <div class="am-list-line">
                                                <div class="am-list-content">{{ $v['name'] }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="am-accordion-item" role="tablist" onclick="OpenOrClose('chess1', this);">
                    <div class="am-accordion-header" role="tab" aria-expanded="false">
                        <i class="arrow"></i>
                        棋 牌
                    </div>
                    <div class="am-accordion-content am-accordion-content-active" id="chess1" role="tabpanel" style="display:none;">
                        <div class="am-accordion-content-box">
                            <div class="am-list drawerB">
                                <div class="am-list-body" id="indexChess">
                                    <?php
                                    $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                                    ?>
                                    @foreach($poker as $k => $v)
                                        <div class="drawer-Line am-list-item am-list-item-middle"
                                             onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); ">
                                            <div class="am-list-line">
                                                <div class="am-list-content">{{ $v['name'] }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="am-accordion-item" role="tablist" onclick="OpenOrClose('fish1', this);">
                    <div class="am-accordion-header" role="tab" aria-expanded="false">
                        <i class="arrow"></i>
                        <!-- react-text: 3774 -->捕魚游戏
                        <!-- /react-text -->
                    </div>
                    <div class="am-accordion-content am-accordion-content-active" id="fish1" role="tabpanel" style="display:none;">
                        <div class="am-accordion-content-box">
                            <div class="am-list drawerB">
                                <div class="am-list-body" id="indexFishleft">
                                    <?php
                                    $fish = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish');
                                    ?>
                                    @foreach($fish as $k => $v)
                                        <div class="drawer-Line am-list-item am-list-item-middle"
                                             onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！',1); @endif">
                                            <div class="am-list-line">
                                                <div class="am-list-content">{{ $v['name'] }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-accordion drawerC" onclick="window.location.href='{{ route('wap.activity_list') }}'">
                    <div class="am-accordion-body">
                        <div class="am-list-item am-list-item-middle">
                            <div class="am-list-line">
                                <div class="am-list-content"><a class="am-list-content" href="{{ route('wap.activity_list') }}">优惠活动</a></div>
                            </div>
                            <div class="am-list-ripple" style="display: none;"></div>
                        </div>
                    </div>
                </div>
                @if (!Auth::guard('member')->guest())
                    <div class="am-accordion drawerC" onclick="window.location.href='{{ route('wap.game_record') }}'">
                        <div class="am-accordion-body">
                            <div class="am-list-item am-list-item-middle">
                                <div class="am-list-line">
                                    <div class="am-list-content"><a class="am-list-content" href="{{ route('wap.game_record') }}">投注记录</a></div>
                                </div>
                                <div class="am-list-ripple" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                    @if($_system_config -> is_fs == 1)
                        <div class="am-accordion drawerC" onclick="window.location.href='{{ route('wap.user_fs') }}'">
                            <div class="am-accordion-body">
                                <div class="am-list-item am-list-item-middle">
                                    <div class="am-list-line">
                                        <div class="am-list-content"><a class="am-list-content" href="{{ route('wap.user_fs') }}">反水详情</a></div>
                                    </div>
                                    <div class="am-list-ripple" style="display: none;"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>

            <div class="am-flexbox am-flexbox-align-middle navHeader">
                {{--<div class="am-flexbox-item am-androidUrl" style="">
                    <div class="button" style="text-align: center;">
                        <a href="" target="_blank" class="fontText androidUrL">
                            <i class="icon iconfont icon-icon_lib_2"></i>
                            <!-- react-text: 3812 -->下载APP
                            <!-- /react-text -->
                        </a>
                    </div>
                </div>--}}
                <div class="am-flexbox-item am-keful" style="">
                    <div class="button" onclick="window.location.href='{{ $_system_config -> service_link }}'">
                        <p class="fontText">
                            <i class="icon iconfont icon-icon_lib_livechat"></i>
                            <!-- react-text: 3817 -->在线客服
                            <!-- /react-text -->
                        </p>
                    </div>
                </div>
            </div>
            @if (! Auth::guard('member')->guest())
                <div class="am-flexbox am-flexbox-justify-center am-flexbox-align-middle navHeader2">
                    <div class="am-flexbox-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <div class="button">
                            <p class="fontText">退出</p>
                        </div>
                    </div>
                </div>
                <form id="logout-form" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
            </div>

    </div>
    <div class="am-drawer-overlay" role="presentation" id="open2" onclick="Closetoolbar();"></div>
    <div class="am-drawer-content" style="color: rgb(166, 166, 166); text-align: center; padding-top: 42px;">
        <div class="am-drawer-draghandle"></div>
    </div>

</div>
<script>
    $(function () {
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
                        $('.recharge-money').text(parseInt(all.toFixed(2)));
                        $('.transfer-money').text(parseInt(all.toFixed(2)));
                        $('.nav-money').text(parseInt(all.toFixed(2)));
                    }
                }
            })
            @endif
        @endif
    })
</script>
