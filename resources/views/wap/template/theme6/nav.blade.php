@extends('wap.template.theme6.layouts.main')
@section('content')
    <style>
        .mui-bar-nav {
            box-shadow: none;
        }
    </style>
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">会员中心</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content mui-clearfix user-content" id="userLists">
        <div class="user-meg mui-clearfix">
            <div class="user-picther">
                <img src="{{ asset('/wap/theme6/images/userPic.png') }}">
                <span>{{ $_member -> name }}</span>
            </div>
            <div class="user-tablist mui-clearfix">
                <ul>
                    <li>
                        <span class="UserAmountController money">{{ $_member -> money }}</span>
                        <em>余额</em>
                    </li>
                    <li>
                        <span class="info" url="{{ route('wap.userinfo') }}">个人资料</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mui-row">
            <div class="mui-col-xs-4" location="{{ route('wap.recharge') }}" ids="deposit" titles="在线充值">
                <i class="mui-icon iconfont icon-qian"></i>
                <span>充值</span>
            </div>
            <div class="mui-col-xs-4" location="{{ route('wap.drawing') }}" ids="withdraw" titles="在线提款">
                <i class="mui-icon iconfont icon-tikuan"></i>
                <span>提款</span>
            </div>
            <div class="mui-col-xs-4" location="{{ route('wap.transfer') }}" ids="transfer" titles="额度转换">
                <i class="mui-icon iconfont icon-jisuanqi"></i>
                <span>额度转换</span>
            </div>
        </div>
        <div class="mui-row">
            <div class="mui-col-xs-4" location="{{ route('wap.reset_password') }}" ids="deposit" titles="修改密码">
                <i class="mui-icon mui-icon-locked"></i>
                <span>修改密码</span>
            </div>
            <div class="mui-col-xs-4" location="{{ route('wap.agent') }}" ids="withdraw" titles="代理中心">
                <i class="mui-icon mui-icon-contact"></i>
                <span>代理中心</span>
            </div>
            <div class="mui-col-xs-4" location="{{ route('wap.msg') }}" ids="transfer" titles="我的信息">
                <i class="mui-icon iconfont icon-xinxi"></i>
                <span>我的信息</span>
            </div>
        </div>
        <div class="mui-row">
            <div class="mui-col-xs-4 notopbor" location="{{ route('wap.recharge_record') }}" ids="transaction" titles="充值记录">
                <i class="mui-icon iconfont icon-record"></i>
                <span>充值记录</span>
            </div>
            <div class="mui-col-xs-4 notopbor" location="{{ route('wap.drawing_record') }}" ids="partner" titles="提款记录">
                <i class="mui-icon iconfont icon-record"></i>
                <span>提款记录</span>
            </div>
            <div class="mui-col-xs-4 notopbor" location="{{ route('wap.transfer_record') }}" ids="bettingrecord" titles="投注记录">
                <i class="mui-icon iconfont icon-record"></i>
                <span>额度转换记录</span>
            </div>
            <div class="mui-col-xs-4 notopbor" location="{{ route('wap.game_record') }}" ids="bettingrecord" titles="投注记录">
                <i class="mui-icon iconfont icon-record"></i>
                <span>游戏记录</span>
            </div>
            @if($_system_config->is_fs==1)
            <div class="mui-col-xs-4 notopbor" location="{{ route('wap.user_fs') }}" ids="bettingrecord" titles="返水详情">
                <i class="mui-icon iconfont icon-icon204"></i>
                <span>实时返水</span>
            </div>
            @endif
        </div>

    </div>
    <script>

        //biCommon.getUserMoneys();
        //judgeOldAndNew();//老带新判断
        $(function () {
            var infoUrl = $('.info').attr('url');
            userFun(infoUrl);
            @if($_member->is_trans_on == 1)
                $.ajax({
                    type: 'post',
                    url: "{{route('member.api.wallet_balance')}}",
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data);
                        if (data.statusCode == '01') {
                            var all = Number($('.money').text()) + Number(data.data);
                            $('.money').text('');
                            $('.money').text(parseInt(all.toFixed(2)));
                        }
                    }
                })
            @endif
        })
    </script>
@endsection