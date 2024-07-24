@extends('wap.template.theme8.layouts.main')
@section('content')
    <header class="mui-bar mui-bar-nav mui-action-back">
        <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
        <h1 class="mui-title">
            存款
        </h1>
    </header>
    <div class="deposit_2" style="margin-top: 44px;">

        <div id="slider" class="mui-slider main_container deposit-list" data-slider="1">
            {{--<div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted nav_tabs swiper-container swiper-container-horizontal swiper-container-free-mode swiper-container-ios">
                <a id="deposit" href="javascript:;" class="mui-control-item mui-active">存款</a>
                <a id="transfer" data-rel="{&quot;target&quot;:&quot;/Index/transfer&quot;,&quot;opType&quot;:&quot;href&quot;}" class="mui-control-item ">资金</a>
                <a id="withdraw" data-rel="{&quot;target&quot;:&quot;/Index/withdraw&quot;,&quot;opType&quot;:&quot;href&quot;}" class="mui-control-item ">提现</a>
            </div>--}}

            <div class="mui-slider-group">
                <div class="mui-slider-item mui-control-content  mui-active">
                    <div class="mui-scroll">
                        <div class="mui-scroll">
                            {{--<div class="deposit_tips">
                                <span style="color: #FFFCD8;text-align: center;font-size: 3.5vw;line-height: 24%;">温馨提示：完成存款后，请前往活动大厅申请活动优惠。</span>
                                <i class="close_icon"></i>
                            </div>--}}
                            <div class="list_pay" id="mgmChongZhi">
                                @if($_system_config->is_bankpay_on == 0)
                                <div class="list_pay_item_w" onclick="changgepage(this);" type="company" partype="bank" style="display: inline-block;">
                                    <div class="list_pay_item cur">
                                        <i class="icon-pay online-pay"></i>
                                        <div class="pay_nam">公司汇款</div>
                                    </div>
                                </div>
                                @endif
                                    @if($_system_config->is_wechat_on == 0)
                                <div class="list_pay_item_w" onclick="changgepage(this);" type="weixin" partype="wx" style="display: inline-block;">
                                    <div class="list_pay_item">
                                        <i class="icon-pay weichat-pay"></i>
                                        <div class="pay_nam">微信支付</div>
                                    </div>
                                </div>
                                    @endif
                                    @if($_system_config->is_alipay_on == 0)
                                <div class="list_pay_item_w" onclick="changgepage(this);" type="zhifubao" partype="zfb" style="display: inline-block;">
                                    <div class="list_pay_item">
                                        <i class="icon-pay alipay"></i>
                                        <div class="pay_nam">支付宝支付</div>
                                    </div>
                                </div>
                                    @endif
                                    @if($_system_config->is_qq_on == 0)
                                <div class="list_pay_item_w" onclick="changgepage(this);" type="qq" partype="qqpay" style="display: inline-block;">
                                    <div class="list_pay_item">
                                        <i class="icon-pay qq-wallet"></i>
                                        <div class="pay_nam">QQ支付</div>
                                    </div>
                                </div>
                                    @endif
                                    @if($_system_config->is_thirdpay_on == 0)
                                <div class="list_pay_item_w" onclick="changgepage(this);" type="yunsf" partype="ysf" style="display: inline-block;">
                                    <div class="list_pay_item">
                                        <i class="icon-pay other-pay"></i>
                                        <div class="pay_nam">第三方支付</div>
                                    </div>
                                </div>
                                    @endif
                                {{--<div class="list_pay_item_w" onclick="changgepage(this);" type="zxcz" partype="zaixian" style="display: inline-block;">
                                    <div class="list_pay_item">
                                        <i class="icon-pay alipay"></i>
                                        <div class="pay_nam">在线支付</div>
                                    </div>
                                </div>--}}
                            </div>
{{--                            <form id="rechargeForm" onsubmit="return false">--}}
                                <div class="mui-row" id="depositInput">
                                    <div class="pay_mone">
                                        <div class="tit">汇款信息</div>
                                        <div class="bank_list" id="scan_Bank_List">
                                            @if($_system_config->is_bankpay_on == 0)
                                            <form name="" action="{{ route('wap.bank_pay') }}" method="post">
                                                <div class="bank_list_i_w" type="company" style="display: block;">
                                                    <div class="depo_row">
                                                        <div class="label">充值账号</div>
                                                        <div class="input_dp_num">
                                                            <input  type="text" value="{{ $_member -> name }}" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="depo_row">
                                                        <div class="label">收款银行</div>
                                                        <div class="input_dp_num">
                                                            <select id="BankNames" onchange="changebank()">
                                                                @foreach($bank_card_list as $item)
                                                                    <option value="{{ $item->card_no }}" bankinfo="{{ $item->username }}">{{ \App\Models\Base::$BANK_TYPE[$item->bank_id] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="depo_row">
                                                        <div class="label">收款账号</div>
                                                        <div class="input_dp_num">
                                                            <input id="BankId" type="text" value="@if(! $bank_card_list -> isEmpty()){{ $bank_card_list[0]['card_no'] }}@endif" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="depo_row">
                                                        <div class="label">收款姓名</div>
                                                        <div class="input_dp_num">
                                                            <input id="AccountHolders" type="text" value="@if(! $bank_card_list -> isEmpty()) {{ $bank_card_list[0]['username'] }} @endif" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="depo_row">
                                                        <div class="label">汇款人</div>
                                                        <div class="input_dp_num">
                                                            <input name="name" maxlength="50" type="text" value="">
                                                        </div>
                                                    </div>
                                                    <div class="depo_row">
                                                        <div class="label">汇款账号</div>
                                                        <div class="input_dp_num">
                                                            <input name="account" maxlength="50" type="text" value="">
                                                        </div>
                                                    </div>
                                                    <div class="depo_row">
                                                        <div class="label">汇款银行</div>
                                                        <div class="input_dp_num">
                                                            <select name="payment_desc">
                                                                <option value="">==请选择汇款银行==</option>
                                                                @foreach(\App\Models\Base::$BANK_TYPE as $v)
                                                                    <option value="{{ $v }}" >{{ $v }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="tit">选择金额</div>
                                                    <div class="conv_mone">
                                                        <div class="conv_mone_i" onclick="chooseBlance(100,'#commoney');">
                                                            <i class="icon_mone mone_100">100</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(200,'#commoney');">
                                                            <i class="icon_mone mone_200">200</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(500,'#commoney');">
                                                            <i class="icon_mone mone_500">500</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(1000,'#commoney');">
                                                            <i class="icon_mone mone_1000">1000</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(5000,'#commoney');">
                                                            <i class="icon_mone mone_5000">5000</i>
                                                        </div>
                                                    </div>
                                                    <div class="depo_row">
                                                        <div class="label">存款金额</div>
                                                        <div class="input_dp_num">
                                                            <input name="money" id="commoney" type="text" placeholder="1 -10000">
                                                        </div>
                                                    </div>
                                                    <div class="btn_wrap" style="background: none;">
                                                        <input type="hidden" name="paytime" value="<?php echo date('Y-m-d')?>">
                                                        <input type="hidden" name="date_h" value="<?php echo date('H')?>">
                                                        <input type="hidden" name="date_i" value="<?php echo date('i')?>">
                                                        <input type="hidden" name="date_s" value="<?php echo date('s')?>">
                                                        <a id="btn_default" class="mui-btn btn_submit mui-btn-block ajax-submit-btn" href="javacript:;" >提交</a>
                                                    </div>
                                                </div>
                                            </form>
                                            @endif
                                                @if($_system_config->is_wechat_on == 0)

                                            <div class="bank_list_i_w" type="weixin" style="display: none;">
                                                <div id="wxSucess" class="wx">
                                                    @php
                                                        $wechat_qrcode = explode(',',$_system_config->wechat_qrcode);
                                                    @endphp
                                                    @foreach($wechat_qrcode as $item)
                                                        <div class="depcont-img">
                                                            <img style="width: 200px;height: 200px;" src="{{ $item }}">
                                                        </div>
                                                    @endforeach
{{--                                                    <p class="dep-warning">(您的订单已提交成功，请扫描二维码付款！)</p>--}}
{{--                                                    <p class="dep-warnings red">付款时请务必填写转帐说明：<b class="zhuanCode"></b></p>--}}
                                                    <p class="dep-warnings">温馨提醒：</p>
                                                    <p class="dep-warnings">1.长按二维码，点击保存图片</p>
                                                    <p class="dep-warnings">2.打开微信点击扫一扫，再点击右上角，选择从相册选取二维码</p>
                                                    <p class="dep-warnings">3.选择二维码即可付款</p>
                                                </div>
                                                <form  name="" action="{{ route('wap.post_weixin_pay') }}" method="post">
                                                <div class="depo_row">
                                                    <div class="label">充值账号</div>
                                                    <div class="input_dp_num">
                                                        <input  type="text" value="{{ $_member -> name }}" readonly="">
                                                    </div>
                                                </div>
                                                <div class="depo_row">
                                                    <div class="label">微信昵称</div>
                                                    <div class="input_dp_num">
                                                        <input name="account"  type="text" value="">
                                                    </div>
                                                </div>
                                                    <div class="tit">选择金额</div>
                                                    <div class="conv_mone">
                                                        <div class="conv_mone_i" onclick="chooseBlance(100,'#commoney_2');">
                                                            <i class="icon_mone mone_100">100</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(200,'#commoney_2');">
                                                            <i class="icon_mone mone_200">200</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(500,'#commoney_2');">
                                                            <i class="icon_mone mone_500">500</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(1000,'#commoney_2');">
                                                            <i class="icon_mone mone_1000">1000</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(5000,'#commoney_2');">
                                                            <i class="icon_mone mone_5000">5000</i>
                                                        </div>
                                                    </div>
                                                <div class="depo_row">
                                                    <div class="label">充值金额</div>
                                                    <div class="input_dp_num">
                                                        <input name="money" id="commoney_2"  type="text" value="" placeholder="输入充值金额">
                                                    </div>
                                                </div>
                                                <div class="btn_wrap" style="background: none;">
                                                    <input type="hidden" name="paytime" value="<?php echo date('Y-m-d')?>">
                                                    <input type="hidden" name="date_h" value="<?php echo date('H')?>">
                                                    <input type="hidden" name="date_i" value="<?php echo date('i')?>">
                                                    <input type="hidden" name="date_s" value="<?php echo date('s')?>">
                                                    <a id="btn_default" class="mui-btn btn_submit mui-btn-block ajax-submit-btn" href="javacript:;" >提交</a>
                                                </div>
                                                </form>
                                            </div>
                                                @endif

                                                @if($_system_config->is_alipay_on == 0)
                                            <div class="bank_list_i_w" type="zhifubao" style="display: none;">
                                                <div id="zhfSucess" class="zfb">
                                                    @php
                                                        $alipay_qrcode = explode(',',$_system_config->alipay_qrcode);
                                                    @endphp
                                                    @foreach($alipay_qrcode as $item)
                                                        <div class="depcont-img">
                                                            <img style="width: 200px;height: 200px;" src="{{ $item }}">
                                                        </div>
                                                    @endforeach
                                                    <p class="dep-warnings">温馨提醒：</p>
                                                    <p class="dep-warnings">1.长按二维码，点击保存图片</p>
                                                    <p class="dep-warnings">2.打开支付宝点击扫一扫，再点击右上角，选择从相册选取二维码</p>
                                                    <p class="dep-warnings">3.选择二维码即可付款</p>
                                                </div>
                                                <form id="" name="" action="{{ route('wap.post_ali_pay') }}" method="post">
                                                    <div class="depo_row">
                                                        <div class="label">充值账号</div>
                                                        <div class="input_dp_num">
                                                            <input  type="text" value="{{ $_member -> name }}" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="depo_row">
                                                        <div class="label">支付宝昵称</div>
                                                        <div class="input_dp_num">
                                                            <input name="account"  type="text" value="">
                                                        </div>
                                                    </div>
                                                    <div class="tit">选择金额</div>
                                                    <div class="conv_mone">
                                                        <div class="conv_mone_i" onclick="chooseBlance(100,'#commoney_3');">
                                                            <i class="icon_mone mone_100">100</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(200,'#commoney_3');">
                                                            <i class="icon_mone mone_200">200</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(500,'#commoney_3');">
                                                            <i class="icon_mone mone_500">500</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(1000,'#commoney_3');">
                                                            <i class="icon_mone mone_1000">1000</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(5000,'#commoney_3');">
                                                            <i class="icon_mone mone_5000">5000</i>
                                                        </div>
                                                    </div>
                                                    <div class="depo_row">
                                                        <div class="label">充值金额</div>
                                                        <div class="input_dp_num">
                                                            <input name="money" id="commoney_3"  type="text" value="" placeholder="输入充值金额">
                                                        </div>
                                                    </div>
                                                    <div class="btn_wrap" style="background: none;">
                                                        <input type="hidden" name="paytime" value="<?php echo date('Y-m-d')?>">
                                                        <input type="hidden" name="date_h" value="<?php echo date('H')?>">
                                                        <input type="hidden" name="date_i" value="<?php echo date('i')?>">
                                                        <input type="hidden" name="date_s" value="<?php echo date('s')?>">
                                                        <a id="btn_default" class="mui-btn btn_submit mui-btn-block ajax-submit-btn" href="javacript:;" >提交</a>
                                                    </div>
                                                </form>
                                            </div>
                                                @endif
                                                @if($_system_config->is_qq_on == 0)
                                            <div class="bank_list_i_w" type="qq" style="display: none;">
                                                <div id="qqSucess" class="qqpay" >
                                                    @php
                                                        $qq_qrcode = explode(',',$_system_config->qq_qrcode)
                                                    @endphp
                                                    @foreach($qq_qrcode as $item)
                                                        <div class="depcont-img">
                                                            <img style="width: 200px;height: 200px;" src="{{ $item }}">
                                                        </div>
                                                    @endforeach
                                                    <p class="dep-warnings">温馨提醒：</p>
                                                    <p class="dep-warnings">1.长按二维码，点击保存图片</p>
                                                    <p class="dep-warnings">2.打开QQ点击扫一扫，再点击右上角，选择从相册选取二维码</p>
                                                    <p class="dep-warnings">3.选择二维码即可付款</p>
                                                </div>
                                                <div class="depo_row">
                                                    <div class="label">充值账号</div>
                                                    <div class="input_dp_num">
                                                        <input  type="text" value="{{ $_member -> name }}" readonly="">
                                                    </div>
                                                </div>
                                                <form name="" action="{{ route('wap.post_qq_pay') }}" method="post">
                                                    <div class="depo_row">
                                                        <div class="label">QQ昵称</div>
                                                        <div class="input_dp_num">
                                                            <input name="account"  type="text" value="">
                                                        </div>
                                                    </div>
                                                    <div class="tit">选择金额</div>
                                                    <div class="conv_mone">
                                                        <div class="conv_mone_i" onclick="chooseBlance(100,'#commoney_4');">
                                                            <i class="icon_mone mone_100">100</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(200,'#commoney_4');">
                                                            <i class="icon_mone mone_200">200</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(500,'#commoney_4');">
                                                            <i class="icon_mone mone_500">500</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(1000,'#commoney_4');">
                                                            <i class="icon_mone mone_1000">1000</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(5000,'#commoney_4');">
                                                            <i class="icon_mone mone_5000">5000</i>
                                                        </div>
                                                    </div>
                                                    <div class="depo_row">
                                                        <div class="label">充值金额</div>
                                                        <div class="input_dp_num">
                                                            <input name="money" id="commoney_4"  type="text" value="" placeholder="输入充值金额">
                                                        </div>
                                                    </div>
                                                    <div class="btn_wrap" style="background: none;">
                                                        <input type="hidden" name="paytime" value="<?php echo date('Y-m-d')?>">
                                                        <input type="hidden" name="date_h" value="<?php echo date('H')?>">
                                                        <input type="hidden" name="date_i" value="<?php echo date('i')?>">
                                                        <input type="hidden" name="date_s" value="<?php echo date('s')?>">
                                                        <a id="btn_default" class="mui-btn btn_submit mui-btn-block ajax-submit-btn" href="javacript:;" >提交</a>
                                                    </div>
                                                </form>
                                            </div>
                                                @endif
                                                @if($_system_config->is_thirdpay_on == 0)
                                            <div class="bank_list_i_w" type="yunsf" style="display: none;">
                                                <div class="depo_row">
                                                    <div class="label">充值账号</div>
                                                    <div class="input_dp_num">
                                                        <input  type="text" value="{{ $_member -> name }}" readonly="">
                                                    </div>
                                                </div>
                                                <form name="" action="{{ route('ajax_pay') }}" method="post" >
                                                <div class="depo_row">
                                                    <div class="label">充值类型</div>
                                                    <div class="input_dp_num">
                                                        <select id="yunsfSel" name="paytype">
                                                            <option value="AliPay">支付宝扫码支付</option>
                                                            <option value="WechatPay">微信扫码支付</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                    <div class="tit">选择金额</div>
                                                    <div class="conv_mone">
                                                        <div class="conv_mone_i" onclick="chooseBlance(100,'#commoney_5');">
                                                            <i class="icon_mone mone_100">100</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(200,'#commoney_5');">
                                                            <i class="icon_mone mone_200">200</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(500,'#commoney_5');">
                                                            <i class="icon_mone mone_500">500</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(1000,'#commoney_5');">
                                                            <i class="icon_mone mone_1000">1000</i>
                                                        </div>
                                                        <div class="conv_mone_i" onclick="chooseBlance(5000,'#commoney_5');">
                                                            <i class="icon_mone mone_5000">5000</i>
                                                        </div>
                                                    </div>
                                                    <div class="depo_row">
                                                        <div class="label">充值金额</div>
                                                        <div class="input_dp_num">
                                                            <input name="amount" id="commoney_5"  type="text" value="" placeholder="输入充值金额">
                                                        </div>
                                                    </div>
                                                    <div class="btn_wrap" style="background: none;">
                                                        <a id="btn_default" class="mui-btn btn_submit mui-btn-block ajax-submit-btn" href="javacript:;" >提交</a>
                                                    </div>
                                                </form>
                                            </div>
                                                @endif
                                        </div>

                                    </div>

                                    <div class="deposit_help">
                                        <p>温馨提示</p>
                                        <p class="scan_code" style="display: none">• 如出现充值失败或充值后未到账等情况，请联系在线客服获取 帮助。</p>
{{--                                        <p class="electronic">• 存款金额请加小数点或尾数,以便区分.如充值200元,请输入201或200.1之类小数.。</p>--}}
                                        <p class="electronic">• 如有任何疑问，请联系在线客服获取帮助.</p>
                                        <br>
                                    </div>
                                </div>
{{--                            </form>--}}
                            <!--微信付款成功后扫码-->
                            <div id="wxSucess" class="sucess-content wx" style="display: none;">
                                <div class="depcont-img">
                                    <img src="" id="wxQrcode">
                                </div>
                                <p class="dep-warning">(您的订单已提交成功，请扫描二维码付款！)</p>
                                <p class="dep-warnings red">付款时请务必填写转帐说明：<b class="zhuanCode"></b></p>
                                <p class="dep-warnings">温馨提醒：</p>
                                <p class="dep-warnings">1.长按二维码，点击保存图片</p>
                                <p class="dep-warnings">2.打开微信点击扫一扫，再点击右上角，选择从相册选取二维码</p>
                                <p class="dep-warnings">3.选择二维码即可付款</p>
                            </div>
                            <!--支付宝付款成功后扫码-->
                            <div id="zhfSucess" class="sucess-content zfb" style="display: none;">
                                <div class="depcont-img">
                                    <img src="" id="zfbQrcode">
                                </div>
                                <p class="dep-warning">(您的订单已提交成功，请扫描二维码付款！)</p>
                                <p class="dep-warnings red">付款时请务必填写转帐说明：<b class="zhuanCode"></b></p>
                                <p class="dep-warnings">温馨提醒：</p>
                                <p class="dep-warnings">1.长按二维码，点击保存图片</p>
                                <p class="dep-warnings">2.打开支付宝点击扫一扫，再点击右上角，选择从相册选取二维码</p>
                                <p class="dep-warnings">3.选择二维码即可付款</p>
                            </div>
                            <!--QQ付款成功后扫码-->
                            <div id="qqSucess" class="sucess-content qqpay" style="display: none;">
                                <div class="depcont-img">
                                    <img src="" id="qqpayQrcode">
                                </div>
                                <p class="dep-warning">(您的订单已提交成功，请扫描二维码付款！)</p>
                                <p class="dep-warnings red">付款时请务必填写转帐说明：<b class="zhuanCode"></b></p>
                                <p class="dep-warnings">温馨提醒：</p>
                                <p class="dep-warnings">1.长按二维码，点击保存图片</p>
                                <p class="dep-warnings">2.打开QQ点击扫一扫，再点击右上角，选择从相册选取二维码</p>
                                <p class="dep-warnings">3.选择二维码即可付款</p>
                            </div>
                            <!--云闪付付款成功后扫码-->
                            <div id="ysfSucess" class="sucess-content ysf" style="display: none;">
                                <div class="depcont-img">
                                    <img src="" id="ysfQrcode">
                                </div>
                                <p class="dep-warning">(您的订单已提交成功，请扫描二维码付款！)</p>
                                <p class="dep-warnings red">付款时请务必填写转帐说明：<b class="zhuanCode"></b></p>
                                <p class="dep-warnings">温馨提醒：</p>
                                <p class="dep-warnings">1.长按二维码，点击保存图片</p>
                                <p class="dep-warnings">2.打开云闪付点击扫一扫，再点击右上角，选择从相册选取二维码</p>
                                <p class="dep-warnings">3.选择二维码即可付款</p>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="mui-slider-item mui-control-content ">
                </div>
                <div class="mui-slider-item mui-control-content ">
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.onload = function (e) {
            var obj = $(".list_pay").find(".list_pay_item_w:first");
            //console.log($(obj).attr('type'));
            changgepage(obj);
            //var bottomEl = document.querySelector('.mui-bar-tab');
            //bottomEl.style.top = document.documentElement.clientHeight - 52 + 'px';
        }
        // biCommon.bankinfo("bank");
        // biCommon.bankinfo("wx");
        // biCommon.bankinfo("zfb");
        // biCommon.bankinfo("qqpay");
        // biCommon.bankinfo("ysf");
        // biCommon.getBankList();
        $(function () {
            $("input").on("blur", function () {
                $("body").removeClass("mui-focusin")
            })
        })
    </script>


@endsection