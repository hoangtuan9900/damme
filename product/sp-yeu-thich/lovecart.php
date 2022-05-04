<?php
    
    require_once __DIR__. "/../../autoload/autoload.php";
    

    //lấy id của sản phẩm cần thêm 
    $id = isset($_GET['id']) ? (int)$_GET['id'] : '';

    $product = $db->fetchID("product",(int)$id);

    if($product) 
    {
        //kiểm tra xem đã tồn tại session['cart']
        if(isset($_SESSION['cart'])) 
        {
            if(isset($_SESSION['cart'][$id])) 
            {
                $_SESSION['cart'][$id]['qty'] += 1;
            }
            else
            {
                $_SESSION['cart'][$id]['qty'] = 1;
            }
            $_SESSION['cart'][$id]['name'] = $product['name'];
            $_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
            $_SESSION['cart'][$id]['price'] = $product['price'];
            $_SESSION['cart'][$id]['sale'] = $product['sale'];
            header("location: /damme/product/sp-yeu-thich/yeu-thich.php");exit();
             
        }
        else
        {
            $_SESSION['cart'][$id]['qty'] = 1;
            $_SESSION['cart'][$id]['name'] = $product['name'];
            $_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
            $_SESSION['cart'][$id]['price'] = $product['price'];
            $_SESSION['cart'][$id]['sale'] = $product['sale'];

            header("location: /damme/product/sp-yeu-thich/yeu-thich.php");exit();
        }
    }
    else
    {
        $_SESSION['success'] = " Không tồn tại trong CSDL !!!";
        header("location: /damme/index.php");exit();
    }
    



?>