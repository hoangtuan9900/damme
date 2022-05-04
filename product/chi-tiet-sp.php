<?php 
    require_once __DIR__. "/autoload/autoload.php";
    

	$id = intval(getInput('id'));
	//chi tiết sản phẩm
    $product = $db->fetchID("product",(int)$id);

    $sqlN = "SELECT * FROM tintuc WHERE 1 ORDER BY ID DESC LIMIT 4";
    $tinNew = $db->fetchsql($sqlN);

    if(isset($_POST['binhluan_submit'])) {
        $binhluan_insert = $db->insert_binhluan();
    }


    if(isset($_GET['page']))
	{
		$p = $_GET['page'];
	}
	else
	{
		$p = 1;
	}
    
    $sql = "SELECT feedback.note, users.name, feedback.sosao, feedback.created_at FROM feedback 
            INNER JOIN product on product.id = feedback.product_id 
            INNER JOIN users on users.id = feedback.users_id
            WHERE $id = feedback.product_id";
    $admin = $db->fetchJone('feedback',$sql,$p,3,true);

    if (isset($admin['page'])) 
    {
    	$sotrang = $admin['page'];
    	unset($admin['page']);
    }
?>
<?php require_once __DIR__. "/layouts/header.php";  ?>
<div class="bg-1" style="background-color: #ffffff;">
  <div class="container">
    <div class="row">
      <h3 class="text-center" style="font-size: 30px;letter-spacing: 1px; color: red;margin-top: 40px;"> CHI TIẾT SẢN PHẨM </h3>
      <p style="text-align: center;margin-bottom:15px"><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
    </div>
  </div>
