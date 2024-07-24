@extends('wap.template.theme6.layouts.main')
@section('content')
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">活动详情</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content user-content">
        <div class="hd-tit" style="padding: 10px;">
            {{--<h3 class="title t_1">{{ $data->title }}</h3>--}}
            {!! $data->title_content !!}
            {{--<h3 class="title t_2">活动说明</h3>--}}
            {!! $data->content !!}
            {{--<h3 class="title t_3">活动规则</h3>--}}
            {!! $data->rule_content !!}
        </div>
    </div>
    <script>
        $(function () {
            //biCommon.getActivity();
        })
    </script>


@endsection