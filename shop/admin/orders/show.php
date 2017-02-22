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
			<li><a href="#">浏览订单</a></li>
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
				//处理搜索
				$wherelist = array();
				$urllist = array();
				if(!empty($_GET['name'])){
					$wherelist[] = " linkman like '%{$_GET['name']}%'";
					$urllist[] = "name=".$_GET['name'];
				}
				if(is_numeric($_GET['state'])){
					$wherelist[] = " status={$_GET['state']}";
					$urllist[] = "state=".$_GET['state'];
				}
				//拼装where
				if(count($wherelist) > 0){
					$where = " where ".implode(" and ",$wherelist);
					$url='&'.implode('&',$urllist);
				}
				include("../include/config.php");
				//连接数据库
				$zhutai = array(0 => "新订单",1 => "已发货",2 => "已收货",3 => "无效订单");
				$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
				mysqli_select_db($link,DBNAME);
				mysqli_set_charset($link,"utf8");
							
				//处理分页
				//数据总数
				$count = "select count(*) from orders {$where}";
				
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
							
				$sql = "select * from orders {$where} {$limit}";
				
				$result = mysqli_query($link,$sql);		
					
			?>	
			<form action="show.php" method="get">
				<select name="state" class="scselect">
						<option value="" selected>请选择</option>
						<option value="0">新订单</option>
						<option value="1">已发货</option>
						<option value="2">已收货</option>
						<option value="3">无效订单</option>
				</select>
				<input type="text" name="name" class="scinput" placeholder="按照姓名查询">
				<input type="submit" class="scbtn" value="搜索">
			</form><br>
		
			<table class="tablelist">
				<thead>
					<tr>
						<th>编号<i class="sort"><img src="../images/px.gif" /></i></th>
						<th>会员id</th>
						<th>联系人</th>
						<th>地址</th>
						<th>邮编</th>
						<th>电话</th>
						<th>购买时间</th>
						<th>总金额</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>{$row['id']}</td>";
						echo "<td>{$row['uid']}</td>";
						echo "<td>{$row['linkman']}</td>";
						echo "<td>{$row['address']}</td>";
						echo "<td>{$row['code']}</td>";
						echo "<td>{$row['phone']}</td>";
						echo "<td>".date("Y-m-d",$row['addtime'])."</td>";
						echo "<td>{$row['total']}</td>";
						echo "<td>{$zhutai[$row['status']]}</td>";
						echo "<td>";
						echo "<a href='edit.php?id={$row['id']}' class='tablelink'>编辑</a>|<a href='detail.php?id={$row['id']}' class='tablelink'>查看订单详情</a>";
						if($row['status'] == 0) {
							echo "|<a href='../controller/update.php?a=shouhuo&id={$row['id']}' class='tablelink'>发货</a>";
						}
						echo "</td>";
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
