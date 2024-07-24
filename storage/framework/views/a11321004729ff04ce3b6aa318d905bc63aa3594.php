<html style="height: 100%" language="tw">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="yes" name="apple-touch-fullscreen">
	<meta content="telephone=no" name="format-detection">
	<meta content="black" name="apple-mobile-web-app-status-bar-style">
	<meta name="viewport"
		  content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
	<meta name="env" content="stage">
	<meta name="csrf-token" content="ZeQipUdvBNrJPGLcfKIEuKmvLgjaEInNkWLn1ya0">
	<meta name="notify-msg" content="">
	<meta name="notify-type" content="">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<link type="text/css" rel="stylesheet" href="/new/css/style.css">
	<link rel="stylesheet prefetch" href="/new0404/css/bootstrap.min.css">
	<link rel="stylesheet" href="/new0404/css/Language_tw.css?202204071330" id="languageCss" cachetime="202204071330">
	<link rel="stylesheet" href="/new0404/css/swiper.min.css">
	<link rel="stylesheet" href="/new0404/css/game_hall_new.css">
	<link rel="stylesheet" href="/new0404/css/game_hell_new_extend.css">
	<link rel="stylesheet" href="/new0404/css/new_ui.css">
	<link href="/new0404/css/login_lx.css?202204042350" rel="stylesheet">
	<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>
	<title><?php echo e($_system_config->site_title); ?></title>
	<script src="/new0404/js/jquery.min.js"></script>
	<script src="/new0404/js/swiper.min.js"></script>
	<script src="/new0404/js/app.js"></script>
	<script src="/new0404/js/qrcode.min.js"></script>
	<script src="/new0404/js/Language.js?202204071330"></script>
	<script src="/new0404/js/Config.js?202204071330"></script>
	<script src="/new0404/js/Public.js?202204071330"></script>

	<script>
		window.langName = 'cn';
	</script>

	<style>
		@-webkit-keyframes marqueeAnimation-4449094 {
			100% {
				transform: translateX(-2470.84px)
			}
		}

		@-webkit-keyframes marqueeAnimation-8102871 {
			100% {
				transform: translateX(-2470.84px)
			}
		}
	</style>
</head>

<!-- 隱藏loadin倒數 body class移除no-scroll、 pages-loading-box class增加ani display:none; -->
<body ontouchstart="" style="height: 100%;">
<div class="body-pages" style="height: 100%; overflow: auto; display: block;">
	<div class="pages-container show">
            <a data-link="" class="close-btn" href="/m"></a>
            <!-- 個人中心 -->
            <div data-page-name="user-center" class="pages-main page-user-center-main active ani">
                <div class="header">
                    <div class="title" style="height: 10.7vmin;">
                        <div class="title-text"><?php echo e(trans("lang.wode")); ?></div>
                        <div class="title-config">
                            <div class="config btn-pages user-center-item" data-page-name="security-settings" onclick="location.href='/m/service'"></div>
                            <a class="news btn-pages user-center-item" href='/m/msg'></a>
                        </div>
                    </div>
                    <div class="info">
                        <div class="info-img logined"></div>
                        <div class="info-data"><?php echo e($_member -> name); ?></div>
                    </div>
                    <div class="center">
                        
                        <div class="center-right task btn-pages user-center-item" onclick="location.href='/m/activity_list'" style="width: 50%;">
                            <div class="center-img task"></div>
                            <div class="center-text1 task"><?php echo e(trans("lang.hdzx")); ?></div>
                            <div class="center-text2 task">TASK CENTER</div>
                        </div>
                        <div class="center-left vip" style="width: 50%;" onclick="location.href='/m/agent'">
                            <div class="center-img vip"></div>
                            <div class="center-text1 vip"><?php echo e(trans("lang.dlzx")); ?></div>
                            <div class="center-text2 vip">VIP PRIVILEGE</div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="tab-item mymoney btn-pages user-center-item" onclick="location.href='/m/bank'">
                            <div class="tab-img mymoney"></div>
                            <div class="tab-text mymoney">银行卡管理</div>
                        </div>
                        <div class="tab-item betrecord btn-pages user-center-item xmjf" >
                            <div class="tab-img betrecord"></div>
                            <div class="tab-text betrecord"><?php echo e(trans("lang.ssfs")); ?></div>
                        </div>
                        <div class="tab-item transactionrecord btn-pages user-center-item" onclick="location.href='/m/recharge_record'">
                            <div class="tab-img transactionrecord"></div>
                            <div class="tab-text transactionrecord"><?php echo e(trans("lang.baobiao")); ?></div>
                        </div>
                    </div>
                    <!-- <div class="tab">
                        <div class="tab-item cardmanagement btn-pop" data-pop="add-card-dialog">
                            <div class="tab-img cardmanagement"></div>
                            <div class="tab-text cardmanagement text_341"></div>
                        </div>
                    </div> -->
                </div>
                <div class="content">
                    <!-- <div class="content-row">
                        <div class="content-row-box btn-pages user-center-item" data-page-name="content-help">
                            <div class="icon help"></div>
                            <div class="title text_342"></div>
                            <div class="remark text_343"></div>
                            <img class="more" />
                        </div>
                    </div> -->
                    <div class="content-row">
                        <div class="content-row-box btn-pages user-center-item" data-page-name="BankManagement" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <div class="icon redeem-record"></div>
                            <div class="title" style="    text-align: center;"><?php echo e(trans("lang.tcdl")); ?></div>
                            <!-- <div class="remark"></div> -->
                    
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
	
    
    <form id="logout-form" action="<?php echo e(route('wap.logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form> 
                            
                            
