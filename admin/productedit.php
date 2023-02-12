<?php
    include "header.php";
    include "class/product_class.php"
?>
<?php
$product = new product;
if (!isset($_GET['product_id']) || $_GET['product_id'] == NULL) {
    echo "<script>window.location = 'productlist.php'</script>";
} else {
    $product_id = $_GET['product_id'];
}
$get_product =  $product->get_product($product_id);
if ($get_product) {
    $result = $get_product->fetch_assoc();
}
?>


<?php
$product = new product;
$product_id = $_GET['product_id'];
$get_product = $product->get_product($product_id);
if ($get_product) {
    $resultA = $get_product->fetch_assoc();
}




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $cartegory_id = $_POST['cartegory_id'];
    $product_chatlieu = $_POST['product_chatlieu'];
    $product_xuatxu = $_POST['product_xuatxu'];
    $product_price = $_POST['product_price'];

    if(empty($_FILES['product_img']['name'])){
        $product_img = $result['product_img'];
    }else{
        $product_img = $_FILES['product_img']['name'];
    }
    $update_product = $product->update_product(
        $product_name,
        $product_code,
        $cartegory_id,
        $product_chatlieu,
        $product_xuatxu,
        $product_price,
        $product_img,
        $product_id
    );
}

?>
        <div class="container" style="padding: 50px 0px  50px 0; ">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <h1 class="text-success d-flex justify-content-center align-items-center">CẬP NHẬT SẢN PHẨM</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card py-5" style="background-color: rgb(226,227,229)">
                            <div class="inputs px-4" style="padding: 5px;"> 
                                <span class="text-uppercase">Nhập tên sản phẩm <span style="color: red;">*</span></span> 
                                <input  class="form-control" value="<?php echo $resultA['product_name'] ?>" name="product_name" required type="text" placeholder="Nhap ten san pham"> 
                            </div>

                            <div class="inputs px-4" style="padding: 5px;"> 
                                <span class="text-uppercase">Nhập mã sản phẩm <span style="color: red;">*</span></span> 
                                <input  class="form-control" value="<?php echo $resultA['product_code'] ?>" required type="text" name="product_code"> 
                            </div>

                            <div class="inputs px-4" style="padding: 5px;"> 
                                <span class="text-uppercase">Chọn loại sản phẩm sản phẩm <span style="color: red;">*</span></span> 
                                <select name="cartegory_id" id="">
                                    <option value="#">--Chọn--</option>
                                    <?php
                                    $show_cartegory = $product->show_cartegory();
                                    if ($show_cartegory) {
                                        while ($result = $show_cartegory->fetch_assoc()) {

                                    ?>
                                            <option <?php if ($resultA['cartegory_id'] == $result['cartegory_id']) {
                                                        echo 'SELECTED';
                                                    } ?> value="<?php echo $result['cartegory_id'] ?>"> <?php echo $result['cartegory_name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="inputs px-4" style="padding: 5px;"> 
                                <span class="text-uppercase">Nhập chất liệu sản phẩm <span style="color: red;">*</span></span> 
                                <input  class="form-control" value="<?php echo $resultA['product_chatlieu'] ?>" name="product_chatlieu" required type="text" > 
                            </div>

                            <div class="inputs px-4" style="padding: 5px;"> 
                                <span class="text-uppercase ">Nhập xuất xứ sản phẩm <span style="color: red;">*</span></span> 
                                <input  class="form-control" value="<?php echo $resultA['product_xuatxu'] ?>" name="product_xuatxu" required type="text" > 
                            </div>

                            <div class="inputs px-4" style="padding: 5px;"> 
                                <span class="text-uppercase">Nhập giá sản phẩm <span style="color: red;">*</span></span> 
                                <input  class="form-control" value="<?php echo $resultA['product_price'] ?>" name="product_price" required type="text" > 
                            </div>

                            <div class="inputs px-4" style="padding: 5px;"> 
                                <span class="text-uppercase">Chọn Ảnh <span style="color: red;">*</span></span> 
                                <input  class="form-control" value="<?php echo $resultA['product_img'] ?>" name="product_img"  type="file"> 
                            </div>
                            

                            <div class="inputs px-4" style="padding: 5px"> 
                                <button class="btn btn-danger" type="submit">Cập nhật</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</body>



</html>