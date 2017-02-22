<?php
	$uid = $_GET['uid'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>设置密码</title>
		<link href="../css/zhuce.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<center>
			<div class="reg_main">
				<div class="logo">
					<img src="../image/milogo.png" alt="小米logo">
				</div>
				<font class="reg_title">设置重置密码</font>
				<div class="regbox">
					<form action="../controller/lastpass.php" method="post">
						<span style="font-weight:bold;float:left;font-size:12px;">请设置新密码：</span><br><br>						
						<input type="hidden" name="uid" value="<?php echo $_GET['uid']; ?>">
						<div class="form_kuang">
							<input type="password" name="npass" id="phone" placeholder="新密码">
						</div>
						<div class="form_kuang">
							<input type="password" name="qrpass" id="phone" placeholder="确认新密码">
						</div>
						<div class="form_yzm">
							<input type="text" name="yzm" id="yzm" placeholder="图片验证码">
							<img src="../public/yzm.php" alt="图片验证码" title="看不清换一张" class="yzm_pic" onClick="this.src='../public/yzm.php?nocache='+Math.random()">
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