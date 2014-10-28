<?php ini_set ( 'display_errors' , 'Off' );
error_reporting(0);
?>
<?php include('includes/app_controller.php');?>
<?php 
ob_start();
unset($_SESSION['user_cart']);



header("Location:index.php");
?>