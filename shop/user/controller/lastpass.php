<?php
	session_start();
	
	//获取
	$id = $_POST['uid'];
	$npass = $_POST['npass'];
	$qrpass = $_POST['qrpass'];
	$yzm = $_POST['yzm'];
	
	//开启数据库
	include("../public/config.php");
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	
	//验证条件
	if(empty($npass)) {
		echo "<script>alert('请填写新密码');window.location.href='../view/czpass.php';</script>";exit;		
	}
	if(empty($qrpass)) {
		echo "<script>alert('请填写确认密码');window.location.href='../view/czpass.php';</script>";exit;		
	}
	if($npass !== $qrpass) {
		echo "<script>alert('两次密码输入不一致');window.location.href='../view/czpass.php';</script>";exit;		
	}
	if(!preg_match("/^[0-9a-zA-Z_]{8,16}$/",$npass)) {
		echo "<script>alert('密码应输入8-16位的字母、数字或下划线！');window.location.href='../view/czpass.php';</script>";exit;			
	}
	if(strtolower($yzm) !== strtolower($_SESSION['yzm'])) {
		echo "<script>alert('验证码错误！');window.location.href='../view/czpass.php';</script>";
	}	
	if(empty($id)) {
		echo "<script>alert('请回到重置页重新验证！');window.location.href='../view/losepass.php';</script>";
	}
	
	//插入数据
	$newpass = md5($npass);
	$sql = "update users set pass = '{$newpass}' where id='{$id}'";
	
	mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)<1){
		echo "<script>alert('重置失败！');window.location.href='../view/czpass.php';</script>";exit;
	}		
	echo "<script>alert('重置成功！请登录');window.location.href='../view/login.php';</script>";
	
	