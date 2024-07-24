<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Api\SelfController;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Activity;
use App\Models\ActivityApply;
use App\Models\Api;
use App\Models\BankCard;
use App\Models\DistillRedLog;
use App\Models\Dividend;
use App\Models\Drawing;
use App\Models\Feedback;
use App\Models\FsLevel;
use App\Models\GameRecord;
use App\Models\MemberDailiApply;
use App\Models\MemberMessage;
use App\Models\Recharge;
use App\Models\Red;
use App\Models\RedLog;
use App\Models\SystemConfig;
use App\Models\SystemNotice;
use App\Models\Transfer;
use App\Services\SelfService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ValidationTrait;
use Hash;
use App\Http\Controllers\Api\ApiClientController;
use DB;
use App\Services\LEYUService;
use App\Models\Base;

class IndexController extends ApiClientController
{
    use ValidationTrait;

    public $sys;
    public function __construct()
    {
        $this->sys = SystemConfig::findOrfail(1);
    }
    public function getNowMoney(){
        	 $member = $this->getMember();
        	 return responseSuccess($member->money,'申请成功');
    }
    
    /**
     *
     * 銀行卡轉賬 / 轉數快
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new_bank_pay()
    {
        $setting = Db::table('system_config')->first();
        if($setting->is_bankpay_on){
            if($setting->is_qq_on){
                if($setting->is_alipay_on){
                    if($setting->is_wechat_on){
                        die;
                    }
                    //跳转
                    header('Location:/member/usdt_pay_xin');die;
                }
                //跳转
                header('Location:/member/weixin_pay_xin');die;
            }
            //跳转
            header('Location:/member/ali_pay_xin');die;
        }
		 $member = $this->getMember();
    	$banks= BankCard::where('on_line', 0)->orderBy('id', 'asc')->get();
        foreach($banks as &$vo){
           $vo->bank_name = Base::$BANK_TYPE[$vo->bank_id];
        }
        return view('member.new_bank_pay',compact('member','banks','setting'));
    }
	/**
     *
     * 支付寶掃碼
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ali_pay_xin()
    {
        $setting = Db::table('system_config')->first();
		 $member = $this->getMember();
        return view('member.ali_pay_xin',compact('member','setting'));
    }
    
        public function safe_psw_xin()
    {
        return view('member.safe_psw_xin');
    }
    
	/**
     *
     * 便利店增值
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function weixin_pay_xin()
    {
        $setting = Db::table('system_config')->first();
		$member = $this->getMember();
        return view('member.weixin_pay_xin',compact('member','setting'));
    }
	/**
     *
     * 虛擬幣支付
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function usdt_pay_xin()
    {
        $setting = Db::table('system_config')->first();
		$member = $this->getMember();
        return view('member.usdt_pay_xin',compact('member','setting'));
    }
	/**
     *
     * 提现
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function member_drawing_xin()
    {
		$member = $this->getMember();
        return view('member.member_drawing_xin',compact('member'));
    }
	/**
     *
     * 額度轉換
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indoor_transfer_xin()
    {
		$member = $this->getMember();
		$api_list = Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        return view('member.indoor_transfer_xin',compact('member','api_list'));
    }
	
	
	public function singlenote_report_xin(Request $request)
    {
       
		$api_list = Api::where('on_line', 0)->orderBy('created_at', 'desc')->pluck('api_title','id');
        return view('member.singlenote_report_xin',compact('api_list'));
    }
	public function send_fs(Request $request)
    {
		
		$sys = SystemConfig::findOrfail(1);
        if($sys->is_fs==2){
            return false;
        }
        $game_types = config('platform.game_type');

        //print_r($game_types);
        $user = $this->getMember();
        //dump($user->name);

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
        }
 
       
        return view('member.send_fs',['total' => $total]);
    }
	
	
	
	
	
	    public function customer_report_xin(Request $request)
    {
        $type =$request->get('type',0);
        $start =$request->get('start','');
        $end =$request->get('end','');
        $map['member_id'] = $this->getMember()->id;
        if($type==4) {
             $data = Dividend::where($map)
           ->when($start!='',function ($query) use($start){
                $query->whereDate('created_at','>=',$start);
            })->when($end!='',function ($query) use($end){
                $query->whereDate('created_at','<=',$end.' 23:59:59');
            })->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        }else if($type==1) {
            $data = Drawing::where($map)->when($start!='',function ($query) use($start){
                $query->whereDate('created_at','>=',$start);
            })->when($end!='',function ($query) use($end){
                $query->whereDate('created_at','<=',$end.' 23:59:59');
            })->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        }else if($type==2){
              $data = Transfer::where($map)
              ->when($start!='',function ($query) use($start){
                $query->whereDate('created_at','>=',$start);
            })->when($end!='',function ($query) use($end){
                $query->whereDate('created_at','<=',$end.' 23:59:59');
            })->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        }else {
             $data = Recharge::where($map)->when($start!='',function ($query) use($start){
                $query->whereDate('created_at','>=',$start);
            })->when($end!='',function ($query) use($end){
                $query->whereDate('created_at','<=',$end.' 23:59:59');
            })->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
         }
        $data->appends(['type'=>$type,'start'=>$start,'end'=>$end])->render();
        return view('member.customer_report_xin', compact('data','type','start','end'));
    }
	
		    public function login_psw_xin()
    {
		$member = $this->getMember();
        return view('member.login_psw_xin',compact('member'));
    }
    
    /**
     *
     * 基本信息
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userCenter()
    {
        // $this->refresh_ml();
         $setting = Db::table('system_config')->first();
        // $this->refresh_ml();
        $member = $this->getMember();
        
        $api_mod= Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();
  
        $betAmount = Db::table('game_record')->where('member_id',$member['id'])->where('betTime','>',date('Y-m-d'))->sum('betAmount');
        $winAmount = Db::table('game_record')->where('member_id',$member['id'])->where('betTime','>',date('Y-m-d'))->sum('fs_money');
        
        $mod = new Activity();
        $data = $mod -> where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();
        
        $recharge = Db::table('recharge')->where('member_id',$member['id'])->orderBy('id','desc')->first();
        $drawing = Db::table('drawing')->where('member_id',$member['id'])->orderBy('id',' desc')->first();
        $msg = SystemNotice::orderBy('sort', 'asc')->orderBy('created_at', 'desc')->first();
        
        $sys = SystemConfig::findOrfail(1);
        if($sys->is_fs==2){
            return false;
        }
        $game_types = config('platform.game_type');

        //print_r($game_types);
        $user = $this->getMember();
        //dump($user->name);

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
        }
        $xiaoshu = rand(10,40);
        // echo $winAmount;die;
        if($this->sys->is_new_center == 1){
            $game_types = config('platform.game_type');

            //print_r($game_types);
            $user = $this->getMember();
            //dump($user->name);

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
            $member = $this->getMember();
            $data = ActivityApply::where('member_id', $member->id)->orderBy('status', 'asc')->get();
            return view('member.new_single_info', compact('api_mod','bank_card_list','system_notices','total','list','data','setting'));
        }else{
            return view('member.single_info', compact('api_mod','betAmount','winAmount','setting','data','recharge','drawing','msg','total','xiaoshu','member'));
        }

    }

    /**
     *
     * 银行资料
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bank_load()
    {
        return view('member.bank_load');
    }

    /**
     *
     * 账户设置
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account_load()
    {
        $api_list = Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();

        return view('member.account_load', compact('api_list'));
    }

    public function message_list()
    {
        //$this->getMember()->messages()->where('is_read', 0)->update(['is_read' => 1]);
        return view('member.message_list');
    }

    /**
     *
     * 安全密码
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function safe_psw()
    {
        return view('member.safe_psw');
    }

    /**
     *
     * 登录密码
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login_psw()
    {
        return view('member.login_psw');
    }

    /**
     *
     * 会员存款
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finance_center()
    {
        $setting = Db::table('system_config')->first();
        $xiaoshu = rand(10,40);
        $banks= BankCard::where('on_line', 0)->orderBy('id', 'asc')->get();
        foreach($banks as &$vo){
           $vo->bank_name = Base::$BANK_TYPE[$vo->bank_id];
        }
        return view('member.finance_center',compact('setting','xiaoshu','banks'));
    }

    /**
     *
     * 会员提款
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function member_drawing()
    {
        $this->refresh_ml();
        $member = $this->getMember();
        if (!$member->bank_username)
            return redirect()->to(route('member.update_bank_info'));
        return view('member.member_drawing');
    }

    /**
     *
     * 户内转账
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indoor_transfer()
    {
        $api_mod = Api::where('on_line', 0)->get();

        return view('member.indoor_transfer', compact('api_mod'));
    }

    /**
     *
     * 客户报表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function customer_report(Request $request)
    {
        $type =$request->get('type',1);
        $start =$request->get('start','');
        $end =$request->get('end','');
        $map['member_id'] = $this->getMember()->id;
        if($type==1) {
            $data = Recharge::where($map)->when($start!='',function ($query) use($start){
                $query->whereDate('created_at','>=',$start);
            })->when($end!='',function ($query) use($end){
                $query->whereDate('created_at','<=',$end.' 23:59:59');
            })->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        }else{
            $data = Drawing::where($map)->when($start!='',function ($query) use($start){
                $query->whereDate('created_at','>=',$start);
            })->when($end!='',function ($query) use($end){
                $query->whereDate('created_at','<=',$end.' 23:59:59');
            })->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        }
        return view('member.customer_report', compact('data','type','start','end'));
    }

    /**
     *
     * 公告信息
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function service_center()
    {
        $system_notices = SystemNotice::where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();

        return view('member.service_center', compact('system_notices'));
    }

    /**
     *
     * 投诉建议
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function complaint_proposal()
    {
        return view('member.complaint_proposal');
    }

    public function post_agent_apply(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_agent_apply');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }


        $data = $request->all();
        $member = $this->getMember();

        if ($member->is_daili == 1)
            return responseWrong('已经是代理');

        MemberDailiApply::create([
            'member_id' => $member->id,
            'phone' => $data['phone'],
            'msn_qq' => $data['qq'],
            'about' => $data['about']
        ]);

        return responseSuccess('','申请成功', route('web.index'));
    }

    public function update_bank_info()
    {
        $this->refresh_ml();
        $member = $this->getMember();
        return view('member.update_bank_info',compact('member'));
    }

    public function post_update_bank_info(Request $request)
    {
        $sys = SystemConfig::find(1);
        if ($sys->is_sms_on == 0)
        {
            if (!$request->has('v_code'))
                return responseWrong('请输入 手机验证码');

            if (session('phone_v_code') != $request->get('v_code'))
                return responseWrong('验证码错误 '.session('phone_v_code'));
        }

        $validator = $this->verify($request, 'member.update_bank_info');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->all();
        $member = $this->getMember();

        $member->update($data);

        return responseSuccess('', '', route('member.userCenter'));
    }

    //修改取款密码
    public function update_qk_password(Request $request)
    {
        $validator = $this->verify($request, 'member.update_qk_password');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();

        if ($member->qk_pwd != $data['old_password'])
        {
            return responseWrong('原密码错误');
        }

        $member->update([
            'qk_pwd' => $data['password']
        ]);

        return responseSuccess('', '修改成功');
    }

    public function update_login_password(Request $request)
    {
        $validator = $this->verify($request, 'member.update_login_password');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();
        if (!Hash::check($data['old_password'], $member->password))
        {
            return responseWrong('原密码错误');
        }

        $member->update([
            'password' => bcrypt($data['password']),
            //'original_password' => $data['password']
        ]);

        return responseSuccess('', '修改成功');
    }

    public function recharge_type(Request $request)
    {
        if(!$request->has('type'))
            return responseWrong('请选择充值类型');

        $type = $request->get('type');
        $route = '';
        if ($type == 1)
            $route = route('member.weixin_pay');
        elseif ($type == 2)
            $route = route('member.ali_pay');
        elseif ($type == 3)
            $route = route('member.bank_pay');
        elseif ($type == 4)
            $route = route('member.third_bank_pay');
        elseif ($type == 5)
            $route = route('member.third_pay_scan');
        elseif ($type == 6)
            $route = route('member.qq_pay');
        elseif ($type == 7)
            $route = route('member.third_quick_pay_apply');

        return responseSuccess('','', $route);
    }

    public function third_quick_pay_apply()
    {
        return view('member.third_quick_pay');
    }

    //微信支付
    public function weixin_pay()
    {
        return view('member.weixin_pay');
    }

    //微信支付
    public function qq_pay()
    {
        return view('member.qq_pay');
    }

    //支付宝支付
    public function ali_pay()
    {
        return view('member.ali_pay');
    }

    //提交QQ支付
    public function post_qq_pay(Request $request)
    {
        $validator = $this->verify($request, 'member.post_qq_pay');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();

        if($this->checkRecharge()){
            return responseWrong('您有一笔存款暂未通过,无法重复提交存款!');
        }

        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $data['money'],
            'payment_type' => 5,
            'account' => $data['account'],
            'status' => 1,
            'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s'],
            'img'=>$data['img'],
            'fanli' => $data['fanli']
        ]);

        if($this->sys->is_new_center == 1){
            return responseSuccess('',trans("lang.tjcg"));
        }else{
            return responseSuccess('',trans("lang.tjcg"), route('member.customer_report').'?type=0');
        }

    }


    public function third_bank_pay()
    {
        return view('member.third_bank_pay');
    }

    public function third_pay_scan()
    {
        return view('member.third_pay_scan');
    }

    //银行卡支付
    public function bank_pay()
    {
        $bank_card_list = BankCard::where('on_line', 0)->orderBy('created_at', 'desc')->get();

        return view('member.bank_pay', compact('bank_card_list'));
    }

    //提交微信支付
    public function post_weixin_pay(Request $request)
    {
        $validator = $this->verify($request, 'member.post_weixin_pay');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();

        if($this->checkRecharge()){
            return responseWrong('您有一笔存款暂未通过,无法重复提交存款!');
        }
        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $data['money'],
            'payment_type' => 2,
            'account' => $data['account'],
            'status' => 1,
            'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s'],
            'img'=>$data['img']
        ]);

        if($this->sys->is_new_center == 1){
            return responseSuccess('',trans("lang.tjcg"));
        }else{
            return responseSuccess('',trans("lang.tjcg"), route('member.customer_report').'?type=0');
        }

    }

    //提交支付宝支付
    public function post_ali_pay(Request $request)
    {
        $validator = $this->verify($request, 'member.post_ali_pay');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();

        if($this->checkRecharge()){
            return responseWrong('您有一笔存款暂未通过,无法重复提交存款!');
        }
        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $data['money'],
            'payment_type' => 1,
            'account' => $data['account'],
            'status' => 1,
            'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s'],
            'img'=>$data['img']
        ]);

        if($this->sys->is_new_center == 1){
            return responseSuccess('',trans("lang.tjcg"));
        }else{
            return responseSuccess('',trans("lang.tjcg"), route('member.customer_report').'?type=0');
        }


    }

    //提交银行卡支付
    public function post_bank_pay(Request $request)
    {
        $validator = $this->verify($request, 'member.post_bank_pay');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();

        if($this->checkRecharge()){
            return responseWrong('您有一笔存款暂未通过,无法重复提交存款!');
        }
        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $data['name'],
            'money' => $data['money'],
            'payment_type' => 3,
            'account' => $data['account'],
            'payment_desc' => $data['payment_desc'],
            'status' => 1,
            'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s'],
            'img'=>$data['img']
        ]);

        if($this->sys->is_new_center == 1){
            return responseSuccess('',trans("lang.tjcg"));
        }else{
            return responseSuccess('',trans("lang.tjcg"), route('member.customer_report').'?type=0');
        }

    }

    //提交提款
    public function post_drawing(Request $request)
    {
        $member = $this->getMember();

        // if (!$member->bank_username)
        //     return responseWrong('请先设置银行卡信息','', route('member.update_bank_info'));

        $validator = $this->verify($request, 'member.post_drawing');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->all();

        if($data['money'] <= 0){
            return responseWrong('请输入正整数字');
        }


        $sys = SystemConfig::find(1);
        $times = Drawing::where('member_id',$member->id)
            ->where('created_at', '>=', date('Y-m-d 00:00:00'))
            ->where('created_at', '<=', date('Y-m-d 23:59:59'))
            ->where('status',2)
            ->count();

        if ($times >= $sys->transfer_times){
            return responseWrong('每天最多只能申请提款' . $sys->transfer_times . '次');
            }
        if($member->ml_money != 0) {
            return responseWrong('您的打码量不足，无法提现');
        }
        //中心钱包
        if($member->is_trans_on ==1) {
            $center_res = json_decode((new SelfService())->wallet_balance($member->name),true);
            if(!$center_res){
                $msg = (new SelfService())->wallet_balance($member->name);
                return responseWrong($msg);
            }
            //print_r($center_res);
            if($center_res['statusCode'] == 01){
                $center_money = $center_res['data'];
            }else{
                return responseWrong($center_res['code'].'--'.$center_res['message']);
            }

            $all_money = $member->money + $center_money;


            if ($data['money'] > $all_money) {
                return responseWrong('提款金额大于余额');
            }
            /*if ($data['qk_pwd'] != $member->qk_pwd) {
                return responseWrong('取款密码不正确');
            }*/

