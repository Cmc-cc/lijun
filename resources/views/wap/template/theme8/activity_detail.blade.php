@extends('wap.template.theme8.layouts.main')
@section('content')
    <style>
        html, body, mui-content {
            width: 100%;
            height: 100%;
            background: #efeff4
        }
    </style>
    <header class="mui-bar mui-bar-nav mui-action-back">
        <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
        <h1 class="mui-title">
            活动详情
        </h1>
    </header>
    <div class="mui-content mine-bet-record-content mui-scroll">
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

