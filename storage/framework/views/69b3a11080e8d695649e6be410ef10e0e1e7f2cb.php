<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="/new0404/js/jquery.min.js"></script>
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <link rel="stylesheet" href="/new0404/pc/css/normalize.css">
    <link rel="stylesheet" href="/new0404/pc/css/main.css">
    <link rel="stylesheet" type="text/css" href="/new0404/pc/css/acc.css">
    <link rel="stylesheet" href="/new0404/pc/css/register.css">
    <link rel="stylesheet" href="/new0404/pc/css/loadingTrack.css">
    <link rel="stylesheet" href="/new0404/pc/css/loading.css">
    <link rel="stylesheet" href="/new0404/pc/css/main-1440.css" media="screen and (max-width:1600px)">
    <link rel="stylesheet" href="/new0404/pc/css/language_tw.css" id="languageCss">
    <link rel="stylesheet" href="/dist/css/swiper.min.css">
    
    <script src="/new0404/js/jquery-ui.js"></script>
    <script src="/new0404/js/jquery.marquee.min.js"></script>
    <script src="/new0404/js/jquery.knob.js"></script>
    <script src="/new0404/js/modernizr.custom.js"></script>
    <script src="/new0404/js/ImgPreload.js"></script>
    <script src="/new0404/js/banner.js"></script>
    <script src="/new0404/js/script.js"></script>
    <style>
    .swiper-container {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }
    .swiper-slide {
        background-size: cover;
        background-position: center;
    }
    .gallery-top {
        height: 80%;
        width: 100%;
    }
    .gallery-thumbs {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }
    .gallery-thumbs .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
    }
    .gallery-thumbs .swiper-slide-active {
        opacity: 1;
    }

    </style>
