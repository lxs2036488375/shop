<?php
	include("../include/config.php");
	//更新
	//数据库操作
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	
	switch($_GET['a']){
		case "vip":
			$id = $_POST['id'];
			$name = $_POST['name'];
			$sex = $_POST['sex'];
			$address = $_POST['address'];
			$code = $_POST['code'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$state = $_POST['state'];
			$sql = "update users set name='{$name}',sex={$sex},address='{$address}',code='{$code}',phone='{$phone}',email='{$email}',state='{$state}' where id = {$id}";
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)<1){
				echo "<script>alert('更新失败！');window.location.href='./show.php';</script>";exit;
			}			
			echo "<script>alert('更新成功！');window.location.href='../vip/show.php';</script>";
		break;
		case "product":
			//获取值
			$id = $_POST['id'];
			$typeid = $_POST['typeid'];//类别id
			$goods = $_POST['goods'];//商品名称
			$company = $_POST['company'];//生产厂家
			$descr = $_POST['descr'];//简介
			$price = $_POST['price'];//单价
			$state = $_POST['state'];//状态			
			$store = $_POST['store'];//库存量
			
			if($_FILES['uploadfile']['error'] !== 4) {	
				include("./uploadfile.php");
				include("./sfpic.php");
				//保存新图
				$file = $_FILES['uploadfile'];	
				$fileType = ["image/jpeg","image/png","image/gif"];
				$filename = uploadfile($file,(1024 * 1024),$fileType,"./pic/");
				$picname = $filename;//图片名
				//处理图片缩放
				sfpic("./pic/{$filename}","./pic/s_{$filename}",100,100);
				sfpic("./pic/{$filename}","./pic/w_{$filename}",50,50);
				$sql = "update goods set typeid='{$typeid}',goods='{$goods}',company='{$company}',descr='{$descr}',price='{$price}',state='{$state}',picname='{$picname}',store='{$store}' where id = {$id}";
				mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)<1){
					//如果保存新图失败删除图片
					@unlink("./pic/".$picname);
					@unlink("./pic/s_".$picname);
					@unlink("./pic/w_".$picname);
					echo "<script>alert('更新失败！');window.location.href='../product/show.php';</script>";
				}
				//删除原图
				$delfile = $_POST['picname'];
				if(!empty($delfile)) {
					@unlink("./pic/".$delfile);
					@unlink("./pic/s_".$delfile);
					@unlink("./pic/w_".$delfile);						
				}
								
			}else{
				//没有上传的话取原来的值
				$picname = $_POST['picname'];//图片名
				$sql = "update goods set typeid='{$typeid}',goods='{$goods}',company='{$company}',descr='{$descr}',price='{$price}',state='{$state}',picname='{$picname}',store='{$store}' where id = {$id}";
				mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)<1){
					echo "<script>alert('更新失败！');window.location.href='../product/show.php';</script>";exit;
				}
			}
			echo "<script>alert('更新成功！');window.location.href='../product/show.php';</script>";
		break;
		case "mima":
			$id = $_POST['id'];
			$pass = md5($_POST['pass']);
			$qrpass = md5($_POST['qrpass']);
			if($pass !== $qrpass) {
				echo "<script>alert('两次输入密码不一致！请重新输入');window.location.href='./xpass.php';</script>";
				exit;
			}
			$sql = "update users set pass='{$pass}'where id = {$id}";
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)<1){
				echo "<script>alert('更新失败！');window.location.href='./show.php';</script>";exit;
			}
			echo "<script>alert('修改成功！');window.location.href='../vip/show.php';</script>";
		break;
		case "type":
			$id = $_POST['id'];
			$name = $_POST['name'];
			$pid = $_POST['pid'];
			$path = $_POST['path'];
			$sql = "update type set name='{$name}' where id = {$id}";
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)<1){
				echo "<script>alert('更新失败！');window.location.href='../type/show.php';</script>";exit;
			}			
			echo "<script>alert('更新成功！');window.location.href='../type/show.php';</script>";
		break;
		case "orders":
			$id = $_POST['id'];
			$address = $_POST['address'];
			$code = $_POST['code'];
			$phone = $_POST['phone'];
			$sql = "update orders set address='{$address}',code='{$code}',phone='{$phone}' where id = {$id}";
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)<1){
				echo "<script>alert('更新失败！');window.location.href='../orders/show.php';</script>";exit;
			}			
			echo "<script>alert('更新成功！');window.location.href='../orders/show.php';</script>";
		break;
		case "shouhuo":
			$id = $_GET['id'];
			$state = 1;
			$sql = "update orders set status={$state} where id = {$id}";
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)<1){
				echo "<script>alert('发货失败！');window.location.href='../orders/show.php';</script>";exit;
			}			
			echo "<script>alert('已发货！');window.location.href='../orders/show.php';</script>";
		break;
		case "link":
			$id = $_POST['id'];
			$url = $_POST['url'];
			$descr = $_POST['descr'];
			$sql = "update link set url='{$url}',descr='{$descr}' where id = {$id}";
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)<1){
				echo "<script>alert('更改失败！');window.location.href='../link/show.php';</script>";exit;
			}			
			echo "<script>alert('更改成功！');window.location.href='../link/show.php';</script>";
		break;
	}
	
	
	mysqli_close($link);