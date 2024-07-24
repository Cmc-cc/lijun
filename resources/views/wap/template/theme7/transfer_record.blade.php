@extends('wap.template.theme7.layouts.main')
@section('content')
    <div class="member-money-module member-money-module-index">
        <div class="module-top">
            <div class="top-container navbar-nav">
                <div class="left-menu">
                    <a href="javascript:;" onclick="window.location.href='{{ route('wap.index') }}'">
                        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                </div>
                <div class="page-title">额度转换记录</div>
            </div>

        </div>
        <div class="module-main diy-scrollbar" style="padding-top:20px;">
            <div>
                <div>
                    <div class="main-container" id="transactionContent">
                        <form id="form1" name="form1" action="" method="get">
                            <div>
                                <div class="form-group">
                                    <label for="mdl-11_start_time">开始时间</label>
                                    <input class="form-control" name="cn_begin" type="date" id="startTime" value="<?php echo $cn_begin?>" max="<?php echo date('Y-m-d') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="mdl-11_end_time">结束时间</label>
                                    <input class="form-control" name="cn_end" type="date" id="endTime" value="<?php echo $cn_end?>" max="<?php echo date('Y-m-d') ?>">
                                </div>
                                <div class="form-group" style="text-align: center">
                                    <button type="submit" style="padding: 5px 20px;" class="btn btn-primary confirm-btn" onclick="sureWaring()">确定</button>
                                </div>
                            </div>
                        </form>
                        <table class="pagetab" datasource="cashin" style="display: table;">
                            <thead>
                            <tr>
                                <th>转账时间</th>
                                <th>金额</th>
                                <th>转出/转入账户</th>
                                <th>转换状态</th>
                            </tr>
                            </thead>
                            <tbody id="cashin">
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
                        </table>
                        {!! $data->appends(['cn_begin' => $cn_begin, 'cn_end' => $cn_end, 's_begin_h' => $s_begin_h, 's_begin_i' => $s_begin_i, 's_end_h' => $s_end_h, 's_end_i' => $s_end_i])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection