<?php $pageName = 'Send Zone SMS';?>
<?php require(dirname(dirname(__FILE__)).'/includes/app_controller.php');
$mc->checkLogin(true);
$mc->isCustomer(true);
if(($sms_credit_balance['zonesms_credits'] <= 0) || ($sms_credit_balance <= 0)){
	$_SESSION['error'] = 'Insufficient Credit!, Please request for credit';
	$mc->redirect('dashboard/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>My KootSMS Zone SMS</title>

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
		<?php   if(basename($_SERVER['SCRIPT_NAME'])=='zone_sms.php'){  include('mul_sel_styles.php');}?>
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

			<br>
			<br>
			<br>
 
				 
				<br />
			<br />
			<br />
			 

			<div class="row">
				<div class="col-md-12">



					<!-- Tabs-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">

							<li><a href="#tab_edit_account" data-toggle="tab"> ZoneSMS
									Coverage Request </a></li>
						</ul>
						<div class="tab-content row">








							<!--=== Overview ===-->

							<!-- /Overview -->

							<!--=== Edit Account ===-->
							<div class="tab-pane active" id="tab_edit_account">
								 		<!-- /.row -->
								 		
								 		
								 		
								 		<!--=== Blue Chart ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>Zonesms Requests </h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								<table class="table table-striped table-checkable table-hover ">
									<thead>
										<tr>
											 
											<th class="hidden-xs"> Sender</th>
											<th>Message</th>
											 
											<th>Coverage</th>
											<th class="align-center">Created</th>
                                           <th class="align-center">Status</th>
                                            <th class="align-center">Action</th>
										</tr>
									</thead>
									 
									<tbody>
										  <?php 
						 	 require('../includes/paginator.class.php');
								 try {
								 	
									$conn = $mc->db->get_pdo_connection();
									$num_rows = $mc->db->get_user_zone_sms_requests_count($conn);
									//print_r($num_rows);
								 	$pages = new Paginator($num_rows,9,array(15,3,6,9,12,25,50,100,250,'All'));
								 	 
										$result = $mc->getUsersZonesmsRequests($conn,  $pages->limit_start, $pages->limit_end,$_SESSION['User']['id'],"approved");
									// print_r($result);
								 	 foreach($result as $row) {
if($row[9] == 'pending review'){ 		
$record=  "<tr><td>$row[2]</td><td>$row[3]</td><td>$row[11]</td><td>". $row[4]."</td><td>". str_replace("time", "",  $row[7]) ."</td><td style='color:red;'>". $row[9]."</td>";
								 		
	}
	else{$record=  "<tr><td>$row[2]</td><td>$row[3]</td> <td>". $row[4]."</td><td>". str_replace("time", "",  $row[7]) ."</td><td>". $row[9]."</td>";
}							 		
								 		$record.= "<td class='align-center'><span class='btn-group'>
													<a href='edit_my_zone_sms.php?id=".$row[0]."'  class='btn btn-xs bs-tooltip'><i class='icon-edit' title='edit zonesms'></i></a>
												</span></td>"; 
								 		$record.="</tr>\n";
								 		
								 		echo $record;
								 	}
								  
								 	
								 	echo "<p class=\"paginate\">Page: $pages->current_page of $pages->num_pages</p>\n";
								 //	echo "<p class=\"paginate\">SELECT * FROM table LIMIT $pages->limit_start,$pages->limit_end (retrieve records $pages->limit_start-".($pages->limit_start+$pages->limit_end)." from table - $pages->total_items item total / $pages->items_per_page items per page)";
								 } catch(PDOException $e) {
								 	//echo 'ERROR: ' . $e->getMessage();
								 }
								 ?>
								 
								 
										 
									 
									</tbody>
								</table>
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12">
											 Total Requests: <?php echo ucwords(count($result));?>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
							</div>
							<div class="divider"></div>
							
						</div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
				<!-- /Blue Chart -->

								 		
													</div>
													<!-- /.widget-content -->
												</div>
												<!-- /.widget -->
											</div>
											<!-- /.col-md-12 -->

											 
								
								 
							</div>
							<!-- /Edit Account -->
						</div>
						<!-- /.tab-content -->
					</div>
					<!--END TABS-->
				</div>
			</div>
			<!-- /.row -->
				
 
				
			</div>
		<!-- /Page Content -->
	</div>

</body>
</html>

<script type="text/javascript">
     
	$('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		setStartDate: '<?php echo date('Y-m-d');?>',
		forceParse: 0
    });
	 
</script>

<?php  include(dirname(dirname( __FILE__)).'/notifier.php');?>
	
	<?php
   if(basename($_SERVER['SCRIPT_NAME'])=='zone_sms.php'){ 
	include('mul_sel_js.php');
	 }
	 ?>