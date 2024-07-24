@extends('wap.template.theme3.layouts.main')
@section('content')
    <link href="{{asset('/wap/theme3/css/my.css')}}" rel="stylesheet" />
    <main class="panel slideout-panel slideout-panel-left" style="background-color:#f9f9f9; height:calc(100% - 60px);">
        <div data-v-76fa910e="" class="navbar-container" style="">
            <div data-v-76fa910e="" middle="" class="logo-container"></div>
            <div data-v-76fa910e="" middle="" class="menu-container" onclick="self.location=document.referrer;">
                <div data-v-76fa910e="" relative="" style="">
                    <img data-v-76fa910e="" middle="" src="{{ asset('/wap/theme3/images/main/goback.png') }}" alt="" style="">
                </div>
            </div>
            <div data-v-76fa910e="" class="title">
                <h3 data-v-76fa910e="" class="title">反水详情</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container">
            </div>
        </div>
        <div class="layout mt12 drawRecord view">
            <p style="text-align: center;font-size: 15px;display: block;margin-top: 10px">可换金额:{{$total['fs_money']}}元</p>
            <div class="backwater" style="text-align: center">

{{--                <button onclick="yijianBackWater(1,this)" id="backWaters" disabled="disabled" class="disable" value="">一键领取</button>--}}
                <form action="{{route('wap.send_fs')}}" method="post">
                    <a  class="fs_button submit_btn ajax-submit-btn"  value="">一键领取</a>
                </form>
            </div>

            <?php
            $i= 0;
            ?>
            @foreach($list as $k => $v)
                @if(count($v) > 0)
                    <?php $i++?>
                    <p style="color: red ;font-size: 15px">{{config('platform.game_type')[$k]}}类
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
        </div>
    </main>
    <script>
        $(function () {
            // biCommon.getBackWater();
            var fs_money = '{{$total['fs_money']}}';
            if(fs_money <= 0) {
                $('.submit_btn').attr('disabled','disabled');
                $('.submit_btn').unbind('click');
                $('.submit_btn').css('background','#ccc');
            }
        })
    </script>
@endsection