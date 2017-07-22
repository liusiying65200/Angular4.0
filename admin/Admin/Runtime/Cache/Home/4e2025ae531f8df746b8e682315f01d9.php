<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Wmzz-Lhc网站后台系统管理</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/lh3/Public/js/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="/lh3/Public/js/assets/css/font-awesome.css" />
		<link rel="stylesheet" href="/lh3/Public/css/font-awesome.min.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="/lh3/Public/js/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/lh3/Public/js/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/lh3/Public/js/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
        <link rel="stylesheet" href="/lh3/Public/js/assets/css/slackck.css" />
		<!-- ace settings handler -->
		<script src="/lh3/Public/js/assets/js/ace-extra.js"></script>
		<script src="/lh3/Public/js/assets/js/jquery.min.js"></script>
		<script src="/lh3/Public/js/assets/js/jquery.form.js"></script>
		<script src="/lh3/Public/js/assets/layer/layer.js"></script>


		<!--<script src="<?php echo (JS_URL); ?>/assets/js/jquery.leanModal.min.js"></script>-->

		<!--[if lte IE 8]>
		<script src="/lh3/Public/js/assets/js/html5shiv.js"></script>
		<script src="/lh3/Public/js/assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default    navbar-collapse">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
		
			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>
				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="<?php echo U('Index/index');?>" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Wmzz-Lhc
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->
					<button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons">
						<span class="sr-only">Toggle user menu</span>

						<img src="/lh3/Public/js/assets/avatars/user.jpg" alt="Jason's Photo" />
					</button>

					<!-- /section:basics/navbar.toggle -->
				</div>
				
				
				
				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">
					<li class="transparent"></li>
					<li class="transparent">
						<a style="cursor:pointer;" id="cache" class="dropdown-toggle">清除缓存</a>
					</li>
			
						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/lh3/Public/js/assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>管理员</small>
									<?php echo ($_SESSION['admin_username']); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li class="divider"></li>

								<li>
									<a href="javascript:;"  id="logout">
										<i class="ace-icon fa fa-power-off"></i>
										注销
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>


<script type="text/javascript">
$(document).ready(function(){
	$("#logout").click(function(){
		layer.confirm('你确定要退出吗？', {icon: 3}, function(index){
	    layer.close(index);
	    window.location.href="<?php echo U('Administrator/logout');?>";
	});
	});
});



