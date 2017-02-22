<?php
	session_start();
	//订单创建成功后，将订单的详细信息加入数据库中方便后台管理
	$username = $_SESSION['usernameu'];
	$shoplist = $_SESSION["shoplist"];
	include("../public/config.php");
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	//获取用户id
	$sql = "select * from users where username = '{$username}'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);
	$uid = $row['id'];
	
	//获取收货人信息
	$addressid = $_POST['addressid'];
	$sql1 = "select * from address where id = '{$addressid}'";
	$result1 = mysqli_query($link,$sql1);
	$row1 = mysqli_fetch_assoc($result1);
	
	$linkname = $row1['sname'];
	$address = $row1['sdd'].$row1['sjtadd'];
	$code = $row1['scode'];
	$phone = $row1['sphone'];
	$addtime = time();
	$total = $_SESSION['sum'];
	$status = 0;
	
	
	$ordsql = "insert into orders (uid,linkman,address,code,phone,addtime,total,status) values ({$uid},'{$linkname}','{$address}','{$code}','{$phone}',{$addtime},{$total},{$status})";
	mysqli_query($link,$ordsql);
	$orderid = mysqli_insert_id($link);//订单号
	if($orderid < 1) {
		echo "添加失败1";exit;
	}
	
	
	//详情字段
	foreach($shoplist as $v) {
		$goodsid = $v['id'];
		$name = $v['goods'];
		$price = $v['price'];
		$num = $v['num'];
		$detsql = "insert into detail (orderid,goodsid,name,price,num) values ({$orderid},{$goodsid},'{$name}',{$price},{$num})";
		mysqli_query($link,$detsql);
		if(mysqli_affected_rows($link) < 1) {
			echo "添加失败2";exit;
		}
		unset($v['id']);
	}
	
	//释放session
	unset($_SESSION["shoplist"]);
	$_SESSION['sum'] = 0;
	$_SESSION['num_he'] = 0;
	//跳转到购物车第三个页面
	header("location:../view/cart_3.php?orderid={$orderid}");
	mysqli_close($link);
?>