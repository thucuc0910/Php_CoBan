<?php
    include "header.php";
    include "class/cartegory_class.php"
?>
<?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cartegory_name = $_POST['keyword'];
            $cartegory = new cartegory;
            $show_cartegory_search = $cartegory ->show_cartegogy_search($cartegory_name);
        }
        else{
            $cartegory = new cartegory;
            $show_cartegory = $cartegory ->show_cartegory();
        }
?>


            <div class="admin-content-right text-center" style="width: 100%; padding: 1rem 9%;">
                <div class="admin-content-right-cartegory-list">
                    <h1 class="text-danger">DANH SÁCH LOẠI SẢN PHẨM</h1>
                    <button type="button" class="btn btn-primary" style="float:left; margin-top:5px;">
                        <a href="./cartegoryadd.php" style=" text-decoration: none; ">
                            <i class="fas fa-plus" style="color:white;"> Thêm loại sản phẩm</i>
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
                                <th>Danh mục</th>
                                <th>Tùy biến</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($_POST['search_name'])) { 
                                    $cartegory_name = $_POST['keyword'];
                                    if($show_cartegory_search){$i=0;
                                        while($result = $show_cartegory_search->fetch_assoc()){$i++
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $result['cartegory_id'] ?></td>
                                                <td><?php echo $result['cartegory_name'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary">
                                                        <a href="cartegoryedit.php?cartegory_id=<?php echo $result['cartegory_id'] ?>">
                                                            <i class="fas fa-edit" style="color:white;"></i>
                                                        </a>
                                                    </button>
                                                    
                                                    <button type="button" class="btn btn-danger">
                                                        <a href="cartegorydelete.php?cartegory_id=<?php echo $result['cartegory_id'] ?>">
                                                            <i class="fas fa-trash" style="color:white;"></i>
                                                        </a>
                                                    </button>
                                                    
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                        }else{
                                            if($show_cartegory){$i=0;
                                            while($result = $show_cartegory->fetch_assoc()){$i++;      
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $result['cartegory_id'] ?></td>
                                                <td><?php echo $result['cartegory_name'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary">
                                                        <a href="cartegoryedit.php?cartegory_id=<?php echo $result['cartegory_id'] ?>">
                                                            <i class="fas fa-edit" style="color:white;"></i>
                                                        </a>
                                                    </button>
                                                    
                                                    <button type="button" class="btn btn-danger">
                                                        <a href="cartegorydelete.php?cartegory_id=<?php echo $result['cartegory_id'] ?>">
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