<?php
	session_start();
	unset($_SESSION['usernameu']);
	echo "<script>alert('退出成功!');window.location.href='../index.php'</script>";