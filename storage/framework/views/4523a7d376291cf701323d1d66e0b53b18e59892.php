<!--<div class="fixBottom">-->
<!--    <a href="/m/activity_list" id="footer1"><?php echo e(trans("lang.hdzx")); ?></a>-->
<!--    <a href="javascript:void(0);" class="contact kefu_box" id="footer2"><?php echo e(trans("lang.zxkf")); ?><p></p></a>-->
<!--    <a href="/m" id="footer3"><?php echo e(trans("lang.shouye")); ?></a>-->
<!--    <a href="/m/transfer" class="gdbtn" id="footer4"><?php echo e(trans("lang.edzh")); ?></a>-->
<!--	<a href="/m/userinfo" id="footer5"><?php echo e(trans("lang.wode")); ?></a>-->
<!--</div>-->

<script type="text/javascript">
    $('body').on('click','.kefu_box',function(){
        // layer.open({
        //     content: '<div class="layui-m-layerbtn"><a href="<?php echo e(getset('whatsapp_url')); ?>" target="_blank"><span yes="" type="1"  data-clipboard-target="#url">WHATSAPP '+"<?php echo e(getset('whatsapp')); ?>"+'</span></a></div><div class="layui-m-layerbtn"><a href="<?php echo e(getset('service_link')); ?>" target="_blank"><span yes="" type="1"><?php echo e(trans("lang.zxkf")); ?></span></a></div>'
        //     ,skin: 'footer'
        // });
        location.href="<?php echo e(getset('service_link')); ?>"
    })
    function tapCopy(){
        location.href="<?php echo e(getset('whatsapp_url')); ?>"
    }
    function wechat(){
        layer.open({
            content: '<img src="<?php echo e(getset('wx_pic')); ?>" style="width:200px;height:200px;">'
            ,btn: 'OK'
        });
    }
</script>