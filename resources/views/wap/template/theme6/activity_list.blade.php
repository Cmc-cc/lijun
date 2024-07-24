@extends('wap.template.theme6.layouts.main')
@section('content')
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">优惠活动</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content user-content">
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
    <script>
        $(function () {
            //biCommon.getActivity();
        })
    </script>


@endsection