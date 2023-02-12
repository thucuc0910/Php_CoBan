<?php
    include "./connect.php";
    include "./cart_function.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
    } 
    $query = mysqli_query($conn, "SELECT * FROM tbl_product WHERE product_id = $product_id ");
    if($query){
        $product = mysqli_fetch_assoc($query);
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
    <!-- Detail -->
    <section class="product">
        <div class="content">
            <div class="product-content row">
                <form class="product-content row" action="cart.php" method="GET">
                    <div class="product-content-left">
                        <div class="product-content-left-big-img">
                            <img src="./admin/uploads/<?php echo $product['product_img'] ?>" alt="">
                        </div>
                    </div>
                    <div class="product-content-right">
                        <div class="product-content-right-product-name">
                            <h1><?php echo $product['product_name'] ?></h1>
                            <p>MSP: <?php echo $product['product_code'] ?></p>
                        </div>
                        <div class="product-content-right-product-price">
                            <p><?php echo number_format( $product['product_price'] ) ?><sup>đ</sup></p>
                        </div>
           
                        <div class="quatity quantity">
                            <p style="font-weight: bold; font-size: 2rem;">Số Lượng: </p>
                            <input type="number" name="quatity" value="1">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                        </div>

                        <div class="product-content-right-product-button">
                            
                            <button href="cart.php?product_id=<?php echo $product['product_id'] ?>" type="submit" class="btn">Mua</a>
                        </div>
                    </form>
                    <div class="product-content-right-bottom ">
                        
                        <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-content-title">
                                <div class="product-content-right-bottom-content-title-item mo_ta">
                                    <p>Chi tiết sản phẩm</p>
                                </div>
                                <div class="product-content-right-bottom-content-title-item huong_dan">
                                    <p>Hướng dẫn chọn size</p>
                                </div>
                            </div>
                            <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-detail">
                                    <table>
                                        <tr>
                                            <td>Chất liệu</td>
                                            <td><?php echo $product['product_chatlieu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Modal</td>
                                            <td><?php echo $product['product_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Xuất xứ </td>
                                            <td><?php echo $product['product_xuatxu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Hướng dẫn bảo quản</td>
                                            <td>
                                                Tránh mang sản phẩm khi trời mua hoặc thời tiết xấu để tránh bị ướt dẫn đến bị móc. <br>
                                                Cất giữ sản phẩm ở nơi thoáng mát để giữ gìn chất lượng của sản phẩm ở mức tốt nhất. <br>
                                                Lau chùi sản phẩm thường xuyên để tránh bụi.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Chế độ bảo hành</td>
                                            <td>Bảo hành chính hãng 1 tháng theo phiếu bảo hành.</td>
                                        </tr>
                                        <tr>
                                            <td>Quy cách đóng giày</td>
                                            <td>
                                                Giày <br>
                                                Hộp Giày <br>
                                                Túi đựng Giày <br>
                                                Phiếu bảo hành chính hãng
                                            </td>
                                        </tr>
                                    </table>
                                    
                                </div>
                                <div class="product-content-right-bottom-content-detail-size an">
                                    <table>
                                        <tr>
                                            <th>Chiều dài bàn chân (cm)</th>
                                            <th>Size VN</th>
                                            <th>Size US</th>
                                        </tr>
                                        <tr>
                                            <td>22.5</td>
                                            <td>36</td>
                                            <td>3.5</td>
                                        </tr>
                                        <tr>
                                            <td>23</td>
                                            <td>36.5</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>23.5</td>
                                            <td>37</td>
                                            <td>4.5</td>
                                        </tr>
                                        <tr>
                                            <td>24</td>
                                            <td>37.5</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>24.5</td>
                                            <td>37</td>
                                            <td>5.5</td>
                                        </tr>
                                        <tr>
                                            <td>24.7</td>
                                            <td>38.5-39</td>
                                            <td>6</td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td>39.5</td>
                                            <td>6.5</td>
                                        </tr>
                                        <tr>
                                            <td>25.5</td>
                                            <td>40</td>
                                            <td>7</td>
                                        </tr>
                                        <tr>
                                            <td>26</td>
                                            <td>40.5-41</td>
                                            <td>7.5</td>
                                        </tr>
                                        <tr>
                                            <td>26.5</td>
                                            <td>41.5</td>
                                            <td>8</td>
                                        </tr>
                                        <tr>
                                            <td>27</td>
                                            <td>42</td>
                                            <td>8.5</td>
                                        </tr>
                                        <tr>
                                            <td>27.5</td>
                                            <td>42.5</td>
                                            <td>9</td>
                                        </tr>
                                        <tr>
                                            <td>28</td>
                                            <td>43</td>
                                            <td>9.5</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include("inc/footer.php") ?>
    
    <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="js/test.js"></script>
</body>  
    <script>     
            const mota = document.querySelector(".mo_ta")
            const huongdan = document.querySelector(".huong_dan")
            if(mota){
                mota.addEventListener("click",function(){
                    document.querySelector(".product-content-right-bottom-content-detail").style.display = "block"
                    document.querySelector(".product-content-right-bottom-content-detail-size").style.display = "none"
                })
            }
            if(huongdan){
                huongdan.addEventListener("click",function(){
                    document.querySelector(".product-content-right-bottom-content-detail").style.display = "none"
                    document.querySelector(".product-content-right-bottom-content-detail-size").style.display = "block"
                })
            }      
    </script>
</html>