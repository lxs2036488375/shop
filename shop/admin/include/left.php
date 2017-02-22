<?php
	session_start();
	if(empty($_SESSION['username'])) {
		echo "<script>alert('请登录!');window.location.href='./login.php'</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../js/jquery.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>通讯录</div>
    
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
    <span><img src="../images/leftico01.png" /></span>会员管理
    </div>
    	<ul class="menuson">
        <li class="active"><cite></cite><a href="../vip/show.php" target="rightFrame">浏览会员</a><i></i></li>
        <li><cite></cite><a href="../vip/index.php" target="rightFrame">添加会员</a><i></i></li>
        </ul>    
    </dd>
        
    
    <dd>
    <div class="title">
    <span><img src="../images/leftico02.png" /></span>商品管理
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="../product/show.php" target="rightFrame">商品列表显示</a><i></i></li>
        <li><cite></cite><a href="../product/index.php" target="rightFrame">发布商品</a><i></i></li>
        </ul>     
    </dd> 
    
    
    <dd><div class="title"><span><img src="../images/leftico03.png" /></span>类别管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="../type/show.php" target="rightFrame">浏览类别</a><i></i></li>
        <li><cite></cite><a href="../type/index.php" target="rightFrame">添加类别</a><i></i></li>
    </ul>    
    </dd>  
    
    
    <dd><div class="title"><span><img src="../images/leftico04.png" /></span>订单管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="../orders/show.php" target="rightFrame">浏览订单</a><i></i></li>
    </ul>
    
    </dd>  

	<dd><div class="title"><span><img src="../images/leftico04.png" /></span>友情链接</div>
    <ul class="menuson">
        <li><cite></cite><a href="../link/show.php" target="rightFrame">浏览链接</a><i></i></li>
		<li><cite></cite><a href="../link/index.php" target="rightFrame">添加链接</a><i></i></li>
    </ul>
    
    </dd> 
    
    </dl>
    
</body>
</html>
