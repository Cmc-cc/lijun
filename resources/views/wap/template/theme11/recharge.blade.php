@extends('wap.template.theme11.layouts.main')
@section('content')
    <div class="app_header">
        <div class="am-navbar am-navbar-dark">
            <div class="am-navbar-left" role="button">
            <span class="am-navbar-left-content" onclick="Opentoolbar();">
                <img src="{{ asset('wap/theme11/images/menu_burger.png') }}" class="headIcon" />
            </span>
            </div>
            <div class="am-navbar-title">
                <div>财务服务</div>
            </div>
            <div class="am-navbar-right" onclick="window.location.href='{{ $_system_config -> service_link }}'">
            <div>在线客服</div>
        </div>
    </div>
        @include('wap.template.theme11.layouts.head_left')
    </div>
    <div class="container">
        <div class="setone deposit" style="overflow: auto;">
            <div class="deposit_head">
                <div class="imgBackground">
                    <div class="am-flexbox am-flexbox-align-middle gameBg0">
                        <div class="am-flexbox-item" style="flex: 0.75 1 0%; font-size: 0.32rem;">
                            <p style="text-align: left; color: rgb(255, 255, 255); font-weight: bold;">
                                <!-- react-text: 6010 -->总余额:
                                <span class="UserAmountController recharge-money">{{ $_member -> money }}</span>
                            </p>
                        </div>

                    </div>
                </div>
                {{--<div class="am-flexbox am-flexbox-align-middle pamayBox" id="moneybottom">
                    <div class="am-flexbox-item buttonB2" onclick="changgepage(this,1)" choose="company">
                        <div>
                            <p class="Headnohave">公司入款</p>
                        </div>
                    </div>
                    <div class="am-flexbox-item buttonB2" onclick="changgepage(this,2)" choose="deposit-xianshang">
                        <div>
                            <p class="Headnohave">线上支付</p>
                        </div>
                    </div>
                    <div class="am-flexbox-item buttonB2" onclick="changgepage(this,3)" choose="deposit-xianxia">
                        <div>
                            <p class="Headnohave">线下充值</p>
                        </div>
                    </div>
                    <div class="am-flexbox-item buttonB2" onclick="changgepage(this,4)" choose="withdraw">
                        <div>
                            <p class="Headnohave">线上取款</p>
                        </div>
                    </div>

                </div>--}}
            </div>
            <div class="settwo" style="width: 98%; margin: 0px auto;">
                <div >
                    <div>
                        <div style="margin-top: 0.12rem;" id="mgmChongZhi">

                            <div class="newdesposit" choose="company">
                                <ul class="bankBox">
                                    @if($_system_config->is_bankpay_on == 0)
                                    <li class="list_pay_item bank active" type="company" parType="bank">
                                        <a href="{{ route('wap.bank_pay') }}">
                                        <img src="{{ asset('wap/theme11/images/icon_lib_unionpay.png') }}" alt="公司汇款">
                                        <p>公司汇款</p>
                                        </a>
                                    </li>
                                    @endif
                                        @if($_system_config->is_wechat_on == 0)
                                    <li class="list_pay_item bank active" type="company" parType="bank">
                                        <a href="{{ route('wap.weixin_pay') }}">
                                            <img src="{{ asset('/wap/theme11/images/icon_lib_wechatpay.png') }}" alt="公司汇款">
                                            <p>微信支付</p>
                                        </a>
                                    </li>
                                        @endif
                                        @if($_system_config->is_alipay_on == 0)
                                    <li class="list_pay_item bank active" type="company" parType="bank">
                                        <a href="{{ route('wap.ali_pay') }}">
                                            <img src="{{ asset('/wap/theme11/images/icon_lib_alipay.png') }}" alt="公司汇款">
                                            <p>支付宝支付</p>
                                        </a>
                                    </li>
                                        @endif
                                        @if($_system_config->is_qq_on == 0)
                                    <li class="list_pay_item bank active" type="company" parType="bank">
                                        <a href="{{ route('wap.qq_pay') }}">
                                            <img src="{{ asset('wap/theme11/images/q9.png') }}" alt="公司汇款">
                                            <p>QQ支付</p>
                                        </a>
                                    </li>
                                        @endif
                                    @if($_system_config->is_thirdpay_on == 0)
                                    <li class="list_pay_item bank active" type="company" parType="bank">
                                        <a href="{{ route('wap.third_bank_pay') }}">
                                            <img src="{{ asset('wap/theme11/images/online.png') }}" alt="公司汇款">
                                            <p>第三方支付</p>
                                        </a>
                                    </li>
                                        @endif
                                </ul>
                            </div>

                           {{-- <div class="newdesposit" style="display:none" choose="deposit-xianxia">
                                <ul class="bankBox">
                                    <li class="list_pay_item wx active" onclick="changgepage(this);" type="weixin" parType="wx" style="display:none">
                                        <a href="@Url.Action("depositXianxia", "Index")?type=wx">
                                        <img src="~/Areas/Wap8/Content/images/main/icon_lib_wechatpay.png" alt="微信支付">
                                        <p>微信支护</p>
                                        </a>
                                    </li>
                                    <li class="list_pay_item zfb active" onclick="changgepage(this);" type="zhifubao" parType="zfb" style="display:none">
                                        <a href="@Url.Action("depositXianxia", "Index")?type=zfb">
                                        <img src="~/Areas/Wap8/Content/images/main/icon_lib_alipay.png" alt="支付宝">
                                        <p>支付宝支付</p>
                                        </a>
                                    </li>
                                    <li class="list_pay_item qqpay active" onclick="changgepage(this);" type="qq" parType="qqpay" style="display:none">
                                        <a href="@Url.Action("depositXianxia", "Index")?type=qqpay">
                                        <img src="~/Areas/Wap8/Content/images/main/q9.png" alt="QQ支护">
                                        <p>QQ支护</p>
                                        </a>
                                    </li>
                                    <li class="list_pay_item ysf active" onclick="changgepage(this);" type="yunsf" parType="ysf" style="display:none">
                                        <a href="@Url.Action("depositXianxia", "Index")?type=ysf">
                                        <img src="~/Areas/Wap8/Content/images/main/ysf.png" alt="云闪付转账">
                                        <p>云闪付转账</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="newdesposit" style="display:none" choose="deposit-xianshang">

                                <ul class="bankBox" id="zxDepositTitle">
                                    <li class="list_pay_item wangyin active" style="display:none">
                                        <a href="@Url.Action("chongbanklist", "Index")?type=wangyin">
                                        <img src="/img/bank/online.png">
                                        <p>网银支付</p>
                                        </a>
                                    </li>
                                    <li class="list_pay_item zhifubao active" style="display:none">
                                        <a href="@Url.Action("chongbanklist", "Index")?type=zhifubao">
                                        <img src="~/Areas/Wap8/Content/images/main/icon_lib_alipay.png">
                                        <p>支付宝支付</p>
                                        </a>
                                    </li>
                                    <li class="list_pay_item weixin active" style="display:none">
                                        <a href="@Url.Action("chongbanklist", "Index")?type=weixin">
                                        <img src="~/Areas/Wap8/Content/images/main/icon_lib_wechatpay.png">
                                        <p>微信支付</p>
                                        </a>
                                    </li>
                                    <li class="list_pay_item yinlian active" style="display:none">
                                        <a href="@Url.Action("chongbanklist", "Index")?type=yinlian">
                                        <img src="/img/bank/union_scan.png">
                                        <p>银联支付</p>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                            <div class="newdesposit bank_list_i_w" choose="withdraw" style="display:none;">
                                <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                                    <div class="am-flexbox-item">
                                        <div class="am-list-item am-input-item">
                                            <div class="am-input-label am-input-label-5">
                                                <p>账号</p>
                                            </div>
                                            <div class="am-input-control"><input type="text" maxlength="50" value="@ViewBag.UserName" warning="" readonly></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                                    <div class="am-flexbox-item">
                                        <div class="am-list-item am-input-item">
                                            <div class="am-input-label am-input-label-5">
                                                <p>姓名：</p>
                                            </div>
                                            <div class="am-input-control"><input type="text" maxlength="50" id="TrueName" warning="" readonly></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                                    <div class="am-flexbox-item">
                                        <div class="am-list-item am-input-item">
                                            <div class="am-input-label am-input-label-5">
                                                <p>银行：</p>
                                            </div>
                                            <div class="am-input-control"><input type="text" maxlength="50" id="openBank" warning="" readonly></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                                    <div class="am-flexbox-item">
                                        <div class="am-list-item am-input-item">
                                            <div class="am-input-label am-input-label-5">
                                                <p>支行：</p>
                                            </div>
                                            <div class="am-input-control"><input type="text" maxlength="50" id="bankMeg" warning="" readonly></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                                    <div class="am-flexbox-item">
                                        <div class="am-list-item am-input-item">
                                            <div class="am-input-label am-input-label-5">
                                                <p>金额：</p>
                                            </div>
                                            <div class="am-input-control"><input type="number" id="amount" placeholder="提款金额大于100元" warning="" maxlength="50" min="1"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                                    <div class="am-flexbox-item">
                                        <div class="am-list-item am-input-item">
                                            <div class="am-input-label am-input-label-5">
                                                <p>密码：</p>
                                            </div>
                                            <div class="am-input-control"><input type="password" placeholder="请输入提款密码" id="WithdrawalsPassword" maxlength="6"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="PayButtonB PayButtonBChongzhi" id="recharge_btn" style="display: block;" value="提 交" onclick="tikuan(this)" warning="正在提交审核..." show="提 交">
                                    <a role="button" class="buttonPay am-button am-button-disabled" aria-disabled="true" style="background: transparent; border: 0px; line-height: 0.8rem;">
                                        <p style="color: rgb(255, 255, 255); font-size: 16px; font-weight: bold;">立即提款</p>
                                    </a>
                                </div>
                            </div>--}}


                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <script type="text/javascript">

    </script>


@endsection