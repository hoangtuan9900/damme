<?php

    require_once __DIR__. "/autoload/autoload.php";  

?>

<?php require_once __DIR__. "/layouts/header.php";  ?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Trang Chủ Banner chạy ngang-->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?php echo base_url() ?>public/frontend/banner/banner3.jpg" alt="Los Angeles" >       
      </div>

      <div class="item">
        <img src="<?php echo base_url() ?>public/frontend/banner/banner2.jpg" alt="Chicago" >      
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

<!-- List ra sản phẩm và Các logo hãng xe  -->
<div class="bg-1" style="background-color: #f9f9f9">
  <!-- List ra sản phẩm trưng bày -->
  <div class="container" style="width: 1380px;">
    <div class="row text-center">
        <style type="text/css">
          .btn-primary {
            padding: 3px 18px;
            background-color: #FF4500;
            border-radius: 200px;
            transition: .2s;
            height: 20px;
            font-size: 10pt;
            border-color: #FF4500;
          }

          .btn-primary:hover {
            border: 1px solid #333;
            background-color: #007fff;
            border-color: #007fff;
          }
        </style>  
      <h3 class="text-center" style="font-size: 30px;letter-spacing: 2px; color: red;margin-top: -40px;padding-bottom: 25px;text-decoration: underline;"> DANH MỤC SẢN PHẨM </h3>
      <div>
        <style type="text/css">
          .thumbnail>img {
            display: block;
            max-width: 100%;
            height: 180px; 
          }
          .bg-1 .container .row .col-sm-3 .thumbnail {
            transition: all 1s ease;
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
          }

          .bg-1 .container .row .col-sm-3 .thumbnail:hover {
            transform: scale(1.15,1.15);
            -webkit-transform: scale(1.15,1.15);
            -moz-transform: scale(1.15,1.15);
            -o-transform: scale(1.15,1.15);
            -ms-transform: scale(1.15,1.15);
          }
        </style>
        <?php foreach($productNew as $item) :?>
          <div class="col-sm-3" style="margin-bottom: 10px;">
            <div class="thumbnail">
                <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="400" height="300" style="margin-bottom: 10px">
              <div class="info-item">
                <p><strong style="font-size: 13pt;"><?php echo $item['name'] ?></strong></p>
                <?php if($item['sale'] > 0): ?>
                  <p>
                    <strike class="sale" style="font-size: 12pt;"><?php echo formatPrice($item['price']) ?>
                    </strike>  
                    <b class="price" style="font-size: 12pt;"><?php echo formatpricesale($item['price'], $item['sale']) ?>
                    </b>
                  </p>
                <?php else : ?>
                  <p><b class="price" style="font-size: 12pt;"><?php echo formatPrice($item['price']) ?></b></p>
                <?php endif ?>
              </div>
              <div>
                <a href="<?php echo base_url() ?>product/chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                  <button type="button" class="btn btn-primary" style="height: 38px;"> Xem chi tiết <span class="fa fa-angle-double-right" style="color: #ffffff;font-size: 11pt;"></span> </button>
                </a>                    
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<div class="bg-1" style="background-color: #ffffff;">
  <!-- Logo các Hãng xe -->
  <div class="container-fluid text-center" style="padding-left: 5px;padding-bottom: 50px;">
    <style type="text/css">
      .col-sm-2 {
        width: 11%;
      }
    </style>
    <h3 class="text-center" style="font-size: 32px;letter-spacing: 2px;color: red;margin-top: 35px;text-decoration: underline;margin-bottom: 40px"> THƯƠNG HIỆU HÃNG XE </h3>
    <div class="col-sm-2">
      <a href="http://localhost:8888/damme/product/hang.php?id=10"><img src="<?php echo base_url() ?>public/frontend/images/doitac/img.jpg" width="150px" height="90px" ></a>
    </div>
    <div class="col-sm-2">
      <a href="http://localhost:8888/damme/product/hang.php?id=8"><img src="<?php echo base_url() ?>public/frontend/images/doitac/img1.jpg" width="150px" height="90px" ></a>
    </div>
    <div class="col-sm-2">
      <a href="http://localhost:8888/damme/product/hang.php?id=2"><img src="<?php echo base_url() ?>public/frontend/images/doitac/img2.jpg" width="150px" height="90px" ></a>
    </div>
    <div class="col-sm-2">
      <a href="http://localhost:8888/damme/product/hang.php?id=9"><img src="<?php echo base_url() ?>public/frontend/images/doitac/img3.jpg" width="150px" height="90px" ></a>
    </div>
    <div class="col-sm-2">
      <a href="http://localhost:8888/damme/product/hang.php?id=1"><img src="<?php echo base_url() ?>public/frontend/images/doitac/img4.jpg" width="150px" height="90px" ></a>
    </div>
    <div class="col-sm-2">
      <a href="http://localhost:8888/damme/product/hang.php?id=5"><img src="<?php echo base_url() ?>public/frontend/images/doitac/img5.jpg" width="150px" height="90px" ></a>
    </div>
    <div class="col-sm-2">
      <a href="http://localhost:8888/damme/product/hang.php?id=7"><img src="<?php echo base_url() ?>public/frontend/images/doitac/img6.jpg" width="150px" height="90px" ></a>
    </div>
    <div class="col-sm-2">
      <a href="http://localhost:8888/damme/product/hang.php?id=6"><img src="<?php echo base_url() ?>public/frontend/images/doitac/img7.jpg" width="150px" height="90px" ></a>
    </div>
    <div class="col-sm-2">
      <a href="http://localhost:8888/damme/product/hang.php?id=4"><img src="<?php echo base_url() ?>public/frontend/images/doitac/img8.jpg" width="150px" height="90px" ></a>
    </div>
  </div>
