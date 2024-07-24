@extends('wap.template.theme6.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme3/css/my.css') }}" rel="stylesheet" />
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">充值记录</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content transaction-content" style="padding: 5px;margin-top: 40px;">
        <div class="layout mt12">
            <table class="pagetab historytab" style="table-layout:fixed; ">
                <thead>
                <tr>
                    <th>充值时间</th>
                    <th>充值金额</th>
                    <th>充值状态</th>
                    {{--<th>输赢</th>
                    <th style="white-space: normal;word-break: normal">时间</th>--}}
                </tr>
                </thead>
                <tbody id="getlists">
                @if ($data->total() > 0)
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->money }}</td>
                            <td>{!! \App\Models\Base::$RECHARGE_STATUS_HTML[$item->status] !!}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">暂无充值记录！</td>
                    </tr>
                @endif
                </tbody>
                <tfoot id="foot">
                </tfoot>
            </table>
            {!! $data->links() !!}

        </div>
    </div>
    <script>
        $(function () {

        })
    </script>
@endsection