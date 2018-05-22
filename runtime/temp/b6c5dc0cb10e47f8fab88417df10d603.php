<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\www\public/../application/admin\view\articlelist\index.html";i:1526535289;}*/ ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>资讯</title>
</head>
<body>
      <a href="/public/admin/Articlelist/add">添加</a>
      <?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <h1><?php echo $vo['title']; ?></h1>
      简介：<?php echo $vo['description']; ?> <br/>
      关键字：<?php echo $vo['keywords']; ?> <br/>
      作者：<?php echo $vo['author']; ?> <br/>
      时间：<?php echo $vo['inputtime']; ?><br/>
      来源：<?php echo $vo['copyfrom']; ?><br/>
      缩略图：<img src="/public/uploads/<?php echo $vo['thumbnail']; ?>" style="width: 50px;"/><br/>
      <a href="/public/admin/Articlelist/edit?id=<?php echo $vo['id']; ?>">编辑</a>
      <a href="/public/admin/Articlelist/del?id=<?php echo $vo['id']; ?>">删除</a>
      <?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>