</div>

<!-- Dịch Vụ của MOTORCYCLE-->
<div class="bg-1" style="background-color: #f2f2f2;">
  <div class="container-fluid text-center" style="padding-left: 5px;padding-bottom: 35px;">
    <style type="text/css">
      .bg-1 .container-fluid .col-sm-3 {
        width: 33.3%;
      }
    </style>
    <h3 class="text-center" style="font-size: 32px;letter-spacing: 2px;color: red;margin-top: 40px;margin-bottom: 15px"> DỊCH VỤ CỦA MOTORCYCLE</h3>
    <p style="text-align: center;margin-bottom: 30px"><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
    <div class="col-sm-3">
      <img src="<?php echo base_url() ?>public/frontend/images/dichvu/baotri.jpg" class="" width="240px" height="230px" style="border-radius: 50%; border: 2px solid red;">
      <p style="margin-top: 15px;font-size: 16pt;color: red;letter-spacing: 1px;font-weight: bold;text-align: center;font-style: normal;">BẢO TRÌ</p>
    </div>
    <div class="col-sm-3">
      <img src="<?php echo base_url() ?>public/frontend/images/dichvu/vesinh.jpg" class="" width="240px" height="230px" style="border-radius: 50%; border: 2px solid red;">
      <p style="margin-top: 15px;font-size: 16pt;color: red;letter-spacing: 1px;font-weight: bold;text-align: center;font-style: normal;">VỆ SINH</p>
    </div>
    <div class="col-sm-3">
      <img src="<?php echo base_url() ?>public/frontend/images/dichvu/danhbong.jpg" class="" width="240px" height="230px" style="border-radius: 50%; border: 2px solid red;">
      <p style="margin-top: 15px;font-size: 16pt;color: red;letter-spacing: 1px;font-weight: bold;text-align: center;font-style: normal;">TÂN TRANG</p>
    </div>
  </div>
</div>

<!-- Vì sao nên chọn MOTORCYCLE -->
<div class="bg-1" style="background-color: #2b2b2b;">
  <div class="container-fluid text-center" style="padding-left: 5px;padding-bottom: 35px;">
    <h3 class="text-center" style="font-size: 28px;letter-spacing: 2px;color: #ffffff;margin-top: 45px;margin-bottom: 15px"> 
      TẠI SAO NÊN CHỌN 
      <span style="font-size: 28px;letter-spacing: 2px;color: red;margin-top: 45px;margin-bottom: 45px;font-weight: bold;"> 
        MOTORCYCLE 
      </span>  
    </h3>
    <p style="text-align: center;margin-bottom: 25px"><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
    <div class="col-sm-4">
      <img src="<?php echo base_url() ?>public/frontend/images/moto/khien.png" class="img-circle" width="100px" height="90px">
      <p style="margin-top: 15px;font-size: 16pt;color: #ffffff;letter-spacing: 1px;font-weight: bold;font-style: normal;">Phục hồi và bảo vệ</p><br>
      <p style="font-size: 12pt;color: #ffffff;font-style: normal;">Cerma là công nghệ duy nhất thế giới phục hồi và bảo vệ động cơ với quy trình đơn giản. Công thức độc quyền liên tục tự làm sạch giúp thiết bị vận hành ở mức tối đa.</p>
    </div>
    <div class="col-sm-4">
      <img src="<?php echo base_url() ?>public/frontend/images/moto/khien1.png" class="img-circle" width="100px" height="90px">
      <p style="margin-top: 15px;font-size: 16pt;color: #ffffff;letter-spacing: 1px;font-weight: bold;font-style: normal;">Bảo vệ tài chính</p><br>
      <p style="font-size: 12pt;color: #ffffff;font-style: normal;">Công nghệ Cerma tiết kiệm đáng kể chi phí nhiên liệu, dầu bôi trơn và sữa chữa bảo dưỡng, đặc biệt, thiết bị máy móc luôn hoạt động mà không có thời gian chết, tăng lợi nhuận của doanh nghiệp.</p>
    </div>
    <div class="col-sm-4">
      <img src="<?php echo base_url() ?>public/frontend/images/moto/khien2.png" class="img-circle" width="100px" height="90px">
      <p style="margin-top: 15px;font-size: 16pt;color: #ffffff;letter-spacing: 1px;font-weight: bold;font-style: normal;">Bảo vệ môi trường</p><br>
      <p style="font-size: 12pt;color: #ffffff;font-style: normal;">Công nghệ Cerma tự hào góp phần bảo vệ môi trường khi có khả năng giảm nồng độ khí thải của phương tiện đến 92%. Đó là Cerma, là ước muốn và là sứ mệnh.</p>
    </div>
  </div>
</div>

<?php require_once __DIR__. "/layouts/footer.php";  ?>