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
		<!--列表灰色部分-->
		<div class="list_body_gray">
			<!--设置中部内容-->
			<div class="list_gray_auto">
				<!--页面说明-->
				<div class="list_page_shuoming">
					<a href="../index.php" id="list_index_llianjie">首页</a>
					<span class="sep">/</span>
					<?php
						include("../public/config.php");
						$link = mysqli_connect(HOST,USER,PASS);
						mysqli_select_db($link,DBNAME);
						mysqli_set_charset($link,"utf8");
						if(!empty($_GET['id'])) {
							$sql = "select * from type where id = {$_GET['id']}";
							$result = mysqli_query($link,$sql);
							$row = mysqli_fetch_assoc($result);
						}
					?>
					<span class="list_page_shuoming_content">选购<?php echo empty($_GET['id'])?"所有商品":str_replace(" ","·",$row['name']); ?></span>
				</div>
				<!--列表导航-->
				<div class="list_nav">
					<ul>
						<li><a href="#" id="select">选购<?php echo empty($_GET['id'])?"所有商品":str_replace(" ","·",$row['name']); ?></a></li>
						<?php
							if(empty($_GET['id'])) {
								$sqll = "select * from goods limit 0,7";
							}else{
								$sqll = "select * from goods where typeid in (select id from type where path like '%,{$_GET['id']},%') limit 0,7";
							}
							$resultl = mysqli_query($link,$sqll);
							while($roww = mysqli_fetch_assoc($resultl)) {
								echo "<li><a href='./product.php?id={$roww['id']}&typeid={$row['id']}'>{$roww['goods']}</a></li>";								
							}
						?>
						<a href="#" id="select" style="float:right;margin-right:20px;position:relative;top:30px;">查看全部></a>
					</ul>
				</div>
				<!--大图-->
				<div class="list_datu">
					<image src="../image/list_datu.jpg" width="1226" height="460">
				</div>
				
				<!--商品列表单-->
				<div class="list_pro_all">
					<ul>
						<?php
							$id = $_GET['id'];
							//连接数据库进行查询
							include("../public/config.php");
							$link = mysqli_connect(HOST,USER,PASS);
							mysqli_select_db($link,DBNAME);
							mysqli_set_charset($link,"utf8");
							if(empty($_GET['id'])) {
								$sql = "select * from goods";
							}else{
								$sql = "select * from goods where typeid in (select id from type where path like '%,{$id},%')";
							}
							$result = mysqli_query($link,$sql);
							$i = 0;
							while($row = mysqli_fetch_assoc($result)) {
								echo "<li class='span10 ".(($i%2 == 1)?"jianju":"")."'>";
									echo "<div class='list_pro_image'>";
										echo "<a href='product.php?id={$row['id']}&typeid={$_GET['id']}'><image src='../../admin/controller/pic/{$row['picname']}' alt='{$row['goods']}'></a>";
									echo "</div>";
									echo "<div class='list_pro_explain'>";
										echo "<dl class='channel-list-des'>";
											echo "<dt>";
											echo "{$row['goods']}";
											echo "<b>{$row['price']}</b>";
											echo "<span>元</span>";
											echo "</dt>";
											echo "<dd>";
											echo "{$row['descr']}";
											echo "</dd>";
										echo "</dl>";
										echo "<p class='channel-list-btn'>";
											echo "<a href='product.php?id={$row['id']}&typeid={$_GET['id']}'>立即购买</a>";
										echo "</p>";
									echo "</div>";
								echo "</li>";
							$i ++;
							}
							mysqli_free_result($result);
							mysqli_close($link);
						
						?>			
					</ul>
				</div>
			</div>			
		</div>
		<!--白色-->
		<div class="qita">
			<div class="qita_content">
				<!--保障-->
				<div class="list_baozhang">
					<a href="#">
						<img src="../image/phone-section-01.png" alt="产品保证">
					</a>
				</div>
				<!--移动电话卡-->
				<div class="list_baozhang shangline">
					<a href="#">
						<img src="../image/mi-mobile.jpg" alt="移动电话卡">
					</a>
				</div>
				<!--更多购买选择-->
				<div class="list_baozhang shangline">
					<a href="#">
						<img src="../image/phone-section-02.png" alt="更多购买选择">
					</a>
				</div>
				<!--MAX6好评如潮-->
				<div class="list_baozhang shangline">
					<a href="#">
						<img src="../image/phone-section-04.jpg" alt="MAX6好评如潮">
					</a>
				</div>
				<!--智能产品-->
				<div class="list_baozhang shangline">
					<dl class="channel-acces-des">
						<dt>搭配更多智能硬件产品</dt>
						<dd>
							以小米手机为中心，控制智能硬件产品，轻松享受智能生活带来的方便和舒适。<br>
							<a href="#">查看更多智能硬件产品<i>></i></a> 
						</dd>
					</dl>
					<ul class="channel-acces-list">
						<li>
							<a href="#" target="_blank">
								<img src="../image/T1ycK_BjYv1RXrhCrK!220x220.jpg" alt="小米圈铁耳机">
							</a>
							<dl>
								<dt><a href="#" target="_blank">小米圈铁耳机</a></dt>
								<dd><a href="#" target="_blank">动圈+动铁，双发声单元</a></dd>
								<dd class="price">99元</dd>
							</dl>
						</li>
						<li>
							<a href="#" target="_blank">
								<img src="../image/T1ycK_BjYv1RXrhCrK!220x220.jpg" alt="小米圈铁耳机">
							</a>
							<dl>
								<dt><a href="#" target="_blank">小米圈铁耳机</a></dt>
								<dd><a href="#" target="_blank">动圈+动铁，双发声单元</a></dd>
								<dd class="price">99元</dd>
							</dl>
						</li>
						<li class="no-border">
							<a href="#" target="_blank">
								<img src="../image/T1ycK_BjYv1RXrhCrK!220x220.jpg" alt="小米圈铁耳机">
							</a>
							<dl>
								<dt><a href="#" target="_blank">小米圈铁耳机</a></dt>
								<dd><a href="#" target="_blank">动圈+动铁，双发声单元</a></dd>
								<dd class="price">99元</dd>
							</dl>
						</li>
						<li>
							<a href="#" target="_blank">
								<img src="../image/T1ycK_BjYv1RXrhCrK!220x220.jpg" alt="小米圈铁耳机">
							</a>
							<dl>
								<dt><a href="#" target="_blank">小米圈铁耳机</a></dt>
								<dd><a href="#" target="_blank">动圈+动铁，双发声单元</a></dd>
								<dd class="price">99元</dd>
							</dl>
						</li>
						<li>
							<a href="#" target="_blank">
								<img src="../image/T1ycK_BjYv1RXrhCrK!220x220.jpg" alt="小米圈铁耳机">
							</a>
							<dl>
								<dt><a href="#" target="_blank">小米圈铁耳机</a></dt>
								<dd><a href="#" target="_blank">动圈+动铁，双发声单元</a></dd>
								<dd class="price">99元</dd>
							</dl>
						</li>
						<li class="no-border">
							<a href="#" target="_blank">
								<img src="../image/T1ycK_BjYv1RXrhCrK!220x220.jpg" alt="小米圈铁耳机">
							</a>
							<dl>
								<dt><a href="#" target="_blank">小米圈铁耳机</a></dt>
								<dd><a href="#" target="_blank">动圈+动铁，双发声单元</a></dd>
								<dd class="price">99元</dd>
							</dl>
						</li>
					</ul>
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
		</div>
		<?php include("../public/footer.php"); ?>
	</body>
</html>