<?php
	session_start();
	if(empty($_SESSION['username'])) {
		echo "<script>alert('请登录!');top.location.href='../include/login.php'</script>";
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
			<li><a href="#">订单管理</a></li>
			<li><a href="#">编辑订单</a></li>
		</ul>
    </div>
    
    <div class="formbody">
		<div class="formtitle"><span>编辑订单</span></div>
		<?php
				include("../include/config.php");
				$id = $_GET['id'];
				//操作数据库
				$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
				mysqli_select_db($link,DBNAME);
				mysqli_set_charset($link,"utf8");
				$sql = "select * from orders where id = {$id}";
				$result = mysqli_query($link,$sql);
				$row = mysqli_fetch_assoc($result);
		?>
		<form action="../controller/update.php?a=orders" method="post">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<ul class="forminfo">
				<li><label>地址</label><input name="address" type="text" class="dfinput"  value="<?php echo $row['address'] ?>"/></li>
				<li><label>邮编</label><input name="code" type="text" class="dfinput" value="<?php echo $row['code'] ?>"/></li>
				<li><label>电话</label><input name="phone" type="text" class="dfinput" value="<?php echo $row['phone'] ?>"/></li>
				<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认修改"/></li>
			</ul>
		</form>
    
    </div>


</body>

</html>
