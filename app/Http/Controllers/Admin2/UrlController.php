<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends AdminBaseController
{
    public function index(Request $request)
    {
        $data = Db::table('url')->orderBy('id', 'asc')->paginate(100);

        return view('admin.url.index', compact('data'));
    }

    public function show($id)
    {
        $data = Db::table('url')->where('id',$id)->first();

        return view('admin.url.show', compact('data'));
    }

    public function create(Request $request)
    {
        $type= $request->get('type')?:1;
        return view('admin.url.create', compact('type'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if (Db::table('url')->where('url', $data['url'])->first())
            return responseWrong('已存在相同域名');

        Db::table('url')->insert($data);

        return responseSuccess('', '', route('url.index'));

    }
    public function add(Request $request)
    {
        $data = $request->all();

        if (Db::table('url')->where('url', $data['url'])->first())
            return responseWrong('已存在相同域名');

        Db::table('url')->insert($data);

        return responseSuccess('', '', route('url.index'));

    }

    public function edit($id)
    {
        
        $data = Db::table('url')->where('id',$id)->first();

        return view('admin.url.edit', compact('data'));
    }

    public function edit2(Request $request)
    {

        $data = $request->all();
        if (Db::table('url')->where('url', $data['url'])->where('id', '!=', $_GET['id'])->first())
            return responseWrong('存在相同域名');

        Db::table('url')->where('id',$_GET['id'])->update($data);

        return responseSuccess('', '', route('url.index'));

    }

    public function destroy($id)
    {
        Db::table('url')->where('id',$_GET['id'])->delete();

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
}
