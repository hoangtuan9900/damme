<?php
	
	$open = "phankhoi";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));

	$EditCategory = $db->fetchID("phankhoi", $id);
	if ( empty($EditCategory)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("phankhoi");
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$data = 
		[
			"name" => postInput('name'),
			"slug" => to_slug(postInput('name'))
		];
		
		$error = [];
		
		if(postInput('name') == '')
		{
			$error['name'] = "Mời bạn nhập đầy đủ danh mục ";
		}
		
		//error trống có nghĩa ko có lỗi
		if(empty($error))
		{
			// kiểm tra
			if($EditCategory['name'] != $data['name'])
			{
				$isset = $db->fetchOne("phankhoi", " name = '".$data['name']."' ");
				if(count($isset) > 0) 
				{

					$_SESSION['error'] = "Tên danh mục đã tồn tại !";	
				}
				else
				{

					$id_update = $db->update("phankhoi",$data, array("id"=>$id ));
					if ($id_update > 0) 
					{
						$_SESSION['success'] = "Cập nhật thành công";
						redirectAdmin("phankhoi");
					}
					else 
					{
						$_SESSION['error'] = "Dữ liệu không thay đổi";
						redirectAdmin("phankhoi");
					}
				}
			}
			else
			{
				$id_update = $db->update("phankhoi",$data, array("id"=>$id ));
				if ($id_update > 0) 
				{
					$_SESSION['success'] = "Cập nhật thành công";
					redirectAdmin("phankhoi");
				}
				else 
				{
					$_SESSION['error'] = "Dữ liệu không thay đổi";
					redirectAdmin("phankhoi");
				}
			}
		}
			
	}
		
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
	<!-- Page Heading NOI DUNG-->
 		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
        			Cập nhật danh sách
    			</h1>
    			<ol class="breadcrumb">
        			<li>
            			<i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/index.php">Bảng thống kê</a>
        			</li>
					<li>
            			<i class="fa fa-book"></i>  <a href="<?php echo base_url() ?>admin/modules/phankhoi/index.php">Danh sách phân khối xe</a>
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
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Tên danh mục
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Tên danh mục" name="name" value="<?php echo $EditCategory['name'] ?>">
							<?php if (isset($error['name'])): ?>
								<p class="text-danger">
									<?php echo $error['name'] ?>
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

















