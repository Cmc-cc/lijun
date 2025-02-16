@extends('wap.template.theme2.layouts.main')
@section('after.css')
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/mmenu.all.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/ssc.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/member.css') }}">
@endsection
@section('before.js')
    <script type="text/javascript" src="{{ asset('/wap/js/mmenu.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/member.js') }}"></script>
@endsection
@section('content')
    <div class="container-fluid gm_main">
        <div class="head">
            <a class="f_l" href="#u_nav"><img src="{{ asset('/wap/images/user_menu.png') }}" alt=""></a>
            <span>会员中心</span>
            <a class="f_r" href="#type"><img src="{{ asset('/wap/images/user_game.png') }}" alt=""></a>
        </div>
        @include('wap.template.theme2.layouts.aside')
        <div id="type" style="display: none">
            <ul class="g_type">
                <li>
                    @include('wap.template.theme2.layouts.aside_game_list')
                </li>
            </ul>
        </div>
        <div class="wrap userInfo">
            <form action="" method="get">
                <div class="line">
                    <span>平台</span>
                    <select name="api_type" id="api_type" required>
                        <option value="">--请选择--</option>
                        @foreach($_api_list as $k => $v)
                            @if($v=='AGS' || $v=='SUNBETS')
                                @continue
                                @endif
                            <option value="{{ $k }}" @if($api_type == $k) selected @endif>{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="submit_btn" style="margin-top: 0;" type="submit">查询</button>
            </form>
            <table cellspacing="1" cellpadding="0" border="0" class="tab1 mt10 text-center">
                <tr class="tic">
                    <td width="15%">平台</td>
                    <td width="15%">游戏名称</td>
                    <td width="15%">有效</td>
                    <td width="15%">投注</td>
                    <td width="15%">输赢</td>
                    <td width="55%">时间</td>
                </tr>
                @if ($data->total() > 0)
                    @foreach($data as $item)
                        <tr>
                            <td>{{--{{ $_api_list[$item->api_type] }}--}}
                            <?php
                                    $plat_type = $_api_list[$item->api_type];
                                    if($plat_type == 'AGS'){
                                        echo 'AG';
                                    }elseif ($plat_type == 'SUNBETS'){
                                        echo 'SUNBET';
                                    }else{
                                        echo $plat_type;
                                    }
                                ?>
                            </td>
                            <td>{{ $item->gameCode }}</td>
                            <td>{{ $item->validBetAmount }}</td>
                            <td>{{ $item->betAmount }}</td>
                            <td>{{ $item->netAmount }}</td>
                            <td>{{ $item->betTime }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">暂无投注记录！</td>
                    </tr>
                @endif
            </table>
            <table border="0" cellspacing="0" cellpadding="0" class="page">
                <tr>
                    {!! $data->appends(['api_type' => $api_type])->links() !!}
                </tr>
            </table>
        </div>

    </div>
@endsection