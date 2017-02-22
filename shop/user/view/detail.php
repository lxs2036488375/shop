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
				<div class="m_left">
					<div class="left_n">管理中心</div>
					<div class="left_m">
						<div class="left_m_t t_bg1">订单中心</div>
						<ul>
							<li><a href="order.php" class="now">我的订单</a></li>
							<li><a href="address.php">收货地址</a></li>
							<li><a href="#">缺货登记</a></li>
							<li><a href="#">跟踪订单</a></li>
						</ul>
					</div>
					<div class="left_m">
						<div class="left_m_t t_bg2">会员中心</div>
						<ul>
							<li><a href="user.php">用户信息</a></li>
							<li><a href="Member_Collect.html">我的收藏</a></li>
							<li><a href="Member_Msg.html">我的留言</a></li>
							<li><a href="Member_Links.html">推广链接</a></li>
							<li><a href="#">我的评论</a></li>
						</ul>
					</div>
					<div class="left_m">
						<div class="left_m_t t_bg3">账户中心</div>
						<ul>
							<li><a href="Member_Safe.html">账户安全</a></li>
							<li><a href="Member_Packet.html">我的红包</a></li>
							<li><a href="Member_Money.html">资金管理</a></li>
						</ul>
					</div>
					<div class="left_m">
						<div class="left_m_t t_bg4">分销中心</div>
						<ul>
							<li><a href="Member_Member.html">我的会员</a></li>
							<li><a href="Member_Results.html">我的业绩</a></li>
							<li><a href="Member_Commission.html">我的佣金</a></li>
							<li><a href="Member_Cash.html">申请提现</a></li>
						</ul>
					</div>
				</div>
				<div class="m_right">
					<p></p>
					<div class="mem_tit">订单详情</div>
					<table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
					  <tr>                                                                                                                                                    
						<td width="20%">编号</td>
						<td width="25%">商品名称</td>
						<td width="15%">商品单价</td>
						<td width="25%">购买数量</td>
						<td width="15%">状态</td>
					  </tr>
					  <?php
						$orderid = $_GET['orderid'];
						include("../public/config.php");
						$link = mysqli_connect(HOST,USER,PASS);
						mysqli_select_db($link,DBNAME);
						mysqli_set_charset($link,"utf8");
						$sql1 = "select * from users where username='{$_SESSION['usernameu']}'";
						$result1 = mysqli_query($link,$sql1);
						$row1 = mysqli_fetch_assoc($result1);
						$sql = "select * from detail where orderid = {$orderid}";
						$result = mysqli_query($link,$sql);
						$zhutai = array(0 => "新订单",1 => "已发货",2 => "已收货",3 => "无效订单");
						while($row = mysqli_fetch_assoc($result)) {
							 echo "<tr>";
								echo "<td><font color='#ff4e00'>{$row['id']}</font></td>";
								echo "<td>{$row['name']}</td>";
								echo "<td>￥{$row['price']}</td>";
								echo "<td>{$row['num']}</td>";
								echo "<td>交易成功</td>";
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

				
				
				
				