<?php 
namespace app\index\model;
use think\Model;
class Cp extends Model
{
	// 查询
	public function selectcp($number)
	{
		parent::initialize();
		//$user = User::all();
		$cpone = Db::table('cp')->where('id',$number)->find();
		//$caipiao = Cp::get($number);
		return $cpone;
	}

}