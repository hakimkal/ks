<?php $pageName = 'Edit FAQ';?>
<?php require('admin_top.php');?>


 <?php
	
$Faq = $mc->getFaq ( $_GET ['id'] );
//print_r($Faq);
	?>




<div id="container">
	<div class="container">




		<!--=== Page Content ===-->
		<!--=== Inline Tabs ===-->
		<div class="row">
			<div class="col-md-12">
				<!-- Tabs-->
				<div class="tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">

						<li><a href="#tab_edit_account" data-toggle="tab">Edit FAQ</a></li>
					</ul>
					<div class="tab-content row">

						<!--=== Edit Account ===-->
						<div class="tab-pane active" id="tab_edit_account">
							<form class="form-horizontal" method="post"
								action="<?php echo BASE_URL;?>/includes/app_controller.php">
								<div class="col-md-12">
									<div class="widget">

										<div class="widget-content">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">Question:</label>
														<div class="col-md-8">
															<input type="text" name="FAQ[title]" class="form-control"
																value="<?php echo $Faq['title'];?>"> 
																<input type="hidden"
																name="FAQ[id]" class="form-control"
																value="<?php echo $Faq['id'];?>">

<input type="hidden"
																name="_method" class="form-control"
																value="put">
														</div>

													</div>

													<div class="form-group">
														<label class="col-md-4 control-label"> Answer:</label>
														<div class="col-md-8">
															<textarea rows="" name="FAQ[details]" cols=""
																class="form-control">
																 <?php echo $Faq['details'];?> 
																</textarea>
														</div>
													</div>
												</div>






											</div>
											<!-- /.row -->
										</div>
										<!-- /.widget-content -->
									</div>
									<!-- /.widget -->

								</div>
								<!-- /.col-md-12 -->
						
						</div>
						<div class="form-actions">
							<input type="submit" value="Save Banner"
								class="btn btn-primary pull-right">
						</div>
						</form>
						<!-- /Edit Account -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!--END TABS-->
			</div>
		</div>
		<!-- /.row -->
		<!-- /Page Content -->
	</div>
 




<?php require('admin_footer.php');?>