<?php
	
	$open = "donhang";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));

	$Deleteadmin = $db->fetchID("donhang", $id);
	if ( empty($Deleteadmin)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("donhang");
	}

	$num = $db->delete("donhang", $id);
	if($num > 0) 
	{
		$_SESSION['success'] = "Xoá đơn hàng thành công ";
		redirectAdmin("donhang");
	}
	else {
		$_SESSION['error'] = "Xoá đơn hàng thất bại ";
		redirectAdmin("donhang");
	}
		
?>




 
