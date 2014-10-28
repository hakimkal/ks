<?php 

$DBHOST= 'localhost';
$DBUSER= 'root';
$DBPASS= 'pass';
$DBNAME ='kootsms';

if($_SERVER['SERVER_NAME'] != 'localhost'){
	define('UPLOAD_DIR', dirname(dirname(__FILE__))."/uploads");
	$base_url = str_replace($_SERVER['DOCUMENT_ROOT'],"/") . dirname(dirname(__FILE__));
	
	define('BASE_URL', $base_url);
}
else{
	define('UPLOAD_DIR', $base_url."/uploads");
	$base_url = 'http://localhost/ks1';
	
	define('BASE_URL', $base_url);
}
?>