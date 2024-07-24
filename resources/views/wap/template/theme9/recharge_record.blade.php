@extends('wap.template.theme9.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme9/css/betRecordPlus.css') }}" rel="stylesheet">
    <section id="content">
        <div id="page-title">充值记录</div>
        <section class="inner ng-scope">
            <div class="col-md-12">
                <div>
                    <div ng-switch-when="true" class="panel panel-custom ng-scope" id="transactionContent">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered pagetab" datasource="cashin" style="display: table;">
                                    <thead>
                                    <tr>
                                        <th>充值时间</th>
                                        <th>充值金额</th>
                                        <th>充值状态</th>
                                    </tr>
                                    </thead>
                                    <tbody id="cashin">
                                    @if ($data->total() > 0)
                                        @foreach($data as $item)
                                            <tr>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->money }}</td>
                                                <td>{!! \App\Models\Base::$RECHARGE_STATUS_HTML[$item->status] !!}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">暂无充值记录！</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                {!! $data->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection