<?php


 ini_set ( 'display_errors', 'Off' );
 
// error_reporting (0);
?>
<?php

session_start ();

require ('main_controller.php');
// include ImageManipulator class
require_once (dirname ( dirname ( __FILE__ ) ) . '/ImageManipulator.php');
// var_dump($_POST);
// sleep(40);
// initiate main controller class
$mc = new MainController ();

// get user notifications
$notifications = $mc->getUserNotifications ( $_SESSION ['User'] ['id'] );
// get user messages
$messages = $mc->getUserMessages ( $_SESSION ['User'] ['id'] );

$contacts = $mc->getUserContacts ( $_SESSION ['User'] ['id'] );

// get system generated sms for user
if (! empty ( $_SESSION ['User'] ) && ($_SESSION ['User'] ['user_type'] == 'customer')) {
	$conn = $mc->db->get_pdo_connection ();
	$sms_collections = $mc->getSystemSMS ( $_SESSION ['User'] ['id'] );
	
	// Credit Balance
	$sms_credit_balance = $mc->getSMSCreditBalance ( $conn, $_SESSION ['User'] ['id'] );
}
// get signup post form
// print_r($_SESSION['User']);
if ($_POST ['User'] && ! $_SESSION ['User'] ['id']) {
	// print_r($_POST['User']);
	
	// $_SESSION['u_debug'] = $_POST['User'];
	$mc->signUp ( $_POST ['User'] );
} elseif ($_POST ['User'] && $_SESSION ['User'] ['id']) {
	
	echo $mc->signUp ( $_POST ['User'], true );
}
// get credit request post form
if ($_POST ['Credit'] && $_SESSION ['User'] ['id'] && $_SESSION ['User'] ['user_type'] == 'customer') {
	// print_r($_POST['User']);
	
	// $_SESSION['u_debug'] = $_POST['User'];
	$mc->requestCredit ( $_POST ['Credit'] );
}
// Authenticate User

if ($_POST ['Session'] && ! ($_SESSION ['User'])) {
	// print_r($_POST['Session']);
	$user = $mc->signin ( $_POST ['Session'] );
	
	if ($user ['id']) {
		session_regenerate_id ();
		// remove password and return answer
		unset ( $user ['password'] );
		
		$_SESSION ['User'] = array ();
		$_SESSION ['User'] = $user;
		$user = null;
		
		// Redirect customer to dashbaord
		$mc->userLounge ();
	} else {
		$_SESSION ['error'] = " Invalid login credentials";
		print_r ( $user );
		$mc->redirect ( 'index.php' );
	}
} elseif ($_POST ['Session'] && ($_SESSION ['User'])) {
	$mc->userLounge ();
}

// Add new package
if ($_POST ['Package'] && ! $_POST ['_method']) {
	// print_r($_FILES);
	$mc->addPackage ( $_POST ['Package'], $_FILES );
}

// Add user testimony
if ($_POST ['Testimonial'] && ! $_POST ['_method']) {
	// print_r($_FILES);
	$mc->addUserTestimony ( $_POST ['Testimonial'] );
}

// Edit User Profile
if (($_POST ['_method'] == 'put') && ($_POST ['MyProfile'])) {
	//$mc->updateUsers ( $_POST ['my_profile'] );
	
	
	if ($_FILES ['edituploadedimage'] ['error'] > 0 && $_FILES ['edituploadedimage'] ['error'] !=4) {
		$_SESSION ['error'] = "Error: " . $_FILES ['edituploadedimage'] ['error'];
		$mc->redirect ( "dashboard/my_profile.php" );
		exit ();
		
	}
	elseif($_FILES['edituploadedimage']['error'] !=4) {
		// array of valid extensions
		$validExtensions = array (
				'.jpg',
				'.jpeg',
				'.gif',
				'.png'
		);
		// get extension of the uploaded file
		$fileExtension = strtolower ( strrchr ( $_FILES ['edituploadedimage'] ['name'], "." ) );
		// check if file Extension is on the list of allowed ones
		// print_r($fileExtension);
		if (in_array ( $fileExtension, $validExtensions )) {
			$newNamePrefix = time () . '_';
				
			$manipulator = new ImageManipulator ( $_FILES ['edituploadedimage'] ['tmp_name'] );
			/*
			 * $width = $manipulator->getWidth(); $height = $manipulator->getHeight(); $centreX = round($width / 2); $centreY = round($height / 2); // our dimensions will be 200x130 //590 x 630 $x1 = $centreX - 295; // 200 / 2 $y1 = $centreY - 315; // 130 / 2 $x2 = $centreX + 295; // 200 / 2 $y2 = $centreY + 315; // 130 / 2 // center cropping to 200x130 $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
			*/
			$newImage = $manipulator->resample ( 340, 340 );
			// saving file to uploads folder
			$fileName = dirname ( dirname ( __FILE__ ) ) . '/company_logos/' . $newNamePrefix . $_FILES ['edituploadedimage'] ['name'];
			$manipulator->save ( $fileName );
			 $_POST ['MyProfile']['company_logo'] = $fileName;
			 
			$mc->updateUsers ( $_POST['MyProfile'] );
			$_SESSION ['success'] = 'Successfully updated profile';
			$mc->redirect ( "dashboard/index.php" );
		} else {
			$_SESSION ['error'] = 'You must upload an image...';
			// print_r($_POST);
			$mc->redirect ( "dashboard/my_profile.php" );
			exit ();
		}
	}
	
	
	elseif($_FILES['edituploadedimage']['error'] == 4) {
		 
	
			$mc->updateUsers ( $_POST['MyProfile'] );
			$_SESSION ['success'] = 'Successfully updated profile';
			$mc->redirect ( "dashboard/index.php" );
		 
	}
}


// check package edit
if (($_POST ['_method'] == 'put') && ($_POST ['Package'])) {
	$mc->updatePackage ( $_POST ['Package'] );
}
// check faq item edit
if (($_POST ['_method'] == 'put') && ($_POST ['FAQ'])) {
	$mc->updateFAQ ( $_POST ['FAQ'] );
}
// add feature to package

if ($_POST ['Feature'] && ! $_POST ['_method']) {
	// print_r($_POST['Feature']);
	$mc->addFeature ( $_POST ['Feature'] );
}

// check feature edit
if (($_POST ['_method'] == 'put') && ($_POST ['Feature'])) {
	$mc->updateFeature ( $_POST ['Feature'] );
}

// Check for admin adding credit post form
// check feature edit
if (($_POST ['_method'] == 'add_credit') && ($_POST ['UserCredit'])) {
	$mc->addCreditValue ( $_POST ['UserCredit'] );
}

// Send Website Contact Messages
if ($_POST ['Contact']) {
	$mc->submitVisitorMessage ( $_POST ['Contact'] );
}

// Customer Section

if ($_POST ['UContact'] && ! isset ( $_POST ['_method'] )) {
	// print_r($_POST['UContact']);
	$mc->addContact ( $_POST ['UContact'] );
}
require ('curl.php');

if ($_POST ['SingleSms']) {
	$url .= 'sender=' . $_POST ['SingleSms'] ['sender'];
	$url .= '&mobile=' . $_POST ['SingleSms'] ['phone'];
	$url .= '&message=' . urlencode ( $_POST ['SingleSms'] ['message'] );
	
	if (isCurl ()) {
		$myCurl = new mycurl ( $url );
		$myCurl->createCurl ();
		// var_dump($my_curl->__tostring());
		// print_r($url);
		$myArray = explode ( ',', $myCurl->__tostring () );
	} else {
		// ?username=balameed&password=fapi1&language=1&
		$opts = array (
				'http' => array (
						'method' => "GET",
						'content' => http_build_query ( array (
								'username' => 'balameed',
								'password' => 'fapi1',
								'language' => 1,
								'sender' => $_POST ['SingleSms'] ['sender'],
								'mobile' => $_POST ['SingleSms'] ['phone'],
								'message' => urlencode ( $_POST ['SingleSms'] ['message'] ) 
						) ) 
				) 
		);
		
		$context = stream_context_create ( $opts );
		
		// Open the file using the HTTP headers set above
		$myArray = file_get_contents ( 'http://208.43.76.66/api/send.aspx', false, $context );
		print_r ( $myArray );
	}
	// print_r($url);
	// print_r($myArray);
	$mc->AddSingleSMS ( $_POST ['SingleSms'], $myArray );
}
function isCurl() {
	return function_exists ( 'curl_version' ) ? true : false;
	
	// return function_exists('curl_version') ?false : true;
}

