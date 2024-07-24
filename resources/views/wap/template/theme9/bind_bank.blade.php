@extends('wap.template.theme9.layouts.main')
@section('content')

    <link href="{{ asset('wap/theme9/css/withdrawApplication.css') }}" rel="stylesheet" />
    <section id="content">
        <div id="page-title">绑定银行卡</div>
        <section class="inner ng-scope">
            <div class="col-md-12">
                <div class="ng-scope" style="">
                    <div>
                        <div class="panel panel-custom ng-claok ng-scope" id="addCard">
                            <div id="account-heading" class="panel-heading">
                            <span>
                                绑定信息
                            </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal ng-pristine ng-invalid ng-invalid-required" action="{{ route('wap.post_bind_bank') }}" method="post">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="inputCity">登录账号</label>
                                        <div class="col-sm-5 control-div">
                                            <div class="input-block">
                                                <i class="input-block-top"></i>
                                                <input class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched" value="{{ $_member -> name }}" name="realname" readonly="readonly" required="" style="">
                                                <i class="input-block-btm"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="inputCity">开户姓名</label>
                                        <div class="col-sm-5 control-div">
                                            <div class="input-block">
                                                <i class="input-block-top"></i>
                                                <input name="bank_username" class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched" id="account" required="" style="">
                                                <i class="input-block-btm"></i>
                                            </div>
                                            <span id="TrueName"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="inputBankName">银行名称</label>
                                        <div class="col-sm-5 control-div">
                                            <div class="input-block">
                                                <i class="input-block-top"></i>
                                                <select name="bank_name" class="form-control ng-pristine ng-valid ng-not-empty ng-valid-required ng-touched" id="bankname" required="" style="">
                                                    <option value="">--请选择--</option>
                                                    @foreach(\App\Models\Base::$BANK_TYPE as $v)
                                                        <option value="{{ $v }}"
                                                                @if($_member->bank_name == $v) selected @endif>{{ $v }}</option>
                                                    @endforeach
                                                </select>
                                                <i class="input-block-btm"></i>
                                            </div>
                                            <span id="openBank"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="inputProvince">银行账号</label>
                                        <div class="col-sm-5 control-div">
                                            <div class="input-block">
                                                <i class="input-block-top"></i>
                                                <input name="bank_card"  class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched" id="card" maxlength="21" oninput="if(value.length>21)value=value.slice(0,21)" placeholder="如：123456***7890" warning="请输入开户账号" required="" style="">
                                                <i class="input-block-btm"></i>
                                            </div>
                                            <span id="bankCard"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="inputCity">开户银行</label>
                                        <div class="col-sm-5 control-div">
                                            <div class="input-block">
                                                <i class="input-block-top"></i>
                                                <input name="bank_branch_name"  class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched" id="banknode" placeholder="示例：河南商丘工商银行五一路支行" warning="请输入开户行信息" required="" style="">
                                                <i class="input-block-btm"></i>
                                            </div>
                                            <span id="bankMeg"></span>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-default btn-submit ajax-submit-btn" id="newbtn">
                                            <span>绑定</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>
    <script>
        //biCommon.getBindbank($("#openBank"), $("#bankCard"), $("#bankMeg"), $("#TrueName"), 2);
        //biCommon.getWithdrawBankList();
    </script>

@endsection