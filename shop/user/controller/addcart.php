<?php
	session_start();
	//拿到相应的id把对应的产品查出来
	$id = $_GET['id'];
	include("../public/config.php");
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	$sql = "select * from goods where id = {$id}";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);
	//如果后台修改了图片，直接给他session会导致图片不可用，因此只能给他id去后台遍历
	// echo "<pre>";
	// print_r($_SESSION);
	
	//把需要的信息放到session中
	if(empty($_SESSION["shoplist"][$id])) {
		$_SESSION["shoplist"][$id] = $row;
		$_SESSION["shoplist"][$id]["num"] = 1;
	}else{
		$_SESSION["shoplist"][$id]["num"] += 1;		
	}
	foreach($_SESSION["shoplist"] as $k => $v) {
			$num_he += $v['num'];
	}
	$_SESSION['num_he'] = $num_he;
	echo "<script>alert('成功加入购物车!');window.location.href='../view/product.php?id={$id}'</script>";