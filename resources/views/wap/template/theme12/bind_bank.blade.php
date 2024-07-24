@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/sbtech-widget-cashier.css') }}" rel="stylesheet" />
    <link href="{{ asset('/wap/theme12/css/web.css') }}" rel="stylesheet" />
    <form class="sbtech-widget-cashier-manipulable-payment-form__container" novalidate=""
          action="{{ route('wap.post_bind_bank') }}" method="post"
          autocomplete="off">
        <div class="sbtech-widget-cashier-withdrawal-payment-form__container">
            <div class="sbtech-widget-cashier-payment-method-error__container">
                <div class="sbtech-widget-cashier-payment-method-error__message">填写银行卡信息时，务必仔细填写真实信息，提现钱款均转入该银行卡，信息提交后将不可更改。</div>
            </div>
            <div class="sbtech-widget-cashier-locked-bonuses__container"></div>
            <form  method="post" action="{{ route('wap.post_bind_bank') }}">
                <div data-tid="dynamic-fields-container">
                <div class="sbtech-widget-cashier-control__container">
                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">登陆账号</div>
                    <input type="text" class="sbtech-widget-cashier-text-input__field" name="AccountNumber" value="{{ $_member -> name }}" data-tid="input" autocomplete="off" id="UserName" maxlength="12" readonly="readonly">
                </div>
                <div class="sbtech-widget-cashier-control__container">
                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">真实姓名</div>
                    <input type="text" class="sbtech-widget-cashier-text-input__field" name="bank_username" value="" data-tid="input" autocomplete="off" maxlength="12" placeholder="请输入真实姓名">
                </div>
                <div class="sbtech-widget-cashier-control__container">
                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">开户银行</div>
                    <select type="text" class="sbtech-widget-cashier-text-input__field" name="bank_name" value="" data-tid="input" autocomplete="off" id="bankname">
                        <option value="">--请选择--</option>
                        @foreach(\App\Models\Base::$BANK_TYPE as $v)
                            <option value="{{ $v }}"
                                    @if($_member->bank_name == $v) selected @endif>{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="sbtech-widget-cashier-control__container">
                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">分行名称</div>
                    <input type="text" class="sbtech-widget-cashier-text-input__field" name="bank_branch_name" value="" data-tid="input" autocomplete="off" id="banknode" placeholder="请输入分行名称">
                </div>
                <div class="sbtech-widget-cashier-control__container">
                    <div class="sbtech-widget-cashier-control__label sbtech-widget-cashier-control__label_required" data-tid="control-label">银行账号</div>
                    <input type="text" class="sbtech-widget-cashier-text-input__field" name="bank_card" value="" data-tid="input" autocomplete="off" id="card" maxlength="24" placeholder="请输入卡号">
                </div>
            </div>
                <button class="sbtech-widget-cashier-submit-payment__btn ajax-submit-btn" type="button" id="newbtn">绑定银行卡 </button>
            </form>
        </div>
    </form>
    <script>
        //biCommon.getBindbank($("#banknode"), $("#card"), $("#bankname"), $("#UserName"), 2);
        //biCommon.getWithdrawBankList();
    </script>


@endsection