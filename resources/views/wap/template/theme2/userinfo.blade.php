@extends('wap.template.theme2.layouts.main')
@section('after.css')
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/mmenu.all.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/ssc.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/member.css') }}">
@endsection
@section('before.js')
    <script type="text/javascript" src="{{ asset('/wap/js/mmenu.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/member.js') }}"></script>
@endsection
@section('content')
    <div class="container-fluid gm_main">
        <div class="head">
            <a class="f_l" href="#u_nav"><img src="{{ asset('/wap/images/user_menu.png') }}" alt=""></a>
            <span>会员中心</span>
            <a class="f_r" href="#type"><img src="{{ asset('/wap/images/user_game.png') }}" alt=""></a>
        </div>
        @include('wap.template.theme2.layouts.aside')
        <div id="type" style="display: none">
            <ul class="g_type">
                <li>
                    @include('wap.template.theme2.layouts.aside_game_list')
                </li>
            </ul>
        </div>
        <div class="userInfo">
            <dl>
                <dt>账户安全</dt>
                <dd>
                    <div class="pull-left">
                        会员账户
                    </div>
                    <div class="pull-right">
                        {{ $_member->name }}
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
                    <div class="pull-left">注册时间</div>
                    <div class="pull-right">{{ $_member->created_at }}</div>
                </dd>
                <dd>
                    <div class="pull-left">最后登录时间</div>
                    <div class="pull-right">{{ $_member->last_login_at }}</div>
                </dd>
            </dl>
            <dl>
                <dt>财务信息</dt>
                <dd>
                    <div class="pull-left">中心账户余额</div>
                    <div class="pull-right">
                        <strong id="center-money">{{ $_member->money }}</strong>元
                    </div>
                </dd>
                <?php
                $own_api_list = $_member->apis()->pluck('api_id')->toArray();
                $ag = \App\Models\Api::where('api_name', 'AG')->orderBy('created_at', 'desc')->first();
                $ags =\App\Models\Api::where('api_name', 'AGS')->orderBy('created_at', 'desc')->first();
                $is_ag = $_member->is_ag;


                $sunbet = \App\Models\Api::where('api_name', 'SUNBET')->orderBy('created_at', 'desc')->first();
                $sunbets =\App\Models\Api::where('api_name', 'SUNBETS')->orderBy('created_at', 'desc')->first();
                $is_sunbet = $_member->is_sunbets;
                ?>
                @if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0)
                <?php
                            $mod = '';
                            if (in_array($ags->id, $own_api_list)){
                                $mod = $_member->apis()->where('api_id', $ags->id)->first();
                            }
                    ?>
                <dd>
                    <div class="pull-left">AG余额</div>
                    <div class="pull-right">
                        <span class="balance_span">{{ $mod?$mod->money:'未开通' }}</span> <a href="javascript:;"  class="api_check" data-uri="{{ route('member.api.check') }}?api_name=AG"><img src="{{ asset('/wap/images/user_refresh.png') }}" alt=""></a>
                    </div>
                </dd>
                @endif
                @if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0)
                    <?php
                    $mod = '';
                    if (in_array($sunbets->id, $own_api_list)){
                        $mod = $_member->apis()->where('api_id', $ags->id)->first();
                    }
                    ?>
                    <dd>
                        <div class="pull-left">SUNBET余额</div>
                        <div class="pull-right">
                            <span class="balance_span">{{ $mod?$mod->money:'未开通' }}</span> <a href="javascript:;"  class="api_check" data-uri="{{ route('member.api.check') }}?api_name=SUNBET"><img src="{{ asset('/wap/images/user_refresh.png') }}" alt=""></a>
                        </div>
                    </dd>
                @endif
                @foreach($api_mod as $item)
                    @if($item->api_name=='AGS' || $item->api_name=='SUNBETS')@continue;
                    @endif
                    <?php
                    $mod = '';

                    if (in_array($item->id, $own_api_list))
                        $mod = $_member->apis()->where('api_id', $item->id)->first();
                    ?>
                    <dd>
                        <div class="pull-left">{{ $item->api_name }}余额</div>
                        <div class="pull-right">
                            <span class="balance_span">{{ $mod?$mod->money:'未开通' }}</span> <a href="javascript:;"  class="api_check" data-uri="{{ route('member.api.check') }}?api_name={{ $item->api_name }}"><img src="{{ asset('/wap/images/user_refresh.png') }}" alt=""></a>
                        </div>
                    </dd>
                @endforeach
            </dl>
            <dl>
                <dt>提现信息</dt>
                <dd>
                    <div class="pull-left">开户姓名</div>
                    <div class="pull-right">{{ $_member->bank_username }}</div>
                </dd>
                <dd>
                    <div class="pull-left">提款银行</div>
                    <div class="pull-right">
                        @if ($_member->bank_name)
                            {{ $_member->bank_name }}
                        @else
                            <a href="{{ route('wap.bind_bank') }}" class="c_blue">未设置</a>
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
                {{--<dd>
                    <div class="pull-left">开户银行地址</div>
                    <div class="pull-right">
                        @if ($_member->bank_address)
                            {{ $_member->bank_address }}
                        @else
                            <a href="{{ route('wap.bind_bank') }}" class="c_blue">未设置</a>
                        @endif
                    </div>
                </dd>--}}
            </dl>
        </div>

    </div>

    <script>

        (function ($) {
            @if($_member->is_trans_on ==1)
            $.ajax({
                type:'post',
                url : "{{route('member.api.wallet_balance')}}",
                dataType : 'json',
                success : function (data) {
                    //console.log(data);
                    if(data.statusCode == '01'){
                        var all = Number($('#center-money').text()) + Number(data.data);
                        $('#center-money').text('');
                        $('#center-money').text(parseInt(all.toFixed(2)));
                    }
                }
            })
            @endif
            var $loading_img="{{asset('/wap/images/loading.gif')}}";
            var $refresh_img="{{asset('/wap/images/user_refresh.png')}}";
            $(function () {
                $('.api_check').on('click', function () {
                    var $img = $(this).find('img');
                    var $uri=$(this).attr('data-uri');
                    var $span=$(this).prev('.balance_span');
                    $img.attr('src',$loading_img);
                    $.get($uri, function (data) {
                        //data = JSON.parse(data)
                        $img.attr('src',$refresh_img);
                        $span.html(data.Data + '元');
                    });
                });
            });
        })(jQuery);
    </script>
@endsection