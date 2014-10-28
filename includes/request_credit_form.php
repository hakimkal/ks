	<form action="<?php echo BASE_URL;?>/includes/app_controller.php" method="post">
<div class="main_popup1_1">
		
			<p>Firstname</p>
			</div>
			<div class="main_popup1_1">
			<input type="text"  value="<?php echo $_SESSION['User']['firstname'];?>" readonly name="Credit[firstname]" id="UserFirstname" class="main_input">
			</div>
			<p>Lastname</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="Credit[lastname]" readonly id="UserLastname" class="main_input" value="<?php echo $_SESSION['User']['lastname'];?>">
			</div>
			 
			 
			 
			<input type="hidden" name="Credit[email]"   value="<?php echo $_SESSION['User']['email'];?>">
			 
			 
			 
			 <input type="hidden" name="Credit[id]"    value="<?php echo $_SESSION['User']['id'];?>" />
		
			<input type="hidden" name="Credit[mobile]"    value="<?php echo $_SESSION['User']['mobile'];?>" />
			<input type="hidden" name="Credit[user_type]" value="customer">
 
			
			<div class="main_popup1_1">
			<p>Type your message</p>
			</div>
			<div class="main_popup1_1">
			<textarea type="text" name="Credit[message]"  required id="message" 	class="main_input auto" style="text-align:left !important;">
			Hello Admin, I have paid $10 into your bank account, Please add me credit for $0.00 
		
			 </textarea>
			</div>
			 
			 			
			<div class="main_popup1_1_button">
			<button type="submit" id="button" name="button" class="sign_button">Send Request</button>
			</div>
			
			</form>