<?php
// require ('../config/settings.inc.php');
require (dirname ( dirname ( __FILE__ ) ) . '/config/settings.inc.php');
// echo $db_conn;
global $DBHOST;
global $DBPASS;
global $DBNAME;
global $DBUSER;
class MainModel {
	
	// register new user
	public function registerNewUser($user = array()) {
		$qry = 'INSERT INTO users(email,password ,firstname,lastname,city,mobile,user_type,created)
				 values(';
		
		$qry .= "'" . mysql_escape_string ( $user ['email'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $user ['password'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $user ['firstname'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $user ['lastname'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $user ['city'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $user ['mobile'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $user ['user_type'] ) . "'" . ',';
		$qry .= "NOW()";
		$qry .= ')';
		
		$user_id = $this->execInsertQuery ( $qry );
		if (! empty ( $user ['Package'] ) && ($user_id > 0)) {
			
			$query = 'INSERT INTO user_packages(package_id, user_id,price_paid,start_period,end_period,discounted,payment_method,sms_unit)
					 values(';
			
			$query .= "'" . mysql_escape_string ( $user ['Package'] ['id'] ) . "'" . ',';
			$query .= "'" . mysql_escape_string ( $user_id ) . "'" . ',';
			$query .= "'" . mysql_escape_string ( $user ['Package'] ['price_paid'] ) . "'" . ',';
			$query .= "'" . mysql_escape_string ( date ( "Y-m-d H:i:s" ) ) . "'" . ',';
			$query .= "'" . mysql_escape_string ( date ( 'Y-m-d H:i:s', strtotime ( "+30 days" ) ) ) . "'" . ',';
			$query .= "'" . mysql_escape_string ( "No" ) . "'" . ',';
			$query .= "'" . mysql_escape_string ( $user ['Package'] ['payment_method'] ) . "',";
			$query .= "'" . mysql_escape_string ( $user ['Package'] ['sms_unit'] ) . "'";
			$query .= ')';
			return $this->execQuery ( $query );
		}
		return true;
		// print_r($query);
	}
	
	// Authenticate user and return data for session
	public function authAndLogin($user) {
		$qry = "SELECT count(*) as singleRecord FROM users where email=";
		
		$qry .= "'" . mysql_escape_string ( $user ['email'] ) . "'" . ' and password=';
		$qry .= "'" . mysql_escape_string ( sha1 ( $user ['password'] ) ) . "'" . ';';
		print_r ( $qry );
		$singleUser = $this->execSingleQueryResult ( $qry );
		print_r ( $singleUser );
		if ($singleUser ['singleRecord'] == 1) {
			$qry = "";
			$singleUser = null;
			$qry = "SELECT users.*, user_packages.package_id,user_packages.sms_unit,user_packages.start_period, user_packages.end_period  FROM users  LEft JOIN user_packages ON users.id=user_packages.user_id where users.email=";
			
			$qry .= "'" . mysql_escape_string ( $user ['email'] ) . "'" . ' and password=';
			$qry .= "'" . mysql_escape_string ( sha1 ( $user ['password'] ) ) . "'" . ';';
			$user = $this->execSingleQueryResult ( $qry );
			$this->recordLoginEntry ( $user );
			return $user;
		}
	}
	public function recordLoginEntry($user = array()) {
		$qry = 'INSERT INTO user_logins(email,user_id,created) values(';
		
		$qry .= "'" . mysql_escape_string ( $user ['email'] ) . "'" . ',';
		
		$qry .= "'" . mysql_escape_string ( $user ['id'] ) . "'" . ',';
		
		$qry .= "NOW()";
		$qry .= ')';
		
		return $this->execQuery ( $qry );
	}
	
	// get user last login
	public function get_user_last_login($conn, $user_id) {
		
		// $query = ('SELECT user_contacts.firstname,user_contacts.lastname, user_contacts.phone, user_contacts.gender, user_contacts.birthday FROM user_contacts INNER JOIN users ON user_contacts.user_id = users.id where user_id=' . $user_id . ' ORDER BY user_contacts.firstname ASC');
		$query = ('SELECT  user_logins.id,  user_logins.email,user_logins.user_id,user_logins.created  FROM  user_logins where user_id=' . $user_id . ' ORDER BY  user_logins.created DESC LIMIT :start,:end');
		
		// print_r($query);
		return $this->get_pdo_record ( $conn, $query, 0, 1 );
	}
	
	// get Credit Balance
	public function getSMSCreditBalance($conn, $user_id) {
		$query = ('SELECT  user_credit_balances.*  FROM  user_credit_balances where user_id=' . $user_id . ' ORDER BY  user_credit_balances.created DESC LIMIT :start,:end');
		return $this->get_pdo_record ( $conn, $query, 0, 1 );
	}
	
	// get user last campaign
	public function get_user_last_campaign($conn, $user_id) {
		$query = ('SELECT  messages.id,  messages.sender, messages.message, messages.phone, messages.status,messages.smsid, messages.time,messages.created  FROM  messages INNER JOIN users ON  messages.user_id = users.id where user_id=' . $user_id . ' ORDER BY  messages.sender DESC LIMIT :start,:end');
		
		// print_r($query);
		return $this->get_pdo_record ( $conn, $query, 0, 1 );
	}
	// get Users
	public function getUsers($filter) {
		$qry = "Select id, firstname as firstname, lastname as lastname , email as email,mobile as mobile, created as created from users where user_type= '" . $filter . "'";
		
		$data = $this->execGetQuery ( $qry );
		return $data;
	}
	
	// get Users
	public function getUser($filter) {
		$qry = "Select id, firstname as firstname, lastname as lastname , email as email,mobile as mobile, created as created from users where id= '" . $filter . "'";
		
		$data = $this->execGetQuery ( $qry );
		return $data;
	}
	
	
	
	// get get Price Per Unit
	public function getPricePerUnit($filter) {
		$qry = ('Select id, sms_credits_value as sms_credits_value, zonesms_credits_value as zonesms_credits_value, mms_credits_value as mms_credits_value, cost_per_sms as cost_per_sms , cost_per_zonesms as cost_per_zonesms,cost_per_mms as cost_per_mms, cost_per_voice as cost_per_voice, created as created from user_credit_purchases where user_id= ' . $filter . '  ORDER BY  user_credit_purchases.created DESC ');
	
		$data = $this->execGetQuery ( $qry );
		//print_r($data);
		return $data;
	}
	
	
	// get UserByEmails
	public function getUserByEmail($filter) {
		$qry = "Select id, firstname as firstname, lastname as lastname , email as email,mobile as mobile, token as token,created as created from users where email= '" . $filter . "'";
		
		$data = $this->execGetQuery ( $qry );
		return $data;
	}
	// get UserByToken
	public function getUserByToken($filter) {
		$qry = "Select id, firstname as firstname, lastname as lastname , email as email,mobile as mobile, token as token,created as created from users where token= '" . $filter . "'";
		
		$data = $this->execGetQuery ( $qry );
		return $data;
	}
	
	// Set User Token for password reset
	public function setUserPasswordToken($package = array()) {
		print_r ( $package );
		$qry = 'update users set ';
		
		$qry .= "token = '" . mysql_escape_string ( $package ['token'] ) . "'";
		
		$qry .= " where users.id =" . $package ['id'];
		print_r ( $qry );
		return $this->execQuery ( $qry );
	}
	
	// change password
	public function ChangeUserPassword($package = array()) {
		print_r ( $package );
		$qry = 'update users set ';
		
		$qry .= "token ='',";
		$qry .= "password ='" . mysql_escape_string ( $package ['password'] ) . "'";
		$qry .= " where users.id =" . $package ['id'];
		print_r ( $qry );
		return $this->execQuery ( $qry );
	}
	// add Package
	public function addPackage($package = array()) {
		$qry = 'INSERT INTO packages(title,price, vat,details ,image_path,created) values(';
		
		$qry .= "'" . mysql_escape_string ( $package ['title'] ) . "'" . ',';
		
		// $qry .= "'" . mysql_escape_string ( $package ['price'] ) . "'" . ',';
		// $qry .= "'" . mysql_escape_string ( $package ['vat'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $package ['details'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $package ['image_path'] ) . "'" . ',';
		
		$qry .= "NOW()";
		$qry .= ')';
		
		return $this->execQuery ( $qry );
	}
	// add credit value for customers by admin
	public function addCreditValue($user = array()) {
		$query = 'INSERT INTO user_credit_purchases(user_id,created,modified,sms_credits_value,mms_credits_value,zonesms_credits_value,voice_msg_credits_value,';
		$query .= 'amount_paid,cost_per_sms,cost_per_mms,cost_per_voice,cost_per_zonesms,added_by,valid_for,expiry_date,last_modified_by)  VALUES (';
		
		$query .= $user ['id'] . ',';
		$query .= "NOW(),";
		$query .= "NOW(),";
		$query .= mysql_escape_string ( trim ( $user ['Credit'] ['sms_credits_value'] ) ) . ',';
		$query .= mysql_escape_string ( trim ( $user ['Credit'] ['mms_credits_value'] ) ) . ',';
		$query .= mysql_escape_string ( trim ( $user ['Credit'] ['zonesms_credits_value'] ) ) . ',';
		$query .= mysql_escape_string ( trim ( $user ['Credit'] ['voice_msg_credits_value'] ) ) . ',';
		$query .= mysql_escape_string ( trim ( $user ['Credit'] ['amount_paid'] ) ) . ',';
		$query .= mysql_escape_string ( trim ( $user ['Credit'] ['cost_per_sms'] ) ) . ',';
		$query .= mysql_escape_string ( trim ( $user ['Credit'] ['cost_per_mms'] ) ) . ',';
		$query .= mysql_escape_string ( trim ( $user ['Credit'] ['cost_per_voice'] ) ) . ',';
		$query .= mysql_escape_string ( trim ( $user ['Credit'] ['cost_per_zonesms'] ) ) . ',';
		$query .= "'" . mysql_escape_string ( trim ( $user ['Credit'] ['added_by'] ) ) . "'" . ',';
		$query .= "'" . mysql_escape_string ( trim ( $user ['Credit'] ['valid_for'] ) ) . " days'" . ',';
		$query .= "'" . trim ( date ( 'Y-m-d H:i:s', strtotime ( "+" . $user ['Credit'] ['valid_for'] . " days" ) ) ) . "'" . ',';
		$query .= "'" . mysql_escape_string ( trim ( $user ['Credit'] ['last_modified_by'] ) ) . "')";
		
		// $query .= "'" . mysql_escape_string ( date ( 'Y-m-d H:i:s', strtotime ( "+30 days" ) ) ) . "'" . ',';
		
		// print_r($query);
		$add_purchase = $this->execInsertQuery ( trim ( $query ) );
		$credit_balance = array ();
		$credit_balance ['Credit'] ['user_id'] = $user ['id'];
		$credit_balance ['Credit'] ['sms_credits'] = $user ['Credit'] ['sms_credits_value'];
		$credit_balance ['Credit'] ['mms_credits'] = $user ['Credit'] ['mms_credits_value'];
		$credit_balance ['Credit'] ['zonesms_credits'] = $user ['Credit'] ['zonesms_credits_value'];
		$credit_balance ['Credit'] ['voice_msg_credits'] = $user ['Credit'] ['voice_msg_credits_value'];
		$credit_balance ['Credit'] ['added_by'] = $user ['Credit'] ['added_by'];
		$credit_balance ['Credit'] ['last_modified_by'] = $user ['Credit'] ['last_modified_by'];
		$credit_balance ["Credit"] ['valid_for'] = $user ['Credit'] ['valid_for'];
		$credit_balance ['Credit'] ['expiry_date'] = (date ( 'Y-m-d H:i:s', strtotime ( "+" . $user ['Credit'] ['valid_for'] . " days" ) ));
		$update_user_balance = $this->updateUserCreditBalance ( $credit_balance );
		return true;
	}
	// update user credit balance
	public function updateUserCreditBalance($user = array()) {
		$query_select = "SELECT * from user_credit_balances where user_id=" . $user ['Credit'] ['user_id'];
		
		$get_user = $this->execSingleQueryResult ( $query_select );
		// print_r($get_user);
		print_r ( $user );
		if (empty ( $get_user )) {
			
			$insert_query = "INSERT INTO user_credit_balances(user_id,created,modified,sms_credits,mms_credits,
					zonesms_credits,voice_msg_credits,added_by,last_modified_by,expiry_date)VALUES(";
			$insert_query .= "'" . mysql_escape_string ( $user ['Credit'] ['user_id'] ) . "'" . ',';
			$insert_query .= "'" . mysql_escape_string ( date ( "Y-m-d H:i:s" ) ) . "'" . ',';
			$insert_query .= "'" . mysql_escape_string ( date ( "Y-m-d H:i:s" ) ) . "'" . ',';
			$insert_query .= "'" . mysql_escape_string ( $user ['Credit'] ['sms_credits'] ) . "'" . ',';
			$insert_query .= "'" . mysql_escape_string ( $user ['Credit'] ['mms_credits'] ) . "'" . ',';
			$insert_query .= "'" . mysql_escape_string ( $user ['Credit'] ['zonesms_credits'] ) . "'" . ',';
			$insert_query .= "'" . mysql_escape_string ( $user ['Credit'] ['voice_msg_credits'] ) . "'" . ',';
			$insert_query .= "'" . mysql_escape_string ( $user ['Credit'] ['added_by'] ) . "'" . ',';
			$insert_query .= "'" . mysql_escape_string ( $user ['Credit'] ['last_modified_by'] ) . "'" . ',';
			$insert_query .= "'" . mysql_escape_string ( $user ['Credit'] ['expiry_date'] ) . "'";
			$insert_query .= ")";
			print_r ( $insert_query );
			return $this->execInsertQuery ( $insert_query );
		} else {
			$update_query = "UPDATE  user_credit_balances SET ";
			
			$update_query .= "modified=" . "'" . mysql_escape_string ( date ( "Y-m-d H:i:s" ) ) . "'" . ',';
			// mysql_escape_string ( date ( "Y-m-d H:i:s" ) ) . "'" . ',';
			$update_query .= "sms_credits=" . "'" . mysql_escape_string ( ($get_user ['sms_credits'] + $user ['Credit'] ['sms_credits']) ) . "',";
			$update_query .= "mms_credits=" . "'" . mysql_escape_string ( ($get_user ['mms_credits'] + $user ['Credit'] ['mms_credits']) ) . "',";
			$update_query .= "zonesms_credits=" . "'" . mysql_escape_string ( ($get_user ['zonesms_credits'] + $user ['Credit'] ['zonesms_credits']) ) . "',";
			$update_query .= "voice_msg_credits = " . "'" . mysql_escape_string ( ($get_user ['voice_msg_credits'] + $user ['Credit'] ['voice_msg_credits']) ) . "',";
			$update_query .= "added_by= " . "'" . mysql_escape_string ( $user ['Credit'] ['added_by'] ) . "',";
			$update_query .= "last_modified_by=" . "'" . mysql_escape_string ( $user ['Credit'] ['last_modified_by'] ) . "',";
			$update_query .= "expiry_date=" . "'" . mysql_escape_string ( ($user ['Credit'] ['expiry_date']) ) . "'";
			// $update_query .= "expiry_date="."'". 'DATE_ADD(expiry_date,INTERVAL'. $user['Credit']['valid_for']." DAY)" ."'";
			$update_query .= " WHERE user_id =" . $user ['Credit'] ['user_id'];
			// print_r( $update_query);
			return $this->execQuery ( $update_query );
		}
	}
	// update Package
	public function updatePackage($package = array()) {
		$qry = 'update packages set ';
		
		$qry .= "title = '" . mysql_escape_string ( $package ['title'] ) . "'" . ',';
		
		// $qry .= " price= '" . mysql_escape_string ( $package ['price'] ) . "'" . ',';
		// $qry .= "vat= '" . mysql_escape_string ( $package ['vat'] ) . "'" . ',';
		$qry .= "details = '" . mysql_escape_string ( $package ['details'] ) . "'" . ',';
		$qry .= "image_path = '" . mysql_escape_string ( $package ['image_path'] ) . "'";
		
		$qry .= " where id =" . $package ['id'];
		return $this->execQuery ( $qry );
	}
	// get Package
	public function getPackage($id) {
		$qry = "Select * from  packages where id = " . $id;
		
		$data = $this->execSingleQueryResult ( $qry );
		return $data;
	}
	// get packages
	public function getPackages($recursive = 0) {
		if ($recursive == 0) {
			$qry = "Select * from packages ";
		} elseif ($recursive == 1) {
			$qry = "SELECT packages.id, packages.title as p_title,packages.sms_unit as p_sms_unit, packages.details ,packages.image_path,features.title, features.price,GROUP_CONCAT(DISTINCT feature) as feature FROM packages
		
				LEft JOIN features ON packages.id=features.package_id GROUP BY packages.title";
		}
		$data = $this->execGetQuery ( $qry );
		return $data;
	}
	
	// delete record
	public function delete($model, $id) {
		$qry = "delete from " . $model . ' where id=' . $id;
		if ($this->execQuery ( $qry )) {
			return true;
		} else {
			return false;
		}
	}
	// add Feature
	public function addFeature($features = array()) {
		$feature_features = count ( $features ['feature'] );
		// print_r($feature_features);
		if ($feature_features > 0) {
			for($p = 0; $p < $feature_features; $p ++) {
				if ($features ['feature'] [$p] == "") {
					// echo "line 117 \n";
					// print_r($features['feature'][$p]);
					
					unset ( $features ['feature'] [$p] );
				}
			}
		}
		
		// print_r($features);
		for($p = 0; $p < count ( $features ['feature'] ); $p ++) {
			$qry = 'INSERT INTO features(title,price, feature,package_id ,created) values(';
			$qry .= "'" . mysql_escape_string ( $features ['title'] ) . "'" . ',';
			
			$qry .= "'" . mysql_escape_string ( $features ['price'] ) . "'" . ',';
			$qry .= "'<li>" . mysql_escape_string ( $features ['feature'] [$p] ) . "</li>'" . ',';
			$qry .= "'" . mysql_escape_string ( $features ['package_id'] ) . "'" . ',';
			
			$qry .= "NOW()";
			$qry .= ')';
			$this->execQuery ( $qry );
		}
		
		// echo $qry;
		
		return true;
	}
	
	// get Features
	
	// get packages
	public function getFeatures($recursive = 0) {
		if ($recursive == 0) {
			$qry = "Select * from features ";
		} elseif ($recursive == 1) {
			$qry = "SELECT packages.id, packages.title as p_title, packages.details ,packages.image_path,features.title, features.price,GROUP_CONCAT(DISTINCT feature) as feature FROM packages
	
			 	LEft JOIN features ON packages.id=features.package_id GROUP BY packages.title";
		}
		$data = $this->execGetQuery ( $qry );
		return $data;
	}
	
	// get Feature
	public function getFeature($id) {
		$qry = "Select * from  features where id = " . $id;
		
		$data = $this->execSingleQueryResult ( $qry );
		return $data;
	}
	// update Package
	public function updateFeature($package = array()) {
		$qry = 'update features set ';
		
		$qry .= "title = '" . mysql_escape_string ( $package ['title'] ) . "'" . ',';
		
		$qry .= " price= '" . mysql_escape_string ( $package ['price'] ) . "'" . ',';
		$qry .= "feature = '<li>" . mysql_escape_string ( $package ['feature'] ) . "</li>'";
		
		$qry .= " where id =" . $package ['id'];
		return $this->execQuery ( $qry );
	}
	
	// Customer related zone
	public function isUserACustomer($user) {
		// print_r($user);
		$qry = "SELECT * from users where  id='" . mysql_escape_string ( $user ['id'] ) . "'";
		
		$user = $this->execSingleQueryResult ( $qry );
		// echo "<br><br><br><br><br><br><br><br><br>";
		// print_r($user);
		if ($user ['user_type'] == 'customer') {
			
			return true;
		} else {
			return False;
		}
	}
	// Is admin user?
	public function isAdmin($user) {
		// print_r($user);
		$qry = "SELECT * from users where  id='" . mysql_escape_string ( $user ['id'] ) . "'";
		
		$user = $this->execSingleQueryResult ( $qry );
		// echo "<br><br><br><br><br><br><br><br><br>";
		// print_r($user);
		if ($user ['user_type'] == 'admin' || $user ['user_type'] == 'staff') {
			
			return true;
		} else {
			return False;
		}
	}
	public function addUserContact($contact = array()) {
		$query = 'INSERT INTO user_contacts(  user_id,firstname,lastname, phone,birthday, gender,created, modified)
					 values(';
		
		$query .= "'" . mysql_escape_string ( $contact ['user_id'] ) . "'" . ',';
		$query .= "'" . mysql_escape_string ( ucfirst ( $contact ['firstname'] ) ) . "'" . ',';
		$query .= "'" . mysql_escape_string ( ucfirst ( $contact ['lastname'] ) ) . "'" . ',';
		$query .= "'" . mysql_escape_string ( $contact ['phone'] ) . "'" . ',';
		$query .= "'" . mysql_escape_string ( $contact ['birthday'] ) . "'" . ',';
		$query .= "'" . mysql_escape_string ( ucfirst ( $contact ['gender'] ) ) . "'" . ',';
		$query .= "NOW(),";
		$query .= "NOW()";
		
		$query .= ')';
		
		return $this->execQuery ( $query );
	}
	
	// get PDO Connection
	public function get_pdo_connection() {
		global $DBHOST;
		global $DBPASS;
		global $DBNAME;
		global $DBUSER;
		$conn = new PDO ( 'mysql:host=' . $DBHOST . ';dbname=' . $DBNAME, $DBUSER, $DBPASS );
		$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		return $conn;
	}
	// $conn->query('SELECT COUNT(*) FROM user_contacts')->fetchColumn();
	// get counts
	public function get_user_contacts_count($conn, $user_id) {
		$table = 'user_contacts';
		$query = 'SELECT COUNT(*) FROM ' . $table . ' Where user_id=' . $user_id;
		// print_r($query);
		return $this->get_pdo_count ( $conn, $query );
	}
	public function get_user_messages_count($conn, $user_id) {
		$table = 'messages';
		$query = 'SELECT COUNT(*) FROM ' . $table . ' where user_id=' . $user_id;
		// print_r($query);
		return $this->get_pdo_count ( $conn, $query );
	}
	// get user Contacts
	public function get_user_contacts($conn, $user_id, $limit_start, $limit_end) {
		if (($limit_end == - 10) && ($limit_start = - 10)) {
			// $query = ('SELECT user_contacts.firstname,user_contacts.lastname, user_contacts.phone, user_contacts.gender, user_contacts.birthday FROM user_contacts INNER JOIN users ON user_contacts.user_id = users.id where user_id=' . $user_id . ' ORDER BY user_contacts.firstname ASC');
			$query = ('SELECT user_contacts.id, user_contacts.firstname,user_contacts.lastname, user_contacts.phone, user_contacts.gender, user_contacts.birthday FROM user_contacts INNER JOIN users ON user_contacts.user_id = users.id where user_id=' . $user_id . ' ORDER BY user_contacts.firstname ASC LIMIT :start,:end');
		} else {
			$query = ('SELECT user_contacts.id, user_contacts.firstname,user_contacts.lastname, user_contacts.phone, user_contacts.gender, user_contacts.birthday FROM user_contacts INNER JOIN users ON user_contacts.user_id = users.id where user_id=' . $user_id . ' ORDER BY user_contacts.firstname ASC LIMIT :start,:end');
		}
		// print_r($query);
		return $this->get_pdo_record ( $conn, $query, $limit_start, $limit_end );
	}
	
	// get user Contacts
	public function get_user_messages($conn, $user_id, $limit_start, $limit_end) {
		if (($limit_end == - 10) && ($limit_start = - 10)) {
			// $query = ('SELECT user_contacts.firstname,user_contacts.lastname, user_contacts.phone, user_contacts.gender, user_contacts.birthday FROM user_contacts INNER JOIN users ON user_contacts.user_id = users.id where user_id=' . $user_id . ' ORDER BY user_contacts.firstname ASC');
			$query = ('SELECT  messages.id,  messages.sender, messages.message, messages.phone, messages.status,messages.smsid, messages.time,messages.created  FROM  messages INNER JOIN users ON  messages.user_id = users.id where user_id=' . $user_id . ' ORDER BY  messages.sender DESC LIMIT :start,:end');
		} else {
			// $query = ('SELECT user_contacts.id, user_contacts.firstname,user_contacts.lastname, user_contacts.phone, user_contacts.gender, user_contacts.birthday FROM user_contacts INNER JOIN users ON user_contacts.user_id = users.id where user_id=' . $user_id . ' ORDER BY user_contacts.firstname ASC LIMIT :start,:end');
			$query = ('SELECT  messages.id,  messages.sender,messages.message, messages.phone, messages.status, messages.smsid, messages.time,messages.created FROM  messages INNER JOIN users ON messages.user_id = users.id where user_id=' . $user_id . ' ORDER BY  messages.sender DESC LIMIT :start,:end');
		}
		// print_r($query);
		return $this->get_pdo_record ( $conn, $query, $limit_start, $limit_end );
	}
	// Get singleContact
	public function getUserContact($contact_id, $user_id) {
		$query = "SELECT * from user_contacts where id='" . $contact_id . "' and user_id='" . $user_id . "'";
		return $this->execSingleQueryResult ( $query );
	}
	// add SingleSMS
	public function addSingleSMS($singleSmS = array()) {
		$qry = 'INSERT INTO messages(user_id,sender,phone,message,status,smsid,mobiles,time,created) values(';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['user_id'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['sender'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['phone'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['message'] ) . "'" . ',';
		
		$qry .= "'" . mysql_escape_string ( $singleSmS ['status'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['smsid'] ) . "'" . ',';
		
		$qry .= "'" . mysql_escape_string ( $singleSmS ['mobiles'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['time'] ) . "'" . ',';
		
		$qry .= "NOW()";
		$qry .= ')';
		// print_r($qry);
		return $this->execQuery ( $qry );
	}
	
	// add SingleSMS
	public function addBulkSMS($singleSmS = array()) {
		$qry = 'INSERT INTO messages(user_id,sender,phone,message,status,smsid,mobiles,time,created) values(';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['user_id'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['sender'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['phone'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['message'] ) . "'" . ',';
		
		$qry .= "'" . mysql_escape_string ( $singleSmS ['status'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['smsid'] ) . "'" . ',';
		
		$qry .= "'" . mysql_escape_string ( $singleSmS ['mobiles'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['time'] ) . "'" . ',';
		
		$qry .= "NOW()";
		$qry .= ')';
		// print_r($qry);
		return $this->execQuery ( $qry );
	}
	
	
	// add Banner
	public function addBanner($singleSmS = array()) {
		$qry = 'INSERT INTO banners(`title`,`details`,`image_link`,`image_type`,`created`) VALUES(';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['title'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['details'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['image_link'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['image_type'] ) . "'" . ',';
	
		
	
		$qry .= "NOW()";
		$qry .= ')';
		// print_r($qry);
		return $this->execQuery ( $qry );
	}
	
	// add FAQ
	public function addFaq($singleSmS = array()) {
		$qry = 'INSERT INTO faqs(`title`,`details`,`created`) VALUES(';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['title'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $singleSmS ['details'] ) . "'" . ',';
		 
	
	
		$qry .= "NOW()";
		$qry .= ')';
		// print_r($qry);
		return $this->execQuery ( $qry );
	}
	public function addZoneSMSArea($areas = array()) {
		// $qry = 'START TRANSACTION;';
		// foreach ($areas['areas'] as $k){
		$qry = 'INSERT INTO zone_sms_areas(name, description,created,modified) values(';
		$qry .= "'" . mysql_escape_string ( $areas ['name'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $areas ['description'] ) . "'" . ',';
		$qry .= "NOW(),";
		$qry .= "NOW());";
		
		// }
		
		// $qry.= 'COMMIT;';
		
		return $this->execInsertQuery ( $qry );
	}
	
	// get Zone areas
	public function getZoneareas($filter) {
		$qry = "Select id,  name  as name, description as description , created as created from zone_sms_areas ";
		
		$data = $this->execGetQuery ( $qry );
		return $data;
	}
	// get Zone areas and cities
	public function getZoneareasAndCities() {
		// $qry = "Select zone_sms_areas.name as name, zone_sms_areas.description as description , zone_sms_areas.created as created ,zone_sms_cities.id as id, zone_sms_cities.name as cities ,GROUP_CONCAT(DISTINCT zone_sms_cities.name) from zone_sms_areas LEft JOIN zone_sms_cities ON zone_sms_areas.id=zone_sms_cities.zone_sms_area_id GROUP BY zone_sms_cities.zone_sms_area_id ;
		$qry = "Select    zone_sms_areas.name as  name, zone_sms_areas.description as description , zone_sms_areas.created as created ,zone_sms_cities.id as id, zone_sms_cities.name as cities  from zone_sms_areas  LEft JOIN zone_sms_cities ON zone_sms_areas.id=zone_sms_cities.zone_sms_area_id ORDER BY zone_sms_areas.name ASC ;
		
		";
		
		$data = $this->execGetQuery ( $qry );
		return $data;
	}
	// get zoneSMSArea
	public function getZoneSMSArea($id) {
		$qry = "Select * from  zone_sms_areas where id = " . $id;
		
		$data = $this->execSingleQueryResult ( $qry );
		return $data;
	}
	
	// get Zone areas and cities grouped
	public function getZoneAreasAndCitiesGrouped() {
		// $qry = "Select zone_sms_areas.name as name, zone_sms_areas.description as description , zone_sms_areas.created as created ,zone_sms_cities.id as id, zone_sms_cities.name as cities ,GROUP_CONCAT(DISTINCT zone_sms_cities.name) from zone_sms_areas LEft JOIN zone_sms_cities ON zone_sms_areas.id=zone_sms_cities.zone_sms_area_id GROUP BY zone_sms_cities.zone_sms_area_id ;
		// $qry = "Select zone_sms_areas.id as zone_sms_area_id ,zone_sms_areas.name as name, zone_sms_cities.id as zone_sms_cities_id, zone_sms_cities.name as cities from zone_sms_areas right JOIN zone_sms_cities ON zone_sms_areas.id=zone_sms_cities.zone_sms_area_id ORDER BY zone_sms_areas.name ASC ;
		$qry = "Select zone_sms_areas.id as zone_sms_area_id ,
				zone_sms_areas.name as  name,  GROUP_CONCAT(DISTINCT zone_sms_cities.name) as cities   
				from zone_sms_areas left JOIN zone_sms_cities ON zone_sms_areas.id=zone_sms_cities.zone_sms_area_id  
				 GROUP BY zone_sms_areas.name  ;
		
		";
		// LEft JOIN features ON packages.id=features.package_id GROUP BY packages.title";
		$data = $this->execGetQuery ( $qry );
		return $data;
	}
	
	// update zone area
	public function updateZoneSMSArea($package = array()) {
		$qry = 'update zone_sms_areas set ';
		
		$qry .= "name = '" . mysql_escape_string ( $package ['name'] ) . "'" . ',';
		
		$qry .= " description= '" . mysql_escape_string ( $package ['description'] ) . "'" . ',';
		
		$qry .= "modified=NOW()";
		
		$qry .= " where id =" . $package ['id'];
		return $this->execQuery ( $qry );
	}
	
	// add zone cities
	public function addZoneSMSCities($zoneAndCities = array(), $zoneCounts) {
		print_r ( $zoneAndCities );
		// print_r($zoneCounts);
		// $qry = 'START TRANSACTION;';
		
		for($i = 0; $i < $zoneCounts; $i ++) {
			$qry .= 'INSERT IGNORE INTO zone_sms_cities(name,zone_sms_area_id,created,modified) VALUES(';
			$qry .= " '" . mysql_escape_string ( $zoneAndCities ['name'] [$i] ) . "'" . ',';
			
			$qry .= " " . mysql_escape_string ( $zoneAndCities ['zone_sms_area_id'] ) . ',';
			
			$qry .= "NOW(),";
			$qry .= "NOW());";
			print_r ( $qry );
			$this->execQuery ( $qry );
			unset ( $qry );
		}
		
		// $qry.= 'COMMIT;';
		// print_r($qry);
		// $this->execQuery($qry);
		return true;
	}
	
	// get zoneSMSCity
	public function getZoneSMSAreaCity($id) {
		$qry = "Select * from  zone_sms_cities where id = " . $id;
		
		$data = $this->execSingleQueryResult ( $qry );
		return $data;
	}
	
	// update zone city
	public function updateZoneSMSAreaCity($package = array()) {
		$qry = 'UPDATE zone_sms_cities SET ';
		
		$qry .= "name='" . mysql_escape_string ( $package ['name'] ) . "'" . ',';
		$qry .= "zone_sms_area_id = '" . mysql_escape_string ( $package ['zone_sms_area_id'] ) . "'" . ',';
		
		$qry .= " description= '" . mysql_escape_string ( $package ['description'] ) . "'" . ',';
		
		$qry .= "modified=NOW()";
		
		$qry .= " where id =" . $package ['id'];
		print_r ( $qry );
		return $this->execQuery ( $qry );
	}
	public function addUserZoneSMSRequest($areas = array()) {
		// $qry = 'START TRANSACTION;';
		// foreach ($areas['areas'] as $k){
		$qry = 'Insert into user_zone_sms(`user_id`,`sender`,`message`,`cities_zones`,`delivery_started`,`delivery_end`,`created`,`modified`) values(';
		$qry .= "'" . mysql_escape_string ( $areas ['user_id'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $areas ['sender'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $areas ['message'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $areas ['cities_zones'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $areas ['delivery_started'] ) . "'" . ',';
		$qry .= "'" . mysql_escape_string ( $areas ['delivery_end'] ) . "'" . ',';
		
		$qry .= "NOW(),";
		$qry .= "NOW());";
		
		// }
		
		// $qry.= 'COMMIT;';
		
		return $this->execInsertQuery ( $qry );
	}
	public function get_user_zone_sms_requests_count($conn,$filter= null) {
		$table = 'user_zone_sms';
		if($filter != null){
		$query = 'SELECT COUNT(*) FROM ' . $table .'  where   '. $filter;
		}
		
		else{
			$query = 'SELECT COUNT(*) FROM ' . $table;
		} 
	 // print_r($query);
		return $this->get_pdo_count ( $conn, $query );
	}
	// GEt User ZoneSMS Requests
	public function getUsersZonesmsRequests($conn, $limit_start, $limit_end,$user_id=null,$status=null) {
		if (($limit_end == - 10) && ($limit_start == - 10) && (!$user_id && !$status)) {
			// $query = ('SELECT user_contacts.firstname,user_contacts.lastname, user_contacts.phone, user_contacts.gender, user_contacts.birthday FROM user_contacts INNER JOIN users ON user_contacts.user_id = users.id where user_id=' . $user_id . ' ORDER BY user_contacts.firstname ASC');
			$query = ('SELECT  user_zone_sms.* , users.* from user_zone_sms left JOIN users ON user_zone_sms.user_id = users.id  ' . ' ORDER BY  user_zone_sms.created DESC LIMIT :start,:end');
		} elseif (($limit_end != - 10) && ($limit_start != - 10) && (!$user_id && !$status)) 
	 {
			// $query = ('SELECT user_contacts.id, user_contacts.firstname,user_contacts.lastname, user_contacts.phone, user_contacts.gender, user_contacts.birthday FROM user_contacts INNER JOIN users ON user_contacts.user_id = users.id where user_id=' . $user_id . ' ORDER BY user_contacts.firstname ASC LIMIT :start,:end');
			$query = ('SELECT  user_zone_sms.* ,users.* from user_zone_sms left JOIN users ON user_zone_sms.user_id = users.id ' . ' ORDER BY  user_zone_sms.created DESC LIMIT :start,:end');
		}
		elseif (($limit_end != - 10) && ($limit_start != - 10) && ($user_id && $status)) {
			$query = ('SELECT  user_zone_sms.* ,users.* from user_zone_sms left JOIN users ON user_zone_sms.user_id = users.id where user_id='.$user_id.' and status=\''.$status . '\' ORDER BY  user_zone_sms.created DESC LIMIT :start,:end');
			
		}
		   ///print_r($query);
		return $this->get_pdo_record ( $conn, $query, $limit_start, $limit_end );
	}
	
	// GEt User ZoneSMS Single Request
	public function getUserZonesmsRequest($id) {
		 
			// $query = ('SELECT user_contacts.id, user_contacts.firstname,user_contacts.lastname, user_contacts.phone, user_contacts.gender, user_contacts.birthday FROM user_contacts INNER JOIN users ON user_contacts.user_id = users.id where user_id=' . $user_id . ' ORDER BY user_contacts.firstname ASC LIMIT :start,:end');
			$query = ('SELECT   user_zone_sms.* ,users.id as u_id, users.email,users.firstname, users.lastname from user_zone_sms left JOIN users ON user_zone_sms.user_id = users.id  ' . ' where user_zone_sms.id='. $id);
		 
		// print_r($query);
		return $this->execGetQuery($query)[0];
	}
	//Approve zonesms request 
	
	public function approveZonesmsRequest($id){
		$query = "update user_zone_sms set status='approved'  where id=".$id ;
		  $this->execQuery($query);
		  return $this->getUserZonesmsRequest($id);
		
	}
	
	//Reject zonesms request
	
	public function rejectZonesmsRequest($id){
		$query = "update user_zone_sms set status='reject'  where id=".$id ;
		$this->execQuery($query);
		return $this->getUserZonesmsRequest($id);
	
	}
	//check zonesms approval status 
	
	public function checkUserZonesmsApproval($user_id){
		
			$query = ('SELECT   user_zone_sms.* ,users.id as u_id, users.email,users.firstname, users.lastname from user_zone_sms left JOIN users ON user_zone_sms.user_id = users.id  ' . ' where user_zone_sms.user_id='. $user_id . ' and user_zone_sms.status ="approved"');
	  return $this->execGetQuery($query);
	}
	// Private functions
	private function get_pdo_count($conn, $query) {
		// print_r($query);
		return $conn->query ( $query )->fetchColumn ();
	}
	// get pdo records
	private function get_pdo_record($conn, $query, $limit_start, $limit_end) {
		$stmt = $conn->prepare ( $query );
		
		$stmt->bindParam ( ':start', $limit_start, PDO::PARAM_INT );
		$stmt->bindParam ( ':end', $limit_end, PDO::PARAM_INT );
		
		$stmt->execute ();
		$result = $stmt->fetchAll ();
		
		return $result;
	}
	// start_db_connection($DB_HOST,$DB_USER,$DB_USER_PASSWORD,$DB_NAME);
	private function start_db_connection() {
		global $DBHOST;
		global $DBPASS;
		global $DBNAME;
		global $DBUSER;
		$db_link = mysql_connect ( $DBHOST, $DBUSER, $DBPASS, $DBNAME ) or die ( "Could not connect to the database server" );
		return $db_link;
	}
	private function execQuery($qry) {
		$DB_CONN = $this->start_db_connection ();
		
		global $DBNAME;
		mysql_select_db ( $DBNAME );
		// print_r($qry);
		
		if (mysql_query ( $qry, $DB_CONN )) {
			return true;
		} else {
			die ( mysql_error () );
			return false;
		}
		// mysql_query ( $qry, $DB_CONN ) or die ( mysql_error () );
		// mysql_close ();
	}
	// mysql_insert_id();
	private function execInsertQuery($qry) {
		$DB_CONN = $this->start_db_connection ();
		
		global $DBNAME;
		mysql_select_db ( $DBNAME );
		
		if (mysql_query ( $qry, $DB_CONN )) {
			return mysql_insert_id ();
		} else {
			return 0;
		}
		// mysql_query ( $qry, $DB_CONN ) or die ( mysql_error () );
		mysql_close ();
	}
	private function execGetQuery($qry) {
		$DB_CONN = $this->start_db_connection ();
		
		global $DBNAME;
		mysql_select_db ( $DBNAME );
		$data = array ();
		$result = mysql_query ( $qry, $DB_CONN ) or die ( mysql_error () );
		while ( $row = mysql_fetch_assoc ( $result ) ) {
			array_push ( $data, $row );
		}
		
		mysql_close ();
		
		return $data;
	}
	private function execSingleQueryResult($qry) {
		$DB_CONN = $this->start_db_connection ();
		// print_r($qry);
		global $DBNAME;
		mysql_select_db ( $DBNAME );
		
		$result = mysql_query ( $qry, $DB_CONN ) or die ( mysql_error () );
		$data = mysql_fetch_assoc ( $result );
		mysql_close ();
		
		return $data;
	}
}

?>