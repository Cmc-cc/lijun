@extends('wap.template.theme3.layouts.main')
@section('content')
    <link href="{{asset('/wap/theme3/css/pay.css')}}" rel="stylesheet" />
    <main class="panel slideout-panel slideout-panel-left">
        <!---->
        <div data-v-76fa910e="" class="navbar-container" style="">
            <div data-v-76fa910e="" middle="" class="logo-container"></div>
            <div data-v-76fa910e="" middle="" class="menu-container" onclick="history.go('-1')">
                <div data-v-76fa910e="" relative="" style="">
                    <img data-v-76fa910e="" middle="" src="{{ asset('/wap/theme3/images/main/goback.png') }}" alt="" style="">
                </div>
            </div>
            <div data-v-76fa910e="" class="title">
                <h3 data-v-76fa910e="" class="title">申请进度</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>
        <div data-v-5e36b0dc="" class="account view">
            <div class="userInfo setCard">
                <ul class="list-group">
                    @foreach($data as $item)
                        <li class="list-group-item message-item">
                            <div class="message-title" style="color:#232323;">活动标题：{{ $item->activity->title }}</div>
                            <div class="message-content">
                                @if($item->status == 3)
                                    <font color="red">你的活动申请未通过，原因：{{ $item->fail_reason }}</font>
                                @endif
                                @if($item->status == 2)
                                    恭喜你，你的活动申请已审核通过，赠送金额已发放到你的账户，请查收！
                                @endif
                                @if($item->status == 1)
                                    <font color="blue">你的活动申请正在审核，请耐心等耐！</font>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!---->
    </main>
@endsection