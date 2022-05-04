<?php

    require_once __DIR__. "/autoload/autoload.php";  

  //$sqlNew = "SELECT * FROM tintuc WHERE 1 ORDER BY ID DESC LIMIT 8";
	//$tinNew = $db->fetchsql($sqlNew);
  $id = intval(getInput('id'));
  $tin = $db->fetchID("tintuc",(int)$id);

?>

<?php require_once __DIR__. "/layouts/header.php";  ?>
<!-- Trang nội dung tin tức -->
	<div class="bg-1" style="background-color: #fdf5e6;"> 	
    <div class="container">
      <div class="row text-center">
        <h3 class="text-center" style="letter-spacing: 2px;color: red;padding-top: 20px;"> TIN TỨC </h3>
        <p><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
      </div>
    </div>
  </div><br>
  	<div class="bg-1"> 	
  		<div class="container" style="width: 1525px;margin-top: -50px;margin-left: -18px;">
        <div class="row">
          <div class="col-sm-8" style="margin-top: 60px">
            <h3 class="text-center" style="letter-spacing: 1px;color: red;font-style: italic;font-size: 38pt;"> <?php echo $tin['tieude'] ?></h3><br>
            <img src="<?php echo uploads() ?>product/<?php echo $tin['thunbar'] ?>" alt="Image" width="945" height="585">
            <p style="text-align: center;font-size: 11pt;margin-top: 50px;"><?php echo $tin['noidung'] ?> </p>
          </div>
          <div class="col-sm-4" style="margin-top: -30px">
            <div class="well" style="background-color: #fdf5e6;">
              <p style="font-size: 30pt;font-style: normal;letter-spacing: 1px;text-align: center;font-weight: bold;">Bạn nhất định <br>không thể bỏ qua!!!</p>
            </div>
            <div class="well" style="background-color: #e5e5e5;">
               <p style="font-size: 16pt;font-style: normal;text-align: center;font-weight: bold;color: red;">Những ưu đãi khi đăng ký thành viên</p>
               <p style="text-align: center;margin-top: 10px;"><img src="<?php echo base_url() ?>public/frontend/images/slide/ban.jpg" alt="Image" width="220" height="100"></p><br>
               <p style="font-size: 10pt;font-style: normal;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
               <p><a href="<?php echo base_url() ?>account/dang-ki.php" style="font-size: 12pt;font-style: normal;color: red;"> Xem thêm <span class="fa fa-angle-double-right" style="color: red;font-size: 12pt;"></span></a></p>
            </div>
            <div class="well" style="background-color: #e5e5e5;">
              <p style="font-size: 16pt;font-style: normal;text-align: center;font-weight: bold;color: red;">Chương trình nói theo cách nhà thiết kế</p>
              <p style="text-align: center;margin-top: 10px;"><img src="<?php echo base_url() ?>public/frontend/images/slide/ban1.jpg" alt="Image" width="220" height="120"></p><br>
              <p style="font-size: 10pt;font-style: normal;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
               <p><a href="" style="font-size: 12pt;font-style: normal;color: red;"> Xem thêm <span class="fa fa-angle-double-right" style="color: red;font-size: 12pt;"></span></a></p>
            </div>
        </div>
  		</div>
  	</div>

<?php require_once __DIR__. "/layouts/footer.php";  ?>