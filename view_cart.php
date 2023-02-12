<?php
    include "./connect.php";
    include "./cart_function.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
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
            <!-- <label for="search-box" class="fas fa-search" ></label> -->
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
            <div class="col">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <table class="table table-boredered table-hover">
                            <thead style="background-color: gainsboro">
                                <tr>
                                    <th>STT</th>
                                    <th>Hình ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Size</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>              
                                <?php foreach ($cart as $key => $value): 
                                    $i++;
                                    ?>                                
                                    <tr>                     
                                        <td><?php echo $key++ ?></td>
                                        <td><img src="admin/uploads/<?php echo $value['product_img'] ?>" alt="" style="width:100px;"></td>
                                        <td><?php echo $value['product_name'] ?></td>
                                        <td >
                                            <form action="cart.php">
                                                <input type="hidden" name="action" value="update_size">
                                                <input type="hidden" name="product_id" value="<?php  echo $value['product_id'] ?>">
                                                <input style="border: 1px solid black; width:50px" type="text" name="product_size" value="<?php echo $value['product_size'] ?>">
                                                <button style="border: 1px solid black" type="submit">Cập nhật</button>
                                            </form>        
                                        </td>
                                        <td><?php echo $value['product_code'] ?></td>
                                        <td>
                                            <form  action="cart.php">
                                                <input type="hidden" name="action"  value="update">
                                                <input type="hidden" name="product_id" value="<?php  echo $value['product_id'] ?>">
                                                <input style="border: 1px solid black;width:50px"" type="text" name="quatity" value="<?php echo $value['quatity'] ?>">
                                                <button style="border: 1px solid black"  type="submit">Cập nhật</button>
                                            </form>
                                        </td>
                                        <td><?php echo number_format($value['product_price']) ?></td>
                                        <td><a href="cart.php?product_id=<?php echo $value['product_id'] ?> &action=delete"  title="" class="btn btn-danger">Xóa</a></td>
                                    </tr>
                                <?php endforeach ?>
                                <tr style="background-color: gainsboro">
                                    <td >Tổng tiền</td>
                                    <td colspan="7" class="text-center " style="font-weight: bold;"><?php echo number_format(total_price($cart))   ?>VNĐ</td>
                                </tr>
                            </tbody>
                        </table>

                        <?php  
                             if( $i>0){
                        ?>
                            <a href="checkout.php" class="btn btn-info">Thanh Toán</a>
                        <?php  }  ?> 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("inc/footer.php") ?>
    <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="js/test.js"></script>
</body>  
</html>