<?php
	include("../public/config.php");
	//获取id
	$id = $_GET['id'];
	
	//数据库
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	$sql = "delete from address where id= {$id}";
	mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)<1){
		echo "<script>alert('删除失败！');window.location.href='../view/address.php';</script>";exit;
	}
	mysqli_close($link);
	echo "<script>alert('删除成功！');window.location.href='../view/address.php';</script>";