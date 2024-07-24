<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
    <script src="<?php echo e(asset('/web/layer/layer.js')); ?>"></script>
</head>
<body>
<div class="container">
    <div class="top-box">
    <?php echo $__env->make('member.layouts.pc_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- main -->
        <div class="pages-con p-c1">
            <div class="main-bg">
                <h2 class="title-s1 text_165"><span>FINANCIAL CENTER</span></h2>
                <div class="line1"></div>
                <div class="memcenter clear">
                    <div class="memMenu">
                        <ul class="commonlist">
                            <li><a href="/member/bank" class="text_166" oncontextmenu="return false;"></a></li>
                            <li><a href="/member/promotion_apply" class="text_167" oncontextmenu="return false;"></a>
                            </li>
                            <li class="select"><a href="/member/acc-transfer" class="text_122"
                                                  oncontextmenu="return false;"></a></li>
                            <li><a href="/member/customer_report" class="text_168" oncontextmenu="return false;"></a>
                            </li>
                            <li><a href="/member/customer_report?type=3" class="text_169"
                                   oncontextmenu="return false;"></a></li>
                        </ul>
                    </div>
                    <div class="memRight">
                        <div class="nav">
                            <ul class="commonlist">
                                <li class="select" style="width: 160px;"><a href="javascript:;" class="text_122"
                                                                            oncontextmenu="return false;"></a>
                                </li>
                            </ul>
                        </div>
                        <div style="padding:0" class="memCon clearfix" style="height: 600px;">
                            <div class="trans-money-header clear" id="balance">
                                <div class="t-h-box" data-num="10">
                                    <span class="add-icon"></span>
                                    <span class="minus-icon"></span>
                                    <a class="refresh-icon" oncontextmenu="return false;"></a>
                                    <div class="t-h-info ">
                                        <h1 class="text_241"></h1>
                                        <h6 class="gameMoney" gamename="Center"><?php echo e($member->money); ?></h6>
                                    </div>
                                </div>
                                <div class="t-h-box" data-num="11">
                                    <span class="add-icon"></span>
                                    <span class="minus-icon"></span>
                                    <a class="refresh-icon" oncontextmenu="return false;"></a>
                                    <div class="t-h-info last">
                                        <h1 class="text_195"></h1>
                                        <h6 class="lockmoney" gamename="LockMoney">0</h6>
                                    </div>
                                </div>

                                <?php $__currentLoopData = $api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $mod = $_member->apis()->where('api_id', $item->id)->first();
                                    ?>
                                    <div class="t-h-box" data-num="2">
                                        <span class="add-icon"></span>
                                        <span class="minus-icon"></span>
                                        <a class="refresh-icon"></a>
                                        <?php if($mod): ?>
                                            <div class="t-h-info"><h1><?php echo e($item->api_title); ?></h1>
                                                <h6 class="gameMoney"  gamename="<?php echo e($item->api_name); ?>"><?php echo e($mod->money); ?></h6>
                                            </div>
                                        <?php else: ?>
                                            <div class="t-h-info"><h1><?php echo e($item->api_title); ?></h1><h6 class="gameMoney">
                                                    系統維護中</h6></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <form class="changeMoney">
                                <div class="trans-con clear">
                                    <div class="trans-l">
                                        <a class="change-icon" oncontextmenu="return false;"></a>
                                        <div class="t-l-box">
                                            <div class="text_227" style="width: 28%;text-align: right;">：</div>
                                            <select class="form-control" id="fromAccount"
                                                    style="position: absolute;right: 15.3%;top: -3%;">
                                                <option value="center">中心錢包</option>
                                                <?php $__currentLoopData = $api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->api_title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="t-l-box">
                                            <div class="text_228"
                                                 style="width: 28%;text-align: right;position: absolute;top: 29%;">：
                                            </div>
                                            <select class="form-control" id="toAccount"
                                                    style="position: absolute;right: 15.3%;top: 26%;">
                                                <option value="center">中心錢包</option>
                                                <?php $__currentLoopData = $api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->api_title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                        </div>
                                        <div class="t-l-box">
                                            <div class="text_229"
                                                 style="width: 28%;text-align: right;position: absolute;top: 60%;">：
                                            </div>
                                            <input type="number" id="money" class="moneyNum"
                                                   style="position: relative;margin: 17% 0% 0 13%;">
                                        </div>
                                        <a id="trans-btn1" class="btn text_230" style="width: 100px;"
                                           oncontextmenu="return false;"></a>
                                        <!-- <a id="trans-btn1" class="btn"  onclick="$(this).closest('form').submit() ">转账</a> -->
                                    </div>
                                    <div class="trans-r">
                                        <a class="trans-r-btn" href="#" oncontextmenu="return false;">
                                            <div class="tran-system-icon"></div>
                                            <span class="btn text_231" id="trans-btn2" style="width: 190px;"></span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="display: none;" id="acc-trans1-box2" class="acc-window-bg">
            <div class="acc-window acc-trans1">
                <a class="close"></a>
                <div class="acc-w-title text_239"></div>
                <div class="s-tip">你確定要從&nbsp;<span id="from"></span>&nbsp;轉&nbsp;<span id="toMoney"></span>&nbsp;元 至&nbsp;<span
                            id="to"></span><br>
                    <a class="btn-confirm1 text_7"></a>
                    <a class="btn-cancel text_240"></a>
                </div>
            </div>
        </div>
        <div style="display: none;" id="acc-trans1-box" class="acc-window-bg">
            <div class="acc-window acc-trans1">
                <a class="close"></a>
                <div class="acc-w-title text_239"></div>
                <div class="s-tip">你確定要將所有遊戲廳的錢轉回至中心錢包<br>
                    <a class="btn-confirm1 confirmall text_7"></a>
                    <a class="btn-cancel text_240"></a>
                </div>
            </div>
        </div>
        <div style="display: none;" id="acc-trans1-box3" class="acc-window-bg">
            <div class="acc-window acc-trans1"><a class="close"></a>
                <div class="acc-w-title text_239"></div>
                <div class="s-tip"><span id="tishi">請填寫金額</span><br><a class="btn-confirm1 btn-cancel2 text_7"></a></div>
            </div>
        </div>
        <?php echo $__env->make('member.layouts.pc_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<!-- main end -->
<?php echo $__env->make('member.layouts.pc_right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
    $('#trans-btn2').click(function () {
        $("#acc-trans1-box").toggle()
    });
    $('.close').click(function () {
        $(this).parents('.acc-window-bg').hide()
    });

    $('.btn-cancel').click(function () {
        $(this).parents('.acc-window-bg').hide()
    });
    $('.btn-cancel2').click(function () {
        $(this).parents('.acc-window-bg').hide()
    });

    $('#trans-btn1').click(function () {
        var trans_money = $("#money").val();
        var fromtext = $('#fromAccount option:selected').text()
        var totext = $('#toAccount option:selected').text()
        if (trans_money <= 0) {
            $("#tishi").text('請填寫金額');
            $("#acc-trans1-box3").show();
            return false;
        }
        $("#from").text(fromtext);
        $("#to").text(totext);
        $("#toMoney").text(trans_money);
        $("#acc-trans1-box2").show();
    });

    $('#acc-trans1-box2 .btn-confirm1').click(function () {
        var from = $('#fromAccount option:selected').val();
        var to = $('#toAccount option:selected').val();
        var trans_money = $("#money").val();
        if (trans_money <= 0) {
            layer.msg('請填寫金額',{time:1500})
            return false;
        }
        if (from == 'center') {
            var transfer_type = 0;
            var account2 = to;
        } else {
            var transfer_type = 1;
            var account2 = from;
        }
        $(this).attr('disabled', true);
        $.ajax({
            url: "<?php echo e(route('member.post_transfer')); ?>",
            type: 'POST',
            data: {money: trans_money, transfer_type: transfer_type, account2: account2, account1: 1},
            success: function (data) {
                
                if (data.status.errorCode == 0) {
                  	alert('提交成功');
                    location.reload();
                }else{
                  alert(data.status.msg);
                }
            }
        })
    });

    $('#acc-trans1-box .btn-confirm1').click(function () {
        $.ajax({
            url: "<?php echo e(route('member.post_transfer_all')); ?>",
            type: 'POST',
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    location.reload();
                }
            }
        })
    });

    $('.change-icon').click(function () {
        var fromAccount = $('#fromAccount option:selected').val();
        var toAccount = $('#toAccount option:selected').val();
        $('#fromAccount').val(toAccount);
        $('#toAccount').val(fromAccount);
    });


</script>
</body>
</html>