<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">添加红包等级</h3>
            </div>
            <div class="panel-body">
                 <form class="form-horizontal" id="form" action="<?php echo e(route('admin.redAdd')); ?>" method="post">
                    <input type="hidden" name="_method" value="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">名称</label>
                            <div class="col-sm-7">
                                <input class="form-control" name="name" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">金额</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="money" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">概率</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"  name="rate"  value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">数量</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"  name="number"  value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="sort" name="sort" placeholder="例：1500"  value="" />
                            </div>
                        </div>
                        
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="<?php echo e(route('red.index')); ?>" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>