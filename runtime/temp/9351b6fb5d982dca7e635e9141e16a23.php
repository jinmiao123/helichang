<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\wamp64\www\hlcfc\public/../application/admin\view\typelist\add.html";i:1526890299;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>addType</title>
</head>
<body>
<form class="form form-horizontal" method="post" name="typeadd" enctype="multipart/form-data" action="addType">
    方案名：<input name="typename" type="text" required /><br/>
    方法：<input name="function" type="text" required /><br/>
    备注：<input name="note" type="text" required /><br/>
    <input value="提交" type="submit"/>
</form>
</body>
</html>