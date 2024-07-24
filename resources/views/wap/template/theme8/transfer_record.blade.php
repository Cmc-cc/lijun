@extends('wap.template.theme8.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('/wap/theme3/css/my.css') }}">
    <div class="mine-bet-record-body">
        <header class="mui-bar mui-bar-nav mui-action-back">
            <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
            <h1 class="mui-title">
                额度转换记录
            </h1>
        </header>
        <div class="mui-content mine-bet-record-content mui-scroll" id="refreshContainer" data-scroll="1" data-pullrefresh="2">
            <div class="mui-scroll" style="transform: translate3d(0px, 0px, 0px) translateZ(0px);">
                <!-- 主界面具体展示内容 -->
                <div class="mui-row">
                    <div class="mui-input-group mine-form data-filter">
                        <form id="form1" name="form1" action="" method="get">
                            <div class="gb-datafilter">
                                投注日期:
                                <span class="input-date">
                                <a href=""></a>
                                <input class="date" name="cn_begin" type="date" id="startTime" value="<?php echo $cn_begin?>" max="<?php echo date('Y-m-d') ?>">
                            </span>
                                ~
                                <span class="input-date">
                                <a href=""></a>
                                <input class="date" name="cn_end" type="date" id="endTime" value="<?php echo $cn_end?>" max="<?php echo date('Y-m-d') ?>">
                            </span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="gb-datafilter" style="padding:0;padding-bottom:13px;margin-left:10px">
                                <button type="submit"  class="btn mui-btn mui-btn-primary btn-ss" style="width: 35%;">搜索</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mine-table">
                    <table>
                        <thead>
                        <tr class="head">
                            <td>转账时间</td>
                            <td>金额</td>
                            <td>转出/转入账户</td>
                            <td>转换状态</td>
                        </tr>
                        </thead>
                        <tbody id="getlists">
                        @if ($data->total() > 0)

                            @foreach($data as $item)
                                @if($item->transfer_out_account == 'AGS账户')
                                    <?php
                                    $item->transfer_out_account = 'AG账户'
                                    ?>
                                @endif
                                @if($item->transfer_in_account == 'AGS账户')
                                    <?php
                                    $item->transfer_in_account = 'AG账户'
                                    ?>
                                @endif
                                @if($item->transfer_out_account == 'SUNBETS账户')
                                    <?php
                                    $item->transfer_out_account = 'SUNBET账户'
                                    ?>
                                @endif
                                @if($item->transfer_in_account == 'SUNBETS账户')
                                    <?php
                                    $item->transfer_in_account = 'SUNBET账户'
                                    ?>
                                @endif
                                <tr>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->money }}</td>
                                    <td>{{ $item->transfer_out_account }}/{{ $item->transfer_in_account }}</td>
                                    <td>成功</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">暂无转换记录！</td>
                            </tr>
                        @endif
                        </tbody>

                    </table>
                    {!! $data->appends(['cn_begin' => $cn_begin, 'cn_end' => $cn_end, 's_begin_h' => $s_begin_h, 's_begin_i' => $s_begin_i, 's_end_h' => $s_end_h, 's_end_i' => $s_end_i])->links() !!}
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