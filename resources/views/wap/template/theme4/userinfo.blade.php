@extends('wap.template.theme4.layouts.main')
@section('content')
    <div class="layout mt12 person-cont clearboth">
        <div class="hd-tit">
            <h3>个人资料</h3>
        </div>
        <ul class="mod-forms-2">
            <li>
                <label>登录账号</label>
                <div class="form-ipt">
                    <input type="text" id="UserName" maxlength="50" class="txt-ipt" value="{{ $_member->name }}" readonly="readonly">
                </div>
            </li>
            <li>
                <label>手机号码</label>

                <div class="form-ipt">
                    @if ($_member->phone)
                    <input type="text" id="Phone" maxlength="50" class="txt-ipt" value="{{ $_member->phone }}" readonly="">
                    @else
                        <a href="{{ route('wap.set_phone') }}" class="c_blue">去设置</a>
                    @endif
                </div>

            </li>
            <li>
                <label>注册时间</label>
                <div class="form-ipt">
                    <input type="text" id="Phone" value="{{ $_member->created_at }}" maxlength="50" class="txt-ipt" readonly="">
                </div>
            </li>
            <li>
                <label>最后登陆时间</label>
                <div class="form-ipt">
                    <input type="text" id="Phone" value="{{ $_member->last_login_at }}" maxlength="50" class="txt-ipt" readonly="">
                </div>
            </li>
        </ul>
        <p style="height:10px;width:100%"></p>

        <p style="height:10px;width:100%"></p>

        <p class="c8"></p>
        <input type="submit" class="confirm-sub mt20" value="返 回" onclick="history.go(-1)" id="btn">
    </div>
@endsection