<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<title>账号信息</title>
	</head>
	<body bgcolor="blue">
		<center>
			<form action="./doAdd.php" method="post">
				<h1>填写账号信息</h1>
				<table border="0" width="400">
						<tr>
							<td>管理员账号：</td>
							<td><input type="text" name="user" value="admin"></td>
						</tr>
						<tr>
							<td>管理员密码：</td>
							<td><input type="password" name="pass" placeholder="请输入管理员密码" ></td>
						</tr>
						<tr>
							<td>确认密码：</td>
							<td><input type="password" name="qrpass" placeholder="请再次输入密码"></td>
						</tr>
						<tr>
							<td>管理员E-MAIL：</td>
							<td><input type="text" name="email" placeholder="请输入管理员email"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="确认安装"></td>
						</tr>
				</table>
			</form>
		</center>
	</body>
</html>