<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="/new0404/js/jquery.min.js"></script>
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <link rel="stylesheet" href="./new0404/pc/css/normalize.css">
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
<div class="container">
    <div class="top-box">
    <?php echo $__env->make('member.layouts.pc_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- main -->
        <div class="pages-con p-c1">
            <div class="main-bg">
                <h2 class="title-s1 text_27"><span>MEMBER CENTER</span></h2>
                <div class="line1"></div>
                <div class="memcenter clear">
                    <div class="memMenu">
                        <ul class="commonlist">
                            <li><a href="<?php echo e(route('member.message_list')); ?>" class="text_28"
                                   oncontextmenu="return false;">
                                    <span class="mail-num" style="display: none;"></span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('member.userCenter')); ?>" class="text_29"
                                   oncontextmenu="return false;"></a>
                            </li>
                            <li><a href="<?php echo e(route('member.login_psw')); ?>" class="text_30"
                                   oncontextmenu="return false;"></a>
                            </li>
                            <li class="select"><a href="javascript:;" class="text_31" oncontextmenu="return false;"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="memRight">
                        <div class="nav">
                            <ul class="commonlist">
                                <li class="select" style="width: 150px;">
                                    <a href="../mem/placard.html" class="text_706" oncontextmenu="return false;"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="memCon clearfix">
                            <table width="730" border="0" cellspacing="0" cellpadding="0" class="mt10">
                                <thead>
                                <tr>
                                    <th style="width: 10%;word-break: normal;" class="text_3"></th>
                                    <th style="width: 20%;" class="text_4"></th>
                                    <th style="width: 50%;" class="text_5"></th>
                                    <th style="width: 20%;" class="text_6"></th>
                                </tr>
                                </thead>
                                <tbody id="detail">
                                    <?php $__currentLoopData = $system_notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td width="8%"><font color="#fff"><?php echo e($v->id); ?></font></td>
                                            <td width="20%"><font color="#059C74"><?php echo e($v->title); ?></font></td>
                                            <td width="52%"><font color="#fff"><?php echo e($v->content); ?></font></td>
                                            <td width="20%"><font color="#059C74"><?php echo e($v->created_at); ?></font></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('member.layouts.pc_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php echo $__env->make('member.layouts.pc_right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>