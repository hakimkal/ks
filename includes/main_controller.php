<?php
ob_start ();

require ('model.php');
require 'PHPMailer/PHPMailerAutoload.php';
class MainController {
	public $db;
	// Constructor creates an instance of model class
	public function __construct() {
		$this->db = new MainModel ();
	}
	
	// get User Notifications
	public function getUserNotifications($user_id) {
		return 0;
	}
	
	// get User messages
	public function getUserMessages($user_id) {
		return 0;
	}
	
	// get User Contacts
	public function getUserContacts($user_id) {
		return 0;
	}
	
	// get System Generated SMS Problems
	public function getSystemSMS($user_id) {
		return 0;
	}
	// Check SMS Balance
	public function getSMSCreditBalance($conn, $user_id) {
		$creditBal = $this->db->getSMSCreditBalance ( $conn, $user_id );
		if (empty ( $creditBal )) {
			return 0;
		} else {
			return $creditBal [0];
		}
		// return 0;
	}
	// add Credit Value
	public function addCreditValue($user = array()) {
		// add credit value to purchase tables
		if ($this->db->addCreditValue ( $user )) {
			$_SESSION ['success'] = " Sucessfully added credit to selected user";
			$this->redirect ( "admin/dashboard/index.php" );
		}
		// add value to user_credit_balance
		// send notifiction email to customer
	}
	
	// Add ZoneSMS Area
	public function addZoneSMSArea($area = array()) {
		if ($this->db->addZoneSMSArea ( $area )) {
			
			$_SESSION ['success'] = "Successfully added a new Zone Area";
		} else {
			$_SESSION ['error'] = "Unable to add a Zone Area";
		}
		
		$this->redirect ( 'admin/dashboard/add_zone.php' );
	}
	
	// get all zone areas by selected filter
	public function getZoneAreas($category = 'customer') {
		$users = $this->db->getZoneAreas ();
		return $users;
	}
	// delete zone area
	public function deleteZoneSMSArea($model, $id) {
		if ($this->db->delete ( $model, $id )) {
			$_SESSION ['success'] = "Successfully deleted selected zone area ";
		} else {
			$_SESSION ['error'] = "Unable to delete";
		}
		$this->redirect ( "admin/dashboard/add_zone.php" );
	}
	// get single zone_sms_area
	public function getZoneSMSArea($id) {
		return $this->db->getZoneSMSArea ( $id );
	}
	// update zone area
	public function updateZoneSMSArea($package = array()) {
		if ($this->db->updateZoneSMSArea ( $package )) {
			
			$_SESSION ['success'] = "Successfully updated  zone sms area ";
			$this->redirect ( 'admin/dashboard/add_zone.php' );
			exit ();
		}
	}
	
	// add zone city or cities
	public function addZoneAreaCities($zoneAndCities = array()) {
		
		if(empty($zoneAndCities['zone_sms_area_id'])){
			
			$_SESSION['error'] = "You must select a zone/governorate ";
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
		 
		$citiesNumber = count ( $zoneAndCities ['name'] );
		$names = array();
		for($i=0 ; $i<$citiesNumber; $i++){
			if(!empty($zoneAndCities['name'][$i])){
			$names[$i] = $zoneAndCities['name'][$i];
		}}
		if(empty($names)){
				
			$_SESSION['error'] = "You must select a zone city and specify at least one city";
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
		$zoneAndCities['name']= $names;
		if($this->db->addZoneSMSCities($zoneAndCities,count($names)))
		{$_SESSION['success'] = "Succesfully saved ". count($names). " cities! ";}
		else{ $_SESSION['error'] = "Unable to save the city(ies)";}
		$this->redirect('admin/dashboard/add_zone_cities.php');
	}
	//check if user has approved ZoneSMS and Return the approved list
	public function getUserZoneSMSStatus(){
		return false;
	}
	
	// get all zone areas and cities  
	public function getZoneAreasAndCities() {
		$users = $this->db->getZoneAreasAndCities ();
		return $users;
	}
	
	// get all zone areas and cities grouped
	public function getZoneAreasAndCitiesGrouped() {
		$users = $this->db->getZoneAreasAndCitiesGrouped();
		return $users;
	}
	
	// get single zone_sms_city
	public function getZoneSMSAreaCity($id) {
		return $this->db->getZoneSMSAreaCity ( $id );
	}
	
	// update zone city
	public function updateZoneSMSAreaCity($package = array()) {
		if ($this->db->updateZoneSMSAreaCity ( $package )) {
				
			$_SESSION ['success'] = "Successfully updated  zone sms city ";
			$this->redirect ( 'admin/dashboard/add_zone_cities.php' );
			exit ();
		}
	}
	// collect and send website visitor's message
	public function submitVisitorMessage($contact = array()) {
		$email = $contact ['email'];
		$name = $contact ['name'];
		$subject = "KootSMS Website Visitor left you a message " . date ( 'D-m-Y: H:i' );
		
		$htmlMessage = "Name: " . $name . "<br>";
		$htmlMessage .= "Email: " . $email . "<br>";
		$htmlMessage .= "Phone: " . $contact ['phone'] . "<br>";
		$htmlMessage .= "Website: " . $contact ['web'] . "<br>";
		$htmlMessage .= "Message: <br/>";
		$htmlMessage .= $contact ['message'];
		
		$plainMessage = "Name: " . $name;
		$plainMessage .= "Email: " . $email;
		$plainMessage .= "Phone: " . $contact ['phone'];
		$plainMessage .= "Website: " . $contact ['website'];
		$plainMessage .= "Message:  ";
		$plainMessage .= $contact ['message'];
		;
		
		if ($this->sendEmail ( $email, $name, $subject, $htmlMessage, $plainMessage )) {
			$_SESSION ['success'] = "Thank you for contacting us " . $name . ", a KootSMS Rep will contact you shortly with our response.";
		} else {
			
			$_SESSION ['error'] = "Unfortunately, We are unable to process your message " . $name . "....please try again!";
		}
		$this->redirect ( "contact.php" );
		exit ();
	}
	// signup User
	public function signUp($user = array(), $admin = false) {
		
		// $db->registerNewUser($_POST['User']);
		if ($user ['password'] == $user ['password_verify'] && $this->isValidEmail ( $user ['email'] )) {
			$user ['password'] = sha1 ( $user ['password'] );
			if ($this->db->registerNewUser ( $user )) {
				
				// get registered user
				// add user selected packages and purchased qty
				
				$email = $user ['email'];
				$name = $user ['firstname'] . ' ' . $user ['lastname'];
				$subject = "Welcome to KootSMS";
				
				$htmlMessage = "<b> Hello " . $name . ",</b><br/>";
				if ($admin && ($_SESSION ['User'] ['user_type'] == 'staff')) {
					$htmlMessage .= "You have been added as a " . $user ['user_type'] . " to KootSMS<br/>";
				}
				$htmlMessage .= "Your username: " . $email . "<br/>";
				$htmlMessage .= "Your password: " . $user ['password_verify'] . "<br/><br/><br/>";
				$htmlMessage .= "Thank you for choosing KootSMS <br/>";
				
				$plainMessage = "Hello $name";
				$plainMessage .= "Your username:" . $email;
				$plainMessage .= "Your password: " . $user ['password_verify'];
				$plainMessage .= "Thank you";
				if ($this->sendEmail ( $email, $name, $subject, $htmlMessage, $plainMessage )) {
					$_SESSION ['success'] = "Your signup was successful and an email has been sent to you";
				} 

				else {
					
					// $_SESSION['error'] = "You signup was successful but we are unable to send you an email.";
				}
			}
		} 

		else {
			$_SESSION ['error'] = "password mismatch.";
		}
		if (! $admin) {
			// $this->signin ( $user );
			// $this->redirect('checkout/step2.php');
			// $this->redirect('checkout/paypal-mockform.php');
			$_SESSION ['jump_out'] = 1;
			//$this->redirect ( 'payment.php' );
			$this->redirect ( 'index.php' );
			// $this->redirect('http://paypal.com/ng',true);
		} else {
			// staff added
			$this->redirect ( 'admin/dashboard/users.php' );
		}
		// $this->redirect ( 'index.php' );
	}
	
	// requestCredit Processor
	public function requestCredit($user = array()) {
		$email = $user ['email'];
		$name = $user ['firstname'] . ' ' . $user ['lastname'];
		$subject = "Credit Request From " . $user ['firstname'] . ' ' . $user ['lastname'] . '(' . $user ['email'] . ') ';
		
		$htmlMessage = "<b> Hello " . 'KootSMS Support' . ",</b><br/>";
		$htmlMessage .= "<b> Time Stamp: " . date ( 'd-m-Y H:i:s' ) . "</b><br/>";
		
		$htmlMessage .= "Request Details: " . $user ['message'] . "<br/><br/><br/>";
		
		$plainMessage = "Hello KootSMS Support";
		$plainMessage .= "Time Stamp: " . date ( 'd-m-Y H:i:s' );
		
		$plainMessage .= "Request Details: " . $user ['message'];
		
		if ($this->sendEmailToSupport ( $email, $name, $subject, $htmlMessage, $plainMessage )) {
			$_SESSION ['success'] = "Your request has been sent to KootSMS support desk, Kindly give 2 - 4 hours for a support rep to respond";
		} 

		else {
			
			// $_SESSION['error'] = "You signup was successful but we are unable to send you an email.";
		}
		$this->redirect ( 'dashboard/index.php' );
	}
	
	// requestPassword Reset Link
	public function requestPasswordLink($user = array()) {
		$email = $user ['email'];
		$user = null;
	//	print_r($email);
		$user = $this->db->getUserByEmail($email);
		 
		if(($user) == null){
			
			$_SESSION['error'] = "Sorry that email appears to have been blacklisted or have never been registered with us. ";
			 $this->redirect("index.php");
			exit();
		}
	 $user = $user[0];
		$user['token'] = md5(date('d-m-Y H:s:i'));
		//print_r($user);
		$this->db->setUserPasswordToken($user);
		$name = $user ['firstname'] . ' ' . $user ['lastname'];
		$subject = "kootSMS Password Reset Link " ;
	
		$htmlMessage = "<b> Hello " . $name . ",</b><br/>";
		$htmlMessage .= "<b> Time Stamp: " . date ( 'd-m-Y H:i:s' ) . "</b><br/>";
	
		$htmlMessage .= "Someone or you requested for password reset on your account. ". "<br/><br/>";
		$htmlMessage .= "Here is the link:". '<a href="'.BASE_URL. '/password_reset.php?token='.$user['token'].'">Click Here</a>'. "<br/><br/>";
	
		
			$plainlMessage = "<b> Hello " . $name . ",";
		$plainMessage .= "<b> Time Stamp: " . date ( 'd-m-Y H:i:s' ) ;
	
		$plainMessage .= "Someone or you requested for password reset on your account.: ";
		$plainMessage .= "Here is the link:". '<a href="'.BASE_URL. '/password_reset.php?token='.$user['token'].'">Click Here</a>';
	
	
	
		  if ($this->sendEmailToSupport ( $email, $name, $subject, $htmlMessage, $plainMessage )) {
			$_SESSION ['success'] = "Your password request link will be sent to your email shortly, Please check and follow the link.";
		}
	
		else {
				
			// $_SESSION['error'] = "Your signup was successful but we are unable to send you an email.";
		} 
		$this->redirect("index.php");
	}
	
	
	//get user from token
	public function getUserFromToken($token){
		
		$user = $this->db->getUserByToken($token);
		if(empty($user)){
			$_SESSION['error'] = "This link must have expired, please request another link and make sure to copy the correct URL to your browser address field.";
		$this->redirect("index.php");
		exit();
		}
		
		else{
			return $user;
		}
	}
	
	// changePassword
	public function changePassword($user = array()) {
		 
		 if($user['password'] != $user['password_verify']){
		 	
		 	$_SESSION['error'] = "Password mismatch!";
		 	$this->redirect($_SERVER['HTTP_REFERER'],true);
		 	exit();
		 }
		 
		// print_r($user);
		 $user ['password'] = sha1( trim($user ['password']) );
		// print_r($user);
		$this->db->ChangeUserPassword($user);
		$name = $user ['firstname'] . ' ' . $user ['lastname'];
		$subject = "kootSMS Password Changed " ;
	
		$htmlMessage = "<b> Hello " . $name . ",</b><br/>";
		$htmlMessage .= "<b> Time Stamp: " . date ( 'd-m-Y H:i:s' ) . "</b><br/>";
	
		$htmlMessage .= "You have successfully changed your password. ". "<br/><br/>";
		 
	
		$plainlMessage = "<b> Hello " . $name . ",";
		$plainMessage .= "<b> Time Stamp: " . date ( 'd-m-Y H:i:s' ) ;
	
		$plainMessage .= "You have successfully changed your password.";
		 
	
		  if ($this->sendEmailToSupport ( $email, $name, $subject, $htmlMessage, $plainMessage )) {
			$_SESSION ['success'] = "You have successfully changed your password, Please do login.";
		}
	
		else {
	
			// $_SESSION['error'] = "You signup was successful but we are unable to send you an email.";
		} 
		 $this->redirect("index.php");
	}
	// redirect to the page
	public function redirect($page, $external = false) {
		if ($external) {
			header ( "Location:" . $page );
		} else {
			header ( "Location:" . BASE_URL . '/' . $page );
		}
		exit ();
	}
	// Authenticate user
	public function signin($user = array()) {
		if (! $_SESSION ['User']) {
			return $this->db->authAndLogin ( $user );
		} else {
			$this->userLounge ();
		}
	}
	
	// determine Authenticated usertype and redirect to appropriate section
	public function userLounge() {
		if ($_SESSION ['User'] ['user_type'] == 'customer') {
			$this->redirect ( 'dashboard/index.php' );
		} else {
			$this->redirect ( 'admin/dashboard/index.php' );
		}
	}
	// signout and destroy session
	public function signout() {
		unset ( $_SESSION ['User'] );
		session_destroy ();
		$_SESSION ['error'] = "Logout successful";
		$this->redirect ( 'index.php' );
	}
	
	// Check if user is logged in or redirect the user
	public function checkLogin($restricted = true) {
		if (! isset ( $_SESSION ['User'] ) && $restricted) {
			$_SESSION ['error'] = "You must be logged in to access that page";
			$this->redirect ( 'index.php' );
			exit ();
		}
	}
	
	// Check if Is Customer
	public function isCustomer($restricted = true) {
		if (isset ( $_SESSION ['User'] ) && $restricted) {
			if ($this->db->isUserACustomer ( $_SESSION ['User'] ) == true) {
				return true;
			} else {
				
				$this->redirect ( 'includes/logout.php' );
				return false;
			}
		}
	}
	
	// Check if Is admin
	public function isAdmin($restricted = true) {
		if (isset ( $_SESSION ['User'] ) && $restricted) {
			if ($this->db->isAdmin ( $_SESSION ['User'] ) == true) {
				return true;
			} else {
				$_SESSION ['error'] = "Restricted Section";
				$this->signin ( $_SESSION ['User'] );
				;
				return false;
			}
		}
	}
	
	// get all users by selected filter
	public function getUsers($category = 'customer') {
		$users = $this->db->getUsers ( $category );
		return $users;
	}
	
	// get a user
	public function getUser($user_id) {
		$user = $this->db->getUser ( $user_id );
		if (! empty ( $user )) {
			return $user [0];
		} else {
			$_SESSION ['error'] = "Invalid User";
			$this->redirect ( 'admin/dashboard/index.php' );
		}
	}
	// add Package
	public function addPackage($package = array(), $uploadedFile = array()) {
		$target_path = UPLOAD_DIR;
		if ($_SERVER ['SERVER_NAME'] != 'localhost') {
			$target_path = '../' . $target_path . '/' . basename ( $_FILES ['uploadedimage'] ['name'] );
		} else {
			$target_path = '../../' . $target_path . '/' . basename ( $_FILES ['uploadedimage'] ['name'] );
		}
		print_r ( $uploadedFile );
		print_r ( $target_path );
		if (move_uploaded_file ( $_FILES ['uploadedimage'] ['tmp_name'], $target_path )) {
			
			// $package=$_POST['Package'];
			
			$target_path = str_replace ( $_SERVER ['DOCUMENT_ROOT'], "", $target_path );
			$target_path = str_replace ( "../", "", $target_path );
			if ($_SERVER ['SERVER_NAME'] == 'localhost') {
				$target_path = str_replace ( "/kootsms", "", $target_path );
			}
			$package ['image_path'] = $target_path;
			if ($this->db->addPackage ( $package )) {
				$_SESSION ['success'] = "Sucessfully added a new package";
			} else {
				$_SESSION ['error'] = "There was an error adding a new record, please try again!";
			}
			// echo "The file ". basename( $_FILES['uploadedfile']['name']).
			// " has been uploaded";
		} else {
			$_SESSION ['error'] = "There was an error uploading the file, please try again!";
			$_SESSION ['error'] .= "<br/> " . $target_path;
		}
		
		$this->redirect ( 'admin/dashboard/packages.php' );
	}
	// get single package
	public function getPackage($id) {
		return $this->db->getPackage ( $id );
	}
	// get packages
	public function getPackages($recursive = 0) {
		return $this->db->getPackages ( $recursive );
	}
	// update package
	public function updatePackage($package = array()) {
		if (! file_exists ( $_FILES ['edituploadedimage'] ['tmp_name'] ) || ! is_uploaded_file ( $_FILES ['edituploadedimage'] ['tmp_name'] )) {
			$package ['image_path'] = $package ['img_path'];
		}
		if ($this->db->updatePackage ( $package )) {
			
			$_SESSION ['success'] = "Successfully updated  package";
			$this->redirect ( 'admin/dashboard/packages.php' );
			exit ();
		}
	}
	
	// delete package
	public function deletePackage($model, $id) {
		if ($this->db->delete ( $model, $id )) {
			$_SESSION ['success'] = "Successfully deleted selected package";
		} else {
			$_SESSION ['error'] = "Unable to delete";
		}
		$this->redirect ( "admin/dashboard/packages.php" );
	}
	
	// Get Total User messages
	public function getMessages() {
	}
	
	// Add Feature
	public function addFeature($feature = array()) {
		if ($feature ['package_id'] != "") {
			// print_r($feature);
			if ($this->db->addFeature ( $feature )) {
				$_SESSION ['success'] = "Successfully added new feature";
				$this->redirect ( "admin/dashboard/features.php" );
			} else {
				$_SESSION ['error'] = "Unable to add new feature for selected package";
				$this->redirect ( "admin/dashboard/add_feature.php" );
			}
		} else {
			$_SESSION ['error'] = "Please select package...and try again";
			$this->redirect ( "admin/dashboard/add_feature.php" );
		}
	}
	
	// get Features Only
	public function getFeatures($recursive = 0) {
		return $this->db->getFeatures ( $recursive );
	}
	
	// get single feature
	public function getFeature($id) {
		return $this->db->getFeature ( $id );
	}
	
	// update feature
	public function updateFeature($package = array()) {
		if ($this->db->updateFeature ( $package )) {
			
			$_SESSION ['success'] = "Successfully updated  feature";
			$this->redirect ( 'admin/dashboard/features.php' );
			exit ();
		}
	}
	
	// delete feature
	public function deleteFeature($model, $id) {
		if ($this->db->delete ( $model, $id )) {
			$_SESSION ['success'] = "Successfully deleted selected feature";
		} else {
			$_SESSION ['error'] = "Unable to delete";
		}
		$this->redirect ( "admin/dashboard/features.php" );
	}
	
	// Add Contact
	public function addContact($contact = array()) {
		$contact ['user_id'] = $_SESSION ['User'] ['id'];
		if ($this->db->addUserContact ( $contact ) == true) {
			
			$_SESSION ['success'] = "Successfully saved contact " . $contact ['firstname'];
		} else {
			$_SESSION ['error'] = "Unable to add " . $contact ['firstname'] . " to your contact list";
		}
		$this->redirect ( 'dashboard/user_contacts.php' );
		exit ();
	}
	// Get Single Contact
	public function getContact($contact_id) {
		$user_id = $_SESSION ['User'] ['id'];
		return $this->db->getUserContact ( $contact_id, $user_id );
	}
	// Add Message
	public function AddSingleSMS($singleSmS = array(), $result = array()) {
		// Array ( [0] => OK [1] => smsid:694-667ef0784 [2] => mobiles:1 [3] => time:09/14/2014 21:11:12 )
		if ($result [0] == 'OK') {
			
			$singleSmS ['status'] = 'Sent';
			$singleSmS ['smsid'] = $result [1];
			$singleSmS ['mobiles'] = $result [2];
			$singleSmS ['time'] = $result [3];
		} else {
			
			$singleSmS ['status'] = $result [0];
			$singleSmS ['smsid'] = "";
			$singleSmS ['mobiles'] = "";
			$singleSmS ['time'] = "";
		}
		if ($this->db->addSingleSMS ( $singleSmS )) {
			$_SESSION ['success'] = "successfully saved messages";
			$this->redirect ( 'dashboard/user_messages.php' );
			exit ();
		} else {
			$_SESSION ['error'] = "Unabe to save Message";
			print_r ( $result );
			$this->redirect ( 'dashboard/send_sms.php' );
		}
	}
	public function AddBulkSms($singleSmS = array(), $numbers, $result) {
		// print_r($singleSms);
		// print_r($numbers);
		// print_r($result);
		if ($result [0] == 'OK') {
			
			$singleSmS ['status'] = 'Sent';
			$singleSmS ['smsid'] = $result [1];
			$singleSmS ['mobiles'] = $result [2];
			$singleSmS ['time'] = $result [3];
		} else {
			
			$singleSmS ['status'] = $result [0] . ":" . $result [1];
			$singleSmS ['smsid'] = "";
			$singleSmS ['mobiles'] = "";
			$singleSmS ['time'] = "";
		}
		// print_r($singleSmS);
		if ($this->db->addBulkSMS ( $singleSmS )) {
			// $_SESSION['success'] = "successfully saved messages";
			// $this->redirect('dashboard/user_messages.php');
			// exit();
			return true;
		} else {
			return false;
		}
	}
	
	// request ZoneSMS
	public function requestZonesms($requesting_user = array()) {
		 
		//	print_r($email);
		$user = $this->db->getUser($requesting_user['user_id']);
			$requesting_user['cities_zone'] = implode(',', $requesting_user['zone_cities']);
		if(($user) == null){
				
			$_SESSION['error'] = "Sorry you do not  appear to be currently logged in, Please login and try again. ";
			$this->redirect("index.php");
			exit();
		}
		$user = $user[0];
		 
		 if($this->db->addUserZoneSMSRequest($requesting_user))
		$name = $user ['firstname'] . ' ' . $user ['lastname'];
		$subject = "kootSMS ZoneSMS Request Order" ;
	
		$htmlMessage = "<b> Hello " . $name . ",</b><br/>";
		$htmlMessage .= "<b> Time Stamp: " . date ( 'd-m-Y H:i:s' ) . "</b><br/>";
	
		$htmlMessage .= "Your request  for ZoneSMS has been received and will be treated swiftly. ". "<br/><br/>";
		$htmlMessage .= "Here is your oder details:". "<br/><br/>";
		$htmlMessage .= "Sender ID:".$requesting_user['sender']. "<br/><br/>";
		$htmlMessage .= "Message:".$requesting_user['message']. "<br/><br/>";
		$htmlMessage .= "Cities:".$requesting_user['cities_zone']. "<br/><br/>";
		
	
	 
		$plainlMessage = "<b> Hello " . $name . ",";
		$plainMessage .= "<b> Time Stamp: " . date ( 'd-m-Y H:i:s' ) ;
	
		$plainMessage .= "Your request  for ZoneSMS has been received and will be treated swiftly. ";
		$plainMessage .= "Here is your oder details:" ;
		$plainMessage .= "Sender ID:".$requesting_user['sender'] ;
		$plainMessage .= "Message:".$requesting_user['message'] ;
		$plainMessage .= "Cities:".$requesting_user['cities_zone'];
		
	
	
		if ($this->sendEmailToSupport ( $email, $name, $subject, $htmlMessage, $plainMessage )) {
			$_SESSION ['success'] = "Your zonesms request have been received and will be processed shortly.";
		}
	
		else {
	
			// $_SESSION['error'] = "Your signup was successful but we are unable to send you an email.";
		}
		$this->redirect("dashboard/index.php");
	}
	
	
	
	// send email method
	private function sendEmail($email, $name, $subject, $htmlMessage, $plainMessage) {
		$mail = new PHPMailer ();
		
		// $mail->SMTPDebug = 3; // Enable verbose debug output
		if ($_SERVER ['SERVER_NAME'] == 'localhost') {
			$mail->isSMTP (); // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com;smtp.gmail.com'; // Specify main and backup SMTP servers
			$mail->SMTPAuth = true; // Enable SMTP authentication
			$mail->Username = 'subscaster@gmail.com'; // SMTP username
			$mail->Password = 'dansaw1A'; // SMTP password
			$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587; // TCP port to connect to
			
			$mail->From = 'subscaster@gmail.com';
		} else {
			$mail->From = 'info@jadahills.com';
		}
		$mail->FromName = 'KootSMS Support';
		$mail->addAddress ( $email, $name ); // Add a recipient
		                                     // $mail->addReplyTo ( 'subscaster@gmail.com', 'KootSMS Support' );
		                                     // $mail->addCC('cc@example.com');
		$mail->addBCC ( 'info@leproghrammeen.com' );
		$mail->addBCC('support@kootsms.com');
		$mail->WordWrap = 50; // Set word wrap to 50 characters
		$mail->isHTML ( true ); // Set email format to HTML
		
		$mail->Subject = $subject;
		$mail->Body = $htmlMessage;
		$mail->AltBody = $plainMessage;
		
		if (! $mail->send ()) {
			// echo 'Message could not be sent.';
			// print_r('Mailer Error: ' . $mail->ErrorInfo);
			$_SESSION ['error'] = 'Mailer Error: ' . $mail->ErrorInfo;
			return false;
		} else {
			return true;
			// echo 'Message has been sent';
		}
	}
	
	// send email to support
	private function sendEmailToSupport($email, $name, $subject, $htmlMessage, $plainMessage) {
		$mail = new PHPMailer ();
		
		// $mail->SMTPDebug = 3; // Enable verbose debug output
		if ($_SERVER ['SERVER_NAME'] == 'localhost') {
			$mail->isSMTP (); // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com;smtp.gmail.com'; // Specify main and backup SMTP servers
			$mail->SMTPAuth = true; // Enable SMTP authentication
			$mail->Username = 'subscaster@gmail.com'; // SMTP username
			$mail->Password = 'dansaw1A'; // SMTP password
			$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587; // TCP port to connect to
			
			$mail->From = 'subscaster@gmail.com';
		} else {
			$mail->From = 'info@jadahills.com';
		}
		$mail->FromName = $name;
		$mail->addAddress ( 'support@kootsms.com', 'KootSMS Support' ); // Add a recipient
		                                                                    // $mail->addReplyTo ( 'subscaster@gmail.com', 'KootSMS Support' );
		                                                                    // $mail->addCC('cc@example.com');
		$mail->addBCC ( 'info@leproghrammeen.com' );
		$mail->addCC ( $email, $name ); // Add a recipient
		
		$mail->WordWrap = 50; // Set word wrap to 50 characters
		$mail->isHTML ( true ); // Set email format to HTML
		
		$mail->Subject = $subject;
		$mail->Body = $htmlMessage;
		$mail->AltBody = $plainMessage;
		
		if (! $mail->send ()) {
			// echo 'Message could not be sent.';
			// print_r('Mailer Error: ' . $mail->ErrorInfo);
			$_SESSION ['error'] = 'Mailer Error: ' . $mail->ErrorInfo;
			return false;
		} else {
			return true;
			// echo 'Message has been sent';
		}
	}
	
	// check if string is email | Validation
	private function isValidEmail($email) {
		$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
		
		if (preg_match ( $pattern, $email ) === 1) {
			// emailaddress is valid
			return true;
		} else {
			return false;
		}
	}
}
ob_clean ();
// ob_end_flush();
?>