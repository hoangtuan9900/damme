<?php
    $open = "product";
	require_once __DIR__. "/../../autoload/autoload.php";
	

	if(isset($_GET['page']))
	{
		$p = $_GET['page'];
	}
	else
	{
		$p = 1;
	}

    $sql = "SELECT  product.*,hangxe.id as namecate FROM product 
			LEFT JOIN hangxe on hangxe.id = product.hangxe_id
    "; 
    $product = $db->fetchJone('product',$sql,$p,12,true);

    if (isset($product['page'])) 
    {
        $sotrang = $product['page'];
        unset($product['page']);
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

    				<div class="pull-right">
    					<nav aria-label="Page navigation " class="clearfix">
    						<ul class="pagination">
    							<li>
    								<a href="" aria-label="Previous">
    									<span aria-hidden="true">&laquo;</span>
    								</a>
    							</li>
    							<?php for( $i = 1 ; $i <= $sotrang; $i++ ) : ?>
    								<?php 
    									if (isset($_GET['page'])) 
    									{
    										$p = $_GET['page'];
    									}
    									else
    									{
    										$p = 1;
    									}
    								?>
    								<li class="<?php echo($i == $p) ? 'active' : '' ?>">
    									<a href="?page=<?php echo $i ;?>"><?php echo $i; ?></a>
    								</li>
    							<?php endfor; ?>	

    							<li>
    								<a href="" aria-label="Next">
    									<span aria-hidden="true">&raquo;</span>
    								</a>
    							</li>
    						</ul>
    					</nav>
    				</div>
				</div>
			</div>		
		</div>
	<!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>