<?php
    include "class/user_class.php";
    $user = new user;
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        echo "<script>window.location = 'userlist.php'</script>";
    }
    else {
        $id = $_GET['id'];
    }
    $delete_user =  $user -> delete_user($id);
    
?>

