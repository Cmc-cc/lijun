<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php if($_GET['type']==0){ ?>
                <h3 class="panel-title">新增下线会员</h3>
                <?php }else{ ?>
                <h3 class="panel-title">新增下线代理</h3>
                <?php } ?>
            </div>
            <div class="panel-body">
                <h3 style="color: red" class="text-center"> 密码均默认为123456</h3>
                <form class="form-horizontal cmxform" name="registerForm" id="form" action="<?php echo e(route('daili.member_offline.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder="用户名" />
                            </div>
                        </div>

                    </div><!-- /.box-body -->
                    <input type="hidden" name="is_daili" value="<?php echo $_GET['type']?>">
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">添加</button>
                                &nbsp;<a href="<?php echo e(route('daili.member_offline')); ?>" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('daili.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>