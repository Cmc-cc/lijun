<!--登录模态框-->
<div id="login" class="modal modal-login">
    <div class="modal-content">
        <form method="POST" action="<?php echo e(route('member.login.post')); ?>">
            <a href="" class="close bg-icon"></a>
            <div class="modal-login_form">
                <h2>用户登录</h2>
                <div class="modal-login_line">
                    <input class="username" type="text" placeholder="请输入用户名" required name="name">
                </div>
                <div class="modal-login_line">
                    <input class="psw" type="password" placeholder="请输入密码" required name="password">
                </div>
                <!-- <div class="modal-login_line code">
                    <input type="text" placeholder="请输入验证码" required name="code">
                    <img src="" alt="" width="100">
                </div> -->
                <div class="modal-login_line">
                    <button class="modal-login_submit ajax-submit-btn" type="button">登录</button>
                </div>
                <div class="modal-login_link clear">
                    <p class="pullRight">
                        还没有账号？
                        <a href="<?php echo e(route('web.register_one')); ?>">点击注册</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>


<div id="mobileBet" class="modal modal-mobileBet">
    <div class="modal-content">
        <a href="" class="close bg-icon"></a>
        111
    </div>
</div>

<!--半透明遮罩层-->
<div class="backdrop"></div>


<div class="header" id="totop">
    <div class="top">
        <div class="loginmeun_btn">
            <span class="pic01"></span>
            <span>澳门服务热线：<em class="yellow"><?php echo e($_system_config->phone1); ?></em>   </span>
        </div>
        <ul class="topList">
            
            
            
            
                    <!--<li> <a  target="_blank" href="MegawinCasino_Game.html?gameId=50" class="red">千炮捕魚</a>  </li>-->
            <!--<li> <a href="http://www.hdsq.am" target="_blank">活动申请</a>  </li>-->
            
            
            

                    <!--<li class="last"><a href="http://bwin.po888.net" target="_blank" class="green">手机投注</a>   </li>-->
            <li class="onlinePic">
                <a class="online"
                   onclick="javascript:window.open('<?php echo e($_system_config->service_link); ?>','','width=1024,height=768')">在线客服
                    <i class="iconfont">&#xe601;</i>
                </a>
            </li>
        </ul>
    </div>

    <!-- top end-->
    <div class="navbar">
        <h1 class="logo">
            <a href="<?php echo e(route('web.index')); ?>">
                <img src="<?php echo e($_system_config->site_logo); ?>" alt="">
            </a>
        </h1>
        <ul class="nav">
            <li>
                <a href="<?php echo e(route('web.index')); ?>" <?php if($web_route == 'web.index'): ?> class="current" <?php endif; ?>>首页 <span
                            class="en">Home</span> </a>
            </li>

            <!--電子游戏-->
            <li>
                <a href="<?php echo e(route('web.eGame')); ?>"
                   class="blinkRed <?php if($web_route == 'web.eGame'): ?> current <?php endif; ?>">電子游戏<span class="en">Slots</span>
                </a>
                <span class="hotpic">
                    <img src="<?php echo e(asset('/web/images/hot.gif')); ?>"/>
                </span>
            </li>
            <!--電子游戏 end-->

            <!--千炮捕魚-->
            <li>
                <a href="<?php echo e(route('web.catchFish')); ?>"
                   class="blinkRed <?php if($web_route == 'web.catchFish'): ?> current <?php endif; ?>">捕魚游戏 <span
                            class="en">Catch fish</span> </a>
                <span class="hotpic"><img src="<?php echo e(asset('/web/images/hot.gif')); ?>"/></span>
            </li>
            <!--千炮捕魚 end-->

            <!--真人娱乐-->
            <li>
                <a href="<?php echo e(route('web.liveCasino')); ?>" <?php if($web_route == 'web.liveCasino'): ?> class="current" <?php endif; ?>>真人娱乐
                    <span class="en">Live casino</span> </a>
                <span class="hotpic"><img src="<?php echo e(asset('/web/images/hot.gif')); ?>"/></span>
            </li>
            <!--真人娱乐 end-->

            <!--幸运彩票-->
            <li>
                <a id="cashap-lottery-menu" title="幸运彩票" href="<?php echo e(route('web.lottory')); ?>"
                   <?php if($web_route == 'web.lottory'): ?> class="current" <?php endif; ?>>
                    幸运彩票<span class="en">Lottery</span> </a>
            </li>
            <!--幸运彩票 end-->

            <!--體育竞猜-->
            <li>
                <a href="<?php echo e(route('web.esports')); ?>" <?php if($web_route == 'web.esports'): ?> class="current" <?php endif; ?>>體育竞技 <span
                            class="en">Sports</span> </a>
            </li>
            
            <li>
                <a href="<?php echo e(route('web.poker')); ?>" <?php if($web_route == 'web.poker'): ?> class="current" <?php endif; ?>>
                    棋牌游戏 <span class="en">Poker</span>
                </a>
            </li>

            <!--手机投注-->
            <li class="mobWid slideDown">
                <a href="<?php echo e($_system_config->app_link); ?>" target="_blank" class="blinkGreen">
                    手机投注 <span class="en">Mobile Betting</span>
                </a>
                <span class="hotpic"><img src="<?php echo e(asset('/web/images/fast.gif')); ?>"/></span>
            </li>
            <!--手机投注 end-->
            <li>
                <a title="优惠活动" href="<?php echo e(route('web.activityList')); ?>"
                   class="blinkRed <?php if($web_route == 'web.activityList'): ?> current <?php endif; ?>">优惠活动 <span class="en">Promotions</span>
                </a>
                <span class="hotpic"><img src="<?php echo e(asset('/web/images/hot.gif')); ?>"/></span>
            </li>
        </ul>
    </div>

    <!--header End-->
    <div class="header-login">
        <div class="container">
            <div class="address-slide">
                <span class="webTxt yellow"><i class="iconfont yellow">&#xe621;</i>官方网址：</span>
                <ul class="webAdd yellow">
                    <li><?php echo e($_system_config->site_domain); ?></li>
                </ul>
            </div>

            <!-- 网站顶部固定导航登录组件 -->
            <div id="E74vqk4bnn" class="loginBox">
                <?php if(Auth::guard('member')->guest()): ?>
                    <div class="ember-view  loginbar">
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('member.login.post')); ?>">
                            <fieldset>
                                <div class="input-prepend">
                                    <input class="input-large span8 accountIco01 username" name="name" type="text"
                                           placeholder="账号:"
                                           autocomplete="off"
                                           required="required" data-cashap-tips='{"style":"down"}'>
                                </div>
                                <div class="input-prepend">
                                    <!--<span class="cell_input_notice">密码:</span>-->
                                    <input class="input-large span8 accountIco02 psw" name="password" type="password"
                                           required="required" placeholder="密码:">
                                    <!--<a data-cashap-id="MemberLogin_Form_forgetpwd" class="Fgcode" href="#">wnsr</a>-->
                                </div>
                                <div class="input-prepend">
                                    <!--<span class="cell_input_notice">密码:</span>-->
                                    <input class="input-large span8 psw" name="captcha" type="text" required="required"
                                           placeholder="验证码:" style="width: 100px;padding-left: 10px">
                                    <a onclick="javascript:re_captcha();"><img class="vertifyCode"
                                                                               src="<?php echo e(URL('kit/captcha/1')); ?>"
                                                                               id="c2c98f0de5a04167a9e427d883690ff6"></a>
                                    <script>
                                        function re_captcha() {
                                            $url = "<?php echo e(URL('kit/captcha')); ?>";
                                            $url = $url + "/" + Math.random();
                                            document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                                        }
                                    </script>
                                    <!--<a data-cashap-id="MemberLogin_Form_forgetpwd" class="Fgcode" href="#">wnsr</a>-->
                                </div>

                                <!--<div class="input-prepend" data-cashap-id="MemberLogin_Form_verifyArea">-->
                                <!--<input class="input-large span2" name="vcode" type="text" maxlength="4" pattern="^\d{4}$"-->
                                <!--required="required"-->
                                <!--placeholder="验证码" autocomplete="off" data-cashap-tips='{"style":"down","autoWidth":true}'>-->
                                <!--<img data-cashap-id="MemberLogin_Form_verify" src="" alt="点我换验证码" title="点我换验证码" class="verifypic">-->
                                <!--</div>-->
                                <div class="btn-prepend">
                                    <button type="button" class="primary modal-login_submit ajax-submit-btn">立即登入
                                    </button>
                                    <a href="<?php echo e(route('web.register_one')); ?>" class="register">免费开户</a>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="ember-view memberinfo">
                        <div class="memberMeun">
                            
                            <a title="我要存款" href="<?php echo e(route('member.finance_center')); ?>">我要存款</a>|
                            <a title="我要取款" href="<?php echo e(route('member.member_drawing')); ?>">我要取款</a>|
                            <a title="账户记录" href="<?php echo e(route('member.customer_report')); ?>">账户记录</a>|
                            <a title="账户管理" href="<?php echo e(route('member.userCenter')); ?>">账户管理</a>|
                            <a class="logoutbtn quit_btn" href="<?php echo e(route('member.logout')); ?>"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出</a>
                            <form id="logout-form" action="<?php echo e(route('member.logout')); ?>" method="POST"
                                  style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </div>

                        <div class="membe-left">
                            <!--<div class="MesPic">-->
                            <!--<div id="Status_PrivateMessage_Container_E75596gcd5">-->
                            <!--<a class="line_Message" href="#" title="个人讯息"  ><span></span></a>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!-- 个人信息 -->
                            <span class="name">会员帐号：<strong><?php echo e($_member->name); ?></strong></span>
                            <div class="balance">余额：<strong class="money"><?php echo e($_member->money); ?></strong></div>
                            
                            

                        </div>
                    </div>
                <?php endif; ?>
            </div>


            <!-- 网站顶部固定导航登录组件 end-->
        </div>
    </div>
</div>


<div class="hb_in">
    <a href="<?php echo e(route('web.red')); ?>" target="_blank">
        <img src="<?php echo e(asset('/web/images/hb_in.png')); ?>" alt="">
    </a>
</div>
<script>
    <?php if(!Auth::guard('member')->guest()): ?>
    $(function () {
        $.ajax({
            type:'post',
            url : "<?php echo e(route('member.api.wallet_balance')); ?>",
            dataType : 'json',
            success : function (data) {
                //console.log(data);
                if(data.statusCode == '01'){
                    var all = Number($('.money').text()) + Number(data.data);
                    $('.money').text('');
                    $('.money').text(parseInt(all.toFixed(2)));
                }
            }
        })
    })
    <?php endif; ?>
</script>