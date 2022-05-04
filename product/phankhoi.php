
<?php

    require_once __DIR__. "/autoload/autoload.php";  


    $id = intval(getInput('id'));
    $EditCategory = $db->fetchID("phankhoi", $id);

    if(isset($_GET['p']))
    {
        $p = $_GET['p'];
    }
    else
    {
        $p = 1 ;
    }

    $sql = " SELECT * FROM product WHERE phankhoi_id = $id ";

    $total = count($db->fetchsql($sql));

    $product = $db->fetchJones("product",$sql,$total,$p,20,true);

    $sotrang = $product['page'];

    unset($product['page']);

    $path = $_SERVER['SCRIPT_NAME'];


    $sqlp = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 5";
    $pNew = $db->fetchsql($sqlp);

?>
<?php require_once __DIR__. "/layouts/header.php";  ?>
<div class="bg-1" style="background-color: #ffffff;">
  <div class="container">
    <div class="row">
      <h3 class="text-center" style="font-size: 28px;letter-spacing: 1px; color: red;margin-top: 50px;"> XE <?php echo $EditCategory['name'] ?> </h3>
      <p style="text-align: center;margin-bottom:20px"><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
    </div>
  </div>
</div>

<div class="bg-1">
  <div class="container">
    <ul class="nav nav-tabs">
      <li><a href="<?php echo base_url() ?>product/index.php" style="font-size: 13pt;font-weight:bold; ">Tất cả</a></li>
      <li class="dropdown">
        <a data-toggle="dropdown" href="#" style="font-size: 13pt;font-weight:bold;">Xe theo hãng <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <?php foreach($category as $item) :?>
                <li><a href="hang.php?id=<?php echo $item['id'] ?>" style="font-weight: bold;font-size: 11pt;"><?php echo $item['name'] ?></a></li>
            <?php endforeach; ?> 
        </ul>
      </li>

      <li class="dropdown">
        <a data-toggle="dropdown" href="#" style="font-size: 13pt;font-weight:bold; ">Xe theo thể loại <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php foreach($theloai as $item) :?>
                <li><a href="loai.php?id=<?php echo $item['id'] ?>" style="font-weight: bold;font-size: 12pt;"><?php echo $item['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
      </li>
      <li class="dropdown active">
        <a data-toggle="dropdown" href="#" style="font-size: 13pt;font-weight:bold; ">Xe theo phân khúc <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php foreach($phankhoi as $item) :?>
                <li><a href="phankhoi.php?id=<?php echo $item['id'] ?>" style="font-weight: bold;font-size: 13pt;"><?php echo $item['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
      </li>
    </ul>
  </div>
</div>
    <div id="wrapper">
        <div id="maincontent" style="margin-top: 40px;">
                <div class="container">
                    <div class="col-md-3  fixside">
                        <div class="box-left box-menu">
                            <h3 class="box-title" style="margin-top: 0px;margin-bottom: 0px;"><i class="fa fa-list"></i>  Phân khối xe </h3>
                            <ul>
                                <?php foreach($phankhoi as $item) :?>
                                    <li><a href="phankhoi.php?id=<?php echo $item['id'] ?>" style="font-size: 11pt"><?php echo $item['name'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title" style="margin-top: 0px;margin-bottom: 0px;"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                            <ul>
                                <?php foreach($pNew as $item) :?>
                                    <li class="clearfix">
                                        <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                                            <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="100" height="90">
                                            <div class="info pull-right">
                                                <p class="name" style="color: #000000;"><?php echo $item['name'] ?></p>
                                                <?php if($item['sale'] > 0): ?> 
                                                    <b class="price" style="font-size: 10pt"><?php echo formatpricesale($item['price'], $item['sale']) ?>
                                                    </b><br>
                                                  <?php else : ?>
                                                    <b class="price" style="font-size: 10pt"><?php echo formatPrice($item['price']) ?></b><br>
                                                  <?php endif ?>
                                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 1000 </span>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>    
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-9 bor" style="padding-bottom: 15px;">
                        <section class="box-main1">
                            <div class="showitem clearfix">
                                <?php foreach ($product as $item): ?>
                                    <div class="col-md-3 item-product bor">
                                        <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="120" style="margin-top: 2px;">
                                        </a>
                                        <div class="info-item" style="margin-bottom: 10px;">
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
                                            <p><a href="/damme/product/sp-yeu-thich/lovecart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-heart"></i></a></p>
                                            <p><a href="/damme/product/shoppingcart/addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <nav class="text-right">
                                <ul class="pagination">
                                  <?php for($i=1; $i <= $sotrang; $i++) :?>
                                    <li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '' ?>"><a href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i ?>"><?php echo $i ?></a></li>
                                  <?php endfor ; ?>
                                </ul>
                            </nav>
                        </section>
                    </div>

<?php require_once __DIR__. "/layouts/footer.php";  ?>