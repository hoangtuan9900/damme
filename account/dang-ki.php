<?php 

	require_once __DIR__. "/../autoload/autoload.php";  
    /*
     * kiểm tra xem người dùng đã đăng ký chưa 
     * nếu đã đăng nhập thì không thể vào đây 
     * ngược lại nếu chưa đăng ký thì sẽ cho phép đăng ký
     */
    if(isset($_SESSION['name_id'])) 
    {
        echo "<script>alert(' Bạn đã có tài khoản không thể vào đây ');location.href='/damme/index.php'</script>";
    }

    /*
     *duyệt mảng
     */
    $data = 
    [
        'name'     => postInput("name"),
        'email'    => postInput("email"),
        'password' => (postInput("password")),
        'address'  => postInput("address"),
        'phone'    => postInput("phone")
    ];

    /*
     *check lỗi đăng ký của khách hàng
     */
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
            $is_check = $db->fetchOne("users"," email = '".$data['email']."' ");
            if($is_check != NULL) 
            {
                $error['email'] = " Email đã tồn tại mời bạn nhập địa chỉ email khác ! ";
            }
        }

        if($data['phone'] == '') 
        {
            $error['phone'] = " Số điện thoại không được để trống !";
        }

        if($data['password'] == '') 
        {
            $error['password'] = " Mật khẩu không được để trống !";
        }
        else
        {
            $data['password'] = MD5(postInput("password"));
        }

        if($data['address'] == '') 
        {
            $error['address'] = " Địa chỉ không được để trống !";
        }


        // chuyển về đăng nhập
        if(empty($error)) 
        {
            $idinert = $db->insert("users",$data);
            if($idinert > 0) 
            {
                $_SESSION['success'] = " Đăng kí thành công ! Mời bạn đăng nhập !!! ";
                header("location: /damme/account/dang-nhap.php");
            }
        }
    }

?>
<?php require_once __DIR__. "/../layouts/header.php";  ?>
    <!-- banner trang -->
    <div class="bg-1">   
        <img src="<?php echo base_url() ?>public/frontend/banner/banner5.jpg" width="1519" height="500" >
    </div>
    <!-- phần index đăng ký -->
    <div class="bg-1">   
        <div class="container">
            <div class="row text-center">
                <h3 class="text-center" style="letter-spacing: 2px;color: red;margin-top: -40px"> ĐĂNG KÝ THÀNH VIÊN </h3>
                <p><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
            </div>
        </div>
    </div>
    <div id="wrapper">
        <div id="maincontent">
                <div class="container" style="margin-top: -150px;">
                    <div class="col-md-10 bor" style="margin-left: 110px;border-radius: 8px;">
                        <section class="box-main1">
                            <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 50px">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" style="font-size: 12pt;">Tên thành viên:</label>
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

                                    <label class="col-md-3 control-label" style="font-size: 12pt;">Password:</label>
                                    <div class="col-md-8" style="margin-bottom: 15px;">
                                        <input type="password" name="password" placeholder="********" class="form-control" value="<?php echo $data['password'] ?>">
                                        <?php if(isset($error['password'])): ?>
                                            <p class="text-danger"><?php echo $error['password'] ?></p>
                                        <?php endif ?>
                                    </div>

                                    <label class="col-md-3 control-label" style="font-size: 12pt;">Số điện thoại:</label>
                                    <div class="col-md-8" style="margin-bottom: 15px;">
                                        <input type="number" name="phone" placeholder="09********" class="form-control" value="<?php echo $data['phone'] ?>">
                                        <?php if(isset($error['phone'])): ?>
                                            <p class="text-danger"><?php echo $error['phone'] ?></p>
                                        <?php endif ?>
                                    </div>

                                    <label class="col-md-3 control-label" style="font-size: 12pt;">Địa chỉ:</label>
                                    <div class="col-md-8" style="margin-bottom: 15px;">
                                        <input type="text" name="address" placeholder="...." class="form-control" value="<?php echo $data['address'] ?>">
                                        <?php if(isset($error['address'])): ?>
                                            <p class="text-danger"><?php echo $error['address'] ?></p>
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
                                <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 15px;margin-top: 12px;margin-left: 40%">Đăng ký</button>
                            </form> 
                        </section>
                    </div>
                </div>

<?php require_once __DIR__. "/../layouts/footer.php";  ?>