            if(strcmp($data['qk_pwd'],$member->qk_pwd) != 0) {
                return responseWrong('取款密码不正确');
            }
            //将中心钱包余额转入网站用户余额
            //$amount = $data['money'] > 0 ? -$data['money']:$data['money'];

            if($center_money > 0){
                //中心钱包金额大于0
                $amount = $center_money > 0 ? -$center_money : $center_money;

                $result = (new SelfService())->trans($member->name,$amount);
                $res = json_decode($result,true);

                if(!$res){
                    return responseWrong($result);
                }
                if($res['statusCode'] != 01){
                    return responseWrong($res['statusCode'].'--'.$res['message']);
                }
                $amount_type = 'money';
                if(is_array($res) && $res['statusCode'] == 01){
                    try{
                        DB::transaction(function() use($res,$amount_type,$amount,$member,$result) {
                            //个人账户
                            $member->increment($amount_type , abs($amount));
                            //额度转换记录
                            Transfer::create([
                                'bill_no' => getBillNo(),
                                'api_type' => '0',
                                'member_id' => $member->id,
                                'transfer_type' => 1,
                                'money' => $amount,
                                'transfer_in_account' => $amount_type == 'money'?'中心账户':'返水账户',
                                'transfer_out_account' => '免转钱包',
                                'result' => $result
                            ]);
                        });
                    }catch(\Exception $e){
                        DB::rollback();
                        return responseWrong('网络错误请重试2');
                    }
                }
            }

