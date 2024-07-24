@extends('wap.template.theme9.layouts.main')
@section('content')
    <link href="{{asset('/wap/theme9/css/account.css')}}" rel="stylesheet" />
    <section id="content">
        <div id="page-title">绑定手机</div>
        <section class="inner ng-scope">
            <div class="col-md-12">
                <div class="panel panel-custom">
                    <div class="panel-body">
                        <div id="alert-chg-pwd" class="alert alert-info" style="text-align: center">
                            会员帐户:{{ $_member -> name }}
                        </div>
                        <form class="form-horizontal ng-pristine ng-invalid ng-invalid-required" action="{{ route('wap.post_set_phone') }}" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">手机号码</label>
                                <div class="col-sm-5 control-div">
                                    <input name="phone" type="text" oninput="if(value.length>11)value=value.slice(0,11)" id="confirmPwd" warning="请再次输入登录密码" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="请填写手机号码" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-default ajax-submit-btn">
                                        <span class="ng-binding">绑定</span>
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