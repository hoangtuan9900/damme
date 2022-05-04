<?php

    require_once __DIR__. "/autoload/autoload.php";  

  $sqlNew = "SELECT * FROM tintuc WHERE 1 ORDER BY ID DESC LIMIT 8";
	$tinNew = $db->fetchsql($sqlNew);

?>

<?php require_once __DIR__. "/layouts/header.php";  ?>
<!-- Trang tin tức -->
	<div class="bg-1" style="background-color: #fdf5e6;"> 	
		<div class="container">
			<div class="row text-center">
				<h3 class="text-center" style="letter-spacing: 2px;color: red;padding-top: 20px"> TIN TỨC </h3>
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
        transform: scale(1.05,1.05);
        -webkit-transform: scale(1.05,1.05);
        -moz-transform: scale(1.05,1.05);
        -o-transform: scale(1.05,1.05);
        -ms-transform: scale(1.05,1.05);
    }
</style>
  	<div class="bg-1"> 	
  		<div class="container" style="width: 1500px;margin-top: -50px;margin-left: -5px;">
  			<?php foreach($tinNew as $item) :?>
	  			<div class="col-sm-3" style="margin-bottom: 10px;">
	  				<p><img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" alt="Image" width="340" height="185"></p>
	  				<h3 class="text-center" style="letter-spacing: 1px;color: red;font-size: 16pt"> <?php echo $item['tieude'] ?> </h3>
	  				<p style="text-align: center;font-size: 10pt;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut nibh velit...... </p>
	  				<p class="text-center"><a href="noi-dung-tin.php?id=<?php echo $item['id'] ?>" style="font-size: 12pt;font-style: normal;color: red;"> Xem thêm <span class="fa fa-angle-double-right" style="color: red;font-size: 12pt;"></span></a></p>
	  			</div>
	  		<?php endforeach; ?>
  		</div>
  	</div>

<?php require_once __DIR__. "/layouts/footer.php";  ?>