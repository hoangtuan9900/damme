<?php
	
	$open = "trangtinh";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));

	$Deleteadmin = $db->fetchID("trangtinh", $id);
	if ( empty($Deleteadmin)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("trangtinh");
	}

	$num = $db->delete("tragtinh", $id);
	if($num > 0) 
	{
		$_SESSION['success'] = "Xoá thành công ";
		redirectAdmin("trangtinh");
	}
	else {
		$_SESSION['error'] = "Xoá thất bại ";
		redirectAdmin("trangtinh");
	}
		
?>