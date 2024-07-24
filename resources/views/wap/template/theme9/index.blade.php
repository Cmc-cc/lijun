@extends('wap.template.theme9.layouts.main')
@section('content')
<link href="{{ asset('/wap/theme9/css/sweet-alert.css') }}" rel="stylesheet" />
<link href="{{ asset('/wap/theme9/css/loadAnimation.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('wap/theme9/css/home.css') }}" />
<script>
    $(function () {
        //biCommon.getUserHongBaoCount();
    })
</script>
    <section id="content">
        <section id="home">
            <div id="slider">
                <div class="swiper-container swiper1">
                    <div class="swiper-wrapper">
                        @foreach($banners as $item)
                            <div class="swiper-slide" data-swiper-slide-index="0" style="width: 375px;">
                                <a href="{{ $item -> jumpurl }}"><img src="{{ $item->path }}"></a>
                            </div>
                        @endforeach
                        {{--<div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="1" style="width: 375px;"><img src="/Areas/Wap6/Content/images/main/banner2.png"></div>
                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="2" style="width: 375px;"><img src="/Areas/Wap6/Content/images/main/banner3.png"></div>
                        <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="3" style="width: 375px;"><img src="/Areas/Wap6/Content/images/main/banner4.png"></div>--}}
                    </div>
                    <div class="swiper-pagination pagination1"></div>
                </div>
            </div>
{{--                <div id="luckywheel-service" open-luckywheel="" style="display: none;"></div>--}}
                @if($_system_config->is_hongbao ==1)
                    <div style="padding: 10px;">
                        <a target="_blank" href="{{route('wap.red')}}">
                            <img style="border-radius: 8px;width: 100%" src="{{asset('wap/images/hongbao/qiang.jpg')}}">
                        </a>
                    </div>
                @endif
                <div class="navigation" home-navigation="">

                    <div class="game-tab navigation-sort">

                        <div aria-live="polite" class="draggable">
                            <div class="swiper-container swiper2" style="overflow:initial">
                                <div class="swiper-wrapper" id="indexLottery">
                                    <div class="swiper-slide active navsort-Live" type="live" onclick="getGame('live',this)">
                                        <span>真人</span>
                                    </div>
                                    <div class="swiper-slide navsort-Fish" type="fish" onclick="getGame('fish',this)">
                                        <span>捕魚</span>
                                    </div>
                                    <div class="swiper-slide navsort-Sport" type="sport" onclick="getGame('sports',this)">
                                        <span>體育</span>
                                    </div>
                                    <div class="swiper-slide navsort-Lottery" type="lottery" onclick="getGame('lottery',this)">
                                        <span>彩票</span>
                                    </div>
                                    <div class="swiper-slide navsort-Board" type="chess" onclick="getGame('poker',this)">
                                        <span>棋牌</span>
                                    </div>
                                    <div class="swiper-slide navsort-Slot" type="slot" onclick="getGame('slot',this)">
                                        <span>電子</span>
                                    </div>
                                    {{--<div class="swiper-slide navsort-Hot" type="competition" onclick="showQuickData(this,'')">
                                        <span>电竞</span>
                                    </div>--}}
                                </div>
                            </div>
                        </div>

                    </div>
                    <ul class="game-list navigation-sort ng-scope" id="indexGameList">
                        <?php
                        $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                        ?>
                            @foreach($live as $k => $v)
                        <li>
                            <a href="javascript:void (0)" onclick="@if($_member) window.location.href='{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'; @else  notify('请先登录！'); @endif">
                                <?php
                                $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                $v['img'] = $img;
                                ?>
                                <img src="{{ $img }}">
                                <span class="ng-binding">{{ $v['name'] }}</span>
                            </a>
                        </li>
                            @endforeach
                    </ul>
                </div>
    </section>
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
    var sport = "", lottery = "", live = "", slot = "", chess = "", gameTitle = "", competition = "",fish="";
    indexSwiper();
    //getGamePlate(1);
    //biCommon.getDialogContent();

    function checkLogin() {
        @if($_member)
                return  true;
            @else
                return false;
        @endif
    }
    function getGame(type,obj) {
        $("#indexLottery .swiper-slide").removeClass("active");
        $(obj).addClass('active');
        var is_login = checkLogin();
        var uri = '{{ route('game.playGame') }}';
        var url ='';
        var str = '';
        var obj = '';
        if(type == 'slot') {
            obj  = <?php echo json_encode((new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot')) ;?>;
            for(let k in obj){
                var url = uri + '?plat_type=' + obj[k].plat_type + '&game_type=' + obj[k].game_type +'&devices=1';
                str += '<li>' +
                    '<a href="'+ url +'">' +
                    '<img src="/wap/theme3/images/index/' + obj[k].plat_type + '.png" />' +
                    '<span class="ng-binding">'+ obj[k].name +'</span>' +
                    '</a>' +
                    '</li>'
            }
            $("#indexGameList").html(str);

        }else if(type == 'live') {
            obj  = <?php echo json_encode((new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live')) ;?>;
            for(let k in obj){
                var click = '';
                var url = uri + '?plat_type=' + obj[k].plat_type + '&game_type=' + obj[k].game_type +'&devices=1';
                if(is_login){
                    click = "window.location.href = '"+ url +"'";
                }else{
                    click = "notify('请先登录！')";
                }
                str += '<li>' +
                    '<a href="javascript:void(0)" onclick="'+ click +'">' +
                    '<img src="/wap/theme3/images/index/' + obj[k].plat_type + '.png" />' +
                    '<span class="ng-binding">'+ obj[k].name +'</span>' +
                    '</a>' +
                    '</li>'
            }
            $("#indexGameList").html(str);
        }else if(type == 'sports') {
            obj  = <?php echo json_encode((new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports')) ;?>;
            for(let k in obj){
                var click = '';
                var url = uri + '?plat_type=' + obj[k].plat_type + '&game_type=' + obj[k].game_type +'&devices=1';
                if(is_login){
                    click = "window.location.href = '"+ url +"'";
                }else{
                    click = "notify('请先登录！')";
                }
                str += '<li>' +
                    '<a href="javascript:void(0)" onclick="'+ click +'">' +
                    '<img src="/wap/theme3/images/index/' + obj[k].plat_type + '.png" />' +
                    '<span class="ng-binding">'+ obj[k].name +'</span>' +
                    '</a>' +
                    '</li>'
            }
            $("#indexGameList").html(str);
        } else if(type == 'lottery') {
            obj  = <?php echo json_encode((new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery')) ;?>;
            for(let k in obj){
                var click = '';
                var url = uri + '?plat_type=' + obj[k].plat_type + '&game_type=' + obj[k].game_type +'&devices=1';
                if(is_login){
                    click = "window.location.href = '"+ url +"'";
                }else{
                    click = "notify('请先登录！')";
                }
                str += '<li>' +
                    '<a href="javascript:void(0)" onclick="'+ click +'">' +
                    '<img src="/wap/theme3/images/index/' + obj[k].plat_type + '.png" />' +
                    '<span class="ng-binding">'+ obj[k].name +'</span>' +
                    '</a>' +
                    '</li>'
            }
            $("#indexGameList").html(str);
        }else if(type == 'poker') {
            obj  = <?php echo json_encode((new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker')) ;?>;
            for(let k in obj){
                var url = uri + '?plat_type=' + obj[k].plat_type + '&game_type=' + obj[k].game_type +'&devices=1';
                str += '<li>' +
                    '<a href="'+ url +'">' +
                    '<img src="/wap/theme3/images/index/' + obj[k].plat_type + '.png" />' +
                    '<span class="ng-binding">'+ obj[k].name +'</span>' +
                    '</a>' +
                    '</li>'
            }
            $("#indexGameList").html(str);
        }else if (type == 'fish'){
            obj  = <?php echo json_encode((new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish')) ;?>;
            for(let k in obj){
                var click = '';
                var url = uri + '?plat_type=' + obj[k].plat_type + '&game_type=' + obj[k].game_type +'&devices=1';
                if(is_login){
                    click = "window.location.href = '"+ url +"'";
                }else{
                    click = "notify('请先登录！')";
                }
                str += '<li>' +
                    '<a href="javascript:void(0)" onclick="'+ click +'">' +
                    '<img style="width: 50%" src="' + obj[k].img + '" />' +
                    '<span class="ng-binding">'+ obj[k].name +'</span>' +
                    '</a>' +
                    '</li>'
            }
            $("#indexGameList").html(str);
        }
    }
    $(function () {
        @if($_system_config->is_alert_on == 0)
            $('#indexDialog').hide();
            $('#indexDialog').css({ "display": "flex" });
            $("#dialogImg").attr("src", "{{ $_system_config->alert_img }}");
            $("#dialogTitle").html('消息');
        @endif
    })
</script>

@endsection
