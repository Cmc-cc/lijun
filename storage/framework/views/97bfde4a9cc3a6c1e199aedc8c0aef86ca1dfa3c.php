<!DOCTYPE html>
<!-- saved from url=(0039)https://www.cash669.net/m/activity_list -->
<html style="font-size:52px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title><?php echo e($_system_config->site_title); ?></title>
    <meta name="csrf-token" content="hdTwSaWpGN5mN7lLEUAHS2P04CoXPy2jQ9CEAYGw">
	<link type="text/css" rel="stylesheet" href="/new/css/swiper.css">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<link type="text/css" rel="stylesheet" href="/new/css/style.css">
	<link rel="apple-touch-icon" href="https://www.cash669.net/wap/images/iconq.png">

	<script type="text/javascript" src="/new/css/jquery.js"></script>
	<script type="text/javascript" src="/new/css/font.js"></script>
	<script type="text/javascript" src="/new/css/swiper.min.js"></script>
	<script type="text/javascript" src="/new/css/jquery.SuperSlide.2.1.js"></script>

	
    	<meta name="apple-mobile-web-app-capable" content="yes"><!-- 删除苹果默认的工具栏和菜单栏 -->
    <meta name="x5-fullscreen" content="true"><!-- QQ强制全屏 -->
    <meta name="full-screen" content="yes"><!-- UC强制全屏 -->
<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>
<body class="m_bac">
<style>
    .btn4 {
    display: block;
    text-align: center;
    color: #fff;
    font-size: .28rem;
    line-height: .98rem;
    background: #d2b79c;
    border-radius: 0.12rem;
    width: 100%;
    border: none;
    padding: 0;
}
</style>
    <div class="m_container">

		<div class="nytop">
			<a href="javascript:history.go(-1);" class="fhbtn"></a>
			<h1><?php echo e(trans("lang.hdxq")); ?></h1>
			<h2><a class="kefu_box"><?php echo e(trans("lang.zxkf")); ?></a></h2>
		</div>
    		<div class="zzc">
        		<div class="zzc_tit">
        			<h2><?php echo e($data->title); ?></h2>
        		</div>
        		<div class="qbhd_nr">
        			<ul>
        					<li>
        						<div class="qbhdbox" style="height:auto;background: #fff">
        							<h3><?php echo stripslashes($data->content); ?></h3>
                            
                                    <?php if($data->is_apply == 0): ?>
                                        <?php if($_member): ?>
                                                <input type="hidden" name="activity_id" value="<?php echo e($data->id); ?>" class="apply" id="activity_id">
                                                <button type="button" class="btn4 ajax-submit-btn apply" id="fanshuic" >
                                                    申請活動
                                                </button>
                                        <?php else: ?>
                                            <button type="button" class="btn4 ajax-submit-btn apply"onclick="alert('請先登入')">
                                                申請活動
                                            </button>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    
        						</div>
        					</li>
        			</ul>
        		</div>
        	</div>
</div>


</body>
</html>


<script type="text/javascript">

    setTimeout(function(){
        $('#footer1').addClass('cur')
    },350);
    var ok = 1;
    $('#fanshuic').click(function(){
        if(ok != 1){
            return;
        }
        ok = 0;
        $.ajax({
            url:"<?php echo e(route('member.apply_activity')); ?>",
            type:'post',
            data:{activity_id:$('#activity_id').val()},
            success:function(data){
                ok = 1;
                alert(data.status.msg);
                //if(data.status.errorCode==0){
                    //$(".apply").hide();
               // }
            }
        })
    })
</script>


<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js?t=100"></script>


</body></html>