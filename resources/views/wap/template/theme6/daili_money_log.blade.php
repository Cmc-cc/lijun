@extends('wap.template.theme6.layouts.main')
@section('content')
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">佣金发放记录</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content withdraw-content clearboth">
        <link href="{{ asset('/wap/theme3/css/pay.css') }}" rel="stylesheet">
        <div class="wrap data_h_money">
            <table cellspacing="1" cellpadding="0" border="0" class="tab1 text-center">
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