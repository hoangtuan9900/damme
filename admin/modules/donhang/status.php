<?php

	$open = "donhang";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));

	$EditTransaction = $db->fetchID("donhang", $id);
	if ( empty($EditTransaction)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("donhang");
	}

	$status = $EditTransaction['status'] == 0 ? 1 : 0;

	$update = $db->update("donhang",array("status" => $status), array("id" => $id));
	if ($update > 0) 
	{
		$_SESSION['success'] = "Cập nhật thành công";
		redirectAdmin("donhang");
	}
	else 
	{
		$_SESSION['error'] = "Dữ liệu không thay đổi";
		redirectAdmin("donhang");
	}




?>