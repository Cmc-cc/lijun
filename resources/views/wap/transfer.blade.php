@extends('wap.layouts.main')
@section('content')
    @include('wap.layouts.header')
    <style>
        .btn{
            border-radius: 3px;
            background-color: #e71516;
            color: white;
            cursor: pointer;
            font-size: 12px;
        }
        .btn-left{
            margin-left: 15px;
        }
    </style>
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                {{--<div class="head">--}}
                {{--<a class="f_l" href="#u_nav"><img src="{{ asset('/wap/images/user_menu.png') }}" alt=""></a>--}}
                {{--<span>额度转换</span>--}}
                {{--<a class="f_r" href="#type"><img src="{{ asset('/wap/images/user_game.png') }}" alt=""></a>--}}
                {{--</div>--}}
                {{--@include('wap.layouts.aside')--}}
                {{--<div id="type" style="display: none">--}}
                {{--<ul class="g_type">--}}
                {{--<li>--}}
                {{--@include('wap.layouts.aside_game_list')--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                <div class="userInfo setCard">
                    <dl>
                        <dt>账户信息</dt>
                        <dd>
                            <div class="pull-left">
                                会员账户
                            </div>
                            <div class="pull-right">
                                {{ $_member->name }}
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">中心账户余额</div>
                            <div class="pull-right">
                                <strong id="center-money">{{ $_member->money }}</strong>元
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">钱包类型</div>
                            <div class="pull-right">

                                @if($_member->is_trans_on == 1)
                                    中心钱包
                                    @else
                                    转账钱包
                                @endif
                                <a id="is_trans_on" money_type="{{$_member->is_trans_on}}">切换</a>
                            </div>
                        </dd>
                        {{--<dd>
                            <div class="pull-left">反水账户余额</div>
                            <div class="pull-right">
                                {{ $_member->fs_money }}元
                            </div>
                        </dd>--}}
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
                                        @if($_member->is_trans_on ==0)
                                        <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                            <input type="hidden" name="api_name" value="AG">
                                            <input type="hidden" name="transfer_type" value="0">
                                            <a class="btn ajax-submit-btn" >一键转入</a>
                                        </form>
                                        @endif
                                        <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                            <input type="hidden" name="api_name" value="AG">
                                            <input type="hidden" name="transfer_type" value="1">
                                            <a class="btn btn-left ajax-submit-btn">一键转出</a>
                                        </form>
                                        <span class="balance_span">{{ $mod?$mod->money:'未开通' }}</span> <a
                                                href="javascript:;" class="api_check"
                                                data-uri="{{ route('member.api.check') }}?api_name=AG"><img
                                                    src="{{ asset('/wap/images/user_refresh.png') }}" alt=""></a>
                                    </div>
                                </dd>
                            @endif
                        @if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0)
                            <?php
                            $mod = '';
                            if (in_array($sunbets->id, $own_api_list)){
                                $mod = $_member->apis()->where('api_id', $sunbets->id)->first();
                            }

                            ?>
                            <dd>
                                <div class="pull-left">SUNBET余额</div>
                                <div class="pull-right">
                                    @if($_member->is_trans_on ==0)
                                        <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                            <input type="hidden" name="api_name" value="SUNBET">
                                            <input type="hidden" name="transfer_type" value="0">
                                            <a class="btn ajax-submit-btn" >一键转入</a>
                                        </form>
                                    @endif
                                    <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                        <input type="hidden" name="api_name" value="SUNBET">
                                        <input type="hidden" name="transfer_type" value="1">
                                        <a class="btn btn-left ajax-submit-btn">一键转出</a>
                                    </form>
                                    <span class="balance_span">{{ $mod?$mod->money:'未开通' }}</span> <a
                                            href="javascript:;" class="api_check"
                                            data-uri="{{ route('member.api.check') }}?api_name=SUNBET"><img
                                                src="{{ asset('/wap/images/user_refresh.png') }}" alt=""></a>
                                </div>
                            </dd>
                        @endif
                        @foreach($api_list as $item)
                            @if($item->api_name=='AGS' || $item->api_name =='SUNBETS')@continue;
                            @endif
                            <?php
                            $mod = '';
                            if (in_array($item->id, $own_api_list))
                                $mod = $_member->apis()->where('api_id', $item->id)->first();
                            ?>
                            <dd>
                                <div class="pull-left">{{ $item->api_title }}余额</div>
                                <div class="pull-right">
                                    @if($_member->is_trans_on ==0)
                                    <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                        <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                        <input type="hidden" name="transfer_type" value="0">
                                    <a class="btn ajax-submit-btn" >一键转入</a>
                                    </form>
                                    @endif
                                    <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                        <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                        <input type="hidden" name="transfer_type" value="1">
                                    <a class="btn btn-left ajax-submit-btn">一键转出</a>
                                    </form>
                                    <span class="balance_span">{{ $mod?$mod->money:'未开通' }}</span> <a
                                            href="javascript:;" class="api_check"
                                            data-uri="{{ route('member.api.check') }}?api_name={{ $item->api_name }}"><img
                                                src="{{ asset('/wap/images/user_refresh.png') }}" alt=""></a>
                                </div>
                            </dd>
                        @endforeach
                    </dl>
                    @if($_member->is_trans_on == 0)
                    <form id="form1" name="form1" class="form-horizontal" action="{{ route('member.post_transfer') }}"
                          method="post">

                        <dl class="set_card">
                            <dt>账户转换</dt>
                            <dd>
                                <div class="pull-left">
                                    游戏账户
                                </div>
                                <input type="hidden" name="account1" value="1">
                                <select name="account2" id="out_account" class="form-control">
                                    <option value="">--请选择--</option>
                                    @if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0)
                                        <option value="{{ $ags->id }}">{{$ag->api_title}}</option>
                                    @endif
                                    @if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0)
                                        <option value="{{ $sunbets->id }}">{{$sunbet->api_title}}</option>
                                    @endif
                                    @foreach($api_list as $item)
                                        @if($item->api_name=='AGS' || $item->api_name =='SUNBETS')
                                            @continue
                                        @endif
                                        <option value="{{ $item->id }}">{{ $item->api_title }}</option>
                                    @endforeach
                                </select>
                            </dd>
                            <dd>
                                <div class="pull-left">
                                    操作
                                </div>
                                <select name="transfer_type" id="in_account" class="form-control">
                                    <option value="0">--转入--</option>
                                    <option value="1">--转出--</option>

                                </select>
                            </dd>
                            <dd>
                                <div class="pull-left">
                                    转账金额
                                </div>
                                <input class="pull-left" type="number" placeholder="最少 5 元" name="money" id="zz_money">
                            </dd>
                            <dd>
                                <input type="button" value="提交" class="submit_btn ajax-submit-btn">
                            </dd>
                        </dl>
                    </form>
                        @endif

                </div>

                {{--<script>--}}
                    {{--$('.api_check').each(function () {--}}
                        {{--var a = $(this);--}}
                        {{--var span = a.parent().find('.balance_span')--}}
                        {{--var url = a.attr('data-uri');--}}
                        {{--$.get(url, function (data) {--}}
                            {{--//data = JSON.parse(data)--}}
                            {{--span.html(data.Data + '元');--}}
                        {{--});--}}
                    {{--})--}}
                {{--</script>--}}
            </div>
        </div>
    </div>
    <script>
        (function ($) {
            var $loading_img="{{asset('/wap/images/loading.gif')}}";
            var $refresh_img="{{asset('/wap/images/user_refresh.png')}}";
            $(function () {

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
                $("#is_trans_on").click(function () {
                    //layer.alert("选择自动转入");
                    var is_trans_on = $("#is_trans_on").attr("money_type");
                    var msg = is_trans_on == 0 ? "确定【开启】免转钱包吗？" : "确认【关闭】免转钱包吗？";

                    //转换
                    if(is_trans_on == 0) {
                        is_trans_on =1;
                    }else if (is_trans_on == 1){
                        is_trans_on =0;
                    }
                    layer.open({
                        content: msg,
                        btn: ['确定', '取消'],
                        yes : function () {
                            var detailLoad=layer.open({type: 2});
                            $.post("{{route('member.post_change_trans')}}", {is_trans_on: is_trans_on}, function (res) {
                                layer.close(detailLoad);
                                layer.open({
                                    content : res.msg,
                                    skin: 'msg',
                                    time: 2 //2秒后自动关闭
                                });
                                window.location.reload();
                            }, 'json');
                        }
                    });


                });

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