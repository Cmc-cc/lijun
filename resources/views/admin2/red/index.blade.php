@extends('admin.layouts.main')
@section('content')
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">转盘奖品列表</h3>
             </div>
             <div class="panel-body">
                @include('admin.red.filter')
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 5%">ID</th>
                         <th  style="width: 10%">奖品名称</th>
                         <th  style="width: 10%">金额</th>
                         <th  style="width: 5%">概率</th>
                         <th  style="width: 5%">数量</th>
                         <th  style="width: 5%">累计中奖次数</th>
                         <th  style="width: 5%">排序</th>
                         <th  style="width: 20%">最后更新时间</th>
                         <th  style="width: 5%">上线/下线</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                 {{ $item->name }}
                             </td>
                             <td>
                                 {{ $item->money }}
                             </td>
                             <td>
                                 {{ $item->rate }}%
                             </td>
                             <td>
                                 {{ $item->number }}
                             </td>
                             <td>
                                 {{ $item->times }}
                             </td>
                             <td>
                                 {{ $item->sort }}
                             </td>
                             <td>
                                 {{ $item->updated_at }}
                             </td>
                             <td>
                                 {!! \App\Models\Base::$ON_LINE_HTML[$item->on_line] !!}
                             </td>
                             <td>
                                 @if ($item->on_line == 0)
                                     <a href="{{ route('red.check', ['id' => $item->getKey(), 'status' => 1]) }}" class="btn btn-danger btn-xs" onclick="return confirm('确定下线吗？')">下线</a>
                                 @elseif($item->on_line == 1)
                                     <a href="{{ route('red.check', ['id' => $item->getKey(), 'status' => 0]) }}" class="btn btn-success btn-xs" onclick="return confirm('确定上线吗？')">上线</a>
                                 @endif
                                 <a href="{{ route('red.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>
                                 <a class="btn btn-danger btn-xs" href="{{ route('admin.destroy', ['id' => $item->getKey()]) }}" onclick="return confirm('确定删除吗？')" >删除</a>
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