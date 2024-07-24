@extends('wap.template.theme11.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme11/css/style2.css') }}" rel="stylesheet"/>
    <div data-reactroot="" class="app_container remove appdduser/pwd">
        <div class="am-navbar am-navbar-dark">
            <div class="am-navbar-left" role="button" onclick="window.history.back();"><span class="am-navbar-left-icon"
                                                                                             aria-hidden="true"><svg
                            class="am-icon am-icon-left am-icon-md"><use xlink:href="#left"></use></svg></span><span
                        class="am-navbar-left-content">返回</span></div>
            <div class="am-navbar-title">活动详情</div>
            <div class="am-navbar-right"></div>
        </div>
        <div class="container">
            <div class="hd-tit" style="padding: 10px;">
                {{--<h3 class="title t_1">{{ $data->title }}</h3>--}}
                {!! $data->title_content !!}
                {{--<h3 class="title t_2">活动说明</h3>--}}
                {!! $data->content !!}
                {{--<h3 class="title t_3">活动规则</h3>--}}
                {!! $data->rule_content !!}
            </div>
        </div>
    </div>
@endsection