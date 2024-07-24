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
                <h3 data-v-76fa910e="" class="title">额度转换记录</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>

        <div data-v-0ba198ab="" class="drawRecord view">
            <div data-v-0ba198ab="" class="scroll">

                <div data-v-0ba198ab="" class="TranRecord-top2" style="text-align: center;padding-bottom: 10px">
                    <form id="form1" name="form1" action="" method="get">
                        <table cellspacing="0" cellpadding="0" border="0" class="tab1">
                            <!--                    <tr>-->
                            <!--                        <td class="bg" align="right">转账类型：</td>-->
                            <!--                        <td>-->
                            <!--                            <select name="zz_type" id="zz_type">-->
                            <!--                                <option value="" <!全部</option>-->
                            <!--                            </select>-->
                            <!--                        </td>-->
                            <!--                    </tr>-->
                            <tbody><tr>
                                <td class="bg" align="right">开始日期：</td>
                                <td>
                                    <input name="cn_begin" type="text" id="cn_begin" class="input_150 laydate-icon" readonly="readonly" value="<?=$cn_begin?>" onclick="laydate();" style="cursor: pointer; margin-bottom: 5px">
                                    <div>
                                        <select name="s_begin_h" id="s_begin_h" style="width: 70px">
                                            <?php
                                            for($bh_i=0;$bh_i<24;$bh_i++){
                                            $b_h_value=$bh_i<10?"0".$bh_i:$bh_i;
                                            ?>
                                            <option value="<?=$b_h_value?>" <?=$s_begin_h==$b_h_value?"selected":""?>><?=$b_h_value?></option>
                                            <?php } ?>
                                        </select> 时
                                        <select name="s_begin_i" id="s_begin_i" style="width: 70px">
                                            <?php
                                            for($bh_j=0;$bh_j<60;$bh_j++){
                                            $b_i_value=$bh_j<10?"0".$bh_j:$bh_j;
                                            ?>
                                            <option value="<?=$b_i_value?>" <?=$s_begin_i==$b_i_value?"selected":""?>><?=$b_i_value?></option>
                                            <?php } ?>
                                        </select> 分
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg" align="right">结束日期：</td>
                                <td>
                                    <input name="cn_end" type="text" id="cn_end" class="input_150 laydate-icon" readonly="readonly" value="<?=$cn_end?>" onclick="laydate();" style="cursor: pointer; margin-bottom: 5px">
                                    <div>
                                        <select name="s_end_h" id="s_end_h" style="width: 70px">
                                            <?php
                                            for($eh_i=0;$eh_i<24;$eh_i++){
                                            $e_h_value=$eh_i<10?"0".$eh_i:$eh_i;
                                            ?>
                                            <option value="<?=$e_h_value?>" <?=$s_end_h==$e_h_value?"selected":""?>><?=$e_h_value?></option>
                                            <?php } ?>
                                        </select> 时
                                        <select name="s_end_i" id="s_end_i" style="width: 70px">
                                            <?php
                                            for($eh_j=0;$eh_j<60;$eh_j++){
                                            $e_i_value=$eh_j<10?"0".$eh_j:$eh_j;
                                            ?>
                                            <option value="<?=$e_i_value?>" <?=$s_end_i==$e_i_value?"selected":""?>><?=$e_i_value?></option>
                                            <?php } ?>
                                        </select> 分
                                    </div>
                                </td>
                            </tr>
                            </tbody></table>



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
                                <th>转账时间</th>
                                <th>金额</th>
                                <th>转出/转入账户</th>
                                <th>转换状态</th>
                            </tr>
                            </thead>
                            <tbody id="cashin">
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
                    </div>
                    {!! $data->appends(['cn_begin' => $cn_begin, 'cn_end' => $cn_end, 's_begin_h' => $s_begin_h, 's_begin_i' => $s_begin_i, 's_end_h' => $s_end_h, 's_end_i' => $s_end_i])->links() !!}
                </div>
                <div data-v-0ba198ab="" relative="" class="payRecord-content">
                    <div data-v-ecaca2b0="" data-v-0ba198ab="" id="outer-7kqct" class="_v-container" style="position: absolute; width: 100%; height: 100%;">
                        <div data-v-ecaca2b0="" id="inner-ebazf" class="_v-content" style="transform: translate3d(0px, 0px, 0px) scale(1);">
                            <!---->

                            <div data-v-0ba198ab="" data-v-ecaca2b0="" style="height: 1px;"></div>
                            <div data-v-ecaca2b0="" class="loading-layer">
                                <span data-v-ecaca2b0="" class="spinner-holder">
                                    <svg data-v-ecaca2b0="" viewBox="0 0 64 64" class="spinner" style="fill: rgb(170, 170, 170); stroke: rgb(170, 170, 170);">
                                        <g stroke-width="4" stroke-linecap="round">
                                            <line y1="17" y2="29" transform="translate(32,32) rotate(180)">
                                                <animate attributeName="stroke-opacity" dur="750ms" values="1;.85;.7;.65;.55;.45;.35;.25;.15;.1;0;1" repeatCount="indefinite"></animate>
                                            </line>
                                            <line y1="17" y2="29" transform="translate(32,32) rotate(210)">
                                                <animate attributeName="stroke-opacity" dur="750ms" values="0;1;.85;.7;.65;.55;.45;.35;.25;.15;.1;0" repeatCount="indefinite"></animate>
                                            </line>
                                            <line y1="17" y2="29" transform="translate(32,32) rotate(240)">
                                                <animate attributeName="stroke-opacity" dur="750ms" values=".1;0;1;.85;.7;.65;.55;.45;.35;.25;.15;.1" repeatCount="indefinite"></animate>
                                            </line>
                                            <line y1="17" y2="29" transform="translate(32,32) rotate(270)">
                                                <animate attributeName="stroke-opacity" dur="750ms" values=".15;.1;0;1;.85;.7;.65;.55;.45;.35;.25;.15" repeatCount="indefinite"></animate>
                                            </line>
                                            <line y1="17" y2="29" transform="translate(32,32) rotate(300)">
                                                <animate attributeName="stroke-opacity" dur="750ms" values=".25;.15;.1;0;1;.85;.7;.65;.55;.45;.35;.25" repeatCount="indefinite"></animate>
                                            </line>
                                            <line y1="17" y2="29" transform="translate(32,32) rotate(330)">
                                                <animate attributeName="stroke-opacity" dur="750ms" values=".35;.25;.15;.1;0;1;.85;.7;.65;.55;.45;.35" repeatCount="indefinite"></animate>
                                            </line>
                                            <line y1="17" y2="29" transform="translate(32,32) rotate(0)">
                                                <animate attributeName="stroke-opacity" dur="750ms" values=".45;.35;.25;.15;.1;0;1;.85;.7;.65;.55;.45" repeatCount="indefinite"></animate>
                                            </line>
                                            <line y1="17" y2="29" transform="translate(32,32) rotate(30)">
                                                <animate attributeName="stroke-opacity" dur="750ms" values=".55;.45;.35;.25;.15;.1;0;1;.85;.7;.65;.55" repeatCount="indefinite"></animate>
                                            </line>
                                            <line y1="17" y2="29" transform="translate(32,32) rotate(60)">
                                                <animate attributeName="stroke-opacity" dur="750ms" values=".65;.55;.45;.35;.25;.15;.1;0;1;.85;.7;.65" repeatCount="indefinite"></animate>
                                            </line>
                                            <line y1="17" y2="29" transform="translate(32,32) rotate(90)">
                                                <animate attributeName="stroke-opacity" dur="750ms" values=".7;.65;.55;.45;.35;.25;.15;.1;0;1;.85;.7" repeatCount="indefinite"></animate>
                                            </line>
                                            <line y1="17" y2="29" transform="translate(32,32) rotate(120)">
                                                <animate attributeName="stroke-opacity" dur="750ms" values=".85;.7;.65;.55;.45;.35;.25;.15;.1;0;1;.85" repeatCount="indefinite"></animate>
                                            </line>
                                            <line y1="17" y2="29" transform="translate(32,32) rotate(150)">
                                                <animate attributeName="stroke-opacity" dur="750ms" values="1;.85;.7;.65;.55;.45;.35;.25;.15;.1;0;1" repeatCount="indefinite">
                                                </animate>
                                            </line>
                                        </g>
                                    </svg>
                                </span>
                                <div data-v-ecaca2b0="" class="no-data-text active" style="color: rgb(170, 170, 170);">没有更多数据</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!---->
    </main>
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
@endsection