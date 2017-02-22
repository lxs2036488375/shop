<?php
	
		include("../public/config.php");
		//连接数据库
		$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
		mysqli_select_db($link,DBNAME);
		mysqli_set_charset($link,"utf8");	
		$username = $_POST['username'];
		$name = $_POST['name'];
		$pass = md5($_POST['pass']);
		$qrpass = md5($_POST['qrpass']);
		$sex = $_POST['sex'];
		$email = $_POST['email'];
		$addtime = time();
		//在这些输入确认非空的情况下执行
		if(empty($username)||empty($name)||empty($pass)||empty($qrpass)||empty($email)){
				echo "<script>alert('请完整填写必填字段！');window.location.href='../view/reg.php';</script>";exit;						
		}	
		//正则匹配验证
		//会员账户应为字母(a-z,A-Z)、数字(0-9)或下划线(_)
		if(!preg_match("/^[0-9a-zA-Z_]+$/",$username)) {
			echo "<script>alert('会员账户包含未知元素！');window.location.href='.../view/reg.php';</script>";exit;
		}
		//请输入8-16位的字母或数字
		if(!preg_match("/^[0-9a-zA-Z_]{8,16}$/",$_POST['pass'])) {
			echo "<script>alert('密码应输入8-16位的字母、数字或下划线！');window.location.href='../view/reg.php';</script>";exit;			
		}
		//电话
		if(!empty($phone)){
			if(!preg_match("/^[1][34578][0-9]{9}$/",$phone)) {
				echo "<script>alert('请输入正确的手机号码！');window.location.href='../view/reg.php';</script>";exit;
			}
		}
		//邮箱
		if(!preg_match("/^[0-9a-zA-Z_]+@[0-9a-zA-Z_]+\.[a-z]{2,}$/",$email)) {
			echo "<script>alert('请输入正确的邮箱！');window.location.href='../view/reg.php';</script>";exit;
		}				
		//判断密码与确认密码是否一致
		if($pass !== $qrpass) {
			echo "<script>alert('两次输入密码不一致！请重新输入');window.location.href='../view/reg.php';</script>";exit;
		}
		$sql = "insert into users (username,name,pass,sex,email,addtime) values ('{$username}','{$name}','{$pass}',{$sex},'{$email}','{$addtime}')";		
		mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)<1){
			echo "<script>alert('添加失败！');window.location.href='../view/reg.php';</script>";exit;
		}		
		echo "<script>alert('注册成功！请登录');window.location.href='../view/login.php';</script>";