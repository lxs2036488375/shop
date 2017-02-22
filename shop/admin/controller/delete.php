<?php
	include("../include/config.php");
	//获取id
	$id = $_GET['id'];
	//数据库
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	switch($_GET['a']) {
		case "vip":
				$sql = "delete from users where id= {$id}";
				mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)<1){
					echo "<script>alert('删除失败！');window.location.href='../{$_GET['a']}/show.php';</script>";exit;
				}
				echo "<script>alert('删除成功！');window.location.href='../{$_GET['a']}/show.php';</script>";
		break;
		case "product":
				$sql = "delete from goods where id= {$id}";
				mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)<1){
					echo "<script>alert('删除失败！');window.location.href='../{$_GET['a']}/show.php';</script>";exit;
				}
				//把对应的图片也删除掉
				$delfile = $_GET['filename'];
				if(!empty($delfile)) {
						@unlink("./pic/".$delfile);
						@unlink("./pic/s_".$delfile);
						@unlink("./pic/w_".$delfile);						
				}
				echo "<script>alert('删除成功！');window.location.href='../{$_GET['a']}/show.php';</script>";
		break;
		case "type":
				//删除类别需要判断被删除类别有没有子类
				$sql = "select count(*) from type where pid={$id}";
				$result = mysqli_query($link,$sql);
				$row = mysqli_fetch_assoc($result);
				if($row["count(*)"] > 0) {
					echo "<script>alert('该类别仍有子类！请先删除子类');window.location.href='../{$_GET['a']}/show.php';</script>";exit;
				}
				$sql = "delete from type where id= {$id}";
				mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)<1){
					echo "<script>alert('删除失败！');window.location.href='../{$_GET['a']}/show.php';</script>";exit;
				}
				echo "<script>alert('删除成功！');window.location.href='../{$_GET['a']}/show.php';</script>";
		break;
		case "link":
				$sql = "delete from link where id= {$id}";
				mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)<1){
					echo "<script>alert('删除失败！');window.location.href='../{$_GET['a']}/show.php';</script>";exit;
				}
				echo "<script>alert('删除成功！');window.location.href='../{$_GET['a']}/show.php';</script>";
		break;
		
	}	
	mysqli_close($link);
	