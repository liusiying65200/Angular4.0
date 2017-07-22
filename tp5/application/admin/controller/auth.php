<?php
namespace app\admin\controller;
class Auth extends Common{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $list=db('auth')->limit(0,10)->select();
        return view('',['list'=>$list]);
    }

    public function add()
    {
        if(IS_POST){

        }else{
            return view();
        }
    }


}
