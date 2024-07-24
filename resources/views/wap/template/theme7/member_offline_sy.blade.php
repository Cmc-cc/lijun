@extends('wap.template.theme7.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('/wap/theme3/css/pay.css') }}">
    <div class="member-money-module member-money-module-index">
        <div class="module-top">
            <div class="top-container navbar-nav">
                <div class="left-menu">
                    <a href="javascript:;" onclick="window.history.back();">
                        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                </div>
                <div class="page-title">会员输赢报表</div>
            </div>

        </div>
        <div class="module-main diy-scrollbar">
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
                    <button type="submit"  class="submit_btn" style="background: linear-gradient(rgb(76,145,110),rgb(0,50,0));line-height: normal;">查　询</button>
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
                                <td>{{ $total_recharge - $total_drawing }}</td>
                                <td>{{ $total_drawing -  $total_recharge }}</td>
                            </tr>
                        </table>
                    </dd>
                </dl>
            </div>
            <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
        </div>
    </div>
@endsection