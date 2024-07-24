<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dividend;
use App\Models\Member;
use App\Models\SystemConfig;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recharge;
use App\Traits\ValidationTrait;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\MemberMlLog;
use App\Models\MemberMoneyLog;

class RechargeController extends Controller
{
    use ValidationTrait;
    public function index(Request $request)
    {
        $mod = new Recharge();

        $status = $payment_type = $name = $start_at = $end_at = $updated_start_at = $updated_end_at = '';
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $m_list = Member::where('name', 'LIKE', "%$name%")->pluck('id');
            $mod = $mod->whereIn('member_id', $m_list);
        }

            $status = 1;
            $mod = $mod->where('status', $status);


        if ($request->has('payment_type'))
        {
            $payment_type = $request->get('payment_type');
            $mod = $mod->where('payment_type', $payment_type);
        }
        if ($request->has('start_at'))
        {
            $start_at = $request->get('start_at');
            $mod = $mod->where('created_at', '>=', $start_at);
        }
        if ($request->has('end_at'))
        {
            $end_at = $request->get('end_at');
            $mod = $mod->where('created_at', '<=',$end_at);
        }
        if ($request->has('updated_start_at'))
        {
            $updated_start_at = $request->get('updated_start_at');
            $mod = $mod->where('updated_at', '>=', $updated_start_at);
        }
        if ($request->has('updated_end_at'))
        {
            $updated_end_at = $request->get('updated_end_at');
            $mod = $mod->where('updated_at', '<=',$updated_end_at);
        }
        //->leftjoin('members','recharge.member_id','=','members.id')
        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
        $total_recharge = $mod->sum('money');
        $total_diff_money = $mod->sum('diff_money');

