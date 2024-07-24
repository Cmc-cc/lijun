@extends('wap.template.theme5.layouts.main')
@section('content')
    <div class="layout mt12" id="div_create_user_bank">
        <div class="hd-tit">
            <h3>绑定手机号</h3>
        </div>
    </div>
    <div class="layout mt12" id="form_wthdraw">
        <form action="{{ route('wap.post_set_phone') }}" method="post" name="form1">
        <ul class="mod-forms wthdraw-content">
            <li>
                <label>账号:</label>
                <div class="form-ipt">
                    <input type="text" class="txt-ipt" maxlength="50" value="{{ $_member->name }}" warning="" readonly="">
                </div>
            </li>
            <li>
                <label style="width: 70px">绑定电话:</label>
                <div class="form-ipt">
                    <input type="text" name="phone" id="TrueName" class="txt-ipt" maxlength="50" placeholder="请输入正确的手机号码">
                </div>
            </li>
        </ul>
        <p class="c8"></p>
        <input type="submit" class="confirm-sub mt20 ajax-submit-btn" value="提 交" >
        <!--成功提交后弹出框内容：操作成功，我们将在2小时以内完成审核。-->
        </form>
    </div>
@endsection