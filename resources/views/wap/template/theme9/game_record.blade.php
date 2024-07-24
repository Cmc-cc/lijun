@extends('wap.template.theme9.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme9/css/betRecordPlus.css') }}" rel="stylesheet">
    <section id="content">
        <div id="page-title">游戏记录</div>
        <section class="inner ng-scope">
            <div class="col-md-12">
                <div>
                    <div ng-switch-when="true" class="panel panel-custom ng-scope" id="transactionContent">
                        <div class="panel-body">
                            <form class="ng-pristine ng-valid ng-valid-datetime ng-submitted" action="" method="get">
                                <div class="row">
                                    <div class="form-group col-sm-6 top-radio">
                                        <div class="control-div ng-scope">
                                            <label class="control-label">开始时间</label>
                                            <input type="date" id="startTime" class="form-control ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty ng-valid-datetime" name="st"  value="<?php echo $st ? $st : date('Y-m-d')?>" max="<?php echo date('Y-m-d') ?>">
                                            <label class="control-label"> 结束时间</label>
                                            <input type="date" id="endTime" class="form-control ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty ng-valid-datetime" name="et"  value="<?php echo $et ? $et : date('Y-m-d')?>" max="<?php echo date('Y-m-d',strtotime('+1 day'))?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 game-type">
                                        <div class="control-div">
                                            <label class="control-label">选择下注平台</label>
                                            <select class="form-control ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty ng-valid-datetime" id="transactionSel" name="api_type">
                                                <option value="">--请选择--</option>
                                                @foreach($_api_list as $k => $v)
                                                    @if($v=='AGS' || $v=='SUNBETS')
                                                        @continue
                                                    @endif
                                                    <option value="{{ $k }}" @if($api_type == $k) selected @endif>{{ $v }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center" style="margin-top:20px">
                                    <button type="submit" class="btn btn-primary btn-search">搜寻</button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered pagetab" datasource="cashin" style="display: table;">
                                    <thead>
                                    <tr>
                                        <td>平台</td>
                                        <td>游戏名称</td>
                                        <td>有效</td>
                                        <td>投注</td>
                                        <td>输赢</td>
                                        <td>时间</td>
                                    </tr>
                                    </thead>
                                    <tbody id="cashin">
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

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection