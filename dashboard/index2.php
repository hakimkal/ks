<?php $pageName = 'KootSMS Customer  Dashboard';?>
<?php require(dirname(dirname(__FILE__)).'/includes/app_controller.php');
$mc->checkLogin(true);
//$_SESSION['success'] = "Welcome";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Dashboard</title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Theme -->
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
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
</head>

<body>

<?php include 'top_header.php';?>

	<div id="container">
	
	<div class="container">
				<!-- Breadcrumbs line -->
					<?php if(!isset($_SESSION['User']['package_id'])):?>
			
				<div class="crumbs">
					 
						 <?php include 'top_header.php';?>
					 
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===--></div>
				<div class="page-header">
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
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Messages  Sent</h4>
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
											<!-- ><th class="checkbox-column">
												<input type="checkbox" class="uniform">
											</th>-->
											<th class="hidden-xs"> Sender</th>
											<th>Mobile No</th>
											<th>Message</th>
											<th class="align-center">Date</th>
                                            <th class="align-center">Delivered</th>
										</tr>
									</thead>
									<tbody>
										<?php include('messages.php');?>
										 
									</tbody>
								</table>
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12">
											<!-- <div class="table-actions">
												<label>Apply action:</label>
												<select class="select2" data-minimum-results-for-search="-1" data-placeholder="Select action...">
													<option value=""></option>
													<option value="Edit">Edit</option>
													<option value="Delete">Delete</option>
													<option value="Move">Move</option>
												</select>
											</div>-->
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
							</div>
							<div class="divider"></div>
							
						</div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
				<!-- /Blue Chart -->

				<div class="row">
					<!--=== Sin/Cos Chart ===-->
					<div class="col-md-6">
						<div class="widget">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> SMS Collection</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
										<span class="btn btn-xs widget-refresh"><i class="icon-refresh"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<div class="tabbable tabbable-custom">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#tab_feed_1" data-toggle="tab">System</a></li>
										
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_feed_1">
											<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible="0">
												<ul class="feeds clearfix">
												<?php include('sms_collections.php');?>
													
													 
												</ul> <!-- /.feeds -->
											</div> <!-- /.scroller -->
										</div> <!-- /#tab_feed_1 -->

										<div class="tab-pane" id="tab_feed_2">
											<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible="0">
												<ul class="feeds clearfix">
													<li>
														<div class="col1">
															<div class="content">
																<div class="content-col1">
																	<div class="label label-success"><i class="icon-plus"></i></div>
																</div>
																<div class="content-col2">
																	<div class="desc">Lorem Ipsum is simply dummy text</div>
																</div>
															</div>
														</div> <!-- /.col1 -->
														<div class="col2">
															<div class="date">1 min ago</div>
														</div> <!-- /.col2 -->
													</li>
													<li>
														<div class="col1">
															<div class="content">
																<div class="content-col1">
																	<div class="label label-success"><i class="icon-plus"></i></div>
																</div>
																<div class="content-col2">
																	<div class="desc">Lorem Ipsum is simply dummy text</div>
																</div>
															</div>
														</div> <!-- /.col1 -->
														<div class="col2">
															<div class="date">5 mins ago</div>
														</div> <!-- /.col2 -->
													</li>
													<li>
														<div class="col1">
															<div class="content">
																<div class="content-col1">
																	<div class="label label-info"><i class="icon-plus"></i></div>
																</div>
																<div class="content-col2">
																	<div class="desc">Lorem Ipsum is simply dummy text</div>
																</div>
															</div>
														</div> <!-- /.col1 -->
														<div class="col2">
															<div class="date">10 mins ago</div>
														</div> <!-- /.col2 -->
													</li>
													<li>
														<div class="col1">
															<div class="content">
																<div class="content-col1">
																	<div class="label label-success"><i class="icon-plus"></i></div>
																</div>
																<div class="content-col2">
																	<div class="desc">Lorem Ipsum is simply dummy text</div>
																</div>
															</div>
														</div> <!-- /.col1 -->
														<div class="col2">
															<div class="date">20 mins ago</div>
														</div> <!-- /.col2 -->
													</li>
													<li>
														<div class="col1">
															<div class="content">
																<div class="content-col1">
																	<div class="label label-info"><i class="icon-plus"></i></div>
																</div>
																<div class="content-col2">
																	<div class="desc">Lorem Ipsum is simply dummy text.</div>
																</div>
															</div>
														</div> <!-- /.col1 -->
														<div class="col2">
															<div class="date">30 mins ago</div>
														</div> <!-- /.col2 -->
													</li>
													<li>
														<div class="col1">
															<div class="content">
																<div class="content-col1">
																	<div class="label label-success"><i class="icon-plus"></i></div>
																</div>
																<div class="content-col2">
																	<div class="desc">Lorem Ipsum is simply dummy text</div>
																</div>
															</div>
														</div> <!-- /.col1 -->
														<div class="col2">
															<div class="date">40 mins ago</div>
														</div> <!-- /.col2 -->
													</li>
													<li>
														<div class="col1">
															<div class="content">
																<div class="content-col1">
																	<div class="label label-info"><i class="icon-plus"></i></div>
																</div>
																<div class="content-col2">
																	<div class="desc">Lorem Ipsum is simply dummy text</div>
																</div>
															</div>
														</div> <!-- /.col1 -->
														<div class="col2">
															<div class="date">50 mins ago</div>
														</div> <!-- /.col2 -->
													</li>
													<li>
														<div class="col1">
															<div class="content">
																<div class="content-col1">
																	<div class="label label-success"><i class="icon-plus"></i></div>
																</div>
																<div class="content-col2">
																	<div class="desc">Lorem Ipsum is simply dummy text</div>
																</div>
															</div>
														</div> <!-- /.col1 -->
														<div class="col2">
															<div class="date">1 hour ago</div>
														</div> <!-- /.col2 -->
													</li>
													<li>
														<div class="col1">
															<div class="content">
																<div class="content-col1">
																	<div class="label label-info"><i class="icon-plus"></i></div>
																</div>
																<div class="content-col2">
																	<div class="desc">Lorem Ipsum is simply dummy text.</div>
																</div>
															</div>
														</div> <!-- /.col1 -->
														<div class="col2">
															<div class="date">1.5 hours ago</div>
														</div> <!-- /.col2 -->
													</li>
												</ul> <!-- /.feeds -->
											</div> <!-- /.scroller -->
										</div> <!-- /#tab_feed_1 -->
									</div> <!-- /.tab-content -->
								</div> <!-- /.tabbable tabbable-custom-->
							</div> <!-- /.widget-content -->
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
									<div class="table-footer">
										<div class="col-md-12">
											  <div class="table-actions">
												<label>Apply action:</label>
												<button type="submit" class="btn btn-primary pull-right"> SMS Selected Contact(s)</button>
												</form>
											</div> 
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
							</div> <!-- /.widget-content -->
						</div> <!-- /.widget -->
					</div> <!-- /.col-md-6 -->
					<!-- /Static Table -->
				</div> <!-- /.row -->

					 <?php elseif (!isset($_SESSION['User']['Package'])):?>
				 <br><br><br>
				 <?php //print_r($_SESSION['User']);?>
				<b style="color:#000;"> TO AVAIL THE FEATURES OF THIS SITE, PLEASE PURCHASE A PACKAGE
				 </b>
				 
				 <?php endif;?>
					<!-- /Page Content -->
			</div>
				
	</div>

</body>
</html>



<?php  include(dirname(dirname( __FILE__)).'/notifier.php');?>

<script type="text/javascript">




$(document).ready(function(){
$('#select2').change(function(e){
e.preventDefault();
alert("selected");
	
});
	
});
	</script>