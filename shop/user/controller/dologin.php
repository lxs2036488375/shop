<?php
	//开启session
	session_start();
	//获取值
	@$a = $_GET['a'];
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$yzm = $_POST['yzm'];
	//进行验证
	//判断内容不为空
	if(empty($username)){
		echo "<script>alert('请填写用户名！');window.location.href='../view/login.php?a={$a}';</script>";exit;		
	}
	if(empty($pass)){
		echo "<script>alert('请填写密码！');window.location.href='../view/login.php?a={$a}';</script>";exit;		
	}
	if(empty($yzm)){
		echo "<script>alert('请填写验证码！');window.location.href='../view/login.php?a={$a}';</script>";exit;		
	}
	//先验证验证码
	if(strtolower($yzm) !== strtolower($_SESSION['yzm'])) {
		echo "<script>alert('验证码错误！');window.location.href='../view/login.php?a={$a}';</script>";
	}	
	
	//再到数据库中验证用户名是否存在
		include("../public/config.php");
		//连接数据库
		$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
		mysqli_select_db($link,DBNAME);
		mysqli_set_charset($link,"utf8");	
		$sql = "select * from users where username = '{$username}'";
		echo $sql;
		$result = mysqli_query($link,$sql);
		if(mysqli_num_rows($result) < 1){
			echo "<script>alert('用户名不存在!');window.location.href='../view/login.php?a={$a}'</script>";
		}
		$row = mysqli_fetch_assoc($result);
		//如果用户名存在再去验证密码是否正确		
		if(md5($pass) !== $row['pass']) {
			echo "<script>alert('密码不正确!');window.location.href='../view/login.php?a={$a}'</script>";
		}
		$_SESSION['usernameu'] = $username;
		
		if(empty($_GET['a'])) {
			echo "<script>alert('登录成功!');window.location.href='../index.php'</script>";
		}else{
			echo "<script>alert('登录成功!');window.location.href='../view/{$a}'</script>";			
		}
	