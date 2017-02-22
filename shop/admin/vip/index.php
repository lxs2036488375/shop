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
    <li><a href="#">会员管理</a></li>
    <li><a href="#">添加会员</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>添加会员信息</span></div>
    <form action="../controller/doAdd.php?a=vip" method="post">
    <ul class="forminfo">
    <li><label>用户名</label><input name="username" type="text" class="dfinput" /><i>用户名应为字母(a-z,A-Z)、数字(0-9)或下划线(_)(必填)</i></li>
    <li><label>真实姓名</label><input name="name" type="text" class="dfinput" />&nbsp;&nbsp;&nbsp;&nbsp;<input name="sex" type="radio" value="1" checked="checked" />先生&nbsp;&nbsp;&nbsp;&nbsp;<input name="sex" type="radio" value="2" />女士</cite><i>请填写真实姓名(必填)</i></li>
    <li><label>密码</label><input name="pass" type="password" class="dfinput" /><i>请输入8-16位的字母或数字(必填)</i></li>
    <li><label>确认密码</label><input name="qrpass" type="password" class="dfinput" /><i>请再次输入密码(必填)</i></li>
    <li><label>地址</label><input name="address" type="text" class="dfinput" /></li>
    <li><label>邮编</label><input name="code" type="text" class="dfinput" /></li>
    <li><label>电话</label><input name="phone" type="text" class="dfinput" /></li>
    <li><label>邮箱</label><input name="email" type="text" class="dfinput" /><i>请输入正确的邮箱(必填)</i></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认添加"/></li>
    </ul>
    </form>
    
    </div>


</body>

</html>
