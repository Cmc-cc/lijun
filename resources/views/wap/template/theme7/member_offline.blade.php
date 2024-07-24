@extends('wap.template.theme7.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('/wap/theme3/css/pay.css') }}">
    <div class="member-money-module member-money-module-index">
        <div class="module-top">
            <div class="top-container navbar-nav">
                <div class="left-menu">
                    <a href="javascript:;" onclick="window.history.back();">
                        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                </div>
                <div class="page-title">下线会员</div>
            </div>

        </div>
        <div class="module-main diy-scrollbar">
            <table cellspacing="1" cellpadding="0" border="0" class="tab1 text-center pagetab">
                <tr class="tic">
                    <th width="25%">用户名</th>
                    <th width="25%">姓名</th>
                    <th width="25%">当前余额</th>
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