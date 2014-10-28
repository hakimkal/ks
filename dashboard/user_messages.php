
<?php $pageName = 'KootSMS Customer   Messages';?>
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

				 <br><br><br>

				<!--=== Page Content ===-->
				<!--=== Inline Tabs ===-->
				<div class="row">
					<div class="col-md-12">
						<!-- Tabs-->
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
							 
								<li><a href="#tab_edit_account" data-toggle="tab"> Your Messages</a></li>
							</ul>
							<div class="tab-content row">
								<!--=== Overview ===-->
						 
								<!-- /Overview -->

								<!--=== Edit Account ===-->
								<div class="tab-pane active" id="tab_edit_account">
								 
						 <div class="widget-content no-padding">
								<table class="table table-striped table-checkable table-hover">
									<thead>
										<tr>
											 
											<th class="hidden-xs">Sender</th>
											<th>Message</th>
											<th>Phone</th>
												<th>Status</th>
												 
											<th>Server Time</th>
											<th class="align-center">Actions</th>
										</tr>
									</thead>
									<tbody>
								 
								 
								 <?php 
								 include('../includes/paginator.class.php');
								 try {
								 	
									$conn = $mc->db->get_pdo_connection();
									$num_rows = $mc->db->get_user_messages_count($conn,$_SESSION['User']['id']);
									//print_r($num_rows);
								 	$pages = new Paginator($num_rows,9,array(15,3,6,9,12,25,50,100,250,'All'));
								 	//echo $pages->display_pages();
								 	 //	$stmt = $conn->prepare('SELECT user_contacts.firstname,user_contacts.lastname, user_contacts.phone, user_contacts.gender, user_contacts.birthday FROM user_contacts INNER JOIN users ON user_contacts.user_id = users.id where user_id='.$_SESSION['User']['id'].' ORDER BY user_contacts.firstname ASC LIMIT :start,:end');
								 	//$stmt->bindParam(':start', $pages->limit_start, PDO::PARAM_INT);
								 	//$stmt->bindParam(':end', $pages->limit_end, PDO::PARAM_INT);
								 	//$stmt->execute();
								 	//$result = $stmt->fetchAll();
										$result = $mc->db->get_user_messages($conn, $_SESSION['User']['id'], $pages->limit_start, $pages->limit_end);
									//print_r($result);
								 	 foreach($result as $row) {
								 		$record=  "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>".str_replace("/","",str_replace("<h1>","" ,$row[4]))."</td><td>". str_replace("time", "",  $row[6]) ."</td>";
								 		$record.= "<td class='align-center'><span class='btn-group'>
													<a href='#'  class='btn btn-xs bs-tooltip'><i class='icon-ok'></i></a>
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
										<div class="table-actions">
										<?php  //echo $pages->display_pages();?><p>
										</p>
											<?php 	echo "<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span>";
							?> </div>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
							</div> <!-- /.widget-content -->
								 
								 
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

<?php  include(dirname(dirname( __FILE__)).'/notifier.php');?>