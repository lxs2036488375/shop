<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8">
		<title>小米网</title>
		<link href="./image/favicon.ico" rel="shortcut icon" type="image/x-icon">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="keywords" content="小米网  小米手机  小米笔记本  小米电话卡 小米电视">
		<meta name="description" content="小米商城直营小米公司旗下所有产品，囊括小米手机系列小米MIX、小米Note 2，红米手机系列红米Note 4、红米4，智能硬件，配件及小米生活周边，同时提供小米客户服务及售后支持。">
		<link href="./css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php include("./public/indexhead.php"); ?>
		<div class="main_body_white">
			<!--轮播图-->
			<div class="lunbotu">
				<div class="lunbo_left">
					<div class="lunbo_list">
						<ul>
							<?php
								include("./public/config.php");
								$link = mysqli_connect(HOST,USER,PASS);
								mysqli_select_db($link,DBNAME);
								mysqli_set_charset($link,"utf8");
								$sql = "select * from type where pid = 0";
								$result = mysqli_query($link,$sql);
								while($row = mysqli_fetch_assoc($result)) {
									echo "<li><a href='./view/list.php?id={$row['id']}'>{$row['name']}<span class='jiantou'>></span></a></li>";
								}
								mysqli_free_result($result);
							?>
						</ul>
					</div>
				</div>
			</div>
			<!--推荐商品3个-->
			<div class="tuijianshangpin">
				<!--六个小图标-->
				<div class="tuijian_icon">
					<div class="tuijian_left">
						<ul>
							<li><a href="#">选购手机</a></li>
							<li><a href="#">企业团购</a></li>
							<li><a href="#">官翻产品</a></li>
						</ul>
					</div>
					<div class="tuijian_left">
						<ul>
							<li><a href="#">小米移动</a></li>
							<li><a href="#">以旧换新</a></li>
							<li><a href="#">话费充值</a></li>
						</ul>
					</div>
				</div>
				<div class="tuijian_max">
					<a href="#"><img src="./image/1.jpg"></a>
				</div>
				<div class="tuijian_max">
					<a href="#"><img src="./image/2.jpg"></a>
				</div>
				<div class="tuijian_max">
					<a href="#"><img src="./image/3.jpg"></a>
				</div>
			</div>
			<!--小米明星单品-->
			<div class="star_danpin">
				<div class="shouye_title">
					<span class="title_text">小米明星单品</span>
				</div>
				<!--一件产品-->
				<div class="star_list">
					<!--商品图片-->
					<div class="star_image">
						<a href="#">
							<img src="./image/dianshi.png" alt="小米电视">
						</a>
					</div>
					<div class="star_text">
						<a href="#" class="star_pro_name">小米电视3s 48英寸</a>
						<span class="star_pro_shuoming">原装液晶屏，金属机身</span>
						<span class="star_pro_price">1999元</span>
					</div>
				</div>
				<!--一件产品-->
				<div class="star_list margin_left">
					<!--商品图片-->
					<div class="star_image">
						<a href="#">
							<img src="./image/hezi.jpg" alt="小米盒子">
						</a>
					</div>
					<div class="star_text">
						<a href="#" class="star_pro_name">小米盒子3 增强版</a>
						<span class="star_pro_shuoming">高端 4K 网络机顶盒</span>
						<span class="star_pro_price">1099元起</span>
					</div>
				</div>
				<!--一件产品-->
				<div class="star_list margin_left">
					<!--商品图片-->
					<div class="star_image">
						<a href="#">
							<img src="./image/taideng.jpg" alt="智能台灯">
						</a>
					</div>
					<div class="star_text">
						<a href="#" class="star_pro_name">米家 LED 智能台灯</a>
						<span class="star_pro_shuoming">无可视频闪，亮度色温无级调节</span>
						<span class="star_pro_price">169元</span>
					</div>
				</div>
				<!--一件产品-->
				<div class="star_list margin_left">
					<!--商品图片-->
					<div class="star_image">
						<a href="#">
							<img src="./image/shuihu.jpg" alt="水壶">
						</a>
					</div>
					<div class="star_text">
						<a href="#" class="star_pro_name">米家恒温电水壶</a>
						<span class="star_pro_shuoming">快速沸腾，水温智能控制</span>
						<span class="star_pro_price">199元</span>
					</div>
				</div>
				<!--一件产品-->
				<div class="star_list margin_left">
					<!--商品图片-->
					<div class="star_image">
						<a href="#">
							<img src="./image/jingshuiqi.jpg" alt="小米净水器">
						</a>
					</div>
					<div class="star_text">
						<a href="#" class="star_pro_name">小米净水器 厨下式</a>
						<span class="star_pro_shuoming">直出纯净水，隐藏式安装</span>
						<span class="star_pro_price">1999元</span>
					</div>
				</div>
			</div>
		</div>
		<!--主体灰色背景部分-->
		<div class="main_body_gray">
			<!--设置中部内容-->
			<div class="gray_auto">
				<!--智能硬件-->
				<div class="gray_three">
					<div class="shouye_title">
						<span class="title_text">智能硬件</span>
						<a href="#" class="more"><span class="more_text">查看全部</span><span class="more_icon">></span></a>
					</div>
					<div class="gray_two_line">
						<div class="gray_datu">
							<img src="./image/jingshuiqidatu.jpg" alt="净水器大图">
						</div>
						<!--小图 小米路由器-->
						<?php
							$sql2 = "select * from goods where typeid = 32 limit 0,8";
							$result2 = mysqli_query($link,$sql2);
							$i = 1;
							while($row2 = mysqli_fetch_assoc($result2)) {
								$top = ($i >= 4)?"margin_top":"";
								echo "<div class='xiaotu margin_left2 tankuaicomment {$top} '>";
									echo "<div class='xiaotu_img'>";
										echo "<a href='./view/product.php?id={$row2['id']}'>";
											echo "<img src='../admin/controller/pic/{$row2['picname']}' width='220' alt='{$row2['goods']}'>";
										echo "</a>";
									echo "</div>";
									echo "<div class='./view/xiaotu_text'>";
										echo "<a href='product.php?id={$row2['id']}' class='star_pro_name' id='xiaotu_font'>{$row2['goods']}</a>";
										echo "<span class='star_pro_shuoming' id='xiaotu_font'>{$row2['descr']}</span>";
										echo "<span class='star_pro_price' id='xiaotu_font'>{$row2['price']}元</span>";
									echo "</div>";
								echo "</div>";
								$i ++;
							}
							mysqli_free_result($result2);
						?>
					</div>
				</div>
				<!--搭配-->
				<div class="gray_three">
					<div class="shouye_title">
						<span class="title_text">小米手机</span>
						<a href="#" class="more"><span class="more_text">查看全部</span><span class="more_icon">></span></a>
					</div>
					<div class="gray_two_line">
						<?php
							$sql2 = "select * from goods where typeid = 13 limit 0,12";
							$result2 = mysqli_query($link,$sql2);
							$i = 1;
							while($row2 = mysqli_fetch_assoc($result2)) {
								$top = ($i >= 6)?"margin_top":"";
								echo "<div class='xiaotu margin_left2 tankuaicomment {$top} '>";
									echo "<div class='xiaotu_img'>";
										echo "<a href='./view/product.php?id={$row2['id']}'>";
											echo "<img src='../admin/controller/pic/{$row2['picname']}' width='220' alt='{$row2['goods']}'>";
										echo "</a>";
									echo "</div>";
									echo "<div class='xiaotu_text'>";
										echo "<a href='./view/product.php?id={$row2['id']}' class='star_pro_name' id='xiaotu_font'>{$row2['goods']}</a>";
										echo "<span class='star_pro_shuoming' id='xiaotu_font'>{$row2['descr']}</span>";
										echo "<span class='star_pro_price' id='xiaotu_font'>{$row2['price']}元</span>";
									echo "</div>";
								echo "</div>";
								$i ++;
							}
							mysqli_free_result($result2);
						?>
						
					</div>
				</div>
				<!--配件-->
				<div class="gray_three">
					<div class="shouye_title">
						<span class="title_text">小米电视</span>
						<a href="#" class="more"><span class="more_text">查看全部</span><span class="more_icon">></span></a>
					</div>
					<div class="gray_two_line">
						<?php
							$sql2 = "select * from goods where typeid = 27 limit 0,12";
							$result2 = mysqli_query($link,$sql2);
							$i = 1;
							while($row2 = mysqli_fetch_assoc($result2)) {
								$top = ($i >= 6)?"margin_top":"";
								echo "<div class='xiaotu margin_left2 tankuaicomment {$top} '>";
									echo "<div class='xiaotu_img'>";
										echo "<a href='./view/product.php?id={$row2['id']}'>";
											echo "<img src='../admin/controller/pic/{$row2['picname']}' width='220' alt='{$row2['goods']}'>";
										echo "</a>";
									echo "</div>";
									echo "<div class='xiaotu_text'>";
										echo "<a href='./view/product.php?id={$row2['id']}' class='star_pro_name' id='xiaotu_font'>{$row2['goods']}</a>";
										echo "<span class='star_pro_shuoming' id='xiaotu_font'>{$row2['descr']}</span>";
										echo "<span class='star_pro_price' id='xiaotu_font'>{$row2['price']}元</span>";
									echo "</div>";
								echo "</div>";
								$i ++;
							}
							mysqli_free_result($result2);
						?>
					</div>
				</div>
				<!--周边-->
				<div class="gray_three">
					<div class="shouye_title">
						<span class="title_text">周边</span>
						<a href="#" class="more"><span class="more_text">查看全部</span><span class="more_icon">></span></a>
					</div>
					<div class="gray_two_line">
						<?php
							$sql2 = "select * from goods where typeid = 32 limit 0,12";
							$result2 = mysqli_query($link,$sql2);
							$i = 1;
							while($row2 = mysqli_fetch_assoc($result2)) {
								$top = ($i >= 6)?"margin_top":"";
								echo "<div class='xiaotu margin_left2 tankuaicomment {$top} '>";
									echo "<div class='xiaotu_img'>";
										echo "<a href='./view/product.php?id={$row2['id']}'>";
											echo "<img src='../admin/controller/pic/{$row2['picname']}' width='220' alt='{$row2['goods']}'>";
										echo "</a>";
									echo "</div>";
									echo "<div class='xiaotu_text'>";
										echo "<a href='./view/product.php?id={$row2['id']}' class='star_pro_name' id='xiaotu_font'>{$row2['goods']}</a>";
										echo "<span class='star_pro_shuoming' id='xiaotu_font'>{$row2['descr']}</span>";
										echo "<span class='star_pro_price' id='xiaotu_font'>{$row2['price']}元</span>";
									echo "</div>";
								echo "</div>";
								$i ++;
							}
							mysqli_free_result($result2);
						?>
					</div>
				</div>
				<!--为你推荐-->
				<div class="gray_tuijian">
					<div class="shouye_title">
						<span class="title_text">为你推荐</span>
						<a href="#" class="more"><span class="more_text">查看全部</span><span class="more_icon">></span></a>
					</div>
					<?php
							$sql2 = "select * from goods where typeid = 6 limit 0,4";
							$result2 = mysqli_query($link,$sql2);
							$i = 1;
							while($row2 = mysqli_fetch_assoc($result2)) {
								echo "<div class='xiaotu margin_left2 tankuaicomment '>";
									echo "<div class='xiaotu_img'>";
										echo "<a href='./view/product.php?id={$row2['id']}'>";
											echo "<img src='../admin/controller/pic/{$row2['picname']}' width='220' alt='{$row2['goods']}'>";
										echo "</a>";
									echo "</div>";
									echo "<div class='xiaotu_text'>";
										echo "<a href='./view/product.php?id={$row2['id']}' class='star_pro_name' id='xiaotu_font'>{$row2['goods']}</a>";
										echo "<span class='star_pro_shuoming' id='xiaotu_font'>{$row2['descr']}</span>";
										echo "<span class='star_pro_price' id='xiaotu_font'>{$row2['price']}元</span>";
									echo "</div>";
								echo "</div>";
								$i ++;
							}
							mysqli_free_result($result2);
						?>
				</div>
				<!--热评商品-->
				<div class="content">
					<div class="shouye_title">
						<span class="title_text">热评商品</span>
					</div>
					<!--热评商品1-->
					<div class="hot_commit">
						<div class="rp_image">
							<a href="#">
								<img src="./image/rp1.jpg" alt="米家压力电饭煲">
							</a>
						</div>
						<div class="rp_text">
							<p >
								<a href="#" class="rp_content">包装很让人感动，式样也很可爱，做出的饭全家人都爱吃，超爱五星！手机控制还是不太熟练，最主要是没有连接成功吧，回头再细细研究一下哦，希望米家以后推出更多老百姓爱戴的产品</a>
							</p>
							<span class="rp_from">来自于 HZG 的评价</span>
							<span class="rp_info">
								<a href="#" class="rp_name">米家压力IH电饭煲</a>
								<span class="rp_line">|</span>
								<span class="rp_price">999元</span>
							</span>
						</div>
					</div>
					<!--热评商品1-->
					<div class="hot_commit margin_left">
						<div class="rp_image">
							<a href="#">
								<img src="./image/rp1.jpg" alt="米家压力电饭煲">
							</a>
						</div>
						<div class="rp_text">
							<p >
								<a href="#" class="rp_content">包装很让人感动，式样也很可爱，做出的饭全家人都爱吃，超爱五星！手机控制还是不太熟练，最主要是没有连接成功吧，回头再细细研究一下哦，希望米家以后推出更多老百姓爱戴的产品</a>
							</p>
							<span class="rp_from">来自于 HZG 的评价</span>
							<span class="rp_info">
								<a href="#" class="rp_name">米家压力IH电饭煲</a>
								<span class="rp_line">|</span>
								<span class="rp_price">999元</span>
							</span>
						</div>
					</div>
					<!--热评商品1-->
					<div class="hot_commit margin_left">
						<div class="rp_image">
							<a href="#">
								<img src="./image/rp1.jpg" alt="米家压力电饭煲">
							</a>
						</div>
						<div class="rp_text">
							<p >
								<a href="#" class="rp_content">包装很让人感动，式样也很可爱，做出的饭全家人都爱吃，超爱五星！手机控制还是不太熟练，最主要是没有连接成功吧，回头再细细研究一下哦，希望米家以后推出更多老百姓爱戴的产品</a>
							</p>
							<span class="rp_from">来自于 HZG 的评价</span>
							<span class="rp_info">
								<a href="#" class="rp_name">米家压力IH电饭煲</a>
								<span class="rp_line">|</span>
								<span class="rp_price">999元</span>
							</span>
						</div>
					</div>
					<!--热评商品1-->
					<div class="hot_commit margin_left">
						<div class="rp_image">
							<a href="#">
								<img src="./image/rp1.jpg" alt="米家压力电饭煲">
							</a>
						</div>
						<div class="rp_text">
							<p >
								<a href="#" class="rp_content">包装很让人感动，式样也很可爱，做出的饭全家人都爱吃，超爱五星！手机控制还是不太熟练，最主要是没有连接成功吧，回头再细细研究一下哦，希望米家以后推出更多老百姓爱戴的产品</a>
							</p>
							<span class="rp_from">来自于 HZG 的评价</span>
							<span class="rp_info">
								<a href="#" class="rp_name">米家压力IH电饭煲</a>
								<span class="rp_line">|</span>
								<span class="rp_price">999元</span>
							</span>
						</div>
					</div>
				</div>
				<!--内容-->
				<div class="content">
					<div class="shouye_title">
						<span class="title_text">内容</span>
						<a href="#" class="more"><span class="more_text">查看全部</span><span class="more_icon">></span></a>
					</div>
					<!--图书-->
					<div class="con_kuai">
						<span class="con_kind_title">图书</span>
						<a href="#" class="con_title">哈利·波特与被诅咒的孩子</a>
						<a href="#" class="con_shuoming">“哈利·波特”第八个故事中文版震撼来袭！特别彩排版剧本！</a>
						<a href="#" class="con_price">29.37元</a>
						<a href="#" class="con_picture">
							<img src="./image/5e5da924-84e3-4959-9e25-5891cdf30757.png" alt="哈利·波特与被诅咒的孩子">
						</a>
						<ul class="xm-pagers">
							<li class="pager">
								<span class="dot">1</span>
							</li>
							<li class="pager">
								<span class="dot">1</span>
							</li>
							<li class="pager">
								<span class="dot">1</span>
							</li>
						</ul>
					</div>
					<!--MIUI 主题-->
					<div class="con_kuai margin_left">
						<span class="con_kind_title">图书</span>
						<a href="#" class="con_title">哈利·波特与被诅咒的孩子</a>
						<a href="#" class="con_shuoming">“哈利·波特”第八个故事中文版震撼来袭！特别彩排版剧本！</a>
						<a href="#" class="con_price">29.37元</a>
						<a href="#" class="con_picture">
							<img src="./image/5e5da924-84e3-4959-9e25-5891cdf30757.png" alt="哈利·波特与被诅咒的孩子">
						</a>
						<ul class="xm-pagers">
							<li class="pager">
								<span class="dot">1</span>
							</li>
							<li class="pager">
								<span class="dot">1</span>
							</li>
							<li class="pager">
								<span class="dot">1</span>
							</li>
						</ul>
					</div>
					<!--游戏-->
					<div class="con_kuai margin_left">
						<span class="con_kind_title">图书</span>
						<a href="#" class="con_title">哈利·波特与被诅咒的孩子</a>
						<a href="#" class="con_shuoming">“哈利·波特”第八个故事中文版震撼来袭！特别彩排版剧本！</a>
						<a href="#" class="con_price">29.37元</a>
						<a href="#" class="con_picture">
							<img src="./image/5e5da924-84e3-4959-9e25-5891cdf30757.png" alt="哈利·波特与被诅咒的孩子">
						</a>
						<ul class="xm-pagers">
							<li class="pager">
								<span class="dot">1</span>
							</li>
							<li class="pager">
								<span class="dot">1</span>
							</li>
							<li class="pager">
								<span class="dot">1</span>
							</li>
						</ul>
					</div>
					<!--应用-->
					<div class="con_kuai margin_left">
						<span class="con_kind_title">图书</span>
						<a href="#" class="con_title">哈利·波特与被诅咒的孩子</a>
						<a href="#" class="con_shuoming">“哈利·波特”第八个故事中文版震撼来袭！特别彩排版剧本！</a>
						<a href="#" class="con_price">29.37元</a>
						<a href="#" class="con_picture">
							<img src="./image/5e5da924-84e3-4959-9e25-5891cdf30757.png" alt="哈利·波特与被诅咒的孩子">
						</a>
						<ul class="xm-pagers">
							<li class="pager">
								<span class="dot">1</span>
							</li>
							<li class="pager">
								<span class="dot">1</span>
							</li>
							<li class="pager">
								<span class="dot">1</span>
							</li>
						</ul>
					</div>
				</div>
				<!--视频-->
				<div class="shipin">
					<div class="shouye_title">
						<span class="title_text">视频</span>
						<a href="#" class="more"><span class="more_text">查看全部</span><span class="more_icon">></span></a>
					</div>
					<ul class="video-list">
						<li class="video-item video-item-first">
							<a href="#" class="video-image">
								<image src="./image/72995cbf-24b4-464c-bcfd-d7344b0ed3d4.jpg" alt="梁朝伟讲述小米Note2 的冰山理论">
							</a>
							<span class="video-title">
								<a href="#" class="video-title-a">梁朝伟讲述小米Note2 的冰山理论</a>
							</span>
							<p class="desc">
								第一眼看到的美，只是全部创作的八分之一
							</p>
						</li>
						<li class="video-item">
							<a href="#" class="video-image">
								<image src="./image/72995cbf-24b4-464c-bcfd-d7344b0ed3d4.jpg" alt="梁朝伟讲述小米Note2 的冰山理论">
							</a>
							<span class="video-title">
								<a href="#" class="video-title-a">梁朝伟讲述小米Note2 的冰山理论</a>
							</span>
							<p class="desc">
								第一眼看到的美，只是全部创作的八分之一
							</p>
						</li>
						<li class="video-item">
							<a href="#" class="video-image">
								<image src="./image/72995cbf-24b4-464c-bcfd-d7344b0ed3d4.jpg" alt="梁朝伟讲述小米Note2 的冰山理论">
							</a>
							<span class="video-title">
								<a href="#" class="video-title-a">梁朝伟讲述小米Note2 的冰山理论</a>
							</span>
							<p class="desc">
								第一眼看到的美，只是全部创作的八分之一
							</p>
						</li>
						<li class="video-item">
							<a href="#" class="video-image">
								<image src="./image/72995cbf-24b4-464c-bcfd-d7344b0ed3d4.jpg" alt="梁朝伟讲述小米Note2 的冰山理论">
							</a>
							<span class="video-title">
								<a href="#" class="video-title-a">梁朝伟讲述小米Note2 的冰山理论</a>
							</span>
							<p class="desc">
								第一眼看到的美，只是全部创作的八分之一
							</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--底部设置-->
		<div class="site-footer">
			<div class="container">
				<div class="footer-service">
					<ul class="list-service clearfix">
						<li><a rel="nofollow" href="http://www.mi.com/static/fast/" target="_blank"><i class="iconfont"></i>预约维修服务</a></li>
						<li><a rel="nofollow" href="http://www.mi.com/service/exchange#back" target="_blank" ><i class="iconfont"></i>7天无理由退货</a></li>
						<li><a rel="nofollow" href="http://www.mi.com/service/exchange#free" target="_blank"><i class="iconfont"></i>15天免费换货</a></li>
						<li><a rel="nofollow" href="http://www.mi.com/service/exchange#mail" target="_blank"><i class="iconfont"></i>满150元包邮</a></li>
						<li style="border:0px;"><a rel="nofollow" href="http://www.mi.com/static/maintainlocation/" target="_blank"><i class="iconfont"></i>520余家售后网点</a></li>
					</ul>
				</div>
				<div class="footer-links clearfix">            
					<dl class="col-links col-links-first">
						<dt>帮助中心</dt>						
						<dd><a rel="nofollow" href="http://www.mi.com/service/account/register/" target="_blank" >账户管理</a></dd>
						<dd><a rel="nofollow" href="http://www.mi.com/service/buy/buytime/" target="_blank">购物指南</a></dd>
						<dd><a rel="nofollow" href="http://www.mi.com/service/order/sendprogress/" target="_blank">订单操作</a></dd>
					</dl>                
					<dl class="col-links ">
						<dt>服务支持</dt>						
						<dd><a rel="nofollow" href="http://www.mi.com/service/exchange" target="_blank" >售后政策</a></dd>
						<dd><a rel="nofollow" href="http://fuwu.mi.com/" target="_blank">自助服务</a></dd>
						<dd><a rel="nofollow" href="http://xiazai.mi.com/" target="_blank">相关下载</a></dd>
					</dl>
					<dl class="col-links ">
						<dt>线下门店</dt>						
						<dd><a rel="nofollow" href="http://www.mi.com/c/xiaomizhijia/" target="_blank">小米之家</a></dd>
						<dd><a rel="nofollow" href="http://www.mi.com/static/maintainlocation/" target="_blank" >服务网点</a></dd>
						<dd><a rel="nofollow" href="http://www.mi.com/static/familyLocation/" target="_blank">零售网点</a></dd>
					</dl>                
					<dl class="col-links ">
						<dt>关于小米</dt>						
						<dd><a rel="nofollow" href="http://www.mi.com/about" target="_blank">了解小米</a></dd>
						<dd><a rel="nofollow" href="http://hr.xiaomi.com/" target="_blank">加入小米</a></dd>
						<dd><a rel="nofollow" href="http://www.mi.com/about/contact" target="_blank">联系我们</a></dd>
					</dl>                
					<dl class="col-links ">
						<dt>关注我们</dt>						
						<dd><a rel="nofollow" href="http://weibo.com/xiaomishangcheng" target="_blank">新浪微博</a></dd>
						<dd><a rel="nofollow" href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat" target="_blank">小米部落</a></dd>
						<dd><a rel="nofollow" href="http://www.mi.com/buyphone/#J_modalWeixin">官方微信</a></dd>
					</dl>                
					<dl class="col-links ">
						<dt>特色服务</dt>						
						<dd><a rel="nofollow" href="http://order.mi.com/queue/f2code" target="_blank">F码通道</a></dd>
						<dd><a rel="nofollow" href="http://www.mi.com/mimobile/" target="_blank" >小米移动</a></dd>
						<dd><a rel="nofollow" href="http://order.mi.com/misc/checkitem" target="_blank">防伪查询</a></dd>
					</dl>
					<div class="col-contact">
						<p class="phone">400-100-5678</p>
						<p><span  style="">周一至周日 8:00-18:00</span>
						<span style="display:none;">2月7日至13日服务时间 9:00-18:00</span><br><span>（仅收市话费）</soan></p>
						<a rel="nofollow" class="btn btn-small" href="http://www.mi.com/service/contact" target="_blank"><i class="iconfont"></i> 24小时在线客服</a>        
					</div>
				</div>
			</div>
		</div>
		<div class="site-info">
			<div class="container">
				<!--logo-->
				<div class="footer-logo">
					<img src="./image/logo.png" alt="小米官网">
				</div>
				<div class="footer-text margin_left">
					<p class="sites">
							<a href="#">小米商城</a>&nbsp&nbsp|&nbsp&nbsp
							<a href="#">MIUI</a>&nbsp&nbsp|&nbsp&nbsp 
							<a href="#">米聊</a> &nbsp&nbsp|&nbsp&nbsp
							<a href="#">小米路由器</a> &nbsp&nbsp|&nbsp&nbsp
							<a href="#">视频电话</a> &nbsp&nbsp|&nbsp&nbsp
							<a href="#">小米淘宝直营店</a> &nbsp&nbsp|&nbsp&nbsp
							<a href="#">小米网盟</a>&nbsp&nbsp |&nbsp&nbsp
							<a href="#">问题反馈</a> &nbsp&nbsp|&nbsp&nbsp
							<a href="#">Select Region</a>
					</p>
					<p class="line2"><a href="#">©mi.com</a> 京ICP证110507号 <a href="#">京ICP备10046444号</a> <a href="#">京公网安备11010802020134号</a><a href="#"> 京网文[2014]0059-0009号 </a></p>
					<p class="line2">违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</p>
				</div>
				<div class="info-links">
					<a href="#">
						<img src="./image/v-logo-1.png" alt="">
					</a>
					<a href="#">
						<img src="./image/v-logo-2.png" alt="">
					</a>
					<a href="#">
						<img src="./image/v-logo-3.png" alt="">
					</a>
					<a href="#">
						<img src="./image/v-logo-1.png" alt="">
					</a>
				</div>
			</div>
			<div class="lastgg ir"></div>
		</div>
	</body>
</html>