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
				<li><a href="#">添加分类</a></li>
			</ul>
		</div>
		<?php
			//根类别信息
			$pid = 0;
			$path = "0,";
			//通过判断是否在地址栏中传值从而来判断是添加的根类别还是子类别
			if(!empty($_GET['id'])&& !empty($_GET['path'])) {
				$pid = $_GET['id'];
				$path = $_GET['path'].$pid.",";
			}	
		?>
		<div class="formbody">
			<div class="formtitle"><span>添加分类</span></div>
			<form action="../controller/doAdd.php?a=type" method="post">
				<ul class="forminfo">
					<input type="hidden" name="pid" value="<?php echo $pid ?>">
					<input type="hidden" name="path" value="<?php echo $path; ?>">
					<li><label>商品类别名称</label><input name="name" type="text" class="dfinput" /></li>
					<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认添加"/></li>
				</ul>
			</form>
		</div>
	</body>

</html>
