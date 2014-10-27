<?php $pageName = 'Zonesms Detail';?>
<?php require('admin_top.php');?>
<?php $Package = $mc->getUserZonesmsRequest($_GET['id']);?>



<?php   //print_r($Package);
?>
<div class="row">

	<div class="col-md-8">
	
	
	<br><br>
<div class="container-fluid well span6">
	<div class="row-fluid">
       <b> Zonesms Request Detail</b>
        
        <div class="span8">
            <h3>Sender ID: <?php echo $Package['sender']?> </h3>
            <h6>Message:  <?php echo $Package['message']?></h6>
            <h6>Zonesms cities:  <?php echo $Package['cities_zones']?></h6>
            
            <h6>Status: <strong style="color:green;"><i><?php echo $Package['status']?></i></strong></h6>
            <h6>Request Date:<?php echo $Package['created']?></h6>
           
        </div>
        
        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action 
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="zonesms_approve.php?id=<?php echo $Package['id'];?>"><span class="icon-wrench"></span> Approve Zonesms</a></li>
                    <li><a href="#"><span class="icon-trash"></span> Reject</a></li>
                </ul>
            </div>
        </div>
</div>
</div>
		<!-- <div class="widget">
		
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

	</div>-->
</div>
</div>

<?php require('admin_footer.php');?>

 