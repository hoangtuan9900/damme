<?php

	require_once __DIR__. "/autoload/autoload.php";

    $sum   = 0;
    $sp    = 0;
    $tl    = 0;
    $pk    = 0;
    $tin   = 0;
    $fb    = 0;
    $lh    = 0;
    $dh    = 0;
    $tv    = 0;
    $admin = 0;
    
	$category = $db->fetchAll("hangxe");

    $sanpham  = $db->fetchAll("product");

    $theloai  = $db->fetchAll("theloai");

    $phankhoi  = $db->fetchAll("phankhoi");

    $tintuc  = $db->fetchAll("tintuc");

    $feedback  = $db->fetchAll("feedback");

    $lienhe  = $db->fetchAll("lienhe");

    $donhang  = $db->fetchAll("donhang");

    $user  = $db->fetchAll("users");

    $admin  = $db->fetchAll("admin");
	
?>

<?php $stt = 1; foreach ($category as $item) :?>
    <?php $sum = $stt ?>
<?php $stt++; endforeach ?>

<?php $stt = 1; foreach ($sanpham as $item) :?>
    <?php $sp = $stt ?>
<?php $stt++; endforeach ?>

<?php $stt = 1; foreach ($theloai as $item) :?>
    <?php $tl = $stt ?>
<?php $stt++; endforeach ?>

<?php $stt = 1; foreach ($phankhoi as $item) :?>
    <?php $pk = $stt ?>
<?php $stt++; endforeach ?>

<?php $stt = 1; foreach ($tintuc as $item) :?>
    <?php $tin = $stt ?>
<?php $stt++; endforeach ?>

<?php $stt = 1; foreach ($feedback as $item) :?>
    <?php $fb = $stt ?>
<?php $stt++; endforeach ?>

<?php $stt = 1; foreach ($lienhe as $item) :?>
    <?php $lh = $stt ?>
<?php $stt++; endforeach ?>

<?php $stt = 1; foreach ($donhang as $item) :?>
    <?php $dh = $stt ?>
<?php $stt++; endforeach ?>

<?php $stt = 1; foreach ($user as $item) :?>
    <?php $tv = $stt ?>
<?php $stt++; endforeach ?>

<?php $stt = 1; foreach ($admin as $item) :?>
    <?php $admin = $stt ?>
<?php $stt++; endforeach ?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
	<!-- Page Heading NOI DUNG-->
 		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
        			Chào mừng bạn đến với trang quản trị 
    			</h1>
    			<ol class="breadcrumb">
        			<li>
            			<i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin/index.php">Bảng thống kê </a>
        			</li>
    			</ol>
			</div>
			<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $sum ?></div>
                                    <div> Tổng hãng xe </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo modules("hangxe") ?>">
                            <div class="panel-footer">
                                <span class="pull-left"> Hãng xe </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-database fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $sp ?></div>
                                    <div> Tổng sản phẩm </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo modules("product") ?>">
                            <div class="panel-footer">
                                <span class="pull-left"> Sản phẩm </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cubes fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $tl ?></div>
                                    <div> Tổng thể loại </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo modules("theloai") ?>">
                            <div class="panel-footer">
                                <span class="pull-left"> Thể loại </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cubes fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $pk ?></div>
                                    <div> Tổng phân khối</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo modules("phankhoi") ?>">
                            <div class="panel-footer">
                                <span class="pull-left"> Phân khối </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $fb ?></div>
                                    <div> Tổng feedback </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo modules("feedback") ?>">
                            <div class="panel-footer">
                                <span class="pull-left"> Feedback </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-phone fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $lh ?></div>
                                    <div> Tổng liên hệ </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo modules("lienhe") ?>">
                            <div class="panel-footer">
                                <span class="pull-left"> Liên hệ </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-newspaper-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $tin ?></div>
                                    <div> Tổng tin tức </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo modules("tintuc") ?>">
                            <div class="panel-footer">
                                <span class="pull-left"> Tin tức </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $dh ?></div>
                                    <div> Tổng đơn hàng </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo modules("donhang") ?>">
                            <div class="panel-footer">
                                <span class="pull-left"> Đơn hàng </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $tv ?></div>
                                    <div> Tổng khách hàng </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo modules("user") ?>">
                            <div class="panel-footer">
                                <span class="pull-left"> Khách hàng </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $admin ?></div>
                                    <div> Tổng ADMIN - Nhân viên</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo modules("admin") ?>">
                            <div class="panel-footer">
                                <span class="pull-left"> ADMIN - Nhân viên </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
 		</div>
                
<?php require_once __DIR__. "/layouts/footer.php"; ?>