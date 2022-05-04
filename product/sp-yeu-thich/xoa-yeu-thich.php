<?php 



	require_once __DIR__. "/../../autoload/autoload.php";

	if( ! isset($_SESSION['cart'])) 
	{
		header("location: /damme/product/index.php");exit();
	}

	$key = isset($_GET['key']) ? (int)$_GET['key'] : '';
	if($key) 
	{
		if(array_key_exists($key,$_SESSION['cart'])) 
		{
			unset($_SESSION['cart'][$key]);
			$_SESSION['success'] = ' Xoá thành công khỏi giỏ hàng ';
		}
	}
	header("location: /damme/product/sp-yeu-thich/yeu-thich.php");exit();



?>