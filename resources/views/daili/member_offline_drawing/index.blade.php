@extends('daili.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">提款列表</h3>
            </div>
            <div class="panel-body">
                @include('daili.member_offline_drawing.filter')

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 15%">订单号</th>
                        <th style="width: 10%">提款金额</th>
                        <th style="width: 5%">手续费</th>
                        <th style="width: 10%">平台账号</th>
                        <th style="width: 15%">开户行</th>

                        <th style="width: 10%">申请时间</th>
                        <th style="width: 10%">状态</th>
                    </tr>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->bill_no }}
                            </td>
                            <td>
                                {{ $item->money }}
                            </td>
                            <td>
                                {{ $item->counter_fee }}
                            </td>
                            <td>
                                {{ $item->member->name or '已删除' }}
                            </td>
                            <td>
                                {{ $item->bank_name }}
                            </td>
                            
                            <td>
                                {{ $item->created_at }}
                            </td>
                            <td>
                                {!! \App\Models\Base::$DRAWING_STATUS_HTML[$item->status] !!}
                            </td>
                        </tr>
                    @endforeach
                    <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td></td>
                            <td><strong style="color: red">{{ $total_money }}</strong></td>
                            <td><strong style="color: red">{{ $total_counter_fee }}</strong></td>
                            <td colspan="5"></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                    </div>
                <div class="pull-right" style="margin: 0;">
                    {!! $data->appends(['status' => $status,  'start_at' => $start_at, 'end_at' => $end_at, 'name' => $name])->links() !!}
                </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->
@endsection
@section("after.js")
    <script>
        var start = {
            elem: '#start_at',
            format: 'YYYY-MM-DD hh:mm:ss',
            //min: laydate.now(), //设定最小日期为当前日期
            max: '2099-06-16 23:59:59', //最大日期
            istime: true,
            istoday: false,
            choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            elem: '#end_at',
            format: 'YYYY-MM-DD 23:59:59',
            //min: laydate.now(),
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: true,
            choose: function(datas){
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        laydate(start);
        laydate(end);
    </script>
@endsection