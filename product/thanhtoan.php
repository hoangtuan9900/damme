<?php 

	require_once __DIR__. "/autoload/autoload.php"; 

	//kiểm tra đăng nhập nếu chưa đăng nhập thì không được thanh toán
	if( ! isset($_SESSION['name_id'])) 
	{
		echo "<script>alert(' Bạn chưa đăng nhập tài khoản !!! Không thể thực hiện thanh toán !!!');location.href='/damme/account/dang-nhap.php'</script>";
	}

	$user = $db->fetchID("users",intval($_SESSION['name_id']));

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$data = 
	    [
	        'amount'   => $_SESSION['total'],
	        'users_id' => $_SESSION['name_id'],
	        'note'     => postInput("note")
	    ];

	    $idtran = $db->insert("donhang",$data);
	    if($idtran > 0) 
	    {
	    	foreach($_SESSION['cart'] as $key=> $value) 
	    	{
	    		$data2 = 
	    		[
	    			'donhang_id'     => $idtran,
	    			'product_id'     => $key,
	    			'qty'            => $value['qty'],
	    			'price'          => $value['price']
	    		];

	    		$id_insert = $db->insert("orders", $data2);
	    	}


	    	$_SESSION['success'] = " Lưu thông tin đơn hàng thành công ! Chúng tôi sẽ liên hệ lại với bạn sớm nhất ! ";
	    	header("location: /damme/product/thongbao.php"); 
	    }
	}

?>
<?php require_once __DIR__. "/layouts/header.php";  ?>
<div class="bg-1" style="background-color: #ffffff;">
  <div class="container">
    <div class="row">
      <h3 class="text-center" style="font-size: 28px;letter-spacing: 1px; color: red;margin-top: 50px;"> THANH TOÁN ĐƠN HÀNG </h3>
      <p style="text-align: center;margin-bottom:20px"><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
    </div>
  </div>
</div> 

    <div id="wrapper">
        <div id="maincontent" style="margin-top: 5px;">
                <div class="container" style="padding-bottom: 50px;">
                    <div class="col-md-12 bor" style="border-radius: 8px;">
                        <section class="box-main1">
                            <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 50px">
                            	<div class="form-group">
                                    <style type="text/css">
                                        .form-group .col-md-8 {
                                            margin-top: 8px;  
                                                                        
                                        }
                                        .form-group .col-md-8 input {
                                            border-radius: 5px; 
                                        }
                                    </style>

                            		<label class="col-md-3 control-label" style="font-size: 12pt;">Họ và tên:</label>
                            		<div class="col-md-8">
                            			<input type="text" readonly="" name="name" placeholder="Hoàng Minh Tuấn" class="form-control" value="<?php echo $user['name'] ?>">
                            		</div>

                            		<label class="col-md-3 control-label" style="font-size: 12pt;">Email:</label>
                            		<div class="col-md-8">
                            			<input type="email" readonly="" name="email" placeholder="admin@gmail.com" class="form-control" value="<?php echo $user['email'] ?>">
                            		</div>

                            		<label class="col-md-3 control-label" style="font-size: 12pt;">Số điện thoại:</label>
                            		<div class="col-md-8">
                            			<input type="number" readonly="" name="phone" placeholder="0334679170" class="form-control" value="<?php echo $user['phone'] ?>">
                            		</div>

                            		<label class="col-md-3 control-label" style="font-size: 12pt;">Địa chỉ:</label>
                            		<div class="col-md-8">
                            			<input type="text"  readonly="" name="address" placeholder="Cầu Giấy - Hà Nội" class="form-control" value="<?php echo $user['address'] ?>">
                            		</div>

                            		<label class="col-md-3 control-label" style="font-size: 12pt;">Tổng số tiền:</label>
                            		<div class="col-md-8">
                            			<input type="text" readonly="" name="note" placeholder="In cho tôi hoá đơn mặt hàng." class="form-control" value="<?php echo formatPrice($_SESSION['total']) ?>" >
                            		</div>

                            		<label class="col-md-3 control-label" style="font-size: 12pt;">Ghi chú: </label>
                            		<div class="col-md-8">
                            			<input type="text" name="note" placeholder="giao hàng tận nơi" class="form-control" >
                            		</div>
                            	</div>
                                <style type="text/css">
                                    .btn-success {
                                        padding: 3px 10px;
                                        background-color: #5cb85c;
                                        border-radius: 5px;
                                        transition: .2s;
                                        height: 30px;
                                        font-size: 12pt;
                                    }

                                    .btn-success:hover {
                                        border: 1px solid #333;
                                        background-color: #449d44;
                                        border-color: #4cae4c;
                                    }
                                </style>
                            	<button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;margin-top: 20px;">Thanh toán</button>
                            </form>
                        </section>
                    </div>
<?php require_once __DIR__. "/layouts/footer.php";  ?>




                