@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/financial.css') }}" rel="stylesheet">
    <link href="{{ asset('/wap/theme12/css/sbtech-widget-cashier.css') }}" rel="stylesheet">
    <link href="{{ asset('/wap/theme12/css/web.css') }}" rel="stylesheet">
    <section id="content">
        <financial-layout-component class="ng-isolate-scope">
            <div class="ng-scope" style="">
                {{--<div class="tab-section page-title">
                    <ul class="hasNote clearboth" id="depositTitle">
                        <li class="ng-scope" onclick="changgepage(this)" choose="company" style="">
                            <span class="ng-binding">公司入款</span>
                        </li>
                        <li class="ng-scope active" style="" onclick="changgepage(this)" choose="deposit-xianshang">
                            <span class="ng-binding">线上支付</span>
                        </li>
                        <li class="ng-scope " style="" onclick="changgepage(this)" choose="deposit-xianxia">
                            <span class="ng-binding">线下充值</span>
                        </li>
                        <li class="ng-scope" style="" onclick="changgepage(this)" choose="withdraw">
                            <span class="ng-binding">线上取款</span>
                        </li>
                    </ul>
                </div>--}}

                {{--<div class="content-section company	" choose="company" style="display: none;">
                    <financial-recommend-component recommend="recommend" class="ng-scope ng-isolate-scope">
                        <div class="recommend-content no-animate ng-scope">
                            <p class="content ng-binding">公司入款笔笔赠送1%彩金，成功率100%！</p>
                        </div>
                    </financial-recommend-component>
                    <financial-list-component class="ng-scope ng-isolate-scope" style="">
                        <ul class="clearboth" id="gschongzhi">
                            <li class="ng-scope" style="display: list-item;">
                                <a href="/Index/CompanyDeposit">
                                    <img src="{{ asset('/wap/theme12/images/online_payment.png') }}">
                                    <span class="ng-binding">银行转账</span>
                                </a>
                            </li>
                        </ul>
                    </financial-list-component>
                </div>--}}
                <div class="content-section deposit-xianshang" choose="deposit-xianshang">
                    <financial-list-component class="ng-scope ng-isolate-scope" style="">
                        <ul class="clearboth" id="zxDepositTitle">
                            @if($_system_config->is_thirdpay_on == 0)
                            <li class="ng-scope wangyin" style="display: list-item;">
                                <a href="{{ route('wap.third_bank_pay') }}">
                                    <img src="{{ asset('/wap/theme12/images/online_payment.png') }}">
                                    <span class="ng-binding">第三方支付</span>
                                </a>
                            </li>
                            @endif
                                @if($_system_config->is_qq_on == 0)
                            <li class="ng-scope zhifubao" style="display: list-item;">
                                <a href="{{ route('wap.qq_pay') }}">
                                    <img src="{{ asset('/wap/theme12/images/qq_payment.png') }}">
                                    <span class="ng-binding">QQ支付</span>
                                </a>
                            </li>
                                @endif
                                @if($_system_config->is_alipay_on == 0)
                            <li class="ng-scope zhifubao" style="display: list-item;">
                                <a href="{{ route('wap.ali_pay') }}">
                                    <img src="{{ asset('/wap/theme12/images/ali_payment.png') }}">
                                    <span class="ng-binding">支付宝支付</span>
                                </a>
                            </li>
                                @endif
                                @if($_system_config->is_wechat_on == 0)
                            <li class="ng-scope weixin" style="display: list-item;">
                                <a href="{{ route('wap.weixin_pay') }}">
                                    <img src="{{ asset('/wap/theme12/images/wechat_payment.png') }}">
                                    <span class="ng-binding">微信支付</span>
                                </a>
                            </li>
                                @endif
                                @if($_system_config->is_bankpay_on == 0)
                            <li class="ng-scope yinlian" style="display: list-item;">
                                <a href="{{ route('wap.bank_pay') }}">
                                    <img src="{{ asset('/wap/theme12/images/bank_payment.png') }}">
                                    <span class="ng-binding">网银支付</span>
                                </a>
                            </li>
                                    @endif
                        </ul>
                    </financial-list-component>
                </div>
                {{--<div class="content-section deposit-xianxia" choose="deposit-xianxia" style="display: none;">

                    <financial-list-component class="ng-scope ng-isolate-scope" style="">
                        <ul class="clearboth" id="mgmChongZhi">
                            <li class="ng-scope wx" style="display: list-item;">
                                <a href="/Index/depositXianxia?type=wx">
                                    <img src="/Areas/Wap9/Content/images/main/wechat_payment.png">
                                    <span class="ng-binding">微信</span>
                                </a>
                            </li>
                            <li class="ng-scope zfb" style="display: list-item;">
                                <a href="/Index/depositXianxia?type=zfb">
                                    <img src="/Areas/Wap9/Content/images/main/ali_payment.png">
                                    <span class="ng-binding">支付宝</span>
                                </a>
                            </li>
                            <li class="ng-scope qqpay">
                                <a href="/Index/depositXianxia?type=qqpay">
                                    <img src="/Areas/Wap9/Content/images/main/qq_payment.png">
                                    <span class="ng-binding">QQ充值</span>
                                </a>
                            </li>
                            <li class="ng-scope ysf" style="display: list-item;">
                                <a href="/Index/depositXianxia?type=ysf">
                                    <img src="/Areas/Wap9/Content/images/main/bank_payment.png">
                                    <span class="ng-binding">云闪付</span>
                                </a>
                            </li>

                        </ul>
                    </financial-list-component>
                </div>
                <div class="content-section withdraw" choose="withdraw" style="display:none;">
                    <form class="sbtech-widget-cashier-manipulable-payment-form__container" novalidate="" autocomplete="off">
                        <div class="sbtech-widget-cashier-withdrawal-payment-form__container">
                            <div class="container">
                                <div class="sbtech-widget-cashier-control__container">
                                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">账号</div>
                                    <input type="text" step="0.01" min="100" max="0" class="sbtech-widget-cashier-number-input__field sbtech-widget-cashier-number-input__field_error sbtech-widget-cashier-number-input__field_amount" name="RequestedAmount" value="test001" autocomplete="off" readonly="">
                                </div>
                            </div>
                            <div class="container">
                                <div class="sbtech-widget-cashier-control__container">
                                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">数额</div>
                                    <input type="text" step="0.01" min="100" max="0" placeholder="请输入金额" class="sbtech-widget-cashier-number-input__field sbtech-widget-cashier-number-input__field_error sbtech-widget-cashier-number-input__field_amount" inputmode="numeric" name="RequestedAmount" data-tid="number-input" autocomplete="off" id="amount">
                                </div>
                            </div>
                            <div class="sbtech-widget-cashier-locked-bonuses__container"></div>
                            <div data-tid="dynamic-fields-container">
                                <div class="sbtech-widget-cashier-control__container">
                                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">银行名称</div>
                                    <div class="sbtech-widget-cashier-select-autocomplete__select-container" data-tid="select-container">
                                        <div class="Select is-disabled is-searchable Select--single">
                                            <div class="Select-control">
                                                <div class="Select-multi-value-wrapper" id="react-select-2--value">
                                                    <div class="Select-placeholder"></div>
                                                    <div class="Select-input" style="display: inline-block;">
                                                        <input aria-activedescendant="react-select-2--value" aria-expanded="false" aria-haspopup="false" aria-owns="" role="combobox" value="" id="openBank">
                                                    </div>
                                                </div><span class="Select-arrow-zone"><span class="Select-arrow"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sbtech-widget-cashier-control__container">
                                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">分行名称</div>
                                    <div class="sbtech-widget-cashier-select-autocomplete__select-container select-container_disabled" data-tid="select-container">
                                        <div class="Select is-disabled is-searchable Select--single">
                                            <div class="Select-control">
                                                <div class="Select-multi-value-wrapper" id="react-select-5--value">
                                                    <div class="Select-placeholder"></div>
                                                    <div aria-expanded="false" aria-owns="" aria-activedescendant="react-select-5--value" aria-disabled="true" class="Select-input" role="combobox" tabindex="0">
                                                        <input aria-activedescendant="react-select-2--value" aria-expanded="false" aria-haspopup="false" aria-owns="" role="combobox" value="" id="bankMeg">
                                                    </div>
                                                </div><span class="Select-arrow-zone"><span class="Select-arrow"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sbtech-widget-cashier-control__container">
                                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">银行账号</div>
                                    <input type="text" class="sbtech-widget-cashier-text-input__field" name="AccountNumber" value="" data-tid="input" autocomplete="off" id="bankCard" readonly="">
                                </div>
                                <div class="sbtech-widget-cashier-control__container">
                                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">取款密码</div>
                                    <input type="password" class="sbtech-widget-cashier-text-input__field" name="AccountNumber" value="" data-tid="input" autocomplete="off" id="WithdrawalsPassword">
                                </div>
                            </div>
                            <button class="sbtech-widget-cashier-submit-payment__btn" type="button" onclick="tikuan(this)">取款 </button>
                        </div>
                    </form>
                </div>--}}

            </div>
        </financial-layout-component>

    </section>
@endsection