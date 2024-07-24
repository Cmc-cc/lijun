@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">添加红包等级</h3>
            </div>
            <div class="panel-body">
                 <form class="form-horizontal" id="form" action="{{ route('admin.editGiveNum',['id' => $data['id']]) }}" method="post">
                    <input type="hidden" name="_method" value="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">累计充值金额</label>
                            <div class="col-sm-7">
                                <input class="form-control" name="price" value="{{ $data['price'] }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">赠送次数</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="give_num" value="{{ $data['give_num'] }}" />
                            </div>
                        </div>
                        
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="{{ route('admin.giveindex') }}" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
@endsection