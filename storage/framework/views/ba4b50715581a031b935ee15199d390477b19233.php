<?php $__env->startSection('content'); ?>


    <div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a>查询用户名</a></li>
        </ul>
    </div>
    <div style="margin-top: 5px;">
        <form class="form-horizontal"  method="post">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <td style="width: 20%">用户名</td>
                    <td style="width: 20%">游戏接口</td>
                    <td style="width: 10%"></td>
                </tr>
            </thead>
            <tr>
                <td>
                    <input type="text" class="form-control" id="username" name="api_domain" placeholder="例：test001" value="" />
                </td>
                <td>
                    <input type="text" class="form-control" id="api_name_1" name="api_name_1" placeholder="例：KY_HK" value="" />
                </td>
                <td style="text-align:left;">
                    <button type="button" class="btn btn-primary" id="gameurl_1">提交</button>
                </td>
                <td id="api_username" style="text-align:left;">
                   
                </td>
                
                
            </tr>
            

        </table>
        </form>
    </div>
    
    <div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a>查询游戏接口链接</a></li>
        </ul>
    </div>
    
    
    <div style="margin-top: 5px;">
        <form class="form-horizontal"  method="post">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <td style="width: 20%">用户名</td>
                    <td style="width: 20%">游戏接口</td>
                    <td></td>
                    </tr>
            </thead>
            
            <tr>
                <td>
                    <input type="text" class="form-control" id="api_username2" name="api_username2" placeholder="例：test001" value="" />
                </td>
                <td>
                    <input type="text" class="form-control" id="api_name" name="api_name" placeholder="例：KY_HK" value="" />
                </td>
                <td style="text-align:left;">
                    <button type="button" class="btn btn-primary" id="gameurl">提交</button>
                </td>

            </tr>
            

        </table>
        </form>
        <p id="api_url"></p>
    </div>
    
    <div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a>查詢額度轉換訂單的鏈接</a></li>
        </ul>
    </div>
    
    
    <div style="margin-top: 5px;">
        <form class="form-horizontal"  method="post">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <td style="width: 10%">用户名</td>
                    <td style="width: 10%">游戏接口</td>
                    <td style="width: 10%">金额</td>
                    <td style="width: 10%">订单号</td>
                    
                    <td style="width: 10%">类型</td>
                    <td></td>
                    </tr>
            </thead>
            
            <tr>
                <td>
                    <input type="text" class="form-control" id="api_username3" name="api_username3" placeholder="例：test001" value="" />
                </td>
                <td>
                    <input type="text" class="form-control" id="api_name2" name="api_name2" placeholder="例：KY_HK" value="" />
                </td>
                <td>
                    <input type="text" class="form-control" id="amount" name="amount" placeholder="例：100" value="" />
                </td>
                <td>
                    <input type="text" class="form-control" id="order_no" name="order_no" placeholder="例：20230214015126GmI87" value="" />
                </td>
                <td>
                    <select id="inout">
                        <option value="1">转入</option>
                        <option value="2">转出</option>
                    </select>
                </td>
                <td style="text-align:left;">
                    <button type="button" class="btn btn-primary" id="gameurl2">提交</button>
                </td>

            </tr>
            

        </table>
        </form>
        <p id="api_url2"></p>
    </div>
    
    
    <script>
    $('#gameurl_1').click(function(){
        $.ajax({
                url:'/api/user?game='+$('#api_name_1').val()+'&name='+$('#username').val(),
                success:function(res){
                    $('#api_username').text(res)
                }
            })
    })
        $('#gameurl').click(function(){
            $.ajax({
                url:'/admin/apple/urledit',
                data:{'api_username':$('#api_username2').val(),'api_name':$('#api_name').val(),'type':1},
                success:function(res){
                    console.log(res,123)
                    $('#api_url').text(res.data)
                }
            })
        })
        
        $('#gameurl2').click(function(){
            $.ajax({
                url:'/admin/apple/urledit',
                data:{'api_username':$('#api_username3').val(),'amount':$('#amount').val(),'order_no':$('#order_no').val(),'type':2,'inout':$('#inout').val(),'api_name':$('#api_name2').val()},
                success:function(res){
                    console.log(res,123)
                    $('#api_url2').text(res.data)
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个接口吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>