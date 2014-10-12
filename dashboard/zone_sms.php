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
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>KootSMS Zone SMS</title>

	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Theme -->
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
		<?php   if(basename($_SERVER['SCRIPT_NAME'])=='zone_sms.php'){  include('mul_sel_styles.php');}?>
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
<?php if($mc->getUserZoneSMSStatus() != false):?>

				<!--=== Page Content ===-->
				<!--=== Inline Tabs ===-->
				<div class="row">
					<div class="col-md-12">
						<!-- Tabs-->
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
							 
								<li><a href="#tab_edit_account" data-toggle="tab">Send SMS </a></li>
							</ul>
							<div class="tab-content row">
								<!--=== Overview ===-->
						 
								<!-- /Overview -->

								<!--=== Edit Account ===-->
								<div class="tab-pane active" id="tab_edit_account">
									<form class="form-horizontal" action="<?php echo BASE_URL;?>/includes/app_controller.php"  enctype="multipart/form-data"  method="post"">
										<div class="col-md-12">
											<div class="widget">
												<div class="widget-header">
												 
													<h4>Message Pad</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Sender:</label>
																<div class="col-md-8"><input type="text" name="Bulksms[sender]"   class="form-control"  ></div>
															</div>

															 
															
															<div class="form-group">
																<label class="col-md-4 control-label">File (Please separate mobile numbers with commas):</label>
																<input type="hidden" name="Bulksms[user_id]" value="<?php echo $_SESSION['User']['id'];?>" />
																<div class="col-md-8"><input type="file" name="Bulksms[file]"  class="form-control" required="required"></div>
															</div>
														</div>


														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Message:</label>
																<div class="col-md-8">
																	<textarea rows="6"  name="Bulksms[message]" class="form-control" cols="60"></textarea>
																</div>
															</div>

													 
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->
										</div> <!-- /.col-md-12 -->

										<div class="col-md-12 form-vertical no-margin">
										 

											<div class="form-actions">
												<input type="submit" value="Send Message" class="btn btn-primary pull-right">
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
				
				
				
				<?php else:?>
				<br/><br/><br/><br/>
				<img alt="Map " src="../images/koweit45.gif" width="600"  height="600">
				REQUEST Zone SMS APPROVAL
				
						<div class="row">
					<div class="col-md-12">
					
					
					
						<!-- Tabs-->
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
							 
								<li><a href="#tab_edit_account" data-toggle="tab"> ZoneSMS Coverage Request </a></li>
							</ul>
							<div class="tab-content row">
							
							
						
							
							
							
							<div class="form-group">
        <label>Select City(ies) </label>
        
        <?php $zc = $mc->getZoneAreasAndCitiesGrouped();
       print_r($zc);
       
        ?>
      
        <select id="ms" multiple="multiple" title="Select cities where you wants">
        <?php foreach ($zc as $z):?>
        <optgroup label="<?php echo $z['name'];?>">
        <?php
         $cities =  explode(',', $z['cities']);
        foreach ($cities as $c):
        ?>
        <option value="<?php echo $c;?>"><?php echo $c;?></option>
        <?php 
        endforeach;
        
        ?>
        
        
        </optgroup>
        <?php endforeach;?>
        
        
        </select>
        <?php
        /*
        $zone_areas_id=array();
       
       foreach ($zc as $zAID){
       	$zone_areas_id[]=$zAID['zone_sms_area_id'];
       }
      $zone_areas_id = array_unique($zone_areas_id );
       
        ?>
        <select id="ms" multiple="multiple">
       <?php foreach ($zone_areas_id as $ID):?>
        <?php  $counter = 0;?>
       <?php foreach ($zc as $z):?>
       <?php if($z['zone_sms_area_id'] == $ID):?>
        <?php $counter++; ?>
        <?php endif;?>
        <?php endforeach;?>
         
        <?php for($i=0 ; $i<$counter; $i++):?>
         <?php foreach ($zc as $z):?>
         <?php if($z['zone_sms_area_id']== $ID):?>
        <?php if($i == 0):?>
         <optgroup label="<?php echo $z['name'];?>">
        <?php endif;?>
         <option value="<?php echo $z['zone_sms_cities_id'];?>"><?php echo $z['cities'];?></option>
          
          <?php if($i==0):?>
          </optgroup>    
        <?php endif;?>
        <?php endif;?>
        <?php $counter=0?>
        
        <?php endforeach;?>
        <?php endfor;?>
        <?php endforeach;?>
        * 
         
        </select>*/
        ?>
        
    </div>
    
								<!--=== Overview ===-->
						 
								<!-- /Overview -->

								<!--=== Edit Account ===-->
								<div class="tab-pane active" id="tab_edit_account">
									<form class="form-horizontal" action="<?php echo BASE_URL;?>/includes/app_controller.php"  enctype="multipart/form-data"  method="post" class="pure-form">
										<div class="col-md-12">
											<div class="widget">
												<div class="widget-header">
												 
													<h4>Select Zone and City You wish to Send ZoneSMS</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Sender:</label>
																<div class="col-md-8"><input type="text" name="Bulksms[sender]"   class="form-control"  ></div>
															</div>

															 
															
															<div class="form-group">
																<label class="col-md-4 control-label">File (Please separate mobile numbers with commas):</label>
																<input type="hidden" name="Bulksms[user_id]" value="<?php echo $_SESSION['User']['id'];?>" />
																<div class="col-md-8"><input type="file" name="Bulksms[file]"  class="form-control" required="required"></div>
															</div>
														</div>


														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Message:</label>
																<div class="col-md-8">
																	<textarea rows="6"  name="Bulksms[message]" class="form-control" cols="60"></textarea>
																</div>
															</div>

													 
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->
										</div> <!-- /.col-md-12 -->

										<div class="col-md-12 form-vertical no-margin">
										 

											<div class="form-actions">
												<input type="submit" value="Send Message" class="btn btn-primary pull-right">
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
				
				<?php endif;?>
				
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