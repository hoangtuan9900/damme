<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> ADMIN MOTORCYCLE  </title>
        <!-- kết nối bootstrap -->
        <link href="<?php echo base_url() ?>public/admin/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url() ?>public/admin/css/sb-admin.css" rel="stylesheet">

        <link href="<?php echo base_url() ?>public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <div id="wrapper">
            <!-- thanh chọn-->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url() ?>admin/index.php" style="font-size: 18pt;">XIN CHÀO <?php echo $_SESSION['admin_name'] ?></a>
                </div>
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size: 14pt;"><i class="fa fa-user" style="font-size: 14pt;"></i> <?php echo $_SESSION['admin_name'] ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="/damme/logoutadmin/dang-xuat-admin.php"><i class="fa fa-fw fa-power-off"></i> Đăng xuất </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- thanh dọc chọn các trang quản lý theo thành phần -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav" style="overflow-y: hidden;">
                        <li>
                            <aside class="main-sidebar">
                                <section class="sidebar">
                                    <div class="user-panel">
                                        <div class="pull-left image" style="margin-left: 28px;margin-top: 5px; margin-bottom:2px;">
                                          <img src="<?php echo base_url() ?>public/frontend/banner/avatar.png" class="img-circle" alt="User Image">
                                        </div>
                                        <div class="pull-left info" style="margin-left: 20px;">
                                          <p style="color: #ffffff;margin: 15px 0 0px;"><?php echo $_SESSION['admin_name'];?></p>
                                          <p style="color: #56aaff;" ><i class="fa fa-circle text-success"></i> Online </p>
                                        </div>
                                    </div>
                                </section>
                            </aside>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>admin"><i class="fa fa-fw fa-dashboard"></i> Bảng thống kê</a>
                        </li>

                        <li class="<?php echo isset($open) && $open == 'hangxe' ? 'active' : '' ?>">
                            <a href="<?php echo modules("hangxe") ?>"><i class="fa fa-list"></i> Danh mục hãng xe</a>
                        </li>

                        <li class="<?php echo isset($open) && $open == 'product' ? 'active' : '' ?>">
                            <a href="<?php echo modules("product") ?>"><i class="fa fa-database"></i> Sản phẩm của hãng</a>
                        </li>

                        <li class="<?php echo isset($open) && $open == 'theloai' ? 'active' : '' ?>">
                            <a href="<?php echo modules("theloai") ?>"><i class="fa fa-list"></i> Danh mục thể loại xe </a>
                        </li>

                        <li class="<?php echo isset($open) && $open == 'phankhoi' ? 'active' : '' ?>">
                            <a href="<?php echo modules("phankhoi") ?>"><i class="fa fa-list"></i> Danh mục phân khối của xe </a>
                        </li>

                        <li class="<?php echo isset($open) && $open == 'tintuc' ? 'active' : '' ?>">
                            <a href="<?php echo modules("tintuc") ?>"><i class="fa fa-newspaper-o"></i>  Quản lý tin tức </a>
                        </li>

                        <li class="<?php echo isset($open) && $open == 'feedback' ? 'active' : '' ?>">
                            <a href="<?php echo modules("feedback") ?>"><i class="fa fa-comments"></i>  Quản lý feedback </a>
                        </li>

                        <li class="<?php echo isset($open) && $open == 'lienhe' ? 'active' : '' ?>">
                            <a href="<?php echo modules("lienhe") ?>"><i class="fa fa-phone"></i>  Quản lý liên hệ </a>
                        </li>

                        <li class="<?php echo isset($open) && $open == 'trangtinh' ? 'active' : '' ?>">
                            <a href="<?php echo modules("trangtinh") ?>"><i class="fa fa-book"></i>  Quản lý trang tĩnh </a>
                        </li>

                        <li class="<?php echo isset($open) && $open == 'donhang' ? 'active' : '' ?>">
                            <a href="<?php echo modules("donhang") ?>"><i class="fa fa-shopping-cart"></i>  Quản lý đơn hàng </a>
                        </li>

                        <li class="<?php echo isset($open) && $open == 'user' ? 'active' : '' ?>">
                            <a href="<?php echo modules("user") ?>"><i class="fa fa-users"></i> Quản lý khách hàng </a>
                        </li>

                        <li class="<?php echo isset($open) && $open == 'admin' ? 'active' : '' ?>">
                            <a href="<?php echo modules("admin") ?>"><i class="fa fa-user"></i>  Quản lý Admin - Nhân viên </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">