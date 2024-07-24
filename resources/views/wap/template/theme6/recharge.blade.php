@extends('wap.template.theme6.layouts.main')
@section('content')
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">充值</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <style>
        .dep-warnings{
            display: block;
        }
    </style>
    <div class="mui-content deposit-content">
        <div class="deposit-title" id="depositTitle">
            <div class="mui-row">
                @if($_system_config->is_bankpay_on == 0)
                <div class="mui-col-xs-3" choose="gongsi" type="company" partype="bank" style="display: inline-block;width: 80px;">银行卡充值</div>
                @endif
                    @if($_system_config->is_wechat_on == 0)
                <div class="mui-col-xs-3" choose="weixin" type="weixin" partype="wx" style="display: inline-block;">微信</div>
                    @endif
                    @if($_system_config->is_alipay_on == 0)
                <div class="mui-col-xs-3" choose="zhifubao" type="zhifubao" partype="zfb" style="display: inline-block;">支付宝</div>
                    @endif
                    @if($_system_config->is_qq_on == 0)
                <div class="mui-col-xs-3" choose="qq" type="qq" partype="qqpay" style="display: inline-block;">QQ充值</div>
                    @endif
                    @if($_system_config->is_thirdpay_on == 0)
                <div class="mui-col-xs-3" choose="yunsf" type="yunsf" partype="ysf" style="display: inline-block;width: 80px;">第三方支付</div>
                    @endif
                {{--<div class="mui-col-xs-3" choose="zaixian" type="zxcz" partype="zaixian" style="display: inline-block;">在线充值</div>--}}

            </div>
        </div>
        <div class="deposit-chongzhi">
            @if($_system_config->is_bankpay_on == 0)
                <form name="" action="{{ route('wap.bank_pay') }}" method="post">
            <div class="deposit-detail" choose="gongsi">
                <div class="deposit-shuru">
                    <label>充值账号：</label>
                    <input type="text" placeholder="" readonly="" value="{{ $_member -> name }}">
                </div>

                <div class="deposit-shuru">
                    <label>收款银行：</label>
                    <select id="BankNames" onchange="changebank();">
                        @foreach($bank_card_list as $item)
                            <option value="{{ $item->card_no }}" bankinfo="{{ $item->username }}">{{ \App\Models\Base::$BANK_TYPE[$item->bank_id] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="deposit-shuru">
                    <label>收款账号：</label>
                    <input type="number" placeholder="" id="BankId" readonly="" value="@if(! $bank_card_list -> isEmpty()){{ $bank_card_list[0]['card_no'] }}@endif">
                </div>
                <div class="deposit-shuru">
                    <label>收款姓名：</label>
                    <input type="text" placeholder="" id="AccountHolders" readonly="" value="@if(! $bank_card_list -> isEmpty()) {{ $bank_card_list[0]['username'] }} @endif">
                </div>
                <div class="deposit-shuru">
                    <label>充值金额：</label>
                    <input type="number" name="money" placeholder="请输入金额" id="commoney1">
                </div>
                <div class="deposit-shuru">
                    <label>汇款人：</label>
                    <input type="text" name="name" placeholder="" id="Accounts">
                </div>
                <div class="deposit-shuru">
                    <label>汇款账号：</label>
                    <input type="text" name="account" placeholder="" id="Accounts">
                </div>
                <div class="deposit-shuru">
                    <label>汇款银行</label>
                    <select class="txt-ipt" name="payment_desc">
                        <option value="">==请选择汇款银行==</option>
                        @foreach(\App\Models\Base::$BANK_TYPE as $v)
                            <option value="{{ $v }}" >{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="paytime" value="<?php echo date('Y-m-d')?>">
                <input type="hidden" name="date_h" value="<?php echo date('H')?>">
                <input type="hidden" name="date_i" value="<?php echo date('i')?>">
                <input type="hidden" name="date_s" value="<?php echo date('s')?>">
                <button class="mui-btn surebtn ajax-submit-btn">提交</button>
            </div>
                </form>
            @endif
                @if($_system_config->is_wechat_on == 0)
            <div class="deposit-detail" choose="weixin">
                <div class="deposit-qrcode" style="display: block">
                @php
                    $wechat_qrcode = explode(',',$_system_config->wechat_qrcode);
                @endphp
                @foreach($wechat_qrcode as $item)
                    <div class="depcont-img">
                        <img style="width: 200px;height: 200px;" src="{{ $item }}">
                    </div>
                @endforeach
                    <div class="deposit-warning">
                        <p class="dep-warnings">温馨提醒：</p>
                        <p class="dep-warnings">1.长按二维码，点击保存图片</p>
                        <p class="dep-warnings">2.打开微信点击扫一扫，再点击右上角，选择从相册选取二维码</p>
                        <p class="dep-warnings">3.选择二维码即可付款</p>
                    </div>
                </div>
                <form  name="" action="{{ route('wap.post_weixin_pay') }}" method="post">
                <div class="deposit-shuru">
                    <label>充值账户：</label>
                    <input type="text" placeholder="" class="txt-ipt" maxlength="50" id="" readonly="readonly" value="{{ $_member->name}}">
                </div>
                <div class="deposit-shuru">
                    <label>充值金额：</label>
                    <input type="number" placeholder="" class="txt-ipt" maxlength="50" id="commoney1" name="money">
                </div>
                <div class="deposit-shuru">
                    <label>微信昵称：</label>
                    <input type="text" placeholder="" class="txt-ipt" maxlength="50" name="account">
                </div>
                <input type="hidden" name="paytime" value="<?php echo date('Y-m-d')?>">
                <input type="hidden" name="date_h" value="<?php echo date('H')?>">
                <input type="hidden" name="date_i" value="<?php echo date('i')?>">
                <input type="hidden" name="date_s" value="<?php echo date('s')?>">
                <button class="mui-btn surebtn ajax-submit-btn">提交</button>
                </form>
            </div>
                @endif
                @if($_system_config->is_alipay_on == 0)
            <div class="deposit-detail" choose="zhifubao">
                <div class="deposit-qrcode" style="display: block">
                    @php
                        $alipay_qrcode = explode(',',$_system_config->alipay_qrcode);
                    @endphp
                    @foreach($alipay_qrcode as $item)
                        <div class="depcont-img">
                            <img style="width: 200px;height: 200px;" src="{{ $item }}">
                        </div>
                    @endforeach
                    <div class="deposit-warning">
                        <p class="dep-warnings">温馨提醒：</p>
                        <p class="dep-warnings">1.长按二维码，点击保存图片</p>
                        <p class="dep-warnings">2.打开支付宝点击扫一扫，再点击右上角，选择从相册选取二维码</p>
                        <p class="dep-warnings">3.选择二维码即可付款</p>
                    </div>
                </div>
                <form id="" name="" action="{{ route('wap.post_ali_pay') }}" method="post">
                <div class="deposit-shuru">
                    <label>充值账户：</label>
                    <input type="text" placeholder="" class="txt-ipt" maxlength="50" id="" name="add_account" readonly="readonly" value="{{ $_member->name}}">
                </div>
                <div class="deposit-shuru">
                    <label>充值金额：</label>
                    <input type="number" name="money" placeholder="请输入金额" id="commoney3">
                </div>
                <div class="deposit-shuru">
                    <label>支付宝昵称：</label>
                    <input type="text" placeholder="请输入支付宝昵称" name="account">
                </div>
                    <input type="hidden" name="paytime" value="<?php echo date('Y-m-d')?>">
                    <input type="hidden" name="date_h" value="<?php echo date('H')?>">
                    <input type="hidden" name="date_i" value="<?php echo date('i')?>">
                    <input type="hidden" name="date_s" value="<?php echo date('s')?>">
                <button class="mui-btn surebtn ajax-submit-btn">提交</button>
                </form>
            </div>
                @endif
                @if($_system_config->is_qq_on == 0)
            <div class="deposit-detail" choose="qq">
                <div class="deposit-qrcode" style="display: block">
                    @php
                        $qq_qrcode = explode(',',$_system_config->qq_qrcode)
                    @endphp
                    @foreach($qq_qrcode as $item)
                        <div class="depcont-img">
                            <img style="width: 200px;height: 200px;" src="{{ $item }}">
                        </div>
                    @endforeach
                    <div class="deposit-warning">
                        <p class="dep-warnings">温馨提醒：</p>
                        <p class="dep-warnings">1.长按二维码，点击保存图片</p>
                        <p class="dep-warnings">2.打开QQ点击扫一扫，再点击右上角，选择从相册选取二维码</p>
                        <p class="dep-warnings">3.选择二维码即可付款</p>
                    </div>
                </div>
                <form name="" action="{{ route('wap.post_qq_pay') }}" method="post">
                <div class="deposit-shuru">
                    <label>充值账户：</label>
                    <input type="text" placeholder="" class="txt-ipt" maxlength="50" id="" name="" readonly="readonly" value="{{ $_member->name }}">
                </div>
                <div class="deposit-shuru">
                    <label>充值金额：</label>
                    <input type="number" placeholder="请输入金额" name="money">
                </div>
                <div class="deposit-shuru">
                    <label>QQ昵称：</label>
                    <input type="number" placeholder="请输入QQ昵称"  maxlength="50" id="" name="account">
                </div>
                    <input type="hidden" name="paytime" value="<?php echo date('Y-m-d')?>">
                    <input type="hidden" name="date_h" value="<?php echo date('H')?>">
                    <input type="hidden" name="date_i" value="<?php echo date('i')?>">
                    <input type="hidden" name="date_s" value="<?php echo date('s')?>">
                <button class="mui-btn surebtn ajax-submit-btn">提交</button>
                </form>
            </div>
                @endif
                @if($_system_config->is_thirdpay_on == 0)
            <div class="deposit-detail" choose="yunsf">
                <form id="" name="" action="{{ route('ajax_pay') }}" method="post" >
                <div class="deposit-shuru">
                    <label>充值账户：</label>
                    <input type="text" placeholder="" class="txt-ipt" maxlength="50" id="" name="" readonly="readonly" value="{{ $_member->name}}">
                </div>
                <div class="deposit-shuru">
                    <label>充值类型：</label>
                    <select class="txt-ipt" name="paytype">
                        <option value="AliPay">支付宝扫码支付</option>
                        <option value="WechatPay">微信扫码支付</option>
                    </select>
                </div>
                <div class="deposit-shuru">
                    <label>充值金额：</label>
                    <input type="number" placeholder="请输入金额" id="commoney5" name="amount">
                </div>
                <button class="mui-btn surebtn ajax-submit-btn" >提交</button>
                </form>
            </div>
                @endif
        </div>
    </div>
    <script>
        $(function () {
            var ele = $('#depositTitle').find('.mui-col-xs-3').get(0);
            $(ele).addClass('mui-active')
            depositFun();
            /*biCommon.bankinfo("bank");
            biCommon.bankinfo("wx");
            biCommon.bankinfo("zfb");
            biCommon.bankinfo("qqpay");
            biCommon.bankinfo("ysf");
            biCommon.getBankList();*/
        })
    </script>
@endsection

