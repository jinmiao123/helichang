<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wamp64\www\hlcfc\public/../application/admin\view\typelist\edit.html";i:1526953796;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改类型</title>
</head>
<body>
<form class="form form-horizontal" method="post" name="paramedit" enctype="multipart/form-data" action="editType">
    <input name="typeid" value=<?php echo $typeid; ?> type="txt" required hidden="hidden" />
    类型名：<input name="typename" value=<?php echo $typename; ?> type="text" required /><br/>
    方法：<input name="function" value=<?php echo $function; ?> type="text" required /><br/>
    备注：<input name="note" value=<?php echo $note; ?> type="text" required /><br/>
    <input value="提交" type="submit"/>
</form>

</body>
</html>