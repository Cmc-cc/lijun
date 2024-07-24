@extends('wap.template.theme11.layouts.main')
@section('content')
    <script type="text/javascript" src="{{ asset('/wap/js/clipboard.min.js') }}"></script>
    <link href="{{asset('/wap/theme3/css/pay.css')}}" rel="stylesheet" />
    <div class="am-navbar am-navbar-dark">

        <div class="am-navbar-left" role="button" onclick="window.history.back();">
        <span class="am-navbar-left-icon" aria-hidden="true">
            <svg class="am-icon am-icon-left am-icon-md">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left"></use>
            </svg>
        </span>
            <span class="am-navbar-left-content">返回</span>
        </div>
        <div class="am-navbar-title">第三方支付</div>
        <div class="am-navbar-right"></div>
    </div>
    <div class="container">
        <div style="flex: 1 1 0%;">
            <div class="userInfo wrap">
                <form id="form1" name="form1" action="{{ route('ajax_pay') }}" method="post" >
                    {!! csrf_field() !!}
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="mt10">
                        <tr>
                            <td align="right">充值类型：</td>
                            <td class="c_blue">
                                <select name="paytype" required>
                                    {{--<option value="1">支付宝</option>--}}
                                    {{--<option value="2">微信</option>--}}
                                    <option value="AliPay">支付宝扫码支付</option>
                                    <option value="WechatPay">微信扫码支付</option>
                                </select>
                            </td>
                        </tr>
                        {{--<tr>
                            <td align="right">支付姓名：</td>
                            <td class="c_blue">
                                <input type="text" name="pay_name" value="{{old('pay_name')}}" required>
                            </td>
                        </tr>
                        <tr>
                            <td  colspan="2"><span style="color: red;">支付姓名如果填写的名称与实际支付名称的对应不上，出现问题资金将无法追回</span></td>
                        </tr>--}}
                        <tr>
                            <td align="right">充值金额：</td>
                            <td><input name="amount" min="100" type="number" class="inp" id="v_amount" maxlength="10" required/></td>
                        </tr>
                        <tr>
                            <td  colspan="2"><span style="color: red;">支付时必须足元足角支付(最低支付金额100元)</span></td>
                        </tr>
                        {{--<tr id="bankcode">--}}
                        {{--<td align="right">选择银行：</td>--}}
                        {{--<td class="c_blue">--}}
                        {{--<select name="bankId" id="bankId">--}}
                        {{--<option value="ICBC">工商银行</option>--}}
                        {{--<option value="CMB">招商银行</option>--}}
                        {{--<option value="CCB">建设银行</option>--}}
                        {{--<option value="COMM">交通银行</option>--}}
                        {{--<option value="ABC">农业银行</option>--}}
                        {{--<option value="BOC">中国银行</option>--}}
                        {{--<option value="CIB">兴业银行</option>--}}
                        {{--<option value="SPDB">浦发银行</option>--}}
                        {{--<option value="CMBC">民生银行</option>--}}
                        {{--<option value="CNCB">中信银行</option>--}}
                        {{--<option value="CEB">光大银行</option>--}}
                        {{--<option value="HXB">华夏银行</option>--}}
                        {{--<option value="PSBC">邮政储蓄银行</option>--}}
                        {{--<option value="CGB">广发银行</option>--}}
                        {{--<option value="PAB">平安银行</option>--}}
                        {{--</select>--}}
                        {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr id="weixin" style="display:none">--}}
                        {{--<td align="right">微信选项</td>--}}
                        {{--<td class="c_blue">--}}
                        {{--<select name="get_code">--}}
                        {{--<option value="0">默认</option>--}}
                        {{--<option value="1">仅获取二维码</option>--}}
                        {{--</select>--}}
                        {{--</td>--}}
                        {{--</tr>--}}

                    </table>
                    <button type="submit" class="submit_btn ajax-submit-btn" id="SubTran" style="width: 100%;background-color: #00623b">提交信息</button>
                </form>

                <!--        </div>-->
            </div>
        </div>
    </div>

@endsection