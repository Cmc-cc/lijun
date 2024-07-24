@extends('wap.template.theme4.layouts.main')
@section('content')
    <div class="layout mt12">
        <ul class="transaction-time clearboth" style="margin-bottom: 10px">
            <form id="form1" name="form1" action="" method="get">
            <li>
                <label>选择平台：</label>
                <select id="historySel" name="api_type" required>
                    <option value="">--请选择--</option>
                    @foreach($_api_list as $k => $v)
                        @if($v=='AGS' || $v=='SUNBETS')
                            @continue
                        @endif
                        <option value="{{ $k }}" @if($api_type == $k) selected @endif>{{ $v }}</option>
                    @endforeach
                </select>
            </li>
            {{--<li>
                <label>开始时间：</label>
                <input type="date" id="startTime" value="2020-01-13" max="2020-01-13">
            </li>
            <li>
                <label>结束时间：</label>
                <input type="date" id="endTime" value="2020-01-13" max="2020-01-13">
            </li>--}}
            <input type="submit" class="confirm-sub mt20" value="查询">
            </form>
        </ul>
        {{--<div class="page-cont">
            <div class="first">共 <span id="page">0</span> 页,总计 <span id="pageCount">-</span> 条</div>
            <div class="second">
                <button onclick="getMeg('-1')">上一页</button>
                <input type="number" id="num" min="1" value="1">
                <button onclick="getMeg('+0')">确定</button>
                <button onclick="getMeg('+1')">下一页</button>
            </div>
        </div>--}}
        <table class="pagetab historytab" style="table-layout:fixed; ">
            <thead>
            <tr>
                <th>平台</th>
                <th>游戏名称</th>
                <th>有效投注</th>
                <th>投注</th>
                <th>输赢</th>
                <th style="white-space: normal;word-break: normal">时间</th>
            </tr>
            </thead>
            <tbody id="getlists">
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
            <tfoot id="foot">
            </tfoot>
        </table>
        {!! $data->appends(['api_type' => $api_type])->links() !!}
    </div>
@endsection