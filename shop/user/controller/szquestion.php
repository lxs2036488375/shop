<?php
	session_start();
	$usernameu = $_SESSION['usernameu'];
	
	//接收传值
	$question1 = $_POST["question1"];
	$answer1 = $_POST["answer1"];
	$question2 = $_POST["question2"];
	$answer2 = $_POST["answer2"];
	$question3 = $_POST["question3"];
	$answer3 = $_POST["answer3"];
	
	//连接数据库
	include("../public/config.php");
	$link = mysqli_connect(HOST,USER,PASS);
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	//判断是新增还是修改
	if(empty($_POST["id"])){
		
		//获取uid
		$sql1 = "select * from users where username = '{$usernameu}'";
		$result1 = mysqli_query($link,$sql1);
		$row = mysqli_fetch_assoc($result1);
		$uid = $row['id'];
		
		//将数据插入到mibao表中
		$sql = "insert into mibao (uid,question1,answer1,question2,answer2,question3,answer3) value ({$uid},'{$question1}','{$answer1}','{$question2}','{$answer2}','{$question3}','{$answer3}')";
		
		mysqli_query($link,$sql);
		if(mysqli_insert_id($link)< 1) {
			echo "<script>alert('设置失败');window.location.href='../view/question.php';</script>";exit;
		}
		echo "<script>alert('设置成功');window.location.href='../view/question.php';</script>";
	} else {
		
		$id = $_POST["id"];
		$sql = "update address set question1='{$question1}',answer1='{$answer1}',question2='{$question2}',answer2='{$answer1}',question3='{$question3}',answer3='{$answer3}' where id={$id}";
		mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)<1){
			echo "<script>alert('修改失败！');window.location.href='../view/question.php';</script>";exit;
		}			
		echo "<script>alert('修改成功！');window.location.href='../view/question.php';</script>";
		
	}