<?php
	//接收传过来的值
	$c = $_GET['c'];
	$id = $_GET['id'];
	//连接数据库
	include("../public/config.php");
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
		
	switch($c) {
		case 0:
			$sql = "update orders set status=3 where id = {$id};";
			mysqli_query($link,$sql);			
		break;
		case 1:
			$sql = "update orders set status=2 where id = {$id};";
			mysqli_query($link,$sql);
		break;
		case 2:
			//跳到评论页
			
		break;
		case 3:
			//删除无效订单
			//需注意删除orders表该条信息的同时删除detail表的该条信息
			$delsqlo = "delete from orders where id = {$id}";
			mysqli_query($link,$delsqlo);
			$delsqld ="delete from detail where orderid = {$id}";
			echo $delsqld;
			mysqli_query($link,$delsqld);
		break;
	}
	mysqli_close($link);
	header("location:../view/order.php");