@extends('admin.layouts.main')
@section('content')
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">充值送转盘次数</h3>
             </div>
             <div class="container-fluid" style="margin-bottom: 10px;margin-top:10px">
                <form action="" method="get" id="searchForm">
                    <div class="row">
            
                        <div class="col-lg-2 pull-right">
                            <div class="input-group">
                                <!--<button type="submit" class="btn btn-primary">搜索</button>&nbsp;&nbsp;-->
                                <a class="btn btn-info" href="{{ route('admin.giveNumAdd', ['id' => 0]) }}"><span class="glyphicon glyphicon-plus"></span>新增</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
             <div class="panel-body">
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 10%">ID</th>
                         <th  style="width: 10%">充值金额</th>
                         <th  style="width: 10%">赠送次数</th>
                         <th  style="width: 5%">上线/下线</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                      @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                 {{ $item->price }}元
                             </td>
                             <td>
                                 {{ $item->give_num }}
                             </td>
                             </td>
                             <td>
                                 {{ $item->status == 1 ? '上线' : '下线' }}
                             </td>
                             <td>
                                 @if ($item->status == 1)
                                     <a href="{{ route('red.giveNumCheck', ['id' => $item->id, 'status' => 0]) }}" class="btn btn-danger btn-xs" onclick="return confirm('确定下线吗？')">下线</a>
                                 @elseif($item->status == 0)
                                     <a href="{{ route('red.giveNumCheck', ['id' => $item->id, 'status' => 1]) }}" class="btn btn-success btn-xs" onclick="return confirm('确定上线吗？')">上线</a>
                                 @endif
                                 <a href="{{ route('admin.giveNumAdd', ['id' => $item->id]) }}" class="btn btn-primary btn-xs">修改</a>
                                 {{--<button class="btn btn-danger btn-xs"--}}
                                         {{--data-url="{{route('red.destroy', ['id' => $item->getKey()])}}"--}}
                                         {{--data-toggle="modal"--}}
                                         {{--data-target="#delete-modal"--}}
                                 {{-->--}}
                                     {{--删除--}}
                                 {{--</button>--}}
                             </td>
                         </tr>
                     @endforeach
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     {!! $data->render() !!}
                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
@endsection