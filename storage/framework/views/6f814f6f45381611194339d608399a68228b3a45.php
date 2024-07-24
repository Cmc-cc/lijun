<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">编辑域名</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="<?php echo e(route('url.edit2', ['id' => $data->id])); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="api_name" class="col-sm-2 control-label">域名 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="api_name" name="url"  placeholder="例：baidu.com" value="<?php echo e($data->url); ?>"  />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="api_money" class="col-sm-2 control-label">状态</label>
                            <div class="col-sm-7">
                                <input type="radio"  name="status" value="0" <?php if($data->status==0): ?>checked <?php endif; ?>/>禁用
                                <input type="radio"  name="status" value="1" <?php if($data->status==1): ?>checked <?php endif; ?>/>启用
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="<?php echo e(route('url.index')); ?>" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>