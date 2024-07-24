@extends('wap.template.theme11.layouts.main')
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
            background: #00623b;
            padding: 10px 0;
            color: #fff;
        }
        .partner-top {
            padding-top:60px;
        }
        ul li {
            margin-top:10px;
        }
    </style>

    <div class="am-navbar am-navbar-dark">
        <div class="am-navbar-left" role="button" onclick="window.history.back();"><span class="am-navbar-left-icon" aria-hidden="true"><svg class="am-icon am-icon-left am-icon-md"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left"></use></svg></span><span class="am-navbar-left-content">返回</span></div>
        <div class="am-navbar-title">申请代理</div>
        <div class="am-navbar-right"></div>
    </div>
    <div class="partner-top">
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
            <input type="button"  class="confirm-sub mt30 surebtn ajax-submit-btn" value="立即申请">
            </form>
        </div>
    </div>






@endsection