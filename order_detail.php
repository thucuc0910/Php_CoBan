<?php
    include "./connect.php";
    include "cart_function.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];  
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $order_query = mysqli_query($conn,"SELECT * FROM orders WHERE id = $id");
        $order = mysqli_fetch_assoc($order_query);
        $id_account = $order['id_user'];
        $customer = mysqli_query($conn, "SELECT * FROM users WHERE id = $id_account ");
        $account = mysqli_fetch_assoc($customer);
        
        $product = mysqli_query($conn,"SELECT 
            orders_detail.id_order,
            orders_detail.id_product,
            orders_detail.img,
            orders_detail.size,
            orders_detail.quatity,
            orders_detail.price,
            tbl_product.product_name,
            tbl_product.product_code 
            FROM orders_detail 
            JOIN tbl_product 
            ON orders_detail.id_product=tbl_product.product_id 
            WHERE orders_detail.id_order= $id");
    }
    $total_price=0;
    if(isset($_POST['status'])){
        $status = $_POST['status'];
        mysqli_query($conn,"UPDATE orders SET status='$status' WHERE id=$id");
        header("location: order.php");
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
    </div>

    <div class="container" style="padding-top: 150px;">
        <div class="row">
            <div class="panel ">
                <div class="panel-heading bg-info">
                    <h3 style="font-size: 30px;" class="panel-title text-center">THÔNG TIN ĐƠN HÀNG</h3>
                </div>
                <div class="panel-body text-left " style="font-size:20px">
                    <p>Số điện thoại: <?php echo $order['phone'] ?></p>
                    <p>Địa chỉ: <?php echo $order['adress'] ?></p>
                    <p>Ngày đặt hàng: <?php echo $order['time'] ?></p>
                    <p>Trạng thái đơn hàng: 
                        <?php 
                            if($order['status']==1){?>
                            Chưa xử lý
                        <?php }elseif($order['status']==2){?>
                            Đơn hàng đã được xác nhận
                        <?php }elseif($order['status']==3){?>
                            Đang giao hàng
                        <?php }elseif($order['status']==4){?>
                            Đơn hàng đã được hoàn thành
                        <?php }else{?>
                            Hủy đơn
                        <?php }?>
                    </p>
                </div>
            </div>
            <div class="panel ">
                <div class="panel-heading ">
                    <h3 style="font-size: 25px;"  class="panel-title">Danh sách sản phẩm</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-secondary">
                            <thead> 
                                <tr >
                                    <th>STT</th>
                                    <th>Hình ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Size</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach ($product as $key => $value): 
                                    $total_price += ($value['price']*$value['quatity']);
                                ?>
                                    <tr>
                                        <td><?php echo $key+1 ?></td>
                                        <td><img src="./admin/uploads/<?php echo $value['img']?>" alt="" style="width:100px;"></td>
                                        <td><?php echo $value['product_name'] ?></td>
                                        <td><?php echo $value['size'] ?></td>
                                        <td><?php echo $value['product_code'] ?></td>
                                        <td><?php echo $value['quatity'] ?></td>
                                        <td><?php echo number_format($value['price']) ?></td>
                                    </tr>
                                <?php endforeach ?>
                                <tr style="background-color: gainsboro">
                                    <td style="font-weight: bold;" >Tổng tiền</td>
                                    <td colspan="7" class="text-center " style="font-weight: bold; color:red;"><?php echo number_format($total_price)?>VNĐ</td>
                                </tr>
                            </tbody>    
                        </table>
                    </div>

                    <form action="" method="POST" class="form-inline" role="form">
                        <?php if($order['status']==1){ ?> 
                            <div class="form-group " style="font-size:20px;">
                                <label for="" class="sr-only" >Trạng thái</label>
                                <button name="status" id="input"  required="required" style="margin-top: 10px;" value="5" type="submit" class="btn btn-primary">HỦY ĐƠN</button>
                                
                            </div>                    
                        <?php } ?>
                        <?php if($order['status']==3){ ?> 
                            <div class="form-group " style="font-size:20px;">
                                <label for="" class="sr-only" >Trạng thái</label>
                                <button name="status" id="input"  required="required" style="margin-top: 10px;" value="4" type="submit" class="btn btn-primary">ĐÃ NHẬN ĐƯỢC HÀNG</button>                 
                            </div>
                            
                        <?php } ?>
                    </form>
                </div>
            </div>  
        </div>
    </div>
    <?php include("inc/footer.php") ?>    
    <script src="js/test.js"></script>                  
</body>
</html>
