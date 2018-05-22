<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wamp64\www\hlcfc\public/../application/admin\view\typelist\edit2.html";i:1526953389;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改参数</title>
</head>
<body>
<form class="form form-horizontal" method="post" name="paramedit" enctype="multipart/form-data" action="editParam">
    <input name="id" value=<?php echo $id; ?> type="txt" required hidden="hidden" />
    参数名：<input name="paramname" value=<?php echo $paramname; ?> type="text" required /><br/>
    类型id: <input name="typeid" value=<?php echo $typeid; ?> type="txt" required /><br/>
    <input value="提交" type="submit"/>
</form>

</body>
</html>