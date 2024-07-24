<?php

namespace App\Http\Controllers\Admin;

use App\Models\MemberMoneyLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class MoneyLogController extends AdminBaseController
{
    public function index(Request $request)
    {
        $mod = new MemberMoneyLog();
        
        $status = $name = $start_at = $end_at ='';
      
        if ($request->has('status'))
        {
            $status = $request->get('status');
            $mod = $mod->where('type', $status);
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
           if ($request->has('name'))
        {
            $name = $request->get('name');
        }
        $n = $request->get('name');
        $data = $mod->with(['member'])->when($n, function ($query, $n) {
            $query->whereHas('member', function ($query) use($n) {
                $query->where('name', $n);
            });
        })->orderBy('id','desc')->paginate(config('admin.page-size'));
        $types = MemberMoneyLog::TYPES;
        return view('admin.member_money.index', compact('data','types' ,'name','status','start_at', 'end_at'));
    }

    public function create()
    {
        return view('admin.red.create');
    }

    public function store(Request $request)
    {
        $validator = $this->verify($request, 'red.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();

        Red::create($data);

        return responseSuccess('', '', route('red.index'));

    }

    public function edit($id)
    {
        $data = Red::findOrFail($id);

        return view('admin.red.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // $validator = $this->verify($request, 'red.store');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }
        $data = $request->all();
        Db::table('reds')->where('id',$id)->update([
            'money'=>$data['money'],
            'rate'=>$data['rate'],
            'sort'=>$data['sort'],
        ]);
        // $mod = Red::findOrFail($id);

        // $mod->update($data);

        return responseSuccess('', '', route('red.index'));

    }

    public function destroy($id)
    {
        Red::destroy($id);

        return respS();
    }
    public function check($id, $status)
    {
        $mod = Red::findOrFail($id);


        $mod->update([
            'on_line' => $status
        ]);

        return respS();
    }
}
