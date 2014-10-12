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

  <title>KOOT SMS</title>
  

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
	
	
	 $itemID =  $_GET['item'];
	//echo $itemID . '<br/>';
	//echo $_SESSION['cart'][0]['price'];
	// var_dump($_SESSION);
	?>	
	<?php if(!isset($_SESSION['jump_out'])):?>
<iframe name="the_iframe" onLoad="calcHeight();" scrolling="no" width="100%"  id="the_iframe" src="checkout/checkout.php?item=<?php echo $itemID;?>&item_id=<?php echo $_SESSION['cart'][$itemID]['item_id'];?>&item_price=<?php echo $_SESSION['cart'][$itemID]['price'];?>" frameborder="0" allowtransparency="true"></iframe>
<?php elseif (isset($_SESSION['jump_out']) && $_SESSION['jump_out']=="1"):?>

<?php $mc->redirect('payment.php');?>

<?php endif;?>
</section>

 
  
</body>
</html>
<?php  include('notifier.php');?>