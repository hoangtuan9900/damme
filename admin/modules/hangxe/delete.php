<?php
	
	$open = "hangxe";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));





	$EditCategory = $db->fetchID("hangxe", $id);
	if ( empty($EditCategory)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("hangxe");
	}

	/**
	 * kiểm tra xem danh mục đã có sản phẩm chưa
	 */
	$is_product = $db->fetchOne("product"," hangxe_id = $id ");
	if ($is_product == NULL) 
	{
		$num = $db->delete("hangxe", $id);
		if($num > 0) 
		{
			$_SESSION['success'] = "Xoá thành công ";
			redirectAdmin("hangxe");
		}
		else {
			$_SESSION['error'] = "Xoá thất bại ";
			redirectAdmin("hangxe");
		}	
	}
	else
	{
		$_SESSION['error'] = " Danh mục có sản phẩm ! Bạn không thể xoá ! ";
		redirectAdmin("hangxe");
	}

	
		
?>




 