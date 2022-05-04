<?php 
	
	require_once __DIR__. "/../../autoload/autoload.php"; 

	$key = intval(getInput("key")); // chính là id sản phẩm
	$qty = intval(getInput("qty"));



	// kiểm tra xem số lượng người dùng mua có lớn hơn số của sản phâm đấy trong giỏ hàng...

	$_SESSION['cart'][$key]['qty'] = $qty;


	echo 1;

?>