@extends('wap.template.theme11.layouts.main')
@section('content')
    <div class="am-navbar am-navbar-dark">

        <div class="am-navbar-left" role="button" onclick="window.history.back();">
        <span class="am-navbar-left-icon" aria-hidden="true">
            <svg class="am-icon am-icon-left am-icon-md">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left"></use>
            </svg>
        </span>
            <span class="am-navbar-left-content">返回</span>
        </div>
        <div class="am-navbar-title">添加银行卡</div>
        <div class="am-navbar-right"></div>
    </div>
    <div class="container">
        <div style="flex: 1 1 0%;">
            <div class="rootContainer">
                <form  method="post" action="{{ route('wap.post_bind_bank') }}">
                    <div class="am-list-item am-input-item input">
                        <div class="am-input-label am-input-label-5">登录账号：</div>
                        <div class="am-input-control"><input type="text" maxlength="12" value="{{ $_member -> name }}"
                                                             warning="" readonly></div>
                    </div>
                    <div class="am-list-item am-input-item input">
                        <div class="am-input-label am-input-label-5">真实姓名：</div>
                        <div class="am-input-control"><input type="text" maxlength="12" id="UserName" placeholder="请输入真实姓名"
                            name="bank_username"
                            ></div>
                    </div>
                    <div class="am-list-item am-input-item input">
                        <div class="am-input-label am-input-label-5">银行：</div>
                        <div class="am-input-control">
                            <select id="bankname" style="font-size: 16px;color: #999;"
                            name="bank_name"
                            >
                                <option value="">--请选择--</option>
                                @foreach(\App\Models\Base::$BANK_TYPE as $v)
                                    <option value="{{ $v }}"
                                            @if($_member->bank_name == $v) selected @endif>{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="am-list-item am-input-item input">
                        <div class="am-input-label am-input-label-5">卡号：</div>
                        <div class="am-input-control"><input type="number" id="card" maxlength="24" warning="请输入开户账号"
                                                             name="bank_card"
                                                             placeholder="请输入银行卡号"></div>
                    </div>
                    <div class="am-list-item am-input-item input">
                        <div class="am-input-label am-input-label-5">开户银行：</div>
                        <div class="am-input-control"><input type="text" placeholder="如：河北唐山建设银行" maxlength="50"
                                                             name="bank_branch_name"
                                                             id="banknode" warning="请输入开户行信息"></div>
                    </div>

                    <div class="touchableStyles">
                        <p class="submitButton ajax-submit-btn" >绑定</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection