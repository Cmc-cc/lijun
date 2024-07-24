@extends('admin.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{asset('/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.css') }}">
    <script src="{{ asset('/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">记录</h3>
             </div>
             <div class="panel-body">
                <div class="container-fluid" style="margin-bottom: 10px;">
                    <form action="" method="get" id="searchForm">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">用户名</span>
                                    <input type="text" class="form-control" name="name" placeholder="关键字" value="{{$name}}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-addon">类型</span>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">--请选择--</option>
                                        @foreach($types as $k =>$v)
                                            <option value="{{ $k }}" @if($k == $status) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">开始时间</span>
                                    <input type="text" class="form-control" name="start_at" id="start_at" value="{{ $start_at }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">结束时间</span>
                                    <input type="text" class="form-control" name="end_at" id="end_at" value="{{ $end_at }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px;">
                            <div class="col-lg-2 pull-right">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                                    <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 10%">ID</th>
                         <th  style="width: 10%">用户</th>
                         <th  style="width: 10%">变动前</th>
                         <th  style="width: 10%">变动数量</th>
                         <th  style="width: 10%">变动后</th>
                         <th  style="width: 10%">类型</th>
                         <!--<th  style="width: 10%">备注</th>-->
                         <th  style="width: 10%">时间</th>
                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                 {{ $item->member->name }}
                             </td>
                             <td>
                                 {{ $item->before }}
                             </td>
                             <td>
                                 {{ $item->money }}
                             </td>
                             <td>
                                 {{ $item->after }}
                             </td>
                             <td>
                                 {{ $item->type_str }}
                             </td>
                             <!--<td>-->
                             <!--    {{ $item->memo }}-->
                             <!--</td>-->
                             <td>
                                 {{ $item->created_at }}
                             </td>
                         </tr>
                     @endforeach
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     {!! $data->appends(['name' => $name, 'status' => $status, 'start_at' => $start_at, 'end_at' => $end_at])->links() !!}
                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
@endsection