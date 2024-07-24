<!DOCTYPE html>
<!-- saved from url=(0029)/m/nav -->
<html style="font-size:52.400000000000006px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title>{{ $_system_config->site_title}}</title>
    <meta name="csrf-token" content="YDo4JRuWXJvw0xMWks04m1wWy4YRz4UeJMzdfzr4">
	<link type="text/css" rel="stylesheet" href="/new/css/swiper.css">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<link type="text/css" rel="stylesheet" href="/new/css/style.css">
	<link rel="apple-touch-icon" href="/wap/images/iconq.png">

	<script type="text/javascript" src="/new0404/js/jquery.min.js"></script>
	<script type="text/javascript" src="/new0404/js/clipboard.js"></script>
	
	<script type="text/javascript" src="/new/css/font.js"></script>
	<script type="text/javascript" src="/new/css/swiper.min.js"></script>
	<script type="text/javascript" src="/new/css/jquery.SuperSlide.2.1.js"></script>

	
    	<meta name="apple-mobile-web-app-capable" content="yes"><!-- 删除苹果默认的工具栏和菜单栏 -->
    <meta name="x5-fullscreen" content="true"><!-- QQ强制全屏 -->
    <meta name="full-screen" content="yes"><!-- UC强制全屏 -->
<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>


<body style="background:none !important;display:none ;">
@if($type == 1)
<section id="xin_tixian_alert">
        <section class="xin_zhifu_alert" style="height: 86%;">
            <h4>{{trans("lang.tixian")}}</h4>
            <section class="xin_zhifu_alert_content">
                <section class="xin_type_1" style="padding-top: 0;">
                    <article class="xin_jine" style="margin-top: 0.7rem;">
                        <select class="jine" name="bank_name" id="bank_name" style="width: 90%;">
                            <option value="" >-- {{trans("lang.qxz")}} --</option>
                            @if($member->fps)
                                <option value="1">{{trans("lang.zsk")}}</option>
                            @endif
                            @if($member->card)
                                <option value="2">{{trans("lang.yinhangka")}}</option>
                            @endif
                            @if($member->erc20)
                                <option value="3">erc20</option>
                            @endif
                            @if($member->trc20)
                                <option value="4">trc20</option>
                            @endif
                        </select>
                    </article>
                    <article class="xin_jine" style="margin-top: 0.5rem;position: relative; ">
                        <input type="number" name="money" id="money" autocomplete="off" placeholder="{{trans("lang.tkje")}}" class="jine" style="width: 86%;text-align: center;">
                        <img src="/images/icon_10.png" alt="" onclick="$('#money').val('');" style=" position: absolute; right: 17%;">
                    </article>
                    <article class="xin_jine" style="margin-top: 0.5rem;">
                        <input type="password" style="width: 86%;" name="qk_pwd" id="qk_pwd" autocomplete="off" placeholder="{{trans("lang.tkmm")}}" class="jine">
                    </article>
                    <article class="xin_jine" style="margin-top: 0.5rem;">
                        <input type="text" disabled style="width: 86%;"  autocomplete="off" class="jine" value="{{trans("lang.shengyumaliang")}}: {{$member->ml_money}}">
                    </article>
                    <article class="xin_jine" style="margin-top: 0.5rem;">
                        <input type="text" disabled style="width: 86%;"  autocomplete="off" class="jine" value="{{trans("lang.yue")}}: {{$member->money}}">
                    </article>

                    <article style="height:1.7rem;"></article>
                    <button class="type_1_btn" onclick="tixian()">{{trans("lang.querentixian")}}</button>
                </section>
            </section>
            <article class="xin_zhifu_bottom">
                <img src="/images/icon_9.png" alt="" onclick="window.parent._close_fu();">
            </article>
        </section>
    </section>
	@else
	
	<section id="xin_zhifu_alert">
		<section class="xin_zhifu_alert">
			<h4>{{trans("lang.chongzhi")}}</h4>
			<section class="xin_zhifu_alert_content">
				<article class="xin_zhifu_nav">
					@if(!$setting->is_qq_on)
					<article class="dopay on" onclick="qiehuan(1,this,'{{trans('lang.zhuanhuankuai')}}')"><img src="/new/css/fps.png" alt="" style="width: 70%;"></article>
					@endif

					@if(!$setting->is_bankpay_on)
					<article class="dopay" onclick="qiehuan(4,this,'{{trans('lang.yinhangka')}}')"><img src="/new/css/add2_i911.png" alt="" style="width: 76%;"></article>
					@endif

					@if(!$setting->is_alipay_on)
					<article class="dopay" onclick="qiehuan(2,this,'{{trans('lang.bldzz')}}')"><img src="/new/css/bld.png" alt=""></article>
					@endif

					@if(!$setting->is_wechat_on)
					<article class="dopay" onclick="qiehuan(3,this,'{{trans('lang.xnbzf')}}')"><img src="/new/css/xnb.png" alt=""></article>
					@endif

					

				</article>
				<!--銀行銀行銀行銀行銀行-->
				<article class="xin_jine" style="margin-bottom:.3rem; display:none;" id="yinghang-select">
					<select class="jine" id="banksss" style="width:90%;height: 0.9rem;font-size: .32rem;padding: 0 15px;" onchange="setBank();">
						@foreach($banks as $item)
						<option value='{{ $item->id }}' data-cardno="{{ $item->card_no }}" data-username="{{ $item->username }}">{{ $item->bank_name }}</option>
					    @endforeach
					</select>
				</article>
				<!--銀行銀行銀行銀行銀行-->
				<article class="xin_jine">
					<input type="number" placeholder="{{trans("lang.srje")}}" id="amount" class="jine" oninput ="jine_input()">
					<img src="/images/icon_10.png" alt="" onclick="$('#amount').val('');$('#xin_type1_jine').text('$0.00')">
				</article>


				<section class="xin_type_1">
					<h3 id="mingcheng">{{trans("lang.zhuanhuankuai")}}</h3>
					<h4>{{trans("lang.huikuanjine")}}：<span id="xin_type1_jine">$0.00</span> 
					<!--<span style="display:none;" id="usdt_lv">* {{$_system_config->usdt_lv}}</span>-->
					</h4>
					<h5>{{trans("lang.chongzhi_wenan1")}}</h5>
					<section class="type_1_list">
						@if(!$setting->is_qq_on)
						<section id="zhihu1">
							<article>
								<span>{{trans("lang.skzh")}}：</span>
								<p>{{ $_system_config->qq_account }}</p>
								<i class="btn-copy" data-clipboard-text="{{ $_system_config->qq_account }}">{{trans("lang.fuzhi")}}</i>
							</article>
							<article>
								<span>{{trans("lang.skzhm")}}：</span>
								<p>{{ $_system_config->qq_nickname }}</p>
								<i class="btn-copy" data-clipboard-text="{{ $_system_config->qq_nickname }}">{{trans("lang.fuzhi")}}</i>
							</article>
						</section>
						@endif

						@if(!$setting->is_alipay_on)
						<section id="zhihu2" style="display: none;">
							<article>
								<span>{{trans("lang.skewm")}}：</span>
								<img src="{{ $setting->bld_pic }}" alt="">
							</article>
						</section>
						@endif

						@if(!$setting->is_wechat_on)
						<section id="zhihu3" style="display: none;">
						   	<article>
    						    <span>{{trans("lang.czleixing")}}：</span>
            				    <select class="jine" name="usdt_type" onchange="changeType(this.value);" id="usdt_type">
            				        <option value="trc"> USDT TRC20 </option>
            				        <option value="erc"> USDT ERC20 </option>
            				    </select>
        					</article>
							<article>
								<span>{{trans("lang.czdz")}}：</span>
								<p id="usdt_1">{{ $_system_config->usdt_trc }}</p>
								<i class="btn-copy" id="usdt_2" data-clipboard-text="{{ $_system_config->usdt_trc }}">{{trans("lang.fuzhi")}}</i>
							</article>
							<article>
								<span>{{trans("lang.skewm")}}：</span>
								<img src="{{ $_system_config->usdt_trc_pic }}" id="usdt_pic" alt="">
							</article>
						</section>
						@endif
						
						@if(!$setting->is_bankpay_on)
						<section id="zhihu4" style="display: none;">
						    <article>
								<span>{{trans("lang.skzh")}}：</span>
								<p id="bank_card">{{ count($banks)>0 ? $banks[0]->card_no : '' }}</p>
								<i id="bank_card_2" class="btn-copy" data-clipboard-text="{{ count($banks)>0  ? $banks[0]->card_no : '' }}">{{trans("lang.fuzhi")}}</i>
							</article>
							<article>
								<span>{{trans("lang.skzhm")}}：</span>
								<p id="bank_name">{{ count($banks)>0 ? $banks[0]->username : '' }}</p>
								<i id="bank_name_2" class="btn-copy" data-clipboard-text="{{ count($banks)>0  ? $banks[0]->username : '' }}">{{trans("lang.fuzhi")}}</i>
							</article>
						</section>
						@endif
					</section>
					<section class="type_1_shuoming">{{trans("lang.chongzhi_wenan2")}}
						
					</section>
					<article style="height:0.3rem;" id="article_margin"></article>
					<button class="type_1_btn" onclick="chongzhi()">{{trans("lang.qrcz")}}</button>
				</section>

			</section>

			<article class="xin_zhifu_bottom">
				<img src="/images/icon_9.png" alt="" onclick="window.parent._close_fu();">
			</article>
		</section>
	</section>
	@endif
	<style>
		.xin_type_1{ padding: .7rem .2rem .4rem; color: #333;}
		.xin_type_1 > h3{ text-align: center; font-size: 0.34rem; margin-bottom: 0.2rem;}
		.xin_type_1 > h4{ text-align: center; font-size: .3rem; margin-bottom: 0.2rem;}
		.xin_type_1 > h4 span{color:#F9AB10; font-weight: bold; font-size: .4rem;}
		.xin_type_1 > h5{font-size: .24rem; text-align: center;}
		.type_1_list{ padding: .3rem 0;}
		.type_1_list article{display: flex; justify-content: space-around; font-size: .26rem; align-items: center; min-height: 0.6rem; margin-bottom: .2rem;}
		.xin_type_1{}
		.type_1_list article span{ width: 29%; color:#BBA28A;}
		.type_1_list article p{ width: 62%; color: red; word-break: break-all;}
		.type_1_list article img{width: 23vh; height: 23vh;}
		.type_1_list article i{ width: 13%; background: red; height: 0.4rem; color: #fff; line-height: .4rem; text-align: center; font-size: 13px;}
		.type_1_shuoming{ color: #BBA28A; font-size: 13px; line-height: 1.7;}
		.type_1_btn{ width: 100%; width: 100%; background-color: #BBA28A; text-align: center; color: #fff; border: none; font-size: 16px; height: 0.9rem; border-radius: 5px;}
		/*#xin_zhifu_alert,#xin_tixian_alert{ background-color: rgba(0,0,0,.6); position: fixed; display: flex; width: 100%; height: 100%; top: 0; left: 0;  align-items: center; justify-content: center; z-index: 999;}*/
		#xin_zhifu_alert,#xin_tixian_alert{ position: fixed; display: flex; width: 100%; height: 100%; top: 0; left: 0;  align-items: center; justify-content: center; z-index: 999;}
		.xin_zhifu_alert{ width: 80%; height: 90%;}
		.xin_zhifu_alert > h4{ background-color: #D3C0AC; text-align: center; font-size: .34rem; color: #fff; padding: 0.25rem 0; border-top-left-radius: 10px;border-top-right-radius: 10px;}
		.xin_zhifu_alert_content{ background: #fff; height: 80%; overflow-y: auto;}
		.xin_zhifu_nav{  padding: 0.3rem 0; border-bottom: 1px solid #ccc; margin-bottom: 0.4rem;}
	

		.xin_zhifu_nav:after{ content: ''; display: block; width: 100%; clear: both;}
		.xin_zhifu_nav article{float: left; width: 25%; text-align: center; display: flex; align-items: center; justify-content: center; height: 1rem;}
		.xin_zhifu_nav article.on{ background: url(/images/icon_7.png) right 83% no-repeat; background-size: 25px;}
		.xin_zhifu_nav article img{ width: 52%;}
		.xin_zhifu_bottom{display: flex; justify-content: center; padding-top: 0.7rem; position: relative;}
		.xin_zhifu_bottom:after{ content: ''; width: 2px; display: block; background-color: #D3C0AC; height: 0.8rem; position: absolute; top: 0; left: 50%;}
		.xin_zhifu_bottom img{ width: 1rem;}
		.xin_jine{ display: flex; justify-content: center; align-items: center;}
		.jine{
			-webkit-appearance: none; 
			-moz-box-shadow: 3px 4px 11px #bfbfbf;
			-webkit-box-shadow: 3px 4px 11px #bfbfbf;
			box-shadow: 3px 4px 11px #bfbfbf;
		font-size: .32rem;
		width: 70%;height: 0.9rem; display: block;border: none; padding: 0 15px; border-radius: 5px; width: 70%;}
		.xin_jine img{ width: 25px; margin-left: .2rem;}
	</style>

	<script>
	$('body').fadeIn()
// 		window.onload = function(){
		
// 			setTimeout(function (){
// 				window.parent._close_load();
// 			},100)
// 		}
		let type = 1,xiaoshu = "{{$xiaoshu}}";;
		var clipboard = new ClipboardJS('.btn-copy');
		clipboard.on('success', function(e) {
			chenggong_alert(1,"{{trans('lang.fuzhichenggong')}}");
		});
		clipboard.on('error', function(e) {
			chenggong_alert(2,"{{trans('lang.fuzhishibai')}}");
		});
		
		function changeType(v){
		   var trc_addr = '{{ $_system_config->usdt_trc }}';
		   var erc_addr = '{{ $_system_config->usdt_erc }}';
		   var trc_qr = '{{ $_system_config->usdt_trc_pic }}';
		   var erc_qr = '{{ $_system_config->usdt_erc_pic }}';
		   if(v=='trc'){
		       $("#usdt_1").text(trc_addr);
		       $("#usdt_2").attr('data-clipboard-text',trc_addr);
		       $("#usdt_pic").attr('src',trc_qr);
		   }else{
		       $("#usdt_1").text(erc_addr);
		       $("#usdt_2").attr('data-clipboard-text',erc_addr);
		       $("#usdt_pic").attr('src',erc_qr);
		   }
		}
		
		function setBank(){
		    var cardno = $("#banksss").find("option:selected").attr('data-cardno');
		    var username = $("#banksss").find("option:selected").attr('data-username');
		    $("#bank_name").text(username);
		    $("#bank_name_2").attr('data-clipboard-text',username);
		    	       
		    $("#bank_card").text(cardno);
		    $("#bank_card_2").attr('data-clipboard-text',cardno);
		    
		}
		function jine_input(){
			let val = $("#amount").val();
			if(val != '' && val > 0){
				if(type == 2 || type == 4){
					$('#xin_type1_jine').text('$' + val)
				}
				else{
				    if(type==3){
                        val = Number(val) / Number({{$_system_config->usdt_lv}});
                        $('#xin_type1_jine').text('$' + val)
                    }else{
                        $('#xin_type1_jine').text('$' + val + "." + xiaoshu)
                    }
					
				}
                
			}
			else{
				$('#xin_type1_jine').text('$0.00');
			}
		}

		function qiehuan(int,_this,name){
			type = int;
			$('#mingcheng').text(name)
			if(type == 1){
				$('#article_margin').css({
					"height": "0.3rem"
				})
			}
			else{
				$('#article_margin').css({
					"height": ".3rem"
				})
			}
			if(type == 4 ){
				$('#yinghang-select').show();
			}
			else{
				$('#yinghang-select').hide();
			}
			if(type==3){
				$('#usdt_lv').show();
			}else{
				$('#usdt_lv').hide();
			}
			$('#amount').val('');
			$('#xin_type1_jine').text('$0.00')
			$(_this).addClass('on').siblings('article').removeClass('on');
			$('#zhihu'+int).show().siblings().hide();
		}
		$('.dopay').eq(0).click()
		function reset2(){
            $("#bank_name").val('');
            $("#money").val('');
            $("#qk_pwd").val('');
			$('#xin_tixian_alert').fadeout();
        }
		function reset(){
			qiehuan(1,$('.xin_zhifu_nav article:eq(0)'),'{{trans('lang.zhuanhuankuai')}}');
			$('#amount').val('');
			$('#xin_type1_jine').text('$0.00')
			$('#xin_zhifu_alert').fadeout();

		}
		function tixian(){
            var bank_name = $("#bank_name").val();
            if(bank_name==''){
                chenggong_alert(2,"{{trans("lang.qxz")}}{{trans("lang.txfs")}}");
                return false;
            }
            var money = $("#money").val();
            if(money==''){
                chenggong_alert(2,'{{trans("lang.qingshuru")}}{{trans("lang.tkje")}}')
                return false;
            }

            var qk_pwd = $("#qk_pwd").val();
            if(qk_pwd==''){
                chenggong_alert(2,'{{trans("lang.qingshuru")}}{{trans("lang.tkmm")}}')
                return false;
            }

            $.ajax({
                type:"post",
                url:"{{ route('wap.post_drawing') }}",
                data : {code:$('#code').val(),qk_pwd:$('#qk_pwd').val(),money:$('#money').val(),bank_card:$('#bank_card').val(),name:$('#name').val(),bank_name:$('#bank_name').val()},
                beforeSend: function(){
                    open_load();
                },
                complete: function(){
                    close_load();
                },
                success : function (data) {
                    if(data.status.errorCode == 0){
                        ///差关闭弹框
                        chenggong_alert(1,data.status.msg);
                        setTimeout(() => {
                            reset2();
							window.parent._close_fu();
                        },1500)
                    }else{
                        chenggong_alert(2,data.status.msg);
                    }
                    close_load()
                }
            })
        }
		function chongzhi() {
			let val = $("#amount").val();
			if(val != '' && val > 0){
				if(type == 1){
					$.ajax({
						type:"post",
						url:"{{ route('wap.post_qq_pay') }}",
						data : {money:$('#amount').val(),xiaoshu:xiaoshu},
						beforeSend: function(){
							open_load();
						},
						complete: function(){
							close_load();
						},
						success : function (data) {
							if(data.status.errorCode == 0){
								///差关闭弹框
								chenggong_alert(1,data.status.msg);
								setTimeout(() => {
									reset();
									window.parent._close_fu();
								},1500)
							}else{
								chenggong_alert(2,data.status.msg);
							}
							close_load()
						}
					})
				}
				else if(type == 2){
					$.ajax({
						type:"post",
						url:"{{ route('ajax_pay') }}",
						data : {amount:$('#amount').val(),xiaoshu:0},
						beforeSend: function(){
							open_load();
						},
						complete: function(){
							close_load();
						},
						success : function (data) {
							if(data.status.errorCode == 0){
								///差关闭弹框
								chenggong_alert(1,data.status.msg);
								setTimeout(() => {
									reset();
									window.parent._close_fu();
								},1500)
							}else{
								chenggong_alert(2,data.status.msg);
							}
							close_load()
						}
					})
				}else if(type == 4){
					$.ajax({
						type:"post",
						url : "{{ route('ajax_pay') }}",
						data : {amount:$('#amount').val(),xiaoshu:xiaoshu,'paytype':'bank',usdt_type:$('#usdt_type').val(),banksss:$('#banksss').val()},
						beforeSend: function(){
							open_load();
						},
						complete: function(){
							close_load();
						},
						success : function (data) {
							if(data.status.errorCode == 0){
								///差关闭弹框
								chenggong_alert(1,data.status.msg);
								setTimeout(() => {
									reset();
									window.parent._close_fu();
								},1500)
							}else{
								chenggong_alert(2,data.status.msg);
							}
							close_load()
						}
					})
				}else{
					$.ajax({
						type:"post",
						url : "{{ route('ajax_pay') }}",
						data : {amount:$('#amount').val(),xiaoshu:xiaoshu,'paytype':'usdt',usdt_type:$('#usdt_type').val()},
						beforeSend: function(){
							open_load();
						},
						complete: function(){
							close_load();
						},
						success : function (data) {
							if(data.status.errorCode == 0){
								///差关闭弹框
								chenggong_alert(1,data.status.msg);
								setTimeout(() => {
									reset();
									window.parent._close_fu();
								},1500)
							}else{
								chenggong_alert(2,data.status.msg);
							}
							close_load()
						}
					})
				}

			}
			else{
				chenggong_alert(2,'{{trans("lang.qsrzqdsz")}}');
			}

		}
	</script>
</body>
</html>

