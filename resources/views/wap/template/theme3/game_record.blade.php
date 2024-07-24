@extends('wap.template.theme3.layouts.main')
@section('content')
    <link href="{{asset('/wap/theme3/css/my.css')}}" rel="stylesheet" />
    <main class="panel slideout-panel slideout-panel-left" id="transactionContent" style="height:calc(100% - 60px);">
        <!---->
        <div data-v-76fa910e="" class="navbar-container" style="">
            <div data-v-76fa910e="" middle="" class="logo-container"></div>
            <div data-v-76fa910e="" middle="" class="menu-container" onclick="self.location=document.referrer;">
                <div data-v-76fa910e="" relative="" style="">
                    <img data-v-76fa910e="" middle="" src="{{ asset('/wap/theme3/images/main/goback.png') }}" alt="" style="">
                </div>
            </div>
            <div data-v-76fa910e="" class="title">
                <h3 data-v-76fa910e="" class="title">游戏记录</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>

        <div data-v-0ba198ab="" class="drawRecord view">
            <div data-v-0ba198ab="" class="scroll">
                <div data-v-0ba198ab="" class="TranRecord-top2" style="text-align: center;padding-bottom: 10px">
                    <form id="form1" name="form1" action="" method="get">

                        <div class="line">
                            <span>平台</span>
                            <select name="api_type" id="api_type" required>
                                <option value="">--请选择--</option>
                                @foreach($_api_list as $k => $v)
                                    @if($v=='AGS' || $v=='SUNBETS')
                                        @continue
                                    @endif
                                    <option value="{{ $k }}" @if($api_type == $k) selected @endif>{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div data-v-0ba198ab="" class="search" style="">
                            <button data-v-0ba198ab="" class="button van-button van-button--default van-button--normal"  style="background-color: rgb(0, 0, 0);float: none;width: 18em;">
                                查询
                            </button>
                        </div>
                    </form>
                </div>
                <div class="table-content">
                    {{--<div class="page-cont">
                        <div class="first">共 <span id="page">0</span> 页,总计 <span id="pageCount">-</span> 条</div>
                        <div class="second">
                            <button onclick="getMeg('-1')">上一页</button>
                            <input type="number" id="num" min="1" value="1">
                            <button onclick="getMeg('+0')">确定</button>
                            <button onclick="getMeg('+1')">下一页</button>
                        </div>
                    </div>--}}
                    <div class="mine-table">
                        <table class="historytab" datasource="cashin">
                            <thead>
                            <tr>
                                <td>平台</td>
                                <td>游戏名称</td>
                                <td>有效</td>
                                <td>投注</td>
                                <td>输赢</td>
                                <td>时间</td>
                            </tr>
                            </thead>
                            <tbody id="cashin">
                            @if ($data->total() > 0)
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{--{{ $_api_list[$item->api_type] }}--}}
                                            <?php
                                            $plat_type = $_api_list[$item->api_type];
                                            if($plat_type == 'AGS'){
                                                echo 'AG';
                                            }elseif ($plat_type == 'SUNBETS'){
                                                echo 'SUNBET';
                                            }else{
                                                echo $plat_type;
                                            }
                                            ?>
                                        </td>
                                        <td>{{ $item->gameCode }}</td>
                                        <td>{{ $item->validBetAmount }}</td>
                                        <td>{{ $item->betAmount }}</td>
                                        <td>{{ $item->netAmount }}</td>
                                        <td>{{ $item->betTime }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">暂无投注记录！</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {!! $data->appends(['api_type' => $api_type])->links() !!}
                </div>


            </div>
        </div>
        <!---->
    </main>
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
@endsection