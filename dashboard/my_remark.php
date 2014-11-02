
<?php $pageName = 'Say something about our services';?>
<?php require(dirname(dirname(__FILE__)).'/includes/app_controller.php');
$mc->checkLogin(true);
$mc->isCustomer(true);

?>
 
	
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>KootSMS Create Contact</title>

	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Theme -->
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<link href="plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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


	<script type="text/javascript" src="plugins/sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.tooltip.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.resize.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.time.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.growraf.min.js"></script>

	<script type="text/javascript" src="plugins/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="plugins/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="plugins/blockui/jquery.blockUI.min.js"></script>
	<script type="text/javascript" src="plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>

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
	<script type="text/javascript" src="assets/js/demo/charts/chart_filled_blue.js"></script>
</head>

<body>

	
	<div id="container">
		<div class="container">
				<!-- Breadcrumbs line -->
				<div class="crumbs">
					

					<?php include 'top_header.php';?>
				</div>
				<!-- /Breadcrumbs line -->

				 <br><br><br> <br><br><br>

	
	<div class="row">
 	 
 				 

				<!--=== Page Content ===-->
				<!--=== Inline Tabs ===-->
				<div class="row">
					<div class="col-md-12">
						<!-- Tabs-->
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								 
								<li><a href="#tab_edit_account" data-toggle="tab">Customer Remark</a></li>
							</ul>
							

							
										<div class="col-md-12 form-vertical no-margin">
											<div class="widget">
												<div class="widget-header">
													
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-4 col-lg-2">
															<strong class="subtitle padding-top-10px">Customer's Remark</strong>
														 
														</div>
														
														
														
<form action="<?php echo BASE_URL;?>/includes/app_controller.php" method="post">



 													<div class="col-md-8 col-lg-10">
															<div class="form-group">
				 
		 	 
	 
															
															
															 
													<div class="row">
														 

														<div class="col-md-8 col-lg-10">
															 
														 
															<div class="form-group">
															 <input type="hidden" name=Testimonial[user_id]" value= "<?php echo $_SESSION['User']['id'];?>">
																<textarea name="Testimonial[remark]" class="form-control" cols="3" required="" rows="5" placeholder="Remark..."></textarea>
															</div>
															<br>
														</div>
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->

											<div class="form-actions">
												<button type="submit" id="button" name="button" class="sign_button">Submit Remarks</button>
											</div>
										</div> <!-- /.col-md-12 -->
									</form>
								</div>
								<!-- /Edit Account -->
							</div> <!-- /.tab-content -->
						</div>
						<!--END TABS-->
					</div>
				</div> <!-- /.row -->
				<!-- /Page Content -->
			</div>
	</div>
 
	
	 
		</div></div>	 
			</body>
</html>

 

<?php  include(dirname(dirname( __FILE__)).'/notifier.php');?>
