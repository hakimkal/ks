<?php

ini_set ( 'display_errors', 'Off' );
error_reporting ( 0 );
?>
<?php include('includes/app_controller.php');?>
<?php

// var_dump($_SESSION['cart']);
ob_start ();
if (isset ( $_GET ['cart_id'] ) && ! isset ( $_GET ['task'] )) :
	?>
<?php

	$cart_id = $_GET ['cart_id'];
	
	$_SESSION ['user_cart'] [$cart_id] ['item_id'] = $_SESSION ['cart'] [$cart_id] ['item_id'];
	$_SESSION ['user_cart'] [$cart_id] ['price'] = $_SESSION ['cart'] [$cart_id] ['price'];
	$_SESSION ['user_cart'] [$cart_id] ['vat'] = $_SESSION ['cart'] [$cart_id] ['vat'];
	$_SESSION ['user_cart'] [$cart_id] ['item_name'] = $_SESSION ['cart'] [$cart_id] ['item_name'];
	$_SESSION ['user_cart'] [$cart_id] ['cart_id'] = $cart_id;
	// print_r($_SESSION['user_cart']);
	$_SESSION ['success'] = "Cart updated!";
	header ( "Location:index.php" );
	?>

<?php 
elseif (isset ( $_GET ['cart_id'] ) && isset ( $_GET ['task'] ) && ($_GET ['task'] == "remove")) :
	
	unset ( $_SESSION ['user_cart'] [$_GET ['cart_id']] );
	$_SESSION ['success'] = "Selected item has been removed from your cart!";
	header ( "Location:cart.php" );
	?>

<?php elseif(!isset($_GET['cart_id'])&& isset($_GET['task']) && ($_GET['task'] == "checkout")):?>
<?php

	
if ($_SESSION ['user_cart']) {
		
		$total_item_price = 0;
		$total_item_vat = 0;
		
		foreach ( $_SESSION ['user_cart'] as $cart_item ) :
			
			$total_item_price += $cart_item ['price'];
			$item_vat = $cart_item ['price'] * $cart_item ['vat'];
			$total_item_vat += $item_vat;
		endforeach
		;
	}
	$_SESSION ['Cart'] ['total_amount'] = $total_item_price + $total_item_vat;
	header ( "Location:checkout/step1.php" );
	?>

 <?php
else :
	
	?>


<!DOCTYPE html>
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8" />

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport"
	content="width=device-width, maximum-scale=1, user-scalable=no" />

<title>Your KOOTSMS Cart</title>

<link href="<?php echo BASE_URL;?>/checkout/css/bootstrap.css"
	rel="stylesheet">
<link
	href="<?php echo BASE_URL;?>/checkout/css/bootstrap-responsive.css"
	rel="stylesheet">
<link rel="stylesheet" href="stylesheets/foundation.css">
<link rel="stylesheet" href="stylesheets/flexslider.css">
<link rel="stylesheet" href="stylesheets/animate.css">
<link rel="stylesheet" href="stylesheets/entypo.css">
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="stylesheet" href="stylesheets/responsive.css">
<link
	href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Montserrat:400,700'
	rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lily+Script+One'
	rel='stylesheet' type='text/css'>

<script src="javascripts/modernizr.foundation.js"></script>

<!-- pop up -->
<link rel="stylesheet" href="stylesheets/reveal.css">

<!-- Attach necessary scripts -->
<!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
<script type="text/javascript"
	src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="javascripts/jquery.reveal.js"></script>



