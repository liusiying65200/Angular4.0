<?php
class Index extends MY_Controller {

    public function __construct(){
        parent::__construct();

    }

    public function index()
    {
        return_json('api接口连接成功',$this->redis->get_all());
    }
}