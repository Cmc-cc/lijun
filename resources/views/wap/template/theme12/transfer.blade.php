@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/transfer.css') }}" rel="stylesheet" />
    <div id="master-container-Center_BalanceTransferResponsiveBlock_45117" class="responsive-block account-block balance-transfer-rblock">
        <div id="html-container-Center_BalanceTransferResponsiveBlock_45117" data-uat="my-acc-resp-block-content">
            <div class="user-balance">
                <div class="user-balance__content">
                    <div class="transfer-btnall clearboth" style="width: 100%;padding: 10px;">
                                <span style="font-size: 16px;">
                                    当前钱包类型：
                                @if($_member->is_trans_on == 1)
                                        中心钱包
                                    @else
                                        转账钱包
                                    @endif
                                </span>
                        <input type="button"
                               id="is_trans_on"
                               money_type="{{$_member->is_trans_on}}"
                               value="点击切换"/>
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
                    <div class="user-balance__transfer">
                        <h3 class="user-info__section-header">游戏平台转账</h3>
                        <div class="user-info__item" data-uat="user-info-item">
                            <div id="html-container-Center_BalanceTransferResponsiveBlock_45117_Box_TransferError" class="user-info__item isHidden">
                                <div class="user-balance-t__notification" data-uat="balance-transfer-message"></div>
                            </div>
                            <div id="html-container-Center_BalanceTransferResponsiveBlock_45117_Box_CasinoBonusWarning" class="user-info__item isHidden">
                                <div class="user-balance-t__notification" data-uat="balance-transfer-message"></div>
                            </div>
                            <form class="transfer-twochoose"  action="{{ route('member.post_transfer') }}" method="post">
                                <input type="hidden" name="account1" value="1">
                            <div class="user-info__item" data-uat="user-info-item">
                                <div class="user-info__input">
                                    <select id="limitplace" name="account2" data-uat="balance-section-amount-input">
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
                            </div>
                            <div class="user-info__item" data-uat="user-info-item">
                                <div class="user-info__input">
                                    <select id="operation" name="transfer_type" data-uat="balance-section-amount-input">
                                        <option value="0">转入</option>
                                        <option value="1">转出</option>
                                    </select>
                                </div>
                            </div>
                            <div class="user-info__item" data-uat="user-info-item">
                                <div class="user-info__input"><input name="money" id="amount" type="number" step="any" min="0" placeholder="输入金额" data-uat="balance-section-amount-input"></div>
                            </div>
                            <div class="user-info__item ajax-submit-btn" data-uat="user-info-item" id="zhuanru">
                                <a id="html-container-Center_BalanceTransferResponsiveBlock_45117_Box_TransferButton" href="javascript:void(0)" class="user-info__button " data-uat="personal-information-button">
                                    <span id="btn_html-container-Center_BalanceTransferResponsiveBlock_45117_Box_TransferButton" data-uat="personal-information-button-label-text">转账</span><span class="user-balance-transfer-amount" data-uat="personal-information-button-label-value"></span>
                                    <span class="icon i-24 i-o-acc-check user-info__check" data-uat="user-info-check"></span>
                                </a>
                            </div>
                            </form>
                        </div>
                    </div>
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
                                    <span>AG視訊</span>
                                    <b class="yue">{{ $mod?$mod->money:'未开通' }}</b>
                                    <img class="api_check" data-uri="{{ route('member.api.check') }}?api_name=AG"
                                         src="{{ asset('/wap/theme9/images/freshmoney.svg') }}"
                                    >
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
                            if (in_array($ags->id, $own_api_list)){
                                $mod = $_member->apis()->where('api_id', $ags->id)->first();
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

    <script>
        $(function () {
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
        })
    </script>


@endsection