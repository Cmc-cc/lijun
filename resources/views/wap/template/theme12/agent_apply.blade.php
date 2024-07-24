@extends('wap.template.theme12.layouts.main')
@section('content')
    <div class="partner-view">
        <div class="mui-content clearboth ">
            <form action="{{ route('wap.post_agent_apply') }}" method="post" name="form1">
            <ul class="transaction-time clearboth">
                <li>
                    <label>代理账号：</label>
                    <input type="text" value="{{ $_member -> name }}" readonly>
                </li>
                <li>
                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QQ：</label>
                    <input name="qq" type="text" value="" placeholder="请输入QQ">
                </li>
                <li>
                    <label>联系电话：</label>
                    <input name="phone" type="text" value="" placeholder="请输入手机">
                </li>
                <li>
                    <label>申请理由：</label>
                    <textarea name="about" placeholder="请尽量注明您的优势" class="partner-content" id="dailiContent"></textarea>
                </li>
            </ul>
            <input type="button" class="confirm-sub mt30 surebtn ajax-submit-btn" value="立即申请">
            </form>
        </div>
    </div>

@endsection