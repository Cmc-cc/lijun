@extends('wap.template.theme8.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('/wap/theme3/css/my.css') }}">
    <div class="mine-bet-record-body">
        <header class="mui-bar mui-bar-nav mui-action-back">
            <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
            <h1 class="mui-title">
                下线会员充值记录
            </h1>
        </header>
        <div class="mui-content mine-bet-record-content mui-scroll" id="refreshContainer" data-scroll="1" data-pullrefresh="2">
            <div class="mui-scroll" style="transform: translate3d(0px, 0px, 0px) translateZ(0px);">
                <!-- 主界面具体展示内容 -->
                <div class="mine-table">
                    <link href="{{ asset('/wap/theme3/css/pay.css') }}" rel="stylesheet">
                    <div class="wrap userInfo">
                        <!--            --><!--?php //include_once("moneysubmenu.php"); ?-->
                        <form id="form1" name="form1" action="" method="get">
                            <table cellspacing="0" cellpadding="0" border="0" class="tab1">
                                <tr>
                                    <td class="bg" align="right">会员名：</td>
                                    <td>
                                        <input type="text" class="input_150"
                                               style="cursor: pointer; margin-bottom: 5px" name="name" value="{{ $name }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg" align="right">开始日期：</td>
                                    <td>
                                        <input name="cn_begin" type="text" id="cn_begin" class="input_150 laydate-icon" readonly="readonly" value="<?=$cn_begin?>" onclick="laydate();" style="cursor: pointer; margin-bottom: 5px"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg" align="right">结束日期：</td>
                                    <td>
                                        <input name="cn_end" type="text" id="cn_end" class="input_150 laydate-icon" readonly="readonly" value="<?=$cn_end?>" onclick="laydate();" style="cursor: pointer; margin-bottom: 5px"/>

                                    </td>
                                </tr>
                            </table>
                            <button type="submit" class="submit_btn" style="background: #1b75d9;line-height: 1.4">查　询</button>
                        </form>
                        <table cellspacing="1" cellpadding="0" border="0" class="tab1 mt10 text-center">
                            <tr class="tic">
                                <td>用户名</td>
                                <td>金额</td>
                                <td>存款时间</td>
                                <td>状态</td>
                            </tr>
                            @if ($data->total() > 0)
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->member->name }}</td>
                                        <td>{{ $item->money }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ \App\Models\Base::$RECHARGE_STATUS[$item->status] }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">暂无存款记录！</td>
                                </tr>
                            @endif
                        </table>
                        {!! $data->appends(['cn_begin' => $cn_begin, 'cn_end' => $cn_end, 'name' => $name])->links() !!}
                    </div>
                    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
                </div>
            </div>
        </div>
    </div>
    <script>
        mui(".pagination").on('tap','a',function(){
            var url = $(this).attr('href');
            window.location.href= url;
        })
    </script>
@endsection