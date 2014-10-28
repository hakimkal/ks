<?php

ini_set ( 'display_errors', 'Off' );
error_reporting ( 0 );
?>
<?php include(dirname(dirname(__FILE__)).'/includes/app_controller.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>KootSMS Checkout Final</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta http-equiv="X-UA-Compatible" content="IE=100" >

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">



</head>
<body>

<div id="maincontainer">
  <section id="product">
    <div class="container">
   
      <div class="row" style="margin-top:100px;">        
        <!-- Account Login-->
        <div class="col-lg-9">
          <h1 class="heading1"><span class="maintext">Checkout</span><span class="subtext">   Final Process</span></h1>
           
           
          
           
         
          
          
          <div class="checkoutsteptitle">Final Step : Paypal Payment  <a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <p>Paypal</p>
             
            <br>
            <div class="pull-right">
            
            </div>
			
          </div>
		  
		  <div class="row">
              
                <div class="col-lg-4 pull-right">
                  <table class="table table-striped table-bordered ">
                    <tbody>
                      
                       
                       
                      <tr>
                        <td><span class="extra bold totalamout">Total :</span></td>
                        <td><span class="bold totalamout">$<?php echo $_SESSION['Cart']['total_amount'];?></span></td>
                      </tr>
                    </tbody>
                  </table>
                    <?php include 'paypal-mockform.php';?>
                  <a href="<?php echo BASE_URL. '/index.php#features-scroll'?>" class="btn btn-orange pull-right mr10" >Add a Package</a>
                </div>
              
            </div>
          
          </div>
      
	  <div class="col-lg-3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span> Checkout Steps</span></h2>
              <ul class="nav nav-list categories">
                         
                <li>
                  <a href="#"> Payment </a>
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