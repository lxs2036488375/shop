<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<title>安装</title>
	</head>
	<body bgcolor="blue">
		<center>
			<h1>填写数据库信息</h1>
			<form action="./jieshou.php" method="post">
				<table border="0" width="400">
						<tr>
							<td>数据库主机：</td>
							<td><input type="text" name="host" value="localhost"></td>
						</tr>
						<tr>
							<td>数据库账号：</td>
							<td><input type="text" name="user" value="root"></td>
						</tr>
						<tr>
							<td>数据库密码：</td>
							<td><input type="text" name="pass" placeholder="请输入数据库密码"></td>
						</tr>
						<tr>
							<td>数据库名称：</td>
							<td><input type="text" name="dbname" placeholder="请输入数据库名称"></td>
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