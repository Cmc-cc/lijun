@extends('wap.template.theme8.layouts.main')
@section('content')
<div class="mine_page mui-scroll mine-content_container" data-scroll="3">
    <div class="mui-scroll" style="transform: translate3d(0px, 0px, 0px) translateZ(0px); transition-duration: 0ms;">
        <div class="user_info_part">
            <!-- 主页面标题 -->
            <header class="mui-bar mui-bar-nav mui-bar-mine">
                {{--<a title="" class="mine_settings">
                </a>--}}
                <h1 class="mui-title">我的</h1>

            </header>
            <!--用户信息显示区域-->
            <div class="user_portrait_part login-name _user-login-time">
                <i></i>
                <span>{{ $_member -> name }}<img src="" class="fr vip-layout" id="vipLayout" /> <span id="vipLayoutText"></span></span>
                <b>本次登录时间 {{ $_member -> last_login_at }}</b>
            </div>
        </div>
        <div class="content_container">
            <!-- 主界面具体展示内容 -->
            <ul class="mui-content function_nav">
                <!--总资产 & 钱包余额-->
                <li class="mui-row user_asset_info">
                    <div class="mui-col-xs-6 total_asset">
                        <i>￥<b class="UserAmountControlle money">{{ $_member -> money }}</b></i>
                        <span>总资产/</span>
                    </div>
                    <div class="mui-col-xs-6 wallet_balance">
                        <i>￥<b class="UserAmountController">{{ $_member -> ml_money }}</b></i>
                        <span>码量余额/</span>
                    </div>
                </li>

                <!--充值 & 提现-->
                <li class="mui-row charge_withdraw">

                    <a title="" class="mui-col-xs-6 charge_item" data-rel='{"opType":"href","target":"{{ route('wap.recharge') }}"}'>
                        <i></i>
                        <span>充值</span>
                    </a>
                    <a title="" class="mui-col-xs-6 withdraw_item" data-rel='{"opType":"href","target":"{{ route('wap.drawing') }}"}'>
                        <i></i>
                        <span>提现</span>
                        <small class="_withdraw-amount"></small>
                    </a>
                </li>
                <!--投注记录 & 资金账户-->
                <li class="mui-row func_nav_item sep_top">
                    <a title="" class="mui-col-xs-6 func_nav_label" data-rel='{"opType":"href","target":"{{ route('wap.transfer') }}"}'>
                        <i class="asset_account_icon"></i>
                        <span class="func_nav_name">
                            <span>额度转换</span>
                            <small>进行资金回收和转入</small>
                        </span>
                    </a>
                    <a title="" class="mui-col-xs-6 func_nav_label" data-rel='{"opType":"href","target":"{{ route('wap.game_record') }}"}'>
                        <i class="bet_record_icon"></i>
                        <span class="func_nav_name">
                            <span>投注记录</span>
                            <small>查看所参与的游戏记录</small>
                        </span>
                    </a>
                </li>
                <!--投注记录 & 资金账户-->
                <li class="mui-row func_nav_item sep_top">
                    <a title="" class="mui-col-xs-6 func_nav_label" data-rel='{"opType":"href","target":"{{ route('wap.transfer_record') }}"}'>
                        <i class="money_record_icon"></i>
                        <span class="func_nav_name">
                            <span>转换记录</span>
                            <small id="transferAmount">查看所有平台转换记录</small>
                        </span>
                    </a>
                    <a title="" class="mui-col-xs-6 func_nav_label" data-rel='{"opType":"href","target":"{{ route('wap.recharge_record') }}"}'>
                        <i class="money_record_icon"></i>
                        <span class="func_nav_name">
                            <span>充值记录</span>
                            <small>查看所有充值记录</small>
                        </span>
                    </a>
                </li>
                <!--资金记录 & 安全中心-->
                <li class="mui-row func_nav_item sep_top">
                    <a title="" class="mui-col-xs-6 func_nav_label" data-rel='{"opType":"href","target":"{{ route('wap.drawing_record') }}"}'>
                        <i class="money_record_icon"></i>
                        <span class="func_nav_name">
                            <span>提款记录</span>
                            <small id="transferAmount">查看所有提款记录</small>
                        </span>
                    </a>
                    <a title="" class="mui-col-xs-6 func_nav_label" data-rel='{"opType":"href","target":"{{ route('wap.reset_password') }}"}'>
                        <i class="security_center_icon"></i>
                        <span class="func_nav_name">
                            <span>修改密码</span>
                            <small>修改取款提款密码</small>
                        </span>
                    </a>
                </li>

                <!--优惠记录 & 消息中心-->
                <li class="mui-row func_nav_item sep_top three_items">
                    <a title="" class="mui-col-xs-6 func_nav_label" data-rel='{"target":"{{ route('wap.activity_list') }}","opType":"href"}'>
                        <i class="promo_record_icon"></i>
                        <span class="func_nav_name ">
                            <span>申请优惠</span>
                            <small class="preferentialAmount">查看所参与的优惠纪录</small>
                        </span>
                    </a>
                    <a title="" class="mui-col-xs-6 func_nav_label" data-rel='{"target":"{{ route('wap.agent') }}","opType":"href"}'>
                        <i class="msg_center_icon"></i>
                        <span class="func_nav_name">
                            <span>代理中心</span>
                            <small>代理信息查看</small>
                        </span>
                    </a>
                </li>
                <!--优惠记录 & 消息中心-->
                <li class="mui-row func_nav_item sep_top three_items">
                    <a title="" class="mui-col-xs-6 func_nav_label" data-rel='{"target":"{{ route('wap.msg') }}","opType":"href"}'>
                        <i class="promo_record_icon"></i>
                        <span class="func_nav_name ">
                            <span>消息中心</span>
                            <small class="preferentialAmount">查看所有信息</small>
                        </span>
                    </a>
                    @if($_system_config->is_fs==1)
                    <a title="" class="mui-col-xs-6 func_nav_label" data-rel='{"opType":"href","target":"{{ route('wap.user_fs') }}"}'>
                        <i class="bet_record_icon"></i>
                        <span class="func_nav_name">
                                <span>返水详情</span>
                                <small>查看返水详情</small>
                            </span>
                    </a>
                        @endif
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    //judgeOldAndNew();//老带新判断
    //biCommon.getUserMoneys()
    $(function () {
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