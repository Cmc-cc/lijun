<?php

namespace App\Http\Controllers\Wap;

use App\Models\Member;
use App\Models\MemberLoginLog;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Traits\ValidationTrait;
use Session;
use DB;
use Illuminate\Support\Facades\App;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers,ValidationTrait;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/member/dash';
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth.wap', ['except' => 'logout']);
//        //$this->username = config('admin.global.username');
//    }
    /**
     * 重写登录视图页面
     * @author 晚黎
     * @date   2016-09-05T23:06:16+0800
     * @return [type]                   [description]
     */
    public function showLoginForm(Request $request)
    {
        $preview = $request->get('preview');
        if($request->has('preview')){
            $data = Template::where('jump_name',$preview)->where('client_type',2)->first();
            $mb_path = $data->template_name;
        }else{
            $data = Template::where('status',2)->where('client_type',2)->first();
            $mb_path = $data->template_name;
        }
        if(empty($mb_path)){
            $view = 'wap.login';
        }else{
            $view = 'wap.template.'.$mb_path.'.login';
        }
        $setting = Db::table('system_config')->first();
        return view($view, compact('setting'));
    }
    public function sysconfig(){
        $setting = Db::table('system_config')->first();
        return responseSuccess($setting, '成功');
    }
    public function postLogin(Request $request)
    {
        $validator = $this->verify($request, 'member.login');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong(json_decode($messages[0],true));
        }

        $member = Member::where('name', $request->name)->first();
        if ($member)
        {
            if ($member->status == 1)
                return responseWrong(trans('lang.zhbjy'));
        }else{
            return responseWrong(trans('lang.yhmhmmcw'));
        }
        if($member->is_daili == 1){
                return responseWrong('代理帳號請登入代理後臺');
            }
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
                'ip' => getIp()
            ]);
            return responseSuccess('', '登录成功', route('wap.index'));
        }
        return responseWrong(trans('lang.yhmhmmcw'));
    }

    public function logout()
    {
        //$member = auth('member')->user();
//        $member->update([
//            'is_login' => 0
//        ]);
        Auth::guard('member')->logout();
        return redirect()->route('wap.index');
    }
    
    public function changelang(){
        $lang = $_GET['lang'];
        App::setLocale($lang);
        Session::put('lang',$lang);  
        echo App::getLocale();
    }
    public function auto_auto(){
        $data = Db::table('member_api')->where('is_ok',0)->take(2000)->get();
        foreach ($data as $k=>$v){
            Db::table('member_api')->where('member_id',$v->member_id)->where('api_id',$v->api_id)->where('id','<>',$v->id)->delete();
            Db::table('member_api')->where('id','=',$v->id)->update(['is_ok'=>1]);
        }
    }
}
