@extends('wap.template.theme5.layouts.main')
@section('content')
    <div class="layout mt12">

        {{--<div class="mod-f-input">
            <input type="text" placeholder="请输入您要找的游戏名称" id="byelectronicsFocus">
            <button onclick="getElectronic(2);">查询</button>
        </div>--}}
        <ul class="mod-f-l mt12 mg-lists" id="game-list">
            <?php
            $fish = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish');
            ?>
                @foreach($fish as $k => $v)
            <li onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&game_code={{$v['game_code']}}&devices=1'); @else notify('请先登录游戏！'); @endif" platformcode="AG" gametype="6" gameid="" gamename="">
                <a href="javascript:void(0)">
                    <img src="{{ $v['img'] }}">
                    <span class="game-text">{{ $v['name'] }}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <script>
        $(function () {
            //getElectronic(1);
        })
    </script>
@endsection
