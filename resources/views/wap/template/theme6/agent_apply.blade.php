@extends('wap.template.theme6.layouts.main')
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
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">申请代理</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content withdraw-content clearboth">
        <form action="{{ route('wap.post_agent_apply') }}" method="post" name="form1">
        <ul class="transaction-time clearboth">
            <li>
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QQ：</label>
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
        <button class="mui-btn surebtn ajax-submit-btn" onclick="dailiAdd()">立即申请</button>
        </form>
    </div>
@endsection