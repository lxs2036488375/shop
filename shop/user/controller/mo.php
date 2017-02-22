<?php
	include("../public/config.php");
	$id = $_GET['id'];
	$link = mysqli_connect(HOST,USER,PASS);
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	$sql1 = "update address set state = 1";
	mysqli_query($link,$sql1);
	$sql = "update address set state = 0 where id = {$id}";
	mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)<1) {
		echo "<script>alert('修改失败！');window.location.href='../view/address.php';</script>";exit;
	}
	echo "<script>alert('修改成功！');window.location.href='../view/address.php';</script>";