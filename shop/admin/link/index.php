<?php
	session_start();
	if(empty($_SESSION['username'])) {
		echo "<script>alert('请登录!');window.location.href='../include/login.php'</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">友情链接</a></li>
    <li><a href="#">添加链接</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>添加友情链接</span></div>
    <form action="../controller/doAdd.php?a=link" method="post">
    <ul class="forminfo">
    <li><label>链接地址</label><input name="url" type="text" class="dfinput" /></li>
    <li><label>链接描述/名称</label><input name="descr" type="text" class="dfinput" /></li>
    
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认添加"/></li>
    </ul>
    </form>
    
    </div>


</body>

</html>
