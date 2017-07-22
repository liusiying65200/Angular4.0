<?php
namespace app\admin\controller;
class Index extends Common{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view();
    }

    /**
     * 菜单
     */
    public function getMenu()
    {
        $rules=db('role')->field('rules')->where('id='.$this->roleid)->find();
        $auth_id='('.$rules['rules'].')';
        $list=db('auth')->where('id in '.$auth_id.' and category in (1,2) and status=1')->order('sort asc')->select();
        $menus = list_to_tree($list);
        echo json_encode($menus);
//        if(cache('menu_'.$this->roleid)){
//            $menus=cache('menu_'.$this->roleid);
//        }else{
//            $this->updateMenusCache($this->roleid);
//            $menus=cache('menu_'.$this->roleid);
//        }
//        return $menus;

    }

    /**
     * @param $roleid
     */
    public function updateMenusCache($roleid){
        $rules=db('role')->field('rules')->where('id='.$roleid)->find();
        $auth_id='('.$rules['rules'].')';
        $list=db('auth')->where('id in '.$auth_id.' and category in (1,2) and status=1')->order('sort asc')->select();
        $menus = list_to_tree($list);
        cache('menu_'.$roleid,$menus);

    }

}
