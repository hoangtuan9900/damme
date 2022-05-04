<?php

    require_once __DIR__. "/autoload/autoload.php"; 

    $data = 
    [
        'name'     => postInput("name"),
        'email'    => postInput("email"),
        'note'     => postInput("note"),
        'phone'    => postInput("phone")
    ];

    $error = [];
    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        
        if($data['name'] == '') 
        {
            $error['name'] = " Tên không được để trống !";
        }

        if($data['email'] == '') 
        {
            $error['email'] = " Email không được để trống !";
        }
        else
        {
            $is_check = $db->fetchOne("lienhe"," email = '".$data['email']."' ");
            if($is_check != NULL) 
            {
                $error['email'] = " Email đã tồn tại mời quý khách nhập địa chỉ email khác ! ";
            }
        }

        if($data['phone'] == '') 
        {
          $error['phone'] = " Số điện thoại không được để trống !";
        }

        if($data['note'] == '') 
        {
            $error['note'] = " Quý khách vui lòng nhập nội dung !";
        }

        // kiểm tra mảng error

        if(empty($error)) 
        {
            $idinert = $db->insert("lienhe",$data);
            if($idinert > 0) 
            {
                $_SESSION['success'] = " Gửi thành công! Cảm ơn bạn đã liên hệ với chúng tôi!!! ";
                header("location: /damme/index.php");
            }
            else
            {

            }
        }
    } 

  $sqlN = "SELECT * FROM tintuc WHERE 1 ORDER BY ID DESC LIMIT 4";
  $tinNew = $db->fetchsql($sqlN);

?>

<?php require_once __DIR__. "/layouts/header.php";  ?>
<!-- Trang liên hệ -->
	<div class="bg-1" style="background-color: #fdf5e6;"> 	
		<div class="container">
			<div class="row text-center">
				<h3 class="text-center" style="letter-spacing: 2px;color: red;padding-top: 20px;font-size: 24pt;"> ĐỂ LẠI LỜI NHẮN CHO CHÚNG TÔI<br><br> CHÚNG TÔI SẼ LIÊN HỆ LẠI VỚI BẠN SỚM NHẤT</h3>
				<p><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
			</div>
		</div>
	</div><br>
  <style type="text/css">
    .bg-1 .container .col-sm-3 p img {
        transition: all 1s ease;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
    }

    .bg-1 .container .col-sm-3 p img:hover {
        transform: scale(1.07,1.07);
        -webkit-transform: scale(1.07,1.07);
        -moz-transform: scale(1.07,1.07);
        -o-transform: scale(1.07,1.07);
        -ms-transform: scale(1.07,1.07);
    }
</style>
  	<div class="bg-1"> 	
  		<div class="container" style="margin-top: -50px;width: 1420px;">
        <div class="col-md-9 bor" style="padding-bottom: 10px;border-radius: 8px;">
          <section class="box-main1">
              <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 40px">
                  <div class="form-group">
                      <label class="col-md-3 control-label" style="font-size: 12pt;">Họ tên khách hàng:</label>
                      <div class="col-md-8" style="margin-bottom: 15px;">
                          <input type="text" name="name" placeholder="Hoàng Minh Tuấn" class="form-control" value="<?php echo $data['name'] ?>">
                          <?php if(isset($error['name'])): ?>
                              <p class="text-danger"><?php echo $error['name'] ?></p>
                          <?php endif ?>
                      </div>

                      <label class="col-md-3 control-label" style="font-size: 12pt;">Email:</label>
                      <div class="col-md-8" style="margin-bottom: 15px;">
                          <input type="email" name="email" placeholder="****@gmail.com" class="form-control" value="<?php echo $data['email'] ?>">
                          <?php if(isset($error['email'])): ?>
                              <p class="text-danger"><?php echo $error['email'] ?></p>
                          <?php endif ?>
                      </div>

                      <label class="col-md-3 control-label" style="font-size: 12pt;">Số điện thoại:</label>
                      <div class="col-md-8" style="margin-bottom: 15px;">
                          <input type="number" name="phone" placeholder="0334679170" class="form-control" value="<?php echo $data['phone'] ?>">
                          <?php if(isset($error['phone'])): ?>
                              <p class="text-danger"><?php echo $error['phone'] ?></p>
                          <?php endif ?>
                      </div>

                      <label class="col-md-3 control-label" style="font-size: 12pt;">Nội dung:</label>
                      <div class="col-md-8" style="margin-bottom: 15px;">
                        <textarea class="form-control" name="note" rows="4" placeholder="Quý khách vui lòng nhập nội dung" value="<?php echo $data['note'] ?>"></textarea>
                          <?php if(isset($error['note'])): ?>
                              <p class="text-danger"><?php echo $error['note'] ?></p>
                          <?php endif ?>
                      </div>
                  </div>
                  <style type="text/css">
                      .btn-success {
                          padding: 3px 10px;
                          background-color: #5cb85c;
                          border-radius: 5px;
                          transition: .2s;
                          height: 30px;
                          font-size: 12pt;
                      }

                      .btn-success:hover {
                          border: 1px solid #333;
                          background-color: #449d44;
                          border-color: #4cae4c;
                      }
                  </style>
                  <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 15px;margin-top: 12px;">Gửi liên hệ</button>
              </form> 
          </section>
        </div>
        <div class="col-md-3">
            <div class="box-left box-menu">
                <h3 class="box-title" style="margin-top: 0px;margin-bottom: 0px;"><i class="fa fa-warning"></i>  Tin new </h3>
                <ul>
                <?php foreach($tinNew as $item) :?>
                    <li class="clearfix">
                        <a href="<?php echo base_url() ?>noi-dung-tin.php?id=<?php echo $item['id'] ?> ">
                            <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="100" height="90">
                            <div class="info pull-right">
                                <p class="name" style="color: #000000;font-weight: bold;"><?php echo $item['tieude'] ?></p>
                                <b class="price">Lorem ipsum...</b>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
  		</div>
  	</div>

<?php require_once __DIR__. "/layouts/footer.php";  ?>