<?php
	
	$open = "product";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));

	$EditProduct = $db->fetchID("product", $id);
	if ( empty($EditProduct)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("product");
	}

	$num = $db->delete("product", $id);
	if($num > 0) 
	{
		$_SESSION['success'] = "Xoá sản phẩm thành công ";
		redirectAdmin("product");
	}
	else {
		$_SESSION['error'] = "Xoá sản phẩm thất bại ";
		redirectAdmin("product");
	}
		
?>




 