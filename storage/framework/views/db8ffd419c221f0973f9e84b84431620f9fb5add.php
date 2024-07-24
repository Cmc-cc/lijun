
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">会员编辑</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal cmxform" name="registerForm" id="form" action="<?php echo e(route('member.update', ['id' => $data->getKey()])); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="membername" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name"  placeholder="用户名" value="<?php echo e($data->name); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-sm-2 control-label">真实姓名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="real_name"  placeholder="真实姓名" name="real_name" value="<?php echo e($data->real_name); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="money" class="col-sm-2 control-label">中心账户余额</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="my-money" name=""  value="<?php echo e($data->money); ?>" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ml_money" class="col-sm-2 control-label">码量账户余额</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control"  name="ml_money"  value="<?php echo e($data->ml_money??0); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ml_money" class="col-sm-2 control-label">转盘次数</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control"  name="zhuanpan"  value="<?php echo e($data->zhuanpan??0); ?>"  />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">邮箱</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email" name="email"  value="<?php echo e($data->email); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">手机</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="phone" name="phone"  value="<?php echo e($data->phone); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_username" class="col-sm-2 control-label">名字</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_username" name="username"  value="<?php echo e($data->username); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_name" class="col-sm-2 control-label">银行名称</label>
                            <div class="col-sm-7">
                                <select name="bank" class="form-control">
                                    <option value="">无</option>
                                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($vo); ?>}" <?php if($data->bank==$vo): ?> selected  <?php endif; ?> ><?php echo e($vo); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_card" class="col-sm-2 control-label">银行卡号</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_card" name="card"  value="<?php echo e($data->card); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_username" class="col-sm-2 control-label">转数快账号</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_branch_name" name="fps"  value="<?php echo e($data->fps); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_address" class="col-sm-2 control-label">USDT-ERC20</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_address" name="erc20"  value="<?php echo e($data->erc20); ?>"/>
                            </div>
                        </div>
                        \<div class="form-group">
                            <label for="trc20" class="col-sm-2 control-label">USDT-TRC20</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="trc20" name="trc20"  value="<?php echo e($data->trc20); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fs_money" class="col-sm-2 control-label">登录密码</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="password" name="password" placeholder="不修改则为原密码"  value="<?php echo e($data->o_password); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fs_money" class="col-sm-2 control-label">取款密码</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="qk_pwd" name="qk_pwd" maxlength="6" minlength="6" placeholder="不修改则为原密码" value="<?php echo e($data->qk_pwd); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fs_money" class="col-sm-2 control-label">JOKER转出封顶</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="joker_top" name="joker_top" placeholder="0为跟随系统" value="<?php echo e($data->joker_top); ?>"/>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="<?php echo e(route('member.index')); ?>" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after.js'); ?>
    <script>
        <?php if($data->is_trans_on ==1): ?>
        $(function(){
            var name = '<?php echo e($data->name); ?>';
            var id = '<?php echo e($data->id); ?>';
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
                        $('#my-money').val('');
                        $('#my-money').val(data.Data);
                    }
                }
            })
        })
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>