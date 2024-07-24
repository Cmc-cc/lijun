<?php
header('Content-Type:text/html; charset=utf-8');
function SaveTime($jsonDate){
    preg_match('/\d{10}/',$jsonDate,$matches);
    return (date('Y-m-d H:i:s',$matches[0]));
}
set_time_limit(0);
$end_date = date('Y-m-d H:i:s');

$start_time = isset($start) && $start ?$start:date('Y-m-d H:i:s', strtotime('-1 hour'));
$page = 1;
$pagesize = 500;
$service = new \App\Services\LEYUService();
$api_mod = \App\Models\Api::where('api_name', 'SELF')->where('type', 5)->first();

if(isset($_GET['st']) && isset($_GET['et'])){
    $start_time = $_GET['st'];
    $end_date = $_GET['et'];
}else{
    $start_time = time() - 3600;
    $end_date = time();
}

$res = json_decode($service->betrecord( $start_time, $end_date,$page, $pagesize), TRUE);


$TotalNumber = 0;
if ($res['Code'] == 0)
{
    if ($res['Data'])
    {
        $data = $res['Data']['data'];
        $Page        = $res['Data']["page"];  //页码
        $TotalNumber = $res['Data']["total_count"];  //总条数
        $TotalPage   = $res['Data']["lastPage"];  //总页数

        if (count($data) > 0)
        {
            foreach($data as $value)
            {
                $a = \App\Models\Api::where('api_name', strtoupper($value['code']))->first();
                if($value['billNo'] == '2023031013520374921761'){
                            dump($value);die;
                        }
                if ($a)
                {
                    $mod = \App\Models\GameRecord::where('billNo', $value["billNo"])->where('api_type', $a->id)->first();

					if($value['gameType'] ==1){
						$gameTypes = 1;
					}elseif($value['gameType'] ==2){
						$gameTypes = 6;
					}elseif($value['gameType'] ==3){
						$gameTypes = 2;
					}elseif($value['gameType'] ==4){
						$gameTypes = 3;
					}elseif($value['gameType'] ==5){
						$gameTypes = 4;
					}elseif($value['gameType'] ==6){
						$gameTypes = 7;
					}elseif($value['gameType'] ==7){
						$gameTypes = 5;
					}
					$validBetAmount = isset($value['validBetAmount']) ? $value['validBetAmount'] : 0;
    					if($gameTypes==4){
    					    $validBetAmount = abs($value['netAmount']);
    					}
    					
    					
                        
                        
                    if ($mod)
                    {
                        
                        
                        $a = $mod->update([
                            'flag' => $value["status"],
							'betAmount' => isset($value['betAmount']) ? $value['betAmount'] : 0,
							'validBetAmount' => $validBetAmount,
							'netAmount' => isset($value['netAmount']) ? $value['netAmount'] : 0,
							'remark' => $value["Lottery_results"],
                            'settleTime'=>date('Y-m-d H:i:s')
                        ]);
                        //dump($a);
                    } else {
                        $l = strlen($api_mod->prefix);
                        $PlayerName = $value["username"];
                        $name = $PlayerName;
                        $m = \App\Models\Member::where('name', $name)->first();
                        //dump($m);
                        if ($m)
                        {
                            $rs = \App\Models\GameRecord::create([
                                'billNo' => isset($value['billNo']) ? $value['billNo'] : '',
                                'rowid' => isset($value['rowid']) ? $value['rowid'] : '',
                                'playerName' => $PlayerName,
								'gameType' => $gameTypes,
								'gameCode' => $value["playType"],
								'xzhm' => $value["xzhm"],
								'remark' => $value["Lottery_results"],
								'flag' => $value["status"],
                                'betTime' => date('Y-m-d H:i:s',$value['betTime']),
                                'betAmount' => isset($value['betAmount']) ? $value['betAmount'] : 0,
                                'validBetAmount' => $validBetAmount,
                                'netAmount' => isset($value['netAmount']) ? $value['netAmount'] : 0,								
                                'api_type' => $a->id,
                                'name' => $name,
                                'member_id' => $m->id,
                                'result' => json_encode($value),
                                'settleTime'=>date('Y-m-d H:i:s')
                            ]);
                            //dump($rs);
                        }

                    }
                }


            }

        }
//die;
        //第二页
        if ($TotalPage > 1)
        {
            for ($i=2;$i<=$TotalPage;$i++)
            {
                $res = json_decode($service->betrecord( $start_time, $end_date,$i, $pagesize), TRUE);
                if ($res['Code'] == 0)
                {
                    if($res['Data'])
                    {
                        $data = $res['Data']['data'];
                        $Page        = $res['Data']["page"];  //页码
                        $TotalNumber = $res['Data']["total_count"];  //总条数
                        $TotalPage   = $res['Data']["lastPage"];  //总页数

                        if (count($data) > 0)
                        {
                            
                            foreach($data as $value)
                            {
                                
                                $a = \App\Models\Api::where('api_name', strtoupper($value['code']))->first();
                                if ($a)
                                {
                                    $mod = \App\Models\GameRecord::where('billNo', $value["billNo"])->where('api_type', $a->id)->first();
					                if($value['gameType'] ==1){
					                	$gameTypes = 1;
					                }elseif($value['gameType'] ==2){
					                	$gameTypes = 6;
					                }elseif($value['gameType'] ==3){
					                	$gameTypes = 2;
					                }elseif($value['gameType'] ==4){
					                	$gameTypes = 3;
					                }elseif($value['gameType'] ==5){
					                	$gameTypes = 4;
					                }elseif($value['gameType'] ==6){
					                	$gameTypes = 7;
					                }elseif($value['gameType'] ==7){
					                	$gameTypes = 5;
					                }
					                $validBetAmount = isset($value['validBetAmount']) ? $value['validBetAmount'] : 0;
                					if($gameTypes==4){
                					    $validBetAmount = abs($value['netAmount']);
                					}
                                    if ($mod)
                                    {
                                        $a = $mod->update([
                                            'flag' => $value["status"],
							                'betAmount' => isset($value['betAmount']) ? $value['betAmount'] : 0,
							                'validBetAmount' => $validBetAmount,
							                'netAmount' => isset($value['netAmount']) ? $value['netAmount'] : 0,
							                'remark' => $value["Lottery_results"],
                                            'settleTime'=>date('Y-m-d H:i:s')
                                        ]);
                                    } else {
                                        $l = strlen($api_mod->prefix);
                                        $PlayerName = $value["username"];
                                        $name = $PlayerName;
                                        $m = \App\Models\Member::where('name', $name)->first();
                                        //dump($m);
                                        if ($m)
                                        {
                                            $rs = \App\Models\GameRecord::create([
                                                'billNo' => isset($value['billNo']) ? $value['billNo'] : '',
                                                'rowid' => isset($value['rowid']) ? $value['rowid'] : '',
                                                'playerName' => $PlayerName,
								                'gameType' => $gameTypes,
								                'gameCode' => $value["playType"],
								                'xzhm' => $value["xzhm"],
								                'remark' => $value["Lottery_results"],
								                'flag' => $value["status"],
                                                'betTime' => date('Y-m-d H:i:s',$value['betTime']),
                                                'betAmount' => isset($value['betAmount']) ? $value['betAmount'] : 0,
                                                'validBetAmount' => $validBetAmount,
                                                'netAmount' => isset($value['netAmount']) ? $value['netAmount'] : 0,								
                                                'api_type' => $a->id,
                                                'name' => $name,
                                                'member_id' => $m->id,
                                                'result' => json_encode($value),
                                                'settleTime'=>date('Y-m-d H:i:s')
                                            ]);
                                            //dump($rs);
                                        }

                                    }
                                }

                            }

                        }
                    }

                }
            }
        }
    }


}

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="refresh" content="300">
    <title>游戏记录获取页面</title>
    <style type="text/css">
        body,td,th {
            font-size: 12px;
        }
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
    </style>
