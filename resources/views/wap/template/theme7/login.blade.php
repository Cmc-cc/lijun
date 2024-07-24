<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>1</title>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
    <link href="{{ asset('/wap/theme7/css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('/wap/theme7/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/wap/theme7/css/index.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            padding-top: 0px;
        }
    </style>
</head>

<body class="common_style">

<div class="layout-main">
    <div class="member-module member-module-login">
        <div class="module-top">
        </div>
        <div class="module-main diy-scrollbar">
            <div>
                <div>
                    <div class="main-container" style="padding:0 0 20px 0;">
                        <div class="top-container navbar-nav">
                            <div class="left-menu">
                                <a href="javascript:;" onclick="window.history.back();">
                                    <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                            </div>
                            <div class="right-menu" style="font-size:20px;">
                                <a href="{{ route('wap.register') }}" style="color:#fff;font-size:14px;padding:2px;text-decoration:none;">注册</a>
                                <a href="{{ route('wap.index') }}" style="color:#fff;font-size:20px;vertical-align:middle;padding:2px;">
                                    <span aria-hidden="true" class="fa fa-home" style="line-height:19px;"></span>
                                </a>
                            </div>
                        </div>
                        <form id='login-form' class="mui-input-group" action="{{ route('wap.login.post') }}" method="post">
                        <div style="width:240px;margin:0 auto;" class="mod-forms-2">
                            <img src="{{ $_system_config->m_site_logo }}" alt="站标" style="display:block;margin:20px auto;max-width:188px;">
                            <div class="form-group dropdown"  id="longUserName">
                                <label for="mdl-5_username"><span class="fa fa-user" aria-hidden="true"></span></label>
                                <input name="name"  type="text" id="loginUsername" placeholder="您的会员账号" maxlength="16" class="form-control">
                            </div>
                            <div class="form-group password-area"  id="longUserPwd">
                                <label for="mdl-5_password"><span class="fa fa-lock" aria-hidden="true"></span></label>
                                <input name="password" type="password" id="loginUserpwd" placeholder="您的密码" maxlength="16" class="form-control cryptStr">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary form-control submit-btn ajax-submit-btn">登录</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modalWaring">
    <div class="modal-dialog message-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">系统提示</h4>
            </div>
            <div class="modal-body">
                <div class="line-info">
                    <div class="info-caption">
                        <span class="glyphicon glyphicon-alert alert-icon" aria-hidden="true"></span>
                    </div>
                    <div class="info-left">
                        <pre id="messageWaring">用户名不能为空</pre>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary confirm-btn" onclick="sureWaring()">确定</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" isopensms="False" id="OpenSMS" />
</body>
<script type="text/javascript" src="{{ asset('/wap/theme7/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
<script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
<script>
    //loginFun();
    //whetherOpenSMS();
</script>
</html>
