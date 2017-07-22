<?php
class MY_Controller extends CI_Controller{

    public $token;
    public $admin;//用户信息
    public $sn;//域名
    //不需要token验证的接口
    public $no_check_url=[
        'login'=>['index'],
        'test'
    ];
    public $url;

    public function __construct()
    {
        parent::__construct();

        //设置错误级别
        error_reporting(E_ALL ^ E_NOTICE);
        //设置时区
        date_default_timezone_set('PRC');
        //加载项目常量
        require_once APPPATH.'/config/ww.php';
        //加载数据库
        $this->load->database();
        //加载redis
        $this->load->library('my_redis','','redis');
        //加载应用函数
        $this->load->helper('common');
        //api接口初始化
        $this->init();
    }
    //api接口初始化
    function init()
    {
        if (!is_cli()) {
            header("Access-Control-Allow-Origin:*");//允许跨域访问
        }
        //探测请求
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
            header("Access-Control-Allow-Headers: Accept, Authorization, Content-Type, Pragma, Origin, Cache-Control, AuthToken, FROMWAY");
            exit;
        }
        if(!$this->is_no_check())
        {
            $this->check_token();
        }
    }

    /**
     * ww:是否不需要验证token
     * @return bool
     */
    function is_no_check(){
        $classArr=[];
        foreach ($this->no_check_url as $key=>$value){
            $classArr[]=is_numeric($key)?$value:$key;
        }
        if(!in_array($this->router->class,$classArr)) {
            return false;
        }
        $method=$this->no_check_url[$this->router->class];
        if($method&&!in_array($this->router->method,$method)){
            return false;
        }
        return true;
    }
    //检查token
    function check_token()
    {
        $auth=get_auth_headers(TOKEN_CODE_AUTH);
        $this->token=$auth;
        if(!$this->token)
        {
            return_json('token不存在');
        }
        $tokenKey = 'token:'.TOKEN_CODE_ADMIN.':'.$this->token;
        $data=$this->redis->get($tokenKey);
        if(!$data)
        {
            return_json('未登陆或token无效');
        }
        if(isset($data['be_outed_time']))
        {
            $this->redis->del($tokenKey);
            return_json('您的账号在其他地方登陆');
        }
        //规定多长时间必须登陆一次
        if($_SERVER['REQUEST_TIME']-$data['login_time']>MUST_LOGIN_TIME_INTERVAL)
        {
            $this->redis->del('token_ID:'.TOKEN_CODE_ADMIN.':'.$data['id']);
            $this->redis->del($tokenKey);
            return_json('token失效');
        }
        //检查token是否超过有效时间
        if($_SERVER['REQUEST_TIME']-$data['visit_time']>MAX_LIFE_TIME)
        {
            $this->redis->del($tokenKey);
            return_json('token失效');
        }
        $data['visit_time']=$_SERVER['REQUEST_TIME'];
        $this->redis->set($tokenKey,$data,MAX_LIFE_TIME);//更新最后访问时间
        $this->admin=$data;//记录用户信息
    }

    /**
     * @param $code
     * @param $msg
     * @param null $sid
     * @return bool
     */
    public function push($code,$msg,$sid =null){
        if(empty($code) || empty($msg)){
            return false;
        }
        error_reporting(0);
        $this->load->library('mqtt',array('address'=>SOCKET_SERVER, 'port'=>SOCKET_PORT,'clientid'=>'MQTT CLIENT'));
        if ($this->mqtt->connect()) {
            $this->mqtt->publish('u/demo',json_encode(array('code'=>$code,'msg'=>$msg,'sid'=>$sid)),0);
            $this->mqtt->close();
        }
        else{
            return_json('mqtt连接异常');
        }
    }

    /**
     * 跳转到登录页面或跳转提示。注：和域名重定向有所不同，如果是ajax并不会跳转页面
     * @param $url
     */
    public function go_to($url){
        if($this->input->is_ajax_request()){
            header("Content-Type:application/json;charset=utf-8");
            echo json_encode(array('info'=>'登录过期，请重新登录','status'=>-1));exit;
        }
        header("Location:$url");
    }


}