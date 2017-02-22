<?php
	//接收数据库传值
	$host = $_POST['host'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$dbname = $_POST['dbname'];
	
	//连接数据库
	$link = mysqli_connect($host,$user,$pass) or die("连接失败");;
	$selectdb = mysqli_select_db($link,$dbname);
	if(!$selectdb){
		die("不存在这个数据库");		
	}
	
	$db_restore_success = true;
	//循环遍历main目录，读取每一个sql文件,并执行sql语句
	$dir = "./main";
	$dd = opendir($dir);//打开目录,循环遍历目录
	while($f = readdir($dd)) {
		//跳过.和..
		if($f == "." || $f == "..") {
				continue;
		}
		//拼装一个完整路径
		$file = rtrim($dir,"/")."/".$f;
		//读取文件内容
		$sql = rtrim(file_get_contents($file),";");//把SQL语句以字符串读入$sql 
		$a=explode(";",$sql); //用explode()函数把?$sql字符串以“;”分割为数组 
		foreach($a as $b){ //遍历数组  
			$c=$b.";"; //分割后是没有“;”的，因为SQL语句以“;”结束，所以在执行SQL前把它加上  
			$result = mysqli_query($link,$c); //执行SQL语句  
			$db_restore_success = $db_restore_success && $result;  
		}  
		if($db_restore_success) {
				//输出恢复情况  
				echo '{"status":"success"}';  
		} else {  
			echo '{"status":"failed"}';  
		}
	}
	closedir($dd);//关闭目录
	
	//成功后写入配置文件
	$str = file_get_contents("../public/config.php");
	
	if(isset($host)&&isset($dbname)&&isset($user)&&isset($pass)) {
		$str = preg_replace("/define\(HOST\,\"(.*?)\"\);/",'define(HOST,"'.$host.'");',$str);
		
		$str = preg_replace("/define\(DBNAME\,\"(.*?)\"\);/",'define(DBNAME,"'.$dbname.'");',$str);
		
		$str = preg_replace("/define\(USER\,\"(.*?)\"\);/",'define(USER,"'.$user.'");',$str);
		
		$str = preg_replace("/define\(PASS\,\"(.*?)\"\);/",'define(PASS,"'.$pass.'");',$str);
		
		file_put_contents("../public/config.php",$str);
		
	}
	
	
	header("location:./tep2.php");