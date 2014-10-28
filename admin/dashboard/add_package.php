<?php $pageName = 'Add Package';?>
<?php require('admin_top.php');?>

<div class="row">

	<div class="col-md-8">
		<div class="widget">
		
			<form action="<?php echo BASE_URL;?>/includes/app_controller.php" method="post" enctype="multipart/form-data">
				<div class="main_popup1_1">


					<p>Package Title</p>

				</div>
				<div class="main_popup1_1">
					<input type="text" name="Package[title]" id="UserFirstname"
						class="main_input">
				</div>
				<br>
				
				 
				
				 
				
				<div class="main_popup1_1">
				<p>Package Image</p>
		</div>
	 
		 
		 
		<div class="main_popup1_1">
			<input type="file" name="uploadedimage" id="PackageImage" required
				class="main_input_pass">

		</div>
<br>
		<div class="main_popup1_1">
			<p>Package Detail</p>
		</div>
		<div class="main_popup1_1">
			<textarea id="editor"   name="Package[details]" required  
				class="main_input_pass" rows="10" cols="60">
				</textarea>
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

 