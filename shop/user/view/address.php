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
					<p></p>
					<?php
						include("../public/config.php");
						$link = mysqli_connect(HOST,USER,PASS);
						mysqli_select_db($link,DBNAME);
						mysqli_set_charset($link,"utf8");
						$sql1 = "select count(*) from address";
						$result1 = mysqli_query($link,$sql1);
						$roww = mysqli_fetch_assoc($result1);
						$addsum = 10;
						$yu = $addsum - $roww['count(*)'];
					?>
					<div class="mem_tit">已保存<?php echo $roww['count(*)']; ?>条收货地址，还可以保存<?php echo $yu; ?>条</div>
					<table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
					  <tr>                                                                                                                                                    
						<td width="10%">收货人</td>
						<td width="15%">所在地区</td>
						<td width="30%">详细地址</td>
						<td width="10%">邮编</td>
						<td width="15%">电话/手机</td>
						<td width="10%">操作</td>
						<td width="10%"></td>
					  </tr>
					  <?php
						$username = $_SESSION['usernameu'];
						$sql2 = "select id from users where username = '{$username}'";
						$result2 = mysqli_query($link,$sql2);
						$row2 = mysqli_fetch_assoc($result2);
						
						$sql = "select * from address where uid={$row2['id']}";
						$result = mysqli_query($link,$sql);
						//$row = mysqli_fetch_assoc($result);
						if(count($result) == 0) {
							echo "<tr>";
								echo "<td align='center' colspan=7><h3>您还没有任何收货地址哦，请先在下方添加！</h3></td>";
							echo "</tr>";
						} else {
							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>{$row['sname']}</td>";
								echo "<td>{$row['sdd']}</td>";
								echo "<td>{$row['sjtadd']}</td>";
								echo "<td>{$row['scode']}</td>";
								echo "<td>{$row['stel']}|{$row['sphone']}</td>";
								echo "<td><a href='address.php?id={$row['id']}' class='link'>修改</a>|<a href='../controller/delete.php?id={$row['id']}' class='link'>删除</a></td>";
								if($row['state'] == 0) {
									echo "<td><span class='add_b'>默认地址</span></td>";
								}else{
									echo "<td><a href='../controller/mo.php?id={$row['id']}' class='link'>设为默认</a></td>";
								}
								echo "</tr>";							
							}
						}
					  ?>
					</table>

					
					<div class="mem_tit">
						<a href="#"><img src="../image/add_ad.gif" /></a>
					</div>
					<table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
					 <?php
						//处理修改信息
						$id = $_GET['id'];
						if(!empty($id)) {
							$sql3 = "select * from address where id = {$id}";							
							$result3 = mysqli_query($link,$sql3);
							$row3 = mysqli_fetch_assoc($result3);
							
							$sadd = array();
							$sadd = explode(" ",$row3["sdd"]);		
							
						}
					 ?>
					 <form action="../controller/add.php?id=<?php echo $id ?>" method="post">
					  <tr>
						<td width="135" align="right">配送地区</td>
						<td colspan="3" style="font-family:'宋体';">
							<select name="sheng" id="cid" >
								<option value="0">请选择</option>
								<option <?php echo ($sadd[0]=="山西省")?"selected":""; ?>>山西省</option>
							</select>
							<select name="shi" id="cid">
								<option value="0">请选择</option>
								<option <?php echo ($sadd[1]=="太原市")?"selected":""; ?>>太原市</option>
								<option <?php echo ($sadd[1]=="大同市")?"selected":""; ?>>大同市</option>
								<option <?php echo ($sadd[1]=="阳泉市")?"selected":""; ?>>阳泉市</option>
								<option <?php echo ($sadd[1]=="长治市")?"selected":""; ?>>长治市</option>
								<option <?php echo ($sadd[1]=="晋城市")?"selected":""; ?>>晋城市</option>
								<option <?php echo ($sadd[1]=="朔州市")?"selected":""; ?>>朔州市</option>
								<option <?php echo ($sadd[1]=="晋中市")?"selected":""; ?>>晋中市</option>
								<option <?php echo ($sadd[1]=="运城市")?"selected":""; ?>>运城市</option>
								<option <?php echo ($sadd[1]=="忻州市")?"selected":""; ?>>忻州市</option>
								<option <?php echo ($sadd[1]=="临汾市")?"selected":""; ?>>临汾市</option>
								<option <?php echo ($sadd[1]=="吕梁市")?"selected":""; ?>>吕梁市</option>
							</select>
						</td>
					  </tr>
					  <tr>
						<td align="right">详细地址</td>
						<td style="font-family:'宋体';" colspan="3"><input type="text" name="sjtadd" value="<?php echo $row3[sjtadd];  ?>" style="width:350px;" class="add_ipt" placeholder="建议您如实填写详细收货地址" /></td>
					  </tr>
					  <tr>
						<td align="right">收货人姓名</td>
						<td style="font-family:'宋体';"><input type="text" name="sname" value="<?php echo $row3[sname];  ?>"  class="add_ipt" placeholder="长度不超过25个字符" /></td>
						<td align="right">邮政编码</td>
						<td style="font-family:'宋体';"><input type="text" name="scode" value="<?php echo $row3[scode];  ?>" class="add_ipt" placeholder="如您不清楚邮递区号,请填写000000" /></td>
					  </tr>
					  <tr>
						<td align="right">手机</td>
						<td style="font-family:'宋体';"><input type="text" name="sphone" value="<?php echo $row3[sphone];  ?>" class="add_ipt" placeholder="电话号码、手机号码必须填一项" /></td>
						<td align="right">电话</td>
						<td style="font-family:'宋体';"><input type="text" name="stel" value="<?php echo $row3[stel];  ?>"  class="add_ipt" /></td>
					  </tr>
					</table>
					<p align="right">
						<input type="submit" value="保存" style="width:90px;height:25px;background-color:#ff6600;margin-right:25px;margin-top:10px;">
					</p> 
					</form>
				</div>
			</div>
		</div>
		</div>
	<!--End 用户中心 End--> 
	</body>
</html>	

				
				
				
				