<?php
    include "./database.php";

?>

<?php
    class product{
        private $db;

        public function __construct()
        {
            $this -> db = new Database();
        }
        public function show_cartegory(){
            $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
            $result = $this ->db->select($query);
            return $result;
        }

        public function show_product(){
            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC";
            $result = $this ->db->select($query);
            return $result;
        }
        public function insert_product(){
            $product_code = $_POST['product_code'];
            $product_name = $_POST['product_name'];
            $cartegory_id = $_POST['cartegory_id'];
            $product_chatlieu = $_POST['product_chatlieu'];
            $product_xuatxu = $_POST['product_xuatxu'];
            $product_price = $_POST['product_price'];
            $product_img = $_FILES['product_img']['name'];
            move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
                    $query = "INSERT INTO tbl_product(
                        product_code,
                        product_name,
                        cartegory_id,
                        product_chatlieu,
                        product_xuatxu,
                        product_price,
                        product_img) 
                        VALUES (
                            '$product_code',
                            '$product_name',
                            '$cartegory_id',
                            '$product_chatlieu',
                            '$product_xuatxu',
                            '$product_price',
                            '$product_img')";
                    $result = $this ->db->insert($query);
            return $result;
        }
        public function get_product($product_id){
            $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id' ";
            $result = $this ->db->select($query);
            return $result;
        }
        
        public function update_product($product_name, $product_code, $cartegory_id, $product_chatlieu, $product_xuatxu, $product_price, $product_img, $product_id){
            move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
            $query = "UPDATE tbl_product SET 
                product_name = '$product_name', 
                product_code = '$product_code',
                cartegory_id = '$cartegory_id',
                product_chatlieu = '$product_chatlieu',
                product_xuatxu = '$product_xuatxu',
                product_price = '$product_price',
                product_img = '$product_img' 
                WHERE product_id = '$product_id' ";
            $result = $this ->db->update($query);
            header('location:productlist.php');
            return $result;
        }
         
        public function delete_product($product_id){
            $query = "DELETE FROM tbl_product WHERE product_id = '$product_id' ";
            $result = $this ->db->delete($query);
            header('location:productlist.php');
            return $result;
        }

        public function show_product_search($product_code){
            $query = "SELECT * FROM tbl_product WHERE product_code LIKE '%$product_code%' ORDER BY product_id DESC";
            $result = $this ->db->select($query);
            return $result;
        }
    }
?>