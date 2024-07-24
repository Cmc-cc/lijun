<?php

namespace App\Http\Controllers\Wap;

use App\Http\Controllers\Api\ApiClientController;
use App\Http\Controllers\Member\PtController;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\ActivityApply;
use App\Models\Api;
use App\Models\BankCard;
use App\Models\Banners;
use App\Models\BlackListIp;
use App\Models\DailiMoneyLog;
use App\Models\Dividend;
use App\Models\Drawing;
use App\Models\GameList;
use App\Models\GameRecord;
use App\Models\Member;
use App\Models\MemberDailiApply;
use App\Models\MemberLoginLog;
use App\Models\Recharge;
use App\Models\Red;
use App\Models\SystemConfig;
use App\Models\SystemNotice;
use App\Models\TcgGameList;
use App\Models\Template;
use App\Models\Transfer;
use App\Services\SelfService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ValidationTrait;
use Auth;
use Hash;
use App\Models\Activity;
use Illuminate\Support\Facades\Cache;
use Session;
use App\Models\FsLevel;
use DB;
use App\Models\Base;
use App\Models\MemberMoneyLog;
use App\Models\MemberMlLog;
class IndexController extends WebBaseController
{
    use ValidationTrait;
    
    public function usdt_pointer(){
        $pointer = Db::table('system_config')->where('id','>',0)->value('usdt_pointer');
        if($pointer>=300){
            Db::table('system_config')->where('id','>',0)->update(['usdt_pointer'=>1]); 
            return 1;
        }else{
           Db::table('system_config')->where('id','>',0)->increment('usdt_pointer',1); 
           return $pointer;
        }
        
        
        
        
        
    }
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
    public function usdt(){
        $member = $this->getMember();
        $setting = Db::table('system_config')->first();
        $xiaoshu = rand(10,40);

        $view = 'wap.template.theme10.usdt';
        return view($view, compact('setting','xiaoshu','member'));
    }
    
    //首页
    public function index(Request $request)
    {
        $member = $this -> getMember();
        // dd($member);
        // if(!$member){
            // header('Location:/m/login');die;
            // $ipInforProviderUrl="http://www.geoplugin.net/json.gp?ip=".$_SERVER['REMOTE_ADDR'];
            // @$ipInfor=json_decode(file_get_contents($ipInforProviderUrl.$ip),true);
            // if($ipInfor && $ipInfor['geoplugin_countryCode'] !='HK'){
            //     die;
            // }
        // }
        $system_notices = SystemNotice::where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->first();
        
    
        $gongao = SystemNotice::where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();
    //     if(session('guanggao')!=1){
    // 		Session::put('guanggao',1);
    // 		$gonggao = 1;
    // 	}
        $banners = Banners::where('type', 2)->orderBy('sort','asc')->get();
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.index';
        }else{
            $view = 'wap.template.'.$mb_path.'.index';
        }

        $setting = Db::table('system_config')->first();
        $gonggao = $setting->is_alert_on;
        $article = [
            2 => '存款问题',
            3 => '取款问题',
            4 => '账户问题',
            5 => '优惠活动',
            // 6 => '转账问题',
            7 => '代理加盟',
            // 8 => '显示问题',
            9 => '游戏场馆',
            // 10 => '投注结算',
            // 11 => '其他问题'
        ];
        
        $type = 1;  ///1充值 2体现
		$xiaoshu = rand(10,40);
		
		
    	$banks= BankCard::where('on_line', 0)->orderBy('id', 'asc')->get();
        foreach($banks as &$vo){
           $vo->bank_name = Base::$BANK_TYPE[$vo->bank_id];
        }
        
        $bank = config('bank');
        $api_list = Api::where('on_line', '<>','1')->orderBy('created_at', 'desc')->get();
        if($member){
            $member->api_money = 0;
        }
        if($api_list && $member){
            foreach ($api_list as $k=>$v){
                $member_api = Db::table('member_api')->where('member_id',$member->id)->where('api_id', $v->id)->first();
                
                if($member_api){
                    if($v->api_name=="KY_HK"){
                        $member->api_money += $member_api->money / 2;
                    }else{
                        $member->api_money += $member_api->money;
                    }
                    
                }
            }
            $member->api_money = round($member->api_money,2);
        }
        
        ///活动        
        $mod = new Activity();
        $data_huodong = $mod -> where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();
        
         //我的消息
        $data_xiaoxi = SystemNotice::orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();
        

       
        

        

        $recharge = Db::table('recharge')->where('member_id',$member['id'])->orderBy('id','desc')->first();
        $drawing = Db::table('drawing')->where('member_id',$member['id'])->orderBy('id',' desc')->first();
        
        $data_msg = SystemNotice::where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();
        
        $data_xiaoxi2 = SystemNotice::where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->first();
        
        
        if(!Auth::guard('member')->guest()){
            $data_shenqingjindu = ActivityApply::where('member_id', $member->id)->orderBy('status', 'asc')->get();
        
            //我的
        $total = [
            'game_str' => '',
            'fs_money' => 0
        ];
        $rows = GameRecord::where('member_id',$member->id)
                ->where('isfs','=',0)
                ->where('flag',1)
                ->sum('validBetAmount');
            $total['fa_money'] = $rows * 0.006;
        }else{
            $data_shenqingjindu = [];
            $total = [];
        }
        
    
        // dump($member);die;

        // $api_list = Db::table('member_api')->where('member_id',$member->id)->groupBy('member_id')->get();
        // dump($api_list);die;
        // $view = 'wap.template.'.$mb_path.'.index2';
        //echo $view;
        //die;
        return view($view, compact('system_notices','member','banks','bank','xiaoshu', 'banners','system_notices','setting','gonggao','article','api_list','data_huodong','data_shenqingjindu','total','data_xiaoxi','recharge','drawing','data_xiaoxi2','data_msg','gongao'));
    }
    public function fs_money(){
        $member = $this->getMember();
        $total = [
            'game_str' => '',
            'fs_money' => 0
        ];
        $game_types = config('platform.game_type');
        $fs_level = FsLevel::orderBy('level','desc')->where('id','>',0)->first();
        if($fs_level){
                foreach ($game_types as $k=>$v ){
                    //if($k != 6) continue;
                    $rows = GameRecord::where('gameType',$k)
                        ->where('member_id',$member->id)
                        ->where('isfs','=',0)
                        ->where('flag',1)
                        ->take(10000)
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
            }
        $total['fs_money'] = round($total['fs_money'],2);
        return $total;
    }
    //首页
    public function index2(Request $request)
    {
        $member = $this -> getMember();
        // dd($member);
        // if(!$member){
            // header('Location:/m/login');die;
            // $ipInforProviderUrl="http://www.geoplugin.net/json.gp?ip=".$_SERVER['REMOTE_ADDR'];
            // @$ipInfor=json_decode(file_get_contents($ipInforProviderUrl.$ip),true);
            // if($ipInfor && $ipInfor['geoplugin_countryCode'] !='HK'){
            //     die;
            // }
        // }
        $system_notices = SystemNotice::orderBy('sort', 'asc')->orderBy('created_at', 'desc')->first();
    //     if(session('guanggao')!=1){
    // 		Session::put('guanggao',1);
    // 		$gonggao = 1;
    // 	}
        $banners = Banners::where('type', 2)->orderBy('sort','asc')->get();
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.index';
        }else{
            $view = 'wap.template.'.$mb_path.'.index2';
        }
        $setting = Db::table('system_config')->first();
        $gonggao = $setting->is_alert_on;
        $article = [
            2 => '存款问题',
            3 => '取款问题',
            4 => '账户问题',
            5 => '优惠活动',
            // 6 => '转账问题',
            7 => '代理加盟',
            // 8 => '显示问题',
            9 => '游戏场馆',
            // 10 => '投注结算',
            // 11 => '其他问题'
        ];
        
        $api_list = Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        
        // $api_list = Db::table('member_api')->where('member_id',$member->id)->groupBy('member_id')->get();
        // dump($api_list);die;
        // $view = 'wap.template.'.$mb_path.'.index2';
        //echo $view;
        //die;
        return view($view, compact('system_notices', 'banners','system_notices','setting','gonggao','article','api_list'));
    }
    
    public function chongzi_tixian(Request $request){
		$type = $_GET['type'];  ///1充值 2体现
		$xiaoshu = rand(10,40);
		$member = $this -> getMember();
		$setting = Db::table('system_config')->first();
    	$banks= BankCard::where('on_line', 0)->orderBy('id', 'asc')->get();
        foreach($banks as &$vo){
           $vo->bank_name = Base::$BANK_TYPE[$vo->bank_id];
        }
        if($member->ml_money <0){
            Db::table('members')->where('id',$member->id)->update(['ml_money'=>0]);
        }
		return view('wap.template.theme10.chongzi', compact('xiaoshu', 'type','member','setting','banks'));
	
		
	}
	
    public function article_type(Request $request){
        $id = $_GET['id'];
        $setting = Db::table('system_config')->first();
        $data = Db::table('abouts')->where('type',$id)->get();
        return view('wap.template.theme10.article_type', compact('data','setting'));
    }
    public function article_detail(Request $request){
        $id = $_GET['id'];
        $setting = Db::table('system_config')->first();
        $data = Db::table('abouts')->where('id',$id)->first();
        return view('wap.template.theme10.article_detail', compact('data','setting'));
    }
    
    //首页
    public function index_py(Request $request)
    {
        $system_notices = SystemNotice::where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();
        $banners = Banners::where('type', 2)->get();
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.index_py';
        }else{
            $view = 'wap.template.'.$mb_path.'.index_py';
        }
        return view($view, compact('system_notices', 'banners'));
    }
    public function nav(Request $request)
    {
        $member = $this -> getMember();
        if ( !$member) {
            return redirect()->guest('m/login');
        }
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.nav';
        }else{
            $view = 'wap.template.'.$mb_path.'.nav';
        }
        return view($view);
    }

    public function activity_list(Request $request)
    {
        
        $mod = new Activity();
        $setting = Db::table('system_config')->first();
        $type = $request->get('type');
        if($type){
            $mod = $mod -> where('type',$type);
        }
        $data = $mod -> where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.activity_list';
        }else{
            $view = 'wap.template.'.$mb_path.'.activity_list';
        }
        return view($view, compact('data','setting'));
    }
    public function activity_detail_api(Request $request,$id){

        $data = Activity::findOrFail($id);
        return responseSuccess(['data'=>$data]);
    }

    public function activity_detail(Request $request,$id)
    {
        $data = Activity::findOrFail($id);
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.activity_detail';
        }else{
            $view = 'wap.template.'.$mb_path.'.activity_detail';
        }
        $member = $this -> getMember();
       if ( !$member) {
            return redirect()->guest('m/login');
        }
  
        return view($view, compact('data'));
    }

    //pt 電子
    public function pt_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'PT')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.pt.rng_game_list', compact('data'));
    }

    //pt 真人游戏列表
    public function pt_live_game_list()
    {
        $data = TcgGameList::where('productCode', 'PT')->where('on_line', 0)->where('gameType', 'LIVE')->orderBy('sort', 'asc')->get();

        return view('wap.pt.live_game_list', compact('data'));
    }

    //png 電子
    public function png_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'PNG')->where('client_type', 'html5')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.png.rng_game_list', compact('data'));
    }

    //ttg 電子
    public function ttg_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'TTG')->where('client_type', 'html5')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.ttg.rng_game_list', compact('data'));
    }

    //GG 電子

    public function gg_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'GG')->where('client_type', 'html5')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.gg.rng_game_list', compact('data'));
    }

    //CQ9 電子

    public function cq9_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'CQ9')->where('client_type', 'html5')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.cq9.rng_game_list', compact('data'));
    }

