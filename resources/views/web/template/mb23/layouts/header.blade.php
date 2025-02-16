<div id="top-header" ng-controller="LobbiesCtrl">
        <div class="wrapper">
            <ul class="topnav-left">
                <li id="div-meiDonNow">
                    美东时间 -
                    <span id="localtime"></span>
                </li>
            </ul>
												<script type="text/javascript">
function showLocale(objD)
{
	var str,colorhead,colorfoot;
	var yy = objD.getYear();
	if(yy<1900) yy = yy+1900;
	var MM = objD.getMonth()+1;
	if(MM<10) MM = '0' + MM;
	var dd = objD.getDate();
	if(dd<10) dd = '0' + dd;
	var hh = objD.getHours();
	if(hh<10) hh = '0' + hh;
	var mm = objD.getMinutes();
	if(mm<10) mm = '0' + mm;
	var ss = objD.getSeconds();
	if(ss<10) ss = '0' + ss;
	var ww = objD.getDay();
	if  ( ww==0 )  colorhead="<font color=\"#ffd053\">";
	if  ( ww > 0 && ww < 6 )  colorhead="<font color=\"#ffd053\">";
	if  ( ww==6 )  colorhead="<font color=\"#ffd053\">";
	if  (ww==0)  ww="星期日";
	if  (ww==1)  ww="星期一";
	if  (ww==2)  ww="星期二";
	if  (ww==3)  ww="星期三";
	if  (ww==4)  ww="星期四";
	if  (ww==5)  ww="星期五";
	if  (ww==6)  ww="星期六";
	colorfoot="</font>"
	str = colorhead + yy + "-" + MM + "-" + dd + " " + hh + ":" + mm + ":" + ss + "  " + ww + colorfoot;
	return(str);
}
function tick()
{
	var today;
	today = new Date();
	document.getElementById("localtime").innerHTML = showLocale(today);
	window.setTimeout("tick()", 1000);
}
tick();
</script>
            <ul class="topnav-right">
                <li class="yellow partner" toggle-color><a class="daili_apply">注册代理</a></li>
                <li class="red agent" toggle-color><a target="_blank" href="{{route('daili.init')}}">代理登录</a></li>
                <li class="green"><a ng-href="{{ route('web.activityList') }}" >活动大厅</a></li>
                <li class="red"><a ng-href="{{ route('web.red') }}"target="_blank">VIP抢红包</a></li>
               {{-- <li class="orange"><a ng-href="{{ $_system_config->kscz}}" target="_blank">快速充值</a></li>--}}
                {{--<li class="blue"><a ng-href="{{ $_system_config->bywz }}" target="_blank">备用网址</a></li>--}}
                <li class="purple"><a ng-href="{{ $_system_config->app_link }}" target="_blank">手机APP</a></li>
                <li id="language" select-language>
                    <ul>
                   <li data-language="zh-CN" title="简体中文" class="ng-scope">简体中文</li>
				   <li data-language="zh-TW" title="繁体中文" class="ng-scope">繁体中文</li>
				   <li data-language="en-US" title="English" class="ng-scope">English</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <header id="header">
        <div class="wrapper">

            <div id="logo-bg" style="background: none;">
                <a href="/">
                    <img src="{{ $_system_config->site_logo}}">
                </a>
            </div>

            <nav id="nav">
                <ul ng-controller="LobbiesCtrl">
                    <li class="home">
                        <a href="{{ route('web.index') }}">首&nbsp;页<span>HOME</span></a>
                    </li>
                    <li class="game hot">
                        <a href="{{ route('web.eGame') }}">電子游艺<span>SLOTS</span></a>
                        <ol class="subnav">
                            <li class="sub-title">天天返水1.7%</li>
                            @if(in_array('MG', $_api_list))
                        <li class="sub-hot"><a target="
_blank" href="{{route('game.playGame')}}?plat_type=MG&game_type=2">MG電子</a></li>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <li class="sub-hot"><a target="
_blank" href="{{route('game.playGame')}}?plat_type=PT&game_type=2">PT電子</a></li>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <li class="sub-hot"><a target="
_blank" href="{{route('game.playGame')}}?plat_type=BBIN&game_type=2">BBIN電子</a></li>
                            @endif
                            @if(in_array('AG', $_api_list))
                                <li class="sub-hot"><a target="
