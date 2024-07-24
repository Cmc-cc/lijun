@extends('wap.template.theme11.layouts.main')
@section('content')
    <link href="{{ asset('wap/theme11/css/style2.css') }}" rel="stylesheet" />
    <link href="{{ asset('wap/theme3/css/my.css') }}" rel="stylesheet" />
    <div data-reactroot="" class="app_container remove appdduser/pwd">
        <div class="am-navbar am-navbar-dark">
            <div class="am-navbar-left" role="button" onclick="window.history.back();"><span class="am-navbar-left-icon" aria-hidden="true"><svg class="am-icon am-icon-left am-icon-md"><use xlink:href="#left"></use></svg></span><span class="am-navbar-left-content">返回</span></div>
            <div class="am-navbar-title">转换记录</div>
            <div class="am-navbar-right"></div>
        </div>
        <div class="container">
            <div class="settwo" style="width: 98%; margin: 0px auto;">
                <div style="margin-bottom:21%"  id="mesageContent">
                    <form id="form1" name="form1" action="" method="get" style="padding-bottom: 10px;">
                        <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                            <div class="am-flexbox-item">
                                <div class="am-list-item am-input-item">
                                    <div class="am-input-label am-input-label-5">
                                        <p>开始日期</p>
                                    </div>
                                    <div class="am-input-control"><input name="cn_begin" type="date" id="startTime" value="<?php echo $cn_begin?>" max="<?php echo date('Y-m-d') ?>"></div>
                                </div>
                            </div>
                        </div>
                        <div class="am-flexbox am-flexbox-align-middle gameBg1 gameBg1_input">
                            <div class="am-flexbox-item">
                                <div class="am-list-item am-input-item">
                                    <div class="am-input-label am-input-label-5">
                                        <p>结束日期</p>
                                    </div>
                                    <div class="am-input-control"><input name="cn_end" type="date" id="endTime" value="<?php echo $cn_end?>" max="<?php echo date('Y-m-d') ?>"></div>
                                </div>
                            </div>
                        </div>
                        <input type="submit"  class="confirm-sub mt20" value="查  询" id="zhuanru" warning="正在转账..." show="提 交">
                    </form>
                    <div class="transaction-record" style="display:block">
                        <table class="pagetab" style="display:table;table-layout:fixed">
                            <thead>
                            <tr>
                                <th>转账时间</th>
                                <th>金额</th>
                                <th>转出/转入账户</th>
                                <th>转换状态</th>
                            </tr>
                            </thead>
                            <tbody id="siteMail">
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
    <script>
        $(function () {
        })
    </script>


@endsection