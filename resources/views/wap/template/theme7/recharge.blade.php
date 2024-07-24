@extends('wap.template.theme7.layouts.main')
@section('content')
    <div class="layout-main">
        <div class="member-module member-module-recharge">
            <div class="module-top">

                <div class="top-container navbar-nav">

                    <div class="left-menu">
                        <a href="javascript:;" onclick="window.history.back();">
                            <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                    </div>
                    <div class="page-title">选择存款方式</div>
                </div>

            </div>
            <div class="module-main diy-scrollbar">
                <div>
                    <div>
                        <div class="main-container">
                            <ul class="list-group" id="mgmChongZhi">
                                @if($_system_config->is_thirdpay_on == 0)
                                    <li class="list-group-item payment bank" style="display: block;">
                                        <a href="{{ route('wap.third_bank_pay') }}"><span>第三方支付</span></a>
                                    </li>
                                @endif
                                @if($_system_config->is_bankpay_on == 0)
                                    <li class="list-group-item payment epay" style="display: block;">
                                        <a href="{{ route('wap.bank_pay') }}"><span>银行汇款</span></a>
                                    </li>
                                @endif
                                @if($_system_config->is_alipay_on == 0)
                                    <li class="list-group-item payment alipay zfb" style="display: list-item;">
                                        <a href="{{ route('wap.ali_pay') }}"><span>支付宝付款</span></a>
                                    </li>
                                @endif
                                @if($_system_config->is_wechat_on == 0)
                                    <li class="list-group-item payment weixin wx" style="display: list-item;">
                                        <a href="{{ route('wap.weixin_pay') }}"><span>微信付款</span></a>
                                    </li>
                                @endif
                                @if($_system_config->is_qq_on == 0)
                                    <li class="list-group-item payment qq qqpay" style="display: list-item;">
                                        <a href="{{ route('wap.qq_pay') }}"><span>QQ付款</span></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="module-bottom"></div>
        </div>
    </div>
@endsection