<?php 

	require_once __DIR__. "/../autoload/autoload.php";
    
    $sum = 0;
    
    if( ! isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
    {
        echo "<script>alert(' Không có sản phẩm trong giỏ hàng ');location.href='/damme/index.php'</script>";
    }
    
?>
<?php require_once __DIR__. "/../layouts/header.php";  ?>
<div class="bg-1" style="background-color: #ffffff;">
  <div class="container">
    <div class="row">
      <h3 class="text-center" style="font-size: 28px;letter-spacing: 1px; color: red;margin-top: 50px;"> GIỎ HÀNG </h3>
      <p style="text-align: center;margin-bottom:20px"><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
    </div>
  </div>
</div>

	<div id="wrapper">
        <div id="maincontent" style="margin-top: 10px;">
                <div class="container">
                    <div class="col-md-12 bor" style="padding-bottom: 20px;margin-bottom: 50px;border-radius: 8px;">
				        <section class="box-main1">
				            <h3 class="title-main"  style="text-align: center;margin-top: -10px;" ><a href="" style="font-size: 16pt;"> Giỏ hàng của bạn </a> </h3>
				            <table class="table table-hover" id="shoppingcart_info">
				            	<thead>
				            		<tr>
				            			<th style="font-size: 12pt;font-weight: bold;">STT</th>
				            			<th style="font-size: 12pt;font-weight: bold;">Tên sản phẩm</th>
				            			<th style="font-size: 12pt;font-weight: bold;">Hình ảnh</th>
				            			<th style="font-size: 12pt;font-weight: bold;width: 15%">Số lượng</th>
				            			<th style="font-size: 12pt;font-weight: bold;">Giá</th>
				            			<th style="font-size: 12pt;font-weight: bold;">Tổng tiền</th>
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
				                			<td>
				                				<input type="number" name="qty" value="<?php echo $value['qty'] ?>" class="form-control" id="qty" min="0" style="width: 45%;margin-top: 10px"> 
				                			</td>
				                			<td style="padding-top: 30px">
				                				<?php if($value['sale'] > 0): ?> 
                                                    <?php echo formatpricesale($value['price'], $value['sale']) ?>
                                                <?php else : ?>
                                                    <?php echo formatPrice($value['price']) ?></b>
                                                <?php endif; ?>
				                			</td>
				                			<td style="padding-top: 30px">
				                				
				                					<?php echo formatPrice($value['price'] * $value['qty']) ?>
				                				
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
				                				<a href="xoa-gio-hang.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Xoá</a>
				                				<a href="#" class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?> ><i class="fa fa-refresh"></i> Cập nhật</a>
				                			</td>
				                		</tr>
				                		<?php $sum += $value['price'] * $value['qty']; $_SESSION['tongtien'] = $sum ; ?>
				                	<?php $stt++; endforeach ?>
				            	</tbody>
				            </table>

				            <div class="col-md-5 pull-right">
				            	<ul class="list-group">
				            		<li class="list-group-item">
				            			<h3 style="font-size: 20pt;letter-spacing: 0px">Thông tin đơn hàng</h3>
				            		</li>
				            		<li class="list-group-item">
				            			<span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span>
				            			Số tiền
				            		</li>
				            		<li class="list-group-item">
				            			<span class="badge">5%</span>
				            			Thuế VAT
				            		</li>

				            		<li class="list-group-item">
				            			<span class="badge"><?php $_SESSION['total'] = $_SESSION['tongtien'] * 105/100 ; echo formatPrice($_SESSION['total']) ?></span>
				            			Tổng tiền thanh toán
				            		</li>

				            		<li class="list-group-item">
				                        <style type="text/css">
				                            li .btn-success {
				                                padding: 4px 10px;
				                                border-radius: 5px;
				                                background-color: #5cb85c;
				                                transition: .2s;
				                                height: 30px;
				                                font-size: 11pt;
				                            }

				                            li .btn-success:hover {
				                                border: 1px solid #333;
				                                background-color: #449d44;
				                                border-color: #4cae4c;
				                            }
				                            
				                        </style>
				            			<a href="/damme/index.php" class="btn btn-success">Tiếp tục mua hàng</a>
				            			<a href="/damme/product/thanhtoan.php" class="btn btn-success">Thanh toán</a>
				            		</li>
				            	</ul>
				            </div>   
				        </section>
				    </div>
<?php require_once __DIR__. "/../layouts/footer.php";  ?>