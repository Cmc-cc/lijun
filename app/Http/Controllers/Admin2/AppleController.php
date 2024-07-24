<?php

namespace App\Http\Controllers\Admin;

use App\Models\Api;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppleController extends AdminBaseController
{
    public function index(Request $request)
    {
        $type  = $request->get('type')?:5;
        $mod = new Api();

        $data = $mod->where('type', $type)->orderBy('sort', 'asc')->orderBy('id', 'asc')->paginate(100);

        return view('admin.api.index', compact('data', 'type'));
    }

    public function show($id)
    {
        $data = Api::findOrFail($id);

        return view('admin.api.show', compact('data'));
    }

    public function create(Request $request)
    {
        $type= $request->get('type')?:1;
        return view('admin.api.create', compact('type'));
    }

    public function store(Request $request)
    {
        $validator = $this->verify($request, 'api.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();

        if (Api::where('type', $data['type'])->where('api_name', $data['api_name'])->first())
            return responseWrong('该类型下已存在该接口名称');

        Api::create($data);

        return responseSuccess('', '', route('apple.index').'?type='.$data['type']);

    }

    public function edit($id)
    {
        $data = Api::findOrFail($id);

        return view('admin.api.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $validator = $this->verify($request, 'api.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $mod = Api::findOrFail($id);

        if (Api::where('type', $mod->type)->where('api_name', $data['api_name'])->where('id', '!=', $id)->first())
            return responseWrong('该类型下已存在该接口名称');

        $mod->update($data);

        return responseSuccess('', '', route('apple.index').'?type='.$mod->type);

    }

    public function destroy($id)
    {
        Api::destroy($id);

        return respS();
    }

    public function check($id, $status)
    {
        $mod = Api::findOrFail($id);
        $m = Api::where('api_name', $mod->api_name)->where('on_line', 0)->first();
        if ($status == 0 && $m)
        {
            return respF('类型 '.$m->type.' 已存在该上线的接口');
        }

        if($m && $m->api_name=='AG' && $status==1){
            $sql ="update members set is_ag=1";
            DB::update(DB::raw($sql));
        }elseif ($m && $m->api_name=='SUNBETS' && $status == 1){
            $sql ="update members set is_sunbets=1";
            DB::update(DB::raw($sql));
        }

        $mod->update([
            'on_line' => $status
        ]);

        return respS();
    }
    
    
    public function url()
    {
        $data = Db::table('system_config')->first();
        return view('admin.api.url', compact('data'));
    }

    public function urledit(Request $request)
    {
        $sys = Db::table('system_config')->first();
        $type= $request->get('type');
        $password = "Qwe123aq";
        $lang = "zh-CN";
        if($type==1){
            $api_code = $request->get('api_name');
            $username = $request->get('api_username');
            $api = Api::where('api_name', $api_code)->first();
            $gameType = $api->game_type;
            $api_code = $api->old_name;
            $html5 = is_Mobile() == 1?1:0;
            $sign = md5( $sys->leyu_pre_1 . $password . $api_code . $gameType  . $username . $sys->leyu_api_key);
            $data = [
                "operatorcode" => $sys->leyu_pre_1,
                "providercode" => $api_code,
                "lang"=>$lang,
                "username" => $username,
                "password" => $password,
                "html5"=>$html5,
                "type" => $gameType,
                "signature" => strtoupper($sign)
            ];
            if($api_code == 'P3'){
                $data['game_id'] = '1_0';
            }
            $url = $sys->leyu_domain . '/launchGames.aspx';
        }elseif($type==2){
            $transferno = $request->get('order_no');
            $api_code = $request->get('api_name');
            $username = $request->get('api_username');
            $amount = $request->get('amount');
            $api = Api::where('api_name', $api_code)->first();
            $gameType = $api->game_type;
            $api_code = $api->old_name;
            $type = $request->get('inout');
            $password = "Qwe123aq";
            
            $sign = md5($amount . $sys->leyu_pre_1 . $password . $api_code . $transferno . $type . $username . $sys->leyu_api_key);
            $data = [
                "operatorcode" => $sys->leyu_pre_1,
                "providercode" => $api_code,
                "username" => $username,
                "password" => $password,
                "referenceid" => $transferno,
                "type" => $type,
                "amount" => $amount,
                "signature" => strtoupper($sign)
            ];
            $url = $sys->leyu_domain . '/makeTransfer.aspx';
        }
        // elseif($type==3){
        //     $api_code = $request->get('api_name');
        //     $username = $request->get('api_username');
        //     $sign = md5($sys->leyu_pre_1 . $api_code.$username. $sys->leyu_api_key);
        //     $data = [
        //         "operatorcode" => $sys->leyu_pre_1,
        //         "providercode" => $api_code,
        //         "username" => $username,
        //         // "password"=> $password,
        //         "signature" => strtoupper($sign)
        //     ];
        //     // dump($data);die;
        //     $url = $sys->leyu_domain . '/checkMemberProductUsername.aspx';
        // }
            foreach ($data as $k=>$v){
                if($k=='operatorcode'){
                    $url .= '?'.$k.'='.$v;
                }else{
                    $url .= '&'.$k.'='.$v;
                }
            }
        return responseSuccess($url, '', route('apple.index'));
    }
}
