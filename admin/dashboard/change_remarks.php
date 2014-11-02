<?php require(dirname(dirname(dirname(__FILE__))).'/includes/app_controller.php');
$mc->checkLogin(true);
$mc->isAdmin(true);
 
$result = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$change =  $mc->updateUserTestimony($_POST['approved'], $_POST['id']);
if($change== true){
	$result['status']=  true ;
	$result['text'] = "Testimony status successfully updated";
	header('Content-type: application/json');
	echo json_encode($result);
	
}
else {
	$result['status']=  false ;
	$result['text'] = "Testimony status failed to update...";
	header('Content-type: application/json');
echo  json_encode($result);
}

}

else{
	$result['status']= "false";
	$result['text'] = "Testimony status failed to update...";
	header('Content-type: application/json');
	echo  json_encode($result);
	
}


?>