$(function(){
$('#cache').click(function(){
if(confirm("确认要清除缓存？")){
var $type=$('#type').val();
var $mess=$('#mess');
$.post('/lh3/index.php/Home/Ziliao/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
});
</script>
<STYLE type=text/css>

TD {
	FONT-STYLE: normal; FONT-SIZE: 9pt
}

TABLE {
	COLOR: #000000; FONT-SIZE: 9pt
}
UNKNOWN {
	PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px
}
TABLE {
	COLOR: #000000; FONT-SIZE: 9pt
}
TD {
	COLOR: #000000; FONT-SIZE: 9pt
}
.title_283 {
	TEXT-ALIGN: center; BACKGROUND-COLOR: #0460bb; COLOR: #ffffff; FONT-SIZE: 13px
}
.main_760 {
	BORDER-BOTTOM: #d2d3d9 1px solid; TEXT-ALIGN: center; BORDER-LEFT: #d2d3d9 1px solid; PADDING-BOTTOM: 2px; PADDING-LEFT: 8px; PADDING-RIGHT: 2px; FONT-SIZE: 14px; BORDER-TOP: #d2d3d9 1px solid; BORDER-RIGHT: #d2d3d9 1px solid; PADDING-TOP: 2px
}
.t5 {
	BORDER-BOTTOM: #c7e1ef 1px solid; BORDER-LEFT: #c7e1ef 1px solid; BORDER-TOP: #c7e1ef 1px solid; BORDER-RIGHT: #c7e1ef 1px solid
}
.t5 {
	MARGIN: 0px auto 10px; HEIGHT: auto; OVERFLOW: hidden
}
.r_one {
	BACKGROUND: #f5fcff
}
.tr1 TH {
	TEXT-ALIGN: left; PADDING-BOTTOM: 5px; PADDING-LEFT: 10px; PADDING-RIGHT: 10px; VERTICAL-ALIGN: top; FONT-WEIGHT: normal; PADDING-TOP: 5px
}
.tpc_content {
	PADDING-BOTTOM: 2em; LINE-HEIGHT: 2em; MARGIN: 0px; PADDING-LEFT: 15px; PADDING-RIGHT: 15px; FONT-FAMILY: Arial; PADDING-TOP: 0px
}
.qs36{
	font-size: 30px;
	color: #000000;
	font-weight: bold;
}
.q36{
	font-size: 30px;
	color: #6699CC;
	font-weight: bold;
}
.z14r {color: #FF0000;font: bold 14px "华文中宋";}
.xj1{font: bold 16px "华文中宋";
	color: #0000FF;
}
.xj2{font: bold 24px "华文中宋";
	color: #0000FF;
}
.xj3{
	font: bold 18px "华文中宋";
	color: #0000FF;
}
.xj4t{
	font: bold 30px "华文中宋";
	color: #FF0000;
}
.xj4b{
	font: bold 30px "华文中宋";
	color: #000000;
}
.z12z1 {font-size: 12px;
	color:#6633CC;
}
.tdz{text-align: left;}
.z14{
	font-size: 16px;
}
.gg116 {color: #FF0000;font: bold 16px "华文中宋";}
.xj2h{
	font: bold 24px "华文中宋";
	color: #FF0000;
}
.xj3h{
	font: bold 18px "华文中宋";
	color: #FF0000;
}
.xj1h{
	font: bold 16px "华文中宋";
	color: #FF0000;
}
.bs18{
	font-size: 20px;
	font-weight: bold;
	color: #FFFFFF;
}
.hs18{
	font-size: 20px;
	font-weight: bold;
	color: #FFFF33;
}
.xj3f{
	font: bold 18px "华文中宋";
	color: #FF00FF;
}
.z161 {	font: bold 16px "华文中宋";
	color: #FF00FF;
}
.bgff00{
	background: #FFFFCC;
}
</STYLE>
<link href="<?php echo (CSS_URL); ?>common.css" rel="stylesheet" type="text/css"/>
		<div class="main-container" id="main-container">


			<div id="sidebar" class="sidebar responsive">

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<!--左侧顶端按钮-->
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<a class="btn btn-success" href="<?php echo U('Article/index');?>" role="button" title="文章列表"><i class="ace-icon fa fa-signal"></i></a>
			<a class="btn btn-info" href="<?php echo U('Article/info_add');?>" role="button" title="添加文章"><i class="ace-icon fa fa-pencil"></i></a>
			<a class="btn btn-warning" href="<?php echo U('Kaijiang/index');?>" role="button" title="开奖管理"><i class="ace-icon fa fa-users"></i></a>
			<a class="btn btn-danger" href="<?php echo U('Sys/sys');?>" role="button" title="站点设置"><i class="ace-icon fa fa-cogs"></i></a>
		</div>
        <!--左侧顶端按钮（手机）-->
		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<a class="btn btn-success" href="<?php echo U('Article/index');?>" role="button" title="文章列表"></a>
			<a class="btn btn-info" href="<?php echo U('Article/info_add');?>" role="button" title="添加文章"></a>
			<a class="btn btn-warning" href="<?php echo U('Kaijiang/index');?>" role="button" title="开奖管理"></a>
			<a class="btn btn-danger" href="<?php echo U('Sys/sys');?>" role="button" title="站点设置"></a>
		</div>
	</div>

				<ul class="nav nav-list">
			<?php use Common\Controller\AuthController; use Think\Auth; $m = M('auth_rule'); $field = 'id,name,title,css'; $data = $m->field($field)->where('pid=0 AND status=1')->order('sort')->select(); $auth = new Auth(); foreach ($data as $k=>$v){ if(!$auth->check($v['name'], $_SESSION['aid']) && $_SESSION['aid'] != 1){ unset($data[$k]); } } ?>

			<?php if(is_array($data)): foreach($data as $key=>$v): ?><li class="<?php if(CONTROLLER_NAME == $v['name']): ?>active open<?php endif; ?>"><!--open代表打开状态-->
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa <?php echo ($v["css"]); ?>"></i>
							<span class="menu-text">
								<?php echo ($v["title"]); ?>
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
				<?php $m = M('auth_rule'); $dataa = $m->where(array('pid'=>$v['id'],'menustatus'=>1))->order('sort')->select(); foreach ($dataa as $kk=>$vv){ if(!$auth->check($vv['name'], $_SESSION['aid']) && $_SESSION['aid'] != 1){ unset($dataa[$kk]); } } $id_4=$m->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME,'level'=>4))->field('pid')->find(); if($id_4){ $id_3=$m->where(array('id'=>$id_4['pid'],'level'=>3))->field('pid')->find(); }else{ $id_3=$m->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME,'level'=>3))->field('pid')->find(); if(!$id_3){ $id_2=$m->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME,'level'=>2))->field('id')->find(); $id_3['pid']=$id_2['id']; } } ?>
    <?php if(is_array($dataa)): foreach($dataa as $key=>$j): $m = M('auth_rule'); $dataaa = $m->where(array('pid'=>$j['id'],'status'=>1))->order('sort')->select(); foreach ($dataaa as $kkk=>$vvv){ if(!$auth->check($vvv['name'], $_SESSION['aid']) && $_SESSION['aid'] != 1){ unset($dataaa[$kkk]); } } ?>	
							<li class="<?php if(($_SESSION['se'] == $j['id'])): ?>active<?php endif; ?>">
								<a href="<?php echo U($j['name'],array('se'=>$j['id']));?>">
									<i class="menu-icon fa fa-caret-right"></i>
									<?php echo ($j["title"]); ?>
								</a>
								<b class="arrow"></b>
							</li><?php endforeach; endif; ?>
						</ul>
					</li><?php endforeach; endif; ?>
                    
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>


			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
					
					

							<div class="row maintop">
								<div class="col-xs-12 col-sm-8">

