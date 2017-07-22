<?php
class Login extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }
    /**
     * ww 登陆
     */
    function index()
    {
        //return_json($this->redis->del_all());
        if($this->redis->get('times')>=MAX_ERROR_TIMES){
            return_json('请一小时后重新登录');
        }
        if(!$data=$this->login_model->check('','login')){
            return_json($this->login_model->getError);
        }
        $info=$this->login_model->get_userInfo();
        if($info['password']!=$data['password']){
            $this->redis->incr('times');

            if($this->redis->get('times')==MAX_ERROR_TIMES){
                $this->redis->expire('times',3600);
            }
            return_json('密码输入有误');
        }
        $this->redis->del('times');
        $info['login_time']=$_SERVER['REQUEST_TIME'];//记录登陆的时间
        $info['visit_time']=$_SERVER['REQUEST_TIME'];//记录最后访问的时间
        unset($info['password']);
        $token=$this->get_token($info);
        return_json('登陆成功',['token'=>$token],1);
    }

    /**
     * ww:用token保存用户信息并返回token
     * @param $userInfo
     * @return string
     */
    function get_token($userInfo)
    {
        $this->load->helper('token');
        $mr = explode('.', microtime(true));
        $t = strval(substr($mr[0],3).$mr[1]);
        $tokenStr = TOKEN_PRIVATE_ADMIN_KEY.$t.uniqid();
        $token = token_encrypt($tokenStr,TOKEN_PRIVATE_ADMIN_KEY);//token密码
        //redis记录用户信息的键值
        $tokenKey='token:'.TOKEN_CODE_ADMIN.':'.$token;
        //redis里用token_ID(基于用户id)记录token
        $tokenIDKey='token_ID:'.TOKEN_CODE_ADMIN.':'.$userInfo['id'];
        if($existToken=$this->redis->get($tokenIDKey))
        {
            $data=$this->redis->get('token:'.TOKEN_CODE_ADMIN.':'.$existToken);
            $data['be_outed_time']=$_SERVER['REQUEST_TIME'];//有人登陆,记录被踢出的时间
            $this->redis->set('token:'.TOKEN_CODE_ADMIN.':'.$existToken,$data,MAX_LIFE_TIME);
        }
        $this->redis->set($tokenKey,$userInfo,MAX_LIFE_TIME);
        $this->redis->set($tokenIDKey,$token,MAX_LIFE_TIME);
        return $token;
    }

    /**
     * ww
     */
    function logout()
    {
        if(!$this->admin){
            return_json('参数异常');
        }
        $this->redis->del('token:'.TOKEN_CODE_ADMIN.':'.$this->token);
        $this->redis->del('token_ID:'.TOKEN_CODE_ADMIN.':'.$this->admin['id']);
        return_json('退出成功');
    }

}