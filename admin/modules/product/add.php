<?php
	
	$open = "product";
	require_once __DIR__. "/../../autoload/autoload.php";



	/**
	 * danh mục sản phẩm
	 */
	$category = $db->fetchAll("hangxe");
	$theloai = $db->fetchAll("theloai");
	$phankhoi = $db->fetchAll("phankhoi");

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$data = 
		[
			"name"        => postInput('name'),
			"slug"        => to_slug(postInput('name')),
			"hangxe_id"   => postInput('hangxe_id'),
			"theloai_id"  => postInput('theloai_id'),
			"phankhoi_id" => postInput('phankhoi_id'),     
			"price"       => postInput('price'),
			"number"      => postInput('number'),
			"content"     => postInput('content'),
			"sale" 		  => postInput('sale')
		];
		
		$error = [];
		
		if(postInput('name') == '')
		{
			$error['name'] = "Mời bạn nhập đầy đủ tên sản phẩm ";
		}

		if(postInput('hangxe_id') == '')
		{
			$error['hangxe_id'] = "Mời bạn chọn tên hãng xe ";
		}

		if(postInput('theloai_id') == '')
		{
			$error['theloai_id'] = "Mời bạn chọn thể loại của xe ";
		}

		if(postInput('phankhoi_id') == '')
		{
			$error['phankhoi_id'] = "Mời bạn chọn phân khối của xe ";
		}

		if(postInput('price') == '')
		{
			$error['price'] = "Mời bạn nhập giá sản phẩm ";
		}

		if(postInput('content') == '')
		{
			$error['content'] = "Mời bạn nhập thông tin về xe ";
		}

		if(postInput('number') == '')
		{
			$error['number'] = "Mời bạn nhập số lượng sản phẩm ";
		}

		if ( ! isset($_FILES['thunbar'])) 
		{
			$error['thunbar'] = "Mời bạn chọn hình ảnh ";
		}
		
		//error trống có nghĩa ko có lỗi
		if(empty($error))
		{
			

			if( isset($_FILES['anh2']))
			{
				$file_name1 = $_FILES['anh2']['name'];
				$file_tmp1  = $_FILES['anh2']['tmp_name'];
				$file_type1 = $_FILES['anh2']['type'];
				$file_erro1 = $_FILES['anh2']['error'];
				
				if ( $file_erro1 == 0) {
					$part1 = ROOT ."anhcon/";
					$data['anh2'] = $file_name1;
				}
			}

			if( isset($_FILES['anh1']))
			{
				$file_name2 = $_FILES['anh1']['name'];
				$file_tmp2  = $_FILES['anh1']['tmp_name'];
				$file_type2 = $_FILES['anh1']['type'];
				$file_erro2 = $_FILES['anh1']['error'];
				
				if ( $file_erro2 == 0) {
					$part2 = ROOT ."anhcon1/";
					$data['anh1'] = $file_name2;
				}
			}

			if( isset($_FILES['anh3']))
			{
				$file_name3 = $_FILES['anh3']['name'];
				$file_tmp3  = $_FILES['anh3']['tmp_name'];
				$file_type3 = $_FILES['anh3']['type'];
				$file_erro3 = $_FILES['anh3']['error'];
				
				if ( $file_erro3 == 0) {
					$part3 = ROOT ."anhcon2/";
					$data['anh3'] = $file_name3;
				}
			}

			if( isset($_FILES['thunbar']))
			{
				$file_name = $_FILES['thunbar']['name'];
				$file_tmp  = $_FILES['thunbar']['tmp_name'];
				$file_type = $_FILES['thunbar']['type'];
				$file_erro = $_FILES['thunbar']['error'];
				
				if ( $file_erro == 0) {
					$part = ROOT ."product/";
					$data['thunbar'] = $file_name;
				}
			}

			$id_insert = $db->insert("product",$data);
			if($id_insert) 
			{
				move_uploaded_file($file_tmp1,$part1.$file_name1);
				move_uploaded_file($file_tmp2,$part2.$file_name2);
				move_uploaded_file($file_tmp3,$part3.$file_name3);
				move_uploaded_file($file_tmp,$part.$file_name);
				$_SESSION['success'] = " Thêm mới thành công ";
				redirectAdmin("product");
			}
			else
			{
				$_SESSION['success'] = " Thêm mới thất bại ";
			}

		}
	}
		
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
	<!-- Page Heading NOI DUNG-->
 		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
        			Thêm mới sản phẩm
    			</h1>
    			<ol class="breadcrumb">
        			<li>
            			<i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/index.php">Bảng thống kê</a>
        			</li>
					<li>
            			<i class="fa fa-book"></i>  <a href="<?php echo base_url() ?>admin/modules/product/index.php">Sản phẩm</a>
        			</li>
        			<li class="active">
            			<i class="fa fa-file"></i> Thêm mới
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
							Danh mục hãng xe
						</label>
						<div class="col-sm-8">
							<select class="form-control col-md-8" name="hangxe_id">
								<option value=""> - Mời bạn chọn danh mục hãng xe - </option>
								<?php foreach ($category as $item): ?>
									<option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
								<?php endforeach ?>
							</select>
							<?php if (isset($error['hangxe_id'])): ?>
								<p class="text-danger">
									<?php echo $error['hangxe_id'] ?>
								</p>
							<?php endif ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Danh mục thể loại
						</label>
						<div class="col-sm-8">
							<select class="form-control col-md-8" name="theloai_id">
								<option value=""> - Mời bạn chọn thể loại xe - </option>
								<?php foreach ($theloai as $item): ?>
									<option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
								<?php endforeach ?>
							</select>
							<?php if (isset($error['theloai_id'])): ?>
								<p class="text-danger">
									<?php echo $error['theloai_id'] ?>
								</p>
							<?php endif ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Danh mục phân khối
						</label>
						<div class="col-sm-8">
							<select class="form-control col-md-8" name="phankhoi_id">
								<option value=""> - Mời bạn chọn phân khối của xe - </option>
								<?php foreach ($phankhoi as $item): ?>
									<option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
								<?php endforeach ?>
							</select>
							<?php if (isset($error['phankhoi_id'])): ?>
								<p class="text-danger">
									<?php echo $error['phankhoi_id'] ?>
								</p>
							<?php endif ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Tên sản phẩm
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Tên danh mục" name="name">
							<?php if (isset($error['name'])): ?>
								<p class="text-danger">
									<?php echo $error['name'] ?>
								</p>
							<?php endif ?>

						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Giá sản phẩm
						</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="inputEmail3" placeholder="9.000.000" name="price">
							<?php if (isset($error['price'])): ?>
								<p class="text-danger">
									<?php echo $error['price'] ?>
								</p>
							<?php endif ?>

						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Số lượng sản phẩm
						</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="inputEmail3" placeholder="100" name="number">
							<?php if (isset($error['number'])): ?>
								<p class="text-danger">
									<?php echo $error['number'] ?>
								</p>
							<?php endif ?>

						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Giảm giá
						</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" id="inputEmail3" placeholder="10 %" name="sale" value="0">
						</div>

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
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Hình ảnh khác
						</label>
						<div class="col-sm-3">
							<input type="file" class="form-control" id="inputEmail3" name="anh2">
							<?php if (isset($error['anh2'])): ?>
								<p class="text-danger">
									<?php echo $error['anh2'] ?>
								</p>
							<?php endif ?>
						</div>

						<label for="inputEmail3" class="col-sm-2 control-label">
							Hình ảnh khác
						</label>
						<div class="col-sm-3">
							<input type="file" class="form-control" id="inputEmail3" name="anh1">
							<?php if (isset($error['anh1'])): ?>
								<p class="text-danger">
									<?php echo $error['anh1'] ?>
								</p>
							<?php endif ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Hình ảnh khác
						</label>
						<div class="col-sm-3">
							<input type="file" class="form-control" id="inputEmail3" name="anh3">
							<?php if (isset($error['anh3'])): ?>
								<p class="text-danger">
									<?php echo $error['anh3'] ?>
								</p>
							<?php endif ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							Thông tin sản phẩm:
						</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="content" rows="4"></textarea>
							<?php if (isset($error['content'])): ?>
								<p class="text-danger">
									<?php echo $error['content'] ?>
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
                    <!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>

















