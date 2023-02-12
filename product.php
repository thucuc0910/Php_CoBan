<?php
    include "./connect.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    $cartegory = mysqli_query($conn, "select * from tbl_cartegory");
    $product = mysqli_query($conn, "select * from tbl_product");
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
    <!-- Slider -->
    <section id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/slider/bia9.webp" class="d-block w-100" alt="..." style=" width:100%; height: 60rem;">
            </div>
            <div class="carousel-item">
                <img src="images/slider/bia1.jpg" class="d-block w-100" alt="..." style="width:100%; height: 60rem;">
            </div>
            <div class="carousel-item">
                <img src="images/slider/bia5.jpg" class="d-block w-100" alt="..." style="width:100%; height: 60rem;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>
    <!-- San phaam -->
    <section class="danhmuc" style="padding-bottom: 0; ">
        <div class="select " style="width: 25rem; ">
            <div class="select_form" aria-label="Default select example" style="padding: 1rem; font-size: 2rem; border: 1px solid black;">     
                <select onchange="location = this.value;" style="width: 23rem;">
                    <option value="product.php" >Tất cả sản phẩm</option>
                    <?php foreach ($cartegory as $key => $value) : 
                        if ($value['cartegory_id'] == $_GET['cartegory_id']) { ?>
                            <option selected value="product_sp.php?cartegory_id=<?php echo $value['cartegory_id'] ?>"><?php echo $value['cartegory_name']?></option>
                        <?php } else { ?>
                            <option value="product_sp.php?cartegory_id=<?php echo $value['cartegory_id'] ?>""><?php echo $value['cartegory_name']?></option>
                        <?php } ?>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
    </section>
    <section class="categories" id="">              
            <div class="box-container">
                <?php foreach ($product as $key => $value) : ?>
                    <div class="box">
                        <a href="productdetail.php?product_id=<?php echo $value['product_id'] ?>"><img src="./admin/uploads/<?php echo $value['product_img']?>" alt=""></a>
                        <h3><?php echo $value['product_name'] ?></h3>
                        <p><?php echo number_format($value['product_price'])  ?><sup>đ</sup></p>
                        <a href="cart.php?product_id=<?php echo $value['product_id'] ?>" &action="add" class="btn-add">Thêm vào giỏ hàng</a>
                    </div>
                <?php endforeach ?>
            </div>
    </section>
    <?php include("./inc/footer.php") ?>
    <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="js/test.js"></script>
</body>

</html>



