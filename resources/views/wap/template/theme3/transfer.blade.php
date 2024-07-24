@extends('wap.template.theme3.layouts.main')
@section('content')
    <main class="panel slideout-panel slideout-panel-left">
        <!---->
        <div data-v-76fa910e="" class="navbar-container" style="">
            <div data-v-76fa910e="" middle="" class="logo-container"></div>
            <div data-v-76fa910e="" middle="" class="menu-container" onclick="self.location=document.referrer;">
                <div data-v-76fa910e="" relative="" style="">
                    <img data-v-76fa910e="" middle="" src="{{ asset('/wap/theme3/images/main/goback.png') }}" alt="" style="">
                </div>
            </div>
            <div data-v-76fa910e="" class="title">
                <h3 data-v-76fa910e="" class="title">转换额度</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>
        <div data-v-4a8f0578="" class="quota view">
            <div data-v-4a8f0578="" class="scroll" style="padding-bottom: 60px">

                <p data-v-4a8f0578="" relative="" class="quota-top">
                    会员账户:
                    <span>{{ $_member -> name }}</span>
                </p>
                <p data-v-4a8f0578="" relative="" class="quota-top">
                    中心账户余额:
                    <span id="center-money">{{ $_member -> money }}</span>元
                </p>

                <p data-v-4a8f0578="" relative="" class="quota-top">
                    当前钱包类型:
                    <span>
                        @if($_member->is_trans_on == 1)
                            中心钱包
                        @else
                            转账钱包
                        @endif
                        <a class="mybtn" style="text-decoration: none;background-color: rgb(0,0,0);" id="is_trans_on" money_type="{{$_member->is_trans_on}}">点击切换</a>

                    </span>
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
                    <form id="form1" name="form1" class="form-horizontal" action="{{ route('member.post_transfer') }}"
                          method="post">
                        <input type="hidden" name="account1" value="1">
                <div data-v-4a8f0578="" class="trans-to">
                    <span data-v-4a8f0578="" class="trans-to-text">转入平台</span>
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
                <div data-v-4a8f0578="" class="trans-to">
                    <span data-v-4a8f0578="" class="trans-to-text">操作</span>
                    <select id="operation" name="transfer_type">
                        <option value="0">转入</option>
                        <option value="1">转出</option>
                    </select>
                </div>
                <div data-v-4a8f0578="" class="trans-value">
                    <span data-v-4a8f0578="" class="trans-value-text">选择转账金额</span>
                    <div data-v-4a8f0578="" relative="" class="select-value">
                        <div data-v-4a8f0578="" class="md-input-item is-clear is-ios left normal">
                            <div class="md-input-item-container">
                                <!---->
                                <!---->
                                <div class="md-input-item-control">
                                    <input name="money" id="amount" maxlength="15" placeholder="转换金额不能小于1元" autocomplete="off" type="tel" class="md-input-item-input">
                                    <!---->
                                    <div class="md-input-item-clear" style="display: none;">
                                        <svg class="md-icon md-icon-circle-cross md">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#circle-cross"></use>
                                        </svg>
                                    </div>
                                    <!---->
                                </div>
                            </div>
                            <!---->
                            <!---->
                        </div>
                    </div>
                </div>
                <div data-v-4a8f0578="" class="buttons">
                    <a data-v-4a8f0578="" id="zhuanru"  type="button" class="md-button commit primary large ajax-submit-btn">
                        <div class="md-button-inner"><!----> 提交</div>
                    </a>
                </div>
                    </form>
                {{--<div data-v-4a8f0578="" clearfix="" class="buttonList" style="margin-top: 0.266667rem;">

                    <button data-v-4a8f0578="" onclick="yijianzhuanchu(this)" class="button-item button-item-money van-button van-button--default van-button--normal ml3">
                    <span class="button-inout">
                        <span data-v-4a8f0578="" class="button-text" style="color: rgb(0, 0, 0); font-size: 0.426667rem;">一键转出</span>
                    </span>
                    </button>
                    <button data-v-4a8f0578="" onclick="getPlateAllMoney(this)" id="yijianrefsh" class="button-item button-item-money van-button van-button--default van-button--normal ml3" value="">
                    <span class="button-inout">
                        <span data-v-4a8f0578="" class="button-text" style="color: rgb(0, 0, 0); font-size: 0.426667rem;">一键刷新</span>
                    </span>
                    </button>
                </div>--}}
                @endif
                <div data-v-4a8f0578="" clearfix="" class="divLimitList" id="limitlist">
                    @if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0)
                        <?php
                        $mod = '';
                        if (in_array($ags->id, $own_api_list)){
                            $mod = $_member->apis()->where('api_id', $ags->id)->first();
                        }

                        ?>
                    <div data-v-4a8f0578=""  class="limit-item ml3">
                        <span class="van-button__text">
                            <span data-v-4a8f0578="" class="button-text">AG余额</span>
                            <span data-v-4a8f0578="" class="button-value yue">{{ $mod?$mod->money:'未开通' }}</span>
                            <span data-v-4a8f0578="" class="button-value">
{{--                                <img src="{{ asset('/wap/theme3/images/main/refresh.png') }}" onclick="chaxun('AG',this)">--}}
                                <img class="api_check" data-uri="{{ route('member.api.check') }}?api_name=AG"  src="{{ asset('/wap/theme3/images/main/refresh.png') }}">
                            </span>
                        </span>
                        <span class="van-button__button">
                            @if($_member->is_trans_on ==0)
                                <form  action="{{ route('member.one_transfer') }}" method="post">
                                    <input type="hidden" name="api_name" value="AG">
                                    <input type="hidden" name="transfer_type" value="0">
{{--                                    <i onclick="yijianinout('AG',this,'in')" class="in-quot">一键转入</i>--}}
                                    <i  class="in-quot ajax-submit-btn">一键转入</i>
                                </form>
                            @endif
                            <form  action="{{ route('member.one_transfer') }}" method="post">
                                <input type="hidden" name="api_name" value="AG">
                                <input type="hidden" name="transfer_type" value="1">
{{--                                <i onclick="yijianinout('AG',this,'out')" class="out-quot">一键转出</i>--}}
                                <i class="out-quot ajax-submit-btn">一键转出</i>
                            </form>
                        </span>
                    </div>
                    @endif

                        @if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0)
                            <?php
                            $mod = '';
                            if (in_array($sunbets->id, $own_api_list)){
                                $mod = $_member->apis()->where('api_id', $sunbets->id)->first();
                            }

                            ?>
                            <div data-v-4a8f0578=""  class="limit-item ml3">
                        <span class="van-button__text">
                            <span data-v-4a8f0578="" class="button-text">SUNBET余额</span>
                            <span data-v-4a8f0578="" class="button-value yue">{{ $mod?$mod->money:'未开通' }}</span>
                            <span data-v-4a8f0578="" class="button-value">
{{--                                <img src="{{ asset('/wap/theme3/images/main/refresh.png') }}" onclick="chaxun('AG',this)">--}}
                                <img class="api_check" data-uri="{{ route('member.api.check') }}?api_name=SUNBET"  src="{{ asset('/wap/theme3/images/main/refresh.png') }}">
                            </span>
                        </span>
                                <span class="van-button__button">
                            @if($_member->is_trans_on ==0)
                                        <form  action="{{ route('member.one_transfer') }}" method="post">
                                    <input type="hidden" name="api_name" value="SUNBET">
                                    <input type="hidden" name="transfer_type" value="0">
{{--                                    <i onclick="yijianinout('AG',this,'in')" class="in-quot">一键转入</i>--}}
                                    <i  class="in-quot ajax-submit-btn">一键转入</i>
                                </form>
                            @endif
                            <form  action="{{ route('member.one_transfer') }}" method="post">
                                <input type="hidden" name="api_name" value="SUNBET">
                                <input type="hidden" name="transfer_type" value="1">
{{--                                <i onclick="yijianinout('AG',this,'out')" class="out-quot">一键转出</i>--}}
                                <i class="out-quot ajax-submit-btn">一键转出</i>
                            </form>
                        </span>
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
                    <div data-v-4a8f0578="" platform="AG" class="limit-item ml3">
                        <span class="van-button__text">
                            <span data-v-4a8f0578="" class="button-text">{{ $item->api_name }}余额</span>
                            <span data-v-4a8f0578="" class="button-value yue">{{ $mod?$mod->money:'未开通' }}</span>
                            <span data-v-4a8f0578="" class="button-value">
{{--                                <img src="{{ asset('/wap/theme3/images/main/refresh.png') }}" onclick="chaxun('AG',this)">--}}
                                <img class="api_check" data-uri="{{ route('member.api.check') }}?api_name={{ $item->api_name }}"  src="{{ asset('/wap/theme3/images/main/refresh.png') }}">
                            </span>
                        </span>
                        <span class="van-button__button">
                            @if($_member->is_trans_on ==0)
                                <form  action="{{ route('member.one_transfer') }}" method="post">
                                    <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                    <input type="hidden" name="transfer_type" value="0">
{{--                                    <i onclick="yijianinout('AG',this,'in')" class="in-quot">一键转入</i>--}}
                                    <i  class="in-quot ajax-submit-btn">一键转入</i>
                                </form>
                            @endif
                            <form  action="{{ route('member.one_transfer') }}" method="post">
                                <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                <input type="hidden" name="transfer_type" value="1">
{{--                                <i onclick="yijianinout('AG',this,'out')" class="out-quot">一键转出</i>--}}
                                <i class="out-quot ajax-submit-btn">一键转出</i>
                            </form>
                        </span>
                    </div>
                        @endforeach
                </div>

            </div>
        </div>
    </main>
    <script>
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

            //查询余额
            $('.api_check').on('click', function () {

                //$(obj).addClass("add");
                $(this).addClass('add');
               // var $img = $(this).find('img');
                var $uri=$(this).attr('data-uri');
                var $span=$(this).parent().prev('.yue');
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