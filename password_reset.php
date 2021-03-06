<?php include('includes/app_controller.php');?>
<?php  echo BASE_URL; ?>

<?php $user=$mc->getUserFromToken(trim($_GET['token']))[0];

?>
<!DOCTYPE html>
<html class="no-js" lang="en"> 
<head>
  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, maximum-scale=1, user-scalable=no" />

  <title>KOOT SMS Password Reset</title>
  

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
		
		<div id="myModal3" class="reveal-modal" style="width:500px;">
			
			<div class="main_popup">
			<div class="main_popup1">
			<div class="main_popup1_1">
			<h1> Password Reset Link </h1>
			
			</div>
			
			<?php  include('includes/forgotpasswordform.php');?>
			
			
			</div>
			</div>
			
			<a class="close-reveal-modal"><img src="images/cross.png"></a>
		
		</div>
		

<div id="main-container">

<?php include 'main_nav.php';?>


	


<section id="home" style="background: none !important;">
	<div class="row col-md-6" style="width:50%;">





	
			 
			<h1> Reset Password:  </h1>
			 <?php //print_r($user);?>
<form method="post" action="includes/app_controller.php">
			 
			<div class="main_popup1_1">
			<p>Password</p>
			</div>
			<div class="main_popup1_1">
			<input type="password" name="ResetPass[password]" required="required"   class="main_input_pass">
			</div>
			
			
			<div class="main_popup1_1">
			<p>Password Again</p>
			</div>
			<div class="main_popup1_1">
			<input type="password" name="ResetPass[password_verify]" required="required"   class="main_input_pass">
			<input type="hidden" name="ResetPass[id]"  value="<?php echo $user['id'];?>" class="main_input_pass">
			<input type="hidden" name="ResetPass[firstname]"  value="<?php echo $user['firstname'];?>" class="main_input_pass">
			<input type="hidden" name="ResetPass[lastname]"  value="<?php echo $user['lastname'];?>" class="main_input_pass">
			
			<input type="hidden" name="_method"  value="reset_password" class="main_input_pass">
		
			</div>
			
			<div class="main_popup1_1_button">
			<button type="submit" id="button" name="button" class="login_button">Change Password</button>
			</div>
			 
			 
			</form>
 



  </div></section>
   

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

  
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/jquery.flexslider-min.js"></script>
  <script src="javascripts/inview.js"></script>
  <script src="javascripts/smooth-scroll.js"></script>
  <script src="javascripts/scripts.js"></script>
  

  
</body>
</html>
<?php  include('notifier.php');?>

</script>
