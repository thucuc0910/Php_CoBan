<?php
    include "header.php";

    include "class/product_class.php"
?>

<?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $product_code = $_POST['keyword'];
            $product = new product;
            $show_product_search = $product ->show_product_search($product_code);
        }
        else{
            $product = new product;
            $show_product = $product ->show_product();
        }
?>

            <div class="admin-content-right text-center" style="width: 100%;   padding: 1rem 9%;">
                <div class="admin-content-right-cartegory-list">
                    <h1 class="text-danger">DANH SÁCH SẢN PHẨM</h1>
                    <button type="button" class="btn btn-primary" style="float:left; margin-top:5px;">
                        <a href="./productadd.php" style=" text-decoration: none; ">
                            <i class="fas fa-plus" style="color:white;"> Thêm sản phẩm</i>
                        </a>                              
                    </button>
                    <form action="" class="search-form" method="POST"
                        style="float: right; border: 1px solid rgb(13,110,253); padding: 0px; border-radius: 5px">
                        <input type="text" name="keyword" required="" placeholder="  Tìm kiếm..."  >
                        <button class="btn btn-primary"  name=" search_name" type="submit">Search</button>
                    </form>
                    <table class="table table-secondary" style="    margin-top: 70px;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Chất liệu sản phẩm</th>
                                <th>Xuất xứ</th>
                                <th>Giá sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        

                        <tbody >
                            <?php
                                if (isset($_POST['search_name'])) { 
                                    $product_code = $_POST['keyword'];
                                    if($show_product_search){$i=0;
                                        while($result = $show_product_search->fetch_assoc()){$i++
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $result['product_id'] ?></td>
                                                <td><?php echo $result['product_code'] ?></td>
                                                <td><?php echo $result['product_name'] ?></td>
                                                <td><?php echo $result['cartegory_id'] ?></td>
                                                <td><?php echo $result['product_chatlieu'] ?></td>
                                                <td><?php echo $result['product_xuatxu'] ?></td>
                                                <td><?php echo number_format($result['product_price']) ?></td>
                                                        
                                                
                                                <td><img src="uploads/<?php echo $result['product_img'] ?>" width="100"></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary">
                                                        <a href="productedit.php?product_id=<?php echo $result['product_id'] ?>">
                                                            <i class="fas fa-edit" style="color:white;"></i>
                                                        </a>
                                                    </button>

                                                    
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">
                                                        <a href="productdelete.php?product_id=<?php echo $result['product_id'] ?>">
                                                            <i class="fas fa-trash" style="color:white;"></i>
                                                        </a>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                        }else{
                                            if($show_product){$i=0;
                                            while($result = $show_product->fetch_assoc()){$i++;      
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $result['product_id'] ?></td>
                                                <td><?php echo $result['product_code'] ?></td>
                                                <td><?php echo $result['product_name'] ?></td>
                                                <td><?php echo $result['cartegory_id'] ?></td>
                                                <td><?php echo $result['product_chatlieu'] ?></td>
                                                <td><?php echo $result['product_xuatxu'] ?></td>
                                                <td><?php echo number_format($result['product_price']) ?></td>
                                                        
                                                
                                                <td><img src="uploads/<?php echo $result['product_img'] ?>" width="100"></td>
                                                
                                                <td>
                                                    <button type="button" class="btn btn-primary">
                                                        <a href="productedit.php?product_id=<?php echo $result['product_id'] ?>">
                                                            <i class="fas fa-edit" style="color:white;"></i>
                                                        </a>
                                                    </button>

                                                    
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">
                                                        <a href="productdelete.php?product_id=<?php echo $result['product_id'] ?>">
                                                            <i class="fas fa-trash" style="color:white;"></i>
                                                        </a>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>      
                        </tbody>
                        
                    </table>
                </div>
            </div>
    
            </section>
    </body>
</html>
    