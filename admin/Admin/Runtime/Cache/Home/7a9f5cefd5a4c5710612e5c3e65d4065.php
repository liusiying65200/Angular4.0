<?php if (!defined('THINK_PATH')) exit();?>	<!DOCTYPE html>
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
$.post('/lh3/index.php/Home/Sys/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
});
</script>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">

			<!-- #section:basics/sidebar -->

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



			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">

                        
                        
                        <!--主题-->
						<div class="page-header">
							<h1>
								您当前操作
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									配置权限
								</small>
							</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" name="admin_group_add" id="admin_group_add" method="post" action="/lh3/index.php/Home/Sys/admin_group_runaccess">
								<input name="id" id="id" type="hidden" value="<?php echo ($admin_group["id"]); ?>" />
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 用户组名：  </label>
										<div class="col-sm-10">
											<input type="text" name="title" id="title" value="<?php echo ($admin_group["title"]); ?>" class="col-xs-10 col-sm-4" />
										</div>
									</div>
                                    <div class="space-4"></div>


<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td height="30" style="border-bottom:#CCCCCC solid 1px; line-height:25px;">配置规则:<br />
1、由于页面原因，权限分配为三级，同时控制左侧导航以及用户权限<br />
  </tr>
  <tr>
    <td height="30" style="border-bottom:#CCCCCC solid 1px; line-height:25px; background-color:#F4F8FB">
