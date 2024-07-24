@extends('wap.template.theme9.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme9/css/promotion.css') }}" rel="stylesheet">
    <section id="content">
        <section id="promotion" class="ng-scope">
            <div id="page-title">优惠详情</div>
            <div class="inner">
                <div class="member-module member-module-draw">
                    <div class="module-main diy-scrollbar">
                        <div>
                            <div>
                                <div class="main-container" id="activety" style="text-align: center">
                                    <div class="hd-tit" style="padding: 10px;background: #fdf7f7;">
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
                    </div>
                </div>
            </div>
        </section>


    </section>
@endsection