<div class="bj"></div>
	<div class="cmtc" style="bottom:-25rem;">
		<form action="/m/send_fsss" method="post" onsubmit="$('.submit-form-sync').attr('disabled',true);">
			<div class="cmtc_tit"><h2><?php echo e(trans("lang.ssfs")); ?></h2></div>
			<div class="cmnr">
								<h2><span>$&nbsp;</span><strong id="zongfangshui"><?php echo e($total['fs_money']); ?></strong></h2>
				<p class="xmsm"><?php echo e(trans("lang.zzxm")); ?></p>
			</div>
			<div class="cmbtn">
				<ul>
					<li><a href="javascript:void(0);" class="btn3"><?php echo e(trans("lang.quxiao")); ?></a></li>
					<li>
						<button type="button" class="btn4 ajax-submit-btn" id="fanshuic">
							<?php echo e(trans("lang.qr")); ?>

						</button>
					</li>
				</ul>
			</div>
		</form>
	</div>

	

	
	<script src="/new0404/js/jweixin-1.0.0.js"></script>
	<script src="/new0404/js/marquee.js?202204071330"></script>
	<!--<script src="/new0404/js/demo.js?202204071330"></script>-->
	<script src="/new0404/js/game-hall.js?202204071330"></script>
	<script src="/new0404/js/address.js"></script>
	<script type="text/javascript" src="/new/css/layer.js"></script>
</div>


<script>

$('.xmjf').click(function(){
	$('.cmtc').css('bottom','20px');
	$('.bj').fadeIn();
})
$('.btn3').click(function(){
			$('.cmtc').css('bottom','-25rem');
			$('.bj').fadeOut();
		})
$('#fanshuic').click(function(){
	    var btn = $('#fanshuic');
        btn.attr("disabled",true);
        $.ajax({
            url : "<?php echo e(route('wap.send_fs')); ?>",
            type : 'POST',
            success : function (data) {
                alert(data.status.msg);
                if(data.status.errorCode == 0){
                    btn.attr("disabled",false);
                    window.location.reload();
                    //location.href=data.url;
                }
            }
        })
        return false;
	})
</script>
</body>
</html>
<?php echo $__env->make('wap.template.theme10.layouts.fotter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>