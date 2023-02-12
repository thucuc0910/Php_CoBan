<?php
    include "header.php";
    include "../cart_function.php";
    include "class/order_class.php"
?>

<?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['keyword'];
            $a = 1;
            $order = new order;
            $show_order_search3 = $order ->show_order_search3($name);
        }
        else{
            $a = 1;
            $order = new order;
            $show_order3 = $order ->show_order3();
        }
?>

            <div class="admin-content-right text-center" style="width: 100%; padding: 1rem 9%;">
                <div class="admin-content-right-cartegory-list">
                    <h1 class="text-danger">DANH SÁCH ĐƠN HÀNG ĐANG GIAO</h1>
                    <a href="./order.php" style="float:left; text-decoration: none; " class="btn btn-primary">Đơn chờ xử lý</a>
                    <a href="./order_da.php" style="float:left; text-decoration: none; margin-left:5px; " class="btn btn-primary">Đơn đã xử lý</a>
                    <a href="./order_dang.php" style="float:left; text-decoration: none; margin-left:5px;  " class="btn btn-primary">Đơn đang giao</a>
                    <a href="./order_hoan.php" style="float:left; text-decoration: none; margin-left:5px; " class="btn btn-primary">Đơn đã hoàn thành</a>
                    <a href="./order_huy.php" style="float:left; text-decoration: none; margin-left:5px; " class="btn btn-primary">Đơn đã hủy</a>
                    <form action="" class="search-form" method="POST"
                        style="float: right; border: 1px solid rgb(13,110,253); padding: 0px; border-radius: 5px">
                        <input type="text" name="keyword" required="" placeholder="  Tìm kiếm..."  >
                        <button class="btn btn-primary"  name=" search_name" type="submit">Search</button>
                    </form>
                    <table class="table table-secondary" style="    margin-top: 70px;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            if (isset($_POST['search_name'])) { 
                                $name = $_POST['keyword'];
                                if($show_order_search3){
                                    $i=0;
                                        while($result = $show_order_search3->fetch_assoc()){
                                            $i++
                        ?>
                                            <tr>
                                                <td><?php echo $i ++ ?></td>
                                                <td><?php echo $result['id'] ?></td>
                                                <td><?php echo $result['name'] ?></td>
                                                <td><?php echo number_format($result['total_price']) ?></td>
                                                <td><?php echo $result['time'] ?></td>
                                                <td>

                                                    <?php 
                                                        if($result['status']==1){?>
                                                        Chưa xử lý
                                                    <?php }elseif($result['status']==2){?>
                                                        Đã xử lý
                                                    <?php }elseif($result['status']==3){?>
                                                        Đang giao hàng
                                                    <?php }elseif($result['status']==4){?>
                                                        Giao hàng thành công
                                                    <?php }else{?>
                                                        Hủy đơn
                                                    <?php }?>
                                            
                                                </td>
                                                <td><a href="order_detail.php?id=<?php echo $result['id'] ?>">Chi tiết</a></td>
                                            </tr>
                        <?php
                                        }
                                    }
                                }

                            else{
                        if($show_order3){
                            $i=0;

                                    while($result = $show_order3->fetch_assoc()){
                                        $i++;      
                        ?>
                                            <tr>
                                                <td><?php echo $a ++ ?></td>
                                                <td><?php echo $result['id'] ?></td>
                                                <td><?php echo $result['name'] ?></td>
                                                <td><?php echo number_format($result['total_price']) ?></td>
                                                <td><?php echo $result['time'] ?></td>
                                                <td>

                                                    <?php 
                                                        if($result['status']==1){?>
                                                        Chưa xử lý
                                                    <?php }elseif($result['status']==2){?>
                                                        Đã xử lý
                                                    <?php }elseif($result['status']==3){?>
                                                        Đang giao hàng
                                                    <?php }elseif($result['status']==4){?>
                                                        Giao hàng thành công
                                                    <?php }else{?>
                                                        Hủy đơn
                                                    <?php }?>
                                            
                                                </td>
                                                <td><a href="order_detail.php?id=<?php echo $result['id'] ?>">Chi tiết</a></td>
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
    