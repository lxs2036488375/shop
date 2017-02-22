<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>注册页面</title>
		<link href="../css/zhuce.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<center>
			<div class="reg_main">
				<div class="logo">
					<img src="../image/milogo.png" alt="小米logo">
				</div>
				<font class="reg_title">注册小米账号</font>
				<div class="regbox">
					<form action="../controller/doreg.php" method="post">
						<div class="form_kuang">
							<input type="text" name="username" id="phone" placeholder="请输入用户名">
						</div>
						<div class="form_yzm">
							<input type="text" name="name" id="yzm" placeholder="请输入真实姓名">
							<input name="sex" type="radio" value="1" checked="checked" />先生&nbsp;<input name="sex" type="radio" value="2" />女士
						</div>
						<div class="form_kuang">
							<input type="text" name="email" id="phone" placeholder="请输入邮箱">
						</div>
						<div class="form_kuang">
							<input type="password" name="pass" id="phone" placeholder="请输入密码">
						</div>
						<div class="form_kuang">
							<input type="password" name="qrpass" id="phone" placeholder="请确认密码">
						</div>
						<div class="form_yzm">
							<input type="text" name="yzm" id="yzm" placeholder="图片验证码">
							<img src="../public/yzm.php" alt="图片验证码" title="看不清换一张" class="yzm_pic"  onClick="this.src='../public/yzm.php?nocache='+Math.random()">
						</div>
						<div class="form_zhuce">
							<input type="submit" value="立即注册" id="zcbtn">
						</div>
					</form>
					<p class="xieyi">点击“立即注册”，即表示您同意并愿意遵守小米<a href="">用户协议</a>和<a href="">隐私政策</a></p>
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