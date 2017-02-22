<?php
	include("../public/config.php");
	//开启数据库
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	$uid = $_GET['uid'];
	$sql = "select * from mibao where uid = '{$uid}'";	
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>密保</title>
		<link href="../css/zhuce.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<center>
			<div class="reg_main">
				<div class="logo">
					<img src="../image/milogo.png" alt="小米logo">
				</div>
				<font class="reg_title">密保</font>
				<div class="regbox">
					<form action="../controller/czpass.php" method="post">
						<span style="font-weight:bold;float:left;font-size:12px;">请输入问题的回答：</span><br><br>						
						<input type="hidden" name="uid" value="<?php echo $_GET['uid']; ?>">
						<div class="form_kuang">
							<input type="text" name="answer1" id="phone" placeholder="<?php echo $row['question1'] ?>">
						</div>
						<div class="form_kuang">
							<input type="text" name="answer2" id="phone" placeholder="<?php echo $row['question2'] ?>">
						</div>
						<div class="form_kuang">
							<input type="text" name="answer3" id="phone" placeholder="<?php echo $row['question3'] ?>">
						</div>
						<div class="form_zhuce">
							<input type="submit" value="下一步" id="zcbtn">
						</div>
					</form>
					
				</div>
			</div>
			<div class="n-footer">
				<div class="font">
					<ul class="lang-select-list">
						<li><a class="lang-select-li" href="">简体</a>|</li>
						<li><a class="lang-select-li" href="">繁体</a>|</li>
						<li><a class="lang-select-li" href="">English</a>|</li>
						<li><a class="a_critical" href="" target="_blank"><em></em>常见问题</a></li>
					</ul>
				</div>
				<p class="nf-intro"><span>小米公司版权所有-京ICP备10046444-<a class="beianlink" target="_blank"><span></span>京公网安备11010802020134号</a>-京ICP证110507号</span></p>
			</div>
		<center>
	</body>
</html>