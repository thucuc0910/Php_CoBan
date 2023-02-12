<?php
    include "./connect.php";
    include "./cart_function.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];  
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    $id = $_SESSION['user']['id'];
    $product = mysqli_query($conn, "SELECT * FROM orders WHERE id_user = $id ORDER BY id DESC");                  
    $order = mysqli_fetch_assoc($product);
    $i=0;
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
    <!-- Header -->
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
    <div class="container" style="padding-top: 150px;">
        <div class="row">
            <?php
                    if($order<1){
            ?>       
                    <h2>Bạn chưa đặt hàng!</h2>
            <?php }else{?>
            <h1 style="color: blue; font-weight:bold;" class="text-center">DANH SÁCH ĐƠN ĐÃ MUA</h1>
            <table class="table table-secondary" style="    margin-top: 50px;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach ($product as $key => $value ) :?>
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['time'] ?></td>
                            <td><?php echo number_format($value['total_price']) ?></td>
                            <td>
                                <?php 
                                    if($value['status']==1){?>
                                    Chờ xử lý
                                <?php }elseif($value['status']==2){?>
                                    Đơn hàng đã được xác nhận
                                <?php }elseif($value['status']==3){?>
                                    Đang giao hàng
                                <?php }elseif($value['status']==4){?>
                                    Đơn hàng đã được hoàn thành
                                <?php }else{?>
                                    Hủy đơn
                                <?php }?>
                            </td>
                            <td><a href="order_detail.php?id=<?php echo $value['id'] ?>">Chi tiết</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php include("inc/footer.php") ?> 
<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
<script src="js/test.js"></script>

</body>  
</html>