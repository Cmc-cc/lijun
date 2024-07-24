@extends('wap.template.theme6.layouts.main')
@section('content')
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">会员中心</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content info-content" style="display: block;">
        <div id="slider" class="mui-slider">
            <div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
                <a class="mui-control-item mui-active" href="#item1mobile">
                    修改密码
                </a>
                <a class="mui-control-item" href="#item2mobile">
                    取款密码
                </a>
            </div>
            <div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-6"></div>
            <div class="mui-slider-group">
                <div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
                    <div id="scroll1" class="mui-scroll-wrapper">
                        <div class="mui-scroll">
                            <form action="{{ route('wap.reset_login_password') }}" method="post" name="form1">
                            <ul class="mui-table-view">
                                <li class="mui-table-view-cell">
                                    <label>原密码</label>
                                    <input name="old_password"  type="password" maxlength="12" id="loginOldPwad"/>
                                </li>
                                <li class="mui-table-view-cell">
                                    <label>新密码</label>
                                    <input name="password" type="password" maxlength="12" id="loginNemPwad"/>
                                </li>
                                <li class="mui-table-view-cell">
                                    <label>确认密码</label>
                                    <input name="password_confirmation" type="password" maxlength="12" id="loginConfirmPwd"/>
                                </li>
                            </ul>
                            <button style="padding: 10px;" class="mui-btn surebtn ajax-submit-btn" data-loading-text="提交中" id="subbtn">确认</button>
                            </form>
                        </div>

                    </div>
                </div>
                <div id="item2mobile" class="mui-slider-item mui-control-content">
                    <div id="scroll2" class="mui-scroll-wrapper">
                        <div class="mui-scroll">
                            <form action="{{ route('wap.reset_qk_password') }}" method="post" name="form2">
                            <ul class="mui-table-view">
                                <li class="mui-table-view-cell">
                                    <label>原密码</label>
                                    <input name="old_password" type="password" maxlength="12" id="withdrawalsOldPwad"/>
                                </li>
                                <li class="mui-table-view-cell">
                                    <label>新密码</label>
                                    <input name="password" type="password" maxlength="12" id="withdrawalsNemPwad"/>
                                </li>
                                <li class="mui-table-view-cell">
                                    <label>确认密码</label>
                                    <input name="password_confirmation" type="password" maxlength="12" id="withdrawalsConfirmPwd"/>
                                </li>
                            </ul>
                            <button class="mui-btn surebtn ajax-submit-btn" data-loading-text="提交中">确认</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="cardStatu" />

        </div>
    </div>
    <script>
        infoFun();
        //biCommon.getWithdrawBankList();
        mui.init({
            swipeBack: false
        });
        (function ($) {
            $('.mui-scroll-wrapper').scroll({
                indicators: true //是否显示滚动条
            });
        })(mui);
        document.getElementById('slider').addEventListener('slide', function (e) {
            if (e.detail.slideNumber != 2) {
                document.getElementById("subbtn").style.display = "block";
            } else {
                if ($("#cardStatu").val() == 1) document.getElementById("subbtn").style.display = "none";
            }
        });
        //biCommon.getBindbank($("#openBank"), $("#bankCard"), $("#bankMeg"), $("#TrueName"), 2);
    </script>


@endsection