@extends('wap.template.theme2.layouts.main')
@section('after.css')
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/mmenu.all.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/ssc.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/member.css') }}">
@endsection
@section('before.js')
    <script type="text/javascript" src="{{ asset('/wap/js/mmenu.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/member.js') }}"></script>
@endsection
@section('content')
    <div class="container-fluid gm_main">
        <div class="head">
            <a class="f_l" href="javascript:history.go(-1)"><img src="{{ asset('/wap/images/user_back.png') }}" alt=""></a>
            <span>绑定手机</span>
            <a class="f_r" href="javascript:history.go(-1)" style="visibility: hidden"><img src="{{ asset('/wap/images/user_back.png') }}" alt=""></a>
        </div>

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
                    {{--<dd>
                        <div class="pull-left">验证码</div>
                        <input id="code" class="pull-left" type="text" placeholder="输入验证码" name="code" style="width: 42%">
                        <a href="javascript:;" class="pull-left text-center get_code">验证码</a>
                    </dd>--}}
                    <dd>
                        <input type="button" value="确定" class="submit_btn  ajax-submit-btn">
                    </dd>
                </dl>
            </form>
        </div>
    </div>
@endsection