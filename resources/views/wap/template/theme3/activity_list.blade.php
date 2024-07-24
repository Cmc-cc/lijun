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
        <div data-v-30793220="" class="appgame view" style="">
            <div data-v-30793220="" class="appgame-top" id="activityTitle">
                {{--<span data-v-30793220="" onclick="changeActive(6,this)" class="active">注册优惠</span>
                <span data-v-30793220="" onclick="changeActive(7,this)" class="">存送优惠</span>
                <span data-v-30793220="" onclick="changeActive(8,this)" class="">首存优惠</span>--}}
                    <span data-v-30793220="" onclick="window.location.href='{{ route('wap.activity_list') }}'" @if ( !request()->get('type') )class="active" @endif >全部活动</span>

                @foreach(config('platform.activity_type') as $k => $v)
                        <span data-v-30793220="" onclick="window.location.href='{{ route('wap.activity_list',['type'=>$k]) }}'"  @if ( request()->get('type') == $k )class="active" @endif >{{ $v }}
                        </span>
                    @endforeach
            </div>
            <div data-v-30793220="" class="appgame-content" id="activety">
                <div class="hotbox clearboth">
                    <a class="hotApplication" href="{{ route('wap.my_activity') }}" style="text-decoration: none;">申请进度查询</a>
                    @foreach($data as $k => $item)
                    <dl data-id="10">

                        <dd>
                            <img onclick="window.location.href='{{ route('wap.activity_detail', ['id' => $item->id]) }}'" src="{{ $item->title_img }}">
                            <div style="text-align: center;margin: 0px;padding: 0px;">
                                @if($item->is_apply == 0)

                                    @if($_member)
                                        <form style="display: inline-block ;" action="{{ route('member.apply_activity') }}" method="post">
                                            <input type="hidden" name="activity_id" value="{{ $item->id }}">
                                            <a class="applybtn ajax-submit-without-confirm-btn" style="padding:2px 5px; border:0px; background:#C30; color:#ffffff; border-radius:4px;font-size: 10px">申请活动</a>
                                        </form>
                                    @else
                                        <a class="applybtn" onclick="alert('请先登录')" style="padding:2px 5px; border:0px; background:#C30; color:#ffffff; border-radius:4px;line-height: 26px;font-size: 10px">申请活动</a>
                                    @endif

                                @endif

                            </div>
                        </dd>
                        {{--<dd>

                            <div class="contentbox clearboth" style="display: none;">
                                <h3>  注册活动  </h3>
                                <h6>活动时间:2019-11-29 13:55:04-2049-11-29 23:59:59</h6>
                                <div class="hotcontent">
                                    <div class="hotcontent">
                                        <p>注册活动</p>
                                    </div>
                                </div>
                            </div>
                        </dd>--}}
                    </dl>
                        <br>
                        @endforeach
                </div>
            </div>
        </div>
        <!---->
    </main>
    <script>
        $(function () {
            // activetyImg()
        })
    </script>
@endsection