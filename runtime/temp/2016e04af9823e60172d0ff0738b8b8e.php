<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wamp64\www\hlcfc\public/../application/admin\view\typelist\add2.html";i:1526896343;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form class="form form-horizontal" method="post" name="paramadd" enctype="multipart/form-data" action="addParam">
    参数名：<input name="paramname" type="text" required /><br/>
    <input name="typeid" value=<?php echo $typeid; ?> type="txt" required hidden="hidden" />
    <input value="提交" type="submit"/>
</form>
</body>
</html>