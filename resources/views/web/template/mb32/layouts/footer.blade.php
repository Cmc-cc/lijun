
<!--footer-->
<div class="footer">
    <div class="wrap">
        <div class="top">
            <dl>
                <dt><img src="{{ asset('/web') }}/mb32/images/f_icon01.png"></dt>
                <dd>
                    <p class="tit">澳门热线</p>
                    <p class="num">{{ $_system_config->phone1 }}</p>
                </dd>
            </dl>
            <dl>
                <dt><img src="{{ asset('/web') }}/mb32/images/f_icon01.png"></dt>
                <dd>
                    <p class="tit">国际热线</p>
                    <p class="num">{{ $_system_config->phone2 }}</p>
                </dd>
            </dl>
            <dl>
                <dt><img src="{{ asset('/web') }}/mb32/images/f_icon02.png"></dt>
                <dd>
                    <p class="tit">联系邮箱</p>
                    <p class="num">{{ $_system_config->qq }}@qq.com</p>
                </dd>
            </dl>
            <dl>
                <a href="javascript:;" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                    <dt><img src="{{ asset('/web') }}/mb32/images/f_icon03.png"></dt>
                    <dd>
                        <p class="tit">7×24小时</p>
                        <p class="num">在线客服</p>
                    </dd>
                </a>
            </dl>
        </div>
        <div class="middle">
            <a href="javascript:;" class="bblogo"><img src="{{ asset('/web') }}/mb32/images/bbinlogo.png"></a>
        </div>
        <div class="copyright">
            <div class="left">
                <a href="javascript:;" class="aboutUs_modal">关于我们</a>
                <a href="javascript:;" class="daili_apply">代理加盟</a>
                <a href="javascript:;" class="cunkuanHelp_modal">存款帮助</a>
                <a href="javascript:;" class="qukuanHelp_modal">取款帮助</a>
                <a href="javascript:;" class="normalQues_modal">常见问题</a>
                {{--<a href="javascript:;" class="daili_apply">代理申请</a>--}}
            </div>
            <div class="right">
                Copyright © {{ $_system_config->site_name }} Reserved
            </div>
        </div>
    </div>
</div>



<div id="dailiModal" class="modal modal-login modal-daili">
    <div class="modal-content">
        <form method="POST" action="{{ route('member.post_agent_apply') }}">
            <a href="" class="close bg-icon"></a>
            <div class="modal-login_form">
                <h2>代理申请</h2>
                <div class="modal-login_line">
                    <input type="text" placeholder="QQ" required name="qq">
                </div>
                <div class="modal-login_line">
                    <input type="text" placeholder="联系电话" required name="phone">
                </div>
                <div class="modal-login_line" style="height: auto;margin-bottom: 15px">
                    <textarea name="about" placeholder="填写申请"></textarea>
                </div>
                <div class="modal-login_line">
                    <button class="modal-login_submit ajax-submit-btn" type="button">确定</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    var m = "{{ $_member }}";
    var u = "{{ route('web.login') }}";
    (function($){
        $(function(){
            $('.daili_apply').on('click',function(){
                if (!m)
                {
                    location.href=u
                }else{
                    $('#dailiModal').modal();
                }
            })
        })
    })(jQuery)
</script>

<div id="aboutUs" class="yk_modal">
    <div class="yk_modal-container">
        <a data-close="close" href="javascript:;" class="yk_modal-close"></a>
        <div class="yk_modal-hd"></div>
        <div class="yk_modal-content"></div>
        <div class="yk_modal-ft">
            <a href="javascript:;" class="yk_btn-sure">确定</a>
        </div>
    </div>
</div>
<div id="cunkuanHelp" class="yk_modal">
    <div class="yk_modal-container">
        <a data-close="close" href="javascript:;" class="yk_modal-close"></a>
        <div class="yk_modal-hd"></div>
        <div class="yk_modal-content"></div>
        <div class="yk_modal-ft">
            <a href="javascript:;" class="yk_btn-sure">确定</a>
        </div>
    </div>
</div>
<div id="qukuanHelp" class="yk_modal">
    <div class="yk_modal-container">
        <a data-close="close" href="javascript:;" class="yk_modal-close"></a>
        <div class="yk_modal-hd"></div>
        <div class="yk_modal-content"></div>
        <div class="yk_modal-ft">
            <a href="javascript:;" class="yk_btn-sure">确定</a>
        </div>
    </div>
</div>
<div id="normalQues" class="yk_modal">
    <div class="yk_modal-container">
        <a data-close="close" href="javascript:;" class="yk_modal-close"></a>
        <div class="yk_modal-hd"></div>
        <div class="yk_modal-content"></div>
        <div class="yk_modal-ft">
            <a href="javascript:;" class="yk_btn-sure">确定</a>
        </div>
    </div>
</div>
<div class="yk_backdrop"></div>

<script>
    (function($){
        $(function(){
            $('.aboutUs_modal').on('click',function(){
                $('#aboutUs').yk_modal({
                    animate:'slide',
                    width:'800px',
                    height:'500px',
                    title:'关于我们',
                    content:'{!! $about1->content !!}'
                });
            });
            $('.cunkuanHelp_modal').on('click',function(){
                $('#cunkuanHelp').yk_modal({
                    animate:'slide',
                    width:'800px',
                    height:'500px',
                    title:'存款帮助',
                    content:'{!! $about2->content !!}'
                });
            });
            $('.qukuanHelp_modal').on('click',function(){
                $('#qukuanHelp').yk_modal({
                    animate:'slide',
                    width:'800px',
                    height:'500px',
                    title:'取款帮助',
                    content:'{!! $about3->content !!}'
                });
            });
            $('.normalQues_modal').on('click',function(){
                $('#normalQues').yk_modal({
                    animate:'slide',
                    width:'800px',
                    height:'500px',
                    title:'常见问题',
                    content:'{!! $about4->content !!}'
                });
            });
        });
    })(jQuery);
</script>