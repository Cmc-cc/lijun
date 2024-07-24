@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/history.css') }}" rel="stylesheet">
    <link href="{{ asset('wap/theme3/css/my.css') }}" rel="stylesheet" />
    <form id="form1" name="form1" action="" method="get" style="padding-bottom: 10px;padding-top: 10px;">
    <ul class="transaction-time clearboth">
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
    </ul>
        <div style="text-align: center">
            <button style="width: 50%;display: inline-block"  type="submit" class="sbtech-widget-cashier-submit-payment__btn" >查询</button>
        </div>

    </form>
    <table class="pagetab historytab" style="table-layout:fixed; ">
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
    {!! $data->links() !!}
@endsection