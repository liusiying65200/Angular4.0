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
$.post('/lh3/index.php/Home/Plug/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
});
</script>
<style>
table{border-collapse:collapse;border-spacing:0;}
td,th{padding:0;}
</style>
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
					
							<div class="row maintop">
							<div class="col-xs-12 col-sm-1">
<!-- 点击模态框（Modal） -->
								<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal">
									<i class="ace-icon fa fa-bolt bigger-110"></i>
										添加广告
								</button>
								
							</div>

								<div class="col-xs-12 col-sm-3">
								<form name="admin_list_sea" class="form-search" method="post" action="/lh3/index.php/Home/Plug/plug_ad_list">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="ace-icon fa fa-check"></i>
										</span>
										<input type="text" name="key" id="key" class="form-control search-query admin_sea" value="<?php echo ($val); ?>" placeholder="输入广告名称" />
										<span class="input-group-btn">
											<button type="submit" class="btn btn-xs  btn-purple">
												<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
												搜索
											</button>
										</span>
									</div>
								</form>
								</div>
								  <div class="input-group-btn">
									<a href="/lh3/index.php/Home/Plug/plug_ad_list">
									<button type="button" class="btn btn-xs  btn-purple">
										<span class="ace-icon fa fa-globe icon-on-right bigger-110"></span>
										显示全部
									</button>
									</a>
								  </div>
							</div>
		

							<div class="row">
							    <div class="col-xs-12">
										<div>
										<form id="plug_ad_allorder" name="plug_ad_allorder" method="post" action="<?php echo U('plug_ad_order');?>" >
											<table width="100%" class="table table-striped table-bordered table-hover" id="dynamic-table">
												<thead>
													<tr>
													  <th width="5%">ID</th>
													  <th width="24%">广告名称</th>
													  <th width="18%">所属位置</th>
													  <th width="14%">添加时间</th>
													  <th width="10%">排序</th>
													  <th width="8%">状态</th>
													  <th width="6%" style="border-right:#CCC solid 1px;">操作</th>
												  </tr>
												</thead>

												<tbody>
                                                
                                                <?php if(is_array($plug_ad_list)): foreach($plug_ad_list as $key=>$v): ?><tr>
														<td height="28" ><?php echo ($v["plug_ad_id"]); ?></td>
														<td><a href="<?php echo ($v["plug_ad_url"]); ?>" target="_blank"><?php echo ($v["plug_ad_name"]); ?></a></td>
														<td><?php echo ($v["plug_adtype_name"]); ?></td>
														<td><?php echo (date('Y-m-d',$v["plug_ad_addtime"])); ?></td>
														<td><input name="<?php echo ($v["plug_ad_id"]); ?>" value=" <?php echo ($v["plug_ad_order"]); ?>" class="list_order"/></td>
														<td>
														<?php if($v[plug_ad_open] == 1): ?><a class="red" href="javascript:;" onclick="return stateyes(<?php echo ($v["plug_ad_id"]); ?>);" title="已开启">
														<div id="zt<?php echo ($v["plug_ad_id"]); ?>"><button class="btn btn-minier btn-yellow">状态开启</button></div>
														</a>
														<?php else: ?>
														<a class="red" href="javascript:;" onclick="return stateyes(<?php echo ($v["plug_ad_id"]); ?>);" title="已禁用">
														<div id="zt<?php echo ($v["plug_ad_id"]); ?>"><button class="btn btn-minier btn-danger">状态禁用</button></div>
														</a><?php endif; ?>														</td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green"  href="<?php echo U('plug_ad_edit',array('plug_ad_id'=>$v['plug_ad_id']));?>" title="修改">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>																</a>
																<a class="red" href="javascript:;" onclick="return del(<?php echo ($v["plug_ad_id"]); ?>);" title="删除">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>																</a>															</div>														</td>
													</tr><?php endforeach; endif; ?>   
                                                  <tr>
													  <td height="50" align="left"><button  id="btnorder" class="btn btn-white btn-yellow btn-sm">排序</button></td>
												      <td height="50" colspan="6" align="right"><div class="pager"><?php echo ($page); ?></div></td>
                                                  </tr>
												</tbody>
										  </table>
										  </form>
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

