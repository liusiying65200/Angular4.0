<?php
class login_model extends MY_Model
{

    public $getError = '';

    protected $pk='id';//当前表的主键

    public function __construct()
    {
        parent::__construct();

        $this->table = 'admin';
    }

    //规则
    protected $rule = [
        'username|用户名'=>'require|min:4|',
        'password|密码'=>'require|min:4'
    ];
    //消息提示
    protected $message = [
        'username.check_user_is_exists'=>'用户名不存在',
    ];
    //验证规则扩展
    protected $extend = [
        'check_user_is_exists' => 'check_user_is_exists',//规则=>回调函数
    ];
    //验证场景
    protected $scene = [
        'login'  =>  ['username'=>'require|check_user_is_exists','password'],
    ];
    //数据手动处理
    protected function handle($data){
        $data['password']=md5($data['password']);
        return $data;
    }
    //通过用户名得到一行信息
    function get_userInfo()
    {
        return $this->get_one('*',['username'=>get('username')]);
    }
    //检查用户名是否存在
    function check_user_is_exists()
    {
        return $this->get_userInfo()?true:false;
    }


}