<form action="/lh3/index.php/Home/Ziliao/" method="get">

<input type="button" value="添加特码诗" onclick="location.href='/lh3/index.php/Home/Ziliao/tms_add.html'"  class="btn btn-xs btn-danger" />

</form>

								</div>

								
								
							</div>
							<div class="row">
							    <div class="col-xs-12">
										<div>

<div class="table-responsive">
<table width="100%" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th width="10%">彩票期号</th>
<th width="70%">特码诗</th>
<th width="10%">特码波色</th>
<th width="5%">生肖</th>
<th width="5%" style="border-right:#CCC solid 1px;">操作</th>
</tr>
</thead>
<tbody>								
<tr>
			<?php $ad=M('tms_ad')->where(array('id'=>1))->find(); ?>
<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr style="margin: 0px; padding: 0px">
			<td width="108" rowspan="2" id="td3477" style="font-size: 12px; font-style: normal; color: rgb(0, 0, 0); font-family: 宋体; border: 1px solid rgb(240, 145, 0); margin: 0px; padding: 3px">
			<table width="102" border="0" cellspacing="0" cellpadding="0" align="center" id="table18457" height="73" style="font-size: 12px; color: buttontext; cursor: default; margin: 0px; padding: 0px">
				<tbody style="margin: 0px; padding: 0px">
					<tr style="margin: 0px; padding: 0px">
						<td width="102" height="37" style="font-size: 16px; font-style: normal; color: rgb(0, 0, 0); font-family: arial, sans-serif, 宋体; margin: 0px; padding: 0px">
						<div align="center" style="margin: 0px; padding: 0px">
							<font size="6" style="margin: 0px; padding: 0px">
							<span style="margin: 0px; padding: 0px">
							<font style="margin: 0px; padding: 0px"><?php echo ($vo["qihao"]); ?><font color="#6699CC" style="margin: 0px; padding: 0px">期</font></span></font>
						</div>
						</td>
					</tr>
				</tbody>	
			</table>
			</td>
			<td width="609" id="td3478" height="47" style="font-size: 12px; font-style: normal; color: rgb(0, 0, 0); font-family: 宋体; border: 1px solid rgb(240, 145, 0); margin: 0px; padding: 3px">
			<p align="left"><b><font size="4">【一起发特码诗】-≤<font color="#0000FF"><?php echo ($vo["temashi"]); ?></font>≥-</font></b></td>
			<td width="127" rowspan="2" id="td3479" style="font-size: 12px; font-style: normal; color: rgb(0, 0, 0); font-family: 宋体; border: 1px solid rgb(240, 145, 0); margin: 0px; padding: 3px">
			<table width="127" border="0" cellspacing="0" cellpadding="0" id="table18458" style="font-size: 12px; color: buttontext; cursor: default; margin: 0px; padding: 0px">
				<tbody style="margin: 0px; padding: 0px">
					<tr style="margin: 0px; padding: 0px">
						<td style="font-size: 16px; font-style: normal; color: rgb(0, 0, 0); font-family: arial, sans-serif, 宋体; margin: 0px; padding: 0px">
						<div align="center" class="style326" style="font-size: x-small; margin: 0px; padding: 0px">
							特 碼－－波色</div>
						</td>
					</tr>
				</tbody>	
			</table>
			<table width="90" border="0" cellspacing="0" cellpadding="0" id="table18459" style="font-size: 12px; color: buttontext; cursor: default; margin: 0px; padding: 0px">
				<tbody style="margin: 0px; padding: 0px">
					<tr style="margin: 0px; padding: 0px">
						<td style="font-size: 16px; font-style: normal; color: rgb(0, 0, 0); font-family: arial, sans-serif, 宋体; margin: 0px; padding: 0px">
						<table width="63" border="0" cellspacing="0" cellpadding="0" id="table18460" style="font-size: 12px; color: buttontext; cursor: default; margin: 0px; padding: 0px">
							<tbody style="margin: 0px; padding: 0px">
								<tr style="margin: 0px; padding: 0px">
									<td style="font-size: 16px; font-style: normal; color: rgb(0, 0, 0); font-family: arial, sans-serif, 宋体; margin: 0px; padding: 0px">
									<div align="center" style="margin: 0px; padding: 0px">
										<font size="6" color="#FF0000"><b><?php echo ($vo["tema"]); ?></b></font>
									</div>
									</td>
								</tr>
							</tbody>	
						</table>
						</td>
						<td style="font-size: 16px; font-style: normal; color: rgb(0, 0, 0); font-family: arial, sans-serif, 宋体; margin: 0px; padding: 0px">
						<table width="65" border="0" cellspacing="0" cellpadding="0" id="table18461" style="font-size: 12px; color: buttontext; cursor: default; margin: 0px; padding: 0px">
							<tbody style="margin: 0px; padding: 0px">
								<tr style="margin: 0px; padding: 0px">
									<td style="font-size: 16px; font-style: normal; color: rgb(0, 0, 0); font-family: arial, sans-serif, 宋体; margin: 0px; padding: 0px">
									<div align="center" style="margin: 0px; padding: 0px">
										<font size="6"><b><?php echo ($vo["bose"]); ?></b></font>
									</div>
									</td>
								</tr>
							</tbody>	
						</table>
						</td>
					</tr>
				</tbody>	
			</table>
			</td>
			<td width="40" rowspan="2" id="td3480" style="font-size: 12px; font-style: normal; color: rgb(0, 0, 0); font-family: 宋体; border: 1px solid rgb(240, 145, 0); margin: 0px; padding: 3px">
			<table width="40" border="0" cellspacing="0" cellpadding="0" align="center" id="table18462" style="font-size: 12px; color: buttontext; cursor: default; margin: 0px; padding: 0px">
				<tbody style="margin: 0px; padding: 0px">
					<tr style="margin: 0px; padding: 0px">
						<td style="font-size: 16px; font-style: normal; color: rgb(0, 0, 0); font-family: arial, sans-serif, 宋体; margin: 0px; padding: 0px">
						<div align="center" class="style326" style="font-size: x-small; margin: 0px; padding: 0px">
							生 肖</div>
						</td>
					</tr>
				</tbody>	
			</table>
			<table width="40" border="0" align="center" cellpadding="0" cellspacing="0" id="table18463" height="62" style="font-size: 12px; color: buttontext; cursor: default; margin: 0px; padding: 0px">
				<tbody style="margin: 0px; padding: 0px">
					<tr style="margin: 0px; padding: 0px">
						<td style="font-size: 16px; font-style: normal; color: rgb(0, 0, 0); font-family: arial, sans-serif, 宋体; margin: 0px; padding: 0px" width="40">
						<table width="40" border="0" cellspacing="0" cellpadding="0" id="table18464" style="font-size: 12px; color: buttontext; cursor: default; margin: 0px; padding: 0px">
							<tbody style="margin: 0px; padding: 0px">
								<tr style="margin: 0px; padding: 0px">
									<td style="font-size: 16px; font-style: normal; color: rgb(0, 0, 0); font-family: arial, sans-serif, 宋体; margin: 0px; padding: 0px">
									<div align="center" style="margin: 0px; padding: 0px">
										<strong><font size="6"><?php echo ($vo["shengxiao"]); ?></font></strong>
										</div>
									</td>
								</tr>
							</tbody>	
						</table>
						</td>
					</tr>
				</tbody>	
			</table>
			</td>
			<td width="10" rowspan="2" id="td3477" style="font-size: 12px; font-style: normal; color: rgb(0, 0, 0); font-family: 宋体; border: 1px solid rgb(240, 145, 0); margin: 0px; padding: 3px">
			<table width="40" border="0" cellspacing="0" cellpadding="0" align="center" id="table18457" height="73" style="font-size: 12px; color: buttontext; cursor: default; margin: 0px; padding: 0px">
				<tbody style="margin: 0px; padding: 0px">
					<tr style="margin: 0px; padding: 0px">
						<td width="40" height="37" style="font-size: 12px; font-style: normal; color: rgb(0, 0, 0); font-family: arial, sans-serif, 宋体; margin: 0px; padding: 0px">
						<div align="center" style="margin: 0px; padding: 0px">
							<font size="3" style="margin: 0px; padding: 0px">
							<span style="margin: 0px; padding: 0px">
							<font style="margin: 0px; padding: 0px"><a href="/lh3/index.php/Home/Ziliao/tms_edit/id/<?php echo ($vo["id"]); ?>">修改</a></font></span></font>
						</div>
						</td>
					</tr>
				</tbody>	
			</table>
			</td>			
		</tr>
		<tr style="margin: 0px; padding: 0px">
			<td width="636" id="td3481" style="font-size: 12px; font-style: normal; color: rgb(0, 0, 0); font-family: 宋体; border: 1px solid rgb(240, 145, 0); margin: 0px; padding: 3px" height="38">
			<p align="left" style="margin: 0px; padding: 0px">
			<font face="微软雅黑">
			<b><font size="4" color="#0000FF">特码诗</font></b></font>：<b><font color="#FF0000" style="font-size: 9pt">解：</font></b><font color="#FF0000"><b><?php echo ($vo["jieshi"]); ?></b>
			</font>
			</td>
		</tr><?php endforeach; endif; ?>
