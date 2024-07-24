@extends('wap.template.theme6.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme3/css/my.css') }}" rel="stylesheet" />
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">游戏记录</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content transaction-content" style="padding: 5px;margin-top: 40px;">
        <div class="layout mt12">
            <form id="form1" name="form1" action="" method="get">
                <ul class="transaction-time clearboth">
                    <li>
                        <label>选择平台：</label>
                        <select id="transactionSel" class="form-control" name="api_type" required>
                            <option value="">--请选择--</option>
                            @foreach($_api_list as $k => $v)
                                @if($v=='AGS' || $v=='SUNBETS')
                                    @continue
                                @endif
                                <option value="{{ $k }}" @if($api_type == $k) selected @endif>{{ $v }}</option>
                            @endforeach
                        </select>
                    </li>
                    <input type="submit" class="confirm-sub mt20" style="margin-bottom: 10px;" value="查询">
                </ul>
            </form>
            <table class="pagetab historytab" style="table-layout:fixed; ">
                <thead>
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
                <tbody id="cashin">
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
    <script>
        $(function () {

        })
    </script>
@endsection