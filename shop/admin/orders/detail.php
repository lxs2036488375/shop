<?php
	session_start();
	if(empty($_SESSION['username'])) {
		echo "<script>alert('请登录!');top.location.href='../include/login.php'</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>无标题文档</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			  $(".click").click(function(){
			  $(".tip").fadeIn(200);
			});
			  
			  $(".tiptop a").click(function(){
			  $(".tip").fadeOut(200);
			});

			  $(".sure").click(function(){
			  $(".tip").fadeOut(100);
			});

			  $(".cancel").click(function(){
			  $(".tip").fadeOut(100);
			});

			});
		</script>
	</head>
	<body>
		<div class="place">
			<span>位置：</span>
			<ul class="placeul">
			<li><a href="#">订单管理</a></li>
			<li><a href="#">查看详情</a></li>
			</ul>
		</div>
		<div class="rightinfo">
			<div class="tools">		
				<ul class="toolbar">
				<li class="click"><span><img src="../images/t01.png" /></span>添加</li>
				<li class="click"><span><img src="../images/t02.png" /></span>修改</li>
				<li><span><img src="../images/t03.png" /></span>删除</li>
				<li><span><img src="../images/t04.png" /></span>统计</li>
				</ul>
				<ul class="toolbar1">
				<li><span><img src="../images/t05.png" /></span>设置</li>
				</ul>
			</div>
			<?php
				include("../include/config.php");
				//连接数据库
				$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
				mysqli_select_db($link,DBNAME);
				mysqli_set_charset($link,"utf8");
							
				//处理分页
				//数据总数
				$count = "select count(*) from detail where orderid = {$_GET['id']}";
				$res = mysqli_query($link,$count);
				//处理结果集
				$row = mysqli_fetch_array($res);
				$maxnum = $row[0];
				//每页显示多少条
				$pagesize = 10;
				//分几页
				$maxpage = ceil($maxnum/$pagesize);
				//获取当前页码
				$page = empty($_GET['p'])?1:$_GET['p'];
				//防止越界
				if($page > $maxpage) {
					$page = $maxpage;						
				}
				if($page < 1){
					$page = 1;
				}
				$limit = " limit ".($page - 1) * $pagesize.",".$pagesize;
							
				$sql = "select * from detail where orderid = {$_GET['id']} {$limit}";
				$result = mysqli_query($link,$sql);		
					
			?>			
			<table class="tablelist">
				<thead>
					<tr>
						<th>编号<i class="sort"><img src="../images/px.gif" /></i></th>
						<th>订单id</th>
						<th>商品id</th>
						<th>商品名称</th>
						<th>单价</th>
						<th>数量</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>{$row['id']}</td>";
						echo "<td>{$row['orderid']}</td>";
						echo "<td>{$row['goodsid']}</td>";
						echo "<td>{$row['name']}</td>";
						echo "<td>{$row['price']}</td>";
						echo "<td>{$row['num']}</td>";
						echo "</tr>";						
					}
					mysqli_free_result($result);
					mysqli_close($link);					
				?>	
				</tbody>
			</table>
			<div class="pagin">
				<div class="message">共<i class="blue"><?php echo $maxnum; ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo $page; ?>&nbsp;</i>页</div>
				<ul class="paginList">
				<?php
					$last = $page - 1;$next = $page + 1;
					echo "<li class='paginItem'><a href='./show.php?p=1'>首页</a></li>";
					echo "<li class='paginItem'><a href='./show.php?p={$last}'><span class='pagepre'></span></a></li>";
					for($i = 1;$i <= $maxpage;$i ++){	
						echo "<li class='paginItem'><a href='./show.php?p={$i}'>{$i}</a></li>";
					}
					echo "<li class='paginItem'><a href='./show.php?p={$next}'><span class='pagenxt'></span></a></li>";
					echo "<li class='paginItem'><a href='./show.php?p={$maxpage}'>末页</a></li>";
				?>
				</ul>
			</div>    
		</div>
	</body>
</html>

