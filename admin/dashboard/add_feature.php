<?php $pageName = 'Add Feature';?>
<?php require('admin_top.php');?>

<div class="row">

	<div class="col-md-8">
		<div class="widget">
		
			<form action="<?php echo BASE_URL;?>/includes/app_controller.php" method="post" >
				<div class="main_popup1_1">


					<p>Select Package</p>

				</div>
				<div class="main_popup1_1">
					<select type="text" name="Feature[package_id]" id="UserFirstname"
						class="main_input">
							<option value="">Select Package </option>
						<?php foreach ($mc->getPackages() as $pkg):?>
						
						<option value="<?php echo $pkg['id'];?> "><?php echo $pkg['title'];?> </option>
						
						<?php endforeach;?>
						</select>
				</div>
				<br>
				
					<div class="main_popup1_1">


					<p> Title</p>

				</div>
				<div class="main_popup1_1">
					<input type="text" name="Feature[title]" id="PackagePrice"
						class="main_input">
				</div>
				<br>
				<div class="main_popup1_1">


					<p> Price(USD)</p>

				</div>
				<div class="main_popup1_1">
					<input type="text" name="Feature[price]" id="PackagePrice"
						class="main_input">
				</div>
				<br>
				
				 
				 <div class="main_popup1_1">


					<p>Feature(s)</p>

				</div>
				<div class="main_popup1_1">
					<input type="text" name="Feature[feature][]" id="PackagePrice"
						class="main_input">
				</div>
					 
				<br>
				
 <div class="main_popup1_1">
					<input type="text" name="Feature[feature][]" id="PackagePrice"
						class="main_input">
				</div>
					 
				<br>
				<div class="main_popup1_1">
					<input type="text" name="Feature[feature][]" id="PackagePrice"
						class="main_input">
				</div>
					 
				<br>
				<div class="main_popup1_1">
					<input type="text" name="Feature[feature][]" id="PackagePrice"
						class="main_input">
				</div>
					 
				<br>
				
				
		 




 

		<div class="main_popup1_1_button">
			<button type="submit" id="button" name="button" class="sign_button">Save</button>
		</div>

		</form>

	</div>
</div>
</div>

<?php require('admin_footer.php');?>

 