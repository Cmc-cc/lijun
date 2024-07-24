@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/sbtech-widget-cashier.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme12/css/web.css') }}" rel="stylesheet" />
    <form class="sbtech-widget-cashier-manipulable-payment-form__container" novalidate="" autocomplete="off" action="{{ route('wap.post_drawing') }}" method="post">
        <div class="sbtech-widget-cashier-withdrawal-payment-form__container">
            <div class="container">
                <div class="sbtech-widget-cashier-control__container">
                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">账号</div>
                    <input type="text" step="0.01" min="100" max="0" class="sbtech-widget-cashier-number-input__field sbtech-widget-cashier-number-input__field_error sbtech-widget-cashier-number-input__field_amount" name="RequestedAmount" value="{{ $_member -> name }}" autocomplete="off" readonly>
                </div>
            </div>
            <div class="container">
                <div class="sbtech-widget-cashier-control__container">
                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">码量余额</div>
                    <input type="text" step="0.01" min="100" max="0" class="sbtech-widget-cashier-number-input__field sbtech-widget-cashier-number-input__field_error sbtech-widget-cashier-number-input__field_amount" name="RequestedAmount" value="{{ $_member -> ml_money }}" autocomplete="off" readonly>
                </div>
            </div>
            <div class="container">
                <div class="sbtech-widget-cashier-control__container">
                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">数额</div>
                    <input type="text" step="0.01" min="100" max="0"  placeholder="请输入金额" class="sbtech-widget-cashier-number-input__field sbtech-widget-cashier-number-input__field_error sbtech-widget-cashier-number-input__field_amount" inputmode="numeric" name="money" data-tid="number-input" autocomplete="off" id="amount">
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
                                        <input aria-activedescendant="react-select-2--value" aria-expanded="false" aria-haspopup="false" aria-owns="" role="combobox" value="{{ $_member -> bank_name }}" id="openBank">
                                    </div>
                                </div><span class="Select-arrow-zone"><span class="Select-arrow"></span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sbtech-widget-cashier-control__container">
                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">银行账号</div>
                    <input type="text" class="sbtech-widget-cashier-text-input__field" name="AccountNumber" value="{{ $_member -> bank_card }}" data-tid="input" autocomplete="off" id="bankCard" readonly>
                </div>
                <div class="sbtech-widget-cashier-control__container">
                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">取款密码</div>
                    <input type="password" class="sbtech-widget-cashier-text-input__field" name="qk_pwd" value="" data-tid="input" autocomplete="off" id="WithdrawalsPassword" placeholder="请输入6位(纯数字)取款密码">
                </div>
            </div>
            <button class="sbtech-widget-cashier-submit-payment__btn ajax-submit-btn" type="button" >取款 </button>
        </div>
    </form>
    <script>
    </script>

@endsection