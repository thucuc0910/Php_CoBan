<?php
    include "header.php";
    include "class/product_class.php"
    
?>
<?php 
    $product = new product ;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $insert_product = $product ->insert_product($_POST,$_FILES); 
    }
   
    
?>
                <div class="container" style="padding: 50px 0px  50px 0; ">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <div class="col-md-8">
                            <h1 class="text-success d-flex justify-content-center align-items-center">THÊM SẢN PHẨM</h1>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card py-5" style="background-color: rgb(226,227,229)" >
                                    <div class="inputs px-4" style="padding: 5px;"> 
                                        <span class="text-uppercase">Nhập tên sản phẩm <span style="color: red;">*</span></span> 
                                        <input  class="form-control"  name="product_name" required type="text" placeholder="Nhap ten san pham"> 
                                    </div>

                                    <div class="inputs px-4" style="padding: 5px;"> 
                                        <span class="text-uppercase">Nhập mã sản phẩm <span style="color: red;">*</span></span> 
                                        <input  class="form-control"  required type="text" name="product_code"> 
                                    </div>

                                    <div class="inputs px-4" style="padding: 5px;"> 
                                        <span class="text-uppercase">Chọn loại sản phẩm sản phẩm <span style="color: red;">*</span></span> 
                                        <select  name="cartegory_id" id="">
                                            <option value="#">--Chọn--</option>
                                            <?php 
                                                $show_cartegory = $product -> show_cartegory();
                                                if($show_cartegory){while($result = $show_cartegory ->fetch_assoc()){
                
                                            ?>
                                            <option value="<?php echo $result['cartegory_id'] ?>"> <?php echo $result['cartegory_name'] ?></option>
                                            <?php 
                                                }}
                                            ?>
                                        </select>
                                    </div>

                                    <div class="inputs px-4" style="padding: 5px;"> 
                                        <span class="text-uppercase">Nhập chất liệu sản phẩm <span style="color: red;">*</span></span> 
                                        <input  class="form-control"  name="product_chatlieu" required type="text" > 
                                    </div>

                                    <div class="inputs px-4" style="padding: 5px;"> 
                                        <span class="text-uppercase ">Nhập xuất xứ sản phẩm <span style="color: red;">*</span></span> 
                                        <input  class="form-control"  name="product_xuatxu" required type="text" > 
                                    </div>

                                    <div class="inputs px-4" style="padding: 5px;"> 
                                        <span class="text-uppercase">Nhập giá sản phẩm <span style="color: red;">*</span></span> 
                                        <input  class="form-control"  name="product_price" required type="text" > 
                                    </div>

                                    <div class="inputs px-4" style="padding: 5px;"> 
                                        <span class="text-uppercase">Chọn Ảnh <span style="color: red;">*</span></span> 
                                        <input  class="form-control"  name="product_img"  type="file"> 
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