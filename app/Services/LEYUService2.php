<?php
namespace App\Services;

use App\Models\Api;
use App\Services\CurlService;
use Illuminate\Support\Facades\Log;

class LEYUService{
    public $pre;   // 玩家前缀
    public  $domain;
    public  $comId;
    public $comKey;
    public $gamePlatform;
    public $debug;
    public $salt ;
    public $betLimitCode;
    public $currencyCode;
    public $isspeed;
    public $isdemo;
    public $api_code;

    public function __construct()
    {
        $mod = Api::where('api_name', 'SELF')->first();
        $this->pre = $mod->prefix;// 玩家前缀
        $this->domain = $mod->api_domain;
        $this->api_id = $mod->api_id;
        $this->api_key = $mod->api_key;
    }


    public function register($api_code, $username,$password){


        $post_data = [
            'account' =>$this->api_id,
            'api_key' =>$this->api_key,			
            'api_code' =>$api_code,
            'username' => $username,
			'password' => $password,			
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/ley/register';
        }else{
            $url = 'http://'.$this->domain.'/ley/register';
        }

        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /**
     * @param $api_code 平台类型
     * @param $username 用户名
     * @param $password
     * @param $gameType 游戏代码
     * @param string $gameName
     * @param int $is_Mobile
     * @param string $gameId
     * @return int|string
     */
    public function login($api_code,$username,$password,$gameType,$gameName ,$is_Mobile = 1,$lott_type='',$demo='',$wallet_type=2){


        $post_data = [
            'account' =>$this->api_id,
            'api_key' =>$this->api_key,			
            'api_code' =>$api_code,
            'username' => $username,
			'gameType' => $gameType,
			'gameCode' => $gameName,
			'isMobile' => $is_Mobile,
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/ley/login';
        }else{
            $url = 'http://'.$this->domain.'/ley/login';
        }

        $receive = $this->send_post($url,$post_data);

        return $receive;
    }



    /*
     * 额度转换
     * 存款 http://<domain>/api/ag/deposit.ashx
     */
    public function deposit($api_code,$username,$password,$amount,$type = 1){

        $amount = intval($amount);
        $transferno = date("YmdHms").rand(000000,999999);//交易编号
        $post_data = [
            'account' =>$this->api_id,
            'api_key' =>$this->api_key,			
            'api_code' =>$api_code,
            'username' => $username,
			'amount' => $amount,
			'transferno' => $transferno,

        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/ley/deposit';
        }else{
            $url = 'http://'.$this->domain.'/ley/deposit';
        }

        $receive = $this->send_post($url,$post_data);

        return $receive;

    }


    /*
     * 额度转换
     * 取款 http://<domain>/api/ag/deposit.ashx
     */
    public function withdrawal($api_code,$username,$password,$amount,$type = 1){

        $amount = intval($amount);
        $transferno = date("YmdHms").rand(000000,999999);//交易编号
        $post_data = [
            'account' =>$this->api_id,
            'api_key' =>$this->api_key,			
            'api_code' =>$api_code,
            'username' => $username,
			'amount' => $amount,
			'transferno' => $transferno,

        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/ley/withdrawal';
        }else{
            $url = 'http://'.$this->domain.'/ley/withdrawal';
        }

        $receive = $this->send_post($url,$post_data);

        return $receive;

    }	
	
	
    /*
     * 额度转换
     * 存款 http://<domain>/api/ag/deposit.ashx
     */
    public function transfer($api_code,$username,$password,$amount,$type = 1){

        $plat_type = strtolower($api_code);
        $transSN = date("YmdHms").mt_rand(100,999);//交易编号
        $code = md5($this->api_key.$this->api_id.$username.$plat_type.$amount.$transSN);
        $post_data = array(
            'username' => $username,
            'sign_key' => $this->api_key,
            'plat_type' => $plat_type,
            'money' => $amount,
            'client_transfer_id' => $transSN,
            'code' => $code,
            'wallet_type'=>1
        );

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/trans';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/trans';
        }

        $receive = $this->send_post($url,$post_data);
        //dd($receive);
        return $receive;
        /*$transSN = date("YmdHms").mt_rand(100,999);//交易编号
        $post_data = array(
            'api_id'=>$this->api_id,
            'api_key'=>$this->api_key,
            'api_code' => $api_code,
            'username' => $username,
            'password'=>$password,
            'amount' => $amount,
            'type' => $type,
            'billno' => $transSN,
            'method'=>'transfer');

        $receive = $this->send_post('http://'.$this->domain,$post_data);
        return $receive;*/
    }

