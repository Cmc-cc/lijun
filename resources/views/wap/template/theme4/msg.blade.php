@extends('wap.template.theme4.layouts.main')
@section('content')
    <div class="hd-tit" style="margin-top: 10px;">
        <h3>我的消息</h3>
    </div>
    <div class="layout mt12">
        <table class="pagetab historytab" style="table-layout:fixed; ">
            <thead>
            <tr>
                <td>时间</td>
                <td>标题</td>
                <td>内容</td>
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

    </div>
@endsection