<tr>
<td colspan="8" align="right"><?php echo ($page); ?></td>
</tr>
</tr>
</tbody>
</table>
</div>
							    		</div>
									</div>
								</div>

<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
	<div class="row">
		<div class="col-xs-12">
			<div class="">
				<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse collapse_btn">
					<ul class="nav nav-list header-nav" id="header-nav">
                                        
    <?php $m = M('auth_rule'); $dataaa = $m->where(array('pid'=>$_SESSION['se'],'menustatus'=>1))->order('sort')->select(); foreach ($dataaa as $kkk=>$vvv){ if(!$auth->check($vvv['name'], $_SESSION['aid']) && $_SESSION['aid']!= 1){ unset($dataaa[$kkk]); } } ?>
    <?php if(is_array($dataaa)): foreach($dataaa as $key=>$k): ?><li>
												<a href="<?php echo U(''.$k['name'].'');?>">
													<o class="font12 <?php if((CONTROLLER_NAME.'/'.ACTION_NAME == $k['name'])): ?>rigbg<?php endif; ?>"><?php echo ($k["title"]); ?></o>
												</a>

								<b class="arrow"></b>
							</li><?php endforeach; endif; ?>
					</ul><!-- /.nav-list -->
				</div><!-- .sidebar -->
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
</div>			
			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Wmzz.Cn</span>
							Lhc系统 &copy; 2015-2016
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>
            

		<!-- basic scripts -->