    /**
     * 中心钱包
     * @param $username
     * @param $money
     * @return int|string
     */
    public function trans($username,$money)
    {
        $debugInfo = debug_backtrace();
        Log::info('用户名:'.$username.'金额:'.$money.'文件:'.$debugInfo[0]['file'].'行数:'.$debugInfo[0]['line'].'方法:'.$debugInfo[0]['function']);
        $client_transfer_id = date("YmdHms").mt_rand(100,999);//交易编号
        $code = md5($this->api_key.$this->api_id.$username.$money.$client_transfer_id);
        $post_data = [
            'username'=> $username,
            'sign_key' => $this->api_key,
            'money' => $money,
            'client_transfer_id' => $client_transfer_id,
            'code' => $code
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/wallet/trans';
        }else{
            $url = 'http://'.$this->domain.'/v1/wallet/trans';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    public function trans_all($username)
    {
        $code = md5($this->api_key.$this->api_id.$username);
        $post_data = [
            'username'=> $username,
            'sign_key' => $this->api_key,
            'code' => $code
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/trans-all';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/trans-all';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }
    /**
     * 会员查询中心钱包余额
     * @param $username
     * @return int|string
     */
    public function wallet_balance($username)
    {
        $code = md5($this->api_key.$this->api_id.$username);
        $post_data = [
            'username'=> $username,
            'sign_key' => $this->api_key,
            'code' => $code
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/wallet/balance';
        }else{
            $url = 'http://'.$this->domain.'/v1/wallet/balance';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }
    /*
     * 会员获取游戏频台余额
     */
    public function balance($api_code,$username,$password){

        $post_data = [
            'account' =>$this->api_id,
            'api_key' =>$this->api_key,			
            'api_code' =>$api_code,
            'username' => $username,
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/ley/balance';
        }else{
            $url = 'http://'.$this->domain.'/ley/balance';
        }

        $receive = $this->send_post($url,$post_data);

        return $receive;
    }
    /*
         * 会员获取游戏频台余额
         */
    public function balance_all($username){

        /*$post_data = array(
            'api_id'=>$this->api_id,
            'api_key'=>$this->api_key,
            'api_code' => $api_code,
            'username' => $username,
            'password'=>$password,
            'betLimitCode'=>$this->betLimitCode,
            'currencyCode'=>$this->currencyCode,
            'isSpeed'=>$this->isspeed,
            'isDemo'=>$this->isdemo,
            'method'=>'balance'
        );*/

        $code = md5($this->api_key.$this->api_id.$username);
        $post_data = [
            'username'=>$username,
            'sign_key' => $this->api_key,
            'code' => $code
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/all-balance';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/all-balance';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /*
     *新游戏记录api
     *获取全部游戏
    * 游戏记录 http://<domain>/api/ag/betrecord.ashx
    */
    public function betrecord($startDate,$endDate,$page,$limit){

        $post_data = [
            'account' =>$this->api_id,
            'api_key' =>$this->api_key,			
            'page' =>$page,
            'pageSize' => $limit,
			'start_at' => $startDate,
			'end_at' => $endDate,
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/ley/gamerecord';
        }else{
            $url = 'http://'.$this->domain.'/ley/gamerecord';
        }

        $receive = $this->send_post($url,$post_data);
		
        return $receive;
    }


    public function betrecordbu($order){

        $post_data = [
            'account' =>$this->api_id,
            'api_key' =>$this->api_key,			
            'order' =>$order,
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/ley/gamerecordbu';
        }else{
            $url = 'http://'.$this->domain.'/ley/gamerecordbu';
        }

        $receive = $this->send_post($url,$post_data);

        return $receive;
    }
	
    public function record($startTime,$endTime,$page=1,$limit=15,$username = '',$platformCode,$game_type_game){
        $url=$this->domain."/v1/user/record";
        $code = md5($this->api_key.$this->api_id.$platformCode.$startTime.$endTime);
        $data = [
            "plat_type"=>$platformCode,
            "page"=>$page,
            "limit"=>$limit,
            "startTime"=>$startTime,
            "endTime"=>$endTime,
            "username"=>$username,
            "game_type"=>$game_type_game,
            "sign_key"=>$this->api_key,
            "code"=>$code
        ];

        $res = $this->send_post($url, $data);
        return $res;
    }
    public function game_list()
    {
        $post_data = array('api_id'=>$this->api_id,'api_key'=>$this->api_key,'api_code' => 'tcg','method'=>'gamelist');

        $receive = $this->send_post('http://'.$this->domain,$post_data);
        return $receive;
    }

    /*
    * 商户余额查询
    */
    public function credit($api_code){

        $post_data = [
            'account' =>$this->api_id,
            'api_key' =>$this->api_key,			
            'api_code' =>$api_code,
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/ley/credit';
        }else{
            $url = 'http://'.$this->domain.'/ley/credit';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /*
    * 商户余额查询总额度
    */
    public function credit_all(){
      
       /*$post_data = array(
            'api_id'=>$this->api_id,
            'api_key'=>$this->api_key,
            'api_code' => $api_code,
            'method'=>'credit'
        );*/
        $code  = md5($this->api_key.$this->api_id);
        $post_data = [
            'sign_key' => $this->api_key,
            'code' =>$code
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/all-credit';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/all-credit';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
      
      
        /*$post_data = array(
            'api_id'=>$this->api_id,
            'api_key'=>$this->api_key,
            'api_code' => $api_code,
            'method'=>'credit'
        );*/
        $code  = md5($this->api_key.$this->api_id);
        $post_data = [
            'sign_key' => $this->api_key,
            'code' =>$code
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/all-credit';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/all-credit';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
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
 
        return $output;
    }	
	
	
    protected function send_posts($url,$post_data) {
        $result = (new CurlService())->post($url, $post_data);

        return $result;
    }

    protected function salt($length)
    {
        $key="";
        $pattern='1234567890abcdefghijklmnopqrstuvwxyz';
        for($i=0;$i<$length;$i++)
        {
            $key .= $pattern{mt_rand(0,35)};
        }
        return $key;
    }
    public function get_demo_url()
    {
        $code = md5($this->api_key.$this->api_id);
        $post_data = [
            'sign_key' => $this->api_key,
            'code' =>$code
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/very/gameurl';
        }else{
            $url = 'http://'.$this->domain.'/v1/very/gameurl';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }
    public function get_online_url()
    {
        $code = md5($this->api_key.$this->api_id);
        $post_data = [
            'sign_key' => $this->api_key,
            'code' =>$code
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/getadminurl';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/getadminurl';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /*
    * 获取游戏列表
    */
    public function gamelist($api_code){

        $post_data = [
            'account' =>$this->api_id,
            'api_key' =>$this->api_key,			
            'api_code' =>$api_code,
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/ley/gamelist';
        }else{
            $url = 'http://'.$this->domain.'/ley/gamelist';
        }
        $receive = $this->send_post($url,$post_data);

        return $receive;
    }
	
}