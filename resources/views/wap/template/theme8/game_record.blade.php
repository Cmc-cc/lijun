@extends('wap.template.theme8.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('/wap/theme3/css/my.css') }}">
    <div class="mine-bet-record-body">
        <header class="mui-bar mui-bar-nav mui-action-back">
            <a class="mui-icon mui-icon-left-nav mui-pull-left" style="margin-top:0"></a>
            <h1 class="mui-title">
                投注记录
            </h1>
        </header>
        <div class="mui-content mine-bet-record-content mui-scroll" id="refreshContainer" data-scroll="1" data-pullrefresh="2">
            <div class="mui-scroll" style="transform: translate3d(0px, 0px, 0px) translateZ(0px);">
                <!-- 主界面具体展示内容 -->
                <div class="mui-row">
                    <div class="mui-input-group mine-form data-filter">
                        <form id="form1" name="form1" action="" method="get">
                        <div class="gb-datafilter">
                            投注日期:
                            <span class="input-date">
                                <a href=""></a>
                                <input name="st" type="date" class="date" value="<?php echo $st ? $st : date('Y-m-d')?>" id="startTime" max="<?php echo date('Y-m-d')?>">
                            </span>
                            ~
                            <span class="input-date">
                                <a href=""></a>
                                <input name="et" type="date" class="date" value="<?php echo $et ? $et : date('Y-m-d')?>" id="endTime" max="<?php echo date('Y-m-d',strtotime('+1 day'))?>">
                            </span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="gb-datafilter" style="padding:0;padding-bottom:13px;margin-left:10px">
                            选择下注平台:
                            <span class="input-date" style="border:1px solid #e2e2e2">
                                <select id="historySel" name="api_type">
                                    <option value="">--请选择--</option>
                                    @foreach($_api_list as $k => $v)
                                        @if($v=='AGS' || $v=='SUNBETS')
                                            @continue
                                        @endif
                                        <option value="{{ $k }}" @if($api_type == $k) selected @endif>{{ $v }}</option>
                                    @endforeach
                                </select>
                            </span>
                            <button type="submit"  class="btn mui-btn mui-btn-primary btn-ss" style="width: 35%;">搜索</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="mine-table">
                    <table>
                        <thead>
                        <tr class="head">
                            <td>平台</td>
                            <td>游戏名称</td>
                            <td>有效</td>
                            <td>投注</td>
                            <td>输赢</td>
                            <td>时间</td>
                        </tr>
                        </thead>
                        <tbody id="getlists">
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
                        </tbody>

                    </table>
                    {!! $data->appends(['api_type' => $api_type,'st' =>$st,'et'=>$et])->links() !!}
                </div>
                <div class="mui-pull-bottom-pocket">
                    <div class="mui-pull">
                        <div class="mui-pull-loading mui-icon mui-spinner"></div>
                        <div class="mui-pull-caption">上拉显示更多</div>
                    </div>
                </div>
            </div>
            <div class="mui-scrollbar mui-scrollbar-vertical">
                <div class="mui-scrollbar-indicator" style="transition-duration: 0ms; display: block; height: 8px; transform: translate3d(0px, 613px, 0px) translateZ(0px);"></div>
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