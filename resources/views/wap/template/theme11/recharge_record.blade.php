@extends('wap.template.theme11.layouts.main')
@section('content')
    <link href="{{ asset('wap/theme11/css/style2.css') }}" rel="stylesheet" />
    <link href="{{ asset('wap/theme3/css/my.css') }}" rel="stylesheet" />
    <div data-reactroot="" class="app_container remove appdduser/pwd">
        <div class="am-navbar am-navbar-dark">
            <div class="am-navbar-left" role="button" onclick="window.history.back();"><span class="am-navbar-left-icon" aria-hidden="true"><svg class="am-icon am-icon-left am-icon-md"><use xlink:href="#left"></use></svg></span><span class="am-navbar-left-content">返回</span></div>
            <div class="am-navbar-title">充值记录</div>
            <div class="am-navbar-right"></div>
        </div>
        <div class="container">
            <div class="settwo" style="width: 98%; margin: 0px auto;">
                <div style="margin-bottom:21%"  id="mesageContent">

                    <div class="transaction-record" style="display:block">
                        <table class="pagetab" style="display:table;table-layout:fixed">
                            <thead>
                            <tr>
                                <th>充值时间</th>
                                <th>充值金额</th>
                                <th>充值状态</th>
                            </tr>
                            </thead>
                            <tbody id="siteMail">
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
                        </table>
                        {!! $data->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
        })
    </script>


@endsection