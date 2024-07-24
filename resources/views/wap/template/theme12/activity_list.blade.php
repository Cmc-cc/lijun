@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/promotion.css') }}" rel="stylesheet" />
    <div id="html-container-Center_PromotionsResponsiveBlock_52642">
        <div class="promotions-wrapper">
            <div class="promotions-header">
                <h1 class="promotions-header-title">优惠活动</h1><span class="promotions-header-subtitle"></span>
            </div>
            <div class="promotions-categories" id="Center_PromotionsResponsiveBlock_52642-promo-carousel">
                <div id="scarousel-1" class="scarousel promotions-carousel scarousel-no-arrows scarousel-mobile"
                     data-uat="scarousel">
                    <div class="scarousel-list-wrapper">
                        <ul class="scarousel-list scarousel-animate promotions-categories__list"
                            style="transform: translate3d(0px, 0px, 0px);" id="activityTitle">
                            {{--<li class="scarousel-item" data-uat="scarousel-item" onclick="changeActive(9,this)"><span
                                        class="promotions-category" data-action="Application.blockAction">客制活动</span>
                            </li>
                            <li class="scarousel-item scarousel-active" data-uat="scarousel-item"
                                onclick="changeActive(8,this)"><span class="promotions-category"
                                                                     data-action="Application.blockAction">首存优惠</span>
                            </li>--}}
                            <li onclick="window.location.href='{{ route('wap.activity_list') }}'" class="scarousel-item @if ( !request()->get('type') ) scarousel-active  @endif " ><span class="promotions-category">全部活动</span></li>
                            @foreach(config('platform.activity_type') as $k => $v)
                                <li onclick="window.location.href='{{ route('wap.activity_list',['type'=>$k]) }}'" class="scarousel-item @if ( request()->get('type') == $k ) scarousel-active  @endif " ><span class="promotions-category">{{ $v }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div id="activety">
                <div style="text-align: center">
                    <a class="btn"  href="{{ route('wap.my_activity') }}" style="text-decoration: none;margin-top: 10px;margin-bottom: 10px">申请进度查询</a>
                </div>

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
@endsection