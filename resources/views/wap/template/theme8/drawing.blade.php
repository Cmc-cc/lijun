@extends('wap.template.theme8.layouts.main')
@section('content')
    <header class="mui-bar mui-bar-nav mui-action-back">
        <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
        <h1 class="mui-title">
            取款
        </h1>
    </header>
    <div class="mui-content withdraw-content mui-slider-item mui-control-content mui-active" style="margin:0;padding:10px;padding-top: 44px;">
        <p class="withdraw-title mui-clearfix">
            <span>用户名：<em>{{ $_member -> name }}</em></span>
            <span>余额：<em class="money">{{ $_member -> money }}</em></span>
        </p>
        <p class="withdraw-title mui-clearfix">
            <span>真实姓名：<em>{{ $_member -> bank_username }}</em></span>
            <span>码量余额：<em>{{ $_member -> ml_money }}</em></span>
        </p>
        <div class="withdraw-bank">
            <div class="mui-input-row mui-radio mui-left">
                <div class="withdraw-banks">
                    <img src="{{ asset('./wap/theme8/images/CCB.jpg') }}">
                    <div class="withdraw-bankmeg mui-clearfix">
                        <p>
                            <label>银行:</label>
                            <span id="openBank">{{ $_member -> bank_name }}</span>
                        </p>
                        <p>
                            <label>账号:</label>
                            <span id="bankCard">{{ $_member -> bank_card }}</span>
                        </p>
                    </div>

                </div>
                <input name="radio1" type="radio" checked="">
            </div>
        </div>
        <form action="{{ route('wap.post_drawing') }}" method="post" name="form1">
            <div class="deposit-shuru">
                <label>取款金额：</label>
                <input name="money" type="number" placeholder="输入金额" id="amount" maxlength="50">
            </div>
            <div class="deposit-shuru">
                <label>提款密码：</label>
                <input name="qk_pwd" type="password" placeholder="输入密码" id="WithdrawalsPassword" maxlength="6">
            </div>
            <button class="mui-btn btn_submit mui-btn-block surebtn ajax-submit-btn" warning="正在提交审核..." show="提 交">提交</button>
        </form>
    </div>
    <script>
        $(function () {
            @if($_member->is_trans_on == 1)
            $.ajax({
                type: 'post',
                url: "{{route('member.api.wallet_balance')}}",
                dataType: 'json',
                success: function (data) {
                    //console.log(data);
                    if (data.statusCode == '01') {
                        var all = Number($('.money').text()) + Number(data.data);
                        $('.money').text('');
                        $('.money').text(parseInt(all.toFixed(2)));
                    }
                }
            })
            @endif
        })
    </script>

@endsection