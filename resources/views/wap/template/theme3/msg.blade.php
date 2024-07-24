@extends('wap.template.theme3.layouts.main')
@section('content')
    <link href="{{asset('/wap/theme3/css/my.css')}}" rel="stylesheet" />
    <main class="panel slideout-panel slideout-panel-left" id="transactionContent" style="height:calc(100% - 60px);">
        <!---->
        <div data-v-76fa910e="" class="navbar-container" style="">
            <div data-v-76fa910e="" middle="" class="logo-container"></div>
            <div data-v-76fa910e="" middle="" class="menu-container" onclick="self.location=document.referrer;">
                <div data-v-76fa910e="" relative="" style="">
                    <img data-v-76fa910e="" middle="" src="{{ asset('/wap/theme3/images/main/goback.png') }}" alt="" style="">
                </div>
            </div>
            <div data-v-76fa910e="" class="title">
                <h3 data-v-76fa910e="" class="title">我的消息</h3>
            </div>
            <div data-v-76fa910e="" middle="" class="balance"></div>
            <div data-v-76fa910e="" middle="" class="info-container"></div>
        </div>

        <div data-v-0ba198ab="" class="drawRecord view">
            <div data-v-0ba198ab="" class="scroll">
                <div class="table-content">
                    {{--<div class="page-cont">
                        <div class="first">共 <span id="page">0</span> 页,总计 <span id="pageCount">-</span> 条</div>
                        <div class="second">
                            <button onclick="getMeg('-1')">上一页</button>
                            <input type="number" id="num" min="1" value="1">
                            <button onclick="getMeg('+0')">确定</button>
                            <button onclick="getMeg('+1')">下一页</button>
                        </div>
                    </div>--}}
                    <div class="mine-table">
                        <table class="historytab" datasource="cashin">
                            <thead>
                            <tr>
                                <td>时间</td>
                                <td>标题</td>
                                <td>内容</td>
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
                    </div>
                    {!! $data->links() !!}
                </div>


            </div>
        </div>
        <!---->
    </main>
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
@endsection