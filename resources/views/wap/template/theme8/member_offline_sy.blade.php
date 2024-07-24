@extends('wap.template.theme8.layouts.main')
@section('content')
    <style>
        dd{
            margin-inline-start: 0px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('/wap/theme3/css/my.css') }}">
    <div class="mine-bet-record-body">
        <header class="mui-bar mui-bar-nav mui-action-back">
            <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
            <h1 class="mui-title">
                会员输赢报表
            </h1>
        </header>
        <div class="mui-content mine-bet-record-content mui-scroll" id="refreshContainer" data-scroll="1" data-pullrefresh="2">
            <div class="mui-scroll" style="transform: translate3d(0px, 0px, 0px) translateZ(0px);">
                <link href="{{ asset('/wap/theme3/css/pay.css') }}" rel="stylesheet">
                <div class="wrap userInfo">
                    <form id="form1" name="form1" action="" method="get">
                        <input type="hidden" name="q" value="1">
                        <table cellspacing="0" cellpadding="0" border="0" class="tab1">
                            <tr>
                                <td class="bg" align="right">开始日期：</td>
                                <td>
                                    <input name="cn_begin" type="text" id="cn_begin" required class="input_150 laydate-icon"
                                           readonly="readonly" value="<?= $cn_begin ?>" onclick="laydate();"
                                           style="cursor: pointer; margin-bottom: 5px"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg" align="right">结束日期：</td>
                                <td>
                                    <input name="cn_end" type="text" id="cn_end" required class="input_150 laydate-icon" readonly="readonly"
                                           value="<?= $cn_end ?>" onclick="laydate();" style="cursor: pointer; margin-bottom: 5px"/>
                                </td>
                            </tr>
                        </table>
                        <button type="submit"  class="submit_btn" style="background: #0062cc;line-height: 1.42;">查　询</button>
                    </form>

                    <dl>
                        <dt>
                            存款报表
                        </dt>
                        <dd style="padding: 0;border: none">
                            <table cellspacing="0" cellpadding="0" border="0" class="tab1 text-center">
                                <tr>
                                    <td width=50%">存款总额</td>
                                    <td width=50%">存款笔数</td>
                                </tr>

                                <tr>
                                    <td>{{ $total_recharge }}</td>
                                    <td>{{ $recharge_count }}</td>
                                </tr>
                            </table>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            提款报表
                        </dt>
                        <dd style="padding: 0;border: none">
                            <table cellspacing="0" cellpadding="0" border="0" class="tab1 text-center">
                                <tr>
                                    <td width=50%">提款总额</td>
                                    <td width=50%">提款笔数</td>
                                </tr>
                                <tr>
                                    <td>{{ $total_drawing }}</td>
                                    <td>{{ $drawing_count }}</td>
                                </tr>
                            </table>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            红利报表
                        </dt>
                        <dd style="padding: 0;border: none">
                            <table cellspacing="0" cellpadding="0" border="0" class="tab1 text-center">
                                <tr>
                                    <td width=50%">红利总额</td>
                                    <td width=50%">红利笔数</td>
                                </tr>
                                <tr>
                                    <td>{{ $total_dividend }}</td>
                                    <td>{{ $dividend_count }}</td>
                                </tr>
                            </table>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            汇总报表
                        </dt>
                        <dd style="padding: 0;border: none">
                            <table cellspacing="0" cellpadding="0" border="0" class="tab1 text-center">
                                <tr>
                                    <td width=50%">盈利</td>
                                    <td width=50%">会员输赢</td>
                                </tr>
                                <tr>
                                    <td>{{ $total_recharge - $total_drawing  }}</td>
                                    <td>{{ $total_drawing -  $total_recharge }}</td>
                                </tr>
                            </table>
                        </dd>
                    </dl>
                </div>
                <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
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