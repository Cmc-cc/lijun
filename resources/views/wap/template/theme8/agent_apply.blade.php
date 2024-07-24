@extends('wap.template.theme8.layouts.main')
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
        html, body, .deposit_2 {
            height: 100%;
        }
        input.surebtn {
            margin: 25px 5%;
            width: 90%;
            border: none;
            background: #1b75d9;
            padding: 10px 0;
            color: #fff;
        }
    </style>
<div class="deposit_2">
    <header class="mui-bar mui-bar-nav mui-action-back">
        <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
        <h1 class="mui-title">
            申请代理
        </h1>
    </header>
    <div class="mui-content clearboth ">
        <form action="{{ route('wap.post_agent_apply') }}" method="post" name="form1">
            <ul class="transaction-time clearboth">
                <li>
                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QQ：</label>
                    <input name="qq" type="text" placeholder="请输入QQ" value="">
                </li>
                <li>
                    <label>联系电话：</label>
                    <input name="phone" type="text" placeholder="请输入你的手机号码" value="">
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