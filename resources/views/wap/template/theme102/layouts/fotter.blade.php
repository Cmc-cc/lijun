<!--<div class="fixBottom">-->
<!--    <a href="/m/activity_list" id="footer1">{{trans("lang.hdzx")}}</a>-->
<!--    <a href="javascript:void(0);" class="contact kefu_box" id="footer2">{{trans("lang.zxkf")}}<p></p></a>-->
<!--    <a href="/m" id="footer3">{{trans("lang.shouye")}}</a>-->
<!--    <a href="/m/transfer" class="gdbtn" id="footer4">{{trans("lang.edzh")}}</a>-->
<!--	<a href="/m/userinfo" id="footer5">{{trans("lang.wode")}}</a>-->
<!--</div>-->

<script type="text/javascript">
    $('body').on('click','.kefu_box',function(){
        layer.open({
            content: '<div class="layui-m-layerbtn"><a href="{{getset('whatsapp_url')}}" target="_blank"><span yes="" type="1"  data-clipboard-target="#url">WHATSAPP '+"{{getset('whatsapp')}}"+'</span></a></div><div class="layui-m-layerbtn"><a href="{{getset('service_link')}}" target="_blank"><span yes="" type="1">{{trans("lang.zxkf")}}</span></a></div>'
            ,skin: 'footer'
        });
    })
    function tapCopy(){
        location.href="{{getset('whatsapp_url')}}"
    }
    function wechat(){
        layer.open({
            content: '<img src="{{getset('wx_pic')}}" style="width:200px;height:200px;">'
            ,btn: 'OK'
        });
    }
</script>