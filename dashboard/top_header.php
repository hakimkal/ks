		<!--=== CSS ===-->

	 
	<!-- Theme -->
 
    <link href="assets/css/new.css" rel="stylesheet" type="text/css" />
	 
	 	

	
	 
	 
	<!-- Header -->
	<header class="header navbar navbar-fixed-top" role="banner">
		<!-- Top Navigation Bar -->
		<div class="container">

			<!-- Only visible on smartphones, menu toggle -->
			<ul class="nav navbar-nav">
				<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
			</ul>

			<!-- Logo -->
			<a class="navbar-brand" href="<?php echo BASE_URL.'/dashboard/';?>">
				<img src="../images/logo.png"  />
			</a>
			<!-- /logo -->

			<ul class="nav navbar-nav navbar-right" style="margin-top:20px;">
 
            
            
            <li class="dropdown">
			<div class="coin">
            <div class="coin1">
            <div class="coin1_1"><img src="assets/img/coin.png"></div>
            <div class="coin1_2"><h1><?php echo $sms_credit_balance['sms_credits']; ?> Remaining</h1></div>
            </div>
            </div>
			</li>
            
				 
 

				<!-- .row .row-bg Toggler -->
				 

				<!-- Project Switcher Button -->
				<li class="dropdown">
					<a href="user_contacts.php" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-folder-open"></i>
						<span>Contacts</span>
					</a>
					
					<ul class="dropdown-menu">
						<li><a href="add_contact.php"><i class="icon-user"></i> Add Contact</a></li>
						
				
						<li class="divider"></li>
						<li><a href="user_contacts.php"><i class="icon-key"></i> All Contacts </a></li>
					</ul>
				</li>
				
			 		<li class="dropdown">
					<a href="my_remark.php" class="">
						<i class="icon-folder-open"></i>
						 Say something about us</span> 
					</a>
					
					 
				</li>
				<!-- Project Switcher Button -->
				<li class="dropdown ">
			
				<a href="user_contacts.php" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-folder-open"></i>
						<span> Messages</span>
					</a>
					
					<ul class="dropdown-menu">
					 
						<li class="divider"></li>
							<!-- <li><a href="send_bulksms.php"><i class="icon-plus"></i> Send BulkSMS </a></li>-->
						<li><a href="send_sms.php"><i class="icon-plus"></i> Send  Single SMS </a></li>
			
						<li><a href="send_bulksms.php"><i class="icon-plus"></i> Send BulkSMS </a></li>
			
						<li class="divider"></li>
							<!-- <li><a href="send_bulksms.php"><i class="icon-plus"></i> Send BulkSMS </a></li>-->
						<li><a href="user_messages.php"><i class="icon-info"></i> Messages </a></li>
					</ul>
				</li>
				
				
				<!-- User Login Dropdown -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<!--<img alt="" src="assets/img/avatar1_small.jpg" />-->
						<i class="icon-male"></i>
						<span class="username"><?php echo $_SESSION['User']['firstname'];?></span>
						<i class="icon-caret-down small"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="my_profile.php"><i class="icon-user"></i> My Profile</a></li>
						
						<li class="divider"></li>
						<li><a href="../includes/logout.php"><i class="icon-key"></i> Log Out</a></li>
					</ul>
				</li>
				<!-- /user login dropdown -->
			</ul>
			<!-- /Top Right Menu -->
		</div>
		<!-- /top navigation bar -->
		
		
 <?php if(basename($_SERVER['SCRIPT_FILENAME']) !=  "index.php"):?>
 	<br><br><br><br> 
	<ul id="breadcrumbs" class="breadcrumb">
	 
						
						<li>
							<i class="icon-home"></i>
							<a href="<?php echo BASE_URL.'/dashboard/';?>">Dashboard</a>
						</li>
						<li class="current">
							<a href="<?php echo $_SERVER['SCRIPT_NAME']. '?'.$_SERVER['QUERY_STRING'];?>" title="<?php echo $pageName;?>"><?php echo $pageName;?></a>
						</li>
						
					</ul>
	 <?php endif;?>
		<!--=== Project Switcher ===-->
		 <!-- /#project-switcher -->
	</header> <!-- /.header -->