        return view('admin.recharge.index', compact('data', 'status', 'payment_type', 'total_recharge', 'total_diff_money', 'name', 'start_at', 'end_at','updated_start_at','updated_end_at'));
    }
    
    public function reindex(Request $request)
    {
        $mod = new Recharge();

        $status = $payment_type = $name = $start_at = $end_at = $updated_start_at = $updated_end_at = '';
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $m_list = Member::where('name', 'LIKE', "%$name%")->pluck('id');
            $mod = $mod->whereIn('member_id', $m_list);
        }
        if ($request->has('status'))
        {
            $status = $request->get('status');
            $mod = $mod->where('status', $status);
        }else{
            $mod = $mod->where('status', '>',1);
        }

        if ($request->has('payment_type'))
        {
            $payment_type = $request->get('payment_type');
            $mod = $mod->where('payment_type', $payment_type);
        }
        if ($request->has('start_at'))
        {
            $start_at = $request->get('start_at');
            $mod = $mod->where('created_at', '>=', $start_at);
        }
        if ($request->has('end_at'))
        {
            $end_at = $request->get('end_at');
            $mod = $mod->where('created_at', '<=',$end_at);
        }
        if ($request->has('updated_start_at'))
        {
            $updated_start_at = $request->get('updated_start_at');
            $mod = $mod->where('updated_at', '>=', $updated_start_at);
        }
        if ($request->has('updated_end_at'))
        {
            $updated_end_at = $request->get('updated_end_at');
            $mod = $mod->where('updated_at', '<=',$updated_end_at);
        }
        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));

        $total_recharge = $mod->sum('money');
        $total_diff_money = $mod->sum('diff_money');

        return view('admin.recharge.reindex', compact('data', 'status', 'payment_type', 'total_recharge', 'total_diff_money', 'name', 'start_at', 'end_at','updated_start_at','updated_end_at'));
    }

    public function show($id)
    {
        $data = Recharge::findOrFail($id);

        $mod = SystemConfig::where('id',1)->first();
        $cz_ration = $mod->cz_ration / 100;
        $data->diff_money = sprintf('%.2f',$data -> money * $cz_ration);
        
        $member = Db::table('members')->where('id',$data->member_id)->first();
        // if($member->is_new==1 && $data->money >= $mod->new_level){
        if($member->is_new==1 && $mod->new_level >0 && $mod->new_point >0 && $data->money == $mod->new_level){
            $data->diff_money = $mod->new_point;
        }
        $data->daili = round($mod->daili_report * $data -> money / 100 ,2);
        
        //上次充值
        $last = Db::table('recharge')->where('status',2)->where('member_id',$data->member_id)->orderBy('created_at','desc')->first();
        //dd($data->toArray());
        
        $data->ml_money = ($data->diff_money + $data->money) * $mod->ml_percent;
        return view('admin.recharge.show', compact('data','last'));
    }

    //转账成功
    public function confirm(Request $request, $id)
    {
        
        $validator = $this->verify($request, 'recharge.confirm');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        if ($request->get('money') < 1)
            return responseWrong('充值金额不达标');

        $mod = Recharge::findOrFail($id);
        if($mod->status==2 || $mod->status == 3){
            return responseWrong('此订单已经有其他管理员处理');
        }
        
        $sys = SystemConfig::find(1);
        $data = $request->all();
        try{
            DB::transaction(function() use($mod, $data,$request,$sys) {
                
                $diff_money = $request->get('diff_money') > 0 ? $request->get('diff_money') : 0 ;

                $mod->update([
                    'status' => 2,
                    'confirm_at' => date('Y-m-d H:i:s'),
                    'diff_money' => $diff_money,
                    'user_id'=>Auth::user()->id,//管理员ID
                    'ml_money'=>$request->get('ml_money')
                ]);

                //如果存在赠送金额 则添加进红利表
                if ($diff_money > 0)
                    Dividend::create([
                        'member_id' => $mod->member_id,
                        'type' => 1,
                        'money' => $request->get('diff_money'),
                        // 'money' => $request->get('diff_money'),
                        'describe' => '充值赠送金额',
//                        'before_money' => $mod->member->money,
//                        'after_money' => $mod->member->money + $data['money'],
                        'status' => 1
                    ]);
                
                //用户中心账户加钱
                // $m = $mod->money + $diff_money;
                $m = intval($mod->money) + $diff_money;
                $member = Db::table('members')->where('id',$mod->member_id)->first();
                
                   //增加余额充值记录
                MemberMoneyLog::addLog($mod->member_id,$m,$member->money,1,$mod->bill_no);
                
                
                Db::table('members')->where('id',$mod->member_id)->increment('money', $m);
                // if($member->is_new==1){
                //     Db::table('members')->where('id',$mod->member_id)->increment('zhuanpan', 1);
                //     Db::table('members')->where('id',$mod->member_id)->update(['is_tongzhi'=>0]);
                // }
                // if($member->money <= 20){
                //     Db::table('members')->where('id',$mod->member_id)->update(['ml_money'=>0]);
                // }
                Db::table('members')->where('id',$mod->member_id)->increment('ml_money',$data['ml_money']);
                MemberMlLog::addLog( $mod->member_id,$data['ml_money'],$member->ml_money,2,$mod->bill_no);
                Db::table('members')->where('id',$mod->member_id)->update(['is_new'=>0]);
                $top_id = Db::table('members')->where('id',$mod->member_id)->value('top_id');
                $daili_report = $data['daili'];
                //代理加佣金
                if($daili_report && $top_id){
                    Db::table('members')->where('id',$top_id)->increment('money', $daili_report);
                    
                    Dividend::create([
                        'member_id' => $top_id,
                        'type' => 1,
                        'money' => $daili_report,
                        // 'money' => $request->get('diff_money'),
                        'describe' => '下级用户充值佣金',
//                        'before_money' => $mod->member->money,
//                        'after_money' => $mod->member->money + $data['money'],
                        'status' => 1
                    ]);
                }
                
                //判断当天累计充值金额赠送转盘次数
                $num = Db::table('member_money_log')->where('member_id',$mod->member_id)->where('type',1)->whereDate('created_at','>=',date('Y-m-d 00:00:00'))->whereDate('created_at','<=',date('Y-m-d 23:59:59'))->sum('money');
                $giveNum = Db::table('red_give_num')->where('price','<=',$num)->where('status',1)->get();
                foreach($giveNum as $v){
                    $isGive = Db::table('red_give_log')->where('user_id',$mod->member_id)->where('type',1)->where('date',date('Ymd'))->where('give_id',$v->id)->get();
                    
                    if(empty($isGive[0])){
                        Db::table('members')->where('id',$mod->member_id)->increment('zhuanpan', $v->give_num);
                        Db::table('red_give_log')->insert([
                                'type' => 1,
                                'user_id' => $mod->member_id,
                                'give_id' => $v->id,
                                'date' => date('Ymd'),
                                'created_at' => date('Y-m-d H:i:s')
                            ]);
                    }
                }
                
            });
        }catch(Exception $e){
            DB::rollback();
            return respF('创建失败');
        }
        Log::info('管理员IP'.getIp().'--管理员ID->'.Auth::user()->id);
        return responseSuccess('确认汇款成功', '', route('recharge.index'));
    }

    public function create()
    {
        return view('admin.recharge.create');
    }

    public function store(Request $request)
    {
        $validator = $this->verify($request, 'recharge.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();

        Recharge::create($data);

        return responseSuccess('', '', route('recharge.index'));

    }

    public function edit($id)
    {
        $data = Recharge::findOrFail($id);

        return view('admin.recharge.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (!$request->has('fail_reason'))
            respF('请输入不通过原因');

        $mod = Recharge::findOrFail($id);
        $type = @$_GET['type']?$_GET['type']:0;

        if($type==0 && ($mod->status ==2 || $mod->status ==3)) {
                return respF('此订单已经有其他管理人员处理过');
        }
        $arr = [
            'fail_reason' => $request->get('fail_reason'),
        ];
        if(!$type){
            $arr['status'] = 3;
        }
        $mod->update($arr);

        return respS();

    }

    public function destroy($id)
    {
        Recharge::destroy($id);

        return respS();
    }
}
