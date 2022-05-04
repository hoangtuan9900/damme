<?php
	
	$open = "phankhoi";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));





	$EditCategory = $db->fetchID("phankhoi", $id);
	if ( empty($EditCategory)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("phankhoi");
	}

	/**
	 * kiểm tra xem danh mục đã có sản phẩm chưa
	 */
	$is_product = $db->fetchOne("product"," phankhoi_id = $id ");
	if ($is_product == NULL) 
	{
		$num = $db->delete("phankhoi", $id);
		if($num > 0) 
		{
			$_SESSION['success'] = "Xoá thành công ";
			redirectAdmin("phankhoi");
		}
		else {
			$_SESSION['error'] = "Xoá thất bại ";
			redirectAdmin("phankhoi");
		}	
	}
	else
	{
		$_SESSION['error'] = " Danh mục có sản phẩm ! Bạn không thể xoá ! ";
		redirectAdmin("phankhoi");
	}

	
		
?>




 