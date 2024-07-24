@extends('wap.template.theme8.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme8/css/sweet-alert.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme8/css/loadAnimation.css') }}" rel="stylesheet" />
    <link href="{{ asset('wap/theme8/css/BIstyle.css') }}" rel="stylesheet" />
    <!-- 主页面标题 -->
    <header class="mui-bar mui-bar-nav">
        <a data-rel='{"target":"leftMenu","opType":"function"}' class="mui-icon mui-action-menu mui-icon-bars mui-pull-left"></a>

        @if (!Auth::guard('member')->guest())
            <div class="login-info">
                <div class="user_name">{{ $_member -> name }}</div>
                <div class="money UserAmountController">{{ $_member -> money }}</div>
            </div>
            {{--<div class="user_money_info" id="_login_info_data">
                <div class="money-shadow"></div>
                <div class="ex">
                    <div class="top_part">
                        <div class="total_asset">
                            <span class="asset_txt">总资产</span>
                            <span class="asset_num bar-asset UserAmountController"></span>
                        </div>
                    </div>
                    <!--中间滚动部分-->
                    <ul class="central_scroll" id="api-balance"></ul>
                    <!--底部按钮-->
                    <div class="btn_group">
                        <a id="recovery" class="one_key_recycle" warning="正在转出..." onclick="yijianzhuanchu(this,1)" show="一键转出" value="一键转出">一键回收</a>
                        <a data-rel='{"opType":"href","target":"@Url.Action("deposit", "Index")"}' class="saving_money">存款</a>
                    </div>
                </div>

            </div>--}}
            @else
            <div id="notLogin">
                <a data-rel='{"target":"{{ route('wap.register') }}","opType":"href"}' class="mui-btn mui-btn-success mui-pull-right btn-register">注册</a>
                <a data-rel='{"target":"{{ route('wap.login') }}","opType":"href"}' class="mui-btn mui-btn-success mui-pull-right btn-login">登录</a>
            </div>
            @endif

            <img src="{{ $_system_config->m_site_logo }}" alt="logo" class="logo">
    </header><!-- 主界面具体展示内容 -->
    <div class="mui-content home-content">
        <!--易记域名-->
        <section class="yjym">
            主页域名：
            <span id="host"></span>
        </section>
        <!--轮播和公告-->
        <section class="mui-slider banner-slide">
            {{--<div class="banner-ads">
                更多精彩游戏，请下载手机app!
                <a data-rel='{"target":"downLoadApp","opType":"function"}' class="btn-download">立即下载</a>
                <div data-rel='{"target":"closeDownLoad","opType":"function"}' class="close-slide"></div>
            </div>--}}
            <div class="mui-slider-group mui-slider-loop">
                @foreach($banners as $item)
                    @if($loop->last)
                <div class="mui-slider-item mui-slider-item-duplicate">
                    <a href="{{ $item->jumpurl }}" target="_blank">
                        <img src="{{ $item->path }}" />
                    </a>
                </div>
                    @endif
                @endforeach
                    @foreach($banners as $item)
                <div class="mui-slider-item">
                    <a href="{{ $item->jumpurl }}" target="_blank">
                        <img src="{{ $item->path }}" />
                    </a>
                </div>
                    @endforeach
                    @foreach($banners as $item)
                        @if($loop->first)
                <div class="mui-slider-item mui-slider-item-duplicate">
                    <a href="{{ $item->jumpurl }}" target="_blank">
                        <img src="{{ $item->path }}" />
                    </a>
                </div>
                        @endif
                    @endforeach
            </div>
        </section>
        <section class="notice" style="position:relative">
            <button type="button" class="mui-btn mui-btn-primary btn-title">公告</button>
            <div class="marquee-wrap swiper-container notice-swiper">
                <ul class="swiper-wrapper" id="noticeSiper">
                </ul>
            </div>
        </section>
        <section class="nav">
            <div class="swiper-container nav-slide-indicators">
                <div class="swiper-wrapper">
                    <a name="apiType_live" data-rel='{"target":"slideHeight","opType":"function"}'
                       class="swiper-slide item-live"><span>真人</span></a>
                    <a name="apiType_casino" data-rel='{"target":"slideHeight","opType":"function"}'
                       class="swiper-slide item-casino"><span>電子</span></a>
                    <a name="apiType_sports" data-rel='{"target":"slideHeight","opType":"function"}'
                       class="swiper-slide item-sports mui-active"><span>體育</span></a>
                    <a name="apiType_lottery" data-rel='{"target":"slideHeight","opType":"function"}'
                       class="swiper-slide item-lottery"><span>彩票</span></a>
                    <a name="apiType_chess-and-card" data-rel='{"target":"slideHeight","opType":"function"}'
                       class="swiper-slide item-chess-and-card"><span>棋牌</span></a>
                    <a name="apiType_fish" data-rel='{"target":"slideHeight","opType":"function"}'
                       class="swiper-slide item-fish"><span>捕魚</span></a>
                    {{--<a name="apiType_competition" data-rel='{"target":"slideHeight","opType":"function"}'
                       class="swiper-slide item-competition"><span>电竞</span></a>--}}
                    <input type="hidden" value="6" id="apiTypeLength" />
                </div>
            </div>
        </section>
        <div class="swiper-container nav-slide-content api-grid level_2_api_nav">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide-live">
                    <ul class="mui-table-view mui-grid-view mui-grid-9 active" id="indexLive">
                        <?php
                        $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                        ?>
                        @foreach($live as $k => $v)
                        <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                            <a onclick="if( checkLogin() ){ window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); }else{ notify('请先登录游戏！');}">
                                <span class="api-item api-icon-1-10 site953">
                                    <?php
                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                    $v['img'] = $img;
                                    ?>
                                    <img src="{{ $img }}">
                                </span>
                                <div class="mui-media-body">{{ $v['name'] }}</div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="swiper-slide slide-casino">
                    <ul class="mui-table-view mui-grid-view mui-grid-9 active" id="indexSlot">
                        <?php
                        $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                        ?>
                        @foreach($slot as $k => $v)
                            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                                <a onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1');">
                                <span class="api-item api-icon-1-10 site953">
                                    <?php
                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                    $v['img'] = $img;
                                    ?>
                                    <img src="{{ $img }}">
                                </span>
                                    <div class="mui-media-body">{{ $v['name'] }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="swiper-slide slide-sports">
                    <ul class="mui-table-view mui-grid-view mui-grid-9 active" id="indexSport">
                        <?php
                        $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                        ?>
                        @foreach($sports as $k => $v)
                            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                                <a onclick="if( checkLogin() ){ window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); }else{ notify('请先登录游戏！');}">
                                <span class="api-item api-icon-1-10 site953">
                                    <?php
                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                    $v['img'] = $img;
                                    ?>
                                    <img src="{{ $img }}">
                                </span>
                                    <div class="mui-media-body">{{ $v['name'] }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="swiper-slide slide-lottery">
                    <ul class="mui-table-view mui-grid-view mui-grid-9 active" id="indexSport">
                        <?php
                        $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                        ?>
                        @foreach($lottery as $k => $v)
                            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                                <a onclick="if( checkLogin() ){ window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); }else{ notify('请先登录游戏！');}">
                                <span class="api-item api-icon-1-10 site953">
                                    <?php
                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                    $v['img'] = $img;
                                    ?>
                                    <img src="{{ $img }}">
                                </span>
                                    <div class="mui-media-body">{{ $v['name'] }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    {{--<ul class="mui-table-view mui-grid-view mui-grid-9 active">

                        <div class="lottery-nav" name="nav-4" style="width:100%;height:40px">
                            <div class="mui-scroll swiper-container lottery_nav_api" style="width:100%;height:40px">
                                <ul class="mui-list-unstyled mui-clearfix swiper-wrapper" id="indexLottery" style="height:40px;"></ul>
                            </div>

                        </div>
                        <div class="lottery-content" name="nav-content-4">
                            <div id="lotteryList" class="mui-active lotteryList"></div>
                        </div>
                    </ul>--}}
                </div>
                <div class="swiper-slide slide-chess">
                    <ul class="mui-table-view mui-grid-view mui-grid-9 active" id="indexChess">
                        <?php
                        $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                        ?>
                        @foreach($poker as $k => $v)
                            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                                <a onclick="if( checkLogin() ){ window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); }else{ notify('请先登录游戏！');}">
                                <span class="api-item api-icon-1-10 site953">
                                    <?php
                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                    $v['img'] = $img;
                                    ?>
                                    <img src="{{ $img }}">
                                </span>
                                    <div class="mui-media-body">{{ $v['name'] }}</div>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="swiper-slide slide-fish">
                    <ul class="mui-table-view mui-grid-view mui-grid-9 active" id="indexFish">
                        <?php
                        $fish = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish');
                        ?>
                        @foreach($fish as $k => $v)
                            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                                <a onclick="if( checkLogin() ){ window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); }else{ notify('请先登录游戏！');}">
                                <span class="api-item api-icon-1-10 site953">
                                    <img src="{{ $v['img'] }}">
                                </span>
                                    <div class="mui-media-body">{{ $v['name'] }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                {{--<div class="swiper-slide slide-competition">
                    <ul class="mui-table-view mui-grid-view mui-grid-9 active" id="indexCompetition"></ul>
                </div>--}}

            </div>
        </div>

    </div>  <!--mui-content 闭合标签-->

    <div class="mui-off-canvas-wrap index-canvas-wrap">
        <div class="mui-icon mui-icon-closeempty"></div>
        <!-- 菜单容器 -->
        <aside class="mui-off-canvas-left">
            <div class="mui-scroll-wrapper side-menu-scroll-wrapper">
                <div class="mui-scroll">
                    <!-- 菜单具体展示内容 -->
                    <!--个人信息部分-->
                    <div class="person-info">

                    @if (!Auth::guard('member')->guest())
                            <!--登陆后-->
                            <div class="login">
                                <i class="icon-person"></i>
                                <p></p>
                                <a data-rel='{"target":"{{ route('wap.nav') }}","opType":"href"}' type="button" class="mui-btn mui-btn-success  btn-person">个人中心</a>
                            </div>
                        @else
                            <!--登录前-->
                            <div class="un-login">
                                <p>欢迎光临，请先登录</p>
                                <button data-rel='{"target":"{{ route('wap.login') }}","opType":"href"}' class="mui-btn mui-btn-success btn-login">用户登录</button>
                            </div>
                    @endif

                    </div>
                    <!--side-nav-->
                    <div class="side-nav">
                        <ul class="mui-list-unstyled">
                            <li class="home active">
                                <a data-rel='{"target":"{{ route('wap.index') }}","opType":"href"}'>首页</a>
                            </li>
                            @if (!Auth::guard('member')->guest())
                                <li class="question">
                                    <a data-rel='{"opType":"href","target":"{{ route('wap.game_record') }}"}'>投注记录</a>
                                </li>
                                <li class="reg_rules ">
                                    <a data-rel='{"opType":"href","target":"{{ route('wap.transfer_record') }}"}'>额度转换记录</a>
                                </li>
                                <li class="about " id="mailbox">
                                    <a data-rel='{"target":"{{ route('wap.msg') }}","opType":"href"}'>消息中心</a>
                                    <b></b>
                                </li>
                                <li class="about ">
                                    <a data-rel='{"target":"{{ route('wap.agent') }}","opType":"href"}'>代理中心</a>
                                </li>
                                <li class="pc">
                                    <a data-rel='{"target":"{{ route('wap.activity_list') }}","opType":"href"}'>优惠申请</a>
                                </li>
                            @endif
                                {{--<li class="download">
                                    <a data-rel='{"target":"downLoadApp","opType":"function"}'>下载客户端</a>
                                </li>
                                <li class=" lang zh-CN">
                                    <a href="">语言</a>
                                </li>--}}
                        </ul>
                        @if (!Auth::guard('member')->guest())
                            <a href="javascript:;" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="mui-btn mui-btn-success btn-logout">退出登录</a>
                            <form id="logout-form" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <!--语言弹窗-->
        </aside>
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
    <!--消息弹窗-->
    <script src="{{ asset('/wap/theme8/js/mui.lazyload.js') }}"></script>
    <script src="{{ asset('/wap/theme8/js/mui.lazyload.img.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme8/js/Head.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme8/js/jquery.marquee.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme8/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme8/js/Index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme8/js/Menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme8/js/GoGame.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme8/js/Envelope.js') }}"></script>
    <script>
        function checkLogin() {
            <?php if($_member): ?>
                return true;
            <?php else: ?>
            notify("请先登录游戏！");
            return false;
            <?php endif; ?>
        }
        //首页页面游戏切换
        swiper();
        //biCommon.getUserHongBaoCount();
        biCommon.getNotices(1);
        getHost($("#host"));
        //getGamePlate(1);
        //biCommon.getUserMoneys();
        //biCommon.getDialogContent();
        //弹窗

        @if($_system_config->is_alert_on == 0)
            $('#indexDialog').hide();
            $('#indexDialog').css({ "display": "flex" });
            $("#dialogImg").attr("src", "{{ $_system_config->alert_img }}");
            $("#dialogTitle").html('消息');
        @endif
        setInterval(function () {
            $('.mui-content>.swiper-container>.swiper-wrapper').css({ "height": "100%" })
            var he = $('.mui-content>.swiper-container>.swiper-wrapper>.swiper-slide-active').height();
            $('.mui-content>.swiper-container').css({ "height": he })
        }, 500)
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
                        }
                    }
                })
                @endif
            @endif
        })
    </script>

@endsection
