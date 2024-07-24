<?php $__env->startSection('content'); ?>
    <div class="container-fluid" style="margin-top: 10px;">

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="<?php echo e(route('member.checkBalance', ['id' => $id])); ?>" aria-controls="settings" role="tab" data-toggle="tab">接口余额</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showGameRecordInfo', ['id' => $id])); ?>" aria-controls="home" role="tab" data-toggle="tab">历史输赢</a></li>
                <li role="presentation" class="active"><a href="<?php echo e(route('member.showRechargeInfo', ['id' => $id])); ?>" aria-controls="profile" role="tab" data-toggle="tab">历史充值</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showDrawingInfo', ['id' => $id])); ?>" aria-controls="messages" role="tab" data-toggle="tab">历史提款</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showDividendInfo', ['id' => $id])); ?>" aria-controls="settings" role="tab" data-toggle="tab">历史红利</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showTransfer', ['id' => $id])); ?>" aria-controls="settings" role="tab" data-toggle="tab">平台转账记录</a></li>
            </ul>
        </div>

        <section class="content" style="margin-top: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">历史充值</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid" style="margin-bottom: 10px;">
                        <form action="" method="get" id="searchForm">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">状态</span>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">--请选择--</option>
                                            <?php $__currentLoopData = config('platform.recharge_status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k =>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>" <?php if($k == $status): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">转账类型</span>
                                        <select name="payment_type" id="payment_type" class="form-control">
                                            <option value="">--请选择--</option>
                                            <?php $__currentLoopData = config('platform.recharge_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k =>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>" <?php if($k == $payment_type): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 5px;">
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
                            <th style="width: 5%">ID</th>
                            <th style="width: 15%">订单号</th>
                            <th style="width: 10%">充值金额</th>
                            <th style="width: 10%">赠送金额</th>
                            <th style="width: 10%">汇款方式</th>
                            <th style="width: 10%">账号/卡号</th>
                            <th style="width: 10%">汇款时间</th>
                            <th style="width: 10%">状态</th>
                            <th>操作</th>
                        </tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($item->id); ?>

                                </td>
                                <td>
                                    <?php echo e($item->bill_no); ?>

                                </td>
                                <td>
                                    <?php echo e($item->money); ?>

                                </td>
                                <td>
                                    <?php echo e($item->diff_money); ?>

                                </td>
                                <td>
                                    <?php echo e(config('platform.recharge_type')[$item->payment_type]); ?>

                                </td>
                                <td>
                                    <?php echo e($item->account); ?>

                                </td>
                                <td>
                                    <?php echo e($item->created_at); ?>

                                </td>
                                <td>
                                    <?php echo \App\Models\Base::$RECHARGE_STATUS_HTML[$item->status]; ?>

                                </td>
                                <td>
                                    
                                        

                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td></td>
                            <td><strong style="color: red"><?php echo e($total_recharge); ?></strong></td>
                            <td><strong style="color: red"><?php echo e($total_diff_money); ?></strong></td>
                            <td colspan="5"></td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix">
                        <div class="pull-left" style="margin: 0;">
                            <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                        </div>
                        <div class="pull-right" style="margin: 0;">
                            <?php echo $data->appends(['status' => $status, 'payment_type' => $payment_type])->links(); ?>

                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.basic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>