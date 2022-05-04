<?php 

	require_once __DIR__. "/autoload/autoload.php";  
	unset($_SESSION['cart']);
	unset($_SESSION['total']);
    
?>
<?php require_once __DIR__. "/layouts/header.php";  ?>
<div class="bg-1" style="background-color: #ffffff;">
  <div class="container">
    <div class="row">
      <h3 class="text-center" style="font-size: 32px;letter-spacing: 1px; color: red;margin-top: 50px;"> THÔNG BÁO </h3>
      <p style="text-align: center;margin-bottom:20px"><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
    </div>
  </div>
</div>
<div id="wrapper">
        <div id="maincontent" style="margin-top: -2px;">
                <div class="container" style="padding-bottom: 20px;">
                    <div class="col-md-12 bor" style="padding-bottom: 20px;">
                        <section class="box-main1">
                            <h3 class="title-main"  style="text-align: center;margin-top: 1px;" ><a href="" style="font-size: 17pt;"> Thông báo thanh toán </a> </h3>
                            
                            <?php if(isset($_SESSION['success'])): ?>
                                <div class="alert alert-success">
                                    <strong style="color: #3c763d;">Success!</strong> <?php echo $_SESSION['success'] ;unset($_SESSION['success']) ?>
                                </div>
                            <?php endif ?>
                            <style type="text/css">
                                .btn-success {
                                    padding: 10px 10px;
                                    border-radius: 10px;
                                    background-color: #5cb85c;
                                    transition: .2s;
                                    height: 40px;
                                    font-size: 11pt;
                                }

                                .btn-success:hover {
                                    border: 1px solid #333;
                                    background-color: #449d44;
                                    border-color: #4cae4c;
                                }
                            </style>
                            <a href="/damme/index.php" class="btn btn-success"> Trở về trang chủ</a> 
                        </section>
                    </div>
                </div>
                <div class="container">
                     <div class="col-md-12" style="margin-top: 20px; margin-bottom: 50px;">
                        <h3 class="title-main"><a href="" style="text-align: left;font-size: 17pt;">Sản Phẩm Kèm Theo</a> </h3>
                        <div class="showitem">
                            <?php foreach($productN as $item): ?>
                                <div class="col-md-3 item-product bor" style="width: 20%">
                                    <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" width="100%" height="120" style="margin-top: 1px;">
                                    </a>
                                    <div class="info-item">
                                        <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                        <?php if($item['sale'] > 0): ?> 
                                            <p>
                                                <strike class="sale" style="font-size: 10pt;"><?php echo formatPrice($item['price']) ?>
                                                </strike> 
                                                <b class="price" style="font-size: 10pt"> <?php echo formatpricesale($item['price'], $item['sale']) ?>
                                                </b>
                                            </p><br>
                                        <?php else : ?>
                                            <p><b class="price" style="font-size: 10pt"><?php echo formatPrice($item['price']) ?></b></p><br>
                                        <?php endif ?>
                                    </div>
                                    <div class="hidenitem">
                                        <p><a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                        <p><a href="/damme/product/shoppingcart/addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
               

<?php require_once __DIR__. "/layouts/footer.php";  ?>




                