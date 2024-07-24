@extends('wap.template.theme11.layouts.main')
@section('content')
    <div class="app_header">
        <div class="am-navbar am-navbar-dark">
            <div class="am-navbar-left" role="button">
            <span class="am-navbar-left-content" onclick="Opentoolbar();">
                <img src="{{ asset('wap/theme11/images/menu_burger.png') }}" class="headIcon" />
            </span>
            </div>
            <div class="am-navbar-title">
                <img src="{{ $_system_config -> site_logo }}" style="width: 1.7rem;"></div>

            <div class="am-navbar-right"></div>
        </div>
        @include('wap.template.theme11.layouts.head_left')
    </div>
    <div class="container">
        <div class="Userstyle" id="info_top">
            <div class="Usertopjpg" >
                <h3 class="name">用戶名: {{ $_member -> name }}&nbsp;余额:<span class="UserAmountController nav-money">{{ $_member ->money }}</span></h3>
{{--                <h3 class="name"><img src="/img/gradeimg/gradeimg1_20190730143112511.png" class="vip-layout" id="vipLayout" style="">&nbsp;<span id="vipLayoutText"></span></h3>--}}
            </div>
            <div class="am-whitespace am-whitespace-lg"></div>

            <div class="am-flexbox am-flexbox-align-middle"
                 onclick="window.location.href='{{ route('wap.userinfo') }}'">
                <div class="am-flexbox-item">
                    <div class="am-list-item am-list-item-middle">
                        <div class="am-list-line">
                            <div class="am-list-content">
                                <div style="width: 375px; height: 20px;">
                                    <p style="font-size: 14px;">个人中心</p>
                                </div>
                            </div>
                            <div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
                        </div>
                        <div class="am-list-ripple" style="display: none;"></div>
                    </div>
                </div>
            </div>

            <div class="am-flexbox am-flexbox-align-middle"
                 onclick="window.location.href='{{ route('wap.reset_password') }}'">
                <div class="am-flexbox-item">
                    <div class="am-list-item am-list-item-middle">
                        <div class="am-list-line">
                            <div class="am-list-content">
                                <div style="width: 375px; height: 20px;">
                                    <p style="font-size: 14px;">密码管理</p>
                                </div>
                            </div>
                            <div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
                        </div>
                        <div class="am-list-ripple" style="display: none;"></div>
                    </div>
                </div>
            </div>
        <div class="am-flexbox am-flexbox-align-middle" onclick="window.location.href='{{ route('wap.recharge_record') }}'">
        <div class="am-flexbox-item">
            <div class="am-list-item am-list-item-middle">
                <div class="am-list-line">
                    <div class="am-list-content">
                        <div style="width: 375px; height: 20px;">
                            <p style="font-size: 14px;">充值记录</p>
                        </div>
                    </div>
                    <div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
                </div>
                <div class="am-list-ripple" style="display: none;"></div>
            </div>
        </div>
    </div>
    <div class="am-flexbox am-flexbox-align-middle" onclick="window.location.href='{{ route('wap.drawing_record') }}'">
    <div class="am-flexbox-item">
        <div class="am-list-item am-list-item-middle">
            <div class="am-list-line">
                <div class="am-list-content">
                    <div style="width: 375px; height: 20px;">
                        <p style="font-size: 14px;">提款记录</p>
                    </div>
                </div>
                <div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
            </div>
            <div class="am-list-ripple" style="display: none;"></div>
        </div>
    </div>
    </div>
            <div class="am-flexbox am-flexbox-align-middle" onclick="window.location.href='{{ route('wap.transfer_record') }}'">
                <div class="am-flexbox-item">
                    <div class="am-list-item am-list-item-middle">
                        <div class="am-list-line">
                            <div class="am-list-content">
                                <div style="width: 375px; height: 20px;">
                                    <p style="font-size: 14px;">转换记录</p>
                                </div>
                            </div>
                            <div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
                        </div>
                        <div class="am-list-ripple" style="display: none;"></div>
                    </div>
                </div>
            </div>
            <div class="am-flexbox am-flexbox-align-middle" onclick="window.location.href='{{ route('wap.game_record') }}'">
                <div class="am-flexbox-item">
                    <div class="am-list-item am-list-item-middle">
                        <div class="am-list-line">
                            <div class="am-list-content">
                                <div style="width: 375px; height: 20px;">
                                    <p style="font-size: 14px;">游戏记录</p>
                                </div>
                            </div>
                            <div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
                        </div>
                        <div class="am-list-ripple" style="display: none;"></div>
                    </div>
                </div>
            </div>

    <div class="am-flexbox am-flexbox-align-middle" onclick="window.location.href='{{ route('wap.agent') }}'">
    <div class="am-flexbox-item">
        <div class="am-list-item am-list-item-middle">
            <div class="am-list-line">
                <div class="am-list-content">
                    <div style="width: 375px; height: 20px;">
                        <p style="font-size: 14px;">代理中心</p>
                    </div>
                </div>
                <div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
            </div>
            <div class="am-list-ripple" style="display: none;"></div>
        </div>
    </div>
    </div>
    <div class="am-flexbox am-flexbox-align-middle" onclick="window.location.href='{{ route('wap.msg') }}'">
    <div class="am-flexbox-item">
        <div class="am-list-item am-list-item-middle">
            <div class="am-list-line" id="mailbox">
                <div class="am-list-content">
                    <div style="width: 375px; height: 20px;">
                        <p style="font-size: 14px;">消息中心</p>
                    </div>
                </div>
{{--                <b style="color:red;float:right;">0</b>--}}
                <div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
            </div>
            <div class="am-list-ripple" style="display: none;"></div>
        </div>
    </div>
    </div>

            <div class="am-flexbox am-flexbox-align-middle" onclick="event.preventDefault();document.getElementById('logout-form-2').submit();">
                <div class="am-flexbox-item">
                    <div><p class="Gooutbtn">退出</p></div>
                </div>
            </div>
            <form id="logout-form-2" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
    </div>
    </div>
    <div></div>
    <script>
        //judgeOldAndNew();//老带新判断
    </script>





@endsection