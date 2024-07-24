<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.css')); ?>">
    <script src="<?php echo e(asset('/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">码量记录</h3>
             </div>
             <div class="panel-body">
                <div class="container-fluid" style="margin-bottom: 10px;">
                    <form action="" method="get" id="searchForm">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">用户名</span>
                                    <input type="text" class="form-control" name="name" placeholder="关键字" value="<?php echo e($name); ?>">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-addon">类型</span>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">--请选择--</option>
                                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k =>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php if($k == $status): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">开始时间</span>
                                    <input type="text" class="form-control" name="start_at" id="start_at" value="<?php echo e($start_at); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">结束时间</span>
                                    <input type="text" class="form-control" name="end_at" id="end_at" value="<?php echo e($end_at); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px;">
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
                         <th style="width: 10%">ID</th>
                         <th  style="width: 10%">用户</th>
                         <th  style="width: 10%">变动前</th>
                         <th  style="width: 10%">变动数量</th>
                         <th  style="width: 10%">变动后</th>
                         <th  style="width: 10%">类型</th>
                         <!--<th  style="width: 10%">备注</th>-->
                         <th  style="width: 10%">时间</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                 <?php echo e($item->member->name); ?>

                             </td>
                             <td>
                                 <?php echo e($item->before); ?>

                             </td>
                             <td>
                                 <?php echo e($item->money); ?>

                             </td>
                             <td>
                                 <?php echo e($item->after); ?>

                             </td>
                             <td>
                                 <?php echo e($item->type_str); ?>

                             </td>
                             <!--<td>-->
                             <!--    <?php echo e($item->memo); ?>-->
                             <!--</td>-->
                             <td>
                                 <?php echo e($item->created_at); ?>

                             </td>
                         </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     <?php echo $data->render(); ?>

                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>