
<?php

    require_once __DIR__. "/../autoload/autoload.php";
    
   if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }
    
    $sql = "SELECT  donhang.*,users.name, users.phone, users.address, donhang.amount, donhang.status FROM donhang 
			INNER JOIN users on users.id = donhang.users_id
            WHERE users.id = donhang.users_id
    ";
    $admin = $db->fetchJone('donhang',$sql,$p,8,true);

    if (isset($admin['page'])) 
    {
        $sotrang = $admin['page'];
        unset($admin['page']);
    }    
?>

<?php require_once __DIR__. "/../layouts/header.php";  ?>

    <div class="bg-1" style="background-color: #fdf5e6; "> 	
        <div class="container">
            <div class="row text-center">
                <h3 class="text-center" style="letter-spacing: 2px;color: red;padding-top: 20px"> THÀNH VIÊN </h3>
                <p><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
            </div>
        </div>
    </div>

    <div class="bg-1" style="background-color: #ffffff;">
        <div class="container" style="width: 1400px;padding-top: 62px">
            <div class="col-sm-2 fixside well" style="background-color: #fdf5e6;width: 21.5%;margin-left: 12px">
                <div class="well text-center" style="background-color: #fdf5e6;">

                    <p style="font-size: 15pt;font-style: normal;font-weight: bold;">Xin chào tài khoản !!!</p>

                    <img src="<?php echo base_url() ?>public/frontend/banner/avatar.png" class="img-circle" height="70" width="75" alt="Avatar">

                    <p style="font-size: 13pt;font-style: normal;font-weight: bold;margin-top: 5px;"><?php echo $_SESSION['name_user'] ?></p>

                </div>

                <div class="well text-center" style="background-color: #fdf5e6;">
                    <a href="<?php echo base_url() ?>user/thanhvien.php?id=<?php echo $_SESSION['name_id'] ?>">
                        <span class="glyphicon glyphicon-user" style="font-size: 34pt;margin-top: 5px;"></span>
                        <p style="font-size: 13pt;font-style: normal;font-weight: bold;">Thông tin tài khoản của bạn</p>
                    </a>
                </div>

                <div class="well text-center" style="background-color: #fdf5e6;">
                    <a href="<?php echo base_url() ?>user/donhang.php?id=<?php echo $_SESSION['name_id'] ?>">
                        <span class="glyphicon glyphicon-shopping-cart" style="font-size: 34pt;margin-top: 5px;"></span>
                        <p style="font-size: 13pt;font-style: normal;font-weight: bold;">Đơn hàng của bạn</p>
                    </a>
                </div>

            </div>
                    

            <div class="col-md-9 bor" style="padding-bottom: 10px;margin-bottom: 20px;">
                <section class="box-main1">
                    <h3 class="title-main"  style="text-align: left; margin-top: -8px;letter-spacing: 2px;" ><a href="" style="font-size: 16pt;"> Lịch sử mua hàng của bạn </a></h3>
                    <table class="table table-hover" id="shoppingcart_info">
                        <thead>
                            <tr>
                                <th style="font-weight: bold; font-size: 10pt">STT</th>
                                <th style="font-weight: bold; font-size: 10pt">Họ tên</th>
                                <th style="font-weight: bold; font-size: 10pt">Tổng số tiền</th>
                                <th style="font-weight: bold; font-size: 10pt">Trạng thái</th>
                                <th style="font-weight: bold; font-size: 10pt">Địa chỉ</th>
                                <th style="font-weight: bold; font-size: 10pt">Ngày đặt</th>
                                <th style="font-weight: bold; font-size: 10pt">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; foreach ($admin as $item) :?>
                                <tr>
                                    <style type="text/css">
                                            .btn-xs,
                                            .btn-group-xs > .btn {
                                              padding: 1px 5px;
                                              font-size: 12px;
                                              line-height: 1.5;
                                              border-radius: 3px;
                                            }
                                            
                                            .btn-info {
                                                color: #fff;
                                                background-color: #5bc0de;
                                                border-color: #46b8da;
                                            }
                                            .btn-danger {
                                                color: #fff;
                                                background-color: #d9534f;
                                                border-color: #d43f3a;
                                            }
                                            .btn-danger:hover {
                                                color: #fff;
                                                background-color: #ff0000;
                                                border-color: #d43f3a;
                                            }
                                        </style>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['amount'] ?></td>
                                    <td>
                                        <?php echo $item['status'] == 1 ? ' Đã xử lý ' : ' Chưa xử lý ' ?>
                                    </td>
                                    <td><?php echo $item['address'] ?></td>
                                    <td><?php echo $item['created_at'] ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="chitiet.php?id=<?php echo $item['id'] ?>"> <i class="fa fa-search"></i> Chi tiết </a>
                                        <a class="btn btn-xs btn-danger" href="delete.php?id= <?php echo $item['id'] ?>"> <i class="fa fa-times"></i> Huỷ </a>
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
                                        <a href="/damme/user/donhang.php?page=<?php echo $i ;?>"><?php echo $i; ?></a>
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
                </section>
            </div>
        </div>
    </div>

<?php require_once __DIR__. "/../layouts/footer.php";  ?>