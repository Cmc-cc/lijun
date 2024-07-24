@extends('wap.template.theme11.layouts.main')
@section('content')
    <div data-reactroot="" class="app_container remove appdduser/pwd">
        <div class="am-navbar am-navbar-dark">
            <div class="am-navbar-left" role="button" onclick="window.history.back();"><span class="am-navbar-left-icon" aria-hidden="true"><svg class="am-icon am-icon-left am-icon-md"><use xlink:href="#left"></use></svg></span><span class="am-navbar-left-content">返回</span></div>
            <div class="am-navbar-title">密码管理</div>
            <div class="am-navbar-right"></div>
        </div>
        <div class="container">
                    <div style="background: white; padding-bottom: 0.2rem;">
                        <div class="am-list-item am-input-item">
                            <div class="am-input-label am-input-label-7">
                                <p style="color: rgb(102, 102, 102);">会员账户 </p>
                            </div>
                            <div class="am-input-control">
                                <input type="text"  placeholder="当前登陆密码" value="{{ $_member -> name }}" readonly>
                            </div>
                        </div>

                        <div style="position: relative;">
                            <div class="am-list-item am-input-item">
                                <div class="am-input-label am-input-label-7">
                                    <p style="color: rgb(102, 102, 102);">手机号码: </p>
                                </div>
                                <div class="am-input-control">
                                    @if ($_member->phone)
                                        <input name="password" type="text" value="{{ $_member -> phone }}" readonly>
                                    @else
                                        <a
                                                style="color: #ffffff;background: #00623b;text-align: center;width: 85px;padding: 5px;border-radius:8px;display: inline-block;font-size: 12px"
                                                href="{{ route('wap.set_phone') }}" class="c_blue">去设置</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="am-list-item am-input-item">
                            <div class="am-input-label am-input-label-7">
                                <p style="color: rgb(102, 102, 102);">注册时间: </p>
                            </div>
                            <div class="am-input-control">
                                <input  type="text"  value="{{ $_member ->created_at }}" ></div>
                        </div>
                        <div class="am-list-item am-input-item">
                            <div class="am-input-label am-input-label-7">
                                <p style="color: rgb(102, 102, 102);">最后登陆时间: </p>
                            </div>
                            <div class="am-input-control">
                                <input type="text" id="confirmPwd" value="{{ $_member -> last_login_at }}" readonly></div>
                        </div>
                    </div>
            </div>
        </div>




@endsection