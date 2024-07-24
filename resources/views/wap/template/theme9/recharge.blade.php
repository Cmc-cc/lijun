@extends('wap.template.theme9.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme9/css/financial.css') }}" rel="stylesheet">
    <div id="page-title">充值中心</div>
    <section id="content">

        <financial-layout-component class="ng-isolate-scope">
            <div class="ng-scope" style="">
                <div class="content-section deposit-xianshang" choose="deposit-xianshang" style="display: block;">
                    <financial-list-component class="ng-scope ng-isolate-scope" style="">
                        <ul class="clearboth" id="zxDepositTitle">
                            @if($_system_config->is_thirdpay_on == 0)
                            <li class="ng-scope wangyin" style="display: list-item;">
                                <a href="{{ route('wap.third_bank_pay') }}">
                                    <img src="{{ asset('/wap/theme9/images/online_payment.png') }}">
                                    <span class="ng-binding">第三方支付</span>
                                </a>
                            </li>
                            @endif
                                @if($_system_config->is_wechat_on == 0)
                            <li class="ng-scope weixin" style="display: list-item;">
                                <a href="{{ route('wap.weixin_pay') }}">
                                    <img src="{{ asset('wap/theme9/images/wechat_payment.png') }}">
                                    <span class="ng-binding">微信支付</span>
                                </a>
                            </li>
                                @endif
                                @if($_system_config->is_alipay_on == 0)
                            <li class="ng-scope zhifubao" style="display: list-item;">
                                <a href="{{ route('wap.ali_pay') }}">
                                    <img src="{{ asset('wap/theme9/images/ali_payment.png') }}">
                                    <span class="ng-binding">支付宝支付</span>
                                </a>
                            </li>
                                @endif
                                @if($_system_config->is_qq_on == 0)
                            <li class="ng-scope zhifubao" style="display: list-item;">
                                <a href="{{ route('wap.qq_pay') }}">
                                    <img src="{{ asset('wap/theme9/images/qq_payment.png') }}">
                                    <span class="ng-binding">QQ支付</span>
                                </a>
                            </li>
                                @endif
                                @if($_system_config->is_bankpay_on == 0)
                            <li class="ng-scope yinlian" style="display: list-item;">
                                <a href="{{ route('wap.bank_pay') }}">
                                    <img src="{{ asset('wap/theme9/images/bank_payment.png') }}">
                                    <span class="ng-binding">银联支付</span>
                                </a>
                            </li>
                                    @endif
                        </ul>
                    </financial-list-component>
                </div>
            </div>
        </financial-layout-component>

    </section>
@endsection
