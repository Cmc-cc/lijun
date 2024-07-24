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
                <h3 data-v-76fa910e="" class="title">提款记录</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>

        <div data-v-0ba198ab="" class="drawRecord view">
            <div data-v-0ba198ab="" class="scroll">
                {{--<div data-v-0ba198ab="" class="TranRecord-top">
--}}{{--                    <input type="date" class="date1" data-v-0ba198ab="" id="startTime" value="2019-12-30" max="2019-12-30">--}}{{--
                    <span data-v-0ba198ab="" class="centerText">开始时间：</span>
                    <input type="text" class="date1" onclick="laydate();" data-v-0ba198ab="" id="startTime" value="2019-12-30" max="2019-12-30">
                    <!--<div data-v-0ba198ab="" relative="" class="date1">
                <span data-v-0ba198ab="">2019-07-03</span>
            </div> -->
                    --}}{{--<br/>
                    <span data-v-0ba198ab="" class="centerText">至</span>--}}{{--
                    <br/>
                    <span data-v-0ba198ab="" class="centerText">结束时间：</span>
                    <input type="text" class="date2" onclick="laydate();" data-v-0ba198ab="" id="endTime" value="2019-12-30" max="2019-12-30">
                    <!--<div data-v-0ba198ab="" relative="" class="date2">
                 <span data-v-0ba198ab="">2019-07-03</span></div>-->
                </div>--}}

                {{--<div data-v-0ba198ab="" class="TranRecord-top2" style="text-align: center;padding-bottom: 10px">
                    --}}{{--<span for="van-button__text">查询类型</span>
                    <select id="transactionSel" class="form-control" name="type" onchange="transactionChange();">
                        <option value="0" type="1" datasource="cashin">存款</option>
                        <option value="1" type="2" datasource="cashin">汇款</option>
                        <option value="2" type="3" datasource="cashin">提款</option>
                        <option value="3" type="" datasource="transferrecord">转账</option>
                        <option value="4" type="5" datasource="cashin">优惠</option>
                        <option value="5" type="4" datasource="cashin">返水</option>
                        <option value="6" type="7" datasource="cashin">红包</option>
                    </select>--}}{{--
                    <div data-v-0ba198ab="" class="search" style="">
                        <button data-v-0ba198ab="" class="button van-button van-button--default van-button--normal" onclick="getMeg('+0')" style="background-color: rgb(0, 0, 0);float: none;width: 18em;">
                            查询
                        </button>
                    </div>
                </div>--}}
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
                                <th>提款时间</th>
                                <th>提款金额</th>
                                <th>提款状态</th>
                                <th>失败原因</th>
                            </tr>
                            </thead>
                            <tbody id="cashin">
                            @if ($data->total() > 0)
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->money }}</td>
                                        <td>{!! \App\Models\Base::$DRAWING_STATUS_HTML[$item->status] !!}</td>
                                        <td>{{ $item->fail_reason }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">暂无提款记录！</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                        <table class="historytab" datasource="transferrecord" style="display:none;">
                            <thead>
                            <tr>
                                <th>操作类型</th>
                                <th>操作时间</th>
                                <th>操作金额</th>
                                <th>是否成功</th>
                                <th>操作详细</th>
                            </tr>
                            </thead>
                            <tbody id="transferrecord"></tbody>
                        </table>
                    </div>
                    {!! $data->links() !!}
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