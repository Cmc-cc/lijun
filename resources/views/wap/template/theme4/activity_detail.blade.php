@extends('wap.template.theme4.layouts.main')
@section('content')
    <div class="layout mt12 person-cont clearboth">
        <div class="hd-tit">
            {{--<h3 class="title t_1">{{ $data->title }}</h3>--}}
            {!! $data->title_content !!}
            {{--<h3 class="title t_2">活动说明</h3>--}}
            {!! $data->content !!}
            {{--<h3 class="title t_3">活动规则</h3>--}}
            {!! $data->rule_content !!}
        </div>
        <input type="submit" class="confirm-sub mt20" value="返 回" onclick="history.go('-1')" id="btn">
    </div>
@endsection