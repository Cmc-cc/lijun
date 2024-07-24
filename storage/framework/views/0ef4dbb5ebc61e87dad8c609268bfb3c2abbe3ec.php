<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">编辑接口</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="<?php echo e(route('apple.update', ['id' => $data->id])); ?>" method="post">
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="api_name" class="col-sm-2 control-label">接口名称 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="api_name" name="api_name"  placeholder="例：AG" value="<?php echo e($data->api_name); ?>" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="api_title" class="col-sm-2 control-label">接口别称 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="api_title" name="api_title"  placeholder="例：三昇" value="<?php echo e($data->api_title); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="sort" name="sort" placeholder="" value="<?php echo e($data->sort); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="api_on_line" class="col-sm-2 control-label">是否上线</label>
                            <div class="col-sm-7">
                                <input type="radio"  name="on_line" value="0" <?php if($data->on_line==0): ?>checked <?php endif; ?>/>上线
                                <input type="radio"  name="on_line" value="1" <?php if($data->on_line==1): ?>checked <?php endif; ?>/>下线
                                <input type="radio"  name="on_line" value="2" <?php if($data->on_line==2): ?>checked <?php endif; ?>/>维护中
                            </div>
                        </div>
                        
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="<?php echo e(route('apple.index')); ?>" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>