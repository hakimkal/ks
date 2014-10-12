<?php $pageName = 'KootSMS Staff Dashboard';?>
				
<?php
require ('admin_top.php');

?>


<!--=== Page Header ===-->
<div class="page-header">
	<div class="page-title">
		<h3>Admin Dashboard</h3>
		<span>Hello, <?php echo $_SESSION['User']['firstname'];?>!</span>
	</div>

	<!-- Page Stats -->

	<!-- /Page Stats -->
</div>
<!-- /Page Header -->



<div class="row">
	<!--=== Sin/Cos Chart ===-->
	<div class="col-md-10">
		<div class="widget">
			<div class="widget-header">
				<h4>
					<i class="icon-reorder"></i> Central Navigation
				</h4>
				<div class="toolbar no-padding">
					<div class="btn-group">
						<span class="btn btn-xs widget-collapse"><i
							class="icon-angle-down"></i></span>

					</div>
				</div>
			</div>
			<div class="widget-content">
				<div class="tabbable tabbable-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_feed_1" data-toggle="tab">System</a></li>

					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_feed_1">
							<div class="scroller" data-height="290px" data-always-visible="1"
								data-rail-visible="0">
								<ul class="feeds clearfix">


									<li class="hoverable"><a href="add_user.php">
											<div class="col1">
												<div class="content">
													<div class="content-col1">
														<div class="label label-info">
															<i class=" icon-plus"></i>
														</div>
													</div>
													<div class="content-col2">
														<div class="desc">Add New Customer/Staff</div>
													</div>
												</div>
											</div> <!-- /.col1 -->

									</a></li>

									<li class="hoverable"><a href="users.php?category=staff">
											<div class="col1">
												<div class="content">
													<div class="content-col1">
														<div class="label label-info">
															<i class="icon-group"></i>
														</div>
													</div>
													<div class="content-col2">
														<div class="desc">Manage Staff</div>
													</div>
												</div>
											</div> <!-- /.col1 -->

									</a></li>
									<li class="hoverable"><a href="users.php?category=customer">
											<div class="col1">
												<div class="content">
													<div class="content-col1">
														<div class="label label-info">
															<i class="icon-group"></i>
														</div>
													</div>
													<div class="content-col2">
														<div class="desc">Manage Customers</div>
													</div>
												</div>
											</div> <!-- /.col1 -->

									</a></li>


									<li class="hoverable"><a href="add_package.php">
											<div class="col1">
												<div class="content">
													<div class="content-col1">
														<div class="label label-info">
															<i class="icon-plus"></i>
														</div>
													</div>
													<div class="content-col2">
														<div class="desc">Add Package</div>
													</div>
												</div>
											</div> <!-- /.col1 -->

									</a></li>

									<li class="hoverable"><a href="packages.php">
											<div class="col1">
												<div class="content">
													<div class="content-col1">
														<div class="label label-info">
															<i class="icon-tasks"></i>
														</div>
													</div>
													<div class="content-col2">
														<div class="desc">Manage Packages</div>
													</div>
												</div>
											</div> <!-- /.col1 -->

									</a></li>

									<li class="hoverable"><a href="add_feature.php">
											<div class="col1">
												<div class="content">
													<div class="content-col1">
														<div class="label label-info">
															<i class="icon-plus"></i>
														</div>
													</div>
													<div class="content-col2">
														<div class="desc">Add Feature</div>
													</div>
												</div>
											</div> <!-- /.col1 -->

									</a></li>


									<li class="hoverable"><a href="features.php">
											<div class="col1">
												<div class="content">
													<div class="content-col1">
														<div class="label label-info">
															<i class="icon-plus"></i>
														</div>
													</div>
													<div class="content-col2">
														<div class="desc">Manage Features</div>
													</div>
												</div>
											</div> <!-- /.col1 -->

									</a></li>
								</ul>
								<!-- /.feeds -->
							</div>
							<!-- /.scroller -->
						</div>
						<!-- /#tab_feed_1 -->


					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.tabbable tabbable-custom-->
			</div>
			<!-- /.widget-content -->
		</div>
		<!-- /.widget .box -->
	</div>
	<!-- /.col-md-6 -->
	<!-- /Sin/Cos Chart -->

					 
 <?php require('admin_footer.php');?>