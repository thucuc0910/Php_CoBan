<?php
    include "header.php";
    include "class/cartegory_class.php"
?>

<?php
    $cartegory = new cartegory;
    if ($_SERVER['REQUEST_METHOD']=== 'POST'){
        $cartegory_name = $_POST['cartegory_name'];
        $insert_cartegory = $cartegory ->insert_cartegory($cartegory_name);
    }
?>
                <div class="container" style="padding-top: 50px;">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <div class="col-md-8">
                            <h1 class="text-success d-flex justify-content-center align-items-center">THÊM LOẠI SẢN PHẨM</h1>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card py-5" style="background-color: rgb(226,227,229)">
                                    <div class="inputs px-4" style="padding: 5px;"> 
                                        <span class="text-uppercase">Nhập loại sản phẩm <span style="color: red;">*</span></span> 
                                        <input  class="form-control"  required name="cartegory_name" type="text" placeholder="Nhap ten danh muc"> 
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