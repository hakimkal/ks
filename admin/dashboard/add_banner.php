<?php $pageName = 'Add Feature';?>
<?php require('admin_top.php');?>


 
	 
	
	 
 
	<div id="container">
		<div class="container">
				 

			 

				<!--=== Page Content ===-->
				<!--=== Inline Tabs ===-->
				<div class="row">
					<div class="col-md-12">
						<!-- Tabs-->
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
							 
								<li><a href="#tab_edit_account" data-toggle="tab">Banner Upload</a></li>
							</ul>
							<div class="tab-content row">
							 
								<!--=== Edit Account ===-->
								<div class="tab-pane active" id="tab_edit_account">
									<form class="form-horizontal" action="#">
										<div class="col-md-12">
											<div class="widget">
											 
												<div class="widget-content">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Banner Text Title:</label>
																<div class="col-md-8"><input type="text" name="regular" class="form-control" value="Kayum"></div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label"> Banner Detail Text:</label>
																<div class="col-md-8">
																<textarea rows="" cols="" class="form-control" ></textarea>
																 </div>
															</div>
														</div>


														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Banner Image:</label>
																<div class="col-md-8">
																	<input type="file">
																</div>
															</div>

														 
														</div>
													
													
														
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->
											
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