</head>
<body>
<div class="container2">
    <div class="top-box">
          <div data-app="true" id="app" class="v-application v-application--is-ltr theme--dark">
             <div class="v-application--wrap">
                 <?php echo $__env->make('web.layouts.header_q8', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- main -->
                <div style="width:100%;background: #f7f9fb;">
            			<div class="container">
            				  <?php echo $__env->make('member.layouts.pc_left_user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            				 <div class="right-container">
            				
            			<div class="page-wrapper">
            			<div class="member-container">
            				<div class="member-body">
            					<div id="layout-main-area"><div style="height: 100%; background-color: rgb(255, 255, 255); display: block;" id="layout-main-area-div">
            							
            
            			<div class="member-wrapper">
            				<div class="user-info">
            					<div class="left">
            						<div class="name-row">
            							<h2>
            								<?php echo e($_member->name); ?>

            							</h2>
            							<div class="icons">
            
            								<div class="icon info active ">
            								</div>
            								<div class="icon phone active ">
            								</div>
            								<div class="icon card active ">
            								</div>
            							</div>
            						</div>
            						<div class="star-row">
            											<div class="user-level">
            								VIP 0				</div>
            
            							<div class="stars">
            
            																		<span class="star ">
            								</span>
            													<span class="star ">
            								</span>
            													<span class="star ">
            								</span>
            													<span class="star ">
            								</span>
            													<span class="star ">
            								</span>
            													<span class="star ">
            								</span>
            								
            							</div>
            							<div class="question">
            								<div class="pop-rule">
            									<p class="gray">
            										根据有效投注额划分会员等级
            									</p>
            									<div class="vip-row">
            										<h4>
            											VIP 1
            										</h4>
            										<div class="vip-star vip1">
            										</div>
            										<div class="vip-require">
            											成功充值即可
            											<br>
            											<span class="white">
            												VIP 1
            											</span>
            										</div>
            									</div>
            									<div class="vip-row">
            										<h4>
            											VIP 2
            										</h4>
            										<div class="vip-star vip2">
            										</div>
            										<div class="vip-require">
            											當有效投註總額
            											<br>
            											<span class="white">
            												≥10w
            											</span>
            										</div>
            									</div>
            									<div class="vip-row">
            										<h4>
            											VIP 3
            										</h4>
            										<div class="vip-star vip3">
            										</div>
            										<div class="vip-require">
            											當有效投註總額
            											<br>
            											<span class="white">
            												≥50w
            											</span>
            										</div>
            									</div>
            									<div class="vip-row">
            										<h4>
            											VIP 5
            										</h4>
            										<div class="vip-star vip5">
            										</div>
            										<div class="vip-require">
            											當有效投註總額
            											<br>
            											<span class="white">
            												≥100w
            											</span>
            										</div>
            									</div>
            									<div class="vip-row">
            										<h4>
            											VIP 6
            										</h4>
            										<div class="vip-star vip6">
            										</div>
            										<div class="vip-require">
            											當有效投註總額
            											<br>
            											<span class="white">
            												≥300w
            											</span>
            										</div>
            									</div>
            									<div class="vip-row">
            										<h4>
            											VIP 7
            										</h4>
            										<div class="vip-star vip7">
            										</div>
            										<div class="vip-require">
            											當有效投註總額
            											<br>
            											<span class="white">
            												≥500w
            											</span>
            										</div>
            									</div>
            									<div class="vip-row">
            										<h4>
            											VIP 8
            										</h4>
            										<div class="vip-star vip8">
            										</div>
            										<div class="vip-require">
            											當有效投註總額
            											<br>
            											<span class="white">
            												≥1,000w
            											</span>
            										</div>
            									</div>
            								</div>
            							</div>
            						</div>
            						<div class="level-row">
            							<span class="gray">
            								成功充值即可
            							</span>
            							<span class="bet">
            													0/6
            							</span>
            							<div class="progress-wrapper">
            								<div class="progress-bar">
            									<div class="progress-run" style="width: 0%;">
            									</div>
            								</div>
            								<div class="progress-level">
            									<span class="level-left">
            										VIP 0
            									</span>
            									<span class="level-right">
            										VIP 0
            									</span>
            								</div>
            							</div>
            						</div>
            					</div>
            					<div class="right">
            						<h5>
            							<?php echo e(trans("lang.zhye")); ?>

            						</h5>
            						<span class="credit">
            							<span id="session" style="display:none;"><?php echo e($_member ->account); ?></span>
            							<span>$&nbsp;</span><span id="gamemoneyy"><?php echo e($_member ->money); ?></span>
            						</span>
            						<a href="javascript:void(0);" class="abutton refresh11" style="" id="transfer"><?php echo e(trans("lang.zijinhuishou")); ?></a> 
            						<div class="btn-wrapper">
            							<a class="switchroute" href="/member/new_bank_pay" style="display: block;float:left;width:120px;margin-right: 41px;">
            								<button class="deposit">
            									<span class="btn-icon">
            									</span>
            									<?php echo e(trans("lang.cunkuan")); ?>

            								</button>
            							</a>
            							<a class="switchroute" href="/member/send_fs" style="display: block;float:left;width:120px;margin-right: 41px;">
            								<button class="rebate">
            									<span class="btn-icon">
            									</span>
            									<?php echo e(trans("lang.fanshui")); ?>

            								</button>
            							</a>
            							<a class="switchroute" href="/member/member_drawing_xin" style="display: block;float:left;width:120px;">
            								<button class="withdraw">
            									<span class="btn-icon">
            									</span>
            									<?php echo e(trans("lang.tixian")); ?>

            								</button>
            							</a>
            						</div>
            					</div>
            				</div>
            				<div class="middle-info">
            				    <div class="middle-block">
                				     <div class="swiper-container gallery-top">
                                        <div class="swiper-wrapper">
                                             <?php if($member->bank): ?>
                                            <div class="swiper-slide">
                        						<div class="title-bar">
                        							<h2>
                        								<?php echo e(trans("lang.yhzh2")); ?>

                        							</h2>
                        						</div>
                    							<div class="card">
                        								<div class="card-title">
                        								    <!--style="background-image: url(/images/bank17.png);"--> 
                        									<div class="card-logo fl" ></div>
                        									<div class="card-name fl">
                        																	
                        									</div>
                        									<div class="card-type fr">
                        										 <?php echo e($member->username); ?>	
                        									</div>
                        								</div>
                        								<div class="card-num" style="text-align: center;font-family: Microsoft YaHei,Arial,Helvetica,sans-serif;">
                        									<?php echo e($member->card); ?>						
                        								</div>
                        								<div class="card-owner" style="text-align: center;">
                        								    <?php echo e($member->bank); ?>				
                        								</div>
                        							</div>
                                            </div>
                                            <?php endif; ?>
                                             <?php if($member->fps): ?>
                                             <div class="swiper-slide">
                        						<div class="title-bar">
                        							<h2>
                        								<?php echo e(trans("lang.zsk")); ?>

                        							</h2>
                        						</div>
                    							<div class="card">
                        								<div class="card-title">
                        									<div class="card-logo fl" style="background-image: url(/images/bank17.png);">
                        									</div>
                        									<div class="card-name fl">
                        																	
                        									</div>
                        									<div class="card-type fr">
                        										 <?php echo e($member->username); ?>

                        									</div>
                        								</div>
                        								<div class="card-num" style="text-align: center;font-family: Microsoft YaHei,Arial,Helvetica,sans-serif;">
                        									<?php echo e($member->fps); ?>						
                        								</div>
                        								<div class="card-owner">
                                                            					
                        								</div>
                        							</div>
                                            </div>
                                             <?php endif; ?>
                                             <?php if($member->trc20): ?>
                                             <div class="swiper-slide">
                        						<div class="title-bar">
                        							<h2>
                        								USDT-TRC20
                        							</h2>
                        						</div>
                    							<div class="card">
                        								<div class="card-title">
                        									<div class="card-logo fl" ></div>
                        									<div class="card-name fl">
                        																	
                        									</div>
                        									<div class="card-type fr">
                        										 <?php echo e($member->username); ?>	
                        									</div>
                        								</div>
                        								<div class="card-num" style="font-size: 13px;text-align: center;font-family: Microsoft YaHei,Arial,Helvetica,sans-serif;">
                        									<?php echo e($member->trc20); ?>						
                        								</div>
                        								<div class="card-owner" style="text-align: center;">
                        								   			
                        								</div>
                        							</div>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($member->erc20): ?>
                                             <div class="swiper-slide">
                        						<div class="title-bar">
                        							<h2>
                        								USDT-ERC20
                        							</h2>
                        						</div>
                    							<div class="card">
                        								<div class="card-title">
                        								    <!--style="background-image: url(/images/bank17.png);"--> 
                        									<div class="card-logo fl" ></div>
                        									<div class="card-name fl">
                        																	
                        									</div>
                        									<div class="card-type fr">
                        										 <?php echo e($member->username); ?>	
                        									</div>
                        								</div>
                        								<div class="card-num" style="font-size: 13px;text-align: center;font-family: Microsoft YaHei,Arial,Helvetica,sans-serif;">
                        									<?php echo e($member->erc20); ?>						
                        								</div>
                        								<div class="card-owner" style="text-align: center;">
                        								 				
                        								</div>
                        						</div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="swiper-button-next swiper-button-black" style="top:8rem;right: 0;"></div>
                                        <div class="swiper-button-prev swiper-button-black" style="top:8rem;left: 0;"></div>
                                    </div>
                                </div>
            					<div class="middle-block">
            						<div class="title-bar">
            							<h2><?php echo e(trans("lang.flhd")); ?>

            							</h2>
            							<a href="/activities">
            								<span>
            								<?php echo e(trans("lang.gengduo")); ?> &gt;
            								</span>
            							</a>
            						</div>
            						<div class="promos">
            						      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            						      
            						      	<div class="promo">
            								<h3>
            									<a target="_blank"  href="/activity/<?php echo e($item->id); ?>" style="color:#b77a3e"><?php echo e($item->title); ?></a>
            								</h3>
            								<p>
            									<?php echo e($item->hdsj); ?>

            								</p>
            							</div>
                        				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
            						</div>
            					</div>
            					<div class="middle-block">
            						<div class="title-bar">
            							<h2>
            								<?php echo e(trans("lang.xiaoxi")); ?>

            							</h2>
            							<a href="/notice" class="switchroute">
            								<span>
            									<?php echo e(trans("lang.gengduo")); ?> &gt;
            								</span>
            							</a>
            						</div>
            						 <?php if($msg): ?>
                						<div class="promos">
                							<div class="promo">
            						             <h3>
            								        <a style="color:#b77a3e"><?php echo e($msg->content); ?></a>
                								</h3>
                								<p><?php echo e($msg->created_at); ?></p>
                							</div>
                						</div>
            						<?php else: ?>
                    						<div class="no-info">
                    							<?php echo e(trans("lang.zwjl")); ?>

                    						</div>
                					  <?php endif; ?>
            							
            					</div>
            				</div>
            				<div class="recent-records">
            					<div class="tile-bar">
            						<h2>
            						  <?php echo e(trans("lang.jqjyjl")); ?>

            						</h2>
            						<a class="switchroute" href="/member/customer_report_xin">
            							<span>
            								<?php echo e(trans("lang.baobiao")); ?> &gt;
            							</span>
            						</a>
            					</div>
            					<div class="recent deposit">
            						<div class="recent-head">
            							<img src="/images/cunkuan.png">
            							<p>
            								<?php echo e(trans("lang.chongzhi")); ?>

            							</p>
            						</div>
            						 <?php if($recharge): ?>
            						<div class="recent-body">
            							<div class="block1">
            								<p class="time">
            									<?php echo e(trans("lang.cunkuan")); ?><?php echo e(trans("lang.shijian")); ?>

            									<span>
            									<?php echo e($recharge->created_at); ?>

            									</span>
            								</p>
            								<p class="num">
            									<?php echo e(trans("lang.dingdanhao")); ?>

            									<span>
            											<?php echo e($recharge->bill_no); ?>

            									</span>
            								</p>
            							</div>
            							<div class="block2">
            								<?php echo e(config('platform.recharge_type')[$recharge->payment_type]); ?>

            							</div>
            							<div class="block3">
            								<?php echo e($recharge->money); ?><?php echo e(trans("lang.yuan")); ?>

            							</div>
            							<div class="block4">
            							    <?php if($recharge->status==1): ?><?php echo e(trans("lang.dqr")); ?><?php endif; ?>
            							    <?php if($recharge->status==2): ?><font color="#20a53a"><?php echo e(trans("lang.chenggong")); ?></font><?php endif; ?>
            							    <?php if($recharge->status==3): ?><font color="#ff3300"><?php echo e(trans("lang.shibai")); ?></font><?php endif; ?>
            					    	</div>
            							 <?php else: ?>
            							 <div class="no-info">
            								<?php echo e(trans("lang.zwjl")); ?>

            					        </div>
            				    	<?php endif; ?>
            				    	
            					</div>
            				</div>
            					<div class="recent withdraw">
            						<div class="recent-head">
            							<img src="/images/qukuan.png">
            							<p>
            							    <?php echo e(trans("lang.tixian")); ?>

            							</p>
            						</div>
            						 <?php if($drawing): ?>
            						<div class="recent-body">
            							<div class="block1">
            								<p class="time">
            									<?php echo e(trans("lang.tixian")); ?><?php echo e(trans("lang.shijian")); ?>

            									<span>
            									<?php echo e($drawing->created_at); ?>

            									</span>
            								</p>
            								<p class="num">
            									<?php echo e(trans("lang.dingdanhao")); ?>

            									<span>
            											<?php echo e($drawing->bill_no); ?>

            									</span>
            								</p>
            							</div>
            							<div class="block2">
            								<?php echo e($drawing->bank_name ?  $drawing->bank_name  : ''); ?>

            							</div>
            							<div class="block3">
            								<?php echo e($drawing->money); ?><?php echo e(trans("lang.yuan")); ?>

            							</div>
            							<div class="block4">
            							    <?php if($drawing->status==1): ?><?php echo e(trans("lang.dqr")); ?><?php endif; ?>
            							    <?php if($drawing->status==2): ?><font color="#20a53a"><?php echo e(trans("lang.chenggong")); ?></font><?php endif; ?>
            							    <?php if($drawing->status==3): ?><font color="#ff3300"><?php echo e(trans("lang.shibai")); ?></font><?php endif; ?>
            					    	</div>
            							 <?php else: ?>
            						<div class="no-info">
            								<?php echo e(trans("lang.zwjl")); ?>

            						</div>
            					</div>
            						<?php endif; ?>
            					</div>
            				</div>
            			</div>
                                  <!-- Swiper JS -->
                        <script src="/dist/js/swiper.min.js"></script>
                    
                        <!-- Initialize Swiper -->
                        <script>
                        var galleryTop = new Swiper('.gallery-top', {
                            nextButton: '.swiper-button-next',
                            prevButton: '.swiper-button-prev',
                            spaceBetween: 10,
                            loop:true
                        });
                        var galleryThumbs = new Swiper('.gallery-thumbs', {
                            spaceBetween: 10,
                            centeredSlides: true,
                            slidesPerView: 'auto',
                            touchRatio: 0.2,
                            slideToClickedSlide: true
                        });
                        galleryTop.params.control = galleryThumbs;
                        galleryThumbs.params.control = galleryTop;
                    
                        </script>
            
            			<script>
            				$(function () {
            					var notice_index;
            					$('.du').click(function () {
            
            						var uid = $(this).attr('uid');
            						var msgId = $(this).attr('msgId');
            						var type = $(this).attr('type');
            						$.ajax({
            							type:'GET',
            							url:'/post_msg',
            							dataType:'json',
            							data: {'id': msgId,'type':type,'uid':uid},
            							cache: false,
            							error: function() {
            								alert('Failed!! Please Try Again!!');
            								return false;
            							},
            							success: function(data) {
            								var content = data.content;
            								layer.open({
            									type: 1,
            									area: ['600px', '360px'],
            									shadeClose: true, //点击遮罩关闭
            									content: '<div style="padding:20px;">'+content+'</div>'
            								});
            								 /*notice_index = layer.open({
            									type: 1,
            									title: false,
            									closeBtn: 0,
            									area: ['680px'],
            									skin: 'layui-layer-nobg', //没有背景色
            									shadeClose: true,
            									content: '<div class="notice_layer">' +
            											'<h3>消息详情 <span class="close"></span></h3>' +
            											'<div class="notice_con">' +
            											'<div class="module">' +
            											'<h4>qqqqqqqqqqqqqqqqq</h4>' +
            											'<p>✿</p>' +
            											'</div>' +
            											'</div>' +
            											'</div>'
            								});*/
            
            							}
            						});
            
            
            						$('.notice_layer').on('click', '.close', function () {
            							layer.close(notice_index)
            						});
            					})
            				})
            			</script>
            
            
            			</div></div><span></span>
                </div>
            </div>
            </div> 
            
               </div>
            </div>
</div>
           </div>
        </div>
    </div>
</div>
 <?php echo $__env->make('web.layouts.footer_q8', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- main end -->
</body>
</html>