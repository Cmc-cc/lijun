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
                <div class="page-title">佣金发放记录</div>
            </div>

        </div>
        <div class="module-main diy-scrollbar">
            <table cellspacing="1" cellpadding="0" border="0" class="tab1 text-center pagetab historytab">
                <tr class="tic">
                    <td width="33.333%">发放佣金</td>
                    <td width="33.333%">发放时间</td>
                    <td width="33.333%">备注</td>
                </tr>
                @if ($data->total() > 0)
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->money }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->remark }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">暂无发放记录！</td>
                    </tr>
                @endif
            </table>
            {!! $data->render() !!}
        </div>
    </div>
@endsection