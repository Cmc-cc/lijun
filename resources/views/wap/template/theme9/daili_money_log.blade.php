@extends('wap.template.theme9.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme9/css/betRecordPlus.css') }}" rel="stylesheet">
    <section id="content">
        <div id="page-title">佣金发放记录</div>
        <section class="inner ng-scope">
            <div class="col-md-12">
                <div>
                    <div ng-switch-when="true" class="panel panel-custom ng-scope" id="transactionContent">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered pagetab" datasource="cashin" style="display: table;">
                                    <thead>
                                    <tr>
                                        <td>发放佣金</td>
                                        <td>发放时间</td>
                                        <td>备注</td>
                                    </tr>
                                    </thead>
                                    <tbody id="cashin">
                                    @if ($data->total() > 0)
                                        @foreach($data as $item)
                                            <tr>
                                                <td>{{ $item->money }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->remark }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">暂无发放记录！</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                {!! $data->render() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection