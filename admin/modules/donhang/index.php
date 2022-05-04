<?php

    $open = 'donhang';
    require_once __DIR__. "/../../autoload/autoload.php";
    

    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }
    
    $sql = "SELECT  donhang.*,users.name, users.phone, users.address, donhang.note, donhang.amount, donhang.status FROM donhang 
			INNER JOIN users on users.id = donhang.users_id
    ";
    $admin = $db->fetchJone('donhang',$sql,$p,5,true);

    if (isset($admin['page'])) 
    {
        $sotrang = $admin['page'];
        unset($admin['page']);
    }

    
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <!-- Page Heading NOI DUNG-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh sách đơn hàng
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/index.php">Bảng thống kê</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Đơn hàng
                    </li>
                    <!-- <li style="float: right;">
						<form action="http://localhost:8888/damme/admin/modules/donhang/timkiem.php" method="GET">
							<input type="text" class="form-control" placeholder="Search..." name="search" value="">
						</form>
                    </li>
                    <style type="text/css">
                        li .form-control {
                            width: 250px;
                            margin-top: -28px;
                        }
				    </style> -->
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
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th>Tổng số tiền</th>
                                <th>Địa chỉ</th>
                                <th>Ngày đặt</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; foreach ($admin as $item) :?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['phone'] ?></td>
                                    <td>
                                        <a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['status'] == 1 ? 'btn-info' : 'btn-default' ?>">
                                            <?php echo $item['status'] == 1 ? ' Đã xử lý ' : ' Chưa xử lý ' ?>
                                        </a>
                                    </td>
                                    <td><?php echo $item['amount'] ?></td>
                                    <td><?php echo $item['address'] ?></td>
                                    <td><?php echo $item['created_at'] ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="chitiet.php?id=<?php echo $item['id'] ?>"> <i class="fa fa-search"></i> Chi tiết </a>
                                        <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"> <i class="fa fa-times"></i> Xoá </a>
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