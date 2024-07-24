@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/history.css') }}" rel="stylesheet">
    <link href="{{ asset('wap/theme3/css/my.css') }}" rel="stylesheet" />
    <table class="pagetab historytab" style="table-layout:fixed; ">
        <thead>
        <tr>
            <th>时间</th>
            <th>标题</th>
            <th>内容</th>
        </tr>
        </thead>
        <tbody id="getlists">
        @if ($data->total() > 0)
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">暂无记录！</td>
            </tr>
        @endif
        </tbody>
        <tfoot id="foot">
        </tfoot>
    </table>
    {!! $data->links() !!}
@endsection