<?php
namespace App\Services;

use App\Models\Api;
use App\Services\CurlService;
use Illuminate\Support\Facades\Log;
class SelfService{
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
        $this->gamePlatform = $mod->api_name;
        $this->debug = 0;
        $this->salt = $this->salt(5);
        $this->betLimitCode = 'A';
        $this->currencyCode = 'HKD';
        $this->isspeed = 0;
        $this->isdemo = 0;
    }


    public function register($api_code, $username,$password,$is_test = 0){
        /*$post_data = array(
            'api_id'=>$this->api_id,
            'api_key'=>$this->api_key,
            'api_code' => $api_code,
            'username' => $username,
            'password'=>$password,
            'betLimitCode'=>$this->betLimitCode,
            'currencyCode'=>$this->currencyCode,
            'isSpeed'=>$this->isspeed,
            'is_test'=>$is_test,
            'method'=>'register'
        );*/
        
        $plat_type = strtolower($api_code);
        
        $joker_rate = '';
        if(strpos($plat_type,'joker') !== false){
            $username .= '_'.str_replace('joker','',$plat_type);
        }
        
        // $code = md5($this->api_key.$this->api_id.$plat_type.$username);
        
        
        $post_data = [
            'username' => substr($username,0,9),
            'password'=>'qy123456',
            'api_id' => $this->api_id,
            'api_key' => $this->api_key,
            'api_code'=>$plat_type,
            'method'=>'register'
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain;
        }else{
            $url = 'http://'.$this->domain;
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
    public function login($api_code,$username,$password,$gameType,$gameName = '',$is_Mobile = 0,$lott_type='',$demo='',$wallet_type=2){
        
        
        $plat_type = strtolower($api_code);
        $joker_rate = '';
        if(strpos($plat_type,'joker') !== false){
            $username .= '_'.str_replace('joker','',$plat_type);
        }
        // dump($username);die;
        $post_data = [
            'username' => substr($username,0,9),
            'password'=>'qy123456',
            'api_id' => $this->api_id,
            'api_key' => $this->api_key,
            'api_code'=>$plat_type,
            'method'=>'register'
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain;
        }else{
            $url = 'http://'.$this->domain;
        }
        $this->send_post($url,$post_data);
        
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
            'method'=>'login',
            'gameType' => $gameType,
            'gameId' => $gameId,
            'gameName' => $gameName,
            'isMobile' => $is_Mobile
        );*/
        // $plat_type = strtolower($api_code);
        
        $plat_type = $api_code;
        $code = md5($this->api_key.$this->api_id.$username.$plat_type.$is_Mobile);
        $post_data = array(
            'username' => substr($username,0,9),
            'password'=>'qy123456',
            'api_id' => $this->api_id,
            'api_key' => $this->api_key,
            'api_code'=>$plat_type,
            'method'=>'login',
            'isMobile' => 1
        );
        // $post_data = array(
        //     'api_id' => $this->api_id,
        //     'api_key' => $this->api_key,
        //     'api_code'=>$plat_type,
        //     'method'=>'gamelist',
        // );
        if($gameType){
            $post_data['gameCode'] = $gameType;
        }
        if($gameName){
            $post_data['gameType'] = $gameName;
        }
        
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain;
        }else{
            $url = 'http://'.$this->domain;
        }
        // dump($post_data);die;
        $receive = $this->send_post($url,$post_data);
        // dump(json_decode($receive,true));die;
        //dd($receive);
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
        // $post_data = array(
        //     'username' => $username,
        //     'sign_key' => $this->api_key,
        //     'plat_type' => $plat_type,
        //     'money' => $amount,
        //     'client_transfer_id' => $transSN,
        //     'code' => $code,
        //     'wallet_type'=>1
        // );
        if($amount >0){
            $method = 'deposit';
        }else{
            $method = 'withdrawal';
            $amount = abs($amount);
        }
        
        
        $post_data = array(
            'api_id' => $this->api_id,
            'api_key' => $this->api_key,
            'api_code'=>strtoupper($plat_type),
            'method'=>$method,
            'username' => substr($username,0,9),
            'password'=>'qy123456',
            'amount'=>$amount,
            'billno' => $transSN
        );
        
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain;
        }else{
            $url = 'http://'.$this->domain;
        }
        
        $receive = $this->send_post($url,$post_data);
        // dump($post_data);
        // dump($url);
        // dump($receive);die;
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

        // $plat_type = strtolower($api_code);
        // $code = md5($this->api_key.$this->api_id.$username.$plat_type);
        // $post_data = [
        //     'username'=>$username,
        //     'sign_key' => $this->api_key,
        //     'plat_type' => $plat_type,
        //     'code' => $code
        // ];

        // if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
        //     $url = $this->domain.'/v1/user/balance';
        // }else{
        //     $url = 'http://'.$this->domain.'/v1/user/balance';
        // }
        
        $post_data = array(
            'api_id' => $this->api_id,
            'api_key' => $this->api_key,
            'api_code'=>$api_code,
            'method'=>'balance',
            'username' => substr($username,0,9),
            'password'=>'qy123456'
        );
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain;
        }else{
            $url = 'http://'.$this->domain;
        }
        
        
        $receive = $this->send_post($url,$post_data);
        // dump(json_decode($receive,true));die;
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
    public function betrecord($startDate,$endDate,$page,$limit,$plat_type='',$game_type='',$username='',$idStr='',$timeType=''){
        $plat_type = strtolower($plat_type);
        $code = md5($this->api_key.$this->api_id.$startDate.$endDate);
        $post_data = [
            'plat_type' => $plat_type,
            'game_type' => $game_type,
            'username' => $username,
            'idStr' => $idStr,
            'sign_key' => $this->api_key,
            'startTime' => $startDate,
            'endTime' => $endDate,
            'page' => $page,
            'limit' => $limit,
            'code' => $code,
            'timeType' => $timeType
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/record-all';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/record-all';
        }
        //dd($post_data);
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
        $post_data = array(
            'api_id' => $this->api_id,
            'api_key' => $this->api_key,
            'api_code'=>$api_code,
            'method'=>'credit'
        );
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain;
        }else{
            $url = 'http://'.$this->domain;
        }
        // $plat_type = strtolower($api_code);
        // $code  = md5($this->api_key.$this->api_id.$plat_type);
        // $post_data = [
        //     'plat_type' => $plat_type,
        //     'sign_key' => $this->api_key,
        //     'code' =>$code
        // ];

        // if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
        //     $url = $this->domain.'/v1/user/credit';
        // }else{
        //     $url = 'http://'.$this->domain.'/v1/user/credit';
        // }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /*
    * 商户余额查询总额度
    */
    public function credit_all(){
        $post_data = array(
            'api_id' => $this->api_id,
            'api_key' => $this->api_key,
            'api_code'=>'LYC',
            'method'=>'credit'
        );
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain;
        }else{
            $url = 'http://'.$this->domain;
        }
        // $code  = md5($this->api_key.$this->api_id);
        // $post_data = [
        //     'sign_key' => $this->api_key,
        //     'code' =>$code
        // ];

        // if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
        //     $url = $this->domain.'/v1/user/all-credit';
        // }else{
        //     $url = 'http://'.$this->domain.'/v1/user/all-credit';
        // }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }
    protected function send_post($url,$post_data) {
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
}