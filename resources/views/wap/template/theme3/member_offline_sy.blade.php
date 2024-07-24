@extends('wap.template.theme3.layouts.main')
@section('content')
    <link href="{{asset('/wap/theme3/css/pay.css')}}" rel="stylesheet" />
    <main class="panel slideout-panel slideout-panel-left">
        <!---->
        <div data-v-76fa910e="" class="navbar-container" style="">
            <div data-v-76fa910e="" middle="" class="logo-container"></div>
            <div data-v-76fa910e="" middle="" class="menu-container" onclick="self.location=document.referrer;">
                <div data-v-76fa910e="" relative="" style="">
                    <img data-v-76fa910e="" middle="" src="{{asset('/wap/theme3/images/main/goback.png')}}" alt="" style="">
                </div>
            </div>
            <div data-v-76fa910e="" class="title">
                <h3 data-v-76fa910e="" class="title">会员输赢报表</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>
        <div data-v-5e9fb540="" class="addCard view">
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
                    <button type="submit"  class="submit_btn">查　询</button>
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
        </div>
        <!---->
    </main>
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
    <script>
        /*biCommon.getBindbank($("#banknode"), $("#card"), $("#bankname"), $("#UserName"), 2);
        biCommon.getWithdrawBankList();*/
    </script>
@endsection