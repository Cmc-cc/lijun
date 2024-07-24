<div class="container-fluid" style="margin-bottom: 10px;">
    <form action="" method="get" id="searchForm">
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">账户</span>
                    <input type="text" class="form-control" name="name" placeholder="关键字" value="<?php echo e($name); ?>">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">真实姓名</span>
                    <input type="text" class="form-control" name="real_name" placeholder="真实姓名" value="<?php echo e($real_name); ?>">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">注册IP</span>
                    <input type="text" class="form-control" name="register_ip" placeholder="关键字" value="<?php echo e($register_ip); ?>">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">上次登录IP</span>
                    <input type="text" class="form-control" name="last_login_ip" placeholder="关键字" value="<?php echo e($last_login_ip); ?>">
                </div>
            </div>
            
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">手机号</span>
                    <input type="text" class="form-control" name="phone" placeholder="手机号" value="<?php echo e($phone); ?>">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">上级代理</span>
                    <input type="text" class="form-control" name="top_id" placeholder="上级代理" value="<?php echo e($top_id); ?>">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">来源地址</span>
                    <input type="text" class="form-control" name="register_url" placeholder="来源地址" value="<?php echo e($register_url); ?>">
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
                    <a href="<?php echo e(route('member.create')); ?>" class="btn btn-primary">添加会员</a>&nbsp;
                </div>
            </div>
        </div>
    </form>
</div>