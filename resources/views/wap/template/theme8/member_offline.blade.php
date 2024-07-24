@extends('wap.template.theme8.layouts.main')
@section('content')
    <style>
        dd{
            margin-inline-start: 0px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('/wap/theme3/css/my.css') }}">
    <div class="mine-bet-record-body">
        <header class="mui-bar mui-bar-nav mui-action-back">
            <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
            <h1 class="mui-title">
                下线会员
            </h1>
        </header>
        <div class="mui-content mine-bet-record-content mui-scroll" id="refreshContainer" data-scroll="1" data-pullrefresh="2">
            <div class="mine-table">
                <table>
                    <thead>
                    <tr class="head">
                        <td>用户名</td>
                        <td>姓名</td>
                        <td>当前余额</td>
                    </tr>
                    </thead>
                    <tbody id="getlists">
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
                    </tbody>

                </table>
                {!! $data->links() !!}
        </div>
    </div>
    <script>
        mui(".pagination").on('tap','a',function(){
            var url = $(this).attr('href');
            window.location.href= url;
        })
    </script>
@endsection