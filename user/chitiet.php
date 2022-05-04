<?php

	require_once __DIR__. "/../autoload/autoload.php";

	$id = intval(getInput('id'));
	//check id đơn hàng mở chi tiết đơn hàng
	$donhang = $db->fetchID("donhang",(int)$id);
	
	$user = $db->fetchID("users",intval($donhang['users_id']));

	$sql = "SELECT  * FROM orders WHERE orders.donhang_id = '$id' ";

	if(isset($_GET['page']))
	{
		$p = $_GET['page'];
	}
	else
	{
		$p = 1;
	}
	$name = "SELECT orders.donhang_id, product.name, product.thunbar, orders.price, orders.qty, product.id  FROM orders 
			INNER JOIN product on product.id = orders.product_id 
			INNER JOIN donhang on donhang.id = orders.donhang_id
			WHERE $id = orders.donhang_id"; 

	$order = $db->fetchJone('product',$name,$p,5,true);

    if (isset($order['page'])) 
    {
        $sotrang = $order['page'];
        unset($order['page']);
    }

?>

<?php require_once __DIR__. "/../layouts/header.php"; ?>
    
<div class="bg-1" style="background-color: #fdf5e6; "> 	
        <div class="container">
            <div class="row text-center">
                <h3 class="text-center" style="letter-spacing: 2px;color: red;padding-top: 20px"> THÀNH VIÊN </h3>
                <p><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
            </div>
        </div>
    </div>

    <div class="bg-1" style="background-color: #ffffff;">
        <div class="container" style="width: 1390px;padding-top: 62px">
            <div class="col-sm-2 fixside well" style="background-color: #fdf5e6;width: 21.5%;margin-left: 12px">
                <div class="well text-center" style="background-color: #fdf5e6;">

                    <p style="font-size: 15pt;font-style: normal;font-weight: bold;">Xin chào tài khoản !!!</p>

                    <img src="<?php echo base_url() ?>public/frontend/banner/avatar.png" class="img-circle" height="70" width="75" alt="Avatar">

                    <p style="font-size: 13pt;font-style: normal;font-weight: bold;margin-top: 5px;"><?php echo $_SESSION['name_user'] ?></p>

                </div>

                <div class="well text-center" style="background-color: #fdf5e6;">
                    <a href="<?php echo base_url() ?>user/thanhvien.php?id=<?php echo $_SESSION['name_id'] ?>">
                        <span class="glyphicon glyphicon-user" style="font-size: 34pt;margin-top: 5px;"></span>
                        <p style="font-size: 13pt;font-style: normal;font-weight: bold;">Thông tin tài khoản của bạn</p>
                    </a>
                </div>

                <div class="well text-center" style="background-color: #fdf5e6;">
                    <a href="<?php echo base_url() ?>user/donhang.php?id=<?php echo $_SESSION['name_id'] ?>">
                        <span class="glyphicon glyphicon-shopping-cart" style="font-size: 34pt;margin-top: 5px;"></span>
                        <p style="font-size: 13pt;font-style: normal;font-weight: bold;">Đơn hàng của bạn</p>
                    </a>
                </div>

            </div>
                    
            <div class="col-md-9" style="padding-bottom: 10px;margin-bottom: 20px;">
                <section class="box-main1">
                    <h3 class="title-main"  style="text-align: center; margin-top: -8px;letter-spacing: 2px;" ><a href="" style="font-size: 20pt;"> Chi tiết đơn hàng của bạn </a></h3>
                </section>
            </div><br>
    
            <div class="col-md-9 bor" style="padding-bottom: 10px;margin-bottom: 20px;border-radius: 8px;">
                <section class="box-main1">
                    <h3 class="title-main"  style="text-align: left; margin-top: -8px;letter-spacing: 2px;" ><a href="" style="font-size: 15pt;"> Thông tin về bạn </a></h3>
                    <table class="table table-hover" id="shoppingcart_info">
                        <thead>
                            <tr>
                                <th style="font-weight: bold; font-size: 10pt">Họ tên</th>
                                <th style="font-weight: bold; font-size: 10pt">Số điện thoại</th>
                                <th style="font-weight: bold; font-size: 10pt">Trạng thái</th>
                                <th style="font-weight: bold; font-size: 10pt">Tổng số tiền</th>
                                <th style="font-weight: bold; font-size: 10pt">Địa chỉ gia hàng</th>
                                <th style="font-weight: bold; font-size: 10pt">Ngày đặt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-size: 10pt;"><?php echo $user['name'] ?></td>
                                <td  style="font-size: 10pt;"><?php echo $user['phone'] ?></td>
                                <td style="font-size: 10pt;"><?php echo $donhang['status'] == 1 ? ' Đã xử lý ' : ' Chưa xử lý ' ?></td>
                                <td style="font-size: 10pt;"><?php echo $donhang['amount'] ?></td>
                                <td style="font-size: 10pt;"><?php echo $user['address'] ?></td>
                                <td style="font-size: 10pt;"><?php echo $donhang['created_at'] ?></td>
                            </tr>
                        </tbody>
                    </table><br>
                    <p style="font-size: 11pt; text-align:right;">Lưu ý: Đơn hàng đã tính thuế VAT</p>
                </section>
            </div><br>

            <div class="col-md-9 bor" style="padding-bottom: 10px;margin-bottom: 20px;border-radius: 8px;">
                <section class="box-main1">
                    <h3 class="title-main"  style="text-align: left; margin-top: -8px;letter-spacing: 2px;" ><a href="" style="font-size: 15pt;"> Các sản phẩm đặt mua: </a></h3>
                    <table class="table table-hover" id="shoppingcart_info">
                        <thead>
                            <tr>
                                <th style="font-weight: bold; font-size: 10pt">STT</th>
                                <th style="font-weight: bold; font-size: 10pt">Tên sản phẩm </th>
                                <th style="font-weight: bold; font-size: 10pt">Hình ảnh</th>
                                <th style="font-weight: bold; font-size: 10pt">Giá sản phẩm</th>
                                <th style="font-weight: bold; font-size: 10pt">Số lượng</th>
                                <th style="font-weight: bold; font-size: 10pt">Chi tiết sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $stt = 1; foreach ($order as $item) :?>
                                    <tr>
                                    <style type="text/css">
                                            .btn-xs,
                                            .btn-group-xs > .btn {
                                              padding: 1px 5px;
                                              font-size: 12px;
                                              line-height: 1.5;
                                              border-radius: 3px;
                                            }
                                            
                                            .btn-info {
                                                color: #fff;
                                                background-color: #5bc0de;
                                                border-color: #46b8da;
                                            }
                                        </style>
                                        <td style="padding-top: 40px;padding-left: 15px;"><?php echo $stt ?></td>
                                        <td style="padding-top: 40px;"><?php echo $item['name'] ?></td>
                                        <td>
                                            <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" width="120px" height="85px">
                                        </td>
                                        <td style="padding-top: 40px;"><?php echo formatPrice($item['price']) ?></td>
                                        <td style="padding-top: 40px; padding-left: 30px;"><?php echo $item['qty'] ?></td>
                                        <td style="padding-top: 38px;">
                                            <a class="btn btn-xs btn-info" href="/damme/product/chi-tiet-sp.php?id=<?php echo $item['id'] ?>"> <i class="fa fa-search"></i> Xem sản phẩm </a>
                                        </td>
                                    </tr>
                                <?php $stt++; endforeach ?>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>

<?php require_once __DIR__. "/../layouts/footer.php"; ?>