<!-- 显示模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="form-horizontal" name="plug_ad_add" id="plug_ad_add" method="post" action="/lh3/index.php/Home/Plug/plug_ad_runadd">
   <div class="modal-dialog" style="width:1200px;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
               aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
               添加广告
            </h4>
         </div>
         <div class="modal-body">
            
			
						<div class="row">
							<div class="col-xs-12">
								
                                	<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 所属位置： </label>
										<div class="col-sm-11">
                                        <select name="plug_ad_adtypeid"  class="col-sm-4 selector" >
                                        <option value="">请选择所属广告位</option>
                                        <?php if(is_array($plug_adtype_list)): foreach($plug_adtype_list as $key=>$v): ?><option value="<?php echo ($v["plug_adtype_id"]); ?>"><?php echo ($v["plug_adtype_name"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                        </div>
									</div>
									<div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 广告名称：  </label>
										<div class="col-sm-11">
											<input type="text" name="plug_ad_name" id="plug_ad_name" placeholder="输入广告名称" class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    <div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 广告模式： </label>
										<div class="col-sm-11">
                                            <div class="radio" >
												<label>
													<input name="plug_ad_checkid" id="plug_ad_checkid" checked type="radio" class="ace" value="1"/>
													<span class="lbl"> 图片模式</span>
												</label>
												<label>
													<input name="plug_ad_checkid" id="plug_ad_checkjsid" type="radio" class="ace" value="2"/>
													<span class="lbl"> JS代码</span>
												</label>
											</div>
										</div>
									</div>
                                    <div class="space-4"></div>

									<div class="form-group" id="pic_jslist">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-1"> JS代码：  </label>
										<div class="col-sm-11">
											<textarea id="plug_ad_js" name="plug_ad_js" placeholder="支持html广告代码" style="width:500px;height:180px;"></textarea>
										</div>
									</div>
                                    <div class="space-4"></div>
									
									<div class="form-group" id="pic_list">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 广告图片： </label>
										<div class="col-sm-11">
										<a href="javascript:;" class="file">
                                            <input type="file" name="file0" id="file0" multiple="multiple"/>
											选择上传文件
										</a>
										<a href="javascript:;" onclick="return backpic('/lh3/Public/gg/no_img.jpg');" title="还原修改前的图片" class="file">
                                            撤销上传
										</a>
										
										<div><img src="/lh3/Public/gg/no_img.jpg" height="70" id="img0" ></div>
										</div>
									</div>
                                    <div class="space-4"></div>
									
									<div class="form-group" id="pic_listurl">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 链接URL：  </label>
										<div class="col-sm-11">
											<input type="text" name="plug_ad_url" id="plug_ad_url" placeholder="输入链接URL" class="col-xs-10 col-sm-8" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>必须是以http://开头</span>
										</div>
									</div>
                                    <div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 是否审核： </label>
										<div class="col-sm-11" style="padding-top:5px;">
                                            <input name="plug_ad_open" id="plug_ad_open" value="1" class="ace ace-switch ace-switch-4 btn-flat" type="checkbox" />
											<span class="lbl">&nbsp;&nbsp;默认关闭</span>
										</div>
									</div>
                                    <div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 排序：  </label>
										<div class="col-sm-11">
											<input type="text" name="plug_ad_order" id="plug_ad_order" value="50" class="col-xs-10 col-sm-3" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>从小到大排序</span>
										</div>
									</div>
                                    <div class="space-4"></div>
									
								</div>
							</div>
			
			
			
			
         </div>
         <div class="modal-footer">
		 	<button type="submit" class="btn btn-primary">
            	提交保存
            </button>
		 	<button class="btn btn-info" type="reset">
				重置
			</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">
				关闭
            </button>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   </form>
</div><!-- /.modal -->





<script>
function del(id,p){
	layer.confirm('你确定要删除吗？', {icon: 3}, function(index){
	layer.close(index);
	window.location.href="/lh3/index.php/Home/Plug/plug_ad_del/plug_ad_id/"+id+"/p/"+p+"";
	});
}

function stateyes(val){
		  $.post('<?php echo U("plug_ad_state");?>',
		  {x:val},
	function(data){
		if(data.status){
			if(data.info=='状态禁止'){
				var a='<button class="btn btn-minier btn-danger">状态禁用</button>'
				$('#zt'+val).html(a);
				return false;
			}else{
				var b='<button class="btn btn-minier btn-yellow">状态开启</button>'
				$('#zt'+val).html(b);
				return false;
			}
		}
	});
	return false;
}

//添加操作
$(function(){
	$('#plug_ad_add').ajaxForm({
		beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
		success: complete, // 这是提交后的方法
		dataType: 'json'
	});
	
	function checkForm(){
		if( '' == $(".selector").val()){
			layer.alert('所属广告位不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('.selector').focus(); 
			});
			return false;
		}
	
		if( '' == $.trim($('#plug_ad_name').val())){
			layer.alert('广告名称不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#plug_ad_name').focus(); 
			});
			return false;
		}
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


$("#file0").change(function(){
	var objUrl = getObjectURL(this.files[0]) ;
	console.log("objUrl = "+objUrl) ;
	if (objUrl) {
		$("#img0").attr("src", objUrl) ;
	}
}) ;

//建立一個可存取到該file的url
function getObjectURL(file) {

	var url = null ; 
	if (window.createObjectURL!=undefined) { // basic
		url = window.createObjectURL(file) ;
	} else if (window.URL!=undefined) { // mozilla(firefox)
		url = window.URL.createObjectURL(file) ;
	} else if (window.webkitURL!=undefined) { // webkit or chrome
		url = window.webkitURL.createObjectURL(file) ;
	}
	return url ;
}


function backpic(picurl){
	$("#img0").attr("src",picurl);//还原修改前的图片
	$("input[name='file0']").val("");//清空文本框的值
}

//批量排序
$(function(){
	$('#plug_ad_allorder').ajaxForm({
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
			layer.alert(data.info, {icon: 6}, function(index){
 			layer.close(index);
			window.location.href=data.url;
			});
		}
	}
});

$(document).ready(function(){
  $("#pic_jslist").hide();

  $("#plug_ad_checkjsid").click(function(){
  	$("#pic_jslist").show();
	$("#pic_list").hide();
	$("#pic_listurl").hide();
  });
  
  $("#plug_ad_checkid").click(function(){
  	$("#pic_jslist").hide();
	$("#pic_list").show();
	$("#pic_listurl").show();
  });
});

</script>

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
	</body>
</html>