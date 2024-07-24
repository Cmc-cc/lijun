@extends('wap.template.theme11.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme11/css/style2.css') }}" rel="stylesheet"/>
    <div data-reactroot="" class="app_container remove appdduser/pwd">
        <div class="am-navbar am-navbar-dark">
            <div class="am-navbar-left" role="button" onclick="window.location.href='{{ route('wap.index') }}'"><span class="am-navbar-left-icon"
                                                                                             aria-hidden="true"><svg
                            class="am-icon am-icon-left am-icon-md"><use xlink:href="#left"></use></svg></span><span
                        class="am-navbar-left-content">返回</span></div>
            <div class="am-navbar-title">优惠活动</div>
            <div class="am-navbar-right"></div>
        </div>
        <div class="container">
            <div style="flex: 1 1 0%;">
                <div class="settwo" style="width: 98%; margin: 0px auto;">
                    <div>
                        <div class="mui-content mine-bet-record-content mui-scroll">
                            <ul class="hotbox-list clearboth" id="activityTitle">
                                <li onclick="window.location.href='{{ route('wap.activity_list') }}'" @if ( !request()->get('type') )class="active" @endif>全部活动</li>
                                @foreach(config('platform.activity_type') as $k => $v)
                                    <li onclick="window.location.href='{{ route('wap.activity_list',['type'=>$k]) }}'"  @if ( request()->get('type') == $k )class="active" @endif >{{ $v }}</li>
                                @endforeach
                            </ul>
                            <div id="activety">
                                <a class="hotApplication"  href="{{ route('wap.my_activity') }}" style="text-decoration: none;color: white;margin-top: 10px;">申请进度查询</a>
                                @foreach($data as $k => $item)
                                    <div class="hotbox clearboth">
                                        <dl data-id="10">
                                            <dd>
                                                <img onclick="window.location.href='{{ route('wap.activity_detail', ['id' => $item->id]) }}'"
                                                     src="{{ $item->title_img }}">
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
                                        </dl>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection