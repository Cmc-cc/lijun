<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityApply;
use App\Models\Api;
use App\Models\Dividend;
use App\Models\Drawing;
use App\Models\MemberDailiApply;
use App\Models\MemberLoginLog;
use App\Models\Recharge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
// dump($_online_member_array);die;
        $apis = Api::where('on_line', 0)->get();
        // echo date('H');die;
        $hour = intval(date('H'));
        if($hour>=22 && $hour <24){
            $start = date('Y-m-d 22:00:00');
            $end = date('Y-m-d 23:59:59');
        }
        if($hour>=0 && $hour <10){
            $start = date('Y-m-d H:i:s',strtotime(date('Y-m-d'))-2*3600);
            $end = date('Y-m-d 10:00:00');
        }
        if($hour>=10 && $hour <22){
            $start = date('Y-m-d 10:00:00');
            $end = date('Y-m-d 22:00:00');
        }
        $admin_log = Db::table('admin_log')->orderBy('createtime','desc')->first();
        if($admin_log){
            $start = @$admin_log->createtime;
        }
        
        $end = date('Y-m-d H:i:s');
        $today_register_count = Member::where('created_at', '>=', $start)->where('created_at', '<=', $end)->count();
        $total_register_count = Member::orderBy('created_at', 'asc')->count();

        $today_recharge_count = Recharge::where('status', 2)->where('created_at', '>=', $start)->where('created_at', '<=', $end)->count();
        $today_recharge_sum = Recharge::where('status', 2)->where('created_at', '>=', $start)->where('created_at', '<=', $end)->sum('money');
        $total_recharge_sum = Recharge::where('status', 2)->sum('money');

        //出款
        $today_drawing_count = Drawing::where('status', 2)->where('created_at', '>=', $start)->where('created_at', '<=', $end)->count();
        $today_drawing_sum = Drawing::where('status', 2)->where('created_at', '>=', $start)->where('created_at', '<=', $end)->sum('money');
        $total_drawing_sum = Drawing::where('status', 2)->orderBy('created_at', 'asc')->sum('money');

        $today_dividend_count = Dividend::where('created_at', '>=', $start)->where('created_at', '<=', $end)->count();
        $today_dividend_sum = Dividend::where('created_at', '>=', $start)->where('created_at', '<=', $end)->sum('money');
        $total_dividend_sum = Dividend::orderBy('created_at', 'asc')->sum('money');
        $p = $request->get('p');

        $chartsData = $this->getChartsData();
        
        $month['month_recharge'] = $this->getMonthData('recharge','sum(money)','and status = 2');
        $month['month_drawing'] = $this->getMonthData('drawing','sum(money)','and status = 2');
        $month['month_dividend'] = $this->getMonthData('dividend','sum(money)');
        $success_recharge_count = '';
        return view('admin.index', compact('apis','success_recharge_count', 'today_register_count', 'today_recharge_count', 'total_register_count', 'total_recharge_sum', 'today_recharge_sum','today_dividend_count','today_dividend_sum', 'total_dividend_sum','today_drawing_count','today_drawing_sum','total_drawing_sum', 'p','chartsData','admin_log','month'));
    }

    public function hk_notice()
    {
        $return['status'] = 0;
        $return['vocie'] = 0;
        if (Recharge::where('status', 1)->count() > 0){
            $return['status'] = 1;
            if(Recharge::where('status', 1)->where('ok',0)->count() > 0){
                $return['vocie'] = 1;
            }
            
            Recharge::where('status', 1)->where('ok',0)->update(['ok'=>1]);
        }
            

        return $return;
    }

    public function tk_notice()
    {
        $return['status'] = 0;
        $return['vocie'] = 0;
        if (Drawing::where('status', 1)->count() > 0){
            $return['status'] = 1;
            if(Drawing::where('status', 1)->where('ok',0)->count() > 0){
                $return['vocie'] = 1;
            }
            Drawing::where('status', 1)->where('ok',0)->update(['ok'=>1]);
        }

        return $return;
    }

    public function fs_notice()
    {
        $return['fs_time'] = '15'.':'.'00';
        return $return;
    }
    public function tips_on()
    {
        $return['status'] = 0;
        if (MemberLoginLog::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 min ')))->count() > 0)
        {
            foreach (MemberLoginLog::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 min ')))->get() as $item)
            {
                if ($item->member->is_tips_on == 0)
                    $return['status'] = 1;
            }

        }

        return $return;
    }
    public function dl_notice()
    {
        $return['status'] = 0;
        if (MemberDailiApply::where('status', 0)->count() > 0){
            $return['status'] = 1;
        }

        return $return;
    }
    public function yh_notice()
    {
        $return['status'] = 0;
        $return['vocie'] = 0;
        if (ActivityApply::where('status', 1)->count() > 0){
            $return['status'] = 1;
            if(ActivityApply::where('status', 1)->where('ok',0)->count() > 0){
                $return['vocie'] = 1;
            }
            ActivityApply::where('status', 1)->where('ok',0)->update(['ok'=>1]);
        }

        return $return;
    }

    public function getChartsData(){
        //查询本周注册人数
        //$week_num = DB::select("select count(*) as week_num from members where YEARWEEK(DATE_FORMAT(created_at,'%Y-%m-%d')) = YEARWEEK(now())");
        //查询本月注册人数
        //$month_num = DB::select("select count(*) as month_num from memberswhere DATE_FORMAT(created_at,'%Y%m') = DATE_FORMAT( CURDATE( ) ,'%Y%m' ) ");
        //查询今天注册人数
        //$today_num = DB::select("select count(*) as today_num from members where TO_DAYS(created_at) = TO_DAYS(now())");
        //$return['week_num'] = $week_num[0]->week_num;//$week_num['week_num'];
        //$return['month_num'] = $month_num[0]->month_num;
        //$return['today_num'] = $today_num[0]->today_num;
        

        //查询本周，本月，本日的注册人数
        $return['week_num'] = $this->getWeekData('members','count(*)');
        $return['month_num'] = $this->getMonthData('members','count(*)');
        $return['today_num'] = $this->getTodayData('members','count(*)');
        
        $return['time'] = date('Y-m-d H:m:s');

        //查询本月、本周、本日的存款
        $return['week_recharge'] = $this->getWeekData('recharge','sum(money)','and status = 2');
        $return['month_recharge'] = $this->getMonthData('recharge','sum(money)','and status = 2');
        $return['today_recharge'] = $this->getTodayData('recharge','sum(money)','and status = 2');

        //查询本月、本周、本日的汇款
        $return['week_drawing'] = $this->getWeekData('drawing','sum(money)','and status = 2');
        $return['month_drawing'] = $this->getMonthData('drawing','sum(money)','and status = 2');
        $return['today_drawing'] = $this->getTodayData('drawing','sum(money)','and status = 2');

        //查询本月、本周、本日的提款
        $return['week_dividend'] = $this->getWeekData('dividend','sum(money)');
        $return['month_dividend'] = $this->getMonthData('dividend','sum(money)');
        $return['today_dividend'] = $this->getTodayData('dividend','sum(money)');

        return $return;
    }

    /**
    获取本周的字段汇总
    */
    public function getWeekData($tablename,$select,$where = ''){ 
        $sql = "select ".$select." as sum_count from ".$tablename." where YEARWEEK(DATE_FORMAT(created_at,'%Y-%m-%d')) = YEARWEEK(now()) ".$where;
        $result = DB::select($sql);
        $return = ($result[0]->sum_count)?$result[0]->sum_count:"0";
        return $return;
    }

    /**
    获取本月的字段汇总
    */
    public function getMonthData($tablename,$select,$where = ''){
        $thismonth = date('m');
        $thisyear = date('Y');
        if ($thismonth == 1) {
            $lastmonth = 12;
            $lastyear = $thisyear - 1;
        } else {
            $lastmonth = $thismonth - 1;
            $lastyear = $thisyear;
        }
    
        $lastStartDay = $lastyear . '-' . $lastmonth . '-1'.' 10:00:00';
        $last = date('Y-m-1 10:00:00');
        if(strtotime($last) > time()){
            $start = $lastStartDay;
        }else{
            $start = $last;
        }
        
    // echo $start;die;

        // $end = date('Y-m-d H:i:s');
        $sql = "select ".$select." as sum_count from ".$tablename." where created_at >= '$start'  ".$where;
        $result = DB::select($sql);
        $return = ($result[0]->sum_count)?$result[0]->sum_count:"0";
        return $return;
    }

    /**
    获取今天的字段汇总
    */
    public function getTodayData($tablename,$select,$where = ''){
        $sql = "select ".$select." as sum_count from ".$tablename." where TO_DAYS(created_at) = TO_DAYS(now()) ".$where;
        $result = DB::select($sql);
        $return = ($result[0]->sum_count)?$result[0]->sum_count:"0";
        return $return;
    }

    public function getChartsDataAjax(){
        //获取所有的游戏接口对象
        $apis = Api::where('on_line', 0)->get(['id','api_title']);
        foreach ($apis as $key => $api) {
            $return['month_'.$api->api_title] = $this->getMonthData('game_record','sum(validBetAmount)','and api_type = '.$api->id);
            $return['week_'.$api->api_title] = $this->getWeekData('game_record','sum(validBetAmount)','and api_type = '.$api->id);
            $return['today_'.$api->api_title] = $this->getTodayData('game_record','sum(validBetAmount)','and api_type = '.$api->id);
        }

        $return['month_投注总量'] = $this->getMonthData('game_record','sum(validBetAmount)');
        $return['week_投注总量'] = $this->getWeekData('game_record','sum(validBetAmount)');
        $return['today_投注总量'] = $this->getTodayData('game_record','sum(validBetAmount)');

        return $return;
    }
    public function jiaoban(){
        $admin_log = Db::table('admin_log')->orderBy('createtime','desc')->first();
        
        $data['recharge'] = Recharge::where('status', 2)->where('created_at', '>=', $admin_log->createtime)->sum('money');
        $data['drawing'] = Drawing::where('status', 2)->where('created_at', '>=', $admin_log->createtime)->sum('money');
        $data['dividend'] = Dividend::where('created_at', '>=', $admin_log->createtime)->sum('money');
        $data['daili'] = 0;
        Db::table('admin_log')->insert([
            'createtime'=>date('Y-m-d H:i:s'),
            'recharge'=>$data['recharge'],
            'drawing'=>$data['drawing'],
            'dividend'=>$data['dividend'],
            'daili'=>$data['daili'],
            'type'=>$_GET['type']
        ]);
        echo 1;
    }
    public function jiaobanlist(){
        $data = Db::table('admin_log')->orderBy('createtime','desc')->paginate(10);
        return view('admin.jiaobanlist.index', compact('data'));
    }
    public function apilog(){
        
        
        
        $data = Db::table('admin_api_log')->orderBy('createtime','desc')->paginate(config('admin.page-size'));
        return view('admin.apilog.index', compact('data'));
    }
}
