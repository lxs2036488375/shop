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
				<li><a href="#">类别管理</a></li>
				<li><a href="#">编辑分类</a></li>
			</ul>
		</div>
		<?php
			include("../include/config.php");
			$id = $_GET['id'];
			//操作数据库
			$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
			mysqli_select_db($link,DBNAME);
			mysqli_set_charset($link,"utf8");
			$sql = "select * from type where id = {$id}";
			$result = mysqli_query($link,$sql);
			$row = mysqli_fetch_assoc($result);
		?>
		<div class="formbody">
			<div class="formtitle"><span>添加分类</span></div>
			<form action="../controller/update.php?a=type" method="post">
				<ul class="forminfo">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<li><label>商品类别名称</label><input name="name" type="text" class="dfinput" value="<?php echo $row['name'];?>" /></li>
					<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认修改"/></li>
				</ul>
			</form>
		</div>
	</body>

</html>
