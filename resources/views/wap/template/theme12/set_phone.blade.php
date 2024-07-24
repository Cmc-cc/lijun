@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/sbtech-widget-cashier.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme12/css/web.css') }}" rel="stylesheet" />
    <form class="sbtech-widget-cashier-manipulable-payment-form__container" novalidate="" autocomplete="off" action="{{ route('wap.post_set_phone') }}" method="post">
        <div class="sbtech-widget-cashier-withdrawal-payment-form__container">
            <div class="container">
                <div class="sbtech-widget-cashier-control__container">
                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">账号</div>
                    <input type="text" step="0.01" min="100" max="0" class="sbtech-widget-cashier-number-input__field sbtech-widget-cashier-number-input__field_error sbtech-widget-cashier-number-input__field_amount" name="RequestedAmount" value="{{ $_member -> name }}" autocomplete="off" readonly>
                </div>
            </div>
            <div class="container">
                <div class="sbtech-widget-cashier-control__container">
                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">手机号码</div>
                    <input name="phone" type="text"  class="sbtech-widget-cashier-number-input__field sbtech-widget-cashier-number-input__field_error sbtech-widget-cashier-number-input__field_amount" name="RequestedAmount" value="" placeholder="请输入你的手机号码">
                </div>
            </div>
            <button class="sbtech-widget-cashier-submit-payment__btn ajax-submit-btn" type="button" >绑定 </button>
        </div>
    </form>
    <script>
    </script>
@endsection