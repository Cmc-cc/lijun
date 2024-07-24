@extends('daili.layouts.main')
@section('content')
        <!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">个人资料编辑</h3>
                </div>
                <!-- form start -->
                <form class="form-horizontal" action="/daili/personal" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder="用户名" value="{{ $_daili->name }}" minlength="2" required title="请输入至少两位字符的用户名" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password" name="password" placeholder="不修改则为原密码" minlength="6"  title="请输入至少6位字符的密码"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">确认密码</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="确认密码" minlength="6"  title="请输入至少6位字符的密码"/>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection