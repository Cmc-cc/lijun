@extends('wap.template.theme12.layouts.main')
@section('content')
    <div id="master-container-Center_PersonalDetailsAndPasswordResponsiveBlock_45125" class="responsive-block account-block personal-details-password-rblock">
        <div id="html-container-Center_PersonalDetailsAndPasswordResponsiveBlock_45125" data-uat="my-acc-resp-block-content">
            <div class="personal-details" data-current-page="1">
                <div class="user-info__tabs personal-details__tabs">
                    <a href="javascript:void(0)" data-action="Application.blockAction" data-params="personal-details, Center_PersonalDetailsAndPasswordResponsiveBlock_45125, onDataTabClick" class="user-info__tab personal-details-data-tab user-info__tab--active" data-uat="personal-details-data-tab" onclick="changeOrder(this)">修改登录密码</a>
                    <a href="javascript:void(0)" data-action="Application.blockAction" data-params="personal-details, Center_PersonalDetailsAndPasswordResponsiveBlock_45125, onPasswordTabClick" class="user-info__tab personal-details-password-tab" data-uat="personal-details-password-tab" onclick="changeOrder(this)">修改取款密码</a>
                    <div class="user-info-tab-switch-overlay"></div>
                </div>
                <div class="personal-details__wrapper">
                    <div class="user-info__page personal-details-password">
                        <form action="{{ route('wap.reset_login_password') }}" method="post" name="form1">
                        <div class="personal-details__form">
                            <div class="user-info__item" data-uat="user-info-item">
                                <label class="user-info__label" for="Center_PersonalDetailsAndPasswordResponsiveBlock_45125-current-password">当前登录密码</label>
                                <div class="user-info__input">
                                    <input name="old_password" id="oldLoginPwd" class="auth-form__input-validation" type="password" value="" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="user-info__item" data-uat="user-info-item">
                                <label class="user-info__label" for="Center_PersonalDetailsAndPasswordResponsiveBlock_45125-new-password">新登录密码</label>
                                <div class="user-info__input">
                                    <input name="password" id="newLoginPwd" class="auth-form__input-validation" type="password" pattern="^(?=^(?:(?!zxs19830619).)*$)(?=^[0-9A-Za-z]{6,20}$).*$" value="" autocomplete="new-password">
                                </div>

                            </div>
                            <div class="user-info__item" data-uat="user-info-item">
                                <label class="user-info__label" for="Center_PersonalDetailsAndPasswordResponsiveBlock_45125-new-password-confirm">确认登录密码</label>
                                <div class="user-info__input">
                                    <input name="password_confirmation" id="confirmLoginPwd" class="auth-form__input-validation" type="password" value="" autocomplete="new-password"></div>
                            </div>
                            <div  id="change_btn" class="user-info__item password-details-submit ajax-submit-btn" data-uat="submit-password-details-form">
                                <label class="user-info__label user-info__label--placeholder"> </label>
                                <a href="javascript:void(0)" class="user-info__button " data-action="Application.blockAction" data-params="personal-details, Center_PersonalDetailsAndPasswordResponsiveBlock_45125, updatePasswordDetails, this" data-uat="personal-information-button">
                                    <span id="btn_null" data-uat="personal-information-button-label-text">确认更改</span>
                                    <span class="user-balance-transfer-amount" data-uat="personal-information-button-label-value"></span>
                                    <span class="icon i-24 i-o-acc-check user-info__check" data-uat="user-info-check"></span>
                                </a>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="user-info__page personal-details-password">
                        <form action="{{ route('wap.reset_qk_password') }}" method="post" name="form2" >
                        <div class="personal-details__form">
                            <div class="user-info__item" data-uat="user-info-item">
                                <label class="user-info__label" for="Center_PersonalDetailsAndPasswordResponsiveBlock_45125-current-password">当前取款密码</label>
                                <div class="user-info__input">
                                    <input name="old_password" id="oldWtdPwd" class="auth-form__input-validation" type="password" value="" autocomplete="new-password">
                                </div>

                            </div>
                            <div class="user-info__item" data-uat="user-info-item">
                                <label class="user-info__label" for="Center_PersonalDetailsAndPasswordResponsiveBlock_45125-new-password">新取款密码</label>
                                <div class="user-info__input">
                                    <input name="password" id="newWtdPwd" class="auth-form__input-validation" type="password" value="" autocomplete="new-password">
                                </div>

                            </div>
                            <div class="user-info__item" data-uat="user-info-item">
                                <label class="user-info__label" for="Center_PersonalDetailsAndPasswordResponsiveBlock_45125-new-password-confirm">确认取款密码</label>
                                <div class="user-info__input">
                                    <input name="password_confirmation" id="confirmWtdPwd" class="auth-form__input-validation" type="password" value="" autocomplete="new-password">
                                </div>
                            </div>
                            <div id="change_btn" class="user-info__item password-details-submit ajax-submit-btn" data-uat="submit-password-details-form">
                                <label class="user-info__label user-info__label--placeholder"></label>
                                <a href="javascript:void(0)" class="user-info__button " data-action="Application.blockAction" data-params="personal-details, Center_PersonalDetailsAndPasswordResponsiveBlock_45125, updatePasswordDetails, this" data-uat="personal-information-button">
                                    <span id="btn_null" data-uat="personal-information-button-label-text">确认更改</span>
                                    <span class="user-balance-transfer-amount" data-uat="personal-information-button-label-value"></span>
                                    <span class="icon i-24 i-o-acc-check user-info__check" data-uat="user-info-check"></span>
                                </a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="loader-Center_PersonalDetailsAndPasswordResponsiveBlock_45125" class="block-loader PersonalDetailsAndPasswordResponsiveBlock">
            <div class="preloader ">
                <div class="preloader-spinner preloader-container">
                    <div class="preloader-spinner preloader-fill">
                        <div class="preloader-clipper left">
                            <div class="preloader-circle"></div>
                        </div>
                        <div class="preloader-gap-patch">
                            <div class="preloader-circle"></div>
                        </div>
                        <div class="preloader-clipper right">
                            <div class="preloader-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection