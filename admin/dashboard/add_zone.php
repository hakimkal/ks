<?php $pageName = 'Add Governate';?>
<?php require('admin_top.php');?>

<div class="row">
<br><br>
	<div class="col-md-8">
		<div class="widget">
		
			<form action="<?php echo BASE_URL;?>/includes/app_controller.php" method="post">
			<fieldset>
			<legend>Add Governorate</legend>
				<div class="main_popup1_1">


					<p>Governate(e.g Kuwait Governorate)</p>

				</div>
				<div class="main_popup1_1">
					<input type="text" name="ZoneSMSArea[name]" id="UserFirstname"
						class="main_input">
				</div>
				<div class="main_popup1_1">
				<p>Description</p>
		</div>
		
		<div class="main_popup1_1">
			<input type="text" name="ZoneSMSArea[description]"   
				class="main_input">
		</div>
	 </fieldset>
	 
		
		
		 

		 



<br/>

		<div class="main_popup1_1_button">
			<button type="submit" id="button" name="button" class="sign_button">Save</button>
		</div>

		</form>

	</div>
</div>
</div>

<?php
 
$Users =  $mc->getZoneAreas();

?>

<!--=== Blue Chart ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> All Zone  Areas </h4>
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
											 
											<th class="hidden-xs"> Name</th>
											<th>Description</th>
										 
											<th class="align-center">Registered Date</th>
                                            
										</tr>
									</thead>
									 
									<tbody>
										<?php for ($i=0; $i<count($Users); $i++):?>
										<tr>
										 
											 
										 
											<td class="hidden-xs"><?php  echo $Users[$i]['name'] . ' '.  $Users[$i]['lastname'];?></td>
											<td><?php  echo $Users[$i]['description'] ?></td>
											 
											<td class="align-center">
												<?php  echo $Users[$i]['created'] ?>
											</td>
											
												 
                                            <td class="align-center">
												<span class="btn-group">
													<a href="edit_zone.php?id=<?php  echo $Users[$i]['id'] ?>" title="Edit" class="btn btn-xs bs-tooltip"><i class="icon-edit"></i></a>
													 
											 		<a href="delete.php?object=zone_area&id=<?php echo  $Users[$i]['id'];?>"   class="btn btn-xs bs-tooltip delete" title="Delete"> <i class="icon-remove"></i></a>
				
														 
												</span>
											</td>
										</tr>
										 <?php endfor;?>
									</tbody>
								</table>
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12">
											 Total Zones : <?php echo count($Users);?>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
							</div>
							<div class="divider"></div>
							
						</div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
				<!-- /Blue Chart -->

<?php require('admin_footer.php');?>