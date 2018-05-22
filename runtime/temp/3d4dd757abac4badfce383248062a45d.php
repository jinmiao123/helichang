<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wamp64\www\hlcfc\public/../application/admin\view\typelist\index.html";i:1526954048;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>参数</title>
</head>
<body>
    <a href="/hlcfc/public/admin/TypeList/add">添加类型</a><br/>
    <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    类型id：<?php echo $vo['typeid']; ?>
    类型名：<?php echo $vo['typename']; ?>
    方法：<?php echo $vo['function']; ?>
    备注：<?php echo $vo['note']; ?><br/>
    <a href="/hlcfc/public/admin/TypeList/add2?typeid=<?php echo $vo['typeid']; ?>">添加参数</a><br/>
    <?php if(is_array($vo['params']) || $vo['params'] instanceof \think\Collection || $vo['params'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['params'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?>
        参数名：<?php echo $vi['paramname']; ?><br/>
        参数id：<?php echo $vi['id']; ?><br/>
        <a href="/hlcfc/public/admin/TypeList/edit2?id=<?php echo $vi['id']; ?>&typeid=<?php echo $vo['typeid']; ?>&paramname=<?php echo $vi['paramname']; ?>">编辑</a>
        <a href="/hlcfc/public/admin/TypeList/delType?id=<?php echo $vo['typeid']; ?>">删除</a><br/>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <a href="/hlcfc/public/admin/TypeList/edit?typeid=<?php echo $vo['typeid']; ?>&typename=<?php echo $vo['typename']; ?>&function=<?php echo $vo['function']; ?>&note=<?php echo $vo['note']; ?>">编辑</a>
    <a href="/hlcfc/public/admin/TypeList/delType?id=<?php echo $vo['typeid']; ?>">删除</a><br/>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>