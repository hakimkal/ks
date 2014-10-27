<?php $pageName = 'KootSMS Customer  Dashboard';?>
<?php require(dirname(dirname(__FILE__)).'/includes/app_controller.php');
$mc->checkLogin(true); 
$mc->isCustomer(true);
//$_SESSION['success'] = "Welcome";

?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>KootSMS Customer  Dashboard</title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Theme -->
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/new.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	<!--=== JavaScript ===-->

	<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script>

	
	<!-- Smartphone Touch Events -->
	<script type="text/javascript" src="plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript" src="plugins/event.swipe/jquery.event.move.js"></script>
	<script type="text/javascript" src="plugins/event.swipe/jquery.event.swipe.js"></script>

	<!-- General -->
	<script type="text/javascript" src="assets/js/libs/breakpoints.js"></script>
	<script type="text/javascript" src="plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
	<script type="text/javascript" src="plugins/cookie/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>

	
	<![endif]-->
	<script type="text/javascript" src="plugins/sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.tooltip.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.resize.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.time.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.growraf.min.js"></script>
	<script type="text/javascript" src="plugins/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

	<script type="text/javascript" src="plugins/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="plugins/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="plugins/blockui/jquery.blockUI.min.js"></script>

	<script type="text/javascript" src="plugins/fullcalendar/fullcalendar.min.js"></script>

	<!-- Noty -->
	<script type="text/javascript" src="plugins/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="plugins/noty/layouts/top.js"></script>
	<script type="text/javascript" src="plugins/noty/themes/default.js"></script>

	<!-- Forms -->
	<script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="plugins/select2/select2.min.js"></script>

	<!-- App -->
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/plugins.js"></script>
	<script type="text/javascript" src="assets/js/plugins.form-components.js"></script>

	<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins
	});
	</script>

	<!-- Demo JS -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<script type="text/javascript" src="assets/js/demo/pages_calendar.js"></script>
	<script type="text/javascript" src="assets/js/demo/charts/chart_filled_blue.js"></script>
	<script type="text/javascript" src="assets/js/demo/charts/chart_simple.js"></script>
    
    
    
    <!-- pop up -->
	  	<link rel="stylesheet" href="assets/css/reveal.css">	
	  	
		<!-- Attach necessary scripts -->
		<!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.reveal.js"></script>
<!-- pop up -->
    
    
</head>

<body>

