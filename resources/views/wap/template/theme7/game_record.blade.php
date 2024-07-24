@extends('wap.template.theme7.layouts.main')
@section('content')
    <div class="member-money-module member-money-module-index">
        <div class="module-top">
            <div class="top-container navbar-nav">
                <div class="left-menu">
                    <a href="javascript:;" onclick="window.location.href='{{ route('wap.index') }}'">
                        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                </div>
                <div class="page-title">游戏记录</div>
            </div>

        </div>
        <div class="module-main diy-scrollbar" style="padding-top:20px;">
            <div>
                <div>
                    <div class="main-container" id="transactionContent">
                        <form id="form1" name="form1" action="" method="get">
                        <div>
                            <div class="form-group" style="">
                                <label for="mdl-11_type">选择平台</label>
                                <select id="transactionSel" class="form-control" name="api_type" required>
                                    <option value="">--请选择--</option>
                                    @foreach($_api_list as $k => $v)
                                        @if($v=='AGS' || $v=='SUNBETS')
                                            @continue
                                        @endif
                                        <option value="{{ $k }}" @if($api_type == $k) selected @endif>{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="text-align: center">
                                <button type="submit" style="padding: 5px 20px;" class="btn btn-primary confirm-btn" onclick="sureWaring()">确定</button>
                            </div>
                        </div>
                        </form>
                        <table class="pagetab" datasource="cashin" style="display: table;">
                            <thead>
                            <tr>
                                <th>平台</th>
                                <th>游戏名称</th>
                                <th>有效</th>
                                <th>投注</th>
                                <th>输赢</th>
                                <th>时间</th>
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
                        {!! $data->appends(['api_type' => $api_type])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection