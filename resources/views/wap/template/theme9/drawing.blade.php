@extends('wap.template.theme9.layouts.main')
@section('content')
    <section id="content">
        <div id="page-title">线上取款</div>
        <section class="inner ng-scope">
            <div class="col-md-12">
                <div class="ng-scope" style="">
                    <div>
                        <div class="panel panel-custom ng-claok ng-scope" id="withdrawCard">
                            <div id="account-heading" class="panel-heading">
                            <span>
                                提款详情
                            </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal ng-pristine ng-invalid ng-invalid-required" action="{{ route('wap.post_drawing') }}" method="post">
                                    <div class="form-group">
                                        <div class="col-sm-5 control-div">
                                            <div class="input-block">
                                                <label class="col-sm-3 control-label" for="inputProvince" style="padding:0px;font-weight:bolder">可用余额:</label>
                                                <i class="input-block-top"></i>
                                                <span class="UserAmountController drawing-money" style="color:red;">{{ $_member -> money }}</span>
                                                <i class="input-block-btm"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="inputProvince">码量余额</label>
                                        <div class="col-sm-5 control-div">
                                            <div class="input-block">
                                                <i class="input-block-top"></i>
                                                <input class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched" id="TrueName" required="" readonly="" value="{{ $_member -> ml_money }}">
                                                <i class="input-block-btm"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="inputProvince">开户银行</label>
                                        <div class="col-sm-5 control-div">
                                            <div class="input-block">
                                                <i class="input-block-top"></i>
                                                <input class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched" id="openBank" readonly="" required="" style="" value="{{ $_member -> bank_name }}">
                                                <i class="input-block-btm"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="inputBankName">银行账号</label>
                                        <div class="col-sm-5 control-div">
                                            <div class="input-block">
                                                <i class="input-block-top"></i>
                                                <input class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched" id="bankCard" readonly="" required="" style="" value="{{ $_member -> bank_card }}">
                                                <i class="input-block-btm"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="inputProvince">提款金额</label>
                                        <div class="col-sm-5 control-div">
                                            <div class="input-block">
                                                <i class="input-block-top"></i>
                                                <input class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched" type="number" id="amount" placeholder="请在此输入提现金额" required="" style="" name="money">
                                                <i class="input-block-btm"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="inputCity">提款密码</label>
                                        <div class="col-sm-5 control-div">
                                            <div class="input-block">
                                                <i class="input-block-top"></i>
                                                <input  type="password" class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched" oninput="if(value.length>6)value=value.slice(0,6)" id="WithdrawalsPassword" placeholder="请输入提款密码" required="" style="" name="qk_pwd">
                                                <i class="input-block-btm"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-default btn-submit ajax-submit-btn"  warning="正在提交审核...">
                                            <span>确认提交</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-custom ng-hide" style="display:none" id="sucessCard">
                        <div class="panel-heading">
                            完成
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default apply-info-panel">
                                <div class="panel-heading">
                                    您的取款申请已成功提交！
                                    <br>
                                    以下是您的取款资料，请妥善保存
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>取款金额</label>
                                        <p class="ng-binding" id="takeMoney"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>取款后帐户余额</label>
                                        <p class="ng-binding"><span class="UserAmountController">1000</span></p>
                                    </div>
                                    <div class="text-center" style="padding:30px 0 20px;">
                                        <a href="/Index" class="btn btn-default">回首页</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection