@extends('wap.template.theme6.layouts.main')
@section('content')
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">在线转账</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content withdraw-content clearboth">
        <p class="withdraw-title mui-clearfix">
            <span>用户名：<em>{{ $_member -> name }}</em></span>
            <span>余额：<em class="UserAmountController money">{{ $_member -> money }}</em></span>
        </p>
        <p data-v-4a8f0578="" relative="" class="quota-top" style="font-size: 16px;padding: 5px;">
            当前钱包类型:
            <span>
                @if($_member->is_trans_on == 1)
                    中心钱包
                @else
                    转账钱包
                @endif
                        <a class="mybtn" style="color:white;text-decoration: none;background: #e71516;border-radius: 5px;padding: 8px;font-size: 10px;" id="is_trans_on" money_type="{{$_member->is_trans_on}}">点击切换</a>

            </span>
        </p>
        {{--<div class="transfer-btnall clearboth" style="width: 100%;height: 44px;">
            <input type="button" warning="正在转出..." onclick="getPlateAllMoney(this)" show="一键刷新" value="一键刷新"
                   id="yijianrefsh">
            <input type="button" warning="正在转出..." onclick="yijianzhuanchu(this)" show="一键转出" value="一键转出">
        </div>--}}
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
            <form id="form1" name="form1" class="form-horizontal" action="{{ route('member.post_transfer') }}"
                  method="post">
                <input type="hidden" name="account1" value="1">
            <div class="transfer-twozhuan">
                <div class="deposit-shuru">
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
                </div>
                <div class="deposit-shuru">
                    <label>操作：</label>
                    <select id="operation" name="transfer_type">
                        <option value="0">转入</option>
                        <option value="1">转出</option>
                    </select>
                </div>
                <div class="deposit-shuru">
                    <label>金额：</label>
                    <input type="number" name="money" id="amount" maxlength="50" placeholder="输入转账金额">
                </div>
            </div>
            <button class="mui-btn surebtn ajax-submit-btn"  data-loading-icon="" id="zhuanru"
                    data-loading-text="正在转账..." show="提 交">提交
            </button>
            </form>
        @endif
        <ul class="mui-table-view transfer-list clearboth">
            <li class="mui-table-view-cell mui-collapse mui-active">
                <a class="mui-navigate-right" href="#">查看其他游戏平台余额</a>
                <div class="mui-collapse-content transfer-list" id="limitlist">
                    @if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0)
                        <?php
                        $mod = '';
                        if (in_array($ags->id, $own_api_list)){
                            $mod = $_member->apis()->where('api_id', $ags->id)->first();
                        }

                        ?>
                    <div>
                        <span>AG余额</span>
                        <span>
                            <em class="yue">{{ $mod?$mod->money:'未开通' }}</em>
                            <i class="mui-icon mui-icon-loop api_check" data-uri="{{ route('member.api.check') }}?api_name=ag"></i>
                        </span>
                        <div style="float: right;width: 50%;border: none">
                            @if($_member->is_trans_on ==0)
                                <form action="{{ route('member.one_transfer') }}" method="post" >
                                    <input type="hidden" name="api_name" value="AG">
                                    <input type="hidden" name="transfer_type" value="0">
                                    <button  class="mui-btn mui-btn-danger ajax-submit-btn" data-loading-icon=""> 一键转入
                                    </button>
                                </form>
                            @endif
                                <form action="{{ route('member.one_transfer') }}" method="post">
                                    <input type="hidden" name="api_name" value="AG">
                                    <input type="hidden" name="transfer_type" value="1">
                                    <button style="margin-right: 10px;" class="mui-btn mui-btn-danger ajax-submit-btn" data-loading-icon=""> 一键转出
                                    </button>
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
                        <div>
                            <span>SUNBET余额</span>
                            <span>
                            <em class="yue">{{ $mod?$mod->money:'未开通' }}</em>
                            <i class="mui-icon mui-icon-loop api_check" data-uri="{{ route('member.api.check') }}?api_name=SUNBET"></i>
                        </span>
                            <div style="float: right;width: 50%;border: none">
                                @if($_member->is_trans_on ==0)
                                    <form action="{{ route('member.one_transfer') }}" method="post" >
                                        <input type="hidden" name="api_name" value="SUNBET">
                                        <input type="hidden" name="transfer_type" value="0">
                                        <button  class="mui-btn mui-btn-danger ajax-submit-btn" data-loading-icon=""> 一键转入
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('member.one_transfer') }}" method="post">
                                    <input type="hidden" name="api_name" value="SUNBET">
                                    <input type="hidden" name="transfer_type" value="1">
                                    <button style="margin-right: 10px;" class="mui-btn mui-btn-danger ajax-submit-btn" data-loading-icon=""> 一键转出
                                    </button>
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
                        <div>
                            <span>{{ $item->api_name }}余额</span>
                            <span>
                            <em class="yue">{{ $mod?$mod->money:'未开通' }}</em>
                            <i class="mui-icon mui-icon-loop api_check" data-uri="{{ route('member.api.check') }}?api_name={{ $item->api_name }}"></i>
                        </span>
                            <div style="float: right;width: 50%;border: none">
                                @if($_member->is_trans_on ==0)
                                    <form action="{{ route('member.one_transfer') }}" method="post" >
                                        <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                        <input type="hidden" name="transfer_type" value="0">
                                        <button  class="mui-btn mui-btn-danger ajax-submit-btn" data-loading-icon=""> 一键转入
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('member.one_transfer') }}" method="post">
                                    <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                    <input type="hidden" name="transfer_type" value="1">
                                    <button style="margin-right: 10px;" class="mui-btn mui-btn-danger ajax-submit-btn" data-loading-icon=""> 一键转出
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                </div>
            </li>
        </ul>
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