</div>
<div class="bg-1">
  <div class="container" style="margin-bottom: 40px;">
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
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 13pt;font-weight:bold; ">Xe theo thể loại <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <?php foreach($theloai as $item) :?>
                <li><a href="loai.php?id=<?php echo $item['id'] ?>" style="font-weight: bold;font-size: 12pt;"><?php echo $item['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 13pt;font-weight:bold; ">Xe theo phân khối <span class="caret"></span></a>
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
        <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside">
                        <div class="box-left box-menu">
                            <h3 class="box-title" style="margin-top: 0px;"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                            <ul>
                                <?php foreach($productNew as $item) :?>
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
                    <style type="text/css">
                        .col-md-9 .box-main1 .col-md-7 img {
                            transition: all 1s ease;
                            -webkit-transition: all 1s ease;
                            -moz-transition: all 1s ease;
                            -o-transition: all 1s ease;
                        }

                        .col-md-9 .box-main1 .col-md-7 .bor {
                            border: 0px;
                        }

                        .col-md-9 .box-main1 .col-md-7 img:hover {
                            transform: scale(1.4,1.4);
                            -webkit-transform: scale(1.4,1.4);
                            -moz-transform: scale(1.4,1.4);
                            -o-transform: scale(1.4,1.4);
                            -ms-transform: scale(1.4,1.4);
                        }
                    </style>
                    <div class="col-md-9 bor" style="padding-bottom: 20px;margin-bottom: 30px">
				        <section class="box-main1" >
				            <div class="col-md-7 text-center" style="margin-top: 35px;">
				                <img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="350" data-zoom-image="images/16-270x270.png">
				            </div>
				            <div class="col-md-5 bor" style="margin-top: 35px;padding: 25px;border-radius: 8px;">
				               <ul id="right">
				                    <li><h3 style="letter-spacing: 0px;font-size: 20pt;margin-top: -10pt;"><?php echo $product['name'] ?></h3></li>

				                    <?php if($product['sale'] > 0): ?>
				                    	<li>
                                            <p>
                                                <strike class="sale" style="font-size: 13pt;">Giá gốc: <?php echo formatPrice($product['price']) ?>
                                                </strike> 
                                            </p>
                                            <p>
                                                <b class="price" style="font-size: 13pt;">Giá giảm: <?php echo formatpricesale($product['price'],$product['sale']) ?></b>
                                            </p>
                                        </li>
				                    <?php else : ?>
				                    	<li><p><b class="price" style="font-size: 13pt;">Giá xe: <?php echo formatPrice($product['price']) ?></b></p></li>
				                    <?php endif ?>
				                    
				                    <li><a href="/damme/product/shoppingcart/addcart.php?id=<?php echo $id ?>" class="btn btn-default" style="border-radius:5px;"> <i class="fa fa-shopping-basket"></i>Thêm vào giỏ hàng</a></li>
				               </ul>
				            </div>
                            <style type="text/css">
                                .col-md-9 .box-main1 .col-md-5 .col-md-4 img {
                                    height: 80px;
                                }
                            </style>
                            <div class="col-md-5 text-center" style="float: right;margin-top: 15px;">
                                <div class=" col-md-4 text-center bor clearfix" id="imgdetail" style="border-radius: 5px;margin-left: -15px">
                                    <img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" class="img-responsive pull-left" width="80" onclick="changeImage('one')" id="one">
                                </div>
                                <div class=" col-md-4 text-center bor clearfix" id="imgdetail" style="border-radius: 5px;margin-left: 5px">
                                    <img src="<?php echo uploads() ?>anhcon/<?php echo $product['anh2'] ?>" class="img-responsive pull-left" width="80" onclick="changeImage('two')" id="two">
                                </div> 
                                <div class=" col-md-4 text-center bor clearfix" id="imgdetail" style="border-radius: 5px;margin-left: 5px;">
                                    <img src="<?php echo uploads() ?>anhcon1/<?php echo $product['anh1'] ?>" class="img-responsive pull-left" width="80" onclick="changeImage('three')" id="three">
                                </div><br>
                                <div class=" col-md-4 text-center bor clearfix" id="imgdetail" style="border-radius: 5px;margin-left: -15px;margin-top: 5px;">
                                    <img src="<?php echo uploads() ?>anhcon2/<?php echo $product['anh3'] ?>" class="img-responsive pull-left" width="80" onclick="changeImage('four')" id="four">
                                </div>
                            </div>
                            <script src="/damme/product/jsimg/img.js"></script>
				        </section>
				        <div class="col-md-12" id="tabdetail">
				            <div class="row" style="margin-top: 45px;">      
				                <ul class="nav nav-tabs">
				                    <li class="active"><a data-toggle="tab" href="#home" style="color: #000000;font-size: 10pt;">Thông tin xe </a></li>
				                    
                                    <li><a data-toggle="tab" href="#menu1" style="color: #000000;font-size: 10pt;"> Đánh giá </a></li>
				                </ul>
				                <div class="tab-content">
				                    <div id="home" class="tab-pane fade in active">
				                        <h3 style="letter-spacing: 1px;">Thông tin:</h3><br>
				                        <p style="padding-left: 1.5em; font-size: 13pt;"><?php echo $product['content'] ?></p>
				                    </div>
				                    <div id="menu1" class="tab-pane fade ">
                                        <div>
                                            <label for="comment" style="font-size: 15pt;">Đánh giá bình luận sản phẩm:</label>
                                                <style type="text/css">
                                                    div.stars {
                                                            width: 250px;
                                                            display: inline-block;
                                                        }

                                                        input.star {
                                                            display: none;
                                                        }

                                                        label.star {
                                                            float: right;
                                                            padding: 10px;
                                                            font-size: 30px;
                                                            color: #444;
                                                            transition: all .2s;
                                                        }

                                                        input.star:checked~label.star:before {
                                                            content: '\f005';
                                                            color: #FD4;
                                                            transition: all .25s;
                                                        }

                                                        input.star-5:checked~label.star:before {
                                                            color: #FE7;
                                                            text-shadow: 0 0 20px #952;
                                                        }

                                                        input.star-1:checked~label.star:before {
                                                            color: #F62;
                                                        }

                                                        input.star-2:checked~label.star:before {
                                                            color: #F94;
                                                        }

                                                        input.star-3:checked~label.star:before {
                                                            color: #FA4;
                                                        }

                                                        label.star:hover {
                                                            transform: rotate(10deg) scale(1.3);
                                                        }

                                                        label.star:before {
                                                            content: '\f006';
                                                            font-family: FontAwesome;
                                                        }

                                                    .guiBinhLuan {
                                                        box-sizing: border-box;
                                                        border: 1px solid #cccccc;
                                                        border-radius: 5px;
                                                    }

                                                    #inpBinhLuan {
                                                        box-sizing: border-box;
                                                        border: none;
                                                        display: block;
                                                        font-size: 16px;
                                                        width: 100%;
                                                        padding: 15px 15px;
                                                    }

                                                    #btnBinhLuan {
                                                        display: block;
                                                        width: 100%;
                                                        border: none;
                                                        background-color: #4CAF50;
                                                        color: white;
                                                        font-weight: bold;
                                                        padding: 10px 28px;
                                                        font-size: 16px;
                                                        cursor: pointer;
                                                        text-align: center;
                                                        border-radius: 5px;
                                                    }

                                                    #btnBinhLuan:hover {
                                                        background-color: #4CBF50;
                                                    }
                                                </style>
                                                <div class="">
                                                    <form action="" method="POST">
                                                        <input type="hidden" value="<?php echo $id ?>" name="product_id_binhluan">
                                                        <input type="hidden" value="<?php echo $_SESSION['name_id'] ?>" name="users_id_binhluan">
                                                       <div class="stars">
                                                            <input class="star star-5" id="star-5" value="5" type="radio" name="star"/>
                                                            <label class="star star-5" for="star-5" title="Tuyệt vời"></label>

                                                            <input class="star star-4" id="star-4" value="4" type="radio" name="star"/>
                                                            <label class="star star-4" for="star-4" title="Tốt"></label>

                                                            <input class="star star-3" id="star-3" value="3" type="radio" name="star"/>
                                                            <label class="star star-3" for="star-3" title="Tạm"></label>

                                                            <input class="star star-2" id="star-2" value="2" type="radio" name="star"/>
                                                            <label class="star star-2" for="star-2" title="Khá"></label>

                                                            <input class="star star-1" id="star-1" value="1" type="radio" name="star"/>
                                                            <label class="star star-1" for="star-1" title="Tệ"></label>
                                                        </div>
                                                        <textarea maxlength="250" name="binhluan" id="inpBinhLuan" placeholder="Viết suy nghĩ của bạn về sản phẩm vào đây..."></textarea>
                                                        <input id="btnBinhLuan" type="submit" name="binhluan_submit" value="GỬI BÌNH LUẬN"> 
                                                    </form>
                                                </div><br><br><br>
                                        </div>
                                        <div>
                                            <style type="text/css">
                                                .comment-content {
                                                    max-height: 450px;
                                                    overflow-y: auto;
                                                }
                                                .rating {
                                                    margin: 20px auto;
                                                    width: 100%;
                                                    text-align: center;
                                                }

                                                .rating .fa-star,
                                                .rating .fa-star-o {
                                                    color: #FD4;
                                                    font-size: 24px;
                                                }
                                                .comment-area {
                                                    float: none;
                                                    width: 100%;
                                                }

                                                .comment-area h2 {
                                                    margin: 10px 0 10px 10px;
                                                }

                                                /* Chat comment */
                                                .comment {
                                                    border: 2px solid #dedede;
                                                    background-color: #f1f1f1;
                                                    border-radius: 5px;
                                                    padding: 10px;
                                                    margin: 10px 0;
                                                }
                                                .comment::after {
                                                    content: "";
                                                    clear: both;
                                                    display: table;
                                                }

                                                .comment p {
                                                    /*loat: left;*/
                                                    margin-right: 20px;
                                                }

                                                .comment p i.fa-star {
                                                    color: #FD4;
                                                }
                                            </style>
                                            <label for="comment" style="font-size: 15pt;">Các bài đánh giá mới nhất:</label>
                                            <div class="container-comment">
                                                <div class="comment-content">
                                                    <?php foreach ($admin as $item) :?>
                                                        <div id="comment" style="padding-top:8px;">
                                                            <i class="fa fa-user-circle" style="font-size: 55pt;float: left;margin-right: 20px;"></i>
                                                            <p style="font-size: 13pt; font-weight:bold;text-transform:uppercase;">
                                                                <?php echo $item['name'] ?>
                                                                <span> 
                                                                    <?php
                                                                        if($item['sosao'] == 1) {
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star-o" style="font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star-o" style="font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star-o" style="font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star-o" style="font-size:10pt;"></i>';
                                                                        }else if($item['sosao'] == 2) {
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star-o" style="font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star-o" style="font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star-o" style="font-size:10pt;"></i>';
                                                                        }else if($item['sosao'] == 3) {
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star-o" style="font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star-o" style="font-size:10pt;"></i>';
                                                                        }else if($item['sosao'] == 4) {
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star-o" style="font-size:10pt;"></i>';
                                                                        }else {
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                            echo '<i class="fa fa-star" style="color:#FD4; font-size:10pt;"></i>';
                                                                        }
                                                                    ?>
                                                                </span>
                                                            </p>
                                                            <p style="font-size: 12pt;"><?php echo $item['note'] ?></p>
                                                            <p class="fa fa-clock-o" style="color: #999999;"> <?php echo $item['created_at'] ?></p>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        </div>
				                    </div>
				                </div> 
				            </div>
				        </div>
                    </div>
<?php require_once __DIR__. "/layouts/footer.php";  ?>