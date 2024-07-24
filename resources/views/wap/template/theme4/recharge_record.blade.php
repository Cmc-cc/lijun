@extends('wap.template.theme4.layouts.main')
@section('content')
    <div class="hd-tit" style="margin-top: 10px;">
        <h3>充值记录</h3>
    </div>
    <div class="layout mt12">
        <table class="pagetab historytab" style="table-layout:fixed; ">
            <thead>
            <tr>
                <th>充值时间</th>
                <th>充值金额</th>
                <th>充值状态</th>
                {{--<th>输赢</th>
                <th style="white-space: normal;word-break: normal">时间</th>--}}
            </tr>
            </thead>
            <tbody id="getlists">
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
            <tfoot id="foot">
            </tfoot>
        </table>
        {!! $data->links() !!}

    </div>
@endsection