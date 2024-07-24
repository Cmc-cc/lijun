<!DOCTYPE html>
<html  id="ng-app" ng-app="portalApp" meidon-time="2018"  moment-lang="zh-CN"  ng-init="'{{ $_system_config->site_title or 'motoo' }}'">
<head>
    <title>{{ $_system_config->site_title or 'motoo' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="/favicon.ico" />

    <link href="{{asset('web/mb22/css/common.css')}}" rel="stylesheet">
    <link href="/web/mb23/css/jquery-ui.min.css" rel="stylesheet"/>

    <link href="/web/mb23/css/jquery-ui.theme.min.css" rel="stylesheet"/>

    <link href="/web/mb23/css/normalize.min.css" rel="stylesheet"/>

    <link href="/web/mb23/css/font-awesome5.min.css" rel="stylesheet"/>

    <link href="/web/mb23/bundles/custom.css?v=5Wa8nqZwlBGzu1Pp_QLNPIWNPw7nHF_nimfxfdWB2fE1" rel="stylesheet"/>

    <link href="/web/mb23/bundles/custom-modal.css?v=OoJMx9HYbSSX_kAkQy-IAdtYhsAf8mb55menPwEb4kQ1" rel="stylesheet"/>

    <link href="/web/mb29/bundles/site.css" rel="stylesheet"/>
 @if($web_route == 'web.index')  <link href="/web/mb29/bundles/home.css?v=Z0I1MnqVfQ2Gxw7Nrs0FZ-E7HyV84bcUupfFjChrVWE1" rel="stylesheet"/> @else  @endif

    <link href="/web/mb23/Content/Views/Shared/zh-CN.css?version=20150116" rel="stylesheet" />



    <link href="/web/mb23/Content/Views/Home/zh-CN.css?version=201404141731" rel="stylesheet" />
    <link href="/web/mb23/Content/each-site/animate.css" rel="stylesheet" />

    
    <script src="/web/mb23/js/jquery.min.js"></script>

    <script src="/web/mb23/js/jquery.marquee.min.js"></script>

    <script src="/web/mb23/js/jquery-ui.min.js"></script>

    <script src="/web/mb23/bundles/common.js?v=HNgwom0Dzrx_ZWnmf34LgV_TQUJqznH90A6VSugf2eM1"></script>

    <script src="/web/mb23/js/angular.min.js"></script>

    <script src="/web/mb23/js/moment-with-locales.min.js"></script>

    <script src="/web/mb23/js/moment-timezone-with-data.min.js"></script>

    <script src="/web/mb23/js/jquery.signalR-2.2.0.min.js"></script>




    <link rel="stylesheet" href="{{ asset('/web/mb23/css/qqq5595.css') }}">


    <!--[if lte IE 9]>
        <script src="/web/mb23/js/placeholders.min.js"></script>
        <script src="/web/mb23/js/html5shiv.js"></script>
    <![endif]-->

</head>
<body class="layout" ng-controller="LayoutCtrl">

@include('web.template.mb29.layouts.header')

@yield('content')
@include('web.template.mb29.layouts.aside')
<div class="notice_layer">
    <h3>公告详情 <span class="close"></span></h3>
    <div class="notice_con">
        @foreach($_system_notices as $v)
            <div class="module">
                <h4>{{ $v->title }}</h4>
                <p>✿{{ $v->content }}</p>
            </div>
        @endforeach
    </div>
</div>
@include('web.template.mb29.layouts.footer')
    <script src="https://cdn.igsttech.com/Web.Portal/_Common/Scripts/angular-animate/v1.2.14/angular-animate.min.js"></script>

    <script src="/web/mb23/js/ui-bootstrap-custom-tpls-0.10.0.min.js"></script>

    <script src="/web/mb23/Scripts/_site.js"></script>
    <script src="/web/mb23/bundles/environment.js?v=Sre_8bGZaXimeK2YCmr6RnY-uXP9_R8xIoUe5rN9spE1"></script>

    <script src="/web/mb23/Scripts/_config.js?version=20180117"></script>
    <script src="/web/mb23/Scripts/i18n/labels_zh-CN.js"></script>
    <script src="/web/mb23/js/angular-services.js?v=xyS-EheotkV8v-wdjby6bg-IWjEt_QrwXtAziZJAbBg1"></script>

    <script src="/web/mb23/js/angular-controllers.js?v=GjlNbpztu87jUS-Hv4d-WGODPxxT3eeYi2dzmiOKFXc1"></script>

    <script src="/web/mb23/js/angular-directives.js?v=agA_5MsASKuCuZnnudjzArmMB0Hg9A0aIc_PlABHIFY1"></script>

    <script src="/web/mb23/js/angular-filters.js?v=MeeQJovOHWNSkHRSyl6Jkj407IAV6G2P3C98wCBb83I1"></script>

    <script src="/web/mb23/bundles/portal-shared.js?v=1Qym7_7BFPaXQLvJzrHwUYSZT9__RyZpz431AkFTpQQ1"></script>


    
    <script src="/web/mb23/js/common.min.js"></script>
    <script src="/web/mb23/js/jquery.cycle2.js"></script>

<script src="/web/mb23/js/jquery.cycle2.carousel.js"></script>
    <script src="/web/mb23/Scripts/each-site/wow.js"></script>
<script>
    $('.winner').slide({
        mainCell: '.winner-list ul',
        autoPlay: true,
        effect: 'topMarquee',
        vis: 7,
        interTime: 50,
        trigger: 'click'
    });
    $(function () {
        $(window).on("scroll", function () {
            if ($(this).scrollTop() > 420) {
                $("#account-box").removeClass("home");
            } else {
                $("#account-box").addClass("home");
            }
        });
    });
</script>


<script src="{{ asset('/web/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('/web/js/index1.js') }}"></script>
<script src="{{ asset('/web/js/yk_modal.js') }}"></script>
<script src="{{ asset('/web/layer/layer.js') }}"></script>
<script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>
<script src="{{ asset('/web/js/jquery.lazyload.min.js') }}"></script>
<script src="{{ asset('/web/js/jquery.fly.min.js') }}"></script>
<script src="{{ asset('/web/js/common.js') }}"></script>
@yield('after.js')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
	function AddFavorite(sURL, sTitle) {
		try {
			window.external.addFavorite(sURL, sTitle);
		} catch (e) {
			try {
				window.sidebar.addPanel(sTitle, sURL, "");
			} catch (e) {
				alert("加入收藏失败，请使用Ctrl+D进行添加");
			}
		}
	}	
	function Alert(){

	layer.alert('您好！请登录后在点我进入游戏哦!',{icon:7});
};

</script>
<script>


    (function ($) {
        $(function () {

            //公告
            $('#mar0,.mar0').on('click', function () {
                var notice_index = layer.open({
                    type: 1,
                    title: false,
                    closeBtn: 0,
                    area: '640px',
                    skin: 'layui-layer-nobg', //没有背景色
                    shadeClose: true,
                    content: $('.notice_layer')
                });

                $('.notice_layer').on('click', '.close', function () {
                    layer.close(notice_index)
                })
            })

        })
    })(jQuery)
</script>
</body>
</html>