@extends('admin.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.css') }}">
    <script src="{{ asset('/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>

    <style type="text/css">
        .btn-group>.btn:first-child{
            width: 84px;
        }
    </style>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">汇款列表</h3>
            </div>
            <div class="panel-body">
                @include('admin.recharge.filter')

                <table id="tab" class="table table-bordered table-hover text-center">
                    <thead>
                    <tr>
                        <th style="width: 3%">ID</th>
                        <th style="width: 10%">订单号</th>
                        <th style="width: 10%">平台账号</th>
                        <th style="width: 5%">充值金额</th>
                        <th style="width: 8%">赠送金额</th>
                        <th style="width: 10%">汇款方式</th>
                        <th style="width: 5%">姓名</th>
                        <th style="width: 10%">账号/卡号</th>
                        <th style="width: 10%">汇款时间</th>
                        <th style="width: 10%">审核时间</th>
                        <th style="width: 5%">状态</th>
                        <th style="width: 5%">码量状态</th>
                        <th style="width: 5%">码量</th>
                        <th style="width: 10%">转盘次数</th>
                        <th>操作</th>
                        <th style="width: 10%">备注</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        @if($item->member)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->bill_no }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-primary">
                                        {{ $item->member->name or '已删除'}}
                                    </button>
                                    <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#" class="show-cate" data-uri="{{ route('member.checkBalance', ['id' => $item->member->getKey()]) }}">查看</a></li>
                                        <li><a href="{{ route('member.edit', ['id' => $item->member->getKey()]) }}">修改</a></li>
                                        <li><a href="{{ route('member.assign', ['id' => $item->member->getKey()]) }}">分配代理</a></li>

                                         @if ($item->member->status == 0)
                                            <li><a href="{{ route('member.check', ['id' => $item->member->getKey(), 'status' => 1]) }}" onclick="return confirm('确定禁用吗？')">禁用</a></li>
                                         @elseif($item->member->status == 1)
                                            <li><a href="{{ route('member.check', ['id' => $item->member->getKey(), 'status' => 0]) }}" onclick="return confirm('确定启用吗？')">启用</a></li>
                                         @endif
                                        
                                    </ul>
                                </div>                                
                            </td>
                            <td>
                                {{ round($item->money,2) }}
                            </td>
                            <td>
                                {{ $item->diff_money }}
                            </td>
                            <td>
                                {{ config('platform.recharge_type')[$item->payment_type] }}
                            </td>
                            <td>
                                {{ $item->account }}
                            </td>
                            <td>
                                {{ $item->payment_desc }}
                            </td>
                            
                            
                            
                            <td>
                                {{ $item->created_at }}
                            </td>
                            <td>
                                {{ $item->updated_at }}
                                
                            </td>
                            
                            <td>
                                {!! \App\Models\Base::$RECHARGE_STATUS_HTML[$item->status] !!}
                            </td>
                            <td>
                                @if ($item->ml == 0)
                                    <a href="/api/rechargeListen?id={{ $item->id }}" class="btn btn-primary btn-xs">刷新</a>
                                    @else
                                    已刷新
                                @endif
                            </td>
                            <td>
                                {{$item->member->ml_money}}
                            </td>
                            <td>
                                {{$item->member->zhuanpan}}
                            </td>
                            <td>
                                @if ($item->status == 1)
                                    <a href="{{ route('recharge.show', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">通过</a>

                                    <button type="button" class="btn btn-danger btn-xs" data-uri="{{ route('recharge.update', ['id' => $item->id]) }}" onclick="showRemark(this)">不通过</button>
                                    {{--<button class="btn btn-danger btn-xs"--}}
                                    {{--data-url="{{route('fs_level.destroy', ['id' => $item->getKey()])}}"--}}
                                    {{--data-toggle="modal"--}}
                                    {{--data-target="#delete-modal"--}}
                                    {{-->--}}
                                    {{--删除--}}
                                    {{--</button>--}}
                                @endif
                            </td>
                            <td >
                                <a  >
                                    <button type="button" class="btn btn-danger btn-xs" data-uri="{{ route('recharge.update', ['id' => $item->id,'type'=>2]) }}" onclick="beizhu(this)">@if($item->fail_reason){{$item->fail_reason}} @else填写备注@endif</button>
                                </a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td colspan="2"></td>
                            <td><strong style="color: red">{{ $total_recharge }}</strong></td>
                            <td><strong style="color: red">{{ $total_diff_money }}</strong></td>
                            <td colspan="5"></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        {!! $data->appends(['status' => $status, 'name' => $name,'payment_type' => $payment_type, 'start_at' => $start_at, 'end_at' => $end_at, 'updated_start_at' => $updated_start_at, 'updated_end_at' => $updated_end_at])->links() !!}
                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">不通过原因</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form-horizontal" id="updateReason">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="put">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="fail_reason" class="col-sm-3 control-label"><span style="color: red">不通过原因</span></label>
                                <div class="col-sm-8">
                                    <textarea name="fail_reason" id="fail_reason" rows="3" required class="form-control"></textarea>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-info btn-flat">提交</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form-horizontal" id="beizhuReason">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="put">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="fail_reason" class="col-sm-3 control-label"><span style="color: red">备注</span></label>
                                <div class="col-sm-8">
                                    <textarea name="fail_reason" id="fail_reason" rows="3" required class="form-control"></textarea>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-info btn-flat">提交</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showRemark(e)
        {
            var uri = $(e).attr('data-uri');
            $('#updateReason').attr('action',uri)
            $('#myModal').modal('show');
        }
        function beizhu(e)
        {
            var uri = $(e).attr('data-uri');
            $('#beizhuReason').attr('action',uri)
            $('#confirm-modal').modal('show');
        }
    </script>
    <script>
         $(function(){
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '记录',
                     shadeClose: false,
                     shade: 0.8,
                     area: ['90%', '90%'],
                     content: url
                 });
             })
            //  $('#tab').DataTable({
            //      "scrollX": true,
            //      "scrollY": false,
            //      "ordering": false,
            //      "paging" : false,
            //      'info' : false,
            //      'searching' : false
            //  });
         });
     </script>
@endsection

@section("after.js")
    <script>
        var start = {
            elem: '#updated_start_at',
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
            elem: '#updated_end_at',
            format: 'YYYY-MM-DD hh:mm:ss',
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
        laydate(start);
        laydate(end);
    </script>
@endsection