	<?php $pageName = 'Manage User';?>
<?php require('admin_top.php');

$user= $mc->getUser($_GET['id']);
 
?>
	
	
	<div class="row">

	<div class="col-md-8">
		<div class="widget">
<form action="<?php echo BASE_URL;?>/includes/app_controller.php" method="post">
<div class="main_popup1_1">
		<input type="hidden" value="add_credit" name="_method" /> 
			<p>Firstname</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[firstname]" value="<?php echo $user['firstname'];?>" id="UserFirstname" class="main_input">
			</div>
			<p>Lastname</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[lastname]" value="<?php echo $user['lastname'];?>" id="UserLastname" class="main_input">
			</div>
			<div class="main_popup1_1">
			<p>Email</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[email]" id="UserEmail" value="<?php echo $user['email'];?>" required class="main_input_pass">
			</div>
			 
			
			 
			<div class="main_popup1_1">
			<p>Mobile Number</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[mobile]" value="<?php echo $user['mobile'];?>"  class="main_input_pass">
			<input type="hidden" name="UserCredit[id]" value="<?php echo $user['id'];?>">
			</div>
			
			<div class="main_popup1_1">
			<p>Total Amount of  Credit Purchased($)</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[Credit][amount_paid]"  required id="email" class="main_input_pass">
		 
			</div>
			 
			 <div class="main_popup1_1">
			<p>SMS Credit</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[Credit][sms_credits_value]"  required id="email" class="main_input_pass">
		 
			</div>
			<div class="main_popup1_1">
			<p>Unit Cost Per SMS ($)</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[Credit][cost_per_sms]"  required   class="main_input_pass">
		 </div>
			 <div class="main_popup1_1">
			<p>Zone SMS Credit</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[Credit][zonesms_credits_value]"  required id="email" class="main_input_pass">
		 
			</div>
			<div class="main_popup1_1">
			<p>Unit Cost Per Zone SMS ($)</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[Credit][cost_per_zonesms]"  required   class="main_input_pass">
		 </div>
			 <div class="main_popup1_1">
			<p>MMS Credit</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[Credit][mms_credits_value]"  required id="email" class="main_input_pass">
		 
			</div>
			<div class="main_popup1_1">
			<p>Unit Cost Per MMS ($)</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[Credit][cost_per_mms]"  required   class="main_input_pass">
		 </div>
			  <div class="main_popup1_1">
			<p>Voice Message Credit</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[Credit][voice_msg_credits_value]"  required id="email" class="main_input_pass">
		 
			</div>
			<div class="main_popup1_1">
			<p>Unit Cost Per Voice MSG ($)</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="UserCredit[Credit][cost_per_voice]"  required   class="main_input_pass">
		 </div>
		 
		 <div class="main_popup1_1">
			<p>Valid for (Days) </p>
			</div>
			<div class="main_popup1_1">
			<select name="UserCredit[Credit][valid_for]">
			
			<?php for($p=1; $p<101; $p++):?>
			<?php if($p != 30):?>
			<option value="<?php echo $p;?>"><?php echo $p;?> Day(s)</option>
			<?php else:?>
			<option value="<?php echo $p;?>" selected="selected"><?php echo $p;?> Day(s)</option>
			<?php endif;?>
			<?php endfor;?>
			</select>
		 </div>
			 	<input type="hidden" name="UserCredit[Credit][added_by]"  value="<?php echo $_SESSION['User']['email'];?>" />					
			<input type="hidden" name="UserCredit[Credit][last_modified_by]"  value="<?php echo $_SESSION['User']['email'];?>" />					
		
			<div class="main_popup1_1_button">
			<button type="submit" id="button" name="button" class="sign_button">Update User</button>
			</div>
			 
			</form>
			</div></div></div>
			<br/><br/>
			
			<?php require('admin_footer.php');?>