// print_r($_FILES['Bulksms']);
if ($_POST ['Bulksms'] && $_FILES ['Bulksms']) {
	// print_r($_FILES['Bulksms']["type"]);
	
	if ($_FILES ['Bulksms'] ["file"] ["error"] > 0) {
		$_SESSION ['error'] = $_FILES ['Bulksms'] ["error"] ["file"];
		
		$mc->redirect ( 'dashboard/send_bulksms.php' );
	} elseif ($_FILES ['Bulksms'] ["type"] ['file'] !== "text/plain") {
		$_SESSION ['error'] = "File must be a .txt";
		// $mc->redirect('dashboard/send_bulksms.php');
		// exit();
	} elseif ($_FILES ['Bulksms'] ["type"] ['file'] == "text/plain") {
		// $file_handle = fopen($_FILES['Bulksms']["tmp_name"]["file"], "rb");
		// if ($_FILES['uploadedfile']['error'] == UPLOAD_ERR_OK //checks for errors
		// && is_uploaded_file($_FILES['uploadedfile']['tmp_name'])) { //checks that file is uploaded
		// echo file_get_contents($_FILES['uploadedfile']['tmp_name']);
		// }
		$file_handle = file_get_contents ( $_FILES ['Bulksms'] ["tmp_name"] ["file"] );
		$file_handle = explode ( ",", $file_handle );
		if ($file_handle && count ( $file_handle ) <= 0) {
			$file_handle = explode ( " ", $file_handle );
		} elseif ($file_handle && count ( $file_handle ) <= 0) {
			$file_handle = explode ( "\n", $file_handle );
		}
		// print_r ( count ( $file_handle ) );
		// print_r ( $file_handle );
		$url .= 'sender=' . $_POST ['Bulksms'] ['sender'];
		$url .= '&mobile=';
		// print_r($url);
		// $url .= 'sender=' . $_POST ['SingleSms'] ['sender'];
		// $url .= '&mobile=' . $_POST ['SingleSms'] ['phone'];
		// $url .= '&message=' . urlencode ( $_POST ['SingleSms'] ['message'] );
		
		$array100 = array ();
		if (count ( $file_handle ) < 100) {
			// print_r(count($file_handle));
			// echo "<br/>";
			$str_numbers = implode ( ",", $file_handle );
			$url .= trim ( $str_numbers );
			// print_r($str_numbers);
			
			$url .= '&message=' . urlencode ( $_POST ['Bulksms'] ['message'] );
			// print_r($url);
			sendBulkSMS ( $str_numbers, $_POST ['Bulksms'] ['message'], $url );
		} else {
			for($q = 0; $q < count ( $file_handle ); $q ++) {
				
				$array100 [$i] = $file_handle [$q];
				if (count ( $array100 ) == 100) {
					
					$str_numbers = implode ( ",", $array100 );
					$url .= trim ( $str_numbers );
					$url .= '&message=' . urlencode ( $_POST ['Bulksms'] ['message'] );
					
					sendBulkSMS ( $str_numbers, $_POST ['Bulksms'] ['message'], $url );
					$array100 = array ();
					
					print_r ( $url );
				}
			}
		}
		$_SESSION ['success'] = " Your Message has been sent, Thank you.";
		$mc->redirect ( 'dashboard/send_bulksms.php' );
		exit ();
	} else {
		$_SESSION ['error'] = "oops, request too complicated for server!";
		$mc->redirect ( 'dashboard/send_bulksms.php' );
		exit ();
		// $file_handle = fopen($_FILES['Bulksms']["tmp_name"]["file"], "rb");
	}
	
	// $fp = fopen($_FILES['uploadFile']['tmp_name'], 'rb');
	// while ( ($line = fgets($fp)) !== false) {
	// echo "$line<br>";
	// }
}

// //Add ZoneSMS Area Post Submission
if ($_POST ['ZoneSMSArea'] && ! $_POST ['_method']) {
	$mc->addZoneSMSArea ( $_POST ['ZoneSMSArea'] );
}
// check zonesms edit
if (($_POST ['_method'] == 'edit_zone_sms_area') && ($_POST ['ZoneSMSArea'])) {
	$mc->updateZoneSMSArea ( $_POST ['ZoneSMSArea'] );
}
// //Add ZoneSMSCity Post Submission
if ($_POST ['ZoneSMSAreaCity'] && ! $_POST ['_method']) {
	// $mc->addZoneSMSArea($_POST['ZoneSMSArea']);
	// print_r($_POST);
	// print_r($_SERVER);
	$mc->addZoneAreaCities ( $_POST ['ZoneSMSAreaCity'] );
}

// check zonesms city edit

if (($_POST ['_method'] == 'edit_zone_sms_area_city') && ($_POST ['ZoneSMSAreaCity'])) {
	print_r ( $_POST );
	$mc->updateZoneSMSAreaCity ( $_POST ['ZoneSMSAreaCity'] );
}

