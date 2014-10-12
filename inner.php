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
			<h1>Login</h1>
			</div>
			<div class="main_popup1_1">
			<p>Email</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="email" id="email" class="main_input">
			</div>
			<div class="main_popup1_1">
			<p>Password</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="email" id="email" class="main_input_pass">
			</div>
			<div class="main_popup1_1_button">
			<button type="submit" id="button" name="button" class="login_button">Login</button>
			</div>
			<div class="or">
			
			</div>
			<div class="main_popup1_1_button1">
			<img src="images/loginwithfacebook.png" class="facebook">
			</div>
			<div class="main_popup1_1_button">
			<a href="#" class="fogot">Forgot Password</a> | <a href="#" class="fogot">Sign Up</a>
			</div>
			</div>
			</div>
			
			<a class="close-reveal-modal"><img src="images/cross.png"></a>
		
		</div>
		
		
		<div id="myModal2" class="reveal-modal">
			
			<div class="main_popup">
			<div class="main_popup1">
			<div class="main_popup1_1">
			<h1>Register</h1>
			</div>
			
			<div class="main_popup1_1">
			<p>Name</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="email" id="email" class="main_input">
			</div>
			<div class="main_popup1_1">
			<p>Email</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="email" id="email" class="main_input_pass">
			</div>
			<div class="main_popup1_1">
			<p>Password</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="email" id="email" class="main_input_pass">
			</div>
			
			<div class="main_popup1_1">
			<p>City</p>
			</div>
			<div class="main_popup1_1">
			<select class="main_input_pass" style="width:100%; border:none;">
			<option>City Name</option>
			<option>City Name</option>
			<option>City Name</option>
			<option>City Name</option>
			<option>City Name</option>
			</select>
			</div>
			
			<div class="main_popup1_1">
			<p>Mobile No</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="email" id="email" class="main_input_pass">
			</div>
			
			<div class="main_popup1_1_button">
			<button type="submit" id="button" name="button" class="sign_button">Sign Up</button>
			</div>
			
			<div class="main_popup1_1_button">
			<a href="#" class="fogot">You agree to our <b>terms of use</b></a>
			</div>
			</div>
			</div>
			
			<a class="close-reveal-modal"><img src="images/cross.png"></a>
		
		</div>

<div id="main-container">
<div id="main-nav">
<div class="top_header">
<div class="row">

<div class="top_left">

<a href="#" class="top_left_link">Support</a> | <a href="#" class="top_left_link">Contact</a>

</div>

<div class="login_btn">

<div class="social_new">
<div class="social_new1"><a href="#" class="twiter"></a></div>
<div class="social_new1"><a href="#" class="google"></a></div>
<div class="social_new1"><a href="#" class="facebook"></a></div>
</div>

<div class="login_btn1">
<a href="#" class="lgo_link" data-reveal-id="myModal">Login</a> <span class="login_btn1_span">|</span>
</div>
<div class="login_btn1">
<a href="#" class="lgo_link" data-reveal-id="myModal2">Sign Up</a>
</div>
</div>
</div>
</div>

	<div class="row">
			<div class="twelve columns">
			<div id="logo" class="left animated fadeInDown">
				<img src="images/logo1.png"/>
			</div>
			
			<div id="mobile-toggle" class="show-for-small"><i class="entypo list"></i></div>
			<div id="nav-holder" class="right">
				<ul>
					<li><a href="#features-scroll" class="scroll"><div class="blue-btn"> BULK SMS</div></a></li>
					<li><a href="#gallery-scroll" class="scroll"><div class="blue-btn">ZONE SMS</div></a></li>
					<li><a href="#pricing-scroll" class="scroll"><div class="blue-btn">MMS</div></a></li>
					<li><a href="#faq-scroll" class="scroll"><div class="blue-btn">VOICE MSGS</div></a></li>
					
				</ul>
			</div>
		</div>
	</div>
</div>









<section id="feature-list" class="even-section" style="margin:0 0 50px 0;">
<iframe name="the_iframe" onLoad="calcHeight();" scrolling="no" width="100%"  id="the_iframe" src="page/index.html" frameborder="0" allowtransparency="true"></iframe>
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

  
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/jquery.flexslider-min.js"></script>
  <script src="javascripts/inview.js"></script>
  <script src="javascripts/smooth-scroll.js"></script>
  <script src="javascripts/scripts.js"></script>
  

  
</body>
</html>
