<?php
	
	$open = "user";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));

	$Deleteadmin = $db->fetchID("users", $id);
	if ( empty($Deleteadmin)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("user");
	}

	$num = $db->delete("users", $id);
	if($num > 0) 
	{
		$_SESSION['success'] = "Xoá tài khoản thành công ";
		redirectAdmin("user");
	}
	else {
		$_SESSION['error'] = "Xoá tài khoản thất bại ";
		redirectAdmin("user");
	}
		
?>




 