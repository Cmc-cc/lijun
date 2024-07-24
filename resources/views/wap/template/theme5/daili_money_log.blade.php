@extends('wap.template.theme5.layouts.main')
@section('content')
    <link href="{{ asset('/wap/theme3/css/pay.css') }}" rel="stylesheet">
    <div class="wrap data_h_money">
        <table cellspacing="1" cellpadding="0" border="0" class="tab1 text-center">
            <tr class="tic">
                <td width="33.333%">发放佣金</td>
                <td width="33.333%">发放时间</td>
                <td width="33.333%">备注</td>
            </tr>
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
        </table>
        {!! $data->render() !!}
    </div>
@endsection