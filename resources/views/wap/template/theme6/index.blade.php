@extends('wap.template.theme6.layouts.main')
@section('content')


    <link href="{{ asset('/wap/theme6/css/swiper.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('/wap/theme6/js/swiper.min.js') }}"></script>
    <link href="{{ asset('/wap/theme6/css/sweet-alert.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme6/css/loadAnimation.css') }}" rel="stylesheet" />
    <div class="mui-content" style="display: block;height:100%">
        <div id="offCanvasWrapper" class="mui-off-canvas-wrap mui-draggable">
            <!--侧滑菜单部分-->
            <aside id="offCanvasSide" class="mui-off-canvas-left">
                <div id="offCanvasSideScroll" class="mui-scroll-wrapper">
                    <div class="mui-scroll">
                        <div class="title">导航</div>
                        <ul class="mui-table-view mui-table-view-chevron mui-table-view-inverted" id="leftList">
                            <li class="mui-table-view-cell"><a class="mui-navigate-right" type="slot">電子游戏</a></li>
                            <li class="mui-table-view-cell"><a class="mui-navigate-right" type="live">真人視訊</a></li>
                            <li class="mui-table-view-cell"><a class="mui-navigate-right" type="fish" url="{{ route('wap.index_py') }}">捕魚游戏</a></li>
                            <li class="mui-table-view-cell"><a class="mui-navigate-right" type="lottery">彩票游戏</a></li>
                            <li class="mui-table-view-cell"><a class="mui-navigate-right" type="sports">體育竞技</a></li>
                            <li class="mui-table-view-cell"><a class="mui-navigate-right" type="poker">棋牌游戏</a></li>
                            <li class="mui-table-view-cell"><a class="mui-navigate-right" type="youhui" url="{{ route('wap.activity_list') }}">优惠活动</a></li>
                        </ul>
                        @if (!Auth::guard('member')->guest())
                            <button class="mui-btn mui-btn-danger index-exit" data-loading-icon onclick="event.preventDefault();document.getElementById('logout-form').submit();">退 出</button>
                            <form id="logout-form" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    </div>
                </div>
            </aside>
            <div class="mui-inner-wrap" style="background:#ececec">
                <header class="mui-bar mui-bar-nav">
                    <a href="#offCanvasSide" class="mui-icon mui-action-menu mui-icon-bars mui-pull-left"></a>
                    @if (Auth::guard('member')->guest())
                        <a class="mui-btn mui-btn-link mui-pull-right" id="login" url="{{ route('wap.login') }}">
                            登陆<i class="mui-icon mui-icon-contact"></i>
                        </a>
                        <a class="mui-btn mui-btn-link mui-pull-right" id="reg" url="{{ route('wap.register') }}">
                            注册<i class="mui-icon mui-icon-contact"></i>
                        </a>
                        <input type="hidden" id="user" />
                        @else
                        <input type="hidden" id="reg" />
                        <input type="hidden" id="login" />
                        <a class="mui-btn mui-btn-link mui-pull-right" id="user" url="{{ route('wap.nav') }}">
                            <span>{{ $_member -> name }}</span>
                            <i class="mui-icon mui-icon-contact"></i>
                            <span class="UserAmountController money">{{ $_member -> money}}</span>
                        </a>
                    @endif
                        <h1 class="mui-title">
                            <img style="width: 50%" src="{{ $_system_config->m_site_logo }}">
                        </h1>
                </header>
                <div id="offCanvasContentScroll" class="mui-content mui-scroll-wrapper" style="display: block;">
                    <div class="mui-scroll">
                        <div class="mui-slider">
                            <div class="mui-slider-group mui-slider-loop">
                                @foreach($banners as $item)
                                    @if($loop->last)
                                <div class="mui-slider-item mui-slider-item-duplicate">
                                    <img src="{{ $item->path }}" />
                                </div>
                                    @endif
                                @endforeach
                                @foreach($banners as $item)
                                <div class="mui-slider-item">
                                    <img src="{{ $item->path }}" />
                                </div>
                                @endforeach
                                    @foreach($banners as $item)
                                        @if($loop->first)
                                            <div class="mui-slider-item mui-slider-item-duplicate">
                                                <img src="{{ $item->path }}" />
                                            </div>
                                        @endif
                                    @endforeach
                            </div>
                            <div class="mui-slider-indicator">
                                @foreach($banners as $item)
                                <div class="mui-indicator @if($loop -> first)mui-active @endif"></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="index-message clearboth" >
                            <span style="float:left">公告</span>
                            <div class="marquee-wrap swiper-container notice-swiper clearboth">
                                <ul class="swiper-wrapper clearboth" id="noticeSiper"></ul>
                            </div>
                        </div>
                        @if($_system_config->is_hongbao ==1)
                            <div style="padding: 10px;">
                                <a target="_blank" href="{{route('wap.red')}}">
                                    <img style="border-radius: 8px;width: 100%" src="{{asset('wap/images/hongbao/qiang.jpg')}}">
                                </a>
                            </div>
                        @endif
                        <div class="index-grids" style="display: block;">
                            <div class="mui-row" id="gamelist">
                                <?php
                                $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                                ?>
                                    @foreach($slot as $k => $v)
                                <div class="mui-col-xs-3">
                                    <a class="mar" href="{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1">
                                        <?php
                                        $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                        $v['img'] = $img;
                                        ?>
                                        <img src="{{ $img }}" />
                                        <span>{{$v['name']}}</span>
                                    </a>
                                </div>
                                    @endforeach
                                    <?php
                                    $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                                    ?>
                                    @foreach($live as $k => $v)
                                        <div class="mui-col-xs-3">
                                            <a class="mar" href="@if($_member) {{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1 @endif">
                                                <?php
                                                $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                $v['img'] = $img;
                                                ?>
                                                <img src="{{ $img }}" />
                                                <span>{{$v['name']}}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                    <?php
                                    $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                                    ?>
                                    @foreach($lottery as $k => $v)
                                        <div class="mui-col-xs-3">
                                            <a class="mar" href="@if($_member) {{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1 @endif">
                                                <?php
                                                $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                $v['img'] = $img;
                                                ?>
                                                <img src="{{ $img }}" />
                                                <span>{{$v['name']}}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                    <?php
                                    $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                                    ?>
                                    @foreach($sports as $k => $v)
                                        <div class="mui-col-xs-3">
                                            <a class="mar" href="@if($_member) {{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1 @endif">
                                                <?php
                                                $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                $v['img'] = $img;
                                                ?>
                                                <img src="{{ $img }}" />
                                                <span>{{$v['name']}}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                    <?php
                                    $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                                    ?>
                                    @foreach($poker as $k => $v)
                                        <div class="mui-col-xs-3">
                                            <a class="mar" href="{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1">
                                                <?php
                                                $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                                $v['img'] = $img;
                                                ?>
                                                <img src="{{ $img }}" />
                                                <span>{{$v['name']}}</span>
                                            </a>
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- off-canvas backdrop -->
                    <div class="mui-off-canvas-backdrop"></div>
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
        $(function () {
            biCommon.getUserHongBaoCount();
            offCanvasWrapper();
            locationAddress();
            //getGamePlate(1);
            biCommon.getNotices(1);
            //biCommon.getDialogContent();
            @if($_system_config->is_alert_on == 0)
                $('#indexDialog').hide();
                $('#indexDialog').css({ "display": "flex" });
                $("#dialogImg").attr("src", "{{ $_system_config->alert_img }}");
                $("#dialogTitle").html('消息');
            @endif
            @if (!Auth::guard('member')->guest())
            @if($_member->is_trans_on == 1)
            $(function () {
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
            })
            @endif
            @endif
        })
        function getGame(type) {
            var uri = '{{ route('game.playGame') }}';
            var url ='';
            var str = '';
            var obj = '';
            if(type == 'slot') {
                obj  = <?php echo json_encode((new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot')) ;?>;
                for(let k in obj){
                    var url = uri + '?plat_type=' + obj[k].plat_type + '&game_type=' + obj[k].game_type +'&devices=1';
                    str += '<div class="mui-col-xs-3">' +
                        '<a class="mar" href="'+url+'">' +
                        '<img src="/wap/theme3/images/index/' + obj[k].plat_type + '.png" />' +
                        '<span>' + obj[k].name + '</span>' +
                        '</a>' +
                        '</div>';
                }
                $("#gamelist").html(str);

            }else if(type == 'live') {
                obj  = <?php echo json_encode((new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live')) ;?>;
                for(let k in obj){
                    @if($_member)
                        var url = uri + '?plat_type=' + obj[k].plat_type + '&game_type=' + obj[k].game_type +'&devices=1';
                    @endif
                    str += '<div class="mui-col-xs-3">' +
                        '<a class="mar" href="'+url+'">' +
                        '<img src="/wap/theme3/images/index/' + obj[k].plat_type + '.png" />' +
                        '<span>' + obj[k].name + '</span>' +
                        '</a>' +
                        '</div>';
                }
                $("#gamelist").html(str);
            }else if(type == 'sports') {
                obj  = <?php echo json_encode((new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports')) ;?>;
                for(let k in obj){
                            @if($_member)
                    var url = uri + '?plat_type=' + obj[k].plat_type + '&game_type=' + obj[k].game_type +'&devices=1';
                    @endif
                        str += '<div class="mui-col-xs-3">' +
                        '<a class="mar" href="'+url+'">' +
                        '<img src="/wap/theme3/images/index/' + obj[k].plat_type + '.png" />' +
                        '<span>' + obj[k].name + '</span>' +
                        '</a>' +
                        '</div>';
                }
                $("#gamelist").html(str);
            } else if(type == 'lottery') {
                obj  = <?php echo json_encode((new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery')) ;?>;
                for(let k in obj){
                            @if($_member)
                    var url = uri + '?plat_type=' + obj[k].plat_type + '&game_type=' + obj[k].game_type +'&devices=1';
                    @endif
                        str += '<div class="mui-col-xs-3">' +
                        '<a class="mar" href="'+url+'">' +
                        '<img src="/wap/theme3/images/index/' + obj[k].plat_type + '.png" />' +
                        '<span>' + obj[k].name + '</span>' +
                        '</a>' +
                        '</div>';
                }
                $("#gamelist").html(str);
            }else if(type == 'poker') {
                obj  = <?php echo json_encode((new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker')) ;?>;
                for(let k in obj){
                    var url = uri + '?plat_type=' + obj[k].plat_type + '&game_type=' + obj[k].game_type +'&devices=1';
                        str += '<div class="mui-col-xs-3">' +
                        '<a class="mar" href="'+url+'">' +
                        '<img src="/wap/theme3/images/index/' + obj[k].plat_type + '.png" />' +
                        '<span>' + obj[k].name + '</span>' +
                        '</a>' +
                        '</div>';
                }
                $("#gamelist").html(str);
            }
        }
    </script>


@endsection
