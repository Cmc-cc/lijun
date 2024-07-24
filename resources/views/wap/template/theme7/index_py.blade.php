@extends('wap.template.theme7.layouts.main')
@section('content')
    <div class="game-module game-module-index">
        <div class="module-top">
            <div class="top-container navbar-nav">
                <div class="page-title">捕魚游戏</div>
            </div>
        </div>
        <div class="module-main diy-scrollbar">
            <div>
                {{--<div class="search-bar">
                    <span class="icon-area">
                        <span aria-hidden="true" class="glyphicon glyphicon-search"></span>
                    </span>
                    <input type="search" class="form-control" placeholder="游戏名称" id="byelectronicsFocus">
                    <button onclick="getElectronic(2);" class="find-game">查询</button>
                    <span class="close-area">
                        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </span>
                </div>--}}
                <div class="main-container" id="game-list">
                    <?php
                    $fish = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish');
                    ?>
                        @foreach($fish as $k => $v)
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 game-item" onclick="@if($_member) window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{$v['game_type']}}&devices=1'); @else notify('请先登录游戏！'); @endif" >
                        <a href="javascript:void(0)">
                            <div class="thumbnail">
                                <img class="img-responsive" src="{{ $v['img'] }}" style="height:136px;">
                                <div class="caption text-center">
                                    <h5 class="game-name">{{ $v['name'] }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
