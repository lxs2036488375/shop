<?php
	session_start();
	$usernameu = $_SESSION['usernameu'];
	$id = $_GET['id'];
	$_SESSION['num_he'][$usernameu] -= $_SESSION['shoplist'][$usernameu][$id]['num'];
	unset($_SESSION['shoplist'][$usernameu][$id]);
	header("location:../view/cart.php");