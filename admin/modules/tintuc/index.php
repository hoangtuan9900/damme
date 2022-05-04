<?php

    $open = "tintuc";
	require_once __DIR__. "/../../autoload/autoload.php";

	

	if(isset($_GET['page']))
	{
		$p = $_GET['page'];
	}
	else
	{
		$p = 1;
	}
    
    $sql = "SELECT  tintuc.* FROM tintuc ORDER BY ID DESC ";
    $admin = $db->fetchJone('tintuc',$sql,$p,8,true);

    if (isset($admin['page'])) 
    {
    	$sotrang = $admin['page'];
    	unset($admin['page']);
    }

	$admin = $db->fetchAll("tintuc");
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
    			Danh sách tin tức
    			<a href="add.php" class="btn btn-success">Thêm mới</a>
			</h1>
			<ol class="breadcrumb">
    			<li>
        			<i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/index.php">Bảng thống kê</a>
    			</li>
    			<li class="active">
        			<i class="fa fa-file"></i> Tin tức
                </li>
			</ol>
            <div class="clearfix"></div>
                <!-- thông báo lỗi -->
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
            				<th>Tiêu đề</th>
            				<th>Hình ảnh</th>
            				<th>Nội dung</th>
            				<th>Ngày nhập</th>
            				<th>Thao tác</th>
        				</tr>
    				</thead>
    				<tbody>
                        <?php $stt = 1; foreach ($admin as $item) :?>
        				    <tr>
            				    <td><?php echo $stt ?></td>
            				    <td><?php echo $item['tieude'] ?></td>
            				    <td>
            				    	<img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" width="120px" height="85px">
            				    </td>
                                <td style="width: 550px;">
                                	<section class="box-main1" style="overflow: auto;width: 99%;height: 60px;">
                                		<?php echo $item['noidung'] ?>
                                	</section>
                                </td>
            				    <td><?php echo $item['created_at'] ?></td>
            				    <td style="width: 130px;">
                                    <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"> <i class="fa fa-edit"></i> Sửa</a>
                                    <a class="btn btn-xs btn-danger" href="delete.php?id= <?php echo $item['id'] ?>"> <i class="fa fa-times"></i> Xoá</a>
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

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>