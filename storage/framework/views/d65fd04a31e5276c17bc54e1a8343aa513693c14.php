<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">转盘奖品列表</h3>
             </div>
             <div class="panel-body">

                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 10%">ID</th>
                         <th  style="width: 10%">奖品名称</th>
                         <th  style="width: 10%">金额</th>
                         <th  style="width: 20%">概率</th>
                         <th  style="width: 10%">累计中奖次数</th>
                         <th  style="width: 5%">排序</th>
                         <th  style="width: 20%">最后更新时间</th>
                         <th  style="width: 5%">上线/下线</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                 <?php echo e($item->name); ?>

                             </td>
                             <td>
                                 <?php echo e($item->money); ?>

                             </td>
                             <td>
                                 <?php echo e($item->rate); ?>%
                             </td>
                             <td>
                                 <?php echo e($item->times); ?>

                             </td>
                             <td>
                                 <?php echo e($item->sort); ?>

                             </td>
                             <td>
                                 <?php echo e($item->updated_at); ?>

                             </td>
                             <td>
                                 <?php echo \App\Models\Base::$ON_LINE_HTML[$item->on_line]; ?>

                             </td>
                             <td>
                                 <?php if($item->on_line == 0): ?>
                                     <a href="<?php echo e(route('red.check', ['id' => $item->getKey(), 'status' => 1])); ?>" class="btn btn-danger btn-xs" onclick="return confirm('确定下线吗？')">下线</a>
                                 <?php elseif($item->on_line == 1): ?>
                                     <a href="<?php echo e(route('red.check', ['id' => $item->getKey(), 'status' => 0])); ?>" class="btn btn-success btn-xs" onclick="return confirm('确定上线吗？')">上线</a>
                                 <?php endif; ?>
                                 <a href="<?php echo e(route('red.edit', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">修改</a>
                                 
                                         
                                         
                                         
                                 
                                     
                                 
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