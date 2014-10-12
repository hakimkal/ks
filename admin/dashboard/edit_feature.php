<?php $pageName = 'Edit Feature';?>
<?php require('admin_top.php');?>
<?php $Package = $mc->getFeature($_GET['id']);?>
<div class="row">

	<div class="col-md-8">
		<div class="widget">
		
			<form action="<?php echo BASE_URL;?>/includes/app_controller.php" method="post" >
				<input type="hidden" value="put", name="_method">
				<input type="hidden" value="<?php echo $Package['id'];?>" name="Feature[id]"> 
				<input type="hidden" value="<?php echo $Package['package_id'];?>" name="Feature[package_id]"> 
			
				<div class="main_popup1_1">


					<p>Package Title</p>

				</div>
				<div class="main_popup1_1">
					<input type="text" name="Feature[title]" id="PackageTitle" value="<?php echo $Package['title'];?>"
						class="main_input">
				</div>
				<br>
				
				<div class="main_popup1_1">


					<p>Package Price(USD)</p>

				</div>
				<div class="main_popup1_1">
					<input type="text" name="Feature[price]" id="PackagePrice" value="<?php echo $Package['price'];?>"
						class="main_input">
				</div>
				<br>
				
				<div class="main_popup1_1">


					<p>VAT(optional)</p>

				</div>
				<div class="main_popup1_1">
					<input type="text" name="Feature[feature]" id="PackageVat" value="<?php echo str_replace("</li>","",str_replace("<li>", "", $Package['feature']));?>"
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

 