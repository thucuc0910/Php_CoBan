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
    <!-- Noi dung trang lien he -->
    <section style="padding-top: 150px ;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 box-heading-contact">
                    <div class="box-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.835137968993!2d105.77488461401849!3d10.030459775263022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a088219c9d5185%3A0x154319779a5e0e4!2zUGjhu5EgR2nDoHk!5e0!3m2!1svi!2sus!4v1647272171188!5m2!1svi!2sus"
                            width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12  wrapbox-content-page-contact">
                    <div class="header-page-contact clearfix">
                        <h1>Liên hệ</h1>
                    </div>
                    <div class="box-info-contact">
                        <ul class="list-info">
                            <li>
                                <p>Địa chỉ chúng tôi</p>
                                <p><strong>Khu II, đường 3/2 phường Xuân Khánh, quận Ninh Kiều thành phố Cần Thơ, Việt Nam
                                </strong></p>
                            </li>
                            <li>
                                <p>Email chúng tôi</p>
                                <p><strong>phogiaycantho@gmail.com</strong></p>
                            </li>
                            <li>
                                <p>Điện thoại</p>
                                <p><strong>+84 237 683 252</strong></p>
                                <p><strong>+84 237 683 363</strong></p>
                            </li>
                            <li>
                                <p>Thời gian làm việc</p>
                                <p><strong>Thứ 2 đến Thứ 6 từ 7h đến 17h; Thứ 7 và Chủ nhật từ 10h đến 17h00 </strong></p>
                            </li>
                        </ul>
                    </div>
                    <div class="box-send-contact">
                        <h2>Gửi thắc mắc cho chúng tôi</h2>
                        <div id="col-left contactFormWrapper menuList-links">
                            <form accept-charset="UTF-8" action="/contact" class="contact-form" method="post">
                                <div class="contact-form">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="input-group">
                                                <input required="" type="text" class="form-control" placeholder="Tên của bạn">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="input-group">
                                                <input required="" type="text" class="form-control" placeholder="Email của bạn">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="input-group">
                                                <input required="" type="text" class="form-control" placeholder="Số điện thoại của bạn">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="input-group">
                                                <textarea placeholder="Nội dung"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-secondary btn-lg">Gửi cho chúng tôi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
    <?php include("inc/footer.php") ?>
    <!-- <script src="jquery_321/jquery-3.2.1.min.js"></script> -->
    <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="js/test.js"></script>
</body>  
</html>