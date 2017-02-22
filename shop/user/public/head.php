<?php session_start(); ?>
<!--顶部导航-->
		<div class="top_nav">
			<!--设置居中-->
			<div class="top_wenzi">
				<div class="top_left">
					<ul>
						<li><a href="../index.php">小米商城</a><span class="shu_line">|</span></li>
						<li><a href="#" class="top_list">MIUI</a><span class="shu_line">|</span></li>
						<li><a href="#"class="top_list">米聊</a><span class="shu_line">|</span></li>
						<li><a href="#"class="top_list">游戏</a><span class="shu_line">|</span></li>
						<li><a href="#"class="top_list">多看阅读</a><span class="shu_line">|</span></li>
						<li><a href="#"class="top_list">云服务</a><span class="shu_line">|</span></li>
						<li><a href="#"class="top_list">金融</a><span class="shu_line">|</span></li>
						<li><a href="#"class="top_list">小米网移动版</a><span class="shu_line">|</span></li>
						<li><a href="#"class="top_list">问题反馈</a><span class="shu_line">|</span></li>
						<li><a href="#"class="top_list">Select Region</a></li>
					</ul>
				</div>
				<div class="top_right">
					<ul>
						<?php if(empty($_SESSION['usernameu'])) { 
								$a = "list.php?id={$_GET['id']}";
						?>
								<li><a href="../view/login.php?a=<?php echo $a;?>" class="top_list">登录</a><span class="shu_line">|</span></li>
								<li><a href="../view/reg.php" class="top_list">注册</a><span class="shu_line">|</span></li>
						<?php } else { ?>
								<li><a href="./user.php" class="top_list"><?php echo $_SESSION['usernameu']; ?> </a><span class="shu_line">|</span></li>
								<li><a href="../controller/logout.php" class="top_list">退出</a><span class="shu_line">|</span></li>
						<?php } ?>
						<li><a href="#" class="top_list">消息通知</a></li>
					</ul>
					<a href="./cart.php" class="cart">购物车(<?php echo isset($_SESSION["num_he"])?$_SESSION["num_he"]:"0"; ?>)</a>
				</div>
			</div>
		</div>
		<!--主体白色背景部分-->
		<div class="main_body_white">
			<!--网站logo-->
			<div class="nav_logo">
				<!--logo图片-->
				<div class="logo_image">
				   <img src="../image/logo.png">
				</div>
				<!--二导航-->
				<div class="body_nav">
					<ul>
						<li><a href="#"><span class="body_nav_text">小米手机</span><span class="body_nav_jianju"></span></a></li>
						<li><a href="#"><span class="body_nav_text">红米</span><span class="body_nav_jianju"></span></a></li>
						<li><a href="#"><span class="body_nav_text">平板·笔记本</span><span class="body_nav_jianju"></span></a></li>
						<li><a href="#"><span class="body_nav_text">电视</span><span class="body_nav_jianju"></span></a></li>
						<li><a href="#"><span class="body_nav_text">盒子·影音</span><span class="body_nav_jianju"></span></a></li>
						<li><a href="#"><span class="body_nav_text">路由器</span><span class="body_nav_jianju"></span></a></li>
						<li><a href="#"><span class="body_nav_text">智能硬件</span><span class="body_nav_jianju"></span></a></li>
						<li><a href="#"><span class="body_nav_text">服务</span><span class="body_nav_jianju"></span></a></li>
						<li><a href="#"><span class="body_nav_text">社区</span><span class="body_nav_jianju"></span></a></li>
					</ul>
					<div class="body_search">
						<input type="text" name="search" id="search">
						<input type="submit" value=" " name="search_commit" id="search_commit">
					</div>
				</div>
			</div>
		</div>