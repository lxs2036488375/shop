<?php
	//对上传的文件进行处理
	function uploadfile($file,$allowsize,$allowtype,$path) {
		//判断错误
		if($file['error']) {
			switch($file['error']) {
				case 1:
					$info = "您所上传的文件超出了系统允许的大小，请压缩后上传";
				break;
				case 2:
					$info = "你所上传的文件超出了HTML的设置，请压缩后上传";
				break;
				case 3:
					$info = "部分文件上传成功，请检查";
				break;
				case 4:
					$info = "您没有选择任何文件，请选择您所要上传的文件";
				break;
				case 6:
					$info = "sorroy，找不到服务器上的临时文件夹";
				break;
				case 7:
					$info = "文件上传失败";
				break;
			}
			return $info;
		}
		//限制文件上传的大小
		
		if($file['size'] > $allowsize){
			return "您所上传的文件超出了指定大小，请重新上传";
		}
		//限制文件的类型
		if(!in_array($file['type'],$allowtype)) {
			return "您所上传的文件不是指定类型，请重新上传";
		}
		//改名
		$filename = $file['name'];
		$houzhui = pathinfo($filename,PATHINFO_EXTENSION);
		do{
			$name = md5($filename).rand(1000,9999).".".$houzhui;
		}while(file_exists($name));
		//处理路径
		$path = rtrim($path,"/")."/";
		//判断所要上传的文件夹是否存在，不存在则创建
		$f = opendir("./");
		while($dd = readdir($f)) {
			//去掉. 和 ..
			if($dd == "." || $dd == "..") {
				continue;
			}
			//判断是否存在$path这个文件夹
			if(!file_exists($path)) {
				mkdir($path);
				$path = rtrim($path,"/")."/";
			}
		}
		//上传
		if(move_uploaded_file($file['tmp_name'],$path.$name)) {
			return $name;
		}
	}