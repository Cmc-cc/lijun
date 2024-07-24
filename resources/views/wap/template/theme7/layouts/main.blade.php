<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{$_system_config->site_title or '标题' }}</title>
    <meta http-equiv="Cache-control" content="no-cache" />
    <meta http-equiv="Cache" content="no-cache" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
    <link rel="apple-touch-icon-precomposed" href="~/Areas/Wap4/Content/images/icons/icon-57.png">
    <link href="{{ asset('/wap/theme7/css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('/wap/theme7/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/wap/theme7/css/index.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('/wap/theme7/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('/wap/theme7/js/wapConfig.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme7/js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme7/js/core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme7/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme7/js/tpl.js') }}"></script>
    <script src="{{ asset('/wap/theme7/js/bicommon.js') }}"></script>
    <script src="{{ asset('/wap/theme3/js/mobileJS.js') }}"></script>
    <script src="{{ asset('/wap/theme7/js/wapMain.js') }}?=<?php echo time();?>"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
    <script>
        $(function () {
            //biCommon.getUserMoneys();
            //getUserMoney();
        })
    </script>
</head>

<body class="common_style">
@if($_system_config -> is_app_link_on == 0)
    @include('wap.app')
@endif
@yield('content')
<div class="layout-bottom" style="display: block;">

    <div class="main-menu-area navbar-nav">
        <div class="dropup more-menu" data-id="home">
            <a href="{{ route('wap.index') }}">
            <span aria-hidden="true" class="icon-uniE601"></span>
            <span>首页</span>
            </a>
        </div>

        <div class="dropup more-menu" data-id="tiyu">
            <div class="menu-mask"></div>
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <span aria-hidden="true" class="icon-uniE60C"></span>
                <span>體育</span>
            </a>
            <ul class="dropdown-menu diy-scrollbar">
                <li>
                    <ul id="layoutSport">
                        <?php
                        $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                        ?>
                            @foreach($sports as $k => $v)
                        <li>
                            <a href="javascript:;" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif">
                                <?php
                                $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                $v['img'] = $img;
                                ?>
                                <img src="{{ $img }}">
                                <span class="item-name">{{$v['name']}}</span>
                            </a>
                        </li>
                            @endforeach
                    </ul>
                </li>
            </ul>

        </div>

        <div class="dropup more-menu" data-id="caipiao">

            <div class="menu-mask"></div>
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <span aria-hidden="true" class="icon-uniE609"></span>

                <span>彩票</span>

            </a>

            <ul class="dropdown-menu diy-scrollbar">

                <li>
                    <ul id="layoutLottery">
                        <?php
                        $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                        ?>
                        @foreach($lottery as $k => $v)
                            <li>
                                <a href="javascript:;" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif">
                                    <?php
                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                    $v['img'] = $img;
                                    ?>
                                    <img src="{{ $img }}">
                                    <span class="item-name">{{$v['name']}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

        </div>

        <div class="dropup more-menu" data-id="shixun">

            <div class="menu-mask"></div>
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <span aria-hidden="true" class="icon-uniE605"></span>

                <span>視訊</span>

            </a>

            <ul class="dropdown-menu dropdown-menu-right diy-scrollbar">

                <li>
                    <ul id="layoutLive">
                        <?php
                        $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                        ?>
                        @foreach($live as $k => $v)
                            <li>
                                <a href="javascript:;" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif">
                                    <?php
                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                    $v['img'] = $img;
                                    ?>
                                    <img src="{{ $img }}">
                                    <span class="item-name">{{$v['name']}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

        </div>

        <div class="dropup more-menu" data-id="dianzi">

            <div class="menu-mask"></div>
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <span aria-hidden="true" class="icon-uniE607"></span>

                <span>電子</span>

            </a>

            <ul class="dropdown-menu dropdown-menu-right diy-scrollbar">

                <li>
                    <ul id="layoutSlot">
                        <?php
                        $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                        ?>
                        @foreach($slot as $k => $v)
                            <li>
                                <a href="javascript:;" onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1');">
                                    <?php
                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                    $v['img'] = $img;
                                    ?>
                                    <img src="{{ $img }}">
                                    <span class="item-name">{{$v['name']}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>

        <div class="dropup more-menu" data-id="qipai">

            <div class="menu-mask"></div>
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <span aria-hidden="true" class="icon-uniE616"></span>
                <span>棋牌</span>

            </a>
            <ul class="dropdown-menu dropdown-menu-right diy-scrollbar">

                <li>
                    <ul id="layoutChess">
                        <?php
                        $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                        ?>
                        @foreach($poker as $k => $v)
                            <li>
                                <a href="javascript:;" onclick="window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1');">
                                    <?php
                                    $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                    $v['img'] = $img;
                                    ?>
                                    <img src="{{ $img }}">
                                    <span class="item-name">{{$v['name']}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

        </div>
        <div class="dropup more-menu" data-id="dianjin">

            <div class="menu-mask"></div>
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <span aria-hidden="true" class="icon-uniE602"></span>
                <span>电竞</span>

            </a>
            <ul class="dropdown-menu dropdown-menu-right diy-scrollbar">

                <li>
                    <ul id="layoutCompetition">
                        <?php
                        $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                        ?>
                            @foreach($sports as $k => $v)
                                <li>
                                    <a href="javascript:;" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif">
                                        <?php
                                        $img = '/wap/theme3/images/index/'.$v['plat_type'].'.png';
                                        $v['img'] = $img;
                                        ?>
                                        <img src="{{ $img }}">
                                        <span class="item-name">{{$v['name']}}</span>
                                    </a>
                                </li>
                            @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <div class="dropup more-menu" data-id="wo">

            <div class="menu-mask"></div>
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <span aria-hidden="true" class="icon-uniE604"></span>
                <span>我</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right diy-scrollbar">
                <li>
                    <ul>
                        @if (!Auth::guard('member')->guest())
                            <li>
                                <a href="{{ route('wap.recharge') }}">
                                <span>
                                            <span aria-hidden="true" class="icon glyphicon glyphicon-piggy-bank"></span>
                                            <span class="item-name">在线存款</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wap.drawing') }}">
                                <span>
                                            <span aria-hidden="true" class="icon glyphicon glyphicon-new-window"></span>
                                            <span class="item-name">在线取款</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wap.transfer') }}">
                                <span>
                                            <span aria-hidden="true" class="icon glyphicon glyphicon-transfer"></span>
                                            <span class="item-name">额度转换</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wap.recharge_record') }}">
                                <span>
                                            <span aria-hidden="true" class="icon glyphicon glyphicon-usd"></span>
                                            <span class="item-name">充值记录</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wap.drawing_record') }}">
                                <span>
                                            <span aria-hidden="true" class="icon glyphicon glyphicon-usd"></span>
                                            <span class="item-name">提款记录</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wap.transfer_record') }}">
                                <span>
                                            <span aria-hidden="true" class="icon glyphicon glyphicon-list-alt"></span>
                                            <span class="item-name">额度转换记录</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wap.game_record') }}">
                                <span>
                                            <span aria-hidden="true" class="icon glyphicon glyphicon-list-alt"></span>
                                            <span class="item-name">游戏记录</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wap.reset_password') }}">
                                <span>
                                            <span aria-hidden="true" class="icon glyphicon glyphicon-lock"></span>
                                            <span class="item-name">修改密码</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wap.userinfo') }}">
                                <span>
                                            <span aria-hidden="true" class="icon iconfont icon-huiyuan"></span>
                                            <span class="item-name">会员中心</span>
                                        </span>
                                </a>
                            </li>
                            <li id="mailbox">
                                <a href="{{ route('wap.msg') }}">
                                <span>
                                            <b></b>
                                            <span aria-hidden="true" class="icon glyphicon glyphicon-envelope"></span>
                                            <span class="item-name">信息中心</span>

                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wap.agent') }}">
                                <span>
                                            <span aria-hidden="true" class="icon fa fa-users"></span>
                                            <span class="item-name">代理中心</span>
                                        </span>
                                </a>
                            </li>
                            @if($_system_config->is_fs==1)
                            <li>
                                <a href="{{ route('wap.user_fs') }}">
                                <span>
                                                <span aria-hidden="true" class="icon glyphicon glyphicon-calendar"></span>
                                                <span class="item-name">实时返水</span>
                                            </span>
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="javascript:;" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <span>
                                            <span aria-hidden="true" class="icon glyphicon glyphicon-volume-up"></span>
                                            <span class="item-name">退出登录</span>
                                        </span>
                                    <form id="logout-form" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </a>
                            </li>
                        @endif
                            <li>
                                <a href="{{ route('wap.activity_list') }}">
                                <span>
                                        <span aria-hidden="true" class="icon glyphicon glyphicon-gift"></span>
                                        <span class="item-name">优惠活动</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $_system_config->service_link }}">
                                <span>
                                        <span aria-hidden="true" class="icon icon-uniE615"></span>
                                        <span class="item-name">在线客服</span>
                                    </span>
                                </a>
                            </li>
                    </ul>
                </li>
            </ul>

        </div>

    </div>
</div>
<div class="modal" id="modalWaring">
    <div class="modal-dialog message-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">系统提示</h4>
            </div>
            <div class="modal-body">
                <div class="line-info">
                    <div class="info-caption">
                        <span class="glyphicon glyphicon-alert alert-icon" aria-hidden="true"></span>
                    </div>
                    <div class="info-left">
                        <pre id="messageWaring">用户名不能为空</pre>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary confirm-btn" onclick="sureWaring()">确定</button>
            </div>
        </div>
    </div>
</div>
<!--公告弹框-->
<div class="notice-dialog clearboth hide" id="marquee-wrapper">
    <div class="notice-content clearboth hide">
        <div class="notice-header clearboth">
            <button onclick="closeMessageDioag()">×</button>
            <p>最新消息</p>
        </div>
        <ul class="notice-list clearboth" id="newsBags"></ul>
        <div class="notice-footer">
            <button onclick="closeMessageDioag()">关闭</button>
        </div>
    </div>
</div>

<!--公告详情-->
<div id="announcement-content" announcement-dialog-content="" obj="content" more="true" class="ng-scope ng-isolate-scope hide" style="">
    <div class="modal-announcement-content announcement-content-bg">
        <div class="mac-title">
            <img class="fa-reply" src="{{ asset('/wap/theme3/images/return.png') }}" onclick="closeNoticeContent()" />
            <img class="fa-times" src="{{ asset('/wap/theme3/images/closeNotice.png') }}" onclick="closeNotices()" />
            <span class="ng-binding" id="notice-tittle"></span>
        </div>
        <div class="mac-body announcement-content-color">
            <section class="ng-binding">
                <p id="notice-content">尊敬的会员您好：通知您〜北京时间：</p>
            </section>
        </div>
        {{--<div class="mac-footer" ng-show="more"><button type="button" class="btn btn-lg btn-primary" onclick="moreNotice()">更多公告</button></div>--}}
    </div>
</div>
</body>
</html>
<script>
    //getMaintain();
    //getGamePlate(4);
    //whetherOpenSMS();
    //judgeOldAndNew();//老带新判断
</script>
