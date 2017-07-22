<?php
namespace Home\Controller;
class NoticeController extends \Common\Controller\AuthController {

    public $table_name='notice';

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $map=[];
        if(!empty($_GET['keyword'])){
            $map['title']=['like',"%".$_GET['keyword']."%"];
            $this->assign('keyword',I('get.keyword'));
        }
        $count  =M($this->table_name)->count();
        $Page   = new  \Common\Page($count,30);
        $show   = $Page->paging();
        $list = M($this->table_name)->where($map)->order("id desc")->limit($Page->limit)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    function add()
    {
        if (IS_POST) {
            if(!$_POST['title']){
                $this->error('标题为空');
            }
            $id=M('notice')->add(I('post.'));
            if($id) {
                $this->success('保存成功');
            }else{
                $this->error('保存失败');
            }
        }else {
            $this->display();
        }
    }


    function edit()
    {
        if (IS_POST) {
            if(!$_POST['title']){
                $this->error('标题为空');
            }
            $id=M('notice')->save(I('post.'));
            if($id) {
                $this->success('保存成功');
            }else{
                $this->error('保存失败');
            }
        }else {
            $this->assign('row',M($this->table_name)->find($_GET['id']));
            $this->display();
        }
    }

    function del(){
        if(!$_POST['id']) $this->error('未选择数据');
        M($this->table_name)->delete($_POST['id']);
        $this->success('删除成功');
    }
}