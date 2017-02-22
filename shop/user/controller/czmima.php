<?php
	session_start();
	
	include("../public/config.php");
	
	//接收post传值
	$username = $_POST['username'];
	$yzm = $_POST['yzm'];
	
	if(empty($username)) {
		echo "<script>alert('请填写用户名');window.location.href='../view/losepass.php';</script>";exit;		
	}
	if(empty($yzm)){
		echo "<script>alert('请填写验证码！');window.location.href='../view/losepass.php';</script>";exit;		
	}
	if(strtolower($yzm) !== strtolower($_SESSION['yzm'])) {
		echo "<script>alert('验证码错误！');window.location.href='../view/losepass.php';</script>";exit;
	}	
	
	//开启数据库
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	
	$sql1 = "select * from users where username = '{$username}'";
	$result1 = mysqli_query($link,$sql1);
	$row1 = mysqli_fetch_assoc($result1);
	
	if(count($row1)<1) {
		echo "<script>alert('该用户不存在！');window.location.href='../view/losepass.php';</script>";exit;
	}
	
	$sql = "select * from mibao where uid = '{$row1['id']}'";
	
	$result = mysqli_query($link,$sql);
	@$row = mysqli_fetch_assoc($result);
	if(count($row) < 1) {
		echo "<script>alert('由于您没有设置密保，暂时不能找回密码！');window.location.href='../view/losepass.php';</script>";exit;
	}
	header("location:../view/czmima.php?uid={$row['uid']}");