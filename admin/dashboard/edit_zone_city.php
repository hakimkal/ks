<?php $pageName = 'Edit Zone City';?>
<?php require('admin_top.php');?>
<?php 
$user= $mc->getZoneSMSAreaCity($_GET['id']);
?>
<div class="row">
<br><br>
	<div class="col-md-8">
		<div class="widget">
		
			<form action="<?php echo BASE_URL;?>/includes/app_controller.php" method="post" class="pure-form">
				<input type="hidden" value="edit_zone_sms_area_city" name="_method" /> 
				<input type="hidden" value="<?php echo $user['id'];?>" name="ZoneSMSAreaCity[id]" /> 
			
			<fieldset>
			<legend>Edit Zone City</legend>
			
			<p>Governate/ZOne </p>

				</div>
				<div class="main_popup1_1">
					<select type="text" required name="ZoneSMSAreaCity[zone_sms_area_id]" class="main_input select pure-form">
					<option ></option>
					<?php $zAs= $mc->getZoneAreas();?>
					
					<?php foreach ($zAs as $z):?>
					<?php if($z['id'] == $user['zone_sms_area_id']):?>
						<option value="<?php echo $z['id'];?>" selected="selected"><?php echo $z['name'];?></option>
					<?php else:?>
					<option value="<?php echo $z['id'];?>"><?php echo $z['name'];?></option>
					<?php endif;?>
					<?php endforeach;?>
					</select>
				</div>
				<br/>
				<div class="main_popup1_1">


					<p>City Name</p>

				</div>
				<div class="main_popup1_1">
					<input type="text" name="ZoneSMSAreaCity[name]" id="UserFirstname" value="<?php echo $user['name'];?>"
						class="main_input">
				</div>
				<div class="main_popup1_1">
				<p>Description</p>
		</div>
		
		<div class="main_popup1_1">
			<input type="text" name="ZoneSMSAreaCity[description]"   
				class="main_input"  value="<?php echo $user['description'];?>">
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
 
$Users =  $mc->getZoneAreasAndCities();
//print_r($Users);
?>

<!--=== Blue Chart ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> All Zone  Cities </h4>
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
											 
											<th class="hidden-xs"> City </th>
											<th>Zone</th>
										 
											<th class="align-center">Registered Date</th>
                                            
										</tr>
									</thead>
									 
									<tbody>
										<?php for ($i=0; $i<count($Users); $i++):?>
										<tr>
										 
											 
										 
											<td class="hidden-xs"><?php  echo $Users[$i]['cities'] . ' '.  $Users[$i]['lastname'];?></td>
											<td><?php  echo $Users[$i]['name'] ?></td>
											 
											<td class="align-center">
												<?php  echo $Users[$i]['created'] ?>
											</td>
											
												 
                                            <td class="align-center">
												<span class="btn-group">
													<a href="edit_zone_city.php?id=<?php  echo $Users[$i]['id'] ?>" title="Edit" class="btn btn-xs bs-tooltip"><i class="icon-edit"></i></a>
													 
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