@extends('wap.template.theme6.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme3/css/my.css') }}" rel="stylesheet" />
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">我的消息</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content transaction-content" style="padding: 5px;margin-top: 40px;">
        <table class="pagetab historytab" style="table-layout:fixed;margin-bottom: 0px;">
            <thead>
            <tr>
                <td>时间</td>
                <td>标题</td>
                <td>内容</td>
            </tr>
            </thead>
            <tbody id="getlists">
            @if ($data->total() > 0)
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">暂无记录！</td>
                </tr>
            @endif
            </tbody>
            <tfoot id="foot">
            </tfoot>
        </table>
        {!! $data->links() !!}
    </div>
@endsection