<?php include 'top_header.php';?>
        

	<div id="myModal3" class="reveal-modal" style="width:500px;">
			
			<div class="main_popup">
			<div class="main_popup1">
			<div class="main_popup1_1">
			<h1>Request More Credits</h1>
			<span class="pull-right"><code>Expect a response with 2 - 4 hours please.</code></span>
			</div>
			
			<?php  include('../includes/request_credit_form.php');?>
			
			
			</div>
			</div>
			
			<a class="close-reveal-modal"><img src="../images/cross.png"></a>
		
		</div> 
	<div id="container">
	<div class="container">
				<!-- Breadcrumbs line -->
				<div class="crumbs">
					 
					 
					 
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header" style="margin-top:50px;">
					<div class="page-title">
						<h3>Dashboard</h3>
						<span>Hello, <?php echo $_SESSION['User']['firstname'];?>!</span>
					</div>

					<!-- Page Stats -->
					
					<!-- /Page Stats -->
				</div>
				<!-- /Page Header -->

				<!--=== Blue Chart ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
                        <div class="for_icon">
							<div class="for_icon1">
                            
                            <div class="for_icon1_1">
                            <div class="for_icon_head">
                            <div class="for_icon_head1">
                          
                           <a href="#" data-reveal-id="myModal"><img src="assets/img/sms.png"></a>
                       
                            </div>
                            <div class="for_icon_head1">
                            <?php if($sms_credit_balance['sms_credits'] > 0 ):?>
                            <a href="send_bulksms.php" class="sms_link">Bulk sms</a>
                            
                               <?php else:?>
                            <a href="Javascript:alert('No Sufficient credit for this service!');" class="sms_link">Bulk sms</a>
                         	 <p>
                            <a href="#" class="btn" data-reveal-id="myModal3">Request Credit</a> 
                          </p>
                          <?php endif;?>
                            </div>
                            </div>
                            </div>
                            
                            <div class="for_icon1_1">
                            <div class="for_icon_head1">
                            <a href="#" data-reveal-id="myModal2"><img src="assets/img/sms2.png"></a>
                            </div>
                            <div class="for_icon_head1">
                             <?php if($sms_credit_balance['zonesms_credits'] > 0 ):?>
                            <a href="zone_sms.php" class="sms_link">Zone sms</a>
                              <?php else:?>
                            <a href="Javascript:alert('No Sufficient credit for this service!');" class="sms_link">Zone sms</a>
                          <p>
                            <a href="#" class="btn" data-reveal-id="myModal3">Request Credit</a> 
                          </p>
                          <?php endif;?>
                            </div>
                            </div>
                            
                            <div class="for_icon1_1">
                            <div class="for_icon_head1">
                            <img src="assets/img/msm.png">
                            </div>
                            <div class="for_icon_head1">
                               <?php if($sms_credit_balance['mms_credits'] > 0 ):?>
                            <a href="#" class="sms_link">mms</a>
                            <?php else:?>
                            <a href="Javascript:alert('No Sufficient credit for this service!');" class="sms_link">mms</a>
                           <p>
                            <a href="#" class="btn" data-reveal-id="myModal3">Request Credit</a> 
                          </p>
                          <?php endif;?>
                            </div>
                            </div>
                            
                            <div class="for_icon1_2">
                            <div class="for_icon_head1">
                            <img src="assets/img/voice.png">
                            </div>
                            <div class="for_icon_head1">
                             <?php if($sms_credit_balance['voice_msg_credits'] > 0 ):?>
                            <a href="#" class="sms_link">Voice sms</a>
                            
                             <?php else:?>
                            <a href="Javascript:alert('No Sufficient credit for this service!');" class="sms_link">Voice sms</a>
                           <p>
                            <a href="#" class="btn" data-reveal-id="myModal3">Request Credit</a> 
                          </p>
                          <?php endif;?>
                            </div>
                            </div>
                            
                            </div>
                            </div>
						</div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
				<!-- /Blue Chart -->

				<div class="row">
					<!--=== Sin/Cos Chart ===-->
					<div class="col-md-6">
						<div class="widget">
						<div class="last_login">
                        
                        <div class="last_login1">
                        
                        <div class="last_login1_1">
                        <div class="last_login1_head"><h1>Last Login</h1></div>
                        <!--<div class="last_login1_head">dsfdsfdsf</div>-->
                        </div>
                        
                        <div class="last_login1_2">
                        <?php 
                        
                      
                        
                        $last_login = $mc->db->get_user_last_login($conn, $_SESSION['User']['id']);
                     //   print_r($last_login);
                        ?>
                        <div class="last_login1_head"><h2><?php 
                        
                        // Outputs: 12/28/2002 - %V,%G,%Y = 52,2002,2002
                       // echo "12/28/2002 - %V,%G,%Y = " . strftime("%V,%G,%Y", strtotime("12/28/2002")) . "\n";
                        // 28-01-2009 16:29:22
                        //echo $last_login[0]['created'];
                        echo strftime("%d-%m-%Y %H:%M:%S", strtotime($last_login[0]['created']));
                        ?></h2></div>
                        <!--<div class="last_login1_head">dsfdsfdsf</div>-->
                        </div>
                        
                        </div>
                        
                       <div class="last_login1">
                        
                        <div class="last_login1_1">
                        <div class="last_login1_head"><h1>Last Compaign Sent</h1></div>
                        <!--<div class="last_login1_head">dsfdsfdsf</div>-->
                        </div>
                        
                        <div class="last_login1_2">
                        
                        <?php    $last_campaign = $mc->db->get_user_last_campaign($conn, $_SESSION['User']['id']);
                        
                        
                        ?>
                        <div class="last_login1_head"><h2>
                        
                       
                        <?php   echo strftime("%d-%m-%Y %H:%M:%S", strtotime($last_campaign[0]['created']));?>
                        </h2></div>
                        
                        
                        <!--<div class="last_login1_head">dsfdsfdsf</div>-->
                        </div>
                        
                        
                        
                        
                        </div>
                        
                        
                        <?php //user approved zonesms 
                        
                        $check_approval = $mc->checkUserZonesmsApproveStatus($_SESSION['User']['id']);
                        if(count($check_approval)): ?>
                        
                        <div class="last_login1">
                        
                        <div class="last_login1_1">
                        <div class="last_login1_head"><h1> <?php echo count($check_approval);?> Approved Zonesms</h1></div>
                        <!--<div class="last_login1_head">dsfdsfdsf</div>-->
                        </div>
                        
                        <div class="last_login1_2">
                        
                        <?php    $last_campaign = $mc->db->get_user_last_campaign($conn, $_SESSION['User']['id']);
                        
                        
                        ?>
                        <div class="last_login1_head"><h2>
                        
                       
                      <a href="my_zone_sms.php" class="btn btn-success">Launch</a>
                        </h2></div>
                        
                        
                      
                        </div>
                        
                        <?php endif;?>
                        
                        
                        </div>
                        
                        
                        </div>
							 <!-- /.widget-content -->
						</div> <!-- /.widget .box -->
					</div> <!-- /.col-md-6 -->
					<!-- /Sin/Cos Chart -->

					<!--=== Static Table ===-->
					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> My Contacts</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								 	<table class="table table-striped table-checkable table-hover">
									<thead>
										<tr>
											<th class="checkbox-column">
												<input type="checkbox" class="uniform">
											</th>
											<th class="hidden-xs">First Name</th>
											<th>Last Name</th>
											<th>Phone</th>
											<th class="align-center">Action</th>
										</tr>
									</thead>
									<form action="send_bulksms.php" method="post">
									<tbody>
									
										<?php include('contacts.php');?>
										 
									</tbody>
								</table>
								<div class="row">
									 
								</div> <!-- /.row -->
							</div> <!-- /.widget-content -->
						</div> <!-- /.widget -->
					</div> <!-- /.col-md-6 -->
					<!-- /Static Table -->
				</div> <!-- /.row -->

				<div class="row">
					<!--=== Calendar ===-->
					<div class="col-md-6">
						 <!-- /.widget box -->
					</div> <!-- /.col-md-6 -->
					<!-- /Calendar -->

					<!--=== Feeds (with Tabs) ===-->
					 
					<!-- /Feeds (with Tabs) -->
				</div> <!-- /.row -->
				<!-- /Page Content -->
			</div>
	</div>

</body>
</html>