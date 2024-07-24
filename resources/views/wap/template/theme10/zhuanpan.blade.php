<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0044)https://www.jq22.com/demo/turnplate20160217/ -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>大轉盤活動</title>
    <?php if($type == 'pc') {?>
    <link href="/zhuanpan/zhuanpan_files/pcstyle.css" rel="stylesheet" type="text/css">
    <?php }else if($type == 'mobile') {?>
    <link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss">
    <link href="/zhuanpan/zhuanpan_files/style.css" rel="stylesheet" type="text/css">
    <?php } ?>
    
</head>
<?php if($type == 'pc') {?>
<body style="background-image: url('/zhuanpan/zhuanpan_files/bg.png');background-repeat: no-repeat;background-size: 100% 100%;height: 100%;width: 100%;">
    <!-- <div class="topTitle">
        <img src="/zhuanpan/zhuanpan_files/bg1.png" alt="">
    </div> -->
    <div class="conterText">
        <img src="/zhuanpan/zhuanpan_files/1.png" id="shan-img" style="display:none;">
        <img src="/zhuanpan/zhuanpan_files/2.png" id="sorry-img" style="display:none;">
        <div class="banner">
            <div class="turnplate" style="background-image:url(/zhuanpan/zhuanpan_files/turnplate-bg.png);background-size:100% 100%;">
                <canvas class="item" id="wheelcanvas" width="422px" height="422px" style="transform: rotate(72deg);"></canvas>
                <img class="pointer" src="/zhuanpan/zhuanpan_files/turnplate-pointer.png">
            </div>
        </div>
        <div class="bannerTow">
            <div class="banTowTit">中獎記錄</div>
            <div id="review_box">
                <ul id="comment1">
                    <?php foreach($logsArr as $v){ 
                    ?>
                    <li><?= $v['name'] ?>
                        <span><?= $v['describe'] ?></span>
                    </li>
                    <?php } ?>
                </ul>
                <ul id="comment2"></ul>
            </div>
        </div>
        <div class="banR">
            <div class="banRIt">線上客服</div>
            <div class="banRIt">APP下載</div>
        </div>

    </div>
    <div class="bannerThree">
        <div class="banThreeTitle">
            注意事項
        </div>
        <ul>
            <li>
                <div class="banThreeLiL">
                    活動時間
                </div>
                <div class="banThreeLiR">
                    即日起
                </div>
            </li>
            <li>
                <div class="banThreeLiL">
                    結束時間
                </div>
                <div class="banThreeLiR">
                    以官網通知為準
                </div>
            </li>
            <li>
                <div class="banThreeLiL">
                    活動條件
                </div>
                <div class="banThreeLiR">
                   當日累計充值100可擁有一次抽獎點數。(每日一次)
                </div>
            </li>
            <li>
                <div class="banThreeLiL">
                    活動規則
                </div>
                <div class="banThreeLiR">
                   所送的彩金只需1倍投注，即可提款中獎彩金！ 此活動僅用於皇朝娛樂玩家，任何套利或個人均不適用此優惠，皇朝娛樂保有最終修改、更變、活動解釋及取消本活動之權利，所有相關異動，將公告於網站，恕不另行通知。
                </div>
            </li>
        </ul>
    </div>
</body>
<?php }else if($type == 'mobile'){ ?>
<body style="background-image: url('/zhuanpan/zhuanpan_files/bg.png');background-repeat: no-repeat;background-size: 100% 100%;height: 200%;width: 99.6%;">
    <div style="background-color:#e3ceba;height:45px">
        <span><img src="/zhuanpan/zhuanpan_files/left.png" style="margin-top:8px;width:30px" id="close"></span>
        <span style="font-size:20px;text-align: center;display: flex;margin-top: -30px;justify-content: center;">幸運輪</span>
    </div>
    <div class="topTitle">
        <img src="/zhuanpan/zhuanpan_files/bg1.png" style="" alt="">
    </div>
    <img src="/zhuanpan/zhuanpan_files/1.png" id="shan-img" style="display:none;">
    <img src="/zhuanpan/zhuanpan_files/2.png" id="sorry-img" style="display:none;">
    <div class="banner">
        <div class="turnplate" style="background-image:url(/zhuanpan/zhuanpan_files/turnplate-bg.png);background-size:100% 100%;">
            <canvas class="item" id="wheelcanvas" width="422px" height="422px" style="transform: rotate(72deg);"></canvas>
            <img class="pointer" src="/zhuanpan/zhuanpan_files/turnplate-pointer.png">
        </div>
    </div>
    <div class="bannerTow">
        <div class="banTowTit">中獎記錄</div>
        <div id="review_box">
            <ul id="comment1">
                <?php foreach($logsArr as $v){ 
                ?>
                <li><?= $v['name'] ?>
                    <span><?= $v['describe'] ?></span>
                </li>
                <?php } ?>
            </ul>
            <ul id="comment2"></ul>
        </div>
    </div>
    <div class="bannerThree">
        <div class="banThreeTitle">
            注意事項
        </div>
        <ul>
            <li>
                <div class="banThreeLiL">
                    結束時間
                </div>
                <div class="banThreeLiR">
                    即日起
                </div>
            </li>
            <li>
                <div class="banThreeLiL">
                    结束时间
                </div>
                <div class="banThreeLiR">
                    以官網通知為準
                </div>
            </li>
            <li>
                <div class="banThreeLiL">
                    活動條件
                </div>
                <div class="banThreeLiR">
                   當日累計充值100可擁有一次抽獎點數。(每日一次)
                </div>
            </li>
            <li>
                <div class="banThreeLiL">
                    活動規則
                </div>
                <div class="banThreeLiR">
                    所送的彩金只需1倍投注，即可提款中獎彩金！ 此活動僅用於皇朝娛樂玩家，任何套利或個人均不適用此優惠，皇朝娛樂保有最終修改、更變、活動解釋及取消本活動之權利，所有相關異動，將公告於網站，恕不另行通知。
                </div>
            </li>
        </ul>
    </div>
</body>
<?php } ?>
<script type="text/javascript" src="/zhuanpan/zhuanpan_files/awardRot.js"></script>
<script type="text/javascript" src="/zhuanpan/zhuanpan_files/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/zhuanpan/zhuanpan_files/awardRotate.js"></script>
<script type="text/javascript" src="/new/css/layer.js"></script>
	<script>
