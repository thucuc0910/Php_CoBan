<?php 
    include "./connect.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
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
    <link rel="stylesheet" href="css/style.css">
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
    <!-- Noi dung trang gioi thieu -->
    <section class="section sec_about" id="section_gt" style="padding-top: 150px;">
        <div class="section-content relative">
            <div class="row align-center">
                <div class="col medium-6 small-12 large-4">
                    <div class="col-inner">
                        <img src="images/slider/bia9.webp" class="d-block w-100" alt="..." style="height: 40rem;">
                    </div>
                </div>
                <div class="col medium-12 small-12 large-8">
                    <div class="col-inner">
                        <h1>GIỚI THIỆU</h1>
                        <p>Cảm ơn bạn đã đến với Snearker Store! Snearker Store kinh doanh các mặt hàng giày dép cho giới trẻ, là cấu nối cho bạn trẻ cả nước tiếp cận với xu hướng thời trang giày trên thế giới. Snearker Store không ngừng đổi mới để
                            mang đến cho các bản trẻ các mẫu giày thời trang độc đáo và mới lạ.</p>
                        <h3 style="padding-top: 20px;">SẢN PHẨM GIÀY TỐT NHẤT</h3>
                        <div class="row row-inner">
                            <div class="col col-left medium-6 small-12 large-6">
                                <div class="col-inner" style="padding-top: 10px;">
                                    <p>Đến với Snearker Store bạn có thể chọn lựa các mẫu mã và các thương hiệu giày nổi tiếng. Chúng tôi luôn đem lại sự mới mẻ và phong cách độc đáo đối với xu hướng giới trẻ hiện nay.</p>
                                </div>
                            </div>
                            <div class="col col-right medium-6 small-12 large-6">
                                <div class="col-inner">
                                    <p>Snearker Store mang đến cho khách hàng sự thoải mái khi mua hàng cùng với sự tư vấn nhiệt tình của các nhân viên. Cảm ơn bạn đã chọn lựa Snearker Store.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section sec_reason" id="section_gt" style="padding-top: 50px;">
        <div class="section-content relative">
            <div class="row">
                <div class="col col-lg-6 col-md-12 col-sm-2">
                    <div class="introduce-main">
                        <h1 class="introduce-heading">MIỄN PHÍ GIAO HÀNG</h1>
                        <div class="introduce-content">
                            <i class="fas fa-solid fa-truck"></i>
                            <p>
                                Sneaker Store hiểu được nhu cầu của quý khách hàng khi mua sắm và đưa ra hình thức giao hàng miễn phí - Free Ship trong nội ô Cần Thơ.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-md-12 col-sm-2">
                    <div class="introduce-main">
                        <h1 class="introduce-heading">ĐỔI TRẢ TRONG VÒNG 7 NGÀY</h1>
                        <div class="introduce-content">
                            <i class="fas fa-solid fa-dollar-sign"></i>
                            <p>
                                Điều kiện để đổi trả hàng: Khách hàng mua hàng của Sneaker Store, còn giữ hóa đơn khi muốn đổi trả hàng thì sản phẩm phải đúng với sản phẩm mà mình đã mua trước đây, sản phẩm không bị trầy sướt và hư hại nhiều chất lượng vẫn còn mới trên 95%).
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-md-12 col-sm-2">
                    <div class="introduce-main">
                        <h1 class="introduce-heading">CHĂM SÓC KHÁCH HÀNG</h1>
                        <div class="introduce-content">
                            <i class="fas fa-solid fa-comment"></i>
                            <p>
                                Sneaker Store có bộ phận chăm sóc khách hàng tốt sẽ luôn sẵn sàng tiếp nhận những yêu cầu, phản hồi của khách hàng. Nhân viên sẽ luôn hoan hỉ, tư vấn nhiệt tình giúp khách hàng yên tâm khi mua hàng.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-md-12 col-sm-2">
                    <div class="introduce-main">
                        <h1 class="introduce-heading">SẢN PHẨM MỚI</h1>
                        <div class="introduce-content">
                            <i class="fas fa-solid fa-calendar-plus"></i>
                            <p>
                                Sneaker Store mang lại các mặt hàng giày dép cho giới trẻ, là cấu nối cho bạn trẻ cả nước tiếp cận với xu hướng thời trang giày trên thế giới. Sneaker Store không ngừng đổi mới để mang đến cho các bản trẻ các mẫu giày thời trang độc đáo và mới lạ.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-md-12 col-sm-2">
                    <div class="introduce-main">
                        <h1 class="introduce-heading">THANH TOÁN</h1>
                        <div class="introduce-content">
                            <i class="fas fa-solid fa-credit-card"></i>
                            <p>
                                Tại đây, khách hàng có thể thanh toán dễ dàng khi mua hàng không chỉ tiền mặt mà còn có thể thông qua các hình thức thanh toán băng ví điện tử khác.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-md-12 col-sm-2">
                    <div class="introduce-main">
                        <h1 class="introduce-heading">HÀNG CHÍNH HÃNG</h1>
                        <div class="introduce-content">
                            <i class="fas fa-solid fa-user-shield"></i>
                            <p>
                                Sneaker Store mang lại các mặt hàng giày dép chính hãng từ các thương hiệu nổi tiếng cho giới trẻ. Sneaker Store không ngừng đổi mới để mang đến cho các bản trẻ các mẫu giày thời trang độc đáo và mới lạ.
                            </p>
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
</html>