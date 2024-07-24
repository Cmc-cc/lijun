<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use DB;
use App\Models\GameRecord;
class YonghujiluController extends AdminBaseController
{

    public function index(Request $request)
    {
        $mod = new Member();
        $sort = $name = $status = $register_ip = $on_line = $real_name = $last_login_ip = $phone= $register_url= $top_id = '';
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $mod = $mod->where('name', 'like', "%$name%");
        }
        if ($request->has('real_name'))
        {
            $real_name = $request->get('real_name');
            $mod = $mod->where('real_name', 'like', "%$real_name%");
        }
        if ($request->has('register_ip'))
        {
            $register_ip = $request->get('register_ip');
            $mod = $mod->where('register_ip', 'like', "%$register_ip%");
        }
        if ($request->has('last_login_ip'))
        {
            $last_login_ip = $request->get('last_login_ip');
            $mod = $mod->where('last_login_ip', 'like', "%$last_login_ip%");
        }
        if ($request->has('status'))
        {
            $status = $request->get('status');
            $mod = $mod->where('status', $status);
        }
        if ($request->has('on_line'))
        {
            $on_line = $request->get('on_line');
            if ($on_line == 1)
            {
                $_online_member_array = MemberLoginLog::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-3 hours')))->pluck('member_id')->toArray();
                $mod = $mod->whereIn('id', $_online_member_array);
            }

        }
        
        
        if ($request->has('phone'))
        {
            $phone = $request->get('phone');
            $mod = $mod->where('phone', $phone);
        }
        if ($request->has('register_url'))
        {
            $register_url = $request->get('register_url');
            $mod = $mod->where('register_url', $register_url);
        }
        if ($request->has('top_id'))
        {
            $top_id = $request->get('top_id');
            $daili = Db::table('members')->where('name',$top_id)->first();
            if($daili){
                $daili_id = $daili->id;
            }else{
                $daili_id = 999999999;
            }
            $mod = $mod->where('top_id', $daili_id);
        }
        if ($request->has('sort'))
        {
            $sort = $request->get('sort');
            $data = $mod->get()->toArray();
            foreach($data as $key => $item){
                $zhuanru = DB::table('transfers')->select(DB::raw('count(id) as bishu,sum(money) as jine'))->where('member_id',$item['id'])->where('transfer_type',0)->first();
                $zhuanchu = DB::table('transfers')->select(DB::raw('count(id) as bishu,sum(money) as jine'))->where('member_id',$item['id'])->where('transfer_type',1)->first();
                $data[$key]['zongzhuanru_bishu'] = $zhuanru->bishu;
                $data[$key]['zongzhuanru_jine'] = $zhuanru->jine | 0;
                $data[$key]['zongzhuanchu_bishu'] = $zhuanchu->bishu;;
                $data[$key]['zongzhuanchu_jine'] = $zhuanchu->jine | 0;;
            }
            if($sort==1){
                $column = array_column($data, 'zongzhuanru_bishu');
                array_multisort($column,SORT_DESC,$data);
            }elseif($sort==2){
                $column = array_column($data, 'zongzhuanru_bishu');
                array_multisort($column,SORT_ASC,$data);
            }elseif($sort==3){
                $column = array_column($data, 'zongzhuanru_jine');
                array_multisort($column,SORT_DESC,$data);
            }elseif($sort==4){
                $column = array_column($data, 'zongzhuanru_jine');
                array_multisort($column,SORT_ASC,$data);
            }elseif($sort==5){
                $column = array_column($data, 'zongzhuanchu_bishu');
                array_multisort($column,SORT_DESC,$data);
            }elseif($sort==6){
                $column = array_column($data, 'zongzhuanchu_bishu');
                array_multisort($column,SORT_ASC,$data);
            }elseif($sort==7){
                $column = array_column($data, 'zongzhuanchu_jine');
                array_multisort($column,SORT_DESC,$data);
            }elseif($sort==8){
                $column = array_column($data, 'zongzhuanchu_jine');
                array_multisort($column,SORT_ASC,$data);
            }
            // $page = @$_GET['page']?$_GET['page']:1;
            // $list = [];
            // $start = ($page - 1)*config('admin.page-size');
            // $end = $page *config('admin.page-size');
            
            // for ($i = $start; $i < $end; $i++) {
            //     $list[] = (Object)$data[$i];
            // }
            // $data = (Object)$data;
            // dump($data);die;
            
        }else{
            $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
            foreach($data as $key => $item){
                
       
                $zhuanru = DB::table('transfers')->select(DB::raw('count(id) as bishu,sum(money) as jine'))->where('member_id',$item['id'])->where('transfer_type',0)->first();
                $zhuanchu = DB::table('transfers')->select(DB::raw('count(id) as bishu,sum(money) as jine'))->where('member_id',$item['id'])->where('transfer_type',1)->first();
                
                $data[$key]['zongzhuanru_bishu'] = $zhuanru->bishu;
                $data[$key]['zongzhuanru_jine'] = $zhuanru->jine | 0;
                $data[$key]['zongzhuanchu_bishu'] = $zhuanchu->bishu;;
                $data[$key]['zongzhuanchu_jine'] = $zhuanchu->jine | 0;;
            }
        }
        return view('admin.yonghu_jilu.index', compact('data', 'name','real_name', 'status', 'register_ip', 'on_line','last_login_ip','phone','register_url','top_id','sort'));
    }
    public function daochu4(Request $request)
    {
        $mod = new Member();
        $sort = $name = $status = $register_ip = $on_line = $real_name = $last_login_ip = $phone= $register_url= $top_id = '';
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $mod = $mod->where('name', 'like', "%$name%");
        }
        if ($request->has('real_name'))
        {
            $real_name = $request->get('real_name');
            $mod = $mod->where('real_name', 'like', "%$real_name%");
        }
        if ($request->has('register_ip'))
        {
            $register_ip = $request->get('register_ip');
            $mod = $mod->where('register_ip', 'like', "%$register_ip%");
        }
        if ($request->has('last_login_ip'))
        {
            $last_login_ip = $request->get('last_login_ip');
            $mod = $mod->where('last_login_ip', 'like', "%$last_login_ip%");
        }
        if ($request->has('status'))
        {
            $status = $request->get('status');
            $mod = $mod->where('status', $status);
        }
        if ($request->has('on_line'))
        {
            $on_line = $request->get('on_line');
            if ($on_line == 1)
            {
                $_online_member_array = MemberLoginLog::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-3 hours')))->pluck('member_id')->toArray();
                $mod = $mod->whereIn('id', $_online_member_array);
            }

        }
        
        
        if ($request->has('phone'))
        {
            $phone = $request->get('phone');
            $mod = $mod->where('phone', $phone);
        }
        if ($request->has('register_url'))
        {
            $register_url = $request->get('register_url');
            $mod = $mod->where('register_url', $register_url);
        }
        if ($request->has('top_id'))
        {
            $top_id = $request->get('top_id');
            $daili = Db::table('members')->where('name',$top_id)->first();
            if($daili){
                $daili_id = $daili->id;
            }else{
                $daili_id = 999999999;
            }
            $mod = $mod->where('top_id', $daili_id);
        }
        // if ($request->has('sort'))
        // {
        //     $sort = $request->get('sort');
        //     $mod = $mod->where('status', $sort);
        // }
        $data = $mod->get()->toArray();
        
       
        foreach($data as $key => $item){
            $zhuanru = DB::table('transfers')->select(DB::raw('count(id) as bishu,sum(money) as jine'))->where('member_id',$item['id'])->where('transfer_type',0)->first();
            $zhuanchu = DB::table('transfers')->select(DB::raw('count(id) as bishu,sum(money) as jine'))->where('member_id',$item['id'])->where('transfer_type',1)->first();
            $data[$key]['zongzhuanru_bishu'] = $zhuanru->bishu;
            $data[$key]['zongzhuanru_jine'] = $zhuanru->jine | 0;
            $data[$key]['zongzhuanchu_bishu'] = $zhuanchu->bishu;;
            $data[$key]['zongzhuanchu_jine'] = $zhuanchu->jine | 0;;
        }
        if ($request->has('sort'))
        {
            $sort = $request->get('sort');
            // 排序，降序：SORT_DESC，升序：SORT_ASC
            if($sort==1){
                $column = array_column($data, 'zongzhuanru_bishu');
                array_multisort($column,SORT_DESC,$data);
            }elseif($sort==2){
                $column = array_column($data, 'zongzhuanru_bishu');
                array_multisort($column,SORT_ASC,$data);
            }elseif($sort==3){
                $column = array_column($data, 'zongzhuanru_jine');
                array_multisort($column,SORT_DESC,$data);
            }elseif($sort==4){
                $column = array_column($data, 'zongzhuanru_jine');
                array_multisort($column,SORT_ASC,$data);
            }elseif($sort==5){
                $column = array_column($data, 'zongzhuanchu_bishu');
                array_multisort($column,SORT_DESC,$data);
            }elseif($sort==6){
                $column = array_column($data, 'zongzhuanchu_bishu');
                array_multisort($column,SORT_ASC,$data);
            }elseif($sort==7){
                $column = array_column($data, 'zongzhuanchu_jine');
                array_multisort($column,SORT_DESC,$data);
            }elseif($sort==8){
                $column = array_column($data, 'zongzhuanchu_jine');
                array_multisort($column,SORT_ASC,$data);
            }
        }
        
        $html = '<table>
                    <tr>
                        <td>ID</td>
                        <td>用户名</td>
                        <td>总转入-笔数</td>
                        <td>总转出-笔数</td>
                        <td>总转入-金额</td>
                        <td>总转出-金额</td>
                    </tr>';
        if($data){
            foreach ($data as $k=>$v){
                $html .= '<tr>';
                $html .= '<td>'.$v['id'].'</td>';
                $html .= '<td>'.$v['name'].'</td>';
                $html .= '<td>'.$v['zongzhuanru_bishu'].'</td>';
                $html .= '<td>'.$v['zongzhuanchu_bishu'].'</td>';
                $html .= '<td>'.$v['zongzhuanru_jine'].'</td>';
                $html .= '<td>'.$v['zongzhuanchu_jine'].'</td>';
                $html .= '</tr>';
            }
            $html .= '</table>';
        }
        header("Content-type:application/vnd.ms-excel");  //设置内容类型
        header("Content-Disposition:attachment;filename=平台转账记录汇总.xlsx");  //文件下载
        echo $html;die;
    }
}
