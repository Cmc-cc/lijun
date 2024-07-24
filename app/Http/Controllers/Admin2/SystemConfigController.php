<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banners;
use App\Models\SystemConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Route;
class SystemConfigController extends Controller
{
    public function index()
    {
        $data = SystemConfig::findOrFail(1);

        $banners = Banners::all();

        //dump($data->toArray());
        return view('admin.system_config.index', compact('data', 'banners'));
    }

    public function update(Request $request, $id)
    {
        $mod = SystemConfig::findOrFail($id);
        $alipay_qrcode = $request->get('alipay_qrcode');
        if($alipay_qrcode){
            $alipay_qrcode = implode(',',$alipay_qrcode);
        }
        $wechat_qrcode = $request->get('wechat_qrcode');
        if($wechat_qrcode){
            $wechat_qrcode = implode(',',$wechat_qrcode);
        }
        $qq_qrcode = $request->get('qq_qrcode');
        if($qq_qrcode){
            $qq_qrcode = implode(',',$qq_qrcode);
        }
        $alert_img = $request->get('alert_img');
        if($alert_img){
            $alert_img = implode(',',$alert_img);
        }
        
        $data = $request->all();

        if($alipay_qrcode){
            $data['alipay_qrcode'] = $alipay_qrcode;
        }
        if($wechat_qrcode){
            $data['wechat_qrcode'] = $wechat_qrcode;
        }
        if($qq_qrcode) {
            $data['qq_qrcode'] = $qq_qrcode;
        }
        if($alert_img) {
            $data['alert_img'] = $alert_img;
        }else{
            $data['alert_img'] = '';
        }
        $mod->update($data);

        if ($request->get('u'))
            return responseSuccess('', '', $request->get('u'));

        return responseSuccess('', '', route('system_config.index'));
    }
    
    public function uploadfile(){
        if(@$_FILES['ico']){
            //获取文件名
        	$filename = $_FILES['ico']['name'];
        	//获取文件临时路径
        	$temp_name = $_FILES['ico']['tmp_name'];
        	//获取大小
        	$size = $_FILES['ico']['size'];
        	//获取文件上传码，0代表文件上传成功
        	$error = $_FILES['ico']['error'];
        }else{
            //获取文件名
        	$filename = $_FILES['mp3']['name'];
        	//获取文件临时路径
        	$temp_name = $_FILES['mp3']['tmp_name'];
        	//获取大小
        	$size = $_FILES['mp3']['size'];
        	//获取文件上传码，0代表文件上传成功
        	$error = $_FILES['mp3']['error'];
        }
    	
    	//判断文件大小是否超过设置的最大上传限制
    	//phpinfo函数会以数组的形式返回关于文件路径的信息 
    	//[dirname]:目录路径[basename]:文件名[extension]:文件后缀名[filename]:不包含后缀的文件名
    	$arr = pathinfo($filename);
    	//获取文件的后缀名
    	$ext_suffix = $arr['extension'];
    	//检测存放上传文件的路径是否存在，如果不存在则新建目录
    	if (!file_exists('adminuploads')){
    		mkdir('adminuploads');
    	}
    	//为上传的文件新起一个名字，保证更加安全
    	$new_filename = date('YmdHis',time()).rand(100,1000).'.'.$ext_suffix;
    	//将文件从临时路径移动到磁盘
    	if (move_uploaded_file($temp_name, 'adminuploads/'.$new_filename)){
    	    return responseSuccess('', '', '/adminuploads/'.$new_filename);
    // 		return '/adminuploads/'.$new_filename;
    	}
    }

}
