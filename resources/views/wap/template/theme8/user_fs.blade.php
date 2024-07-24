@extends('wap.template.theme8.layouts.main')
@section('content')
    <div class="mine-bet-record-body">
        <header class="mui-bar mui-bar-nav mui-action-back">
            <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
            <h1 class="mui-title">
                返水详情
            </h1>
        </header>
        <div class="mui-content mine-bet-record-content mui-scroll" id="refreshContainer" data-scroll="1" data-pullrefresh="2">
            <div class="mui-scroll" style="transform: translate3d(0px, 0px, 0px) translateZ(0px);">
                <!-- 主界面具体展示内容 -->
                <div class="mine-table">
                    <p style="text-align: center;font-size: 15px;display: block;margin-top: 10px">可换金额:<span style="color: red">{{$total['fs_money']}}元</span></p>
                    <div class="backwater" style="text-align: center">
                        <form action="{{route('wap.send_fs')}}" method="post">
                            <button class="ajax-submit-btn"  id="backWaters" >一键领取</button>
                        </form>
                    </div>
                    <table>
                        <?php
                        $i= 0;
                        ?>
                        @foreach($list as $k => $v)
                            @if(count($v) > 0)
                                <?php $i++?>
                                <div style="text-align:center;color: red ;font-size: 15px;margin-bottom: 5px;margin-top: 10px;">{{config('platform.game_type')[$k]}}类
                                    <span>&nbsp;&nbsp;最近{{date('Y-m-d H:i:s')}}</span>
                                </div>
                                <table class="pagetab historytab" style="table-layout:fixed; ">
                                    <thead>
                                    <tr>
                                        <th>日期</th>
                                        <th>投注流水</th>
                                        <th>返水等级</th>
                                        <th>返水额度</th>
                                    </tr>
                                    </thead>
                                    <tbody id="backWaterList">
                                    @foreach($v as $kk => $vv)
                                        <tr>
                                            <td>{{$kk}}@if($kk == date('Y-m-d')) (今天) @endif</td>
                                            <td>{{sprintf('%.2f',$vv['tz_amount'])}}元</td>
                                            <td>{{$vv['level_name'] ? $vv['level_name'] : '未满足条件'}}</td>
                                            <td>{{$vv['fs_money']}}元</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        @endforeach
                        @if($i  <= 0)
                            <table class="pagetab historytab" style="table-layout:fixed; ">
                                <thead>
                                <tr>
                                    <th>日期</th>
                                    <th>投注流水</th>
                                    <th>返水等级</th>
                                    <th>返水额度</th>
                                </tr>
                                </thead>
                                <tr>
                                    <td colspan="4" style="text-align: center;">暂无记录</td>
                                </tr>
                            </table>
                        @endif
                    </table>
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
        $(function () {
            // biCommon.getBackWater();
            var fs_money = '{{$total['fs_money']}}';
            if(fs_money <= 0) {
                $('#backWaters').attr('disabled','disabled');
                $('#backWaters').unbind('click');
                $('#backWaters').css('background','#ccc');
            }
        })
    </script>
@endsection