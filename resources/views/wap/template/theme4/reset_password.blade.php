@extends('wap.template.theme4.layouts.main')
@section('content')
    <div class="hd-tit" style="margin-top: 10px">
        <h3>修改登录密码</h3>
    </div>
    <form action="{{ route('wap.reset_login_password') }}" method="post" name="form1">
    <ul class="mod-forms">
        <li>
            <label>当前密码:</label>
            <div class="form-ipt">
                <input type="password" name="old_password" id="oldPwd" maxlength="12" class="txt-ipt" placeholder="请输入登录密码" warning="请输入当前登录密码">
            </div>
        </li>
        <li>
            <label>新的密码:</label>
            <div class="form-ipt">
                <input type="password" name="password" id="newPwd" maxlength="12" class="txt-ipt" placeholder="须6-12个英文字母以及数字的组合" warning="请输入登录新密码">
            </div>
        </li>
        <li>
            <label>确认密码:</label>
            <div class="form-ipt">
                <input type="password" name="password_confirmation" id="confirmPwd" maxlength="12" class="txt-ipt" warning="请再次输入登录密码">
            </div>
        </li>
    </ul>
    <input class="confirm-sub mt20 ajax-submit-btn" type="button" id="change_btn"  value="提 交">
    </form>
    <div class="hd-tit" style="margin-top: 10px;">
        <h3>修改取款密码</h3>
    </div>
    <form action="{{ route('wap.reset_qk_password') }}" method="post" name="form1">
        <ul class="mod-forms">
            <li>
                <label>当前密码:</label>
                <div class="form-ipt">
                    <input type="password" name="old_password" id="oldPwd" maxlength="12" class="txt-ipt" placeholder="请输入登录密码" warning="请输入当前取款密码">
                </div>
            </li>
            <li>
                <label>新的密码:</label>
                <div class="form-ipt">
                    <input type="password" name="password" id="newPwd" maxlength="12" class="txt-ipt" placeholder="6位纯数字" warning="请输入登录新密码">
                </div>
            </li>
            <li>
                <label>确认密码:</label>
                <div class="form-ipt">
                    <input type="password" name="password_confirmation" id="confirmPwd" maxlength="12" class="txt-ipt" warning="请再次输入登录密码">
                </div>
            </li>
        </ul>
        <input class="confirm-sub mt20 ajax-submit-btn" type="button" id="change_btn"  value="提 交">
    </form>
@endsection