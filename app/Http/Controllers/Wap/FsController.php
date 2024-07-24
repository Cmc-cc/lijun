<?php

namespace App\Http\Controllers\Wap;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Dividend;
use App\Models\FsLevel;
use App\Models\GameRecord;
use App\Models\SystemConfig;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\MemberMoneyLog;

class FsController extends WebBaseController
{
    //
    public function getPath($request)
    {
        $preview = $request->get('preview');
        if($request->has('preview')){
            $data = Template::where('jump_name',$preview)->where('client_type',2)->first();
            $mb_path = $data->template_name;
        }else{
            $data = Template::where('status',2)->where('client_type',2)->first();
            $mb_path = $data->template_name;
        }
        return $mb_path;
    }

    public function user_fs(Request $request)
    {
        $sys = SystemConfig::findOrfail(1);
        if($sys->is_fs==2){
            return false;
        }
        $game_types = config('platform.game_type');
        $user = $this->getMember();
        $list = [];

        $total = [
            'game_str' => '',
            'fs_money' => 0
        ];

        foreach ($game_types as $k=>$v ){
            //if($k != 6) continue;
            $rows = GameRecord::where('gameType',$k)
                ->where('member_id',$user->id)
                ->where('isfs','=',0)
                ->where('flag',1)
                ->orderBy('betTime','desc')
                ->get()
                ->toArray();

            //print_r($rows);
            $res = [];
            foreach ($rows as $key => $row){
                $date = substr($row['betTime'],'0',10);
                $res[$date][] = $row;
            }
            $all = [];
            $fs_level = FsLevel::orderBy('level','desc')->where('game_type',$k)->get();

            foreach ($res as $d => $v){
                $game_str = '';
                $tz_amount = 0;
                $rate = 0;
                $level_name = '';
                foreach ($v as $kk => $info){
                    $game_str .= $info['id'].',';
                    $tz_amount += $info['validBetAmount'];
                }
                foreach ($fs_level as $l =>$value){
                    if($tz_amount >= $value->quota){
                        $level_name = $value->name;
                        $rate = $value->rate;
                        break;
                    }
                }
                $fs_money = sprintf("%.2f",  $tz_amount*$rate/100);
                if($fs_money  <= 0) {
                    /*if($d != date('Y-m-d')) {
                        continue;
                    }*/
                }

                $all[$d]['game_str'] = $game_str;
                $all[$d]['tz_amount'] = $tz_amount;
                $all[$d]['level_name'] = $level_name;
                $all[$d]['rate'] = $rate;
                $all[$d]['fs_money'] = $fs_money;
                if($d == date('Y-m-d') && $fs_money > 0) {
                    $total['game_str'] .= $game_str;
                    $total['fs_money'] += $fs_money;
                }elseif($d != date('Y-m-d')){
                    $total['game_str'] .= $game_str;
                    $total['fs_money'] += $fs_money;
                }


            }

            $list[$k] = $all;
        }
        /*$total = [
            'game_str' => ''
        ];
        foreach ($list as $d => $v) {
            foreach ($v as $k => $item){
                print_r($item);
                $total['game_str'] .= $item['game_str'];
            }
        }*/
        //print_r($total);
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.user_fs';
        }else{
            $view = 'wap.template.'.$mb_path.'.user_fs';
        }
        return view($view,compact('list','total','user'));
    }
    public function send_fs()
    {

        $user = $this->getMember();
        //dump($user->name);
        if($user->fs_time >= time()-900 && $user->fs_time != 0){
            return responseWrong('15分钟内只能点击一次');
        }

        $total = [
            'game_str' => '',
            'fs_money' => 0
        ];

            $rows = GameRecord::where('member_id',$user->id)
                ->where('isfs','=',0)
                ->where('flag',1)
                ->sum('validBetAmount');
        $total['fs_money'] = $rows * 0.006;
        //$array_gamebill = explode(',',$total['game_str']);
        //print_r($array_gamebill);


        // $total['fs_money'] = 1;
        if($total['fs_money'] <= 0) {
            return responseWrong('暫無返水！！#2');
        }
        try{
            DB::transaction(function () use ($total,$user){
                $sys = SystemConfig::findOrfail(1);
                $hongli_ml_percent = $total['fs_money'] * $sys->rc_ml_percent;
                if($hongli_ml_percent){
                    $user->increment('ml_money', $hongli_ml_percent);
                }
                MemberMoneyLog::addLog($user->id, $total['fs_money'], $user->money, 11, 'fs');
                $user->increment('money', $total['fs_money']);
                
                GameRecord::where('member_id',$user->id)
                ->where('isfs','=',0)
                ->where('flag',1)->update([
                            'isfs'=>1
                        ]);
                // $array_gamebill  = explode(',',$total['game_str']);
                // foreach ($array_gamebill as $id) {
                //     if($id) {
                //         $mod = GameRecord::findOrFail($id);
                //         $mod->update([
                //             'isfs'=>1
                //         ]);
                //     }
                // }

                Dividend::create([
                    'member_id' => $user->id,
                    'type' => 3,
                    'describe' => '返水',
                    'money' => $total['fs_money'],
                    'user_id' => $user->id
                ]);
                Db::table('members')->where('id',$user->id)->update(['fs_time'=>time()]);
            });

        }catch (\Exception $e){
            DB::rollback();
            responseWrong($e);
        }
        //$user->increment('money','10');
        return responseSuccess('',trans('lang.tjcg'), route('wap.user_fs'));
    }
}
