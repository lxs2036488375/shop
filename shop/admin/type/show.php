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
				<li><a href="#">类别管理</a></li>
				<li><a href="#">浏览类别</a></li>
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
				//展示页面						
				//从数据库中把内容读取出来
				include("../include/config.php");	
				$link = mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
				mysqli_select_db($link,DBNAME);
				mysqli_set_charset($link,"utf8");
						
				//处理分页
				$count = "select count(*) from type";
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
				//准备sql
				$sql = "select * from type order by concat (path,id) {$limit} ";
				$result = mysqli_query($link,$sql);
			?>
			<table class="tablelist">
				<thead>
				<tr>
					<th>编号<i class="sort"><img src="../images/px.gif" /></i></th>
					<th>分类名称</th>
					<th>父类id</th>
					<th>分类路径</th>
					<th>操作</th>
				</tr>
				</thead>
				<tbody>
				<?php 
					$zhutai = array(1 => "新添加",2 => "在售",0 => "下架");
					while($row = mysqli_fetch_assoc($result)) {
						//处理缩进
						$m = substr_count($row['path'],",") - 1;
						$nbsp = str_repeat("&nbsp",$m * 6);
						echo "<tr>";
						echo "<td>{$row['id']}</td>";
						echo "<td>{$nbsp}|---{$row['name']}</td>";
						echo "<td>{$row['pid']}</td>";
						echo "<td>{$row['path']}</td>";
						echo "<td><a href='../controller/delete.php?id={$row['id']}&a=type'>删除</a>|<a href='./edit.php?id={$row['id']}'>修改</a>|<a href='./index.php?id={$row['id']}&path={$row['path']}'>添加子类</a></td>";
						echo "</tr>";
					}
					?> 
				</tbody>
			</table>
		
			<div class="pagin">
				<div class="message">共<i class="blue"><?php echo $maxnum; ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo $page; ?>&nbsp;</i>页</div>
				<ul class="paginList">
				<?php
					$last = $page - 1;$next = $page + 1;
					echo "<li class='paginItem'><a href='./show.php?p=1{$url}'>首页</a></li>";
					echo "<li class='paginItem'><a href='./show.php?p={$last}{$url}'><span class='pagepre'></span></a></li>";
					for($i = 1;$i <= $maxpage;$i ++){	
						echo "<li class='paginItem'><a href='./show.php?p={$i}{$url}'>{$i}</a></li>";
					}
					echo "<li class='paginItem'><a href='./show.php?p={$next}{$url}'><span class='pagenxt'></span></a></li>";
					echo "<li class='paginItem'><a href='./show.php?p={$maxpage}{$url}'>末页</a></li>";
				?>
				</ul>
			</div>  
		</div>
	</body>
</html>
