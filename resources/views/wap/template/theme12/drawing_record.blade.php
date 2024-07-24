@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/history.css') }}" rel="stylesheet">
    <link href="{{ asset('wap/theme3/css/my.css') }}" rel="stylesheet" />
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
                <td colspan="4">暂无提款记录！</td>
            </tr>
        @endif
        </tbody>
        <tfoot id="foot">
        </tfoot>
    </table>
    {!! $data->links() !!}
@endsection