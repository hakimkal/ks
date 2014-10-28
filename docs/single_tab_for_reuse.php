<?php $pageName = 'Add Feature';?>
<?php require('admin_top.php');?>


 
	 
	
	 
 
	<div id="container">
		<div class="container">
				 

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>Upload Banner </h3>
					 
					</div>

				</div>
				<!-- /Page Header -->

				<!--=== Page Content ===-->
				<!--=== Inline Tabs ===-->
				<div class="row">
					<div class="col-md-12">
						<!-- Tabs-->
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
							 
								<li><a href="#tab_edit_account" data-toggle="tab">Edit Account</a></li>
							</ul>
							<div class="tab-content row">
							 
								<!--=== Edit Account ===-->
								<div class="tab-pane active" id="tab_edit_account">
									<form class="form-horizontal" action="#">
										<div class="col-md-12">
											<div class="widget">
												<div class="widget-header">
													<h4>General Information</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">First name:</label>
																<div class="col-md-8"><input type="text" name="regular" class="form-control" value="Kayum"></div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">Last name:</label>
																<div class="col-md-8"><input type="text" name="regular" class="form-control" value="Ansari"></div>
															</div>
														</div>


														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Gender:</label>
																<div class="col-md-8">
																	<select class="form-control">
																		<option value="male" selected="selected">Male</option>
																		<option value="female">Female</option>
																	</select>
																</div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">Age:</label>
																<div class="col-md-8"><input type="text" name="regular" class="form-control input-width-small" value="28"></div>
															</div>
														</div>
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->
										</div> <!-- /.col-md-12 -->

										<div class="col-md-12 form-vertical no-margin">
											<div class="widget">
												<div class="widget-header">
													<h4>Settings</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-4 col-lg-2">
															<strong class="subtitle padding-top-10px">Permanent username</strong>
															<p class="text-muted">Lorem Ipsum</p>
														</div>

														<div class="col-md-8 col-lg-10">
															<div class="form-group">
																<label class="control-label padding-top-10px">Username:</label>
																<input type="text" name="username" class="form-control" value="kayum" disabled="disabled">
															</div>
														</div>
													</div> <!-- /.row -->
													<div class="row">
														<div class="col-md-4 col-lg-2">
															<strong class="subtitle">Change password</strong>
															<p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
														</div>

														<div class="col-md-8 col-lg-10">
															<div class="form-group">
																<label class="control-label">Old password:</label>
																<input type="password" name="old_password" class="form-control" placeholder="Old Password">
															</div>

															<div class="form-group">
																<label class="control-label">New password:</label>
																<input type="password" name="new_password" class="form-control" placeholder="New Password">
															</div>

															<div class="form-group">
																<label class="control-label">Repeat new password:</label>
																<input type="password" name="new_password_repeat" class="form-control" placeholder="Confirm New Password">
															</div>
														</div>
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->

											<div class="form-actions">
												<input type="submit" value="Update Account" class="btn btn-primary pull-right">
											</div>
										</div> <!-- /.col-md-12 -->
									</form>
								</div>
								<!-- /Edit Account -->
							</div> <!-- /.tab-content -->
						</div>
						<!--END TABS-->
					</div>
				</div> <!-- /.row -->
				<!-- /Page Content -->
			</div>
 




<?php require('admin_footer.php');?>