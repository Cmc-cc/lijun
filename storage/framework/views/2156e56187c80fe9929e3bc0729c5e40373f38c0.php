<?php $__env->startSection('content'); ?>


    <div style="margin-top: 5px;">
        <form class="form-horizontal" id="form" action="<?php echo e(route('url.add')); ?>" method="post">

        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <td style="width: 20%">域名</td>
                    
                    </tr>
            </thead>

            <tr>
            <td>
                <input type="text" class="form-control" id="api_domain" name="url" placeholder="例：api.888.com" value="" />
            </td>
            
            <td style="text-align: left;">
                <button type="button" class="btn btn-primary submit-form-sync">添加</button>
            </td>

            </tr>


        </table>
        </form>
    </div>



     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">接口列表</h3>

             </div>

  
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th>域名</th>
                         <th  >状态</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->url); ?>

                             </td>
                             
                             <td>
                                 <?php if($item->status == 0): ?>
                                    <font color="#ff3300">禁用</font>
                                     
                                 <?php elseif($item->status == 1): ?>
                                    正常
                                 <?php endif; ?>
                                 
                             </td>
                             <td>
                                 <a href="<?php echo e(route('url.edit', ['id' => $item->id])); ?>" class="btn btn-primary btn-xs">修改</a>
                                 <!--<button class="btn btn-danger btn-xs" data-url="<?php echo e(route('url.check', ['id' => $item->id])); ?>" data-toggle="modal" data-target="#delete-modal" >禁用</button>-->
                                 <button class="btn btn-danger btn-xs" data-url="<?php echo e(route('url.destroy', ['id' => $item->id])); ?>" data-toggle="modal" data-target="#delete-modal" >删除</button>
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
     <script>
         $(function(){
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '信息',
                     shadeClose: false,
                     shade: 0.8,
                     area: ['90%', '90%'],
                     content: url
                 });
             })

             $('.refresh').on('click',function(){
                 var _this=$(this);
                 var pos = _this.prev('span');
//                 var money_span = _this.parent('p').next().find('span');
                 _this.css({
                     'background':'url(<?php echo e(asset("/web/images/h-u-loading2.gif")); ?>) no-repeat center center'
                 })
                 $.ajax({
                     type : 'GET',
                     url : _this.attr('data-uri'),
                     data : '',
                     contentType : "application/json; charset=utf-8",
                     success : function(data){

                         _this.css({
                             'background':'url(<?php echo e(asset("/web/images/bg-ico.png")); ?>) no-repeat center center',
                             'background-position': '-80px -102px'
                         })
                         if (data.Code != 0)
                         {
                             alert(data.Message);
                             return ;
                         }
                         pos.html(data.Data+'元');
                     },
                     error: function (err, status) {
                         console.log(err)
                     }
                 })
             })
         });
     </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个接口吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>