@extends('wap.template.theme9.layouts.main')
@section('content')
    <section id="content">
        <style>
            .atd .atd-content {
                padding: 15px;
            }
            .green{color:green}
            .red{color:red;}
            .btn{border:none}
        </style>
        <section class="atd ng-scope">
            <div id="page-title">时时返水</div>
            <div class="atd-content">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p class="atd-title ng-binding ng-scope"></p>
                        <div class="table-responsive">
                            <p style="text-align: center;font-size: 15px;display: block;margin-top: 10px">可换金额:<span style="color: red">{{$total['fs_money']}}元</span></p>
                            <div class="backwater" style="text-align: center">
                            </div>
                                <?php
                                $i= 0;
                                ?>
                                @foreach($list as $k => $v)
                                    @if(count($v) > 0)
                                        <?php $i++?>
                                        <div style="text-align:center;color: red ;font-size: 15px;margin-bottom: 5px;margin-top: 10px;">{{config('platform.game_type')[$k]}}类
                                            <span>&nbsp;&nbsp;最近{{date('Y-m-d H:i:s')}}</span>
                                        </div>
                                        <table class="table table-bordered" style="table-layout:fixed;border: 1px solid #c1c1c1;">
                                            <thead>
                                            <tr>
                                                <td>日期</td>
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
                                    <table class="table table-bordered" style="table-layout:fixed;border: 1px solid #c1c1c1; ">
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
                        <div class="atd-operator" style="z-index: 10;">
                            <form action="{{route('wap.send_fs')}}" method="post">
                            <button type="button" class="btn btn-danger btn-block ng-scope ajax-submit-btn"  id="backWaters"  value="" >领取</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>
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