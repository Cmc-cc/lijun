@extends('wap.template.theme7.layouts.main')
@section('content')
    <style>
        .url-list a dd img {
            float: right;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('/wap/theme3/css/pay.css') }}">
    <div class="member-money-module member-money-module-index">
        <div class="module-top">
            <div class="top-container navbar-nav">
                <div class="left-menu">
                    <a href="javascript:;" onclick="window.location.href='{{ route('wap.index') }}'">
                        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                </div>
                <div class="page-title">代理中心</div>
            </div>

        </div>
        <div class="module-main diy-scrollbar">
            <div class="userInfo dy_center" style="padding-top: 0px;background: #fff;">
                <dl class="dy_center_info">
                    <dt>
                        会员账户
                    </dt>
                    <dd>
                        <div class="pull-left">
                            推广域名
                        </div>
                        <div class="@if($_member -> is_daili == 1) pull-left @else pull-right @endif">
                            @if ($_member->is_daili == 1)
                                <span id="url">@if($_member->agent_uri)
                                        {{ $_member->agent_uri }}
                                    @else
                                        {{ route('web.register_one').'?i='.$_member->invite_code }}
                                    @endif</span>
                                <span class="btn" onclick="tapCopy('url')" data-clipboard-target="#url" style="color: #e4393c;padding-right: 0">复制</span>
                            @else
                                <?php
                                $apply = '';
                                if (count($_member->daili_apply) > 0)
                                    $apply = $_member->daili_apply()->orderBy('created_at', 'desc')->first();
                                ?>
                                @if ($apply && $apply->status == 0)
                                    <span style="color: red;">您的代理资格审批中</span>
                                @elseif($apply && $apply->status == 2)
                                    <span style="color: red;">申请失败</span>
                                    <a href="{{ route('wap.agent_apply') }}"  style="width: 120%;font-size: 10px;background: linear-gradient(rgb(76,145,110),rgb(0,50,0))" class="submit_btn text-center">重新申请</a>
                                @elseif($apply && $apply->status == 1)
                                    <span id="url1">{{ route('web.register_one').'?i_code='.$item->invite_code }}</span>
                                    <span class="btn" onclick="copyArticle1()" data-clipboard-target="#url" style="color: #e4393c;padding-right: 0">复制</span>
                                @else
                                    <span style="color: red;">您还不是代理</span>
                                    <a href="{{ route('wap.agent_apply') }}" style="background: linear-gradient(rgb(76,145,110),rgb(0,50,0))" class="submit_btn text-center">立即申请</a>
                        @endif
                        @endif
                    </dd>
                    <dd>
                        <div class="pull-left">
                            真实姓名
                        </div>
                        <div class="pull-right">
                            {{ $_member->real_name }}
                        </div>
                    </dd>
                    <dd>
                        <div class="pull-left">
                            QQ
                        </div>
                        <div class="pull-right">
                            {{ $_member->qq }}
                        </div>
                    </dd>
                    <dd>
                        <div class="pull-left">手机号码</div>
                        <div class="pull-right">
                            @if ($_member->phone)
                                {{ $_member->phone }}
                            @else
                                <a href="{{ route('wap.set_phone') }}" class="c_blue">未设置</a>
                            @endif
                        </div>
                    </dd>
                    <dd>
                        <div class="pull-left">银行账户</div>
                        <div class="pull-right">
                            @if ($_member->bank_card)
                                {{ $_member->bank_card }}
                            @else
                                <a href="{{ route('wap.bind_bank') }}" class="c_blue">未设置</a>
                            @endif
                        </div>
                    </dd>
                </dl>
                <dl style="margin-top: 10px">
                    <a href="{{ route('wap.daili_money_log') }}" class="clear">
                        <dd>
                            <div class="pull-left">
                                佣金发放记录
                            </div>
                            <div class="pull-right">
                                <img style="margin-top: 10px;" src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16" class="fr arrow-r">
                            </div>
                        </dd>
                    </a>
                </dl>
                <dl style="margin-top: 10px">
                    <a href="{{ route('wap.member_offline_sy') }}" class="clear">
                        <dd>
                            <div class="pull-left">
                                会员输赢报表
                            </div>
                            <div class="pull-right">
                                <img style="margin-top: 10px;" src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16" class="fr arrow-r">
                            </div>
                        </dd>
                    </a>
                </dl>
                <dl style="margin-top: 10px">
                    <a href="{{ route('wap.member_offline') }}" class="clear">
                        <dd>
                            <div class="pull-left">
                                下线会员
                            </div>
                            <div class="pull-right">
                                <img  src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16" class="fr arrow-r">
                            </div>
                        </dd>
                    </a>
                </dl>
                <dl>
                    <a href="{{ route('wap.member_offline_recharge') }}" class="clear">
                        <dd>

                            <div class="pull-left">
                                下线会员存款记录
                            </div>
                            <div class="pull-right">
                                <img  src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16" class="fr arrow-r">
                            </div>
                        </dd>
                    </a>
                </dl>
                <dl>
                    <a href="{{ route('wap.member_offline_drawing') }}" class="clear">
                        <dd>
                            <div class="pull-left">
                                下线会员提款记录
                            </div>
                            <div class="pull-right">
                                <img style="margin-top: 10px;" src="{{ asset('/wap/theme4/images/arrow-r.png') }}" width="9" height="16" class="fr arrow-r">
                            </div>
                        </dd>
                    </a>
                </dl>
            </div>
        </div>
    </div>
@endsection