</head>
<body>
<script>
    var limit="120"
    if (document.images){
        var parselimit=limit
    }
    function beginrefresh(){
        if (!document.images)
            return
        if (parselimit==1)
            window.location.reload()
        else{
            parselimit-=1
            curmin=Math.floor(parselimit)
            if (curmin!=0)
                curtime=curmin+"秒后自动获取!"
            else
                curtime=cursec+"秒后自动获取!"
            timeinfo.innerText=curtime
            setTimeout("beginrefresh()",1000)
        }
    }

    window. onload=beginrefresh
</script>
<table width="100%"border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <input type=button name=button value="刷新" onClick="window.location.reload()">
            <input type=button name=button value="补采集" onClick="bu(window.location)">
            游戏采集:成功采集到<?=$TotalNumber ? $TotalNumber : 0?>条数据
            <span id="timeinfo"></span>
        </td>
        <td>开始时间：<?php echo date('Y-m-d H:i:s',$start_time);?>------ <?php echo date('Y-m-d H:i:s',$end_date);?></td>
    </tr>
</table>
<script>
    function bu(url) {
        var tmp = Date.parse( new Date() ).toString();
        var st = tmp.substr(0,10) - 24 * 60 * 60;
        var et = tmp.substr(0,10);
        var url = url + '?st='+st + '&et='+et;
        window.open (url) ;
    }
</script>
</body>
</html>
