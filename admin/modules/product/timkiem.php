<?php
    $open = "product";
	require_once __DIR__. "/../../autoload/autoload.php";


	if(isset($_GET['search'])) {
		$s=$_GET['search'];
		$sql = " SELECT * FROM product WHERE name LIKE '%$s%' ORDER BY id DESC";
		$product = $db->fetchsql($sql);
	}

?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
	<!-- Page Heading NOI DUNG-->
 		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
        			Danh sách sản phẩm
					<a href="add.php" class="btn btn-success">Thêm mới</a>
				</h1>
				
    			<ol class="breadcrumb">
        			<li>
            			<i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/index.php">Bảng thống kê</a>
        			</li>
        			<li class="active">
            			<i class="fa fa-file"></i> Sản phẩm
					</li>
					<li style="float: right;">
						<form action="http://localhost:8888/damme/admin/modules/product/timkiem.php" method="GET">
							<input type="text" class="form-control" placeholder="Search..." name="search" value="">
						</form>
					</li>
				</ol>
				<style type="text/css">
					li .form-control {
						width: 250px;
						margin-top: -28px;
					}
				</style>
                <div class="clearfix"></div>
                <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
			</div>
		 </div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
    				<table class="table table-bordered table-hover">
        				<thead>
            				<tr>
                				<th>STT</th>
                				<th>Tên xe</th>
                				<th>Hình ảnh</th>
                                <th>Giá và số lượng</th>
                                <th>Ngày nhập</th>
                				<th>Thao tác</th>
            				</tr>
        				</thead>
        				<tbody>
                            <?php $stt = 1; foreach ($product as $item) :?>
            				    <tr>
                				    <td><?php echo $stt ?></td>
                				    <td><?php echo $item['name'] ?></td>
                				    <td>
                				    	<img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" width="120px" height="85px">
                				    </td>
                                    <td>
                                    	<ul>
                                    		<li> Giá: <?php echo formatPrice($item['price']) ?></li>
                                    		<li> Số lượng: <?php echo $item['number'] ?></li>
                                    	</ul>
                                    </td>
                                    <td><?php echo $item['created_at'] ?></td>
                				    <td style="width: 200px;">
                                        <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"> <i class="fa fa-edit"></i> Sửa</a>
                                        <a class="btn btn-xs btn-danger" href="delete.php?id= <?php echo $item['id'] ?>"> <i class="fa fa-times"></i> Xoá</a>  
                                        <a class="btn btn-xs btn-info" href="chitiet.php?id=<?php echo $item['id'] ?>"> <i class="fa fa-search"></i> Chi tiết</a>     
                                    </td>
           			 		   </tr>
                            <?php $stt++ ;endforeach ?>
        				</tbody>
    				</table>
				</div>
			</div>		
		</div>
	<!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>