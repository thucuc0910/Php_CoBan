<?php
    include "./connect.php";
    include "./cart_function.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    if(isset($_POST['name'])){
        $id_user = $user['id'];
        $phone = $_POST['phone'];
        $adress = $_POST['adress'];
        $status = 1;
        $time = date('Y-m-d H:i:s');
    
        $total_cart =total_price($cart);
        $query = mysqli_query($conn, "INSERT INTO orders(id_user,phone,adress,status,time,total_price) 
            VALUES ('$id_user','$phone','$adress','$status','$time','$total_cart')");

    if($query){
        $id_order = mysqli_insert_id($conn);
        foreach($cart as $value){
            mysqli_query($conn,"INSERT INTO orders_detail(id_order,id_product,img,size,quatity,price) 
            VALUES ('$id_order','$value[product_id]','$value[product_img]','$value[product_size]','$value[quatity]','$value[product_price]')");
        }
        unset($_SESSION['cart']);
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sneaker Store</title>
<script src="https://kit.fontawesome.com/0dc653ea69.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-5.1.3-dist/js/bootstrap.esm.min.js">
</head>
<body>

<div class="header">
    <h1 class="logo">Sneaker Store</h1>
    <nav class="navbar">
        <a href="index.php">Trang Chủ</a>
        <a href="introduce.php">Giới Thiệu</a>
        <a href="product.php">Giày</a>
        <a href="contact.php">Liên Hệ</a>
    </nav>
    <form action="timkiem.php?tukhoa=timkiem" method="POST" class="search-form">
            <input type="text" id="search-box" placeholder="Tìm kiếm ..." name="tukhoa">
            <input type="submit" name="timkiem" for="search-box" value="">    
    </form>

    <div class="rightHeader">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn">
            <span class="mu" ><sup><?php echo count($cart) ?></sup></span>
        </div>
        <div class="fas fa-user nav-item dropdown" id="login-btn" ></div>
            <?php if (isset($user['email'])) {?>
                <form  name="formLogin" method="post" onsubmit="returncheckAccount()" class="login-form" style="font-weight: bold; font-size: 16px; width: 180px; color: red;" >
                        Hello <?php echo $user['name'] ?>!
                        <a class="dropdown-item" href="order.php" style="font-weight: bold;">Đơn hàng</a>
                        <a class="dropdown-item" href="logout.php" style="font-weight: bold;">Đăng xuất</a>
                </form>
            <?php }else {?>
                <form  name="formLogin" method="post" onsubmit="returncheckAccount()" class="login-form" style=" font-size: 16px; width: 180px;">
                        <a class="dropdown-item" href="login.php" style="font-weight: bold;">Đăng nhập</a>
                        <a class="dropdown-item" href="dangki.php" style="font-weight: bold;">Đăng kí</a>
                </form>
            <?php } ?>
    </div>   
</div>
<!--  -->
<?php if(isset($_SESSION['user'])) {?> 
    <form action="" method="post">        
        <div class="container" style="padding-top: 150px;">
            <div class="row">
                <div class="col-lg-7">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <h1 style="color: blue;">Thông Tin Đơn Hàng</h1>
                            <table class="table table-boredered table-hover">
                                <thead style="background-color: gainsboro">
                                    <tr>
                                        <th>Hình ảnh sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Size</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                            
                                    <?php foreach ($cart as $key => $value): ?>
                                        
                                        <tr>
                                            <td><img src="admin/uploads/<?php echo $value['product_img'] ?>" alt="" style="width:100px;"></td>
                                            <td><?php echo $value['product_name'] ?></td>
                                            <td><?php echo $value['product_size'] ?></td>
                                            <td><?php echo $value['quatity'] ?></td>
                                            <td><?php echo number_format($value['product_price']) ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    <tr style="background-color: gainsboro">
                                        <td >Tổng tiền</td>
                                        <td colspan="7" class="text-center " style="font-weight: bold;"><?php echo number_format(total_price($cart))   ?>VNĐ</td>
                                    </tr>
                                </tbody>
                            </table>                       
                        </div>
                    </div>
                </div>
         
                <div class="col-lg-5">
                    <h1 style="color: blue; font-size: 40px;">Thông Tin Khách Hàng</h1>
                    <form>
                        <div class="form-group">
                            <label style="font-size: 20px;" for="">Họ tên</label>
                            <input required="required" value="<?php echo $user['name'] ?>" name="name" style="height:35px; font-size: 15px;" type="text" class="form-control" >              
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px;" for="">Email</label>
                            <input required="required" value="<?php echo $user['email'] ?>" name="email" style="height:35px;font-size: 15px;" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px;" for="">Số điện thoại</label>
                            <input required="required" style="height:35px;font-size: 15px;" type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" >
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px;" for="">Địa chỉ</label>
                            <input required="required" style="height:35px;font-size: 15px;" type="text" name="adress" class="form-control" placeholder="Nhập địa chỉ">
                        </div>
                        <button href="" class="btn btn-info">Thanh Toán</button>
                    </form>      
                </div>            
            </div>
        </div>
    </form>  
<?php }else {?>
    <div class="alert alert-danger" style="margin-top: 160px; font-size:17px;">
        <button  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Vui lòng đăng nhập để mua hàng</strong><a href="login.php?action=checkout" title="">Đăng nhập</a>
    </div>
<?php } ?>

<?php include("inc/footer.php") ?>

<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
<script src="js/test.js"></script>
</body>  
</html>