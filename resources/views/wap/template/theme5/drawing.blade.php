@extends('wap.template.theme5.layouts.main')
@section('content')
    <style>

    </style>
    <div class="layout mt12" id="div_create_user_bank">
        <div class="hd-tit">
            <h3>提款</h3>
        </div>
    </div>
    <div class="layout mt12" id="form_wthdraw">
        <form action="{{ route('wap.post_drawing') }}" method="post" name="form1">
        <ul class="mod-forms wthdraw-content">
            <li>
                <label>账号:</label>
                <div class="form-ipt">
                    <input type="text" class="txt-ipt" maxlength="50" value="{{ $_member->name }}" warning="" readonly="">
                </div>
            </li>
            <li>
                <label style="width: 80px">钱包余额:</label>
                <div class="form-ipt">
                    <input type="text" id="my_money" class="txt-ipt" maxlength="50" value="{{ $_member->money }}" warning="" readonly="">
                </div>
            </li>
            <li>
                <label style="width: 80px">码量余额:</label>
                <div class="form-ipt">
                    <input type="text" class="txt-ipt" maxlength="50" value="{{ $_member->ml_money }}" warning="" readonly="">
                </div>
            </li>
            <li>
                <label>金额:</label>
                <div class="form-ipt">
                    <input type="number" name="money" placeholder="请输入金额" id="amount" class="txt-ipt" maxlength="50" min="1">
                </div>
            </li>
            <li>
                <label>银行:</label>
                <div class="form-ipt">
                    <input type="text" id="openBank" value="{{ $_member->bank_name }}" class="txt-ipt" maxlength="50" readonly="">
                </div>
            </li>
            <li>
                <label>账号:</label>
                <div class="form-ipt">
                    <input type="text" value="{{ $_member->bank_card }}" id="bankMeg" class="txt-ipt" maxlength="50" readonly="">
                </div>
            </li>

            <li>
                <label>密码:</label>
                <div class="form-ipt">
                    <input type="password" name="qk_pwd" placeholder="请输入提款密码" id="WithdrawalsPassword" class="txt-ipt" maxlength="6">
                </div>
            </li>
        </ul>
        <p class="c8"></p>
        <input type="submit" class="confirm-sub mt20 ajax-submit-btn" value="提 交"  warning="正在提交审核..." show="提 交">
        </form>
        <!--成功提交后弹出框内容：操作成功，我们将在2小时以内完成审核。-->
    </div>
    <script>
        @if (!Auth::guard('member')->guest())
        $(function () {
            $.ajax({
                type:'post',
                url : "{{route('member.api.wallet_balance')}}",
                dataType : 'json',
                success : function (data) {
                    //console.log(data);
                    if(data.statusCode == '01'){
                        var all = Number($('#my_money').val()) + Number(data.data);
                        $('#my_money').val('');
                        $('#my_money').val(parseInt(all.toFixed(2)));
                    }
                }
            })
        })
        @endif
    </script>
@endsection