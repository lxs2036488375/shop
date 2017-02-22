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
					<div class="mem_tit">我的订单</div>
					<table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
					  <tr>                                                                                                                                                    
						<td width="20%">订单号</td>
						<td width="25%">下单时间</td>
						<td width="15%">订单总金额</td>
						<td width="25%">交易状态</td>
						<td width="15%">操作</td>
					  </tr>
					  <?php
						include("../public/config.php");
						$link = mysqli_connect(HOST,USER,PASS);
						mysqli_select_db($link,DBNAME);
						mysqli_set_charset($link,"utf8");
						$sql1 = "select * from users where username='{$_SESSION['usernameu']}'";
						$result1 = mysqli_query($link,$sql1);
						$row1 = mysqli_fetch_assoc($result1);
						
						$sql = "select * from orders where uid = {$row1[id]} order by addtime desc";
						$result = mysqli_query($link,$sql);
						$zhutai = array(0 => "买家已付款",1 => "查看物流",2 => "交易成功",3 => "无效订单");
						while($row = mysqli_fetch_assoc($result)) {
							 echo "<tr>";
								echo "<td><font color='#ff4e00'>{$row['id']}</font></td>";
								echo "<td>".date("Y-m-d H:i:s",$row['addtime'])."</td>";
								echo "<td>￥{$row['total']}</td>";
								echo "<td>{$zhutai[$row['status']]}<br><a href='./detail.php?orderid={$row['id']}' class='link'>订单详情</a></td>";
								$caozuo = array(0 => "取消订单",1 => "确认收货",2 => "评价",3 => "删除无效订单");
								echo "<td> <a href='../controller/caozuo.php?c={$row['status']}&id={$row['id']}'><input type='button' value='{$caozuo[$row['status']]}' name='caozuo''></a></td>";
							  echo "</tr>";							
						}
					  ?>
					</table>


					<div class="mem_tit">合并订单</div>
					<table border="0" class="order_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
					  <tr>
						<td width="135" align="right">主订单</td>
						<td width="220">
							<select class="jj" name="order1">
							  <option value="0" selected="selected">请选择...</option>
							  <option value="1">2015092626589</option>
							  <option value="2">2015092626589</option>
							  <option value="3">2015092626589</option>
							  <option value="4">2015092626589</option>
							</select>
						</td>
						<td width="135" align="right">从订单</td>
						<td width="220">
							<select class="jj" name="order2">
							  <option value="0" selected="selected">请选择...</option>
							  <option value="1">2015092626589</option>
							  <option value="2">2015092626589</option>
							  <option value="3">2015092626589</option>
							  <option value="4">2015092626589</option>
							</select>
						</td>
						<td><div class="btn_u"><a href="#">合并订单</a></div></td>
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td colspan="4" style="font-family:'宋体'; padding:20px 10px 50px 10px;">
							订单合并是在发货前将相同状态的订单合并成一新的订单。 <br />
							收货地址，送货方式等以主定单为准。
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

				
				
				
				