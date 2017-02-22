<?php
	//添加页面
	include("../include/config.php");
	//连接数据库		
		$link = mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
		mysqli_select_db($link,DBNAME);
		mysqli_set_charset($link,"utf8");
	
	//判断从哪个页面传过来的值
	
	switch($_GET['a']) {
		case "vip":
				$username = $_POST['username'];
				$name = $_POST['name'];
				$pass = md5($_POST['pass']);
				$qrpass = md5($_POST['qrpass']);
				$sex = $_POST['sex'];
				$address = $_POST['address'];
				$code = $_POST['code'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$addtime = time();
				
				//在这些输入确认非空的情况下执行
				if(empty($username)||empty($name)||empty($pass)||empty($qrpass)||empty($email)){
						echo "<script>alert('请完整填写必填字段！');window.location.href='../vip/index.php';</script>";exit;						
				}	
				//正则匹配验证
				//会员账户应为字母(a-z,A-Z)、数字(0-9)或下划线(_)
				if(!preg_match("/^[0-9a-zA-Z_]+$/",$username)) {
					echo "<script>alert('会员账户包含未知元素！');window.location.href='../vip/index.php';</script>";exit;
				}
				//请输入8-16位的字母或数字
				if(!preg_match("/^[0-9a-zA-Z_]{8,16}$/",$_POST['pass'])) {
					echo "<script>alert('密码应输入8-16位的字母、数字或下划线！');window.location.href='../vip/index.php';</script>";exit;
					
				}
				//电话
				if(!empty($phone)){
					if(!preg_match("/^[1][34578][0-9]{9}$/",$phone)) {
						echo "<script>alert('请输入正确的手机号码！');window.location.href='../vip/index.php';</script>";exit;
					}
				}
				//邮箱
				if(!preg_match("/^[0-9a-zA-Z_]+@[0-9a-zA-Z_]+\.[a-z]{2,}$/",$email)) {
					echo "<script>alert('请输入正确的邮箱！');window.location.href='../vip/index.php';</script>";exit;
				}				
				//判断密码与确认密码是否一致
				if($pass !== $qrpass) {
					echo "<script>alert('两次输入密码不一致！请重新输入');window.location.href='./vip/index.php';</script>";exit;
				}
				$sql = "insert into users (username,name,pass,sex,address,code,phone,email,addtime) values ('{$username}','{$name}','{$pass}',{$sex},'{$address}','{$code}','{$phone}','{$email}','{$addtime}')";		
				mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)<1){
					echo "<script>alert('添加失败！');window.location.href='../vip/index.php';</script>";exit;
				}		
				echo "<script>alert('添加成功！请查看');window.location.href='../vip/show.php';</script>";
			break;
		case "product":
				include("./uploadfile.php");
				include("./sfpic.php");
				
				//获取值
				$typeid = $_POST['typeid'];//类别id
				$goods = $_POST['goods'];//商品名称
				$company = $_POST['company'];//生产厂家
				$descr = $_POST['descr'];//简介
				$price = $_POST['price'];//单价				
				$store = $_POST['store'];//库存量
				$state = 1;
				$num = 0;
				$clicknum = 0;
				$addtime = time();
				
				//验证
				if(empty($goods)) {
					echo "<script>alert('商品名称不能为空');window.location.href='../product/index.php'</script>";exit;
				}
				if(empty($price)) {
					echo "<script>alert('单价不能为空');window.location.href='../product/index.php'</script>";exit;
				}
				if(empty($store)) {
					echo "<script>alert('库存量不能为空');window.location.href='../product/index.php'</script>";exit;
				}
				$file = $_FILES['uploadfile'];
				if($file['error'] == 4) {
					echo "<script>alert('请上传商品图片');window.location.href='../product/index.php'</script>";exit;
					
				}
				//添加图片
				$fileType = ["image/jpeg","image/png","image/gif"];
				$filename = uploadfile($file,(1024 * 1024),$fileType,"./pic/");
				if(!preg_match("/(.)+\.((jpg)||(png)||(gif))/",$filename)) {
					echo "<script>alert('{$filename}');window.location.href='../product/index.php';</script>";exit;
				}
				//处理图片缩放
				sfpic("./pic/{$filename}","./pic/s_{$filename}",100,100);
				sfpic("./pic/{$filename}","./pic/w_{$filename}",50,50);
				
				$picname = $filename;//图片名	
				//sql语句
				$sql = "insert into goods (typeid,goods,company,descr,price,picname,store,addtime,state,num,clicknum) values ({$typeid},'{$goods}','{$company}','{$descr}',{$price},'{$picname}',{$store},{$addtime},{$state},{$num},{$clicknum})";		
				// echo $sql;exit;
				mysqli_query($link,$sql);
				if(mysqli_insert_id($link)<1){
					//删除图片
					@unlink("./pic/".$picname);
					@unlink("./pic/s_".$picname);
					@unlink("./pic/w_".$picname);
					echo "<script>alert('添加失败！');window.location.href='../product/index.php';</script>";
				}		
				header("location:../product/show.php");
			break;
		case "type":
				$name = $_POST['name'];
				$pid  = $_POST['pid'];
				$path = $_POST['path'];
				$sql = "insert into type (name,pid,path) values ('{$name}',{$pid},'{$path}')";		
				mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)<1){
					echo "<script>alert('添加失败！');window.location.href='../type/index.php';</script>";
				}		
				echo "<script>alert('添加成功！请查看');window.location.href='../type/show.php';</script>";
			break;
		case "link":
				$url = $_POST['url'];
				$descr  = $_POST['descr'];
				if(empty($url)&&empty($descr)){
					echo "<script>alert('请填写完整字段！');window.location.href='../link/index.php';</script>";exit;
				}
				$sql = "insert into link (url,descr) values ('{$url}','{$descr}')";		
				mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)<1){
					echo "<script>alert('添加失败！');window.location.href='../link/index.php';</script>";
				}		
				echo "<script>alert('添加成功！请查看');window.location.href='../link/show.php';</script>";
			break;
			
	}
	mysqli_close($link);
	
	
		