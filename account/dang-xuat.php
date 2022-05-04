<?php 
    
    session_start();
    // huỷ đăng nhập của tài khoản
    unset($_SESSION['name_user']);
    unset($_SESSION['name_id']);

    // chuyển về trang chủ 
    header("location: /damme/index.php");


?>