<html class=" js cssgradients generatedcontent" style="" language="tw"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <script src="/new0404/js/jquery.min.js"></script>
    <script src="/new0404/js/jquery-ui.js"></script>
    <script src="/new0404/pc/js/jquery.marquee.min.js"></script>
    <script src="/new0404/pc/js/jquery.colorbox.js"></script>
    <link href="/new0404/pc/css/normalize.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/main.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/game.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/loading.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/main-1440.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/slotgame.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/playtech.css?202205020105" rel="stylesheet">

    <link href="/new0404/pc/css/slot777.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/mg.css?202205020105" rel="stylesheet"
          media="screen and (max-width:1600px)">
    <link rel="stylesheet" href="/new0404/pc/css/language_tw.css" id="languageCss">
    <style>
        .banner {
            position: relative;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="top-box">
    <?php echo $__env->make('member.layouts.pc_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- main -->
        <div class="main_wrap">
            <div class="loadingTracker">
                <div class="loadingSymbol">
                    <div class="logo2"></div>
                </div>
            </div>
            <div class="content">
                <div class="banner game-banner">
                    <div class="wrapper">
                        <div class="banner">
                            <div class="wrapper">
                                <div class="banner-img">
                                    <div class="banner-item item7" style="display: block; position: relative;"></div>
                                </div>
                            </div>
                            <div class="line-gray">
                                <div class="main">
                                    <div id="marquee-contect" class="mq-window-bg transfer">
                                        <div class="mq-window mq-window-1" style="height:initial;">
                                            <a class="close" oncontextmenu="return false;"></a>
                                            <div class="mq-w-title text_2"></div>
                                            <table class="mq-mem" style="width:100%;" border="0" cellpadding="0"
                                                   cellspacing="0">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                                               class="mt10">
                                                            <thead>
                                                            <tr>
                                                                <th class="text_3"></th>
                                                                <th class="text_4"></th>
                                                                <th class="text_5"></th>
                                                                <th class="text_6"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="mq-windowDetail"></tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="foot">
                                                        <b>&nbsp;</b>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <div class="confirm-box clearfix" style="width: 100%; bottom: 0px;"><a
                                                        class="confirm text_7" oncontextmenu="return false;"></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slotgameMenu-bg" style="height:500px;">
                    <div class="slotgameMenu-all">
                        <div class="slot-Menu">

                            <div class="game-content" id="game-list">
                                <div class="ag-fish game-2" style="width: 1000px; display: block;margin:0;">
                                    <div style="width: 960px;text-align: initial;float: left; ">
                                        <div class="fishTbar">
                                            <a groupid="56" class="btn-fish btn-bet toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=JD_HK&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JD_HK" oncontextmenu="return false;" oncontextmenu="return false;" style="background:url(/new0404/pc/images/g-j6.png) 55px 70px no-repeat;">
                                                <div>JDB电子</div>
                                            </a>
                                            <a groupid="56" class="btn-fish btn-bet toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=CQ_HK&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="CQ_HK" oncontextmenu="return false;" oncontextmenu="return false;" style="background:url(/new0404/pc/images/g-j12.png) 55px 70px no-repeat;">
                                                <div>CQ9电子</div>
                                            </a>
                                            <a groupid="56" class="btn-fish btn-bet toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=BBIN&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="BBIN" oncontextmenu="return false;" oncontextmenu="return false;" style="background:url(/new0404/pc/images/g-j13.png) 55px 70px no-repeat;">
                                                <div>BBIN电子</div>
                                            </a>
                                            <a groupid="56" class="btn-fish btn-bet toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=PN_HK&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PN_HK" oncontextmenu="return false;" oncontextmenu="return false;" style="background:url(/new0404/pc/images/g-j14.png) 55px 70px no-repeat;">
                                                <div>PNG电子</div>
                                            </a>
                                            <a groupid="56" class="btn-fish btn-bet toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=PG&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PG" oncontextmenu="return false;" oncontextmenu="return false;" style="background:url(/new0404/pc/images/g-17.png) 55px 70px no-repeat;margin-top:30px;">
                                                <div>PG电子</div>
                                            </a>
                                            <a groupid="56" class="btn-fish btn-bet toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=PP&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="PP" oncontextmenu="return false;" oncontextmenu="return false;" style="background:url(/new0404/pc/images/g-19.png) 55px 70px no-repeat;">
                                                <div>PP电子</div>
                                            </a>
                                        <!--    <a groupid="56" class="btn-fish btn-bet toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=JOKER&game_type=3&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="JOKER" oncontextmenu="return false;" oncontextmenu="return false;" style="background:url(/new0404/pc/images/g-20.png) 55px 70px no-repeat;">
                                                <div>JOKER电子</div>  
                                            </a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('member.layouts.pc_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php echo $__env->make('member.layouts.pc_right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="/new0404/pc/js/game.js"></script>
<script src="/new0404/pc/js/playngo.js"></script>
<script src="/new0404/pc/js/micg-list.js"></script>
<script src="/new0404/pc/js/slotgame.js"></script>
<script src="/new0404/pc/js/slot777.js"></script>
<script src="/new0404/pc/js/jquery.colorbox.js"></script>
<script src="/new0404/pc/js/jquery.marquee.min.js"></script>
</body>
</html>