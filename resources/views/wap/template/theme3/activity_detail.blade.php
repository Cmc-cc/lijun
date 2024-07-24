@extends('wap.template.theme3.layouts.main')
@section('content')
    <main class="panel slideout-panel slideout-panel-left" style="height:calc(100% - 44px);">
        <!---->
        <div data-v-76fa910e="" class="navbar-container" style="">
            <div data-v-76fa910e="" middle="" class="logo-container"></div>
            <div data-v-76fa910e="" middle="" class="menu-container" onclick="self.location=document.referrer;">
                <div data-v-76fa910e="" relative="" style="">
                    <img data-v-76fa910e="" middle="" src="{{asset('/wap/theme3/images/main/goback.png')}}" alt="" style="">
                </div>
            </div>
            <div data-v-76fa910e="" class="title">
                <h3 data-v-76fa910e="" class="title">优惠活动</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>
        <div data-v-30793220="" class="appgame view" style="background: #ffffff;font-size: 15px;">
            <div class="m_activityDetail" style="padding: 5px" >
                {{--<h3 class="title t_1">{{ $data->title }}</h3>--}}
                {!! $data->title_content !!}
                {{--<h3 class="title t_2">活动说明</h3>--}}
                {!! $data->content !!}
                {{--<h3 class="title t_3">活动规则</h3>--}}
                {!! $data->rule_content !!}
            </div>
        </div>
        <!---->
    </main>
@endsection