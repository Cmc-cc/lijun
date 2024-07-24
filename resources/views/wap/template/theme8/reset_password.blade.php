@extends('wap.template.theme8.layouts.main')
@section('content')
    <div class="change-loginpassword">
        <header class="mui-bar mui-bar-nav mui-action-back">
            <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
            <h1 class="mui-title">
                修改密码
            </h1>
        </header>
        <div class="mui-content mui-scroll-wrapper" data-scroll="5">
            <div style="text-align: center;font-size: 16px;padding: 10px;">
                修改登陆密码
            </div>
            <div class="mui-scroll">
                <form id="updatePwdForm" action="{{ route('wap.reset_login_password') }}" method="post" name="form1">
                    <div class="mui-row">
                        <div class="mui-input-group mine-form">
                            <div class="mui-input-row">
                                <label for="">当前密码</label>
                                <div class="ct">
                                    <input name="old_password" type="password" maxlength="12" placeholder="请输入当前登陆密码" warning="请输入当前登录密码">
                                </div>
                            </div>

                            <div class="mui-input-row">
                                <label for="">新密码</label>
                                <div class="ct">
                                    <input name="password" type="password" id="newPwd" maxlength="12" placeholder="须6-12个英文字母以及数字的组合" warning="请输入登录新密码">
                                </div>
                            </div>
                            <div class="mui-input-row">
                                <label for="">确认密码</label>
                                <div class="ct">
                                    <input name="password_confirmation" type="password" maxlength="12" placeholder="请再次输入登录密码" warning="请再次输入登录密码">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mui-row">
                        <div class="gb-form-foot">
                            <a href="javascript:;" id="updatePwd" class="mui-btn mui-btn-primary submit ajax-submit-btn" >修改</a>
                        </div>
                    </div>
                </form>
            </div>
            <div style="text-align: center;color: #333;font-size: 16px;padding:10px;">
                修改取款密码
            </div>
            <div class="mui-scroll">
                <form action="{{ route('wap.reset_qk_password') }}" method="post">
                    <div class="mui-row">
                        <div class="mui-input-group mine-form">

                            <div class="mui-input-row">
                                <label for="">当前密码</label>
                                <div class="ct">
                                    <input name="old_password" type="password" id="oldPwd" maxlength="12" placeholder="请输入当前取款密码" warning="请输入当前登录密码">
                                </div>
                            </div>

                            <div class="mui-input-row">
                                <label for="">新密码</label>
                                <div class="ct">
                                    <input name="password" type="password" maxlength="12" placeholder="须6位纯数字" warning="请输入登录新密码">
                                </div>
                            </div>
                            <div class="mui-input-row">
                                <label for="">确认密码</label>
                                <div class="ct">
                                    <input name="password_confirmation" type="password" id="confirmPwd" maxlength="12" placeholder="请再次输入提款密码" warning="请再次输入登录密码">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mui-row">
                        <div class="gb-form-foot">
                            <a href="javascript:;" id="updatePwd" class="mui-btn mui-btn-primary submit ajax-submit-btn" >修改</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection