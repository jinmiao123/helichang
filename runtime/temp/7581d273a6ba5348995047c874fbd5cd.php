<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\www\public/../application/admin\view\articlelist\add.html";i:1526545948;}*/ ?>
<html>
<head>
    <title>文章添加</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="/public/static/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/public/static/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/public/static/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<form class="form form-horizontal" method="post" name="articleadd" enctype="multipart/form-data" action="addart">
    标题：<input name="title" required /><br/>
    文章类型：<select name="type">
    <option value="1">文章类型1</option>
    <option value="2">文章类型2</option>
    <option value="3">文章类型3</option>
    <option value="4">文章类型4</option>
</select><br/>
    作者：<input name="author" type="text" required /><br/>
    简介：<input name="description" type="text" required /><br/>
    关键字：<input name="keywords" type="text" required /><br/>
    内容：<script id="editor" type="text/plain" style="width:1024px;height:500px; " name="content"></script>
    来源：<input name="copyfrom" type="text" /><br/>
    缩略图地址：<input name="thumbnail" type="file" /><br/>
    <input value="提交" type="submit"/>
</form>
<script type="text/javascript">
    var ue = UE.getEditor('editor');
</script>
</body>
</html>