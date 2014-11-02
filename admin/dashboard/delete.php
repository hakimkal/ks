<?php $pageName = 'Delete';?>
<?php


require ('admin_top.php');
?>
 
<?php
//switch and call method
switch($_GET['object']){
case "package":
$Packages = $mc->deletePackage ("packages",$_GET['id']);

break;
case "feature":
	$Packages = $mc->deleteFeature ("features",$_GET['id']);
break;
case "zone_area":
	$zoneSMSArea = $mc->deleteZoneSMSArea('zone_sms_areas'  ,$_GET['id']);
	break;
	
	case "faq":
		$faq = $mc->deleteFaq('faqs'  ,$_GET['id']);
		break;
default:
	break;
}
?>