<?php
	//开启session
	session_start();
	$id = $_GET['id'];
	//开启数据库
	include("../public/config.php");
	$link = mysqli_connect(HOST,USER,PASS) or die("连接数据库失败");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
	
	//获取post传过来的值
		$sheng = $_POST['sheng'];//获取到的是id号
		$shi = $_POST['shi'];
		$sadd = $sheng." ".$shi;	
		$sjtadd = $_POST['sjtadd'];
		$sname = $_POST['sname'];
		$scode = $_POST['scode'];
		$sphone = $_POST['sphone'];
		$stel = $_POST['stel'];
		$state = 1;//0=>设为默认地址  1=>不设为默认地址
		
	if(!empty($id)){
		$sql = "update address set sdd='{$sadd}',sjtadd='{$sjtadd}',sname='{$sname}',scode='{$scode}',sphone='{$sphone}',stel='{$stel}' where id={$id}";
		mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)<1){
			echo "<script>alert('更新失败！');window.location.href='../view/address.php';</script>";exit;
		}			
		echo "<script>alert('更新成功！');window.location.href='../view/address.php';</script>";
		
	}else{
	
		//获取当前用户的id
		$username = $_SESSION['usernameu'];
		$sql1 = "select id from users where username = '{$username}'";
		$result1 = mysqli_query($link,$sql1);
		$row1 = mysqli_fetch_assoc($result1);
		
		
		
		//设置限定条件
		if($sheng == "0"||$shi == "0") {
			echo "<script>alert('请选择所在地区!');window.location.href='../view/address.php'</script>";exit;
		}
		if(empty($sjtadd)) {
			echo "<script>alert('请填写具体地址!');window.location.href='../view/address.php'</script>";exit;		
		}
		if(empty($sname)) {
			echo "<script>alert('请填写收货人姓名!');window.location.href='../view/address.php'</script>";exit;		
		}
		if(empty($sphone)&&empty($stel)) {
			echo "<script>alert('手机或电话至少填一项!');window.location.href='../view/address.php'</script>";exit;		
		}
		if(!empty($sname)){
			if(!preg_match("/.{2,25}/",$sname)) {
				echo "<script>alert('收货人姓名应为2-25个字符，一个汉字为两个字符');window.location.href='../view/address.php';</script>";exit;
			}
		}
		if(!empty($sphone)){
			if(!preg_match("/.{6,20}/",$sphone)) {
				echo "<script>alert('手机号码应为6-20个数字！');window.location.href='../view/address.php';</script>";exit;
			}
			if(!preg_match("/^[1][34578][0-9]{9}$/",$sphone)) {
				echo "<script>alert('请输入正确的手机号码！');window.location.href='../view/address.php';</script>";exit;
			}
		}
		$sql = "insert into address (uid,sname,sdd,sjtadd,scode,sphone,stel,state) values ({$row1['id']},'{$sname}','{$sadd}','{$sjtadd}','{$scode}','{$sphone}','{$stel}',{$state})";
		mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)<1){
				echo "<script>alert('添加失败！');window.location.href='../view/address.php';</script>";exit;
		}	
		echo "<script>alert('添加成功！');window.location.href='../view/address.php';</script>";
	}
	