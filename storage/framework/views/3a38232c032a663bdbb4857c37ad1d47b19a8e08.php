<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">会员添加</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal cmxform" name="registerForm" id="form" action="<?php echo e(route('member.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="_method" value="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="membername" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-7">
                                <input name="name" type="text" class="form-control" id="name"  placeholder="用户名" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="membername" class="col-sm-2 control-label">会员类别</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="is_daili">
                                    <option value="0">普通会员</option>
                                    <option value="1">代理</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="membername" class="col-sm-2 control-label">所属代理</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="top_id">
                                    <option value="0">无代理</option>
                                    <?php $__currentLoopData = $daili; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($v['id']); ?>"><?php echo e($v['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-sm-2 control-label">真实姓名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="real_name"  placeholder="真实姓名" name="real_name" value="" />
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="ml_money" class="col-sm-2 control-label">码量账户余额</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control"  name="ml_money"  value=""  />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">邮箱</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email" name="email"  value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">手机</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="phone" name="phone"  value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="weixin" class="col-sm-2 control-label">微信</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="weixin" name="weixin"  value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="qq" class="col-sm-2 control-label">QQ</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="qq" name="qq"  value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_username" class="col-sm-2 control-label">开户人名字</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_username" name="bank_username"  value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_name" class="col-sm-2 control-label">银行名称</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_name" name="bank_name"  value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_card" class="col-sm-2 control-label">银行卡号</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_card" name="bank_card"  value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_username" class="col-sm-2 control-label">开户行网点</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_branch_name" name="bank_branch_name"  value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_address" class="col-sm-2 control-label">开户地址</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_address" name="bank_address"  value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fs_money" class="col-sm-2 control-label">登录密码</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="password" name="password" placeholder=""  value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fs_money" class="col-sm-2 control-label">取款密码</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="qk_pwd" name="qk_pwd" maxlength="6" minlength="6" placeholder="" value=""/>
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

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>