	<form action="<?php echo BASE_URL;?>/includes/app_controller.php" method="post">
<div class="main_popup1_1">
		
			<p>Firstname</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="User[firstname]" id="UserFirstname" class="main_input">
			</div>
			<p>Lastname</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="User[lastname]" id="UserLastname" class="main_input">
			</div>
			<div class="main_popup1_1">
			<p>Email</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="User[email]" id="UserEmail" required class="main_input_pass">
			</div>
			<div class="main_popup1_1">
			<p>Password</p>
			</div>
			<div class="main_popup1_1">
			<input type="password" name="User[password]" id="UserPassword" required class="main_input_pass">
			</div>
			<div class="main_popup1_1">
			<p>Password Again</p>
			</div>
			<div class="main_popup1_1">
			<input type="password" name="User[password_verify]" required id="UserPasswordVerify" class="main_input_pass">
			</div>
			
			<div class="main_popup1_1">
			<p>City</p>
			</div>
			<div class="main_popup1_1">
		<input type="text" name="User[city]" id="UserCity" required class="main_input_pass">
			
			</div>
			
			<div class="main_popup1_1">
			<p>Mobile Number</p>
			</div>
			<div class="main_popup1_1">
			<input type="text" name="User[mobile]"  required id="email" class="main_input_pass">
			<input type="hidden" name="User[user_type]" value="customer">
			</div>
			
			
			 
			
			<div class="main_popup1_1_button">
			 <div class="checker"><span class="checked">
			 <input type="checkbox" class="uniform"></span>
			 </div> 
			<a href="#" class="fogot">You agree to our <b>terms of use</b></a>
			
			
			</div>
			 						
			<div class="main_popup1_1_button">
			<button type="submit" id="button" name="button" class="sign_button">Signup</button>
			</div>
			
			</form>