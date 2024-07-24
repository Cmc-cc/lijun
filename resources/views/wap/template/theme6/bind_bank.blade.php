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
            {{--<a class="mui-control-item" href="#item1mobile">
                修改密码
            </a>
            <a class="mui-control-item" href="#item2mobile">
                取款密码
            </a>--}}
            <a class="mui-control-item mui-active" href="#item3mobile">
                绑定银行卡
            </a>
        </div>
{{--        <div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-4"></div>--}}
        <form  method="post" action="{{ route('wap.post_bind_bank') }}">
        <div class="mui-slider-group">
            <div id="item3mobile" class="mui-slider-item mui-control-content mui-active">
                <div id="scroll3" class="mui-scroll-wrapper">
                    <div class="mui-scroll">
                        <ul class="mui-table-view">
                            <li class="mui-table-view-cell">
                                <label>当前账户名</label>
                                <input type="text" maxlength="12" readonly value="{{ $_member -> name }}"/>
                            </li>
                            <li class="mui-table-view-cell">
                                <label>银行名称</label>
                                <select id="bankname" name="bank_name">
                                    <option value="">--请选择--</option>
                                    @foreach(\App\Models\Base::$BANK_TYPE as $v)
                                        <option value="{{ $v }}"
                                                @if($_member->bank_name == $v) selected @endif>{{ $v }}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li class="mui-table-view-cell">
                                <label>开户姓名</label>
                                <input type="text" id="account" maxlength="50" class="txt-ipt" name="bank_username">
                            </li>
                            <li class="mui-table-view-cell">
                                <label>开户网点</label>
                                <input type="text" name="bank_branch_name" maxlength="50" id="banknode" placeholder="示例：河南商丘工商银行五一路支行" warning="请输入开户行信息" />
                            </li>
                            <li class="mui-table-view-cell">
                                <label>银行账号</label>
                                <input type="number" name="bank_card" id="card" maxlength="18" warning="请输入开户账号" />
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <button class="mui-btn surebtn ajax-submit-btn"  data-loading-text="提交中" id="subbtn">确认</button>
        </form>
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

