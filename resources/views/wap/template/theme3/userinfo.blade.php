@extends('wap.template.theme3.layouts.main')
@section('content')
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
                <h3 data-v-76fa910e="" class="title">我的账户</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>
        <div data-v-5e36b0dc="" class="account view">
            <div data-v-5e36b0dc="" class="scroll">

                {{--<div class="card-list">
                    <div data-v-527fbea5="" relative="" class="card-item">
                        <div data-v-527fbea5="" relative="" class="card-info">
                            <div data-v-527fbea5="" middle="" style="">
                                <img data-v-527fbea5="" src="/Areas/Wap7/Content/images/main/cardsamll1.png" alt="建设银行" middle-center="">
                            </div>
                            <span data-v-527fbea5="" class="name" id="openBank">建设银行</span><br data-v-527fbea5="">
                            <span data-v-527fbea5="" class="card-type" id="bankMeg">111</span>
                        </div>
                        <p data-v-527fbea5="" center="" class="card-number" id="bankCard">11111</p>
                        <div data-v-527fbea5="" class="card-bg" style="background-image: url('/Areas/Wap7/Content/images/main/card1.png');"></div>
                    </div>
                </div>--}}
                <div data-v-037c77f0="" data-v-5e36b0dc="" class="account-content">
                    <div data-v-037c77f0="" class="account-item">
                        <span data-v-037c77f0="" fl="" ml="">账号</span>
                        <span data-v-037c77f0="" fr="" mr="" id="loginUsername">{{ $_member->name }}</span></div>
                    <div data-v-037c77f0="" class="account-item">
                        <span data-v-037c77f0="" fl="" ml="">手机号码</span>
                        <span data-v-037c77f0="" fr="" mr="">@if ($_member->phone)
                                {{ $_member->phone }}
                            @else
                                <a href="{{ route('wap.set_phone') }}" class="c_blue">去设置</a>
                            @endif</span>
                    </div>
                    <div data-v-037c77f0="" class="account-item">
                        <span data-v-037c77f0="" fl="" ml="">注册时间</span>
                        <span data-v-037c77f0="" fr="" mr="" >{{ $_member->created_at }}</span>
                    </div>
                    <div data-v-037c77f0="" class="account-item">
                        <span data-v-037c77f0="" fl="" ml="">最后登陆时间</span>
                        <span data-v-037c77f0="" fr="" mr="" >{{ $_member->last_login_at }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!---->
    </main>
    <script>
        $(function () {
            //personDataFunc();
            //getGamePlate(2);
        })

    </script>
@endsection