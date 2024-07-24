@extends('admin.layouts.main')
@section('content')
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">api清零记录</h3>
             </div>
             <div class="panel-body">
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                        <th style="width: 10%">时间</th>
                        <th style="width: 90%">接口信息</th>

                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->createtime }}
                             </td>
                             
                             <td>
                             	  <?php
                             	    $apilist = unserialize($item->text);
                             	  ?>
                             	  @foreach($apilist as $v)
                             	    <button class="btn btn-danger btn-sm" style="margin-top:10px;">
                                        {{$v['api_name']}}:{{$v['api_money']}}
                                    </button>
                                    
                             	    
                             	  @endforeach
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
@section("after.js")
     @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这条记录吗?'])
@endsection