@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/history.css') }}" rel="stylesheet">
    <link href="{{ asset('wap/theme3/css/my.css') }}" rel="stylesheet" />
    <table class="pagetab historytab" style="table-layout:fixed; ">
        <thead>
        <tr>
            <th>用户名</th>
            <th>姓名</th>
            <th>当前余额</th>
        </tr>
        </thead>
        <tbody id="getlists">
        @if ($data->total() > 0)
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->real_name }}</td>
                    <td>{{ $item->money }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">暂无下线会员！</td>
            </tr>
        @endif
        </tbody>
        <tfoot id="foot">
        </tfoot>
    </table>
    {!! $data->render() !!}
@endsection