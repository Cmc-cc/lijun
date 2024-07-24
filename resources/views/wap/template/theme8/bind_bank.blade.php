@extends('wap.template.theme8.layouts.main')
@section('content')
    <div class="bankcard">
        <header class="mui-bar mui-bar-nav mui-action-back">
            <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
        <h1 class="mui-title">
            添加银行卡
        </h1>
        </header>
        <div class="mui-content mui-scroll-wrapper" data-scroll="5">
            <div class="mui-scroll">
                <form id="bankcardForm" novalidate="novalidate" action="{{ route('wap.post_bind_bank') }}" method="post">
                    <div class="mui-row">
                        <div class="mui-input-group mine-form">
                            <div class="mui-input-row">
                                <label for="">
                                    登录账号<br>
                                    <small>当前登录账号</small>
                                </label>
                                <div class="ct">
                                    <input type="text" maxlength="12" readonly="" value="{{ $_member -> name }}" id="">
                                </div>
                            </div>
                            <div class="mui-input-row">
                                <label for="">
                                    开户姓名<br>
                                    <small>银行卡户名与真实姓名一致才能取款成功</small>
                                </label>
                                <div class="ct">
                                    <input name="bank_username" type="text" maxlength="12"  value="" id="UserName">
                                </div>
                            </div>
                            <div class="mui-input-row" id="selectBank">
                                <label for="">银行名称</label>
                                <div class="ct">
                                    <div class="gb-select">
                                        <select name="bank_name" id="bankname" style="font-size: 12px;color: #999;">
                                            <option value="">--请选择--</option>
                                            @foreach(\App\Models\Base::$BANK_TYPE as $v)
                                                <option value="{{ $v }}"
                                                        @if($_member->bank_name == $v) selected @endif>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mui-input-row">
                                <label for="result.bankcardNumber">银行卡号</label>
                                <div class="ct">
                                    <input name="bank_card" type="number" id="card" maxlength="24" warning="请输入开户账号" placeholder="请输入银行卡号">
                                </div>
                            </div>
                            <div class="mui-input-row">
                                <label for="result.bankDeposit">
                                    开户银行<br>
                                    <small>选择“其他”银行时必填</small>
                                </label>
                                <div class="ct">
                                    <input name="bank_branch_name" type="text" placeholder="如：河北唐山建设银行"  maxlength="50" id="banknode" warning="请输入开户行信息">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mui-row" id="newbtn">
                        <div class="gb-form-foot">
                            <a href="javascript:;" class="mui-btn mui-btn-primary submit ajax-submit-btn">绑定</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        //biCommon.getBindbank($("#banknode"), $("#card"), $("#bankname"), $("#UserName"), 2);
        //biCommon.getWithdrawBankList();
    </script>


@endsection