<?php
	
	$open = "feedback";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));

	$Deleteadmin = $db->fetchID("feedback", $id);
	if ( empty($Deleteadmin)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("feedback");
	}

	$num = $db->delete("feedback", $id);
	if($num > 0) 
	{
		$_SESSION['success'] = "Xoá thành công ";
		redirectAdmin("feedback");
	}
	else {
		$_SESSION['error'] = "Xoá thất bại ";
		redirectAdmin("feedback");
	}
		
?>