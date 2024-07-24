<?php ($path = 'member.template.'.$mb_path.'.layouts.main'); ?>

<?php $__env->startSection('content'); ?>
	<div id="layout-main-area">
		<div id="main-menu">
			<div class="menu-area">
				<ul class="list-group">
					<ul class="list-group">
						<li class="list-group-item system-message">
							<a href="<?php echo e(route('member.service_center')); ?>">公告信息</a>
						</li>
						<li class="list-group-item complaint">
							<a href="<?php echo e(route('member.complaint_proposal')); ?>">意见反馈</a>
						</li>
						<li class="list-group-item activity active">
							<a href="JavaScript:void(0)">活动列表</a>
						</li>
						<li class="list-group-item mymessage">
							<a href="<?php echo e(route('member.message_list')); ?>">我的消息</a>
						</li>
					</ul>
				</ul>
			</div>
		</div>

		<div id="main-container">
			<div class="module-main" style="height: 630px; overflow: auto;margin-top:10px;">
				<?php if(isset($data) && count($data) > 0): ?>
					<ul class="list-group">
						<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="list-group-item message-item">
								<div class="message-title"><?php echo e($item->activity->title); ?></div>
								<div class="message-content">
									<?php if($item->status == 3): ?>
										<font color="red">你的活动申请未通过，原因：<?php echo e($item->fail_reason); ?></font>
									<?php endif; ?>
									<?php if($item->status == 2): ?>
										恭喜你，你的活动申请已审核通过，赠送金额已发放到你的账户，请查收！
									<?php endif; ?>
									<?php if($item->status == 1): ?>
										<font color="blue">你的活动申请正在审核，请耐心等耐！</font>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				<?php else: ?>
					<p class="text-center">暂无活动申请记录！</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($path, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>