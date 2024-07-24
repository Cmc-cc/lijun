@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">系统设置</h3>
            </div>
            <div class="panel-body">
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">信息</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">佣金与打码量设置</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">交易账号</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">第三方支付</a></li>
                        <li role="presentation"><a href="#leyu" aria-controls="leyu" role="tab" data-toggle="tab">游戏接口配置</a></li>
                        {{-- <li role="presentation"><a href="#banner" aria-controls="banner" role="tab" data-toggle="tab">首页banner图</a></li> --}}
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <form class="form-horizontal" id="form" action="{{ route('system_config.update', ['id' => 1]) }}" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="site_name" class="col-sm-2 control-label">网站名称</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="site_name" name="site_name" value="{{ $data->site_name }}"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">网站logo</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload" type="file" name="file" multiple>
                                            <div id="progress" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files" class="files">
                                                @if($data->site_logo)
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="{{ $data->site_logo }}" target="_blank"><img src="{{ $data->site_logo }}" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="site_logo" value="{{ $data->site_logo }}">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">网站ico</label>
                                        <div class="col-sm-7">
                                            <input id="fileuploadico" type="file" name="ico" multiple>
                                            <div id="progress_ico" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files_ico" class="files">
                                                @if($data->ico)
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="{{ $data->ico }}" target="_blank"><img src="{{ $data->ico }}" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="ico" value="{{ $data->ico }}">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">背景音乐</label>
                                        <div class="col-sm-7">
                                            <input id="fileuploadmp3" type="file" name="mp3" multiple>
                                            <div id="progressmp3" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files_mp3" class="files">
                                                @if($data->mp3)
                                                    
                                                        <font color="red">{{ $data->mp3 }}</font>
                                                    
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="site_name" class="col-sm-2 control-label">whatsapp</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $data->whatsapp }}"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="site_name" class="col-sm-2 control-label">whatsapp链接</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="whatsapp_url" name="whatsapp_url" value="{{ $data->whatsapp_url }}"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_link" class="col-sm-2 control-label">线上客服链接</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="service_link" name="service_link"  value="{{ $data->service_link }}" />
                                        </div>
                                    </div>
                                    
                                    
                                    <!--<div class="form-group">-->
                                    <!--    <label for="subtitle" class="col-sm-2 control-label">手机站logo</label>-->
                                    <!--    <div class="col-sm-7">-->
                                    <!--        <input id="fileupload4" type="file" name="file" multiple>-->
                                    <!--        <div id="progress4" class="progress">-->
                                    <!--            <div class="progress-bar progress-bar-success"></div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="form-group">-->
                                    <!--    <label for="subtitle" class="col-sm-2 control-label"></label>-->
                                    <!--    <div class="col-sm-7">-->
                                    <!--        <div id="files4" class="files">-->
                                    <!--            @if($data->m_site_logo)-->
                                    <!--                <div class="pull-left" style="position:relative;margin: 10px;">-->
                                    <!--                    <a href="{{ $data->m_site_logo }}" target="_blank"><img src="{{ $data->m_site_logo }}" alt="" style="width: 100px;"></a>-->
                                    <!--                    <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>-->
                                    <!--                    <input type="hidden" name="m_site_logo" value="{{ $data->m_site_logo }}">-->
                                    <!--                </div>-->
                                    <!--            @endif-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">客服微信二维码</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload_wx" type="file" name="file" multiple>
                                            <div id="progress_wx" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files_wx" class="files">
                                                @if($data->wx_pic)
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="{{ $data->wx_pic }}" target="_blank"><img src="{{ $data->wx_pic }}" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="wx_pic" value="{{ $data->wx_pic }}">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_alert_on" class="col-sm-2 control-label"><span style="color: red">是否开启弹框</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_alert_on"  value="0" @if($data->is_alert_on == 0)checked @endif />开放</label>
                                            <label><input type="radio" name="is_alert_on"  value="1" @if($data->is_alert_on == 1)checked @endif />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_alert_on" class="col-sm-2 control-label"><span >是否开启转盘</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_zhuanpan"  value="0" @if($data->is_zhuanpan == 0)checked @endif />开放</label>
                                            <label><input type="radio" name="is_zhuanpan"  value="1" @if($data->is_zhuanpan == 1)checked @endif />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">弹框图片</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload9" type="file" name="file" multiple>
                                            <div id="progress9" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files9" class="files">
                                                @if($data->alert_img)
                                                    @php
                                                        $alert_img = explode(',',$data->alert_img);
                                                    @endphp
                                                    @foreach($alert_img as $item)
                                                        <div class="pull-left" style="position:relative;margin: 10px;">
                                                            <a href="{{ $item }}" target="_blank"><img src="{{ $item }}" alt="" style="width: 100px;"></a>
                                                            <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                            <input type="hidden" name="alert_img[]" value="{{ $item }}">
                                                        </div>
                                                    @endforeach
                                                @endif
                                               
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="form-group">--}}
                                    {{--<label for="is_alert_on" class="col-sm-2 control-label"><span style="color: red">是否开启左侧悬浮</span></label>--}}
                                    {{--<div class="col-sm-7">--}}
                                    {{--<label><input type="radio" name="is_left_on"  value="0" @if($data->is_left_on == 0)checked @endif />开放</label>--}}
                                    {{--<label><input type="radio" name="is_left_on"  value="1" @if($data->is_left_on == 1)checked @endif />关闭</label>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label for="subtitle" class="col-sm-2 control-label">悬浮图片</label>--}}
                                    {{--<div class="col-sm-7">--}}
                                    {{--<input id="fileupload10" type="file" name="file" multiple>--}}
                                    {{--<div id="progress10" class="progress">--}}
                                    {{--<div class="progress-bar progress-bar-success"></div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label for="subtitle" class="col-sm-2 control-label"></label>--}}
                                    {{--<div class="col-sm-7">--}}
                                    {{--<div id="files10" class="files">--}}
                                    {{--@if($data->left_img)--}}
                                    {{--<div class="pull-left" style="position:relative;margin: 10px;">--}}
                                    {{--<a href="{{ $data->left_img }}" target="_blank"><img src="{{ $data->left_img }}" alt="" style="width: 100px;"></a>--}}
                                    {{--<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>--}}
                                    {{--<input type="hidden" name="left_img" value="{{ $data->left_img }}">--}}
                                    {{--</div>--}}
                                    {{--@endif--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label for="is_alert_on" class="col-sm-2 control-label"><span style="color: red">是否开启右侧悬浮</span></label>--}}
                                    {{--<div class="col-sm-7">--}}
                                    {{--<label><input type="radio" name="is_right_on"  value="0" @if($data->is_right_on == 0)checked @endif />开放</label>--}}
                                    {{--<label><input type="radio" name="is_right_on"  value="1" @if($data->is_right_on == 1)checked @endif />关闭</label>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label for="subtitle" class="col-sm-2 control-label">悬浮图片</label>--}}
                                    {{--<div class="col-sm-7">--}}
                                    {{--<input id="fileupload11" type="file" name="file" multiple>--}}
                                    {{--<div id="progress11" class="progress">--}}
                                    {{--<div class="progress-bar progress-bar-success"></div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label for="subtitle" class="col-sm-2 control-label"></label>--}}
                                    {{--<div class="col-sm-7">--}}
                                    {{--<div id="files11" class="files">--}}
                                    {{--@if($data->right_img)--}}
                                    {{--<div class="pull-left" style="position:relative;margin: 10px;">--}}
                                    {{--<a href="{{ $data->right_img }}" target="_blank"><img src="{{ $data->right_img }}" alt="" style="width: 100px;"></a>--}}
                                    {{--<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>--}}
                                    {{--<input type="hidden" name="left_img" value="{{ $data->right_img }}">--}}
                                    {{--</div>--}}
                                    {{--@endif--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="form-group">
                                        <label for="site_title" class="col-sm-2 control-label">网站标题</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="site_title" name="site_title" value="{{ $data->site_title }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="site_domain" class="col-sm-2 control-label">网站主域名</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" placeholder="不需要填写http://" id="site_domain" name="site_domain" value="{{ $data->site_domain }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">关键字</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="keyword" name="keyword"  value="{{ $data->keyword }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone1" class="col-sm-2 control-label">客服电话1</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="phone1" name="phone1"  value="{{ $data->phone1 }}" />
                                        </div>
                                        <label for="phone2" class="col-sm-1 control-label">客服电话2</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="phone2" name="phone2"  value="{{ $data->phone2 }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="qq" class="col-sm-2 control-label">客服qq</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="qq" name="qq" placeholder="直接填写 qq号"  value="{{ $data->qq }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="qq" class="col-sm-2 control-label">代理qq</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="qq" name="agent_qq" placeholder="直接填写 qq号"  value="{{ $data->agent_qq }}" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="app_link" class="col-sm-2 control-label">短信开关</label>
                                        <div class="col-sm-2">
                                            <label><input type="radio" name="sms_message"  value="1" @if($data->sms_message == 1)checked @endif />开启</label>
                                            <label><input type="radio" name="sms_message"  value="0" @if($data->sms_message == 0)checked @endif />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="app_link" class="col-sm-2 control-label">APP链接</label>
                                        <div class="col-sm-2">
                                            <label><input type="radio" name="is_app_link_on"  value="0" @if($data->is_app_link_on == 0)checked @endif />开启</label>
                                            <label><input type="radio" name="is_app_link_on"  value="1" @if($data->is_app_link_on == 1)checked @endif />关闭</label>
                                            <label style="color: red">(pc,wap是否显示下载按钮)</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="app_link" name="app_link"  value="{{ $data->app_link }}" />
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">苹果APP下载二维码</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload20" type="file" name="file" multiple>
                                            <div id="progress20" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files20" class="files">
                                                @if($data->wap_qrcode)
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="{{ $data->wap_qrcode }}" target="_blank"><img src="{{ $data->wap_qrcode }}" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="wap_qrcode" value="{{ $data->wap_qrcode }}">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">安卓APP下载二维码</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload21" type="file" name="file" multiple>
                                            <div id="progress21" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files21" class="files">
                                                @if($data->pic_link)
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="{{ $data->pic_link }}" target="_blank"><img src="{{ $data->pic_link }}" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="pic_link" value="{{ $data->pic_link }}">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">网站模式</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_maintain"  value="0" @if($data->is_maintain == 0)checked @endif />正常</label>
                                            <label><input type="radio" name="is_maintain"  value="1" @if($data->is_maintain == 1)checked @endif />维护</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="maintain_desc" class="col-sm-2 control-label">维护提示语</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="maintain_desc" name="maintain_desc"  value="{{ $data->maintain_desc }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fs_time" class="col-sm-2 control-label">返水提示时间</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="fs_time" name="fs_time"  value="{{ $data->fs_time or "15:00" }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cz_ration" class="col-sm-2 control-label">充值赠送金额百分比</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="cz_ration" name="cz_ration" placeholder="只填写数字"  value="{{ $data->cz_ration }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="auto_logout_time" class="col-sm-2 control-label">后台自动登出时间(小时)</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="auto_logout_time" name="auto_logout_time" placeholder="只填写数字"  value="{{ $data->auto_logout_time }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="auto_logout_time" class="col-sm-2 control-label">每日提款次数</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="transfer_times" name="transfer_times" placeholder="只填写数字"  value="{{ $data->transfer_times }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站红包控制</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_hongbao"  value="1" @if($data->is_hongbao == 1)checked @endif />开启</label>
                                            <label><input type="radio" name="is_hongbao"  value="2" @if($data->is_hongbao == 2)checked @endif />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站左侧悬浮图片</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="left_ad"  value="1" @if($data->left_ad == 1)checked @endif />开启</label>
                                            <label><input type="radio" name="left_ad"  value="2" @if($data->left_ad == 2)checked @endif />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站右侧悬浮图片</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="right_ad"  value="1" @if($data->left_ad == 1)checked @endif />开启</label>
                                            <label><input type="radio" name="right_ad"  value="2" @if($data->left_ad == 2)checked @endif />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">个人中心切换</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_new_center"  value="1" @if($data->is_new_center == 1)checked @endif />新版</label>
                                            <label><input type="radio" name="is_new_center"  value="2" @if($data->is_new_center == 2)checked @endif />旧版</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">实时返水</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_fs"  value="1" @if($data->is_fs == 1)checked @endif />开启</label>
                                            <label><input type="radio" name="is_fs"  value="2" @if($data->is_fs == 2)checked @endif />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">注册页选项</label>
                                    </div>


                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">姓名</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_real_name_1"  value="1" @if($data->is_real_name_1 == 1)checked @endif />显示</label>
                                            <label><input type="radio" name="is_real_name_1"  value="0" @if($data->is_real_name_1 == 0)checked @endif />隐藏</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <label><input type="radio" name="is_real_name_2"  value="1" @if($data->is_real_name_2 == 1)checked @endif />必填</label>
                                            <label><input type="radio" name="is_real_name_2"  value="0" @if($data->is_real_name_2 == 0)checked @endif />不必填</label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">手机</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_phone_1"  value="1" @if($data->is_phone_1 == 1)checked @endif />显示</label>
                                            <label><input type="radio" name="is_phone_1"  value="0" @if($data->is_phone_1 == 0)checked @endif />隐藏</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <label><input type="radio" name="is_phone_2"  value="1" @if($data->is_phone_2 == 1)checked @endif />必填</label>
                                            <label><input type="radio" name="is_phone_2"  value="0" @if($data->is_phone_2 == 0)checked @endif />不必填</label>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">邮箱</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_email_1"  value="1" @if($data->is_email_1 == 1)checked @endif />显示</label>
                                            <label><input type="radio" name="is_email_1"  value="0" @if($data->is_email_1 == 0)checked @endif />隐藏</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <label><input type="radio" name="is_email_2"  value="1" @if($data->is_email_2 == 1)checked @endif />必填</label>
                                            <label><input type="radio" name="is_email_2"  value="0" @if($data->is_email_2 == 0)checked @endif />不必填</label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">QQ</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_qq_1"  value="1" @if($data->is_qq_1 == 1)checked @endif />显示</label>
                                            <label><input type="radio" name="is_qq_1"  value="0" @if($data->is_qq_1 == 0)checked @endif />隐藏</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <label><input type="radio" name="is_qq_2"  value="1" @if($data->is_qq_2 == 1)checked @endif />必填</label>
                                            <label><input type="radio" name="is_qq_2"  value="0" @if($data->is_qq_2 == 0)checked @endif />不必填</label>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">微信</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_weixin_1"  value="1" @if($data->is_weixin_1 == 1)checked @endif />显示</label>
                                            <label><input type="radio" name="is_weixin_1"  value="0" @if($data->is_weixin_1 == 0)checked @endif />隐藏</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <label><input type="radio" name="is_weixin_2"  value="1" @if($data->is_weixin_2 == 1)checked @endif />必填</label>
                                            <label><input type="radio" name="is_weixin_2"  value="0" @if($data->is_weixin_2 == 0)checked @endif />不必填</label>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">推荐人</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_regtj_1"  value="1" @if($data->	is_regtj_1 == 1)checked @endif />显示</label>
                                            <label><input type="radio" name="is_regtj_1"  value="0" @if($data->	is_regtj_1 == 0)checked @endif />隐藏</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <label><input type="radio" name="is_regtj_2"  value="1" @if($data->	is_regtj_2 == 1)checked @endif />必填</label>
                                            <label><input type="radio" name="is_regtj_2"  value="0" @if($data->is_regtj_2 == 0)checked @endif />不必填</label>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <form class="form-horizontal" id="form" action="{{ route('system_config.update', ['id' => 1]) }}" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">活跃用户月充值金额</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="active_member_money" name="active_member_money"  value="{{ $data->active_member_money }}" />
                                        </div>
                                    </div><font color="red">此金额用来判断代理下线玩家是否为活跃用户,填写200元即为充值达到200元才为活跃用户。</font>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">打码量倍数</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="ml_percent" name="ml_percent"  value="{{ $data->ml_percent }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">红利打码量倍数</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="hongli_ml_percent" name="hongli_ml_percent"  value="{{ $data->hongli_ml_percent }}" />
                                        </div>
                                    </div>
                                    <font color="red">如填写1则为1倍码量，如填写0.1则为0.1倍码量</font>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">流水返还</label>
                                        <div class="col-sm-7">
                                            <input type="number" id="water" name="water"  value="{{ $data->water }}" style="width:100px;" />天内输的总额返还
                                            <input type="number"  name="water_percent"  value="{{ $data->water_percent }}" style="width:100px;" />%
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">新老用户充值</label>
                                        <div class="col-sm-7">
                                            固定充值<input type="number" id="new_level" name="new_level"  value="{{ $data->new_level }}" style="width:100px;"  placeholder="填0表示关闭"/>
                                            &nbsp;&nbsp;&nbsp;赠送<input type="number"  name="new_point"  value="{{ $data->new_point }}" style="width:100px;" placeholder="填0表示关闭"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">充值代理佣金(%)</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="daili_report" name="daili_report"  value="{{ $data->daili_report }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">最低充值</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="recharge_min" name="recharge_min"  value="{{ $data->recharge_min }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">最高充值</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="recharge_max" name="recharge_max"  value="{{ $data->recharge_max }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">最低提现</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="withdraw_min" name="withdraw_min"  value="{{ $data->withdraw_min }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">最高提现</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="withdraw_max" name="withdraw_max"  value="{{ $data->withdraw_max }}" />
                                        </div>
                                    </div>
                                    
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <form class="form-horizontal" id="form" action="{{ route('system_config.update', ['id' => 1]) }}" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="is_qq_on" class="col-sm-2 control-label"><span style="color: red">是否开放轉數快</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_qq_on"  value="0" @if($data->is_qq_on == 0)checked @endif />开放</label>
                                            <label><input type="radio" name="is_qq_on"  value="1" @if($data->is_qq_on == 1)checked @endif />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_alipay_on" class="col-sm-2 control-label"><span style="color: red">是否开放便利店转账</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_alipay_on"  value="0" @if($data->is_alipay_on == 0)checked @endif />开放</label>
                                            <label><input type="radio" name="is_alipay_on"  value="1" @if($data->is_alipay_on == 1)checked @endif />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_wechat_on" class="col-sm-2 control-label"><span style="color: red">是否开放USDT转账</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_wechat_on"  value="0" @if($data->is_wechat_on == 0)checked @endif />开放</label>
                                            <label><input type="radio" name="is_wechat_on"  value="1" @if($data->is_wechat_on == 1)checked @endif />关闭</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="is_wechat_on" class="col-sm-2 control-label"><span style="color: red">是否开放银行卡转账</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_bankpay_on"  value="0" @if($data->is_bankpay_on == 0)checked @endif />开放</label>
                                            <label><input type="radio" name="is_bankpay_on"  value="1" @if($data->is_bankpay_on == 1)checked @endif />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alipay_nickname" class="col-sm-2 control-label">支付宝昵称</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="alipay_nickname" name="alipay_nickname"  value="{{ $data->alipay_nickname }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alipay_account" class="col-sm-2 control-label">支付宝账号</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="alipay_account" name="alipay_account"  value="{{ $data->alipay_account }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">支付宝二维码(可上传多个)</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload2" type="file" name="file" multiple>
                                            <div id="progress2" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files2" class="files">
                                                @if($data->alipay_qrcode)
                                                    @php
                                                        $alipay_qrcode = explode(',',$data->alipay_qrcode);
                                                    @endphp
                                                    @foreach($alipay_qrcode as $item)
                                                        <div class="pull-left" style="position:relative;margin: 10px;">
                                                            <a href="{{ $item }}" target="_blank"><img src="{{ $item }}" alt="" style="width: 100px;"></a>
                                                            <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                            <input type="hidden" name="alipay_qrcode[]" value="{{ $item }}">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="wechat_nickname" class="col-sm-2 control-label">微信昵称</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="wechat_nickname" name="wechat_nickname"  value="{{ $data->wechat_nickname }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="wechat_account" class="col-sm-2 control-label">微信账号</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="wechat_account" name="wechat_account"  value="{{ $data->wechat_account }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">微信二维码(可上传多个)</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload3" type="file" name="file" multiple>
                                            <div id="progress3" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files3" class="files">
                                                @if($data->wechat_qrcode)
                                                    @php
                                                        $wechat_qrcode = explode(',',$data->wechat_qrcode);
                                                    @endphp
                                                    @foreach($wechat_qrcode as $item)
                                                        <div class="pull-left" style="position:relative;margin: 10px;">
                                                            <a href="{{ $item }}" target="_blank"><img src="{{ $item }}" alt="" style="width: 100px;"></a>
                                                            <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                            <input type="hidden" name="wechat_qrcode[]" value="{{ $item }}">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="qq_nickname" class="col-sm-2 control-label">轉數快姓名</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="qq_nickname" name="qq_nickname"  value="{{ $data->qq_nickname }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="qq_account" class="col-sm-2 control-label">轉數快账号</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="qq_account" name="qq_account"  value="{{ $data->qq_account }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">便利店二维码</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload_bld" type="file" name="file" multiple>
                                            <div id="progress_bld" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files_bld" class="files">
                                                @if($data->wx_pic)
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="{{ $data->bld_pic }}" target="_blank"><img src="{{ $data->bld_pic }}" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="bld_pic" value="{{ $data->bld_pic }}">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="qq_account" class="col-sm-2 control-label">USDT汇率</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="usdt_lv" name="usdt_lv"  value="{{ $data->usdt_lv }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="qq_account" class="col-sm-2 control-label">TRC地址</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="trc_address" name="trc_address"  value="{{ $data->trc_address }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">TRC二维码</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload_trc" type="file" name="file" multiple>
                                            <div id="progress_trc" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files_trc" class="files">
                                                @if($data->trc_pic)
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="{{ $data->trc_pic }}" target="_blank"><img src="{{ $data->trc_pic }}" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="trc_pic" value="{{ $data->trc_pic }}">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="qq_account" class="col-sm-2 control-label">客服代码</label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control" id="kefu_html" name="kefu_html" style="height:80px;">{{ $data->kefu_html }}</textarea>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group" style="display:none;">
                                        <label for="subtitle" class="col-sm-2 control-label">QQ二维码(可上传多个)</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload77" type="file" name="file" multiple>
                                            <div id="progress77" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="display:none;">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files77" class="files">
                                                @if($data->qq_qrcode)
                                                    @php
                                                        $qq_qrcode = explode(',',$data->qq_qrcode);
                                                    @endphp
                                                    @foreach($qq_qrcode as $item)
                                                        <div class="pull-left" style="position:relative;margin: 10px;">
                                                            <a href="{{ $item }}" target="_blank"><img src="{{ $item }}" alt="" style="width: 100px;"></a>
                                                            <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                            <input type="hidden" name="qq_qrcode[]" value="{{ $item }}">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="settings">
                            <form class="form-horizontal" id="form" action="{{ route('system_config.update', ['id' => 1]) }}" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="is_thirdpay_on" class="col-sm-2 control-label"><span style="color: red">是否开放第三方支付</span></label>
                                        <div class="col-sm-1">
                                            <label><input type="radio" name="is_thirdpay_on"  value="0" @if($data->is_thirdpay_on == 0)checked @endif />开放</label>
                                            <label><input type="radio" name="is_thirdpay_on"  value="1" @if($data->is_thirdpay_on == 1)checked @endif />关闭</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <a target="_blank" style="color: red" href="http://www.jzpay.co/#showcase">金钻支付官网</a>
                                        </div>
                                    </div>
                                    {{--<div class="form-group">
                                        <label for="third_version" class="col-sm-2 control-label">第三方版本</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_version" name="third_version" value="{{ $data->third_version }}"  />
                                        </div>
                                    </div>--}}
                                    <div class="form-group">
                                        <label for="third_userid" class="col-sm-2 control-label">第三方商户名</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_userid" name="third_userid" placeholder="例：9999" value="{{ $data->third_userid }}"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_userkey" class="col-sm-2 control-label">第三方userkey</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_userkey" name="third_userkey" placeholder="例：011d495aaaab9611cd7f1f31ccaaa9377c565aaa15" value="{{ $data->third_userkey }}"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_pay_url" class="col-sm-2 control-label">第三方 url</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_pay_url" name="third_pay_url" value="{{ $data->third_pay_url }}"  />
                                        </div>
                                    </div>
                                    {{--<div class="form-group">
                                    <label for="third_version" class="col-sm-2 control-label">银行卡通知地址</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="third_version" name="" value="{{route('pay.bank')}}" readonly  />
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_version" class="col-sm-2 control-label">订单变动通知地址</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_version" name="" value="{{route('pay.notice')}}" readonly />
                                        </div>
                                    </div>--}}

                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        
                        <div role="tabpanel" class="tab-pane" id="leyu">
                            <form class="form-horizontal" id="form" action="{{ route('system_config.update', ['id' => 1]) }}" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                   <div class="form-group">
                                        <label for="third_userid" class="col-sm-2 control-label">域名</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="leyu_domain" name="leyu_domain" value="{{ $data->leyu_domain }}"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_version" class="col-sm-2 control-label">港币</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="leyu_pre_1" name="leyu_pre_1" value="{{ $data->leyu_pre_1 }}"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_userkey" class="col-sm-2 control-label">ApiKey</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="leyu_api_key" name="leyu_api_key" value="{{ $data->leyu_api_key }}"  />
                                        </div>
                                    </div>
                                       <div class="form-group">
                                        <label for="third_version" class="col-sm-2 control-label">人民币</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="leyu_pre_2" name="leyu_pre_2" value="{{ $data->leyu_pre_2 }}"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_userkey" class="col-sm-2 control-label">ApiKey2</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="leyu_api_key2" name="leyu_api_key2" value="{{ $data->leyu_api_key2 }}"  />
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        
                        
                        <div role="tabpanel" class="tab-pane" id="banner">
                            <form class="form-horizontal" id="form" action="{{ route('banner.store') }}" method="post">
                                <input type="hidden" name="type" value="1">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">电脑端 首页banner图（可多张）</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload_b" type="file" name="file" multiple>
                                            <div id="progress_b" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files_b" class="files">
                                                @foreach($banners as $item)
                                                    @if($item->type == 1)
                                                        <div class="pull-left" style="position:relative;margin: 10px;">
                                                            <a href="{{ $item->path }}" target="_blank"><img src="{{ $item->path }}" alt="" style="width: 100px;"></a>
                                                            <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                            <input type="hidden" name="banners[]" value="{{ $item->path }}">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            <form class="form-horizontal" id="form" action="{{ route('banner.store') }}" method="post">
                                <input type="hidden" name="type" value="2">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">手机端 首页banner图（可多张）</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload_m" type="file" name="file" multiple>
                                            <div id="progress_m" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files_m" class="files">
                                                @foreach($banners as $item)
                                                    @if($item->type == 2)
                                                        <div class="pull-left" style="position:relative;margin: 10px;">
                                                            <a href="{{ $item->path }}" target="_blank"><img src="{{ $item->path }}" alt="" style="width: 100px;"></a>
                                                            <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                            <input type="hidden" name="banners[]" value="{{ $item->path }}">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section><!-- /.content -->
@endsection
@section('after.js')
    <script src="{{ asset('/backstage/js/jquery.ui.widget.js') }}"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="{{ asset('/backstage/js/jquery.iframe-transport.js') }}"></script>
    <!-- The basic File Upload plugin -->
    <script src="{{ asset('/backstage/js/jquery.fileupload.js') }}"></script>
    <script>
        /*jslint unparam: true */
        /*global window, $ */
        var upload_url = "{{ route('upload.post') }}";
        $(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = upload_url;
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="site_logo" value="'+img_path+'">' +
                        '</div>';
                    $('#files').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //手机站logo
            $('#fileupload4').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="m_site_logo" value="'+img_path+'">' +
                        '</div>';
                    $('#files4').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress4 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //弹框图片
            $('#fileupload9').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="alert_img[]" value="'+img_path+'">' +
                        '</div>';
                    $('#files9').append(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress9 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            /************************************/
            //客服微信二维码
            $('#fileupload_wx').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="wx_pic" value="'+img_path+'">' +
                        '</div>';
                    $('#files_wx').append(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress_wx .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
            /************************************/
            $('#fileuploadico').fileupload({
                url: '/admin/uploadfile',
                dataType: 'json',
                done: function (e, data) {
                    var img_path = data.result.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="ico" value="'+img_path+'">' +
                        '</div>';
                    
                    $('#files_ico').html(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress_ico .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
            
            
            $('#fileuploadmp3').fileupload({
                url: '/admin/uploadfile',
                dataType: 'json',
                done: function (e, data) {
                    var img_path = data.result.url;
                    var html = '<div  >' +
                    
                        '<font color="red" src="'+img_path+'" >'+img_path+'</font>' +
                        
                        '<input type="hidden" name="mp3" value="'+img_path+'">' +
                        '</div>';
                    
                    $('#files_mp3').html(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progressmp3 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
            //便利店二维码
            $('#fileupload_bld').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="bld_pic" value="'+img_path+'">' +
                        '</div>';
                    $('#files_bld').append(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress_bld .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
            //便利店二维码
            $('#fileupload_trc').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="trc_pic" value="'+img_path+'">' +
                        '</div>';
                    $('#files_trc').append(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress_trc .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
            
            //左侧悬浮图片
            $('#fileupload10').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="left_img" value="'+img_path+'">' +
                        '</div>';
                    $('#files10').append(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress10 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //右侧悬浮图片
            $('#fileupload11').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="right_img" value="'+img_path+'">' +
                        '</div>';
                    $('#files11').append(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress11 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //支付宝
            $('#fileupload2').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="alipay_qrcode[]" value="'+img_path+'">' +
                        '</div>';
                    $('#files2').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress2 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //微信
            $('#fileupload3').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="wechat_qrcode[]" value="'+img_path+'">' +
                        '</div>';
                    $('#files3').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress3 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');


            //QQ
            $('#fileupload77').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="qq_qrcode[]" value="'+img_path+'">' +
                        '</div>';
                    $('#files77').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress77 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //手机二维码
            $('#fileupload20').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="wap_qrcode" value="'+img_path+'">' +
                        '</div>';
                    $('#files20').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress20 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //安卓APP二维码
            $('#fileupload21').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="pic_link" value="'+img_path+'">' +
                        '</div>';
                    $('#files21').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress21 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
            //电脑端banner
            $('#fileupload_b').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="banners[]" value="'+img_path+'">' +
                        '</div>';
                    $('#files_b').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress_b .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');


            //手机端端banner
            $('#fileupload_m').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="banners[]" value="'+img_path+'">' +
                        '</div>';
                    $('#files_m').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress_m .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });

        function removeDiv(e)
        {
            $(e).closest('div').remove();
        }
    </script>
@endsection