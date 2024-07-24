@extends('wap.template.theme12.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme12/css/history.css') }}" rel="stylesheet">
    <link href="{{ asset('wap/theme3/css/my.css') }}" rel="stylesheet" />
    <table class="pagetab historytab" style="table-layout:fixed; ">
        <thead>
        <tr>
            <th>发放佣金</th>
            <th>发放佣金</th>
            <th>备注</th>
        </tr>
        </thead>
        <tbody id="getlists">
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
        <tfoot id="foot">
        </tfoot>
    </table>
    {!! $data->render() !!}
@endsection