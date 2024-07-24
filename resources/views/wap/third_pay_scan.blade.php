@extends('wap.layouts.main')
@section('content')
    <div class="container-fluid gm_main">
        <div class="head">
            <a class="f_l" href="javascript:history.go(-1)"><img src="{{ asset('/wap/images/user_back.png') }}" alt=""></a>
            <span>必发支付</span>
            <a class="f_r" href="javascript:history.go(-1)" style="visibility: hidden"><img src="{{ asset('/wap/images/user_back.png') }}" alt=""></a>
        </div>
        <div class="userInfo wrap" style="padding: 10px;">
            <form id="form1" name="form1" action="{{ route('ajax_pay') }}" method="post" target="_blank">
                {!! csrf_field() !!}
                <table width="100%" border="0" cellpadding="0" cellspacing="1" class="mt10">
                    <tr>
                        <td align="right">类型：</td>
                        <td class="c_blue">
                            <select name="paytype" required>
                                {{--<option value="1">支付宝</option>--}}
                                {{--<option value="2">微信</option>--}}
                                <option value="AliPay">支付宝扫码支付</option>
                                <option value="WechatPay">微信扫码支付</option>
                            </select>
                        </td>
                    </tr>
                    {{--<tr>
                        <td align="right">支付姓名：</td>
                        <td class="c_blue">
                            <input type="text" name="pay_name" value="{{old('pay_name')}}" required>
                        </td>
                    </tr>
                    <tr>
                        <td  colspan="2"><span style="color: red;">支付姓名如果填写的名称与实际支付名称的对应不上，出现问题资金将无法追回</span></td>
                    </tr>--}}
                    <tr>
                        <td align="right">充值金额：</td>
                        <td><input name="amount" min="100" type="number" class="inp" id="v_amount" maxlength="10" required/></td>
                    </tr>
                    <tr>
                        <td  colspan="2"><span style="color: red;">支付时必须足元足角支付(最低支付金额100元)</span></td>
                    </tr>
                </table>
                <button type="submit" class="submit_btn ajax-submit-btn" id="SubTran" style="width: 100%">提交信息</button>
            </form>

            <!--        </div>-->
        </div>
    </div>
@endsection
@section('after.js')
    <script>
        @if(count($errors)>0)

        @foreach($errors->all() as $error)

        //layer.msg("{{$error}}",{icon:5});


        var content = "{{$error}}";
        var css = 'color: #333; background-color: #fff; width: auto';
        layer.open({
            content: content,
            //time: 1.5,
            style: css
        });
        //alert(1);
        @break

        @endforeach

        @endif
    </script>
    {{--@if (session('msg_ok')|| session('msg_no') || $errors->any())
        <script>
            var css = 'color: #333; background-color: #fff; width: auto';
            var content = "{{ session('msg_no') }}";
            layer.open({
                content: content,
                //time: 1.5,
                style: css
            });
        </script>
    @endif--}}
    @endsection