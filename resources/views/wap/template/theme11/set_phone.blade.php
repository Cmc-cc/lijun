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
        <div class="am-navbar-title">绑定手机</div>
        <div class="am-navbar-right"></div>
    </div>
    <div class="container">
        <div style="flex: 1 1 0%;">
            <div class="rootContainer">
                <form  method="post" action="{{ route('wap.post_set_phone') }}">
                    <div class="am-list-item am-input-item input">
                        <div class="am-input-label am-input-label-5">登录账号：</div>
                        <div class="am-input-control"><input type="text" maxlength="12" value="{{ $_member -> name }}"
                                                             warning="" readonly></div>
                    </div>
                    <div class="am-list-item am-input-item input">
                        <div class="am-input-label am-input-label-5">绑定手机：</div>
                        <div class="am-input-control"><input type="text" placeholder="请输入手机号码" maxlength="50"
                                                             name="phone"
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