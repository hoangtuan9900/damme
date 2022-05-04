<?php
	
	$open = "lienhe";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));

	$Deleteadmin = $db->fetchID("lienhe", $id);
	if ( empty($Deleteadmin)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("lienhe");
	}

	$num = $db->delete("lienhe", $id);
	if($num > 0) 
	{
		$_SESSION['success'] = "Xoá thành công ";
		redirectAdmin("lienhe");
	}
	else {
		$_SESSION['error'] = "Xoá thất bại ";
		redirectAdmin("lienhe");
	}
		
?>