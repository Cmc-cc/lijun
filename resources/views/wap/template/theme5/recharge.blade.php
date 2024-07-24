@extends('wap.template.theme5.layouts.main')
@section('content')
    <div class="layout mt12" id="div_create_user_bank clearboth">
        <!--<ul class="dep-twoli clearboth">
            <li>转账入款</li>
            <li>线上支付</li>
        </ul>-->
        <div class="hd-tit dep-title clearboth" id="mgmChongZhi">
            @if($_system_config->is_bankpay_on == 0)
            <span onclick="changgepage(this);" type="company" partype="bank" class="active" style="display: inline-block;width: 17%">银行卡充值</span>
            @endif
                @if($_system_config->is_wechat_on == 0)
            <span onclick="changgepage(this);" type="weixin" partype="wx" style="display: inline-block;" class="">微信充值</span>
                @endif
                @if($_system_config->is_alipay_on == 0)
            <span onclick="changgepage(this);" type="zhifubao" partype="zfb" style="display: inline-block;" class="">支付宝</span>
                @endif
{{--            <span onclick="changgepage(this);" type="zxcz" partype="zaixian" style="display: inline-block;">在线充值</span>--}}
                @if($_system_config->is_qq_on == 0)
            <span onclick="changgepage(this);" type="qq" partype="qqpay" style="display: inline-block;">QQ充值</span>
                @endif
                @if($_system_config->is_thirdpay_on == 0)
            <span onclick="changgepage(this);" type="yunsf" partype="ysf" style="display: inline-block;width: 17%">第三方支付</span>
                @endif
        </div>
        @if($_system_config->is_bankpay_on == 0)
        <div class="dep-second depcont" style="display: block;" type="company">
            <form name="" action="{{ route('wap.bank_pay') }}" method="post">
            <ul class="mod-forms">
                <li class="form-label">
                    <h3>充值账号:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="text" class="txt-ipt" maxlength="50" name="" readonly="readonly" value="{{ $_member->name}}">
                    </div>
                </li>

                <li class="form-label">
                    <h3>收款银行:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <select class="txt-ipt" id="BankNames" onchange="changebank()">
                            @foreach($bank_card_list as $item)
                            <option value="{{ $item->card_no }}" bankinfo="{{ $item->username }}">{{ \App\Models\Base::$BANK_TYPE[$item->bank_id] }}</option>
                            @endforeach
                        </select>
                    </div>
                </li>
                <li class="form-label">
                    <h3>收款账号:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="text" class="txt-ipt" maxlength="50" value="{{ $bank_card_list[0]['card_no'] }}" readonly="readonly" id="BankId">
                    </div>
                </li>
                <li class="form-label">
                    <h3>收款姓名:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="text" class="txt-ipt" maxlength="50" value="{{ $bank_card_list[0]['username'] }}" readonly="readonly" id="AccountHolders">
                    </div>
                </li>
                <li class="form-label">
                    <h3>充值金额:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="number" placeholder="请输入充值金额" class="txt-ipt" maxlength="50" id="commoney0" name="money">
                    </div>
                </li>
                <li class="form-label">
                    <h3>汇款人姓名:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="text" name="name" placeholder="请输入汇款人姓名" class="txt-ipt" maxlength="50" value="" id="">
                    </div>
                </li>
                <li class="form-label">
                    <h3>汇款人账号:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="text" name="account" placeholder="请输入汇款账号" class="txt-ipt" maxlength="50" value="" id="Accounts">
                    </div>
                </li>
                <li class="form-label">
                    <h3>汇款银行:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <select class="txt-ipt" name="payment_desc">
                            <option value="">==请选择汇款银行==</option>
                            @foreach(\App\Models\Base::$BANK_TYPE as $v)
                                <option value="{{ $v }}" >{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                </li>
            </ul>
            <p class="c8"></p>
                <input type="hidden" name="paytime" value="<?php echo date('Y-m-d')?>">
                <input type="hidden" name="date_h" value="<?php echo date('H')?>">
                <input type="hidden" name="date_i" value="<?php echo date('i')?>">
                <input type="hidden" name="date_s" value="<?php echo date('s')?>">
            <input type="submit" class="confirm-sub mt20 ajax-submit-btn" value="提 交" >
            </form>
        </div>
        @endif
        @if($_system_config->is_wechat_on == 0)
        <div class="dep-third depcont" style="display: none;" type="weixin">
            @php
                $wechat_qrcode = explode(',',$_system_config->wechat_qrcode);
            @endphp
            @foreach($wechat_qrcode as $item)
            <div class="depcont-img">
                <img src="{{ $item }}">
            </div>
            @endforeach
            <style>
                .dep-warnings{
                    display: block;
                }
            </style>
            <p class="dep-warning">(您的订单已提交成功，请扫描二维码付款！)</p>
            <p class="dep-warnings red">付款时请务必填写转帐说明：<b class="zhuanCode"></b></p>
            <p class="dep-warnings">温馨提醒：</p>
            <p class="dep-warnings">1.长按二维码，点击保存图片</p>
            <p class="dep-warnings">2.打开微信点击扫一扫，再点击右上角，选择从相册选取二维码</p>
            <p class="dep-warnings">3.选择二维码即可付款</p>
            <form id="" name="" action="{{ route('wap.post_weixin_pay') }}" method="post">
            <ul class="mod-forms">
                <li class="form-label">
                    <h3>充值账户:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="text" placeholder="" class="txt-ipt" maxlength="50" id="" readonly="readonly" value="{{ $_member->name}}">
                    </div>
                </li>
                <li class="form-label">
                    <h3>充值金额:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="number" placeholder="" class="txt-ipt" maxlength="50" id="commoney1" name="money">
                    </div>
                </li>
                <li class="form-label">
                    <h3>微信昵称:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="text" placeholder="" class="txt-ipt" maxlength="50" name="account">
                    </div>
                </li>
            </ul>
            <p class="c8"></p>
                <input type="hidden" name="paytime" value="<?php echo date('Y-m-d')?>">
                <input type="hidden" name="date_h" value="<?php echo date('H')?>">
                <input type="hidden" name="date_i" value="<?php echo date('i')?>">
                <input type="hidden" name="date_s" value="<?php echo date('s')?>">
            <input type="submit" class="confirm-sub mt20 ajax-submit-btn" value="提 交" >
            </form>
        </div>
        @endif
        @if($_system_config->is_alipay_on == 0)
        <div class="dep-third depcont" style="display: none;" type="zhifubao">
            @php
                $alipay_qrcode = explode(',',$_system_config->alipay_qrcode);
            @endphp
            @foreach($alipay_qrcode as $item)
            <div class="depcont-img">
                <img src="{{ $item }}">
            </div>
            @endforeach
            <p class="dep-warning">(您的订单已提交成功，请扫描二维码付款！)</p>
            <p class="dep-warnings red">付款时请务必填写转帐说明：<b class="zhuanCode"></b></p>
            <p class="dep-warnings">温馨提醒：</p>
            <p class="dep-warnings">1.长按二维码，点击保存图片</p>
            <p class="dep-warnings">2.打开支付宝点击扫一扫，再点击右上角，选择从相册选取二维码</p>
            <p class="dep-warnings">3.选择二维码即可付款</p>
            <form id="" name="" action="{{ route('wap.post_ali_pay') }}" method="post">
            <ul class="mod-forms">
                <li class="form-label">
                    <h3>充值账户:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="text" placeholder="" class="txt-ipt" maxlength="50" id="" name="add_account" readonly="readonly" value="{{ $_member->name}}">
                    </div>
                </li>
                <li class="form-label">
                    <h3>充值金额:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="number" placeholder="" class="txt-ipt" maxlength="50" id="commoney2" name="money">
                    </div>
                </li>
                <li class="form-label">
                    <h3>支付宝昵称:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="text" placeholder="" class="txt-ipt" maxlength="50" id="" name="account">
                    </div>
                </li>
                {{--<li class="form-label">
                    <h3>收款账户:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <select class="txt-ipt" id="zfbSel"><option value="1027" payname="AAA" img="/img/pay/hpay/pic/QRCODE_20190919095843155.png">AAA</option><option value="4" payname="春哥1" img="/img/pay/hpay/pic/QRCODE_20190325100432196.gif">春哥1</option></select>
                    </div>
                </li>--}}
            </ul>
            <p class="c8"></p>
                <input type="hidden" name="paytime" value="<?php echo date('Y-m-d')?>">
                <input type="hidden" name="date_h" value="<?php echo date('H')?>">
                <input type="hidden" name="date_i" value="<?php echo date('i')?>">
                <input type="hidden" name="date_s" value="<?php echo date('s')?>">
            <input type="submit" class="confirm-sub mt20 ajax-submit-btn" value="提 交" >
            </form>
        </div>
        @endif
        @if($_system_config->is_qq_on == 0)
        <div class="dep-third depcont" style="display:none;" type="qq">
            @php
                $qq_qrcode = explode(',',$_system_config->qq_qrcode)
            @endphp
            @foreach($qq_qrcode as $item)
            <div class="depcont-img">
                <img src="{{ $item }}">
            </div>
            @endforeach
            <p class="dep-warning">(您的订单已提交成功，请扫描二维码付款！)</p>
            <p class="dep-warnings red">付款时请务必填写转帐说明：<b class="zhuanCode"></b></p>
            <p class="dep-warnings">温馨提醒：</p>
            <p class="dep-warnings">1.长按二维码，点击保存图片</p>
            <p class="dep-warnings">2.打开QQ点击扫一扫，再点击右上角，选择从相册选取二维码</p>
            <p class="dep-warnings">3.选择二维码即可付款</p>
            <form id="" name="" action="{{ route('wap.post_qq_pay') }}" method="post">
            <ul class="mod-forms">
                <li class="form-label">
                    <h3>充值账户:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="text" placeholder="" class="txt-ipt" maxlength="50" id="" name="" readonly="readonly" value="{{ $_member->name }}">
                    </div>
                </li>
                <li class="form-label">
                    <h3>充值金额:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="number" placeholder="" class="txt-ipt" maxlength="50" id="commoney3" name="money">
                    </div>
                </li>
                <li class="form-label">
                    <h3>QQ昵称:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="number" placeholder="" class="txt-ipt" maxlength="50" id="" name="account">
                    </div>
                </li>
                {{--<li class="form-label">
                    <h3>收款账户:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <select class="txt-ipt" id="qqSel"><option value="7" payname="阿道夫" img="/img/pay/hpay/pic/20190422042159607.gif">阿道夫</option></select>
                    </div>
                </li>--}}
            </ul>
            <p class="c8"></p>
                <input type="hidden" name="paytime" value="<?php echo date('Y-m-d')?>">
                <input type="hidden" name="date_h" value="<?php echo date('H')?>">
                <input type="hidden" name="date_i" value="<?php echo date('i')?>">
                <input type="hidden" name="date_s" value="<?php echo date('s')?>">
            <input type="submit" class="confirm-sub mt20 ajax-submit-btn" value="提 交" >
            </form>
        </div>
        @endif
        @if($_system_config->is_thirdpay_on == 0)
        <div class="dep-third depcont" style="display:none;" type="yunsf">
            {{--<div class="depcont-img" style="display:none;">
                <img src="" id="ysfQrcode">
            </div>
            <p class="dep-warning">(您的订单已提交成功，请扫描二维码付款！)</p>
            <p class="dep-warnings red">付款时请务必填写转帐说明：<b class="zhuanCode"></b></p>
            <p class="dep-warnings">温馨提醒：</p>
            <p class="dep-warnings">1.长按二维码，点击保存图片</p>
            <p class="dep-warnings">2.打开云闪付点击扫一扫，再点击右上角，选择从相册选取二维码</p>
            <p class="dep-warnings">3.选择二维码即可付款</p>--}}
            <form id="" name="" action="{{ route('ajax_pay') }}" method="post" >
            <ul class="mod-forms">
                <li class="form-label">
                    <h3>充值账户:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="text" placeholder="" class="txt-ipt" maxlength="50" id="" name="" readonly="readonly" value="{{ $_member->name}}">
                    </div>
                </li>
                <li class="form-label">
                    <h3>充值类型:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <select class="txt-ipt" name="paytype">
                            <option value="AliPay">支付宝扫码支付</option>
                            <option value="WechatPay">微信扫码支付</option>
                        </select>
                    </div>
                </li>
                <li class="form-label">
                    <h3>充值金额:</h3>
                </li>
                <li>
                    <div class="form-ipt w100">
                        <input type="number" placeholder="" class="txt-ipt" maxlength="50" id="" name="amount">
                    </div>
                </li>
            </ul>
            <p class="c8"></p>
            <input type="submit" class="confirm-sub mt20 ajax-submit-btn" value="提 交" >
            </form>
        </div>
            @endif
    </div>
@endsection