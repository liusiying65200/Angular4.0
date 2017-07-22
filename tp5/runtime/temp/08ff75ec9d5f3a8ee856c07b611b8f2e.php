<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/Applications/MAMP/htdocs/tp5/public/../application/admin/view/auth/index.html";i:1500214932;}*/ ?>
<div class="box-body table-responsive">
    <table id="example2" class="table table-striped table-hover">
        <thead>
        <tr>
            <th><input type="checkbox" ></th>
            <th>名称</th>
            <th>URL</th>
            <th>标识符</th>
            <th>排序</th>
            <th>类型</th>
            <th>图标</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><input type="checkbox" value='<?php echo $vo['id']; ?>' name="id[]" ></td>
            <td><?php echo $vo['name']; ?></td>
            <td><?php echo $vo['url']; ?></td>
            <td><?php echo $vo['menu_id']; ?></td>
            <td><?php echo $vo['sort']; ?></td>
            <td><?php if($vo['category'] == 1): ?>主菜单<?php elseif($vo['category'] == 2): ?>二级菜单<?php else: ?>操作<?php endif; ?></td>
            <td><?php echo $vo['icon']; if(!(empty($vo['icon_size']) || (($vo['icon_size'] instanceof \think\Collection || $vo['icon_size'] instanceof \think\Paginator ) && $vo['icon_size']->isEmpty()))): ?>(<?php echo $vo['icon_size']; ?>)<?php endif; ?></td>
            <td><?php if(in_array(($vo['status']), explode(',',"1"))): ?><span class="badge bg-green">启用</span><?php else: ?><span class="badge bg-red">禁用</span><?php endif; ?></td>
            <td><button onclick='load_modal("__CONTROLLER__/edit?id=<?php echo $vo['id']; ?>")' class="btn btn-xs btn-info">编辑</button></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>