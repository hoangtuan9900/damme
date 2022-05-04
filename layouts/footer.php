<!-- Liên hệ và Thông tin cơ sở -->
<div class="bg-1" style="background-image: url('<?php echo base_url() ?>public/frontend/banner/lienhe.jpg');background-size: cover;margin-bottom: -50px;">
  <div class="container" style="width: 1470px;">
    <div class="row text-center" style="margin-top: -50px;">
      <p style="font-size: 24pt;color: red;font-weight: bold;">MOTORCYCLE</p>
      <p style="font-size: 14pt;color: #ffffff;"><span class="glyphicon glyphicon-map-marker" style="color: #ffffff;font-size: 15pt;"></span> Showroom: T3H - Mai Dịch - Hà Nội</p>
      <p style="font-size: 14pt;color: #ffffff;"><span class="glyphicon glyphicon-phone" style="color: #ffffff;font-size: 15pt;"></span> Phone: 0334679170 - 0948563263 </p>
      <p style="font-size: 14pt;color: #ffffff;"><span class="glyphicon glyphicon-envelope" style="color: #ffffff;font-size: 15pt;"></span> Email: motorcycle@gmail.com - hoangtuan3390@gmail.com</p>
    </div><br><br>
    <style type="text/css">
      .row .col-md-3 {
        width: 20%;
      }
      .col-md-3 p {
        color: white;
        font-size: 11pt;
        font-style: normal;
      }
      .col-md-3 p a {
        color: white;
        text-decoration: none;
        font-size: 11pt;
        font-style: normal;
      }
    </style>
    <div class="row">
      <div class="col-md-3">
        <p style="font-weight: bold;font-size: 15pt;">Giờ Làm Việc:</p>
        <p>Sáng: 8h00 đến 11h00p.</p>
        <p>Chiều: 14h00 đến 17h00p.</p>
        <p>Tối: 18h00 đến 21h00p.</p>
      </div>
      <div class="col-md-3">
        <p style="font-weight: bold;font-size: 15pt;">Tài khoản ngân hàng:</p>
        <p>Vietcombank: 0898742645047802</p>
        <p>Techcombank: 0898742645047802</p>
        <p>Agribank: 0898742645047802</p>
      </div>
      <div class="col-md-3"> 
        <p style="font-weight: bold;font-size: 15pt;">Thông tin:</p>
        <p><a href="trangtinh.php?id=5">Tuyển dụng nhân sự.</a></p>
        <p><a href="trangtinh.php?id=4">Tư vấn mua hàng trả góp.</a></p>
        <p><a href="trangtinh.php?id=6">Hệ thống các cửa hàng trên cả nước.</a></p>
      </div>
      <div class="col-md-3"> 
        <p style="font-weight: bold;font-size: 15pt;">Hỗ trợ khách hàng:</p>
        <p>Hỗ trợ online 24/7: 0334 679 170</p>
        <p>Hỗ trợ kỹ thuật: 0334 679 170</p>
        <p>Hỗ trợ bảo hành: 0334 679 170</p>  
      </div>
      <div class="col-md-3"> 
        <p style="font-weight: bold;font-size: 15pt;">Chính Sách:</p>
        <p><a href="trangtinh.php?id=1">Chính sách giao hàng.</a></p>
        <p><a href="trangtinh.php?id=2">Chính sách đổi trả hàng.</a></p>
        <p><a href="trangtinh.php?id=3">Chính sách bảo mật thông tin.</a></p>
      </div>
    </div> 
  </div>
</div>
<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#" data-toggle="tooltip" title="TO TOP" >
    <span class="glyphicon glyphicon-chevron-up" style="color: #ffffff;"></span>
  </a><br>
  <p style="font-size: 11pt;color: #ffffff;"> ĐỒ ÁN...MOTORCYLE © 2020...Nhóm sinh viên: Hoàng Minh Tuấn,  ! ! ! </p> 
</footer>

</body>
</html>
<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })
</script>