//    public function pt_rng_game_list()
//    {
//        return view('wap.pt.rng_game_list');
//    }

    public function dt_rng_game_list()
    {
        return view('wap.dt.rng_game_list');
    }

    //ag 電子游戏列表
    public function ag_eGame_list()
    {
        return view('wap.ag.eGame_list');
    }

    //mg 電子游戏列表
    public function mg_eGame_list()
    {
        return view('wap.mg.eGame_list');
    }

    public function login()
    {
        return view('wap.login');
    }

    
    public function agentregister(Request $request){
        $setting = Db::table('system_config')->first();
        $id = $request->get('id')?$request->get('id'):'';
        
        return view('wap.template.theme10.agentregister', compact('setting','id'));
    }
    public function postagentregister(Request $request)
    {
        // if(!session('milkcaptcha')||session('milkcaptcha') != $request->get('captcha'))
        //     return responseWrong('验证码错误');

        $my_system_config = SystemConfig::findOrFail(1);
        $validator = $this->verify($request, 'wap.register');
        $ip = Db::table('members')->where('register_ip',$request->getClientIp())->first();
        if($ip){
            // return responseWrong('此ip已注册过账户');
        }
        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }
        if(Db::table('members')->where('name',$request->get('name'))->first()){
                return responseWrong('账号已存在');
            }
        //验证ip
        if (in_array($request->getClientIp(), BlackListIp::pluck('ip')->toArray()))
            return responseWrong('该ip限制，请联系客服');

        //必须以字母开头
        if (!preg_match('/^[a-z]+$/', substr((string)$request->get('name'),0,1)) || !preg_match('/^[0-9a-z]+$/', $request->get('name')))
            return responseWrong('用户名只能以小写字母开头且字母数字组合');
        
        if(strlen($request->get('name'))>9){
            return responseWrong('用户名不能大于9位');
        }
        
        if(strlen((string)$request->get('qk_pwd')) != 6){
            return responseWrong('取款密码为6位纯数字');
        }
        
        
        if($my_system_config->sms_message){
            if(!$request->get('phone')){
                return responseWrong('请输入手机号');
            }
            if(!$request->get('code')){
                return responseWrong('请输入验证码');
            }
            if(Db::table('members')->where('phone',$request->get('phone'))->first()){
                return responseWrong('该手机号已存在');
            }
            $ldata = Db::table('sms')->where('status',0)->where('member_id',0)->where('phone',$request->get('phone'))->where('code',$request->get('code'))->orderBy('time','desc')->first();
            if(!$ldata){
                return responseWrong(trans("lang.yzmcw"));
            }elseif($ldata->time <= time()-600){
                return responseWrong(trans("lang.yzmygq"));
            }
        }
        
        
        $data = $request->all();
        //判断是否必须

        $real_name='';
        $phone='';
        $email='';
        $qq='';
        $weixin ='';

        if($my_system_config->is_regtj_1==1){
            $t_name=$request->get('t_name');
            if($my_system_config->is_regtj_2==1){
                if(empty($t_name)){
                    return responseWrong('推荐人必填');
                }
            }
            if(!empty($t_name)){
                if(!Member::where('is_daili', 1)->where('name', $t_name)->first()){
                    return responseWrong('不存在此推荐人');
                }
            }
        }
        $dali_mod = '';//判断域名
        $do_main = $_SERVER['HTTP_HOST'];

        if(strpos($do_main,'www') >= 0){
            $m = Member::where('is_daili', 1)->where('agent_uri', $do_main)->first();
        }else{
            $m = Member::where('is_daili', 1)->where('agent_uri', 'www.'.$do_main)->first();
        }

        if ($m)
        {
            $dali_mod = $m;
        } elseif ($request->has('u'))
        {
            $dali_mod = Member::where('is_daili', 1)->where('agent_uri', $request->get('u'))->first();
        } elseif ($request->has('i_code'))
        {
            $dali_mod = Member::where('is_daili', 1)->where('invite_code', $request->get('i_code'))->first();
        }elseif (Cache::has(sha1(getIp()))){
            $dali_mod = Member::where('is_daili', 1)->where('invite_code', Cache::get(sha1(getIp())))->first();
        } elseif ($request->has('t_name')) {
            $dali_mod = Member::where('is_daili', 1)->where('name', $request->get('t_name'))->first();
        }
        if($my_system_config->is_real_name_1==1){
            $real_name=$data['real_name'];
            if($my_system_config->is_real_name_2==1){
                if(empty($real_name)){
                    return responseWrong('姓名必填');
                }

            }
            if(!empty($real_name)){


                if(!preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$real_name)){
                    return responseWrong('姓名只能输入中文');
                }

                if (Member::where('real_name', $real_name)->first()){
                    return responseWrong('该姓名已存在！');

                }

            }
        }
        if($my_system_config->is_phone_1==1){
            $phone=$data['phone'];
            if($my_system_config->is_phone_2==1){
                if(empty($phone)){
                    return responseWrong('手机必填');
                }
                if(!preg_match("/^1[345678]\d{9}$/", $phone)){

                    return responseWrong('手机号码格式不正确！');

                }
            }

            if(!empty($phone)){
                if (Member::where('phone', $phone)->first()){
                    return responseWrong('该手机号已存在！');
                }

            }
        }
        if($my_system_config->is_qq_1==1){
            $qq=$data['qq'];
            if($my_system_config->is_qq_2==1){
                if(empty($qq)){
                    return responseWrong('QQ必填');
                }
                if (!preg_match( "/^[1-9][0-9]{4,14}$/", $data['qq'] ) )
                {

                    return responseWrong('您输入的QQ不合法');
                }
            }
            if(!empty($qq)){
                if (Member::where('qq', $qq)->first()){
                    return responseWrong('该QQ已存在！');
                }

            }
        }

        if($my_system_config->is_email_1==1){
            $email=$data['email'];
            if($my_system_config->is_email_2==1){
                if(empty($email)){
                    return responseWrong('邮箱必填');
                }
                if (!preg_match( "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", $data['email'] ) )
                {

                    return responseWrong('您输入的電子邮件地址不合法');
                }
            }
            if(!empty($email)){
                if (Member::where('email', $email)->first()){
                    return responseWrong('该邮箱已存在！');
                }

            }
        }
        if($my_system_config->is_weixin_1==1){
            $weixin=$data['weixin'];
            if($my_system_config->is_weixin_2==1){
                if(empty($weixin)){
                    return responseWrong('微信必填');
                }
                if (!preg_match( "/^[a-zA-Z\d_]{5,}$/", $data['weixin'] ) )
                {

                    return responseWrong('您输入的微信不合法');
                }
            }
            if(!empty($weixin)){
                if (Member::where('weixin', $weixin)->first()){
                    return responseWrong('该微信已存在！');
                }

            }
        }
        Member::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
            'original_password' => substr(md5(md5($data['name'])), 0,10),
            'o_password' => $data['password'],
            'invite_code' => getRandom(7),
            'real_name' => $real_name,
            'qk_pwd' => $data['qk_pwd'],
            'top_id' => $request->get('top_id')?$request->get('top_id'):0,
            'register_ip' => $request->getClientIp(),
            'phone' => $request->get('phone'),
            'email' => $email,
            'qq' => $qq,
            'weixin' => $weixin,
            'is_daili'=>$request->get('is_daili'),
            'register_url'=>$_SERVER['HTTP_HOST'],
        ]);

        if (Auth::guard('member')->attempt(['name' => $request->name, 'password' => $request->password]))
        {
            $member = auth('member')->user();
            $member->last_session = Session::getId();
            $member->save();
            $member->update([
                'last_login_ip'=>$request->getClientIp(),
                'last_login_at' => date('Y-m-d H:i:s')
            ]);
            MemberLoginLog::create([
                'member_id' => $member->id,
                'ip' => $request->getClientIp()
            ]);
            if(@$dali_mod->id){
                //下载APP
                return responseSuccess('', '注册成功', config('app.download_url'));
            }
            return responseSuccess('', '登录成功', route('wap.index'));
        }
        if(@$dali_mod->id){
            //下载APP
            return responseSuccess('', '登录成功', config('app.download_url'));
        }
        return responseSuccess('','注册成功', route('wap.login'));
    }
    
    
    

    public function register(Request $request)
    {
        // $ipInforProviderUrl="http://www.geoplugin.net/json.gp?ip=".$_SERVER['REMOTE_ADDR'];
        // @$ipInfor=json_decode(file_get_contents($ipInforProviderUrl.$ip),true);
        // if($ipInfor && $ipInfor['geoplugin_countryCode'] !='HK'){
        //     die;
        // }
        $i_code = $request->get('i');

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.register';
        }else{
            $view = 'wap.template.'.$mb_path.'.register';
        }
        $setting = Db::table('system_config')->first();
        return view($view, compact('i_code','setting'));
    }

    public function postRegister(Request $request)
    {
        if(!session('milkcaptcha')||session('milkcaptcha') != $request->get('captcha'))
            return responseWrong('驗證碼錯誤');

        $my_system_config = SystemConfig::findOrFail(1);
        $validator = $this->verify($request, 'wap.register');
        $ip = Db::table('members')->where('register_ip',$request->getClientIp())->first();
        if($ip){
            // return responseWrong('此ip已注册过账户');
        }
        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }
        if(Db::table('members')->where('name',$request->get('name'))->first()){
                return responseWrong('账号已存在');
            }
        //验证ip
        if (in_array($request->getClientIp(), BlackListIp::pluck('ip')->toArray()))
            return responseWrong('该ip限制，请联系客服');

 //必须以字母开头
        if (!preg_match('/^[0-9a-z]+$/', $request->get('name')))
            return responseWrong('賬號為字母+數字組合');
        
        if(strlen($request->get('name'))<6 || strlen($request->get('name'))>14){
            return responseWrong('帳號為6-14個字符加數字');
        }
       if(strlen((string)$request->get('password')) < 6 || strlen($request->get('password')) >12){
            return responseWrong('登錄密碼為6-12個字符或數字');
        }
    
        if(strlen((string)$request->get('qk_pwd')) < 6 || strlen($request->get('qk_pwd')) >10){
            return responseWrong('取款密碼為6-10個字符或數字');
        }
        
       if (!preg_match('/^[0-9]{8,11}+$/', $request->get('phone')))
            return responseWrong('手機號為8-11個數字');
        if(strlen((string)$request->get('phone')) < 8 || strlen($request->get('phone')) >11){
            return responseWrong('手機號為8-11個數字');
        }
        if(Db::table('members')->where('phone',$request->get('phone'))->first()){
            return responseWrong('该手機號已存在');
        }
        if($my_system_config->sms_message){
            if(!$request->get('phone')){
                return responseWrong('请输入手機號');
            }
            if(!$request->get('code')){
                return responseWrong('请输入验证码');
            }
     
            $ldata = Db::table('sms')->where('status',0)->where('member_id',0)->where('phone',$request->get('phone'))->where('code',$request->get('code'))->orderBy('time','desc')->first();
            if(!$ldata){
                return responseWrong(trans("lang.yzmcw"));
            }elseif($ldata->time <= time()-600){
                return responseWrong(trans("lang.yzmygq"));
            }
        }
        if(!$request->get('username')){
                return responseWrong('请输入真实姓名');
            }
        $data = $request->all();
        //判断是否必须

        $real_name='';
        $phone='';
        $email='';
        $qq='';
        $weixin ='';

        if($my_system_config->is_regtj_1==1){
            $t_name=$request->get('t_name');
            if($my_system_config->is_regtj_2==1){
                if(empty($t_name)){
                    return responseWrong('推荐人必填');
                }
            }
            if(!empty($t_name)){
                if(!Member::where('is_daili', 1)->where('name', $t_name)->first()){
                    return responseWrong('不存在此推荐人');
                }
            }
        }
        $dali_mod = '';//判断域名
        $do_main = $_SERVER['HTTP_HOST'];

        if(strpos($do_main,'www') >= 0){
            $m = Member::where('is_daili', 1)->where('agent_uri', $do_main)->first();
        }else{
            $m = Member::where('is_daili', 1)->where('agent_uri', 'www.'.$do_main)->first();
        }

        if ($m)
        {
            $dali_mod = $m;
        } elseif ($request->has('u'))
        {
            $dali_mod = Member::where('is_daili', 1)->where('agent_uri', $request->get('u'))->first();
        } elseif ($request->has('i_code'))
        {
            $dali_mod = Member::where('is_daili', 1)->where('invite_code', $request->get('i_code'))->first();
        }elseif (Cache::has(sha1(getIp()))){
            $dali_mod = Member::where('is_daili', 1)->where('invite_code', Cache::get(sha1(getIp())))->first();
        } elseif ($request->has('t_name')) {
            $dali_mod = Member::where('is_daili', 1)->where('name', $request->get('t_name'))->first();
        }
        if($my_system_config->is_real_name_1==1){
            $real_name=$data['username'];
            if($my_system_config->is_real_name_2==1){
                if(empty($real_name)){
                    return responseWrong('姓名必填');
                }

            }
            if(!empty($real_name)){


                // if(!preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$real_name)){
                //     return responseWrong('姓名只能输入中文');
                // }

                if (Member::where('username', $real_name)->first()){
                    return responseWrong('该姓名已存在！');

                }

            }
        }
        if($my_system_config->is_phone_1==1){
            $phone=$data['phone'];
            if($my_system_config->is_phone_2==1){
                if(empty($phone)){
                    return responseWrong('手机必填');
                }
                if(!preg_match("/^1[345678]\d{9}$/", $phone)){

                    return responseWrong('手机号码格式不正确！');

                }
            }

            if(!empty($phone)){
                if (Member::where('phone', $phone)->first()){
                    return responseWrong('该手机号已存在！');
                }

            }
        }
        if($my_system_config->is_qq_1==1){
            $qq=$data['qq'];
            if($my_system_config->is_qq_2==1){
                if(empty($qq)){
                    return responseWrong('QQ必填');
                }
                if (!preg_match( "/^[1-9][0-9]{4,14}$/", $data['qq'] ) )
                {

                    return responseWrong('您输入的QQ不合法');
                }
            }
            if(!empty($qq)){
                if (Member::where('qq', $qq)->first()){
                    return responseWrong('该QQ已存在！');
                }

            }
        }

        if($my_system_config->is_email_1==1){
            $email=$data['email'];
            if($my_system_config->is_email_2==1){
                if(empty($email)){
                    return responseWrong('邮箱必填');
                }
                if (!preg_match( "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", $data['email'] ) )
                {

                    return responseWrong('您输入的電子邮件地址不合法');
                }
            }
            if(!empty($email)){
                if (Member::where('email', $email)->first()){
                    return responseWrong('该邮箱已存在！');
                }

            }
        }
        // if($my_system_config->is_weixin_1==1){
        //     $weixin=$data['weixin'];
        //     if($my_system_config->is_weixin_2==1){
        //         if(empty($weixin)){
        //             return responseWrong('微信必填');
        //         }
        //         if (!preg_match( "/^[a-zA-Z\d_]{5,}$/", $data['weixin'] ) )
        //         {

        //             return responseWrong('您输入的微信不合法');
        //         }
        //     }
        //     if(!empty($weixin)){
        //         if (Member::where('weixin', $weixin)->first()){
        //             return responseWrong('该微信已存在！');
        //         }

        //     }
        // }
        
        
        if($request->session()->get('daili_id')){
            $top_id = $request->session()->get('daili_id');
        }else{
            $top_id = $dali_mod?$dali_mod->id:0;
        }
        Member::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
            'original_password' => substr(md5(md5($data['name'])), 0,10),
            'o_password' => $data['password'],
            'invite_code' => getRandom(7),
            'real_name' => $data['username'],
            'qk_pwd' => $data['qk_pwd'],
            'top_id' => $top_id,
            'register_ip' => $request->getClientIp(),
            'phone' => $request->get('phone'),
            'email' => $email,
            'qq' => $qq,
            'weixin' => $weixin,
            'register_url'=>$_SERVER['HTTP_HOST'],
            'username'=>$data['username']
        ]);

        if (Auth::guard('member')->attempt(['name' => $request->name, 'password' => $request->password]))
        {
            $member = auth('member')->user();
            $member->last_session = Session::getId();
            $member->save();
            $member->update([
                'last_login_ip'=>$request->getClientIp(),
                'last_login_at' => date('Y-m-d H:i:s')
            ]);
            MemberLoginLog::create([
                'member_id' => $member->id,
                'ip' => $request->getClientIp()
            ]);
            // if(@$dali_mod->id){
            //     //下载APP
            //     return responseSuccess('', '注册成功', config('app.download_url'));
            // }
            return responseSuccess('', '登录成功', route('wap.index'));
        }
        // if(@$dali_mod->id){
        //     //下载APP
        //     return responseSuccess('', '登录成功', config('app.download_url'));
        // }
        return responseSuccess('','注册成功', route('wap.login'));
    }

    //个人中心
    public function userinfo(Request $request)
    {
        $setting = Db::table('system_config')->first();
        // $this->refresh_ml();
        $member = $this -> getMember();
    
        
        $api_mod= Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.userinfo';
        }else{
            $view = 'wap.template.'.$mb_path.'.userinfo';
        }
        // $betAmount = Db::table('game_record')->where('member_id',$member['id'])->where('betTime','>',date('Y-m-d'))->sum('betAmount');
        // $winAmount = Db::table('game_record')->where('member_id',$member['id'])->where('betTime','>',date('Y-m-d'))->sum('fs_money');
        $betAmount = 0;
        $winAmount = 0;
        $mod = new Activity();
        $data = $mod -> where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();

        $user = $member;
        //dump($user->name);
        $total = [
            'game_str' => '',
            'fs_money' => 0
        ];
        $game_types = config('platform.game_type');
        $fs_level = FsLevel::orderBy('level','desc')->where('id','>',0)->first();
        if($fs_level){
            foreach ($game_types as $k=>$v ){
                //if($k != 6) continue;
                $rows = GameRecord::where('gameType',$k)
                    ->where('member_id',$user->id)
                    ->where('isfs','=',0)
                    ->where('flag',1)
                    ->take(10000)
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
        }
        // echo $winAmount;die;
        return view($view, compact('api_mod','betAmount','winAmount','setting','data','total'));
    }

    //代理
    public function agent(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.agent';
        }else{
            $view = 'wap.template.'.$mb_path.'.agent';
        }
        $setting = Db::table('system_config')->first();
        return view($view, compact('setting'));
    }

    //代理申请页面
    public function agent_apply(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.agent_apply';
        }else{
            $view = 'wap.template.'.$mb_path.'.agent_apply';
        }
        return view($view);
    }

    public function post_agent_apply(Request $request)
    {
        // $validator = $this->verify($request, 'wap.post_agent_apply');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }
        $data = $request->all();
        $member = $this->getMember();
        MemberDailiApply::create([
            'member_id' => $member->id,
            'phone' => $data['phone'],
            'msn_qq' => $data['qq'],
            'about' => $data['about']
        ]);

        return responseSuccess('','提交成功', route('wap.agent'));
    }

    public function bind_bank(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.bind_bank';
        }else{
            $view = 'wap.template.'.$mb_path.'.bind_bank';
        }
        return view($view);
    }

    public function post_bind_bank(Request $request)
    {
        $sys = SystemConfig::find(1);
        if ($sys->is_sms_on == 0)
        {
            if (!$request->has('v_code'))
                return responseWrong('请输入 手机验证码');

            if (session('phone_v_code') != $request->get('v_code'))
                return responseWrong('验证码错误 '.session('phone_v_code'));
        }

        $validator = $this->verify($request, 'wap.update_bank_info');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->all();
        $member = $this->getMember();

        $member->update($data);

        return responseSuccess('', '绑定成功', route('wap.drawing'));
    }

    public function set_phone(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.set_phone';
        }else{
            $view = 'wap.template.'.$mb_path.'.set_phone';
        }
        return view($view);
    }

    public function post_set_phone(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_set_phone');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->all();
        $member = $this->getMember();

        $member->update([
            'phone' => $data['phone']
        ]);

        return responseSuccess('', '设置成功', route('wap.index'));
    }

    public function drawing(Request $request)
    {
        $this->refresh_ml();
        // if (!$this->getMember()->bank_card){
        //     return redirect()->to(route('wap.bind_bank'));
        // }
        $member = $this->getMember();
        if(!$member->card && !$member->trc20 && !$member->fps && !$member->erc20){
            header('Location:/m/bank');die;
        }
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.drawing';
        }else{
            $view = 'wap.template.'.$mb_path.'.drawing';
        }
        $setting = Db::table('system_config')->first();
        $api_list = Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        return view($view, compact('setting','member','api_list'));
    }

  public function post_drawing_(Request $request)
    {
        $member = $this->getMember();
        $data = $request->all();
        
        $my_system_config = SystemConfig::findOrFail(1);
        $sys = SystemConfig::find(1);
        $times = Drawing::where('member_id',$member->id)
            ->where('created_at', '>=', date('Y-m-d 00:00:00'))
            ->where('created_at', '<=', date('Y-m-d 23:59:59'))
            ->where('status',2)
            ->count();

        if ($times >= $sys->transfer_times){
            return responseWrong(trans('lang.mtzdtk') . $sys->transfer_times . trans('lang.ci'));
        }
        if($member->ml_money != 0 && !isset($data['type'])) {
            return responseWrong(trans('lang.dmlbz'));
        }
            
            $all_money = $member->money;
            if ($data['qk_pwd'] != $member->qk_pwd) {
                 return responseWrong('取款密码不正确');
            }
            if ($data['money'] > $all_money) {
                return responseWrong(trans('lang.tkjedyye'));
            }
            $system = Db::table('system_config')->select('withdraw_min','withdraw_max')->first();
            
                
            if($data['money'] < $system->withdraw_min) {
                return responseWrong(trans('lang.jebxdy').$system->withdraw_min);
            }  
            if($data['money'] > $system->withdraw_max) {
                return responseWrong(trans('lang.withdraw_max').$system->withdraw_max);
            }
            /*if ($data['qk_pwd'] != $member->qk_pwd) {
                return responseWrong('取款密码不正确');
            }*/
            if(isset($data['type'])){
                $m = Member::where('id', $this->getMember()->id)->first();  
          
                switch($data['type']){
                    case 1:
                        $m->fps = $data['account'];
                        break;
                    case 3:
                        $m->trc20 = $data['account'];
                        break;
                    case 4:
                        $m->erc20 = $data['account'];
                        break;
                    case 5:
                        $m->card = $data['account'];
                        $m->bank = $data['bank_name'];
                        $data['bank_card'] = $data['account'];
                        $data['bank_name'] = data['bank_name'];
                        $data['bank_branch_name'] = $data['type'];
                        break;
                }
                
                $m->username=$data['name'];
                $m->save();
            }
            
            try{
                DB::transaction(function() use($data, $member) {
                    if($data['bank_name']==1){
                        $data['name'] = '轉數快';
                    }elseif($data['bank_name']==3){
                        $data['name'] = 'ERC20';
                    }elseif($data['bank_name']==4){
                        $data['name'] = 'TRC20';
                    }
                    Drawing::create([
                        'bill_no' => getBillNo(),
                        'member_id' => $member->id,
                        'name' => $data['name'],
                        'money' => $data['money'],
                        'account' => $data['account'],
                        'bank_name' => $data['bank_name'] ? $data['bank_name'] : '' ,
                        'bank_card' => $data['bank_card'] ? $data['bank_card'] : '' ,
                        'bank_address' => @$data['bank_branch_name']
                    ]);

                    $member->decrement('money', $data['money']);

                });
            }catch(\Exception $e){
                DB::rollback();
                return responseWrong($e);
                // dd($e);die;
            }

            return responseSuccess('提交成功','提交成功', route('wap.drawing_record'));
        // }


    }

  public function post_drawing(Request $request)
    {
        $data = $request->all();
        $member = $this->getMember();
        $sys = SystemConfig::find(1);
        
        $times = Drawing::where('member_id',$member->id)
            ->where('created_at', '>=', date('Y-m-d 00:00:00'))
            ->where('created_at', '<=', date('Y-m-d 23:59:59'))
            ->where('status',2)
            ->count();

        if ($times >= $sys->transfer_times){
            return responseWrong(trans('lang.mtzdtk') . $sys->transfer_times . trans('lang.ci'));
        }
        if($member->ml_money > 0) {
            return responseWrong(trans('lang.dmlbz'));
        }
            $all_money = $member->money;


            if ($data['money'] > $all_money) {
                return responseWrong(trans('lang.tkjedyye'));
            }
                if(strcmp($data['qk_pwd'],$member->qk_pwd) != 0) {
                    return responseWrong(trans('lang.qkmmbzq'));
                }
            if($data['money'] < $sys->withdraw_min) {
                return responseWrong(trans('lang.jebxdy').$sys->withdraw_min);
            }  
            if($data['money'] > $sys->recharge_max) {
                return responseWrong(trans('lang.jebxxy').$sys->withdraw_max);
            }
            
            if(isset($data['type'])){
                $m = Member::where('id', $this->getMember()->id)->first(); 
                switch($data['type']){
                    case 1:
                        $m->fps = $data['account'];
                        break;
                    case 3:
                        $m->trc20 = $data['account'];
                        break;
                    case 4:
                        $m->erc20 = $data['account'];
                        break;
                    case 5:
                        $m->card = $data['account'];
                        $m->bank = $data['bank_name'];
                        $data['bank_card'] = $data['account'];
                        $data['bank_name'] = data['bank_name'];
                        $data['bank_branch_name'] = $data['type'];
                        break;
                }
                
                $m->username=$data['name'];
                $m->save();
               
            }
            
            try{
                DB::transaction(function() use($data, $member) {
                    // if($data['bank_name']==1){
                    //     $data['name'] = '轉數快';
                    // }elseif($data['bank_name']==3){
                    //     $data['name'] = 'ERC20';
                    // }elseif($data['bank_name']==4){
                    //     $data['name'] = 'TRC20';
                    // }elseif($data['bank_name']==2){
                    //     $data['name'] = '银行卡';
                    // }
                    if($data['bank_name']==1){
                            $data['bank_name'] = '轉數快';
                            $data['bank_card'] = $member->fps;
                        }elseif($data['bank_name']==3){
                            $data['bank_name'] = 'ERC20';
                            $data['bank_card'] = $member->erc20;
                        }elseif($data['bank_name']==2){
                            $data['bank_name'] = $member->bank;
                            $data['bank_card'] = $member->card;
                        }elseif($data['bank_name']==4){
                            $data['bank_name'] = 'TRC20';
                            $data['bank_card'] = $member->trc20;
                        }
                    Drawing::create([
                        'bill_no' => getBillNo(),
                        'member_id' => $member->id,
                        // 'name' => $data['name'],
                        'money' => $data['money'],
                        'before_money'=>$member->money,
                        'after_money'=>$member->money-$data['money'],
                        // 'account' => $data['account'] ? $data['account'] : '',
                        'bank_name' => $data['bank_name'] ? $data['bank_name'] : '',
                        'bank_card' => isset($data['bank_card']) ? $data['bank_card'] : $data['account'],
                        'bank_address' => ''
                    ]);
                    $member->decrement('money', $data['money']);

                });
            }catch(\Exception $e){
                DB::rollback();
                return responseWrong($e->getMessage());
                // dd($e);die;
            }

            return responseSuccess('操作成功',trans('lang.tjcg'), route('wap.drawing_record'));
        // }




    }

    public function recharge(Request $request)
    {
        $setting = Db::table('system_config')->first();
        $this->refresh_ml();
        $mb_path = $this->getPath($request);
        $bank_card_list = BankCard::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        if(empty($mb_path)){
            $view = 'wap.recharge';
        }else{
            $view = 'wap.template.'.$mb_path.'.recharge';
        }
        return view($view,compact('bank_card_list','setting'));
    }

    public function weixin_pay(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.weixin_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.weixin_pay';
        }
        return view($view);
    }

    public function post_weixin_pay(Request $request)
    {
        // $validator = $this->verify($request, 'wap.post_weixin_pay');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }

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
            'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s']
        ]);

        return responseSuccess('', '', route('wap.recharge_record'));
    }

    public function ali_pay(Request $request)
    {
        $setting = Db::table('system_config')->select('alipay_qrcode')->first();
        $xiaoshu = rand(10,40);
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.ali_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.ali_pay';
        }
        return view($view, compact('setting','xiaoshu'));
    }

    public function third_bank_pay(Request $request)
    {
        $setting = Db::table('system_config')->first();
        // $xiaoshu = rand(10,40);
        $xiaoshu = 0;
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.third_bank_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.third_bank_pay';
        }
        return view($view, compact('setting','xiaoshu'));
    }

    public function third_pay_app()
    {
        return view('wap.third_pay_app');
    }

    public function qq_pay(Request $request)
    {   
        $setting = Db::table('system_config')->first();
        // $xiaoshu = rand(10,40);
        $xiaoshu = rand(10,40);
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.qq_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.qq_pay';
        }
        return view($view, compact('setting','xiaoshu'));
    }

    public function third_pay_scan()
    {
        return view('wap.third_pay_scan');
    }

    public function post_ali_pay(Request $request)
    {
        // $validator = $this->verify($request, 'wap.post_ali_pay');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }

        $data = $request->all();
        $member = $this->getMember();
        $system = Db::table('system_config')->select('recharge_min')->first();
        if($data['money'] < $system->recharge_min) {
            return responseWrong(trans('lang.tkjl').$system->recharge_min);
        }
        if (Db::table('recharge')->where('member_id', $member->id)->where('status', 1)->count()) {
            return responseWrong('您尚有存款未批准，請等待批准');
        }
        // if(!$data['account']) {
        //     return responseWrong(trans('lang.qsrfkrxm'));
        // }
        // if(!$data['img']){
        //     return responseWrong(trans('lang.qsrfkrxm'));
        // }
        // if($this->checkRecharge()){
        //     return responseWrong(trans('lang.qscjt'));
        // }
        if($data['xiaoshu'] < 10){
            return responseWrong('禁止修改小数点');
        }
        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $data['money'].'.'.$data['xiaoshu'],
            'payment_type' => 1,
            'account' => '',
            'status' => 1,
            // 'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s'],
            'img'=>'',
            'fanli' => $data['fanli']
        ]);

        return responseSuccess('', '', route('wap.recharge_record'));
    }

    public function post_qq_pay(Request $request)
    {
        
        
        // $validator = $this->verify($request, 'wap.post_qq_pay');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }

        $data = $request->all();
        $member = $this->getMember();
        $system = Db::table('system_config')->select('recharge_min','recharge_max')->first();
        if($data['money'] < $system->recharge_min) {
            return responseWrong(trans('lang.jebxdy').$system->recharge_min);
        }
        if($data['money'] > $system->recharge_max) {
            return responseWrong(trans('lang.jebxxy').$system->recharge_max);
        }
        if (Db::table('recharge')->where('member_id', $member->id)->where('status', 1)->count()) {
            return responseWrong(trans('lang.qddpz'));
        }
        if(!$member->is_new2 && $data['fanli']==3){
            return responseWrong('一個帳號只能申請一次此福利');
        }
        if(!$member->is_new && $data['fanli']==2){
            return responseWrong('每天只能申請一次此福利');
        }
        // if(!$data['account']) {
        //     return responseWrong(trans('lang.qsrfkrxm'));
        // }
        // if(!$data['img']) {
        //     return responseWrong(trans('lang.qscjt'));
        // }
        // if($this->checkRecharge()){
        //     return responseWrong(trans('lang.ckts'));
        // }
        if($data['xiaoshu'] < 10){
            return responseWrong('禁止修改小数点');
        }
         $pay_type =  $request->get('paytype',2);
         $account  =  $request->get('account','');
        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $data['money'].'.'.$data['xiaoshu'],
            'payment_type' =>$pay_type,
            'account' => $account,
            'status' => 1,
            // 'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s'],
            'img'=>'',
            'fanli' => $data['fanli']
        ]);

        return responseSuccess('', trans('lang.tjcg'), route('wap.recharge_record'));
    }

    public function bank_pay(Request $request)
    {
        $type = 1;  ///1充值 2体现
		$xiaoshu = rand(10,40);
		$member = $this -> getMember();
		$setting = Db::table('system_config')->first();
    	$banks= BankCard::where('on_line', 0)->orderBy('id', 'asc')->get();
        foreach($banks as &$vo){
           $vo->bank_name = Base::$BANK_TYPE[$vo->bank_id];
        }
        if($member->ml_money <0){
            Db::table('member')->where('id',$member->id)->update(['ml_money'=>0]);
        }
        
        
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.bank_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.bank_pay';
        }
        return view($view, compact('banks','setting','xiaoshu','type'));
    }

    public function post_bank_pay(Request $request)
    {
        // $validator = $this->verify($request, 'wap.post_bank_pay');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }

        $data = $request->all();
        $member = $this->getMember();

        if($this->checkRecharge()){
            return responseWrong(trans('lang.tkjl'));
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

        return responseSuccess('', '', route('wap.recharge_record'));
    }

    public function reset_password(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.reset_password';
        }else{
            $view = 'wap.template.'.$mb_path.'.reset_password';
        }
        $member = $this->getMember();
        $setting = Db::table('system_config')->first();
        return view($view, compact('setting','member'));
    }
    public function reset_password2(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.reset_password2';
        }else{
            $view = 'wap.template.'.$mb_path.'.reset_password2';
        }
        $member = $this->getMember();
        $setting = Db::table('system_config')->first();
        return view($view, compact('setting','member'));
    }
    public function reset_login_password(Request $request)
    {
        // $validator = $this->verify($request, 'wap.update_login_password');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }

        $data = $request->all();
        $member = $this->getMember();
        
        // $my_system_config = SystemConfig::findOrFail(1);
        // if($my_system_config->sms_message){
        //     if(!$request->get('code')){
        //         return responseWrong('请输入验证码');
        //     }
        //     $ldata = Db::table('sms')->where('status',0)->where('phone',$member->phone)->where('code',$request->get('code'))->orderBy('time','desc')->first();
        //     if(!$ldata){
        //         return responseWrong(trans("lang.yzmcw"));
        //     }elseif($ldata->time <= time()-600){
        //         return responseWrong(trans("lang.yzmygq"));
        //     }
        //     if (!Hash::check($data['old_password'], $member->password))
        //     {
        //         return responseWrong(trans('lang.ymmcw'));
        //     }
        // }
       if (!Hash::check($data['old_password'], $member->password))
        {
             return responseWrong(trans('lang.ymmcw'));
        }
        if (!$data['password'])
        {
            return responseWrong(trans('lang.qsr').trans('lang.xmm'));
        }
        $member->update([
            'password' => bcrypt($data['password']),
            'o_password' => $data['password'],
            //'original_password' => $data['password']
        ]);

        return responseSuccess('', trans('lang.tjcg'));
    }

    public function reset_qk_password(Request $request)
    {
        // $validator = $this->verify($request, 'wap.update_qk_password');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }

        $data = $request->all();
        $member = $this->getMember();
        
        // $my_system_config = SystemConfig::findOrFail(1);
        // if($my_system_config->sms_message){
        //     if(!$request->get('code')){
        //         return responseWrong('请输入验证码');
        //     }
        //     $ldata = Db::table('sms')->where('status',0)->where('phone',$member->phone)->where('code',$request->get('code'))->orderBy('time','desc')->first();
        //     if(!$ldata){
        //         return responseWrong(trans("lang.yzmcw"));
        //     }elseif($ldata->time <= time()-600){
        //         return responseWrong(trans("lang.yzmygq"));
        //     }
    
        //     if ($member->qk_pwd != $data['old_password'])
        //     {
        //         return responseWrong(trans('lang.ymmcw'));
        //     }
        // }

       if ($member->qk_pwd != $data['old_password'])
         {
             return responseWrong(trans('lang.ymmcw'));
         }
        if (!$data['password'])
        {
            return responseWrong(trans('lang.qsr').trans('lang.xmm'));
        }
        $member->update([
            'qk_pwd' => $data['password']
        ]);

        return responseSuccess('', trans('lang.tjcg'));
    }

    public function transfer(Request $request)
    {
        $api_list = Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();

        /*return view('wap.transfer', compact('api_list'));*/
        $member = $this->getMember();
        $setting = Db::table('system_config')->first();
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.transfer';
        }else{
            $view = 'wap.template.'.$mb_path.'.transfer';
        }
        $api_money = Db::table('member_api')->where('member_id',$member->id)->sum('money');
        return view($view, compact('api_list','setting','member','api_money'));
    }

    public function post_transfer(Request $request)
    {
        // $validator = $this->verify($request, 'wap.post_transfer');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }

        $member = $this->getMember();
        
        $in_account = $request->get('in_account');
        $out_account = $request->get('out_account');
        $money = $request->get('money');

        $o = new ApiClientController();

        if ($in_account == $out_account || ($in_account> 2 && $out_account > 2))
        {
            return responseWrong('不支持该种类型转换，请重新选择');
        }

        
        if ($out_account == 1)//从中心账户转出
        {
            if ($member->money < $money)
                return responseWrong('账户余额不足');
            $res = $o->deposit($in_account, $member->name, $member->original_password, $money, 'money');
            if ($res['Code'] != 0)
                return responseWrong('失败！错误'.$res['Message'].' 请联系客服解决');
        } elseif ($in_account == 1){// 转入中心账户

            $api = Api::findOrFail($out_account);
            $res = $o->withdrawal($api->api_name, $member->name, $member->original_password, $money, 'money');
            if ($res['Code'] != 0)
                return responseWrong($res['Message']);
        }

        return responseSuccess('', '转换成功', route('wap.transfer'));
    }

    public function drawing_record(Request $request)
    {
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        
        $data = Drawing::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        $setting = Db::table('system_config')->first();
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.drawing_record';
        }else{
            $view = 'wap.template.'.$mb_path.'.drawing_record';
        }
        $total = Drawing::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->where('status','=',2)->sum('money');
        return view($view, compact('data','setting','day','total'));
    }

    public function game_record(Request $request)
    {
        $api_type = '';
        $mod = new GameRecord();
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        $mod = $mod -> where('betTime','>=',$time);
        $data = $mod->where('member_id', $this->getMember()->id)->orderBy('betTime', 'desc')->paginate(config('web.page-size'));
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.game_record';
        }else{
            $view = 'wap.template.'.$mb_path.'.game_record';
        }
       $api_list = Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        return view($view, compact('data', 'api_type','st','et','day','api_list'));
    }
    
      public function game_record_api(Request $request)
    {
        $api_type = '';
        $mod = new GameRecord();
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $day -= 1;
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        $mod = $mod -> where('betTime','>=',$time);
        if($_GET['gameCode']){
            $mod->where('api_type',$request->get('gameCode'));
        }
        $total = $mod->where('member_id', $this->getMember()->id)->sum('validBetAmount');
        $total = abs($total);
        $sunyi = $mod->where('member_id', $this->getMember()->id)->sum('netAmount');
        $sunyi = round($sunyi,2);
        
        
        $data = $mod->where('member_id', $this->getMember()->id)->orderBy('betTime', 'desc')->paginate(config('web.page-size'));
        
        if($data){
            foreach ($data as &$v){
                $apiname = Db::table('api')->where('id',$v->api_type)->first();
                // dump($apiname);die;
                $v->api_type = @$apiname->api_title;
            }
        }
        return responseSuccess(['data'=>$data,'api_type'=>$api_type,'day'=>$day,'total'=>$total,'income'=>$sunyi]);
    }

    public function recharge_record(Request $request)
    {
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        $data = Recharge::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->orderBy('created_at', 'desc')->paginate(10);
        $setting = Db::table('system_config')->first();
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.recharge_record';
        }else{
            $view = 'wap.template.'.$mb_path.'.recharge_record';
        }
        $total = Recharge::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->where('status','=',2)->sum('money');
        return view($view, compact('data','setting','day','total'));
    }
    
    public function user_fsjl(Request $request)
    {
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        $data = Dividend::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.user_fsjl';
        }else{
            $view = 'wap.template.'.$mb_path.'.user_fsjl';
        }
        return view($view, compact('data','day'));
    }

    public function transfer_record(Request $request)
    {
        $cn_begin = $cn_end = date('Y-m-d');

        $s_begin_h = $request->get('s_begin_h')?:'00';
        $s_begin_i = $request->get('s_begin_i')?:'00';

        $s_end_h  = $request->get('s_end_h')?:'23';

        $s_end_i = $request->get('s_end_i')?:'59';

        $mod = new Transfer();
        if ($cn_begin)
        {
            $cn_begin = $request->get('cn_begin',date('Y-m-d'));
            $mod = $mod->where('created_at', '>=', $cn_begin." ".$s_begin_h.":".$s_begin_i.":00");
        }

        if ($cn_end)
        {
            $cn_end = $request->get('cn_end',date('Y-m-d'));
            $mod = $mod->where('created_at', '<=', $cn_end." ".$s_end_h.":".$s_end_i.":00");
        }
        
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        // $mod = $mod->where('created_at', '>=', $time);
        

        $data = Db::table('transfers')->where('member_id', $this->getMember()->id)->where('created_at', '>=', $time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        // dd($data);die;
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.transfer_record';
        }else{
            $view = 'wap.template.'.$mb_path.'.transfer_record';
        }

        return view($view, compact('data', 'cn_begin', 'cn_end', 's_begin_h', 's_begin_i', 's_end_h', 's_end_i','day'));
    }

    public function daili_money_log(Request $request)
    {
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        
        
        $data = DailiMoneyLog::where('member_id', $this->getMember()->id)->where('created_at', '>=', $time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.daili_money_log';
        }else{
            $view = 'wap.template.'.$mb_path.'.daili_money_log';
        }
        return view($view, compact('data','day'));
    }

    public function member_offline(Request $request)
    {
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        
        $data = Member::where('top_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.member_offline';
        }else{
            $view = 'wap.template.'.$mb_path.'.member_offline';
        }
        return view($view, compact('data','day'));
    }

    public function member_offline_recharge(Request $request)
    {
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        
        $mod = new Recharge();
        $name = '';
        $cn_begin =  date('Y-m-d');

        $cn_end = date('Y-m-d');

        if ($request->has('cn_begin'))
        {
            $cn_begin = $request->get('cn_begin');
            $mod = $mod->where('created_at', '>=', "$cn_begin");
        }

        if ($request->has('cn_end'))
        {
            $cn_end = $request->get('cn_end');
            $mod = $mod->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($cn_end)));
        }
        $mod = $mod->where('created_at', '>=', $time);
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $m_list = Member::where('top_id', $this->getMember()->id)->where('name', 'LIKE', "%$name%")->pluck('id');
        } else {
            $m_list = Member::where('top_id', $this->getMember()->id)->pluck('id');
        }

        $mod = $mod->whereIn('member_id', $m_list);

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.member_offline_recharge';
        }else{
            $view = 'wap.template.'.$mb_path.'.member_offline_recharge';
        }

        return view($view ,compact('data', 'name', 'cn_begin', 'cn_end','day'));
    }

    public function member_offline_drawing(Request $request)
    {
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        
        
        $mod = new Drawing();
        $name = '';
        $cn_begin =  date('Y-m-d');

        $cn_end = date('Y-m-d');

        if ($request->has('cn_begin'))
        {
            $cn_begin = $request->get('cn_begin');
            $mod = $mod->where('created_at', '>=', "$cn_begin");
        }

        if ($request->has('cn_end'))
        {
            $cn_end = $request->get('cn_end');
            $mod = $mod->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($cn_end)));
        }
        $mod = $mod->where('created_at', '>=', $time);
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $m_list = Member::where('top_id', $this->getMember()->id)->where('name', 'LIKE', "%$name%")->pluck('id');
        } else {
            $m_list = Member::where('top_id', $this->getMember()->id)->pluck('id');
        }

        $mod = $mod->whereIn('member_id', $m_list);

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.member_offline_drawing';
        }else{
            $view = 'wap.template.'.$mb_path.'.member_offline_drawing';
        }

        return view($view ,compact('data', 'name', 'cn_begin', 'cn_end','day'));
    }


    public function member_offline_sy(Request $request)
    {
        
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        
        $cn_begin =  '';

        $cn_end = '';
        // $cn_begin =  date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);

        // $cn_end = date('Y-m-d',strtotime(date('Y-m-d'))+86400);

        $m_list = Member::where('top_id', $this->getMember()->id)->pluck('id');
        $member = $this->getMember();
        $m_list[] = $member->id;
        $recharge_mod = new Recharge();
        $drawing_mod = new Drawing();
        $dividend_mod = new Dividend();

        if ($request->has('cn_begin'))
        {
            $cn_begin = $request->get('cn_begin');
            $recharge_mod = $recharge_mod->where('created_at', '>=', $cn_begin);
            $drawing_mod = $drawing_mod->where('created_at', '>=', $cn_begin);
            $dividend_mod = $dividend_mod->where('created_at', '>=', $cn_begin);
        }

        if ($request->has('cn_end'))
        {
            $cn_end = $request->get('cn_end');
            $recharge_mod = $recharge_mod->where('created_at', '<=', date('Y-m-d', strtotime($cn_end)));
            $drawing_mod = $drawing_mod->where('created_at', '<=', date('Y-m-d', strtotime($cn_end)));
            $dividend_mod = $dividend_mod->where('created_at', '<=', date('Y-m-d', strtotime($cn_end)));
        }

        $total_recharge = $recharge_mod->where('status', 2)->whereIn('member_id', $m_list)->sum('money');
        $recharge_count = $recharge_mod->where('status', 2)->whereIn('member_id', $m_list)->count();

        $total_drawing = $drawing_mod->where('status', 2)->whereIn('member_id', $m_list)->sum('money');
        $drawing_count = $drawing_mod->where('status', 2)->whereIn('member_id', $m_list)->count();

        // $dividend_mod = $dividend_mod->whereIn('type',[1,2,3]);
        $total_dividend = $dividend_mod->whereIn('member_id', $m_list)->sum('money');
        $dividend_count = $dividend_mod->whereIn('member_id', $m_list)->count();


        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.member_offline_sy';
        }else{
            $view = 'wap.template.'.$mb_path.'.member_offline_sy';
        }

        return view($view, compact('cn_begin', 'cn_end', 'total_recharge', 'recharge_count', 'total_drawing', 'drawing_count', 'total_dividend', 'dividend_count','day'));
    }


    /**
     * 增加我的消息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function msg(Request $request)
    {
        $member = $this->getMember();
        $data = SystemNotice::orderBy('sort', 'asc')->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.msg';
        }else{
            $view = 'wap.template.'.$mb_path.'.msg';
        }
        return view($view,compact('data'));
    }
    public function red()
    {
        $res = SystemConfig::findOrfail(1);
        if($res->is_hongbao == 1) {
            $red = Red::where('on_line',0)->orderBy('sort','asc')->get();
            return view('wap.red',compact('red'));
        }
    }

    public function my_activity(Request $request)
    {
        $member = $this->getMember();
        $data = ActivityApply::where('member_id', $member->id)->orderBy('status', 'asc')->get();

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.my_activity';
        }else{
            $view = 'wap.template.'.$mb_path.'.my_activity';
        }
        return view($view, compact('data'));
    }
    public function refresh_ml()
    {
        // $start_date = '2019-11-12 00:00:00';
        // $member = $this->getMember();
        // $game_record = GameRecord::where('member_id', $member->id)
        //     // ->where('created_at', '>=', $start_date)
        //     ->where('validBetAmount', '<>', 0)
        //     ->where('is_mluse', '0');
        // $oldmaliang = $member->ml_money;
        // $total_ml = $game_record->sum('validBetAmount');
        // $update_ml = $member->ml_money - $total_ml;
        // $update_ml = $update_ml >= 0 ? $update_ml : 0;
        // if($total_ml){
        //     MemberMlLog::addLog( $member->id,-$total_ml,$oldmaliang,1);
        // }
        // try {
        //     DB::transaction(function () use($member, $update_ml, $game_record) {
        //         $member->update(['ml_money' => $update_ml]);
        //         $game_record->update(['is_mluse' => 1]);
        //     });
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return responseWrong('码量刷新失败');
        // }
    }
    public function refresh_ml2()
    {
        // $start_date = '2019-11-12 00:00:00';
        // $member = $this->getMember();
        // $game_record = GameRecord::where('member_id', $member->id)
        //     // ->where('created_at', '>=', $start_date)
        //     ->where('validBetAmount', '<>', 0)
        //     ->where('is_mluse', '0');
        // $oldmaliang = $member->ml_money;
        // $total_ml = $game_record->sum('validBetAmount');
        // $update_ml = $member->ml_money - $total_ml;
        // $update_ml = $update_ml >= 0 ? $update_ml : 0;
        // if($total_ml){
        //     MemberMlLog::addLog( $member->id,-$total_ml,$oldmaliang,1);
        // }
        // try {
        //     DB::transaction(function () use($member, $update_ml, $game_record) {
        //         $member->update(['ml_money' => $update_ml]);
        //         $game_record->update(['is_mluse' => 1]);
        //     });
        //     $member = $this->getMember();
        //     return responseSuccess(['ml_money'=>$member->ml_money]);
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return responseWrong('码量刷新失败');
        // }
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
    
    public function qrcode()
    {
        $member = $this->getMember();
        // if($member['agent_img']){
        //     echo $member['agent_img'];die;
        // }
        $url = config('app.qrcode_url').'?i='.$member['invite_code'];
        require_once('./phpqrcode/' . 'phpqrcode.php');
        $object = new \QRcode();
        $level=3;
        $size=6;
        $errorCorrectionLevel =intval($level) ;//容错级别
        $matrixPointSize = intval($size);//生成图片大小
        $filename = "./uploads/qrcode/".$member['id'].".png";
        $src = "/uploads/qrcode/".$member['id'].".png";
        $object->png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
        if($src){
            $membeQrcode = $member['id'].time().rand(100,999);
            // Db::table('members')->where('id',$member['id'])->update(['agent_img'=>$src]);
            $src = $this->picMerge('./haibao.png',$filename,0,0,0,0,100,"./uploads/qrcode/qrcode".$membeQrcode.".png");
            if($src){
                $src = "/uploads/qrcode/qrcode".$membeQrcode.".png";
                Db::table('members')->where('id',$member['id'])->update(['agent_img'=>$src]);
                echo $src;
            }
            
        }
    }
    public function picMerge($dstPath,$srcPath,$dstX=0,$dstY=0,$srcX=0,$srcY=0,$pct=100,$filename='')
    {
        //创建图片的实例
        $dst = imagecreatefromstring(file_get_contents($dstPath));
        $src = imagecreatefromstring(file_get_contents($srcPath));
        //获取水印图片的宽高
        list($src_w, $src_h) = getimagesize($srcPath);
        //将水印图片复制到目标图片上，最后个参数50是设置透明度，这里实现半透明效果
        // $res = imagecopymerge($dst, $src, 165, 225, 0, 0, $src_w, $src_h, 100);
        //如果水印图片本身带透明色，则使用imagecopy方法
        imagecopy($dst, $src, 195, 565, 0, 0, $src_w, $src_h);
        //输出图片
        list($dst_w, $dst_h, $dst_type) = getimagesize($dstPath);
        switch ($dst_type) {
            case 1://GIF
                if(!$filename){
                    header('Content-Type: image/gif');
                    imagegif($dst);
                }else{
                    imagegif($dst,$filename);
                }
                break;
            case 2://JPG
                if(!$filename){
                    header('Content-Type: image/jpeg');
                    imagejpeg($dst);
                }else{
                    imagejpeg($dst,$filename);
                }
                break;
            case 3://PNG
                if(!$filename){
                    header('Content-Type: image/png');
                    imagepng($dst);
                }else{
                    imagepng($dst,$filename);
                }
                break;
            default:
                break;
        }
        imagedestroy($dst);
        imagedestroy($src);
        return $filename;
    }
    
    public function addFontToPic($dstPath,$fontPath,$fontSize,$text,$dstY,$filename='')
    {
        //创建图片的实例
        $dst = imagecreatefromstring(file_get_contents($dstPath));
        //打上文字
        $fontColor = imagecolorallocate($dst, 0x00, 0x00, 0x00);//字体颜色
        $width = imagesx ( $dst );
        $height = imagesy ( $dst );
        $fontBox = imagettfbbox($fontSize, 0, $fontPath, $text);//文字水平居中实质
        imagettftext ( $dst, $fontSize, 0, ceil(($width - $fontBox[2]) / 2), $dstY, $fontColor, $fontPath, $text);
        //输出图片
        list($dst_w, $dst_h, $dst_type) = getimagesize($dstPath);
        switch ($dst_type) {
            case 1://GIF
                if(!$filename){
                    header('Content-Type: image/gif');
                    imagegif($dst);
                }else{
                    imagegif($dst,$filename);
                }
                break;
            case 2://JPG
                if(!$filename){
                    header('Content-Type: image/jpeg');
                    imagejpeg($dst);
                }else{
                    imagejpeg($dst,$filename);
                }
                break;
            case 3://PNG
                if(!$filename){
                    header('Content-Type: image/png');
                    imagepng($dst);
                }else{
                    imagepng($dst,$filename);
                }
                break;
            default:
                break;
        }
        imagedestroy($dst);
        return $filename;
    }
    public function msgcode(Request $request){
        $member = $this->getMember();
        $phone = $request->get('phone');
        if(!$member->phone && !$phone){
            return responseWrong(trans("lang.qxbdsj"));
        }
        if($member->phone){
            $phone = $member->phone;
        }
        //最近一条短信
        $msg = Db::table('sms')->where('phone',$phone)->orderBy('time','desc')->first();
        if(@$msg && @$msg->time >= time()-120){
            return responseWrong('2分钟内只可发送一条');
        }
        $total = Db::table('sms')->where('phone',$phone)->where('time','>',strtotime(date('Y-m-d')))->count();
        if($total >= 10){
            return responseWrong('超过每日短信次数，请明日再试！');
        }
        // $ip = Db::table('members')->where('register_ip',$request->getClientIp())->first();
        // if($ip){
        //     return responseWrong('系统错误，发送失败');
        // }
        $code = rand(1000,9999);
        Db::table('sms')->insert([
            'member_id'=>$member->id,
            'code'=>$code,
            'status'=>0,
            'phone'=>$phone,
            'time'=>time()
        ]);
        $phone = '852'.$phone;
        $url = 'http://api.sms.cn/sms/?ac=sendint&uid=lin123456&pwd=5bc3220e179b36d41f525b8fea9f3089&template&template=6000002&mobile='.$phone.'&content={"code":"'.$code.'"}';
        $res = file_get_contents($url);
        // dump($res);
        return responseSuccess('',trans("lang.fscg"),$phone);
    }
    public function rmsgcode(Request $request){
        $phone = $request->get('phone');
        $code = rand(1000,9999);
        //最近一条短信
        $msg = Db::table('sms')->where('phone',$phone)->orderBy('time','desc')->first();
        if(@$msg && @$msg->time >= time()-120){
            return responseWrong('2分钟内只可发送一条');
        }
        $total = Db::table('sms')->where('phone',$phone)->where('time','>',strtotime(date('Y-m-d')))->count();
        if($total >= 10){
            return responseWrong('超过每日短信次数，请明日再试！');
        }
        $ip = Db::table('members')->where('register_ip',$request->getClientIp())->first();
        if($ip){
            //return responseWrong('此ip已注册过账户');
        }
        Db::table('sms')->insert([
            'member_id'=>0,
            'code'=>$code,
            'status'=>0,
            'phone'=>$phone,
            'time'=>time()
        ]);
        $phone = '852'.$phone;
        $url = 'http://api.sms.cn/sms/?ac=sendint&uid=lin123456&pwd=5bc3220e179b36d41f525b8fea9f3089&template&template=6000002&mobile='.$phone.'&content={"code":"'.$code.'"}';
        $res = file_get_contents($url);
        // dump($res);
        return responseSuccess('',trans("lang.fscg"),$phone);
    }
    public function bindphone(){
        $member = $this->getMember();
        return view('wap.template.theme10.bindphone', compact('member'));
    }
    public function postbindphone(Request $request){
        $member = $this->getMember();
        $oldPhone = $member->phone;
        $phone = $request->get('phone');
        $code = $request->get('code');
        if($oldPhone){
            $data = Db::table('sms')->where('status',0)->where('member_id',$member->id)->where('phone',$oldPhone)->where('code',$code)->orderBy('time','desc')->first();
        }else{
            $data = Db::table('sms')->where('status',0)->where('member_id',$member->id)->where('phone',$phone)->where('code',$code)->orderBy('time','desc')->first();
        }
        
        if(!$data){
            return responseWrong(trans("lang.yzmcw"));
        }elseif($data->time <= time()-600){
            return responseWrong(trans("lang.yzmygq"));
        }
        if(Db::table('members')->where('phone',$phone)->first()){
            return responseWrong('手机号已存在');
        }
        //修改手机号
        Db::table('members')->where('id',$member->id)->update(['phone'=>$phone]);
        Db::table('sms')->where('id',$data->id)->update(['status'=>1]);
        return responseSuccess('',trans("lang.tjcg"));
    }
    public function app_login(){
        $url = urldecode($_GET['url']);
        $code = $_GET['code'];
        return view('wap.template.theme10.app_login', compact('url','code'));
    }
    public function service(){
        $member = $this->getMember();
        return view('wap.template.theme10.service', compact('member'));
    }
    public function membermoney(){
        $member = $this->getMember();
        if(!@$member->money){
            die;
        }
        $member->api_money = 0;
        $api_list = Api::where('on_line', '<>','1')->orderBy('created_at', 'desc')->get();
        if($api_list){
            foreach ($api_list as $k=>$v){
                $member_api = Db::table('member_api')->where('member_id',$member->id)->where('api_id', $v->id)->first();
                if($member_api){
                    // $member->money += $member_api->money;
                    if($v->api_name=="KY_HK"){
                        $member->api_money += $member_api->money / 2;
                    }else{
                        $member->api_money += $member_api->money;
                    }
                }
            }
        }
        $member->api_money = round($member->api_money,2);
        return $member;
    }
    public function zhuanpan(){
        $type = $this->is_mobile_request();
        $member = $this->getMember();
        
        $list = Db::table('reds')->where('on_line',0)->orderBy('index','asc')->get();
        $arr = [];
        foreach($list as $v){
            $arr[] = $v->name;
        }
        $logs = Db::table('dividend')->where('type',11)->leftJoin('members','dividend.member_id', '=', 'members.id')->orderBy('dividend.id','desc')->limit(10)->get();
        $logsArr = [];
        foreach($logs as $k => $v){
            $logsArr[$k]['name'] = mb_substr($v->name,0,2) . '****';
            $logsArr[$k]['describe'] = $v->describe;
        }
        return view('wap.template.theme10.zhuanpan', compact('member','arr','logsArr','type'));
    }
    public function is_mobile_request()
    {
      $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
     
      $mobile_browser = '0';
     
      if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))
     
        $mobile_browser++;
     
      if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))
     
        $mobile_browser++;
     
      if(isset($_SERVER['HTTP_X_WAP_PROFILE']))
     
        $mobile_browser++;
     
      if(isset($_SERVER['HTTP_PROFILE']))
     
        $mobile_browser++;
     
      $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
     
      $mobile_agents = array(
     
          'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
     
          'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
     
          'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
     
          'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
     
          'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
     
          'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
     
          'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
     
          'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
     
          'wapr','webc','winw','winw','xda','xda-'
     
      );
     
      if(in_array($mobile_ua, $mobile_agents))
     
        $mobile_browser++;
     
      if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)
     
        $mobile_browser++;
     
      // Pre-final check to reset everything if the user is on Windows
     
      if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)
     
        $mobile_browser=0;
     
      // But WP7 is also Windows, with a slightly different characteristic
     
      if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)
     
        $mobile_browser++;
     
     
     
      if($mobile_browser>0)
     
        return "mobile";
     
      else
     
        return "pc";
     
    }
    public function zhuan(){
        $member = $this->getMember();
        if($member['zhuanpan'] <=0){
            echo -1;die;
        }
        //查看奖品
        $rand = rand(0,100);
        $index = 6;
        $list = Db::table('reds')->where('on_line',0)->where('number','>',0)->orderBy('index','asc')->get();
        if(empty($list[0])){
            echo '-2';die;
        }
        $s_rand = 100;
        $i = 1;
        foreach ($list as $k=>$v){
            $s_rand -= $v->rate;
            if($rand>$s_rand){
                //下一级
                $index = $v->index;
                Db::table('reds')->where('index',$index)->increment('times', 1);
                Db::table('reds')->where('index',$index)->decrement('number', 1);
                Db::table('members')->where('id',$member->id)->decrement('zhuanpan', 1);
                //加钱
                Db::table('members')->where('id',$member->id)->increment('money', $v->money);
                $system = Db::table('system_config')->select('water','water_percent','hongli_ml_percent')->first();
                Db::table('members')->where('id',$member->id)->increment('ml_money', $v->money * $system->hongli_ml_percent);
                //生成记录
                            Db::table('dividend')->insert([
                                'user_id'=>0,
                                'member_id'=>$member->id,
                                'type'=>11,
                                'describe'=>'转盘:'.$v->name,
                                'money'=>$v->money,
                                'status'=>0,
                                'created_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s')
                            ]);
                // if($index==6){
                //     $index = 0;
                // }
                break;
            }
            $i ++;
        }
        
        echo $index;
        // return view('wap.template.theme10.zhuanpan', compact('member'));
    }
    public function tongzhi(){
        $member = $this->getMember();
        if($member->liushui >= 20000){
            $twice = intval($member->liushui / 20000);
            Db::table('members')->where('id',$member->id)->increment('zhuanpan',$twice);
            Db::table('members')->where('id',$member->id)->decrement('liushui',$twice*20000);
            Db::table('members')->where('id',$member->id)->update(['is_tongzhi'=>1]);
            echo 1;die;
        }
        if($member->is_tongzhi==0){
            Db::table('members')->where('id',$member->id)->update(['is_tongzhi'=>1]);
            echo 1;die;
        }
        echo 0;
    }
    
     //银行卡管理
    public function bank(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.bank';
        }else{
            $view = 'wap.template.'.$mb_path.'.bank';
        }
        $member = $this->getMember();
        $bank = config('bank');
        return view($view, compact('member','bank'));
    }


    public function setBank(Request $request){
        $member = $this->getMember();
        $data = $request->all();
        if($member['username'] && $data['username'] !=$member['username']){
            // return responseWrong('与戶口持有人姓名不一致！');
        }
        $type = $data['type'];
        $member->username = $data['username'];
        switch($type) {
            case 1:
                $member->bank = $data['bank'];
                $member->card = $data['card'];
                if(Db::table('members')->where('card',$data['card'])->first()){
                    return responseWrong('卡號已存在！');
                }
                break;
           case 2:
                $member->fps = $data['fps'];
                if(Db::table('members')->where('fps',$data['fps'])->first()){
                    return responseWrong('轉數快帳號已存在！');
                }
                break;
           case 3:
                $member->erc20 = $data['erc20'];
                if(Db::table('members')->where('erc20',$data['erc20'])->first()){
                    return responseWrong('erc20地址已存在！');
                }
                break;
           case 4:
                $member->trc20 = $data['trc20'];
                if(Db::table('members')->where('trc20',$data['trc20'])->first()){
                    return responseWrong('trc地址已存在！');
                }
                break;
        }
        $member->save();
        return responseSuccess($member, '绑定成功');
    }
    
    public function recharge_record_api(Request $request)
    {
		 $day = @$_GET['day'];
        if (!@$day) {
            $day = 1;
        }
        $day -= 1;
        $time = date('Y-m-d', strtotime(date('Y-m-d')) - $day * 86400);
        // echo $time;die;
        $data = Recharge::where('member_id', $this->getMember()->id)->where('created_at', '>=', $time)->orderBy('created_at', 'desc')->paginate(10);
        if($data){
            foreach ($data as $k=>$v){
                // if($v->payment_type==2){
                    $v->account = config('platform.recharge_type')[$v->payment_type];
                // }
            }
        }
        $total = Recharge::where('member_id', $this->getMember()->id)->where('created_at', '>=', $time)->where('status', '=', 2)->sum('money');
        return responseSuccess(['data'=>$data,'day'=>$day,'total'=>$total]);
    }
    
    public function user_fsjl_api(Request $request)
    {
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $day -= 1;
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        $data = Dividend::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        if($data){
            foreach ($data as &$v){
                $v->type = config('platform.dividend_type')[$v->type];
            }
        }
       $total = Dividend::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->sum('money');
         return responseSuccess(['data'=>$data,'day'=>$day,'total'=>$total]);
    }
    public function transfer_record_api(Request $request)
    {
        $cn_begin = $cn_end = date('Y-m-d');
        $s_begin_h = $request->get('s_begin_h')?:'00';
        $s_begin_i = $request->get('s_begin_i')?:'00';
        $s_end_h  = $request->get('s_end_h')?:'23';
        $s_end_i = $request->get('s_end_i')?:'59';
        $mod = new Transfer();
        if ($cn_begin)
        {
            $cn_begin = $request->get('cn_begin',date('Y-m-d'));
            $mod = $mod->where('created_at', '>=', $cn_begin." ".$s_begin_h.":".$s_begin_i.":00");
        }
        if ($cn_end)
        {
            $cn_end = $request->get('cn_end',date('Y-m-d'));
            $mod = $mod->where('created_at', '<=', $cn_end." ".$s_end_h.":".$s_end_i.":00");
        }
        $day = @$_GET['day'];
        if(!@$day){
            $day = 0;
        }
        $day -= 1;
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        // echo $time;die;
        $data = Db::table('transfers')->where('member_id', $this->getMember()->id)->where('created_at', '>=', $time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
      return responseSuccess(['data'=>$data,'cn_begin'=>$cn_begin,'cn_end'=>$cn_end,'s_begin_h'=>$s_begin_h,'s_begin_i'=>$s_begin_i,'s_end_h'=>$s_end_h,'day'=>$day]);
    }
    public function drawing_record_api(Request $request)
    {
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $day -= 1;
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        
        $data = Drawing::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        if($data){
            foreach ($data as &$v){
                if($v->bank_name==1){
                    $v->bank_name = trans('lang.zsk');
                }elseif($v->bank_name==2){
                    $v->bank_name = trans('lang.ykh');
                }elseif($v->bank_name==3){
                    $v->bank_name = 'ERC20';
                }elseif($v->bank_name==4){
                    $v->bank_name = 'TRC20';
                }
            }
        }
        $setting = Db::table('system_config')->first();
        $total = Drawing::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->where('status','=',2)->sum('money');
        return responseSuccess(['data'=>$data,'setting'=>$setting,'total'=>$total,'day'=>$day]);

    }
    public function api_check(){
        $member = $this -> getMember();
        $api_list = Api::where('on_line', '<>','1')->orderBy('created_at', 'desc')->get();
        if($api_list && $member){
            foreach ($api_list as &$v){
                $member_api = Db::table('member_api')->where('member_id',$member->id)->where('api_id', $v->id)->first();
                
                if($member_api){
                    $v->money = $member_api->money;
                    $v->is_on = 1;
                }else{
                    $v->money = 0;
                    $v->is_on = 0;
                }
            }
        }
        return $api_list;
    }
    
    
}
