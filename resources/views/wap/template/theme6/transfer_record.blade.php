@extends('wap.template.theme6.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme3/css/my.css') }}" rel="stylesheet" />
    <header id="header" class="mui-bar mui-bar-nav">
        <h1 class="mui-title">额度转换记录</h1>
        <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
            <span class="mui-icon mui-icon-left-nav"></span>返回
        </button>
    </header>
    <div class="mui-content transaction-content" style="padding: 5px;margin-top: 40px;">
        <div class="layout mt12">
            <form id="form1" name="form1" action="" method="get">
                <ul class="transaction-time clearboth">
                    <li>
                        <label>开始时间：</label>
                        <input name="cn_begin" type="date" id="startTime" value="<?php echo $cn_begin?>" max="<?php echo date('Y-m-d') ?>">
                    </li>
                    <li>
                        <label>结束时间：</label>
                        <input name="cn_end" type="date" id="endTime" value="<?php echo $cn_end?>" max="<?php echo date('Y-m-d') ?>">
                    </li>
                    <input type="submit" class="confirm-sub mt20" style="margin-bottom: 10px;" value="查询">
                </ul>
            </form>
            <table class="pagetab historytab" style="table-layout:fixed; ">
                <thead>
                <tr>
                    <th>转账时间</th>
                    <th>金额</th>
                    <th>转出/转入账户</th>
                    <th>转换状态</th>
                    {{--<th>输赢</th>
                    <th style="white-space: normal;word-break: normal">时间</th>--}}
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

        </div>
    </div>
    <script>
        $(function () {

        })
    </script>
@endsection