<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">审核申请用户</h3>
                    </div>
                    <!--内容头部-->
                    <form class="form-horizontal cmxform" name="registerForm" id="form" action="<?php echo e(route('activity_apply.confirm', ['id' => $data->getKey()])); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="_method" value="put">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">申请主题</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo e($data->activity->title); ?>" disabled>
                                </div>
                            </div>							
                            <div class="form-group">
                                <label for="member_id" class="col-sm-2 control-label">申请用户</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="member_id" name="member_id" value="<?php echo e($data->member->name); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="money" class="col-sm-2 control-label">用户余额</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="money" name="money" value="<?php echo e($data->member->money); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="givemoney" class="col-sm-2 control-label">赠送金额</label>
                                <div class="col-sm-7">
                                    <font color="#ff3300">上次充值金额<?php if(@$last): ?> <?php echo e($last->money); ?> <?php else: ?> 无 <?php endif; ?></font>
                                    <input type="number" class="form-control" id="givemoney" name="givemoney" value="<?php echo e($givemoney); ?>"/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="givemoney" class="col-sm-2 control-label">赠送码量</label>
                                <div class="col-sm-7">
                                    <?php if(!@$last): ?>
                                    <input type="number" class="form-control" id="ml_money" name="ml_money" value="<?php echo e($givemoney * $data->activity->pointer); ?>"/>
                                    <?php else: ?>
                                    <input type="number" class="form-control" id="ml_money" name="ml_money" value="<?php echo e(($last->money + $givemoney )* $data->activity->pointer - $last->money); ?>"/>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-7">
                                    <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                    &nbsp;<a href="<?php echo e(route('activity_apply.index')); ?>" class="btn btn-info">返回</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
<script>
    $(function(){
        var name = '<?php echo e($data->member->name); ?>';
        var id = '<?php echo e($data->member->id); ?>';
        $.ajax({
            type:'get',
            url : "<?php echo e(route('member.get_money')); ?>",
            data : {name:name,id:id},
            dataType : 'json',
            success : function (data) {
                //console.log(data);
                if (data.Code != 0)
                {
                    alert(data.Message);
                    return ;
                }else{
                    $('input[name=money]').val('');
                    var money =parseFloat(data.Data);
                    $('input[name=money]').val(money.toFixed(2));
                }
            }
        })
    })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>