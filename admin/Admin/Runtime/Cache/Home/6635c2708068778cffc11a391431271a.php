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
$.post('/lh3/index.php/Home/Caiji/clear',{type:$type},function(data){
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
.label,.badge {
	display: inline-block;
	padding: 2px 4px;
	font-size: 11.844px;
	font-weight: bold;
	line-height: 14px;
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
	white-space: nowrap;
	vertical-align: baseline;
	background-color: #999
}

.label {
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px
}
button.close {
	padding: 0;
	cursor: pointer;
	background: transparent;
	border: 0;
	-webkit-appearance: none
}

.btn {
	display: inline-block;
	*display: inline;
	padding: 4px 12px;
	margin-bottom: 0;
	*margin-left: .3em;
	font-size: 14px;
	line-height: 20px;
	color: #333;
	text-align: center;
	text-shadow: 0 1px 1px rgba(255,255,255,0.75);
	vertical-align: middle;
	cursor: pointer;
	background-color: #f5f5f5;
	*background-color: #e6e6e6;
	background-image: -moz-linear-gradient(top,#fff,#e6e6e6);
	background-image: -webkit-gradient(linear,0 0,0 100%,from(#fff),to(#e6e6e6));
	background-image: -webkit-linear-gradient(top,#fff,#e6e6e6);
	background-image: -o-linear-gradient(top,#fff,#e6e6e6);
	background-image: linear-gradient(to bottom,#fff,#e6e6e6);
	background-repeat: repeat-x;
	border: 1px solid #ccc;
	*border: 0;
	border-color: #e6e6e6 #e6e6e6 #bfbfbf;
	border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
	border-bottom-color: #b3b3b3;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff',endColorstr='#ffe6e6e6',GradientType=0);
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
	*zoom: 1;
	-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
	-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
	box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05)
}

.btn:hover,.btn:focus,.btn:active,.btn.active,.btn.disabled,.btn[disabled] {
	color: #333;
	background-color: #e6e6e6;
	*background-color: #d9d9d9
}

.btn:active,.btn.active {
	background-color: #ccc \9
}

.btn:first-child {
	*margin-left: 0
}

.btn:hover,.btn:focus {
	color: #333;
	text-decoration: none;
	background-position: 0 -15px;
	-webkit-transition: background-position .1s linear;
	-moz-transition: background-position .1s linear;
	-o-transition: background-position .1s linear;
	transition: background-position .1s linear
}

.btn:focus {
	outline: thin dotted #333;
	outline: 5px auto -webkit-focus-ring-color;
	outline-offset: -2px
}

.btn.active,.btn:active {
	background-image: none;
	outline: 0;
	-webkit-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
	-moz-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
	box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05)
}

.btn.disabled,.btn[disabled] {
	cursor: default;
	background-image: none;
	opacity: .65;
	filter: alpha(opacity=65);
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none
}

.btn-large {
	padding: 11px 19px;
	font-size: 17.5px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px
}

.btn-large [class^="icon-"],.btn-large [class*=" icon-"] {
	margin-top: 4px
}

.btn-small {
	padding: 2px 10px;
	font-size: 11.9px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px
}

.btn-small [class^="icon-"],.btn-small [class*=" icon-"] {
	margin-top: 0
}

.btn-mini [class^="icon-"],.btn-mini [class*=" icon-"] {
	margin-top: -1px
}

.btn-mini {
	padding: 0 6px;
	font-size: 10.5px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px
}

.btn-block {
	display: block;
	width: 100%;
	padding-right: 0;
	padding-left: 0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box
}

.btn-block+.btn-block {
	margin-top: 5px
}

input[type="submit"].btn-block,input[type="reset"].btn-block,input[type="button"].btn-block {
	width: 100%
}

.btn-primary.active,.btn-warning.active,.btn-danger.active,.btn-success.active,.btn-info.active,.btn-inverse.active {
	color: rgba(255,255,255,0.75)
}

.btn-primary {
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
	background-color: #006dcc;
	*background-color: #04c;
	background-image: -moz-linear-gradient(top,#08c,#04c);
	background-image: -webkit-gradient(linear,0 0,0 100%,from(#08c),to(#04c));
	background-image: -webkit-linear-gradient(top,#08c,#04c);
	background-image: -o-linear-gradient(top,#08c,#04c);
	background-image: linear-gradient(to bottom,#08c,#04c);
	background-repeat: repeat-x;
	border-color: #04c #04c #002a80;
	border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc',endColorstr='#ff0044cc',GradientType=0);
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false)
}

.btn-primary:hover,.btn-primary:focus,.btn-primary:active,.btn-primary.active,.btn-primary.disabled,.btn-primary[disabled] {
	color: #fff;
	background-color: #04c;
	*background-color: #003bb3
}

.btn-primary:active,.btn-primary.active {
	background-color: #039 \9
}

.btn-warning {
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
	background-color: #faa732;
	*background-color: #f89406;
	background-image: -moz-linear-gradient(top,#fbb450,#f89406);
	background-image: -webkit-gradient(linear,0 0,0 100%,from(#fbb450),to(#f89406));
	background-image: -webkit-linear-gradient(top,#fbb450,#f89406);
	background-image: -o-linear-gradient(top,#fbb450,#f89406);
	background-image: linear-gradient(to bottom,#fbb450,#f89406);
	background-repeat: repeat-x;
	border-color: #f89406 #f89406 #ad6704;
	border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fffbb450',endColorstr='#fff89406',GradientType=0);
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false)
}

.btn-warning:hover,.btn-warning:focus,.btn-warning:active,.btn-warning.active,.btn-warning.disabled,.btn-warning[disabled] {
	color: #fff;
	background-color: #f89406;
	*background-color: #df8505
}

.btn-warning:active,.btn-warning.active {
	background-color: #c67605 \9
}

.btn-danger {
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
	background-color: #da4f49;
	*background-color: #bd362f;
	background-image: -moz-linear-gradient(top,#ee5f5b,#bd362f);
	background-image: -webkit-gradient(linear,0 0,0 100%,from(#ee5f5b),to(#bd362f));
	background-image: -webkit-linear-gradient(top,#ee5f5b,#bd362f);
	background-image: -o-linear-gradient(top,#ee5f5b,#bd362f);
	background-image: linear-gradient(to bottom,#ee5f5b,#bd362f);
	background-repeat: repeat-x;
	border-color: #bd362f #bd362f #802420;
	border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffee5f5b',endColorstr='#ffbd362f',GradientType=0);
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false)
}

.btn-danger:hover,.btn-danger:focus,.btn-danger:active,.btn-danger.active,.btn-danger.disabled,.btn-danger[disabled] {
	color: #fff;
	background-color: #bd362f;
	*background-color: #a9302a
}

.btn-danger:active,.btn-danger.active {
	background-color: #942a25 \9
}

.btn-success {
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
	background-color: #5bb75b;
	*background-color: #51a351;
	background-image: -moz-linear-gradient(top,#62c462,#51a351);
	background-image: -webkit-gradient(linear,0 0,0 100%,from(#62c462),to(#51a351));
	background-image: -webkit-linear-gradient(top,#62c462,#51a351);
	background-image: -o-linear-gradient(top,#62c462,#51a351);
	background-image: linear-gradient(to bottom,#62c462,#51a351);
	background-repeat: repeat-x;
	border-color: #51a351 #51a351 #387038;
	border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff62c462',endColorstr='#ff51a351',GradientType=0);
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false)
}

.btn-success:hover,.btn-success:focus,.btn-success:active,.btn-success.active,.btn-success.disabled,.btn-success[disabled] {
	color: #fff;
	background-color: #51a351;
	*background-color: #499249
}

.btn-success:active,.btn-success.active {
	background-color: #408140 \9
}

.btn-info {
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
	background-color: #49afcd;
	*background-color: #2f96b4;
	background-image: -moz-linear-gradient(top,#5bc0de,#2f96b4);
	background-image: -webkit-gradient(linear,0 0,0 100%,from(#5bc0de),to(#2f96b4));
	background-image: -webkit-linear-gradient(top,#5bc0de,#2f96b4);
	background-image: -o-linear-gradient(top,#5bc0de,#2f96b4);
	background-image: linear-gradient(to bottom,#5bc0de,#2f96b4);
	background-repeat: repeat-x;
	border-color: #2f96b4 #2f96b4 #1f6377;
	border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5bc0de',endColorstr='#ff2f96b4',GradientType=0);
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false)
}

.btn-info:hover,.btn-info:focus,.btn-info:active,.btn-info.active,.btn-info.disabled,.btn-info[disabled] {
	color: #fff;
	background-color: #2f96b4;
	*background-color: #2a85a0
}

.btn-info:active,.btn-info.active {
	background-color: #24748c \9
}

.btn-inverse {
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
	background-color: #363636;
	*background-color: #222;
	background-image: -moz-linear-gradient(top,#444,#222);
	background-image: -webkit-gradient(linear,0 0,0 100%,from(#444),to(#222));
	background-image: -webkit-linear-gradient(top,#444,#222);
	background-image: -o-linear-gradient(top,#444,#222);
	background-image: linear-gradient(to bottom,#444,#222);
	background-repeat: repeat-x;
	border-color: #222 #222 #000;
	border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff444444',endColorstr='#ff222222',GradientType=0);
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false)
}

.btn-inverse:hover,.btn-inverse:focus,.btn-inverse:active,.btn-inverse.active,.btn-inverse.disabled,.btn-inverse[disabled] {
	color: #fff;
	background-color: #222;
	*background-color: #151515
}

.btn-inverse:active,.btn-inverse.active {
	background-color: #080808 \9
}

button.btn,input[type="submit"].btn {
	*padding-top: 3px;
	*padding-bottom: 3px
}

button.btn::-moz-focus-inner,input[type="submit"].btn::-moz-focus-inner {
	padding: 0;
	border: 0
}

button.btn.btn-large,input[type="submit"].btn.btn-large {
	*padding-top: 7px;
	*padding-bottom: 7px
}

button.btn.btn-small,input[type="submit"].btn.btn-small {
	*padding-top: 3px;
	*padding-bottom: 3px
}

button.btn.btn-mini,input[type="submit"].btn.btn-mini {
	*padding-top: 1px;
	*padding-bottom: 1px
}

.btn-link,.btn-link:active,.btn-link[disabled] {
	background-color: transparent;
	background-image: none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none
}

.btn-link {
	color: #08c;
	cursor: pointer;
	border-color: transparent;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0
}

.btn-link:hover,.btn-link:focus {
	color: #005580;
	text-decoration: underline;
	background-color: transparent
}

.btn-link[disabled]:hover,.btn-link[disabled]:focus {
	color: #333;
	text-decoration: none
}

.btn-group {
	position: relative;
	display: inline-block;
	*display: inline;
	*margin-left: .3em;
	font-size: 0;
	white-space: nowrap;
	vertical-align: middle;
	*zoom: 1
}

.btn-group:first-child {
	*margin-left: 0
}

.btn-group+.btn-group {
	margin-left: 5px
}

.btn-toolbar {
	margin-top: 10px;
	margin-bottom: 10px;
	font-size: 0
}

.btn-toolbar>.btn+.btn,.btn-toolbar>.btn-group+.btn,.btn-toolbar>.btn+.btn-group {
	margin-left: 5px
}

.btn-group>.btn {
	position: relative;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0
}

.btn-group>.btn+.btn {
	margin-left: -1px
}

.btn-group>.btn,.btn-group>.dropdown-menu,.btn-group>.popover {
	font-size: 14px
}

.btn-group>.btn-mini {
	font-size: 10.5px
}

.btn-group>.btn-small {
	font-size: 11.9px
}

.btn-group>.btn-large {
	font-size: 17.5px
}

.btn-group>.btn:first-child {
	margin-left: 0;
	-webkit-border-bottom-left-radius: 4px;
	border-bottom-left-radius: 4px;
	-webkit-border-top-left-radius: 4px;
	border-top-left-radius: 4px;
	-moz-border-radius-bottomleft: 4px;
	-moz-border-radius-topleft: 4px
}

.btn-group>.btn:last-child,.btn-group>.dropdown-toggle {
	-webkit-border-top-right-radius: 4px;
	border-top-right-radius: 4px;
	-webkit-border-bottom-right-radius: 4px;
	border-bottom-right-radius: 4px;
	-moz-border-radius-topright: 4px;
	-moz-border-radius-bottomright: 4px
}

.btn-group>.btn.large:first-child {
	margin-left: 0;
	-webkit-border-bottom-left-radius: 6px;
	border-bottom-left-radius: 6px;
	-webkit-border-top-left-radius: 6px;
	border-top-left-radius: 6px;
	-moz-border-radius-bottomleft: 6px;
	-moz-border-radius-topleft: 6px
}

.btn-group>.btn.large:last-child,.btn-group>.large.dropdown-toggle {
	-webkit-border-top-right-radius: 6px;
	border-top-right-radius: 6px;
	-webkit-border-bottom-right-radius: 6px;
	border-bottom-right-radius: 6px;
	-moz-border-radius-topright: 6px;
	-moz-border-radius-bottomright: 6px
}

.btn-group>.btn:hover,.btn-group>.btn:focus,.btn-group>.btn:active,.btn-group>.btn.active {
	z-index: 2
}

.btn-group .dropdown-toggle:active,.btn-group.open .dropdown-toggle {
	outline: 0
}

.btn-group>.btn+.dropdown-toggle {
	*padding-top: 5px;
	padding-right: 8px;
	*padding-bottom: 5px;
	padding-left: 8px;
	-webkit-box-shadow: inset 1px 0 0 rgba(255,255,255,0.125),inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
	-moz-box-shadow: inset 1px 0 0 rgba(255,255,255,0.125),inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
	box-shadow: inset 1px 0 0 rgba(255,255,255,0.125),inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05)
}

.btn-group>.btn-mini+.dropdown-toggle {
	*padding-top: 2px;
	padding-right: 5px;
	*padding-bottom: 2px;
	padding-left: 5px
}

.btn-group>.btn-small+.dropdown-toggle {
	*padding-top: 5px;
	*padding-bottom: 4px
}

.btn-group>.btn-large+.dropdown-toggle {
	*padding-top: 7px;
	padding-right: 12px;
	*padding-bottom: 7px;
	padding-left: 12px
}

.btn-group.open .dropdown-toggle {
	background-image: none;
	-webkit-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
	-moz-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
	box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05)
}

.btn-group.open .btn.dropdown-toggle {
	background-color: #e6e6e6
}

.btn-group.open .btn-primary.dropdown-toggle {
	background-color: #04c
}

.btn-group.open .btn-warning.dropdown-toggle {
	background-color: #f89406
}

.btn-group.open .btn-danger.dropdown-toggle {
	background-color: #bd362f
}

.btn-group.open .btn-success.dropdown-toggle {
	background-color: #51a351
}

.btn-group.open .btn-info.dropdown-toggle {
	background-color: #2f96b4
}

.btn-group.open .btn-inverse.dropdown-toggle {
	background-color: #222
}

.btn .caret {
	margin-top: 8px;
	margin-left: 0
}

.btn-large .caret {
	margin-top: 6px
}

.btn-large .caret {
	border-top-width: 5px;
	border-right-width: 5px;
	border-left-width: 5px
}

.btn-mini .caret,.btn-small .caret {
	margin-top: 8px
}

.dropup .btn-large .caret {
	border-bottom-width: 5px
}

.btn-primary .caret,.btn-warning .caret,.btn-danger .caret,.btn-info .caret,.btn-success .caret,.btn-inverse .caret {
	border-top-color: #fff;
	border-bottom-color: #fff
}

.btn-group-vertical {
	display: inline-block;
	*display: inline;
	*zoom: 1
}

.btn-group-vertical>.btn {
	display: block;
	float: none;
	max-width: 100%;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0
}

.btn-group-vertical>.btn+.btn {
	margin-top: -1px;
	margin-left: 0
}

.btn-group-vertical>.btn:first-child {
	-webkit-border-radius: 4px 4px 0 0;
	-moz-border-radius: 4px 4px 0 0;
	border-radius: 4px 4px 0 0
}

.btn-group-vertical>.btn:last-child {
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px
}

.btn-group-vertical>.btn-large:first-child {
	-webkit-border-radius: 6px 6px 0 0;
	-moz-border-radius: 6px 6px 0 0;
	border-radius: 6px 6px 0 0
}

.btn-group-vertical>.btn-large:last-child {
	-webkit-border-radius: 0 0 6px 6px;
	-moz-border-radius: 0 0 6px 6px;
	border-radius: 0 0 6px 6px
}

</style>
<script language="JavaScript">
  function openwin(strID)
  {
  
window.open ("/lh3/index.php/Home/Caiji/cjcs/id/"+strID+"", "newwindow", "height=490, width=500, top=170, left=400, toolbar =no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
  }
  function openwin1(strID)
  {
  
window.open ("/lh3/index.php/Home/Caiji/cj/id/"+strID+"", "newwindow", "height=490, width=500, top=170, left=400, toolbar =no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
  }  
</script>
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
					
							<div class="row">
							    <div class="col-xs-12">
										<div>
<div class="formbody">
<table cellspacing="1" cellpadding="0" class="page_table" >
<tr>

<td class="left" style="padding:10px;">
<input type="button" value="采集添加" onclick="location.href='/lh3/index.php/Home/Caiji/info_add.html'"  class="btn btn-success" />
</td>
</tr>
</table>
<div id="msg">
<form name="form1" method="post" action="">
<input id="Token"    type="hidden" value="">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th><input type="checkbox"></th>
            <th>项目编号</th>
            <th>网站路径</th>
            <th>采集项目名称</th>
            <th>下载图片</th>
            <th>页面编码</th>
            <th>入库类型</th>
            <th>创建时间</th>
            <th>操作</th>
            <th>功能</th>
        </tr>
    </thead>
    <tbody>
<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
            <td><input type="checkbox" id="id" value="<?php echo ($vo["id"]); ?>" style="margin:3px 0px"></td>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["biaoti"]); ?></td>
            <td><?php echo ($vo["url"]); ?></td>
            <td><span class="label label-success">不下载</span></td>
            <td><span class="label label-warning"><?php echo ($vo["bianma"]); ?></span></td>
            <td><?php echo (czdirectory('article','0',$vo["directory4"])); ?></td>
            <td><?php echo (datetime($vo["begtime"])); ?></td>
            <td>
                <div class="btn-group">
                    <a href="/lh3/index.php/Home/Caiji/info_edit/Id/<?php echo ($vo["id"]); ?>" class="btn btn-primary btn-small" data-original-title="" title="">编辑</a>
                    <a href="#" class="btn btn-warning btn-small" data-original-title="" onClick="Get_Ation_Save('infodelete','<?php echo ($vo["id"]); ?>')">删除</a>
                </div>
            </td>
            <td>
                <div class="btn-group">
                    <a href="#" onClick="openwin1('<?php echo ($vo["id"]); ?>')" class="btn btn-primary btn-small" data-original-title="" title="">采</a>
                    <a href="#" onClick="openwin('<?php echo ($vo["id"]); ?>')" class="btn btn-primary btn-small" data-original-title="" title="">测</a>
                </div>
            </td>            
        </tr><?php endforeach; endif; ?>		
		</tbody>
<tfoot>
</tfoot>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
<tr>
<td width="17%" align="left">
<input type="button" value="全选" onClick="CheckAll()" class="btn btn-success" />
<input type="button" value="删除" onClick="Get_Del_Save()"  class="btn btn-info" >
</td>
<td width="83%" style="text-align:center;"><div class="pager"><?php echo ($page); ?></div></td>
</tr>
</table>
</form>
</div>
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
url: "/lh3/index.php/Home/Caiji/RightSave.html",
dataType:"json",
type:"POST",
data:{Action:"Config_Add",site_name:site_name,site_title:site_title,site_url:site_url,site_describe:site_describe,site_keywords:site_keywords},
beforeSend: function(XHR){
$('#msg').html('<center><br><br><img alt="正在加载中..." src="<?php echo (IMG_URL); ?>Loading/load1.gif" ></center>');
},
success:function(data) {
$("#msg").html(data.msg)
intervalid =setInterval("TiaoSecond('/lh3/index.php/Home/Caiji/index.html')",1000);//==========执行几秒跳转
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
url: "/lh3/index.php/Home/Caiji/infodelete.html",
dataType:"json",
type:"POST",
data:{Action:"Alldel",id:dropIds},
beforeSend: function(){
$('#msg').html('<center><br><br><img alt="正在加载中..." src="<?php echo (IMG_URL); ?>Loading/load1.gif" ></center>');	
},
success:function(data){
$("#msg").html(data.msg)
intervalid =setInterval("TiaoSecond('/lh3/index.php/Home/Caiji/index.html')",1000);//==========执行几秒跳转
}
});
}  
}


//=======================获取其他操作
function Get_Ation_Save(oo1,oo2){
if(confirm('您确定要执行此操作？')){   
jQuery.ajax({
url: "/lh3/index.php/Home/Caiji/infodelete.html",
dataType:"json",
type:"POST",
data:{Action:"del",id:oo2},
beforeSend: function(){
$('#msg').html('<center><br><br><img alt="正在加载中..." src="<?php echo (IMG_URL); ?>Loading/load1.gif" ></center>');	
},
success:function(data){
$("#msg").html(data.msg)
intervalid =setInterval("TiaoSecond('/lh3/index.php/Home/Caiji/index.html')",1000);//==========执行几秒跳转
}
});
}  
}


</script>
	</body>
</html>