@extends('wap.template.theme3.layouts.main')
@section('content')
    <main class="panel slideout-panel slideout-panel-left">
        <div data-v-76fa910e="" class="navbar-container" style="">
            <div data-v-76fa910e="" middle="" class="logo-container"></div>
            <div data-v-76fa910e="" middle="" class="menu-container" onclick="self.location=document.referrer;">
                <div data-v-76fa910e="" relative="" style="">
                    <img data-v-76fa910e="" middle="" src="/Areas/Wap7/Content/images/main/goback.png" alt="" style="">
                </div>
            </div>
            <div data-v-76fa910e="" class="title">
                <h3 data-v-76fa910e="" class="title">申请代理</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container">
            </div>
        </div>
        <div class="partner-view">
            <div class="mui-content clearboth ">
                <form action="{{ route('wap.post_agent_apply') }}" method="post" name="form1">
                <ul class="transaction-time clearboth">
                    <li>
                        <label>QQ：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="tel" value="" name="qq" placeholder="QQ">
                    </li>
                    <li>
                        <label>联系电话：</label>
                        <input type="tel" value="" name="phone" placeholder="联系电话">
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
    </main>
@endsection