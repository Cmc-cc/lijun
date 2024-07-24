@extends('wap.template.theme9.layouts.main')
@section('content')
    <section id="content">
        <section class="atd ng-scope">
            <div id="page-title">申请进度查看</div>
            <div class="atd-content">
                <div class="panel panel-default">
                    <ul class="list-group" style="padding: 5px;">
                        @foreach($data as $item)
                            <li class="list-group-item message-item">
                                <div class="message-title" style="color:#232323;">活动标题：{{ $item->activity->title }}</div>
                                <div class="message-content">
                                    @if($item->status == 3)
                                        <font color="red">你的活动申请未通过，原因：{{ $item->fail_reason }}</font>
                                    @endif
                                    @if($item->status == 2)
                                        恭喜你，你的活动申请已审核通过，赠送金额已发放到你的账户，请查收！
                                    @endif
                                    @if($item->status == 1)
                                        <font color="blue">你的活动申请正在审核，请耐心等耐！</font>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

    </section>
@endsection