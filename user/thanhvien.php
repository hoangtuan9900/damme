
<?php

    require_once __DIR__. "/../autoload/autoload.php";


    //kiểm tra đăng nhập lấy id
    $id = intval(getInput('id'));

    $Editusers = $db->fetchID("users", $id);
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $data = 
        [
            "name"    => postInput('name'),
            "email"   => postInput('email'),
            "phone"   => postInput('phone'),
            "address" => postInput('address')
        ];


        $error = [];
        
        if(postInput('name') == '')
        {
            $error['name'] = "Mời bạn nhập đầy đủ họ và tên ";
        }

        if(postInput('email') == '')
        {
            $error['email'] = "Mời bạn nhập email ";
        }
        else
        {
            if(postInput("email") != $Editusers['email'])
            {
                $is_check = $db->fetchOne("users"," email = '".$data['email']."' ");
                if($is_check != NULL) 
                {
                    $error['email'] = " Đã tồn tại đại chỉ email ! ";
                }
            }
        }

        if(postInput('phone') == '')
        {
            $error['phone'] = "Mời bạn nhập số điện thoại ";
        }

        if(postInput('address') == '')
        {
            $error['address'] = "Mời bạn nhập địa chỉ hiện tại  ";
        }
        
        if(postInput('password') != NULL && postInput('re_password') != NULL)
        {
            if(postInput('password') != postInput('re_password')) 
            {
                $error['password'] = " Mật khẩu thay đổi không khớp ";
            }
            else
            {
                $data['password'] = MD5(postInput("password"));
            }
        }
        
        //error trống có nghĩa ko có lỗi
        if(empty($error))
        {

            $id_update = $db->update("users",$data,array("id"=>$id));
            if($id_update > 0) 
            {
                $_SESSION['success'] = " Cập nhật thành công ";
                header("location: /damme/index.php");
            }
            else
            {
                $_SESSION['success'] = " Cập nhật thất bại ";
                header("location: /damme/index.php");
            }

        }
    }
        
?>

<?php require_once __DIR__. "/../layouts/header.php";  ?>
<div class="bg-1" style="background-color: #fdf5e6; "> 	
    <div class="container">
        <div class="row text-center">
            <h3 class="text-center" style="letter-spacing: 2px;color: red;padding-top: 20px"> THÀNH VIÊN </h3>
            <p><img src="<?php echo base_url() ?>public/frontend/images/moto/di.png"></p>
        </div>
    </div>
</div>

<div class="bg-1" style="background-color: #ffffff;">
    
    <div class="container" style="width: 1400px;padding-top: 62px;">
        
        <div class="col-sm-2 fixside well" style="background-color: #fdf5e6;width: 21.5%;margin-left: 12px">
            <div class="well text-center" style="background-color: #fdf5e6;">

                <p style="font-size: 15pt;font-style: normal;font-weight: bold;">Xin chào tài khoản !!!</p>

                <img src="<?php echo base_url() ?>public/frontend/banner/avatar.png" class="img-circle" height="70" width="75" alt="Avatar">

                <p style="font-size: 13pt;font-style: normal;font-weight: bold;margin-top: 5px;"><?php echo $_SESSION['name_user'] ?></p>

            </div>

            <div class="well text-center" style="background-color: #fdf5e6;">
                <a href="<?php echo base_url() ?>user/thanhvien.php?id=<?php echo $_SESSION['name_id'] ?>">
                    <span class="glyphicon glyphicon-user" style="font-size: 34pt;margin-top: 5px;"></span>
                    <p style="font-size: 13pt;font-style: normal;font-weight: bold;">Thông tin tài khoản của bạn</p>
                </a>
            </div>

            <div class="well text-center" style="background-color: #fdf5e6;">
                <a href="<?php echo base_url() ?>user/donhang.php?id=<?php echo $_SESSION['name_id'] ?>">
                    <span class="glyphicon glyphicon-shopping-cart" style="font-size: 34pt;margin-top: 5px;"></span>
                    <p style="font-size: 13pt;font-style: normal;font-weight: bold;">Đơn hàng của bạn</p>
                </a>
            </div>
        </div>

        <div class="col-md-9 bor" style="padding-bottom: 10px;margin-bottom: 20px;border-radius: 8px">
            <section class="box-main1">
                <h3 class="title-main"  style="text-align: left; margin-top: -8px;letter-spacing: 2px;" ><a href="" style="font-size: 16pt;"> Thông tin cá nhân </a></h3>
                <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 30px;margin-bottom: 10px;">
                    <div class="form-group">
                        <label class="col-md-3 control-label" style="font-size: 12pt;">Tên thành viên:</label>
                        <div class="col-md-8" style="margin-bottom: 10px;">
                            <input type="text" name="name" placeholder="Hoàng Minh Tuấn" class="form-control" value="<?php echo $Editusers['name'] ?>">
                            <?php if(isset($error['name'])): ?>
                                <p class="text-danger">
                                    <?php echo $error['name'] ?>
                                </p>
                            <?php endif ?>
                        </div>

                        <label class="col-md-3 control-label" style="font-size: 12pt;">Email:</label>
                        <div class="col-md-8" style="margin-bottom: 15px;">
                            <input type="email" name="email" placeholder="****@gmail.com" class="form-control" value="<?php echo $Editusers['email'] ?>">
                            <?php if(isset($error['email'])): ?>
                                <p class="text-danger">
                                    <?php echo $error['email'] ?>
                                </p>
                            <?php endif ?>
                        </div>

                        <label class="col-md-3 control-label" style="font-size: 12pt;">Password:</label>
                        <div class="col-md-8" style="margin-bottom: 15px;">
                            <input type="password" name="password" placeholder="********" class="form-control" value="<?php echo $Editusers['password'] ?>">
                            <?php if(isset($error['password'])): ?>
                                <p class="text-danger">
                                    <?php echo $error['password'] ?>
                                </p>
                            <?php endif ?>
                        </div>

                        <label class="col-md-3 control-label" style="font-size: 12pt;">ConfigPassword:</label>
                        <div class="col-md-8" style="margin-bottom: 15px;">
                            <input type="password" name="re_password" placeholder="********" class="form-control">
                            <?php if(isset($error['re_password'])): ?>
                                <p class="text-danger">
                                    <?php echo $error['re_password'] ?>
                                </p>
                            <?php endif ?>
                        </div>

                        <label class="col-md-3 control-label" style="font-size: 12pt;">Số điện thoại:</label>
                        <div class="col-md-8" style="margin-bottom: 15px;">
                            <input type="number" name="phone" placeholder="0334679170" class="form-control" value="<?php echo $Editusers['phone'] ?>">
                            <?php if(isset($error['phone'])): ?>
                                <p class="text-danger">
                                    <?php echo $error['phone'] ?>
                                </p>
                            <?php endif ?>
                        </div>

                        <label class="col-md-3 control-label" style="font-size: 12pt;">Địa chỉ:</label>
                        <div class="col-md-8" style="margin-bottom: 10px;">
                            <input type="text" name="address" placeholder="Cầu Giấy - Hà Nội" class="form-control" value="<?php echo $Editusers['address'] ?>">
                            <?php if(isset($error['address'])): ?>
                                <p class="text-danger">
                                    <?php echo $error['address'] ?>
                                </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <style type="text/css">
                        .btn-success {
                            padding: 3px 10px;
                            background-color: #5cb85c;
                            border-radius: 10px;
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
                    <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 15px;margin-top: 12px;"> Thay đổi </button>
                </form> 
            </section>
        </div>
    </div>
    
</div>
    

<?php require_once __DIR__. "/../layouts/footer.php";  ?>