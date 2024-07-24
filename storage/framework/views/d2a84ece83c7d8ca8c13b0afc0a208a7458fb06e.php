<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">清理数据</h3>
             </div>
             <div class="panel-body">
                 <div class="container-fluid" style="margin-bottom: 10px;">
                    <form action="" method="get" id="searchForm">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">开始时间</span>
                                    <input type="text" class="form-control" name="start_at" id="start_at"  readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">结束时间</span>
                                    <input type="text" class="form-control" name="end_at" id="end_at" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">清理类型</span>
                                    <select class="form-control" name="type" id="type">
                                        <option value="0">请选择</option>
                                        <option value="recharge">会员存款纪录</option>
                                        <option value="drawing">会员提款纪录</option>
                                        <option value="dividend">会员红利纪录</option>
                                        <option value="game_record">会员赢输纪录</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 pull-right">
                                <div class="input-group">
                                    <button type="button" class="btn btn-primary">清理</button>&nbsp;
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                 
             </div>
         </div>
        <script>
            $('.btn-primary').click(function(){
                if(!$('#start_at').val() || !$('#end_at').val()){
                    alert('请选择时间');return;
                }
                if(!$('#type').val() || $('#type').val() == '请选择'){
                    alert('请选择类型');return;
                }
                $.ajax({
                    url:'/admin/clear/do',
                    data:{start_at:$('#start_at').val(),end_at:$('#end_at').val(),type:$('#type').val()},
                    success:function(res){
                        alert('成功');
                        location.reload()
                    }
                })
            })
        </script>
     </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这条站内消息吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>