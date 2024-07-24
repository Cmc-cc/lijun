@extends('wap.template.theme5.layouts.main')
@section('content')
    <div class="hd-tit" style="margin-top: 10px;">
        <h3>提款记录</h3>
    </div>
    <div class="layout mt12">
        <table class="pagetab historytab" style="table-layout:fixed; ">
            <thead>
            <tr>
                <th>提款时间</th>
                <th>提款金额</th>
                <th>提款状态</th>
                <th>失败原因</th>
            </tr>
            </thead>
            <tbody id="getlists">
            @if ($data->total() > 0)
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->money }}</td>
                        <td>{!! \App\Models\Base::$DRAWING_STATUS_HTML[$item->status] !!}</td>
                        <td>{{ $item->fail_reason }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">暂无提款记录！</td>
                </tr>
            @endif
            </tbody>
            <tfoot id="foot">
            </tfoot>
        </table>
        {!! $data->links() !!}

    </div>
@endsection