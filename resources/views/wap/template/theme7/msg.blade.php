@extends('wap.template.theme7.layouts.main')
@section('content')
    <div class="member-money-module member-money-module-index">
        <div class="module-top">
            <div class="top-container navbar-nav">
                <div class="left-menu">
                    <a href="javascript:;" onclick="window.location.href='{{ route('wap.index') }}'">
                        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                </div>
                <div class="page-title">我的消息</div>
            </div>

        </div>
        <div class="module-main diy-scrollbar">
            <div>
                <div>
                    <div class="main-container" id="transactionContent">
                        <table class="pagetab" datasource="cashin" style="display: table;">
                            <thead>
                            <tr>
                                <th>时间</th>
                                <th>标题</th>
                                <th>内容</th>
                            </tr>
                            </thead>
                            <tbody id="cashin">
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
                        </table>
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection