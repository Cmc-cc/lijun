@extends('wap.template.theme9.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme9/css/betRecordPlus.css') }}" rel="stylesheet">
    <section id="content">
        <div id="page-title">额度转换记录</div>
        <section class="inner ng-scope">
            <div class="col-md-12">
                <div>
                    <div ng-switch-when="true" class="panel panel-custom ng-scope" id="transactionContent">
                        <div class="panel-body">
                            <form class="ng-pristine ng-valid ng-valid-datetime ng-submitted" action="" method="get">
                                <div class="row">
                                    <div class="form-group col-sm-6 top-radio">
                                        <div class="control-div ng-scope">
                                            <label class="control-label">开始时间</label>
                                            <input type="date" id="startTime" class="form-control ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty ng-valid-datetime" name="cn_begin"  value="<?php echo $cn_begin?>" max="<?php echo date('Y-m-d') ?>">
                                            <label class="control-label"> 结束时间</label>
                                            <input type="date" id="endTime" class="form-control ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty ng-valid-datetime" name="cn_end"  value="<?php echo $cn_end?>" max="<?php echo date('Y-m-d') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center" style="margin-top:20px">
                                    <button type="submit" class="btn btn-primary btn-search">搜寻</button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered pagetab" datasource="cashin" style="display: table;">
                                    <thead>
                                    <tr>
                                        <td>转账时间</td>
                                        <td>金额</td>
                                        <td>转出/转入账户</td>
                                        <td>转换状态</td>
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
        </section>
    </section>
@endsection