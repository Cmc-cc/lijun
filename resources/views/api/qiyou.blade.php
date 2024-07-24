<html lang="zh-Hans" data-react-helmet="lang">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <title>Joker</title>
    </head>
    <style>
    @media (max-width: 767px) {
        .gamebox{
            width: 50%;
            float: left;
            text-align: center;
            color:#fff;
            font-size: 12px;
            margin-top: 5px;
            
        }
    }
    @media screen and (min-width: 768px) {
          .gamebox{
            width: 20%;
            float: left;
            text-align: center;
            color:#fff;
            font-size: 12px;
            margin-top: 5px;
            
        }
    }
        .gamebox img{
            width: 180px;
            height:180px;
        }
        html{
            min-height: 100%;
            background: #000;
        }
    </style>
    <body>
        @foreach($gameList as $k => $v)
            <div class="gamebox">
                <a href="/game/playGame?plat_type={{$api_code}}&game_type={{$game_type}}&devices=1&game_code={{$v['GameCode']}}" style="color:#fff;text-decoration: none;">
                    <img src="{{$v['Image2']}}"><br/>
                    {{$v['GameName']}}
                </a>
                
            </div>
        @endforeach
    </body>
</html>