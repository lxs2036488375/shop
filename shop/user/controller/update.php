<?php
	include("../public/config.php");
	//更新
	//数据库操作
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	
	switch($_GET['a']){
		case "user":
			$id = $_POST['id'];
			$name = $_POST['name'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			//在这些输入确认非空的情况下执行
			if(empty($name)){
					echo "<script>alert('请填写真实姓名！');window.location.href='../view/xguser.php';</script>";exit;						
			}
			//电话
			if(!empty($phone)){
				if(!preg_match("/^[1][34578][0-9]{9}$/",$phone)) {
					echo "<script>alert('请输入正确的手机号码！');window.location.href='../view/xguser.php';</script>";exit;
				}
			}
			//邮箱
			if(!preg_match("/^[0-9a-zA-Z_]+@[0-9a-zA-Z_]+\.[a-z]{2,}$/",$email)) {
				echo "<script>alert('请输入正确的邮箱！');window.location.href='../view/xguser.php';</script>";exit;
			}		
			
			$sql = "update users set name='{$name}',phone='{$phone}',email='{$email}' where id = {$id}";
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)<1){
				echo "<script>alert('修改失败！');window.location.href='../view/xguser.php';</script>";exit;
			}			
			echo "<script>alert('修改成功！');window.location.href='../view/xguser.php';</script>";
		break;
	}
	mysqli_close($link);