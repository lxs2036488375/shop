<?php
	session_start();
	if(empty($_SESSION['usernameu'])) {
		$a = "cart.php";
		echo "<script>alert('请登录后访问!');window.location.href='./login.php?a={$a}'</script>";
	}
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
							<a href="./user.php" class="name"><span><?php echo $_SESSION['usernameu'];  ?></span>&nbsp|&nbsp</a>
							<a href="../controller/logout.php" class="name"><span >退出</span>&nbsp|&nbsp</a>						
							<a href="./cart.php" class="myorder">购物车(<?php echo isset($_SESSION["num_he"])?$_SESSION["num_he"]:"0"; ?>)</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			 <div class="margin_top">
				<img src="../image/img1.jpg" />        
			</div>
			<!--Begin 第一步：查看购物车 Begin -->
			<div class="content mar_20">
				<table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
				  <tr>
					<td class="car_th" width="490">商品名称</td>
					<td class="car_th" width="140">属性</td>
					<td class="car_th" width="150">购买数量</td>
					<td class="car_th" width="130">小计</td>
					<td class="car_th" width="140">返还积分</td>
					<td class="car_th" width="150">操作</td>
				  </tr>
				  <?php
					$shoplist = $_SESSION["shoplist"];
					//连接数据库
					include("../public/config.php");
					$link = mysqli_connect(HOST,USER,PASS);
					mysqli_select_db($link,DBNAME);
					mysqli_set_charset($link,"utf8");
					
					
					if(count($shoplist) < 1) { ?>
						<tr>
							<td align="center" colspan="6" ><h2>您的购物车还是空的！<a href="../index.php" class="link">马上去购物</a></h2></td>
						</tr>
				   <?php }else{					   
						foreach($shoplist as $k => $v) {
							$sql = "select * from goods where id={$v['id']}";
							$result = mysqli_query($link,$sql);
							$row = mysqli_fetch_assoc($result);
							
							 echo "<tr>";
								echo "<td >";
									echo "<div class='c_s_img'><img src='../../admin/controller/pic/w_{$row['picname']}' width='73' /></div>";
									echo $v['goods'];
								echo "</td>";
								echo "<td align='center'>颜色：灰色</td>";
								echo "<td align='center'>";
									echo "<div class='c_num'>";
										echo "<input type='button' value='' onclick='jianUpdate1(jq(this));' class='car_btn_1' />";
										echo "<input type='text' value='{$v['num']}' name='' class='car_ipt' />";
										echo "<input type='button' value='' onclick='addUpdate1(jq(this));' class='car_btn_2' />";
									echo "</div>";
								echo "</td>";
								$xiaoji = $row[price] * $v['num'];
								echo "<td align='center' style='color:#ff4e00;'>￥{$xiaoji}</td>";
								echo "<td align='center'>26R</td>";
								echo "<td align='center'><a href='../controller/delcart.php?id={$v['id']}' class='link'>删除</a>&nbsp;<a href='' class='link'>加入收藏</a></td>";
							 echo "</tr>";
						}
							 ?>
							 <tr valign="top" height="150">
								<td colspan="6" align="right">
									<a href="../index.php"><img src="../image/buy1.gif" /></a>&nbsp; &nbsp; <a href="./cart_2.php"><img src="../image/buy2.gif" /></a>
								</td>
							 </tr>
				<?php  } ?>
				</table>
				
			</div>
		</div>
		<!--底部-->
		<?php include("../public/footer.php"); ?>
	</body>