<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/lh3/Public/js/assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script src="/lh3/Public/js/assets/js/bootstrap.js"></script>
		<script src="/lh3/Public/js/assets/js/maxlength.js"></script>
		<script src="/lh3/Public/js/assets/js/ace/ace.js"></script>
		<script src="/lh3/Public/js/assets/js/ace/ace.sidebar.js"></script>


		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			   $('#sidebar2').insertBefore('.page-content');
			   
			   $('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');
			   
			   
			   $(document).on('settings.ace.two_menu', function(e, event_name, event_val) {
				 if(event_name == 'sidebar_fixed') {
					 if( $('#sidebar').hasClass('sidebar-fixed') ) {
						$('#sidebar2').addClass('sidebar-fixed');
						$('#navbar').addClass('h-navbar');
					 }
					 else {
						$('#sidebar2').removeClass('sidebar-fixed')
						$('#navbar').removeClass('h-navbar');
					 }
				 }
			   }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed' ,$('#sidebar').hasClass('sidebar-fixed')]);
			})
		</script>
		
</div>
<script src="<?php echo (JS_URL); ?>jquery.min.js"></script>
<script>
function CheckAll(value,obj)  {
var form=document.getElementsByTagName("form")
for(var i=0;i<form.length;i++){
for (var j=0;j<form[i].elements.length;j++){
if(form[i].elements[j].type=="checkbox"){ 
var e = form[i].elements[j]; 
if (value=="selectAll"){e.checked=obj.checked}     
else{e.checked=!e.checked;} 
}
}
}
}
</script>
<script>
//==========设置几秒跳转
var i = 2; 
var intervalid; 
function TiaoSecond(Yoyo){ 
if (i ==0) { 
window.location.href =Yoyo; 
clearInterval(intervalid); 
} 
document.getElementById("mes").innerHTML = i; 
i--; 
} 	
//==========设置几秒结束


