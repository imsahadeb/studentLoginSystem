<?php 
require_once 'session_start.php';
include 'header.php'; 
?>
<?php include 'main_header.php'; ?>
<?php
mysqli_close($link);
unset($_SESSION['admin_user_id']);
redirect_to('admin.php');
?>
