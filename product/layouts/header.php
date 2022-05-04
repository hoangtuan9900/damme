<!DOCTYPE html>
<html lang="en">
<head>
  <title> MOTORCYCLE : ĐỒ ÁN </title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">

    <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>

    <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
  
      <style>
    body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
    }
    h3, h4 {
      margin: 10px 0 15px 0;
      letter-spacing: 4px;      
      font-size: 29pt;
      color:  #000000;
      font-weight: bold;
    }
    .container {
      padding: 0px;
      width: 1170px;
    }
    .carousel-caption p {
      font-size: 15px;
      color: #ffffff;
      letter-spacing: 1px;
    }
    .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
    }
    .person:hover {
      border-color: #f1f1f1;
    }
    .carousel-inner img {   
      width: 100%; /* Set width to 100% */
      margin: auto;
    }
    .carousel-inner>.item>img {
      display: block;
      max-width: 100%;
      height: 680px;
    }
    .carousel-caption h3 {
      color:  #ffffff !important;
      font-weight: bold;
      font-size: 24px;
    }
    @media (max-width: 600px) {
      .carousel-caption {
        display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
      }
    }
    .bg-1 {
      color: #bdbdbd;
    }
    .bg-1 h3 {color:  #ffffff;}
    .bg-1 p {font-style: italic;}
    .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
    }
    .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    .thumbnail {
      padding: 0 0 10px 0;
      border: none;
      border-radius: 0;
    }
    .thumbnail p {
      margin-top: 15px;
      color: #000000;
    }
    .btn {
      padding: 10px 20px;
      background-color: #FF4500;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
    }
    .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #007fff;
      color: #ffffff;
    }
    .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
    }
    .modal-header, .modal-body {
      padding: 40px 50px;
    }
    .nav-tabs li a {
      color: #777;
    }  
    .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      border: 0;
      font-size: 11px !important;
      opacity: 0.9;
    }
    .navbar li a { 
      color: #ffffff !important;
      font-weight: bold;
      letter-spacing: 1px;
      font-size: 12pt;
    }
    .navbar-nav li a:hover {
      color: #ffffff !important;
      background-color: #ff0000 !important;
    }
    .navbar-nav li.active a {
      color: #ffffff !important;
      background-color: #333333 !important;
    }
    .navbar-default .navbar-toggle {
      border-color: transparent;
    }
    .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
    }
    .dropdown-menu li a {
      color: #000 !important;
      font-size: 10pt;
    }
    .dropdown-menu li a:hover {
      background-color: red !important;
    }
    footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 8px;
    }
    footer a {
      color: #f5f5f5;
    }
    footer a:hover {
      color: #777;
      text-decoration: none;
    }  
    .form-control {
      border-radius: 0;
    }
    textarea {
      resize: none;
    }
    .well ul {
      list-style-type:none;
      margin-left: -30px;
    }
    .well ul li {
      float:left;
      margin-left: 2px;
      margin-right: 8px;
      margin-top: -8px;
    }
    .well ul li a {
      font-weight: bold;
      font-size: 12pt;
    }
    </style>

    <link href="<?php echo base_url() ?>public/frontend/doc/css/ads.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url() ?>public/frontend/doc/js/BannerFloat.js"></script>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<!-- Quảng cáo chạy dọc 2 bên -->
<div class="adfloat" id="divBannerFloatLeft">
   <p><a href="" target="_blank"><img src="<?php echo base_url() ?>public/frontend/images/slide/banner2.png" alt=""></a>
   </p>
</div>
<div class="adfloat" id="divBannerFloatRight">
   <p><a href="" target="_blank"><img src="<?php echo base_url() ?>public/frontend/images/slide/banner2.png" alt=""></a>
   </p>
</div>

