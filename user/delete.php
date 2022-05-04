<?php
	
	require_once __DIR__. "/../autoload/autoload.php";


	$id = intval(getInput('id'));

	$Deleteadmin = $db->fetchID("donhang", $id);
	if ( empty($Deleteadmin)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		header("location: /damme/user/donhang.php");
	}

	$num = $db->delete("donhang", $id);
	if($num > 0) 
	{
		$_SESSION['success'] = "Huỷ đơn hàng thành công ";
		header("location: /damme/user/donhang.php");
	}
	else {
		$_SESSION['error'] = "Huỷ đơn hàng thất bại ";
		header("location: /damme/user/donhang.php");
	}
		
?>




 
