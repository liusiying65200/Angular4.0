<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Wmzz-Lhc网站后台系统管理</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/lhc2/admin/Public/js/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="/lhc2/admin/Public/js/assets/css/font-awesome.css" />
		<link rel="stylesheet" href="/lhc2/admin/Public/css/font-awesome.min.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="/lhc2/admin/Public/js/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/lhc2/admin/Public/js/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/lhc2/admin/Public/js/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
        <link rel="stylesheet" href="/lhc2/admin/Public/js/assets/css/slackck.css" />
		<!-- ace settings handler -->
		<script src="/lhc2/admin/Public/js/assets/js/ace-extra.js"></script>
		<script src="/lhc2/admin/Public/js/assets/js/jquery.min.js"></script>
		<script src="/lhc2/admin/Public/js/assets/js/jquery.form.js"></script>
		<script src="/lhc2/admin/Public/js/assets/layer/layer.js"></script>


		<!--<script src="<?php echo (JS_URL); ?>/assets/js/jquery.leanModal.min.js"></script>-->

		<!--[if lte IE 8]>
		<script src="/lhc2/admin/Public/js/assets/js/html5shiv.js"></script>
		<script src="/lhc2/admin/Public/js/assets/js/respond.js"></script>
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

						<img src="/lhc2/admin/Public/js/assets/avatars/user.jpg" alt="Jason's Photo" />
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
								<img class="nav-user-photo" src="/lhc2/admin/Public/js/assets/avatars/user.jpg" alt="Jason's Photo" />
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
$.post('/lhc2/admin/index.php/Home/Article/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
});
</script>
<style>
    .m-b{margin-bottom:15px}
</style>
<link href="/lhc2/admin/Public/css/common.css" rel="stylesheet" type="text/css"/>
<link href="/lhc2/admin/Public/css/themes/default/default.css" rel="stylesheet" type="text/css" />
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

                <div class="page-header">
                    <h1>
                        您当前操作
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            添加内幕资料
                        </small>
                    </h1>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div>
                            <div class="formbody">
                                <div id="msg">
                                    <form id="addForm">
                                        <table class="page_table" cellpadding="0" cellspacing="1">
                                            <tr>
                                                <td width="10%" class="td_left">期数：</td>
                                                <td width="90%" class="left"><input id="kithe" style="width:350px;" class="biankuan" placeholder="请输入标题名称"/></td>
                                            </tr>

                                            <tr>
                                                <td width="10%" class="td_left">内幕资料：</td>
                                                <td width="90%" class="left">
                                                    <div class="m-b">单双中特：<input  type="text" id="sdms" value="" class="biankuan" style="width:350px;"/></div>
                                                    <diV class="m-b">野兽家畜：<input  type="text" id="wild" value="" class="biankuan" style="width:350px;"/></diV>
                                                    <div>精选波色：<input  type="text" id="waveColor" value="" class="biankuan" style="width:350px;"/></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="10%" class="td_left">必中生肖：</td>
                                                <td width="90%" class="left">
                                                    <div class="m-b">九肖中特：<input   id="shengxiao_9" value="" class="biankuan" style="width:350px;"/></div>
                                                    <diV class="m-b">七肖中特：<input   id="shengxiao_7" value="" class="biankuan" style="width:350px;"/></diV>
                                                    <div class="m-b">六肖中特：<input id="shengxiao_6" value="" class="biankuan" style="width:350px;"/></div>
                                                    <div>四肖中特：<input  id="shengxiao_4" value="" class="biankuan" style="width:350px;"/></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="10%" class="td_left">必中生肖：</td>
                                                <td width="90%" class="left">
                                                    <div class="m-b">杀一肖：<input  type="text" id="sha_1" value="" class="biankuan" style="width:350px;"/></div>
                                                    <diV>杀一尾：<input  type="text" id="sha_last" value="" class="biankuan" style="width:350px;"/></diV>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                </td>
                                                <td align="left">
                                                    <input type="button"  value="提交内容" class="tijiao_input"  onClick="add()"/>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <div>
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
 window.jQuery || document.write("<script src='/lhc2/admin/Public/js/assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script src="/lhc2/admin/Public/js/assets/js/bootstrap.js"></script>
		<script src="/lhc2/admin/Public/js/assets/js/maxlength.js"></script>
		<script src="/lhc2/admin/Public/js/assets/js/ace/ace.js"></script>
		<script src="/lhc2/admin/Public/js/assets/js/ace/ace.sidebar.js"></script>


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
    <script src="/lhc2/admin/Public/js/jquery.min.js"></script>

    <script>
        //=======================获取数据
        function add(){
            var shengxiao={
                shengxiao_9:$('#shengxiao_9').val(),
                shengxiao_7:$('#shengxiao_7').val(),
                shengxiao_6:$('#shengxiao_6').val(),
                shengxiao_4:$('#shengxiao_4').val()
            }

            var inner_info={
                sdms:$('#sdms').val(),
                wild:$('#wild').val(),
                waveColor:$('#waveColor').val(),
            }
            var shaxiao={
                sha_1:$('#sha_1').val(),
                sha_last:$('#sha_last').val()
            }
            $.ajax({
                url: "/lhc2/admin/index.php/Home/Article/innerInfo_add",
                dataType:"json",
                type:"POST",
                data:{kithe:$('#kithe').val(),shengxiao:shengxiao,inner_info:inner_info,shaxiao:shaxiao},
                success:function(data) {
                    if(data.status==1){
                        layer.msg(data.info);
                        location.href='/lhc2/admin/index.php/Home/Article/inner_info';
                    }else{
                        layer.msg(data.info);
                    }

                }
            });

        }
    </script>
    </body>
    </html>