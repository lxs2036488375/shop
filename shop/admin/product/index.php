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
				<li><a href="#">商品管理</a></li>
				<li><a href="#">添加商品</a></li>
			</ul>
		</div>
		<div class="formbody">
			<div class="formtitle"><span>添加商品</span></div>		
			<form action="../controller/doAdd.php?a=product" method="post" enctype="multipart/form-data">
				<ul class="forminfo">
					<li>
						<label>选择商品类别</label>
						<select name="typeid" class="scselect">
						<?php
							//连接数据库
							include("../include/config.php");
							$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
							mysqli_select_db($link,DBNAME);
							mysqli_set_charset($link,"utf8");
							$sql = "select * from type order by concat (path,id) {$limit} ";
							$result = mysqli_query($link,$sql);
							while($row = mysqli_fetch_assoc($result)) {
							//判断并禁用根类别
							$disabled = ($row['pid'] == 0)?"disabled":"";
								echo "<option value={$row['id']} {$disabled}>{$row['name']}</option>";
							}
						?>
						</select>
					</li>
					<li><label>商品名称</label><input name="goods" type="text" class="dfinput" /><i>(必填)</i></li>
					<li><label>生产厂家</label><input name="company" type="text" class="dfinput" /></li>
					<li><label>简介</label><input name="descr" type="text" class="dfinput" /></li>
					<li><label>单价</label><input name="price" type="text" class="dfinput" /><i>(必填)</i></li>
					<li><label>库存量</label><input name="store" type="text" class="dfinput" /><i>(必填)</i></li>
					<li><label>商品图片</label><input type="file" name="uploadfile" /><i>(必选)</i></li>
					<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认发布"/></li>
				</ul>
			</form>
		</div>
	</body>
</html>
