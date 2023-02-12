<?php
include './connect.php';
//hủy session theo tên
unset($_SESSION['user']);

header('location: index.php');
?>