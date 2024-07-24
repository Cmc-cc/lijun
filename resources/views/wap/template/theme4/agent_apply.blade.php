@extends('wap.template.theme4.layouts.main')
@section('content')
    <style>
        .partner-content {
            width: 70%;
            height: 200px;
            text-align: left;
            padding: 10px 0;
            margin: 0;
            line-height: 25px;
            overflow: auto;
            resize: none;
        }
    </style>
    <div class="layout mt12 clearboth">
        <form action="{{ route('wap.post_agent_apply') }}" method="post" name="form1">
        <ul class="transaction-time clearboth">
            <li>
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QQ：</label>
                <input type="tel" name="qq" value="" placeholder="QQ">
            </li>
            <li>
                <label>联系电话：</label>
                <input type="tel" name="phone" value="" placeholder="联系电话">
            </li>
            <li>
                <label>申请理由：</label>
                <textarea name="about" placeholder="请尽量注明您的优势" class="partner-content" id="dailiContent"></textarea>
            </li>
        </ul>
        <input type="button"  class="confirm-sub mt30 ajax-submit-btn" value="立即申请">
        </form>
    </div>
@endsection