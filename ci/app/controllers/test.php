<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/7/10
 * Time: 上午11:33
 */
class Test extends MY_Controller {

    public function index(){
        $rs=$this->db->get('admin')->result_array();
        header("Content-Type:application/json;charset=utf-8");
        echo json_encode($rs);
    }

    public function mqtt()
    {
        $this->push('ww','您的账号已在其他地方登陆');
    }
}