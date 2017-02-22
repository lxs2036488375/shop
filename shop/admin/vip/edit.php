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
			<li><a href="#">会员管理</a></li>
			<li><a href="#">编辑会员信息</a></li>
		</ul>
    </div>
    
    <div class="formbody">
		<div class="formtitle"><span>编辑会员信息</span></div>
		<?php
				include("../include/config.php");
				$id = $_GET['id'];
				//操作数据库
				$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
				mysqli_select_db($link,DBNAME);
				mysqli_set_charset($link,"utf8");
				$sql = "select * from users where id = {$id}";
				$result = mysqli_query($link,$sql);
				$row = mysqli_fetch_assoc($result);
				$zhutai = array(1 => "启用",2 => "禁用",0 => "后台管理员");//1：启用，2：禁用 0:后台管理员
		?>
		<form action="../controller/update.php?a=vip" method="post">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<ul class="forminfo">
				<li><label>真实姓名</label><input name="name" type="text" class="dfinput" value="<?php echo $row['name']; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;<input name="sex" type="radio" value="1"  <?php echo $row['sex']=="1"?"checked":""; ?> />先生&nbsp;&nbsp;&nbsp;&nbsp;<input name="sex" type="radio" value="2" <?php echo $row['sex']=="2"?"checked":""; ?> />女士</cite></li>
				<li><label>地址</label><input name="address" type="text" class="dfinput"  value="<?php echo $row['address'] ?>"/></li>
				<li><label>邮编</label><input name="code" type="text" class="dfinput" value="<?php echo $row['code'] ?>"/></li>
				<li><label>电话</label><input name="phone" type="text" class="dfinput" value="<?php echo $row['phone'] ?>"/></li>
				<li><label>邮箱</label><input name="email" type="text" class="dfinput" value="<?php echo $row['email'] ?>"/></li>
				<li><label>状态</label><input type="radio" name="state" value="1" <?php echo $row['state']=="1"?"checked":""; ?>>启用
										<input type="radio" name="state" value="2" <?php echo $row['state']=="2"?"checked":""; ?>>禁用
										<input type="radio" name="state" value="0" <?php echo $row['state']=="0"?"checked":""; ?>>管理员</li>
				<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认修改"/></li>
			</ul>
		</form>
    
    </div>


</body>

</html>
