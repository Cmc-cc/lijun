@extends('wap.template.theme6.layouts.main')
@section('content')
<header id="header" class="mui-bar mui-bar-nav">
    <h1 class="mui-title">捕魚游戏</h1>
    <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left">
        <span class="mui-icon mui-icon-left-nav"></span>返回
    </button>
</header>
<div class="mui-content ptgame-content mui-scroll-wrapper">
    <ul class="mui-row mui-clearfix" id="game-list">
        <?php
        $fish = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish');
        ?>
            @foreach($fish as $k => $v)
        <li class="mui-col-xs-3">
            <a href="javascript:void(0)" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&game_code={{$v['game_code']}}&devices=1'); @else notify('请先登录游戏！'); @endif" >
                <img src="{{ $v['img'] }}">
                <span>{{ $v['name'] }}</span>
            </a>
        </li>
            @endforeach
    </ul>
</div>
@endsection

