@extends('wap.template.theme3.layouts.main')
@section('content')
    <link href="{{asset('/wap/theme3/css/pay.css')}}" rel="stylesheet" />
    <main class="panel slideout-panel slideout-panel-left">
        <!---->
        <div data-v-76fa910e="" class="navbar-container" style="">
            <div data-v-76fa910e="" middle="" class="logo-container"></div>
            <div data-v-76fa910e="" middle="" class="menu-container" onclick="self.location=document.referrer;">
                <div data-v-76fa910e="" relative="" style="">
                    <img data-v-76fa910e="" middle="" src="{{ asset('/wap/theme3/images/main/goback.png') }}" alt="" style="">
                </div>
            </div>
            <div data-v-76fa910e="" class="title">
                <h3 data-v-76fa910e="" class="title">绑定手机号</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>
        <div data-v-5e36b0dc="" class="account view">
            <div class="userInfo setCard">
                <form action="{{ route('wap.post_set_phone') }}" method="post" name="form1">
                    <dl>
                        <dt>会员信息</dt>
                        <dd>
                            <div class="pull-left">
                                会员账户
                            </div>
                            <div class="pull-right">
                                {{ $_member->name }}
                            </div>
                        </dd>
                    </dl>
                    <dl class="set_card">
                        <dt>
                            绑定电话 <br>
                        </dt>
                        <dd>
                            <div class="pull-left">
                                电话号码
                            </div>
                            <input id="set_phone" class="pull-left" type="tel" placeholder="输入手机号码" name="phone" style="width: 42%">
                        </dd>
                        <dd>
                            <input type="button" value="确定" class="submit_btn  ajax-submit-btn">
                        </dd>
                    </dl>
                </form>
            </div>
        </div>
        <!---->
    </main>
@endsection