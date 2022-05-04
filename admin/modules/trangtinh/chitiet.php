<?php

$open = "trangtinh";
require_once __DIR__. "/../../autoload/autoload.php";

$id = intval(getInput('id'));
	//chi tiết 
$trang = $db->fetchID("trangtinh",(int)$id);

?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh sách trang tĩnh
            <a href="add.php" class="btn btn-success">Thêm mới</a>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/index.php">Bảng thống kê</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Trang tĩnh
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
                        <th>Mã trang</th>
                        <th>Tiêu đề</th>
                        <th>Ngày nhập</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $trang['id'] ?></td>
                        <td><?php echo $trang['name'] ?></td>
                        <td><?php echo $trang['created_at'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>		
</div>
<div class="row">
    <h4 style="font-weight: bold;margin-left: 10px;">Nội dung trang tĩnh:</h4>
    <div style="margin-left: 30px;">
        <?php echo $trang['noidung'] ?>
    </div>
</div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>