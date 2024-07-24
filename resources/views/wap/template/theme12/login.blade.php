@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/login.css') }}" rel="stylesheet" />

    <div id="master-container-Center_LoginResponsiveBlock_45088" class="responsive-block login-rblock">
        <div id="html-container-Center_LoginResponsiveBlock_45088">
            <form action="{{ route('wap.login.post') }}" method="post">
                <div class="auth-form login-type--active">
                <div class="auth-form__body">
                    <div class="auth-form__item" id="longUserName">
                        <label class="user-info__label">用户名</label>
                        <div class="user-info__input">
                            <input type="text" id="loginUsername" placeholder="请输入用户名" name="name" >
                        </div>
                    </div>
                    <div class="auth-form__item" id="longUserPwd">
                        <label class="user-info__label">密码</label>
                        <div class="user-info__input">
                            <input type="password" id="loginUserpwd" placeholder="请输入密码" name="password" >
                        </div>
                    </div>
                    <div class="auth-form__item">
                        <div class="auth-form__row auth-form__row--2 clearfix">
                            <div class="auth-form__col counted">
                                <a id="Center_LoginResponsiveBlock_45088-forgot-pass-button" class="auth-form__forgot"  href="{{ $_system_config -> service_link }}">
                                <span>忘记密码？</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="auth-form__item">
                        <a href="javascript:void(0)" class="user-info__button ajax-submit-btn">
                            <span id="btn_Center_LoginResponsiveBlock_45088-submit-button" >登录</span>
                            <span class="icon i-24 i-o-acc-check user-info__check" ></span>
                        </a>
                    </div>
                    <div class="auth-form__item register ">
                        <a href="{{ route('wap.register') }}" class="user-info__button " >
                        <span id="btn_Center_LoginResponsiveBlock_45088-submit-button" data-uat="personal-information-button-label-text">没有账号，去注册</span>
                        </a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script>
    </script>
@endsection