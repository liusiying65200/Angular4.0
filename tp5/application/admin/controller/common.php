<?php
namespace app\admin\controller;
class Common extends \think\Controller {

    public $userid=1;

    public $roleid=1;

    public function __construct() {

        parent::__construct();

        require_once APP_PATH.'init.php';

        date_default_timezone_set('PRC');

    }

    /**
     * 后台进入判断；
     */
    final public function check_admin(){
        //没有登录跳转到登录界面
        if(!$_SESSION['userid']||!$_SESSION['roleid']) $this->go_to('public/login');
        $this->userid=session('userid');
        $this->roleid=session('roleid');
        //检查访问权限
        if(!in_array($this->url, $this->getAccessUrl())){
            echo '<h1>Forbidden</h1>';
            exit();
        }

        //得到菜单
        $this->assign('menu', $this->getMenus());
        //活跃菜单,根据菜单唯一标识实现高亮菜单
        $this->assign('url', $this->url);
        $this->assign('menu_id',$this->controller);
    }
    /**
     * 得到每类角色所能访问的url地址
     */
    final public function getAccessUrl(){
        if(cache('accessUrl_'.$this->roleid)){
            $access=cache('accessUrl_'.$this->roleid);
        }else{
            $this->updateAccessUrlCache($this->roleid);
            $access=cache('accessUrl_'.$this->roleid);
        }
        return $access;
    }
    /**
     * 更新每类角色所能访问的url地址到redis缓存
     * @param $roleid 角色id
     */
    public function updateAccessUrlCache($roleid){
        $rules=M('role')->field('rules')->where('id='.$roleid)->find();
        $auth_id='('.$rules['rules'].')';
        $access_url=M('auth')->field('url')->where('id in '.$auth_id.' and status=1')->select();
        $access=array();
        for($i=0;$i<sizeof($access_url);$i++){
            $size=sizeof(explode("/", $access_url[$i]['url']));
            if($size==1)
                $access[$i]=$access_url[$i]['url'].'/login/login';
            if($size==2)
                $access[$i]=$access_url[$i]['url'].'/login';
            if($size==3)
                $access[$i]=$access_url[$i]['url'];
        }
        cache('accessUrl_'.$roleid,$access);
    }
    /**
     * 跳转到登录页面或跳转提示。注：和域名重定向有所不同，如果是ajax并不会跳转页面
     */
    public function go_to($url){
        if(IS_AJAX){
            header("Content-Type:application/json");
            echo json_encode(array('info'=>'登录过期，请重新登录','status'=>-1));exit();
        }
        header('Location:'.$url);
    }


}