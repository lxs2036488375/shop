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
								<p>上午好</p>
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
						$roww = mysqli_fetch_assoc($result1);
						$uid = $roww['id'];
						
						$sql = "select * from mibao where uid = {$uid}";
						$result = mysqli_query($link,$sql);
						$row = mysqli_fetch_assoc($result);
					?>
					<div class="mem_t">我的密保问题</div>
					<form action="../controller/szquestion.php" method="post">
						<table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
						  <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
						  <tr>
							<td align="right">问题1</td>
							<td style="font-family:'宋体';"><input type="text" name="question1"  style="width:350px;" class="add_ipt" value="<?php echo $row['question1']; ?>" placeholder="如：我的生日是？" /></td>
						  </tr>
						  <tr>
							<td align="right">回答1</td>
							<td style="font-family:'宋体';"><input type="text" name="answer1"  style="width:350px;" class="add_ipt" value="<?php echo $row['answer1']; ?>" placeholder="请输入答案" /></td>
						  </tr>
						  <tr>
							<td align="right">问题2</td>
							<td style="font-family:'宋体';"><input type="text" name="question2"  style="width:350px;" class="add_ipt" value="<?php echo $row['question2']; ?>" placeholder="如：我母亲的生日是？" /></td>
						  </tr>
						  <tr>
							<td align="right">回答2</td>
							<td style="font-family:'宋体';"><input type="text" name="answer2"  style="width:350px;" class="add_ipt" value="<?php echo $row['answer2']; ?>" placeholder="请输入答案"  /></td>
						  </tr>
						  <tr>
							<td align="right">问题3</td>
							<td style="font-family:'宋体';"><input type="text" name="question3"  style="width:350px;" class="add_ipt" value="<?php echo $row['question3']; ?>" placeholder="如：我父亲的生日是？" /></td>
						  </tr>
						  <tr>
							<td align="right">回答3</td>
							<td style="font-family:'宋体';"><input type="text" name="answer3"  style="width:350px;" class="add_ipt" value="<?php echo $row['answer3']; ?>" placeholder="请输入答案"  /></td>
						  </tr>
						</table>
					<p align="right">
						<input type="submit" value="保存" style="width:90px;height:25px;background-color:#ff6600;margin-right:115px;margin-top:10px;">
					</p>
					</form>
					
				</div>
				
			</div>
		</div>
		</div>
	<!--End 用户中心 End--> 
	</body>
</html>	

				
				
				
				