@extends('wap.template.theme9.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme9/css/info.css') }}" rel="stylesheet">
    <section id="content">
        <div id="page-title">个人中心</div>
        <section id="financial" class="ng-scope">
            <ul class="list" id="mgmChongZhi">
                <li class="ng-scope">
                    <a href="{{ route('wap.recharge') }}" class="ng-binding">
                        <img src="{{ asset('/wap/theme9/images/externalPayment.png') }}">
                        充值中心
                    </a>
                </li>
                <li class="ng-scope">
                    <a href="{{ route('wap.drawing') }}" class="ng-binding">
                        <img src="{{ asset('/wap/theme9/images/Online_Withdrawal.png') }}">
                        在线提款
                    </a>
                </li>
                <li class="ng-scope">
                    <a href="{{ route('wap.transfer') }}" class="ng-binding">
                        <img src="{{ asset('/wap/theme9/images/pointcard_payment.png') }}">
                        额度转换
                    </a>
                </li>
                <li class="ng-scope">
                    <a href="{{ route('wap.recharge_record') }}" class="ng-binding">
                        <img src="{{ asset('wap/theme9/images/transaction.png') }}">
                        充值记录
                    </a>
                </li>
                <li class="ng-scope">
                    <a href="{{ route('wap.drawing_record') }}" class="ng-binding">
                        <img src="{{ asset('wap/theme9/images/transaction.png') }}">
                        提款记录
                    </a>
                </li>
                <li class="ng-scope">
                    <a href="{{ route('wap.transfer_record') }}" class="ng-binding">
                        <img src="{{ asset('wap/theme9/images/transaction.png') }}">
                        额度转换记录
                    </a>
                </li>
                <li class="ng-scope">
                    <a href="{{ route('wap.game_record') }}" class="ng-binding">
                        <img src="{{ asset('wap/theme9/images/transaction.png') }}">
                        游戏记录
                    </a>
                </li>
                <li class="ng-scope">
                    <a href="{{ route('wap.msg') }}" class="ng-binding">
                        <img src="{{ asset('wap/theme9/images/transaction.png') }}">
                        我的消息
                    </a>
                </li>
                <li class="ng-scope">
                    <a href="{{ route('wap.agent') }}" class="ng-binding">
                        <img src="{{ asset('wap/theme9/images/transaction.png') }}">
                        代理中心
                    </a>
                </li>
                @if($_system_config->is_fs==1)
                <li class="ng-scope">
                    <a href="{{ route('wap.user_fs') }}" class="ng-binding">
                        <img src="{{ asset('wap/theme9/images/pointcard_payment.png') }}">
                        实时返水
                    </a>
                </li>
                @endif
            </ul>
        </section>
        <input type="hidden" id="deposithtml">
    </section>
@endsection
