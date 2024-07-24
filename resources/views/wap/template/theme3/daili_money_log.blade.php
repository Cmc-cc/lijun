@extends('wap.template.theme3.layouts.main')
@section('content')
    <link href="{{asset('/wap/theme3/css/pay.css')}}" rel="stylesheet" />
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
                <h3 data-v-76fa910e="" class="title">佣金发放记录</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>
        <div data-v-5e9fb540="" class="addCard view">
            <div class="wrap data_h_money">
                <table cellspacing="1" cellpadding="0" border="0" class="tab1 text-center">
                    <tr class="tic">
                        <td width="33.333%">发放佣金</td>
                        <td width="33.333%">发放时间</td>
                        <td width="33.333%">备注</td>
                    </tr>
                    @if ($data->total() > 0)
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item->money }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->remark }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">暂无发放记录！</td>
                        </tr>
                    @endif
                </table>
                <table border="0" cellpadding="0" cellspacing="0" class="page">
                    {!! $data->render() !!}
                </table>
            </div>
        </div>
        <!---->
    </main>
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
    <script>
        /*biCommon.getBindbank($("#banknode"), $("#card"), $("#bankname"), $("#UserName"), 2);
        biCommon.getWithdrawBankList();*/
    </script>
@endsection