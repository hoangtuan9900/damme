<?php
	
	$open = "tintuc";
	require_once __DIR__. "/../../autoload/autoload.php";



	/**
	 * danh mục sản phẩm
	 */
	$id = intval(getInput('id'));

	$Editproduct = $db->fetchID("tintuc", $id);
	if(empty($Editproduct)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("tintuc");
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$data = 
		[
			"tieude"      => postInput('tieude'),
			"noidung"     => postInput('noidung')
		];
		
		$error = [];
		
		if(postInput('tieude') == '')
		{
			$error['tieude'] = "Mời bạn nhập tiêu đề ";
		}

		if(postInput('noidung') == '')
		{
			$error['noidung'] = "Mời bạn nhập nội dung ";
		}

		if ( ! isset($_FILES['thunbar'])) 
		{
			$error['thunbar'] = "Mời bạn chọn hình ảnh ";
		}
		
		//error trống có nghĩa ko có lỗi
		if(empty($error))
		{
			if( isset($_FILES['thunbar']))
			{
				$file_name = $_FILES['thunbar']['name'];
				$file_tmp = $_FILES['thunbar']['tmp_name'];
				$file_type = $_FILES['thunbar']['type'];
				$file_erro = $_FILES['thunbar']['error'];
				
				if ( $file_erro == 0) {
					$part = ROOT ."product/";
					$data['thunbar'] = $file_name;
				}
			}

			$update = $db->update("tintuc",$data,array("id"=>$id));
			if($update > 0) 
			{
				move_uploaded_file($file_tmp,$part.$file_name);
				$_SESSION['success'] = "Cập nhật thành công";
				redirectAdmin("tintuc");
			}
			else 
			{
				$_SESSION['error'] = "Cập nhật thất bại";
				redirectAdmin("tintuc");
			}

		}
	}
		
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
	<!-- Page Heading NOI DUNG-->
 		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
        			Cập nhật tin tức
    			</h1>
    			<ol class="breadcrumb">
        			<li>
            			<i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/index.php">Bảng thống kê</a>
        			</li>
					<li>
            			<i class="fa fa-book"></i>  <a href="<?php echo base_url() ?>admin/mpdules/tintuc/index.php">Danh sách tin tức</a>
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
							Tiêu đề tin tưc
						</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="tieude" rows="4"><?php echo $Editproduct['tieude'] ?></textarea>
							<?php if (isset($error['tieude'])): ?>
								<p class="text-danger">
									<?php echo $error['tieude'] ?>
								</p>
							<?php endif ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Hình ảnh
						</label>
						<div class="col-sm-3">
							<input type="file" class="form-control" id="inputEmail3" name="thunbar">
							<?php if (isset($error['thunbar'])): ?>
								<p class="text-danger">
									<?php echo $error['thunbar'] ?>
								</p>
							<?php endif ?>
							<img src="<?php echo uploads() ?>product/<?php echo $Editproduct['thunbar']?>" width="50px" height="50px">
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Nội dung tin tưc
						</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="noidung" rows="4"><?php echo $Editproduct['noidung'] ?></textarea>
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






