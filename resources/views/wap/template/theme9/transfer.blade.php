@extends('wap.template.theme9.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme9/css/transfer.css') }}" rel="stylesheet">
    <section id="transfer" style="margin-bottom: 100px;">
        <div id="page-title">额度转换</div>
        <div class="content panel panel-custom ng-claok ng-scope">
            <div id="account-heading" class="panel-heading">
            <span>
                我的余额:
            </span>
                <span class="UserAmountController trans-money">{{ $_member -> money }}</span>
            </div>
            <div class="transfer-twochoose">

                <div class="withdraw-title mui-clearfix" style="padding: 15px;">

                    当前钱包类型:
                    @if($_member->is_trans_on == 1)
                        中心钱包
                    @else
                        转账钱包
                    @endif
                    <button type="button" id="is_trans_on" money_type="{{$_member->is_trans_on}}" style="color: #fff;padding: 5px;" class="btn btn-primary">点击切换</button>
                </div>
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
                    <div class="form-group col-sm-6 game-type">
                        <div class="control-div">
                            <label class="control-label">请选择平台</label>
                            <select class="form-control ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty ng-valid-datetime" id="limitplace" name="account2">
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
                    </div>
                    <div class="form-group col-sm-6 game-type">
                        <div class="control-div">
                            <label>操作类型：</label>
                            <input type="radio" name="transfer_type" value="0" checked="" transfer="in">转入 &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="transfer_type" value="1" transfer="out">转出
                        </div>
                    </div>
                    <div class="form-group col-sm-6 game-type">
                        <div class="control-div">
                            <label class="control-label">转账金额</label>
                            <input name="money" type="number" class="form-control ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty ng-valid-datetime" id="amount" placeholder="请输入转换金额">
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-search ajax-submit-btn" id="zhuanru">立即转账</button>
                    </div>
                </form>
                @endif
            </div>
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
                            <img class="api_check" data-uri="{{ route('member.api.check') }}?api_name=AG" src="{{ asset('wap/theme9/images/freshmoney.svg') }}">
                            <div class="btntwo">
                                @if($_member->is_trans_on ==0)
                                <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post" >
                                    <input type="hidden" name="api_name" value="AG">
                                    <input type="hidden" name="transfer_type" value="0">
                                    <button class="ajax-submit-btn" style="width: 100%">一键转入</button>
                                </form>
                                @endif
                                <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                    <input type="hidden" name="api_name" value="AG">
                                    <input type="hidden" name="transfer_type" value="1">
                                    <button class="ajax-submit-btn" style="width: 100%">一键转出</button>
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
                            <img class="api_check" data-uri="{{ route('member.api.check') }}?api_name=SUNBET" src="{{ asset('wap/theme9/images/freshmoney.svg') }}">
                            <div class="btntwo">
                                @if($_member->is_trans_on ==0)
                                    <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post" >
                                        <input type="hidden" name="api_name" value="SUNBET">
                                        <input type="hidden" name="transfer_type" value="0">
                                        <button class="ajax-submit-btn" style="width: 100%">一键转入</button>
                                    </form>
                                @endif
                                <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                    <input type="hidden" name="api_name" value="SUNBET">
                                    <input type="hidden" name="transfer_type" value="1">
                                    <button class="ajax-submit-btn" style="width: 100%">一键转出</button>
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
                        <img class="api_check" data-uri="{{ route('member.api.check') }}?api_name={{ $item->api_name }}" src="{{ asset('wap/theme9/images/freshmoney.svg') }}">
                        <div class="btntwo">
                            @if($_member->is_trans_on ==0)
                                <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post" >
                                    <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                    <input type="hidden" name="transfer_type" value="0">
                                    <button class="ajax-submit-btn" style="width: 100%">一键转入</button>
                                </form>
                            @endif
                            <form style="display: inline-block" action="{{ route('member.one_transfer') }}" method="post">
                                <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                <input type="hidden" name="transfer_type" value="1">
                                <button class="ajax-submit-btn" style="width: 100%">一键转出</button>
                            </form>
                        </div>
                    </td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>

    </section>
    <script>
        $(function () {
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
