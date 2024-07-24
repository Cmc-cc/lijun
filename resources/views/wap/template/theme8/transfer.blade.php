@extends('wap.template.theme8.layouts.main')
@section('content')
    <header class="mui-bar mui-bar-nav mui-action-back">
        <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
        <h1 class="mui-title">
            额度转换
        </h1>
    </header>
    <div class="mui-content withdraw-content mui-slider-item mui-control-content mui-active" style="margin:0;padding-top: 44px;">
        <div class="asset_transfer_page">
            <div class="total_asset_info">
                <div class="total_money_num">
                    <span>用户名</span>
                    <i class="UserAmountController">{{ $_member -> name }}</i>
                </div>
                <div class="wallet_balance_num  wallet_ballance_data">
                    <span>钱包余额</span>
                    <i class="UserAmountController money">{{ $_member -> money }}</i>
                </div>
            </div>
            <p class="withdraw-title mui-clearfix">

                当前钱包类型:
                @if($_member->is_trans_on == 1)
                    中心钱包
                @else
                    转账钱包
                @endif
                <button type="button" id="is_trans_on" money_type="{{$_member->is_trans_on}}" style="color: #fff;padding: 5px;" class="mui-btn mui-btn-primary mui-btn-outlined">点击切换</button>
            </p>
            <?php
            $own_api_list = $_member->apis()->pluck('api_id')->toArray();
            $ag = \App\Models\Api::where('api_name', 'AG')->orderBy('created_at', 'desc')->first();
            $ags =\App\Models\Api::where('api_name', 'AGS')->orderBy('created_at', 'desc')->first();
            $is_ag = $_member->is_ag;

            $sunbet = \App\Models\Api::where('api_name', 'SUNBET')->orderBy('created_at', 'desc')->first();
            $sunbets =\App\Models\Api::where('api_name', 'SUNBETS')->orderBy('created_at', 'desc')->first();
            $is_sunbet = $_member->is_sunbets;


            //apiid转数组
            $api_id_to_title = \App\Models\Api::where('on_line', 0)->orderBy('created_at', 'desc')->pluck('api_title', 'id')->toArray();

            ?>
            @if($_member->is_trans_on == 0)
                <form class="mui-input-group" name="form1" action="{{ route('member.post_transfer') }}" method="post">
                    <input type="hidden" name="account1" value="1">
                    <div class="mui-input-row">
                        <label>游戏平台</label>
                        <select name="account2">
                            <option value="">--请选择--</option>
                            @if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0)
                                <option value="{{ $ags->id }}">AG</option>
                            @endif
                            @if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0)
                                <option value="{{ $sunbets->id }}">SUNBET</option>
                            @endif
                            @foreach($_api_list as $k => $v)
                                @if($v=='AGS' || $v =='SUNBETS')
                                    @continue
                                @endif
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mui-input-row">
                        <label>操作</label>
                        <select name="transfer_type">
                            <option value="0">转入</option>
                            <option value="1">转出</option>
                        </select>
                    </div>
                    <div class="mui-input-row">
                        <label>金额</label>
                        <input name="money" type="text" class="mui-input-clear" placeholder="输入转账金额">
                    </div>
                    <div class="mui-button-row">
                        <button style="width: 80%" type="button" class="mui-btn mui-btn-primary ajax-submit-btn" >提交</button>
                    </div>
                </form>
            @endif
            <div class="all_items">
                <div class="each_line" id="limitplace">
                    @if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0)
                        <?php
                        $mod = '';
                        if (in_array($ags->id, $own_api_list)){
                            $mod = $_member->apis()->where('api_id', $ags->id)->first();
                        }

                        ?>
                    <div class="each_item">
                        <div class="item_name">
                            <span>AG余额</span>
                            <b class="item_num yue">{{ $mod?$mod->money:'未开通' }}</b>
                            <i class="api_check" data-uri="{{ route('member.api.check') }}?api_name=AG"></i>
                        </div>
                        <div class="item_name">
                        @if($_member->is_trans_on ==0)
                            <form action="{{ route('member.one_transfer') }}" method="post" >
                                <input type="hidden" name="api_name" value="AG">
                                <input type="hidden" name="transfer_type" value="0">
                                <button class="ajax-submit-btn" style="background: #1b75d9;margin-top: 0px;">一键转入</button>
                            </form>
                        @endif
                        <form action="{{ route('member.one_transfer') }}" method="post">
                            <input type="hidden" name="api_name" value="AG">
                            <input type="hidden" name="transfer_type" value="1">
                            <button class="ajax-submit-btn">一键转出</button>
                        </form>
                        </div>
                    </div>
                        @endif

                        @if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0)
                            <?php
                            $mod = '';
                            if (in_array($sunbets->id, $own_api_list)){
                                $mod = $_member->apis()->where('api_id', $sunbets->id)->first();
                            }

                            ?>
                        <div class="each_item">
                            <div class="item_name">
                                <span>SUNBET余额</span>
                                <b class="item_num yue">{{ $mod?$mod->money:'未开通' }}</b>
                                <i class="api_check" data-uri="{{ route('member.api.check') }}?api_name=SUNBET"></i>
                            </div>
                            <div class="item_name">
                                @if($_member->is_trans_on ==0)
                                    <form action="{{ route('member.one_transfer') }}" method="post" >
                                        <input type="hidden" name="api_name" value="SUNBET">
                                        <input type="hidden" name="transfer_type" value="0">
                                        <button class="ajax-submit-btn" style="background: #1b75d9;margin-top: 0px;">一键转入</button>
                                    </form>
                                @endif
                                <form action="{{ route('member.one_transfer') }}" method="post">
                                    <input type="hidden" name="api_name" value="SUNBET">
                                    <input type="hidden" name="transfer_type" value="1">
                                    <button class="ajax-submit-btn">一键转出</button>
                                </form>
                            </div>
                        </div>
                            @endif
                        @foreach($api_list as $item)
                            @if($item->api_name=='AGS' || $item->api_name == 'SUNBETS')@continue;
                            @endif
                            <?php
                            $mod = '';
                            if (in_array($item->id, $own_api_list))
                                $mod = $_member->apis()->where('api_id', $item->id)->first();
                            ?>
                        <div class="each_item">
                            <div class="item_name">
                                <span>{{ $item->api_name }}余额</span>
                                <b class="item_num yue">{{ $mod?$mod->money:'未开通' }}</b>
                                <i class="api_check" data-uri="{{ route('member.api.check') }}?api_name={{ $item->api_name }}"></i>
                            </div>
                            <div class="item_name">
                                @if($_member->is_trans_on ==0)
                                    <form action="{{ route('member.one_transfer') }}" method="post" >
                                        <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                        <input type="hidden" name="transfer_type" value="0">
                                        <button class="ajax-submit-btn" style="background: #1b75d9;margin-top: 0px;">一键转入</button>
                                    </form>
                                @endif
                                <form action="{{ route('member.one_transfer') }}" method="post">
                                    <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                    <input type="hidden" name="transfer_type" value="1">
                                    <button class="ajax-submit-btn">一键转出</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                </div>
                <div class="no_more_content" style="margin-top: 20px;">
                    <i class="refresh_icon"></i>
                    <span>没有更多内容</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            @if($_member->is_trans_on == 1)
            $.ajax({
                type: 'post',
                url: "{{route('member.api.wallet_balance')}}",
                dataType: 'json',
                success: function (data) {
                    //console.log(data);
                    if (data.statusCode == '01') {
                        var all = Number($('.money').text()) + Number(data.data);
                        $('.money').text('');
                        $('.money').text(parseInt(all.toFixed(2)));
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

            //查询余额
            $('.api_check').on('click', function () {

                //$(obj).addClass("add");
                $(this).addClass('add');
                // var $img = $(this).find('img');
                var $uri=$(this).attr('data-uri');
                var $span=$(this).prev('.yue');
                //$img.attr('src',$loading_img);
                var that = $(this);
                $.get($uri, function (data) {
                    //data = JSON.parse(data)
                    //$img.attr('src',$refresh_img);
                    that.removeClass('add');
                    $span.html(data.Data + '元');
                });
            });
        })
    </script>

@endsection