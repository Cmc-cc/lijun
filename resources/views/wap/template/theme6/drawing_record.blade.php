@extends('wap.template.theme6.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme3/css/my.css') }}" rel="stylesheet" />
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">提款记录</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content transaction-content" style="padding: 5px;margin-top: 40px;">
        <div class="layout mt12">
            <table class="pagetab historytab" style="table-layout:fixed; ">
                <thead>
                <tr>
                    <th>提款时间</th>
                    <th>提款金额</th>
                    <th>提款状态</th>
                    <th>失败原因</th>
                </tr>
                </thead>
                <tbody id="getlists">
                @if ($data->total() > 0)
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->money }}</td>
                            <td>{!! \App\Models\Base::$DRAWING_STATUS_HTML[$item->status] !!}</td>
                            <td>{{ $item->fail_reason }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">暂无提款记录！</td>
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