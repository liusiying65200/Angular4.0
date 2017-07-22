<?php
namespace Home\Controller;
use Think\Controller; 
Class CommonController extends Controller{
	
    Public function _initialize()
    {
        $this->assign('Admin_title','后台管理系统 v1.0');
        if (!isset($_SESSION['aid'])){
//            if(session('?Admin_User')){
//                $this->assign('Admin_User',session('Admin_User'));
//                $this->assign('Admin_Uid',session('Admin_Uid'));
//            }else{
                $this->redirect('Home/Administrator/login');
            //}
        }
    }

    /**
     * ajax分页及分页数据
     * @param $model 数据库表名
     * @param $where 条件
     * @param $order 排序
     * @param $listRows='' 每页显示行数
     * @return array
     */
    public function getPageInfo($model,$where,$order,$listRows,$link){
        $total=M($model)->where($where)->count();
        $pageobj=new \Common\PageAjax($total,$listRows,$link);
        $pageobj->rollPage='5';
        $pageobj->clickfunc='load_table';
        $list=M($model)->where($where)->order($order)->limit(($pageobj->nowPage-1)*$listRows,$listRows)->select();
        if(!$list){
            $list=M($model)->where($where)->order($order)->limit(($pageobj->nowPage-2)*$listRows,$listRows)->select();
        }
        $this->assign('showPageHtml',$pageobj->show());
        $this->assign('curPage',$pageobj->nowPage);
        return $list;
    }
}