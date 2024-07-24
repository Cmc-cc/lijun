@extends('wap.template.theme5.layouts.main')
@section('content')
    <div class="layout mt12 clearboth">
        <div class="hd-tit">
            <h3>平台转账</h3>
        </div>
        <ul class="mod-f-l mt10" id="gplist"></ul>
        {{--<div class="transfer-btnall clearboth" style="width: 100%;height: 44px;">
            <input type="button" warning="正在转出..." onclick="getPlateAllMoney(this)" show="一键刷新" value="一键刷新"
                   id="yijianrefsh">
            <input type="button" warning="正在转出..." onclick="yijianzhuanchu(this)" show="一键转出" value="一键转出">
        </div>--}}
        {{--<ul class="mod-f-l mt12">
            <li>
                <a href="javascript:void(0);" id="selectout" onclick="selectout_in(0)">
                    <img src="/Areas/Wap1/Content/images/main/arrow-r.png" width="9" height="16" class="fr arrow-r">
                    <span class="fr f14px c6 mr10" id="gamePlatform" platform="" num="" type="">请选择</span>
                    <span class="tit">游戏平台</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" id="selectin" onclick="selectout_in(1)"><img
                            src="/Areas/Wap1/Content/images/main/arrow-r.png" width="9" height="16"
                            class="fr arrow-r"><span class="fr f14px c6 mr10" id="operation" type="">请选择</span><span
                            class="tit">操作</span></a>
            </li>
        </ul>--}}
        <p data-v-4a8f0578="" relative="" class="quota-top" style="font-size: 16px;padding: 5px;color: #ccc">
            当前钱包类型:
            <span>
                        @if($_member->is_trans_on == 1)
                    中心钱包
                @else
                    转账钱包
                @endif
                        <a class="mybtn" style="color:white;text-decoration: none;background: #007aff;border-radius: 5px;padding: 5px;font-size: 10px;" id="is_trans_on" money_type="{{$_member->is_trans_on}}">点击切换</a>

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
        <ul class="mod-forms mt12">
            <li class="form-item-2">
                <label>游戏平台</label>
                <div class="form-ipt">
                    <select class="txt-ipt" name="account2">
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
            </li>
            <li class="form-item-2">
                <label>操作</label>
                <div class="form-ipt">
                    <select class="txt-ipt" name="transfer_type">
                        <option value="0">转入</option>
                        <option value="1">转出</option>
                    </select>
                </div>
            </li>
            <li class="form-item-2">
                <label>金额</label>
                <div class="form-ipt">
                    <input type="number" name="money" id="amount" maxlength="50" class="txt-ipt" placeholder="输入转账金额">
                </div>
            </li>
        </ul>
        <input type="button"  class="confirm-sub mt20 ajax-submit-btn" value="提 交" id="zhuanru"
               warning="正在转账..." show="提 交">
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
                <tr platform="AG">
                    <td>
                        <span>AG余额</span>
                        <b class="yue">{{ $mod?$mod->money:'未开通' }}</b>
                        <img class="api_check" src="{{ asset('/wap/theme4/images/freshmoney.svg') }}" data-uri="{{ route('member.api.check') }}?api_name=AG">
                        <div class="btntwo">
                            @if($_member->is_trans_on ==0)
                                <form action="{{ route('member.one_transfer') }}" method="post" style="display: inline-block;margin: 0px;padding: 0px">
                                    <input type="hidden" name="api_name" value="AG">
                                    <input type="hidden" name="transfer_type" value="0">
                                    <button style="width: auto;padding: 5px" class="ajax-submit-btn">一键转入</button>
                                </form>
                            @endif
                            <form action="{{ route('member.one_transfer') }}" method="post" style="display: inline-block">
                                <input type="hidden" name="api_name" value="AG">
                                <input type="hidden" name="transfer_type" value="1">
                                <button style="width: auto;padding: 5px" class="ajax-submit-btn">一键转出</button>
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
                <tr platform="sunbet">
                    <td>
                        <span>SUNBET余额</span>
                        <b class="yue">{{ $mod?$mod->money:'未开通' }}</b>
                        <img class="api_check" src="{{ asset('/wap/theme4/images/freshmoney.svg') }}" data-uri="{{ route('member.api.check') }}?api_name=SUNBET">
                        <div class="btntwo">
                            @if($_member->is_trans_on ==0)
                                <form action="{{ route('member.one_transfer') }}" method="post" style="display: inline-block;">
                                    <input type="hidden" name="api_name" value="SUNBET">
                                    <input type="hidden" name="transfer_type" value="0">
                                    <button style="width: auto;padding: 5px" class="ajax-submit-btn">一键转入</button>
                                </form>
                            @endif
                            <form action="{{ route('member.one_transfer') }}" method="post" style="display: inline-block">
                                <input type="hidden" name="api_name" value="SUNBET">
                                <input type="hidden" name="transfer_type" value="1">
                                <button style="width: auto;padding: 5px" class="ajax-submit-btn">一键转出</button>
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
            <tr platform="AG">
                <td>
                    <span>{{ $item->api_name }}余额</span>
                    <b class="yue">{{ $mod?$mod->money:'未开通' }}</b>
                    <img src="{{ asset('/wap/theme4/images/freshmoney.svg') }}" class="api_check" data-uri="{{ route('member.api.check') }}?api_name={{ $item->api_name }}">
                    <div class="btntwo">
                        @if($_member->is_trans_on ==0)
                            <form action="{{ route('member.one_transfer') }}" method="post" style="display: inline-block;margin: 0px;padding: 0px">
                                <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                <input type="hidden" name="transfer_type" value="0">
                                <button style="width: auto;padding: 5px" class="ajax-submit-btn">一键转入</button>
                            </form>
                        @endif
                            <form action="{{ route('member.one_transfer') }}" method="post" style="display: inline-block">
                                <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                <input type="hidden" name="transfer_type" value="1">
                                <button style="width: auto;padding: 5px" class="ajax-submit-btn">一键转出</button>
                            </form>
                    </div>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!--弹出框 选择转出平台-->
    <div id="modalOut" class="modal date-list" style="width:240px; margin-left:-120px; visibility:hidden;">
        <div class="modal-hd">
            <h2>游戏平台<a href='javascript:void(0);' style="color:blue; text-decoration: underline;" onclick="$('#modalOut').css('visibility','hidden');$('#modalIn').css('visibility','hidden');$('.reveal-modal-bg').hide();">[X]</a></h2>
        </div>
        <div class="modal-content">
            <ul name="gpoutlist" id="limitplace"></ul>
        </div>
    </div>
    <!--弹出框 选择年份-->
    <div id="modalIn" class="modal date-list" style="width:240px; margin-left:-120px; visibility:hidden;">
        <div class="modal-hd">
            <h2>操作<a href='javascript:void(0);' style="color:blue; text-decoration: underline;" onclick="$('#modalOut').css('visibility','hidden');$('#modalIn').css('visibility','hidden');$('.reveal-modal-bg').hide();">[X]</a></h2>
        </div>
        <div class="modal-content">
            <ul name="gpinlist">
                <li onclick="caozuo('in','充值')">充值</li>
                <li onclick="caozuo('out','提款')">提款</li>
            </ul>
        </div>
    </div>
    <div class="reveal-modal-bg" style="cursor: pointer; display:none;"></div>
    <script>
        $(function () {
            // getGamePlate(2);
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