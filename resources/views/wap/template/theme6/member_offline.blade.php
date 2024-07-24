@extends('wap.template.theme6.layouts.main')
@section('content')
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">下线会员</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content withdraw-content clearboth">
        <link href="{{ asset('/wap/theme3/css/pay.css') }}" rel="stylesheet">
        <div class="wrap data_h_money">
            <table cellspacing="1" cellpadding="0" border="0" class="tab1 text-center">
                <tr class="tic">
                    <td width="25%">用户名</td>
                    <td width="25%">姓名</td>
                    <td width="25%">当前余额</td>
                    {{--                        <td width="25%">管理</td>--}}
                </tr>
                @if ($data->total() > 0)
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->real_name }}</td>
                            <td>{{ $item->money }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">暂无下线会员！</td>
                    </tr>
                @endif
            </table>
            {!! $data->render() !!}
        </div>
    </div>
@endsection