@extends('wap.template.theme12.layouts.main')
@section('content')
    <div id="master-container-Center_PersonalDetailsAndPasswordResponsiveBlock_45125" class="responsive-block account-block personal-details-password-rblock">
        <div id="html-container-Center_PersonalDetailsAndPasswordResponsiveBlock_45125" data-uat="my-acc-resp-block-content">
            <div class="personal-details" data-current-page="1">
                <div class="personal-details__wrapper">
                    <div class="user-info__page personal-details-data">
                        <div class="personal-details__form">
                            <div class="user-info__item  ">
                                <div class="">
                                    <label class="user-info__label">账号</label>
                                    <div class="user-info__input"><input id="UserName" value="{{$_member -> name}}" type="text" disabled="" data-uat="input-personal-details-first-name"></div>
                                </div>
                            </div>
                            <div class="user-info__item  ">
                                <div class="">
                                    <label class="user-info__label">手机号码</label>
                                    <div class="user-info__input">
                                        @if ($_member->phone)
                                        <input value="{{ $_member -> phone }}" id="TrueName" type="text" disabled="" data-uat="input-personal-details-last-name">
                                        @else
                                            <a
                                                    style="color: #ffffff;background: #00623b;text-align: center;width: 85px;padding: 5px;border-radius:8px;display: inline-block;font-size: 12px"
                                                    href="{{ route('wap.set_phone') }}" class="c_blue">去设置</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="user-info__item  ">
                                <div class="">
                                    <label class="user-info__label">注册时间</label>
                                    <div class="user-info__input"><input value="{{ $_member -> created_at }}" type="text" id="Phone" value="" disabled="" data-uat="input-personal-details-no-id"></div>
                                </div>
                            </div>
                            <div class="user-info__item  ">
                                <div class="">
                                    <label class="user-info__label">最后登陆时间</label>
                                    <div class="user-info__input"><input value="{{ $_member -> last_login_at }}" type="text" id="Phone" value="" disabled="" data-uat="input-personal-details-no-id"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
        })

    </script>

@endsection