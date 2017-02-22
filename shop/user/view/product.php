<?php
	session_start();
	if(empty($_SESSION['usernameu'])) {
		$a = "product.php?id={$_GET['id']}";
		echo "<script>alert('请登录后访问!');window.location.href='./login.php?a={$a}'</script>";
	}
	$id = $_GET['id'];//商品id
	if(empty($id)) {
		header("location:../index.php");
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
				<div class="body_nav">
					<div class="pro_top_right">
						<span class="user">
							<a href="./user.php" class="name"><span><?php echo $_SESSION['usernameu'];  ?></span>&nbsp|&nbsp</a>
							<a href="../controller/logout.php" class="name"><span >退出</span>&nbsp|&nbsp</a>						
							<a href="./cart.php" class="myorder">购物车(<?php  echo isset($_SESSION["num_he"])?$_SESSION["num_he"]:"0";  ?>)</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		<!--列表导航-->
		<div class="pro_list_nav">
			<ul>
				<?php
					//连接数据库进行查询
					
					
					$typeid = $_GET['typeid'];//总类别id
					include("../public/config.php");
					$link = mysqli_connect(HOST,USER,PASS);
					mysqli_select_db($link,DBNAME);
					mysqli_set_charset($link,"utf8");
					$sqll = "select * from goods where typeid in (select id from type where path like '%,{$typeid},%') limit 0,12";
					
					$resultl = mysqli_query($link,$sqll);
					while($roww = mysqli_fetch_assoc($resultl)) {
						$current = ($roww['id'] == $id)?"id='curren'":"";
						echo "<li {$current}><a href='./product.php?id={$roww['id']}&typeid={$typeid}'>{$roww['goods']}</a></li>";								
					}
				?>
				
			</ul>
		</div>
		<!--商品详情-->
		<?php
			$sql = "select * from goods where id={$id}";
			$result = mysqli_query($link,$sql);			
			$row = mysqli_fetch_assoc($result);
		?>
		<div class="pro_jt_content">
			<!--商品图-->
			<div class="pro_sp_pic">
				<image src="../../admin/controller/pic/<?php echo $row['picname'] ?>" width="600" alt="小米MIX">
			</div>
			<!--商品信息-->
			<div class="pro_jt_info">
				<!--标题-->
				<div class="pro_jt_title">
					<p>
						<span class="pro_name">购买<?php echo $row['goods'] ?></span>
						<span class="pro_price_2"><?php echo $row['price'] ?>元</span>
					</p>
					<a href="#" class="pro_more">深入了解产品></a>
				</div>
				<p style="color:red;"><?php echo $row['descr'] ?></p>
				<p></p>
				<div class="pro_xuanze">
					<div class="pro_xuanze_leibie">
						<div class="pro_step_title">
							1.选择版本
							<span class="pro_version_desc">骁龙821最高主频，2.35GHz，Adreno 530 图形处理器</span>
						</div>
						<ul>
							<li id="active"><a href="">标准版 4GB内存+128GB容量</a></li>
							<li><a href="">尊享版 6GB内存+256GB容量 </a></li>
						</ul>
					</div>
					<div class="pro_xuanze_leibie">
						<div class="pro_step_title">
							2.选择颜色
							<span class="pro_version_desc"></span>
						</div>
						<ul>
							<li><a href=""><img src="../image/mi4-icon-hei.png" alt="黑色">黑色	</a></li>
						</ul>
					</div>
				</div>
				<!--您选择的产品-->
				<div class="user_xuanze_product">
					<span class="msg-tit">您选择了一下产品</span>
					<p class="msg-bd">小米MIX 标准版 4GB内存+128GB容量</p>
				</div>
				<!--下一步-->
				<div class="user_xuanze_btn">
					<a href="../controller/addcart.php?id=<?php echo $row['id'] ?>">加入购物车</a>
				</div>
			</div>
		</div>
		
		<!--深入了解-->
		<div class="shenruliaojie">
			<img src="../image/MIX-shenruliaojie.jpg" alt="深入了解MIX">
		</div>
		<!--轮播图-->
		<div class="pro_lunbotu">
			<a href=""></a>
		</div>		
		<div class="yibai">
			<!--保障-->
			<div class="pro_baozhang">
				<a href="#">
					<img src="../image/phone-section-01.png" alt="产品保证">
				</a>
			</div>
			<!--了解小米MIX参数-->
			<div class="canshu">
				了解小米参数<i>v</i>
			</div>
			<!--款款出色-->
			<div class="kuankuanchuse">
				<div class="kk_title">
					款款出色<br>
					随<span class="pro_kk_name">小米MIX</span>购买配件免费送货
				</div>
				<div class="pro_kk_shangpin">
					<ul>
						<li>
							<a href="#">
								<div class="item-info">
									<div class="item-info-jt">
										<h3>小米小钢炮蓝牙音箱2</h3>
										<p class="pro_price"><span>129</span>元</p>
									</div>
								</div>
								<div class="item-pic">
									<img src="../image/T1F5K_BjVv1RXrhCrK.jpg" alt="">
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="item-info">
									<div class="item-info-jt">
										<h3>小米小钢炮蓝牙音箱2</h3>
										<p class="pro_price"><span>129</span>元</p>
									</div>
								</div>
								<div class="item-pic">
									<img src="../image/T1F5K_BjVv1RXrhCrK.jpg" alt="">
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="item-info">
									<div class="item-info-jt">
										<h3>小米小钢炮蓝牙音箱2</h3>
										<p class="pro_price"><span>129</span>元</p>
									</div>
								</div>
								<div class="item-pic">
									<img src="../image/T1F5K_BjVv1RXrhCrK.jpg" alt="">
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!--维修-->
			<div class="channel-mihone">
					<div class="channel-mihone-des">
						<dl>
							<dt>小米之家及官方授权维修网点</dt>
							<dd>
								欢迎来小米之家解决你遇到的问题，了解最新的小米官方产品最全面的产品信息，还有很多好玩的活动等你来访。<br>
								你还可以前往小米授权维修网点解决售后问题，520家网点让服务随时在身边。
							</dd>
						</dl>
						<p>
							<a href="" class="btn" >小米之家</a>
							<a href="" class="btn">官方维修网点</a>
						</p>
					</div>
			</div>
		</div>
		<!--底部-->
		<?php include("../public/footer.php"); ?>
	</body>
</html>