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

    <script src="/new0404/js/jquery-ui.js"></script>
    <script src="/new0404/js/jquery.marquee.min.js"></script>
    <script src="/new0404/js/jquery.knob.js"></script>
    <script src="/new0404/js/modernizr.custom.js"></script>
    <script src="/new0404/js/ImgPreload.js"></script>
    <script src="/new0404/js/banner.js"></script>
    <script src="/new0404/js/script.js"></script>
</head>
<body>
<div class="container2">
    <div class="top-box">
       <div data-app="true" id="app" class="v-application v-application--is-ltr theme--dark">
             <div class="v-application--wrap">
                <?php echo $__env->make('web.layouts.header_q8', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div style="width:100%;background: #f7f9fb;">
			<div class="container">
				
			 <?php echo $__env->make('member.layouts.pc_left_user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			 <div class="right-container">
       
        
		
<div class="page-wrapper">
<div class="member-container">
	<div class="member-body">
		<div id="layout-main-area"><div style="height: 100%; background-color: rgb(255, 255, 255); display: block;" id="layout-main-area-div">
				    <style type="text/css">
       .dv{ line-height:25px;}
        .body2{
            width: 940px;
            height: auto;
            padding: 10px 0 0 12px;
            margin-left:10px;
            margin-right:10px;
            float:left;
        }
        .tds {
            line-height:25px;
        }
        .STYLE1 {font-weight: bold}
        .STYLE2 {color: #0000FF}
        .STYLE12{ color:#F00;padding:4px 0 0 4px ;}

		.add{width:100%;margin-top:5px}
        .add p{padding:10px 10px 0 70px ;font-size: 14px;}
		.add1, .add p input {
    height: 30px;
    margin-left: 10px;
    line-height: 30px;
    padding-left: 5px;
    width: 200px;
    border-radius: 4px;
    border: 1px solid #ab8c84;
		}

ul,li{list-style: none;}
.kuang1 li{
	height: 46px;
	border: 2px solid #545454;
	float: left;
	margin: 0 10px 12px 0;
}


.kuang1 .blank2{
	border: 2px solid red;
}
.kuang1 li input{
	margin-left: 30px;
	display: none;
}
.kuang1 .checkbox1.cc-checkbox li{
	position: relative;
}

.col-xs-asc{
	width:100%;
	padding-right:15px;
	padding-left:15px
}

</style>

<div style="width:100%;margin-bottom:5px;background: linear-gradient(90deg,#e8e8e8,#cccbca);overflow: hidden;">
	  		<?php if(!$setting->is_qq_on): ?>
		<a href="ali_pay_xin" class="switchroute"><div class="zfu "><span class="zfu1" ><?php echo e(trans('lang.zhuanhuankuai')); ?></span></div></a>
	<?php endif; ?>

	<?php if(!$setting->is_bankpay_on): ?>
		<a href="new_bank_pay" class="switchroute"><div class="zfu"><span class="zfu1"><?php echo e(trans('lang.yinhanghuikuan')); ?></span></div></a>
	<?php endif; ?>

	<?php if(!$setting->is_alipay_on): ?>
		<a href="weixin_pay_xin" class="switchroute"><div class="zfu "><span class="zfu1" ><?php echo e(trans('lang.bldzz')); ?></span></div></a>
	<?php endif; ?>

	<?php if(!$setting->is_wechat_on): ?>
		<a href="usdt_pay_xin" class="switchroute"><div class="zfu bgc"><span class="zfu1" style="color:#f5f5f5"><?php echo e(trans('lang.xnbzf')); ?></span></div></a>
	<?php endif; ?>
			            	  </div>

<div id="main-container">
	<div class="module-main" style="margin-top:26px;">
		<form action="https://www.emixbet.com/member/usdt_pay" method="post" class="form-horizontal">
			<div class="form-group" style="margin-bottom:10px">
				<div class="col-xs-3 control-label"><?php echo e(trans("lang.yhzh")); ?>：</div>
				<div style="float:left;" class="col-xs-6">
					<input type="text" class="form-control" value="<?php echo e($_member->name); ?>" disabled="">
				</div>
				<div class="col-xs-3 info">
					&nbsp;&nbsp; <?php echo e(trans("lang.zdhq")); ?><?php echo e(trans("lang.zanghao")); ?><span class="STYLE12">*</span>
				</div>
			</div>
			<div class="form-group" style="margin-bottom:10px">
				<div class="col-xs-3 control-label"><?php echo e(trans("lang.huikuanjine")); ?>：</div>
				<div style="float:left;" class="col-xs-6">
					<input type="number" class="form-control" placeholder="<?php echo e(trans("lang.qingshuru")); ?><?php echo e(trans("lang.huikuanjine")); ?>" onchange="jine_input2()"  id="amount"  name="amount">
				</div>
				<div class="col-xs-3 info">
					&nbsp;&nbsp;<?php echo e(trans("lang.zdhq")); ?><?php echo e(trans("lang.huikuanjine")); ?><span class="STYLE12">*</span>
				</div>
			</div>
			<div class="form-group" style="margin-bottom:10px">
				<div class="col-xs-3 control-label">USDT汇款数量：</div>
				<div style="float:left;" class="col-xs-6" id="usdtnum">
					0
				</div>
				
			</div>
			<div class="form-group" style="margin-bottom:10px">
				<div class="col-xs-3 control-label">USDT汇率：</div>
				<div style="float:left;" class="col-xs-6">
					<?php echo e($setting->usdt_lv); ?>

				</div>
				
			</div>
			<div class="form-group" style="margin-bottom:16px;">
				<div class="col-xs-3 control-label"><?php echo e(trans("lang.czdz")); ?>：</div>
				<div style="float:left;" class="col-xs-6">
						<input type="text" name="paytime" class="form-control" id="usdt_addr" value="<?php echo e($_system_config->usdt_trc); ?>"  disabled >
				</div>
			</div>
			<div class="form-group" style="margin-bottom:16px;">
				<div class="col-xs-3 control-label" ><?php echo e(trans("lang.skewm")); ?>：</div>
				<div style="float:left;" class="col-xs-6">
						<img src="<?php echo e($_system_config->usdt_trc_pic); ?>" id="usdt_pic" width="200" alt="">
				</div>
			</div>
            <div class="form-group">
				<div class="col-xs-3 control-label"><?php echo e(trans("lang.czleixing")); ?>：</div>
				<div class="col-xs-6">
				<div id="kuang1" style="text-align:left">	
														
	                <ul class="kuang1" id="kuang2">
					<label class="checkbox1 cc-checkbox" style="float:left">
					    <li class="blank2">
						  <table cellpadding="0" cellspacing="0" border="0">
                             <tbody><tr>
                                <td style="height:46px">
                                  <div style="float:left">
								    <div style="font-size:14px;float:left;padding:0 10px;color:#000;">
										<!-- <div style="float:left"><img src="../web/images/bank/zfb.png" style="height:27px"></div> -->
										<div style="float:left;line-height: 27px;color:#000;">&nbsp; USDT（TRC-20）</div>
									</div>
	                                <input type="radio" name="xuankuang" id="rad" value="1">
                                  </div>
                                </td>
                             </tr> 
						   </tbody>
						 </table>		
					</li>
				</label>	
                </ul>
					    				
	                <ul class="kuang1" id="kuang2">
					<label class="checkbox1 cc-checkbox" style="float:left">
					    <li class="">
						  <table cellpadding="0" cellspacing="0" border="0">
                             <tbody><tr>
                                <td style="height:46px">
                                  <div style="float:left">
								    <div style="font-size:14px;float:left;padding:0 10px;color:#000;">
										<!-- <div style="float:left"><img src="../web/images/bank/zfb.png" style="height:27px"></div> -->
										<div style="float:left;line-height: 27px;color:#000;">&nbsp; USDT（ERC-20）</div>
									</div>
	                                <input type="radio" name="xuankuang" id="rad" value="4">
                                  </div>
                                </td>
                             </tr> 
						   </tbody>
						 </table>		
					</li>
				</label>	
                </ul>
			     </div>	
				</div>
			</div>
			<input type="hidden" name="payment_type" value="18">
			<div class="form-group">
			    <div class="col-xs-3 control-label"></div>
				<div class="col-xs-6">
					<button type="button" onclick="chongzhi()"  class="ajax-submit-without-confirm-btn" style="width: 100%;height: 46px;font-size: 16px;color:#fff;font-weight: 800;border: 0px solid #EB5D4D;background:linear-gradient(90deg,#d2b496,#e6ceb6);margin-top:10px;border-radius: 4px;"> <?php echo e(trans("lang.qrcz")); ?></button>
				</div>
			</div>
		</form>

    

	</div>
</div>
	<script type="text/javascript">
	function jine_input2(){
		  //  alert(1)
		  xiaoshu  = Math.floor(Math.random()*90) + 10;
    	let val = $("#amount").val();
        val = val*1+xiaoshu/100;
        $("#amount").val(val)
        
        
		    val = $("#amount").val();
		    val = val / <?php echo e($_system_config->usdt_lv); ?>;
            $('#usdtnum').text('$' + Number(Number(val) + Number(xiaoshu)).toFixed(2))
		}
		
		
        // var account = '<?php echo e($_system_config->usdt_trc); ?>';
        var account = 'USDT-TRC';
		var trc_addr = '<?php echo e($_system_config->usdt_trc); ?>';
		var erc_addr = '<?php echo e($_system_config->usdt_erc); ?>';
		var trc_qr = '<?php echo e($_system_config->usdt_trc_pic); ?>';
		var erc_qr = '<?php echo e($_system_config->usdt_erc_pic); ?>';
		var paytype = 3;
		var bankid  =0;
		(function() {
            
		
		
			var radioWrap = document.getElementById("kuang1"),
					li = radioWrap.getElementsByTagName("li");

			if(li.length > 0) {
				for(var i = 0; i < li.length; i++){
					li[i].onclick = function() {
						for(var i = 0; i < li.length; i++){
							li[i].className = "";
						}
						this.className = "blank2";
					}
				}
				li[0].onclick();
				document.getElementsByName("xuankuang")[0].checked = true;
			}
            $(".kuang1").on('click',function(){
                var i = $(this).index();
                if(i==1){
                    changeType('erc');
                }else{
                    changeType('trc');
                }
            })

		})();
		
		function changeType(v){
		   if(v=='trc'){
		       paytype = 3;
		       account = 'USDT-TRC';
		       $("#usdt_addr").val(trc_addr);
		       $("#usdt_pic").attr('src',trc_qr);
		   }else{
		        paytype = 4;
		        account = 'USDT-ERC';
		       $("#usdt_addr").val(erc_addr);
		       $("#usdt_pic").attr('src',erc_qr);
		   }
		}
		
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