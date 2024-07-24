@extends('wap.template.theme3.layouts.main')
@section('content')
    <main class="panel slideout-panel slideout-panel-left">
        <!---->
        <div data-v-76fa910e="" class="navbar-container" style="">
            <div data-v-76fa910e="" middle="" class="logo-container"></div>
            <div data-v-76fa910e="" middle="" class="menu-container" onclick="self.location=document.referrer;">
                <div data-v-76fa910e="" relative="" style="">
                    <img data-v-76fa910e="" middle="" src="{{asset('/wap/theme3/images/main/goback.png')}}" alt="" style="">
                </div>
            </div>
            <div data-v-76fa910e="" class="title">
                <h3 data-v-76fa910e="" class="title">提款</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>
        <div data-v-ff4f08b4="" class="draw view">
            <div data-v-ff4f08b4="" class="draw-top">
                <p>账号：{{ $_member->name }}</p>
                <p>
                    钱包余额：<span relative="" style="line-height: 0.8rem;">
                <span style="overflow: hidden;">
                <span class="UserAmountController" id="my_money" style="">{{ $_member->money }}</span>
                <span>RMB</span></span> </span>
                </p>
                <p>
                    码量余额：<span relative="" style="line-height: 0.8rem;">
                <span style="overflow: hidden;">
                <span class="UserAmountController"  style="">{{ $_member->ml_money }}</span>
                <span>RMB</span></span> </span>
                </p>
            </div>
            <div data-v-ff4f08b4="">
                <form action="{{ route('wap.post_drawing') }}" method="post" name="form1">
                <div data-v-ff4f08b4="" class="draw-content">
                    <div data-v-ff4f08b4="" class="md-field">
                        <!---->
                        <div class="md-field-content">
                            <p data-v-ff4f08b4="" class="draw-title">提款信息</p>
                            <div data-v-ff4f08b4="" class="md-input-item is-clear is-ios left normal">
                                <div class="md-input-item-container">
                                    <!---->
                                    <div class="md-input-item-title fixed">提款金额</div>
                                    <div class="md-input-item-control">
                                        <input id="amount"  name="money" placeholder="单笔下限100元,上限1000000元" maxlength="20" autocomplete="off" type="tel" class="md-input-item-input">
                                        <!---->
                                        <div class="md-input-item-clear" style="display: none;">
                                            <svg class="md-icon md-icon-circle-cross md">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#circle-cross"></use>
                                            </svg>
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                                <!---->
                                <!---->
                            </div>
                            <div data-v-ff4f08b4="" name="item0" class="md-field-item md-input-item">
                                <div data-v-ff4f08b4="" class="md-field-item-inner">
                                    <div data-v-ff4f08b4="" class="md-field-item-label solid">
                                        <div data-v-ff4f08b4="" class="md-field-item-title">开户银行</div>
                                    </div>
                                    <input  id="openBank" placeholder="如中国银行" maxlength="15" autocomplete="off" type="text" class="md-input-item-input" value="{{ $_member->bank_name }}" readonly="readonly">
                                </div>
                            </div>
                            <div data-v-ff4f08b4="" name="item0" class="md-field-item md-input-item">
                                <div data-v-ff4f08b4="" class="md-field-item-inner">
                                    <div data-v-ff4f08b4="" class="md-field-item-label solid">
                                        <div data-v-ff4f08b4="" class="md-field-item-title">银行账号</div>
                                    </div>
                                    <input  id="bankCard" maxlength="30" autocomplete="off" type="text" class="md-input-item-input" value="{{ $_member->bank_card }}" readonly="readonly">
                                </div>
                            </div>

                            <div data-v-ff4f08b4="" name="item3" class="md-field-item">
                                <div class="md-field-item-inner">
                                    <!---->
                                    <div class="md-field-item-label solid">
                                        <div class="md-field-item-title">取款密码</div>
                                        <!---->
                                    </div>
                                    <div class="md-field-item-content left">
                                        <div data-v-ff4f08b4="" class="md-codebox-wrapper">

                                            <input id="WithdrawalsPassword" name="qk_pwd" placeholder="请输入取款密码" maxlength="6" autocomplete="off" type="password" class="md-input-item-input">

                                        </div>
                                    </div>
                                    <!---->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->
                </div>
                <div data-v-ff4f08b4="" style="padding: 1.33333rem 0.8rem;">
                    <button data-v-ff4f08b4="" type="button"  class="md-button primary large ajax-submit-btn" style="background-color: rgb(0, 0, 0);">
                        <div class="md-button-inner"><!----> 确定提交</div>
                    </button></div>
                </form>
            </div>



        </div>
        <!---->
    </main>

    <script>
        // biCommon.getBindbank($("#openBank"), $("#bankCard"), $("#bankMeg"), $("#TrueName"), 3);
    </script>
<script>
    @if (!Auth::guard('member')->guest())
    $(function () {
        $.ajax({
            type:'post',
            url : "{{route('member.api.wallet_balance')}}",
            dataType : 'json',
            success : function (data) {
                //console.log(data);
                if(data.statusCode == '01'){
                    var all = Number($('#my_money').text()) + Number(data.data);
                    $('#my_money').text('');
                    $('#my_money').text(parseInt(all.toFixed(2)));
                }
            }
        })
    })
    @endif
</script>
@endsection