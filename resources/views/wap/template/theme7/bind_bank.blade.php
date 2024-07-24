@extends('wap.template.theme7.layouts.main')
@section('content')
    <div class="layout-main">
        <div class="member-module member-module-bank" id="wtdCardContent">
            <div class="module-top">
                <div class="top-container navbar-nav">
                    <div class="left-menu">
                        <a href="javascript:;" onclick="window.history.back();">
                            <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                    </div>

                    <div class="page-title">绑定银行</div>
                </div>
            </div>
            <div class="module-main diy-scrollbar">
                <form  method="post" action="{{ route('wap.post_bind_bank') }}">
                <div>
                    <div>
                        <div class="main-container">
                            <div class="placeholder-fit">
                                <div class="form-group">
                                    <label for="mdl-6_realname">登录账号</label>
                                    <input type="text" id="mdl-6_realname" class="form-control" value="{{ $_member -> name }}" name="realname" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="mdl-6_realname">开户姓名</label>
                                    <input type="text" id="account" class="form-control" value="" name="bank_username" >
                                </div>
                                <div class="form-group">
                                    <label for="mdl-6_bank">银行名称</label>
                                    <select id="bankname" class="form-control" name="bank_name">
                                        <option value="">--请选择--</option>
                                        @foreach(\App\Models\Base::$BANK_TYPE as $v)
                                            <option value="{{ $v }}"
                                                    @if($_member->bank_name == $v) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="mdl-6_bank_account">银行账号</label>
                                    <input type="number" name="bank_card" id="card" maxlength="18" class="form-control" value="" placeholder="如：123456***7890" warning="请输入开户账号">
                                </div>
                                <div class="form-group">
                                    <label for="mdl-6_bank">开户银行</label>
                                    <input id="banknode" name="bank_branch_name" type="text" class="form-control" placeholder="示例：河南商丘工商银行五一路支行" warning="请输入开户行信息">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary form-control submit-btn ajax-submit-btn" id="newbtn">提交</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection