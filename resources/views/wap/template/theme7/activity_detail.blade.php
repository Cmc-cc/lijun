@extends('wap.template.theme7.layouts.main')
@section('content')
    <div class="layout-main">
        <div class="member-module member-module-draw">
            <div class="module-top">

                <div class="top-container navbar-nav">

                    <div class="left-menu">
                        <a href="javascript:;" onclick="window.history.back();">
                            <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                    </div>
                    <div class="page-title">活动详情</div>
                </div>
            </div>

            <div class="module-main diy-scrollbar">
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
    </div>
@endsection