<link href="<?php echo BASE_URL;?>/checkout/css/style.css"
	rel="stylesheet">



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
	</div>
	<div id="main-container">

		<div id="main-nav">
			<div class="top_header">
				<div class="row">

					<div class="top_left">

						<a href="#" class="top_left_link">Support</a> | <a href="#"
							class="top_left_link">Contact</a>

					</div>

					<div class="login_btn">

						<div class="social_new">
							<div class="social_new1">
								<a href="#" class="twiter"></a>
							</div>
							<div class="social_new1">
								<a href="#" class="google"></a>
							</div>
							<div class="social_new1">
								<a href="#" class="facebook"></a>
							</div>
						</div>

						<div class="login_btn1">
							<a href="#" class="lgo_link" data-reveal-id="myModal">Login</a> <span
								class="login_btn1_span">|</span>
						</div>
						<div class="login_btn1">
							<!-- <a href="#" class="lgo_link" data-reveal-id="myModal2">Sign Up</a>-->
							<a href="cart.php" class="lgo_link"> Cart (<?php echo count($_SESSION['user_cart']);?>)</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="twelve columns">
					<div id="logo" class="left animated fadeInDown">
						<img src="images/logo1.png" />
					</div>

					<div id="mobile-toggle" class="show-for-small">
						<i class="entypo list"></i>
					</div>
					<div id="nav-holder" class="right">
						<ul>
							<li><a href="index.php#features-scroll" class="scroll"><div
										class="blue-btn">BULK SMS</div></a></li>
							<li><a href="index.php#features-scroll" class="scroll"><div
										class="blue-btn">ZONE SMS</div></a></li>
							<li><a href="index.php#features-scroll" class="scroll"><div
										class="blue-btn">MMS</div></a></li>
							<li><a href="index.php#features-scroll" class="scroll"><div
										class="blue-btn">VOICE MSGS</div></a></li>

						</ul>
					</div>
				</div>
			</div>
		</div>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<div id="maincontainer">
			<div class="row">

				<div class="col-lg-4 pull-right">
					<table class="table table-striped table-bordered ">
						<tbody>
                    
                    <?php if($_SESSION['user_cart']): ?>
                    
                    <?php $total_item_price = 0 ;	 $total_item_vat = 0 ;?>
                    
                    <?php foreach ($_SESSION['user_cart'] as $cart_item):?>
                    <?php
			$total_item_price += $cart_item ['price'];
			$item_vat = $cart_item ['price'] * $cart_item ['vat'];
			$total_item_vat += $item_vat;
			
			?>
                     <tr>
								<td><span class="extra bold"><?php echo $cart_item['item_name'];?> :</span></td>
								<td><span class="bold">$<?php echo $cart_item['price'];?></span></td>

								<!-- <td><span class="bold"><a
										href="edit_cart.php?task=edit&cart_id=<?php echo $cart_item['cart_id'];?>">Edit
											Item</a></span></td>
-->
								<td><span class="bold"><a
										href="cart.php?task=remove&cart_id=<?php echo $cart_item['cart_id'];?>">Remove</a></span></td>
							</tr>
                    
                    <?php endforeach;?>
                    <?php endif;?>
                    
                    
                      <tr>
								<td colspan="2"><span class="extra bold">Sub-Total :</span></td>
								<td colspan="1"><span class="bold">$<?php echo $total_item_price;?></span></td>
							</tr>

							<tr>
								<td colspan="2"><span class="extra bold">VAT :</span></td>
								<td colspan="1"><span class="bold">$<?php echo $total_item_vat;?></span></td>
							</tr>
							<tr>
								<td colspan="2"><span class="extra bold totalamout">Total :</span></td>
								<td><span class="bold totalamout">$<?php echo ($total_item_price + $total_item_vat); ?></span></td>
							</tr>
						</tbody>
					</table>
					<a href="cart.php?task=checkout" class="btn btn-orange pull-right">
						CheckOut</a> <a href="index.php#features-scroll"
						class="btn btn-orange pull-right mr10">Add a Package</a>
				</div>

			</div>





		</div>









	</div>

	<script src="<?php echo BASE_URL;?>/checkout/js/jquery.js"></script>
	<script src="<?php echo BASE_URL;?>/checkout/js/bootstrap.js"></script>
	<!--<script src="<?php echo BASE_URL;?>/checkout/js/respond.min.js"></script> 
<script src="<?php echo BASE_URL;?>/checkout/js/application.js"></script> 
<script src="<?php echo BASE_URL;?>/checkout/js/bootstrap-tooltip.js"></script> 
<script defer src="<?php echo BASE_URL;?>/checkout/js/jquery.fancybox.js"></script> 
<script defer src="<?php echo BASE_URL;?>/checkout/js/jquery.flexslider.js"></script> 
<script type="text/javascript" src="<?php echo BASE_URL;?>/checkout/js/jquery.tweet.js"></script> 
<script  src="<?php echo BASE_URL;?>/checkout/js/cloud-zoom.1.0.2.js"></script> 
<script  type="text/javascript" src="<?php echo BASE_URL;?>/checkout/js/jquery.validate.js"></script> 
<script type="text/javascript"  src="<?php echo BASE_URL;?>/checkout/js/jquery.carouFredSel-6.1.0-packed.js"></script> 
<script type="text/javascript"  src="<?php echo BASE_URL;?>/checkout/js/jquery.mousewheel.min.js"></script> 
<script type="text/javascript"  src="<?php echo BASE_URL;?>/checkout/js/jquery.touchSwipe.min.js"></script> 
<script type="text/javascript"  src="<?php echo BASE_URL;?>/checkout/js/jquery.ba-throttle-debounce.min.js"></script> 
<script src="<?php echo BASE_URL;?>/checkout/js/jquery.isotope.min.js"></script> -->
	<script defer src="<?php echo BASE_URL;?>/checkout/js/custom.js"></script>
</body>
</html>
<?php  include('notifier.php');?>           
            
            
            

<?php
endif;

// ob_clean();
?>