<nav class="navbar navbar-default navbar-fixed-top" style="background-color: #191919;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="http://localhost/damme/index.php" style="font-size: 32px; font-weight: bold;color: red;"> MOTORCYCLE </a>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/damme/index.php">Trang chủ </a></li>
        <li><a href="http://localhost/damme/gioithieu.php">Giới thiệu</a></li>
        <li><a href="http://localhost/damme/product/index.php">Sản phẩm</a></li>
        <li><a href="http://localhost/damme/tintuc.php">Tin tức</a></li>
        <li><a href="http://localhost/damme/lienhe.php">Liên hệ</a></li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <style type="text/css">
            .navbar-form {
              border-color: #101010;
            }
            .navbar-form .input-group {
              display: inline-table;
              vertical-align: middle;
            }
            .navbar-form .form-group {
              margin-bottom: 0;
              vertical-align: middle;
            }
            .input-group {
              position: relative;
              display: table;
              border-collapse: separate;
            }
            .navbar-form .input-group>.form-control {
              width: 100%;
            }
            .input-group .form-control:first-child {
              border-top-right-radius: 0;
              border-bottom-right-radius: 0;
            }
            .navbar-form .form-control {
              display: inline-block;
              width: auto;
              vertical-align: middle;
            }
            .input-group .form-control {
              position: relative;
              z-index: 2;
              float: left;
              width: 100%;
              margin-bottom: 0;
            }
            .form-control {
              display: block;
              width: 100%;
              height: 34px;
              padding: 6px 12px;
              font-size: 14px;
              line-height: 1.42857143;
              color: #555;
              background-color: #fff;
              background-image: none;
              border: 1px solid #ccc;
              border-radius: 4px;
              -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
              box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
              -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
              -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
              -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
              transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
              transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
              transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
            }
            input {
              font-family: inherit;
              font-size: inherit;
              line-height: inherit;
              font: inherit;
              margin: 0;
              -webkit-writing-mode: horizontal-tb !important;
              text-rendering: auto;
              color: -internal-light-dark-color(black, white);
              letter-spacing: normal;
              word-spacing: normal;
              text-transform: none;
              text-indent: 0px;
              text-shadow: none;
              display: inline-block;
              text-align: start;
              -webkit-appearance: textfield;
              background-color: -internal-light-dark-color(white, black);
              -webkit-rtl-ordering: logical;
              cursor: text;
              margin: 0em;
              font: 400 13.3333px Arial;
              padding: 1px 0px;
              border-width: 2px;
              border-style: inset;
              border-color: initial;
              border-image: initial;
            }
            .navbar-form .input-group .input-group-btn {
              width: auto;
            }
            .navbar-form .input-group .input-group-btn {
              position: relative;
              font-size: 0;
              white-space: nowrap;
              vertical-align: middle;
              display: table-cell;
            }
            .input-group-btn:last-child>.btn {
              z-index: 2;
              margin-left: -1px;
              border-top-left-radius: 0;
              border-bottom-left-radius: 0;
            }
            .input-group-btn>.btn {
              position: relative;
            }
            .btn-default {
              color: #333;
              background-color: #fff;
              border-color: #ccc;
            }
            .input-group-btn .btn {
              display: inline-block;
              margin-bottom: 0;
              font-weight: 400;
              text-align: center;
              white-space: nowrap;
              vertical-align: middle;
              -ms-touch-action: manipulation;
              touch-action: manipulation;
              cursor: pointer;
              background-image: none;
              border: 1px solid transparent;
              padding: 6px 12px;
              font-size: 14px;
              line-height: 1.42857143;
              border-radius: 4px;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
            }
            button {
              font-family: inherit;
              font-size: inherit;
              line-height: inherit;
              -webkit-appearance: button;
              text-transform: none;
              overflow: visible;
              font: inherit;
              margin: 0;
            }
          </style>
          <form class="navbar-form nav navbar-nav navbar-right" role="search" action="http://localhost/damme/product/index.php" method="GET">
            <div class="form-group input-group">
              <input type="text" class="form-control" placeholder="Search.." name="keyword">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </span>        
            </div>
          </form>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user-circle" style="color: #ffffff;"></i> Tài khoản
          <span class="caret"></span></a>
          <ul class="dropdown-menu">

            <li><a href="<?php echo base_url() ?>user/thanhvien.php?id=<?php echo $_SESSION['name_id'] ?>" style="letter-spacing: 2px;font-size: 12pt;"><span class="glyphicon glyphicon-user"></span> Thành viên </a></li>
            
            <li><a href="<?php echo base_url() ?>account/dang-nhap.php" style="letter-spacing: 2px;font-size: 12pt;"><i class="fa fa-unlock-alt"></i> Đăng nhập </a></li>
            
            <li><a href="<?php echo base_url() ?>account/dang-ki.php" style="letter-spacing: 2px;font-size: 12pt;"><i class="fa fa-user-plus"></i> Đăng ký </a></li>
            
            <li><a href="<?php echo base_url() ?>/product/shoppingcart/gio-hang.php" style="letter-spacing: 2px;font-size: 12pt;"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng</a></li>

            <li><a href="<?php echo base_url() ?>/product/sp-yeu-thich/yeu-thich.php" style="letter-spacing: 2px;font-size: 12pt;"><i class="fa fa-heart"></i> Sản phẩm love</a></li>
            
            <li><a href="<?php echo base_url() ?>account/dang-xuat.php" style="letter-spacing: 2px;font-size: 12pt;"><i class="fa fa-sign-out"></i> Đăng xuất </a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Trang Chủ Banner chạy ngang-->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?php echo base_url() ?>public/frontend/banner/banner2.jpg" alt="Los Angeles" >       
      </div>

      <div class="item">
        <img src="<?php echo base_url() ?>public/frontend/banner/banner3.jpg" alt="Chicago" >      
      </div>

      <div class="item">
        <img src="<?php echo base_url() ?>public/frontend/banner/banner4.jpg" alt="Chicago" >      
      </div>
    
      <div class="item">
        <img src="<?php echo base_url() ?>public/frontend/banner/banner1.png" alt="Los Angeles">     
      </div>  

      <div class="item">
        <img src="<?php echo base_url() ?>public/frontend/banner/banner7.jpg" alt="Los Angeles">     
      </div>   
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="color: #ffffff"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="color: #ffffff"></span>
      <span class="sr-only">Next</span>
    </a>
</div>




