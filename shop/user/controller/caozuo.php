<?php
	//���մ�������ֵ
	$c = $_GET['c'];
	$id = $_GET['id'];
	//�������ݿ�
	include("../public/config.php");
	$link = mysqli_connect(HOST,USER,PASS) or die("�������ݿ�ʧ��");
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link,"utf8");
		
	switch($c) {
		case 0:
			$sql = "update orders set status=3 where id = {$id};";
			mysqli_query($link,$sql);			
		break;
		case 1:
			$sql = "update orders set status=2 where id = {$id};";
			mysqli_query($link,$sql);
		break;
		case 2:
			//��������ҳ
			
		break;
		case 3:
			//ɾ����Ч����
			//��ע��ɾ��orders�������Ϣ��ͬʱɾ��detail��ĸ�����Ϣ
			$delsqlo = "delete from orders where id = {$id}";
			mysqli_query($link,$delsqlo);
			$delsqld ="delete from detail where orderid = {$id}";
			echo $delsqld;
			mysqli_query($link,$delsqld);
		break;
	}
	mysqli_close($link);
	header("location:../view/order.php");