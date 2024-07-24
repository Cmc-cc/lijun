@extends('wap.template.theme3.layouts.main')
@section('content')
    <link href="{{asset('/wap/theme3/css/financial.css')}}" rel="stylesheet" />

    <main class="panel slideout-panel slideout-panel-left">
        <div data-v-76fa910e="" class="navbar-container" style="">
            <div data-v-76fa910e="" middle="" class="logo-container"></div>
            <div data-v-76fa910e="" middle="" class="menu-container" onclick="self.location=document.referrer;">
                <div data-v-76fa910e="" relative="" style="">
                    <img data-v-76fa910e="" middle="" src="{{asset('/wap/theme3/images/main/goback.png')}}" alt="" style="">
                </div>
            </div>
            <div data-v-76fa910e="" class="title">
                <h3 data-v-76fa910e="" class="title">充值</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>

        <section id="content">

            <financial-layout-component class="ng-isolate-scope">
                <div class="ng-scope" style="">
                    <div class="tab-section page-title">
                        <ul class="hasNote clearboth" id="depositTitle" style="display: none">
                            <li class="ng-scope active" onclick="changgepage(this)" choose="company" style="">
                                <span class="ng-binding">公司入款</span><i class="note ng-binding ng-scope">首选入款方式</i>
                            </li>
                            <li class="ng-scope" style="" onclick="changgepage(this)" choose="deposit-xianshang">
                                <span class="ng-binding">线上支付</span>
                            </li>
                            <li class="ng-scope" style="" onclick="changgepage(this)" choose="deposit-xianxia">
                                <span class="ng-binding">线下充值</span>
                            </li>
                            <li class="ng-scope" style="" onclick="changgepage(this)" choose="withdraw">
                                <span class="ng-binding">线上取款</span>
                            </li>
                        </ul>
                    </div>

                    <div class="content-section company	" choose="company" style="display:none;">
                        <financial-recommend-component style="display: none" recommend="recommend" class="ng-scope ng-isolate-scope">
                            <div class="recommend-content no-animate ng-scope">
                                <p class="content ng-binding">公司入款笔笔赠送1%彩金，成功率100%！</p>
                            </div>
                        </financial-recommend-component>
                        <financial-list-component class="ng-scope ng-isolate-scope" style="">
                            <ul class="clearboth">
                                @if($_system_config->is_thirdpay_on == 0)
                                        <li class="ng-scope">
                                            <a href="{{ route('wap.third_bank_pay') }}">
                                                <img src="{{ asset('/wap/theme3/images/online_payment.png') }}">
                                                <span class="ng-binding">第三方支付</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if($_system_config->is_wechat_on == 0)
                                        <li class="ng-scope wx">
                                            <a href="{{ route('wap.weixin_pay') }}">
                                                <img src="{{ asset('/wap/theme3/images/wechat_payment.png') }}">
                                                <span class="ng-binding">微信支付</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if($_system_config->is_alipay_on == 0)
                                        <li class="ng-scope zhifubao">
                                            <a href="{{ route('wap.ali_pay') }}">
                                                <img src="{{ asset('/wap/theme3/images/ali_payment.png') }}">
                                                <span class="ng-binding">支付宝支付</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if($_system_config->is_qq_on == 0)
                                        <li class="ng-scope qqpay">
                                            <a href="{{ route('wap.qq_pay') }}">
                                                <img src="{{ asset('/wap/theme3/images/qq_payment.png') }}">
                                                <span class="ng-binding">QQ支付</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if($_system_config->is_bankpay_on == 0)
                                        <li class="ng-scope">
                                            <a href="{{ route('wap.bank_pay') }}">
                                                <img src="{{ asset('/wap/theme3/images/online_payment.png') }}">
                                                <span class="ng-binding">网银支付</span>
                                            </a>
                                        </li>
                                    @endif
                            </ul>
                        </financial-list-component>
                    </div>
                    {{--<div class="content-section deposit-xianshang" choose="deposit-xianshang" style="display:none;">
                        <financial-list-component class="ng-scope ng-isolate-scope" style="">
                            <ul class="clearboth" id="zxDepositTitle">
                                <li class="ng-scope wangyin">
                                    <a href="/Index/chongbanklist?type=wangyin">
                                        <img src="/Areas/Wap7/Content/images/main/online_payment.png">
                                        <span class="ng-binding">网银支付</span>
                                    </a>
                                </li>
                                <li class="ng-scope zhifubao">
                                    <a href="/Index/chongbanklist?type=zhifubao">
                                        <img src="/Areas/Wap7/Content/images/main/ali_payment.png">
                                        <span class="ng-binding">支付宝支付</span>
                                    </a>
                                </li>
                                <li class="ng-scope weixin">
                                    <a href="/Index/chongbanklist?type=weixin">
                                        <img src="/Areas/Wap7/Content/images/main/wechat_payment.png">
                                        <span class="ng-binding">微信支付</span>
                                    </a>
                                </li>
                                <li class="ng-scope yinlian">
                                    <a href="/Index/chongbanklist?type=yinlian">
                                        <img src="/Areas/Wap7/Content/images/main/bank_payment.png" />
                                        <span class="ng-binding">银联支付</span>
                                    </a>
                                </li>

                            </ul>
                        </financial-list-component>
                    </div>
                    <div class="content-section deposit-xianxia" choose="deposit-xianxia" style="display:none;">

                        <financial-list-component class="ng-scope ng-isolate-scope" style="">
                            <ul class="clearboth" id="mgmChongZhi">
                                <li class="ng-scope wx">
                                    <a href="/Index/depositXianxia?type=wx">
                                        <img src="/Areas/Wap7/Content/images/main/wechat_payment.png">
                                        <span class="ng-binding">微信</span>
                                    </a>
                                </li>
                                <li class="ng-scope zfb">
                                    <a href="/Index/depositXianxia?type=zfb">
                                        <img src="/Areas/Wap7/Content/images/main/ali_payment.png">
                                        <span class="ng-binding">支付宝</span>
                                    </a>
                                </li>
                                <li class="ng-scope qqpay">
                                    <a href="/Index/depositXianxia?type=qqpay">
                                        <img src="/Areas/Wap7/Content/images/main/qq_payment.png">
                                        <span class="ng-binding">QQ充值</span>
                                    </a>
                                </li>
                                <li class="ng-scope ysf">
                                    <a href="/Index/depositXianxia?type=ysf">
                                        <img src="/Areas/Wap7/Content/images/main/bank_payment.png">
                                        <span class="ng-binding">云闪付</span>
                                    </a>
                                </li>

                            </ul>
                        </financial-list-component>
                    </div>
                    <div class="content-section withdraw" choose="withdraw" style="display:none;">
                        <div data-v-ff4f08b4="" class="draw view">
                            <div data-v-ff4f08b4="" class="draw-top">
                                <p>账号：test001</p>
                                <p>
                                    钱包余额：<span relative="" style="line-height: 0.8rem;">
                                    <span style="overflow: hidden;">
                                        <span class="UserAmountController" style="">0</span>
                                        <span>RMB</span>
                                    </span>
                                </span>
                                </p>
                            </div>
                            <div data-v-ff4f08b4="">
                                <div data-v-ff4f08b4="" class="draw-content">
                                    <div data-v-ff4f08b4="" class="md-field">
                                        <!---->
                                        <div class="md-field-content">
                                            <p data-v-ff4f08b4="" class="draw-title">提款信息</p>
                                            <div data-v-ff4f08b4="" class="md-input-item is-clear is-ios left normal">
                                                <div class="md-input-item-container">
                                                    <!---->
                                                    <div class="md-input-item-title fixed">提款金额</div>
                                                    <div class="md-input-item-control">
                                                        <input id="amount" name="input-item-8313" placeholder="单笔下限100元,上限1000000元" maxlength="20" autocomplete="off" type="tel" class="md-input-item-input">
                                                        <!---->
                                                        <div class="md-input-item-clear" style="display: none;">
                                                            <svg class="md-icon md-icon-circle-cross md">
                                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#circle-cross"></use>
                                                            </svg>
                                                        </div>
                                                        <!---->
                                                    </div>
                                                </div>
                                                <!---->
                                                <!---->
                                            </div>
                                            <div data-v-ff4f08b4="" name="item0" class="md-field-item md-input-item">
                                                <div data-v-ff4f08b4="" class="md-field-item-inner">
                                                    <div data-v-ff4f08b4="" class="md-field-item-label solid">
                                                        <div data-v-ff4f08b4="" class="md-field-item-title">开户银行</div>
                                                    </div>
                                                    <input name="input-item-8901738" id="openBank" placeholder="如中国银行" maxlength="15" autocomplete="off" type="text" class="md-input-item-input" readonly="readonly">
                                                </div>
                                            </div>
                                            <div data-v-ff4f08b4="" name="item0" class="md-field-item md-input-item">
                                                <div data-v-ff4f08b4="" class="md-field-item-inner">
                                                    <div data-v-ff4f08b4="" class="md-field-item-label solid">
                                                        <div data-v-ff4f08b4="" class="md-field-item-title">银行账号</div>
                                                    </div>
                                                    <input name="input-item-8901738" id="bankCard" maxlength="30" autocomplete="off" type="text" class="md-input-item-input" readonly="readonly">
                                                </div>
                                            </div>
                                            <div data-v-ff4f08b4="" name="item3" class="md-field-item">
                                                <div class="md-field-item-inner">
                                                    <!---->
                                                    <div class="md-field-item-label solid">
                                                        <div class="md-field-item-title">取款密码</div>
                                                        <!---->
                                                    </div>
                                                    <div class="md-field-item-content left">
                                                        <div data-v-ff4f08b4="" class="md-codebox-wrapper">

                                                            <input id="WithdrawalsPassword" name="input-item-8313" placeholder="请输入取款密码" maxlength="6" autocomplete="off" type="password" class="md-input-item-input">

                                                        </div>
                                                    </div>
                                                    <!---->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                                <div data-v-ff4f08b4="" style="padding: 1rem 0.8rem;">
                                    <button data-v-ff4f08b4="" type="button" onclick="tikuan(this)" class="md-button primary large" style="background-color: rgb(0, 0, 0);">
                                        <div class="md-button-inner"><!----> 确定提交</div>
                                    </button>
                                </div>
                            </div>


                        </div>
                    </div>--}}

                </div>
            </financial-layout-component>

        </section>
    </main>
    <input type="hidden" id="deposithtml" />
    <script>
        $("#depositTitle li").first().click();
        /*biCommon.getBankList(1, "");//获取已开通在线存款的方式
        biCommon.bankinfo("bank");
        biCommon.bankinfo("wx");
        biCommon.bankinfo("zfb");
        biCommon.bankinfo("qqpay");
        biCommon.bankinfo("ysf");*/


    </script>
@endsection