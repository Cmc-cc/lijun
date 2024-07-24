@extends('wap.template.theme6.layouts.main')
@section('content')
<header id="header" class="mui-bar mui-bar-nav">
    <h1 class="mui-title">在线取款</h1>
    <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
        <span class="mui-icon mui-icon-left-nav"></span>返回
    </button>
</header>
<div class="mui-content withdraw-content">
    <form action="{{ route('wap.post_drawing') }}" method="post" name="form1">
    <p class="withdraw-title mui-clearfix">
        <span>用户名：<em>{{ $_member -> name }}</em></span>
        <span>余额：<em class="UserAmountController money">{{ $_member -> money }}</em></span>
    </p>
    <div class="deposit-shuru">
        <label>码量余额：</label>
        <input type="text" class="txt-ipt" maxlength="50" value="{{ $_member->ml_money }}" warning="" readonly="">
    </div>
    <div class="deposit-shuru">
        <label>银行：</label>
        <input type="text" placeholder="输入金额" value="{{ $_member->bank_name }}" maxlength="50">
    </div>
    <div class="deposit-shuru">
        <label>卡号：</label>
        <input type="number" placeholder="输入金额" value="{{ $_member->bank_card }}" maxlength="50">
    </div>
    <div class="deposit-shuru">
        <label>取款金额：</label>
        <input type="number" name="money" placeholder="输入金额" id="amount" maxlength="50">
    </div>
    <div class="deposit-shuru">
        <label>提款密码：</label>
        <input type="password" name="qk_pwd" placeholder="输入密码" id="WithdrawalsPassword" maxlength="6">
    </div>
    <button class="mui-btn surebtn ajax-submit-btn" warning="正在提交审核..." show="提 交">提交</button>
    </form>
</div>
<script>
    @if($_member->is_trans_on == 1)
    $(function () {
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
    })
    @endif
    //biCommon.getBindbank($("#openBank"), $("#bankCard"), $("#bankMeg"), $("#TrueName"), 3);
</script>
    @endsection
