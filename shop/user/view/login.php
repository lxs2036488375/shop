<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>登录页面</title>
		<link href="../css/zhuce.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<center>
			<div class="reg_main">
				<div class="logo">
					<img src="../image/milogo.png" alt="小米logo">
				</div>
				<font class="reg_title">小米账号登录</font>
				<div class="regbox">
					<form action="../controller/dologin.php?a=<?php echo $_GET['a']; ?>" method="post">
						<div class="form_kuang">
							<input type="text" name="username" id="phone" placeholder="邮箱/手机号码/小米账号">
						</div>
						<div class="form_kuang">
							<input type="password" name="pass" id="phone" placeholder="密码">
						</div>
						<div class="form_yzm">
							<input type="text" name="yzm" id="yzm" placeholder="图片验证码">
							<img src="../public/yzm.php" alt="图片验证码" title="看不清换一张" class="yzm_pic" onClick="this.src='../public/yzm.php?nocache='+Math.random()">
						</div>
						<div class="form_zhuce">
							<input type="submit" value="立即登录" id="zcbtn">
						</div>
					</form>
					<div class="other">
						<div class="other-link">
							<a href="./reg.php" class="other-tit-text">立即注册|</a>
							<a href="./losepass.php" class="other-tit-text">忘记密码</a>
						</div><br><br>
						<div class="other-tit">
							<span class="other-tit-text">还没有账户？</span>
						</div>
						<div class="other-link">
							<a href="" class="other-tit-text">qq登录|</a>
							<a href="" class="other-tit-text">微博登录|</a>
							<a href="" class="other-tit-text">支付宝登录</a>
						</div>
					</div>
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