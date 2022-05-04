<?php 

	require_once __DIR__. "/../autoload/autoload.php"; 
    
    // duyệt mảng
    $data = 
    [
        'email'    => postInput("email"),
        'password' => (postInput("password")) 
    ];
    
    // check lỗi 
    $error = [];
    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if($data['email'] == '') 
        {
            $error['email'] = " Email không được để trống ! ";
        }

        if($data['password'] == '') 
        {
            $error['password'] = " Mật khẩu không được để trống ! ";
        }

        if(empty($error)) 
        {
            $is_check = $db->fetchOne("users"," email = '".$data['email']."' AND password = '".md5($data['password'])."' ");

            if($is_check != NULL) 
            {
                $_SESSION['name_user'] = $is_check['name'];
                $_SESSION['name_id'] = $is_check['id'];
                header("location: /damme/index.php");
            }
            else
            {
                // đăng nhập thất bại
                $_SESSION['error'] = " Đăng nhập thất bại ";
            }
        }
    }

?>
<?php require_once __DIR__. "/../layouts/header.php";  ?>
    <!-- banner trang -->
    <div class="bg-1">   
        <img src="<?php echo base_url() ?>public/frontend/banner/banner5.jpg" width="1519" height="500" >
    </div>
    <!-- index form đăng nhập -->
    <div class="bg-1">   
        <div class="container">
            <div class="row text-center">
                <h3 class="text-center" style="letter-spacing: 2px;color: red;margin-top: -40px"> ĐĂNG NHẬP THÀNH VIÊN </h3>
                <p><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
            </div>
        </div>
    </div>
    <div id="wrapper">
        <div id="maincontent" style="margin-top: -125px;">
            <div class="container">
                <div class="col-md-9 bor" style="margin-left: 150px;border-radius: 8px;">
                    <section class="box-main1">
                        <!-- in ra thông báo đăng ký thành công và mời bạn đăng nhập và ngược lại-->
                        <?php if(isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                                <strong style="color: #3c763d;">Success!</strong> <?php echo $_SESSION['success'] ;unset($_SESSION['success']) ?>
                            </div>
                        <?php endif ?>

                        <?php if(isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <strong style="color: red;">Error!</strong> <?php echo $_SESSION['error'] ;unset($_SESSION['error']) ?>
                            </div>
                        <?php endif ?>
                        <!-- from đăng nhập -->
                        <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 50px">
                            <div class="form-group">               
                                <label class="col-md-3 control-label" style="font-size: 12pt;">Email:</label>
                                <div class="col-md-8" style="margin-bottom: 15px;">
                                    <input type="email" name="email" placeholder="*****@gmail.com" class="form-control">
                                    <?php if(isset($error['email'])): ?>
                                        <p class="text-danger"><?php echo $error['email'] ?></p>
                                    <?php endif ?>
                                </div>

                                <label class="col-md-3 control-label" style="font-size: 12pt;">Password:</label>
                                <div class="col-md-8" style="margin-bottom: 10px;">
                                    <input type="password" name="password" placeholder="********" class="form-control">
                                    <?php if(isset($error['password'])): ?>
                                        <p class="text-danger"><?php echo $error['password'] ?></p>
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
                                .col-md-offset-5{
                                    margin-left: 450px;
                                }
                            </style>
                            <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 30px;margin-top: 10px;margin-left: 40%">Đăng nhập</button>
                        </form>
                    </section>
                </div>
            </div>
                    
<?php require_once __DIR__. "/../layouts/footer.php";  ?>




                