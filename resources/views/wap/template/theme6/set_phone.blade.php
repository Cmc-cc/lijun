@extends('wap.template.theme6.layouts.main')
@section('content')
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">绑定手机号</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content withdraw-content">
        <form action="{{ route('wap.post_set_phone') }}" method="post" name="form1">
            <div class="deposit-shuru" style="margin-top: 10px;">
                <label>登陆账号：</label>
                <input type="text" class="txt-ipt" maxlength="50" value="{{ $_member->name }}" warning="" readonly="">
            </div>
            <div class="deposit-shuru">
                <label>绑定手机号：</label>
                <input type="tel" name="phone" value="" placeholder="请输入手机号" maxlength="50" >
            </div>
            <button class="mui-btn surebtn ajax-submit-btn" >提交</button>
        </form>
    </div>

@endsection