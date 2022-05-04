<?php
	
	$open = "tintuc";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));

	$Deleteadmin = $db->fetchID("tintuc", $id);
	if ( empty($Deleteadmin)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("tintuc");
	}

	$num = $db->delete("tintuc", $id);
	if($num > 0) 
	{
		$_SESSION['success'] = "Xoá thành công ";
		redirectAdmin("tintuc");
	}
	else {
		$_SESSION['error'] = "Xoá thất bại ";
		redirectAdmin("tintuc");
	}
		
?>