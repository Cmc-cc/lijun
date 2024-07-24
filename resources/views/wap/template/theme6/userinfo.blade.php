@extends('wap.template.theme6.layouts.main')
@section('content')
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">个人资料</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content withdraw-content">

            <div class="deposit-shuru" style="margin-top: 10px;">
                <label>登陆账号：</label>
                <input type="text" class="txt-ipt" maxlength="50" value="{{ $_member->name }}" warning="" readonly="">
            </div>
            <div class="deposit-shuru">
                <label>手机号码：</label>
                @if ($_member->phone)
                    <input type="text" maxlength="50" class="txt-ipt" value="{{ $_member->phone }}" readonly="">
                @else
                    <a style="display: block;float: right;width: 60%" href="{{ route('wap.set_phone') }}" class="c_blue">去设置</a>
                @endif
            </div>
            <div class="deposit-shuru">
                <label>注册时间：</label>
                <input type="text" value="{{ $_member->created_at }}" maxlength="50" readonly="">
            </div>
            <div class="deposit-shuru">
                <label>最后登陆时间：</label>
                <input type="text" name="money" value="{{ $_member -> last_login_at }}" id="amount" maxlength="50" readonly="">
            </div>
    </div>

@endsection