//=======================获取数据
function Get_add_Save(){
var site_name    =$("#site_name").attr("value");
var site_title   =$("#site_title").attr("value");
var site_url     =$("#site_url").attr("value");
var site_describe=$("#site_describe").attr("value");
var site_keywords=$("#site_keywords").attr("value");
var Token =$("#Token").attr("value");
jQuery.ajax({
url: "/lh3/index.php/Home/Ziliao/RightSave.html",
dataType:"json",
type:"POST",
data:{Action:"Config_Add",site_name:site_name,site_title:site_title,site_url:site_url,site_describe:site_describe,site_keywords:site_keywords},
beforeSend: function(XHR){
$('#msg').html('<center><br><br><img alt="正在加载中..." src="<?php echo (IMG_URL); ?>Loading/load1.gif" ></center>');
},
success:function(data) {
$("#msg").html(data.msg)
intervalid =setInterval("TiaoSecond('/lh3/index.php/Home/Ziliao/index.html')",1000);//==========执行几秒跳转
}
});
}



//=======================获取删除数据
function Get_Del_Save(){
var $check_boxes = $('input[type=checkbox][checked=checked][id!=check_all_box]');  
if($check_boxes.length<=0){ alert('您未勾选任何数据，请先勾选！');return;}  
if(confirm('您确定要删除此数据？')){  
var dropIds = new Array();  
$check_boxes.each(function(){  
dropIds.push($(this).val());  
});
jQuery.ajax({
url: "/lh3/index.php/Home/Ziliao/infodelete.html",
dataType:"json",
type:"POST",
data:{Action:"Alldel",id:dropIds},
beforeSend: function(){
$('#msg').html('<center><br><br><img alt="正在加载中..." src="<?php echo (IMG_URL); ?>Loading/load1.gif" ></center>');	
},
success:function(data){
$("#msg").html(data.msg)
intervalid =setInterval("TiaoSecond('/lh3/index.php/Home/Ziliao/index.html')",1000);//==========执行几秒跳转
}
});
}  
}


//=======================获取其他操作
function Get_Ation_Save(oo1,oo2){
if(confirm('您确定要执行此操作？')){   
jQuery.ajax({
url: "/lh3/index.php/Home/Ziliao/infodelete.html",
dataType:"json",
type:"POST",
data:{Action:"del",id:oo2},
beforeSend: function(){
$('#msg').html('<center><br><br><img alt="正在加载中..." src="<?php echo (IMG_URL); ?>Loading/load1.gif" ></center>');	
},
success:function(data){
$("#msg").html(data.msg)
intervalid =setInterval("TiaoSecond('/lh3/index.php/Home/Ziliao/index.html')",1000);//==========执行几秒跳转
}
});
}  
}


</script>
	</body>
</html>