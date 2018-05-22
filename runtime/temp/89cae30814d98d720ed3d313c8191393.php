<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\www\public/../application/admin\view\articlelist\edit2.html";i:1526537293;}*/ ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>edit</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="/public/static/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/public/static/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/public/static/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<form class="form form-horizontal" method="post" name="articleedit" enctype="multipart/form-data" action="editart?id=<?php echo $id; ?>">
    标题：<input name="title" value="<?php echo $title; ?>"/><br/>
    文章类型：<select name="type">
    <option value="1" <?php echo ($type==1)? 'selected':''; ?> >文章类型1</option>
    <option value="2" <?php echo ($type==2)? 'selected':''; ?> >文章类型2</option>
    <option value="3" <?php echo ($type==3)? 'selected':''; ?>>文章类型3</option>
    <option value="4" <?php echo ($type==4)? 'selected':''; ?>>文章类型4</option>
</select><br/>
    作者：<input name="author" type="text" value="<?php echo $author; ?>" /><br/>
    简介：<input name="description" type="text" value="<?php echo $description; ?>" /><br/>
    关键字：<input name="keywords" type="text" value="<?php echo $keywords; ?>" /><br/>
    内容：<script id="editor" type="text/plain" style="width:1024px;height:500px; " name="content"><?php echo $content; ?></script>
    作者：<input name="author" type="text" value="<?php echo $author; ?>" /><br/>
    来源：<input name="copyfrom" type="text" value="<?php echo $copyfrom; ?>" /><br/>
    缩略图地址：<input name="thumbnail" type="file" value="<?php echo $thumbnail; ?>" /><br/>
    <input value="提交" type="submit"/>
</form>
</body>
<script type="text/javascript">
    var ue = UE.getEditor('editor');
</script>
</html>