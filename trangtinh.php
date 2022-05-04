<?php

    require_once __DIR__. "/autoload/autoload.php";  

    $id = intval(getInput('id'));
    $trangtinh = $db->fetchID("trangtinh",(int)$id);

    $sqlN = "SELECT * FROM tintuc WHERE 1 ORDER BY ID DESC LIMIT 4";
    $tinNew = $db->fetchsql($sqlN);

?>

<?php require_once __DIR__. "/layouts/header.php";  ?>
<!-- Trang nội dung tin tức -->
	<div class="bg-1" style="background-color: #fdf5e6;"> 	
  		<div class="container">
  			<div class="row text-center">
  				<h3 class="text-center" style="letter-spacing: 2px;color: red;padding-top: 20px;"> <?php echo $trangtinh['name']?> </h3>
  				<p><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
  			</div>
  		</div>
  	</div><br>
  	<div class="bg-1"> 	
        <div class="container" style="width: 1420px;margin-top: -50px;margin-left: 80px;">
            <div class="row">
                <style type="text/css">
                    .col-divided {
                        border-right: 1px dotted #ececec;
                    }
                </style>
                <div class="col-sm-8 col-divided" style="margin-top: 20px;">
                    <?php echo $trangtinh['noidung'] ?>
                </div>
                <div class="col-sm-4" style="margin-top: 15px;">
                    <div class="box-menu">
                        <p style="margin-top: 3px;margin-bottom: 5px;margin-left: 10px;color:#000000;font-weight: bold;font-size:16pt;"> Bài viết mới nhất: </p>
                        <ul>
                        <?php foreach($tinNew as $item) :?>
                            <li class="clearfix" style="margin-bottom: 20px;">
                                <a href="<?php echo base_url() ?>noi-dung-tin.php?id=<?php echo $item['id'] ?> ">
                                    <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="100" height="90">
                                    <div class="info pull-left" style="padding-left: 20px;">
                                        <p class="name" style="color: #000000;font-weight: bold;overflow: unset;font-size: 12pt;"><?php echo $item['tieude'] ?></p>
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