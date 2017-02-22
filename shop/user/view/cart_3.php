<?php
	session_start();
	if(empty($_SESSION['usernameu'])) {
		$a = "cart.php";
		echo "<script>alert('请登录后访问!');window.location.href='./login.php?a={$a}'</script>";
	}
	
	$orderid = $_GET['orderid'];
	
	include("../public/config.php");
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	$sql = "select * from orders where id = {$orderid}";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>小米网</title>
		<link href="../image/favicon.ico" rel="shortcut icon" type="image/x-icon">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="keywords" content="小米网  小米手机  小米笔记本  小米电话卡 小米电视">
		<meta name="description" content="小米商城直营小米公司旗下所有产品，囊括小米手机系列小米MIX、小米Note 2，红米手机系列红米Note 4、红米4，智能硬件，配件及小米生活周边，同时提供小米客户服务及售后支持。">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body class="pro_body">
		<!--顶部-->
		<div class="pro_header">
			<div class="pro_header_container">
				<div class="logo_image">
				   <img src="../image/logo.png">
				</div>
				<span class="pr_header_title">我的购物车</span>
				<div class="body_nav">
					<div class="pro_top_right">
						<span class="user">
							<a href="../index.php" class="name"><span >首页</span>&nbsp|&nbsp</a>
							<a href="./user.php" class="name"><span><?php echo $_SESSION['usernameu'];  ?></span>&nbsp|&nbsp </a>
							<a href="../controller/logout.php" class="name"><span >退出</span>&nbsp|&nbsp </a>						
							<a href="./cart.php" class="myorder">购物车(<?php isset($_SESSION["num_he"])?$_SESSION["num_he"]:"0"; ?>)</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="margin_top">
				<img src="../image/img3.jpg" />        
			</div>
			<!--Begin 第三步：提交订单 Begin -->
			<div class="content mar_20">		
					<!--Begin 支付宝支付 Begin -->
					<div class="warning">        	
						<table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
						  <tr>
							<td style="font-size:18px;">
								<script type="text/javascript">
									function run(){
										var s = document.getElementById("dd");
										if(s.innerHTML == 0){
											window.location.href='./order.php';
											return false;
										}
										s.innerHTML = s.innerHTML * 1 - 1;
									}
									window.setInterval("run();", 1000);
								</script>
								本页面将于 <font color="#ff4e00" id="dd">20</font>秒后跳转至<a href="./order.php" class="link">订单详情</a>
							</td>
						  </tr>
						  <tr height="35">
							<td style="font-size:18px;">
								感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00"><?php echo $orderid; ?></font>&nbsp;&nbsp;<a href="./order.php" class="link">点击查看订单详情</a>
							</td>
						  </tr>
						  <tr>
							<td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
								您选定的支付方式为: <font color="#ff4e00">支付宝</font>； &nbsp; &nbsp;您的已付款金额为: <font color="#ff4e00"><?php echo $row['total']?></font>
							</td>
						  </tr>
						  <tr>
							<td style="padding:20px 0 30px 0; font-family:'宋体';">
								您的宝贝将被送往：<font color="#ff4e00"><?php echo $row['address']; ?></font><br />
								并由<font color="#ff4e00"><?php echo $row['linkman']; ?></font>接收，联系方式为：<font color="#ff4e00"><?php echo $row['phone']; ?></font><br />
								
							</td>
						  </tr>
						  <tr>
							<td>
								<a href="../index.php" class="link">首页</a> &nbsp; |&nbsp;<a href="#" class="link">用户中心</a>
							</td>
						  </tr>
						</table>        	
					</div>
				</div>
		</div>
		
		<!--底部-->
		<?php include("../public/footer.php"); ?>
	
	</body>		
</html>

	