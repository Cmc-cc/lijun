@extends('wap.template.theme8.layouts.main')
@section('content')
    <div class="change-loginpassword">
        <header class="mui-bar mui-bar-nav mui-action-back">
            <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
            <h1 class="mui-title">
                绑定手机号
            </h1>
        </header>
        <div class="mui-content mui-scroll-wrapper" data-scroll="5">
            <div class="mui-scroll">
                <form id="updatePwdForm" action="{{ route('wap.post_set_phone') }}" method="post" name="form1">
                    <div class="mui-row">
                        <div class="mui-input-group mine-form">
                            <div class="mui-input-row">
                                <label for="">账号</label>
                                <div class="ct">
                                    <input value="{{ $_member -> name }}" type="text" readonly maxlength="12" placeholder="请输入当前登陆密码" warning="请输入当前登录密码">
                                </div>
                            </div>

                            <div class="mui-input-row">
                                <label for="">绑定手机</label>
                                <div class="ct">
                                    <input name="phone" type="password" maxlength="12" placeholder="请输入手机号码" warning="请再次输入登录密码">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mui-row">
                        <div class="gb-form-foot">
                            <a href="javascript:;" id="updatePwd" class="mui-btn mui-btn-primary submit ajax-submit-btn" >绑定</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection