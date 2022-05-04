<?php

	session_start();

	// truy vấn đến cơ sở dữ liệu
	require_once __DIR__. "/../../libraries/Database.php";
	require_once __DIR__. "/../../libraries/Function.php";
	//khởi tạo biến $db
	$db = new Database() ;

	// kiểm tra đăng nhập admin
	if( ! isset($_SESSION['admin_id'])) 
	{
		header("location: /damme/loginadmin/index.php");
	}	

	
	define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/damme/public/uploads/");

	
?>