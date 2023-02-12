<?php
include "./connect.php";
$err = [];
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_assoc($query);  
            $checkEmail = mysqli_num_rows($query);
            if ($checkEmail == 1) {
                $checkPass = password_verify($password, $data['password']);
                if ($checkPass and $data["usertype"]=="user"){
                    //luu vao Session
                    $_SESSION['user'] = $data;
                    header('location: index.php');
                } 
                else if ($checkPass and $data["usertype"]=="admin"){
                    $_SESSION['user'] = $data;
                    header('location: admin/productlist.php');
                }
                else{
                    $err['password'] = "Sai mat khau";
                }
            } else {
                $err['email'] = "Email không tồn tại";
            }
            if (empty($email)) {
                $err['email'] = "Ban chua nhap email";
            }
            if (empty($password)) {
                $err['password'] = "Ban chua nhap mat khau";
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
    .has-error {
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
                        <i class="fas fa-lock"></i> Đăng nhập
                    </h2>
                </div>
                <div class="modal-body">
                    <form>
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
                        <button class="btn btn-success btn-block">
                            <i class="fas fa-power-off"></i> Đăng nhập
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="index.php" class="btn btn-danger mr-auto" data-dismiss="modal">
                        <i class="fas fa-times"></i> Hủy bỏ
                    </a>
                    <div class="form-group">
                        <div class="text-right">Bạn không phải là thành viên?
                            <a href="dangki.php">Đăng kí</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="js/test.js"></script>
</body>

</html>