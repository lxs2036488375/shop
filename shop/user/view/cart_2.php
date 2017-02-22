<?php
	session_start();
	if(empty($_SESSION['usernameu'])) {
		$a = "cart.php";
		echo "<script>alert('请登录后访问!');window.location.href='./login.php?a={$a}'</script>";
	}
	$shoplist = $_SESSION["shoplist"];
	if(count($shoplist) < 1) {
		echo "<script>alert('您的购物车空空!请先下单');window.location.href='./cart.php'</script>";
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
		<div class="container padding_left">
			 <div class="margin_top">
				<img src="../image/img2.jpg" />        
			</div>
			
			<!--Begin 第二步：确认订单信息 Begin -->
			<div class="margin_top">
				<div class="two_bg">
					<div class="two_t">
						<span class="fr"><a href="#"></a></span>商品列表
					</div>
					<table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
					  <tr>
						<td class="car_th" width="550">商品名称</td>
						<td class="car_th" width="140">属性</td>
						<td class="car_th" width="150">购买数量</td>
						<td class="car_th" width="130">小计</td>
						<td class="car_th" width="140">返还积分</td>
					  </tr>
					  <?php
						$shoplist = $_SESSION["shoplist"];
						$sum = 0;$num_he = 0;
						//连接数据库
						include("../public/config.php");
						$link = mysqli_connect(HOST,USER,PASS);
						mysqli_select_db($link,DBNAME);
						mysqli_set_charset($link,"utf8");
						foreach($shoplist as $k => $v) {
							$sql = "select * from goods where id={$v['id']}";
							$result = mysqli_query($link,$sql);
							$row = mysqli_fetch_assoc($result);
							echo "<tr>";
								echo "<td>";
									echo "<div class='c_s_img'><img src='../../admin/controller/pic/w_{$row['picname']}' width='73' height='73' /></div>";
									echo $row['goods'];
								echo "</td>";
								echo "<td align='center'>颜色：灰色</td>";
								echo "<td align='center'>{$v['num']}</td>";
								$xiaoji = $row['price'] * $v['num'];
								echo "<td align='center' style='color:#ff4e00;'>￥{$xiaoji}</td>";
								echo "<td align='center'>26R</td>";
							  echo "</tr>";
							  $sum += $xiaoji;
						}
						$_SESSION["sum"] = $sum;
					  ?>
					  <tr>
						<td colspan="5" align="right" style="font-family:'Microsoft YaHei';">
							商品总价：￥<?php echo $sum; ?> ； 返还积分 56R  
						</td>
					  </tr>
					</table>
					
					<div class="two_t">
						<span class="fr"><a href="#"></a></span>选择收货人
					</div>
					<form action="../controller/addorder.php" method="post">
					<div style="width:1110px;margin-left:25px;">
							<?php
								$username = $_SESSION['usernameu'];
								include("../public/config.php");
								$link = mysqli_connect(HOST,USER,PASS);
								mysqli_select_db($link,DBNAME);
								mysqli_set_charset($link,"utf8");
								$sql = "select * from address";
								$result = mysqli_query($link,$sql);
								while($row = mysqli_fetch_assoc($result)) {
									$select = ($row['state'] == 0)?"checked":"";
									$select1 = ($row['state'] == 0)?"<span style='color:red'>默认地址</span>":"";
									
									echo "<input type='radio' name='addressid' value='{$row['id']}' {$select}> {$row['sdd']} {$row['sjtadd']}（{$row['sname']} 收）{$row['sphone']}  {$row['stel']} {$select1}</option><br>";
									
								}						
								
							?>
					</div>
					<p align="right">
						<a href="./address.php" style="display:block;width:100px;height:35px;background-color:#ff6600;margin-right:115px;margin-top:10px;color:#333;text-align:center;line-height:35px;">管理收货地址</a>
					</p> 
					<div class="two_t">
						支付方式
					</div>
					<ul class="pay">
						<li class="checked">余额支付<div class="ch_img"></div></li>
						<li>银行亏款/转账<div class="ch_img"></div></li>
						<li>货到付款<div class="ch_img"></div></li>
						<li>支付宝<div class="ch_img"></div></li>
					</ul>
					<table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
					 
					  <tr height="70">
						<td align="right">
							<b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;">￥<?php echo $sum; ?> </span></b>
						</td>
					  </tr>
					  <tr height="70">
						<td align="right"><input type="image" src="../image/btn_sure.gif" ></td>
					  </tr>
					</table>
					</form>
				</div>
			</div>
			<!--End 第二步：确认订单信息 End-->
		</div>
		<!--底部-->
		<?php include("../public/footer.php"); ?>
	</body>