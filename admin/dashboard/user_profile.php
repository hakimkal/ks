<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>User Profile</title>

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


	<script type="text/javascript" src="plugins/sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.tooltip.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.resize.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.time.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.growraf.min.js"></script>

	<script type="text/javascript" src="plugins/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="plugins/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="plugins/blockui/jquery.blockUI.min.js"></script>

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
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.html">Dashboard</a>
						</li>
						<li class="current">
							<a href="pages_calendar.html" title="">Calendar</a>
						</li>
					</ul>

					<ul class="crumb-buttons">
						<li><a href="charts.html" title=""><i class="icon-signal"></i><span>Statistics</span></a></li>
						<li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="icon-tasks"></i><span>Users <strong>(+3)</strong></span><i class="icon-angle-down left-padding"></i></a>
							<ul class="dropdown-menu pull-right">
							<li><a href="form_components.html" title=""><i class="icon-plus"></i>Add new User</a></li>
							<li><a href="tables_dynamic.html" title=""><i class="icon-reorder"></i>Overview</a></li>
							</ul>
						</li>
						<li class="range"><a href="#">
							<i class="icon-calendar"></i>
							<span></span>
							<i class="icon-angle-down"></i>
						</a></li>
					</ul>
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>User Profile</h3>
						<span>Good morning, kayum!</span>
					</div>

				</div>
				<!-- /Page Header -->

				<!--=== Page Content ===-->
				<!--=== Inline Tabs ===-->
				<div class="row">
					<div class="col-md-12">
						<!-- Tabs-->
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_overview" data-toggle="tab">Overview</a></li>
								<li><a href="#tab_edit_account" data-toggle="tab">Edit Account</a></li>
							</ul>
							<div class="tab-content row">
								<!--=== Overview ===-->
								<div class="tab-pane active" id="tab_overview">
									<div class="col-md-3">
										<div class="list-group">
											<li class="list-group-item no-padding">
												<img src="assets/img/demo/avatar-large.jpg" alt="">
											</li>
											<a href="javascript:void(0);" class="list-group-item">Projects</a>
											<a href="javascript:void(0);" class="list-group-item">Messages</a>
											<a href="javascript:void(0);" class="list-group-item"><span class="badge">3</span>Friends</a>
											<a href="javascript:void(0);" class="list-group-item">Settings</a>
										</div>
									</div>

									<div class="col-md-9">
										<div class="row profile-info">
											<div class="col-md-7">
												<div class="alert alert-info">You will receive all future updates for free!</div>
												<h1>kayum Ansari</h1>

												<dl class="dl-horizontal">
													<dt>Description lists</dt>
													<dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dd>
													<dt>Lorem Ipsum</dt>
													<dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dd>
													<dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dd>
													<dt>Lorem Ipsum</dt>
													<dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dd>

												</dl>

												<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
											</div>
											<div class="col-md-5">
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
											<th class="hidden-xs">Name</th>
											<th>Last Name</th>
											<th>Status</th>
											<th class="align-center">Approve</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td class="hidden-xs">kayum</td>
											<td>Ansari</td>
											<td>1234567890</td>
											<td class="align-center">
												<span class="btn-group">
													<a href="javascript:void(0);" title="Approve" class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
												</span>
											</td>
										</tr>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td class="hidden-xs">Zaffer</td>
											<td>Ansari</td>
											<td>1234567890</td>
											<td class="align-center">
												<span class="btn-group">
													<a href="javascript:void(0);" title="Approve" class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
												</span>
											</td>
										</tr>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td class="hidden-xs">Azad</td>
											<td>Ansari</td>
											<td>1234567890</td>
											<td class="align-center">
												<span class="btn-group">
													<a href="javascript:void(0);" title="Approve" class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
												</span>
											</td>
										</tr>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td class="hidden-xs">Alam</td>
											<td>Ansari</td>
											<td>1234567890</td>
											<td class="align-center">
												<span class="btn-group">
													<a href="javascript:void(0);" title="Approve" class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
												</span>
											</td>
										</tr>
									</tbody>
								</table>
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12">
											<div class="table-actions">
												<label>Apply action:</label>
												<select class="select2" data-minimum-results-for-search="-1" data-placeholder="Select action...">
													<option value=""></option>
													<option value="Edit">Edit</option>
													<option value="Delete">Delete</option>
													<option value="Move">Move</option>
												</select>
											</div>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
							</div> <!-- /.widget-content -->
						</div>
											</div>
										</div> <!-- /.row -->

										<div class="row">
											<div class="col-md-12" style="margin-top:30px;">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Total Message Sent</h4>
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
											<th class="hidden-xs"> Name</th>
											<th>Mobile No</th>
											<th>Message</th>
											<th class="align-center">Date</th>
                                            <th class="align-center">Delivered</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td class="hidden-xs">kayum</td>
											<td>1234567890</td>
											<td>Hello How are you</td>
											<td class="align-center">
												2014-08-24 07:51 PM
											</td>
                                            <td class="align-center">
												<span class="btn-group">
													<a href="javascript:void(0);" title="Approve" class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
												</span>
											</td>
										</tr>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td class="hidden-xs">Zaffer</td>
											<td>1234567890</td>
											<td>Hello How are you</td>
											<td class="align-center">
												2014-08-24 07:51 PM
											</td>
                                            <td class="align-center">
												<span class="btn-group">
													<a href="javascript:void(0);" title="Approve" class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
												</span>
											</td>
										</tr>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td class="hidden-xs">Azad</td>
											<td>1234567890</td>
											<td>Hello How are you</td>
											<td class="align-center">
												2014-08-24 07:51 PM
											</td>
                                            <td class="align-center">
												<span class="btn-group">
													<a href="javascript:void(0);" title="Approve" class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
												</span>
											</td>
										</tr>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td class="hidden-xs">Alam</td>
											<td>1234567890</td>
											<td>Hello How are you</td>
											<td class="align-center">
												2014-08-24 07:51 PM
											</td>
                                            <td class="align-center">
												<span class="btn-group">
													<a href="javascript:void(0);" title="Approve" class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
												</span>
											</td>
										</tr>
									</tbody>
								</table>
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12">
											<div class="table-actions">
												<label>Apply action:</label>
												<select class="select2" data-minimum-results-for-search="-1" data-placeholder="Select action...">
													<option value=""></option>
													<option value="Edit">Edit</option>
													<option value="Delete">Delete</option>
													<option value="Move">Move</option>
												</select>
											</div>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
							</div>
							<div class="divider"></div>
							
						</div>
					</div>
											<!-- /Striped Table -->
										</div> <!-- /.row -->
									</div> <!-- /.col-md-9 -->
								</div>
								<!-- /Overview -->

								<!--=== Edit Account ===-->
								<div class="tab-pane" id="tab_edit_account">
									<form class="form-horizontal" action="#">
										<div class="col-md-12">
											<div class="widget">
												<div class="widget-header">
													<h4>General Information</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">First name:</label>
																<div class="col-md-8"><input type="text" name="regular" class="form-control" value="Kayum"></div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">Last name:</label>
																<div class="col-md-8"><input type="text" name="regular" class="form-control" value="Ansari"></div>
															</div>
														</div>


														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Gender:</label>
																<div class="col-md-8">
																	<select class="form-control">
																		<option value="male" selected="selected">Male</option>
																		<option value="female">Female</option>
																	</select>
																</div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">Age:</label>
																<div class="col-md-8"><input type="text" name="regular" class="form-control input-width-small" value="28"></div>
															</div>
														</div>
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->
										</div> <!-- /.col-md-12 -->

										<div class="col-md-12 form-vertical no-margin">
											<div class="widget">
												<div class="widget-header">
													<h4>Settings</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-4 col-lg-2">
															<strong class="subtitle padding-top-10px">Permanent username</strong>
															<p class="text-muted">Lorem Ipsum</p>
														</div>

														<div class="col-md-8 col-lg-10">
															<div class="form-group">
																<label class="control-label padding-top-10px">Username:</label>
																<input type="text" name="username" class="form-control" value="kayum" disabled="disabled">
															</div>
														</div>
													</div> <!-- /.row -->
													<div class="row">
														<div class="col-md-4 col-lg-2">
															<strong class="subtitle">Change password</strong>
															<p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
														</div>

														<div class="col-md-8 col-lg-10">
															<div class="form-group">
																<label class="control-label">Old password:</label>
																<input type="password" name="old_password" class="form-control" placeholder="Old Password">
															</div>

															<div class="form-group">
																<label class="control-label">New password:</label>
																<input type="password" name="new_password" class="form-control" placeholder="New Password">
															</div>

															<div class="form-group">
																<label class="control-label">Repeat new password:</label>
																<input type="password" name="new_password_repeat" class="form-control" placeholder="Confirm New Password">
															</div>
														</div>
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->

											<div class="form-actions">
												<input type="submit" value="Update Account" class="btn btn-primary pull-right">
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

</body>
</html>