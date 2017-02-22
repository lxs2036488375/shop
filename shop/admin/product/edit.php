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
				<li><a href="#">编辑商品信息</a></li>
			</ul>
		</div>
		
		<div class="formbody">		
			<div class="formtitle"><span>编辑商品信息</span></div>			
			<?php
				include("../include/config.php");
				$id = $_GET['id'];
				//操作数据库
				$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
				mysqli_select_db($link,DBNAME);
				mysqli_set_charset($link,"utf8");
				$sql = "select * from goods where id = {$id}";
				$result = mysqli_query($link,$sql);
				$row = mysqli_fetch_assoc($result);			
			?>
			<form action="../controller/update.php?a=product" method="post" enctype="multipart/form-data">
				<ul class="forminfo">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<!--这里的商品类别怎么实现选择-->
					<li>
						<label>商品类别</label>
						<select name="typeid" class="scselect">
						<?php
							$sql1 = "select * from type order by concat (path,id) {$limit} ";
							$result1 = mysqli_query($link,$sql1);
							while($row1 = mysqli_fetch_assoc($result1)) {
							//判断并禁用根类别
							$disabled = ($row1['pid'] == 0)?"disabled":"";
							$selected = ($row1['id'] == $row['typeid'])?"selected":"";
								echo "<option value={$row1['id']} {$disabled} {$selected} >{$row1['name']}</option>";
							}
						?>
						</select>						
					</li>
					<li><label>商品名称</label><input type="text" name="goods" class="dfinput" value="<?php echo $row['goods'];?>"><i>(必填)</i></li>
					<li><label>生产厂家</label><input name="company" type="text" class="dfinput" value="<?php echo $row['company'];?>" /></li>
					<li><label>简介</label><input name="descr" type="text" class="dfinput" value="<?php echo $row['descr'];?>" /></li>
					<li><label>单价</label><input name="price" type="text" class="dfinput" value="<?php echo $row['price'];?>" /><i>(必填)</i></li>
					<li><label>状态</label><input type="radio" name="state" value="1" <?php echo $row['state']=="1"?"checked":""; ?>>新添加
										   <input type="radio" name="state" value="2" <?php echo $row['state']=="2"?"checked":""; ?>>在售
										   <input type="radio" name="state" value="0" <?php echo $row['state']=="0"?"checked":""; ?>>下架</li>
					<li><label>库存量</label><input name="store" type="text" class="dfinput" value="<?php echo $row['store'];?>" /><i>(必填)</i></li>
					<input type="hidden" name="picname" value="<?php echo $row['picname']; ?>">
					<li><label>原图片</label><image src="<?php echo "../controller/pic/s_".$row['picname'];?>"></li>
					<li><label>修改图片</label><input type="file" name="uploadfile" /></li>
					<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认修改"/></li>
				</ul>
			</form>
			<?php
				mysqli_free_result($result);
				mysqli_close($link);
			?>
		</div>
	</body>
</html>
