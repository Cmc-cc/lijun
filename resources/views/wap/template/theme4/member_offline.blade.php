@extends('wap.template.theme4.layouts.main')
@section('content')
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
@endsection