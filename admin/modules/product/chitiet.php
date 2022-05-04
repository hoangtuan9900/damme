<?php
    $open = "product";
	require_once __DIR__. "/../../autoload/autoload.php";

	$id = intval(getInput('id'));
	//chi tiết sản phẩm
	$product = $db->fetchID("product",(int)$id);

	$hangxe = $db->fetchID("hangxe",intval($product['hangxe_id']));

	$loai = $db->fetchID("theloai",intval($product['theloai_id']));

	$pk = $db->fetchID("phankhoi",intval($product['phankhoi_id']));

?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
    			Chi tiết sản phẩm
			</h1>
			<ol class="breadcrumb">
    			<li>
        			<i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/index.php">Bảng thống kê</a>
    			</li>
				<li>
        			<i class="fa fa-book"></i>  <a href="<?php echo base_url() ?>admin/modules/product/index.php">Sản phẩm</a>
    			</li>
    			<li class="active">
        			<i class="fa fa-file"></i> Chi tiết
                </li>
			</ol>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Tên xe</th>
							<th>Hãng xe</th>
							<th>Loại xe</th>
							<th>Phân khối xe</th>							
							<th>Hình ảnh</>
							<th>Giá và số lượng</th>
							<th>Ngày nhập(đăng bán) sản phẩm</th>
							<th>Ngày cập nhật lại sản phẩm</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $product['name'] ?></td>
							<td><?php echo $hangxe['name'] ?></td>
							<td><?php echo $loai['name'] ?></td>
							<td><?php echo $pk['name']?></td>
							<td>
								<img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" width="120px" height="85px">
							</td>
							<td>
								<ul>
									<li> Giá: <?php echo formatPrice($product['price']) ?></li>
									<li> Số lượng: <?php echo $product['number'] ?></li>
								</ul>
							</td>
							<td><?php echo $product['created_at'] ?></td>
							<td><?php echo $product['update_at'] ?></td>
						</tr>
					</tbody>
				</table>
				<div style="margin-top:30px">
					<div class="col-sm-9">
						<p style="font-size: 13pt;font-weight: bold;">Thông tin về xe:</p>
							<p style="padding: 1.5em; margin-top:-25px;font-size:12pt;"><?php echo $product['content']?></p>
					</div>
					<div class="col-sm-3">
						<p style="font-size: 13pt;font-weight: bold;">Một số ảnh khác của xe:</p>
							<img src="<?php echo uploads() ?>anhcon/<?php echo $product['anh2'] ?>" width="170px" height="135px" style="margin-bottom: 5px;"><br>
							<img src="<?php echo uploads() ?>anhcon1/<?php echo $product['anh1'] ?>" width="170px" height="135px" style="margin-bottom: 5px;"><br>
							<img src="<?php echo uploads() ?>anhcon2/<?php echo $product['anh3'] ?>" width="170px" height="135px">
					</div>
				</div>
			</div>
		</div>		
	</div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>