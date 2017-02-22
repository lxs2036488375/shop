<?php
	session_start();
	include("../public/config.php");
	
	//接收post传值
	$ypass = $_POST['ypass'];
	$npass = $_POST['npass'];
	$qrpass = $_POST['qrpass'];
	
	//开启数据库
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	$sql1 = "select * from users where username = '{$_SESSION['usernameu']}'";
	$result1 = mysqli_query($link,$sql1);
	$row1 = mysqli_fetch_assoc($result1);
	
	if(empty($ypass)) {
		echo "<script>alert('请填写原密码');windows.location.href='../view/xgpass.php';</script>";exit;		
	}
	if(empty($npass)) {
		echo "<script>alert('请填写新密码');windows.location.href='../view/xgpass.php';</script>";exit;		
	}
	if(empty($qrpass)) {
		echo "<script>alert('请填写确认密码');windows.location.href='../view/xgpass.php';</script>";exit;		
	}
	if($npass !== $qrpass) {
		echo "<script>alert('两次密码输入不一致');windows.location.href='../view/xgpass.php';</script>";exit;		
	}
	if(!preg_match("/^[0-9a-zA-Z_]{8,16}$/",$npass)) {
		echo "<script>alert('密码应输入8-16位的字母、数字或下划线！');window.location.href='../view/xgpass.php';</script>";exit;			
	}
	if(md5($ypass) !== $row1['pass']) {
		echo "<script>alert('原密码不正确');windows.location.href='../view/xgpass.php';</script>";exit;
	}
	if(md5($npass) == $row1['pass']) {
		echo "<script>alert('新密码与旧密码不能一样！');windows.location.href='../view/xgpass.php';</script>";exit;
	}
	$newpass = md5($npass);
	$sql = "update users set pass = '{$newpass}' where username='{$_SESSION['usernameu']}'";
	$result = mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)<1){
		echo "<script>alert('修改失败！');window.location.href='../view/xgpass.php';</script>";exit;
	}		
	echo "<script>alert('修改成功！');window.location.href='../view/index.php';</script>";