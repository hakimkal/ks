<?php include('../includes/app_controller.php');

$logout = true;
global $mc;
$mc->signout();
$mc->redirect('index.php');

?>
