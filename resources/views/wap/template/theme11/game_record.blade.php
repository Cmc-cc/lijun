@extends('wap.template.theme11.layouts.main')
@section('content')
    <link href="{{ asset('wap/theme11/css/style2.css') }}" rel="stylesheet" />
    <link href="{{ asset('wap/theme3/css/my.css') }}" rel="stylesheet" />
    <div data-reactroot="" class="app_container remove appdduser/pwd">
        <div class="am-navbar am-navbar-dark">
            <div class="am-navbar-left" role="button" onclick="window.history.back();"><span class="am-navbar-left-icon" aria-hidden="true"><svg class="am-icon am-icon-left am-icon-md"><use xlink:href="#left"></use></svg></span><span class="am-navbar-left-content">返回</span></div>
            <div class="am-navbar-title">游戏记录</div>
            <div class="am-navbar-right"></div>
        </div>
        <div class="container">
            <div class="settwo" style="width: 98%; margin: 0px auto;">
                <div style="margin-bottom:21%"  id="mesageContent">
                    <form id="form1" name="form1" action="" method="get" style="padding-bottom: 10px;padding-top: 10px;">
                        <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                            <div class="am-flexbox-item">
                                <div class="am-list-item am-input-item">
                                    <div class="am-input-label am-input-label-5">
                                        <p>平台：</p>
                                    </div>
                                    <div class="am-input-control">
                                        <select id="operation" name="api_type" required>
                                            <option value="">--请选择--</option>
                                            @foreach($_api_list as $k => $v)
                                                @if($v=='AGS' || $v=='SUNBETS')
                                                    @continue
                                                @endif
                                                <option value="{{ $k }}" @if($api_type == $k) selected @endif>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit"  class="confirm-sub mt20" value="查  询" id="zhuanru" warning="正在转账..." show="提 交">
                    </form>
                    <div class="transaction-record" style="display:block">
                        <table class="pagetab" style="display:table;table-layout:fixed">
                            <thead>
                            <tr>
                                <th>平台</th>
                                <th>游戏名称</th>
                                <th>有效</th>
                                <th>投注</th>
                                <th>输赢</th>
                                <th>时间</th>
                            </tr>
                            </thead>
                            <tbody id="siteMail">
                            @if ($data->total() > 0)
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{--{{ $_api_list[$item->api_type] }}--}}
                                            <?php
                                            $plat_type = $_api_list[$item->api_type];
                                            if($plat_type == 'AGS'){
                                                echo 'AG';
                                            }elseif ($plat_type == 'SUNBETS'){
                                                echo 'SUNBET';
                                            }else{
                                                echo $plat_type;
                                            }
                                            ?>
                                        </td>
                                        <td>{{ $item->gameCode }}</td>
                                        <td>{{ $item->validBetAmount }}</td>
                                        <td>{{ $item->betAmount }}</td>
                                        <td>{{ $item->netAmount }}</td>
                                        <td>{{ $item->betTime }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">暂无投注记录！</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {!! $data->appends(['api_type' => $api_type])->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
        })
    </script>


@endsection