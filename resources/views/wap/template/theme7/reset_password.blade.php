@extends('wap.template.theme7.layouts.main')
@section('content')
    <style>
        html, body {
            padding-top:44px;
        }
    </style>
    <div class="layout-main">
        <div class="member-module member-module-qkmm">
            <div class="module-top">

                <div class="top-container navbar-nav">

                    <div class="left-menu">
                        <a href="javascript:;" onclick="window.location.href='{{ route('wap.index') }}'">
                            <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                    </div>

                    <div class="page-title">修改密码</div>
                </div>

                <div class="top-menu-area">
                    <div class="col-xs-6 tab active-tab" tab="tab_1">
                        <a href="#" class="qkmm-tab-title">修改登录密码</a>
                    </div>
                    <div class="col-xs-6 tab" tab="tab_2">
                        <a href="#">修改取款密码</a>
                    </div>
                </div>
            </div>
            <div class="module-main diy-scrollbar" id="tab_1">
                <div>
                    <div>
                        <form action="{{ route('wap.reset_login_password') }}" method="post" name="form1">
                            <div class="main-container">
                                <div>
                                    <div class="form-group">
                                        <label for="mdl-20_oldpassword">旧密码</label>
                                        <input type="password" maxlength="12" class="form-control" placeholder="请输入登录密码" warning="请输入当前登录密码" name="old_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="mdl-20_qkmm">新密码</label>
                                        <input type="password"  maxlength="12" class="form-control" placeholder="须6-12个英文字母以及数字的组合" warning="请输入登录新密码" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="mdl-20_reqkmm">确认新密码</label>
                                        <input type="password" maxlength="12" class="form-control" warning="请再次输入登录密码" placeholder="请再次确认密码" name="password_confirmation">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary form-control submit-btn ajax-submit-btn">提交</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="module-main diy-scrollbar" id="tab_2" style="display: none;">
                <div>
                    <div>
                        <form action="{{ route('wap.reset_qk_password') }}" method="post" name="form2" >
                        <div class="main-container">
                            <div>
                                <div class="form-group">
                                    <label for="mdl-20_oldpassword">旧密码</label>
                                    <input type="password" id="oldPwd" maxlength="12" class="form-control" placeholder="请输入提款密码" warning="请输入当前登录密码" name="old_password">
                                </div>
                                <div class="form-group">
                                    <label for="mdl-20_qkmm">新密码</label>
                                    <input type="password" id="newPwd" maxlength="12" class="form-control" placeholder="须6位纯数字" warning="请输入登录新密码" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="mdl-20_reqkmm">确认新密码</label>
                                    <input type="password" id="confirmPwd" maxlength="12" class="form-control" warning="请再次输入登录密码" placeholder="请再次确认密码" name="password_confirmation">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary form-control submit-btn ajax-submit-btn" >提交</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('.tab').click(function () {
                var tab = $(this).attr('tab');
                $(this).addClass('active-tab');
                $(this).siblings().removeClass('active-tab');
                if(tab == 'tab_1') {
                    $('#'+tab).show();
                    $('#tab_2').hide();
                }else if(tab == 'tab_2') {
                    $('#'+tab).show();
                    $('#tab_1').hide();
                }
            })
        })
    </script>
@endsection