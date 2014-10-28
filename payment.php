<?php

//ini_set ( 'display_errors', 'Off' );
//error_reporting ( 0 );
?>
<?php include('includes/app_controller.php');?>

<!DOCTYPE html>
 <html class="no-js" lang="en"> 
<head>
  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, maximum-scale=1, user-scalable=no" />

  <title>KOOT SMS Payment</title>
  

  <link rel="stylesheet" href="stylesheets/foundation.css">
  <link rel="stylesheet" href="stylesheets/flexslider.css">
  <link rel="stylesheet" href="stylesheets/animate.css">
  <link rel="stylesheet" href="stylesheets/entypo.css">
  <link rel="stylesheet" href="stylesheets/style.css">
  <link rel="stylesheet" href="stylesheets/responsive.css">
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lily+Script+One' rel='stylesheet' type='text/css'>

  <script src="javascripts/modernizr.foundation.js"></script>
  
  <script language="JavaScript">
function calcHeight()
{
  //find the height of the internal page
  var the_height=
    document.getElementById('the_iframe').contentWindow.
      document.body.scrollHeight;

  //change the height of the iframe
  document.getElementById('the_iframe').height=
      the_height;
}
</script>

 <!-- pop up -->
	  	<link rel="stylesheet" href="stylesheets/reveal.css">	
	  	
		<!-- Attach necessary scripts -->
		<!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="javascripts/jquery.reveal.js"></script>
<!-- pop up -->
  
</head>
<body>

 <div id="myModal" class="reveal-modal">
			
			<div class="main_popup">
			<div class="main_popup1">
			<div class="main_popup1_1">
			<?php include('includes/loginform.php');?>
			
			<?php  unset($_SESSION['jump_out']);?>
			</div>
			</div>
			
			<a class="close-reveal-modal"><img src="images/cross.png"></a>
		
		</div>
		
		
		<div id="myModal2" class="reveal-modal" style="width:500px;">
			
			<div class="main_popup">
			<div class="main_popup1">
			<div class="main_popup1_1">
			<h1>Register</h1>
			</div>
			
			<?php  include('includes/signupform.php');?>
			
			
			</div>
			</div>
			
			<a class="close-reveal-modal"><img src="images/cross.png"></a>
		
		</div>
	

<div id="main-container">

<?php include 'main_nav.php';?>

<section id="feature-list" class="even-section" style="margin:50px 0 50px 0;">

<br/><br/><br/><br/>
<?php 
	//var_dump($_SESSION['u_debug']);
	
	 $itemID =  $_GET['item'];
	//echo $itemID . '<br/>';
	//echo $_SESSION['cart'][0]['price'];
	// var_dump($_SESSION);
	?>	
	<?php //include 'checkout/paypal-mockform.php';?>
<!-- <iframe name="the_iframe" onLoad="calcHeight();" scrolling="no" width="100%"  id="the_iframe" src="checkout/paypal-mockform.php?item=<?php echo $itemID;?>&item_id=<?php echo $_SESSION['cart'][$itemID]['item_id'];?>&item_price=<?php echo $_SESSION['cart'][$itemID]['price'];?>" frameborder="0" allowtransparency="true"></iframe>
-->

	<?php 
	
echo "Go to Paypal and return";
	// Prepare GET data
	$query = array();
	$query['notify_url'] = 'http://jadahills.com/ipn';
	$query['cmd'] = '_cart';
	$query['upload'] = '1';
	$query['business'] = 'social@jackeyes.com';
	$query['address_override'] = '1';
	$query['first_name'] = $first_name;
	$query['last_name'] = $last_name;
	$query['email'] = $email;
	$query['address1'] = $ship_to_address;
	$query['city'] = $ship_to_city;
	$query['state'] = $ship_to_state;
	$query['zip'] = $ship_to_zip;
	$query['item_name_'.$i] = $item['description'];
	$query['quantity_'.$i] = $item['quantity'];
	$query['amount_'.$i] = $item['info']['price'];
	
	// Prepare query string
	$query_string = http_build_query($query);
	
	//header('Location: https://www.paypal.com/cgi-bin/webscr?' . $query_string)
	
	?>
	
	</section>

<div class="test">
<img src="images/checkout.png">
</div>

<section id="footer">
	<div class="row inner-section">
	
		<div class="three columns">
			<h5 class="footer-title">NAVIGATE</h5>
			
			<ul>
				<li><a href="#features-scroll" class="scroll">BULK SMS</a></li>
				<li><a href="#gallery-scroll" class="scroll">ZONE SMS</a></li>
				<li><a href="#pricing-scroll" class="scroll">MMS</a></li>
				<li><a href="#faq-scroll" class="scroll">VOICE MSGS</a></li>
			</ul>
		</div>
		
		<div class="three columns">
			<h5 class="footer-title">ABOUT US</h5>
			
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
		    </p>
		</div>
		
		<div class="three columns">
			<h5 class="footer-title">STAY INFORMED</h5>
			
			<div class="details-error-wrap hide">Please enter a valid email address</div>
			<input class="newsletter-email left" type="text" placeholder="Your Email Address" />
			<input class="newsletter-btn right btn form-send" type="submit" value="Subscribe" />
			<div class="hide green-btn newsletter-btn right btn form-sent">Subscribed</div>
			
		</div>
		
		<div class="three columns text-right">
			<h5 class="footer-title">CONTACT</h5>
			<div class="mail-link">
				<i class="entypo mail text-white"></i>
				<a href="mailto:craiggarner800@gmail.com">example@gmail.com</a>
				
			</div>
			<div class="footer-social">
				<a href="#"><i class="entypo-social facebook text-white"></i></a>
				<a href="#"><i class="entypo-social twitter text-white"></i></a>
				<a href="#"><i class="entypo-social behance text-white"></i></a>
				<a href="#"><i class="entypo-social dribbble text-white"></i></a>
				<a href="#"><i class="entypo-social vimeo text-white"></i></a>
			</div>
			<img src="images/logo_footer.png"/>
			
		</div>
	
	</div>
</section>

</div>

   <script src="js/jquery.js"></script> 
  <script src="js/bootstrap.js"></script>
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/foundation.min.js"></script>
 
  <!-- Initialize JS Plugins -->
  <script src="javascripts/jquery.flexslider-min.js"></script>
  <script src="javascripts/inview.js"></script>
  <script src="javascripts/smooth-scroll.js"></script>
  <script src="javascripts/scripts.js"></script>
  
	<script defer src="js/custom.js"></script>
  
</body>
</html>
<?php  include('notifier.php');?>