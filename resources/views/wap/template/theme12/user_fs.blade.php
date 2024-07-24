@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/history.css') }}" rel="stylesheet" />
    <div class="layout mt12">
        <div style="text-align: center;font-size: 15px;padding: 10px 0px;">可换金额:<span
                    style="color: red">{{$total['fs_money']}}元</span></div>
        <div class="backwater" style="text-align: center">

            <form action="{{route('wap.send_fs')}}" method="post">
                <button style="float: none;display: inline-block" class="ajax-submit-btn" id="backWaters">一键领取</button>
            </form>
        </div>
        <table class="pagetab historytab" style="table-layout:fixed; ">
            <?php
            $i= 0;
            ?>
            @foreach($list as $k => $v)
                @if(count($v) > 0)
                    <?php $i++?>
                    <p style="color: red ;font-size: 15px;display: block;padding: 10px 0px;text-align: center">{{config('platform.game_type')[$k]}}类
                        <span>&nbsp;&nbsp;最近{{date('Y-m-d H:i:s')}}</span>
                    </p>
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
    <script>
        $(function () {
            var fs_money = '{{$total['fs_money']}}';
            if(fs_money <= 0) {
                $('#backWaters').attr('disabled','disabled');
                $('#backWaters').unbind('click');
                $('#backWaters').css('background','#ccc');
            }
        })
    </script>



@endsection