<?php
	session_start();
	
	//gd库实现验证码
	//得有一个小块用来存放验证码
	$image = imagecreatetruecolor(120,40);
	//设置背景颜色
	$bgcolor = imagecolorallocate($image,rand(200,250),rand(200,250),rand(200,250));
	//设置字体颜色
	$fontcolor = imagecolorallocate($image,rand(0,100),rand(0,100),rand(0,100));
	//设置点的颜色
	$diancolor = imagecolorallocate($image,rand(0,100),rand(0,100),rand(0,100));
	//设置线的颜色
	$linecolor = imagecolorallocate($image,rand(0,100),rand(0,100),rand(0,100));
	//给画板上色
	imagefill($image,1,1,$bgcolor);
	//设置字体
	$text = "23456789abcdefghigkmnpqrstuvwxyzABCDEFGHIGKLMNPQRSTUVWXYZ";
	for($i = 0;$i < 4;$i ++) {
		$x = (120/4)*$i;
		$y = rand(20,30);
		$font = substr($text,rand(0,strlen($text)-1),1);
		imagettftext($image,20,rand(-30,30),$x,$y,$fontcolor,"./simkai.ttf",$font);
		$yzm .= $font; 
	}
	$_SESSION['yzm'] = $yzm;
	//加干扰元素点
	for($i = 0;$i < 200;$i ++) {
		imagesetpixel($image,rand(0,120),rand(0,40),$diancolor);
	}
	//加干扰元素曲线
	for($i = 0;$i < 100;$i ++){
		imagearc($image,rand(-10,300),rand(-40,200),rand(10,200),rand(0,60),rand(0,60),rand(0,120),$linecolor);
	}
	//输出
	header("content-type:image/png");
	imagepng($image);
	imagedestroy($image);