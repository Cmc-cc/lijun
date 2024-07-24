<?php
namespace App\Services;
use App\Models\SystemConfig;

class JzService{
//API 密钥
    static $secretKey = '06bcf6e7823a4c0f46f6492b933c68bc';
    //商户标识
    static $merchantId = '6d1f6dd7cae2de8be9ff4e6fab655e1c';
    //加密方式
    static $signatureMethod = 'HmacSHA256';
    //加密版本
    static $signatureVersion = 1;
    //URL
    public $primary_url = "https://dapi.jzpay.vip/jzpay_exapi/v1/";

    public $back_url = "https://dapi.i2605.com/jzpay_exapi/v1/";

    public $url = '';
    //请求数据
    public $data;
    //公共基础参数
    protected $basics_array = [];

    public $sys;
    /**
     * 初始化
     * @param array $url_version primary 主 back 备
     */
    function __construct($url_version='primary'){ //初始化对象，将初始化值放在括号内
        if($url_version == 'primary'){
            $this -> sys = SystemConfig::findOrFail(1);
            $this->url = $this->sys->third_pay_url;
        }else{
            $this->url = $this->back_url;
        }
        $this->basics_array = [
            'signatureMethod' 	=> self::$signatureMethod,
            'signatureVersion'	=> self::$signatureVersion,
            //'merchantId' 		=> self::$merchantId,
            'merchantId' 		=> $this->sys->third_userid,
            'timestamp'			=> $this->msectime(),

        ];
    }
    /**
     * 创建订单
     * @param array $data
     * @return array|mixed|string
     */
    public function createOrder($data=array()){
        $this->url .= 'order/createOrder';
        $res = $this->createArray($data);
        return $res;
    }
    /**
     * 查询订单
     * @param array $data
     * @return array|mixed|string
     */
    public function queryOrder($data=array()){
        $this->url .= 'order/queryOrder';
        $res = $this->createArray($data);
        return $res;
    }
    /**
     * 验证回调
     * @param array $get get 数据
     * @param array $data post body 数据
     * @return array|mixed|string
     */
    public function VerificationNotify($get,$data){
        $return = [
            'code' => 1,
            'message' => 'ok',
            'data' => '',
        ];
        $get_array = [
            'signatureMethod' 	=> $get['signatureMethod'],
            'signatureVersion'	=> $get['signatureVersion'],
            'merchantId' 		=> $get['merchantId'],
            'timestamp'			=> $get['timestamp'],
        ];
        //反向body
        parse_str($data,$data_array);

        $signature = $get['signature'];
        // unset($get['signature']);
        if(is_array($data_array)){
            $signArray = array_merge($get_array,$data_array);
        }else{
            $signArray = $get_array;
        }
        //获得加密数据
        $req_signature = $this->createSign($signArray,$this->sys->third_userkey);

        if($req_signature === $signature){
            //解析成功
            //这里建议再按照订单号重新查询一下金钻支付后台订单，再做入账（这个会是我们的推荐做法，加强安全）
            //订单状态为完成情况
            if($data_array['status'] == 3){
                //再次查询订单确保状态
                $res_data['orderId'] = $data_array['orderId'];
                $order = $this->queryOrder($res_data);

                if($order['data']['status'] == 3){
                    // 当然 这里可以做进一步操作，比如查询出 订单金额是否与系统内一致，不一致就不入账（做异常炒作）等操作；
                    //例子
                    //注意 php 要转换浮点数，不然精度有可能差异
                    // if((float)$data_array['actualAmount'] == '300'){

                    // }
                    // if($order['data'][''])
                    $return['code'] = 0;
                    //这里处理相应的商户入账操作，也可以改下在外部处理
                }
            }


            // $this->queryOrder();


        }else{
            //失败
            //这里处理相应的商户异常操作，也可以改下在外部处理
            // $return['code'] = 1;
        }
        return $return;
    }
    /**
     * 数组处理分开加密url数据
     * @param array $data
     * @return string
     */
    protected function createArray($data=array()){

        if(is_array($data)){
            //存在body的话 加入签名
            $signArray = array_merge($this->basics_array,$data);
        }else{
            //不存在基础参数 签名
            $signArray = $this->basics_array;
        }

        //获得加密数据
        $req_signature = $this->createSign($signArray,$this->sys->third_userkey);

        //url数据
        $url = '?'.http_build_query($this->basics_array).'&signature='.$req_signature;
        // $return_url = $this->createArray($data);
        $curl_curl =  $this->url.$url;
        $res = $this->externalRequestPost($curl_curl,$data);
        return $res;
    }

    /**
     * 创建签名，参数按 asc 码排序，hmacSHA25 签名，把签名结果转成大写 返回签名结果
     * @param array 数组
     * @param secretKey * @return
     */

    public function createSign($array, $secretKey){
        //倒序排序
        ksort($array);
        //以&拼接参数 返回处理 链接特殊符号
        $req_params2 = urldecode(http_build_query($array));
        //加密处理，转大写
        $req_signature =  strtoupper(hash_hmac('sha256', $req_params2, $secretKey, false));
        return $req_signature;
    }
    //返回当前的毫秒时间戳
    protected function msectime() {
        list($msec, $sec) = explode(' ', microtime());
        $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return $msectime;
    }
    /**
     * @param $url
     * @param array $data
     * @param string $contentType
     * @return array|mixed|string
     */
    private function externalRequestPost($url, $data = array()){
        $data = http_build_query($data);
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL,  $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
        //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
        $tmpInfo = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            return 'Errno' . curl_error($curl);
        }
        curl_close($curl); // 关键CURL会话
        $data = json_decode($tmpInfo,true);
        return $data;

    }
}