<label class="pos-rel">
<input type="checkbox" class="ace ace-checkbox-2"  id='chkAll' onclick='CheckAll(this.form)' value="全选"/>
<span class="lbl"> 权限全选</span>
</label>
	</td>
  </tr>
  <?php if(is_array($datab)): foreach($datab as $key=>$vo): ?><tr>
  <?php $po_1=explode(',',$admin_group['rules']); ?>
    <td height="50" style="border-bottom:#CCCCCC solid 1px;">
	<label>
	<input <?php if(in_array($vo['id'],$po_1)): ?>checked<?php endif; ?> name="new_rules[]" class="ace ace-checkbox-2 checkbox-parent"  type="checkbox"  value="<?php echo ($vo["id"]); ?>" dataid="id-<?php echo ($vo['id']); ?>"  /><span class="lbl"> <strong><?php echo ($vo["title"]); ?></strong></span>	</label></td>
  </tr>
  <?php if(is_array($vo['sub'])): foreach($vo['sub'] as $key=>$sub): ?><tr>
  <?php $po_2=explode(',',$admin_group['rules']); ?>
	<td height="40" style="padding-left:20px;border-bottom:#E7EBF8 dashed 1px; color:#333333">
	<label>
	<input <?php if(in_array($sub['id'],$po_2)): ?>checked<?php endif; ?> name="new_rules[]" id="<?php echo ($sub["id"]); ?>" class="ace ace-checkbox-2 checkbox-parent checkbox-child"  type="checkbox"  value="<?php echo ($sub["id"]); ?>"  dataid="id-<?php echo ($vo['id']); ?>-<?php echo ($sub['id']); ?>" /><span class="lbl"> <?php echo ($sub["title"]); ?></span></label></td>
	
	
	
	
  </tr>
										<?php if(is_array($sub['sub'])): foreach($sub['sub'] as $key=>$subb): ?><tr>
												<td height="30" style="padding-left:50px;border-bottom:#E7EBF8 dashed 1px; color:#666666">
													<label class="thopen">
														<input <?php if( strpos($admin_group['rules'],','.$subb['id'].',') > -1 ): ?>checked<?php endif; ?> name="new_rules[]" class="ace ace-checkbox-2 checkbox-parent checkbox-child"  type="checkbox"  id="<?php echo ($subb["id"]); ?>" value="<?php echo ($subb["id"]); ?>" dataid="id-<?php echo ($vo['id']); ?>-<?php echo ($sub['id']); ?>-<?php echo ($subb['id']); ?>" />
														<span class="lbl" style="margin-right:20px;"> <?php echo ($subb["title"]); ?></span>	
													</label>
												</td>
											</tr>
											<?php if(!empty($subb['sub'])): ?><tr>
												<td height="30" style="padding-left:70px;border-bottom:#E7EBF8 dashed 1px; color:#666666">
													<?php if(is_array($subb['sub'])): $i = 0; $__LIST__ = $subb['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subbb): $mod = ($i % 2 );++$i;?><label class="thopen">
															<input <?php if( strpos($admin_group['rules'],','.$subbb['id'].',') > -1 ): ?>checked<?php endif; ?> name="new_rules[]" class="ace ace-checkbox-2 checkbox-child" type="checkbox"  id="<?php echo ($subbb["id"]); ?>" value="<?php echo ($subbb["id"]); ?>" dataid="id-<?php echo ($vo['id']); ?>-<?php echo ($sub['id']); ?>-<?php echo ($subb['id']); ?>-<?php echo ($subbb['id']); ?>" />
															<span class="lbl" style="margin-right:10px;"> <?php echo ($subbb["title"]); ?></span>	
														</label><?php endforeach; endif; else: echo "" ;endif; ?>
												</td>
											</tr><?php endif; endforeach; endif; endforeach; endif; endforeach; endif; ?>
</table>


									
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												保存
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												重置
											</button>
										</div>
									</div>
								</form>
                        	</div>
                        </div>
									<div class="hr hr-24"></div>

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


		</div><!-- /.main-container -->

    		<!--下拉样式以及JS-->
<link rel="stylesheet" href="/lh3/Public/js/assets/css/chosen.css" />
<script src="/lh3/Public/js/assets/js/chosen.jquery.js"></script>
<script type="text/javascript">


//添加操作
$(function(){
	$('#admin_group_add').ajaxForm({
		beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
		success: complete, // 这是提交后的方法
		dataType: 'json'
	});
	
	function checkForm(){

	}
	function complete(data){
		if(data.status==1){
			layer.alert(data.info, {icon: 6}, function(index){
 			layer.close(index);
			window.location.href=data.url;
			});
		}else{
			layer.alert(data.info, {icon: 6}, function(index){
 			layer.close(index);
			window.location.href=data.url;
			});
			return false;	
		}
	}
});










jQuery(function($) {
	if(!ace.vars['touch']) {
		$('.chosen-select').chosen({allow_single_deselect:true});
		$(window)
				.off('resize.chosen')
				.on('resize.chosen', function() {
					$('.chosen-select').each(function() {
						var $this = $(this);
						$this.next().css({'width': $this.parent().width()});
					})
				}).trigger('resize.chosen');

	}
});
$(function(){
	//动态选择框，上下级选中状态变化
	$('input.checkbox-parent').on('change',function(){
		var dataid=$(this).attr("dataid");
		$('input[dataid^='+dataid+']').prop('checked',$(this).is(':checked'));
	});
	$('input.checkbox-child').on('change',function(){
		var dataid=$(this).attr("dataid");
		dataid=dataid.substring(0,dataid.lastIndexOf("-"));
		var parent=$('input[dataid='+dataid+']');
		if($(this).is(':checked')){
			parent.prop('checked',true);
			//循环到顶级
			while(dataid.lastIndexOf("-")!=2){
				dataid=dataid.substring(0,dataid.lastIndexOf("-"));
				parent=$('input[dataid='+dataid+']');
				parent.prop('checked',true);
			}
		}else{
			//父级
			if($('input[dataid^='+dataid+'-]:checked').length==0){
				parent.prop('checked',false);
				//循环到顶级
				while(dataid.lastIndexOf("-")!=2){
					dataid=dataid.substring(0,dataid.lastIndexOf("-"));
					parent=$('input[dataid='+dataid+']');
					if($('input[dataid^='+dataid+'-]:checked').length==0){
						parent.prop('checked',false);
					}
				}
			}
		}
	});
	//AJAX提交
	$('#admin_group_runaccess').ajaxForm({
	success: complete, // 这是提交后的方法
	dataType: 'json'
	});
	function complete(data){
		if(data.status==1){
			layer.alert(data.info, {icon: 6}, function(index){
				layer.close(index);
				window.location.href=data.url;
			});
		}else{
			layer.alert(data.info, {icon: 5}, function(index){
				layer.close(index);
				window.location.href="<?php echo U('admin_group_list');?>";
			});
			return false;
		}
	}
});
function unselectall(){
	if(document.myform.chkAll.checked){
		document.myform.chkAll.checked = document.myform.chkAll.checked&0;
	}
}
function CheckAll(form){
	for (var i=0;i<form.elements.length;i++){
		var e = form.elements[i];
		if (e.Name != 'chkAll'&&e.disabled==false)
			e.checked = form.chkAll.checked;
	}
}

</script>
		</body>
</html>