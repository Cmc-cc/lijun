<?php

namespace App\Http\Controllers\Admin;

use App\Models\Red;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RedController extends AdminBaseController
{
    public function index(Request $request)
    {
        $mod = new Red();

        $data = $mod->orderBy('sort', 'asc')->paginate(config('admin.page-size'));

        return view('admin.red.index', compact('data'));
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
            'number' => $data['number'],
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        // $mod = Red::findOrFail($id);

        // $mod->update($data);

        return responseSuccess('', '', route('red.index'));

    }
    
    public function add(Request $request)
    {
        // $validator = $this->verify($request, 'red.store');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }
       $data = $request->all();
       $index = Db::table('reds')->max('index');
        Db::table('reds')->insert([
            'money'=>$data['money'],
            'rate'=>$data['rate'],
            'sort'=>$data['sort'],
            'name' => $data['name'],
            'index' => $index + 1,
            'number' => $data['number'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
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
    
    public function giveindex(){

        $data = Db::table('red_give_num')->paginate(config('admin.page-size'));
        return view('admin.red.giveindex',compact('data'));
    }
    
    public function editGiveNum(Request $request,$id){
        $data = $request->all();
        if($id == 0){
            Db::table('red_give_num')->insert([
                'give_num'=>$data['give_num'],
                'price'=>$data['price'],
            ]);
        }else{
            Db::table('red_give_num')->where('id',$id)->update([
                'give_num'=>$data['give_num'],
                'price'=>$data['price'],
            ]);
        }
        return responseSuccess('', '', route('admin.giveindex'));
    }
    
    public function giveNumAdd($id){
        $obj = Db::table('red_give_num')->where('id',$id)->get();
        if(empty($obj[0])){
            $data = [
                    'give_num' => '',
                    'price' => '',
                    'id' => 0,
                ];
        }else{
            $data = [
                    'give_num' => $obj[0]->give_num ?? 0,
                    'price' => $obj[0]->price ?? 0,
                    'id' => $obj[0]->id ?? 0
                ];
        }
        return view('admin.red.givecreate',compact('data'));
    }
    
    public function giveNumCheck($id,$status){
        Db::table('red_give_num')->where('id',$id)->update(['status' => $status]);
         return respS();
    }
}
