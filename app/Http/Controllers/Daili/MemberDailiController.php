<?php

namespace App\Http\Controllers\Daili;

use App\Models\Dividend;
use App\Models\Drawing;
use App\Models\Recharge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ValidationTrait;
use App\Models\Member;
use DB;
class MemberDailiController extends DailiBaseController
{
    use ValidationTrait;
    public function index(Request $request)
    {
        $mod = new Member();

        $data = $mod->where('is_daili', 1)->where('id', $this->getDaili()->id)->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));

        return view('daili.member_daili.index', compact('data', 'name'));
    }

    public function member_offline_sy(Request $request)
    {
        $id = $this->getDaili()->id;
        // $id = 3599;
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
        $data = Db::table('members')->where('is_daili', 1)->where('id',$id)->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
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
        return view('daili.member_daili.member_offline_sy', compact('data', 'start_at', 'end_at','member_id','id'));
        // $start_at = $end_at =  '';

        // $m_list = Member::where('top_id', $this->getDaili()->id)->pluck('id');
        // $recharge_mod = new Recharge();
        // $drawing_mod = new Drawing();
        // $dividend_mod = new Dividend();

        // if ($request->has('start_at'))
        // {
        //     $start_at = $request->get('start_at');
        //     $recharge_mod = $recharge_mod->where('created_at', '>=', $start_at);
        //     $drawing_mod = $drawing_mod->where('created_at', '>=', $start_at);
        //     $dividend_mod = $dividend_mod->where('created_at', '>=', $start_at);
        // }

        // if ($request->has('end_at'))
        // {
        //     $end_at = $request->get('end_at');
        //     $recharge_mod = $recharge_mod->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($end_at)));
        //     $drawing_mod = $drawing_mod->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($end_at)));
        //     $dividend_mod = $dividend_mod->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($end_at)));
        // }

        // $total_recharge = $recharge_mod->where('status', 2)->whereIn('member_id', $m_list)->sum('money');
        // $recharge_count = $recharge_mod->where('status', 2)->whereIn('member_id', $m_list)->count();

        // $total_drawing = $drawing_mod->where('status', 2)->whereIn('member_id', $m_list)->sum('money');
        // $drawing_count = $drawing_mod->where('status', 2)->whereIn('member_id', $m_list)->count();

        // $total_dividend = $dividend_mod->whereIn('member_id', $m_list)->sum('money');
        // $dividend_count = $dividend_mod->whereIn('member_id', $m_list)->count();


        // return view('daili.member_daili.member_offline_sy', compact('start_at', 'end_at', 'total_recharge', 'recharge_count', 'total_drawing', 'drawing_count', 'total_dividend', 'dividend_count'));
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
    /**
     *
     * 编辑
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data= Member::findOrFail($id);

        return view('admin.member_daili.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $member= Member::findOrFail($id);

        $member->update($request->all());

        return responseSuccess('','', route('member_daili.index'));
    }
}
