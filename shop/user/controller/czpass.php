<?php
	//接收传过来的值
	$uid = $_POST['uid'];
	$answer1 = rtrim($_POST['answer1']);
	$answer2 = rtrim($_POST['answer2']);
	$answer3 = rtrim($_POST['answer3']);
	
	//连接数据库
	include("../public/config.php");
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	$sql = "select * from mibao where uid = '{$uid}'";	
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);	
	echo $answer1;
	
	if($answer1 != $row['answer1']) {
		echo "<script>alert('问题1回答错误');window.location.href='../view/czmima.php?uid={$uid}';</script>";exit;		
	}
	if($answer2 != $row['answer2']) {
		echo "<script>alert('问题2回答错误');window.location.href='../view/czmima.php?uid={$uid}';</script>";exit;		
	}
	if($answer3 != $row['answer3']) {
		echo "<script>alert('问题3回答错误');window.location.href='../view/czmima.php?uid={$uid}';</script>";exit;		
	}
	echo "<script>alert('回答正确');window.location.href='../view/czpass.php?uid={$uid}';</script>";
	