// 		var flag_num = 1;
// 		function check_my() {
// 			if(flag_num == 0) {
// 				//alert("ok");	
// 				//$("#login").show();
// 				$('#login').slideDown('normal');
// 				return false;
// 			} else {
// 				return true;
// 			}
// 		}
		//登录请求的方法
		function tijiao() {
			var tel = $.trim($('#tel').val());
			var logact = $('#logact').val();
			if(tel !=''){
				//这里加入对手机号的正则判断
				if(!(/^1[3|4|5|7|8]\d{9}$/.test(tel))){	//错误的手机号
					alert('请输入正确的手机号');	return false;
				}
				$.ajax({
					url:'/index.php?s=/Home/Index/login/',
					data:{tel:tel,logact:logact},
					type:'post',
					success:function(msg){
						//alert(msg);
						if(msg == 1) {
							//alert('成功登录');
							setTimeout(function(){
								location.reload(true);
							},1888);
						} else {
							alert('登录失败，请重新登录');
						}
					}
				});
			}else{
				alert('请填写完整信息');
				return false;
			}	
		}
	</script>
<script type="text/javascript">
    var turnplate = {
        restaraunts: [], //大转盘奖品名称
        colors: [], //大转盘奖品区块对应背景颜色
        outsideRadius: 192, //大转盘外圆的半径
        textRadius: 155, //大转盘奖品位置距离圆心的距离
        insideRadius: 68, //大转盘内圆的半径
        startAngle: 0, //开始角度

        bRotate: false //false:停止;ture:旋转
    };

    $(document).ready(function() {
        //动态添加大转盘的奖品与奖品区域背景颜色
        var slist = '<?php echo urlencode(json_encode($arr));?>';
        var list = eval(decodeURIComponent(slist));
        turnplate.restaraunts =  list;
        console.log(turnplate.restaraunts)
        turnplate.colors = ["#FFF4D6", "#FFFFFF", "#FFF4D6", "#FFFFFF", "#FFF4D6", "#FFFFFF", "#FFF4D6"];


        var rotateTimeOut = function() {
            $('#wheelcanvas').rotate({
                angle: 0,
                animateTo: 2160,
                duration: 8000,
                callback: function() {
                    alert('网络超时，请检查您的网络设置！');
                }
            });
        };

        //旋转转盘 item:奖品位置; txt：提示语;
        var rotateFn = function(item, txt) {
            var angles = item * (360 / turnplate.restaraunts.length) - (360 / (turnplate.restaraunts.length * 2));
            if (angles < 270) {
                angles = 270 - angles;
            } else {
                angles = 360 - angles + 270;
            }
            $('#wheelcanvas').stopRotate();
            $('#wheelcanvas').rotate({
                angle: 0,
                animateTo: angles + 1800,
                duration: 8000,
                callback: function() {
                    alert(txt);
                    turnplate.bRotate = !turnplate.bRotate;
                }
            });
        };

        $('.pointer').click(function() {
            if (turnplate.bRotate) return;
            turnplate.bRotate = !turnplate.bRotate;
            
            $.ajax({
					url: "/m/zhuan",
					async:false,		//这里应该是同步执行
					success: function( message ) {
						if(message == -1) {	//无抽奖机会
						    turnplate.bRotate = !turnplate.bRotate;
							//item = 0;
							 //$("#no_chance").show();
							 alert('抽獎次數已用完！');
							 return;
						} else if(message == -2){
						     turnplate.bRotate = !turnplate.bRotate;
							//item = 0;
							 //$("#no_chance").show();
							 alert('未配置转盘！');
						}else {
							//获取随机数(奖品个数范围内)
                            var item = parseInt(message);
                            console.log(item);
                            //奖品数量等于10,指针落在对应奖品区域的中心角度[252, 216, 180, 144, 108, 72, 36, 360, 324, 288]
                            rotateFn(item, turnplate.restaraunts[item - 1]);
						}
					}
				});	
            /* switch (item) {
            	case 1:
            		rotateFn(252, turnplate.restaraunts[0]);
            		break;
            	case 2:
            		rotateFn(216, turnplate.restaraunts[1]);
            		break;
            	case 3:
            		rotateFn(180, turnplate.restaraunts[2]);
            		break;
            	case 4:
            		rotateFn(144, turnplate.restaraunts[3]);
            		break;
            	case 5:
            		rotateFn(108, turnplate.restaraunts[4]);
            		break;
            	case 6:
            		rotateFn(72, turnplate.restaraunts[5]);
            		break;
            	case 7:
            		rotateFn(36, turnplate.restaraunts[6]);
            		break;
            	case 8:
            		rotateFn(360, turnplate.restaraunts[7]);
            		break;
            	case 9:
            		rotateFn(324, turnplate.restaraunts[8]);
            		break;
            	case 10:
            		rotateFn(288, turnplate.restaraunts[9]);
            		break;
            } */
            
        });
    });

    function rnd(n, m) {
        var random = Math.floor(Math.random() * (m - n + 1) + n);
        return random;

    }
    $('#close').click(function(){
        parent.layer.closeAll();
        // parent.layer.closeALL();
        // layer.open({
        //                 content: '<font color="#000">遊戲維護中 請儘快等遊戲結算後將資金回收</font>'
        //                 ,btn: '我知道了'
        //             });
    })

    //页面所有元素加载完毕后执行drawRouletteWheel()方法对转盘进行渲染
    window.onload = function() {
        drawRouletteWheel();
    };

    function drawRouletteWheel() {
        var canvas = document.getElementById("wheelcanvas");
        if (canvas.getContext) {
            //根据奖品个数计算圆周角度
            var arc = Math.PI / (turnplate.restaraunts.length / 2);
            var ctx = canvas.getContext("2d");
            //在给定矩形内清空一个矩形
            ctx.clearRect(0, 0, 422, 422);
            //strokeStyle 属性设置或返回用于笔触的颜色、渐变或模式  
            ctx.strokeStyle = "#FFBE04";
            //font 属性设置或返回画布上文本内容的当前字体属性
            ctx.font = '16px Microsoft YaHei';
            for (var i = 0; i < turnplate.restaraunts.length; i++) {
                var angle = turnplate.startAngle + i * arc;
                ctx.fillStyle = turnplate.colors[i];
                ctx.beginPath();
                //arc(x,y,r,起始角,结束角,绘制方向) 方法创建弧/曲线（用于创建圆或部分圆）    
                ctx.arc(211, 211, turnplate.outsideRadius, angle, angle + arc, false);
                ctx.arc(211, 211, turnplate.insideRadius, angle + arc, angle, true);
                ctx.stroke();
                ctx.fill();
                //锁画布(为了保存之前的画布状态)
                ctx.save();

                //----绘制奖品开始----
                ctx.fillStyle = "#E5302F";
                var text = turnplate.restaraunts[i];
                var line_height = 17;
                //translate方法重新映射画布上的 (0,0) 位置
                ctx.translate(211 + Math.cos(angle + arc / 2) * turnplate.textRadius, 211 + Math.sin(angle + arc / 2) * turnplate.textRadius);

                //rotate方法旋转当前的绘图
                ctx.rotate(angle + arc / 2 + Math.PI / 2);

                /** 下面代码根据奖品类型、奖品名称长度渲染不同效果，如字体、颜色、图片效果。(具体根据实际情况改变) **/
                if (text.indexOf("M") > 0) { //流量包
                    var texts = text.split("M");
                    for (var j = 0; j < texts.length; j++) {
                        ctx.font = j == 0 ? 'bold 20px Microsoft YaHei' : '16px Microsoft YaHei';
                        if (j == 0) {
                            ctx.fillText(texts[j] + "M", -ctx.measureText(texts[j] + "M").width / 2, j * line_height);
                        } else {
                            ctx.fillText(texts[j], -ctx.measureText(texts[j]).width / 2, j * line_height);
                        }
                    }
                } else if (text.indexOf("M") == -1 && text.length > 6) { //奖品名称长度超过一定范围 
                    text = text.substring(0, 6) + "||" + text.substring(6);
                    var texts = text.split("||");
                    for (var j = 0; j < texts.length; j++) {
                        ctx.fillText(texts[j], -ctx.measureText(texts[j]).width / 2, j * line_height);
                    }
                } else {
                    //在画布上绘制填色的文本。文本的默认颜色是黑色
                    //measureText()方法返回包含一个对象，该对象包含以像素计的指定字体宽度
                    ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
                }

                //添加对应图标
                if (text.indexOf("闪币") > 0) {
                    var img = document.getElementById("shan-img");
                    img.onload = function() {
                        ctx.drawImage(img, -15, 10);
                    };
                    ctx.drawImage(img, -15, 10);
                } else if (text.indexOf("谢谢参与") >= 0) {
                    var img = document.getElementById("sorry-img");
                    img.onload = function() {
                        ctx.drawImage(img, -15, 10);
                    };
                    ctx.drawImage(img, -15, 10);
                }
                //把当前画布返回（调整）到上一个save()状态之前 
                ctx.restore();
                //----绘制奖品结束----
            }
        }
    }
</script>

</html>