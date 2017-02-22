<?php
	
	
	//连接数据库新增管理员用户
	include("../public/config.php");
	$link = mysqli_connect(HOST,USER,PASS) or die("连接失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	$qrpass = md5($_POST['qrpass']);
	$email = $_POST['email'];
	$addtime = time();
	$state = 0;
	//在这些输入确认非空的情况下执行
	if(empty($user)||empty($pass)||empty($qrpass)||empty($email)){
			echo "<script>alert('请完整填写字段！');window.location.href='./tep2.php';</script>";exit;						
	}	
	
	
	//判断密码与确认密码是否一致
	if($pass !== $qrpass) {
		echo "<script>alert('两次输入密码不一致！请重新输入');window.location.href='./tep2.php';</script>";exit;
	}
	//请输入8-16位的字母或数字
	if(!preg_match("/^[0-9a-zA-Z_]{8,16}$/",$_POST['pass'])) {
		echo "<script>alert('密码应输入8-16位的字母、数字或下划线！');window.location.href='./tep2.php';</script>";exit;
		
	}	
	
	$sql = "insert into users (username,name,pass,email,addtime,state) values ('{$user}','{$user}','{$pass}','{$email}','{$addtime}',{$state})";		

	mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)<1){
		echo "<script>alert('添加失败！');window.location.href='./tep2.php';</script>";exit;
	}		
	echo "<script>alert('添加成功！请查看');window.location.href='./tep3.php';</script>";