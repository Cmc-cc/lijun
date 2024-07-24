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
                <h3 data-v-76fa910e="" class="title">银行资料</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>
        <div data-v-5e9fb540="" class="addCard view">
            <form action="{{ route('wap.post_bind_bank') }}" method="post" name="form1">
            <div data-v-5e9fb540="" class="cardInfo">
                <div data-v-5e9fb540="" class="md-field">
                    <!---->
                    <div class="md-field-content">
                        <div data-v-5e9fb540="" class="md-field-item">
                            <div class="md-field-item-inner">
                                <div class="md-field-item-label solid">
                                    <div class="md-field-item-title">开户姓名:</div>
                                </div>
                                <div class="md-field-item-content left">
                                    <input id="UserName" name="bank_username" maxlength="12" placeholder="请输入开户姓名" value="" class="md-input-item-input">
                                </div>
                            </div>
                        </div>
                        <div data-v-5e9fb540="" class="md-input-item is-ios left normal">
                            <div class="md-input-item-container">
                                <!---->
                                <div class="md-input-item-title fixed">银行账号:</div>
                                <div class="md-input-item-control">
                                    <input name="bank_card" placeholder="请输入开户账号" autocomplete="off" type="number" id="card" maxlength="24" class="md-input-item-input">
                                    <!---->
                                    <!---->
                                    <!---->
                                </div>
                            </div>
                            <!---->
                            <!---->
                        </div>
                        <div data-v-5e9fb540="" name="item6" class="md-field-item md-input-item ">
                            <div class="md-field-item-inner">
                                <!---->
                                <div class="md-field-item-label solid">
                                    <div class="md-field-item-title">请选择银行:</div>
                                    <!---->
                                </div>
                                <select id="bankname" name="bank_name">
                                    <option value="">--请选择--</option>
                                    @foreach(\App\Models\Base::$BANK_TYPE as $v)
                                        <option value="{{ $v }}"
                                                @if($_member->bank_name == $v) selected @endif>{{ $v }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div data-v-5e9fb540="" name="item3" class="md-field-item md-input-item">
                            <div class="md-field-item-inner">
                                <!---->
                                <div class="md-field-item-label solid">
                                    <div class="md-field-item-title">开户网点:</div>
                                    <!---->
                                </div>
                                <input name="bank_branch_name" placeholder="如河北唐山建设银行" maxlength="50" id="banknode" autocomplete="off" type="text" class="md-input-item-input">

                            </div>
                        </div>
                        <!---->
                    </div>
                </div>
            </div>
            <div data-v-5e9fb540="" style="padding: 1.33333rem 0.8rem;" id="newbtn">
                <button data-v-5e9fb540="" type="button"  class="md-button primary large" style="background-color: rgb(0, 0, 0);">
                    <div class="md-button-inner ajax-submit-btn"><!----> 确定</div>
                </button>
            </div>
            </form>
        </div>
        <!---->
    </main>
    <script>
        /*biCommon.getBindbank($("#banknode"), $("#card"), $("#bankname"), $("#UserName"), 2);
        biCommon.getWithdrawBankList();*/
    </script>
@endsection