<?php
    include "header.php";
    include "../cart_function.php";
?>

<?php 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $order_query = mysqli_query($conn,"SELECT * FROM orders WHERE id = $id");
        $order = mysqli_fetch_assoc($order_query);
        $id_account = $order['id_user'];
        $customer = mysqli_query($conn, "SELECT * FROM users WHERE id = $id_account ");
        $account = mysqli_fetch_assoc($customer);
        
        $product = mysqli_query($conn,"SELECT 
            orders_detail.id_order,
            orders_detail.id_product,
            orders_detail.img,
            orders_detail.size,
            orders_detail.quatity,
            orders_detail.price,
            tbl_product.product_name,
            tbl_product.product_code 
            FROM orders_detail 
            JOIN tbl_product 
            ON orders_detail.id_product=tbl_product.product_id 
            WHERE orders_detail.id_order= $id");
    }
    $total_price=0;
    if(isset($_POST['status'])){
        $status = $_POST['status'];
        mysqli_query($conn,"UPDATE orders SET status='$status' WHERE id=$id");
        header("location: order.php");
    }
?>
    <div class="container" style="padding-left: 20px;">
        <div class="row">
            <div class="panel ">
                <div class="panel-heading bg-info">
                    <h3 class="panel-title text-center">THÔNG TIN ĐƠN HÀNG</h3>
                </div>
                <div class="panel-body text-left ">
                    <p>Tên khách hàng: <?php echo $account['name'] ?></p>
                    <p>Email: <?php echo $account['email'] ?></p>
                    <p>Số điện thoại: <?php echo $order['phone'] ?></p>
                    <p>Địa chỉ: <?php echo $order['adress'] ?></p>
                    <p>Ngày đặt hàng: <?php echo $order['time'] ?></p>
                    <p>Trạng thái đơn hàng: 
                        <?php 
                            if($order['status']==1){?>
                            Chưa xử lý
                        <?php }elseif($order['status']==2){?>
                            Đang xử lý
                        <?php }elseif($order['status']==3){?>
                            Đang giao hàng
                        <?php }elseif($order['status']==4){?>
                            Giao hàng thành công
                        <?php }else{?>
                            Hủy đơn
                        <?php }?>

                    </p>
                </div>
            </div>
            <div class="panel ">
                <div class="panel-heading ">
                    <h3 class="panel-title">Danh sách sản phẩm</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-secondary">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hình ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Size</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    
                                </tr>
                            </thead>   
                            
                            <tbody>
                                <?php foreach ($product as $key => $value): 
                                    $total_price += ($value['price']*$value['quatity']);   
                                ?>
                                    <tr>
                                        <td><?php echo $key+1 ?></td>
                                        <td><img src="../admin/uploads/<?php echo $value['img'] ?>" alt="" style="width:100px;"></td>
                                        <td><?php echo $value['product_name'] ?></td>
                                        <td><?php echo $value['size'] ?></td>
                                        <td><?php echo $value['product_code'] ?></td>
                                        <td><?php echo $value['quatity'] ?></td>
                                        <td><?php echo number_format($value['price']) ?></td>
                                    </tr>
                                <?php endforeach ?>
                                <tr style="background-color: gainsboro">
                                    <td >Tổng tiền</td>
                                    <td colspan="7" class="text-center " style="font-weight: bold;"><?php echo number_format($total_price)?>VNĐ</td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>

                    <form action="" method="POST" class="form-inline" role="form">
                        <?php if($order['status']==1){ ?> 
                            <div class="form-group " style="font-size:20px;">
                                <label for="" class="sr-only" >Trạng thái</label>
                                <button name="status" id="input"  required="required" style="margin-top: 10px;" value="2" type="submit" class="btn btn-primary">ĐƠN ĐÃ XỬ LÍ</button>
                                
                            </div>                    
                        <?php } ?>
                        <?php if($order['status']==2){ ?> 
                            <div class="form-group " style="font-size:20px;">
                                <label for="" class="sr-only" >Trạng thái</label>
                                <button name="status" id="input"  required="required" style="margin-top: 10px;" value="3" type="submit" class="btn btn-primary">ĐƠN ĐANG GIAO</button>                 
                            </div>
                            
                        <?php } ?>
                    </form>
                </div>
            </div>
            
        </div>
    </div>