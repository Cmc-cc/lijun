<div class="container-fluid" style="margin-bottom: 10px;">
    <form>
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">选择代理</span>
                    <select name="member_id" id="member_id" class="form-control select2">
                        <option value="">--请选择--</option>
                        <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v->id); ?>" <?php if($member_id == $v->id): ?> selected <?php endif; ?>><?php echo e($v->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">開始時間</span>
                    <input type="text" class="form-control" name="start_at" id="start_at" value="<?php echo e($start_at); ?>" readonly="">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">結束時間</span>
                    <input type="text" class="form-control" name="end_at" id="end_at" value="<?php echo e($end_at); ?>" readonly="">
                </div>
            </div>
            
            <!--<div class="col-lg-3">-->
            <!--    <div class="input-group date-list-center">-->
            <!--        <button type="button" class="btn btn-primary">今天</button>&nbsp;-->
            <!--        <button type="button" class="btn btn-primary">昨天</button>&nbsp;-->
            <!--        <button type="button" class="btn btn-primary">本周</button>&nbsp;-->
            <!--        <button type="button" class="btn btn-primary" style="background-color: #009688;border-color: #009688;">上周</button>&nbsp;-->
            <!--        <button type="button" class="btn btn-primary">本月</button>&nbsp;-->
            <!--        <button type="button" class="btn btn-primary">上月</button>&nbsp;-->
            <!--    </div>-->
            <!--</div>-->
            <div class="row" style="margin-top: 5px;">
                <div class="col-lg-2 pull-right">
                    <div class="input-group">
                        <button id="search" type="submit" class="btn btn-primary">搜索</button>&nbsp;
                        <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                        <button type="button" class="btn btn-warning" onclick="location.href='/admin/daochu2?start_at='+$('#start_at').val()+'&end_at='+$('#end_at').val()">导出</button>&nbsp;
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>