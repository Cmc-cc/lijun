@extends('wap.template.theme9.layouts.main')
@section('content')
    <link href="{{asset('/wap/theme9/css/account.css')}}" rel="stylesheet" />
    <section id="content">
        <div id="page-title">变更密码</div>
        <section class="inner ng-scope">
            <div class="col-md-12">
                <div class="panel panel-custom">
                    <div class="panel-body">
                        <div id="alert-chg-pwd" class="alert alert-info" style="text-align: center">
                            修改登陆密码
                        </div>
                        <form class="form-horizontal ng-pristine ng-invalid ng-invalid-required" action="{{ route('wap.reset_login_password') }}" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">原始密码</label>
                                <div class="col-sm-5 control-div">
                                    <input name="old_password" id="oldPwd" oninput="if(value.length>12)value=value.slice(0,12)" warning="请输入当前登录密码" type="password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="请输入您的原始登陆密码" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">新密码</label>
                                <div class="col-sm-5 control-div">
                                    <input name="password" type="password" oninput="if(value.length>12)value=value.slice(0,12)" id="newPwd" warning="请输入登录新密码" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="6 -12个字符，须包含字母及数字" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">确认新密码</label>
                                <div class="col-sm-5 control-div">
                                    <input name="password_confirmation" type="password" oninput="if(value.length>12)value=value.slice(0,12)" id="confirmPwd" warning="请再次输入登录密码" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="请再次输入您的新登陆密码" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-default ajax-submit-btn">
                                        <span class="ng-binding">变更</span>
                                    </button>
                                    <a href="{{ route('wap.index') }}">
                                        <button type="button" class="btn btn-default">取消</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-body">
                        <div id="alert-chg-pwd" class="alert alert-info" style="text-align: center">
                            修改取款密码
                        </div>
                        <form class="form-horizontal ng-pristine ng-invalid ng-invalid-required" action="{{ route('wap.reset_qk_password') }}" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">原始密码</label>
                                <div class="col-sm-5 control-div">
                                    <input name="old_password" id="oldPwd" oninput="if(value.length>6)value=value.slice(0,6)" warning="请输入当前登录密码" type="password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="请输入您的原始提款密码" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">新密码</label>
                                <div class="col-sm-5 control-div">
                                    <input name="password" type="password" oninput="if(value.length>6)value=value.slice(0,6)" id="newPwd" warning="请输入登录新密码" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="6位纯数字" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">确认新密码</label>
                                <div class="col-sm-5 control-div">
                                    <input name="password_confirmation" type="password" oninput="if(value.length>12)value=value.slice(0,12)" id="confirmPwd" warning="请再次输入登录密码" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="请再次输入您的新提款密码" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-default ajax-submit-btn">
                                        <span class="ng-binding">变更</span>
                                    </button>
                                    <a href="{{ route('wap.index') }}">
                                        <button type="button" class="btn btn-default">取消</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection