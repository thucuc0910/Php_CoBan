<?php
    include "./connect.php";
    $err = [];
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rPassword = $_POST['rPassword'];
        if(empty($name)){
            $err['name'] = 'Bạn chưa nhập tên';
        }
        if(empty($email)){
            $err['email'] = 'Bạn chưa nhập email';
        }
        if(empty($password)){
            $err['password'] = 'Bạn chưa nhập mật khẩu';
        }
        if($password != $rPassword){
            $err['rPassword'] = 'Mật khẩu nhập lại không đúng';
        }
        if(empty($err)){
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$pass')";
            $query = mysqli_query($conn,$sql);
            if($query){
                header('location: login.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Trang chủ</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="
        sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <style>
            .has-error{
                color: red;
            }
        </style>
    </head>
<body> 
<div class="container">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="" method="POST" role="form">
                <div class="modal-header text-center d-block">
                    <h2 class="modal-title">
                        <i class="fas fa-lock"></i> Đăng kí
                    </h2>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="usernameInput">
                                <b><i class="fas fa-user"></i> Tên người dùng:</b>
                            </label>
                            <input type="text" class="form-control" id="" placeholder="Nhập tên" name="name">
                            <div class="has-error">
                                <span><?php echo (isset($err['name']))?$err['name']:'' ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập email" name="email">
                            <div class="has-error">
                                <span><?php echo (isset($err['email']))?$err['email']:'' ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="passwordInput">
                                <b><i class="fas fa-eye"></i> Mật khẩu:</b>
                            </label>
                            <input type="password" class="form-control" id="" placeholder="Nhập mật khẩu"
                                name="password">
                            <div class="has-error">
                                <span><?php echo (isset($err['password']))?$err['password']:'' ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" id="" placeholder="Nhập lại mật khẩu" name="rPassword">
                            <div class="has-error">
                                <span><?php echo (isset($err['rPassword']))?$err['rPassword']:'' ?></span>
                            </div>
                        </div>
                        <button class="btn btn-success btn-block">
                            <i class="fas fa-power-off"></i> Đăng kí
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="index.php" class="btn btn-danger mr-auto" data-dismiss="modal">
                        <i class="fas fa-times"></i> Hủy bỏ
                    </a>
                    <div class="form-group">
                        <div class="text-right">Bạn có phải là thành viên?
                            <a href="login.php">Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>  
</html>