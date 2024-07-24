@extends('wap.template.theme8.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('/wap/theme3/css/my.css') }}">
    <div class="mine-bet-record-body">
        <header class="mui-bar mui-bar-nav mui-action-back">
            <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
            <h1 class="mui-title">
                佣金发放记录
            </h1>
        </header>
        <div class="mui-content mine-bet-record-content mui-scroll" id="refreshContainer" data-scroll="1" data-pullrefresh="2">
            <div class="mui-scroll" style="transform: translate3d(0px, 0px, 0px) translateZ(0px);">
                <!-- 主界面具体展示内容 -->
                <div class="mine-table">
                    <table>
                        <thead class="tic">
                        <tr class="head">
                            <td width="33.333%">发放佣金</td>
                            <td width="33.333%">发放时间</td>
                            <td width="33.333%">备注</td>
                        </tr>
                        </thead>
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
                <div class="mui-pull-bottom-pocket">
                    <div class="mui-pull">
                        <div class="mui-pull-loading mui-icon mui-spinner"></div>
                        <div class="mui-pull-caption">上拉显示更多</div>
                    </div>
                </div>
            </div>
            <div class="mui-scrollbar mui-scrollbar-vertical">
                <div class="mui-scrollbar-indicator" style="transition-duration: 0ms; display: block; height: 8px; transform: translate3d(0px, 613px, 0px) translateZ(0px);"></div>
            </div>
        </div>
    </div>
    <script>
        mui(".pagination").on('tap','a',function(){
            var url = $(this).attr('href');
            window.location.href= url;
        })
    </script>
@endsection