<?php
	
	$open = "trangtinh";
	require_once __DIR__. "/../../autoload/autoload.php";



	/**
	 * danh mục sản phẩm
	 */
	$id = intval(getInput('id'));

	$Editproduct = $db->fetchID("trangtinh", $id);
	if(empty($Editproduct)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("trangtinh");
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$data = 
		[
			"name"      => postInput('name'),
			"noidung"     => postInput('noidung')
		];
		
		$error = [];
		
		if(postInput('name') == '')
		{
			$error['name'] = "Mời bạn nhập tiêu đề ";
		}

		if(postInput('noidung') == '')
		{
			$error['noidung'] = "Mời bạn nhập nội dung ";
		}

		//error trống có nghĩa ko có lỗi
		if(empty($error))
		{

			$update = $db->update("trangtinh",$data,array("id"=>$id));
			if($update > 0) 
			{
				$_SESSION['success'] = "Cập nhật thành công";
				redirectAdmin("trangtinh");
			}
			else 
			{
				$_SESSION['error'] = "Cập nhật thất bại";
				redirectAdmin("trangtinh");
			}

		}
	}
		
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
	<!-- Page Heading NOI DUNG-->
 		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
        			Cập nhật trang tĩnh
    			</h1>
    			<ol class="breadcrumb">
        			<li>
            			<i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/index.php">Bảng thống kê</a>
        			</li>
					<li>
            			<i class="fa fa-book"></i>  <a href="<?php echo base_url() ?>admin/mpdules/tintuc/index.php">Danh sách trang tĩnh</a>
        			</li>
        			<li class="active">
            			<i class="fa fa-file"></i> Cập nhật
                    </li>
    			</ol>
    			<div class="clearfix"></div>
                    <!-- thông báo lỗi -->
                <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
			</div>
 		</div>
		<div class="row">
			<div class="col-md-12">
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Tiêu đề trang tĩnh
						</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="name" rows="4" style="resize:none"><?php echo $Editproduct['name'] ?></textarea>
							<?php if (isset($error['name'])): ?>
								<p class="text-danger">
									<?php echo $error['name'] ?>
								</p>
							<?php endif ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Nội dung trang tĩnh
						</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="noidung" rows="16" style="resize:none"><?php echo $Editproduct['noidung'] ?></textarea>
							<?php if (isset($error['noidung'])): ?>
								<p class="text-danger">
									<?php echo $error['noidung'] ?>
								</p>
							<?php endif ?>

						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit"  class="btn btn-success">Lưu</button>
						</div>
					</div>
				</form>
			</div>
		</div>
                    
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>






