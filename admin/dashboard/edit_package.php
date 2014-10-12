<?php $pageName = 'Edit Package';?>
<?php require('admin_top.php');?>
<?php $Package = $mc->getPackage($_GET['id']);?>
<div class="row">

	<div class="col-md-8">
		<div class="widget">
		
			<form action="<?php echo BASE_URL;?>/includes/app_controller.php" method="post" enctype="multipart/form-data">
				<input type="hidden" value="put", name="_method">
				<input type="hidden" value="<?php echo $Package['id'];?>" name="Package[id]"> 
				<div class="main_popup1_1">


					<p>Package Title</p>

				</div>
				<div class="main_popup1_1">
					<input type="text" name="Package[title]" id="PackageTitle" value="<?php echo $Package['title'];?>"
						class="main_input">
				</div>
				<br>
				
				 

			 
				 
				
				<div class="main_popup1_1">
				<p>Package Image</p>
		</div>
	 
		 <input type="hidden" name="Package[img_path]"  value="<?php echo $Package['image_path'];?>"	 >
		 
		<div class="main_popup1_1">
		<img src=""/>
			<input type="file" name="edituploadedimage" id="PackageImage"  
				class="main_input_pass">

		</div>
<br>
		<div class="main_popup1_1">
			<p>Package Detail</p>
		</div>
		<div class="main_popup1_1">
			<textarea id="editor"   name="Package[details]" required  
				class="main_input_pass" rows="10" cols="60">
				
				value="<?php echo $Package['details'];?>"
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

 