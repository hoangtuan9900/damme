<?php
    $open = 'hangxe';
	require_once __DIR__. "/../../autoload/autoload.php";
	

    $category = $db->fetchAll("hangxe");
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
	<!-- Page Heading NOI DUNG-->
 		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
        			Danh sách hãng xe
					<a href="add.php" class="btn btn-success">Thêm mới</a>
    			</h1>
    			<ol class="breadcrumb">
        			<li>
            			<i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/index.php">Bảng thống kê</a>
        			</li>
        			<li class="active">
            			<i class="fa fa-file"></i> Danh sách
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
                				<th>Hãng xe</th>
                                <th>Ngày nhập</th>
                				<th>Thao tác</th>
            				</tr>
        				</thead>
        				<tbody>
                            <?php $stt = 1; foreach ($category as $item) :?>
            				    <tr>
                				    <td><?php echo $stt ?></td>
                				    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['created_at'] ?></td>
                				    <td>
                                        <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"> <i class="fa fa-edit"></i> Sửa</a>
                                        <a class="btn btn-xs btn-danger" href="delete.php?id= <?php echo $item['id'] ?>"> <i class="fa fa-times"></i> Xoá</a>            
                                    </td>
           			 		   </tr>
                            <?php $stt++ ;endforeach ?>
        				</tbody>
    				</table>
				</div>
			</div>		
		</div>
	
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>