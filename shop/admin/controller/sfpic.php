<?php
	//缩放图片
	function sfpic($file,$sfhpic,$maxWidth,$maxHeight)
	{
		//第一步，首先要有一个可以操作的图片
		//判断一下文件的类型
		$ext = ltrim(strrchr($file,'.'),"."); 		
		switch($ext) {
			case "jpg":
				$src = imagecreatefromjpeg($file);
			break;
			case "png":
				$src = imagecreatefrompng($file);
			break;
			case "gif":
				$src = imagecreatefromgif($file);
			break;
		}
		//获取图片的宽高
		$info = getimagesize($file);
		$width = $info[0];
		$height = $info[1];
		//判断所要处理图片的大小,如果小于最大大小则保持原图大小
		if($width  < $maxWidth && $height < $maxHeight) {
			return $sfhpic = $file;
		}else{	
			//处理宽高
			if($maxWidth/$width < $maxHeight/$height) {
				$w = $maxWidth;
				$h = ($maxWidth/$width) * $height;
			}else{
				$h = $maxHeight;
				$w = ($maxHeight/$height) * $width;
			}
			//建立画布
			$dst = imagecreatetruecolor($w,$h);
			//缩放的函数
			imagecopyresampled($dst,$src,0,0,0,0,$w,$h,$width,$height);
			//输出
			//header("Content-type:image/{$ext}");
			switch($ext) {
				case "jpg":
					imagejpeg($dst,$sfhpic);
				break;
				case "png":
					imagepng($dst,$sfhpic);
				break;
				case "gif":
					imagegif($dst,$sfhpic);
				break;
			}
			imagedestroy($src);
			imagedestroy($dst);	
		}
	}
	// sfpic("./pic/59b2900aa03cb2182a51cdb520b535b67979.png","./pic/xg.png",110,110);