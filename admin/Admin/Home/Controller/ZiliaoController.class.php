<?php
namespace Home\Controller;
use Think\Controller;
use Common\Controller\AuthController;
use Think\Auth;
use Think\Db;
use OT\Database;

class ZiliaoController extends AuthController {
 
public function liuxiao(){
$Daoinfo= M("liuxiao");
$count  =$Daoinfo->count();
$Page   = new  \Common\Page($count,20);
$show   = $Page->paging();
$parent=$Daoinfo->where('id')->order("id DESC")->limit($Page->limit)->select();  
$this->assign('list',$parent);
$this->assign('page',$show);// 赋值分页输出
$this->display();
} 



	public function liuxiao_add(){
		$this->display();
	}

    public function liuxiao_runadd(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$liuxiao=M('liuxiao');
    			$sldata=array(
    					'qihao'=>I('qihao'),
						'liuxiao'=>I('liuxiao'),
						'shaxiao'=>I('shaxiao'),
						'jg'=>I('jg'),
						'haoma'=>I('haoma'),
						'que'=>I('que'),						
    					'begtime'=>time(),
    			);
    			$liuxiao->field('qihao,liuxiao,shaxiao,jg,haoma,que,begtime')->add($sldata);
    			$this->success('添加成功',U('liuxiao'),1);
    	}
    }

 
    public function liuxiao_edit(){
		$id=I('id');
    	$liuxiao=M('liuxiao')->where(array('id'=>$id))->find();
    	$this->assign('liuxiao',$liuxiao);
    	$this->display();
    }

    public function liuxiao_runedit(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$liuxiao=M('liuxiao');
    			$sldata=array(
    					'id'=>I('id'),
    					'qihao'=>I('qihao'),
						'liuxiao'=>I('liuxiao'),
						'shaxiao'=>I('shaxiao'),
						'jg'=>I('jg'),
						'haoma'=>I('haoma'),
						'que'=>I('que'),	
    			);
    			M('liuxiao')->field('id,qihao,liuxiao,shaxiao,jg,haoma,que')->save($sldata);
    			$this->success('修改成功',U('liuxiao'),1);
    	}
    }

	
 
 
 
public function tms(){
$Daoinfo= M("tms");
$count  =$Daoinfo->count();
$Page   = new  \Common\Page($count,10);
$show   = $Page->paging();
$parent=$Daoinfo->where('id')->order("id DESC")->limit($Page->limit)->select();  
$this->assign('list',$parent);
$this->assign('page',$show);// 赋值分页输出
$this->display();
} 

public function pt(){
$Daoinfo= M("pt");
$count  =$Daoinfo->count();
$Page   = new  \Common\Page($count,20);
$show   = $Page->paging();
$parent=$Daoinfo->where('id')->order("id DESC")->limit($Page->limit)->select();  
$this->assign('list',$parent);
$this->assign('page',$show);// 赋值分页输出
$this->display();
} 


	public function pt_add(){
		$this->display();
	}

    public function pt_runadd(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$pt=M('pt');
    			$sldata=array(
    					'qihao'=>I('qihao'),
						'pt'=>I('pt'),
						'jg'=>I('jg'),
    					'begtime'=>time(),
    			);
    			$pt->field('qihao,pt,jg,begtime')->add($sldata);
    			$this->success('添加成功',U('pt'),1);
    	}
    }

    public function pt_edit(){
		$id=I('id');
    	$pt=M('pt')->where(array('id'=>$id))->find();
    	$this->assign('pt',$pt);
    	$this->display();
    }

    public function pt_runedit(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$pt=M('pt');
    			$sldata=array(
    					'id'=>I('id'),
    					'qihao'=>I('qihao'),
						'pt'=>I('pt'),
						'jg'=>I('jg'),						
    			);
    			M('pt')->field('id,qihao,pt,jg')->save($sldata);
    			$this->success('修改成功',U('pt'),1);
    	}
    }

	

	public function tms_add(){
		$this->display();
	}

    public function tms_runadd(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$tms=M('tms');
    			$sldata=array(
    					'qihao'=>I('qihao'),
						'temashi'=>I('temashi'),
						'tema'=>I('tema'),
						'jieshi'=>I('jieshi'),
						'bose'=>I('bose'),
						'shengxiao'=>I('shengxiao'),
    					'begtime'=>time(),
    			);
    			$tms->field('qihao,temashi,tema,jieshi,bose,shengxiao,begtime')->add($sldata);
    			$this->success('添加成功',U('tms'),1);
    	}
    }

 
    public function tms_edit(){
		$id=I('id');
    	$tms=M('tms')->where(array('id'=>$id))->find();
    	$this->assign('tms',$tms);
    	$this->display();
    }

    public function tms_runedit(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$tms=M('tms');
    			$sldata=array(
    					'id'=>I('id'),
    					'qihao'=>I('qihao'),
						'temashi'=>I('temashi'),
						'tema'=>I('tema'),
						'jieshi'=>I('jieshi'),
						'bose'=>I('bose'),
						'shengxiao'=>I('shengxiao'),						
    			);
    			M('tms')->field('id,qihao,temashi,tema,jieshi,bose,shengxiao')->save($sldata);
    			$this->success('修改成功',U('tms'),1);
    	}
    }
    
	
    //特码诗广告设置
    public function tmsad(){
    	$tms_ad=M('tms_ad')->where(array('id'=>1))->find();
    	$this->assign('tms_ad',$tms_ad)->display();
    }
    
    //保存特码诗广告设置
    public function runtmsad(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$tms_ad=M('tms_ad');
    		if (!$tms_ad->autoCheckToken($_POST)){
    			$this->error('表单令牌错误',0,0);
    		}else{
    			$sl_data=array(
    					'id'=>I('id'),
						'biaoti'=>I('biaoti'),
    					'ad_1'=>I('ad_1','','htmlspecialchars'),
    					'ad_2'=>I('ad_2','','htmlspecialchars'),
    					'ad_3'=>I('ad_3','','htmlspecialchars'),
    					'ad_4'=>I('ad_4','','htmlspecialchars'),
    					'ad_5'=>I('ad_5','','htmlspecialchars'),
						'ad_6'=>I('ad_6','','htmlspecialchars'),
    			);
	    		$tms_ad->field('id,biaoti,ad_1,ad_2,ad_3,ad_4,ad_5,ad_6')->save($sl_data);
	    		$this->success('特码诗广告保存成功',U('tms_ad'),1);
    		}
    		
    	}
    }

	

}