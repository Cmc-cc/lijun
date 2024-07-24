@extends('wap.template.theme7.layouts.main')
@section('content')
    <link href="{{asset('/wap/theme3/css/pay.css')}}" rel="stylesheet" />
    <div class="member-module member-module-rechargeQqpay clearboth">
        <div class="module-top">

            <div class="top-container navbar-nav">

                <div class="left-menu">
                    <a href="javascript:;" onclick="window.history.back();">
                        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                </div>

                <div class="page-title">微信支付</div>
            </div>

        </div>
        <main class="panel slideout-panel slideout-panel-left">
            <div data-v-5e9fb540="" class="addCard view">
                <div class="userInfo wrap" style="padding: 10px;">
                    <p class="text-center" style="margin-bottom: 10px;">二维码扫一扫，微信快捷支付，100%安全！</p>
                    <table class="text-center" width="100%"  border="0" cellpadding="0" cellspacing="1">
                        <tbody>
                        <tr>
                            <td style="width: 35%">收款微信账号</td>
                            <td>
                                <span id="name" class="STYLE2">{{ $_system_config->wechat_account }}</span>
                                <span class="btn" onclick="tapCopy('name')" data-clipboard-target="#name" style="color: #e4393c">复制</span>
                            </td>
                        </tr>
                        <tr>
                            <td>收款微信昵称</td>
                            <td>{{ $_system_config->wechat_nickname }}</td>
                        </tr>
                        @php
                            $wechat_qrcode = explode(',',$_system_config->wechat_qrcode);
                        @endphp
                        @foreach($wechat_qrcode as $item)
                            <tr>
                                <td>微信收款二维码</td>

                                <td>
                                    <img src="{{ $item }}" width="200" height="200" style="margin-left: 0px;margin-top: 0px"/>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <p style="margin: 10px 0">温馨提示</p>
                    <div style="border: 1px solid #ccc;padding: 10px;">
                        <p><strong>温馨提示：</strong></p>
                        <p>一、在金额转出之后请务必填写该页下方的汇款信息表格，以便财务系统能够及时的为您确认并添加金额到您的会员帐户中。</p>
                        <p>二、本公司最低存款金额为100元，公司财务系统将对银行存款的会员按实际存款金额实行返利派送。</p>
                        <p>三、跨行转帐请您使用跨行快汇。</p>
                    </div>
                    <p style="margin: 10px 0;">填写汇款单</p>
                    <form id="form1" name="form1" action="{{ route('wap.post_weixin_pay') }}" method="post">
                        <table width="100%" border="0" cellpadding="0" cellspacing="1" class="mt10">
                            <tr>
                                <td align="right">用户账号：</td>
                                <td class="c_blue">{{ $_member->name }}</td>
                            </tr>
                            <tr>
                                <td align="right">存款金额：</td>
                                <td><input name="money" type="number" class="input_150" id="v_amount" maxlength="10"/></td>
                            </tr>
                            <tr id="tr_v">
                                <td align="right">微信昵称：</td>
                                <td><input name="account" type="text" class="input_150" id="v_Name" maxlength="20" /></td>
                            </tr>
                            <tr>
                                <td align="right">汇款日期：</td>
                                <td><?php $h_now = date('H');$i_now = date('i'); $s_now = date('s');?>
                                    <input name="paytime" type="text" id="cn_date" class="input_150 laydate-icon" maxlength="10" readonly="readonly" value="<?=date("Y-m-d")?>" onclick="laydate({format: 'YYYY-MM-DD', isclear: false, max: laydate.now()});" style="margin-bottom: 5px"/>
                                    <div>
                                        <select name="date_h" id="s_h" style="width: 50px">
                                            @foreach(range(00, 12) as $v)
                                                <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif @if($v == $h_now) selected @endif>@if($v < 10) 0{{ $v }} @else {{ $v }} @endif</option>
                                            @endforeach
                                        </select> 时
                                        <select name="date_i" id="s_i" style="width: 50px">
                                            @foreach(range(00, 59) as $v)
                                                <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif @if($v == $i_now) selected @endif>@if($v < 10) 0{{ $v }} @else {{ $v }} @endif</option>
                                            @endforeach
                                        </select> 分
                                        <select name="date_s" id="s_s" style="width: 50px">
                                            @foreach(range(00, 59) as $v)
                                                <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif @if($v == $s_now) selected @endif>@if($v < 10) 0{{ $v }} @else {{ $v }} @endif</option>
                                            @endforeach
                                        </select> 秒
                                    </div>
                                </td>
                            </tr>
                            <tr style="display:none;">
                                <td align="right">汇款方式：</td>
                                <td>
                                    <select id="InType" name="InType" onchange="showType();">
                                        <option value="微信手机扫一扫">微信手机扫一扫</option>
                                    </select>
                                    <div>
                                        <input id="v_type" name="v_type" type="text" class="input_150" value="请输入其它汇款方式" maxlength="20" style="display: none; margin-top: 5px" />
                                        <input type="hidden" id="IntoType" name="IntoType" value="" />
                                    </div>
                                </td>
                            </tr>
                            <tr style="display: none">
                                <td align="right">汇款地点：</td>
                                <td><input name="v_site" type="text" class="input_150" value="无" id="v_site" maxlength="50" /></td>
                            </tr>
                        </table>
                        <button type="button" class="submit_btn ajax-submit-btn" id="SubTran" style="width: 100%;background-color: rgb(63,137,100) !important;">提交信息</button>
                    </form>

                    <!--        </div>-->
                </div>
            </div>
            <!---->
        </main>
        <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
    </div>
@endsection