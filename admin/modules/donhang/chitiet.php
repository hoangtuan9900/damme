<?php
    $open = "donhang";
	require_once __DIR__. "/../../autoload/autoload.php";

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
	$name = "SELECT orders.donhang_id, product.name, product.thunbar, orders.price, orders.qty FROM orders 
			INNER JOIN product on product.id = orders.product_id 
			INNER JOIN donhang on donhang.id = orders.donhang_id
			WHERE $id = orders.donhang_id"; 

	$order = $db->fetchJone('donhang',$name,$p,5,true);

    if (isset($order['page'])) 
    {
        $sotrang = $order['page'];
        unset($order['page']);
    }

?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
    			Chi tiết đơn hàng
			</h1>
			<ol class="breadcrumb">
    			<li>
        			<i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/index.php">Bảng thống kê</a>
    			</li>
				<li>
					<i class="fa fa-book"></i>  <a href="<?php echo base_url() ?>admin/modules/donhang/index.php">Đơn hàng</a>
    			</li>
    			<li class="active">
        			<i class="fa fa-file"></i> Chi tiết
                </li>
			</ol>
			<div class="clearfix"></div>
		</div>
	</div>
	<h4 style="font-weight: bold;">Thông tin về khách hàng:</h4>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Mã đơn hàng</th>
							<th>Họ tên khách hàng</th>
							<th>Số điện thoại</th>
							<th>Trạng thái</th>
							<th>Tổng số tiền</th>
							<th>Địa chỉ</th>
							<th>Ngày đặt</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $donhang['id'] ?></td>
							<td><?php echo $user['name'] ?></td>
							<td><?php echo $user['phone'] ?></td>
							<td><?php echo $donhang['status'] == 1 ? ' Đã xử lý ' : ' Chưa xử lý ' ?></td>
							<td><?php echo $donhang['amount'] ?></td>
							<td><?php echo $user['address'] ?></td>
							<td><?php echo $donhang['created_at'] ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>		
	</div>
	<h4 style="font-weight: bold;">Các sản phẩm đặt mua:</h4>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>STT</th>
							<th>Mã đơn hàng</th>
							<th>Tên sản phẩm</th>
							<th>Hình ảnh</th>
							<th>Giá sản phẩm</th>
							<th>Số lượng đặt mua</th>
						</tr>
					</thead>
					<tbody>
						<?php $stt = 1; foreach ($order as $item) :?>
							<tr>
								<td><?php echo $stt ?></td>
								<td><?php echo $item['donhang_id'] ?></td>
								<td><?php echo $item['name'] ?></td>
								<td>
									<img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" width="120px" height="85px">
								</td>
								<td style="padding-left: 20px;"><?php echo formatPrice($item['price']) ?></td>
								<td style="padding-left: 40px;"><?php echo $item['qty'] ?></td>
							</tr>
						<?php $stt++; endforeach ?>
					</tbody>
				</table>
			</div>
		</div>		
	</div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>