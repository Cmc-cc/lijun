<div class="container-fluid" style="margin-bottom: 10px;">
    <form action="" method="get" id="searchForm">
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">用户</span>
                    <input type="text" name="name" class="form-control" value="<?php echo e($name); ?>">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">转出/转入</span>
                    <select name="transfer_type" id="transfer_type" class="form-control">
                        <option value="">--请选择--</option>
                        <?php $__currentLoopData = config('platform.transfer_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($k); ?>" <?php if(is_numeric($transfer_type) && $transfer_type == $k): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">转出账户</span>
                    <select name="transfer_out_account" id="transfer_out_account" class="form-control">
                        <option value="">--请选择--</option>
                        <option value="中心账户" <?php if($transfer_out_account == '中心账户'): ?> selected <?php endif; ?>>中心账户</option>
                        <?php $__currentLoopData = $_api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v); ?>" <?php if($transfer_out_account == $v): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">转入账户</span>
                    <select name="transfer_in_account" id="transfer_in_account" class="form-control">
                        <option value="">--请选择--</option>
                        <option value="中心账户" <?php if($transfer_in_account == '中心账户'): ?> selected <?php endif; ?>>中心账户</option>
                        <?php $__currentLoopData = $_api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v); ?>" <?php if($transfer_in_account == $v): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">请求结果</span>
                    <select name="result" id="result" class="form-control">
                        <option value="">--请选择--</option>
                        <option value="0" <?php if(is_numeric($result) && $result == 0): ?> selected <?php endif; ?>>请求成功</option>
                        <option value="1" <?php if($result == 1): ?> selected <?php endif; ?>>请求失败</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">开始时间</span>
                    <input type="text" class="form-control" name="start_at" id="start_at" value="<?php echo e($start_at); ?>" readonly>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">结束时间</span>
                    <input type="text" class="form-control" name="end_at" id="end_at" value="<?php echo e($end_at); ?>" readonly>
                </div>
            </div>
            <div class="col-lg-2 pull-right">
                <div class="input-group">
                    <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                    <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                    
                </div>
            </div>
        </div>
    </form>
    <script>
        var form_action = "<?php echo e(route('transfer.del')); ?>";
        $(function(){
            $('#delete-btn').click(function(){
                var btn = $(this);
                var go = false;

                layer.confirm('请先确定删除条件，会删除该条件的全部数据，不选择则为删除全部数据，是否确定？', {
                    btn: ['确定', '取消'] //可以无限个按钮
                }, function(index, layero){
                    go = true;
                    if (go == true)
                    {
                        btn.attr('disabled', true);
                        var form = btn.parents('form');

                        var url = form_action;
                        var method = 'POST';

                        var rest_method = form.find("input[name='_method']");
                        var method_s = rest_method.length > 0 ? rest_method.val() : method;
                        var detailLoad = layer.load(2, {
                            shade: [0.2, '#ccc'], //遮罩层背景色、透明度,
                            //shade:false
                        });

                        $.ajax({
                            type: method_s,
                            url: url,
                            data: form.serialize(),
                            dataType: "json",
                            success: function(data){
                                layer.close(detailLoad);
                                btn.attr('disabled', false);

                                var html = '';
                                var obj = JSON.parse (data.status.msg);

                                for ( var p in obj )
                                {
                                    if (typeof (obj[p]) == 'string')
                                    {
                                        html+= '<p><b>'+ obj[p] + '</b></p>';
                                    } else if(obj[p] instanceof Array)
                                    {
                                        for (var i=0;i<obj[p].length;i++)
                                        {
                                            html+= '<p><b>'+ obj[p][i] + '</b></p>';
                                        }

                                    }
                                }
                                //
                                layer.confirm(html, {
                                    btn: ['确定'] //按钮
                                });
                                if (data.url)
                                    location.href=data.url;
                                //else
                                //    layer.confirm(html, {
                                //        btn: ['确定'] //按钮
                                //    });

                            }
                        });
                    }
                }, function(index){
                    layer.close(index);
                    return false;
                });


            })

        })
    </script>
</div>