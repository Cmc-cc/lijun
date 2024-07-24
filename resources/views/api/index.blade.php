<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
 <title>游戏记录获取页面</title>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



</head>
<body>

<div style="width: 100%;height:100px;margin: auto">
    <iframe src="{{ route('game.game_recordcj') }}" width="100%" height="100%" frameborder="0">

    </iframe>
    <iframe src="{{ route('game.game_recordbu') }}" width="100%" height="100%" frameborder="0">

    </iframe>	
</div>
</body>
</html>