            /*--------------end---------------------*/
            try{
                DB::transaction(function() use($data, $member) {
                    Drawing::create([
                        'bill_no' => getBillNo(),
                        'member_id' => $member->id,
                        'name' => $data['bank_username'],
                        'money' => $data['money'],
                        'account' => $data['bank_card'],
                        'bank_name' => $data['bank_name'],
                        'bank_card' => $data['bank_card'],
                        'bank_address' => $data['bank_branch_name']
                    ]);

                    $member->decrement('money', $data['money']);

                });
            }catch(\Exception $e){
                DB::rollback();
                return responseWrong('失败');
            }

            if($this->sys->is_new_center == 1){
                return responseSuccess('',trans("lang.tjcg"));
            }else{
                return responseSuccess('',trans("lang.tjcg"), route('member.customer_report').'?type=1');
            }
        }else{
            //转账钱包
            $all_money = $member->money;


            if ($data['money'] > $all_money) {
                return responseWrong('提款金额大于余额');
            }
            if ($data['qk_pwd'] != $member->qk_pwd) {
                return responseWrong('取款密码不正确');
            }
            if(strcmp($data['qk_pwd'],$member->qk_pwd) != 0) {
                return responseWrong('取款密码不正确');
            }
            try{
                DB::transaction(function() use($data, $member) {
                    Drawing::create([
                        'bill_no' => getBillNo(),
                        'member_id' => $member->id,
                        'name' => $data['bank_username'],
                        'money' => $data['money'],
                        'account' => $data['bank_card'],
                        'bank_name' => $data['bank_name'],
                        'bank_card' => $data['bank_card'],
                        'bank_address' => $data['bank_branch_name']
                    ]);

                    $member->decrement('money', $data['money']);

                });
            }catch(\Exception $e){
                DB::rollback();
                return responseWrong('失败');
            }

            if($this->sys->is_new_center == 1){
                return responseSuccess('',trans("lang.tjcg"));
            }else{
                return responseSuccess('',trans("lang.tjcg"), route('member.customer_report').'?type=1');
            }
        }



    }

    //提交额度转换
    public function post_transfer(Request $request)
    {
        
        
        // $validator = $this->verify($request, 'member.post_transfer');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }
        $input = $request->all();

        $member = $this->getMember();
        if(@$input['account2'] == 0 && !@$input['code']){
            $api_name ='center';
        }else{
            if(@$input['code']){
                $api = Db::table('api')->where('api_name',$input['code'])->first();
                $input['account2'] = $api->id;
            }else{
                $api = Api::findOrFail(@$input['account2']);
            }
            $api_name = $api->api_name;
        }
        if(!$input['account2']){
            return responseWrong(trans("lang.qxzpt"));
        }
        if(!$input['money']){
            return responseWrong(trans("lang.srje"));
        }
        $username = $member->name;
        $password = $member->original_password;
        $amount = $input['money'];
        $transfer_type = $input['transfer_type'];
        //$account1 = $input['account1']==1?'money':'fs_money';
        $account1 = $input['account1']==1?'money':'money';

        $data = [];
        //转账类型
        if ($transfer_type == 0)//转入游戏
        {
            if ($account1 == 'money' && $member->money < $amount)
                return responseWrong(trans("lang.yebz"));
            if ($account1 == 'fs_money' && $member->fs_money < $amount)
                return responseWrong(trans("lang.yebz"));

            $is_ag = $member->is_ag;

            $ag = Api::where('api_name', 'AG')->orderBy('created_at', 'desc')->first();
            $ags =Api::where('api_name', 'AGS')->orderBy('created_at', 'desc')->first();

            //增加申博
            $is_sunbet = $member->is_sunbets;
            $sunbet = Api::where('api_name', 'SUNBET')->orderBy('created_at', 'desc')->first();
            $sunbets =Api::where('api_name', 'SUNBETS')->orderBy('created_at', 'desc')->first();
            if(strtolower($api_name) == 'ag' || strtolower($api_name) == 'ags') {
                if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0){
                    $res = $this->deposit('AGS', $username, $password, $amount, $account1);
                    if ($res['Code'] != 0){
                        return responseWrong($res['Message']);
                    }
                }elseif ($ag && $ag->on_line==0 && $ags && $ags->on_line==0){
                    if($is_ag == 1) {
                        $res = $this->deposit('AG', $username, $password, $amount, $account1);
                        if ($res['Code'] != 0){
                            return responseWrong($res['Message']);
                        }
                    }elseif ($is_ag == 2){
                        $res = $this->deposit('AGS', $username, $password, $amount, $account1);
                        if ($res['Code'] != 0){
                            return responseWrong($res['Message']);
                        }
                    }
                }
            }elseif (strtolower($api_name) == 'sunbet' || strtolower($api_name) == 'sunbets'){
                if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0){
                    $res = $this->deposit('SUNBETS', $username, $password, $amount, $account1);
                    if ($res['Code'] != 0){
                        return responseWrong(trans("lang.sbcw").$res['Message'].' 请联系客服解决#4');
                    }
                }elseif ($sunbet && $sunbet->on_line==0 && $sunbets && $sunbets->on_line==0){
                    if($is_sunbet == 1) {
                        $res = $this->deposit('SUNBET', $username, $password, $amount, $account1);
                        if ($res['Code'] != 0){
                            return responseWrong(trans("lang.sbcw").$res['Message'].' 请联系客服解决#5');
                        }
                    }elseif ($is_sunbet == 2){
                        $res = $this->deposit('SUNBETS', $username, $password, $amount, $account1);
                        if ($res['Code'] != 0){
                            return responseWrong(trans("lang.sbcw").$res['Message'].' 请联系客服解决#6');
                        }
                    }
                }
            }else{
                // if(in_array($api_name,['OG','RMG'])){
                //     return responseWrong(trans("lang.zzwh"));
                // }
                $res = $this->deposit($api_name, $username, $password, $amount, $account1);
                if ($res['Code'] != 0){
                    return responseWrong($res['Message']);
                }
            }
            /*$res = $this->deposit($api_name, $username, $password, $amount, $account1);
            if ($res['Code'] != 0){
                return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
            }*/


        } elseif ($transfer_type == 1)//转出游戏
        {

            if(strtolower($api_name) == 'ag' || strtolower($api_name) == 'ags') {
                $is_ag = $member->is_ag;

                $ag = Api::where('api_name', 'AG')->orderBy('created_at', 'desc')->first();
                $ags =Api::where('api_name', 'AGS')->orderBy('created_at', 'desc')->first();

                if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0){
                    $res = $this->withdrawal('AGS', $username, $password, $amount, $account1);
                    if ($res['Code'] != 0){
                        return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                    }
                }elseif ($ag && $ag->on_line==0 && $ags && $ags->on_line==0){
                    if($is_ag == 1) {
                        $res = $this->withdrawal('AG', $username, $password, $amount, $account1);
                        if ($res['Code'] != 0){
                            return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                        }
                    }elseif ($is_ag == 2){
                        $res = $this->withdrawal('AGS', $username, $password, $amount, $account1);
                        if ($res['Code'] != 0){
                            return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                        }
                    }
                }
            }elseif (strtolower($api_name) == 'sunbet' || strtolower($api_name) == 'sunbets'){
//增加申博
                $is_sunbet = $member->is_sunbets;
                $sunbet = Api::where('api_name', 'SUNBET')->orderBy('created_at', 'desc')->first();
                $sunbets =Api::where('api_name', 'SUNBETS')->orderBy('created_at', 'desc')->first();
                if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0){
                    $res = $this->withdrawal('SUNBETS', $username, $password, $amount, $account1);
                    if ($res['Code'] != 0){
                        return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                    }
                }elseif ($sunbet && $sunbet->on_line==0 && $sunbets && $sunbets->on_line==0){
                    if($is_sunbet == 1) {
                        $res = $this->withdrawal('SUNBET', $username, $password, $amount, $account1);
                        if ($res['Code'] != 0){
                            return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                        }
                    }elseif ($is_sunbet == 2){
                        $res = $this->withdrawal('SUNBETS', $username, $password, $amount, $account1);
                        if ($res['Code'] != 0){
                            return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                        }
                    }
                }
            }else{
                // if(in_array($api_name,['OG','RMG'])){
                //     return responseWrong(trans("lang.zzwh"));
                // }
                $res = $this->withdrawal($api_name, $username, $password, $amount, $account1);
                //print_r($res);
                //die;
                if ($res['Code'] != 0){
                    return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                }
            }

        }
        if (is_Mobile()) {
            $url=route('wap.transfer') ;
        }
        if($this->sys->is_new_center == 1){
            if(is_Mobile()){
                return responseSuccess('',trans("lang.tjcg"),$url);
            }else{
                return responseSuccess('',trans("lang.tjcg"),route('member.userCenter',['type'=>3]));
            }

        }else{
            if(is_Mobile()){
                return responseSuccess('',trans("lang.tjcg"),$url);
            }else{
                return responseSuccess('',trans("lang.tjcg"), route('member.customer_report').'?type=2');
            }

        }


    }


    public function post_transfer_all(Request $request)
    {
        $member = $this->getMember();
        $username = $member->name;
        $password = $member->original_password;
        $account1 = 'money';
        $api_list = Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        //转账类型
            foreach ($api_list as $api){
                $api_name = $api->api_name;
                $member_api = Db::table('member_api')->where('api_id', $api->id)->where('member_id',$member->id)->first();
                if($member_api) {
                    $result = (new LEYUService())->balance($api_name,$username,'123456');
                    $res_b = json_decode($result,true);
                    if(is_array($res_b) && @$res_b['Code'] == '0' && @$res_b['Data']['balance'] > 0){
                        //转出
                        $result = (new LEYUService())->withdrawal($api_name,$username,'123456',$res_b['Data']['balance']);
                        $res = json_decode($result,true);
                        if (is_array($res) && $res['Code'] == '0')
                        {
                                    Db::table('members')->where('name',$username)->increment('money' , $res_b['Data']['balance']);
                                    Transfer::create([
                                        'bill_no' => getBillNo(),
                                        'api_type' => $member_api->api_id,
                                        'member_id' => $member->id,
                                        'transfer_type' => 1,
                                        'money' => $res_b['Data']['balance'],
                                        'transfer_in_account' => '中心账户',
                                        'transfer_out_account' => $api->api_name.'账户',
                                        'result' => $result
                                    ]);
                                    Db::table('member_api')->where('member_id', $member->id)->update(['money' =>0]);
                        }
                    }
                }
            }
//         foreach ($api_list as $api){
//             $api_name = $api->api_name;
//             $member_api = $member->apis()->where('api_id', $api->id)->first();
//             if($member_api) {
//                 $amount = $member_api->money;
//                 if($amount>0) {
//                     if (strtolower($api_name) == 'ag' || strtolower($api_name) == 'ags') {
//                         $is_ag = $member->is_ag;

//                         $ag = Api::where('api_name', 'AG')->orderBy('created_at', 'desc')->first();
//                         $ags = Api::where('api_name', 'AGS')->orderBy('created_at', 'desc')->first();

//                         if ($ag && $ag->on_line == 1 && $ags && $ags->on_line == 0) {
//                             $res = $this->withdrawal('AGS', $username, $password, $amount, $account1);
//                             if ($res['Code'] != 0) {
//                                 //return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
//                             }
//                         } elseif ($ag && $ag->on_line == 0 && $ags && $ags->on_line == 0) {
//                             if ($is_ag == 1) {
//                                 $res = $this->withdrawal('AG', $username, $password, $amount, $account1);
//                                 if ($res['Code'] != 0) {
//                                     // return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
//                                 }
//                             } elseif ($is_ag == 2) {
//                                 $res = $this->withdrawal('AGS', $username, $password, $amount, $account1);
//                                 if ($res['Code'] != 0) {
//                                     //return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
//                                 }
//                             }
//                         }
//                     } elseif (strtolower($api_name) == 'sunbet' || strtolower($api_name) == 'sunbets') {
// //增加申博
//                         $is_sunbet = $member->is_sunbets;
//                         $sunbet = Api::where('api_name', 'SUNBET')->orderBy('created_at', 'desc')->first();
//                         $sunbets = Api::where('api_name', 'SUNBETS')->orderBy('created_at', 'desc')->first();
//                         if ($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line == 0) {
//                             $res = $this->withdrawal('SUNBETS', $username, $password, $amount, $account1);
//                             if ($res['Code'] != 0) {
//                                 //return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
//                             }
//                         } elseif ($sunbet && $sunbet->on_line == 0 && $sunbets && $sunbets->on_line == 0) {
//                             if ($is_sunbet == 1) {
//                                 $res = $this->withdrawal('SUNBET', $username, $password, $amount, $account1);
//                                 if ($res['Code'] != 0) {
//                                     // return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
//                                 }
//                             } elseif ($is_sunbet == 2) {
//                                 $res = $this->withdrawal('SUNBETS', $username, $password, $amount, $account1);
//                                 if ($res['Code'] != 0) {
//                                     // return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
//                                 }
//                             }
//                         }
//                     } else {
//                         $res = $this->withdrawal($api_name, $username, $password, $amount, $account1);
//                         if ($res['Code'] != 0) {
//                              //return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
//                         }
//                     }
//                 }
//             }
//         }
      return responseSuccess('',trans("lang.tjcg"));
    }
    public function one_transfer(Request $request)
    {


        $input = $request->all();


        $member = $this->getMember();
        $amount = $member->money;

        $api_name = $input['api_name'];
        
        // if(in_array($api_name,['OG','RMG'])){
        //             return responseWrong(trans("lang.zzwh"));
        //         }
                
                
        $username = $member->name;
        $password = $member->original_password;

        $transfer_type = $input['transfer_type'];
        $account1 = 'money';

        $data = [];
        //转账类型
        if ($transfer_type == 0)//转入游戏
        {

            if($member -> money <= 0) {
                return responseWrong(trans("lang.yebz"));
            }
            if ($account1 == 'money' && $member->money < $amount){
                return responseWrong(trans("lang.yebz"));
            }

            if ($account1 == 'fs_money' && $member->fs_money < $amount){
                return responseWrong(trans("lang.yebz"));
            }

            $is_ag = $member->is_ag;

            $ag = Api::where('api_name', 'AG')->orderBy('created_at', 'desc')->first();
            $ags =Api::where('api_name', 'AGS')->orderBy('created_at', 'desc')->first();





            $sunbet = Api::where('api_name', 'SUNBET')->orderBy('created_at', 'desc')->first();
            $sunbets =Api::where('api_name', 'SUNBETS')->orderBy('created_at', 'desc')->first();

            $is_sunbet = $member->is_sunbets;

            if(strtolower($api_name) == 'ag' || strtolower($api_name) == 'ags') {
                if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0){
                    $res = $this->deposit('AGS', $username, $password, $amount, $account1);
                    if ($res['Code'] != 0){
                        return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                    }
                }elseif ($ag && $ag->on_line==0 && $ags && $ags->on_line==0){
                    if($is_ag == 1) {
                        $res = $this->deposit('AG', $username, $password, $amount, $account1);
                        if ($res['Code'] != 0){
                            return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                        }
                    }elseif ($is_ag == 2){
                        $res = $this->deposit('AGS', $username, $password, $amount, $account1);
                        if ($res['Code'] != 0){
                            return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                        }
                    }
                }else{
                    $res = $this->deposit('AG', $username, $password, $amount, $account1);
                    if ($res['Code'] != 0){
                        return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                    }
                }
            }elseif (strtolower($api_name) == 'sunbet' || strtolower($api_name) == 'sunbets'){


                if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0){

                    $res = $this->deposit('SUNBETS', $username, $password, $amount, $account1);
                    if ($res['Code'] != 0){
                        return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                    }
                }elseif ($sunbet && $sunbet->on_line==0 && $sunbets && $sunbets->on_line==0){

                    if($is_sunbet == 1) {
                        $res = $this->deposit('SUNBET', $username, $password, $amount, $account1);
                        if ($res['Code'] != 0){
                            return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                        }
                    }elseif ($is_sunbet == 2){
                        $res = $this->deposit('SUNBETS', $username, $password, $amount, $account1);
                        if ($res['Code'] != 0){
                            return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                        }
                    }
                }else{
                    $res = $this->deposit('SUNBET', $username, $password, $amount, $account1);
                    if ($res['Code'] != 0){
                        return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                    }
                }
            }else{
                $res = $this->deposit($api_name, $username, $password, $amount, $account1);
                if ($res['Code'] != 0){
                    return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                }
            }
        } elseif ($transfer_type == 1)//转出游戏
        {
            $m = 0;
            $apis = Api::where('on_line', 0)->pluck('api_name');
            
            
            
            //转出乐语的接口
            // $mod = Api::where('api_name', 'SELF')->first();
            // $oldname = Db::table('api')->where('api_name',$api_name)->value('old_name');
            // if(@$oldname){
                
            //     $post_data = [
            //         'account' =>$mod->api_id,
            //         'api_key' =>$mod->api_key,			
            //         'api_code' =>$oldname,
            //         'username' => $member->name,
            //     ];
            //     if(preg_match('/^http(s)?:\\/\\/.+/',$mod->api_domain)){
            //         $url = $mod->api_domain.'/ley/balance';
            //     }else{
            //         $url = 'http://'.$mod->api_domain.'/ley/balance';
            //     }
            //     $receive = $this->send_post($url,$post_data);
                
            //     if(@$receive['Code'] == 0 && @$receive['Data']['balance'] >0){
                    
            //         $amount = intval($receive['Data']['balance']);
            //         $transferno = date("YmdHms").rand(000000,999999);//交易编号
            //         $post_data = [
            //             'account' =>$mod->api_id,
            //             'api_key' =>$mod->api_key,			
            //             'api_code' =>$oldname,
            //             'username' => $member->name,
            // 			'amount' => $amount,
            // 			'transferno' => $transferno,
            
            //         ];
            //         if(preg_match('/^http(s)?:\\/\\/.+/',$mod->api_domain)){
            //             $url = $mod->api_domain.'/ley/withdrawal';
            //         }else{
            //             $url = 'http://'.$mod->api_domain.'/ley/withdrawal';
            //         }
            //         $receive = $this->send_post($url,$post_data);
            //         if (is_array($receive) && $receive['Code'] == '0'){
            //             $member = $this->getMember();
            //             $outmoney = intval($amount);
            //             $member->increment('money' , $outmoney);
            //             $api = Api::where('api_name', $oldname)->first();
            //             $member_api = $member->apis()->where('api_id', $api->id)->first();
            //             if($member_api->money >= intval($amount)){
            //                 $member_api->decrement('money' , intval($amount));
            //             }else{
            //                 $member_api->decrement('money' , $member_api->money);
            //             }
                        
            //             Transfer::create([
            //                 'bill_no' => getBillNo(),
            //                 'api_type' => $member_api->api_id,
            //                 'member_id' => $member->id,
            //                 'transfer_type' => 1,
            //                 'money' => intval($amount),
            //                 'transfer_in_account' => '中心账户',
            //                 'transfer_out_account' => $member_api->api->api_name.'账户',
            //                 'result' => json_encode($receive)
            //             ]);
            //             $api->increment('api_money' , intval($amount));
            //         }
            //     }
            // }
            
            
            
            
            
            
            
            //if(in_array($api_name,$apis->toArray())){
                $mod = new SelfController();

                    $res =  $mod->balance($api_name,$member->name, $member->original_password);

                    if (intval($res['Data']) <= 0) {

                        return responseWrong(trans("lang.yebz"));
                    }
                    $m = $res['Data'];
                    
                    $res = $this->withdrawal($api_name, $username, $password, $m, $account1);
                    
                    if ($res['Code'] != 0){
                        return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                    }
                


            //}


            /*die;
            //获取单接口的余额
            if (in_array($api_name, [
                'AG',
                'BBIN',
                'MG',
                'PT',
                'AB',
                'TTG',
                'IBC',
                'YC',
                'CG',
                'SA',
                'BG',
                'DT',
                'HJ',
                'WJS',
                'PNG',
                'SS',
                'BS',
                'MW',
                'SUNBET',
                'EG',
                'OG',
                'VR',
                'NAG',
                'KG',
                'KY',
                'IMSB',
                'OPUSSPORT',
                'OPUSCASINO',
                'CQ9',
                'DG',
                'GG',
                'EBET'
            ]))
            {
                $mod = new SelfController();
                $res =  $mod->balance($api_name,$member->name, $member->original_password);
                if ($res['Data'] <= 0) {

                    return responseWrong(trans("lang.yebz"));
                }
                $m = $res['Data'];
            }

            $res = $this->withdrawal($api_name, $username, $password, $m, $account1);
            if ($res['Code'] != 0)
                return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));*/
        }


        if (is_Mobile()) {
            $url=route('wap.transfer') ;
        }

        if($this->sys->is_new_center == 1){
            if(is_Mobile()){
                return responseSuccess('',trans("lang.tjcg"),$url);
            }else{
                return responseSuccess('',trans("lang.tjcg"),route('member.userCenter',['type'=>3]));
            }

        }else{
            if(is_Mobile()){
                return responseSuccess('',trans("lang.tjcg"),$url);
            }else{
                return responseSuccess('',trans("lang.tjcg"));
            }

        }

    }

    /**
     * @param $game1正版
     * @param $game2私有
     * @param $is_state开启状态
     * @param $account1账户类型money
     * @return mixed
     */
    private function private_game_trans($game1,$game2,$is_state,$account1)
    {
        $member = $this->getMember();
        $username = $member->name;
        $password = $member->original_password;

        $mod = new SelfController();

        if($game1 && $game1->on_line == 1 && $game2 && $game2->on_line==0){
            //山寨游戏
            $res =  $mod->balance($game2->api_name,$member->name, $member->original_password);
            if (intval($res['Data']) <= 0) {

                return responseWrong(trans("lang.yebz"));
            }
            $m = $res['Data'];

            $res = $this->withdrawal($game2->api_name, $username, $password, $m, $account1);

            if ($res['Code'] != 0){
                return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
            }
        }elseif ($game1 && $game1->on_line==0 && $game2 && $game2->on_line==0){
            if($is_state == 1) {
                $res =  $mod->balance($game1->api_name,$member->name, $member->original_password);
                if (intval($res['Data']) <= 0) {

                    return responseWrong(trans("lang.yebz"));
                }
                $m = $res['Data'];

                $res = $this->withdrawal($game1->api_name, $username, $password, $m, $account1);

                if ($res['Code'] != 0){
                    return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                }
            }elseif ($is_state ==2){
                $res =  $mod->balance($game2->api_name,$member->name, $member->original_password);
                if (intval($res['Data']) <= 0) {

                    return responseWrong(trans("lang.yebz"));
                }
                $m = $res['Data'];

                $res = $this->withdrawal($game2->api_name, $username, $password, $m, $account1);

                if ($res['Code'] != 0){
                    return responseWrong(trans("lang.sbcw").$res['Message'].trans("lang.lxkf"));
                }
            }
        }
        if (is_Mobile()) {
            $url=route('wap.transfer') ;
        }

        if($this->sys->is_new_center == 1){
            if(is_Mobile()){
                return responseSuccess('',trans("lang.tjcg"),$url);
            }else{
                return responseSuccess('',trans("lang.tjcg"),route('member.userCenter',['type'=>3]));
            }

        }else{
            if(is_Mobile()){
                return responseSuccess('',trans("lang.tjcg"),$url);
            }else{
                return responseSuccess('',trans("lang.tjcg"));
            }

        }
    }
    //提交反馈
    public function post_feedback(Request $request)
    {
        $validator = $this->verify($request, 'member.post_feedback');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();

        Feedback::create([
            'type' => $data['type'],
            'content' => $data['content'],
            'phone' => $data['phone'],
            'member_id' => $this->getMember()->id
        ]);

        return responseSuccess('', '谢谢您的反馈！', route('member.complaint_proposal'));
    }

    public function distillRed(Request $request)
    {
        //最近一次成功充值
        $member = $this->getMember();
        $recharge = Recharge::where('member_id', $member->id)->where('status', 2)->orderBy('created_at','desc')->first();

        if(!$recharge)
            return responseWrong('没有充值记录');

        //匹配红包等级
        $red_level = Red::where('on_line', 0)->orderBy('sort', 'desc')->get();
        $rate = $times = 0;
        foreach ($red_level as $k => $v)
        {
            if ($recharge->money >= $v->min_amount && $recharge->money <= $v->max_amount)
            {
                $rate = rand($v->min_rate, $v->max_rate);
                $times = $v->times;
                break;
            }
        }


        if ($rate > 0 )
        {
            //判断次数
            $log = DistillRedLog::where('recharge_id', $recharge->id)->first();
            if (!$log)
            {
                $log = DistillRedLog::create([
                    'recharge_id' => $recharge->id
                ]);
            }

            if ($log->times < $times)
            {
                //计算红包
                $red_money = $recharge->money*$rate/100;
                try{
                    DB::transaction(function() use($log, $member,$red_money,$recharge) {

                        $member->increment('money', $red_money);
                        //红利
                        Dividend::create([
                            'member_id' => $member->id,
                            'type' => 4,
                            'describe' => '充值红包',
                            'money' => $red_money,
                        ]);
                        //
                        RedLog::create([
                            'recharge_id' => $recharge->id,
                            'money' => $red_money
                        ]);
                        //
                        $log->increment('times', 1);

                    });
                }catch(\Exception $e){
                    DB::rollback();
                    return responseWrong('失败');
                }
            } else {
                return responseWrong('红包资格已用完');
            }

        } else {
            return responseWrong('没有达到抽取红包条件');
        }

        return responseSuccess($red_money, '抽取成功，红包已发放到中心账户');


    }
    public function my_activity()
    {
        $member = $this->getMember();
        $data = ActivityApply::where('member_id', $member->id)->orderBy('status', 'asc')->get();

        return view('member.my_activity', compact('data'));
    }

    //申请活动
    public function post_apply_activity(Request $request)
    {
        $data = $request->all();
        $member = $this->getMember();
        $check_activity = Activity::where('id', $data['activity_id'])->first();
        if($check_activity->type == 9)
        {//首存活动
            $check = ActivityApply::where(['activity_id' => $data['activity_id'], 'member_id'=>$member->id])->whereIn('status',[1,2])->first();
            if(isset($check->id))
            {
                return responseWrong('不可重复申请！');
            }
            $first_mod = new Recharge();

            if(isset($check_activity->start_at))
            {
                //$first_mod = $first_mod->where('created_at', '>=', $check_activity->start_at);
            }

            if(isset($check_activity->end_at))
            {
                //$first_mod = $first_mod->where('created_at', '<=', $check_activity->end_at);
            }

            $first_recharge = $first_mod->where('status', 2)->where('member_id', $member->id)->orderBy('created_at', 'asc')->first();

            if(!isset($first_recharge->id))
            {
                return responseWrong('请充值后再来申请');
            }
            else
            {
                if(isset($check_activity->start_at))
                {
                    if(date('Y-m-d H:i:s', time()) < $check_activity->start_at)
                    {
                        return responseWrong("活动将于 $check_activity->start_at 开始");
                    }
                }

                if(isset($check_activity->end_at))
                {
                    if(date('Y-m-d H:i:s', time()) > $check_activity->end_at)
                    {
                        return responseWrong("活动已结束，请申请其他活动");
                    }
                }

                if($first_recharge->money < $check_activity->money)
                {
                    return responseWrong("首存金额需达到 $check_activity->money 才能申请该活动");
                }
            }
            $transfer = Db::table('transfers')->where('member_id',$member->id)->where('transfer_type',0)->where('created_at','>=',$first_recharge->created_at)->first();
            if($transfer){
                return responseWrong("您不符合申請該活動資格！");
            }
        }

        if($check_activity->type == 3)
        {//充值活动
            $ck_mod = new Recharge();

            if(isset($check_activity->start_at))
            {
                $ck_mod = $ck_mod->where('created_at', '>=', $check_activity->start_at);
            }

            if(isset($check_activity->end_at))
            {
                $ck_mod = $ck_mod->where('created_at', '<=', $check_activity->end_at);
            }

            if(isset($check_activity->start_at))
            {
                if(date('Y-m-d H:i:s', time()) < $check_activity->start_at)
                {
                    return responseWrong("活动将于 $check_activity->start_at 开始");
                }
            }

            if(isset($check_activity->end_at))
            {
                if(date('Y-m-d H:i:s', time()) > $check_activity->end_at)
                {
                    return responseWrong("活动已结束，请申请其他活动");
                }
            }

            $recharge_money = $ck_mod->where('member_id', $member->id)->where('status', 2)->sum('money');

            if($recharge_money < $check_activity->money)
            {
                return responseWrong("充值金额需达到 $check_activity->money 才能申请该活动");
            }
    
             $first_recharge = Recharge::where('status', 2)->where('member_id', $member->id)->whereDate('created_at',date('Y-m-d'))->count();
            
             if($first_recharge<1){
                return responseWrong("请先充值");
            }
            //查看申请活动时间是不是大于最后充值
            $last_active = ActivityApply::where([ 'member_id'=>$member->id])->where('status',2)->orderBy('created_at', 'desc')->first();
            $last_recharge = Recharge::where('status', 2)->where('member_id', $member->id)->orderBy('created_at', 'desc')->first();
            if(@$last_active && @$last_active->created_at >= @$last_recharge->created_at){
                return responseWrong("请先充值");
            }
            
            
            $transfer = Db::table('transfers')->where('member_id',$member->id)->where('transfer_type',0)->where('created_at','>=',$last_recharge->created_at)->first();
            if($transfer){
                return responseWrong("您不符合申請該活動資格！");
            }
        
        
            $check = ActivityApply::where([ 'member_id'=>$member->id])->where('status',1)->first();
            $count = ActivityApply::where(['activity_id' =>$data['activity_id'], 'member_id'=>$member->id])->whereIn('status',[1,2])->whereDate('created_at',date('Y-m-d'))->count();
            if($check){
                return responseWrong("您尚有活动未批准，請等待批准");
            }
            if($count >= $check_activity->times){
                return responseWrong("活動每天只能申請".$check_activity->times.'次');
            }
        }
        
        
        
        
        // $index = Db::table('activities_apply')->where('member_id', $member->id)->count();
        // if($index){
        //     Db::table('activities_apply')->where('member_id', $member->id)->where('index',$index)->delete();
        // }
        
        ActivityApply::create([
            'activity_id' => $data['activity_id'],
            'member_id' => $member->id,
            // 'index'=>$index
        ]);

        $url=route('member.my_activity');

        if (is_Mobile()) {
            $url=route('wap.my_activity');
        }

        if($this->sys->is_new_center == 1){
            return responseSuccess('','申请成功');
        }else{
            return responseSuccess('', '申请成功', $url);
        }
    }

    public function post_change_trans(Request $request)
    {
        $data = $request->all();
        if($request->has('is_trans_on')){
            $member = $this->getMember();

            if($data['is_trans_on'] == 0){
                //开启转账钱包  中心钱包 转入系统
                $center_res = json_decode((new SelfService())->wallet_balance($member->name),true);
                if(!$center_res){
                    $msg = (new SelfService())->wallet_balance($member->name);
                    return responseWrong($msg);
                }
                if($center_res['statusCode'] == 01){
                    $center_money = $center_res['data'];
                }else{
                    return responseWrong($center_res['code'].'--'.$center_res['message']);
                }

                //中心钱包有钱时转入系统
                if($center_money > 0) {
                    $amount = $center_money > 0 ? -$center_money : $center_money;

                    $result = (new SelfService())->trans($member->name,$amount);
                    $res = json_decode($result,true);

                    if(!$res){
                        return responseWrong($result);
                    }
                    if($res['statusCode'] != 01){
                        return responseWrong($res['statusCode'].'--'.$res['message']);
                    }
                    $amount_type = 'money';
                    if(is_array($res) && $res['statusCode'] == 01){
                        try{
                            DB::transaction(function() use($res,$amount_type,$amount,$member,$result) {
                                //个人账户
                                $member->increment($amount_type , abs($amount));
                                //额度转换记录
                                Transfer::create([
                                    'bill_no' => getBillNo(),
                                    'api_type' => '0',
                                    'member_id' => $member->id,
                                    'transfer_type' => 1,
                                    'money' => abs($amount),
                                    'transfer_in_account' => $amount_type == 'money'?'中心账户':'返水账户',
                                    'transfer_out_account' => '免转钱包',
                                    'result' => $result
                                ]);
                            });
                        }catch(\Exception $e){
                            DB::rollback();
                            return responseWrong('网络错误请重试2');
                        }
                    }
                }

            }elseif ($data['is_trans_on'] == 1) {
                $result = (new SelfService())->trans_all($member->name);
                $res = json_decode($result,true);

                if(!$res){
                    return responseWrong($result);
                }
                if($res['statusCode'] != 01){
                    //return responseWrong($res['statusCode'].'--'.$res['message']);
                    if($res['statusCode'] == '10040'){
                        $res['message'] = '请先进入任意游戏激活会员,然后转换钱包';
                    }
                    return json_encode(array(
                        'code' => $res['statusCode'],
                        'msg' => $res['message']
                    ));
                }
                $amount_type = 'money';
                if(isset($res['data']['allCount'])) {
                    $amount = $res['data']['allCount'];
                }else{
                    $amount = 0;
                }

                if($amount > 0) {
                    if(is_array($res) && $res['statusCode'] == 01){
                        try{
                            DB::transaction(function() use($res,$amount_type,$amount,$member,$result) {
                                //个人账户
                                $member->increment($amount_type , abs($amount));
                                //额度转换记录
                                Transfer::create([
                                    'bill_no' => getBillNo(),
                                    'api_type' => '0',
                                    'member_id' => $member->id,
                                    'transfer_type' => 1,
                                    'money' => abs($amount),
                                    'transfer_in_account' => $amount_type == 'money'?'中心账户':'返水账户',
                                    'transfer_out_account' => '转账钱包',
                                    'result' => $result
                                ]);
                            });
                        }catch(\Exception $e){
                            DB::rollback();
                            return responseWrong('网络错误请重试2');
                        }
                    }
                }
            }
            $res = $member->update([
                'is_trans_on'=>$data['is_trans_on']
            ]);
            if($res) {
                echo json_encode(array(
                    'code' => 0,
                    'msg' => '状态修改成功'
                ));
                exit;
            }else{
                echo json_encode(array(
                    'code' => 0,
                    'msg' => '状态修改失败'
                ));
                exit;
            }
        }else{
            echo json_encode(array(
                'code' => 0,
                'msg' => '参数错误'
            ));
            exit;
        }
    }
    public function refresh_ml()
    {
        $start_date = '2019-11-12 00:00:00';
        $member = $this->getMember();
        $game_record = GameRecord::where('member_id', $member->id)
            ->where('created_at', '>=', $start_date)
            ->where('validBetAmount', '<>', 0)
            ->where('is_mluse', '0');
        $total_ml = $game_record->sum('validBetAmount');
        $update_ml = $member->ml_money - $total_ml;
        $update_ml = $update_ml >= 0 ? $update_ml : 0;
        try {
            DB::transaction(function () use($member, $update_ml, $game_record) {
                $member->update(['ml_money' => $update_ml]);
                $game_record->update(['is_mluse' => 1]);
            });
        } catch (\Exception $e) {
            DB::rollback();
            return responseWrong('码量刷新失败');
        }
    }

    public function checkRecharge()
    {
        $member = $this->getMember();
        $rs =Recharge::where('member_id',$member->id)
            ->whereIn('payment_type',[1,2,3,5])
            ->where('status',1)
            ->get();
        if($rs->count() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function upload(){
        header('content-type:text/html charset:utf-8');
        $baseUrl = "uploads/";
        $picArr = array();
        $index = 0; 
        foreach($_FILES as $file){
            $picName = 'ruoshui' . $index;//对应index.html FomData中的文件命名
            $fileName = strval(rand(10000000,99999999)).$_FILES[$picName]['name'];
            //文件不存在才上传
            if(!file_exists($baseUrl.$fileName)) {
                $isMoved = false;  //默认上传失败
                $MAXIMUM_FILESIZE = 10 * 1024 * 1024;//文件大小限制1M = 10 * 1024 * 1024 B;
                $picType = "/^\.(jpg|jpeg|gif|png){1}$/i"; 
                if ($_FILES[$picName]['size'] <= $MAXIMUM_FILESIZE && 
                    preg_match($picType, strrchr($fileName, '.'))) {
                    $isMoved = move_uploaded_file ( $_FILES[$picName]['tmp_name'], $baseUrl.$fileName);//上传文件
                    //echo $isMoved;
                }
            }
        	$picArr[$index] = $fileName;
            $index++;
        }
        echo json_encode($picArr);    
    }
    
    
   public function bank(){
        $member = $this->getMember();
        $bank = config('bank');
        return view('member.bank', compact('member','bank'));
    }
    

    public function promotion_apply(){
         $member = $this->getMember();
        $data = ActivityApply::where('member_id', $member->id)->orderBy('status', 'asc')->get();
        return view('member.promotion_apply',compact('data'));
    }

    public function npromotion(){
        return view('member.npromotion');
    }

    public function pc_transfer(){
        $api_list = Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        $member = $this->getMember();
        return view('member.transfer',compact('api_list','member'));
    }
    
    public function customer_report_3(Request $request)
    {
        $api_type =$request->get('api_type','');
        $start =$request->get('start','');
        $end =$request->get('end','');
        $data = GameRecord::where('member_id', $this->getMember()->id)
            ->when($start!='',function ($query) use($start){
            $query->whereDate('created_at','>=',$start);
        })->when($end!='',function ($query) use($end){
            $query->whereDate('created_at','<=',$end.' 23:59:59');
        })->when($api_type!='',function ($query) use($api_type){
            $query->where('api_type',$api_type);
        })->orderBy('betTime', 'desc')->paginate(config('web.page-size'));
        $api = Db::table('api')->where('on_line',0)->get();
        return view('member.customer_report_3', compact('data','api_type','start','end','api'));
    }
    protected function send_post($url,$data = null)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

        if (!empty($data))
        {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

       $output = curl_exec($curl);

        curl_close($curl);
 
        return json_decode($output,true);
    }
    public function tixian_shuaxin(Request $request){
        $data = [];
        $member = $this->getMember();
        $data['ml_money'] = $member->ml_money;
        $data['money'] = $member->money;
        return responseSuccess($data,'');

        
    }
    public function chongzhi_shuaxin(Request $request){
        $banks= BankCard::where('on_line', 0)->orderBy('id', 'asc')->get();
        foreach($banks as &$vo){
           $vo->bank_name = Base::$BANK_TYPE[$vo->bank_id];
        }
        $data = [];
        $setting = Db::table('system_config')->first();
        $data['banks'] = $banks;
        $data['setting'] = $setting;
        return responseSuccess($data,'');
    }
    
    
    
}
