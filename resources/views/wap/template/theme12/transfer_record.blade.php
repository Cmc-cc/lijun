@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/history.css') }}" rel="stylesheet" />
    <link href="{{ asset('wap/theme3/css/my.css') }}" rel="stylesheet" />
    <form id="form1" name="form1" action="" method="get" style="padding-bottom: 10px;padding-top: 10px;">
        <ul class="transaction-time clearboth">
            <li>
                <label>开始时间：</label>
                <input name="cn_begin" type="date" id="startTime" value="<?php echo $cn_begin?>" max="<?php echo date('Y-m-d') ?>">
            </li>
            <li>
                <label>结束时间：</label>
                <input name="cn_end" type="date" id="endTime" value="<?php echo $cn_end?>" max="<?php echo date('Y-m-d') ?>">
            </li>
        </ul>
        <div style="text-align: center">
            <button style="width: 50%;display: inline-block"  type="submit" class="sbtech-widget-cashier-submit-payment__btn" >查询</button>
        </div>

    </form>
    <table class="pagetab historytab" style="table-layout:fixed; ">
        <thead>
        <tr>
            <th>转账时间</th>
            <th>金额</th>
            <th>转出/转入账户</th>
            <th>转换状态</th>
        </tr>
        </thead>
        <tbody id="getlists">
        @if ($data->total() > 0)

            @foreach($data as $item)
                @if($item->transfer_out_account == 'AGS账户')
                    <?php
                    $item->transfer_out_account = 'AG账户'
                    ?>
                @endif
                @if($item->transfer_in_account == 'AGS账户')
                    <?php
                    $item->transfer_in_account = 'AG账户'
                    ?>
                @endif
                @if($item->transfer_out_account == 'SUNBETS账户')
                    <?php
                    $item->transfer_out_account = 'SUNBET账户'
                    ?>
                @endif
                @if($item->transfer_in_account == 'SUNBETS账户')
                    <?php
                    $item->transfer_in_account = 'SUNBET账户'
                    ?>
                @endif
                <tr>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->money }}</td>
                    <td>{{ $item->transfer_out_account }}/{{ $item->transfer_in_account }}</td>
                    <td>成功</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">暂无转换记录！</td>
            </tr>
        @endif
        </tbody>
        <tfoot id="foot">
        </tfoot>
    </table>
    {!! $data->appends(['cn_begin' => $cn_begin, 'cn_end' => $cn_end, 's_begin_h' => $s_begin_h, 's_begin_i' => $s_begin_i, 's_end_h' => $s_end_h, 's_end_i' => $s_end_i])->links() !!}
@endsection