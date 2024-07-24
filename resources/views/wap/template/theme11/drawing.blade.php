@extends('wap.template.theme11.layouts.main')
@section('content')
    <div class="app_header">
        <div class="am-navbar am-navbar-dark">
            <div class="am-navbar-left" role="button">
            <span class="am-navbar-left-content" onclick="Opentoolbar();">
                <img src="{{ asset('wap/theme11/images/menu_burger.png') }}" class="headIcon" />
            </span>
            </div>
            <div class="am-navbar-title">
                <div>提款</div>
            </div>
            <div class="am-navbar-right" onclick="window.location.href='{{ $_system_config -> service_link }}'">
                <div>在线客服</div>
            </div>
        </div>
        @include('wap.template.theme11.layouts.head_left')
    </div>
    <div class="container">
        <div class="setone deposit" style="overflow: auto;">
            <div class="settwo" style="width: 98%; margin: 0px auto;">
                <div>
                    <div>
                        <div style="margin-top: 0.12rem;" id="mgmChongZhi">
                            <form method="post" action="{{ route('wap.post_drawing') }}">
                                <div class="newdesposit bank_list_i_w" choose="withdraw" style="display: block;">
                                <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                                    <div class="am-flexbox-item">
                                        <div class="am-list-item am-input-item">
                                            <div class="am-input-label am-input-label-5">
                                                <p>账号</p>
                                            </div>
                                            <div class="am-input-control"><input type="text" maxlength="50" value="{{ $_member -> name }}" warning="" readonly=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                                    <div class="am-flexbox-item">
                                        <div class="am-list-item am-input-item">
                                            <div class="am-input-label am-input-label-5">
                                                <p>码量余额：</p>
                                            </div>
                                            <div class="am-input-control"><input value="{{ $_member -> ml_money }}" type="text" maxlength="50" id="TrueName" warning="" readonly=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                                    <div class="am-flexbox-item">
                                        <div class="am-list-item am-input-item">
                                            <div class="am-input-label am-input-label-5">
                                                <p>银行：</p>
                                            </div>
                                            <div class="am-input-control"><input type="text" maxlength="50" id="openBank" warning="" readonly="" value="{{ $_member -> bank_name }}"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                                    <div class="am-flexbox-item">
                                        <div class="am-list-item am-input-item">
                                            <div class="am-input-label am-input-label-5">
                                                <p>卡号：</p>
                                            </div>
                                            <div class="am-input-control"><input type="text" maxlength="50" id="bankMeg" warning="" readonly="" value="{{ $_member -> bank_card }}"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                                    <div class="am-flexbox-item">
                                        <div class="am-list-item am-input-item">
                                            <div class="am-input-label am-input-label-5">
                                                <p>金额：</p>
                                            </div>
                                            <div class="am-input-control"><input type="number" id="amount" placeholder="提款金额大于100元" warning="" maxlength="50" min="1" name="money"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                                    <div class="am-flexbox-item">
                                        <div class="am-list-item am-input-item">
                                            <div class="am-input-label am-input-label-5">
                                                <p>密码：</p>
                                            </div>
                                            <div class="am-input-control"><input type="password" placeholder="请输入提款密码" id="WithdrawalsPassword" maxlength="6" name="qk_pwd"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="PayButtonB PayButtonBChongzhi" id="recharge_btn" style="display: block;" value="提 交"  warning="正在提交审核..." show="提 交">
                                    <a role="button" class="buttonPay am-button am-button-disabled" aria-disabled="true" style="background: transparent; border: 0px; line-height: 0.8rem;">
                                        <p class="ajax-submit-btn" style="color: rgb(255, 255, 255); font-size: 16px; font-weight: bold;">立即提款</p>
                                    </a>
                                </div>
                            </div>
                            </form>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <script type="text/javascript">

    </script>


@endsection