_blank" href="{{route('game.playGame')}}?plat_type=AG&game_type=2">AG電子</a></li>
                            @endif
                            @if(in_array('PP', $_api_list))
                                <li class="sub-hot"><a target="
_blank" href="{{route('game.playGame')}}?plat_type=PP&game_type=2">PP電子</a></li>
                            @endif

                            @if(in_array('SA', $_api_list))
                                <li class="sub-hot"><a target="
_blank" href="{{route('game.playGame')}}?plat_type=SA&game_type=2">SA電子</a></li>
                            @endif
                            @if(in_array('QT', $_api_list))
                                <li class="sub-hot"><a target="
_blank" href="{{route('game.playGame')}}?plat_type=QT&game_type=2">QT電子</a></li>
                            @endif
                            @if(in_array('SW', $_api_list))
                                <li class="sub-hot"><a target="
_blank" href="{{route('game.playGame')}}?plat_type=SW&game_type=2">SW電子</a></li>
                            @endif
                            @if(in_array('CQ9', $_api_list))
                                <li class="sub-hot"><a target="
_blank" href="{{route('game.playGame')}}?plat_type=CQ9&game_type=2">CQ9電子</a></li>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <li class="sub-hot"><a target="
_blank" href="{{route('game.playGame')}}?plat_type=JDB&game_type=2">JDB電子</a></li>
                            @endif
                            @if(in_array('MW', $_api_list))
                                <li><a target="_blank" href="{{route('game.playGame')}}?plat_type=MW&game_type=2">MW電子</a></li>
                            @endif

                            @if(in_array('SG', $_api_list))
                                <li><a target="_blank" href="{{route('game.playGame')}}?plat_type=SG&game_type=2">SG電子</a></li>
                            @endif
                            @if(in_array('GPI', $_api_list))
                                <li><a target="_blank" href="{{route('game.playGame')}}?plat_type=GPI&game_type=2">GPI電子</a></li>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <li><a target="_blank" href="{{route('game.playGame')}}?plat_type=FG&game_type=2">FG電子</a></li>
                            @endif
                            @if(in_array('BNG', $_api_list))
                                <li><a target="_blank" href="{{route('game.playGame')}}?plat_type=BNG&game_type=2">BNG電子</a></li>
                            @endif
                        </ol>
                    </li>

                    <li class="live hot">
                        <a href="{{ route('web.poker') }}">棋牌游戏<span>CARD GAME</span></a>
                         <ol class="subnav">
                             @if(in_array('AP', $_api_list))
                                 <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=AP&game_type=7">AP爱棋牌</a></li>
                             @endif
                                 @if(in_array('VG', $_api_list))
                                     <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=VG&game_type=7">VG棋牌</a></li>
                                 @endif
                                 @if(in_array('SG', $_api_list))
                                     <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=SG&game_type=7">SG棋牌</a></li>
                                 @endif
                                 @if(in_array('LEG', $_api_list))
                                     <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=LEG&game_type=7">LEG棋牌</a></li>
                                 @endif
                                 @if(in_array('MT', $_api_list))
                                     <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=MT&game_type=7">美天棋牌</a></li>
                                 @endif
                                 @if(in_array('KY', $_api_list))
                                     <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=KY&game_type=7">开元棋牌</a></li>
                                 @endif
                                 @if(in_array('FG', $_api_list))
                                     <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=FG&game_type=7">FG棋牌</a></li>
                                 @endif

                         </ol>
                    </li>
                    <li class="fish">
                        <a href="{{ route('web.catchFish') }}">捕魚机<span>FISH</span></a>
                        <div class="subnav">
                            <ol>
                                @if(in_array('FG', $_api_list))
                                <li class="sub-hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_mm','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>FG美人捕魚</li>
                                @endif

                                    @if(in_array('FG', $_api_list))
                                        <li class="sub-hot"
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_bn','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>FG捕鸟达人</li>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                        <li class="sub-hot"
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_tt','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>FG天天捕魚</li>
                                    @endif
                                    @if(in_array('JDB', $_api_list))
                                        <li class="sub-hot"
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7003','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>JDB财神捕魚</li>
                                    @endif
                                    @if(in_array('JDB', $_api_list))
                                        <li class="sub-hot"
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7001','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>JDB龙王捕魚</li>
                                    @endif
                                    @if(in_array('AG', $_api_list))
                                        <li class="sub-hot"
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=6','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>AG捕魚王</li>
                                    @endif
                                    @if(in_array('BBIN', $_api_list))
                                        <li class="sub-hot"
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>BB捕魚达人</li>
                                    @endif
                                    @if(in_array('SW', $_api_list))
                                        <li
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>SW捕魚多福</li>
                                    @endif
                                    @if(in_array('SW', $_api_list))
                                        <li
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6&game_code=sw_fuqsg','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>SW捕魚多福</li>
                                    @endif
                                    @if(in_array('PT', $_api_list))
                                        <li
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=6&game_code=cashfi','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>PT深海大赢家</li>
                                    @endif
                                    @if(in_array('SA', $_api_list))
                                        <li
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=6','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>SA鱼乐无穷</li>
                                    @endif

                    </ol>
                    <ol>
                        @if(in_array('FG', $_api_list))
                            <li class="sub-hot"
                                @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6','','width=1024,height=768')"
                                @else onclick="Alert();"
                                    @endif>FG欢乐捕魚</li>
                        @endif
                            @if(in_array('FG', $_api_list))
                                <li class="sub-hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_zj','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>FG雷霆战警</li>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <li class="sub-hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_3D','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>FG捕魚嘉年华</li>
                            @endif
                            @if(in_array('CQ9', $_api_list))
                                <li class="sub-hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=6','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>CQ9皇金渔场</li>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <li class="sub-hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7002','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>JDB龙王捕魚2</li>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <li class="sub-hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6&game_code=38001','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>BBIN捕魚大师</li>
                            @endif
                            @if(in_array('MW', $_api_list))
                                <li
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=6','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>MW千炮捕魚</li>
                            @endif
                            @if(in_array('MT', $_api_list))
                                <li
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0011','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif>MT李逵捕魚</li>
                            @endif
                            @if(in_array('MT', $_api_list))
                                <li
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0045','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif>MT金蟾捕魚</li>
                            @endif
                            </ol>
                        </div>
                    </li>
                    <li class="live">
                        <a href="{{ route('web.liveCasino') }}">真人視訊<span>CASINO</span></a>
                        <ol class="subnav">
                            <?php
                            $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                            ?>
                                @if(count($live) > 0)
                                    @foreach($live as $v)
                                <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')" @else onclick="Alert();"@endif>{{ $v['name'] }}</li>
                                    @endforeach
                                @endif
                           	{{--@if(in_array('AG', $_api_list))
                        <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>AG寰亚厅</li>
					 @endif
                        @if(in_array('BG', $_api_list))
                        <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>BG尊娱厅</li>
					 @endif
                        @if(in_array('ALLBET', $_api_list))
                        <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>AB尊爵厅</li>
					 @endif
                        @if(in_array('GPI', $_api_list))
                        <li  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>GPI贵宾厅</li>
					@endif
                        @if(in_array('GD', $_api_list))
                        <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>GD奢华厅</li>
					 @endif
                        @if(in_array('SA', $_api_list))
                        <li  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>沙龙荣耀厅</li>
					@endif

					@if(in_array('BBIN', $_api_list))
                        <li class="sub-hot"  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>BBIN旗舰厅</li>
					 @endif
                        @if(in_array('MG', $_api_list))
                        <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>MG欧美厅</li>
					@endif
                        @if(in_array('PT', $_api_list))
                        <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>PT国际厅</li>
					@endif
                        @if(in_array('DG', $_api_list))
                        <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>DG尊爵会</li>
					@endif
                        @if(in_array('SUNBET', $_api_list))
                        <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>申博梦幻厅</li>
					@endif
                        @if(in_array('OG', $_api_list))
                        <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>OG如意厅</li>
					@endif--}}
                        </ol>
                    </li>
                    <li class="lottery">
                        <a href="{{ route('web.lottory') }}">彩票游戏<span>LOTTERY</span></a>
                        <ol class="subnav">
                            <?php
                            $lottery = (new \App\Http\Controllers\Wap\AjaxController())->getGames('lottery');
                            ?>
                            @if(count($lottery) > 0)
                                @foreach($lottery as $v)
                                    <li class="sub-hot"
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}&game_code={{ $v['game_code'] }}','','width=1024,height=768')"
                                        @else onclick="Alert();"@endif>
                                        <span>{{ $v['name'] }}</span>
                                    </li>
                                @endforeach
                            @endif
                            {{--@if(in_array('SGL', $_api_list))

                    <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SGL&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>SG双赢彩票</span></li>
                            @endif
                                @if(in_array('BBIN', $_api_list))
                    <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>BBIN彩票</span></li>
                                @endif
                                @if(in_array('IG', $_api_list))
                                    <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>IG彩票</span></li>
                                @endif
                                @if(in_array('IG', $_api_list))
                                    <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&game_code=imlotto10059','','width=1024,height=768')"@else onclick="Alert();"@endif><span>IG六合彩</span></li>
                                @endif
                                @if(in_array('VR', $_api_list))
                                    <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=VR&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>VR竞速彩票</span></li>
                                @endif
                                @if(in_array('EG', $_api_list))
                                    <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EG&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>EG彩票</span></li>
                                @endif
                                @if(in_array('BG', $_api_list))
                                    <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>BG彩票</span></li>
                                @endif--}}
                        </ol>
                    </li>
                    <li class="sport">
                        <a href="{{ route('web.esports') }}">體育赛事<span>SPORTS</span></a>
                        <ol class="subnav">
                            @if(in_array('SS', $_api_list))
                            <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SS&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>三昇體育</span></li>
                            @endif
                                @if(in_array('SS', $_api_list))
					<li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GJ&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>皇冠體育</span></li>
                                @endif
                                @if(in_array('IBC', $_api_list))
                    <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IBC&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>沙巴體育</span></li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                    <li class="sub-hot"  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>BBIN體育</span></li>
                                @endif
                                @if(in_array('AG', $_api_list))
                    <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>AG體育</span></li>
                                @endif
                                @if(in_array('NEWBB', $_api_list))
                    <li  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=NEWBB&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>NEWBB體育</span></li>
                                @endif
                                @if(in_array('ESB', $_api_list))
					<li  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ESB&game_type=5','','width=1024,height=768')"@else onclick="Alert();"@endif><span>ESB电竞</span></li>
                                @endif
                                @if(in_array('AVIA', $_api_list))
                    <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AVIA&game_type=5','','width=1024,height=768')"@else onclick="Alert();"@endif><span>泛亚电竞</span></li>
                                @endif
                        </ol>
                    </li>
                    <li class="promotion hot" toggle-color>
                        <a href="{{ route('web.activityList') }}">优惠专区<span>PROMOTION</span></a>
                    </li>
					  <li class="mggame" toggle-color>
                        <a href="javascript:void(0)" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">在线客服<span>SERVICE</span></a>

                    </li>
                </ul>
            </nav>
        </div>
    </header>
	 @if (Auth::guard('member')->guest())
    <div id="header-bot" class="home">
        <div class="wrapper">

                <div id="account-box">
                      <form name="LoginForm" id="LoginForm" action="{{ route('member.login.post') }}" method="POST">
                        <input id="login_account" type="text" placeholder="帐号" name="name" maxlength="16"
                                      tabindex="1" pattern="[a-zA-Z0-9]{6,14}" required autofocus />
                        <input id="login_password" type="password" placeholder="密码" name="password" maxlength="13" tabindex="2" pattern="[a-zA-Z0-9]{6,13}" required />

                        <div id="check-code-wrapper">
                             <input name="captcha" type="text" id="rmNum" size="7" maxlength="4"
                                       title="( 点选此处产生新验证码 )"
                                       class="yzm" onfocus="javascript:re_captcha();"  tabindex="3" pattern="\d{4}" required="" placeholder="验证码"  required />
                            <img id="captcha"  style="background-color: burlywood;"
                                                                          />
																		   <script>
                                    function re_captcha() {
                                        $url = "{{ URL('kit/captcha') }}";
                                        $url = $url + "/" + Math.random();
                                        document.getElementById('captcha').src = $url;
                                    }
                                </script>
                        </div>

                       <button id="login-box" ng-disabled="isProcessing" ng-bind="isProcessing ? '立即登录...' : '立即登录'" class="login-btn ng-binding ng-binding  modal-login_submit ajax-submit-btn">立即登录</button>
                        <span class="joinus" ng-click=""onclick="javascript:window.location.href = '{{ route('web.register_one') }}';">免费注册</span>
                        <ul>
                            <li class="forget" ng-click=""onclick="return layer.alert('您好！忘记密码请联系客服!',{icon:7});">忘记?</li>
                            {{--<li class="homepage" ng-click=""onclick="return layer.alert('您好！请联系客服索取试玩帐号!',{icon:7});">免费试玩</li>--}}
                        </ul>
                        <div id="agree" ng-show="loginOver" ng-cloak>
                            点击登入表示同意<a ng-click="agreement()">用户协议</a>
                        </div>
                    </form>
                </div>
        </div>
    </div>


	 @else

	    <div id="header-bot" class="home">
        <div class="wrapper">

                <div id="account-box" class="login" ng-controller="AccountCtrl" ng-init="$root.user.isLogin=true">
                    <ul id="account-info">
                        <li>
                            帐号 :
                            <span class="account" title="{{ $_member->name }}">{{ $_member->name }}</span>
                                {{--<a id="mailbox" ng-controller="SiteMailCountCtrl" href="/member/FYcenter/12#12" title="站内信">
                                    <span ng-hide="!(MailIsReadCount.Count > 0)" ng-cloak></span>
                                </a>--}}
                        </li>
                        <li>
                            账户余额 :
                            <span class="money" title="$ {{ $_member->money }}">{{ $_member->money }}</span>
                             <!-- <a ng-click="updateBalance()" title="更新">
                                <i ng-show="!updatingBalance" class="fa fa-refresh"></i>
                                <i ng-show="updatingBalance" class="fa fa-spinner fa-spin"></i>
                            </a>-->

                            <div id="callBackAllWallet" ng-click="callBackAllWallet()"></div>
                        </li>
                    </ul>

                        <ul id="account-nav">
                            @if($_system_config ->is_new_center == 1)
                                <li class="deposit" title="个人中心">
                                    <a href="{{ route('member.userCenter') }}">
                                        个人中心
                                    </a>
                                </li>
                            @else
                            <li class="deposit" title="个人中心">
                                <a href="{{ route('member.userCenter') }}">
                                    个人中心
                                </a>
                            </li>
                            <li class="deposit" title="线上存款">
                                <a href="{{ route('member.finance_center') }}">
                                    线上存款
                                </a>
                            </li>
                            <li class="withdraw" title="线上取款">
                                <a href="{{ route('member.member_drawing') }}">
                                    线上取款
                                </a>
                            </li>
                            <li class="betrecord" title="接口余额">
                                <a href="{{ route('member.indoor_transfer') }}">
                                    接口余额
                                </a>
                            </li>
                            {{--<li class="changemoneyr" title="修改取款密码">
                                <a href="/member/FYcenter/6#6">
                                    修改取款密码
                                </a>
                            </li>
                            <li title="修改密码">
                                 <a href="/member/FYcenter/2#5">
								 修改密码
								 </a>
                            </li>--}}
                            @endif
                        </ul>
                    <div id="action-box">
                       	<a href="{{ route('member.logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="login-btn">登出</a>
							    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                                </form>
                    </div>
                </div>
        </div>
    </div>
<script>
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
</script>
@endif
