<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/Applications/MAMP/htdocs/tp5/public/../application/admin/view/index/index.html";i:1500200750;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="renderer" content="webkit|ie-comp|ie-stand" />
	<meta charset="UTF-8">
	<title>后台管理系统</title>
	<link rel="stylesheet" href="static/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" type="text/css" href="static/js/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="static/js/layout/themes/bootstrap/easyui.css">
	<link rel="stylesheet" type="text/css" href="static/js/layout/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="static/css/buttons.css">
	<link rel="stylesheet" type="text/css" href="static/css/animate.css">
	<link rel="stylesheet" type="text/css" href="static/css/core.css">
	<link rel="stylesheet" type="text/css" href="static/css/themes/red.css" id="colorIn">
	<script type="text/javascript" src="static/js/jquery.min.js"></script>
	<script>
        var MQ_HOST = '<?php echo MQ_HOST?>';
        var MQ_PORT = '<?php echo MQ_PORT?>';
	</script>
	<script type="text/javascript" src="static/js/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="static/js/layout/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="static/js/layout/locale/easyui-lang-zh_CN.js"></script>
	<script type="text/javascript" src="static/js/core.js"></script>
	<style>
		.themes{padding:5px 10px 5px 5px;margin-left: 10px;}
		.zi{background: #5823CB;}
		.red{background: #F15757;}
		.huang{background: #FAAC3D;}
		.liu{background: #52B058;}
	</style>
</head>
<body class="easyui-layout">
<div data-options="region:'north',border:false" style="height:110px;overflow: hidden;border:none;" class="animated bounceInDown">
	<div style="width: 100%; min-width: 1000px;">
		<div style="padding:5px;float:left; overflow: hidden;">
			<span class="glyphicon glyphicon-bullhorn"></span>&nbsp;公告：欢迎进入后台管理系统!
			<!--<span>
            <a href="tencent://message/?uin=3120491793&amp;Site=web&amp;Menu=yes" style="font-weight: bold;">
            <img src="static/images/qq.png" width="20">&nbsp;技术支持1</a>
            </span>
            <span>
            <a href="tencent://message/?uin=2382573731&amp;Site=web&amp;Menu=yes" style="font-weight: bold;">
            <img src="static/images/qq.png" width="20">&nbsp;技术支持2</a>
            </span>
            <span>
            <a href="tencent://message/?uin=2070510353&amp;Site=web&amp;Menu=yes" style="font-weight: bold;">
            <img src="static/images/qq.png" width="20">&nbsp;技术支持3</a>
            </span>
            <span>
            <a href="tencent://message/?uin=1219188813&amp;Site=web&amp;Menu=yes" style="font-weight: bold;">
            <img src="static/images/qq.png" width="20">&nbsp;技术支持4</a>
            </span>
            <span>
            <a href="tencent://message/?uin=3446239944&amp;Site=web&amp;Menu=yes" style="font-weight: bold;">
            <img src="static/images/qq.png" width="20">&nbsp;投诉建议</a>
            </span>-->
		</div>
		<div style="padding:5px; float: right;">
            <span>
                <a href="javascript:;" class="themes zi" onclick="change('zi')"></a>
                <a href="javascript:;" class="themes red" onclick="change('red')"></a>
                <a href="javascript:;" class="themes huang" onclick="change('huang')"></a>
                <a href="javascript:;" class="themes liu" onclick="change('liu')"></a>
                </span>

			<span id="Clock"></span>
			<span>在线人数:<b style="color:red" class="online">0</b>&nbsp;</span>
			<span>今日注册:<b style="color:red" class="bank_name">0</b>&nbsp;</span>
			<a href="javascript:;" title="刷新在线人数" onclick="refreshUserCount()"><span class="glyphicon glyphicon-refresh"></span></a>
			<!-- <span>平台额度：<b style="color:red"></b>&nbsp;&nbsp;</span> -->
			<span>登录帐号：
                        <a href="javascript:;" style="color:#069" onClick="Core.dialog('修改密码','',function(){},true,false);">修改密码</a>&nbsp;&nbsp;
	        			<a href="javascript:;" style="color:#069" onClick="Core.exit();">退出</a>
	        	</span>

		</div>
	</div>
	<div style="clear:both"></div>
	<div class="top-menu" id="menuList">
	</div>

	<div id="submenu"></div>
</div>
<div data-options="region:'center',title:''" class="animated rotateInDownRight">
	<div id="task" class="easyui-tabs" data-options="fit:true,tools:[{iconCls:'icon-reload',handler:function(){Core.refresh();}},{iconCls:'icon-no',handler:function(){Core.exit();}}]">
		<div title="开始页" data-options="href:'welcome/start',closable:false"></div>
		<!--welcome/start  stats/order-->
	</div>
</div>
<div id="mm" class="easyui-menu">
	<div onClick="Core.refresh()">刷新</div>
	<div onClick="Core.closeCurrent()">关闭当前页</div>
	<div onClick="Core.closeOthers()">关闭其它页</div>
	<div onClick="Core.closeAll()">关闭所有页</div>
</div>
<div id="audio" style="display: none"></div>
<script type='text/javascript'>
    function change(a){
        var css=document.getElementById('colorIn');
        css.setAttribute('href','static/css/themes/'+a+'.css');
    }
    function refreshUserCount() {
        $.getJSON(WEB+'login/user_count',function(c){
            if(c.code == 200){
                $('.online').html('');
                $('.bank_name').html('');
                $('.online').html(c.data['online']);
                $('.bank_name').html(c.data['bank_name']);
            }
        });
    }
</script>
<SCRIPT language=JavaScript>
    function tick() {
        var years, months, days, hours, minutes, seconds;
        var intYears, intMonths, intDays, intHours, intMinutes, intSeconds;
        var today;
        today = new Date(); //系统当前时间
        intYears = today.getFullYear(); //得到年份,getFullYear()比getYear()更普适
        intMonths = today.getMonth() + 1; //得到月份，要加1
        intDays = today.getDate(); //得到日期
        intHours = today.getHours(); //得到小时
        intMinutes = today.getMinutes(); //得到分钟
        intSeconds = today.getSeconds(); //得到秒钟
        years = intYears + "-";
        if (intMonths < 10) {
            months = "0" + intMonths + "-";
        } else {
            months = intMonths + "-";
        }
        if (intDays < 10) {
            days = "0" + intDays + " ";
        } else {
            days = intDays + " ";
        }
        if (intHours == 0) {
            hours = "00:";
        } else if (intHours < 10) {
            hours = "0" + intHours + ":";
        } else {
            hours = intHours + ":";
        }
        if (intMinutes < 10) {
            minutes = "0" + intMinutes + ":";
        } else {
            minutes = intMinutes + ":";
        }
        if (intSeconds < 10) {
            seconds = "0" + intSeconds + " ";
        } else {
            seconds = intSeconds + " ";
        }
        timeString = years + months + days + hours + minutes + seconds;
        Clock.innerHTML = timeString;
        window.setTimeout("tick();", 1000);
    }
    window.onload = tick;
</SCRIPT>
</body>
</html>
