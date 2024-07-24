@extends('wap.template.theme9.layouts.main')
@section('content')
<link href="{{ asset('wap/theme9/css/register.css') }}" rel="stylesheet" />

<section id="content">
    <div id="page-title">账户注册</div>
    <section id="register" class="ng-scope">
        <form class="form-horizontal ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" action="{{ route('wap.register.post') }}" method="post">
            <fieldset>
                @if($_system_config->is_regtj_1 == 1)
                <div class="form-group" id="Introducer">
                    <label class="control-label">
                        @if($_system_config->is_regtj_2 == 1)<i class="fa fa-star fa-required"></i>@endif
                        介绍人
                    </label>
                    <div class="control-div">
                        <input name="t_name" type="text" maxlength="8" id="regIntroducer" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" placeholder=" 4-8 个数字组成" required="">
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label class="control-label">
                        <i class="fa fa-star fa-required"></i>
                        会员帐号
                    </label>
                    <div class="control-div">
                        <input name="name"  type="text" maxlength="9" id="regUsername" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="6 - 16 字符，字母开头，限字母，数字和底线" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">
                        <i class="fa fa-star fa-required"></i>
                        会员密码
                    </label>
                    <div class="control-div">
                        <input name="password" type="password" id="regUserpwd" maxlength="12" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" required="" placeholder="6 个字符以上，须包含字母及数字">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">
                        <i class="fa fa-star fa-required"></i>
                        确认密码
                    </label>
                    <div class="control-div">
                        <input name="password_confirmation" type="password" id="regUserSurepwd" maxlength="12" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" required="" placeholder="请再次确认密码">
                    </div>
                </div>
                    @if($_system_config->is_real_name_1 == 1)
                <div class="form-group ng-scope">
                    <label class="control-label">
                        @if($_system_config->is_real_name_2 == 1)<i class="fa fa-star fa-required"></i>@endif
                        真实姓名
                    </label>
                    <div class="control-div">
                        <input name="real_name" id="regUserTrueName" maxlength="24" required="" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" type="text" placeholder="必须与提款的银行户口相同，否则无法提款">
                    </div>
                </div>
                    @endif
                    @if($_system_config->is_phone_1 == 1)
                <div class="form-group ng-scope" id="UserPhone">
                    <label class="control-label">
                        @if($_system_config->is_phone_2 == 1)<i class="fa fa-star fa-required"></i>@endif
                        手机号码
                    </label>
                    <div class="control-div">
                        <input name="phone" required="" id="regUserPhone" maxlength="11" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" type="number" oninput="if(value.length>11)value=value.slice(0,11)" placeholder="请输入您的手机号码">
                    </div>
                </div>
                    @endif
                @if($_system_config->is_qq_1 == 1)
                <div class="form-group ng-scope" >
                    <label class="control-label">
                        @if($_system_config->qq_2 == 1)<i class="fa fa-star fa-required"></i>@endif
                        QQ
                    </label>
                    <div class="control-div">
                        <input name="qq" required="" maxlength="20" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" type="text" oninput="if(value.length>20)value=value.slice(0,20)" placeholder="请输入您的QQ">
                    </div>
                </div>
                @endif
                @if($_system_config->is_email_1 == 1)
                <div class="form-group ng-scope">
                    <label class="control-label">
                        @if($_system_config->is_email_2 == 1)<i class="fa fa-star fa-required"></i>@endif
                        邮箱
                    </label>
                    <div class="control-div">
                        <input name="email" required="" maxlength="20" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" type="text" oninput="if(value.length>20)value=value.slice(0,20)" placeholder="请输入您的邮箱">
                    </div>
                </div>
                @endif
                @if($_system_config->is_weixin_1 == 1)
                <div class="form-group ng-scope">
                    <label class="control-label">
                        @if($_system_config->is_weixin_2 == 1)<i class="fa fa-star fa-required"></i>@endif
                        微信
                    </label>
                    <div class="control-div">
                        <input name="weixin" required="" id="regMailbox" maxlength="20" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" type="text" oninput="if(value.length>20)value=value.slice(0,20)" placeholder="请输入您的微信">
                    </div>
                </div>
                @endif
                <div class="form-group ng-scope">
                    <label class="control-label">
                        <i class="fa fa-star fa-required ng-scope" ></i>
                        取款密码
                    </label>
                    <div class="control-div">
                        <input name="qk_pwd" id="regUserWithdrawalsPwd" maxlength="6" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" type="password" autocomplete="off" placeholder="请输入取款密&#8203;&#8203;码(6位纯数字)" required="required">
                    </div>
                </div>
                <div class="form-group ng-scope">
                    <label class="control-label">
                        <i class="fa fa-star fa-required"></i>
                        验证码
                    </label>
                    <div class="control-div captcha">
                        <input name="captcha" id="regUserCaptcha" maxlength="5"  class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" checkcode-display="scope.checkCode" checkcode-type="Register" type="number" autocomplete="off" placeholder="请输入验证码" required="">
                        <img id="regpin" onclick="re_captcha()" src="{{ URL('kit/captcha/1') }}">
                        <div id="get-captcha">
                            <i class="fa fa-refresh" aria-hidden="true" onclick="$('#regpin').click();"></i>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <button id="btn-submit" class="submit ng-binding ajax-submit-btn">立即注册</button>
            </fieldset>
        </form>
    </section>
</section>
<!--提示框-->
<div id="modalWaring" onclick="sureWaring()" class="modal custom-modal fade ng-scope ng-isolate-scope" role="dialog" index="0" animate="animate" tabindex="-1" uib-modal-animation-class="fade" modal-in-class="in" modal-animation="true" style="z-index: 1050; display: none;">
    <div class="modal-dialog">
        <div class="modal-content" uib-modal-transclude="">
            <div class="cms-modal-header ng-scope">
                <h4 class="cms-modal-title">提示</h4>
            </div>
            <div class="cms-modal-body ng-binding ng-scope" id="messageWaring"></div>
            <div class="cms-modal-footer ng-scope">
                <button class="btn btn-confirm btn-block" onclick="sureWaring()">确定</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" isopensms="@systemseting["isOpenSms"]" id="OpenSMS" isPhone="@systemseting["isPhone"]" />
<script>
    //whetherOpenSMS();
    function re_captcha() {
        $url = "{{ URL('kit/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('regpin').src=$url;
    }
    //$("#regpin").click();
</script>
</script>
@endsection
