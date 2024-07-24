@extends('wap.template.theme7.layouts.main')
@section('content')
    <style>
        html,body{padding-top:20px}
    </style>
    <div class="layout-main">
        <div class="member-module member-module-draw">
            <div class="module-top">

                <div class="top-container navbar-nav">

                    <div class="left-menu">
                        <a href="javascript:;" onclick="window.history.back();">
                            <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                    </div>
                    <div class="page-title">在线取款</div>
                </div>

            </div>
            <div class="module-main diy-scrollbar">
                <div>
                    <div>
                        <div class="main-container">
                            <div>
                                <div class="form-group">
                                    <label>账号</label>
                                    <span>{{ $_member -> name }}</span>
                                </div>
                                <div class="form-group">
                                    <label>真实姓名</label>
                                    <span id="TrueName">{{ $_member -> bank_username }}</span>
                                </div>
                                <div class="form-group">
                                    <label>可用余额</label>
                                    <span class="UserAmountController money">{{ $_member -> money }}</span>
                                </div>
                                <div class="form-group">
                                    <label>码量余额</label>
                                    <span class="UserAmountController">{{ $_member -> ml_money }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="mdl-5_bank">开户银行</label>
                                    <span id="openBank">{{ $_member->bank_name }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="mdl-5_bank_account">银行账号</label>
                                    <span id="bankCard">{{ $_member->bank_card }}</span>
                                </div>
                                <form action="{{ route('wap.post_drawing') }}" method="post" name="form1">
                                <div class="form-group">
                                    <label for="mdl-5_amount">提款金额</label>
                                    <input type="number" id="amount" class="form-control" maxlength="50" min="1" placeholder="最低100元" name="money">
                                </div>
                                <div class="form-group">
                                    <label for="mdl-5_amount">提款密码</label>
                                    <input type="password" id="WithdrawalsPassword" class="form-control" maxlength="6" min="1" placeholder="请输入提款密码" name="qk_pwd">
                                </div>
                                {{--<div class="form-group">
                                    <p><span class="info-warning">友情提示</span></p>
                                    <p><span class="info-warning">1</span>.温馨提醒您；超过<span class="info-warning">5</span>次后，将会额外收费，详情请联系客服！</p>
                                    <p><span class="info-warning">2</span>.修改银行资料<span class="info-warning">24小时</span>之内不能提现！</p>
                                    <p><span class="info-warning">3</span>.提款成功后请联系客服查收您的订单信息。 </p>

                                    <p><span class="info-warning">4</span>.首次输入后银行信息就会自动绑定，如需更改请联系客服。</p>

                                </div>--}}
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary form-control submit-btn ajax-submit-btn"  warning="正在提交审核..." show="提 交">提交</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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