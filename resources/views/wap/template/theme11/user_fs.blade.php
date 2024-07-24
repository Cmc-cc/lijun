@extends('wap.template.theme11.layouts.main')
@section('content')
    <link href="{{ asset('wap/theme11/css/style3.css') }}" rel="stylesheet" />
    <div data-reactroot="" class="app_container remove appdduser/pwd">
        <div class="am-navbar am-navbar-dark">
            <div class="am-navbar-left" role="button" onclick="window.history.back();"><span class="am-navbar-left-icon" aria-hidden="true"><svg class="am-icon am-icon-left am-icon-md"><use xlink:href="#left"></use></svg></span><span class="am-navbar-left-content">返回</span></div>
            <div class="am-navbar-title">实时返水</div>
            <div class="am-navbar-right"></div>
        </div>
        <div class="container" style="padding-bottom: 140px;">
            <div class="layout mt12">
                <div style="text-align: center;font-size: 15px;padding: 10px 0px;">可换金额:<span
                            style="color: red">{{$total['fs_money']}}元</span></div>
                <div class="backwater" style="text-align: center">

                    <form action="{{route('wap.send_fs')}}" method="post">
                        <button class="ajax-submit-btn" id="backWaters">一键领取</button>
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
        </div>

        <div>
            <div class="app_bottom">
                <div class="am-tab-bar am-tab-bar-bottom">
                    <div class="am-tab-bar-content am-tab-bar-content-no-animated">
                        <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive">正在加载</div>
                        <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive">正在加载</div>
                        <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive">正在加载</div>
                        <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive">正在加载</div>
                        <div role="tabpanel" aria-hidden="true" class="am-tab-bar-tabpane am-tab-bar-tabpane-inactive">正在加载</div>
                    </div>
                    <div role="tablist" class="am-tab-bar-bar am-tab-bar-bar-hidden" tabindex="0" style="background-color: rgb(1, 54, 37);">
                        <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                            <div>
                                <div class="am-tab-bar-tab-icon" style="color: white;"><i class="icon iconfont icon-home Navset"></i></div>
                                <p class="am-tab-bar-tab-title" style="color: white;">首页</p>
                            </div>
                        </div>
                        <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                            <div>
                                <div class="am-tab-bar-tab-icon" style="color: white;"><i class="icon iconfont icon-wallet Navset"></i></div>
                                <p class="am-tab-bar-tab-title" style="color: white;">充值</p>
                            </div>
                        </div>
                        <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                            <div>
                                <div class="am-tab-bar-tab-icon" style="color: white;"><i class="icon iconfont icon-CS Navset"></i></div>
                                <p class="am-tab-bar-tab-title" style="color: white;">客服</p>
                            </div>
                        </div>
                        <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                            <div>
                                <div class="am-tab-bar-tab-icon" style="color: white;"><i class="icon iconfont icon-Promotion Navset"></i></div>
                                <p class="am-tab-bar-tab-title" style="color: white;">优惠</p>
                            </div>
                        </div>
                        <div role="tab" aria-disabled="false" aria-selected="false" class=" am-tab-bar-tab">
                            <div>
                                <div class="am-tab-bar-tab-icon" style="color: white;"><i class="icon iconfont icon-personal Navset"></i></div>
                                <p class="am-tab-bar-tab-title" style="color: white;">帐户管理</p>
                            </div>
                        </div>
                    </div>
                </div>
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