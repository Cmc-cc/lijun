@extends('wap.template.theme11.layouts.main')
@section('content')
    <div data-reactroot="" class="app_container remove appdduser/pwd">
        <div class="am-navbar am-navbar-dark">
            <div class="am-navbar-left" role="button" onclick="window.history.back();"><span class="am-navbar-left-icon" aria-hidden="true"><svg class="am-icon am-icon-left am-icon-md"><use xlink:href="#left"></use></svg></span><span class="am-navbar-left-content">返回</span></div>
            <div class="am-navbar-title">密码管理</div>
            <div class="am-navbar-right"></div>
        </div>
        <div class="container">
            <div style="flex: 1 1 0%;">
                <div style="text-align: center;padding: 20px;">
                    登陆密码修改
                </div>
                <form action="{{ route('wap.reset_login_password') }}" method="post" name="form1">
                <div style="background: white; padding-bottom: 0.2rem;">
                    <div class="am-list-item am-input-item">
                        <div class="am-input-label am-input-label-4">
                            <p style="color: rgb(102, 102, 102);">旧密码: </p>
                        </div>
                        <div class="am-input-control"><input name="old_password" id="oldPwd" type="password" value="" placeholder="当前登陆密码"></div>
                    </div>

                    <div style="position: relative;">
                        <div class="am-list-item am-input-item">
                            <div class="am-input-label am-input-label-4">
                                <p style="color: rgb(102, 102, 102);">新密码: </p>
                            </div>
                            <div class="am-input-control"><input name="password" type="password" id="newPwd" value="" placeholder="新登陆密码"></div>
                        </div>
                    </div>
                    <div class="am-list-item am-input-item">
                        <div class="am-input-label am-input-label-4">
                            <p style="color: rgb(102, 102, 102);">确认密码: </p>
                        </div>
                        <div class="am-input-control"><input name="password_confirmation" type="password" id="confirmPwd" value="" placeholder="确认密码"></div>
                    </div>
                </div>
                <div class="ajax-submit-btn" id="updatePwd">
                    <p class="submitButton">提交</p>
                </div>
                </form>
                <div style="text-align: center;padding: 20px;">
                    取款密码修改
                </div>
                <form action="{{ route('wap.reset_qk_password') }}" method="post" name="form2" >
                <div style="background: white; padding-bottom: 0.2rem;">
                    <div class="am-list-item am-input-item">
                        <div class="am-input-label am-input-label-4">
                            <p style="color: rgb(102, 102, 102);">旧密码: </p>
                        </div>
                        <div class="am-input-control"><input name="old_password" type="password" value="" placeholder="当前取款密码"></div>
                    </div>

                    <div style="position: relative;">
                        <div class="am-list-item am-input-item">
                            <div class="am-input-label am-input-label-4">
                                <p style="color: rgb(102, 102, 102);">新密码: </p>
                            </div>
                            <div class="am-input-control"><input name="password" type="password" value="" placeholder="新取款密码"></div>
                        </div>
                    </div>
                    <div class="am-list-item am-input-item">
                        <div class="am-input-label am-input-label-4">
                            <p style="color: rgb(102, 102, 102);">确认密码: </p>
                        </div>
                        <div class="am-input-control"><input name="password_confirmation" type="password" value="" placeholder="确认密码"></div>
                    </div>
                </div>
                <div class="ajax-submit-btn" id="updatePwd">
                    <p class="submitButton">提交</p>
                </div>
                </form>
            </div>
        </div>


    </div>


@endsection