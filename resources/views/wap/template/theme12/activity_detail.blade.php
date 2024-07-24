@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/promotion.css') }}" rel="stylesheet" />
    <div id="html-container-Center_PromotionsResponsiveBlock_52642">
        <div class="promotions-wrapper">
            <div class="promotions-header">
                <h1 class="promotions-header-title">优惠活动</h1><span class="promotions-header-subtitle"></span>
            </div>
            <div id="activety">
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