<?php
	session_start();
	if(empty($_SESSION['usernameu'])) {
		$a = "order.php";
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
	<body>
		<?php include("../public/head.php");  ?>
		<div class="list_body_gray">
			<!--设置中部内容-->
			<div class="list_gray_auto">
				<!--页面说明-->
				<div class="list_page_shuoming">
					<a href="../index.php" id="list_index_llianjie">首页</a>
					<span class="sep">/</span>
					<span class="list_page_shuoming_content">交易订单</span>
				</div>
			</div>
		</div>
		<div class="container">
		<div class="i_bg bg_color">
			<div class="m_content">
				<?php $file = basename(__FILE__);  ?>
				<?php include("../public/userleft.php"); ?>
				<div class="m_right">
					<div class="m_des">
						<table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
						  <tr valign="top">
							<td width="115"><img src="../image/user.jpg" width="90" height="90" /></td>
							<td>
								<div class="m_user"><?php echo $_SESSION['usernameu'];  ?></div>
								<p>
									上午好 <br />
									<a href="./xgpass.php"><font color="#ff4e00">修改账号密码</font></a><br />
									<a href="./question.php"><font color="#ff4e00">设置密保问题</font></a>&nbsp;&nbsp; <font style="font-size:12px;">建议您设置，以便找回密码</font><br />
								</p>
							</td>
						  </tr>
						</table>	
					</div>
					<?php
						include("../public/config.php");
						$link = mysqli_connect(HOST,USER,PASS);
						mysqli_select_db($link,DBNAME);
						mysqli_set_charset($link,"utf8");
						$sql1 = "select * from users where username = '{$_SESSION['usernameu']}'";
						$result1 = mysqli_query($link,$sql1);
						$row = mysqli_fetch_assoc($result1);
					?>
					<div class="mem_t">账号信息<a href="./xguser.php" class="link" style="font-size:12px;margin-left:700px;color:#ff6600;">修改</span></div>
					<table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
					  <tr>
						<td width="40%">用户ID：<span style="color:#555555;"><?php echo $row['id']; ?></span></td>
						<td width="60%">真实姓名：<span style="color:#555555;"><?php echo $row['name'];  ?></span></span></td>
					  </tr>
					  <tr>
						<td>电&nbsp; &nbsp; 话：<span style="color:#555555;"><?php echo $row['phone'];?></span></td>
						<td>邮&nbsp; &nbsp; 箱：<span style="color:#555555;"><?php echo $row['email'];  ?></span></td>
					  </tr>
					  <tr>
						<td>注册时间：<span style="color:#555555;"><?php echo date("Y-m-d",$row['addtime']);  ?></span></td>
					  </tr>
					</table>
					
					<div class="mem_t">资产信息</div>
					<table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
					 
					  <tr>
						<td colspan="3">订单提醒：
							<font style="font-family:'宋体';">待付款(<span>0</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待收货(<span>2</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待评论(<span>1</span>)</font>
						</td>
					  </tr>
					</table>
					
				</div>
				
			</div>
		</div>
		</div>
	<!--End 用户中心 End--> 
	</body>
</html>	

				
				
				
				