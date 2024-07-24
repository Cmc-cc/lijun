@extends('wap.template.theme8.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('/wap/theme3/css/pay.css') }}">
    <div class="mine-bet-record-body">
        <header class="mui-bar mui-bar-nav mui-action-back">
            <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
            <h1 class="mui-title">
                申请进度
            </h1>
        </header>
        <div class="mui-content mine-bet-record-content mui-scroll" id="refreshContainer" data-scroll="1" data-pullrefresh="2">
            <div class="mui-scroll" style="transform: translate3d(0px, 0px, 0px) translateZ(0px);">
                <ul class="list-group" style="padding: 5px;">
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
    </div>
@endsection