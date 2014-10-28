<?php

ini_set ( 'display_errors', 'Off' );
error_reporting ( 0 );
?>
<?php include(dirname(dirname(__FILE__)).'/includes/app_controller.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>KootSMS Checkout</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta http-equiv="X-UA-Compatible" content="IE=100">

<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic'
	rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round'
	rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round'
	rel='stylesheet' type='text/css'>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">



</head>
<body>

	<div id="maincontainer">
		<section id="product">
			<div class="container">

				<div class="row" style="margin-top: 100px;">
					<!-- Account Login-->
					<div class="col-lg-9">
						<h1 class="heading1">
							<span class="maintext">Checkout</span><span class="subtext">
								Checkout Process Steps</span>
						</h1>


						<div class="checkoutsteptitle">
							Step 1: KootSMS Details<a class="modify">Modify</a>
						</div>
						<div class="checkoutstep">
							<div class="row">
								<form class="form-horizontal"
									action="<?php echo BASE_URL;?>/includes/app_controller.php"
									method="post">
                <fieldset>
                  <div class="col-lg-6">
                    <div class="control-group">
                      <label class="control-label" >First Name<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" required name="User[firstname]" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Last Name<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class="" name="User[lastname]"  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >E-Mail<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class="" required name="User[email]"  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Mobile Number<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class="" required  name="User[mobile]"  value="">
                      </div>
                    </div>
                   
                   
                    <div class="control-group">
                      <label class="control-label" >Password<span class="red">*</span></label>
                      <div class="controls">
                        <input type="password" name="User[password]"  required class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Password Confirm<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  name="User[password_verify]" required >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    
                  
                    
                    <div class="control-group">
                      <label class="control-label" >City<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class="" name="User[city]"  required>
                      </div>
                    </div>
                     	<input type="hidden" name="User[user_type]" value="customer">
                     
                    
                  </div>
               
            </div>
            <button class="btn btn-orange pull-right" type="submit">Continue</button> </fieldset>
              </form>
          </div>
           
         
          
          
           
          
		  
		  <div class="row">
              
                <div class="col-lg-4 pull-right">
                  
                 
                </div>
              
            </div>
          
          </div>
      
	  <div class="col-lg-3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span> Checkout Steps</span></h2>
              <ul class="nav nav-list categories">
                
                <li>
                  <a href="#">Billing Details</a>
                </li>
                 
                                
                <li>
                  <a href="#"> Payment Method</a>
                </li>
              </ul>
            </div>
          </aside>
        </div>
	  
        </div>      

			
        
      </div>
    </div>
  </section>
</div>

<script src="js/jquery.js"></script> 
<script src="js/bootstrap.js"></script> 
<!--<script src="js/respond.min.js"></script> 
<script src="js/application.js"></script> 
<script src="js/bootstrap-tooltip.js"></script> 
<script defer src="js/jquery.fancybox.js"></script> 
<script defer src="js/jquery.flexslider.js"></script> 
<script type="text/javascript" src="js/jquery.tweet.js"></script> 
<script  src="js/cloud-zoom.1.0.2.js"></script> 
<script  type="text/javascript" src="js/jquery.validate.js"></script> 
<script type="text/javascript"  src="js/jquery.carouFredSel-6.1.0-packed.js"></script> 
<script type="text/javascript"  src="js/jquery.mousewheel.min.js"></script> 
<script type="text/javascript"  src="js/jquery.touchSwipe.min.js"></script> 
<script type="text/javascript"  src="js/jquery.ba-throttle-debounce.min.js"></script> 
<script src="js/jquery.isotope.min.js"></script> -->
<script defer src="js/custom.js"></script>
</body>
</html>