if ($_POST ['ForgotUserPass'] && ! $_POST ['_method']) {
	// print_r($_POST);
	$mc->requestPasswordLink ( $_POST ['ForgotUserPass'] );
}

if ($_POST ['ResetPass'] && $_POST ['_method']) {
	// print_r($_POST);
	$mc->changePassword ( $_POST ['ResetPass'] );
}

if ($_POST ['ZonesmsRequest'] && ! $_POST ['_method']) {
	print_r ( $_POST );
	$mc->requestZonesms ( $_POST ['ZonesmsRequest'] );
}
// Send BulkSMS Function
function sendBulkSMS($numbers, $message, $url) {
	if (isCurl ()) {
		$myCurl = new mycurl ( $url );
		$myCurl->createCurl ();
		// var_dump($my_curl->__tostring());
		// print_r($url);
		// echo "<br>";
		// print_r($numbers);
		// echo "<br>";
		
		$myArray = explode ( ',', $myCurl->__tostring () );
		// print_r($myArray);
		// $url .= 'sender=' . $_POST ['SingleSms'] ['sender'];
		// $url .= '&mobile=' . $_POST ['SingleSms'] ['phone'];
		// $url .= '&message=' . urlencode ( $_POST ['SingleSms'] ['message'] );
		
		$_POST ['Bulksms'] ['phone'] = $numbers;
		$mc = new MainController ();
		$result = $mc->AddBulkSMS ( $_POST ['Bulksms'], $numbers, $myArray );
		// print_r($result);
	}
}

// Add Banner


if ($_POST ['Banner'] && ! ($_POST ['_method'])) {
	
	if ($_POST ['Banner'] && $_FILES ['BannerImage'] ['error'] > 0) {
		$_SESSION ['error'] = "Error: " . $_FILES ['BannerImage'] ['error'];
		$mc->redirect ( "admin/dashboard/add_banner.php" );
		exit ();
	} 
	else {
		// array of valid extensions
		$validExtensions = array (
				'.jpg',
				'.jpeg',
				'.gif',
				'.png' 
		);
		// get extension of the uploaded file
		$fileExtension = strtolower ( strrchr ( $_FILES ['BannerImage'] ['name'], "." ) );
		// check if file Extension is on the list of allowed ones
		// print_r($fileExtension);
		if (in_array ( $fileExtension, $validExtensions )) {
			$newNamePrefix = time () . '_';
			
			$manipulator = new ImageManipulator ( $_FILES ['BannerImage'] ['tmp_name'] );
			/*
			 * $width = $manipulator->getWidth(); $height = $manipulator->getHeight(); $centreX = round($width / 2); $centreY = round($height / 2); // our dimensions will be 200x130 //590 x 630 $x1 = $centreX - 295; // 200 / 2 $y1 = $centreY - 315; // 130 / 2 $x2 = $centreX + 295; // 200 / 2 $y2 = $centreY + 315; // 130 / 2 // center cropping to 200x130 $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
			 */
			$newImage = $manipulator->resample ( 590, 630 );
			// saving file to uploads folder
			$fileName = dirname ( dirname ( __FILE__ ) ) . '/banners/' . $newNamePrefix . $_FILES ['BannerImage'] ['name'];
			$manipulator->save ( $fileName );
			$Banner = $_POST ['Banner'];
			$Banner ['image_link'] = $fileName;
			$Banner ['image_type'] = $fileExtension;
			$mc->AddBanner ( $Banner );
			$_SESSION ['success'] = 'Successfully saved new banner';
			$mc->redirect ( "admin/dashboard/add_banner.php" );
		} else {
			$_SESSION ['error'] = 'You must upload an image...';
			// print_r($_POST);
			$mc->redirect ( "admin/dashboard/add_banner.php" );
			exit ();
		}
	}
}

// Add FAQ
if($_POST['FAQ']){
if ($_POST ['FAQ'] && ! ($_POST ['_method'])) {

	$mc->AddFaq ( $_POST ['FAQ'] );
	$_SESSION ['success'] = 'Successfully saved new FAQ Item';
	$mc->redirect ( "admin/dashboard/add_faq.php" );
} else {
	$_SESSION ['error'] = 'Error adding an FAQ...';
	// print_r($_POST);
	$mc->redirect ( "admin/dashboard/add_faq.php" );
	exit ();
}
}
// if(empty($_POST) && empty($_FILES) && ($_SERVER['REQUEST_METHOD'] == 'GET'))
// {$mc->checkLogin(true);}
?>