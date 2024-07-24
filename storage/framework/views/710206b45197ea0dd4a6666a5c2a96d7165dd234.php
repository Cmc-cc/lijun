<?php ($path = 'member.template.'.$mb_path.'.layouts.main'); ?>

<?php $__env->startSection('content'); ?>
    <div id="layout-main-area">
        <div id="main-menu">
            <div class="menu-area">
                <ul class="list-group">
                    <li class="list-group-item member-info">
                        <a href="<?php echo e(route('member.userCenter')); ?>">会员资料</a>
                    </li>
                    <li class="list-group-item member-password">
                        <a href="<?php echo e(route('member.login_psw')); ?>">修改密码</a>
                    </li>
                    <li class="list-group-item member-info active">
                        <a href="<?php echo e(route('member.user_fs')); ?>">实时返水</a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="main-container">
            <form action="<?php echo e(route('member.send_fs')); ?>" method="post">
            <div class="form-group">
                <label class="col-xs-6">可换金额:<span style="color: red"><?php echo e($total['fs_money']); ?>元</span></label>
                <input type="hidden" name="gane_str" value="<?php echo e($total['game_str']); ?>">
                <div class="col-xs-6">
                    <button type="button" class="btn btn-primary form-control ajax-submit-btn">全部兑换</button>
                </div>
            </div>
            </form>
            <?php
                $i= 0;
            ?>
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($v) > 0): ?>
                    <?php $i++?>
                <div class="info-container">
                    <div class="info" style="color:#333;">
                        <span style="font-weight: bold"><?php echo e(config('platform.game_type')[$k]); ?>类</span>
                        <span>最近<?php echo e(date('Y-m-d H:i:s')); ?></span>
                    </div>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>日期</th>
                            <th>投注流水</th>
                            <th>返水等级</th>
                            <th>返水额度</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $v; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($kk); ?><?php if($kk == date('Y-m-d')): ?> (今天) <?php endif; ?></td>
                            <td><?php echo e($vv['tz_amount']); ?>元</td>
                            <td><?php echo e($vv['level_name'] ? $vv['level_name'] : '未满足条件'); ?></td>
                            <td><?php echo e($vv['fs_money']); ?>元</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($i  <= 0): ?>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>日期</th>
                        <th>投注流水</th>
                        <th>返水等级</th>
                        <th>返水额度</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" style="text-align: center;">暂无记录</td>
                        </tr>
                    </tbody>
                </table>
                <?php endif; ?>
        </div>
    </div>
    <script>
        $(function () {
            var fs_money = "<?php echo e($total['fs_money']); ?>";
            if(fs_money <= 0) {
                $('.ajax-submit-btn').attr('disabled', true);
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($path, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>