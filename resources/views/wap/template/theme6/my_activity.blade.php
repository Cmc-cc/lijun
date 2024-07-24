@extends('wap.template.theme6.layouts.main')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme3/css/pay.css') }}">
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">申请进度</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content user-content">
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
    <script>
        $(function () {
            //biCommon.getActivity();
        })
    </script>


@endsection