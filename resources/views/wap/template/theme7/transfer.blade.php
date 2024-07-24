@extends('wap.template.theme7.layouts.main')
@section('content')
    <div class="layout-main">
        <div class="member-exchange-module member-exchange-module-index">
            <div class="module-top">

                <div class="top-container navbar-nav">

                    <div class="left-menu">
                        <a href="javascript:;" onclick="window.history.back();">
                            <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                    </div>
                    <div class="page-title">额度转换</div>
                </div>

            </div>
            <div class="module-main diy-scrollbar">
                <div>
                    <div>
                        <div class="main-container container-common">
                            <ul class="list-group">
                                <li class="list-group-item" data-type="" style="height: 60px;">
                                    <div class="col-xs-6 ">
                                        我的钱包
                                        <span class="item-amount from-item-amount-SM item-amount-SM">


                                    </span>
                                        <span class="glyphicon glyphicon-refresh item-refresh-btn-SM item-refresh-btn from-item-refresh-btn txt-important" data-type="SM" style="display: none" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-xs-6 from-area">
                                        <span class="txt-money amount-money-SM from-amount-money-SM UserAmountController money">{{ $_member -> money }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item" data-type="">
                                    <div class="col-xs-6">
                                        当前钱包类型
                                    </div>
                                    <div class="col-xs-3 from-area">
                                        @if($_member->is_trans_on == 1)
                                            中心钱包
                                        @else
                                            转账钱包
                                        @endif
                                    </div>
                                    <div class="col-xs-3 to-area">
                                        <button class="type-list-head btn btn-primary" id="is_trans_on" money_type="{{$_member->is_trans_on}}">点击切换</button>
                                    </div>
                                </li>
                            </ul>
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
                            <form class="transfer-twochoose" style="margin: 0 10px;border: 1px solid #ccc;border-radius: 4px;background: #fff;" action="{{ route('member.post_transfer') }}" method="post">
                                <input type="hidden" name="account1" value="1">
                                <p>
                                    <label>游戏平台：</label>
                                    <select id="limitplace" name="account2">
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
                                </p>
                                <p>
                                    <label>操作类型：</label>
                                    <input type="radio" name="transfer_type" checked="" value="0">转入 &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="transfer_type" value="1">转出
                                </p>
                                <p>
                                    <label>转账金额：</label>
                                    <input style="border: 1px solid rgb(166, 166, 166);border-radius: 5px;margin: 6px;" type="number" name="money"> &nbsp;&nbsp;&nbsp;&nbsp;
                                </p>
                                <p style="text-align: center">
                                    <button style="width: 60%" class="type-list-head btn btn-primary ajax-submit-btn" >提交</button>
                                </p>
                            </form>
                            @endif
                            <table class="transfer-lists clearboth">
                                <tbody id="limitlist">
                                @if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0)
                                    <?php
                                    $mod = '';
                                    if (in_array($ags->id, $own_api_list)){
                                        $mod = $_member->apis()->where('api_id', $ags->id)->first();
                                    }

                                    ?>
                                <tr>
                                    <td>
                                        <span>AG余额</span>
                                        <b class="yue">{{ $mod?$mod->money:'未开通' }}</b>
                                        <img class="api_check" data-uri="{{ route('member.api.check') }}?api_name=AG" src="{{ asset('/wap/theme7/images/freshmoney.svg') }}">
                                        <div class="btntwo" style="margin-right: 5px;">
                                            @if($_member->is_trans_on ==0)
                                                <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                                    <input type="hidden" name="api_name" value="AG">
                                                    <input type="hidden" name="transfer_type" value="0">
                                                    <button style="width: 100%" class="ajax-submit-btn">一键转入</button>
                                                </form>
                                            @endif
                                                <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                                    <input type="hidden" name="api_name" value="AG">
                                                    <input type="hidden" name="transfer_type" value="1">
                                                    <button style="width: 100%" class="ajax-submit-btn">一键转出</button>
                                                </form>
                                        </div>
                                    </td>
                                </tr>
                                @endif

                                @if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0)
                                    <?php
                                    $mod = '';
                                    if (in_array($sunbets->id, $own_api_list)){
                                        $mod = $_member->apis()->where('api_id', $sunbets->id)->first();
                                    }

                                    ?>
                                    <tr>
                                        <td>
                                            <span>SUNBET余额</span>
                                            <b class="yue">{{ $mod?$mod->money:'未开通' }}</b>
                                            <img class="api_check" data-uri="{{ route('member.api.check') }}?api_name=SUNBET" src="{{ asset('/wap/theme7/images/freshmoney.svg') }}">
                                            <div class="btntwo" style="margin-right: 5px;">
                                                @if($_member->is_trans_on ==0)
                                                    <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                                        <input type="hidden" name="api_name" value="SUNBET">
                                                        <input type="hidden" name="transfer_type" value="0">
                                                        <button style="width: 100%" class="ajax-submit-btn">一键转入</button>
                                                    </form>
                                                @endif
                                                <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                                    <input type="hidden" name="api_name" value="SUNBET">
                                                    <input type="hidden" name="transfer_type" value="1">
                                                    <button style="width: 100%" class="ajax-submit-btn">一键转出</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @foreach($api_list as $item)
                                        @if($item->api_name=='AGS' || $item->api_name == 'SUNBETS')@continue;
                                        @endif
                                        <?php
                                        $mod = '';
                                        if (in_array($item->id, $own_api_list))
                                            $mod = $_member->apis()->where('api_id', $item->id)->first();
                                        ?>
                                        <tr>
                                    <td>
                                        <span>{{ $item->api_name }}余额</span>
                                        <b class="yue">{{ $mod?$mod->money:'未开通' }}</b>
                                        <img class="api_check" data-uri="{{ route('member.api.check') }}?api_name={{ $item->api_name }}" src="{{ asset('/wap/theme7/images/freshmoney.svg') }}">
                                        <div class="btntwo" style="margin-right: 5px;">
                                            @if($_member->is_trans_on ==0)
                                                <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                                    <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                                    <input type="hidden" name="transfer_type" value="0">
                                                    <button style="width: 100%" class="ajax-submit-btn">一键转入</button>
                                                </form>
                                            @endif
                                            <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                                <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                                <input type="hidden" name="transfer_type" value="1">
                                                <button style="width: 100%" class="ajax-submit-btn">一键转出</button>
                                            </form>
                                        </div>
                                    </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="module-bottom">
                <div class="toolbar common-container">
                    <div class="col-xs-1">
                        <span aria-hidden="true" class="fa fa-cny icon"></span>
                    </div>
                    <div class="col-xs-7">
                        <input type="number" class="exchange-amount form-control" min="1" placeholder="请输入转换金额"
                               id="amount">
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-primary exchange-btn" onclick="gameTransfer();" id="zhuanru">转换</button>
                    </div>
                </div>
            </div>
            <div class="mask" style="display: none;">
                <div>
                    <div class="loader"></div>
                </div>
            </div>--}}
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