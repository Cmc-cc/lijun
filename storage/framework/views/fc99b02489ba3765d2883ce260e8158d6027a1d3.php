<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.css')); ?>">
    <script src="<?php echo e(asset('/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">平台转账记录汇总</h3>
             </div>
             <div class="panel-body">
                <div class="container-fluid" style="margin-bottom: 10px;">
    <form action="" method="get" id="searchForm">
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">账户</span>
                    <input type="text" class="form-control" name="name" placeholder="关键字" value="<?php echo e($name); ?>" id="name">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">真实姓名</span>
                    <input type="text" class="form-control" name="real_name" placeholder="真实姓名" value="<?php echo e($real_name); ?>" id="real_name">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">注册IP</span>
                    <input type="text" class="form-control" name="register_ip" placeholder="关键字" value="<?php echo e($register_ip); ?>" id="register_ip">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">上次登录IP</span>
                    <input type="text" class="form-control" name="last_login_ip" placeholder="关键字" value="<?php echo e($last_login_ip); ?>" id="last_login_ip">
                </div>
            </div>
            
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">手机号</span>
                    <input type="text" class="form-control" name="phone" placeholder="手机号" value="<?php echo e($phone); ?>" id="phone">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">上级代理</span>
                    <input type="text" class="form-control" name="top_id" placeholder="上级代理" value="<?php echo e($top_id); ?>" id="top_id">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">来源地址</span>
                    <input type="text" class="form-control" name="register_url" placeholder="来源地址" value="<?php echo e($register_url); ?>" id="register_url">
                </div>
            </div>
            
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">状态</span>
                    <select name="status" id="status" class="form-control">
                        <option value="">--请选择--</option>
                        <?php $__currentLoopData = config('platform.member_status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k =>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($k); ?>" <?php if(is_numeric($status) && $k == $status): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">排序</span>
                    <select name="sort" id="sort" class="form-control">
                        <option value="">--请选择--</option>
                        <option value="1">转入笔数高到低</option>
                        <option value="2">转入笔数低到高</option>
                        <option value="3">转入金额高到低</option>
                        <option value="4">转入金额低到高</option>
                        <option value="5">转出笔数高到低</option>
                        <option value="6">转出笔数低到高</option>
                        <option value="7">转出金额高到低</option>
                        <option value="8">转出金额低到高</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">在线/下线</span>
                    <select name="on_line" id="on_line" class="form-control">
                        <option value="">--请选择--</option>
                        <?php $__currentLoopData = config('platform.member_on_line'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k =>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($k); ?>" <?php if($k == $on_line): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 5px;">
            <div class="col-lg-3 pull-right">
                <div class="input-group">
                    <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                    <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                    <button type="button" class="btn btn-warning" onclick="location.href='/admin/daochu4?name='+$('#name').val()+'&real_name='+$('#real_name').val()+'&register_ip='+$('#register_ip').val()+'&last_login_ip='+$('#last_login_ip').val()+'&phone='+$('#phone').val()+'&top_id='+$('#top_id').val()+'&register_url='+$('#register_url').val()+'&status='+$('#status').val()+'&on_line='+$('#on_line').val()+'&sort='+$('#sort').val()">导出</button>&nbsp;
                </div>
            </div>
        </div>
    </form>
</div>
                 <table id="tab" class="table table-bordered table-hover text-center">
                     <thead>
                     <tr>
                         <th style="width: 5%">ID</th>
                         <th class="text-center" style="width: 5%">用户名</th>
                        <th class="text-center" style="width: 5%">总转入-笔数</th>
                        <th class="text-center" style="width: 5%">总转出-笔数</th>
                        <th class="text-center" style="width: 5%">总转入-金额</th>
                        
                        <th class="text-center" style="width: 5%">总转出-金额</th>



                     </tr>
                     </thead>
                     <tbody>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if($sort){
                                $item = (Object)$item;
                            }
                        ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-primary">
                                        <?php echo e($item->name); ?>

                                    </button>
                                    <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#" class="show-cate" data-uri="<?php echo e(route('member.checkBalance', ['id' => $item->id])); ?>">查看</a></li>
                                        <li><a href="<?php echo e(route('member.edit', ['id' => $item->id])); ?>">修改</a></li>
                                        <li><a href="<?php echo e(route('member.assign', ['id' => $item->id])); ?>">分配代理</a></li>

                                         <?php if($item->status == 0): ?>
                                            <li><a href="<?php echo e(route('member.check', ['id' => $item->id, 'status' => 1])); ?>" onclick="return confirm('确定禁用吗？')">禁用</a></li>
                                         <?php elseif($item->status == 1): ?>
                                            <li><a href="<?php echo e(route('member.check', ['id' => $item->id, 'status' => 0])); ?>" onclick="return confirm('确定启用吗？')">启用</a></li>
                                         <?php endif; ?>
                                        
                                    </ul>
                                </div>
                            </td>
                            <td>
                                 <?php echo e($item->zongzhuanru_bishu); ?>

                             </td>
                             <td>
                                 <?php echo e($item->zongzhuanchu_bishu); ?>

                             </td>
                             <td>
                                 <?php echo e($item->zongzhuanru_jine); ?>

                             </td>
                             
                             <td>
                                 <?php echo e($item->zongzhuanchu_jine); ?>

                             </td>
                         </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                 </table>
                 <?php if($sort): ?>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red"><?php echo count($data);?></strong> 条</p>
                     </div>
                 </div>
                 
                 <?php else: ?>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                     </div>
                     <div class="pull-right" style="margin: 0;">
                         <?php echo $data->appends(['name' => $name, 'status' => $status, 'register_ip' =>$register_ip,'on_line' => $on_line,'last_login_ip'=>$last_login_ip,'top_id'=>$top_id,'register_url'=>$register_url])->links(); ?>

                     </div>
                 </div>
                 <?php endif; ?>
             </div>
         </div>

     </section><!-- /.content -->
     <script>
         $(function(){
             $('#tab').DataTable({
                 "scrollX": true,
                 "scrollY": false,
                 "ordering": false,
                 "paging" : false,
                 'info' : false,
                 'searching' : false
             });
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '记录',
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
                     dataType:'json',
                     success : function(data){
                         _this.css({
                             'background':'url(<?php echo e(asset("/web/images/bg-ico.png")); ?>) no-repeat center center',
                             'background-position': '-80px -102px'
                         })
                         if (data.Code != 0)
                         {
                            //  alert(data.Message);
                             return ;
                         }
                         pos.html(data.Data+'元');
                     },
                     error: function (err, status) {
                         console.log(err)
                     }
                 })
             });
             $('.refresh').trigger('click');
         });
     </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个用户吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>