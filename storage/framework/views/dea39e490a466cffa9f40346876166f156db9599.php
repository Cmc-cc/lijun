<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">api清零记录</h3>
             </div>
             <div class="panel-body">
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                        <th style="width: 10%">时间</th>
                        <th style="width: 90%">接口信息</th>

                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->createtime); ?>

                             </td>
                             
                             <td>
                             	  <?php
                             	    $apilist = unserialize($item->text);
                             	  ?>
                             	  <?php $__currentLoopData = $apilist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             	    <button class="btn btn-danger btn-sm" style="margin-top:10px;">
                                        <?php echo e($v['api_name']); ?>:<?php echo e($v['api_money']); ?>

                                    </button>
                                    
                             	    
                             	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这条记录吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>