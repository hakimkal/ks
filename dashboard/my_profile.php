
<?php $pageName = 'KootSMS My Profile';?>
<?php


require (dirname ( dirname ( __FILE__ ) ) . '/includes/app_controller.php');
$mc->checkLogin ( true );
$mc->isCustomer ( true );

$User = $mc->getUser($_SESSION['User']['id']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>KootSMS User Profile</title>

<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"
	type="text/css" />

<!-- Theme -->
<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet"
	href="assets/css/fontawesome/font-awesome.min.css">

<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700'
	rel='stylesheet' type='text/css'>
<link
	href="plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"
	rel="stylesheet" media="screen">
<!--=== JavaScript ===-->

<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>
<script type="text/javascript"
	src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script>


<!-- Smartphone Touch Events -->
<script type="text/javascript"
	src="plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript"
	src="plugins/event.swipe/jquery.event.move.js"></script>
<script type="text/javascript"
	src="plugins/event.swipe/jquery.event.swipe.js"></script>

<!-- General -->
<script type="text/javascript" src="assets/js/libs/breakpoints.js"></script>
<script type="text/javascript" src="plugins/respond/respond.min.js"></script>
<!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
<script type="text/javascript" src="plugins/cookie/jquery.cookie.min.js"></script>
<script type="text/javascript"
	src="plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript"
	src="plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>


<script type="text/javascript"
	src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.min.js"></script>
<script type="text/javascript"
	src="plugins/flot/jquery.flot.tooltip.min.js"></script>
<script type="text/javascript"
	src="plugins/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript"
	src="plugins/flot/jquery.flot.time.min.js"></script>
<script type="text/javascript"
	src="plugins/flot/jquery.flot.growraf.min.js"></script>

<script type="text/javascript"
	src="plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript"
	src="plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript"
	src="plugins/blockui/jquery.blockUI.min.js"></script>
<script type="text/javascript"
	src="plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"
	charset="UTF-8"></script>

<!-- App -->
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/plugins.js"></script>
<script type="text/javascript"
	src="assets/js/plugins.form-components.js"></script>

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
<script type="text/javascript"
	src="assets/js/demo/charts/chart_filled_blue.js"></script>
</head>

<body>


	<div id="container">
		<div class="container">
			<!-- Breadcrumbs line -->
			<div class="crumbs">
					

					<?php include 'top_header.php';?>
				</div>
			<!-- /Breadcrumbs line -->

			<br> <br> <br> <br> <br> <br>


			<div class="row">
				<!DOCTYPE html>
				<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>User Profile</title>

<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"
	type="text/css" />

<!-- Theme -->
<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet"
	href="assets/css/fontawesome/font-awesome.min.css">

<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700'
	rel='stylesheet' type='text/css'>

<!--=== JavaScript ===-->

<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>
<script type="text/javascript"
	src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script>


<!-- Smartphone Touch Events -->
<script type="text/javascript"
	src="plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript"
	src="plugins/event.swipe/jquery.event.move.js"></script>
<script type="text/javascript"
	src="plugins/event.swipe/jquery.event.swipe.js"></script>

<!-- General -->
<script type="text/javascript" src="assets/js/libs/breakpoints.js"></script>
<script type="text/javascript" src="plugins/respond/respond.min.js"></script>
<!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
<script type="text/javascript" src="plugins/cookie/jquery.cookie.min.js"></script>
<script type="text/javascript"
	src="plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript"
	src="plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>


<script type="text/javascript"
	src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.min.js"></script>
<script type="text/javascript"
	src="plugins/flot/jquery.flot.tooltip.min.js"></script>
<script type="text/javascript"
	src="plugins/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript"
	src="plugins/flot/jquery.flot.time.min.js"></script>
<script type="text/javascript"
	src="plugins/flot/jquery.flot.growraf.min.js"></script>

<script type="text/javascript"
	src="plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript"
	src="plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript"
	src="plugins/blockui/jquery.blockUI.min.js"></script>

<!-- App -->
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/plugins.js"></script>
<script type="text/javascript"
	src="assets/js/plugins.form-components.js"></script>

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
<script type="text/javascript"
	src="assets/js/demo/charts/chart_filled_blue.js"></script>
</head>

<body>


	<div id="container">
		<div class="container">


			 

			<!--=== Page Content ===-->
			<!--=== Inline Tabs ===-->
			<div class="row">
				<div class="col-md-12">
					<!-- Tabs-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">

							<li><a href="#tab_edit_account" data-toggle="tab">Edit Profile</a></li>
						</ul>



						<div class="col-md-12 form-vertical no-margin">
							<div class="widget">
								<div class="widget-header"></div>
								<div class="widget-content">
									<div class="row">

										<div class="col-md-3">
											<div class="list-group">
<?php 
if($_SERVER['SERVER_NAME'] == 'localhost'){
$fl = realpath($_SERVER['DOCUMENT_ROOT'] );
 
//echo $fl;
}
else{
$fl = $_SERVER['DOCUMENT_ROOT'].'/kootsms/';
}
//print_r($User);
?>
												<img src="<?php echo str_replace($fl, '',$User['company_logo']);?>" alt="">


											</div>
										</div>


										<form
											action="<?php echo BASE_URL;?>/includes/app_controller.php"
											method="post" enctype="multipart/form-data">


											<input type="hidden" name="MyProfile[id]"
												value="<?php echo $User['id'];?>">
<input type="hidden" name="MyProfile[company_logo]"
												value="<?php echo $User['company_logo'];?>">
											<div class="col-md-8 col-lg-10">
												<div class="form-group">

													<div class="main_popup1_1">
														<p>
															<strong>Company Logo</strong>
														</p>
													</div>

													<input type="hidden" name="_method" value="put" />
													<div class="main_popup1_1">
														<img src="" /> <input type="file" name="edituploadedimage"
															id="company_logo" class="main_input_pass">

													</div>
													<p></p>


													<label class="control-label padding-top-10px">Full Name:</label>
													<input type="text" name="MyProfile[name]"
														class="form-control"
														value="<?php echo $_SESSION['User']['lastname'];?>  <?php echo $_SESSION['User']['firstname'];?> "
														disabled="disabled"> <label
														class="control-label padding-top-10px">Email:</label> <input
														type="text" name="MyProfile[email]" class="form-control"
														value="<?php echo $User['email'];?> " disabled="disabled">
												</div>
											</div>
									
									</div>

								</div>
								<!-- /.row -->
								<div class="row">


									<div class="col-md-8 col-lg-10">
										<div class="form-group">
											<label class="control-label">Company Name:</label> <input
												type="text" name="MyProfile[company_name]"
												class="form-control"
												value="<?php echo $User['company_name'];?>"
												placeholder="Your Company Name">
										</div>

										<div class="form-group">
											<label class="control-label">Designation:</label> <input
												type="text" name="MyProfile[designation]"
												class="form-control" placeholder=""
												value="<?php echo $User['designation'];?>">
										</div>

										<br>
									</div>
								</div>
								<!-- /.row -->
							</div>
							<!-- /.widget-content -->
						</div>
						<!-- /.widget -->

						<div class="form-actions">
							<button type="submit" id="button" name="button"
								class="sign_button">Update profile</button>
						</div>
					</div>
					<!-- /.col-md-12 -->
					</form>
				</div>
				<!-- /Edit Account -->
			</div>
			<!-- /.tab-content -->
		</div>
		<!--END TABS-->
	</div>
			
			</div>
			<!-- /.row -->
			<!-- /Page Content -->

		</div>
	</div>





	</div>
	</div>
	</div>
</body>
</html>



<?php  include(dirname(dirname( __FILE__)).'/notifier.php');?>
