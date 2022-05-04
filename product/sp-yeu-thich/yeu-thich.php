<?php 

	require_once __DIR__. "/../autoload/autoload.php";
    
    $sum = 0;
    
    if( ! isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
    {
        echo "<script>alert(' Không có sản phẩm trong sản phẩm yêu thích !!! ');location.href='/damme/index.php'</script>";
    }
    
?>
<?php require_once __DIR__. "/../layouts/header.php";  ?>
<div class="bg-1" style="background-color: #ffffff;">
  <div class="container">
    <div class="row">
      <h3 class="text-center" style="font-size: 28px;letter-spacing: 1px; color: red;margin-top: 50px;"> SẢN PHẨM YÊU THÍCH </h3>
      <p style="text-align: center;margin-bottom:20px"><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
    </div>
  </div>
</div>

	<div id="wrapper">
        <div id="maincontent" style="margin-top: 10px;">
                <div class="container" style="margin-bottom: 20px;">
                    <div class="col-md-12 bor" style="padding-bottom: 20px;margin-bottom: 50px;border-radius: 8px;">
				        <section class="box-main1">
				            <h3 class="title-main"  style="text-align: center;margin-top: -10px;" ><a href="" style="font-size: 16pt;"> Sản phẩm yêu thích của bạn </a> </h3>
				            <table class="table table-hover" id="shoppingcart_info">
				            	<thead>
				            		<tr>
				            			<th style="font-size: 12pt;font-weight: bold;">STT</th>
				            			<th style="font-size: 12pt;font-weight: bold;">Tên sản phẩm</th>
				            			<th style="font-size: 12pt;font-weight: bold;">Hình ảnh</th>
				            			<th style="font-size: 12pt;font-weight: bold;">Giá xe</th>
				            			<th style="font-size: 12pt;font-weight: bold;">Thao tác</th>
				            		</tr>
				            	</thead>
				            	<tbody>
				            		<?php $stt = 1; foreach($_SESSION['cart'] as $key => $value): ?>
				                		<tr>
				                			<td style="padding-top: 30px;font-size: 11pt;"><?php echo $stt ?></td>
				                			<td style="padding-top: 30px;font-size: 11pt;"><?php echo $value['name'] ?></td>
				                			<td>
				                				<img src="<?php echo uploads() ?>product/<?php echo $value['thunbar'] ?>" width="95px" height="60px">
				                			</td>
				                			<td style="padding-top: 30px;font-size:10pt;">
				                				<?php if($value['sale'] > 0): ?> 
                                                    <?php echo formatpricesale($value['price'], $value['sale']) ?>
                                                <?php else : ?>
                                                    <?php echo formatPrice($value['price']) ?>
                                                <?php endif; ?>
				                			</td>
				                			<td style="padding-top: 25px">
				                                <style type="text/css">
				                                    .btn-danger{
				                                        padding: 2px 8px;
				                                        background-color: #CD5C5C;
				                                        color: #ffffff;
				                                        border-radius: 5px;
				                                        transition: .2s;
				                                        height: 25px;
				                                        font-size: 10pt;
				                                    }

				                                    .btn-danger:hover {
				                                        border: 1px solid #333;
				                                        background-color: #FF0000;
				                                        color: #ffffff;
				                                    }
                                                    .btn-info{
				                                        padding: 2px 8px;
				                                        background-color: #00BFFF;
				                                        color: #ffffff;
				                                        border-radius: 5px;
				                                        transition: .2s;
				                                        height: 25px;
				                                        font-size: 10pt;
				                                    }

				                                    .btn-info:hover {
				                                        border: 1px solid #333;
				                                        background-color: #1E90FF;
				                                        color: #ffffff;
				                                    }
				                                </style>
                                                <a href="xoa-yeu-thich.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Xoá</a>
                                                <a href="/damme/product/chi-tiet-sp.php?id=<?php echo $key ?>" class="btn btn-xs btn-info" ><i class="fa fa-refresh"></i> Chi tiết </a>
				                			</td>
				                		</tr>
				                	<?php $stt++; endforeach ?>
				            	</tbody>
				            </table>  
				        </section>
				    </div>
<?php require_once __DIR__. "/../layouts/footer.php";  ?>