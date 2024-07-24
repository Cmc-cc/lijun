@extends('wap.template.theme5.layouts.main')
@section('content')
    <div class="layout mt12">
        <ul class="mod-f-l">
            <li class="no-next">
                <span class="fr f14px cRed UserAmountController" id="my_money">{{ $_member->money }}</span><span class="tit">主账户</span>
               {{-- <span id="vipLayoutText">普通会员/0</span>
                <img src="/img/gradeimg/gradeimg1_20190919010913804.png" class="fr vip-layout" id="vipLayout">--}}
            </li>
        </ul>

        <ul class="mod-f-l mt12">
            <li><a href="{{ route('wap.userinfo') }}"><img src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16"
                                                 class="fr arrow-r"><span class="tit">个人资料</span></a></li>
            <li><a href="{{ route('wap.reset_password') }}"><img src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16"
                                                 class="fr arrow-r"><span class="tit">修改密码</span></a></li>

            {{--<li><a href="/Index/wtdCard"><img src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16"
                                              class="fr arrow-r"><span class="tit">取款银行卡</span></a></li>--}}
            <li>
                <a href="{{ route('wap.agent') }}">
                    <img src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16" class="fr arrow-r">
                    <span class="tit">代理中心</span>
                </a>
            </li>
        </ul>

        <ul class="mod-f-l mt12">
            <li><a href="{{ route('wap.recharge') }}"><img src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16"
                                              class="fr arrow-r"><span class="tit">存款</span></a></li>
        </ul>

        <ul class="mod-f-l mt12">
            <li><a href="{{ route('wap.transfer') }}"><img src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16"
                                               class="fr arrow-r"><span class="tit">平台转账</span></a></li>
            <li>
                <a href="{{ route('wap.transfer_record') }}">
                    <img src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16" class="fr arrow-r">
                    <span class="tit">额度转换记录</span>
                </a>
            </li>
            <li>
                <a href="{{ route('wap.recharge_record') }}">
                    <img src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16" class="fr arrow-r">
                    <span class="tit">充值记录</span>
                </a>
            </li>
            <li>
                <a href="{{ route('wap.drawing_record') }}">
                    <img src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16" class="fr arrow-r">
                    <span class="tit">提款记录</span>
                </a>
            </li>
            @if($_system_config->is_fs==1)
            <li>
                <a href="{{ route('wap.user_fs') }}">
                    <img src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16" class="fr arrow-r">
                    <span class="tit">实时返水</span>
                </a>
            </li>
            @endif
            <li id="mailbox">
                <a href="{{ route('wap.msg') }}"><img src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16" class="fr arrow-r">
                    <span class="tit">我的消息</span>
                </a>
            </li>
        </ul>

        <ul class="mod-f-l mt12">
            <li><a href="{{ route('wap.drawing') }}"><img src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16"
                                               class="fr arrow-r"><span class="tit">提款</span></a></li>
        </ul>

        <input type="button"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="confirm-sub mt30" value="退 出">
        <form id="logout-form" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        <!--<input type="button" onclick="cleardata();" class="confirm-sub mt30" value="清理数据" />-->
    </div>
    <script>
        $(function(){
            @if($_member->is_trans_on == 1)
            $(function () {
                $.ajax({
                    type: 'post',
                    url: "{{route('member.api.wallet_balance')}}",
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data);
                        if (data.statusCode == '01') {
                            var all = Number($('#my_money').text()) + Number(data.data);
                            $('#my_money').text('');
                            $('#my_money').text(parseInt(all.toFixed(2)));
                        }
                    }
                })
            })
            @endif
        })
    </script>
@endsection