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
		<script language="javascript">
			$(function(){	
				//导航切换
				$(".imglist li").click(function(){
					$(".imglist li.selected").removeClass("selected")
					$(this).addClass("selected");
				})	
			})	
		</script>
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
				<li><a href="#">商品管理</a></li>
				<li><a href="#">商品列表</a></li>
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
						
				//处理搜索
				$wherelist = array();
				$urllist = array();
				if(!empty($_GET['typeid'])){
					$wherelist[] = " typeid = {$_GET['typeid']}";
					$urllist[] = "typeid=".$_GET['typeid'];
				}
				if(!empty($_GET['goods'])){
					$wherelist[] = " goods like '%{$_GET['goods']}%'";
					$urllist[] ="goods=".$_GET['goods'];
				}
				if(!empty($_GET['company'])) {
					$wherelist[] = " company like '%{$_GET['company']}%'";
					$urllist[] ="company=".$_GET['company'];
				}
				if(!empty($_GET['price1'])) {							
					$wherelist[] = " price >= {$_GET['price1']}";
					$urllist[] ="price1=".$_GET['price1'];
				}
				if(!empty($_GET['price2'])) {							
					$wherelist[] = " price <= {$_GET['price2']}";
					$urllist[] ="price2=".$_GET['price2'];
				}
				if(!empty($_GET['store1'])){
					$wherelist[] = " store >= {$_GET['store1']}";
					$urllist[] ="store1=".$_GET['store1'];
				}
				if(!empty($_GET['store2'])){
					$wherelist[] = " store <= {$_GET['store2']}";
					$urllist[] ="store2=".$_GET['store2'];
				}						
				if(count($wherelist) > 0){
					$where = " and ".implode(" and ",$wherelist);//拼装where
					$url='&'.implode('&',$urllist);
				}
						
				//从数据库中把内容读取出来
				include("../include/config.php");	
				$link = mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
				mysqli_select_db($link,DBNAME);
				mysqli_set_charset($link,"utf8");
						
				//处理分页
				//数据总理
				$count = "select count(*) from goods,type where type.id = goods.typeid {$where}";
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
				$sql = "select goods.*,type.name from goods,type where type.id = goods.typeid {$where}  {$limit}";
				$result = mysqli_query($link,$sql);
			?>
			<form action="./show.php" method="get">
				<select name="typeid" class="scselect">
						<?php
							$sql1 = "select * from type order by concat (path,id) {$limit} ";
							$result1 = mysqli_query($link,$sql1);
							while($roww = mysqli_fetch_assoc($result1)) {
								//判断并禁用根类别
								$disabled = ($roww['pid'] == 0)?"disabled":"";
								echo "<option value={$roww['id']} {$disabled}>{$roww['name']}</option>";
							}
						?>
				</select>
				<input type="text" name="goods"  class="scinput" placeholder="按照商品名称查询">
				<input type="text" name="company"class="scinput" placeholder="按照生产厂家查询">
				<input type="text" name="price1" class="scinput" placeholder="￥" style="width:50px;">-
				<input type="text" name="price2" class="scinput" placeholder="￥" style="width:50px;">  
				<input type="text" name="store1" class="scinput" placeholder="store" style="width:50px;">-
				<input type="text" name="store2" class="scinput" placeholder="store" style="width:50px;">
				<input type="submit" class="scbtn" value="搜索">
			</form><br>
			<table class="imgtable">
				<thead>
					<tr>
						<th width="100px;">缩略图</th>
						<th>id</th>							
						<th>类别</th>
						<th>名称</th>
						<th>厂家</th>
						<th>简介</th>
						<th>单价</th>
						<th>状态</th>
						<th>库存量</th>
						<th>被购买数量</th>
						<th>点击</th>
						<th>添加时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$zhutai = array(1 => "新添加",2 => "在售",0 => "下架");
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td class='imgtd'><img src='../controller/pic/w_{$row['picname']}'></td>";
						echo "<td>{$row['id']}</td>";
						echo "<td>{$row['name']}</td>";
						echo "<td>{$row['goods']}</td>";
						echo "<td>{$row['company']}</td>";
						echo "<td>{$row['descr']}</td>";
						echo "<td>{$row['price']}</td>";
						$type = pathinfo("../controller/pic/".$row['picname'],PATHINFO_EXTENSION);
						$filesize = filesize("../controller/pic/".$row['picname']);
						echo "<td>{$zhutai[$row['state']]}</td>";
						echo "<td>{$row['store']}</td>";
						echo "<td>{$row['num']}</td>";
						echo "<td>{$row['clicknum']}</td>";
						echo "<td>".date("Y-m-d",$row['addtime'])."</td>";
						echo "<td><a href='../controller/delete.php?id={$row['id']}&a=product&filename={$row['picname']}'>删除</a>|<a href='./edit.php?id={$row['id']}'>修改</a></td>";
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
