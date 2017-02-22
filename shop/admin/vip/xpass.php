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
			<li><a href="#">修改密码</a></li>
		</ul>
    </div>
    
    <div class="formbody">
		<div class="formtitle"><span>修改密码</span></div>
		<form action="../controller/update.php?a=mima" method="post">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			<ul class="forminfo">
				<li><label>密码</label><input name="pass" type="password" class="dfinput" /><i>请输入8-16位的字母或数字(必填)</i></li>
				<li><label>确认密码</label><input name="qrpass" type="password" class="dfinput" /><i>请再次输入密码(必填)</i></li>
				<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认修改"/></li>
			</ul>
		</form>
    
    </div>


</body>

</html>
