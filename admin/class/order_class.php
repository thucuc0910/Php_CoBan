<?php
    include "database.php";

?>

<?php
    class order{
        private $db;

        public function __construct()
        {
            $this -> db = new Database();
        }

        public function show_order1(){
            $query =  "SELECT orders.*, users.name as 'name' FROM orders JOIN users ON orders.id_user = users.id WHERE status = 1";
            $result = $this ->db->select($query);
            return $result;
        }

        public function show_order_search1($name){
            $query =  "SELECT orders.*, users.name as 'name' FROM orders JOIN users ON orders.id_user = users.id WHERE users.name LIKE '%$name%' AND status = 1";
            $result = $this ->db->select($query);
            return $result;
        }

        public function show_order2(){
            $query =  "SELECT orders.*, users.name as 'name' FROM orders JOIN users ON orders.id_user = users.id WHERE status = 2";
            $result = $this ->db->select($query);
            return $result;
        }

        public function show_order_search2($name){
            $query =  "SELECT orders.*, users.name as 'name' FROM orders JOIN users ON orders.id_user = users.id WHERE users.name LIKE '%$name%' AND status = 2";
            $result = $this ->db->select($query);
            return $result;
        }

        public function show_order3(){
            $query =  "SELECT orders.*, users.name as 'name' FROM orders JOIN users ON orders.id_user = users.id WHERE status = 3";
            $result = $this ->db->select($query);
            return $result;
        }

        public function show_order_search3($name){
            $query =  "SELECT orders.*, users.name as 'name' FROM orders JOIN users ON orders.id_user = users.id WHERE users.name LIKE '%$name%' AND status = 3";
            $result = $this ->db->select($query);
            return $result;
        }

        public function show_order4(){
            $query =  "SELECT orders.*, users.name as 'name' FROM orders JOIN users ON orders.id_user = users.id WHERE status = 4";
            $result = $this ->db->select($query);
            return $result;
        }

        public function show_order_search4($name){
            $query =  "SELECT orders.*, users.name as 'name' FROM orders JOIN users ON orders.id_user = users.id WHERE users.name LIKE '%$name%' AND status = 4";
            $result = $this ->db->select($query);
            return $result;
        }

        public function show_order5(){
            $query =  "SELECT orders.*, users.name as 'name' FROM orders JOIN users ON orders.id_user = users.id WHERE status = 5";
            $result = $this ->db->select($query);
            return $result;
        }

        public function show_order_search5($name){
            $query =  "SELECT orders.*, users.name as 'name' FROM orders JOIN users ON orders.id_user = users.id WHERE users.name LIKE '%$name%' AND status = 5";
            $result = $this ->db->select($query);
            return $result;
        }


        
    }
?>