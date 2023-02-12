<?php
    include "database.php";

?>

<?php
    class user{
        private $db;

        public function __construct()
        {
            $this -> db = new Database();
        }

        public function show_user(){
            $query = "SELECT * FROM users ORDER BY id DESC";
            $result = $this ->db->select($query);
            return $result;
        }

        public function get_user($id){
            $query = "SELECT * FROM users WHERE id = '$id'";
            $result = $this ->db->select($query);
            return $result;
        }
        
        public function update_user($id, $name, $email, $usertype){
            $query = "UPDATE users SET 
                id = '$id', 
                name = '$name',
                email = '$email',
                usertype = '$usertype' WHERE id = '$id'";
            $result = $this ->db->update($query);
            header('location:userlist.php');
            return $result;
        }
        
         
        public function delete_user($id){
            $query = "DELETE FROM users WHERE id = '$id' ";
            $result = $this ->db->delete($query);
            header('location:userlist.php');
            return $result;
        }

        public function show_user_search($name){
            $query = "SELECT * FROM users WHERE name LIKE '%$name%' ORDER BY id DESC";
            $result = $this ->db->select($query);
            return $result;
        }
        
    }
?>