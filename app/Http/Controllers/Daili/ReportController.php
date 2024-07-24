<?php

namespace App\Http\Controllers\Daili;

use App\Models\DailiMoneyLog;
use Illuminate\Http\Request;
use App\Models\Member;
use DB;

class ReportController extends DailiBaseController
{
    public function index(Request $request)
    {
        $member_id = $start_at = $end_at= '';
        $rechargeMap = [];
        $drawingMap = [];
        $dividendMap = [];
        if ($request->has('start_at'))
        {
            $start_at = $request->get('start_at');
            //$mod = $mod->where('created_at', '>=', $start_at);
            $rechargeMap[] = ['created_at', '>=', $start_at];
            $drawingMap[] = ['created_at', '>=', $start_at];
            $dividendMap[] = ['created_at', '>=', $start_at];
        }
        if ($request->has('end_at'))
        {
            $end_at = $request->get('end_at');
            $rechargeMap[] = ['created_at', '<=', $end_at];
            $drawingMap[] = ['created_at', '<=', $end_at];
            $dividendMap[] = ['created_at', '<=', $end_at];
            //$mod = $mod->where('created_at', '<=',$end_at);
        }
        $data = Db::table('members')->where('is_daili', 1)->where('top_id',0)->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
        if($data){
            foreach ($data as &$v){
                // $team = $this->team_all_account_search($v->id,1);
                $allteam = $this->team_all_account_search($v->id,10);
                // $v->teamCount = count($team);
                $v->teamAllCount = count($allteam);
                $allteam[] = $v->id;
                $rechargeMap[] = ['status', '=', 2];
                $drawingMap[] = ['status', '=', 2];
                $dividendMap[] = ['id', '>', 0];
                
                $v->rechargeTotal = Db::table('recharge')->where($rechargeMap)->whereIn('member_id',$allteam)->sum('money');
                $v->drawingTotal = Db::table('drawing')->where($drawingMap)->whereIn('member_id',$allteam)->sum('money');
                $v->dividendTotal = Db::table('dividend')->where($dividendMap)->whereIn('member_id',$allteam)->sum('money');
                $v->yingkui = round($v->rechargeTotal - $v->drawingTotal - $v->dividendTotal,2);
            }
        }
        return view('admin.report.index', compact('data', 'member_id', 'start_at', 'end_at'));
    }
    public function team(Request $request){
        $id = $request->get('id');
        $team = $this->team_all_account_search($id,1);
        $members = Db::table('members')->whereIn('id',$team)->get();
        $rechargeMap[] = ['status','=',2];
        $drawingMap[] = ['status','=',2];
        $dividendMap[] = ['id','>',0];
        if ($request->has('start_at'))
        {
            $start_at = $request->get('start_at');
            //$mod = $mod->where('created_at', '>=', $start_at);
            $rechargeMap[] = ['created_at', '>=', $start_at];
            $drawingMap[] = ['created_at', '>=', $start_at];
            $dividendMap[] = ['created_at', '>=', $start_at];
        }
        if ($request->has('end_at'))
        {
            $end_at = $request->get('end_at');
            $rechargeMap[] = ['created_at', '<=', $end_at];
            $drawingMap[] = ['created_at', '<=', $end_at];
            $dividendMap[] = ['created_at', '<=', $end_at];
            //$mod = $mod->where('created_at', '<=',$end_at);
        }
        $data = [];
        if($members && $team){
            foreach ($members as &$item){
                $detail = [];
                $team = $this->team_all_account_search($item->id,10);
                $item->teamAllCount = count($team);
                $team[] = $item->id;
                $item->rechargeTotal = Db::table('recharge')->where($rechargeMap)->whereIn('member_id',$team)->sum('money');
                $item->drawingTotal = Db::table('drawing')->where($drawingMap)->whereIn('member_id',$team)->sum('money');
                $item->dividendTotal = Db::table('dividend')->where($dividendMap)->whereIn('member_id',$team)->sum('money');
                $item->yingkui = round($item->rechargeTotal - $item->drawingTotal - $item->dividendTotal,2);
                $data[] = json_decode(json_encode($item),true);
                // $teamAllCount = $this->team_all_account_search($item->id,10);
            }
            // $colum = array_column($data, 'rechargeTotal');
            // array_multisort($colum, SORT_DESC, $data);
            
            $colum = array_column($data, 'is_daili');
            $colum2 = array_column($data, 'rechargeTotal');
            array_multisort($colum, SORT_DESC, $colum2, SORT_DESC, $data);

        }
        return $data;
    }
    public function team_all_account_search($account, $level, $type = 1, $loc = 0,$where=[]){
        $from = ($type == 0)?'id':'top_id';
        $to   = ($type == 0)?'top_id':'id';
        $account_list[0] = $account;
        $team = $this->team_all_account_count($account_list, $from, $to, $level, $loc,$where);
        $yx_team = array();
        foreach ($team as &$value) {
            $yx_team[] = $value;
        }
        return $yx_team;
    }
    public function team_all_account_count($account_list, $from, $to, $level, $loc, $where, $team_all_account = array()){
        $current_account_list = Db::table('members')->whereIn($from ,$account_list)->pluck($to)->toArray();
        if(empty($current_account_list) || $level == 0 ) {
            return array_unique($team_all_account);
        }else{
        	if($loc == 0) $team_all_account = array_merge($team_all_account, $current_account_list);
        	else $team_all_account = $current_account_list;
            return $this->team_all_account_count($current_account_list, $from, $to, $level-1,$loc, $where, $team_all_account);
        }
    }
    public function store(Request $request)
    {
        $validator = $this->verify($request, 'send_daili_money.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        if (!$request->has('top_id'))
            return responseWrong('请选择代理');

        $data = $request->all();
        $month = date('m', strtotime('-1 month'));
        foreach ($data['top_id'] as $k => $item)
        {
            DailiMoneyLog::create([
                'member_id' => $item,
                'money' => $data['money'][$item],
                'yl_money' => $data['yl_money'][$item],
                'remark' => $data['remark'][$item],
                'last_month' =>$month
            ]);

            $member = Member::find($item);
            if ($member)
                $member->increment('money', $data['money'][$item]);
        }

        return responseSuccess();
    }
    public function daochu(Request $request){
        $member_id = $start_at = $end_at= '';

        $mod = new Member();
        if ($request->has('member_id'))
        {
            $member_id = $request->get('member_id');
            $mod = $mod->where('id', $member_id);
        }
        if ($request->has('start_at'))
        {
            $start_at = $request->get('start_at');
        }
        if ($request->has('end_at'))
        {
            $end_at = $request->get('end_at');
        }
        $data = $mod->where('is_daili', 1)->orderBy('created_at', 'desc')->get();
        $arr = [];
        if($data){
            foreach ($data as $item){
                $detail = [];
                $m_list = $item->under_members()->pluck('id');
                            $m_list[] = $item->id;
                            $recharge_mod = new \App\Models\Recharge();
                            $drawing_mod = new \App\Models\Drawing();
                            $dividend_mod = new \App\Models\Dividend();
                            $map = [];
                            if ($start_at)
                            {
                                $recharge_mod = $recharge_mod->where('confirm_at', '>=', $start_at);
                                $drawing_mod = $drawing_mod->where('confirm_at', '>=', $start_at);
                                $map[] = ['created_at','>=',$start_at];
                            }
                         if ($end_at)
                         {
                             $recharge_mod = $recharge_mod->where('confirm_at', '<=', $end_at);
                             $drawing_mod = $drawing_mod->where('confirm_at', '<=', $end_at);
                            $map[] = ['created_at','<=',$end_at];
                         }
                        $map[] = ['id','>=','1'];
                         $recharge_money = $recharge_mod->whereIn('member_id', $m_list)->where('status', 2)->sum('money');
                         $drawing_money = $drawing_mod->whereIn('member_id', $m_list)->where('status', 2)->sum('money');
                         $dividend_money_1 = $dividend_mod->whereIn('member_id', $m_list)->whereNotIn('type', [2,3])->where($map)->sum('money');
                         $dividend_money_2 = $dividend_mod->whereIn('member_id', $m_list)->where('type', 2)->where($map)->sum('money');
                        //  var_dump($map);die;
                         $dividend_money_3 = $dividend_mod->whereIn('member_id', $m_list)->where('type', 3)->where($map)->sum('money');

                         //总收益
                             $total_sy_money = $recharge_money - $drawing_money - $dividend_money_1 - $dividend_money_2 - $dividend_money_3;
                             //查询单个代理的活跃用户
                             //活跃用户月充值金额
                             $active_money = \App\Models\SystemConfig::findOrFail(1)->active_member_money;
                             $yj_level = \App\Models\YjLevel::orderBy('level', 'desc')->get();
                             //获取该代理下活跃用户总数
                            //$num = $recharge_mod->whereIn('member_id', $m_list)->select('sum(money) as user_count')->groupBy('member_id')->having('user_count', '>=', $active_money)->get();
                         $num = $recharge_mod->whereIn('member_id', $m_list)->select(\DB::raw('sum(money) as user_count'))->groupBy('member_id')->having('user_count', '>=', $active_money)->get();

                         $num = count($num);
                            $rate = 0;
                             foreach ($yj_level as $k => $v)
                             {
                                 if ($v->max > 0)
                                 {
                                     if ($num >= $v->num && $total_sy_money>=$v->min && $total_sy_money <= $v->max)
                                     {
                                         $rate = $v->rate;
                                         break;
                                     }
                                 } else {
                                     if ($num >= $v->num && $total_sy_money>=$v->min)
                                     {
                                         $rate = $v->rate;
                                         break;
                                     }
                                 }

                             }
                            $map = [];
                            if ($start_at)
                            {
                                $map[] = ['createtime','>=',$start_at];
                            }
                            if ($end_at)
                            {
                                $map[] = ['createtime','<',$start_at];
                            }
                            if($m_list){
                                if($map){
                                    $zongyingkui = Db::table('user_log')->whereIn('member_id', $m_list)->where($map)->sum('total');
                                }else{
                                    $zongyingkui = Db::table('user_log')->whereIn('member_id', $m_list)->sum('total');
                                }
                                
                            }else{
                                $zongyingkui = 0;
                            }
                $detail['name'] = $item->name;
                $detail['count'] = $item->under_members()->count();
                $detail['money'] = $item->under_members()->sum('money');
                $detail['recharge_money'] = $recharge_money;
                $detail['drawing_money'] = $drawing_money;
                $detail['zongyingkui'] = $zongyingkui;
                $detail['dividend_money_1'] = $dividend_money_1;
                $detail['dividend_money_2'] = $dividend_money_2;
                $detail['dividend_money_3'] = $dividend_money_3;
                $detail['last'] = @$item->daili_money_logs()->orderBy('created_at', 'desc')->first()->created_at or '无';
                $detail['yjje'] = $total_sy_money*$rate/100;
                $arr[] = $detail;
            }
        }
        $html = '<table>
                    <tr>
                        <td>代理账号</td>
                        <td>下线会员</td>
                        <td>下线余额</td>
                        <td>存款</td>
                        <td>提款</td>
                        <td>下级总盈亏</td>
                        <td>汇款赠送</td>
                        <td>彩金派送</td>
                        <td>反水派送</td>
                        <td>上次发放佣金时间</td>
                        <td>佣金金额</td></tr>
                        ';
        if($arr){
            foreach ($arr as $k=>$v){
                $html .= '<tr>';
                $html .= '<td>'.$v['name'].'</td>';
                $html .= '<td>'.$v['count'].'</td>';
                $html .= '<td>'.$v['money'].'</td>';
                $html .= '<td>'.$v['recharge_money'].'</td>';
                $html .= '<td>'.$v['drawing_money'].'</td>';
                $html .= '<td>'.$v['zongyingkui'].'</td>';
                $html .= '<td>'.$v['dividend_money_1'].'</td>';
                $html .= '<td>'.$v['dividend_money_2'].'</td>';
                $html .= '<td>'.$v['dividend_money_3'].'</td>';
                $html .= '<td>'.$v['last'].'</td>';
                $html .= '<td>'.$v['yjje'].'</td>';
                $html .= '</tr>';
            }
            $html .= '</table>';
        }
        header("Content-type:application/vnd.ms-excel");  //设置内容类型
        header("Content-Disposition:attachment;filename=报表.xlsx");  //文件下载
        echo $html;die;
    }
    
    
    
    public function daochu2(Request $request){
        $start_at = $end_at= '';
        $rechargeMap = [];
        $drawingMap = [];
        $dividendMap = [];
        if ($request->has('start_at'))
        {
            $start_at = $request->get('start_at');
            $rechargeMap[] = ['created_at', '>=', $start_at];
            $drawingMap[] = ['created_at', '>=', $start_at];
            $dividendMap[] = ['created_at', '>=', $start_at];
        }
        if ($request->has('end_at'))
        {
            $end_at = $request->get('end_at');
            $rechargeMap[] = ['created_at', '<=', $start_at];
            $drawingMap[] = ['created_at', '<=', $start_at];
            $dividendMap[] = ['created_at', '<=', $start_at];
        }
        $data = Db::table('members')->where('is_daili', 1)->where('top_id',0)->orderBy('created_at', 'desc')->get();
        if($data){
            foreach ($data as &$v){
                $allteam = $this->team_all_account_search($v->id,10);
                $v->teamAllCount = count($allteam);
                $allteam[] = $v->id;
                $rechargeMap[] = ['status', '=', 2];
                $drawingMap[] = ['status', '=', 2];
                $dividendMap[] = ['id', '>', 0];
                
                $v->rechargeTotal = Db::table('recharge')->where($rechargeMap)->whereIn('member_id',$allteam)->sum('money');
                $v->drawingTotal = Db::table('drawing')->where($drawingMap)->whereIn('member_id',$allteam)->sum('money');
                $v->dividendTotal = Db::table('dividend')->where($dividendMap)->whereIn('member_id',$allteam)->sum('money');
                $v->yingkui = round($v->rechargeTotal - $v->drawingTotal - $v->dividendTotal,2);
            }
        }
        
        
        
        $html = '<table>
                    <tr>
                        <td>代理名稱</td>
                        <td>下级人数</td>
                        <td>代理模式</td>
                        <td>總充值</td>
                        <td>總紅利</td>
                        <td>總提款</td>
                        <td>實際總利潤</td>
                        <td>分成</td>
                        <td>分成結果</td>
                        <td>支付下線</td>
                        <td>利潤</td></tr>
                        ';
        if($data){
            foreach ($data as $k=>$v){
                $html .= '<tr>';
                $html .= '<td>'.$v->name.'</td>';
                $html .= '<td>'.$v->teamAllCount.'</td>';
                $html .= '<td>盈利分成(分層)</td>';
                $html .= '<td>'.$v->rechargeTotal.'</td>';
                $html .= '<td>'.$v->dividendTotal.'</td>';
                $html .= '<td>'.$v->drawingTotal.'</td>';
                $html .= '<td>'.$v->yingkui.'</td>';
                $html .= '<td>0%</td>';
                $html .= '<td>0</td>';
                $html .= '<td>0</td>';
                $html .= '<td>0</td>';
                $html .= '</tr>';
            }
            $html .= '</table>';
        }
        header("Content-type:application/vnd.ms-excel");  //设置内容类型
        header("Content-Disposition:attachment;filename=报表.xlsx");  //文件下载
        echo $html;die;
    }
    
}
