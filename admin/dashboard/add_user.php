<?php $pageName = 'Add User';?>
<?php require('admin_top.php');?>

<div class="row">

	<div class="col-md-8">
		<div class="widget">
		
			<form action="<?php echo BASE_URL;?>/includes/app_controller.php" method="post">
				<div class="main_popup1_1">


					<p>Firstname</p>

				</div>
				<div class="main_popup1_1">
					<input type="text" name="User[firstname]" id="UserFirstname"
						class="main_input">
				</div>
				<div class="main_popup1_1">
				<p>Lastname</p>
		</div>
	 
		<div class="main_popup1_1">
			<input type="text" name="User[lastname]" id="UserLastname"
				class="main_input">
		</div>
		
		<div class="main_popup1_1">
			<p>Email</p>
		</div>
		<div class="main_popup1_1">
			<input type="text" name="User[email]" id="UserEmail" required
				class="main_input_pass">
		</div>
		<div class="main_popup1_1">
			<p>Password</p>
		</div>
		
		<div class="main_popup1_1">
			<input type="text" name="User[password]" id="UserPassword" required
				class="main_input_pass">
		</div>
		<div class="main_popup1_1">
			<p>Password Again</p>
		</div>
		<div class="main_popup1_1">
			<input type="text" name="User[password_verify]" required
				id="UserPasswordVerify" class="main_input_pass">
		</div>

		<div class="main_popup1_1">
			<p>City</p>
		</div>
		<div class="main_popup1_1">
			<input type="text" name="User[city]" id="UserCity" required
				class="main_input_pass">

		</div>

		<div class="main_popup1_1">
			<p>Mobile Number</p>
		</div>
		<div class="main_popup1_1">
			<input type="text" name="User[mobile]" required id="email"
				class="main_input_pass">
		</div>
		<div class="main_popup1_1">
			<p>Select Category</p>
		</div>
		<div class="main_popup1_1">
			<select class="main_input_pass" required name="User[user_type]"
				style=" border: none;">


				<option value="">--Select user category--</option>
				<option value="customer">Customer</option>
				<option value="staff">Staff</option>

			</select>
		</div>







		<div class="main_popup1_1_button">
			<button type="submit" id="button" name="button" class="sign_button">Save</button>
		</div>

		</form>

	</div>
</div>
</div>

<?php require('admin_footer.php');?>