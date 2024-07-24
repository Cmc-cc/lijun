<?php $__env->startSection('content'); ?>
    <div class="container-fluid" style="margin-top: 10px;">
        <form class="form-horizontal">
            <input type="hidden" name="_method" value="put">
            <div class="box-body">
                <div class="form-group">
                    <label for="api_name" class="col-sm-2 control-label">接口名称</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="api_name" name="api_name" placeholder="例：AG" value="<?php echo e($data->api_name); ?>" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label for="sort" class="col-sm-2 control-label">排序</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="sort" name="sort" placeholder="" value="<?php echo e($data->sort); ?>" />
                    </div>
                </div>
                
            </div><!-- /.box-body -->
        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.basic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>